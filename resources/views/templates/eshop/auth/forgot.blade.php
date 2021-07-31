@php
/*
$layout_page = shop_auth
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="container-indent">
    <div class="container">
        <h1 class="tt-title-subpages noborder">{{ trans('account.password_forgot') }}</h1>
        <div class="tt-login-form">
            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-6">
                    <div class="tt-item">
                        <div class="form-default form-top">
                            <form class="form-horizontal" method="POST" action="{{ sc_route('password.email') }}" id="form-process">
                                {!! csrf_field() !!}
                                                                        
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-18 control-label">
                                        {{ trans('customer.email') }}</label>
                                    <div class="col-md-18">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                            required>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        <br />
                                        @endif
                                        
                                    </div>
                                </div>

                                <div class="row">

                                    {!! $viewCaptcha ?? ''!!}
                                    <br><br>

                                    <div class="col-auto mr-auto">
                                        <div class="form-group">
                                            <button class="btn btn-border" type="submit" name="SubmitLogin" id="button-form-process">{{ trans('front.submit_form') }}</button>
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
