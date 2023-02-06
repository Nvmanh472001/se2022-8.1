<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CreatePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            [
                'id' => '1',
                'name' => 'permission',
                'displayname' => 'Tạo danh sách phân quyền',
                'parent_id' => '0',
                'keycode' => 'permission',
            ],
            [
                'id' => '2',
                'name' => 'list',
                'displayname' => 'Hiển thị',
                'parent_id' => '1',
                'keycode' => 'permission_list',
            ],
            [
                'id' => '3',
                'name' => 'list',
                'displayname' => 'Hiển thị',
                'parent_id' => '1',
                'keycode' => 'permission_add',
            ],
            [
                'id' => '4',
                'name' => 'role',
                'displayname' => 'Danh sách phân quyền',
                'parent_id' => '0',
                'keycode' => 'role',
            ],
            [
                'id' => '5',
                'name' => 'list',
                'displayname' => 'Hiển thị',
                'parent_id' => '4',
                'keycode' => 'role_list',
            ],
            [
                'id' => '6',
                'name' => 'add',
                'displayname' => 'Thêm mới',
                'parent_id' => '4',
                'keycode' => 'role_add',
            ],
            [
                'id' => '7',
                'name' => 'edit',
                'displayname' => 'Sửa',
                'parent_id' => '4',
                'keycode' => 'role_edit',
            ],
            [
                'id' => '8',
                'name' => 'delete',
                'displayname' => 'Xóa',
                'parent_id' => '4',
                'keycode' => 'role_delete',
            ],

        ]);
    }
}
