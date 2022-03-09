<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-faq.css')) }}">

<footer class="footer {{($configData['footerType']=== 'footer-hidden') ? 'd-none':''}} footer-light">
    <p class="clearfix mb-0">
    <div class="card faq-search" style="background: url('{{asset('images/banner/banner.png')}}')" id="subscribe">
        <div class="card-body text-center">
            <h2 class="text-primary">{{ __('footer.connected') }}</h2>
            <p class="card-text mb-2">{{ __('footer.connected description') }}</p>
            <span class="faq-search-input">
                <div class="input-group">
                    <input type="text" class="form-control" id="email" placeholder="{{ __('footer.placeholder email') }}" aria-describedby="subscribe" />
                    <div class="input-group-append" id="subscribe">
                        <button class="btn btn-outline-primary" type="button" id="btn-subscribe">{{ __('footer.subscribe') }}</button>
                    </div>
                </div>
                <span id="subscribe-message"></span>
            </span>
        </div>
    </div>

    <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy;
        <script>
            document.write(new Date().getFullYear())
        </script>
        <a class="ml-25" href="javascript:void(0)">Sandbox</a>
        <span class="d-none d-sm-inline-block">, All rights Reserved</span>
    </span>
    <span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span>
    </p>
</footer>

<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
