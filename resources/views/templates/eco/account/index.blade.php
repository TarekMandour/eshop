@php
/*
$layout_page = shop_profile
** Variables:**
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
                <h1 class="mb-3">{{ trans('account.acount_details') }}</h1>
                <div class="row vert-margin">
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-body">
                                <h3>{{ trans('account.my_profile') }}</h3>
                                <p><b>{{ trans('account.first_name') }}:</b> {{ $customer['first_name'] }} <br>
                                    <b>{{ trans('account.last_name') }}:</b> {{ $customer['last_name'] }}<br>
                                    <b>{{ trans('account.email') }}:</b> {{ $customer['email'] }}<br>
                                    <b>{{ trans('account.phone') }}:</b> {{ $customer['phone'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

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