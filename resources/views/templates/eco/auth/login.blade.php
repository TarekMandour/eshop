@extends($sc_templatePath.'.layout')

@section('block_main')
    <!--form-->
    <!--/form-->

    <div class="holder">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-18 col-lg-8">
                    <h2 class="text-center">{{ trans('account.title_login') }}</h2>
                    <div class="form-wrapper">
                        <form action="{{ sc_route('postLogin') }}" method="post" class="box">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                                       placeholder="{{ trans('account.email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        {{ $errors->first('email') }}
                                      </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" value="" class="form-control"
                                       placeholder="{{ trans('account.password') }}">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    {{ $errors->first('password') }}
                                        </span>
                                @endif
                            </div>
                            @if (!empty(sc_config('LoginSocialite')))
                                <ul>
                                    <li class="rd-dropdown-item">
                                        <a class="rd-dropdown-link"
                                           href="{{ sc_route('login_socialite.index', ['provider' => 'facebook']) }}"><i
                                                    class="fab fa-facebook"></i>
                                            {{ trans('front.login') }} facebook</a>
                                    </li>
                                    <li class="rd-dropdown-item">
                                        <a class="rd-dropdown-link"
                                           href="{{ sc_route('login_socialite.index', ['provider' => 'google']) }}"><i
                                                    class="fab fa-google-plus"></i>
                                            {{ trans('front.login') }} google</a>
                                    </li>
                                    <li class="rd-dropdown-item">
                                        <a class="rd-dropdown-link"
                                           href="{{ sc_route('login_socialite.index', ['provider' => 'github']) }}"><i
                                                    class="fab fa-github"></i>
                                            {{ trans('front.login') }} github</a>
                                    </li>
                                </ul>
                            @endif
                            <button type="submit" name="SubmitLogin"
                                    class="btn btn-lg btn-secondary">{{ trans('account.login') }}</button>

                            <p class="lost_password form-group">
                            <div class="row">
                                <a class="btn btn-link" href="{{ sc_route('forgot') }}">
                                    {{ trans('account.password_forgot') }}
                                </a>
                                 &nbsp;

                                <a class="btn btn-link" href="{{ sc_route('register') }}">
                                    {{ trans('account.title_register') }}
                                </a>
                            </div>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- breadcrumb --}}
@section('breadcrumb')
@php
$bannerBreadcrumb = $modelBanner->start()->getBreadcrumb()->getData()->first();
@endphp
<div class="holder mt-0 py-1 py-sm-2 py-md-1 bg-cover lazyloaded" data-bgset="{{ sc_file($bannerBreadcrumb['image'] ?? '') }}" style="background-image: url('{{ sc_file($bannerBreadcrumb['image'] ?? '') }}');">
	<div class="container">
		<div class="row">
			<div class="col-11 col-md-9 col-xl-9">
				<div class="page-title-bg py-md-1 py-xl-2">
					<h1>{{ $title ?? '' }}</h1>
					
					<ul class="breadcrumbs">
            <li><a href="{{ sc_route('home') }}">{{ trans('front.home') }}</a></li>
            <li><span>{{ $title ?? '' }}</span></li>
          </ul>
					
				</div>
			</div>
		</div>
	</div>
<picture style="display: none;"><source data-srcset="{{ sc_file($bannerBreadcrumb['image'] ?? '') }}" srcset="{{ sc_file($bannerBreadcrumb['image'] ?? '') }}"><img alt="" class="lazyautosizes lazyloaded ls-is-cached" data-sizes="auto" data-parent-fit="cover"></picture></div>
@endsection
{{-- //breadcrumb --}}
