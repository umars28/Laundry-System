<!-- footer section -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <img src="{{ Storage::url('/images/setting/'.config('web_config')['IMAGE_LOGO']) }}" class="img-responsive" alt="{{ config('web_config')['COMPANY_NAME'] }}">
                <p>{{ $abouts->description }}</p>
                <p><i class="fa fa-phone"></i>{{ $contact->contact_number }}</p>
                <p><i class="fa fa-envelope-o"></i>{{ $contact->email }}</p>
                <p><i class="fa fa-globe"></i>{{ config('web_config')['COMPANY_NAME'] }}</p>
            </div>
            <div class="col-md-6 col-sm-4">
                <h3>Daftar Paket</h3>
                @foreach($pakets as $paket)
                <p><a href="{{ route('paket.show', $paket->id) }}">{{ $paket->type }}</a></p>
                @endforeach
            </div>
        </div>
    </div>
</footer>

<!-- copyright section -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <p>Copyright © {{ date('yy') }} {{ config('web_config')['COMPANY_NAME'] }}</p>
            </div>
            <div class="col-md-6 col-sm-6">
                <ul class="social-icons">
                    <li><a href="https://web.facebook.com/{{ $contact->facebook }}" class="fa fa-facebook" target="_blank"></a></li>
                    <li><a href="{{ $contact->twitter }}" class="fa fa-twitter" target="_blank"></a></li>
                    <li><a href="https://api.whatsapp.com/send?phone={{ $contact->whatsapp }}&text=Assalamualaikum Warahmatullahi Wabarakatuh" class="fa fa-dribbble" target="_blank"></a></li>
                    <li><a href="https://www.instagram.com/{{ $contact->instagram }}/?hl=id" class="fa fa-instagram" target="_blank"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
