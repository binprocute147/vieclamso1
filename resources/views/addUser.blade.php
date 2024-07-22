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
            <h1>Add User</h1>
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
                            <form action="{{ route('user.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">Full name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('fullname') is-invalid @enderror" placeholder="Full name" name="fullname" value="{{ old('fullname') }}" />
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
                                        <input type="text" class="span11 @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Password :</label>
                                    <div class="controls">
                                        <input type="password" class="span11 @error('pass') is-invalid @enderror" placeholder="Password" name="pass" />
                                        @error('pass')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Phone :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ old('phone') }}" />
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose profile picture :</label>
                                    <div class="controls">
                                        <input type="file" class="@error('image') is-invalid @enderror" name="image" />
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose CV :</label>
                                    <div class="controls">
                                        <input type="file" class="@error('cv') is-invalid @enderror" name="cv" />
                                        @error('cv')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Add User</button>
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
