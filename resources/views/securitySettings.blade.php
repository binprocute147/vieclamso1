@extends('home')
<style>
    .bg-job {
        background: #edffe8;
    }

    .form-check-input:checked {
        background-color: rgb(46, 232, 0) !important;
        border-color: rgb(46, 232, 0) !important;
    }
</style>
</style>
@section('content')
    <div class="bg-content banner">
        <div class="container ">
            <div class="row">
                <div class="col-12 col-md-8 py-4">
                    <div class="row bg-light rounded px-3">
                        <h3 class="py-3">Thay đổi cài đặt bảo mật</h3>
                        <div class="py-2">
                            <div class="border border-secondary-subtle rounded py-2 px-3">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-3" type="checkbox" id="checkbox1" style="transform: scale(1.2);" checked>
                                    <label for="checkbox1" class="mb-0"><strong>Nhận cơ hội việc làm tốt hơn từ Vieclamso1</strong></label>
                                </div>
                                <p class="px-4">Nhận cơ hội việc làm với mức lương cao hơn 20 - 50% lương hiện tại. Mỗi khi có công việc phù hợp, Vieclamso1 sẽ gửi thông báo tới bạn qua email hoặc điện thoại.</p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div class="border border-secondary-subtle rounded py-2 px-3">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-3" type="checkbox" id="checkbox2" style="transform: scale(1.2);" checked>
                                    <label for="checkbox2" class="mb-0"><strong>Cho phép Vieclamso1 hỗ trợ sửa và đánh giá CV</strong></label>
                                </div>
                                <p class="px-4">Vieclamso1 giúp bạn cải thiện chất lượng CV.</p>
                            </div>
                        </div>
                        <div class="py-4">
                            <a class="rounded py-2 px-5 bg-success text-decoration-none text-light" href="">Lưu</a>
                        </div>
                        <div class="pt-3 pb-5">
                            Tìm hiểu thêm về <a class="px-1 text-decoration-none color-bg" href="">Chính sách bảo mật</a> và <a class="px-1 text-decoration-none color-bg" href="">Điều khoản dịch vụ</a>  của Vieclamso1 (đã được cập nhật theo các quy định mới nhất của Nghị định 13/2023/NĐ-CP về Bảo vệ dữ liệu cá nhân)
                        </div>
                    </div>
                    <div class="py-3">
                        <p>Vieclamso1 luôn tôn trọng quyền riêng tư và dữ liệu cá nhân của tất cả người dùng theo các quy định của pháp luật Việt Nam. Nếu bạn muốn xem danh sách những NTD đã từng có tương tác với hồ sơ của mình <strong>(bao gồm Tên Công ty và thời gian NTD tương tác với hồ sơ của bạn)</strong> hãy cho chúng tôi biết tại đây.</p>
                        <i class="text-body-tertiary">Trong trường hợp bạn không muốn sử dụng các chức năng của TopCV trong một khoảng thời gian, bạn có thể gửi yêu cầu để TopCV hỗ trợ Vô hiệu hoá tài khoản của bạn tại đây.</i>
                    </div>
                </div>
                @include('sidebar')
            </div>
        </div>
    </div>
@endsection
