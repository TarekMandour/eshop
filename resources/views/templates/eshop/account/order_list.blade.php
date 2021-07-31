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
                  @if (count($orders) ==0)
                    <div class="text-danger">
                      {{ trans('account.orders.empty') }}
                    </div>
                  @else
                  <div class="tt-table-responsive">
                    <table class="tt-table-shop-01">
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