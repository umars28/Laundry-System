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
                @if($transaction->paymentMethod->method == 'TRANSFER')
                <div class="col-md-6 col-sm-12 about-des">
                    <h4>Transfer ke salah satu akun kami !</h4>
                    @foreach($paymentMethod as $method)
                    <ul>
                        <li>{{ $method->bank_account }}</li>
                        <li>{{ $method->account_name }}</li>
                        <li>{{ $method->account_number }}</li>
                    </ul>
                    @endforeach
                </div>
                @else
                <div class="col-md-6 col-sm-12 about-des">
                   <h3>Silahkan Membayar di kantor kami</h3>
                    <ul>
                   <li>{{ $paymentMethod['COMPANY_NAME'] }}</li>
                   <li>{{ $paymentMethod['COMPANY_ADDRESS'] }}</li>
                   <li>{{ $paymentMethod['COMPANY_STREET'] }}</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- portfolio section -->
    <div id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <h2>Tambah Bukti Pembayaran</h2>
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
                    <form action="{{ route('confirmation.store.image', ['type' => $transaction->paymentMethod->method, 'invoice' => $transaction->invoice_number]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header mb-2">
                            <h4>Transaksi Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="image">Bukti Pembayaran</label>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
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
                            @if(!empty($transaction->total_berat))
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
                            <th scope="row">{{ $transaction->invoice_number }}</th>
                            <td>{{ $transaction->paket->type }}</td>
                            <td>{{ $transaction->price_total }}</td>
                            @if(!empty($transaction->total_berat))
                                <td>{{ $transaction->total_berat }}</td>
                            @else
                                <td>{{ $transaction->total_satuan }}</td>
                            @endif
                            <td>{{ $transaction->statusPesanan->status }}</td>
                            <td>{{ $transaction->paymentStatus->status }}</td>
                            <td>{{ $transaction->paymentMethod->method }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ URL::asset('js/main2.js')}}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.min.js')}}"></script>
@endpush

