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
                    @if(session('success'))
                        <div class="alert alert-danger">{{ session('success') }}</div>
                    @endif
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr class="alert-danger">
                            <th>Kode Invoice</th>
                            <th>Jenis Paket</th>
                            <th>Total Harga</th>
                            <th>Total Berat (kg)</th>
                            <th>Jumlah Satuan</th>
                            <th>Status Pesanan</th>
                            <th>Status Pembayaran</th>
                            <th>Metode Pembayaran</th>
                        </tr>
                        </thead>
                        <tbody class="alert-success">
                        @foreach($listTransaction as $showPesanan)
                        <tr>
                            <th scope="row">{{ $showPesanan->invoice_number }}</th>
                            <td>{{ $showPesanan->paket->type }}</td>
                            <td>Rp. {{ $showPesanan->price_total }}</td>
                            <td>{{ $showPesanan->total_berat ? : '-' }}</td>
                             <td>{{ $showPesanan->total_satuan ? : '-'}}</td>
                            <td>{{ $showPesanan->statusPesanan->status }}</td>
                            <td>{{ $showPesanan->paymentStatus->status }}</td>
                            <td>{{ $showPesanan->paymentMethod->method }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col">
                        <a href="{{ route('payment.confirmation') }}" class='btn btn-warning mr-2'>Tambah Bukti Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ URL::asset('js/main2.js')}}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.min.js')}}"></script>
@endpush
