<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <!-- JavaScript for SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Việc làm số 1</title>
    <style>
        .bg-nav {
            background: #ffffff !important;
        }

        a.nav-link:hover {
            color: rgb(46 232 0);
        }

        .login-btn {
            background-color: rgb(46, 232, 0);
            color: black;
            font-weight: bold;
        }

        .login-btn:hover {
            background-color: gray;
        }

        .icon-flag {
            padding-left: 100px !important;
        }

        .color-bg {
            color: rgb(46 232 0) !important;
        }

        .banner {
            padding-top: 117px;

        }

        .bg-banner {
            background: #177500;
        }

        .bg-banner1 {
            background: #0e4900;
        }

        .chart-container {
            width: 72px;
            height: 200px;
            text-align: center;
        }

        .chart-label {
            color: white;
            margin-top: 10px;
            font-size: 14px;
        }

        .chart-color-box {
            width: 15px;
            height: 15px;
            display: inline-block;
            margin-right: 5px;
        }

        .bg-content {
            background: #ececec;
        }

        .angle-left:hover {
            background: rgb(46 232 0) !important;
            color: white !important;
        }

        .btn-content {
            background: rgb(46 232 0);
        }

        .bg-footer1 {
            background: #156801 !important;
        }

        .bg-footer2 {
            background: #ff8a00 !important;
        }

        .bg-footer3 {
            background: #005975 !important;
        }

        /* Additional CSS for centering menu items on mobile */
        @media (max-width: 991px) {
            .navbar-nav {
                justify-content: center !important;
            }

            .navbar-collapse {
                text-align: center;
            }

            .icon-flag {
                padding-left: 0 !important;
            }
        }
    </style>
</head>

