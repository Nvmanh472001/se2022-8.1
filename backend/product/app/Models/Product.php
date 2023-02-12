<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'products';
    protected $fillable = ['name'];



    public function addProduct($data)
    {
        DB::table('products')->insert([
            'name' => $data['name'],
            'description' => $data['description'],
            'detail' => $data['detail'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'user_id' => auth()->id(),
            'category_id' => $data['category_id'],
            'created_at' => $data['created_at'],
            'feature_image_name' => $data['feature_image_name'],
            'feature_image' => $data['feature_image'],
        ]);
        return $id = DB::getPdo()->lastInsertId();

    }

    public function updateProduct($data)
    {
        DB::update('UPDATE products SET
        name = ?,
        description = ?,
        detail = ?,
        feature_image = ?,
        quantity = ?,
        price = ?,
        user_id = ?,
        category_id = ?,
        created_at = ?,
        WHERE id=?;
        ', $data);
    }
   
    public function addImage($data)
    {

        DB::table('product_images')->insert([
            'image' => $data['image'],
            'image_name' => $data['image_name'],
            'product_id' => $data['product_id'],
            'created_at' => $data['created_at'],
        ]);
    }

    public function addTag($data)
    {
        Tag::firstOrCreate([
            'name' => $data['name'],
        ]);
        return $id = DB::getPdo()->lastInsertId();

    }
    public function addTagProduct($data)
    {
        if ($data['tag_id'] == 0) {
            $tag = Tag::all();
            foreach ($tag as $value) {
                if ($value->name == $data['name']) {
                    $data['tag_id'] = $value->id;
                }
            }
        }
        DB::table('product_tags')->insert([
            'product_id' => $data['product_id'],
            'tag_id' => $data['tag_id'],
        ]);
    }
//Get Tag Product

    public function tags()
    {
        return $this
            ->belongsToMany('App\Models\Tag', 'product_tags', 'product_id', 'tag_id')
            ->withTimestamps();

    }

//Get ImageProductID
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

//Delete ImageProduct
    public function deleteImageProduct($id)
    {
        DB::table('product_images')->where('id', $id)->delete();
    }
    public function deleteImageFeatureProduct($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update(['feature_image_name' => null,
                'feature_image' => null]);
    }
    

}
