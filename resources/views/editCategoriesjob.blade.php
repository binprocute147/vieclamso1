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
            <h1>Edit Job Categories</h1>
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
                            <form action="{{ route('jobCategories.update', $jobCategory->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="control-group">
                                    <label class="control-label">Name Job Categories :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('name') is-invalid @enderror" placeholder="Name Job Categories" name="name" value="{{ old('name', $jobCategory->name) }}" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image Job Categories :</label>
                                    <div class="controls">
                                        @if ($jobCategory->jobcategories_image)
                                            <img src="{{ asset('images/jobcategories_image/' . $jobCategory->jobcategories_image) }}" alt="jobcategories image" width="100" height="100">
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
