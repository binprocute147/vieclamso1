@extends('layout-admin')
@section('content-admin')
    <!--start-top-serch-->
    <div id="search">
        <form action="{{ route('jobs.search') }}" method="get">
            <input type="text" name="search" placeholder="Search here..." />
            <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
        </form>
    </div>
    <!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/dashboard') }}" title="Go to Home" class="tip-bottom current"><i
                        class="icon-home"></i>
                    Home</a></div>
            <h1>Manage Jobs</h1>
        </div>
        <div class="container-fluid">
            {{-- hiển thị thông báo thành công hoặc thất bại --}}
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
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="{{ asset('addJob') }}"> <i
                                        class="icon-plus"></i>
                                </a></span>
                            <h5>Add Job</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Company image</th>
                                        <th>Name job</th>
                                        <th>Job Category</th>
                                        <th>Description</th>
                                        <th>Company name</th>
                                        <th>Requirements</th>
                                        <th>Min salary</th>
                                        <th>Max salary</th>
                                        <th>Location</th>
                                        <th>Address</th>
                                        <th>Experience</th>
                                        <th>Quantity</th>
                                        <th>Gender</th>
                                        <th>Job type</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jobs->count() > 0)
                                        @foreach ($jobs as $job)
                                            <tr class="">
                                                <td>{{ $job->id }}</td>
                                                <td width='250'>
                                                    @if ($job->company_image)
                                                        <img src="{{ asset('images/company_image/' . $job->company_image) }}"
                                                            alt="Company Image">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>{{ $job->name_job }}</td>
                                                <td>
                                                    @if ($job->category)
                                                        {{ $job->category->name }}
                                                    @else
                                                        No Category
                                                    @endif
                                                </td>
                                                <td>{{ $job->description }}</td>
                                                <td>{{ $job->company_name }}</td>
                                                <td>{{ $job->requirements }}</td>
                                                <td>{{ $job->min_salary }}</td>
                                                <td>{{ $job->max_salary }}</td>
                                                <td>{{ $job->location }}</td>
                                                <td>{{ $job->address }}</td>
                                                <td>{{ $job->experience }}</td>
                                                <td>{{ $job->quantity }}</td>
                                                <td>{{ $job->gender }}</td>
                                                <td>{{ $job->job_type }}</td>
                                                <td>{{ $job->created_at }}</td>
                                                <td>
                                                    <a href='{{ route('job.edit', $job->id) }}'
                                                        class='btn btn-success btn-mini'>Edit</a>
                                                    <a href="#" class='btn btn-danger btn-mini'
                                                        onclick="event.preventDefault(); if(confirm('Bạn có chắc muốn xóa công việc này không ?')){document.getElementById('delete-form-{{ $job->id }}').submit();}">Delete</a>
                                                    <form id="delete-form-{{ $job->id }}"
                                                        action="{{ route('jobs.delete', $job->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p class="text-center">No jobs found.</p>
                                    @endif
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px; color: red">
                                {{ $jobs->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
