<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;
    protected $guarded = [];
    private $category;
    private $product;
    private $user;
    public function __construct(Product $product, Category $category, Tag $tag, User $user)
    {
        $this->product = $product;
        $this->category = $category;
        $this->tag = $tag;
        $this->user = $user;
    }
    // View product
    public function index()
    {
        $users = $this->user->all();
        $categories = $this->category->all();
        $product = $this->product->all();
        return view('admins.product.index', compact('product', 'categories', 'users'));
    }
    public function trash()
    {
        $product = $this->product->onlyTrashed()->paginate(10);
        return view('admins.product.trash', compact('product'));
    }
    // Create a new product
    public function create()
    {
        $categories = $this->category->getCategorySelect($parent_id = "");
        return view('admins.product.add', compact('categories'));

    }
    // With database_create_product
    public function postAdd(Request $request)
    {
        $request->validate([
            'detail' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $dataFeatureImage = $this->storageFileUpload($request, 'feature_image_path', 'product');
            $dataProduct = [
                'name' => $request->name,
                'description' => $request->description,
                'detail' => $request->detail,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'user_id' => '1',
                'category_id' => $request->category_id,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            if (!empty($dataFeatureImage)) {
                $dataProduct['feature_image_name'] = $dataFeatureImage['filename'];
                $dataProduct['feature_image'] = $dataFeatureImage['filepath'];
            }

            $idProduct = $this->product->addProduct($dataProduct);

            //Insert data product_images
            $dataImage = [
                'product_id' => $idProduct,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            if ($request->hasFile('product_image_path')) {
                foreach ($request->product_image_path as $fileitem) {
                    $dataImageProduct = $this->storageFileUploadMulti($fileitem, 'product');
                    $dataImage['image'] = $dataImageProduct['filepath'];
                    $dataImage['image_name'] = $dataImageProduct['filename'];
                    $this->product->addImage($dataImage);
                }
            }
            // Insert data tags
            $dataTag = [
                'product_id' => $idProduct,
                'created_at' => date('Y-m-d H:i:s'),

            ];
            //Insert data tag_product
            if (!empty($request->tags)) {
                foreach ($request->tags as $key => $value) {
                    $dataTag['name'] = $value;
                    $idTag = $this->product->addTag($dataTag);
                    $dataTag['tag_id'] = $idTag;
                    $this->product->addTagProduct($dataTag);
                }
            }
            DB::commit();
            return redirect()->route('admins.products.index')->with('msg', 'Thêm sản phẩm thành công');
            //code...
        } catch (\Exception$exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }

    // Edit Product

    public function productData()
    {
        return Product::with(['tags'])->get();
    }

    public function edit($id)
    {
        $product = $this->product::with(['tags'])->find($id);

        $categories = $this->category->getCategorySelect($product->category_id);

        return view('admins.product.edit', compact('product', 'categories'))->with('msg', 'Update sản phẩm thành công');
    }

    //Update Product
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = $this->product->find($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->detail = $request->detail;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->user_id = '1';
            $product->category_id = $request->category_id;

            $dataUploadFeatureImage = $this->storageFileUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $product->feature_image_name = $dataUploadFeatureImage['filename'];
                $product->feature_image = $dataUploadFeatureImage['filepath'];
            }
            $product->update();

            // Insert data to product_images
            $dataImage = [
                'product_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            if ($request->hasFile('product_image_path')) {
                foreach ($request->product_image_path as $fileitem) {
                    $dataImageProduct = $this->storageFileUploadMulti($fileitem, 'product');
                    $dataImage['image'] = $dataImageProduct['filepath'];
                    $dataImage['image_name'] = $dataImageProduct['filename'];
                    $this->product->addImage($dataImage);
                }
            }

            // Insert tags for product
            $tagIds = [];
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }

            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->back()->with('msg', 'Sửa thành công');
            //code...
        } catch (\Exception$exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }

    }

    //Delete Product
    public function deleteForcus($id)
    {

        try {
            DB::beginTransaction();
            DB::table('product_images')->where('product_id', $id)->delete();
            DB::table('product_tags')->where('product_id', $id)->delete();
            $product =$this->product->onlyTrashed()->find($id);
            $product->forceDelete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception$exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }

    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->product);
    }
    public function restore($id)
    {
        try {
            DB::beginTransaction();
            $product = $this->product->onlyTrashed()->find($id);
            $product->restore();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception$exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
    public function show($id)
    {
        $categories = $this->category->all();
        $product = $this->product->getProduct();
        return Response::json($categories, $product);
    }
    //
    public function deleteImage($id)
    {
        $this->product->deleteImageProduct($id);
        return redirect()->back()->with('msg', 'Đã xóa ảnh');
    }
    public function deleteImageFeature($id)
    {
        $this->product->deleteImageFeatureProduct($id);
        return redirect()->back()->with('msg', 'Đã xóa ảnh đại diện');
    }

}
