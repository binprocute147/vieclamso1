@extends('home')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Tạo CV Mới</h1>
    <form action="{{ route('cv.store') }}" method="POST">
        @csrf
        <div class="row bg-content rounded">
            <!-- Cột bên trái -->
            <div class="col-md-3 bg-secondary text-white py-4 rounded">
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Thông Tin Cá Nhân</h3>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control-plaintext text-white" id="full_name" name="full_name" placeholder="Nguyễn Văn A">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control-plaintext text-white" id="email" name="email" placeholder="nguyenvana@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control-plaintext text-white" id="phone_number" name="phone_number" placeholder="0123456789">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control-plaintext text-white" id="address" name="address" placeholder="123 Đường ABC, TP. XYZ">
                    </div>
                </div>
                
                <!-- Vị trí ứng tuyển -->
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Vị trí ứng tuyển</h3>
                    <input type="text" class="form-control-plaintext text-white" id="position_applied" name="position_applied" placeholder="Nhập vị trí">
                </div>

                <!-- Kỹ năng -->
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Kỹ năng</h3>
                    <textarea class="form-control-plaintext text-white" id="skills" name="skills" rows="3" placeholder="Nhập kỹ năng"></textarea>
                </div>

                <!-- Sở thích -->
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Sở thích</h3>
                    <textarea class="form-control-plaintext text-white" id="interests" name="interests" rows="3" placeholder="Nhập sở thích"></textarea>
                </div>

                <!-- Người cố vấn -->
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Người cố vấn</h3>
                    <textarea class="form-control-plaintext text-white" id="referrals" name="referrals" rows="3" placeholder="Nhập người cố vấn"></textarea>
                </div>

                <!-- Giải thưởng -->
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Giải thưởng</h3>
                    <textarea class="form-control-plaintext text-white" id="awards" name="awards" rows="3" placeholder="Nhập giải thưởng"></textarea>
                </div>

                <!-- Hoạt động -->
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Hoạt động</h3>
                    <textarea class="form-control-plaintext text-white" id="activities" name="activities" rows="3" placeholder="Nhập hoạt động"></textarea>
                </div>

                <!-- Chứng chỉ -->
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Chứng chỉ</h3>
                    <textarea class="form-control-plaintext text-white" id="certifications" name="certifications" rows="3" placeholder="Nhập chứng chỉ"></textarea>
                </div>

                <!-- Danh hiệu và giải thưởng -->
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Danh hiệu và giải thưởng</h3>
                    <textarea class="form-control-plaintext text-white" id="honors_awards" name="honors_awards" rows="3" placeholder="Nhập danh hiệu và giải thưởng"></textarea>
                </div>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-7 offset-md-1 py-4">
                <!-- Mục tiêu nghề nghiệp -->
                <div class="cv-section mb-5">
                    <h3 class="cv-section-title">Mục tiêu nghề nghiệp</h3>
                    <textarea class="form-control" id="career_goals" name="career_goals" rows="4" placeholder="Nhập mục tiêu nghề nghiệp"></textarea>
                </div>

                <!-- Kinh nghiệm làm việc -->
                <div class="cv-section mb-5">
                    <h3 class="cv-section-title">Kinh nghiệm làm việc</h3>
                    <textarea class="form-control" id="work_experience" name="work_experience" rows="5" placeholder="Nhập kinh nghiệm làm việc"></textarea>
                </div>

                <!-- Trình độ học vấn -->
                <div class="cv-section mb-5">
                    <h3 class="cv-section-title">Trình độ học vấn</h3>
                    <textarea class="form-control" id="education" name="education" rows="4" placeholder="Nhập trình độ học vấn"></textarea>
                </div>

                <!-- Dự án -->
                <div class="cv-section mb-5">
                    <h3 class="cv-section-title">Dự án</h3>
                    <textarea class="form-control" id="projects" name="projects" rows="4" placeholder="Nhập dự án"></textarea>
                </div>

                <!-- Nút Lưu -->
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary btn-lg">Lưu CV</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
