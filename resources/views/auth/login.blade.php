<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title></title>
    <meta content="" name="description" />
    <meta content="Umar Sabirin" name="author" />
    <link rel="shortcut icon" href="{{ Storage::url('/images/setting/'.config('web_config')['IMAGE_PAVICON']) }}">

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
                        <p class="text-muted text-center">Masuk untuk melanjutkan ke {{config('web_config')['COMPANY_NAME']}}.</p>
                        @if($errors->any())
                        <div class="alert alert-danger">Username atau password salah!</div>
                        @endif
                        <form class="form-horizontal m-t-30" action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name='username' placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" name='password' placeholder="Enter password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-6 m-t-20">
                                    <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                                <div class="col-6 m-t-20 mb-0 mr-0 row">
                                    <a href="{{route('register')}}" class="text-muted"><i class="fas fa-registered"></i> Register</a>
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

