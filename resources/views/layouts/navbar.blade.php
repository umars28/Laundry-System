<!-- navigation -->

<div class="container">
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"><img src="{{ Storage::url('/images/setting/'.config('web_config')['IMAGE_LOGO']) }}" class="img-responsive" alt="{{ config('web_config')['COMPANY_NAME'] }}"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('homepage.index') }}" class="active">HOME</a></li>
                <li><a href="{{ route('transaction.show') }}">LIST TRANSAKSI</a></li>
                <li><a href="{{ route('payment.confirmation') }}">KONFIRMASI PESANAN</a></li>
                @auth
                <li><a href="{{ route('admin.dashboard.index') }}">{{ strtoupper(Auth::user()->name) }}</a></li>
                @endauth
                @guest()
                <li><a href="{{ route('login') }}">LOGIN</a></li>
                <li><a href="{{ route('register') }}">REGISTER</a></li>
                @endguest
                @auth()
                <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> LOGOUT</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</div>
