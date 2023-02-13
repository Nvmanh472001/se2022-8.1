<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class CreateUserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'id' =>'1',
                'name' =>'Quản trị viên',
                'email' =>'admin@gmail.com',
                'phone' =>'0378187820',
                'password' =>Hash::make('Admin123'),
            ],
            
            
        ]);
    }
}
