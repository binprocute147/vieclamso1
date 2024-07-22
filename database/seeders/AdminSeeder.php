<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'fullname' => 'Nguyễn Tấn Bin',
                'picture' => 'admin.png',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'phone' => '0355859507',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
