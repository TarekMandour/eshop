@php
/*
$layout_page = shop_profile
**Variables:**
- $customer
*/ 
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
        
        <div class="tt-shopping-layout">
            <h2 class="tt-title-border">{{ trans('account.my_profile') }}</h2>
            <div class="row">
                <div class="col-md-3 aside aside--left">
                    @include($sc_templatePath.'.account.nav_customer')
                </div>
                <div class="col-md-8 aside">
                    <div class="tt-wrapper">
                        <h3 class="tt-title">{{ $title ?? '' }}</h3>
                        <div class="form-default">
                        <form method="POST" action="{{ sc_route('customer.post_change_password') }}">
                            @csrf
                             
                            <div class="form-group {{ Session::has('password_old_error') ? ' has-error' : '' }}">
                                <label for="password"
                                    class="col-md-6 col-form-label">{{ trans('account.password_old') }}:</label>
        
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password_old" required>
        
                                    @if(Session::has('password_old_error'))
                                    <span class="help-block">{{ Session::get('password_old_error') }}</span>
                                    @endif
        
                                </div>
                            </div>
        
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password"
                                    class="col-md-6 col-form-label">{{ trans('account.password_new') }}:</label>
        
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
        
                                    @if($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                    @endif
        
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label for="password-confirm"
                                    class="col-md-6 col-form-label">{{ trans('account.password_confirm') }}:</label>
        
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                            </div>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('account.update_infomation') }}
                                    </button>
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