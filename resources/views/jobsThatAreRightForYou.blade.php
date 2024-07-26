<div class="py-4">
    <div class="row bg-light rounded">
        <div class="col">
            <div class="ps-3 py-2">
                <h2>Việc làm phù hợp với bạn</h2>
                <div class="d-flex">
                    <p> Để nhận được gợi ý việc làm chính xác hơn, hãy</p>
                    <p class="ps-1 color-bg"> tùy chỉnh cài đặt gợi ý việc làm</p>.
                </div>
            </div>
            <div class="py-2">
                <div id="jobList">
                    @if (isset($jobs) && $jobs->count() > 0)
                        @foreach ($jobs as $job)
                            <div class="bg-job rounded mb-3">
                                <div class="row">
                                    <div class="col col-md-2">
                                        <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}"
                                            alt="#">
                                    </div>
                                    <div class="col-12 col-md-10 ps-3">
                                        <div class="d-flex">
                                            <h6 class="pt-3"><strong>{{ $job->name_job }}</strong>
                                            </h6>
                                            <p class="p-1 rounded ms-auto color-bg">
                                                {{ $job->min_salary }} -
                                                {{ $job->max_salary }} đ</p>
                                        </div>
                                        <p><strong>{{ $job->company_name }}</strong></p>
                                        <div class="d-flex">
                                            <p class="p-2 rounded content bg-content">
                                                {{ $job->location }}
                                            </p>
                                            <p class="ps-3"></p>
                                            <p class="p-2 rounded content bg-content">Còn
                                                <strong>10</strong> ngày để ứng tuyển
                                            </p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="p-2 content bg-content rounded">Cập nhật
                                                {{ $job->updated_at->diffForHumans() }}</p>
                                            <div class="ms-auto">
                                                <a class="text-decoration-none text-light py-2 px-4 rounded btn-content"
                                                    href="#">Ứng tuyển</a>
                                            </div>
                                            <div class="ms-3">
                                                <a class="bg-content p-1 rounded" href=""><i
                                                        class="fa-regular fa-heart"></i></a>
                                            </div>
                                            <div class="mx-3">
                                                <a class="text-decoration-none text-light p-1 rounded bg-content"
                                                    href="#"><i class="text-dark fa-solid fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">Không có công việc nào để hiển thị.</p>
                    @endif
                </div>
            </div>
            <div class="pt-4 pb-5 text-center">
                <a id="loadMoreJobs" class="text-decoration-none text-light rounded px-4 py-3 btn-content"
                    href="#">Xem tất cả việc làm phù hợp</a>
            </div>
        </div>
    </div>
</div>
{{-- js hiển thị tất cả các job bằng ajax --}}
<script>
    $(document).ready(function() {
        $('#loadMoreJobs').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('showJob') }}',
                method: 'GET',
                data: {
                    all: true
                },
                success: function(response) {
                    let jobsHtml = '';
                    response.forEach(function(job) {
                        jobsHtml += `
                        <div class="bg-job rounded mb-3">
                            <div class="row">
                                <div class="col col-md-2">
                                    <img class="img-fluid py-2" src="{{ asset('images/logocongty.png') }}" alt="#">
                                </div>
                                <div class="col-12 col-md-10 ps-3">
                                    <div class="d-flex">
                                        <h6 class="pt-3"><strong>${job.name_job}</strong></h6>
                                        <p class="p-1 rounded ms-auto color-bg">${job.min_salary} - ${job.max_salary} đ</p>
                                    </div>
                                    <p><strong>${job.company_name}</strong></p>
                                    <div class="d-flex">
                                        <p class="p-2 rounded content bg-content">${job.location}</p>
                                        <p class="ps-3"></p>
                                        <p class="p-2 rounded content bg-content">Còn <strong>10</strong> ngày để ứng tuyển</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="p-2 content bg-content rounded">Cập nhật ${job.updated_at}</p>
                                        <div class="ms-auto">
                                            <a class="text-decoration-none text-light py-2 px-4 rounded btn-content" href="#">Ứng tuyển</a>
                                        </div>
                                        <div class="ms-3">
                                            <a class="bg-content p-1 rounded" href=""><i class="fa-regular fa-heart"></i></a>
                                        </div>
                                        <div class="mx-3">
                                            <a class="text-decoration-none text-light p-1 rounded bg-content" href="#"><i class="text-dark fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    });
                    $('#jobList').html(jobsHtml);
                }
            });
        });
    });
</script>
