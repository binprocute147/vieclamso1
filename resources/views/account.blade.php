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
                                        href="{{ url('templatesCv') }}"><i class="fa-solid text-light px-2 fa-plus"></i>Tạo
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
                    @include('jobsThatAreRightForYou' , ['jobs' => $jobs])
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
@endsection
