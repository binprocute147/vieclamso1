@extends('layout-admin')
@section('content-admin')
    <style>
        .body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-top: 50px;
            cursor: pointer;
        }

        .profile-info {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .is-invalid {
            border-color: #e3342f;
        }

        .invalid-feedback {
            color: #e3342f;
        }

        .profile-button {
            background-color: #682773;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-button:hover {
            background-color: #552663;
        }

        #picture-input {
            display: none !important;
            visibility: hidden !important;
            color: rgba(r, g, b, 0) !important;
            background-color: rgba(r, g, b, 0) !important;
            opacity: 0 !important;
            transform: scale(0) !important;
            clip-path: circle(0) !important;
            left: -999px !important;
        }
    </style>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('/Dashboard') }}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                    Home</a>
            </div>
            <h1>Profile Admin</h1>
        </div>
        <div class="body">
            <div class="container">
                <div class="profile-header text-center">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($admin->picture)
                        <img src="{{ asset('images/picture-admin/' . $admin->picture) }}" alt="Ảnh đại diện Admin"
                            id="current-picture" class="profile-img">
                    @else
                        <img src="{{ asset('images/profile-picture/user-default.jpg') }}" alt="Ảnh đại diện Admin"
                            id="current-picture" class="profile-img">
                    @endif
                    <h3>{{ $admin->fullname }}</h3>
                    <span class="text-black-50">Vai trò: {{ $admin->role }}</span>
                </div>
                <div class="profile-info">
                    <form id="profile-form" action="{{ route('admin.updateProfile') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fullname">Họ và tên</label>
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                    id="fullname" name="fullname" value="{{ old('fullname', $admin->fullname) }}" required>
                                @error('fullname')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $admin->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone', $admin->phone) }}">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <input type="file" id="picture-input" name="picture"
                            onchange="previewImage(event)">
                        <button type="submit" class="btn btn-primary">Cập nhật hồ sơ</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#changePasswordModal">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for changing password -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Đổi mật khẩu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="change-password-form" action="{{ route('admin.updatePassword') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control @if ($errors->has('current_password')) is-invalid @endif"
                                id="current_password" name="current_password" required>
                            @if ($errors->has('current_password'))
                                <span class="invalid-feedback">{{ $errors->first('current_password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="new_password">Mật khẩu mới</label>
                            <input type="password" class="form-control @if ($errors->has('new_password')) is-invalid @endif"
                                id="new_password" name="new_password" required>
                            @if ($errors->has('new_password'))
                                <span class="invalid-feedback">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Nhập lại mật khẩu mới</label>
                            <input type="password"
                                class="form-control @if ($errors->has('new_password_confirmation')) is-invalid @endif"
                                id="new_password_confirmation" name="new_password_confirmation" required>
                            @if ($errors->has('new_password_confirmation'))
                                <span class="invalid-feedback">{{ $errors->first('new_password_confirmation') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle file input change
            $('#current-picture').on('click', function() {
                $('#picture-input').click();
            });

            // Show password errors modal if there are any errors
            @if (session('password_errors'))
                $('#changePasswordModal').modal('show');
            @endif
        });

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('current-picture');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
