@extends('admin.layouts.master')
@section('title')
    <title>Daftar Paket</title>
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
                    </ol>


                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 mb-2 header-title">Daftar Paket</h4>
                        <div class="row mb-3">
                            <div class="col-md-4 mt-2 mb-2">
                                <form action="" class="form-inline">
                                    <input type="text" class="form-control mr-2" placeholder="Cari Data" name='search'>
                                    <button type="submit" class='btn btn-primary'>Cari</button>
                                </form>
                            </div>
                            @if(Auth::user()->role == 'admin')
                            <div class="col-md-2 ml-auto">
                                <a class="btn btn-primary float-right" href="{{ route('admin.paket.create') }}">Tambah</a>
                            </div>
                            @endif
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Deskripsi</th>
                                    <th>Harga/kg</th>
                                    <th>Harga/Satuan</th>
                                    <th>Promo</th>
                                    <th>Nama Promo</th>
                                    <th>Kode Promo</th>
                                    <th>Harga Promo</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pakets as $paket)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $paket->type }}</td>
                                        <td>{{ $paket->description }}</td>
                                        <td>{{ $paket->price_kg }} / kg</td>
                                        <td>{{ $paket->price_satuan }} / satuan</td>
                                        <td>{{ $paket->is_promo ? 'Yes' : 'No' }}</td>
                                        @if($paket->is_promo == 1)
                                        <td>{{ $paket->promo_name }}</td>
                                        <td>{{ $paket->promo_code }}</td>
                                        <td>{{ $paket->promo_price }}</td>
                                        @else
                                         <td colspan="3" class="text-center alert-danger">Tidak ada promo</td>
                                        @endif
                                        <td>
                                            @if(Auth::user()->role == 'admin')
                                            <div class='d-inline-flex'>
                                                <a href="{{ route('admin.paket.edit', ['id' => $paket->id]) }}" class='btn btn-warning mr-2'><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.paket.delete', ['id' => $paket->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @forelse($pakets as $paket)
                                @empty
                                    <tr>
                                        <td colspan="10" class="alert-danger mt-3 text-center">No Data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
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
