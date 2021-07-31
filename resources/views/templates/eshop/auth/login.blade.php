@extends($sc_templatePath.'.layout')

@section('block_main')
    <!--form-->
    <!--/form-->

    <div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">{{ trans('account.title_login') }}</h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">

					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							<h2 class="tt-title">{{ $title ?? '' }}</h2>
							<div class="form-default form-top">
                                <form action="{{ sc_route('postLogin') }}" method="post" class="box">
                                    {!! csrf_field() !!}
                                    	                                    
                                    <div class="form-group">
                                        <label for="loginInputEmail">{{ trans('account.email') }}</label>
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                                               placeholder="{{ trans('account.email') }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                {{ $errors->first('email') }}
                                              </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="loginInputEmail">{{ trans('account.password') }}</label>
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

									<div class="row">
										<div class="col-auto mr-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit" name="SubmitLogin">{{ trans('account.login') }}</button>
											</div>
                                        </div>
                                        <div class="col-auto mr-auto">
                                            <a class="btn btn-border" href="{{ sc_route('register') }}">
                                                {{ trans('account.title_register') }}
                                            </a>
                                        </div>

										<div class="col-auto align-self-end">
											<div class="form-group">
												<ul class="additional-links">
													<li><a href="{{ sc_route('forgot') }}">{{ trans('account.password_forgot') }}</a></li>
												</ul>
											</div>
										</div>
									</div>

								</form>
							</div>
						</div>
                    </div>

				</div>
			</div>
		</div>
	</div>

@endsection

{{-- breadcrumb --}}
@section('breadcrumb')
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{ sc_route('home') }}">{{ trans('front.home') }}</a></li>
			<li>{{ $title ?? '' }}</li>
		</ul>
	</div>
</div>
@endsection
{{-- //breadcrumb --}}
