@extends('home')
<style>
    .bg-job {
        background: #edffe8;
    }

    .is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        color: #dc3545;
    }
</style>
@section('content')
    <div class="bg-content banner">
        <div class="container ">
            <div class="row">
                <div class="col-12 col-md-8 py-4">
                    <div class="row bg-banner1 rounded">
                        <div class="col-12 col-md-6 ">
                            <div class=" text-light ps-3">
                                <h1 class="py-5">Viec lam so1</h1>
                                <h2 class="color-bg">Dịch vụ tư vấn CV và
                                    định hướng tìm việc</h2>
                                <p class="py-2">Giải pháp giúp bạn chinh phục cơ hội việc làm mơ ước</p>
                                <div class="pt-2 pb-5">
                                    <a class="rounded-pill px-5 py-2 text-decoration-none text-light btn-content"
                                        href="#">Tìm hiểu ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <img class="img-fluid" src="{{ asset('images/banner-taikhoan.png') }}" alt="#">
                        </div>
                    </div>
                    <div class="py-4 ">
                        <div class="row bg-light rounded">
                            <div class="col">
                                <div class="ps-3 d-flex pt-2">
                                    <h2> CV đã tạo trên Vieclamso1</h2>
                                    <a class="rounded-pill px-3 py-2 ms-auto text-decoration-none text-light btn-content"
                                        href="{{ url('templatesCv') }}"><i class="fa-solid text-light px-2 fa-plus"></i>Tạo
                                        mới</a>
                                </div>
                                <div class="text-center py-3">
                                    @if ($cv->isNotEmpty())
                                        @foreach ($cv as $cvs)
                                            <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                                data-bs-target="#cvModal"
                                                data-cv-id="{{ $cvs->id }}"><strong>{{ $cvs->name_cv }}</strong></a>
                                            <div class="mt-2 py-2">
                                                <a href="#"
                                                    class="text-light text-decoration-none btn-edit bg-success p-1 rounded"
                                                    data-bs-toggle="modal" data-bs-target="#cvModal"
                                                    data-cv-id="{{ $cvs->id }}"><i
                                                        class="fa-solid fa-pencil px-1"></i></a>
                                                <a href="#"
                                                    class="text-light text-decoration-none btn-delete bg-danger p-1 rounded"
                                                    data-cv-id="{{ $cvs->id }}"><i
                                                        class="fa-solid fa-trash px-1"></i></a>
                                            </div>
                                        @endforeach
                                    @else
                                        <img class="img-fluid w-25" src="{{ asset('images/iconcv.png') }}" alt="#">
                                        <p>Bạn chưa tạo CV nào</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 ">
                        <div class="row bg-light rounded">
                            <div class="col">
                                <div class="ps-3 d-flex pt-2">
                                    <h2>CV đã tải trên Vieclamso1</h2>
                                    <a class="rounded-pill px-3 py-2 ms-auto text-decoration-none text-light btn-content"
                                        href="{{ url('uploadcv') }}"><i class="fa-solid fa-upload px-2"></i>Tải CV lên</a>
                                </div>
                                @if (Auth::user()->cv)
                                    <div class="text-center py-2">
                                        <a class="text-decoration-none" href="{{ asset('images/cv/' . Auth::user()->cv) }}"
                                            target="_blank">
                                            <p>{{ auth()->user()->cv }}</p>
                                        </a>
                                        <div class="mt-2">
                                            <a href="#"
                                                class="text-light text-decoration-none btn-edit bg-success p-1 rounded"
                                                data-bs-toggle="modal" data-bs-target="#editCVModal"><i
                                                    class="fa-solid fa-pencil px-1"></i></a>
                                            <a href="#"
                                                class="text-light text-decoration-none btn-delete bg-danger p-1 rounded"
                                                data-bs-toggle="modal" data-bs-target="#deleteCVModal"><i
                                                    class="fa-solid fa-trash px-1"></i></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <img class="img-fluid w-25" src="{{ asset('images/upload.png') }}" alt="#">
                                        <p>Bạn chưa tải lên CV nào</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="py-4 ">
                        <div class="row bg-light rounded">
                            <div class="col">
                                <div class="ps-3 d-flex pt-2">
                                    <h2>Vieclamso1 Profile</h2>
                                    <a class="rounded-pill px-3 py-2 ms-auto text-decoration-none text-light btn-content"
                                        href="#"><i class="fa-solid text-light px-2 fa-plus"></i>Tạo mới</a>
                                </div>
                                <div class="text-center">
                                    <img class="img-fluid w-25" src="{{ asset('images/verified.png') }}" alt="#">
                                    <p> Bạn chưa tạo Vieclamso1 Profile</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('jobsThatAreRightForYou', ['jobs' => $jobs])
                </div>
                @include('sidebar')
            </div>
        </div>
    </div>

    <!-- Modal edit cv tạo trên vieclamso1 -->
    <div class="modal fade" id="cvModal" tabindex="-1" aria-labelledby="cvModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content px-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="cvModalLabel">Thông tin CV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nội dung cv -->
                    <form id="cv-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="cv_id" id="cv_id">
                        <!-- Thông tin CV sẽ được hiển thị và chỉnh sửa tại đây -->
                        <div class="row bg-content rounded">
                            <!-- Tên CV -->
                            <div class="cv-section mb-4">
                                <div class="mb-3">
                                    <label for="name_cv" class="form-label">Tên CV</label>
                                    <input type="text" class="form-control @error('name_cv') is-invalid @enderror"
                                        id="name_cv" name="name_cv" placeholder="Tên CV">
                                    @error('name_cv')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Cột bên trái -->
                            <div class="col-md-3 bg-secondary text-white py-4 rounded">
                                <!-- Hiển thị hình ảnh CV -->
                                @if ($cv->isNotEmpty())
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('images/image_cv/' . $cvs->image_cv) }}" alt="CV Image"
                                            class="img-fluid rounded img-thumbnail" id="cvImage"
                                            style="cursor: pointer; width: 100%; height: auto;"
                                            onclick="document.getElementById('cvImageInput').click();">
                                        <input type="file" name="image_cv" id="cvImageInput" style="display: none;"
                                            accept="image/*" onchange="previewImage(event)">

                                        @error('image_cv')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @else
                                    <img src="{{ asset('images/profile-picture/user-default.jpg') }}" alt="CV Image"
                                        class="img-fluid rounded img-thumbnail" id="cvImage"
                                        style="cursor: pointer; width: 100%; height: auto;"
                                        onclick="document.getElementById('cvImageInput').click();">
                                    <input type="file" name="image_cv" id="cvImageInput" style="display: none;"
                                        accept="image/*" onchange="previewImage(event)">
                                @endif
                                <!-- Thông Tin Cá Nhân -->
                                <div class="cv-section mb-4">
                                    <h3 class="cv-section-title">Thông Tin Cá Nhân</h3>
                                    <div class="mb-3">
                                        <label for="full_name" class="form-label">Họ và tên</label>
                                        <input type="text"
                                            class="form-control @error('full_name') is-invalid @enderror" id="full_name"
                                            name="full_name" placeholder="Nguyễn Văn A">
                                        @error('full_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="nguyenvana@example.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Số điện thoại</label>
                                        <input type="text"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            id="phone_number" name="phone_number" placeholder="0123456789">
                                        @error('phone_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            id="address" name="address" placeholder="123 Đường ABC, TP. XYZ">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Vị trí ứng tuyển -->
                                <div class="cv-section mb-4">
                                    <h3 class="cv-section-title">Vị trí ứng tuyển</h3>
                                    <input type="text"
                                        class="form-control @error('position_applied') is-invalid @enderror"
                                        id="position_applied" name="position_applied" placeholder="Nhập vị trí">
                                    @error('position_applied')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kỹ năng -->
                                <div class="cv-section mb-4">
                                    <h3 class="cv-section-title">Kỹ năng</h3>
                                    <textarea class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" rows="3"
                                        placeholder="Nhập kỹ năng"></textarea>
                                    @error('skills')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Sở thích -->
                                <div class="cv-section mb-4">
                                    <h3 class="cv-section-title">Sở thích</h3>
                                    <textarea class="form-control @error('interests') is-invalid @enderror" id="interests" name="interests"
                                        rows="3" placeholder="Nhập sở thích"></textarea>
                                    @error('interests')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Người cố vấn -->
                                <div class="cv-section mb-4">
                                    <h3 class="cv-section-title">Người cố vấn</h3>
                                    <textarea class="form-control @error('referrals') is-invalid @enderror" id="referrals" name="referrals"
                                        rows="3" placeholder="Nhập người cố vấn"></textarea>
                                    @error('referrals')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Giải thưởng -->
                                <div class="cv-section mb-4">
                                    <h3 class="cv-section-title">Giải thưởng</h3>
                                    <textarea class="form-control @error('awards') is-invalid @enderror" id="awards" name="awards" rows="3"
                                        placeholder="Nhập giải thưởng"></textarea>
                                    @error('awards')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Hoạt động -->
                                <div class="cv-section mb-4">
                                    <h3 class="cv-section-title">Hoạt động</h3>
                                    <textarea class="form-control @error('activities') is-invalid @enderror" id="activities" name="activities"
                                        rows="3" placeholder="Nhập hoạt động"></textarea>
                                    @error('activities')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Chứng chỉ -->
                                <div class="cv-section mb-4">
                                    <h3 class="cv-section-title">Chứng chỉ</h3>
                                    <textarea class="form-control @error('certifications') is-invalid @enderror" id="certifications"
                                        name="certifications" rows="3" placeholder="Nhập chứng chỉ"></textarea>
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
                                        rows="4" placeholder="Nhập mục tiêu nghề nghiệp"></textarea>
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
                                            name="work_experience" rows="5" placeholder="Mô tả kinh nghiệm làm việc"></textarea>
                                        @error('work_experience')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Trình độ học vấn -->
                                <div class="cv-section mb-5">
                                    <h3 class="cv-section-title">Trình độ học vấn</h3>
                                    <textarea class="form-control @error('education') is-invalid @enderror" id="education" name="education"
                                        rows="4" placeholder="Nhập trình độ học vấn"></textarea>
                                    @error('education')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Dự án -->
                                <div class="cv-section mb-5">
                                    <h3 class="cv-section-title">Dự án</h3>
                                    <textarea class="form-control @error('projects') is-invalid @enderror" id="projects" name="projects"
                                        rows="4" placeholder="Nhập dự án"></textarea>
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
            </div>
        </div>
    </div>

    <!-- Modal Chỉnh sửa CV -->
    <div class="modal fade" id="editCVModal" tabindex="-1" aria-labelledby="editCVModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editCVForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCVModalLabel">Chỉnh sửa CV</h5>
                    </div>
                    <div class="modal-body">
                        <p>CV hiện tại: {{ Auth::user()->cv }}</p>
                        <label for="fileInputEdit" class="form-label">Chọn file mới (nếu cần)</label>
                        <input type="file" class="form-control" id="fileInputEdit" name="fileInputEdit">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" onclick="updateCV()" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Xóa CV -->
    <div class="modal fade" id="deleteCVModal" tabindex="-1" aria-labelledby="deleteCVModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCVModalLabel">Xóa CV</h5>
                </div>
                <div class="modal-body">
                    <h4><strong>Bạn có chắc chắn muốn xóa CV này?</strong></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                    <button type="button" onclick="deleteCV()" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    {{-- edit cv tạo trên vieclamso1 --}}
    <script>
        document.getElementById('cv-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('{{ route('cv.updates') }}', {
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
                            location.reload();
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

    {{-- js hiển thị thông tin trong modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cvModal = document.getElementById('cvModal');

            cvModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Element that triggered the modal
                const cvId = button.getAttribute('data-cv-id');

                // Fetch CV details based on cvId
                fetch(`/cv/${cvId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Populate the modal with CV data
                            const cv = data.cv;
                            document.getElementById('cv_id').value = cv.id;
                            document.getElementById('name_cv').value = cv.name_cv;
                            document.getElementById('full_name').value = cv.full_name;
                            document.getElementById('email').value = cv.email;
                            document.getElementById('phone_number').value = cv.phone_number;
                            document.getElementById('address').value = cv.address;
                            document.getElementById('position_applied').value = cv.position_applied;
                            document.getElementById('skills').value = cv.skills;
                            document.getElementById('interests').value = cv.interests;
                            document.getElementById('referrals').value = cv.referrals;
                            document.getElementById('awards').value = cv.awards;
                            document.getElementById('activities').value = cv.activities;
                            document.getElementById('certifications').value = cv.certifications;
                            document.getElementById('career_goals').value = cv.career_goals;
                            document.getElementById('work_experience').value = cv.work_experience;
                            document.getElementById('education').value = cv.education;
                            document.getElementById('projects').value = cv.projects;

                            // Set the CV image
                            const cvImage = document.getElementById('cvImage');
                            if (cv.image_cv) {
                                cvImage.src = `/images/image_cv/${cv.image_cv}`;
                            } else {
                                cvImage.src = '/images/profile-picture/user-default.jpg';
                            }
                        } else {
                            console.error('Lỗi khi tải thông tin CV:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Có lỗi xảy ra:', error);
                    });
            });
        });
    </script>

    {{-- js hiển thị ảnh từ file tải lên --}}
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

    {{-- js xóa cv --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const cvId = this.getAttribute('data-cv-id');
                    const url = `{{ url('/cv') }}/${cvId}`;

                    Swal.fire({
                        title: 'Bạn chắc chắn muốn xóa CV này?',
                        text: "Việc này không thể hoàn tác!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Có, xóa!',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(url, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            'content')
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.status === 'success') {
                                        Swal.fire('Đã xóa!', data.message, 'success');
                                        setTimeout(() => {
                                            location.reload();
                                        }, 1000);
                                    } else {
                                        Swal.fire('Lỗi!', data.message, 'error');
                                    }
                                });
                        }
                    });
                });
            });
        });
    </script>
    {{-- js hiển thị thông báo xóa cv --}}
    <script>
        function confirmDelete(cvId) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa CV này?',
                text: "Dữ liệu sẽ bị xóa vĩnh viễn!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/cv/delete/${cvId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire(
                                    'Đã xóa!',
                                    'CV của bạn đã được xóa.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Có lỗi!',
                                    'Đã xảy ra lỗi khi xóa CV.',
                                    'error'
                                );
                            }
                        });
                }
            });
        }
    </script>


    <script>
        // Hiển thị tên file khi chọn file trong modal chỉnh sửa
        document.getElementById('fileInputEdit').addEventListener('change', function(event) {
            var fileName = event.target.files[0].name;
            document.getElementById('fileNameEdit').innerText = 'Tên file: ' + fileName;
        });
    </script>

    <script>
        // Function to show SweetAlert2 success alert
        function showSuccessAlert(message) {
            Swal.fire({
                title: 'Thành công!',
                text: message,
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }

        // Function to show SweetAlert2 error alert
        function showErrorAlert(message) {
            Swal.fire({
                title: 'Lỗi!',
                text: message,
                icon: 'error',
                confirmButtonText: 'Đóng'
            });
        }

        // AJAX function for updating CV
        function updateCV() {
            $('#editCVModal').modal('hide'); // Hide the modal manually
            var formData = new FormData($('#editCVForm')[0]);

            $.ajax({
                url: '{{ route('cv.update') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        showSuccessAlert(response.message);
                        setTimeout(function() {
                            location.reload();
                        }, 2000); // Wait for 2 seconds before reloading
                    } else {
                        showErrorAlert(response.message);
                    }
                },
                error: function() {
                    showErrorAlert('Đã xảy ra lỗi khi cập nhật CV.');
                }
            });
        }


        // AJAX function for deleting CV
        function deleteCV() {
            $('#deleteCVModal').modal('hide'); // Hide the modal manually

            $.ajax({
                url: '{{ route('cv.destroy') }}',
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        showSuccessAlert(response.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        showErrorAlert(response.message);
                    }
                },
                error: function() {
                    showErrorAlert('Đã xảy ra lỗi khi xóa CV.');
                }
            });
        }
    </script>
@endsection
