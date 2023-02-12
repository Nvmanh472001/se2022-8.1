<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;
use App\Components\Recusive;
use Illuminate\Support\Collection;
use App\Models\Product; 


class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public function __construct(){

    }
    public function getCategorySelect($parent_id){
        $data = DB::select('SELECT * FROM categories');
        $recusive =  new Recusive($data);
        $category_select = $recusive->categoryRecursive($parent_id);
        return $category_select;
    }
    public function addCategory($data){
        DB::insert('INSERT INTO categories (name, parent_id, slug,created_at)values (?, ?,?,?)', $data);
    }
    public function getCategoryID($id){
        $data = DB::table('categories')->select('*')->find($id);
        return $data;
    }
    public function updateCategory($data){
        DB::update('UPDATE categories SET
        name = ?,
        parent_id = ?,
        slug = ?,
        updated_at = ? 
        WHERE id=?;
        ',$data);
    }
    public function deleteCategory($id){
        $cates = DB::table('categories')->get();
        foreach($cates as $cate){
            if($cate->parent_id == $id){
                DB::table('categories')
                ->where('id', $cate->id)
                ->update(array('parent_id' => ''));
            }
        }
        $products = DB::table('products')->get();
        foreach($products as $product){
            if($product->category_id == $id){
                DB::table('product_images')->where('product_id',$product->id)->delete();
                DB::table('product_tags')->where('product_id',$product->id)->delete();
                DB::table('products')->where('id',$product->id)->delete();
            }
        }
        DB::table('categories')->where('id',$id)->delete();
    }
}
 