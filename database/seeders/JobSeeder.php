<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\JobCategories;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = JobCategories::all();
        
        $jobs = [
            [
                'name_job' => 'Lập trình viên PHP',
                'description' => 'Phát triển và duy trì ứng dụng web sử dụng PHP.',
                'company_name' => 'FPT SoftWare',
                'requirements' => 'Có kinh nghiệm với PHP và MySQL.',
                'min_salary' => 500,
                'max_salary' => 1500,
                'location' => 'Hà Nội',
                'address' => 'Số 1 Đường A, Hà Nội',
                'experience' => '2 năm',
                'company_image' => 'logofpt.jpg',
                'job_category_id' => $categories[0]->id,
                'created_at' => now(),
            ],
            [
                'name_job' => 'Lập trình viên Java',
                'description' => 'Phát triển ứng dụng sử dụng Java.',
                'company_name' => 'Công ty BDS Hoàng Trường Thinh',
                'requirements' => 'Có kinh nghiệm với Java và Spring Framework.',
                'min_salary' => 600,
                'max_salary' => 1600,
                'location' => 'Hồ Chí Minh',
                'address' => 'Số 2 Đường B, Hồ Chí Minh',
                'experience' => '3 năm',
                'company_image' => 'hoangtruongthinhfpt.jpg',
                'job_category_id' => $categories[0]->id,
                'created_at' => now(),
            ],
            [
                'name_job' => 'Nhân viên kế toán',
                'description' => 'Quản lý sổ sách kế toán và báo cáo tài chính.',
                'company_name' => 'Công ty TNHH Thành Công Group',
                'requirements' => 'Có chứng chỉ kế toán và kinh nghiệm làm việc.',
                'min_salary' => 400,
                'max_salary' => 1200,
                'location' => 'Đà Nẵng',
                'address' => 'Số 3 Đường C, Đà Nẵng',
                'experience' => '1 năm',
                'company_image' => 'thanhconglogo.png',
                'job_category_id' => $categories[1]->id,
                'created_at' => now(),
            ],
            [
                'name_job' => 'Chuyên viên phân tích tài chính',
                'description' => 'Phân tích dữ liệu tài chính và lập báo cáo.',
                'company_name' => 'Công ty CP Sữa VINAMILK',
                'requirements' => 'Có chứng chỉ CFA và kinh nghiệm làm việc.',
                'min_salary' => 700,
                'max_salary' => 1700,
                'location' => 'Hà Nội',
                'address' => 'Số 4 Đường D, Hà Nội',
                'experience' => '2 năm',
                'company_image' => 'vinamilklogo.jpg',
                'job_category_id' => $categories[1]->id,
                'created_at' => now(),
            ],
            [
                'name_job' => 'Quản lý dự án IT',
                'description' => 'Quản lý các dự án phát triển phần mềm.',
                'company_name' => 'Công ty Điện Lực EVN NPC',
                'requirements' => 'Có kinh nghiệm quản lý dự án và PMP.',
                'min_salary' => 1000,
                'max_salary' => 2000,
                'location' => 'Hồ Chí Minh',
                'address' => 'Số 5 Đường E, Hồ Chí Minh',
                'experience' => '5 năm',
                'company_image' => 'evnnpclogo.jpg',
                'job_category_id' => $categories[2]->id,
                'created_at' => now(),
            ],
            [
                'name_job' => 'Quản lý dự án xây dựng',
                'description' => 'Quản lý các dự án xây dựng.',
                'company_name' => 'Công ty CPTM Hưng Thịnh',
                'requirements' => 'Có kinh nghiệm quản lý dự án xây dựng và PMP.',
                'min_salary' => 1100,
                'max_salary' => 2100,
                'location' => 'Đà Nẵng',
                'address' => 'Số 6 Đường F, Đà Nẵng',
                'experience' => '5 năm',
                'company_image' => 'hungthinhlogo.jpg',
                'job_category_id' => $categories[2]->id,
                'created_at' => now(),
            ],
            [
                'name_job' => 'Nhân viên nhân sự',
                'description' => 'Quản lý tuyển dụng và các hoạt động nhân sự.',
                'company_name' => 'Công ty TNHH Cây Xanh Hoàng Gia',
                'requirements' => 'Có kinh nghiệm trong lĩnh vực nhân sự.',
                'min_salary' => 500,
                'max_salary' => 1500,
                'location' => 'Lâm Đồng',
                'address' => 'Số 7 Đường G, Hà Nội',
                'experience' => '2 năm',
                'company_image' => 'hoanggialogo.jpg',
                'job_category_id' => $categories[3]->id,
                'created_at' => now(),
            ],
            [
                'name_job' => 'Chuyên viên tuyển dụng',
                'description' => 'Tìm kiếm và tuyển chọn nhân sự phù hợp.',
                'company_name' => 'Công ty cổ phần Phúc Tea Franchise',
                'requirements' => 'Có kinh nghiệm trong lĩnh vực tuyển dụng.',
                'min_salary' => 600,
                'max_salary' => 1600,
                'location' => 'Cần Thơ',
                'address' => 'Số 8 Đường H, Hồ Chí Minh',
                'experience' => '3 năm',
                'company_image' => 'phuctealogo.png',
                'job_category_id' => $categories[3]->id,
                'created_at' => now(),
            ],
            [
                'name_job' => 'Nhân viên marketing',
                'description' => 'Lập kế hoạch và triển khai chiến dịch marketing.',
                'company_name' => 'Công ty Nakaumi Vietnam',
                'requirements' => 'Có kinh nghiệm làm marketing và kỹ năng sáng tạo.',
                'min_salary' => 700,
                'max_salary' => 1700,
                'location' => 'Đồng Nai',
                'address' => 'Số 9 Đường I, Đà Nẵng',
                'experience' => '2 năm',
                'company_image' => 'nakaumivietnamlogo.jpg',
                'job_category_id' => $categories[4]->id,
                'created_at' => now(),
            ],
            [
                'name_job' => 'Chuyên viên marketing số',
                'description' => 'Quản lý các chiến dịch marketing số.',
                'company_name' => 'Công ty TNHH MTV Nha Khoa Smile Galaxy',
                'requirements' => 'Có kinh nghiệm làm marketing số và kỹ năng phân tích.',
                'min_salary' => 800,
                'max_salary' => 1800,
                'location' => 'Huế',
                'address' => 'Số 10 Đường J, Hà Nội',
                'experience' => '3 năm',
                'company_image' => 'smilegalaxy.png',
                'job_category_id' => $categories[4]->id,
                'created_at' => now(),
            ],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
