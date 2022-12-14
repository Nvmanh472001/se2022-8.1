<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CreateRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_permission')->insert([
            [
                'role_id' => '1',
                'permission_id' => '2',
            ],
            [
                'role_id' => '1',
                'permission_id' => '3',
            ],
            [
                'role_id' => '1',
                'permission_id' => '5',
            ],
            [
                'role_id' => '1',
                'permission_id' => '6',
            ],
            [
                'role_id' => '1',
                'permission_id' => '7',
            ],
            [
                'role_id' => '1',
                'permission_id' => '8',
            ],
            
        ]);

    }
}
