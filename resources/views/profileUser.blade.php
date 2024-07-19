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
                    </div>
                </div>
                @include('sidebar')
            </div>
        </div>
    </div>
@endsection
