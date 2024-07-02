<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        .btn-content{
            background:  rgb(46 232 0);
        }
        .bg-footer1{
            background: #156801 !important;
        }
        .bg-footer2{
            background: #ff8a00 !important;
        }
        .bg-footer3{
            background: #005975 !important;
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
                        <li class="nav-item ps-5">
                            <a class="nav-link" aria-current="page" href="#">Việc làm</a>
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
                            <li class="nav-item ps-5">
                                <a class="nav-link login-btn btn" href="{{ url('/dangtuyen') }}">
                                    Đăng tuyển ngay
                                </a>
                            </li>
                            <li class="nav-item ps-2">
                                <a class="nav-link" href="#">
                                    <h4><i class="color-bg fa-regular fa-bell"></i></h4>
                                </a>
                            </li>
                            <li class="nav-item ps-2">
                                <a class="nav-link" href="#">
                                    <h4><i class="color-bg fa-brands fa-facebook-messenger"></i></h4>
                                </a>
                            </li>
                            <li class="nav-item ps-2">
                                <a class="nav-link login-btn btn" href="#">Đăng nhập</a>
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- end header --}}

    {{-- banner --}}
    <div class="banner">
        <div class="bg-banner">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 text-center text-light pt-5">
                        <h4>Công nghệ AI dự đoán, cá nhân hoá việc làm</h4>
                        <h3 class="py-2">Việc làm mới dành cho bạn.</h3>
                        <form class="d-flex bg-white py-2 rounded text-dark text-center w-100" role="search">
                            <input class="w-50 border-0" type="search" placeholder="Vị trí ứng tuyển">
                            <a class="nav-link dropdown-toggle w-25" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tất cả địa điểm
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Hà Nội</a></li>
                                <li><a class="dropdown-item" href="#">Sài Gòn</a></li>

                            </ul>
                            <button class="btn login-btn ps-1 w-25" type="submit">Tìm kiếm</button>
                        </form>
                        <img class="img-fluid py-5 -bottom-3 rounded" src="{{ asset('images/banner-index.png') }}"
                            alt="#">
                    </div>
                    <div class="col-12 col-md-6 pt-5">
                        <div class="rounded bg-banner1 py-5 w-100">
                            <div class="d-flex">
                                <p class="text-light"><i class="color-bg px-2 fa-brands fa-searchengin "></i>Thị trường
                                    việc làm hôm nay:</p>
                                <p class="color-bg ms-auto pe-2">09/05/2024</p>
                            </div>
                            <div class="d-flex">
                                <p class="text-light px-2">Việc làm đang tuyển</p>
                                <p class="color-bg pe-2">44.680</p>
                                <p class="text-light ms-auto">Việc làm mới hôm nay</p>
                                <p class="color-bg px-4">3.015</p>
                            </div>
                            <div class="d-flex">
                                <p class="text-light"><i class="px-2 color-bg fa-solid fa-chart-simple"></i>Nhu cầu
                                    tuyển dụng theo</p>
                                <a class="nav-link dropdown-toggle w-25 ms-auto pe-2 text-light" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ngành nghề
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Marketing</a></li>
                                    <li><a class="dropdown-item" href="#">IT</a></li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="chart-container">
                                    <canvas id="chartMarketing"></canvas>
                                    <div class="chart-label"><span class="chart-color-box"
                                            style="background-color: #FF6384;"></span>Marketing</div>
                                </div>
                                <div class="chart-container">
                                    <canvas id="chartIT"></canvas>
                                    <div class="chart-label"><span class="chart-color-box"
                                            style="background-color: #36A2EB;"></span>IT</div>
                                </div>
                                <div class="chart-container">
                                    <canvas id="chartFinance"></canvas>
                                    <div class="chart-label"><span class="chart-color-box"
                                            style="background-color: #FFCE56;"></span>Finance</div>
                                </div>
                                <div class="chart-container">
                                    <canvas id="chartHR"></canvas>
                                    <div class="chart-label"><span class="chart-color-box"
                                            style="background-color: #4BC0C0;"></span>HR</div>
                                </div>
                                <div class="chart-container">
                                    <canvas id="chartSales"></canvas>
                                    <div class="chart-label"><span class="chart-color-box"
                                            style="background-color: #9966FF;"></span>Sales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- endbanner --}}
    <div class="content">
        <div class="bg-content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="d-flex">
                            <h1 class="color-bg py-5">Việc làm tốt nhất</h1>
                            <img class="img-fluid px-5" src="{{ asset('images/toppyai.png') }}" alt="#">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="dropdown d-flex pb-3">
                            <p class="pt-2 pe-2">Lọc theo: </p><button class="btn btn-light dropdown-toggle"
                                type="button" data-toggle="dropdown">Địa điểm
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Mức lương</a></li>
                                <li><a href="#">Kinh nghiệm</a></li>
                                <li><a href="#">Ngành nghề</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="d-flex">
                            <h4 class="pe-2"><a class="color-bg rounded-circle border border-2 px-2 angle-left"
                                    href="#"><i class="fa-solid fa-angle-left"></i></a></h4>
                            <a class="rounded-pill border border-2 px-2 angle-left text-decoration-none text-dark"
                                href="#">
                                <p>Hà Nội</p>
                            </a>
                            <a class="rounded-pill border border-2 px-2 angle-left text-decoration-none text-dark"
                                href="#">
                                <p>Ba Đình</p>
                            </a>
                            <a class="rounded-pill border border-2 px-2 angle-left text-decoration-none text-dark"
                                href="#">
                                <p>Hoàn Kiếm</p>
                            </a>
                            <a class="rounded-pill border border-2 px-2 angle-left text-decoration-none text-dark"
                                href="#">
                                <p>Hai Bà Trưng</p>
                            </a>
                            <a class="rounded-pill border border-2 px-2 angle-left text-decoration-none text-dark"
                                href="#">
                                <p>Đống Đa</p>
                            </a>
                            <h4 class="ps-2"><a class="color-bg rounded-circle border border-2 px-2 angle-left"
                                    href="#"><i class="fa-solid fa-angle-right"></i></a></h4>
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-light rounded py-2">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                        alt="#">
                                </div>
                                <div class="col-12 col-md-8 ps-3">
                                    <h6 class="pt-3"><strong>Nhân Viên Thiết Kế Đồ Họa</strong></h6>
                                    <p> CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ</p>
                                    <div class="d-flex">
                                        <p class="p-1 rounded content">14 - 20 Triệu</p>
                                        <p class="px-2"></p>
                                        <p class="p-1 rounded content">Hà Nội</p>
                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col py-4">
                        <div class="d-flex justify-content-center">
                            <h4 class="pe-2"><a class="color-bg rounded-circle border border-2 px-2 angle-left"
                                    href="#"><i class="fa-solid fa-angle-left"></i></a></h4>
                            <p>1/33 trang</p>
                            <h4 class="ps-2"><a class="color-bg rounded-circle border border-2 px-2 angle-left"
                                    href="#"><i class="fa-solid fa-angle-right"></i></a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <div class="d-flex">
                        <h1 class="color-bg py-2">Top Công ty hàng đầu</h1>
                        <div class="ms-auto d-flex">
                            <h4 class="py-3 px-2"><a class="color-bg rounded-circle border border-2 px-2 angle-left"
                                    href="#"><i class="fa-solid fa-angle-left"></i></a></h4>
                            <h4 class="py-3"><a class="color-bg rounded-circle border border-2 px-2 angle-left"
                                    href="#"><i class="fa-solid fa-angle-right"></i></a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2">
                        <img class="img-fluid" src="{{ asset('images/logofpt.jpg') }}" alt="">
                        <h4><strong>FPT SOFTWARE</strong></h4>
                    </div>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2">
                        <img class="img-fluid" src="{{ asset('images/logofpt.jpg') }}" alt="">
                        <h4><strong>FPT SOFTWARE</strong></h4>
                    </div>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2">
                        <img class="img-fluid" src="{{ asset('images/logofpt.jpg') }}" alt="">
                        <h4><strong>FPT SOFTWARE</strong></h4>
                    </div>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2">
                        <img class="img-fluid" src="{{ asset('images/logofpt.jpg') }}" alt="">
                        <h4><strong>FPT SOFTWARE</strong></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex">
                        <h1 class="color-bg py-2">Top ngành nghề nổi bật</h1>
                        <div class="ms-auto d-flex">
                            <h4 class="py-3 px-2"><a class="color-bg rounded-circle border border-2 px-2 angle-left"
                                    href="#"><i class="fa-solid fa-angle-left"></i></a></h4>
                            <h4 class="py-3"><a class="color-bg rounded-circle border border-2 px-2 angle-left"
                                    href="#"><i class="fa-solid fa-angle-right"></i></a></h4>
                        </div>
                    </div>
                    <p>Bạn muốn tìm việc mới? Xem danh sách việc làm <a class="color-bg" href="#">tại đây</a>
                    </p>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2 bg-content">
                        <img class="img-fluid" src="{{ asset('images/kinhdoanhlogo.png') }}" alt="">
                        <p><strong>Kinh doanh/Bán hàng</strong></p>
                        <p class="color-bg">16.609 việc làm</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2 bg-content">
                        <img class="img-fluid" src="{{ asset('images/kinhdoanhlogo.png') }}" alt="">
                        <p><strong> IT phần mềm</strong></p>
                        <p class="color-bg">4.157 việc làm</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2 bg-content">
                        <img class="img-fluid" src="{{ asset('images/kinhdoanhlogo.png') }}" alt="">
                        <p><strong>Hành chính văn phòng</strong></p>
                        <p class="color-bg">5.089 việc làm</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2 bg-content">
                        <img class="img-fluid" src="{{ asset('images/kinhdoanhlogo.png') }}" alt="">
                        <p><strong>Giáo dục / Đào tạo</strong></p>
                        <p class="color-bg">4.167 việc làm</p>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2 bg-content">
                        <img class="img-fluid" src="{{ asset('images/kinhdoanhlogo.png') }}" alt="">
                        <p><strong>Kinh doanh/Bán hàng</strong></p>
                        <p class="color-bg">16.609 việc làm</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2 bg-content">
                        <img class="img-fluid" src="{{ asset('images/kinhdoanhlogo.png') }}" alt="">
                        <p><strong> IT phần mềm</strong></p>
                        <p class="color-bg">4.157 việc làm</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2 bg-content">
                        <img class="img-fluid" src="{{ asset('images/kinhdoanhlogo.png') }}" alt="">
                        <p><strong>Hành chính văn phòng</strong></p>
                        <p class="color-bg">5.089 việc làm</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <div class="text-center rounded border border-3 py-2 bg-content">
                        <img class="img-fluid" src="{{ asset('images/kinhdoanhlogo.png') }}" alt="">
                        <p><strong>Giáo dục / Đào tạo</strong></p>
                        <p class="color-bg">4.167 việc làm</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <h1 class="color-bg">Cùng Vieclamso1 xây dựng thương hiệu cá nhân</h1>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-6">
                    <div class="rounded bg-content py-3">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="ps-3">
                                    <h6 class="py-2">
                                        Vieclamso1 CV Profile
                                    </h6>
                                    <p> Vieclamso1 CV Profile là bản hồ sơ năng
                                        lực giúp bạn xây dựng thương hiệu cá
                                        nhân, thể hiện thế mạnh của bản thân
                                        thông qua việc đính kèm học vấn, kinh
                                        nghiệm, dự án, kỹ năng,... của mình</p>
                                    <div class="py-3">
                                        <a class="rounded py-2 px-5 text-decoration-none text-light btn-content"
                                            href="#">Tạo Profile <i class="ps-3 fa-solid fa-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{asset('images/cv.png')}}" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="rounded bg-content py-3">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="ps-3">
                                    <h6 class="py-2">
                                        CV Builder 2.0
                                    </h6>
                                    <p> Một chiếc CV chuyên nghiệp sẽ giúp bạn 
                                        gây ấn tượng với nhà tuyển dụng và tăng 
                                        khả năng vượt qua vòng lọc CV.</p>
                                    <div class="py-3">
                                        <a class="rounded py-2 px-5 text-decoration-none text-light btn-content"
                                            href="#">Tạo CV ngay<i class="ps-3 fa-solid fa-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{asset('images/profile.png')}}" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <h1 class="color-bg">Thấu hiểu bản thân - Nâng tầm giá trị</h1>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-6">
                    <div class="rounded bg-content py-3">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="ps-3">
                                    <h6 class="py-2">
                                        Trắc nghiệm tính cách MBTI
                                    </h6>
                                    <p>  Kết quả trắc nghiệm MBTI chỉ ra cách 
                                        bạn nhận thức thế giới xung quanh và ra 
                                        quyết định trong cuộc sống, từ đó, giúp 
                                        bạn có thêm thông tin để lựa chọn nghề 
                                        nghiệp chính xác hơn.</p>
                                    <div class="py-3">
                                        <a class="rounded py-2 px-5 text-decoration-none text-light btn-content"
                                            href="#">Khám phá ngay <i class="ps-3 fa-solid fa-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{asset('images/tracnghiem.png')}}" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="rounded bg-content py-3">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="ps-3">
                                    <h6 class="py-2">
                                        Trắc nghiệm đa trí thông minh MI
                                    </h6>
                                    <p> Trả lời cho câu hỏi “Bạn có trí thông minh 
                                        nổi trội trong lĩnh vực nào?”, từ đó bạn có 
                                        thể hiểu bản thân mình hơn và đưa ra các 
                                        quyết định nghề nghiệp phù hợp.</p>
                                    <div class="py-3">
                                        <a class="rounded py-2 px-5 text-decoration-none text-light btn-content"
                                            href="#">Khám phá ngay <i class="ps-3 fa-solid fa-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{asset('images/tracnghiemmi.png')}}" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col ">
                    <h1 class="color-bg text-center ">Báo chí nói về Vieclamso1</h1>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12 col-md-3">
                    <div class="rounded border border-2 text-center">
                        <a href="#"><img class="img-fluid w-50" src="{{asset('images/vietnambiz.jpg')}}" alt="#"></a>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="rounded border border-2 text-center">
                        <a href="#"><img class="img-fluid w-75" src="{{asset('images/cafebiz.jpg')}}" alt="#"></a>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="rounded border border-2 text-center">
                        <a href="#"><img class="img-fluid w-50" src="{{asset('images/genk.png')}}" alt="#"></a>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="rounded border border-2 text-center">
                        <a href="#"><img class="img-fluid w-50" src="{{asset('images/kenh14.jpg')}}" alt="#"></a>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
    {{-- footer --}}
    <footer>
        <div class="container pt-4">
            <div class="row border-bottom">
                <div class="col-12 col-md-3">
                    <img class="img-fluid" src="{{asset('images/logo.png')}}" alt="#">
                    <div class="d-flex py-3">
                        <img class="img-fluid" src="{{asset('images/googleforstarups.png')}}" alt="#">
                        <img class="img-fluid px-2" src="{{asset('images/dmca.png')}}" alt="#">
                        <img class="img-fluid" src="{{asset('images/bocongthuong.png')}}" alt="#">
                    </div>
                    <p class="pt-2">Ứng dụng tải xuống</p>
                    <div class="d-flex py-3">
                        <img class="img-fluid" src="{{asset('images/appstore.png')}}" alt="#">
                        <img class="img-fluid px-2" src="{{asset('images/chplay.png')}}" alt="#">
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
                        <a href="#"><h3 class="text-dark"><i class="fa-brands fa-facebook"></i></h3></a>
                        <a href="#"><h3 class="text-dark px-2"><i class="fa-brands fa-twitter"></i></h3></a>
                        <a href="#"><h3 class="text-dark px-2"><i class="fa-brands fa-linkedin"></i></h3></a>
                        <a href="#"><h3 class="text-dark px-2"><i class="fa-brands fa-youtube"></i></h3></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 pt-4">
                    <h4>Công ty Cổ phần Việc làm số 1 Việt Nam</h4>
                    <div class="d-flex">
                        <p><i class="fa-solid fa-calculator color-bg pe-2"></i> Giấy phép đăng ký kinh doanh số: 0107307178</p>
                    </div>
                    <div class="d-flex">
                        <p><i class="fa-solid fa-file color-bg pe-2"></i> Giấy phép hoạt động dịch vụ việc làm số: <strong>18/SLĐTBXH GP</strong></p>
                    </div>
                    <div class="d-flex">
                        <p><i class="fa-solid fa-location-dot color-bg pe-2"></i>Trụ sở HN: Tòa FS GoldSeason số 47 Nguyễn Tuân, P.Thanh Xuân Trung, Q.Thanh Xuân, Hà Nội</p>
                    </div>
                    <div class="d-flex">
                        <p><i class="fa-solid fa-location-dot color-bg pe-2"></i> Chi nhánh HCM: Tòa nhà Dali, 24C Phan Đăng Lưu, P.6, Q.Bình Thạnh, TP HCM</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <img class="img-fluid pt-5" src="{{asset('images/qr.png')}}" alt="#">
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
                            <img src="{{asset('images/vieclamso1icon.png')}}" alt="">
                            <p class="text-white pt-3 ps-3">Nền tảng công nghệ tuyển 
                                dụng thông minh Vieclamso1</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class=" rounded bg-footer2 text-center">
                        <div class="px-3 d-flex">
                            <img src="{{asset('images/logofooter1.png')}}" alt="">
                            <p class="text-white pt-3 ps-3">Nền tảng quản lý và gia tăng 
                                trải nghiệm nhân viên 
                                HappyTime.vn</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class=" rounded bg-footer3 text-center">
                        <div class="px-3 d-flex">
                            <img src="{{asset('images/logofooter2.png')}}" alt="">
                            <p class="text-white pt-3 ps-3">Nền tảng thiết lập và đánh giá 
                                năng lực nhân viên TestCenter.vn</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class=" rounded bg-footer1 text-center">
                        <div class="px-3 d-flex">
                            <img src="{{asset('images/logofooter3.png')}}" alt="">
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
                    <strong>&copy;  2014 2024 Vieclamso1 Vietnam JSC. All rights reserved.</strong>
                </div>
            </div>
        </div>
    </footer>
    {{-- endfooter --}}
    <script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const chartColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];

        const data = [14600, 7531, 5036, 4732, 4380];
        const labels = ['Marketing', 'IT', 'Finance', 'HR', 'Sales'];

        function createChart(chartId, color, data) {
            const ctx = document.getElementById(chartId).getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [''],
                    datasets: [{
                        data: [data],
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            beginAtZero: true,
                            max: 14600,
                            ticks: {
                                display: false
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        createChart('chartMarketing', chartColors[0], data[0]);
        createChart('chartIT', chartColors[1], data[1]);
        createChart('chartFinance', chartColors[2], data[2]);
        createChart('chartHR', chartColors[3], data[3]);
        createChart('chartSales', chartColors[4], data[4]);
    </script>
</body>

</html>
