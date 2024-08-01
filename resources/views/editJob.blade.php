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
            <h1>Edit Job</h1>
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
                            <form action="{{ route('job.update', $job->id) }}" method="POST" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="control-group">
                                    <label class="control-label">Job Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('name_job') is-invalid @enderror"
                                            placeholder="Job Name" name="name_job"
                                            value="{{ old('name_job', $job->name_job) }}" />
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
                                        <textarea class="span11 @error('description') is-invalid @enderror" placeholder="Description" name="description">{{ old('description', $job->description) }}</textarea>
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
                                            value="{{ old('company_name', $job->company_name) }}" />
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
                                            @foreach ($categoriesJob as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == old('job_category_id', $job->job_category_id) ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
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
                                        <textarea class="span11 @error('requirements') is-invalid @enderror" placeholder="Requirements" name="requirements">{{ old('requirements', $job->requirements) }}</textarea>
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
                                            placeholder="Min Salary" name="min_salary"
                                            value="{{ old('min_salary', $job->min_salary) }}" />
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
                                            placeholder="Max Salary" name="max_salary"
                                            value="{{ old('max_salary', $job->max_salary) }}" />
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
                                            placeholder="Location" name="location"
                                            value="{{ old('location', $job->location) }}" />
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
                                            placeholder="Address" name="address"
                                            value="{{ old('address', $job->address) }}" />
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
                                        <textarea class="span11 @error('experience') is-invalid @enderror" placeholder="Experience" name="experience">{{ old('experience', $job->experience) }}</textarea>
                                        @error('experience')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Quantity :</label>
                                    <div class="controls">
                                        <input type="number" class="span11 @error('quantity') is-invalid @enderror"
                                            placeholder="Quantity" name="quantity"
                                            value="{{ old('quantity', $job->quantity) }}" />
                                        @error('quantity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Gender :</label>
                                    <div class="controls">
                                        <select name="gender" class="span11 @error('gender') is-invalid @enderror">
                                            <option value="">-- Select Gender --</option>
                                            <option value="Nam" {{ old('gender', $job->gender) == 'Nam' ? 'selected' : '' }}>Nam</option>
                                            <option value="Nữ" {{ old('gender', $job->gender) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                            <option value="Khác" {{ old('gender', $job->gender) == 'Khác' ? 'selected' : '' }}>Khác</option>
                                            <option value="Không yêu cầu" {{ old('gender', $job->gender) == 'Không yêu cầu' ? 'selected' : '' }}>Không yêu cầu</option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>                                                                

                                <div class="control-group">
                                    <label class="control-label">Job Type :</label>
                                    <div class="controls">
                                        <input type="text" class="span11 @error('job_type') is-invalid @enderror"
                                            placeholder="Job Type" name="job_type"
                                            value="{{ old('job_type', $job->job_type) }}" />
                                        @error('job_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Company Image :</label>
                                    <div class="controls">
                                        @if ($job->company_image)
                                            <img src="{{ asset('images/company_image/' . $job->company_image) }}"
                                                width="100" height="100" alt="Company Image">
                                        @endif
                                        @error('company_image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="file" name="company_image"
                                            class="span11 @error('company_image') is-invalid @enderror" />
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Update Job</button>
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
