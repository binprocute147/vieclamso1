@extends('home')
<style>
    .bg-job {
        background: #edffe8;
    }
</style>
@section('content')
    <div class="bg-content banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 py-2">
                    <div class="py-3">
                        <div class="row bg-light rounded py-3">
                            <div class="col text-center">
                                <h3 class="py-3">Chưa có Nhà tuyển dụng nào xem hồ sơ của bạn</h3>
                                <div class="d-flex justify-content-center">
                                    <p>Để nhận được cơ hội việc làm từ Nhà tuyển dụng, hãy <a href=""
                                            class="px-1 text-decoration-none color-bg">viết CV</a> và <a href=""
                                            class="px-1 text-decoration-none color-bg">cài đặt gợi ý việc làm</a>.</p>
                                </div>
                                <div class="d-flex py-3 justify-content-center">
                                    <a class="text-decoration-none text-light rounded px-3 py-2 btn-content"
                                        href="">Viết
                                        CV</a>
                                    <p class="px-1"></p>
                                    <a class="text-decoration-none text-light rounded px-3 py-2 btn-content"
                                        href="">Cài đặt
                                        gợi ý việc làm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('jobsThatAreRightForYou', ['jobs' => $jobs])
                </div>
                @include('sidebar')
            </div>
        </div>
    </div>
@endsection
