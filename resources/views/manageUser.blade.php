@extends('layout-admin')
@section('content-admin')
    <!--start-top-serch-->
    <div id="search">
        <form action="{{ route('users.search') }}" method="get">
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
            <h1>Manage User</h1>
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
                        <div class="widget-title"> <span class="icon"><a href="{{url('addUser')}}"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>Add User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Picture</th>
                                        <th>Full name</th>
                                        <th>Cv</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Phone</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $user)
                                            <tr class="">
                                                <td>{{ $user->id }}</td>
                                                <td width='200'>
                                                    @if ($user->profile_picture)
                                                        <img class="img-fluid"
                                                            src="{{ asset('images/profile-picture/' . $user->profile_picture) }}"
                                                            alt="Profile Picture" width="100">
                                                    @else
                                                        <img src="{{ asset('images/profile-picture/user-default.jpg') }}"
                                                            alt="Default Profile Picture" width="100">
                                                    @endif
                                                </td>
                                                <td>{{ $user->fullname }}</td>
                                                <td>
                                                    @if ($user->cv)
                                                        <a href="{{ asset('images/cv/' . $user->cv) }}">Xem CV</a>
                                                    @else
                                                        No CV
                                                    @endif
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->password }}</td>
                                                <td>
                                                    @if ($user->phone)
                                                        {{ $user->phone }}
                                                    @else
                                                        No phone
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <a href='{{ route('user.edit', $user->id) }}' class='btn btn-success btn-mini'>Edit</a>
                                                    <a href="#" class='btn btn-danger btn-mini'
                                                        onclick="event.preventDefault(); if(confirm('Bạn có chắc muốn xóa user này không ?')){document.getElementById('delete-form-{{ $user->id }}').submit();}">Delete</a>
                                                    <form id="delete-form-{{ $user->id }}"
                                                        action="{{ route('users.delete', $user->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p class="text-center">No users found.</p>
                                    @endif
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
