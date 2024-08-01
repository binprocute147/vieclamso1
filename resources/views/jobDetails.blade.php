@extends('home')
@section('content')
<div class="bg-content banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 py-4">
                <div class="row bg-light rounded">
                    <div class="col">
                        <div class="py-3 px-3">
                            <h4>{{ $job->name_job }}</h4>
                            <div class="row py-2">
                                <div class="col-md-4 col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-success text-white rounded-circle p-3 me-3">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div>
                                            <h5>Mức Lương</h5>
                                            <strong>{{ $job->min_salary }} - {{ $job->max_salary }} vnđ</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-success text-white rounded-circle p-3 me-3">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div>
                                            <h5>Địa Điểm</h5>
                                            <strong>{{ $job->location }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-success text-white rounded-circle p-3 me-3">
                                            <i class="fa-solid fa-hourglass"></i>
                                        </div>
                                        <div>
                                            <h5>Kinh Nghiệm</h5>
                                            <strong>{{ $job->experience ?? 'Không yêu cầu' }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <a href="#"
                                            class="btn bg-success text-white rounded p-2 d-flex align-items-center justify-content-center w-75">
                                            <i class="fas fa-paper-plane me-2"></i>
                                            Ứng Tuyển Ngay
                                        </a>
                                        <a href="#"
                                            class="btn border-success text-success rounded px-4 py-2 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-bookmark me-2"></i>
                                            Lưu Tin
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-4 pb-1">
                    <div class="row bg-light rounded">
                        <div class="col">
                            <div class="py-3 px-3">
                                <div class="d-flex">
                                    <span class="p-1 border-start bg-success"></span>
                                    <h5 class="ms-3">Chi tiết tuyển dụng</h5>
                                </div>
                                <div class="py-3">
                                    <h6>Mô tả công việc</h6>
                                    <p>{{ $job->description }}</p>
                                </div>
                                <div class="py-3">
                                    <h6>Yêu cầu ứng viên</h6>
                                    <p>{{ $job->requirements }}</p>
                                </div>
                                <div class="py-3">
                                    <h6>Kinh nghiệm</h6>
                                    <p>{{ $job->experience ?? 'Không yêu cầu' }}</p>
                                </div>
                                <div class="py-3">
                                    <h6>Lương</h6>
                                    <p>{{ $job->min_salary }} đến {{ $job->max_salary }} vnđ</p>
                                </div>
                                <div class="py-3">
                                    <h6>Địa điểm</h6>
                                    <p>{{ $job->address }}</p>
                                </div>
                                <div class="py-3">
                                    <h6>Cách thức ứng tuyển</h6>
                                    <p>Ứng viên nộp hồ sơ trực tuyến bằng cách bấm<strong> Ứng tuyển </strong>ngay dưới
                                        đây.</p>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <a href="#"
                                                class="btn bg-success text-white rounded p-2 d-flex align-items-center justify-content-center">
                                                <i class="fas fa-paper-plane me-2"></i>
                                                Ứng Tuyển Ngay
                                            </a>
                                            <p class="px-2"></p>
                                            <a href="#"
                                                class="btn border-success text-success rounded px-4 py-2 d-flex align-items-center justify-content-center">
                                                <i class="fas fa-bookmark me-2"></i>
                                                Lưu Tin
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('jobsThatAreRightForYou', ['jobs' => $jobs])
            </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="rounded bg-light">
                        <div class="py-3 px-3">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <a href="#"><img class="img-fluid py-2"
                                        src="{{ asset('images/company_image/' . $job->company_image) }}"
                                        alt="{{ $job->company_name }}"></a>
                                </div>
                                <div class="col-md-8 col-12">
                                    <h5>{{ $job->company_name }}</h5>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="d-flex flex-wrap align-items-center">
                                    <i class="text-body-tertiary fa-solid fa-location-dot me-2"></i>
                                    <p class="mb-0 me-2 fw-bold">Địa điểm:</p>
                                    <p class="mb-0 flex-grow-1">{{ $job->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4">
                        <div class="rounded bg-light">
                            <div class="py-3 px-3">
                                <h5 class="py-2">Thông tin chung</h5>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success text-white rounded-circle p-3 me-3">
                                        <i class="fa-solid fa-hourglass"></i>
                                    </div>
                                    <div>
                                        <p>Kinh nghiệm</p>
                                        <strong>{{ $job->experience ?? 'Không yêu cầu' }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success text-white rounded-circle p-3 me-3">
                                        <i class="fa-solid fa-user-group"></i>
                                    </div>
                                    <div>
                                        <p>Số lượng</p>
                                        <strong>{{ $job->quantity }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success text-white rounded-circle p-3 me-3">
                                        <i class="fa-solid fa-briefcase"></i>
                                    </div>
                                    <div>
                                        <p>Hình thức làm việc</p>
                                        <strong>{{ $job->job_type }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success text-white rounded-circle p-3 me-3">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </div>
                                    <div>
                                        <p>Giới tính</p>
                                        <strong>{{ $job->gender ?? 'Không yêu cầu' }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
