@extends('home')
@section('content')
    <div class="bg-content banner">
        <div class="container ">
            <div class="row">
                <div class="col-12 col-md-8 py-4">
                    <div class="bg-light rounded py-5 ps-3">
                        <h3>Cài đặt thông tin cá nhân</h3>
                        <p>(*) Các thông tin bắt buộc</p>
                        <form class="me-3">
                            <div class="mb-3">
                                <label class="form-label">Họ và tên *</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Số điện thoại *</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Email *</label>
                                <input type="email" class="form-control" readonly>
                            </div>
                            <button style="background-color: rgb(46, 232, 0);" type="submit" class="btn text-light py-2 px-4">Lưu</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="rounded bg-light">
                        <div class="pt-3 d-flex">
                            <a class="py-3 w-25" href=""><img class="img-fluid"
                                    src="{{ asset('images/account.png') }}" alt="#"></a>
                            <div class="ps-4">
                                <p>Chào bạn trở lại,</p>
                                <h5>Nguyễn A</h5>
                                <p class="p-2 rounded content bg-content">Tài khoản đã xác thực</p>
                                <a class="p-2 rounded-pill content bg-content text-decoration-none text-dark"
                                    href=""><i class="px-1 fa-solid fa-arrow-up"></i> Nâng cấp tài khoản</a>
                            </div>
                        </div>
                        <div class="form-check form-switch ms-5 py-5">
                            <h3><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"></h3>
                            <label class="form-check-label" for="flexSwitchCheckDefault"><strong>Đang tắt tìm
                                    việc</strong></label>
                        </div>
                        <p class="ms-4 pb-4">Bật tìm việc giúp hồ sơ của bạn nổi bật hơn và được chú ý
                            nhiều hơn trong danh sách tìm kiếm của NTD.</p>
                        <div class="form-check form-switch ms-5 py-2">
                            <h3><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked></h3>
                            <label class="form-check-label" for="flexSwitchCheckChecked"><strong>Cho phép NTD xem hồ
                                    sơ</strong></label>
                        </div>
                        <p class="ms-4">Khi có cơ hội việc làm phù hợp, NTD sẽ liên hệ và trao
                            đổi với bạn qua:</p>
                        <div class="ps-3 d-flex">
                            <i class="fa-solid fa-circle-check color-bg px-4" aria-hidden="true"></i>
                            <p>Nhắn tin qua Top Connect trên Vieclamso1</p>
                        </div>
                        <div class="ps-3 d-flex">
                            <i class="fa-solid fa-circle-check color-bg px-4" aria-hidden="true"></i>
                            <p>Email và Số điện thoại của bạn</p>
                        </div>
                        <div class="text-center">
                            <img class="w-75" src="{{ asset('images/qrtaiapp.png') }}" alt="">
                        </div>
                        <hr class="py-3 mx-3">
                        <div class="ps-4 pb-3 d-flex">
                            <p><i class="fa-solid fa-circle-info px-1"></i></p>
                            <p> Khởi tạo Vieclamso1 Profile để gia tăng 300% cơ
                                hội việc làm tốt</p>
                        </div>
                        <div class="ps-4 pb-4">
                            <a class="p-2 rounded content border border-success text-decoration-none color-bg"
                                href="">Tạo Vieclamso1 CV online</a>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="rounded bg-light ps-4">
                            <div class="py-3 d-flex">
                                <p><strong>Ẩn hồ sơ với NTD</strong></p>
                                <div class="ps-3">
                                    <p class="p-1 rounded bg-danger text-light">Mới</p>
                                </div>
                            </div>
                            <p class="pb-2">Tôi không muốn CV của tôi hiển thị với danh sách các
                                NTD có tên miền email và thuộc các công ty dưới đây:</p>
                            <div class="py-2">
                                <p><strong>Các NTD với email có tên miền</strong></p>
                                <div class="p-2 rounded bg-content me-4 d-flex">
                                    <p class="pt-2"><i class="fa-solid fa-circle-info px-1"></i></p>
                                    <p> Ví dụ: Để ẩn hồ sơ của bạn với NTD có email
                                        admin@tenmiencongty.com, vui lòng nhập
                                        tenmiencongty.com.</p>
                                </div>
                                <div class="py-3 d-flex">
                                    <input type="email" name="email" placeholder="Nhập tên miền email">
                                    <p class="ps-5"></p>
                                    <a class="text-decoration-none text-dark bg-content rounded py-1 px-3"
                                        href="">Thêm</a>
                                </div>
                                <hr class="py-3 me-4">
                                <div class="pb-3 me-4">
                                    <p><strong>Các NTD thuộc công ty</strong></p>
                                    <input class="w-100" type="text" placeholder="Nhập tên công ty">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <div class="rounded bg-light ps-4">
                            <div class="py-3">
                                <p><strong> CV của bạn đã đủ tốt?</strong></p>
                                <p>Bao nhiêu NTD đang quan tâm tới Hồ sơ của bạn?</p>
                            </div>
                            <div class="d-flex pb-5">
                                <div class="pe-3 text-center">
                                    <h3 class="p-4 rounded-circle bg-content text-light">0 <br> lượt</h3>
                                </div>
                                <div>
                                    <p>Mỗi lượt Nhà tuyển dụng xem CV mang
                                        đến một cơ hội để bạn gần hơn với công
                                        việc phù hợp.</p>
                                    <a class="py-1 px-3 rounded content border border-success text-decoration-none color-bg"
                                        href="">Khám phá ngay</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('uploadLink').addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
            document.getElementById('hiddenFileInput').click();
        });
    </script>
@endsection
