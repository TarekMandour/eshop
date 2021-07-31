<footer class="page-footer footer-style-1 ">
    <div class="footer-top footer--dark">
        <div class="container">
            <div class="row mt-0">
                <div class="col-lg-6 col-xl-5 last-mobile">
                    <div class="footer-block">
                        <div class="footer-logo">
                            <a href="{{ sc_route('home') }}"><img class="fade-up lazyloaded" src="{{  sc_file(sc_store('logo')) }}" data-srcset="{{  sc_file(sc_store('logo')) }}" alt="{{ sc_store('title') }}" srcset="{{  sc_file(sc_store('logo')) }}"></a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Information</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                @if (!empty($sc_layoutsUrl['footer']))
                                @foreach ($sc_layoutsUrl['footer'] as $url)
                                <li>
                                    <a {{ ($url->target =='_blank')?'target=_blank':''  }}
                                        href="{{ sc_url_render($url->url) }}">{{ sc_language_render($url->name) }}</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-5">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Our socials</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul class="social-list-circle">
                                @if (sc_store('facebook') != null)
                                <li>
                                    <a href="{{sc_store('facebook')}}"><i class="icon-facebook"></i></a>
                                </li>
                                @endif
                                @if (sc_store('twitter') != null)
                                <li>
                                    <a href="{{sc_store('twitter')}}"><i class="icon-twitter"></i></a>
                                </li>
                                @endif
                                @if (sc_store('youtube') != null)
                                <li>
                                    <a href="{{sc_store('youtube')}}"><i class="icon-youtube"></i></a>
                                </li>
                                @endif
                                @if (sc_store('instagram') != null)
                                <li>
                                    <a href="{{sc_store('instagram')}}"><i class="icon-instagram"></i></a>
                                </li>
                                @endif
                                @if (sc_store('snapchat') != null)
                                <li>
                                    <a href="{{sc_store('snapchat')}}"><i class="icon-snapchat"></i></a>
                                </li>
                                @endif
                                @if (sc_store('linkedin') != null)
                                <li>
                                    <a href="{{sc_store('linkedin')}}"><i class="icon-linkedin"></i></a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>About the store</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li>Phone: {{ sc_store('phone') }}</li>
                                <li>E-mail: <a href="mailto:{{ sc_store('email') }}">{{ sc_store('email') }}</a></li>
                                <li>Address: {{ sc_store('address') }}</li>
                                @if (sc_store('facebook') != null)
                                <li>{{ sc_store('time_active') }}</li>
                                @endif
                                <li><a href="{{ sc_store('domain ') }}">{{ sc_store('domain ') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom footer-bottom--bg">
        <div class="container">
            <div class="footer-copyright text-center">
                <a href="https:splendoradv.com/">Splendoradv.com</a> ©2021 copyright
            </div>
        </div>
    </div>
</footer>
