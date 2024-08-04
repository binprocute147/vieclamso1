@extends('home')
<style>
    .is-invalid {
        border-color: #dc3545 !important;
    }

    .invalid-feedback {
        color: #dc3545 !important;
    }
</style>
@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">Tạo CV Mới</h1>
        <form id="cv-form" action="{{ route('cv.stores') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- hiển thị thông báo thành công hoặc thất bại --}}
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row bg-content rounded">
                <!-- Tên CV -->
                <div class="cv-section mb-4">
                    <h3 class="cv-section-title">Tên CV</h3>
                    <div class="mb-3">
                        <label for="name_cv" class="form-label">Tên CV</label>
                        <input type="text" class="form-control @error('name_cv') is-invalid @enderror" id="name_cv"
                            name="name_cv" value="{{ old('name_cv') }}" placeholder="Tên CV">
                        @error('name_cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Cột bên trái -->
                <div class="col-md-3 bg-secondary text-white py-4 rounded">
                    <!-- Hiển thị hình ảnh CV -->
                    <div class="text-center mb-4">
                        <img src="{{ asset(isset($image_cv) ? 'storage/' . $image_cv : 'images/profile-picture/user-default.jpg') }}"
                            alt="CV Image" class="img-fluid rounded img-thumbnail" id="cvImage"
                            style="cursor: pointer; width: 100%; height: auto;"
                            onclick="document.getElementById('cvImageInput').click();">
                        <input type="file" name="image_cv" id="cvImageInput" style="display: none;" accept="image/*"
                            onchange="previewImage(event)">
                        @error('image_cv')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Thông Tin Cá Nhân -->
                    <div class="cv-section mb-4">
                        <h3 class="cv-section-title">Thông Tin Cá Nhân</h3>
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="Nguyễn Văn A">
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="nguyenvana@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                                placeholder="0123456789">
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" value="{{ old('address') }}" placeholder="123 Đường ABC, TP. XYZ">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Vị trí ứng tuyển -->
                    <div class="cv-section mb-4">
                        <h3 class="cv-section-title">Vị trí ứng tuyển</h3>
                        <input type="text" class="form-control @error('position_applied') is-invalid @enderror"
                            id="position_applied" name="position_applied" value="{{ old('position_applied') }}"
                            placeholder="Nhập vị trí">
                        @error('position_applied')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kỹ năng -->
                    <div class="cv-section mb-4">
                        <h3 class="cv-section-title">Kỹ năng</h3>
                        <textarea class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" rows="3"
                            placeholder="Nhập kỹ năng">{{ old('skills') }}</textarea>
                        @error('skills')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sở thích -->
                    <div class="cv-section mb-4">
                        <h3 class="cv-section-title">Sở thích</h3>
                        <textarea class="form-control @error('interests') is-invalid @enderror" id="interests" name="interests" rows="3"
                            placeholder="Nhập sở thích">{{ old('interests') }}</textarea>
                        @error('interests')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Người cố vấn -->
                    <div class="cv-section mb-4">
                        <h3 class="cv-section-title">Người cố vấn</h3>
                        <textarea class="form-control @error('referrals') is-invalid @enderror" id="referrals" name="referrals"
                            rows="3" placeholder="Nhập người cố vấn">{{ old('referrals') }}</textarea>
                        @error('referrals')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Giải thưởng -->
                    <div class="cv-section mb-4">
                        <h3 class="cv-section-title">Giải thưởng</h3>
                        <textarea class="form-control @error('awards') is-invalid @enderror" id="awards" name="awards" rows="3"
                            placeholder="Nhập giải thưởng">{{ old('awards') }}</textarea>
                        @error('awards')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Hoạt động -->
                    <div class="cv-section mb-4">
                        <h3 class="cv-section-title">Hoạt động</h3>
                        <textarea class="form-control @error('activities') is-invalid @enderror" id="activities" name="activities"
                            rows="3" placeholder="Nhập hoạt động">{{ old('activities') }}</textarea>
                        @error('activities')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Chứng chỉ -->
                    <div class="cv-section mb-4">
                        <h3 class="cv-section-title">Chứng chỉ</h3>
                        <textarea class="form-control @error('certifications') is-invalid @enderror" id="certifications"
                            name="certifications" rows="3" placeholder="Nhập chứng chỉ">{{ old('certifications') }}</textarea>
                        @error('certifications')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Cột bên phải -->
                <div class="col-md-7 offset-md-1 py-4">
                    <!-- Mục tiêu nghề nghiệp -->
                    <div class="cv-section mb-5">
                        <h3 class="cv-section-title">Mục tiêu nghề nghiệp</h3>
                        <textarea class="form-control @error('career_goals') is-invalid @enderror" id="career_goals" name="career_goals"
                            rows="4" placeholder="Nhập mục tiêu nghề nghiệp">{{ old('career_goals') }}</textarea>
                        @error('career_goals')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kinh nghiệm làm việc -->
                    <div class="cv-section mb-4">
                        <h3 class="cv-section-title">Kinh nghiệm làm việc</h3>
                        <div class="mb-3">
                            <label for="work_experience" class="form-label">Kinh nghiệm làm việc</label>
                            <textarea class="form-control @error('work_experience') is-invalid @enderror" id="work_experience"
                                name="work_experience" rows="5" placeholder="Mô tả kinh nghiệm làm việc">{{ old('work_experience') }}</textarea>
                            @error('work_experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Trình độ học vấn -->
                    <div class="cv-section mb-5">
                        <h3 class="cv-section-title">Trình độ học vấn</h3>
                        <textarea class="form-control @error('education') is-invalid @enderror" id="education" name="education"
                            rows="4" placeholder="Nhập trình độ học vấn">{{ old('education') }}</textarea>
                        @error('education')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Dự án -->
                    <div class="cv-section mb-5">
                        <h3 class="cv-section-title">Dự án</h3>
                        <textarea class="form-control @error('projects') is-invalid @enderror" id="projects" name="projects"
                            rows="4" placeholder="Nhập dự án">{{ old('projects') }}</textarea>
                        @error('projects')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nút Lưu -->
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">Lưu CV</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('cvImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        document.getElementById('cv-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: true
                        }).then(() => {
                            window.location.href = "{{ route('account') }}";
                        });
                    } else if (data.status === 'error') {
                        let errors = data.errors;
                        let errorMessages = '';

                        for (let field in errors) {
                            errorMessages += errors[field].join('<br>');
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Có lỗi xảy ra',
                            html: errorMessages,
                            showConfirmButton: true
                        });
                    }
                })
                .catch(error => {
                    console.error('Có lỗi xảy ra:', error);
                });
        });
    </script>
@endsection
