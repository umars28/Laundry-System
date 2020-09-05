@extends('admin.layouts.master')
@section('title')
    <title>Daftar Bank Account</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Bank Account</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Bank Account</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 mb-2 header-title">Daftar Bank Account</h4>
                        <div class="row mb-3">
                            @if(Auth::user()->role == 'admin')
                            <div class="col-md-2 mt-2 ml-2 mb-2">
                                <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#exampleModal">
                                    Tambah
                                </button>
                            </div>
                            @endif
                            @if(!empty($account))
                                {{--                            @if(isset($account))--}}{{-- sama dengan yang diatas--}}
                                <div class="col-md-8 ml-2 mb-6 text-center">
                                    <form action="{{ route('admin.bank.account.update', ['id' => $account->id]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="bank_account">Nama Bank</label>
                                            <input type="text" class="form-control @error('bank_account') is-invalid @enderror" value="{{ $account->bank_account, old('bank_account') }}" name="bank_account" id="bank_account"  placeholder="Input Nama Bank" autofocus autocomplete="">
                                            @error('bank_account')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="account_name">Nama Akun</label>
                                            <input type="text" class="form-control @error('account_name') is-invalid @enderror" value="{{ $account->account_name, old('account_name') }}" name="account_name" id="account_name"  placeholder="Input Nama Akun">
                                            @error('account_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="account_number">Nomor Rekening</label>
                                            <input type="number" class="form-control @error('account_number') is-invalid @enderror" value="{{ $account->account_number, old('account_number') }}" name="account_number" id="account_number"  placeholder="Input Nomor Rekening">
                                            @error('account_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <a href="{{ route('admin.bank.account') }}" class="btn btn-warning">Back</a>
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
                                    <th>Nama Bank</th>
                                    <th>Nama Rekening</th>
                                    <th>Nomor Rekening</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listAccount as $account)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $account->bank_account }}</td>
                                        <td>{{ $account->account_name }}</td>
                                        <td>{{ $account->account_number }}</td>
                                        <td>
                                            @if(Auth::user()->role == 'admin')
                                            <div class='d-inline-flex'>
                                                <a href="{{ route('admin.bank.account.edit', ['id' => $account->id]) }}" class='btn btn-warning mr-2'><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.bank.account.delete', $account->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class='btn btn-danger btn-delete'><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @forelse($listAccount as $account)
                                @empty
                                    <tr>
                                        <td colspan="3" class="alert-danger mt-3 text-center">No Bank Account Found</td>
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
                    <form action="{{ route('admin.bank.account.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="bank_account">Nama Bank</label>
                            <input type="text" class="form-control @error('bank_account') is-invalid @enderror" value="{{ old('bank_account') }}" name="bank_account" id="bank_account"  placeholder="Input Status" autofocus autocomplete="">
                            @error('bank_account')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="account_name">Nama Akun</label>
                            <input type="text" class="form-control @error('account_name') is-invalid @enderror" value="{{ old('account_name') }}" name="account_name" id="account_name"  placeholder="Input account name" autofocus autocomplete="">
                            @error('account_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="account_number">Nomor Rekening</label>
                            <input type="number" class="form-control @error('account_number') is-invalid @enderror" value="{{ old('account_number') }}" name="account_number" id="account_number"  placeholder="Input account number" autofocus autocomplete="">
                            @error('account_number')
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
