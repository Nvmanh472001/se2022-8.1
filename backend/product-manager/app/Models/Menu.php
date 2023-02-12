<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Components\Recusive;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    public function __construct(){

    }
    public function getMenuSelect($parent_id){
        $data = DB::select('SELECT * FROM menus');
        $recusive =  new Recusive($data);
        $menu_select = $recusive->menuRecursive($parent_id);
        return $menu_select;
    }
    public function addMenu($data){
        DB::insert('INSERT INTO menus (name, parent_id,created_at)values (?, ?,?)', $data);
    }
    public function getMenu(){
        $data = DB::table('menus')->select('*')->paginate();
        return $data;
    }
    public function getMenuID($id){
        $data = DB::table('menus')->select('*')->find($id);
        return $data;
    }
    public function updateMenu($data){
        DB::update('UPDATE menus SET
        name = ?,
        parent_id = ?,
        updated_at = ? 
        WHERE id=?;
        ',$data);
    }
    public function deleteMenu($id){
        DB::table('menus')->where('id',$id)->delete();
    }


}
