<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
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
                <h1 class="bg-text">Chào mừng bạn đã quay trở lại</h1>
                <p>Cùng xây dựng một hồ sơ nổi bật và nhận được các cơ hội sự nghiệp lý tưởng</p>
                <form class="py-2">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu của bạn">
                    </div>
                    <div class="d-flex justify-content-end mb-3 py-3">
                        <a href="#" class="text-decoration-none bg-text">Quên mật khẩu?</a>
                    </div>
                    <button type="submit" class="btn bg-btn w-100 text-light">Đăng nhập</button>
                    <div class="mt-3 text-center">
                        <p>Hoặc đăng nhập bằng</p>
                        <div class="row">
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-danger w-100 my-1">
                                    <i class="fab fa-google"></i> Google
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-primary w-100 my-1">
                                    <i class="fab fa-facebook"></i> Facebook
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-info w-100 my-1">
                                    <i class="fab fa-linkedin"></i> LinkedIn
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 text-center">
                        <p>Bạn chưa có tài khoản? <a href="{{url('/register')}}" class="text-decoration-none bg-text">Đăng ký
                                ngay</a></p>
                    </div>
                    <hr>
                    <p class="my-3 text-center"><strong> Bạn gặp khó khăn khi tạo tài khoản?</strong></p>
                    <div class="d-flex justify-content-center">
                        <p> Vui lòng gọi tới số </p>
                        <p class="bg-text px-1"> (024) 6680 5588 </p>
                        <p> (giờ hành chính).</p>
                    </div>
                </form>
                <div class="pt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col pt-5 pb-3 text-center bg-text">
                                <p> <strong>&copy; 2016. All Rights Reserved. Vieclamso1 Vietnam JSC.</strong> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 bg-vieclamso1">
                <div class="text-light ps-3">
                    <h1 class="title">Viec lam so1</h1>
                    <h4>Kênh thông tin - việc 
                        làm số 1 tại Việt Nam</h4>
                    <p>Vieclamso1 - Hệ sinh thái nhân sự tiên phong 
                        ứng dụng công nghệ tại Việt Nam</p>
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
