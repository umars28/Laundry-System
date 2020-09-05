@extends('admin.layouts.master')
@section('title')
    <title>Contact Us</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Contact Us</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Contact Us</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-3 ml-3 btn btn-warning">Edit Contact</h4>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('admin.contact.update', ['id' => $contact->id]) }}"  method="POST" class='mt-3'>
                            @csrf
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Nomor Handphone</label>
                                <div class="col-md-10">
                                    <input type="text" name="contact_number" value="{{ $contact->contact_number ,old('contact_number') }}" class='form-control @error('contact_number') is-invalid @enderror'>
                                    @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Email</label>
                                <div class="col-md-10">
                                    <input type="text" name="email" value="{{ $contact->email ,old('email') }}" class='form-control @error('email') is-invalid @enderror'>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Facebook</label>
                                <div class="col-md-10">
                                    <input type="text" name="facebook" value="{{ $contact->facebook ,old('facebook') }}" class='form-control @error('facebook') is-invalid @enderror'>
                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Twitter</label>
                                <div class="col-md-10">
                                    <input type="text" name="twitter" value="{{ $contact->twitter ,old('twitter') }}" class='form-control @error('twitter') is-invalid @enderror'>
                                    @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Instagram</label>
                                <div class="col-md-10">
                                    <input type="text" name="instagram" value="{{ $contact->instagram ,old('instagram') }}" class='form-control @error('instagram') is-invalid @enderror'>
                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Whatsapp</label>
                                <div class="col-md-10">
                                    <input type="text" name="whatsapp" value="{{ $contact->whatsapp ,old('whatsapp') }}" class='form-control @error('whatsapp') is-invalid @enderror'>
                                    @error('whatsapp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @if(Auth::user()->role == 'admin')
                            <button type="submit" class='btn btn-primary float-left text-center'>Submit</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
