@php
/*
$layout_page = shop_auth
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="holder">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18 col-lg-8">
                <h2 class="text-center">{{ trans('account.password_forgot') }}</h2>
                <div class="form-wrapper">
                    <form class="form-horizontal" method="POST" action="{{ sc_route('password.email') }}" id="form-process">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-18 control-label"><i class="fas fa-envelope"></i>
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
                                {!! $viewCaptcha ?? ''!!}
                                
                                <div class="mt-2 mb-2"></div>

                                <button type="submit" name="SubmitLogin" class="btn btn-lg btn-secondary" id="button-form-process">{{ trans('front.submit_form') }}</button>
                            </div>
                        </div>
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
