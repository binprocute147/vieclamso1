@extends('home')
@section('content')
    <div class="bg-content banner">
        <div class="container ">
            <div class="row">
                <div class="col-12 col-md-8 py-4">
                    <div class="bg-light rounded py-5 ps-3">
                        <h3>Cài đặt thông tin cá nhân</h3>
                        <p>(*) Các thông tin bắt buộc</p>
                        <form class="me-3" method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Họ và tên *</label>
                                <input type="text" class="form-control" name="fullname"
                                    value="{{ old('fullname', auth()->user()->fullname ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone"
                                    value="{{ old('phone', auth()->user()->phone ?? '') }}">
                                @error('phone')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', auth()->user()->email ?? '') }}">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button style="background-color: rgb(46, 232, 0);" type="submit"
                                class="btn text-light py-2 px-4">Lưu</button>
                        </form>

                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="rounded bg-light">
                        <div class="pt-3 d-flex">
                            @if (auth()->user()->profile_picture)
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="py-3 w-25"
                                    href=""><img class="img-thumbnail rounded-pill"
                                        src="{{ asset('images/profile-picture/' . auth()->user()->profile_picture) }}"
                                        alt="user-avatar"></a>
                            @else
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="py-3 w-25"
                                    href=""><img class="img-thumbnail rounded-pill"
                                        src="{{ asset('images/profile-picture/user-default.jpg') }}"
                                        alt="user-default"></a>
                            @endif
                            <div class="ps-4">
                                <p>Chào bạn trở lại,</p>
                                <h5>{{ auth()->user()->fullname ?? auth()->user()->email }}</h5>
                                <p class="p-2 rounded content bg-content">Tài khoản đã xác thực</p>
                                <a class="p-2 rounded-pill content bg-content text-decoration-none text-dark"
                                    href=""><i class="px-1 fa-solid fa-arrow-up"></i> Nâng cấp tài khoản</a>
                            </div>
                        </div>
                        @error('profile_picture')
                            <div class="py-3">
                                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                            </div>
                        @enderror
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route('profile.picture.update') }}" enctype="multipart/form-data"
                    id="uploadForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa ảnh đại diện</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <!-- Bên trái: Phần upload ảnh mới -->
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="profilePicture" class="form-label">Chọn ảnh mới</label>
                                <input type="file" class="form-control" id="profilePicture" name="profile_picture"
                                    onchange="displayImage(event)">
                                <small id="fileHelp" class="form-text text-muted">
                                    Nếu ảnh của bạn có dung lượng trên 4MB, vui lòng <a href="https://compressor.io/">bấm
                                        vào đây</a> để giảm dung lượng ảnh.
                                </small>
                                @error('profile_picture')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Bên phải: Hiển thị ảnh profile_picture -->
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="previewImage" class="form-label">Ảnh đại diện hiển thị</label>
                                <div id="imagePreview" class="text-center">
                                    @if (auth()->user()->profile_picture)
                                        <img id="previewImage"
                                            src="{{ asset('images/profile-picture/' . Auth::user()->profile_picture) }}"
                                            alt="Current Profile Picture" class="img-thumbnail rounded-circle">
                                    @else
                                        <img id="previewImage"
                                            src="{{ asset('images/profile-picture/user-default.jpg') }}"
                                            alt="user-default" class="img-thumbnail rounded-circle">
                                    @endif
                                </div>
                                <p>Tải ảnh có định dạng <strong> 1024 x 1024 </strong>sẽ đẹp nhất</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function displayImage(event) {
            var image = document.getElementById('previewImage');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
