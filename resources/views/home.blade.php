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

    <!-- divider section -->
    <div class="divider">
        <div class="container">
            <div class="row">
                @foreach($listPaket as $paket)
                <div class="col-md-4 col-sm-6">
                    <div class="divider-wrapper divider-{{ $loop->iteration }}">
                        <a href="{{ route('paket.show', $paket->id) }}">
                        <h2>{{ $paket->type }}</h2>
                        </a>
                        <p>{{ $paket->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- about section -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img src="{{ URL::asset('images/about-img.jpg') }}" class="img-responsive" alt="about img">
                </div>
                <div class="col-md-6 col-sm-12 about-des">
                    <h2>About Business</h2>
                    <h4>{{ $about->title }}</h4>
                    <p>{{ $about->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- portfolio section -->
    <div id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <h2>Transaksi</h2>
                </div>
            </div>

            <div class="row mt30">

                <form action="{{ route('transaction.confirmation') }}" method="post">
                    @csrf
                    <div class="card-header mb-2">
                        <h4>Transaksi Pesanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Paket</label>
                            <select class="form-control @error('paket') is-invalid @enderror" name="paket">
                                <option value=""></option>
                                @foreach($listPaket as $paket)
                                <option value="{{ $paket->id }}">{{ $paket->type }}</option>
                                @endforeach
                            </select>
                            @error('paket')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Berat / Satuan</label>
                            <select class="form-control @error('select') is-invalid @enderror" name="select">
                                <option value=""></option>
                                <option value="berat">Berat</option>
                                <option value="satuan">Satuan</option>
                            </select>
                            @error('select')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total_berat">Berat (kg)</label>
                            <input name="total_berat" type="number" value="{{ old('total_berat') }}" class="form-control @error('total_berat') is-invalid @enderror" id="total_berat" placeholder="masukan berat">
                            @error('total_berat')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Total (Satuan)</label>
                            <input name="total_satuan" type="number" value="{{ old('total_satuan') }}" class="form-control @error('total_satuan') is-invalid @enderror" placeholder="masukan jumlah satuan" id="total_berat">
                            @error('total_satuan')
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
                            <button type="submit" name="submit" class="btn btn-default mb-3">Pesan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
