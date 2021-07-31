@php
/*
$layout_page = shop_profile
** Variables:**
- $customer
*/ 
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')


	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
            
			<div class="tt-shopping-layout">
                <h2 class="tt-title-border">{{ $title ?? '' }}</h2>
                <div class="row">
                    <div class="col-md-3 aside aside--left">
                        @include($sc_templatePath.'.account.nav_customer')
                    </div>
                    <div class="col-md-8 aside">
                        <div class="tt-wrapper">
                            <h3 class="tt-title">{{ trans('account.my_profile') }}</h3>
                            <div class="tt-table-responsive">
                                <table class="tt-table-shop-02">
                                    <tbody>
                                        <tr>
                                            <td>{{ trans('account.first_name') }}:</td>
                                            <td>{{ $customer['first_name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ trans('account.last_name') }}:</td>
                                            <td>{{ $customer['last_name'] }} </td>
                                        </tr>
                                        <tr>
                                            <td>{{ trans('account.email') }}:</td>
                                            <td>{{ $customer['email'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ trans('account.phone') }}</td>
                                            <td>{{ $customer['phone'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				

			</div>
		</div>
	</div>


@endsection

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