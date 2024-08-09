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
                'picture' => 'admin.jpg',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'phone' => '0355859507',
                'permissions' => 'full_access', // Toàn quyền
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Nguyễn Văn A',
                'picture' => 'user.jpg',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'editor',
                'phone' => '0123456789',
                'permissions' => 'edit_delete_except_admin', // Thêm/xóa/sửa trừ admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Trần Thị B',
                'picture' => 'viewer.jpg',
                'email' => 'viewer@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'viewer',
                'phone' => '0987654321',
                'permissions' => 'view_only', // Chỉ xem
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
