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
            <h1>Add Job</h1>
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
                            <form action="{{ route('storeJob') }}" method="POST" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">Job Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('name_job') is-invalid @enderror"
                                            placeholder="Job Name" name="name_job" value="{{ old('name_job') }}" />
                                        @error('name_job')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Description :</label>
                                    <div class="controls">
                                        <textarea class="span11 @error('description') is-invalid @enderror" placeholder="Description" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Company Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('company_name') is-invalid @enderror"
                                            placeholder="Company Name" name="company_name"
                                            value="{{ old('company_name') }}" />
                                        @error('company_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Job Category :</label>
                                    <div class="controls">
                                        <select name="job_category_id"
                                            class="span11 @error('job_category_id') is-invalid @enderror">
                                            @foreach ($caterogiesJob as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('job_category_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Requirements :</label>
                                    <div class="controls">
                                        <textarea class="span11 @error('requirements') is-invalid @enderror" placeholder="Requirements" name="requirements">{{ old('requirements') }}</textarea>
                                        @error('requirements')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Min Salary :</label>
                                    <div class="controls">
                                        <input type="number" class="span11 @error('min_salary') is-invalid @enderror"
                                            placeholder="Min Salary" name="min_salary" value="{{ old('min_salary') }}" />
                                        @error('min_salary')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Max Salary :</label>
                                    <div class="controls">
                                        <input type="number" class="span11 @error('max_salary') is-invalid @enderror"
                                            placeholder="Max Salary" name="max_salary" value="{{ old('max_salary') }}" />
                                        @error('max_salary')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Location :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('location') is-invalid @enderror"
                                            placeholder="Location" name="location" value="{{ old('location') }}" />
                                        @error('location')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('address') is-invalid @enderror"
                                            placeholder="Address" name="address" value="{{ old('address') }}" />
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Experience :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('experience') is-invalid @enderror"
                                            placeholder="Experience" name="experience" value="{{ old('experience') }}" />
                                        @error('experience')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Company Image :</label>
                                    <div class="controls">
                                        <input type="file" class="span11 @error('company_image') is-invalid @enderror"
                                            name="company_image" />
                                        @error('company_image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Add Job</button>
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
