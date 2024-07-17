@extends('home')

@section('content')
    <div class="bg-content banner">
        <div class="container ">
            <div class="row">
                <div class="col py-4">
                    <div class="rounded-top" style="background: #20a300;">
                        <div class="ps-3 py-3 text-light">
                            <h3> Upload CV để các cơ hội việc làm tự tìm đến bạn</h3>
                            <p>Giảm đến 50% thời gian cần thiết để tìm được một công việc phù hợp</p>
                        </div>
                    </div>
                    <div class="bg-light rounded-bottom py-3 px-3">
                        <p> Bạn đã có sẵn CV của mình, chỉ cần tải CV lên, hệ thống sẽ tự động đề xuất CV của bạn tới những
                            nhà tuyển dụng uy tín.
                            Tiết kiệm thời gian, tìm việc thông minh, nắm bắt cơ hội và làm chủ đường đua nghề nghiệp của
                            chính mình.</p>
                        <div class="text-center border border-secondary py-3 rounded">
                            <div class="d-flex justify-content-center">
                                <h3 class="px-3"><i class="fa-solid fa-cloud-arrow-up"></i></h3>
                                <p><strong>Tải lên từ máy tính, chọn hoặc kéo thả</strong></p>
                            </div>
                            <div id="fileName" class="py-2"></div>
                            <p class="none"> Hỗ trợ định dạng .doc, .docx, .pdf kích thước dưới 5MB</p>
                            <a id="chooseCvLink" class="p-2 text-decoration-none rounded text-dark bg-content"
                                href="javascript:void(0);"><strong>Chọn CV</strong></a>
                            <form method="POST" action="{{ route('cv.store') }}" enctype="multipart/form-data"
                                id="uploadForm" style="display: none;">
                                @csrf
                                <input type="file" id="fileInput" name="fileInput">
                            </form>
                        </div>
                        <div class="py-3 text-center">
                            <a id="submitCvLink" style="background: #20a300;"
                                class="text-decoration-none text-light py-2 px-3 rounded" href="javascript:void(0);">Tải CV
                                lên</a>
                        </div>
                        <div id="uploadError" class="alert alert-danger" style="display: none;"></div>
                        <hr>
                        <div>
                            <div class="row py-2">
                                <div class="col-12 col-md-6">
                                    <div class="border border-secondary py-2 px-2 rounded text-center">
                                        <h1 class="py-2"><i
                                                class="p-2 rounded-circle bg-success fa-regular fa-thumbs-up"></i></h1>
                                        <p><strong> Nhận về các cơ hội tốt nhất</strong></p>
                                        <p> CV của bạn sẽ được ưu tiên hiển thị với các nhà tuyển dụng đã xác
                                            thực. Nhận được lời mời với những cơ hội việc làm hấp dẫn từ các
                                            doanh nghiệp uy tín.</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="border border-secondary py-2 px-2 rounded text-center">
                                        <h1 class="py-2"><i
                                                class="p-2 rounded-circle bg-danger fa-solid fa-chart-line"></i></h1>
                                        <p><strong> Theo dõi số liệu, tối ưu CV</strong></p>
                                        <p> Theo dõi số lượt xem CV. Biết chính xác nhà tuyển dụng nào trên
                                            TopCV đang quan tâm đến CV của bạn.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-12 col-md-6">
                                    <div class="border border-secondary py-2 px-2 rounded text-center">
                                        <h1 class="py-2"><i
                                                class="p-2 rounded-circle bg-info fa-solid fa-paper-plane"></i></h1>
                                        <p><strong> Chia sẻ CV bất cứ nơi đâu</strong></p>
                                        <p>Upload một lần và sử dụng đường link gửi tới nhiều nhà tuyển dụng.</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="border border-secondary py-2 px-2 rounded text-center">
                                        <h1 class="py-2"><i class="p-2 rounded-circle bg-warning fa-solid fa-message"></i>
                                        </h1>
                                        <p><strong> Theo dõi số liệu, tối ưu CV</strong></p>
                                        <p> Theo dõi số lượt xem CV. Biết chính xác nhà tuyển dụng nào trên
                                            TopCV đang quan tâm đến CV của bạn.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="uploadSuccessModal" tabindex="-1" aria-labelledby="uploadSuccessModalLabel"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadSuccessModalLabel">Thông báo</h5>
                </div>
                <div class="modal-body text-center">
                    <h5><strong>CV của bạn đã được tải lên thành công.</strong></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="redirectToAccount()">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function redirectToAccount() {
            window.location.href = "{{ url('/account') }}";
        }

        document.getElementById('chooseCvLink').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function() {
            var fileInput = document.getElementById('fileInput');
            var fileName = document.getElementById('fileName');

            if (fileInput.files.length > 0) {
                fileName.innerHTML = 'Tệp đã chọn: ' + fileInput.files[0].name;
                document.querySelector('.none').style.display = 'none';
            } else {
                fileName.innerHTML = '';
            }
        });

        document.getElementById('submitCvLink').addEventListener('click', function(event) {
            event.preventDefault();

            var fileInput = document.getElementById('fileInput');
            var uploadForm = document.getElementById('uploadForm');
            var uploadError = document.getElementById('uploadError');

            uploadError.style.display = 'none'; 

            if (fileInput.files.length === 0) {
                uploadError.style.display = 'block';
                uploadError.innerHTML = 'Vui lòng chọn một file để tải lên.';
                return;
            }

            var allowedExtensions = /(\.doc|\.docx|\.pdf)$/i;
            if (!allowedExtensions.exec(fileInput.files[0].name)) {
                uploadError.style.display = 'block';
                uploadError.innerHTML =
                    'Định dạng file không hợp lệ. Chỉ chấp nhận file định dạng .doc, .docx, .pdf.';
                return;
            }

            var fileSize = fileInput.files[0].size;
            var maxSize = 5 * 1024 * 1024;
            if (fileSize > maxSize) {
                uploadError.style.display = 'block';
                uploadError.innerHTML = 'Kích thước file không được vượt quá 5MB.';
                return;
            }

            document.getElementById('submitCvLink').innerHTML =
                '<i class="fa-solid fa-spinner fa-spin"></i> Đang tải...';

            var formData = new FormData(uploadForm);

            // Gửi form bằng AJAX
            fetch('{{ route('cv.store') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Sau khi nhận được phản hồi từ máy chủ, thực hiện việc xử lý
                    if (data.success) {
                        // Chờ hiệu ứng loading kết thúc rồi mới hiển thị modal
                        setTimeout(function() {
                            document.getElementById('submitCvLink').innerHTML = 'Tải CV lên';
                            $('#uploadSuccessModal').modal('show');
                        }, 2000);
                    } else {
                        document.getElementById('submitCvLink').innerHTML = 'Tải CV lên';
                        uploadError.style.display = 'block';
                        uploadError.innerHTML = data.message || 'Đã xảy ra lỗi khi tải lên CV.';
                    }
                })
                .catch(error => {
                    document.getElementById('submitCvLink').innerHTML = 'Tải CV lên';
                    uploadError.style.display = 'block';
                    uploadError.innerHTML = 'Đã xảy ra lỗi khi tải lên CV.';
                });
        });
    </script>
@endsection
