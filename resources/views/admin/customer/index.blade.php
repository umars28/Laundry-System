@extends('admin.layouts.master')
@section('title')
    <title>Daftar Customer</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Customer</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 mb-2 header-title">Daftar Customer</h4>
                        <div class="row mb-3">
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Nomor Handphone</th>
                                    <th>Alamat</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->username }}</td>
                                        <td>{{ $customer->phone_number }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>
                                            @if(Auth::user()->role == 'admin')
                                            <div class='d-inline-flex'>
                                                <form action="{{ route('admin.customer.delete', ['id' => $customer->id, 'email' => $customer->email]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @forelse($customers as $customer)
                                @empty
                                    <tr>
                                        <td colspan="7" class="alert-danger mt-3 text-center">No Customers</td>
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
