@extends('home')
@section('content')
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
                            <a class="nav-link dropdown-toggle w-25" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
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
                            <p class="pt-2 pe-2">Lọc theo: </p><button class="btn btn-light dropdown-toggle" type="button"
                                data-toggle="dropdown">Địa điểm
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
                                <img class="img-fluid" src="{{ asset('images/cv.png') }}" alt="#">
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
                                <img class="img-fluid" src="{{ asset('images/profile.png') }}" alt="#">
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
                                    <p> Kết quả trắc nghiệm MBTI chỉ ra cách
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
                                <img class="img-fluid" src="{{ asset('images/tracnghiem.png') }}" alt="#">
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
                                <img class="img-fluid" src="{{ asset('images/tracnghiemmi.png') }}" alt="#">
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
                        <a href="#"><img class="img-fluid w-50" src="{{ asset('images/vietnambiz.jpg') }}"
                                alt="#"></a>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="rounded border border-2 text-center">
                        <a href="#"><img class="img-fluid w-75" src="{{ asset('images/cafebiz.jpg') }}"
                                alt="#"></a>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="rounded border border-2 text-center">
                        <a href="#"><img class="img-fluid w-50" src="{{ asset('images/genk.png') }}"
                                alt="#"></a>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="rounded border border-2 text-center">
                        <a href="#"><img class="img-fluid w-50" src="{{ asset('images/kenh14.jpg') }}"
                                alt="#"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
