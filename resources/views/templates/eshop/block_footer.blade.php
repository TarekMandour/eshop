<footer>
	<div class="tt-footer-default tt-color-scheme-02">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-9">
					<div class="tt-newsletter-layout-01">
						<div class="tt-newsletter">
							<div class="tt-mobile-collapse">
								<h4 class="tt-collapse-title">
									BE IN TOUCH WITH US:
								</h4>
								<div class="tt-collapse-content">
									<form class="form-inline form-default" method="post" action="{{ sc_route('subscribe') }}" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
											<input type="email" name="subscribe_email" class="form-control" placeholder="{{ trans('front.subscribe.subscribe_email') }}" required>
											<button type="submit" class="btn">{{ trans('front.subscribe.title') }}</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-auto">
					<ul class="tt-social-icon">
                        @if (sc_store('facebook') != null)
                        <li>
                            <a class="icon-g-64" target="_blank" href="{{sc_store('facebook')}}"></a>
                        </li>
                        @endif
                        @if (sc_store('twitter') != null)
                        <li>
                            <a class="icon-h-58" target="_blank" href="{{sc_store('twitter')}}"></a>
                        </li>
                        @endif
                        @if (sc_store('youtube') != null)
                        <li>
                            <a class="icon-g-76" target="_blank" href="{{sc_store('youtube')}}"></a>
                        </li>
                        @endif
                        @if (sc_store('instagram') != null)
                        <li>
                            <a class="icon-g-67" target="_blank" href="{{sc_store('instagram')}}"></a>
                        </li>
                        @endif
                        @if (sc_store('snapchat') != null)
                        <li>
                            <a class="mdi mdi-snapchat" target="_blank" href="{{sc_store('snapchat')}}"></a>
                        </li>
                        @endif
                        @if (sc_store('linkedin') != null)
                        <li>
                            <a class="icon-g-68" target="_blank" href="{{sc_store('linkedin')}}"></a>
                        </li>
                        @endif
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-footer-col tt-color-scheme-01">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-2 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							Information
						</h4>
						<div class="tt-collapse-content">
							<ul class="tt-list">
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
				<div class="col-md-6 col-lg-2 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							MY ACCOUNT
						</h4>
						<div class="tt-collapse-content">
							<ul class="tt-list">
                                @if(!\Illuminate\Support\Facades\Auth::check())
                                    <li><a href="{{route('login')}}"><i class="icon-f-76"></i>{{ trans('account.login') }}</a></li>
                                    <li><a href="{{route('register')}}"><i class="icon-f-94"></i>{{ trans('account.register') }}</a></li>
                                @endif
								<li><a href="{{ sc_route('customer.index') }}"> <i class="icon-f-94"></i> {{ trans('front.my_profile') }}</a></li>
                                <li><a href="{{ sc_route('wishlist') }}"> <i class="icon-n-072"></i> {{ trans('front.wishlist') }}</a></li>
                                <li><a href="{{ sc_route('compare') }}"> <i class="icon-n-08"></i> {{ trans('front.compare') }}</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							ABOUT
						</h4>
						<div class="tt-collapse-content">
							<p>
								{{ $description??sc_store('description') }}
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="tt-newsletter">
						<div class="tt-mobile-collapse">
							<h4 class="tt-collapse-title">
								CONTACTS
							</h4>
							<div class="tt-collapse-content">
								<address>
									<p><span>Address:</span> {{ sc_store('address') }}</p>
                                    <p><span>Phone:</span> {{ sc_store('phone') }}</p>
									<p><span>E-mail:</span> <a href="mailto:{{ sc_store('email') }}">{{ sc_store('email') }}</a></p>
                                    @if (sc_store('time_active') != null)
                                    <p><span>Hours:</span> {{ sc_store('time_active') }}</p>
                                    <p><span>domain:</span> {{ sc_store('domain ') }}</p>
                                    @endif
								</address>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-footer-custom">
		<div class="container">
			<div class="tt-row">
				<div class="tt-col-left">
					<div class="tt-col-item tt-logo-col">
						<!-- logo -->
						<a class="tt-logo tt-logo-alignment" href="{{ sc_route('home') }}">
							<img  src="{{ sc_file(sc_store('logodk')) }}" alt="{{$title??sc_store('title')}}">
						</a>
						<!-- /logo -->
					</div>
					<div class="tt-col-item">
						<!-- copyright -->
						<div class="tt-box-copyright">
                            <a href="https:arabiacode.com/">Arabiacode.com</a> © {{date('Y')}} copyright
						</div>
						<!-- /copyright -->
					</div>
				</div>
				<div class="tt-col-right">
					<div class="tt-col-item">
						<!-- payment-list -->
						<ul class="tt-payment-list">
							<li><a href="page404.html"><span class="icon-Stripe"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span>
			                </span></a></li>
							<li><a href="page404.html"> <span class="icon-paypal-2">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-visa">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-mastercard">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-discover">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-american-express">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span>
			                </span></a></li>
						</ul>
						<!-- /payment-list -->
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<a href="#" class="tt-back-to-top">BACK TO TOP</a>
