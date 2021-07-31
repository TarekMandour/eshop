@php
/*
$layout_page = shop_profile
** Variables:**
- $statusOrder
- $statusShipping
- $order
- $countries
- $attributesGroup
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

                      @if (!$order)
                      <div class="text-danger">
                        {{ trans('account.order_detail_not_exist') }}
                      </div>
                      @else
                      <div class="row">
                        <div class="col-md-6 aside">
                          <div class="tt-table-responsive">
                            <table class="tt-table-shop-01">
                              <tr>
                                <td class="td-title">{{ trans('order.shipping_first_name') }}:</td><td>{!! $order->first_name !!}</td>
                              </tr>
                  
                              @if (sc_config('customer_lastname'))
                              <tr>
                                <td class="td-title">{{ trans('order.shipping_last_name') }}:</td><td>{!! $order->last_name !!}</td>
                              </tr>
                              @endif
                  
                              @if (sc_config('customer_phone'))
                              <tr>
                                <td class="td-title">{{ trans('order.shipping_phone') }}:</td><td>{!! $order->phone !!}</td>
                              </tr>
                              @endif
                  
                              <tr>
                                <td class="td-title">{{ trans('order.email') }}:</td><td>{!! empty($order->email)?'N/A':$order->email!!}</td>
                              </tr>
                  
                              @if (sc_config('customer_company'))
                              <tr>
                                <td class="td-title">{{ trans('order.company') }}:</td><td>{!! $order->company !!}</td>
                              </tr>
                              @endif
                  
                              @if (sc_config('customer_postcode'))
                              <tr>
                                <td class="td-title">{{ trans('order.postcode') }}:</td><td>{!! $order->postcode !!}</td>
                              </tr>
                              @endif
                  
                              <tr>
                                <td class="td-title">{{ trans('order.shipping_address1') }}:</td><td>{!! $order->address1 !!}</td>
                              </tr>
                  
                              @if (sc_config('customer_address2'))
                              <tr>
                                <td class="td-title">{{ trans('order.shipping_address2') }}:</td><td>{!! $order->address2 !!}</td>
                              </tr>
                              @endif
                  
                              @if (sc_config('customer_address3'))
                              <tr>
                                <td class="td-title">{{ trans('order.shipping_address3') }}:</td><td>{!! $order->address3 !!}</td>
                              </tr>
                              @endif
                  
                              @if (sc_config('customer_country'))
                              <tr>
                                <td class="td-title">{{ trans('order.country') }}:</td><td>{!! $countries[$order->country] ?? $order->country !!}</td>
                              </tr>
                              @endif
                            </table>
                          </div>
                        </div>
                        <div class="col-md-6 aside">
                          <div class="tt-table-responsive">
                            <table class="tt-table-shop-01">
                              <tr><td class="td-title">{{ trans('order.order_status') }}:</td><td>{{ $statusOrder[$order->status] }}</td></tr>
                              <tr><td>{{ trans('order.order_shipping_status') }}:</td><td>{{ $statusShipping[$order->shipping_status]??'' }}</td></tr>
                              <tr><td>{{ trans('order.shipping_method') }}:</td><td>{{ $order->shipping_method }}</td></tr>
                              <tr><td>{{ trans('order.payment_method') }}:</td><td>{{ $order->payment_method }}</td></tr>
                              <tr>
                                <td class="td-title">{{ trans('order.currency') }}:</td><td>{{ $order->currency }}</td>
                              </tr>
                              <tr>
                                <td class="td-title">{{ trans('order.exchange_rate') }}:</td><td>{{ ($order->exchange_rate)??1 }}</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>

                      <br><br>
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="tt-table-responsive">
                            <table class="tt-table-shop-01">
                              <thead>
                                <tr>
                                  <th>{{ trans('product.name') }}</th>
                                  <th>{{ trans('product.sku') }}</th>
                                  <th class="product_price">{{ trans('product.price') }}</th>
                                  <th class="product_qty">{{ trans('product.quantity') }}</th>
                                  <th class="product_total">{{ trans('product.total_price') }}</th>
                                  <th class="product_tax">{{ trans('product.tax') }}</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($order->details as $item)
                                    <tr>
                                      <td>{{ $item->name }}
                                        @php
                                        $html = '';
                                          if($item->attribute && is_array(json_decode($item->attribute,true))){
                                            $array = json_decode($item->attribute,true);
                                                foreach ($array as $key => $element){
                                                  $html .= '<br><b>'.$attributesGroup[$key].'</b> : <i>'.$element.'</i>';
                                                }
                                          }
                                        @endphp
                                      {!! $html !!}
                                      </td>
                                      <td>{{ $item->sku }}</td>
                                      <td class="product_price">{{ $item->price }}</td>
                                      <td class="product_qty">x  {{ $item->qty }}</td>
                                      <td class="product_total item_id_{{ $item->id }}">{{ sc_currency_render_symbol($item->total_price,$order->currency)}}</td>
                                      <td class="product_tax">{{ $item->tax }}</td>
                                    </tr>
                                  @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                
                      @php
                          $dataTotal = \EShop\Core\Front\Models\ShopOrderTotal::getTotal($order->id)
                      @endphp

                      <div class="row">
                        <div class="col-md-12">
                          <div class="tt-table-responsive">
                            <table class="tt-table-shop-01">
                              @foreach ($dataTotal as $element)
                                @if ($element['code'] =='subtotal')
                                  <tr><td  class="td-title-normal">{!! $element['title'] !!}:</td><td style="text-align:right" class="data-{{ $element['code'] }}">{{ sc_currency_format($element['value']) }}</td></tr>
                                @endif
                                @if ($element['code'] =='tax')
                                <tr><td  class="td-title-normal">{!! $element['title'] !!}:</td><td style="text-align:right" class="data-{{ $element['code'] }}">{{ sc_currency_format($element['value']) }}</td></tr>
                                @endif
              
                                @if ($element['code'] =='shipping')
                                  <tr><td>{!! $element['title'] !!}:</td><td style="text-align:right">{{ sc_currency_format($element['value']) }}</td></tr>
                                @endif
                                @if ($element['code'] =='discount')
                                  <tr><td>{!! $element['title'] !!}(-):</td><td style="text-align:right">{{ sc_currency_format($element['value']) }}</td></tr>
                                @endif
              
                                  @if ($element['code'] =='total')
                                  <tr style="background:#f5f3f3;font-weight: bold;"><td>{!! $element['title'] !!}:</td><td style="text-align:right" class="data-{{ $element['code'] }}">{{ sc_currency_format($element['value']) }}</td></tr>
                                @endif
              
                                @if ($element['code'] =='received')
                                  <tr><td>{!! $element['title'] !!}(-):</td><td style="text-align:right">{{ sc_currency_format($element['value']) }}</td></tr>
                                @endif
              
                              @endforeach
                              <tr class="data-balance"><td>{{ trans('order.balance') }}:</td><td style="text-align:right">{{ sc_currency_format($order->balance) }}</td></tr>
                            </table>
                          </div>
                        </div>
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