@extends('layouts.master')
@section('title', 'Dtech')
@section('content')
    <!-- home section -->
    <div id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-3"></div>
                <div class="col-md-7 col-sm-9">
                    <h3>{{ config('web_config')['MAIN_CONTENT_TITLE'] }}</h3>
                    <h1>{{ config('web_config')['MAIN_CONTENT_DESCRIPTION'] }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- portfolio section -->
    <div id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <h2>Konfirmasi Pesanan</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- about section -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                        <form action="{{ route('payment.confirmation.store') }}" method="post">
                            @csrf
                            <div class="card-header mb-2">
                                <h4>Transaksi Pesanan</h4>
                            </div>
                            <div class="card-body">
{{--                                <div class="form-group">--}}
{{--                                    <label for="image">Image</label>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">--}}
{{--                                    @error('image')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="name">Kode Invoice</label>
                                    <input name="invoice_number" type="text" value="{{ old('invoice_number') }}" class="form-control @error('invoice_number') is-invalid @enderror" placeholder="masukan Kode Invoice" id="name">
                                    @error('invoice_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Metode Pembayaran</label>
                                    <select class="form-control @error('metode_pembayaran') is-invalid @enderror" name="metode_pembayaran">
                                        <option value=""></option>
                                        @foreach($paymentMethod as $method)
                                            <option value="{{ $method->id }}">{{ $method->method }}</option>
                                        @endforeach
                                    </select>
                                    @error('metode_pembayaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-default mb-3">Tambah</button>
                                </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ URL::asset('js/main2.js')}}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.min.js')}}"></script>
@endpush
