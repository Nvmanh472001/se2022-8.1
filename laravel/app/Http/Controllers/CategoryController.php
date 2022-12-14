<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Components\Recusive;
use Validator;
use App\Models\Category; 
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CategoryController extends Controller
{   
    private $category;
    public function __construct(Category $category){
       $this->category =$category ;
    }
    public function index(){
        $category =$this->category->paginate(10);
        return view('admins.category.index',compact('category'));
    }
    public function create() {
        $category_select = $this->category->getCategorySelect($parent_id='');
        return view('admins.category.add', compact('category_select'));

    }
    public function postAdd(Request $request){
       $slug =  Str::slug($request->name,'-');
        $dataInsert = [
            $request->name,
            $request->parent_id,
            $slug,
            date('Y-m-d H:i:s')

    ];

        $this->category->addCategory($dataInsert);
        return redirect()-> route('admins.categories.index')->with('msg','Thêm thành công');

    }
    public function edit($id){
        $category =$this->category->getCategoryID($id);
        $category_select = $this->category->getCategorySelect($category->parent_id);
        return view('admins.category.edit', compact('category','category_select'));  
    }
    public function update(Request $request){
        $dataInsert = [
            $request->name,
            $request->parent_id,
            ('menu'),
            date('Y-m-d H:i:s'),
            $request ->id
        ];
        $this->category->updateCategory($dataInsert);
        return redirect()-> route('admins.categories.index')->with('msg','Sửa thành công');
    }
    
    public function delete($id){
        
        try{
            DB::beginTransaction();
            $this->category->deleteCategory($id);
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    
    
}
