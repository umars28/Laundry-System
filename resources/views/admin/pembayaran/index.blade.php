@extends('admin.layouts.master')
@section('title')
    <title>Daftar Status Pembayaran</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Status Pembayaran</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Status Pembayaran</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 mb-2 header-title">Daftar Status Pembayaran</h4>
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
                                    <form action="{{ route('admin.pembayaran.status.update', ['id' => $pembayaran->id]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control @error('status') is-invalid @enderror" value="{{ $pembayaran->status, old('status') }}" name="status" id="status"  placeholder="Input Status" autofocus autocomplete="">
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="urutan">Urutan</label>
                                            <input type="number" class="form-control @error('urutan') is-invalid @enderror" value="{{ $pembayaran->urutan, old('urutan') }}" name="urutan" id="urutan"  placeholder="Input Urutan">
                                            @error('urutan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <a href="{{ route('admin.pembayaran.status') }}" class="btn btn-warning">Back</a>
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
                                    <th>Status</th>
                                    <th>Urutan</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pembayaranStatuses as $pembayaran)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pembayaran->status }}</td>
                                        <td>{{ $pembayaran->urutan }}</td>
                                        <td>
                                            @if(Auth::user()->role == 'admin')
                                            <div class='d-inline-flex'>
                                                <a href="{{ route('admin.pembayaran.status.edit', ['id' => $pembayaran->id]) }}" class='btn btn-warning mr-2'><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.pembayaran.status.delete', $pembayaran->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @forelse($pembayaranStatuses as $pembayaran)
                                @empty
                                    <tr>
                                        <td colspan="4" class="alert-danger mt-3 text-center">No Status Pembayaran</td>
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
                    <h3 class="modal-title" id="exampleModalLabel">Add Status</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pembayaran.status.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}" name="status" id="status"  placeholder="Input Status" autofocus autocomplete="">
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="urutan">Urutan</label>
                            <input type="text" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan') }}" name="urutan" id="urutan"  placeholder="Input urutan" autofocus autocomplete="">
                            @error('urutan')
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

