<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CreateRoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_user')->insert([
            [
                
                'user_id' =>'1',
                'role_id' =>'1',
                
            ],
            
            
        ]);
    }
}
