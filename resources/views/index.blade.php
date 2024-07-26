@extends('home')
<style>
    .disabled {
        pointer-events: none;
        opacity: 0.6;
    }
</style>
@section('content')
    {{-- banner --}}
    <div class="banner">
        <div class="bg-banner">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 text-center text-light pt-5">
                        <h4>Công nghệ AI dự đoán, cá nhân hoá việc làm</h4>
                        <h3 class="py-2">Việc làm mới dành cho bạn.</h3>
                        <form id="searchForm" class="d-flex bg-white py-2 rounded text-dark text-center w-100" role="search">
                            <input id="jobNameInput" class="w-50 border-0" type="search" name="job_name"
                                placeholder="Tên công việc">
                            <select id="locationSelect" class="w-25 border-0" name="location">
                                <option value="Tất cả địa điểm">Tất cả địa điểm</option>
                                @foreach ($allLocations as $location)
                                    <option value="{{ $location->location }}">{{ $location->location }}</option>
                                @endforeach
                            </select>
                            <button id="searchButton" class="btn login-btn ps-1 w-25" type="submit">Tìm kiếm</button>
                        </form>
                        <div class="invalid-feedback d-none" id="jobNameFeedback">
                            Vui lòng nhập tên công việc.
                        </div>
                        <img class="img-fluid py-5 -bottom-3 rounded" src="{{ asset('images/banner-index.png') }}"
                            alt="#">
                    </div>
                    <div class="col-12 col-md-6 pt-5">
                        <div class="rounded bg-banner1 py-5 w-100">
                            <div class="d-flex">
                                <p class="text-light"><i class="color-bg px-2 fa-brands fa-searchengin "></i>Thị trường
                                    việc làm hôm nay:</p>
                                <p class="color-bg ms-auto pe-2">{{ $today }}</p>
                            </div>
                            <div class="d-flex">
                                <p class="text-light px-2">Việc làm đang tuyển</p>
                                <p class="color-bg pe-2">{{ $totalJobs }}</p>
                                <p class="text-light ms-auto">Việc làm mới hôm nay</p>
                                <p class="color-bg px-4">{{ $newJobsToday }}</p>
                            </div>
                            <div class="d-flex">
                                <p class="text-light"><i class="px-2 color-bg fa-solid fa-chart-simple"></i>Nhu cầu
                                    tuyển dụng theo</p>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle w-25 ms-auto pe-2 text-light"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ngành nghề
                                    <span class="caret"></span>
                                    <ul class="dropdown-menu">
                                        @foreach ($jobCategories as $category)
                                            <li><a class="dropdown-item category-filter" href="#"
                                                    data-category-id="{{ $category->id }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                            </div>
                            <div class="d-flex justify-content-between">
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="chart-container">
                                        <canvas id="chart{{ $i }}"></canvas>
                                        <div class="chart-label">
                                            <span class="chart-color-box"
                                                style="background-color: {{ $chartColors[$i] }};"></span>
                                            {{ $labels[$i] }}
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- endbanner --}}
    <div class="content" id="result-search-job">
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
                            <p class="pt-2 pe-2">Lọc theo: </p> <a id="navbarDropdown" class="btn btn-light dropdown-toggle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ngành nghề
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item category-filter" href="#" data-category-id="">Tất
                                        cả</a></li>
                                @foreach ($jobCategories as $category)
                                    <li><a class="dropdown-item category-filter" href="#"
                                            data-category-id="{{ $category->id }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="d-flex">
                            <h4 class="pe-2">
                                <a class="color-bg rounded-circle border border-2 px-2 angle-left disabled" href="#"
                                    id="prev-location">
                                    <i class="fa-solid fa-angle-left"></i>
                                </a>
                            </h4>
                            <div class="d-flex" id="location-list">
                                @foreach ($locations as $location)
                                    <p class="px-2"></p>
                                    <a class="rounded-pill border border-2 px-2 angle-left text-decoration-none text-dark location-filter"
                                        href="#" data-location="{{ $location->location }}">
                                        <p>{{ $location->location }}</p>
                                    </a>
                                    <p class="px-2"></p>
                                @endforeach
                            </div>
                            <h4 class="ps-2">
                                <a class="color-bg rounded-circle border border-2 px-2 angle-left" href="#"
                                    id="next-location">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row py-2" id="job-list">
                    @foreach ($jobs as $job)
                        <div class="col-12 col-md-4">
                            <div class="py-3">
                                <div class="bg-light rounded py-2">
                                    <div class="row">
                                        <div class="col-12 col-md-4 text-center">
                                            <a href="#"><img class="img-fluid py-2"
                                                    src="{{ asset('images/company_image/' . $job->company_image) }}"
                                                    alt="{{ $job->company_name }}"></a>
                                        </div>
                                        <div class="col-12 col-md-8 ps-3">
                                            <a class="text-decoration-none text-dark" href="#">
                                                <h6 class="pt-3"><strong>{{ $job->name_job }}</strong></h6>
                                            </a>
                                            <a class="text-decoration-none text-dark" href="#">
                                                <p>{{ $job->company_name }}</p>
                                            </a>
                                            <div class="d-flex">
                                                <p class="p-1 rounded content">{{ $job->min_salary }} -
                                                    {{ $job->max_salary }} đ</p>
                                                <p class="px-2"></p>
                                                <p class="p-1 rounded content">{{ $job->location }}</p>
                                                <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                        class="fa-regular fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col py-4">
                        <div class="d-flex justify-content-center" id="pagination">
                            <h4 class="pe-2">
                                <a class="color-bg rounded-circle border border-2 px-2 angle-left " href="#"
                                    id="prev-page">
                                    <i class="fa-solid fa-angle-left"></i>
                                </a>
                            </h4>
                            <p><span id="current-page">{{ $currentPage }}</span>/<span
                                    id="total-pages">{{ $totalPages }}</span> trang</p>
                            <h4 class="ps-2">
                                <a class="color-bg rounded-circle border border-2 px-2 angle-left" href="#"
                                    id="next-page">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </h4>
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
                            <h4 class="py-3 px-2">
                                <a class="color-bg rounded-circle border border-2 px-2 angle-left disabled" href="#"
                                    id="prev-company">
                                    <i class="fa-solid fa-angle-left"></i>
                                </a>
                            </h4>
                            <h4 class="py-3">
                                <a class="color-bg rounded-circle border border-2 px-2 angle-left disabled" href="#"
                                    id="next-company">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="company-list">
                @foreach ($companies as $company)
                    <div class="col-12 col-md-3 py-2">
                        <div class="text-center rounded border border-3 py-2">
                            <img class="img-fluid" src="{{ asset('images/company_image/' . $company->company_image) }}"
                                alt="{{ $company->company_name }}">
                            <h4><strong>{{ $company->company_name }}</strong></h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex">
                        <h1 class="color-bg py-2">Ngành nghề</h1>
                        <div class="ms-auto d-flex">
                            <h4 class="py-3 px-2">
                                <a class="color-bg rounded-circle border border-2 px-2 angle-left disabled" href="#"
                                    id="prev-category">
                                    <i class="fa-solid fa-angle-left"></i>
                                </a>
                            </h4>
                            <h4 class="py-3">
                                <a class="color-bg rounded-circle border border-2 px-2 angle-left disabled" href="#"
                                    id="next-category">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3" id="category-list">
                @foreach ($jobCategories as $category)
                    <div class="col-12 col-md-3 py-2">
                        <div class="text-center rounded border border-3 py-2 bg-content">
                            <img class="img-fluid "
                                src="{{ asset('images/jobcategories_image/' . $category->jobcategories_image) }}"
                                alt="{{ $category->name }}">
                            <p><strong>{{ $category->name }}</strong></p>
                            <p class="color-bg">{{ $category->jobs_count }} việc làm</p>
                        </div>
                    </div>
                @endforeach
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


    {{-- js lọc danh mục công việc , phân trang công việc --}}
    <script>
        $(document).ready(function() {

            // Thêm sự kiện click cho các mục trong dropdown
            $(document).on('click', '.category-filter', function(e) {
                e.preventDefault();
                currentCategoryId = $(this).data('category-id');
                loadJobs(1, currentCategoryId);
            });


            function loadJobs(page, categoryId) {
                $.ajax({
                    url: '{{ route('index') }}',
                    data: {
                        page: page,
                        category_id: categoryId
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        var jobList = '';
                        $.each(data.jobs.data, function(index, job) {
                            jobList += `
                    <div class="col-12 col-md-4">
                        <div class="py-3">
                            <div class="bg-light rounded py-2">
                                <div class="row">
                                    <div class="col-12 col-md-4 text-center">
                                        <a href="#"><img class="img-fluid py-2"
                                                src="{{ asset('images/company_image/') }}/${job.company_image}"
                                                alt="${job.company_name}"></a>
                                    </div>
                                    <div class="col-12 col-md-8 ps-3">
                                        <a class="text-decoration-none text-dark" href="#">
                                            <h6 class="pt-3"><strong>${job.name_job}</strong></h6>
                                        </a>
                                            <p>${job.company_name}</p>
                                        <div class="d-flex">
                                            <p class="p-1 rounded content">${job.min_salary} -
                                                ${job.max_salary}
                                                đ</p>
                                            <p class="px-2"></p>
                                            <p class="p-1 rounded content">${job.location}</p>
                                            <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                    class="fa-regular fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                        });


                        $('#job-list').html(jobList);
                        $('#current-page').text(data.currentPage);
                        $('#total-pages').text(data.totalPages);

                        if (data.currentPage <= 1) {
                            $('#prev-page').addClass('disabled');
                        } else {
                            $('#prev-page').removeClass('disabled');
                        }

                        if (data.currentPage >= data.totalPages) {
                            $('#next-page').addClass('disabled');
                        } else {
                            $('#next-page').removeClass('disabled');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Ajax request failed");
                        console.error(xhr.responseText);
                    }
                });
            }

            $(document).on('click', '#prev-page', function(e) {
                e.preventDefault();
                var currentPage = parseInt($('#current-page').text());
                if (currentPage > 1) {
                    loadJobs(currentPage - 1);
                }
            });

            $(document).on('click', '#next-page', function(e) {
                e.preventDefault();
                var currentPage = parseInt($('#current-page').text());
                var totalPages = parseInt($('#total-pages').text());
                if (currentPage < totalPages) {
                    loadJobs(currentPage + 1);
                }
            });
        });
    </script>

    {{-- js hiển thị ngành nghề nổi bật --}}
    <script>
        $(document).ready(function() {
            var currentCategoryPage = 1;

            function loadCategories(page) {
                $.ajax({
                    url: '{{ route('index') }}',
                    type: 'get',
                    data: {
                        category_page: page
                    },
                    dataType: 'json',
                    success: function(data) {
                        var categoryList = '';
                        $.each(data.categories.data, function(index, category) {
                            categoryList += `
                                <div class="col-12 col-md-3 py-2">
                                    <div class="text-center rounded border border-3 py-2 bg-content">
                                        <img class="img-fluid" src="{{ asset('images/jobcategories_image/') }}/${category.jobcategories_image}" alt="${category.name}">
                                        <p><strong>${category.name}</strong></p>
                                        <p class="color-bg">${category.jobs_count} việc làm</p>
                                    </div>
                                </div>
                            `;
                        });
                        $('#category-list').html(categoryList);

                        if (data.categories.current_page <= 1) {
                            $('#prev-category').addClass('disabled');
                        } else {
                            $('#prev-category').removeClass('disabled');
                        }

                        if (data.categories.current_page >= data.categories.last_page) {
                            $('#next-category').addClass('disabled');
                        } else {
                            $('#next-category').removeClass('disabled');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Ajax request failed");
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#prev-category').click(function(e) {
                e.preventDefault();
                if (currentCategoryPage > 1) {
                    currentCategoryPage--;
                    loadCategories(currentCategoryPage);
                }
            });

            $('#next-category').click(function(e) {
                e.preventDefault();
                currentCategoryPage++;
                loadCategories(currentCategoryPage);
            });

            loadCategories(currentCategoryPage);
        });
    </script>

    {{-- js hiển thị công ty hàng đầu --}}
    <script>
        $(document).ready(function() {
            var currentPage = 1;

            function loadCompanies(page) {
                $.ajax({
                    url: '{{ route('index') }}',
                    type: 'get',
                    data: {
                        company_page: page
                    },
                    dataType: 'json',
                    success: function(data) {
                        var companyList = '';
                        $.each(data.companies.data, function(index, company) {
                            companyList += `
                            <div class="col-12 col-md-3 py-2">
                                <div class="text-center rounded border border-3 py-2">
                                    <img class="img-fluid" src="{{ asset('images/company_image/') }}/${company.company_image}" alt="${company.company_name}">
                                    <h4><strong>${company.company_name}</strong></h4>
                                </div>
                            </div>
                        `;
                        });
                        $('#company-list').html(companyList);

                        if (data.companies.current_page <= 1) {
                            $('#prev-company').addClass('disabled');
                        } else {
                            $('#prev-company').removeClass('disabled');
                        }

                        if (data.companies.current_page >= data.companies.last_page) {
                            $('#next-company').addClass('disabled');
                        } else {
                            $('#next-company').removeClass('disabled');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Ajax request failed");
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#prev-company').click(function(e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    loadCompanies(currentPage);
                }
            });

            $('#next-company').click(function(e) {
                e.preventDefault();
                currentPage++;
                loadCompanies(currentPage);
            });

            loadCompanies(currentPage);
        });
    </script>

    {{-- js hiển thị địa chỉ và lọc địa chỉ , phân trang địa chỉ  --}}
    <script>
        $(document).ready(function() {
            var currentLocationPage = 1;
            var lastLocationPage = 1;

            function loadLocations(page) {
                $.ajax({
                    url: '{{ route('index') }}',
                    type: 'get',
                    data: {
                        location_page: page
                    },
                    dataType: 'json',
                    success: function(data) {
                        var locationList = '';
                        $.each(data.locations.data, function(index, location) {
                            locationList += `
                                <a class="rounded-pill border border-2 px-2 angle-left text-decoration-none text-dark location-filter ${index === 0 ? 'active' : ''}"
                                    href="#" data-location="${location.location}">
                                    <p>${location.location}</p>
                                </a>
                            `;
                        });
                        $('#location-list').html(locationList);
                        // Update currentLocationPage after loading locations
                        currentLocationPage = page;
                        lastLocationPage = data.locations.last_page;
                        updatePaginationButtons();
                    },
                    error: function(xhr, status, error) {
                        console.error("Ajax request failed");
                        console.error(xhr.responseText);
                    }
                });
            }

            // Function to load jobs by location and page
            function loadJobsByLocation(location, page) {
                $.ajax({
                    url: '{{ route('index') }}',
                    type: 'get',
                    data: {
                        location: location,
                        location_page: page
                    },
                    dataType: 'json',
                    success: function(data) {
                        var jobsList = '';
                        $.each(data.jobs.data, function(index, job) {
                            jobsList += `
                                <div class="col-12 col-md-4">
                                    <div class="py-3">
                                        <div class="bg-light rounded py-2">
                                            <div class="row">
                                                <div class="col-12 col-md-4 text-center">
                                                    <a href="#"><img class="img-fluid py-2"
                                                            src="{{ asset('images/company_image/') }}/${job.company_image}"
                                                            alt="${job.company_name}"></a>
                                                </div>
                                                <div class="col-12 col-md-8 ps-3">
                                                    <a class="text-decoration-none text-dark" href="#">
                                                        <h6 class="pt-3"><strong>${job.name_job}</strong></h6>
                                                    </a>
                                                        <p>${job.company_name}</p>
                                                    <div class="d-flex">
                                                        <p class="p-1 rounded content">${job.min_salary} -
                                                            ${job.max_salary} đ</p>
                                                        <p class="px-2"></p>
                                                        <p class="p-1 rounded content">${job.location}</p>
                                                        <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                                class="fa-regular fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        $('#job-list').html(jobsList);
                    },
                    error: function(xhr, status, error) {
                        console.error("Ajax request failed");
                        console.error(xhr.responseText);
                    }
                });
            }

            function updatePaginationButtons() {
                // Vô hiệu hóa nút "prev" nếu đang ở trang đầu tiên
                if (currentLocationPage <= 1) {
                    $('#prev-location').addClass('disabled');
                } else {
                    $('#prev-location').removeClass('disabled');
                }

                // Vô hiệu hóa nút "next" nếu đang ở trang cuối cùng
                if (currentLocationPage >= lastLocationPage) {
                    $('#next-location').addClass('disabled');
                } else {
                    $('#next-location').removeClass('disabled');
                }
            }

            // Click event for previous location button
            $('#prev-location').click(function(e) {
                e.preventDefault();
                if (currentLocationPage > 1) {
                    currentLocationPage--;
                    loadLocations(currentLocationPage);
                }
            });

            // Click event for next location button
            $('#next-location').click(function(e) {
                e.preventDefault();
                currentLocationPage++;
                loadLocations(currentLocationPage);
            });

            // Click event for location filters
            $(document).on('click', '.location-filter', function(e) {
                e.preventDefault();
                $('.location-filter').removeClass('active');
                $(this).addClass('active');
                // Load jobs for the selected location on page 1
                loadJobsByLocation($(this).data('location'), 1);
            });

            // Load default locations when the page is loaded
            loadLocations(currentLocationPage);
        });
    </script>

    {{-- js search job --}}
    <script>
        $(document).ready(function() {
            // Disable nút tìm kiếm khi input rỗng
            function checkInput() {
                var jobName = $('#jobNameInput').val();
                if (jobName.trim() === '') {
                    $('#searchButton').prop('disabled', true);
                    $('#jobNameFeedback').removeClass('d-none');
                } else {
                    $('#searchButton').prop('disabled', false);
                    $('#jobNameFeedback').addClass('d-none');
                }
            }

            // Kiểm tra input khi người dùng gõ
            $('#jobNameInput').on('input', function() {
                checkInput();
            });

            // Kiểm tra input khi form được submit
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                var jobName = $('#jobNameInput').val();
                var location = $('#locationSelect').val();

                if (jobName.trim() === '') {
                    $('#jobNameFeedback').removeClass('d-none');
                    return;
                }

                $.ajax({
                    url: '{{ route('index') }}',
                    type: 'GET',
                    data: {
                        search: true,
                        job_name: jobName,
                        location: location
                    },
                    success: function(response) {
                        if (response.message) {
                            $('#job-list').html('<div class="col-12 text-center"><h3>' +
                                response.message + '</h3></div>');
                        } else {
                            var jobsHtml = '';
                            $.each(response.jobs, function(index, job) {
                                jobsHtml += `
                                    <div class="col-12 col-md-4">
                                        <div class="py-3">
                                            <div class="bg-light rounded py-2">
                                                <div class="row">
                                                    <div class="col-12 col-md-4 text-center">
                                                        <a href="#"><img class="img-fluid py-2"
                                                                src="{{ asset('images/company_image/') }}/${job.company_image}"
                                                                alt="${job.company_name}"></a>
                                                    </div>
                                                    <div class="col-12 col-md-8 ps-3">
                                                        <a class="text-decoration-none text-dark" href="#">
                                                            <h6 class="pt-3"><strong>${job.name_job}</strong></h6>
                                                        </a>
                                                            <p>${job.company_name}</p>
                                                        <div class="d-flex">
                                                            <p class="p-1 rounded content">${job.min_salary} -
                                                                ${job.max_salary} đ</p>
                                                            <p class="px-2"></p>
                                                            <p class="p-1 rounded content">${job.location}</p>
                                                            <a class="ms-auto text-decoration-none text-dark pe-2" href="#"><i
                                                                    class="fa-regular fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            $('#job-list').html(jobsHtml);
                        }

                        // Cuộn xuống phần tử chứa kết quả
                        $('html, body').animate({
                            scrollTop: $("#result-search-job").offset().top
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            // Kiểm tra input khi trang được tải lần đầu
            checkInput();
        });
    </script>


    {{-- js hiển thị biểu đồ số lượng danh mục công việc --}}
    <script>
        const chartColors = @json($chartColors);
        const data = @json($data);
        const labels = @json($labels);
    
        function createChart(chartId, color, data, label) {
            if (!Array.isArray(data) || data.length === 0) {
                console.error('Invalid data:', data);
                return;
            }
    
            const ctx = document.getElementById(chartId).getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [label],
                    datasets: [{
                        data: data,  
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
                            max: Math.max.apply(null, data) * 1.1,
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
    
        for (let i = 0; i < 4; i++) {
            createChart('chart' + i, chartColors[i], [data[i]], labels[i]); 
        }
    </script>    
@endsection
