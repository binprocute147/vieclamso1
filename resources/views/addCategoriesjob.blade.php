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
            <h1>Add Job Category</h1>
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
                            <form action="{{ route('jobCategories.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">Name Job Category :</label>
                                    <div class="controls">
                                        <input type="text" id="name" class="span11 @error('fullname') is-invalid @enderror" placeholder="name" name="name" value="{{ old('name') }}" />
                                        @error('fullname')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="control-group">
                                    <label class="control-label">Image jobCategories :</label>
                                    <div class="controls">
                                        <input type="file" id="jobcategories_image" class="@error('image') is-invalid @enderror" name="jobcategories_image" />
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Add Job Category</button>
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
