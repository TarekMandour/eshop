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

    <div class="container-indent nomargin">
        <div class="tt-empty-cart">
            <span class="tt-icon icon-f-39"></span>
            <h1 class="tt-title">SHOPPING CART IS EMPTY</h1>
            <p>You have no items in your shopping cart.</p>
            <a href="{{ sc_route('home') }}" class="btn">{{ trans('cart.back_to_shop') }}</a>
        </div>
    </div>

@else

@endif

<div class="container-indent">
    <div class="container">
        <h1 class="tt-title-subpages noborder">{{ $title ?? '' }}</h1>
        <div class="row">
            <div class="col-sm-12 col-xl-8">
                <div class="tt-shopcart-table">
                    <table>
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
                                        <div class="tt-product-img">
                                            <img src="{{sc_file('images/loader.svg')}}" data-src="{{sc_file($product->getImage())}}" alt="{{ $product->name }}">
                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="tt-title">
                                            <a href="{{$product->getUrl() }}">{{ $product->name }}</a>
                                            {{-- Go to store --}}
                                            @if (sc_config_global('MultiVendorPro') && config('app.storeId') == SC_ID_ROOT)
                                            <div class="store-url"><a href="{{ $product->goToStore() }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i> {{ trans('front.store').' '. $product->store_id  }}</a>
                                            </div>
                                            @endif
                                            {{-- End go to store --}}
                                            
                                            {{-- Process attributes --}}
                                            @if ($item->options->count())
                                            @foreach ($item->options as $groupAtt => $att)
                                            <b>{{ $attributesGroup[$groupAtt] }}</b>: {!! sc_render_option_price($att) !!}
                                            @endforeach
                                            @endif
                                            {{-- //end Process attributes --}}
                                        </h2>
                                    </td>
                                    <td>{!! $product->showPrice() !!}</td>
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

                <div class="tt-shopcart-col">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="tt-shopcart-box">
                                <h4 class="tt-title">
                                    {{ trans('cart.shipping_address') }}
                                </h4>

                                {{-- Display address --}}
                                <div class="table-responsive">
                                    <table class="tt-shopcart-table" id="showTotal">
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-xl-4">
                <div class="tt-shopcart-wrapper"> 
                    <div class="tt-shopcart-box tt-boredr-large">
                        <table class="tt-shopcart-table01" id="showTotal">
                            @foreach ($dataTotal as $key => $element)
                            @if ($element['code']=='total')
                            <tfoot class="showTotal">
                                <tr>
                                    <th>{!! $element['title'] !!}</th>
                                    <td id="{{ $element['code'] }}">{{$element['text'] }}</td>
                                </tr>
                            </tfoot>
                            @elseif($element['value'] !=0)
                            <tbody class="showTotal">
                                <tr>
                                    <th>{!! $element['title'] !!}</th>
                                    <td id="{{ $element['code'] }}">{{$element['text'] }}</td>
                                </tr>
                            </tbody>
                            @elseif($element['code'] =='shipping')
                            <tbody class="showTotal">
                                <tr>
                                    <th>{!! $element['title'] !!}</th>
                                    <td id="{{ $element['code'] }}">{{$element['text'] }}</td>
                                </tr>
                            </tbody>
                            @endif
                            @endforeach
                        </table>        
                        
                        @if (!sc_config('payment_off'))
                            {{-- Payment method --}}
                            <div class="row">
                                <div class="col-md-12">

                                    <h4>{{ trans('cart.payment_method') }} :</h4>
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

                        <div class="row" style="padding-bottom: 20px;">
                            <div class="col-md-6 text-center" style="margin-bottom: 20px;">
                                <button type="button" onClick="location.href='{{ sc_route('cart') }}'" class="btn btn--md btn--grey"><i class="icon-basket"></i><span>{{ trans('cart.back_to_cart') }}</span></button>
                            </div>
                            <div class="col-md-6 text-center">
                                <button class="btn" type="submit" id="submit-order"><span class="icon icon-check_circle"></span> {{ trans('cart.confirm') }}</button>
                            </div>
                        </div>
                        

                        
                    </div>
                </div>
            </form>
            </div>
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