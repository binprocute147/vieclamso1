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
                'jobcategories_image' =>'it.webp',
                'created_at' => now(),
            ],
            [
                'name' => 'Kế toán',
                'jobcategories_image' =>'ketoan.webp',
                'created_at' => now(),
            ],
            [
                'name' => 'Điện tử viễn thông',
                'jobcategories_image' =>'dientu.webp',
                'created_at' => now(),
            ],
            [
                'name' => 'Nhân sự',
                'jobcategories_image' =>'nhansu.webp',
                'created_at' => now(),
            ],
            [
                'name' => 'Marketing',
                'jobcategories_image' =>'marketing.webp',
                'created_at' => now(),
            ],
        ];

        foreach ($categories as $category) {
            JobCategories::create($category);
        }
    }
}
