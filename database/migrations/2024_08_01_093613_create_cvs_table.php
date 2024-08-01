<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Liên kết với bảng users
            $table->string('name_cv'); // Tên CV
            $table->string('image_cv')->nullable(); // ảnh cv
            $table->string('full_name'); // Họ và tên
            $table->string('email')->unique(); // Email
            $table->string('phone_number'); // Số điện thoại
            $table->string('address')->nullable(); // Địa chỉ
            $table->string('position_applied'); // Vị trí ứng tuyển
            $table->text('career_goals')->nullable(); // Mục tiêu nghề nghiệp
            $table->text('work_experience')->nullable(); // Kinh nghiệm làm việc
            $table->text('education')->nullable(); // Trình độ học vấn
            $table->text('projects')->nullable(); // Dự án
            $table->text('skills')->nullable(); // Kỹ năng
            $table->text('interests')->nullable(); // Sở thích
            $table->text('activities')->nullable(); // Hoạt động
            $table->text('referrals')->nullable(); // Người giới thiệu
            $table->text('awards')->nullable(); // Danh hiệu và giải thưởng
            $table->text('certifications')->nullable(); // Chứng chỉ
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
