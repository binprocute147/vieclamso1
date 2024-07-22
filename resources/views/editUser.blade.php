@extends('layout-admin')

<style>
    .is-invalid {
        border-color: #dc3545 !important; 
    }

    .invalid-feedback {
        color: red !important;
        display: block !important;
    }
</style>

@section('content-admin')
    <!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('/dashboard') }}" title="Go to Home" class="tip-bottom current">
                    <i class="icon-home"></i> Home
                </a>
            </div>
            <h1>Edit User</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form action="{{ route('user.update', $user->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="control-group">
                                    <label class="control-label">Full name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('fullname') is-invalid @enderror" placeholder="Full name" name="fullname" value="{{ old('fullname', $user->fullname) }}" />
                                        @error('fullname')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Email :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email', $user->email) }}" />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">New Password :</label>
                                    <div class="controls">
                                        <input type="password" class="span11 @error('password') is-invalid @enderror" placeholder="New Password" name="password" />
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Phone :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ old('phone', $user->phone) }}" />
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Cv :</label>
                                    <div class="controls">
                                        @if ($user->cv)
                                            <a href="{{ asset('images/cv/' . $user->cv) }}" target="_blank">Xem CV hiện tại</a>
                                        @endif
                                        <input type="file" class="span11" name="cv" />
                                        @error('cv')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Profile Image :</label>
                                    <div class="controls">
                                        @if ($user->profile_picture)
                                            <img src="{{ asset('images/profile-picture/' . $user->profile_picture) }}" alt="Profile Image" width="100" height="100">
                                        @endif
                                        <input type="file" class="span11" name="image" />
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
