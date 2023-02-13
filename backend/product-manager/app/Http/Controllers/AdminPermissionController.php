<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    //
    protected $guarded = [];
    private $role;
    private $user;
    private $permission;
    public function __construct(User $user, Role $role, Permission $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;

    }
    public function create()
    {

        return view('admins.permission.add');
    }
    public function postAdd(Request $request)
    {
        $displayname = '';
        switch ($request->module_parent) {
            case 'category':
                //
                $displayname = 'Danh mục sản phẩm';
                break;
            case 'slider':
                //
                $displayname = 'Danh mục slide';
                break;
            case 'menu':
                //
                $displayname = 'Danh mục menu';
                break;
            case 'product':
                //
                $displayname = 'Danh sách sản phẩm';
                break;
            case 'user':
                //
                $displayname = 'Danh sách người dùng';
                break;
            case 'role':
                //
                $displayname = 'Danh sách phân quyền';
                break;
            case 'order':
                //
                $displayname = 'Danh sách đơn hàng';
                break;
            case 'permission':
                //
                $displayname = 'Tạo danh sách phân quyền';
                break;
            default:
                //
        }
        $pemission = Permission::firstOrCreate([
            'name' => $request->module_parent,
            'displayname' => $displayname,
            'parent_id' => 0,
        ]);

        foreach ($request->module_chilrent as $value) {
            switch ($value) {
                case 'edit':
                    //
                    $displayname = 'Sửa';
                    break;
                case 'list':
                    //
                    $displayname = 'Hiển thị';
                    break;
                case 'add':
                    //
                    $displayname = 'Thêm mới';
                    break;
                case 'delete':
                    //
                    $displayname = 'Xóa';
                    break;
                case 'deleteforcus':
                    //
                    $displayname = 'Xóa mềm';
                    break;

                default:
                    $displayname = 'Khôi phục';

            }
            Permission::firstOrCreate([
                'name' => $value,
                'displayname' => $displayname,
                'parent_id' => $pemission->id,
                'keycode' => $request->module_parent . '_' . $value,
            ]);
        }
        return redirect()->back()->with('msg', 'Thêm thành công');

    }
}
