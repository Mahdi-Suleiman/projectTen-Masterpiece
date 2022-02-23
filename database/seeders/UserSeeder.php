<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = Hash::make('123456789');
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => $password,
                'role' => 'admin',
                'mobile_number' => '0777777777'
            ],
            [
                'name' => 'mahdi',
                'email' => 'mh@gmail.com',
                'password' => $password,
                'role' => 'user',
                'mobile_number' => '0777777777'

            ],
            [
                'name' => 'ghassan',
                'email' => 'gh@gmail.com',
                'password' => $password,
                'role' => 'user',
                'mobile_number' => '0777777777'

            ],
            [
                'name' => 'sanad',
                'email' => 'sanad@gmail.com',
                'password' => $password,
                'role' => 'user',
                'mobile_number' => '0777777777'

            ],
            [
                'name' => 'azmi',
                'email' => 'azmi@gmail.com',
                'password' => $password,
                'role' => 'user',
                'mobile_number' => '0777777777'

            ],
        ]);
    }
}