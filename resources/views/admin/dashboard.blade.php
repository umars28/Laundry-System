@extends('admin.layouts.master')
@section('title')
    <title>Dashboard</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            Welcome to {{config('web_config')['COMPANY_NAME']}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-transfer float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3">Total Transaksi</h6>
                            <h4 class="mb-4">{{ $totalTransaksi }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-database float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3">Total Paket</h6>
                            <h4 class="mb-4">{{ $totalPaket }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-account float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3">Total Karyawan</h6>
                            <h4 class="mb-4">{{ $totalKaryawan }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-account-card-details float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3">Total Customer</h6>
                            <h4 class="mb-4">{{ $totalCustomer }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">

            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Latest Transaction</h4>

                        <div class="table-responsive mt-5">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Customer</th>
                                    <th>Paket</th>
                                    <th>Kode Invoice</th>
                                    <th>Total Harga</th>
                                    <th>Total Berat</th>
                                    <th>Total Satuan</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Status Pesanan</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latestTransaction as $transaction)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $transaction->customer->username }}</td>
                                        <td>{{ $transaction->paket->type }}</td>
                                        <td>{{ $transaction->invoice_number }}</td>
                                        <td>Rp. {{ $transaction->price_total }}</td>
                                        <td>{{ $transaction->total_berat ? : '0' }} Kg</td>
                                        <td>{{ $transaction->total_satuan ? : '0' }} Satuan</td>
                                        <td>{{ $transaction->paymentMethod->method }}</td>
                                        <td>{{ $transaction->statusPesanan->status }} </br>
                                            @if(Auth::user()->role == 'karyawan')
                                                @if($transaction->statusPesanan->status != 'selesai')
                                                    <a href="{{ route('admin.status.pesanan.edit', $transaction->id) }}" class='btn mce-btn-small alert alert-danger'>Change</a>
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $transaction->paymentStatus->status }} <br>
                                            @if(Auth::user()->role == 'admin')
                                                @if($transaction->paymentStatus->status != 'paid')
                                                    <a href="{{ route('admin.transaction.edit', $transaction->id) }}" class='btn mce-btn-small alert alert-danger'>Change</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @forelse($latestTransaction as $transaction)
                                @empty
                                    <tr>
                                        <td colspan="11" class="alert-danger mt-3 text-center">No Data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->
        <!-- end row -->

    </div> <!-- container-fluid -->
@endsection
