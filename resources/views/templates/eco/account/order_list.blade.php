@php
/*
$layout_page = shop_profile
** Variables:**
- $statusOrder
- $orders
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
              @if (count($orders) ==0)
                <div class="text-danger">
                  {{ trans('account.orders.empty') }}
                </div>
              @else
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-order-history">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">{{ trans('account.orders.id') }}</th>
                        <th scope="col">{{ trans('account.orders.total') }}</th>
                        <th scope="col">{{ trans('account.orders.status') }}</th>
                        <th scope="col">{{ trans('account.orders.date_add') }}</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                      @php
                      $n = (isset($n)?$n:0);
                      $n++;
                      @endphp
                      <tr>
                        <td><span class="item_21_id">{{ $n }}</span></td>
                        <td><span class="item_21_sku">#{{ $order->id }}</span></td>
                        <td align="right">
                          {{ number_format($order->total) }}
                        </td>
                        <td>{{ $statusOrder[$order->status]}}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                          <a href="{{ sc_route('customer.order_detail', ['id' => $order->id ]) }}"><i class="fa fa-indent" aria-hidden="true"></i> {{ trans('account.orders.detail_order') }}</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif

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