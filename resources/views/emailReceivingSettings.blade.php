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
@section('content')
    <div class="bg-content banner">
        <div class="container ">
            <div class="row">
                <div class="col-12 col-md-8 py-4">
                    <div class="row bg-light rounded px-3">
                        <h3 class="py-3">Cài đặt thông báo qua email</h3>
                        <h5>Thông báo từ hệ thống</h5>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Cập nhật quan trọng từ hệ thống</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Thông báo nhà tuyển dụng đã xem CV</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Thông báo tính năng và mẫu CV mới từ TopCV</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Thông báo khác từ hệ thống</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="px-4">
                            <hr class="py-2">
                        </div>

                        <h5>Thông báo cơ hội việc làm</h5>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Thông báo việc làm theo thiết lập (Xem danh sách thiết lập)</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Thông báo việc làm phù hợp từ Vieclamso1</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Thông báo việc làm bạn là ứng viên hàng đầu</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Thông báo nhà tuyển dụng gửi mời lời phỏng vấn / ứng tuyển</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="px-4">
                            <hr class="py-2">
                        </div>

                        <h5>Thông báo giới thiệu dịch vụ</h5>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Giới thiệu các dịch vụ</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-between py-2 form-switch">
                            <p class="mb-0">Giới thiệu chương trình, sự kiện</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-between pt-2 pb-4 form-switch">
                            <p class="mb-0">Quà tặng / Mã giảm giá từ các đối tác của Vieclamso1</p>
                            <h5 class="ms-auto mb-0 ">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </h5>
                        </div>
                    </div>
                </div>
                @include('sidebar')
            </div>
        </div>
    </div>
@endsection
