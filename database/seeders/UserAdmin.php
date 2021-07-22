<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('users')->insertGetId([
            'name'=> 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' =>  bcrypt('pass123'),
            'image_url' => 'not_found',
            'role' =>'admin_user',
        ]);
    }
}
