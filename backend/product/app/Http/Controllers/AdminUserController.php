<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


use App\Traits\DeleteModelTrait;


use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    
    use DeleteModelTrait;
    protected $guarded = [];
    private $role;
    private $user;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->orderBy('created_at', 'desc')->paginate(5);
        return view('admins.user.index', compact('users'));
    }
    public function trash()
    {
        $users = $this->user->onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);
        return view('admins.user.trash', compact('users'));
    }
    public function restore($id){
        try{
            DB::beginTransaction();
            $user =$this->user->onlyTrashed()->find($id);
            $user->restore();
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
    public function deleteForcus($id){
        try{
            DB::beginTransaction();
            DB::table('role_user')->where('user_id', $id)->delete();
            $user =$this->user->onlyTrashed()->find($id);
            $user->forceDelete();
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
    public function edit($id)
    {
        $roles = $this->role->all();
        $users = $this->user::with(['roles'])->find($id);
        $rolesOfUser = $users->roles;
        return view('admins.user.edit', compact('users', 'roles', 'rolesOfUser'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admins.user.add', compact('roles'));
    }
    public function postAdd(Request $request)
    {
        $request->validate([
            'email' => 'email|unique:users,email',
            'phone' => 'regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|unique:users,phone',
            'password' => 'min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/',
            'res_password' => 'same:password',
        ], [

            'email.email' => 'Định dạng email chưa đúng, vui lòng kiểm tra lại. ',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác. ',
            'phone.unique' => 'Số điện thoại đã tồn tại, vui lòng nhập số điện thoại khác. ',
            'phone.regex' => 'Số điện thoại chưa đúng định dạng, vui lòng kiểm tra lại.',
            'phone.not_regex' => 'Số điện thoại chưa đúng định dạng, vui lòng kiểm tra lại.',
            'phone.min' => 'Số điện thoại cần nhiều hơn 9 số.',
            'password.min' => 'Mật khẩu cần nhiều hơn 6 kí tự.',
            'password.regex' => 'Mật khẩu cần chứa chữa hoa, chữ thường, chữ số',
            'res_password.same' => 'Mật khẩu chưa khớp.',

        ]);
        try {
            DB::beginTransaction();
            $user = $this->user;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $this->user->save();
            $roleIds = $request->role_id;
            foreach ($roleIds as $roleId) {
                DB::table('role_user')->insert([
                    'role_id' => $roleId,
                    'user_id' => $user->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
            DB::commit();
            return redirect()->route('users.index')->with('msg', 'Thêm tài khoản người dùng thành công');

        } catch (\Exception$exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

        }

    }
    public function update(Request $request, $id)
    {
        // dd($request->password != null);
        if (!$request->password == null || !$request->res_password == null) {
            $request->validate([
                'email' => 'email|unique:users,email,' . $id,
                'phone' => 'regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|unique:users,phone,' . $id,
                'password' => 'min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/',
                'res_password' => 'same:password',
            ], [
                'email.email' => 'Định dạng email chưa đúng, vui lòng kiểm tra lại. ',
                'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác. ',
                'phone.unique' => 'Số điện thoại đã tồn tại, vui lòng nhập số điện thoại khác. ',
                'phone.regex' => 'Số điện thoại chưa đúng định dạng, vui lòng kiểm tra lại.',
                'phone.not_regex' => 'Số điện thoại chưa đúng định dạng, vui lòng kiểm tra lại.',
                'phone.min' => 'Số điện thoại cần nhiều hơn 9 số.',
                'password.min' => 'Mật khẩu cần nhiều hơn 6 kí tự.',
                'password.regex' => 'Mật khẩu cần chứa chữa hoa, chữ thường, chữ số',
                'res_password.same' => 'Mật khẩu chưa khớp.',

            ]);
        }
        $request->validate([
            'email' => 'email|unique:users,email,' . $id,
            'phone' => 'regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|unique:users,phone,' . $id,
        ], [

            'email.email' => 'Định dạng email chưa đúng, vui lòng kiểm tra lại. ',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác. ',
            'phone.unique' => 'Số điện thoại đã tồn tại, vui lòng nhập số điện thoại khác. ',
            'phone.regex' => 'Số điện thoại chưa đúng định dạng, vui lòng kiểm tra lại.',
            'phone.not_regex' => 'Số điện thoại chưa đúng định dạng, vui lòng kiểm tra lại.',
            'phone.min' => 'Số điện thoại cần nhiều hơn 9 số.',

        ]);
        try {
            DB::beginTransaction();
            $user = $this->user::with(['roles'])->find($id);
            if(!$request->password == null ){
                $user->password = Hash::make($request->password);
            }
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->update();
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->back()->with('msg', 'Sửa thành công');
        } catch (\Exception$exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

        }

    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }

}
