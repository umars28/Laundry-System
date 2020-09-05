@extends('admin.layouts.master')
@section('title')
    <title>Daftar Metode Pembayaran</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Metode Pembayaran</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Metode Pembayaran</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 mb-2 header-title">Daftar Metode Pembayaran</h4>
                        <div class="row mb-3">
                            @if(Auth::user()->role == 'admin')
                            <div class="col-md-2 mt-2 ml-2 mb-2">
                                <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#exampleModal">
                                    Tambah
                                </button>
                            </div>
                            @endif
                            @if(!empty($pembayaran))
                                {{--                            @if(isset($pesanan))--}}{{-- sama dengan yang diatas--}}
                                <div class="col-md-8 ml-2 mb-6 text-center">
                                    <form action="{{ route('admin.pembayaran.method.update', ['id' => $pembayaran->id]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="status">Jenis Pembayaran</label>
                                            <input type="text" class="form-control @error('method') is-invalid @enderror" value="{{ $pembayaran->method, old('method') }}" name="method" id="status"  placeholder="Input Jenis" autofocus autocomplete="">
                                            @error('method')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <a href="{{ route('admin.pembayaran.method') }}" class="btn btn-warning">Back</a>
                                        <button type="submit" class="btn btn-primary text">Update</button>
                                    </form>
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
                                    <th>Jenis Pembayaran</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pembayaranMethods as $pembayaran)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pembayaran->method }}</td>
                                        <td>
                                            @if(Auth::user()->role == 'admin')
                                            <div class='d-inline-flex'>
                                                <a href="{{ route('admin.pembayaran.method.edit', ['id' => $pembayaran->id]) }}" class='btn btn-warning mr-2'><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.pembayaran.method.delete', $pembayaran->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @forelse($pembayaranMethods as $pembayaran)
                                @empty
                                    <tr>
                                        <td colspan="3" class="alert-danger mt-3 text-center">No Metode Pembayaran</td>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Add Jenis</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pembayaran.method.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="status">Jenis</label>
                            <input type="text" class="form-control @error('method') is-invalid @enderror" value="{{ old('method') }}" name="method" id="status"  placeholder="Input Jenis" autofocus autocomplete="">
                            @error('method')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.all.min.js')}}"></script>
            <script src="{{ asset('js/main.js') }}"></script>
@endsection

