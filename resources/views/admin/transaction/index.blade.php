@extends('admin.layouts.master')
@section('title')
    <title>Daftar Transaksi</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Transaksi</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Transaksi</a></li>
                    </ol>


                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 mb-2 header-title">Daftar Transaksi</h4>
                        <div class="row mb-3">
                            @if(!empty($paymentStatus))
                                {{--                            @if(isset($pesanan))--}}{{-- sama dengan yang diatas--}}
                                <div class="col-md-8 ml-2 mb-6 text-center">
                                    <form action="{{ route('admin.transaction.update', $status->id) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Status Pembayaran</label>
                                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                                <option value=""></option>
                                                @foreach($paymentStatus as $statuses)
                                                    <option value="{{ $statuses->id }}">{{ $statuses->status }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <a href="{{ route('admin.transaction') }}" class="btn btn-warning">Back</a>
                                        <button type="submit" class="btn btn-primary text">Update</button>
                                    </form>
                                </div>
                            @endif

                                @if(!empty($statusPesanan))
                                    {{--                            @if(isset($pesanan))--}}{{-- sama dengan yang diatas--}}
                                    <div class="col-md-8 ml-2 mb-6 text-center">
                                        <form action="{{ route('admin.transaction.status.update', $statuses->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Status Pesanan</label>
                                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                                    <option value=""></option>
                                                    @foreach($statusPesanan as $statuses)
                                                        <option value="{{ $statuses->id }}">{{ $statuses->status }}</option>
                                                    @endforeach
                                                </select>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <a href="{{ route('admin.transaction') }}" class="btn btn-warning">Back</a>
                                            <button type="submit" class="btn btn-primary text">Update</button>
                                        </form>
                                    </div>
                                @endif
                            <div class="col-md-4 mt-2 mb-2">
                                <form action="" class="form-inline">
                                    <input type="text" class="form-control mr-2" placeholder="Cari Data" name='search'>
                                    <button type="submit" class='btn btn-primary'>Cari</button>
                                </form>
                            </div>

                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
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
                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
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
                                        <td>
                                            @if(Auth::user()->role == 'admin')
                                            <div class='d-inline-flex'>
                                                <form action="{{ route('admin.transaction.delete', ['id' => $transaction->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @forelse($transactions as $transaction)
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
                <div class="ml-0 mb-3">
                    <p><b>Jumlah Data</b> : {{ $transactions->total() }} </p>
                </div>
            </div> <!-- end col -->
            <div class="pagination-sm">
                {{ $transactions->links() }}
            </div>
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
