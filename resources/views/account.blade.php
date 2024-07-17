@extends('home')
<style>
    .bg-job {
        background: #edffe8;
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
                                        href="#"><i class="fa-solid text-light px-2 fa-plus"></i>Tạo
                                        mới</a>
                                </div>
                                <div class="text-center">
                                    <img class="img-fluid w-25" src="{{ asset('images/iconcv.png') }}" alt="#">
                                    <p>Bạn chưa tạo CV nào</p>
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
                    <div class="py-4">
                        <div class="row bg-light rounded">
                            <div class="col">
                                <div class="ps-3 py-2">
                                    <h2>Việc làm phù hợp với bạn</h2>
                                    <div class="d-flex">
                                        <p> Để nhận được gợi ý việc làm chính xác hơn, hãy</p>
                                        <p class="ps-1 color-bg"> tùy chỉnh cài đặt gợi ý việc làm</p>.
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div id="jobList">
                                        @if (isset($jobs) && $jobs->count() > 0)
                                            @foreach ($jobs as $job)
                                                <div class="bg-job rounded mb-3">
                                                    <div class="row">
                                                        <div class="col col-md-2">
                                                            <img class="img-fluid py-2"
                                                                src="{{ asset('images/logocongty.png') }}" alt="#">
                                                        </div>
                                                        <div class="col-12 col-md-10 ps-3">
                                                            <div class="d-flex">
                                                                <h6 class="pt-3"><strong>{{ $job->name_job }}</strong>
                                                                </h6>
                                                                <p class="p-1 rounded ms-auto color-bg">
                                                                    {{ $job->min_salary }} -
                                                                    {{ $job->max_salary }} đ</p>
                                                            </div>
                                                            <p><strong>{{ $job->company_name }}</strong></p>
                                                            <div class="d-flex">
                                                                <p class="p-2 rounded content bg-content">
                                                                    {{ $job->location }}
                                                                </p>
                                                                <p class="ps-3"></p>
                                                                <p class="p-2 rounded content bg-content">Còn
                                                                    <strong>10</strong> ngày để ứng tuyển
                                                                </p>
                                                            </div>
                                                            <div class="d-flex">
                                                                <p class="p-2 content bg-content rounded">Cập nhật
                                                                    {{ $job->updated_at->diffForHumans() }}</p>
                                                                <div class="ms-auto">
                                                                    <a class="text-decoration-none text-light py-2 px-4 rounded btn-content"
                                                                        href="#">Ứng tuyển</a>
                                                                </div>
                                                                <div class="ms-3">
                                                                    <a class="bg-content p-1 rounded" href=""><i
                                                                            class="fa-regular fa-heart"></i></a>
                                                                </div>
                                                                <div class="mx-3">
                                                                    <a class="text-decoration-none text-light p-1 rounded bg-content"
                                                                        href="#"><i
                                                                            class="text-dark fa-solid fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-center">Không có công việc nào để hiển thị.</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="pt-4 pb-5 text-center">
                                    <a id="loadMoreJobs"
                                        class="text-decoration-none text-light rounded px-4 py-3 btn-content"
                                        href="#">Xem tất cả việc làm phù hợp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('sidebar')
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

    {{-- js hiển thị tất cả các job bằng ajax --}}
    <script>
        $(document).ready(function() {
            $('#loadMoreJobs').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('showJob') }}',
                    method: 'GET',
                    data: {
                        all: true
                    },
                    success: function(response) {
                        let jobsHtml = '';
                        response.forEach(function(job) {
                            jobsHtml += `
                            <div class="bg-job rounded mb-3">
                                <div class="row">
                                    <div class="col col-md-2">
                                        <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}" alt="#">
                                    </div>
                                    <div class="col-12 col-md-10 ps-3">
                                        <div class="d-flex">
                                            <h6 class="pt-3"><strong>${job.name_job}</strong></h6>
                                            <p class="p-1 rounded ms-auto color-bg">${job.min_salary} - ${job.max_salary} đ</p>
                                        </div>
                                        <p><strong>${job.company_name}</strong></p>
                                        <div class="d-flex">
                                            <p class="p-2 rounded content bg-content">${job.location}</p>
                                            <p class="ps-3"></p>
                                            <p class="p-2 rounded content bg-content">Còn <strong>10</strong> ngày để ứng tuyển</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="p-2 content bg-content rounded">Cập nhật ${job.updated_at}</p>
                                            <div class="ms-auto">
                                                <a class="text-decoration-none text-light py-2 px-4 rounded btn-content" href="#">Ứng tuyển</a>
                                            </div>
                                            <div class="ms-3">
                                                <a class="bg-content p-1 rounded" href=""><i class="fa-regular fa-heart"></i></a>
                                            </div>
                                            <div class="mx-3">
                                                <a class="text-decoration-none text-light p-1 rounded bg-content" href="#"><i class="text-dark fa-solid fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        });
                        $('#jobList').html(jobsHtml);
                    }
                });
            });
        });
    </script>

@endsection
