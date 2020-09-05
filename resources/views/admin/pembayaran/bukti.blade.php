@extends('admin.layouts.master')
@section('title')
    <title>Daftar Bukti Pembayaran</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Bukti Pembayaran</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Bukti Pembayaran</a></li>
                    </ol>


                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 mb-2 header-title">Bukti Pembayaran</h4>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Customer</th>
                                    <th>Kode Invoice</th>
                                    <th>Tipe</th>
                                    <th>Bukti Pembayaran</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($confirmations as $confirmation)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $confirmation->customer->name }}</td>
                                        <td>{{ $confirmation->invoice_number }}</td>
                                        <td>{{ $confirmation->type }}</td>
                                        <td><img src="{{ Storage::url('images/bukti_pembayaran/'.$confirmation->image) }}" alt="{{ $confirmation->image }}"></td>
                                        <td>
                                            @if(Auth::user()->role == 'admin')
                                            <form action="{{ route('admin.payment.confirmation.delete', ['id' => $confirmation->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @forelse($confirmations as $confirmation)
                                @empty
                                    <tr>
                                        <td colspan="10" class="alert-danger mt-3 text-center">No Data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
