<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use DB;



class AdminRoleController extends Controller
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
    public function index(){
        $roles = $this->role->paginate(5);
        return view('admins.role.index',compact('roles'));
    }
    public function create(){
         $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admins.role.add', compact('permissionsParent'));
    }
    public function postAdd(Request $request){
        $role = $this->role;
        $role->name =  $request->name;
        $role->displayname = $request->displayname;
        $role->save();
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index')->with('msg','Thêm quyền mới thành công');
    }
    public function edit($id){
        $role = $this->role->find($id);
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        $permisstionCheck = $role->permissions;
        return view('admins.role.edit',compact('role', 'permissionsParent','permisstionCheck'));

    }
    public function update(Request $request,$id){
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'displayname' => $request->displayname,
        ]);
        $role->permissions()->sync($request->permission_id);
        return redirect()->back()->with('msg','Sửa thành công');
    }

}