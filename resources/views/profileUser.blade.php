@extends('home')

@section('content')
    <div class="bg-content banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 py-4">
                    <div class="bg-light rounded py-5 ps-3">
                        <h3>Cài đặt thông tin cá nhân</h3>
                        <p>(*) Các thông tin bắt buộc</p>
                        <form class="me-3" id="profileForm" method="POST" action="{{ route('profile.update') }}">
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

                            <div class="my-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#changePasswordModal">Đổi mật khẩu</button>
                            </div>
                        </form>

                        <!-- Modal Đổi mật khẩu -->
                        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                                    </div>
                                    <form id="changePasswordForm" method="POST"
                                        action="{{ route('profile.change-password') }}"
                                        onsubmit="return validatePasswordChange(event)">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control w-100 rounded" id="current_password"
                                                        name="current_password" required>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="show_current_password">
                                                        <label class="form-check-label" for="show_current_password">
                                                            Hiển thị
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('current_password')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="new_password" class="form-label">Mật khẩu mới</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control w-100 rounded" id="new_password"
                                                        name="new_password" required>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="show_new_password">
                                                        <label class="form-check-label" for="show_new_password">
                                                            Hiển thị
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('new_password')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                <div id="newPasswordError" class="alert alert-danger mt-2"
                                                    style="display: none;"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirm_password" class="form-label">Nhập lại mật khẩu
                                                    mới</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control w-100 rounded" id="confirm_password"
                                                        name="confirm_password" required>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="show_confirm_password">
                                                        <label class="form-check-label" for="show_confirm_password">
                                                            Hiển thị
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('confirm_password')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                onclick="$('#changePasswordModal').modal('hide');">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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
                @include('sidebar')
            </div>
        </div>
    </div>
    <script>
        function validatePasswordChange(event) {
            var newPassword = document.getElementById('new_password').value;
            var confirmNewPassword = document.getElementById('confirm_password').value;

            if (newPassword !== confirmNewPassword) {
                document.getElementById('newPasswordError').style.display = 'block';
                document.getElementById('newPasswordError').innerHTML = 'Mật khẩu mới và xác nhận mật khẩu không khớp.';
                event.preventDefault();
                return false;
            } else {
                document.getElementById('newPasswordError').style.display = 'none';
            }
            return true;
        }

        // Toggle password visibility
        function togglePassword(inputId) {
            var input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }

        // Checkbox toggles password visibility using click event
        document.getElementById('show_current_password').addEventListener('click', function() {
            togglePassword('current_password');
        });

        document.getElementById('show_new_password').addEventListener('click', function() {
            togglePassword('new_password');
        });

        document.getElementById('show_confirm_password').addEventListener('click', function() {
            togglePassword('confirm_password');
        });
    </script>
@endsection
