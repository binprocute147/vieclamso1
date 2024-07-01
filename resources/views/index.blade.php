<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tìm việc số 1</title>
    <style>
        .bg-nav {
            background: #ffffff !important;
        }

        a.nav-link:hover {
            color: rgb(46 232 0);
        }

        .color-bg {
            color: rgb(46 232 0) !important;
        }

        .icon-flag {
            padding-left: 200px !important;
            text-decoration:
        }

        .bg-item {
            background: rgb(46 232 0) !important;

        }

        .bg-banner {
            background: #ececec !important;
            border-radius: 5px;
        }

        .text-content {
            padding-top: 170px;
            color: rgb(46 232 0);
        }

        .hr-bg {
            border: 3px solid rgb(46 232 0) !important;
            padding-top: 15px;
            padding-bottom: 15px;
            opacity: 1;
        }

        .text-content1 {
            padding-top: 100px;
            color: rgb(46 232 0);
        }

        .bg-content {
            background: rgb(255 255 255) !important;
        }

        .register {
            height: 600px;
            background: #167000;
        }

        .form-register {
            background: white;
            width: 100%;
            border-radius: 10px;
            text-align: left;
            padding-left: 20px;
        }
        .phone-color{
            color: #f9a62b;
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
    <header class=" ">
        <nav id="navbar" class="navbar navbar-expand-lg pt-3 border-bottom bg-nav fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand img-fluid" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold justify-content-center">
                        <li class="nav-item ps-5">
                            <a class="nav-link color-bg" aria-current="page" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="#">Dịch vụ</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="#">Báo giá</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="#">Hỗ trợ</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="#">Blog tuyển dụng</a>
                        </li>
                        <ul class="navbar-nav icon-flag">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><img src="{{ asset('images/america.png') }}"
                                        alt=""></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><img src="{{ asset('images/vietnam.png') }}"
                                        alt=""></a>
                            </li>
                            <li class="nav-item pe-3">
                                <a class="nav-link" href="#"><img src="{{ asset('images/japan.png') }}"
                                        alt=""></a>
                            </li>
                        </ul>
                        <li class="nav-item p-3 bg-item rounded">
                            <a href="#" class="p-2 text-white text-decoration-none ">Đăng tuyển & Tìm CV</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- end header --}}

    {{-- content --}}
    <div class="content pt-5">
        <div class="container pt-5">
            <div class="row pt-5">
                <div class="col text-center">
                    <h1>Đăng tin tuyển dụng,<br> tìm kiếm ứng viên hiệu quả</h1>
                </div>
            </div>
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="col text-center">
                    <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Đăng tin
                        miễn phí <i class=" text-light fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <img class="text-center justify-content-center img-fluid" src="{{ asset('images/banner.png') }}"
                        alt="">
                </div>
            </div>
        </div>
        <div class="py-5">
            <div class="container bg-banner">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h5 class="text-content">BIG UPDATE</h5>
                        <div class="d-flex">
                            <hr class=" hr-bg">
                            <h4 class="ps-3 py-3">Vieclamso1 Smart Recruitment Platform</h4>
                            <br>
                        </div>
                        <p>Nền tảng công nghệ ứng dụng sâu trí tuệ nhân tạo (AI) và Recruitment
                            Marketing, mang đến các giải pháp toàn diện giúp doanh nghiệp giải
                            quyết đồng thời các bài toán xoay quanh vấn đề tuyển dụng, từ việc tạo
                            nguồn CV, sàng lọc hồ sơ ứng viên cho đến đánh giá ứng viên và đo
                            lường hiệu quả</p>
                        <div class="py-3">
                            <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Tư vấn
                                tuyển
                                dụng miễn
                                phí <i class=" text-light fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img class="img-fluid" src="{{ asset('images/banner2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">Công nghệ đăng tin tuyển dụng mới. Tính năng mới. Trải nghiệm mới
                    </h1>
                </div>
            </div>
        </div>
        <div class="py-5 ">
            <div class="container bg-banner py-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img class="img-fluid" src="{{ asset('images/banner3.png') }}" alt="">
                    </div>
                    <div class="col-12 col-md-6">
                        <h5 class="text-content1">AI IN RECRUITMENT</h5>
                        <div class="d-flex">
                            <hr class=" hr-bg">
                            <h4 class="ps-3 py-3">Tương lai của tuyển dụng</h4>
                            <br>
                        </div>
                        <p>Toppy AI là "trái tim” của bản cập nhật Smart Recruitment Platform.
                            Toppy AI được phát triển bởi đội ngũ kỹ sư tài năng của tuyendungso1
                            Việt Nam thông qua việc ứng dụng công nghệ Trí tuệ nhân tạo (AI) và
                            Học máy (Machine Learning). Toppy AI có khả năng phân tích yêu cầu,
                            thói quen, hành vi của nhà tuyển dụng và ứng viên, đồng thời khai
                            thác tối đa lượng dữ liệu lớn của tuyendungso1, từ đó đưa ra các phán
                            đoán và đề xuất về những việc có thể làm để tuyển dụng hiệu quả
                            hơn, kết nối đúng nhu cầu tuyển dụng của doanh nghiệp với các ứng
                            viên phù hợp</p>
                        <div class="py-3">
                            <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Tư
                                vấn tuyển
                                dụng miễn
                                phí <i class=" text-light fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="bg-banner">
            <div class="container pb-4 bg-banner">
                <div class="row">
                    <div class="col">
                        <p class="text-center pt-4 text-content1">CORE FUNCTIONS OF TOPCV SMART RECRUITMENT
                            PLATFORM
                        </p>
                        <h2 class="text-center">Các tính năng chỉ có trên Vieclamso1 Smart Recruitment Platform
                        </h2>
                        <p class="text-center pt-2">Với sức mạnh công nghệ, Vieclamso1 Smart Recruitment
                            Platform kế
                            thừa những hiệu quả hiện tại và mang đến trải nghiệm một cách hoàn toàn
                            <br>khác biệt, giúp doanh nghiệp tuyển dụng hiệu quả trong thời đại số.
                        </p>
                    </div>
                </div>
            </div>
            <div class="container pb-5">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-2 bg-content rounded">
                            <h5 class=" py-4">Đề xuất bởi Toppy AI</h5>
                            <img class="img-fluid mx-auto d-block" src="{{ asset('images/banner4.png') }}"
                                alt="#">
                            <p class="pt-5">Toppy AI sẽ tiến hành phân tích dữ liệu
                                doanh nghiệp, nhu cầu tuyển dụng và hành
                                vi tìm việc của ứng viên để đề xuất những
                                hoạt động, giải pháp tuyển dụng giúp nhà
                                tuyển dụng gia tăng hiệu quả tuyển dụng.</p>
                            <div class="pb-4">
                                <a href="#" class="text-decoration-none pt-3 color-bg">Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-2 bg-content rounded">
                            <h5 class=" py-4">Chiến dịch Tuyển dụng</h5>
                            <img class="img-fluid mx-auto d-block" src="{{ asset('images/banner5.png') }}"
                                alt="#">
                            <p class="pt-4">Giúp doanh nghiệp hoàn thiện được cấu trúc
                                cơ bản của quá trình tuyển dụng và quản lý
                                được các nguồn mang lại hiệu quả cho hoạt
                                động tuyển dụng đó. Từ đó, nhà tuyển dụng
                                có thể tối ưu các phương pháp tìm nguồn
                                ứng viên và tuyển dụng hiệu quả hơn.</p>
                            <div class="pb-4">
                                <a href="#" class="text-decoration-none pt-3 color-bg">Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-2 bg-content rounded">
                            <h5 class=" py-4">Tính năng quản lý CV</h5>
                            <img class="img-fluid mx-auto d-block" src="{{ asset('images/banner6.png') }}"
                                alt="#">
                            <p class="pt-5">Giúp nhà tuyển dụng quản lý kho CV ứng
                                viên của mình một cách đầy đủ, có tính hệ
                                thống và không bị mất mát dữ liệu.</p>
                            <div class="pb-4">
                                <a href="#" class="text-decoration-none pt-3 color-bg">Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-2 bg-content rounded">
                            <h5 class=" py-4">Hệ thống báo cáo tuyển dụng</h5>
                            <img class="img-fluid mx-auto d-block" src="{{ asset('images/banner7.png') }}"
                                alt="#">
                            <p class="pt-5">Giúp nhà tuyển dụng biết được chính xác
                                số lượng CV ứng viên qua từng vòng từ
                                vòng nhận CV đến đi làm. Đồng thời cũng
                                đo lường chi phí tuyển dụng theo giá trị
                                thực tế mà doanh nghiệp đã chi trả để tìm
                                kiếm ứng viên.</p>
                            <div class="pb-4">
                                <a href="#" class="text-decoration-none pt-3 color-bg">Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-2 bg-content rounded">
                            <h5 class=" py-4">Hệ thống đánh giá ứng viên</h5>
                            <img class="img-fluid mx-auto d-block" src="{{ asset('images/banner8.png') }}"
                                alt="#">
                            <p class="pt-5">Với nền tảng TestCenter.vn, tuyendungso1
                                Smart Recruitment Platform giúp nhà tuyển
                                dụng đánh giá ứng viên toàn diện và khách
                                quan thông qua bài test online, từ đó tối ưu
                                tỷ lệ chuyển đổi, tìm kiếm ứng viên tài năng
                                từ nguồn CV ứng viên thu được từ Chiến
                                dịch tuyển dụng.</p>
                            <div class="pb-4">
                                <a href="#" class="text-decoration-none pt-3 color-bg">Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-2 bg-content rounded">
                            <h5 class=" py-4">Gia tăng hiệu quả tuyển dụng
                                thông qua hình thức trả phí</h5>
                            <img class="img-fluid mx-auto d-block" src="{{ asset('images/banner9.png') }}"
                                alt="#">
                            <p class="pt-5">Nhà tuyển dụng hoàn toàn chủ động trong
                                việc lựa chọn và kích hoạt dịch vụ phù hợp
                                để gia tăng số lượng CV ứng viên ứng
                                tuyển và tìm kiếm ứng viên tài năng. Với
                                các phương pháp tìm nguồn ứng viên thông
                                minh, hiệu quả, nhà tuyển dụng sẽ dễ dàng
                                tìm kiếm ứng viên cho Chiến dịch tuyển
                                dụng của mình khi sử dụng tuyendungso1
                                Smart Recruitment Platform.</p>
                            <div class="pb-4">
                                <a href="#" class="text-decoration-none pt-3 color-bg">Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h5 class="pt-5 text-content1">RECRUITMENT SERVICES</h5>
                    <h2 class="pt-3 pb-5">Dịch vụ đăng tin tuyển dụng</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-5">
                    <img class="img-fluid" src="{{ asset('images/banner10.png') }}" alt="#">
                </div>
                <div class="col-12 col-md-6 py-5">
                    <h3 class="pt-5 pb-3">Đăng tin tuyển dụng miễn phí</h3>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Đăng tin tuyển dụng miễn phí và
                        không
                        giới hạn
                        số lượng.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Đăng tin tuyển dụng dễ dàng,
                        không quá 1
                        phút.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Tiếp cận nguồn CV ứng viên khổng
                        lồ, tìm
                        kiếm ứng viên từ kho dữ liệu hơn 5 triệu hồ sơ.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Dễ dàng kiểm duyệt và đăng tin
                        trong 24h.
                    </p>
                    <div class="py-5">
                        <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Tư vấn
                            tuyển
                            dụng miễn
                            phí <i class=" text-light fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-5">
                    <h3 class="pt-5 pb-3">Top Jobs & Standard Plus - Đăng tin tuyển dụng</h3>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Tăng lượt tiếp cận người tìm việc
                        thêm
                        300% khi đăng tuyển.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Tin tuyển dụng hiển thị ở những
                        vị trí
                        nổi bật.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Đẩy tin tuyển dụng lên vị trí đầu
                        trong
                        kết quả tìm kiếm việc làm trên trang web đăng tin
                        tuyển dụng.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Tự động gợi ý tin tuyển dụng với
                        ứng viên
                        phù hợp, giúp tuyển dụng hiệu quả hơn.</p>
                    <div class="py-5">
                        <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Tư vấn
                            tuyển
                            dụng miễn
                            phí <i class=" text-light fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-5 text-center">
                    <img class="img-fluid" src="{{ asset('images/banner11.png') }}" alt="#">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-5">
                    <img class="img-fluid" src="{{ asset('images/banner12.png') }}" alt="#">
                </div>
                <div class="col-12 col-md-6 py-5">
                    <h3 class="pt-5 pb-3">Top Credit - Nạp Credit mở CV ứng viên</h3>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Chủ động tiếp cận 6.900.000+ CV
                        ứng viên
                        với hơn 50% ứng viên có kinh nghiệm từ
                        3 năm trở lên.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Tùy chỉnh các tiêu chí tìm kiếm
                        ứng viên
                        tài năng theo mong muốn: ngành nghề, vị trí
                        tuyển dung, địa điểm làm việc, tính cách ứng viên.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Ứng dụng AI/Machine Learning giúp
                        tìm
                        kiếm ứng viên chính xác, nhanh chóng với
                        mức độ phù hợp tăng theo số CV tìm kiếm.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Duy nhất tại tuyendungso1 có
                        chính sách
                        bảo hành dịch vụ với CV sai thông tin.</p>
                    <div class="py-4">
                        <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Tư vấn
                            tuyển
                            dụng miễn
                            phí <i class=" text-light fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-5">
                    <h3 class="pt-5 pb-3">CV đề xuất</h3>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Đa dạng hóa nguồn CV ứng viên mà
                        không
                        cần mất công tìm kiếm ứng viên.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Tiết kiệm thời gian tuyển dụng
                        nhân sự.
                    </p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Tỷ lệ ứng viên phù hợp lên đến
                        40%.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Dịch vụ có cam kết CV đang tìm
                        kiếm công
                        việc.</p>
                    <div class="py-4">
                        <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Tư vấn
                            tuyển
                            dụng miễn
                            phí <i class=" text-light fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-5 text-center">
                    <img class="img-fluid" src="{{ asset('images/banner13.png') }}" alt="#">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-5">
                    <img class="img-fluid" src="{{ asset('images/banner14.png') }}" alt="#">
                </div>
                <div class="col-12 col-md-6 py-5">
                    <h3 class="pt-5 pb-3">Top Branding - Truyền thông thương hiệu
                        hàng đầu
                    </h3>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i>Giúp thương hiệu, sản phẩm, dịch
                        vụ,
                        chương trình của doanh nghiệp được tiếp cận
                        với hơn 5 triệu ứng viên tiềm năng trên tuyendungso1.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Chi phí hợp lý hơn so với các
                        dịch vụ
                        quảng cáo banner tương tự.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Hỗ trợ tư vấn, thiết kế banner
                        chuyên
                        nghiệp.</p>
                    <p><i class="fa-solid fa-circle-check color-bg pe-2"></i> Xây dựng trang tuyển dụng uy tín,
                        giúp
                        doanh nghiệp tìm kiếm ứng viên, tuyển dụng
                        hiệu quả.</p>
                    <div class="py-4">
                        <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Tư vấn
                            tuyển
                            dụng miễn
                            phí <i class=" text-light fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-banner">
            <div class="container pb-4">
                <div class="row">
                    <div class="col">
                        <p class="text-center pt-5 color-bg">FIGURES</p>
                        <h2 class="text-center py-2">Những con số của trang tuyển dụng vieclamso1</h2>
                    </div>
                </div>
            </div>
            <div class="container pb-5">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-3 bg-content rounded text-center">
                            <h1 class="color-bg">2.100.000+</h1>
                            <p>Ứng viên đang bật tìm việc trung bình/thời
                                điểm</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-3 bg-content rounded text-center">
                            <h1 class="color-bg">200.000+</h1>
                            <p>Doanh nghiệp tuyển dụng sử dụng dịch vụ
                                tuyển dụng hiệu quả của vieclamso1</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 ">
                        <div class="px-2 text-center py-3 bg-content rounded text-center">
                            <h1 class="color-bg">540.000+</h1>
                            <p>Nhà tuyển dụng sử dụng thường xuyên để
                                đăng tin tuyển dụng, tìm kiếm ứng viên
                                tiềm năng chỉ với những thao tác đơn giản,
                                nhanh gọn</p>
                        </div>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-3 bg-content rounded text-center">
                            <h1 class="color-bg">200.000+</h1>
                            <p>Ứng viên tạo mới tài khoản trên vieclamso1
                                mỗi tháng</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="px-2 text-center py-3 bg-content rounded text-center">
                            <h1 class="color-bg">5.400.000+</h1>
                            <p>Lượt ứng viên truy cập hàng tháng, là một
                                trong những trang tuyển dụng có lượng
                                truy cập lớn nhất tại Việt Nam tại thời điểm
                                này.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 ">
                        <div class="px-2 text-center py-3 bg-content rounded text-center">
                            <h1 class="color-bg">8.000.000+</h1>
                            <p>Ứng viên tiềm năng, trong đó có 50% là
                                ứng viên có kinh nghiệm từ 3 năm trở lên</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container register">
                <div class="row">
                    <div class="col text-center text-white">
                        <h3 class=" pt-4">Đâu là giải pháp phù hợp cho doanh nghiệp của bạn?</h3>
                        <p>Hãy để lại thông tin và các chuyên viên tư vấn tuyển dụng của Vieclamso1 sẽ liên hệ
                            ngay với
                            bạn</p>
                        <div class="container pt-3 ">
                            <div class="row d-flex">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid" src="{{ asset('images/banner15.png') }}" alt="#">
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="form-register">
                                        <h3 class="color-bg pt-2">Đăng ký nhận tư vấn</h3>
                                        <form class="text-dark pt-2">
                                            <div class="mb-3">
                                                <label class="form-label">Họ và tên</label><br>
                                                <input type="text" class="border border-light-subtle w-75 py-1"
                                                    placeholder="Họ và tên">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label><br>
                                                <input type="email" class="border border-light-subtle w-75 py-1"
                                                    placeholder="Email">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Số điện thoại</label><br>
                                                <input type="email" class="border border-light-subtle w-75 py-1"
                                                    placeholder="Số điện thoại">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tỉnh/Thành phố</label><br>
                                                <select class="border border-light-subtle w-75 py-1">
                                                    <option>Chọn Tỉnh/Thành phố</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nhu cầu tư vấn</label><br>
                                                <select class="border border-light-subtle w-75 py-1">
                                                    <option>Chọn Nhu cầu tư vấn</option>
                                                </select>
                                            </div>
                                            <div class="text-center pb-2">
                                                <button type="submit" class="btn bg-item px-4 text-white"><i
                                                        class="fa-solid fa-chevron-right pe-2"></i> Gửi yêu cầu
                                                    tư
                                                    vấn</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="row pt-5">
                    <div class="col text-center pt-md-5" style="padding-top: 400px; ">
                        <h5 class="color-bg">VALUES</h5>
                        <h3 class="py-2">Giá trị khi sử dụng vieclamso1 Smart Recruitment Platform</h3>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class=" py-5 bg-content rounded">
                            <div class="text-center">
                                <img class="img-fluid" src="{{ asset('images/banner16.png') }}" alt="#">
                            </div>
                            <div class="d-flex ps-5 pt-3">
                                <hr class=" hr-bg ">
                                <h4 class="ps-3 py-3">Đối với Doanh nghiệp</h4>
                                <br>
                            </div>
                            <div class="ps-5 py-4">
                                <p><i class="fa-solid fa-circle-check color-bg pe-2"></i>Đưa tuyển dụng trở
                                    thành lợi thế cạnh tranh của doanh nghiệp: <strong> gia tăng cơ
                                        hội tuyển đúng người</strong>, giúp thúc đẩy hoạt động kinh doanh hiệu
                                    quả, hướng
                                    đến chuyển đổi số thành công</p>
                                <p><i class="fa-solid fa-circle-check color-bg pe-2"></i>Chuẩn hóa toàn bộ quy trình
                                    tuyển dụng thống nhất và bài bản với <strong>Talent
                                        Acquisition Funnel</strong>.</p>
                                <p><i class="fa-solid fa-circle-check color-bg pe-2"></i>Xây dựng<strong> thương hiệu
                                        tuyển dụng </strong>uy tín, chuyên nghiệp.</p>
                                <p><i class="fa-solid fa-circle-check color-bg pe-2"></i><strong>Tiết kiệm</strong>
                                    thời gian, chi phí cho hoạt động tuyển dụng.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" py-5 bg-content rounded">
                            <div class="text-center">
                                <img class="img-fluid" src="{{ asset('images/banner17.png') }}" alt="#">
                            </div>
                            <div class="d-flex ps-5 pt-3">
                                <hr class=" hr-bg ">
                                <h4 class="ps-3 py-3">Đối với Nhà tuyển dụng</h4>
                                <br>
                            </div>
                            <div class="ps-5 py-4">
                                <p><i class="fa-solid fa-circle-check color-bg pe-2"></i><strong>Quản lý tập trung
                                    </strong>tất cả các hoạt động tạo ra hiệu quả cho mỗi vị trí tuyển
                                    dụng theo chiến dịch tuyển dụng.</p>
                                <p><i class="fa-solid fa-circle-check color-bg pe-2"></i>Đăng tin tuyển dụng, tạo &
                                    quản lý<strong> nguồn ứng viên </strong>hiệu quả.</p>
                                <p><i class="fa-solid fa-circle-check color-bg pe-2"></i>Đánh giá ứng viên toàn diện
                                    dựa trên dữ liệu cụ thể, giúp định tuyển đưa ra
                                    quyết dụng chính xác, <strong> giảm tỷ lệ tuyển sai người</strong>.</p>
                                <p><i class="fa-solid fa-circle-check color-bg pe-2"></i>Chủ động lên kế hoạch &
                                    <strong>tối ưu chi phí tuyển dụng </strong>theo các số liệu đo
                                    lường.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="row">
                <div class="col text-center">
                    <h5 class="color-bg pt-5">ABOUT US</h5>
                    <h3 class="py-3">Về chúng tôi</h3>
                </div>
            </div>
        </div>
        <div class="container bg-banner rounded pb-5">
            <div class="row">
                <div class="col-12 col-md-6 py-5">
                    <p class="py-5">Việc làm số 1 Việt Nam là công ty hàng đầu trong lĩnh vực HR Tech tại Việt Nam,
                        xoay
                        quanh hệ sinh thái nhân sự với 4 sản phẩm chủ lực<br></br>

                        Nền tảng tuyển dụng thông minh Việc làm số 1, Nền tảng thiết lập và đánh giá năng
                        lực nhân viên TestCenter, Nền tảng quản lý và gia tăng trải nghiệm nhân viên
                        HappyTime và Giải pháp quản trị tuyển dụng hiệu suất cao SHring. <br></br>

                        Việc làm số 1 đang sở hữu hơn 6,9 triệu người dùng, 190.000 khách hàng lớn và đã kết
                        nối thành công hàng triệu lượt ứng viên mỗi năm tới các doanh nghiệp phù hợp. <br></br>

                        Thông qua việc nghiên cứu và không ngừng phát triển năng lực công nghệ lõi vượt trội
                        (đặc biệt là ứng dụng sâu Trí tuệ nhân tạo - AI), Tuyển dụng số 1 kỳ vọng mang tới các
                        giải pháp nhân sự hiệu quả hơn nữa trong tương lai: tối ưu các trải nghiệm số cho ứng
                        viên, từ đó giúp doanh nghiệp thu hút và giữ chân nhân tài, hướng tới một nền kinh tế
                        Việt Nam phát triển bền vững.</p>
                </div>
                <div class="col-12 col-md-6 text-center py-5">
                    <img class="img-fluid" src="{{ asset('images/banner18.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="py-5">
            <div class="bg-banner">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h5 class="color-bg pt-5">OUR AWARDS</h5>
                            <h3 class="py-4">Giải thưởng tiêu biểu</h3>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="col-12 col-md-3 py-5">
                            <div class=" py-3 px-3 bg-content rounded">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{ asset('images/banner19.png') }}" alt="#">
                                </div>
                                <h5 class="color-bg pt-3 ps-4">BRAND</h5>
                                <h6 class="ps-4 py-2"><strong>Top 100 Thương hiệu
                                        hàng đầu Việt Nam 2020
                                        tại Vietnam Top Brands
                                        do HTV tổ chức</strong></h6>
                                <div class="ps-4 py-2">
                                    <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Đọc
                                        thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 py-5">
                            <div class=" py-3 px-3 bg-content rounded">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{ asset('images/banner19.png') }}" alt="#">
                                </div>
                                <h5 class="color-bg pt-3 ps-4">STARTUP</h5>
                                <h6 class="ps-4 py-2"><strong>Top 15 Startups được
                                        Google lựa chọn tham
                                        gia Google for Startups
                                        Accelerator: Southeast
                                        Asia</strong></h6>
                                <div class="ps-4 py-2">
                                    <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Đọc
                                        thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 py-5">
                            <div class=" py-3 px-3 bg-content rounded">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{ asset('images/banner20.png') }}" alt="#">
                                </div>
                                <h5 class="color-bg pt-3 ps-4">TECH</h5>
                                <h6 class="ps-4 py-2"><strong>Bộ đôi giải thưởng Sản
                                        phẩm công nghệ số
                                        Make in Viet Nam 2022</strong></h6>
                                <div class="ps-4 py-2">
                                    <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Đọc
                                        thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 py-5">
                            <div class=" py-3 px-3 bg-content rounded">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{ asset('images/banner21.png') }}" alt="#">
                                </div>
                                <h5 class="color-bg pt-3 ps-4">BRAND</h5>
                                <h6 class="ps-4 py-2"><strong>Cú đúp giải thưởng tại Lễ
                                        vinh danh Top 10 doanh
                                        nghiệp CNTT Việt Nam
                                        2023</strong></h6>
                                <div class="ps-4 py-2">
                                    <a href="#" class="text-decoration-none text-light bg-item p-2 rounded">Đọc
                                        thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h5 class="color-bg pt-5">OUR PARTNERS</h5>
                            <h3 class="py-4">Khách hàng tiêu biểu và đối tác truyền thông của Vieclamso1</h3>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="col-12 col-md-6 py-5">
                            <div class=" py-3 px-3 bg-content rounded">
                                <div class="d-flex ps-5 py-5">
                                    <hr class=" hr-bg ">
                                    <h4 class="ps-3 py-3">Đối với Doanh nghiệp</h4>
                                    <br>
                                </div>
                                <div class="row text-center py-4">
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/fpt.png') }}" alt="">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/teky.png') }}" alt="">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/shinhanbank.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="row text-center py-4">
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/edupia.png') }}"
                                            alt="">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/viettel.png') }}"
                                            alt="">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/techcombank.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-6 py-5">
                            <div class=" py-3 px-3 bg-content rounded">
                                <div class="d-flex ps-5 py-5">
                                    <hr class=" hr-bg ">
                                    <h4 class="ps-3 py-3">Đối với Nhà tuyển dụng</h4>
                                    <br>
                                </div>
                                <div class="row text-center py-4">
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/genk.png') }}" alt="">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/vtc10.png') }}" alt="">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/vtv1.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="row text-center py-4">
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/cafebiz.png') }}"
                                            alt="">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/vtv2.png') }}" alt="">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <img class="img-fluid" src="{{ asset('images/vtv6.png') }}" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex pt-5">
                                <hr class=" hr-bg ">
                                <h4 class="ps-3 py-3">Việc làm số 1 Việt Nam mong muốn được hợp tác cùng Doanh nghiệp</h4>
                            </div>
                            <p>Đội ngũ hỗ trợ của Việc làm số 1 luôn sẵn sàng để tư vấn giải pháp tuyển dụng và đồng hành cùng các Quý nhà tuyển dụng</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 py-3">
                            <h5 class="pb-3">Hotline Tư vấn Tuyển dụng miền Bắc</h5>
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0944 876 109</h4>
                                    <h5>Nguyễn Thị Thu Hương</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 py-3">
                            <h5 class="pb-3">Hotline Tư vấn Tuyển dụng miền Nam</h5>
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0902 867 167</h4>
                                    <h5>Đặng Thị Hoàng Dung</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 py-3">
                            <h5 class="pb-3">Hỗ trợ khách hàng và khiếu nại dịch vụ</h5>
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone phone-color px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="phone-color pt-3">(024) 7107 9799</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 py-3">
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0975 923 878</h4>
                                    <h5>Hoàng Thị Tuyết</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 py-3">
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0396 932 311</h4>
                                    <h5>Lê Thị Mỹ Trang</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 py-3">
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone phone-color px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="phone-color pt-3">0862 69 19 29</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 py-3">
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0343 439 988</h4>
                                    <h5>Lê Thị Thanh Tâm</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 py-3">
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0976 593 426</h4>
                                    <h5>Trần Ngọc Quế Anh</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 py-3">
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0332 678 613</h4>
                                    <h5>Đinh Thị Huyền</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 py-3">
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0978 526 627</h4>
                                    <h5>Nguyễn Thùy Dương</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 py-3">
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0339 317 722</h4>
                                    <h5>Nguyễn Thị Trang</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 py-3">
                            <div class=" py-3 bg-content rounded d-flex">
                                <h2><i class="fa-solid fa-phone color-bg px-3 pt-3"></i></h2>
                                <div class="ps-3">
                                    <h4 class="color-bg">0906 339 965</h4>
                                    <h5>Nguyễn Thị Hoài Ân</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- end content --}}
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
    <script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
