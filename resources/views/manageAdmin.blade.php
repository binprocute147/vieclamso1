@extends('layout-admin')
@section('content-admin')
    <!--start-top-serch-->
    <div id="search">
        <form action="{{ route('admins.search') }}" method="get">
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
            <h1>Manage Admin</h1>
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
                        <div class="widget-title">
                            @can('createAdmin', App\Models\Admin::class)
                                <span class="icon">
                                    <a href="{{ url('addAdmin') }}">
                                        <i class="icon-plus"></i>
                                    </a>
                                </span>
                            @endcan
                            <h5>Add Admin</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Picture</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Permissions</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($admins->count() > 0)
                                        @foreach ($admins as $admin)
                                            <tr class="">
                                                <td>{{ $admin->id }}</td>
                                                <td width='200'>
                                                    @if ($admin->picture)
                                                        <img class="img-fluid"
                                                            src="{{ asset('images/picture-admin/' . $admin->picture) }}"
                                                            alt="Picture Admin" width="100">
                                                    @else
                                                        <img src="{{ asset('images/picture-admin/admin.jpg') }}"
                                                            alt="Default Profile Picture" width="100">
                                                    @endif
                                                </td>
                                                <td>{{ $admin->fullname }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->password }}</td>
                                                <td>
                                                    @if ($admin->phone)
                                                        {{ $admin->phone }}
                                                    @else
                                                        No phone
                                                    @endif
                                                </td>
                                                <td>{{ $admin->role }}</td>
                                                <td>
                                                    {{ $admin->permissions }}
                                                    @can('changeAdminPermissions', $admin)
                                                        <form action="{{ url('updateAdminPermissions/' . $admin->id) }}" method="POST">
                                                            @csrf
                                                            <select name="permissions" class="form-control">
                                                                <option value="full_access" {{ $admin->permissions === 'full_access' ? 'selected' : '' }}>Full Access</option>
                                                                <option value="edit_delete_except_admin" {{ $admin->permissions === 'edit_delete_except_admin' ? 'selected' : '' }}>Edit/Delete Except Admin</option>
                                                                <option value="view_only" {{ $admin->permissions === 'view_only' ? 'selected' : '' }}>View Only</option>
                                                            </select>
                                                            <button type="submit" class="btn btn-primary btn-mini">Update</button>
                                                        </form>
                                                    @endcan
                                                </td>
                                                <td>{{ $admin->created_at }}</td>
                                                <td>
                                                    @can('updateAdmin', $admin)
                                                        <a href="{{ url('editAdmin/' . $admin->id) }}" class='btn btn-success btn-mini'>Edit</a>
                                                    @else
                                                        <a href="#" class='btn btn-success btn-mini' onclick="alert('Bạn không có quyền thực hiện chức năng này')">Edit</a>
                                                    @endcan

                                                    @can('deleteAdmin', $admin)
                                                        <a href="" class='btn btn-danger btn-mini' onclick="event.preventDefault(); if(confirm('Bạn có chắc muốn xóa admin này không ?')){document.getElementById('delete-form-{{ $admin->id }}').submit();}">Delete</a>
                                                        <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete', $admin->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @else
                                                        <a href="#" class='btn btn-danger btn-mini' onclick="alert('Bạn không có quyền thực hiện chức năng này')">Delete</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p class="text-center">No admins found.</p>
                                    @endif
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px; color: red">
                                {{ $admins->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
