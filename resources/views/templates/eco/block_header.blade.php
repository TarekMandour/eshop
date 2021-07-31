<header class="hdr-wrap">
  <div class="hdr-content hdr-content-sticky">
      <div class="container">
          <div class="row">
              <div class="col-auto show-mobile">
                  <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
              </div>
              <div class="col-auto hdr-logo">
                  <a href="{{ sc_route('home') }}" class="logo"><img srcset="{{ sc_file(sc_store('logodk')) }}" alt="Logo"></a>
              </div>
              <div class="hdr-nav hide-mobile nav-holder-s">
              </div>
              <div class="hdr-links-wrap col-auto ml-auto">
                  <div class="hdr-inline-link">
                      <div class="search_container_desktop">
                          <div class="dropdn dropdn_search dropdn_fullwidth">
                              <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                              <div class="dropdn-content">
                                  <div class="container">
                                      <form action="{{ sc_route('search') }}"  method="GET" class="search search-off-popular">
                                        <input name="keyword" type="text" class="search-input input-empty" placeholder="{{ trans('front.search_form.keyword') }}">
                                        <button type="submit" class="search-button"><i class="icon-search"></i></button>

                                        <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="dropdn dropdn_wishlist">
                          <a href="{{ sc_route('wishlist') }}" class="dropdn-link only-icon wishlist-link ">
                              <i class="icon-heart"></i><span class="dropdn-link-txt">{{ trans('front.wishlist') }}</span>
                          </a>
                      </div>
                      <div class="dropdn dropdn_account dropdn_fullheight">
                          <a href="{{ sc_route('customer.index') }}" class="dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">{{ trans('account.my_profile') }}</span></a>
                      </div>
                      <div class="dropdn dropdn_fullheight minicart">
                          <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
                              <i class="icon-basket"></i>
                              <span class="minicart-qty sc-cart">{{ Cart::instance('default')->count() }}</span>
                          </a>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="hdr">
      <div class="hdr-topline js-hdr-top">
          <div class="container">
              <div class="row flex-nowrap">
                  <div class="col hdr-topline-left hide-mobile">
                      <div class="hdr-line-separate">
                          <ul class="social-list list-unstyled">
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

                  <div class="col hdr-topline-right hide-mobile">
                      <div class="hdr-inline-link">
                          <div class="dropdn_language">
                              <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                  @if (count($sc_languages)>1)
                                  <a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current">{{ $sc_languages[app()->getLocale()]['name'] }}</span><i class="icon-angle-down"></i></a>
                                  <div class="dropdn-content">
                                      <ul>
                                          @foreach ($sc_languages as $key => $language)
                                            <li>
                                                <a href="{{ sc_route('locale', ['code' => $key, 'layout_rtl' => $language['rtl']]) }}">
                                                  {{ $language['name'] }}
                                                </a>
                                            </li>
                                          @endforeach
                                      </ul>
                                  </div> 
                                  @endif
                              </div>
                          </div>
                          <div class="hdr_container_desktop">
                              <div class="dropdn dropdn_account dropdn_fullheight">
                                  <a href="{{ sc_route('customer.index') }}" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">{{ trans('front.account') }}</span></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="hdr-content">
          <div class="container">
              <div class="row"> 
                  <div class="col-auto show-mobile">
                      <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
                  </div>
                  <div class="col-auto hdr-logo">
                      <a href="{{ sc_route('home') }}" class="logo"><img srcset="{{ sc_file(sc_store('logo')) }}" alt=""></a>
                  </div>
                  <div class="hdr-nav hide-mobile nav-holder justify-content-center px-4">
                      <ul class="mmenu mmenu-js">
                          <li><a href="{{ sc_route('home') }}">{{ trans('front.home') }}</a></li>
                          <li><a href="{{ sc_route('shop') }}">{{ trans('front.shop') }}</a></li>
                          @if (!empty($sc_layoutsUrl['menu']))
                            @foreach ($sc_layoutsUrl['menu'] as $url)
                            @if ($url->lang == app()->getLocale())
                                @if ($url->parent_id == 0)
                                <li class="mmenu-item--simple">
                                    <a {{ ($url->target =='_blank')?'target=_blank':''  }}
                                        href="{{ sc_url_render($url->url) }}">{{ sc_language_render($url->name) }}</a>
                                        @if ($url->submenu > 0)
                                        <div class="mmenu-submenu">
                                            <ul class="submenu-list">
                                                @foreach ($sc_layoutsUrl['menu'] as $url_level2)
                                                    @if ($url_level2->lang == app()->getLocale())
                                                        @if ($url_level2->parent_id == $url->id)
                                                        <li><a href="{{ sc_url_render($url_level2->url) }}" {{ ($url_level2->target =='_blank')?'target=_blank':''  }}>{{ sc_language_render($url_level2->name) }}</a></li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                </li>
                                @endif
                            @endif
                            @endforeach
                          @endif
                      </ul>
                  </div>
                  <div class="hdr-links-wrap col-auto ml-auto">
                      <div class="hdr-inline-link">
                          <div class="search_container_desktop">
                              <div class="dropdn dropdn_search dropdn_fullwidth">
                                  <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">{{ trans('front.search.keyword') }}</span></a>
                                  <div class="dropdn-content">
                                      <div class="container">
                                          <form action="{{ sc_route('search') }}"  method="GET" class="search search-off-popular">
                                              <input name="keyword" type="text" class="search-input input-empty" placeholder="{{ trans('front.search_form.keyword') }}">
                                              <button type="submit" class="search-button"><i class="icon-search"></i></button>

                                              <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="dropdn dropdn_wishlist">
                              <a href="{{ sc_route('wishlist') }}" class="dropdn-link only-icon wishlist-link ">
                                  <i class="icon-heart"></i><span class="dropdn-link-txt">{{ trans('front.wishlist') }}</span>
                                  
                              </a>
                          </div>
                          <div class="hdr_container_mobile show-mobile">
                              <div class="dropdn dropdn_account dropdn_fullheight">
                                  <a href="{{ sc_route('customer.index') }}" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">{{ trans('account.my_profile') }}</span></a>
                              </div>
                          </div>
                          <div class="dropdn dropdn_fullheight minicart">
                              <a href="#" class="dropdn-link js-dropdn-link minicart-link" data-panel="#dropdnMinicart">
                                  <i class="icon-basket"></i>
                                  <span class="minicart-qty sc-cart">{{ Cart::instance('default')->count() }}</span>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</header>
