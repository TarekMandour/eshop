@php
/*
$layout_page = shop_profile
**Variables:**
- $customer
*/ 
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="holder">
    <div class="container">
        <div class="row">
            <div class="col-md-4 aside aside--left">
              @include($sc_templatePath.'.account.nav_customer')
            </div>
            <div class="col-md-14 aside">
                <h1 class="mb-3">{{ $title }}</h1>

                <form method="POST" action="{{ sc_route('customer.post_change_password') }}">
                    @csrf

                    <div class="form-group row {{ Session::has('password_old_error') ? ' has-error' : '' }}">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ trans('account.password_old') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password_old" required>

                            @if(Session::has('password_old_error'))
                            <span class="help-block">{{ Session::get('password_old_error') }}</span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ trans('account.password_new') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ trans('account.password_confirm') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
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