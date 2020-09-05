@extends('admin.layouts.master')
@section('title')
    <title>Edit Setting</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Setting</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Setting</a></li>
                        <li class="breadcrumb-item">Edit Setting</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Setting</h4>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('site.setting.update') }}" method="POST" class='mt-3' enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Main Content Title</label>
                                <div class="col-md-10">
                                        <input type="text" name="main_content_title" value="{{ config('web_config')['MAIN_CONTENT_TITLE'] ,old('main_content_title') }}" class='form-control @error('main_content_title') is-invalid @enderror'>
                                    @error('main_content_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Main Content Description</label>
                                <div class="col-md-10">
                                    <input type="text" name="main_content_description" value="{{ config('web_config')['MAIN_CONTENT_DESCRIPTION'] ,old('main_content_description') }}" class='form-control @error('main_content_description') is-invalid @enderror'>
                                    @error('main_content_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class='col-md-2 col-form-label'>Main Content Background</label>
                                <div class="col-md-10">
                                    <img src="{{ config('web_config')['MAIN_CONTENT_BACKGROUND'] ? Storage::url('images/setting/'.config('web_config')['MAIN_CONTENT_BACKGROUND']) : '' }}" class="img-responsive" width="25%" alt="{{ config('web_config')['MAIN_CONTENT_BACKGROUND'] }}">
                                    <input type="file" class="form-control" name="main_content_background">
                                    @error('main_content_background')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class='col-md-2 col-form-label'>Image Logo</label>
                                <div class="col-md-10">
                                    <img src="{{ config('web_config')['IMAGE_LOGO'] ? Storage::url('images/setting/'.config('web_config')['IMAGE_LOGO']) : '' }}" class="img-responsive" width="25%" alt="{{ config('web_config')['IMAGE_LOGO'] }}">
                                    <input type="file" class="form-control" name="image_logo">
                                    @error('main_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class='col-md-2 col-form-label'>Image Pavicon</label>
                                <div class="col-md-10">
                                    <img src="{{ config('web_config')['IMAGE_PAVICON'] ? Storage::url('images/setting/'.config('web_config')['IMAGE_PAVICON']) : '' }}" class="img-responsive" width="25%" alt="{{ config('web_config')['IMAGE_PAVICON'] }}">
                                    <input type="file" class="form-control" name="image_pavicon">
                                    @error('image_pavicon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Company Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="company_name" value="{{ config('web_config')['COMPANY_NAME'] ,old('company_name') }}" class='form-control @error('company_name') is-invalid @enderror'>
                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Company Address</label>
                                <div class="col-md-10">
                                    <input type="text" name="company_address" value="{{ config('web_config')['COMPANY_ADDRESS'] ,old('company_address') }}" class='form-control @error('company_address') is-invalid @enderror'>
                                    @error('company_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Company Street</label>
                                <div class="col-md-10">
                                    <input type="text" name="company_street" value="{{ config('web_config')['COMPANY_STREET'] ,old('company_street') }}" class='form-control @error('company_street') is-invalid @enderror'>
                                    @error('company_street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @if(Auth::user()->role == 'admin')
                            <button type="submit" class='btn btn-primary float-right'>Update</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
