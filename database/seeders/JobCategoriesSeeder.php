<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobCategories;

class JobCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo dữ liệu mẫu cho danh mục công việc
        $categories = [
            [
                'name' => 'Công nghệ thông tin',
                'created_at' => now(),
            ],
            [
                'name' => 'Kế toán',
                'created_at' => now(),
            ],
            [
                'name' => 'Điện tử viễn thông',
                'created_at' => now(),
            ],
            [
                'name' => 'Nhân sự',
                'created_at' => now(),
            ],
            [
                'name' => 'Marketing',
                'created_at' => now(),
            ],
        ];

        foreach ($categories as $category) {
            JobCategories::create($category);
        }
    }
}
