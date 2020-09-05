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
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr class="alert-danger">
                            <th>Kode Invoice</th>
                            <th>Jenis Paket</th>
                            <th>Total Harga</th>
                            @if(!empty($showPesanan->total_berat))
                            <th>Total Berat (kg)</th>
                            @else
                            <th>Jumlah Satuan</th>
                            @endif
                            <th>Status Pesanan</th>
                            <th>Status Pembayaran</th>
                            <th>Metode Pembayaran</th>
                        </tr>
                        </thead>
                        <tbody class="alert-success">
                            <tr>
                                <th scope="row">{{ $showPesanan->invoice_number }}</th>
                                <td>{{ $showPesanan->paket->type }}</td>
                                <td>{{ $showPesanan->price_total }}</td>
                                @if(!empty($showPesanan->total_berat))
                                <td>{{ $showPesanan->total_berat }}</td>
                                @else
                                <td>{{ $showPesanan->total_satuan }}</td>
                                @endif
                                <td>{{ $showPesanan->statusPesanan->status }}</td>
                                <td>{{ $showPesanan->paymentStatus->status }}</td>
                                <td>{{ $showPesanan->paymentMethod->method }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col">
                            <a href="{{ route('payment.confirmation') }}" class='btn btn-warning mr-2'>Tambah Bukti Pembayaran</a>
                        <form action="{{ route('transaction.cancel', $showPesanan->id) }}" method="POST">
                            @csrf
                            <button type="button" class='btn btn-danger btn-delete'>Cancel Pesanan</button>
                        </form>
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
