@extends('admin.layouts.master')
@section('title')
    <title>Tambah Karyawan</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Karyawan</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Karyawan</a></li>
                        <li class="breadcrumb-item">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Tambah Karyawan</h4>
                        <form action="{{ route('admin.karyawan.store') }}" name="form-paket" method="POST" class='mt-3'>
                            @csrf
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" value="{{ old('name') }}" class='form-control @error('name') is-invalid @enderror'>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Username</label>
                                <div class="col-md-10">
                                    <input type="text" name="username" value="{{ old('username') }}" class='form-control @error('username') is-invalid @enderror'>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Email</label>
                                <div class="col-md-10">
                                    <input type="email" name="email" value="{{ old('email') }}" class='form-control @error('email') is-invalid @enderror'>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Nomor Handphone</label>
                                <div class="col-md-10">
                                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" class='form-control @error('phone_number') is-invalid @enderror'>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Alamat</label>
                                <div class="col-md-10">
                                    <input type="text" name="address" value="{{ old('address') }}" class='form-control @error('address') is-invalid @enderror'>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class='btn btn-primary float-right'>Submit</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
