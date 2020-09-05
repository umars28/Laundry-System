<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Ahmad Saugi" name="author" />
    <link rel="shortcut icon" href="{{Storage::url('/images/setting/'.config('web_config')['IMAGE_PAVICON'])}}">

    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Begin page -->
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <h3 class="text-center m-0">
                <a href="#" class="logo logo-admin"><img src="{{Storage::url('/images/setting/'.config('web_config')['IMAGE_LOGO'])}}" height="40" alt="{{ config('web_config')['COMPANY_NAME'] }}"></a>
            </h3>

            <div class="p-3">
                <h4 class="text-muted font-18 m-b-5 text-center">Selamat Datang !</h4>
                <p class="text-muted text-center">Silahkan Daftar {{config('web_config')['COMPANY_NAME']}}.</p>
                @if(empty($errors))
                    <div class="alert alert-danger">Berhasil Daftar!</div>
                @endif
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name='name' placeholder="Enter Name" autocomplete="" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" name='username' placeholder="Enter username">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor Handphone</label>
                        <input type="text" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name='phone_number' placeholder="Enter Nomor Handphone">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name='email' placeholder="Enter Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" id="alamat" name='address' placeholder="Enter Alamat">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"" id="password" name='password' placeholder="Enter password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="userpassword">Konfirmasi Password</label>
                        <input type="password" class="form-control @error('userpassword') is-invalid @enderror"" id="userpassword" name='userpassword' placeholder="Enter password">
                        @error('userpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row m-t-20 text-right">
                        <div class="col-12 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-6 m-t-20">
                            <a href="{{route('password.request')}}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                        </div>
                        <div class="col-6 m-t-20 mb-0 mr-0 row">
                            <a href="{{route('login')}}" class="text-muted"><i class="fas fa-registered"></i> Login</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <div class="m-t-40 text-center">
        <p>© {{date('Y')}} {{config('web_config')['COMPANY_NAME']}}. Crafted with <i class="mdi mdi-heart text-danger"></i> {{ config('web_config')['COMPANY_NAME'] }}</p>
    </div>

</div>


<!-- jQuery  -->
<script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{ URL::asset('assets/js/waves.min.js')}}"></script>

<script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.js')}}"></script>

@yield('script-bottom')
</body>
</html>

