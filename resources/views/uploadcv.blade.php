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
                            <p> Hỗ trợ định dạng .doc, .docx, .pdf kích thước dưới 5MB</p>
                            <a id="chooseCvLink" class="p-2 text-decoration-none rounded text-dark bg-content"
                                href="javascript:void(0);"><strong>Chọn CV</strong></a>
                            <input type="file" id="fileInput" name="fileInput" accept=".doc,.docx,.pdf" style="display: none">
                        </div>
                        <div class="py-3 text-center">
                            <a style="background: #20a300;" class="text-decoration-none text-light py-2 px-3 rounded" href="">Tải CV lên</a>
                        </div>  
                        <hr>
                        <div>
                            <div class="row py-2">
                                <div class="col-12 col-md-6">
                                    <div class="border border-secondary py-2 px-2 rounded text-center">
                                        <h1 class="py-2"><i class="p-2 rounded-circle bg-success fa-regular fa-thumbs-up"></i></h1>
                                        <p><strong> Nhận về các cơ hội tốt nhất</strong></p>
                                        <p> CV của bạn sẽ được ưu tiên hiển thị với các nhà tuyển dụng đã xác 
                                            thực. Nhận được lời mời với những cơ hội việc làm hấp dẫn từ các 
                                            doanh nghiệp uy tín.</p>
                                    </div>  
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="border border-secondary py-2 px-2 rounded text-center">
                                        <h1 class="py-2"><i class="p-2 rounded-circle bg-danger fa-solid fa-chart-line"></i></h1>
                                        <p><strong>  Theo dõi số liệu, tối ưu CV</strong></p>
                                        <p>  Theo dõi số lượt xem CV. Biết chính xác nhà tuyển dụng nào trên 
                                            TopCV đang quan tâm đến CV của bạn.</p>
                                    </div>  
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-12 col-md-6">
                                    <div class="border border-secondary py-2 px-2 rounded text-center">
                                        <h1 class="py-2"><i class="p-2 rounded-circle bg-info fa-solid fa-paper-plane"></i></h1>
                                        <p><strong> Chia sẻ CV bất cứ nơi đâu</strong></p>
                                        <p>Upload một lần và sử dụng đường link gửi tới nhiều nhà tuyển dụng.</p>
                                    </div>  
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="border border-secondary py-2 px-2 rounded text-center">
                                        <h1 class="py-2"><i class="p-2 rounded-circle bg-warning fa-solid fa-message"></i></h1>
                                        <p><strong>  Theo dõi số liệu, tối ưu CV</strong></p>
                                        <p>  Theo dõi số lượt xem CV. Biết chính xác nhà tuyển dụng nào trên 
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
    <script>
        document.getElementById('chooseCvLink').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });
    </script>
@endsection
