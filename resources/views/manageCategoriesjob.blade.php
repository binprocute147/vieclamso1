@extends('layout-admin')
@section('content-admin')
    <!--start-top-serch-->
    <div id="search">
        <form action="{{ route('jobCategories.search') }}" method="get">
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
            <h1>Manage JobCategories</h1>
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
                        <div class="widget-title"> <span class="icon"><a href="{{asset('addCategoriesjob')}}"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>Add JobCategories</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Jobcategories image</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jobCategories->count() > 0)
                                        @foreach ($jobCategories as $row)
                                            <tr class="">

                                                <td>{{ $row->id }}</td>
                                                <td width='250'>
                                                    @if ($row->jobcategories_image)
                                                        <img src="{{ asset('images/jobcategories_image/' . $row->jobcategories_image) }}"
                                                            alt="Jobcategories Image">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->created_at }}</td>
                                                <td>
                                                    <a href='{{ route('jobCategories.edit', $row->id) }}' class='btn btn-success btn-mini'>Edit</a>
                                                    <a href="#" class='btn btn-danger btn-mini'
                                                        onclick="event.preventDefault(); if(confirm('Bạn có chắc muốn xóa danh mục công việc này không ?')){document.getElementById('delete-form-{{ $row->id }}').submit();}">Delete</a>
                                                    <form id="delete-form-{{ $row->id }}"
                                                        action="{{ route('jobCategories.delete', $row->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p class="text-center">No jobcategories found.</p>
                                    @endif
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px; color: red">
                                {{ $jobCategories->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
