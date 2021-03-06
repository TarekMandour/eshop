@extends($sc_templatePath.'.layout')

@section('block_main')
<!--form-->
<section class="section section-sm section-first bg-default text-md-left">

    <div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">{{ trans('account.title_register') }}</h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							<h2 class="tt-title">{{ $title ?? '' }}</h2>
							<div class="form-default">
								<form action="{{sc_route('postRegister')}}" method="post" class="box" id="form-process">
                                    {!! csrf_field() !!}
                                    
									@if (sc_config('customer_lastname'))
                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                        <label for="first_name">{{ trans('account.first_name') }}</label>
                                        <div class="tt-required">* Required Fields</div>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('first_name'))?"input-error":"" }}"
                                            name="first_name" placeholder="{{ trans('account.first_name') }}"
                                            value="{{ old('first_name') }}">
                                        @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            {{ $errors->first('first_name') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                        <label for="last_name">{{ trans('account.last_name') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('last_name'))?"input-error":"" }}"
                                            name="last_name" placeholder="{{ trans('account.last_name') }}" value="{{ old('last_name') }}">
                                        @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            {{ $errors->first('last_name') }}
                                        </span>
                                        @endif
                                    </div>
                                    @else
                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                        <label for="name">{{ trans('account.name') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('first_name'))?"input-error":"" }}"
                                            name="first_name" placeholder="{{ trans('account.name') }}" value="{{ old('first_name') }}">
                                        @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            {{ $errors->first('first_name') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    @if (sc_config('customer_name_kana'))
                                    <div class="form-group{{ $errors->has('first_name_kana') ? ' has-error' : '' }}">
                                        <label for="first_name_kana">{{ trans('account.first_name_kana') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('first_name_kana'))?"input-error":"" }}"
                                            name="first_name_kana" placeholder="{{ trans('account.first_name_kana') }}"
                                            value="{{ old('first_name_kana') }}">
                                        @if ($errors->has('first_name_kana'))
                                        <span class="help-block">
                                            {{ $errors->first('first_name_kana') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('last_name_kana') ? ' has-error' : '' }}">
                                        <label for="last_name_kana">{{ trans('account.last_name_kana') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('last_name_kana'))?"input-error":"" }}"
                                            name="last_name_kana" placeholder="{{ trans('account.last_name_kana') }}" value="{{ old('last_name_kana') }}">
                                        @if ($errors->has('last_name_kana'))
                                        <span class="help-block">
                                            {{ $errors->first('last_name_kana') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">{{ trans('account.email') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('email'))?"input-error":"" }}"
                                            name="email" placeholder="{{ trans('account.email') }}" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            {{ $errors->first('email') }}
                                        </span>
                                        @endif
                                    </div>
                            
                                    @if (sc_config('customer_phone'))
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone">{{ trans('account.phone') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('phone'))?"input-error":"" }}"
                                            name="phone" placeholder="{{ trans('account.phone') }}" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                        <span class="help-block">
                                            {{ $errors->first('phone') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    @if (sc_config('customer_postcode'))
                                    <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                                        <label for="postcode">{{ trans('account.postcode') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('postcode'))?"input-error":"" }}"
                                            name="postcode" placeholder="{{ trans('account.postcode') }}" value="{{ old('postcode') }}">
                                        @if ($errors->has('postcode'))
                                        <span class="help-block">
                                            {{ $errors->first('postcode') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                        <label for="address1">{{ trans('account.address1') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('address1'))?"input-error":"" }}"
                                            name="address1" placeholder="{{ trans('account.address1') }}" value="{{ old('address1') }}">
                                        @if ($errors->has('address1'))
                                        <span class="help-block">
                                            {{ $errors->first('address1') }}
                                        </span>
                                        @endif
                                    </div>
                
                                    @if (sc_config('customer_address2'))
                                    <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                        <label for="address2">{{ trans('account.address2') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('address2'))?"input-error":"" }}"
                                            name="address2" placeholder="{{ trans('account.address2') }}" value="{{ old('address2') }}">
                                        @if ($errors->has('address2'))
                                        <span class="help-block">
                                            {{ $errors->first('address2') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    @if (sc_config('customer_address3'))
                                    <div class="form-group{{ $errors->has('address3') ? ' has-error' : '' }}">
                                        <label for="address3">{{ trans('account.address3') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('address3'))?"input-error":"" }}"
                                            name="address3" placeholder="{{ trans('account.address3') }}" value="{{ old('address3') }}">
                                        @if ($errors->has('address3'))
                                        <span class="help-block">
                                            {{ $errors->first('address3') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                
                                    @if (sc_config('customer_company'))
                                    <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                        <label for="company">{{ trans('account.company') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('company'))?"input-error":"" }}"
                                            name="company" placeholder="{{ trans('account.company') }}" value="{{ old('company') }}">
                                        @if ($errors->has('company'))
                                        <span class="help-block">
                                            {{ $errors->first('company') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    @if (sc_config('customer_country'))
                                    <div class="form-group  {{ $errors->has('country') ? ' has-error' : '' }}">
                                        <select class="form-control country" style="width: 100%;" name="country">
                                            <option>__{{ trans('account.country') }}__</option>
                                            @foreach ($countries as $k => $v)
                                            <option value="{{ $k }}" {{ (old('country') ==$k) ? 'selected':'' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                        <span class="help-block">
                                            {{ $errors->first('country') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    @if (sc_config('customer_sex'))
                                    <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                        <label
                                            class="validate account_input {{ ($errors->has('sex'))?"input-error":"" }}">{{ trans('account.sex') }}:
                                        </label>
                                        <label class="radio-inline"><input value="0" type="radio" name="sex"
                                                {{ (old('sex') == 0)?'checked':'' }}> {{ trans('account.sex_women') }}</label>
                                        <label class="radio-inline"><input value="1" type="radio" name="sex"
                                                {{ (old('sex') == 1)?'checked':'' }}> {{ trans('account.sex_men') }}</label>
                                        @if ($errors->has('sex'))
                                        <span class="help-block">
                                            {{ $errors->first('sex') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    @if (sc_config('customer_birthday'))
                                    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                        <label for="birthday">{{ trans('account.birthday') }}</label>
                                        <input type="date"
                                            class="is_required validate account_input form-control {{ ($errors->has('birthday'))?"input-error":"" }}"
                                            name="birthday" data-date-format="YYYY-MM-DD" placeholder="{{ trans('account.birthday') }}"
                                            value="{{ old('birthday','2015-08-09') }}">
                                        @if ($errors->has('birthday'))
                                        <span class="help-block">
                                            {{ $errors->first('birthday') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    @if (sc_config('customer_group'))
                                    <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
                                        <label for="group">{{ trans('account.group') }}</label>
                                        <input type="text"
                                            class="is_required validate account_input form-control {{ ($errors->has('group'))?"input-error":"" }}"
                                            name="group" placeholder="{{ trans('account.group') }}" value="{{ old('group') }}">
                                        @if ($errors->has('group'))
                                        <span class="help-block">
                                            {{ $errors->first('group') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                            
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">{{ trans('account.password') }}</label>
                                        <input type="password"
                                            class="is_required validate account_input form-control {{ ($errors->has('password'))?"input-error":"" }}"
                                            name="password" placeholder="{{ trans('account.password') }}" value="">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            {{ $errors->first('password') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="password_confirmation">{{ trans('account.password_confirmation') }}</label>
                                        <input type="password"
                                            class="is_required validate account_input form-control {{ ($errors->has('password_confirmation'))?"input-error":"" }}"
                                            placeholder="{{ trans('account.password_confirm') }}" name="password_confirmation" value="">
                                        @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            {{ $errors->first('password_confirmation') }}
                                        </span>
                                        @endif
                                    </div>
                                    
                                    {!! $viewCaptcha ?? ''!!}
                                    <br><br>

									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit" name="SubmitCreate" id="button-form-process">{{ trans('account.signup') }}</button>
											</div>
										</div>
										<div class="col-auto align-self-center">
											<div class="form-group">
												<ul class="additional-links">
													<li>or <a href="{{ sc_route('home') }}">Return to Store</a></li>
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
    
    
</section>
<!--/form-->
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