<div class="header-side-panel">
  <div class="mobilemenu js-push-mbmenu">
      <div class="mobilemenu-content">
          <div class="mobilemenu-close mobilemenu-toggle">{{ trans('admin.close') }}</div>
          <div class="mobilemenu-scroll">
              <div class="mobilemenu-search"></div>
              <div class="nav-wrapper show-menu">
                  <div class="nav-toggle">
                      <span class="nav-back"><i class="icon-angle-left"></i></span>
                      <span class="nav-title"></span>
                      <a href="#" class="nav-viewall">view all</a>
                  </div>
                  <ul class="nav nav-level-1">
                      <li><a href="{{ sc_route('home') }}">{{ trans('front.home') }} <span class="arrow"><i class="icon-angle-right"></i></span></a></li>
                      <li><a href="{{ sc_route('shop') }}">{{ trans('front.shop') }} <span class="arrow"><i class="icon-angle-right"></i></span></a></li>
                      @if (!empty($sc_layoutsUrl['menu']))
                        @foreach ($sc_layoutsUrl['menu'] as $url)
                        <li class="mmenu-item--simple">
                            <a {{ ($url->target =='_blank')?'target=_blank':''  }}
                                href="{{ sc_url_render($url->url) }}">{{ sc_language_render($url->name) }} <span class="arrow"><i class="icon-angle-right"></i></span></a>
                        </li>
                        @endforeach
                      @endif
                  </ul>
              </div>
              <div class="mobilemenu-bottom">
                  <div class="mobilemenu-language">
                      <div class="dropdn_language">
                          <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                              @if (count($sc_languages)>1)
                                <a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current">{{ $sc_languages[app()->getLocale()]['name'] }}</span><i class="icon-angle-down"></i></a>
                                <div class="dropdn-content">
                                    <ul>
                                        @foreach ($sc_languages as $key => $language)
                                          <li>
                                              <a href="{{ sc_route('locale', ['code' => $key]) }}">
                                                {{ $language['name'] }}
                                              </a>
                                          </li>
                                        @endforeach
                                    </ul>
                                </div> 
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="dropdn-content account-drop" id="dropdnAccount">
      <div class="dropdn-content-block">
          <div class="dropdn-close"><span class="js-dropdn-close">{{ trans('admin.close') }}</span></div>
            <ul>
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <li><a href="{{route('login')}}"><span>{{ trans('account.login') }}</span><i
                                    class="icon-login"></i></a></li>
                    <li><a href="{{route('register')}}"><span>{{ trans('account.register') }}</span><i class="icon-user2"></i></a></li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li><a href="{{ sc_route('customer.index') }}"><span>{{ trans('front.my_profile') }}</span><i class="icon-user2"></i></a></li>
                    <li><a href="{{ sc_route('wishlist') }}"><span>{{ trans('front.wishlist') }}</span><i class="icon-heart-stroke"></i></a></li>
                    <li><a href="{{route('logout')}}"><span>{{ trans('account.signup') }}</span><i class="icon-login"></i></a></li>
                @endif
            </ul>
            @if(!\Illuminate\Support\Facades\Auth::check())
                <div class="dropdn-form-wrapper">
                    <h5>{{ trans('account.title_login') }}</h5>
                    <form action="{{ sc_route('postLogin') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" value="{{ old('email') }}"
                                class="form-control form-control--sm is-invalid"
                                placeholder="{{ trans('account.email') }}">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="" class="form-control form-control--sm"
                                placeholder="{{ trans('account.password') }}">
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" name="SubmitLogin"
                                class="btn btn-lg btn-secondary">{{ trans('account.login') }}</button>

                    </form>

                </div>
            @endif
      </div>
      <div class="drop-overlay js-dropdn-close"></div>
  </div>
  <div class="dropdn-content minicart-drop" id="dropdnMinicart">
      <div class="dropdn-content-block">
          <div class="dropdn-close"><span class="js-dropdn-close">{{ trans('admin.close') }}</span></div>
          <div class="minicart-drop-content js-dropdn-content-scroll appcart">

              
          </div>
          <div class="minicart-drop-fixed">
              <div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal=""><span></span></div>
              <div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
                  <div class="minicart-drop-total-txt col-auto heading-font">{{ trans('cart.total_item') }}</div>
                  <div class="minicart-drop-total-price col" data-header-cart-total=""><span class="sub_total_price"></span> EGP</div>
              </div>
              <div class="minicart-drop-actions">
                  <a href="{{ sc_route('cart') }}" class="btn btn--md btn--grey"><i class="icon-basket"></i><span>{{ trans('front.cart_title') }}</span></a>
                  <a href="{{ sc_route('home') }}" class="btn btn--md"><i class="icon-checkout"></i><span>{{ trans('cart.back_to_shop') }}</span></a>
              </div>
          </div>
      </div>
      <div class="drop-overlay js-dropdn-close"></div>
  </div>
</div>
