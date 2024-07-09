<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register</title>
    <style>
        .welcome {
            padding-top: 100px;
            padding-left: 100px;
        }

        .bg-text {
            color: rgb(46, 232, 0) !important;
        }

        .bg-btn {
            background: rgb(46, 232, 0) !important;
        }

        .bg-vieclamso1 {
            background: #125b00 !important;
        }

        .title {
            font-size: 3em;
            padding-top: 350px;
        }

        @media (max-width: 767px) {
            .welcome {
                text-align: center;
                padding-top: 50px;
                padding-left: 0;
            }

            .title {
                padding-top: 50px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 welcome">
                <h1 class="bg-text">Chào mừng bạn đến với Vieclamso1</h1>
                <p>Cùng xây dựng một hồ sơ nổi bật và nhận được các cơ hội sự nghiệp lý tưởng</p>
                <form class="py-2" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname') }}" placeholder="Nhập họ tên" required>
                        @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Nhập email của bạn" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu của bạn" required>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-btn w-100 text-light py-2">Đăng ký</button>
                    <div class="my-3 text-center">
                        <p>Bạn đã có tài khoản? <a href="{{ url('/login') }}" class="text-decoration-none bg-text">Đăng nhập ngay</a></p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                </form>                                
            </div>
            <div class="col-12 col-md-4 bg-vieclamso1">
                <div class="text-light ps-3">
                    <h1 class="title">Viec lam so1</h1>
                    <h4>Kênh thông tin - việc làm số 1 tại Việt Nam</h4>
                    <p>Vieclamso1 - Hệ sinh thái nhân sự tiên phong ứng dụng công nghệ tại Việt Nam</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
