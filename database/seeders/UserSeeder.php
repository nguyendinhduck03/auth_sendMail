<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'nguyendinhduc.yb.k03@gmail.com',
                'password' => Hash::make(1234),
                'address' => null,
                'number' => null,
                'role_id' => 2,
                'status' => 1,
            ],
            [
                'name' => 'Đình Đức',
                'email' => 'ducndph41389@fpt.edu.vn',
                'password' => Hash::make(1234),
                'address' => null,
                'number' => null,
                'role_id' => 1,
                'status' => 1,
            ],
        ]);
    }
}