<body>
    {{-- header --}}
    <header>
        <nav id="navbar" class="navbar navbar-expand-lg pt-3 border-bottom bg-nav fixed-top ">
            <div class="container-fluid">
                <a class="navbar-brand img-fluid" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold justify-content-center w-100">
                        <li class="nav-item ps-3">
                            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Việc làm</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="#">Hồ sơ & CV</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="#">Công ty</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="#">Công cụ</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="#">Cẩm nang tuyển dụng</a>
                        </li>
                        <ul class="navbar-nav icon-flag text-center">
                            <li class="nav-item">
                                <a class="nav-link login-btn btn" href="{{ url('/dangtuyen') }}">
                                    Đăng tuyển ngay
                                </a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="#">
                                    <h4><i class="color-bg fa-regular fa-bell"></i></h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <h4><i class="color-bg fa-brands fa-facebook-messenger"></i></h4>
                                </a>
                            </li>
                            @guest
                                <li class="nav-item ps-2">
                                    <a class="nav-link login-btn btn" href="{{ url('/login') }}">Đăng nhập</a>
                                </li>
                            @else
                                <!-- User dropdown -->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle login-btn btn" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (auth()->user()->profile_picture)
                                            <img width="30px" class="rounded-pill"
                                                src="{{ asset('images/profile-picture/' . auth()->user()->profile_picture) }}"
                                                alt="user-avatar">
                                        @else
                                            <img width="30px" class="rounded-pill"
                                                src="{{ asset('images/profile-picture/user-default.jpg') }}"
                                                alt="user-default">
                                        @endif
                                        {{ auth()->user()->fullname ?? auth()->user()->email }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ url('account') }}"><i
                                                    class="px-1 fa-solid fa-user"></i>Cài đặt tài khoản</a></li>
                                        <li><a class="dropdown-item" href="{{ url('profileUser') }}"><i
                                                    class="px-1 fa-solid fa-circle-info"></i>Thông tin tài khoản</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                                    class="px-1 fa-solid fa-right-from-bracket"></i>Đăng xuất</a></li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- end header --}}

    @yield('content')
    <div class="bg-content py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>cv là gì
                        Mẫu CV
                        mẫu cv tiếng việt
                        Sơ yếu lý lịch
                        CV tham khảo
                        tổng hợp CV tham khảo cho lập trình viên
                        giấy tờ thủ tục hồ sơ xin việc
                        Email xin việc bằng tiếng anh
                        Mẫu đơn xin việc
                        mẫu đơn xin nghỉ việc
                        Cách viết đơn xin nghỉ phép
                        Cách viết CV xin việc
                        cách viết CV Ngành Kinh doanh/Bán hàng
                        cách viết CV Ngành Kế Toán/Kiểm Toán
                        cách viết CV Ngành Nhân Sự
                        cách viết CV xin Học bổng
                        cách viết CV Tiếng Anh
                        cách viết CV Tiếng Nhật
                        cách viết CV Tiếng Trung
                        cách viết CV Tiếng Hàn
                        cẩm nang năm nhất cho sinh viên
                        Mẫu đơn xin thực tập
                        Hướng dẫn sửa lỗi gõ tiếng Việt
                        Ngành du lịch làm việc gì
                        Cẩm nang xin việc ngành nhân sự
                        Xin việc ngành công nghệ thông tin
                        Cẩm nang xin việc ngành marketing
                        Cẩm nang xin việc ngành kế toán kiểm toán
                        Cẩm nang xin việc ngành công nghệ thực phẩm
                        Cẩm nang xin việc ngành tài chính ngân hàng
                        Cẩm nang xin việc ngành luật
                        Cẩm nang xin việc ngành xây dựng - địa ốc
                        Trắc nghiệm tính cách MBTI
                        Việc làm online tại nhà
                        Tìm việc làm tại TP. HCM
                        Cách viết cover letter xin việc
                        CV xin việc bằng tiếng Anh
                        CV cho sinh viên chưa tốt nghiệp
                        Việc làm hành chính nhân sự
                        Thư xin việc bằng tiếng Anh
                        Ngành logistic là gì
                        Việc làm Hải Phòng
                        Việc làm Bình Định
                        Tuyển dụng Content Marketing
                        Tuyển lập trình viên PHP
                        Tuyển lập trình viên Java
                        Tuyển lập trình viên .Net
                        Tuyển dụng nhân viên kinh doanh
                        Tuyển dụng nhân viên marketing
                        Tìm việc kế toán</p>
                </div>
            </div>
        </div>
    </div>
    {{-- footer --}}
    <footer>
        <div class="container pt-4">
            <div class="row border-bottom">
                <div class="col-12 col-md-3">
                    <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="#">
                    <div class="d-flex py-3">
                        <img class="img-fluid" src="{{ asset('images/googleforstarups.png') }}" alt="#">
                        <img class="img-fluid px-2" src="{{ asset('images/dmca.png') }}" alt="#">
                        <img class="img-fluid" src="{{ asset('images/bocongthuong.png') }}" alt="#">
                    </div>
                    <p class="pt-2">Ứng dụng tải xuống</p>
                    <div class="d-flex py-3">
                        <img class="img-fluid" src="{{ asset('images/appstore.png') }}" alt="#">
                        <img class="img-fluid px-2" src="{{ asset('images/chplay.png') }}" alt="#">
                    </div>
                </div>
                <div class="col-12 col-md-3 ps-5">
                    <h4>Về Vieclamso1</h4>
                    <p class="pt-5"><a href="#" class="text-decoration-none text-dark">Giới thiệu</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Tuyển dụng</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Liên hệ</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Góc báo chí</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Chính sách bảo mật</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Điều khoản dịch vụ</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Quy chế hoạt động</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Chương trình Rewards</a></p>
                </div>
                <div class="col-12 col-md-3">
                    <h4>Ứng viên</h4>
                    <p class="pt-5"><a href="#" class="text-decoration-none text-dark">Tìm việc làm</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Khoá học</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Trắc nghiệm MBTI</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Hướng dẫn viết CV</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Tư vấn sửa CV</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Thiết kế CV</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Dịch CV</a></p>
                </div>
                <div class="col-12 col-md-3">
                    <h4>Về Vieclamso1</h4>
                    <p class="pt-5"><a href="#" class="text-decoration-none text-dark">Đối tác</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Doanh nghiệp</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Trường đại học</a></p>
                    <p><a href="#" class="text-decoration-none text-dark">Các CLB, đoàn thể</a></p>
                    <div class="pt-5 d-flex">
                        <a href="#">
                            <h3 class="text-dark"><i class="fa-brands fa-facebook"></i></h3>
                        </a>
                        <a href="#">
                            <h3 class="text-dark px-2"><i class="fa-brands fa-twitter"></i></h3>
                        </a>
                        <a href="#">
                            <h3 class="text-dark px-2"><i class="fa-brands fa-linkedin"></i></h3>
                        </a>
                        <a href="#">
                            <h3 class="text-dark px-2"><i class="fa-brands fa-youtube"></i></h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 pt-4">
                    <h4>Công ty Cổ phần Việc làm số 1 Việt Nam</h4>
                    <div class="d-flex">
                        <p><i class="fa-solid fa-calculator color-bg pe-2"></i> Giấy phép đăng ký kinh doanh số:
                            0107307178</p>
                    </div>
                    <div class="d-flex">
                        <p><i class="fa-solid fa-file color-bg pe-2"></i> Giấy phép hoạt động dịch vụ việc làm số:
                            <strong>18/SLĐTBXH GP</strong>
                        </p>
                    </div>
                    <div class="d-flex">
                        <p><i class="fa-solid fa-location-dot color-bg pe-2"></i>Trụ sở HN: Tòa FS GoldSeason số 47
                            Nguyễn Tuân, P.Thanh Xuân Trung, Q.Thanh Xuân, Hà Nội</p>
                    </div>
                    <div class="d-flex">
                        <p><i class="fa-solid fa-location-dot color-bg pe-2"></i> Chi nhánh HCM: Tòa nhà Dali, 24C Phan
                            Đăng Lưu, P.6, Q.Bình Thạnh, TP HCM</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <img class="img-fluid pt-5" src="{{ asset('images/qr.png') }}" alt="#">
                    <p class=" pt-2"><a class="text-decoration-none color-bg" href="#">vieclamso1.vn</a></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h6 class="pb-3">Hệ sinh thái HR Tech của Vieclamso1</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class=" rounded bg-footer1 text-center">
                        <div class="px-3 d-flex">
                            <img src="{{ asset('images/vieclamso1icon.png') }}" alt="">
                            <p class="text-white pt-3 ps-3">Nền tảng công nghệ tuyển
                                dụng thông minh Vieclamso1</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class=" rounded bg-footer2 text-center">
                        <div class="px-3 d-flex">
                            <img src="{{ asset('images/logofooter1.png') }}" alt="">
                            <p class="text-white pt-3 ps-3">Nền tảng quản lý và gia tăng
                                trải nghiệm nhân viên
                                HappyTime.vn</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class=" rounded bg-footer3 text-center">
                        <div class="px-3 d-flex">
                            <img src="{{ asset('images/logofooter2.png') }}" alt="">
                            <p class="text-white pt-3 ps-3">Nền tảng thiết lập và đánh giá
                                năng lực nhân viên TestCenter.vn</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class=" rounded bg-footer1 text-center">
                        <div class="px-3 d-flex">
                            <img src="{{ asset('images/logofooter3.png') }}" alt="">
                            <p class="text-white pt-3 ps-3">Giải pháp quản trị tuyển
                                dụng hiệu suất cao
                                SHiring.ai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col pt-3 pb-2 text-center">
                    <strong>&copy; 2014 2024 Vieclamso1 Vietnam JSC. All rights reserved.</strong>
                </div>
            </div>
        </div>
    </footer>
    {{-- endfooter --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
