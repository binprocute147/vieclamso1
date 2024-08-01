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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name_job');  // tên việc làm
            $table->text('description'); // mô tả 
            $table->string('company_name'); // tên công ty
            $table->string('requirements'); // yêu cầu 
            $table->decimal('min_salary', 10, 2); // lương thấp nhất 
            $table->decimal('max_salary', 10, 2); // lương cao nhất
            $table->string('location'); // vị trí
            $table->string('address'); // địa chỉ 
            $table->string('experience')->nullable(); // kinh nghiệm 
            $table->integer('quantity'); // số lượng
            $table->string('gender')->nullable(); // giới tính
            $table->string('job_type'); // hình thức làm việc
            $table->string('company_image')->nullable(); // ảnh công ty
            $table->unsignedBigInteger('job_category_id'); // khóa ngoại liên kết với bảng job_categories
            $table->string('slug')->unique();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['job_category_id']);
            $table->dropColumn('slug'); // xóa cột slug nếu rollback
        });
        Schema::dropIfExists('jobs');
    }
};
