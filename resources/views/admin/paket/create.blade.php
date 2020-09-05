@extends('admin.layouts.master')
@section('title')
    <title>Tambah Paket</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Paket</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Paket</a></li>
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
                        <h4 class="mt-0 header-title">Tambah Paket</h4>
                        <form action="{{ route('admin.paket.store') }}" name="form-paket" method="POST" class='mt-3'>
                            @csrf
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Jenis</label>
                                <div class="col-md-10">
                                    <input type="text" name="type" value="{{ old('type') }}" class='form-control @error('type') is-invalid @enderror'>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Deskripsi</label>
                                <div class="col-md-10">
                                    <textarea name="description" id="" rows="5" class="form-control  @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Harga / kg</label>
                                <div class="col-md-10">
                                    <input type="number" value="{{ old('price_kg') }}" name="price_kg" class='form-control @error('price_kg') is-invalid @enderror'>
                                    @error('price_kg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <p class="btn btn-danger mt-2">Example : Rp. 20000</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Harga Satuan</label>
                                <div class="col-md-10">
                                    <input type="number" value="{{ old('price_satuan') }}" name="price_satuan" class='form-control @error('price_satuan') is-invalid @enderror'>
                                    @error('price_satuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <p class="btn btn-danger mt-2">Example : Rp. 20000</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="check" class='col-md-2 col-form-label'>Promo</label>
                                <div class="col-md-1">
                                    <input type="checkbox" id="check" name="is_promo" value="1" class='form-control'>
                                </div>
                                <div class="row">
                                <p class="btn btn-danger mt-1">Harap dicentang jika menggunakan promo</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Nama Promo</label>
                                <div class="col-md-10">
                                    <input type="text" name="promo_name" value="{{ old('promo_name') }}" class='form-control @error('promo_name') is-invalid @enderror'>
                                    @error('promo_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Kode Promo</label>
                                <div class="col-md-10">
                                    <input type="text" name="promo_code" value="{{ old('promo_code') }}" class='form-control @error('promo_code') is-invalid @enderror'>
                                    @error('promo_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Harga Promo</label>
                                <div class="col-md-10">
                                    <input type="number" name="promo_price" value="{{ old('promo_price') }}" class='form-control @error('promo_price') is-invalid @enderror'>
                                    @error('promo_price')
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
