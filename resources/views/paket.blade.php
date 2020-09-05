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

    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 about-des">
                    <h4>Deskripsi Paket</h4>
                    <ul>
                        <li>Nama Paket : {{ $paket->type }}</li>
                        <li>Deskripsi Paket : {{ $paket->description }}</li>
                        <li>Harga Paket : {{ $paket->price_kg }} /kg</li>
                        <li>Harga Paket : {{ $paket->price_satuan }} /satuan</li>
                        <br>
                        @if($paket->is_promo == 1)
                            <li>Sedang Promo</li>
                        <li>Nama Promo : {{ $paket->promo_name }}</li>
                        <li>Kode Promo : {{ $paket->promo_code }}</li>
                        <li>Harga Promo : {{ $paket->promo_price }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ URL::asset('js/main2.js')}}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.min.js')}}"></script>
@endpush

