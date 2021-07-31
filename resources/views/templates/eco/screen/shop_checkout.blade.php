@php
/*
$layout_page = shop_checkout
**Variables:**
- $cart: no paginate
- $shippingMethod: string
- $paymentMethod: string
- $dataTotal: array
- $shippingAddress: array
- $attributesGroup: array
- $products: paginate
Use paginate: $products->appends(request()->except(['page','_token']))->links()
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

@if (count($cart) ==0)

    <div class="holder mt-0">
        <div class="container">
            <div class="page404-bg">
                <div class="page404-text">
                    <div class="txt1"><img src="{{ sc_file('templates/mazaya/images/pages/tumbleweed.gif') }}" alt=""></div>
                    <div class="txt2">Your shopping cart is empty!</div>
                </div>
            </div>
        </div>
    </div>

@else

@endif

<div class="holder">
    <div class="container">
        <div class="row">
        
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-order-history">
                        <thead>
                            <tr>
                                <th scope="col"># </th>
                                <th scope="col">{{ trans('product.image') }}</th>
                                <th scope="col">{{ trans('product.name') }} </th>
                                <th scope="col">{{ trans('product.price') }}</th>
                                <th scope="col">{{ trans('product.quantity') }}</th>
                                <th scope="col">{{ trans('product.total_price') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                                @php
                                    $n = (isset($n)?$n:0);
                                    $n++;
                                    // Check product in cart
                                    $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                                    if(!$product) {
                                        continue;
                                    }
                                    // End check product in cart
                                @endphp
                                <tr>
                                    <td>{{$n}}</td>
                                    <td class="{{ session('arrErrorQty')[$product->id] ?? '' }}{{ (session('arrErrorQty')[$product->id] ?? 0) ? ' has-error' : '' }}">
                                        <a href="{{$product->getUrl() }}" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{sc_file($product->getImage())}}" alt="{{ $product->name }}"></a>
                                    </td>
                                    <td>
                                        <a href="{{$product->getUrl() }}">
                                            {{ $product->name }}<br />

                                            {{-- Process attributes --}}
                                            @if ($item->options->count())
                                            (
                                            @foreach ($item->options as $keyAtt => $att)
                                            <b>{{ $attributesGroup[$keyAtt] }}</b>: {!! sc_render_option_price($att) !!}
                                            @endforeach
                                            )<br>
                                            @endif
                                            {{-- //end Process attributes --}}
                                        </a>
                                    </td>
                                    <td><div class="price-new">{!! $product->showPrice() !!}</div></td>
                                    <td><span class="color">{{$item->qty}}</span></td>
                                    <td>{{sc_currency_render($item->subtotal)}}</td>
                                </tr>
                            @endforeach 
                            
                        </tbody>
                    </table>
                </div>

                <form class="sc-shipping-address" id="form-order" role="form" method="POST" action="{{ sc_route('order.add') }}">
                    {{-- Required csrf for secirity --}}
                    @csrf
                    
                <h3 class="control-label"><i class="fa fa-truck" aria-hidden="true"></i>
                    {{ trans('cart.shipping_address') }}:<br></h3>
                {{-- Display address --}}
                <div class="table-responsive">
                    <table class="table box table-bordered" id="showTotal">
                        <tr>
                            <th>{{ trans('cart.name') }}:</td>
                            <td>{{ $shippingAddress['first_name'] }} {{ $shippingAddress['last_name'] }}</td>
                        </tr>
                        @if (sc_config('customer_name_kana'))
                            <tr>
                                <th>{{ trans('cart.name_kana') }}:</td>
                                <td>{{ $shippingAddress['first_name_kana'].$shippingAddress['last_name_kana'] }}</td>
                            </tr>
                        @endif

                        @if (sc_config('customer_phone'))
                            <tr>
                                <th>{{ trans('cart.phone') }}:</td>
                                <td>{{ $shippingAddress['phone'] }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>{{ trans('cart.email') }}:</td>
                            <td>{{ $shippingAddress['email'] }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('cart.address') }}:</td>
                            <td>{{ $shippingAddress['address1'].' '.$shippingAddress['address2'].' '.$shippingAddress['address3'].','.$shippingAddress['country'] }}
                            </td>
                        </tr>
                        @if (sc_config('customer_postcode'))
                            <tr>
                                <th>{{ trans('cart.postcode') }}:</td>
                                <td>{{ $shippingAddress['postcode']}}</td>
                            </tr>
                        @endif

                        @if (sc_config('customer_company'))
                            <tr>
                                <th>{{ trans('cart.company') }}:</td>
                                <td>{{ $shippingAddress['company']}}</td>
                            </tr>
                        @endif

                        <tr>
                            <th>{{ trans('cart.note') }}:</td>
                            <td>{{ $shippingAddress['comment'] }}</td>
                        </tr>
                    </table>
                </div>
                {{--// Display address --}}
            </div>

            

                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table box table-bordered" id="showTotal">
                            @foreach ($dataTotal as $key => $element)
                            @if ($element['code']=='total')
                            <tr class="showTotal" style="background:#f5f3f3;font-weight: bold;">
                                <th>{!! $element['title'] !!}</th>
                                <td style="text-align: right" id="{{ $element['code'] }}">
                                    {{$element['text'] }}
                                </td>
                            </tr>
                            @elseif($element['value'] !=0)
                            <tr class="showTotal">
                                <th>{!! $element['title'] !!}</th>
                                <td style="text-align: right" id="{{ $element['code'] }}">
                                    {{$element['text'] }}
                                </td>
                            </tr>
                            @elseif($element['code'] =='shipping')
                            <tr class="showTotal">
                                <th>{!! $element['title'] !!}</th>
                                <td style="text-align: right" id="{{ $element['code'] }}">
                                    {{$element['text'] }}
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </table>                   

                    </div>

                    @if (!sc_config('payment_off'))
                        {{-- Payment method --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h2>{{ trans('cart.payment_method') }}</h2>
                                </div>
                                <input type="hidden" name="paymentMethodData1" value="{{ $paymentMethodData['title'] }}" />
                                <div class="form-group">
                                    <div>
                                        <label class="radio-inline">
                                            <img title="{{ $paymentMethodData['title'] }}"
                                                alt="{{ $paymentMethodData['title'] }}"
                                                src="{{ sc_file($paymentMethodData['image']) }}"
                                                style="width: 60px;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- //Payment method --}}
                    @endif

                    <div class="minicart-drop-actions">
                        <button type="button" onClick="location.href='{{ sc_route('cart') }}'" class="btn btn--md btn--grey"><i class="icon-basket"></i><span>{{ trans('cart.back_to_cart') }}</span></button>
                        <button id="submit-order" type="submit" class="btn btn--md"><i class="icon-checkout"></i><span>{{ trans('cart.confirm') }}</span></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Render include view --}}
@if (!empty($layout_page && $includePathView = config('sc_include_view.'.$layout_page, [])))
@foreach ($includePathView as $view)
  @if (view()->exists($view))
    @include($view)
  @endif
@endforeach
@endif
{{--// Render include view --}}

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



@push('scripts')

{{-- Render include script --}}
@if (!empty($layout_page) && $includePathScript = config('sc_include_script.'.$layout_page, []))
@foreach ($includePathScript as $script)
  @if (view()->exists($script))
    @include($script)
  @endif
@endforeach
@endif
{{--// Render include script --}}

@endpush

@push('styles')
{{-- Your css style --}}
@endpush