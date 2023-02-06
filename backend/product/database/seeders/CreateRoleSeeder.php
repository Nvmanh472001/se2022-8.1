<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            [
                'id' => '1',
                'name' => 'admin',
                'displayname' => 'Quản trị hệ thống',
            ],
            [
                'id' => '2',
                'name' => 'content',
                'displayname' => 'Quản trị nội dung',
            ],
            [
                'id' => '3',
                'name' => 'guest',
                'displayname' => 'Khách hàng',
            ],
            [
                'id' => '4',
                'name' => 'developer',
                'displayname' => 'Phát triển website',
            ],
        ]);
    }
}
