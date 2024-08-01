@extends('home')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">Chọn Mẫu CV</h1>
        <div class="row g-4">
            @foreach ($templates as $key => $template)
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center mb-3">{{ $template['template_name'] }}</h5>
                            <p class="card-text text-center mb-4">
                                Mẫu CV hiện đại, chuyên nghiệp và dễ dàng tùy chỉnh. Thích hợp cho nhiều ngành nghề.
                            </p>
                            <a href="{{ route('cv.createFromTemplate', $key) }}" class="btn btn-primary mt-auto">
                                Tạo CV từ mẫu
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
