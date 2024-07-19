@extends('home')
@section('content')
    <div class="bg-content banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 py-4">
                    <div class="bg-light rounded py-3 ps-3">
                        <h3 class="py-3">Thay đổi mật khẩu đăng nhập</h3>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('change.password') }}" method="POST" class="me-3">
                            @csrf
                            <div class="row mb-3 align-items-center">
                                <label for="email" class="col-md-3 col-form-label">Email đăng nhập</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label for="current_password" class="col-md-3 col-form-label">Mật khẩu hiện tại</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label for="new_password" class="col-md-3 col-form-label">Mật khẩu mới</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required>
                                    @error('new_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label for="confirm_password" class="col-md-3 col-form-label">Nhập lại mật khẩu mới</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" required>
                                    @error('confirm_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('sidebar')
            </div>
        </div>
    </div>
@endsection