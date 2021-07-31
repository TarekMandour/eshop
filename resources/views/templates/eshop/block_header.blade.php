<header>
	<div class="tt-color-scheme-01">
		<div class="container">
			<div class="tt-header-row tt-top-row">
				<div class="tt-col-left">
					<div class="tt-box-info">
						<ul>
							<li><i class="mdi mdi-whatsapp"></i> {{sc_store('phone')}} </li>
							<li><i class="mdi mdi-email-outline"></i> {{sc_store('email')}} </li>
						</ul>
					</div>
				</div>
				<div class="tt-col-right ml-auto">
					<ul class="tt-social-icon">
                        
                        @if (sc_store('facebook') != null)
                            <li>
                                <a class="icon-g-64" target="_blank" href="{{sc_store('facebook')}}"></a>
                            </li>
                            @endif
                            @if (sc_store('twitter') != null)
                            <li>
                                <li><a class="icon-h-58" target="_blank" href="{{sc_store('twitter')}}"></a></li>
                            </li>
                            @endif
                            @if (sc_store('youtube') != null)
                            <li>
                                <li><a class="icon-g-76" target="_blank" href="{{sc_store('youtube')}}"></a></li>
                            </li>
                            @endif
                            @if (sc_store('instagram') != null)
                            <li>
                                <li><a class="icon-g-67" target="_blank" href="{{sc_store('instagram')}}"></a></li>
                            </li>
                            @endif
                            @if (sc_store('snapchat') != null)
                            <li>
                                <li><a class="mdi mdi-snapchat" target="_blank" href="{{sc_store('snapchat')}}"></a></li>
                            </li>
                            @endif
                            @if (sc_store('linkedin') != null)
                            <li>
                                <li><a class="icon-g-68" target="_blank" href="{{sc_store('linkedin')}}"></a></li>
                            </li>
                        @endif
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- tt-mobile menu -->
	<nav class="panel-menu mobile-main-menu">
		<ul>
            <li><a href="{{ sc_route('home') }}">{{ trans('front.home') }}</a></li>
            @if (!empty($sc_layoutsUrl['menu']))
                @foreach ($sc_layoutsUrl['menu'] as $url)
                @if ($url->lang == app()->getLocale())
                    @if ($url->parent_id == 0)
                    <li>
                        <a {{ ($url->target =='_blank')?'target=_blank':''  }}
                            href="{{ sc_url_render($url->url) }}">{{ sc_language_render($url->name) }}</a>
                            @if ($url->submenu > 0)
                                <ul>
                                    @foreach ($sc_layoutsUrl['menu'] as $url_level2)
                                        @if ($url_level2->lang == app()->getLocale())
                                            @if ($url_level2->parent_id == $url->id)
                                            <li><a href="{{ sc_url_render($url_level2->url) }}" {{ ($url_level2->target =='_blank')?'target=_blank':''  }}>{{ sc_language_render($url_level2->name) }}</a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                    </li>
                    @endif
                @endif
                @endforeach
            @endif
		</ul>
		<div class="mm-navbtn-names">
			<div class="mm-closebtn">{{ trans('admin.close') }}</div>
			<div class="mm-backbtn">Back</div>
		</div>
	</nav>
	@php 
	$categoriesTop = $modelCategory->start()->getCategoryTop()->getData(); 
	@endphp
	@if ($categoriesTop->count())
	<nav class="panel-menu mobile-caterorie-menu">
		<ul>
			@foreach($categoriesTop as $key => $category)
			<li>
				<a href="{{ $category->getUrl() }}">
					<i class="mdi mdi-plus"></i>
					<span>{{$category->title}}</span>
				</a>
			</li>
			@endforeach
		</ul>
		<div class="mm-navbtn-names">
			<div class="mm-closebtn">Close</div>
			<div class="mm-backbtn">Back</div>
		</div>
	</nav>
	@endif
	<!-- tt-mobile-header -->
	<div class="tt-mobile-header">
		<div class="container-fluid">
			<div class="header-tel-info">
				<i class="icon-f-93"></i> {{ sc_store('phone') }}
			</div>
		</div>
		<div class="container-fluid tt-top-line">
			<div class="tt-header-row">
				<div class="tt-mobile-parent-menu">
					<div class="tt-menu-toggle stylization-02">
						<i class="icon-03"></i>
					</div>
				</div>
				<div class="tt-mobile-parent-menu-categories tt-parent-box">
					<button class="tt-categories-toggle">
						<i class="icon-categories"></i>
					</button>
				</div>
				<!-- search -->
				<div class="tt-mobile-parent-search tt-parent-box"></div>
				<!-- /search -->
				<!-- cart -->
				<div class="tt-mobile-parent-cart tt-parent-box"></div>
				<!-- /cart -->
				<!-- account -->
				<div class="tt-mobile-parent-account tt-parent-box"></div>
				<!-- /account -->
				<!-- currency -->
				<div class="tt-mobile-parent-multi tt-parent-box"></div>
				<!-- /currency -->
			</div>
		</div>
		<div class="container-fluid tt-top-line">
			<div class="row">
				<div class="tt-logo-container">
					<!-- mobile logo -->
					<a class="tt-logo tt-logo-alignment" href="{{ sc_route('home') }}"><img src="{{ sc_file(sc_store('logodk')) }}" alt="{{$title??sc_store('title')}}"></a>
					<!-- /mobile logo -->
				</div>
			</div>
		</div>
	</div>
	<!-- tt-desktop-header -->
	<div class="tt-desktop-header headerunderline">
		<div class="container">
			<div class="tt-header-holder">
				<div class="tt-col-obj tt-obj-logo">
					<!-- logo -->
                    <a class="tt-logo tt-logo-alignment" href="{{ sc_route('home') }}"><img src="{{ sc_file(sc_store('logodk')) }}" alt="{{$title??sc_store('title')}}"></a>
					<!-- /logo -->
				</div>
				<div class="tt-col-obj tt-obj-search-type2">
					<div class="tt-search-type2">
			 			<!-- tt-search -->
						<form action="{{ sc_route('search') }}" method="get" role="search">
							<i class="icon-f-85"></i>
							<input class="tt-search-input" type="search" name="keyword" placeholder="{{ trans('front.search_form.keyword') }}" aria-label="{{ trans('front.search_form.keyword') }}" autocomplete="off">
							<button type="submit" class="tt-btn-search">{{ trans('front.search_form.keyword') }}</button>
							<div class="search-results" style="display: none;"></div>
						</form>
						<!-- /tt-search -->
					</div>
                </div>

				<div class="tt-col-obj obj-move-right">
					<div class="header-tel-info">
						<i class="icon-f-93"></i> {{ sc_store('long_phone') }}
					</div>
				</div>
			</div>
		</div>
		<div class="navMenu">
			<div class="container small-header">
				<div class="tt-header-holder">
					@php 
						$categoriesTop = $modelCategory->start()->getCategoryTop()->getData(); 
					@endphp
					@if ($categoriesTop->count())
					<div class="tt-col-obj tt-obj-menu-categories tt-desctop-parent-menu-categories">
						<div class="tt-menu-categories">
							<button class="tt-dropdown-toggle">
								CATEGORIES
							</button>
							<div class="tt-dropdown-menu">
								<nav>
									<ul>
										@foreach($categoriesTop as $key => $category)
										<li>
											<a href="{{ $category->getUrl() }}">
												<i class="mdi mdi-plus"></i>
												<span>{{$category->title}}</span>
											</a>
										</li>
										@endforeach
									</ul>
								</nav>
							</div>
						</div>
					</div>
					@endif
					<div class="tt-col-obj tt-obj-menu">
						<!-- tt-menu -->
						<div class="tt-desctop-parent-menu tt-parent-box">
							<div class="tt-desctop-menu">
								<nav>
									<ul>
										<li class="dropdown selected"><a href="{{ sc_route('home') }}">{{ trans('front.home') }}</a></li>
										@if (!empty($sc_layoutsUrl['menu']))
											@foreach ($sc_layoutsUrl['menu'] as $url)
											@if ($url->lang == app()->getLocale())
												@if ($url->parent_id == 0)
												<li class="dropdown tt-megamenu-col-01">
													<a {{ ($url->target =='_blank')?'target=_blank':''  }}
														href="{{ sc_url_render($url->url) }}">{{ sc_language_render($url->name) }}</a>
														@if ($url->submenu > 0)
														<div class="dropdown-menu">
															<div class="row tt-col-list">
																<div class="col">
																	<ul class="tt-megamenu-submenu">
																		@foreach ($sc_layoutsUrl['menu'] as $url_level2)
																			@if ($url_level2->lang == app()->getLocale())
																				@if ($url_level2->parent_id == $url->id)
																				<li><a href="{{ sc_url_render($url_level2->url) }}" {{ ($url_level2->target =='_blank')?'target=_blank':''  }}>{{ sc_language_render($url_level2->name) }}</a></li>
																				@endif
																			@endif
																		@endforeach
																	</ul>
																</div>
															</div>
														</div>
														@endif
												</li>
												@endif
											@endif
											@endforeach
										@endif
	
									</ul>
								</nav>
							</div>
						</div>
						<!-- /tt-menu -->
					</div>
					<div class="tt-col-obj tt-obj-options obj-move-right">
						<!-- tt-search -->
						<div class="tt-desctop-parent-search tt-parent-box tt-obj-desktop-hidden">
							<div class="tt-search tt-dropdown-obj">
								<button class="tt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom">
									<i class="icon-f-85"></i>
								</button>
								<div class="tt-dropdown-menu">
									<div class="container">
										<form action="{{ sc_route('search') }}" method="get" role="search">
											<div class="tt-col">
												<input type="text" class="tt-search-input" name="keyword" placeholder="{{ trans('front.search_form.keyword') }}">
												<button class="tt-btn-search" type="submit"></button>
											</div>
											<div class="tt-col">
												<button class="tt-btn-close icon-g-80"></button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- /tt-search -->
						<!-- tt-cart -->
						<div class="tt-desctop-parent-cart tt-parent-box">
							<div class="tt-cart tt-dropdown-obj" data-tooltip="Cart" data-tposition="top">
								<button class="tt-dropdown-toggle">
									<i class="icon-f-39"></i>
									<span class="tt-badge-cart">{{ Cart::instance('default')->count() }}</span>
								</button>
								<div class="tt-dropdown-menu">
									<div class="tt-mobile-add">
										<h6 class="tt-title">SHOPPING CART</h6>
										<button class="tt-close">{{ trans('admin.close') }}</button>
									</div>
									<div class="tt-dropdown-inner">
										<div class="tt-cart-layout">
											<!-- layout emty cart -->
											<!-- <a href="empty-cart.html" class="tt-cart-empty">
												<i class="icon-f-39"></i>
												<p>No Products in the Cart</p>
											</a> -->
											<div class="tt-cart-content">
												<div class="tt-cart-list appcart">
	
	
												</div>
												<div class="tt-cart-total-row">
													<div class="tt-cart-total-title">{{ trans('cart.total_item') }}:</div>
													<div class="tt-cart-total-price sub_total_price"></div>
												</div>
												<div class="tt-cart-btn">
													<div class="tt-item">
														<a href="{{ sc_route('cart') }}" class="btn">{{ trans('front.cart_title') }}</a>
													</div>
													<div class="tt-item">
														<a href="{{ sc_route('home') }}" class="btn-link-02 tt-hidden-mobile">{{ trans('cart.back_to_shop') }}</a>
														<a href="{{ sc_route('home') }}" class="btn btn-border tt-hidden-desctope">{{ trans('cart.back_to_shop') }}</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /tt-cart -->
						<!-- tt-account -->
						<div class="tt-desctop-parent-account tt-parent-box">
							<div class="tt-account tt-dropdown-obj">
								<button class="tt-dropdown-toggle"  data-tooltip="My Account" data-tposition="top"><i class="icon-f-94"></i></button>
								<div class="tt-dropdown-menu">
									<div class="tt-mobile-add">
										<button class="tt-close">{{ trans('admin.close') }}</button>
									</div>
									<div class="tt-dropdown-inner">
										<ul>
											@if(!\Illuminate\Support\Facades\Auth::check())
												<li><a href="{{route('login')}}"><i class="icon-f-76"></i>{{ trans('account.login') }}</a></li>
												<li><a href="{{route('register')}}"><i class="icon-f-94"></i>{{ trans('account.register') }}</a></li>
											@endif
											@if(\Illuminate\Support\Facades\Auth::check())
												<li><a href="{{ sc_route('customer.index') }}"><i class="icon-f-94"></i>{{ trans('front.my_profile') }}</a></li>
												<li><a href="{{ sc_route('wishlist') }}"><i class="icon-n-072"></i>{{ trans('front.wishlist') }}</a></li>
												<li><a href="{{ sc_route('compare') }}"><i class="icon-n-08"></i>{{ trans('front.compare') }}</a></li>
												<li><a href="{{route('logout')}}"><i class="icon-f-77"></i>{{ trans('account.signup') }}</a></li>
											@endif									    
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /tt-account -->
						<!-- tt-langue and tt-currency -->
						<div class="tt-desctop-parent-multi tt-parent-box">
							<div class="tt-multi-obj tt-dropdown-obj">
								<button class="tt-dropdown-toggle" data-tooltip="Settings" data-tposition="top"><i class="icon-f-79"></i></button>
								<div class="tt-dropdown-menu">
									<div class="tt-mobile-add">
										<button class="tt-close">Close</button>
									</div>
									<div class="tt-dropdown-inner">
										@if (count($sc_languages)>1)
											<ul>
											<li class="active"><a href="#">{{ $sc_languages[app()->getLocale()]['name'] }}</a></li>
												@foreach ($sc_languages as $key => $language)
													<li @if ($language['code'] ==  session('locale')) style="display: none;" @endif>
														<a href="{{ sc_route('locale', ['code' => $key, 'layout_rtl' => $language['rtl']]) }}">{{ $language['name'] }}</a>
													</li>
												@endforeach
											</ul>
										@endif
										@if (count($sc_currencies)>1)
											<ul>
												<li class="rd-nav-item">
													<li class="active"><a href="#"><i class="icon-h-59"></i> {{ sc_currency_info()['name'] }}</a></li>
													@foreach ($sc_currencies as $key => $currency)
														<li @if ($currency->code ==  sc_currency_info()['code']) style="display: none;" @endif>
															<a href="{{ sc_route('currency', ['code' => $currency->code]) }}"><i class="icon-h-60"></i> {{ $currency->name }}</a>
														</li>
													@endforeach
												</li>
											</ul>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- /tt-langue and tt-currency -->
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!-- /tt-desktop-header -->
	<!-- stuck nav -->
	<div class="tt-stuck-nav">
		<div class="container">
			<div class="tt-header-row ">
				<div class="tt-stuck-desctop-menu-categories"></div>
				<div class="tt-stuck-parent-menu"></div>
				<div class="tt-stuck-mobile-menu-categories"></div>
				<div class="tt-stuck-parent-search tt-parent-box"></div>
				<div class="tt-stuck-parent-cart tt-parent-box"></div>
				<div class="tt-stuck-parent-account tt-parent-box"></div>
				<div class="tt-stuck-parent-multi tt-parent-box"></div>
			</div>
		</div>
	</div>
</header>