<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Components\Recusive;
use Validator;
use App\Models\Menu; 
use Illuminate\Support\Collection;


class MenuController extends Controller
{
    private $menu;
    public function __construct(Menu $menu){
       $this->menu =$menu ;
    }
    public function index(){
        $menu = $this->menu->paginate(10);
        return view('admins.menu.index',compact('menu'));
    }
    public function create() {
        $menu_select = $this->menu->getMenuSelect($parent_id='');
        return view('admins.menu.add',compact('menu_select'));

    }
    public function postAdd(Request $request){
       
        $dataInsert = [
            $request->name,
            $request->parent_id,
            date('Y-m-d H:i:s')

    ];

        $this->menu->addMenu($dataInsert);
        return redirect()-> route('admins.menus.index')->with('msg','Thêm thành công');

    }
    public function edit($id){
        $menu =$this->menu->getMenuID($id);
        $menu_select = $this->menu->getMenuSelect($menu->parent_id);

        return view('admins.menu.edit',compact('menu_select','menu'));
    }

    public function delete($id){
        
        try{
            DB::beginTransaction();
            $this->menu->deleteMenu($id);
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
    public function update(Request $request){
        $dataInsert = [
            $request->name,
            $request->parent_id,
            date('Y-m-d H:i:s'),
            $request ->id
        ];
        $this->menu->updateMenu($dataInsert);
        return redirect()-> route('admins.menus.index')->with('msg','Sửa thành công');
    }
    
    
}
