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
            <h1>Add Admin</h1>
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
                            <form action="{{ route('admin.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                                        <input type="password" class="span11 @error('password') is-invalid @enderror" placeholder="Password" name="password" />
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
                                        <input type="text" class="span11 @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ old('phone') }}" />
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Picture :</label>
                                    <div class="controls">
                                        <input type="file" class="span11 @error('picture') is-invalid @enderror" name="picture" />
                                        @error('picture')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Role :</label>
                                    <div class="controls">
                                        <select class="span11 @error('role') is-invalid @enderror" name="role">
                                            <option value="viewer" {{ old('role') == 'viewer' ? 'selected' : '' }}>Viewer</option>
                                            <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>Editor</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Add Admin</button>
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
