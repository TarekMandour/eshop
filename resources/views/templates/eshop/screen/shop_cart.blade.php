@php
/*
$layout_page = shop_cart
**Variables:**
- $cart: no paginate
- $shippingMethod: string
- $paymentMethod: string
- $totalMethod: array
- $dataTotal: array
- $shippingAddress: array
- $countries: array
- $attributesGroup: array
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
                                    <td>
                                        <a onClick="return confirm('{{trans('messages.ask_delete')}}')" title="Remove Item" alt="Remove Item"
                                        class="tt-btn-close" data-tooltip="Remove Product"
                                        href="{{ sc_route("cart.remove", ['id'=>$item->rowId, 'instance' => 'cart']) }}"></a>
                                    </td>
                                    <td>
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
                                    <td>
                                        {!! $product->showPrice() !!}
                                    </td>
                                    <td>
                                        <div class="detach-quantity-desctope">
                                            <div class="tt-input-counter style-01">
                                                <span class="minus-btn"></span>
                                                <input  type="text" data-id="{{ $item->id }}"
                                                    data-rowid="{{$item->rowId}}" data-store_id="{{$product->store_id}}" onChange="updateCart($(this));"
                                                    class="qty-input item-qty" name="qty-{{$item->id}}" value="{{$item->qty}}" size="5">
                                                <span class="plus-btn"></span>
                                            </div>
                                        </div>
                                        <span class="text-danger item-qty-{{$item->id}}" style="display: none;"></span>
                                        @if (session('arrErrorQty')[$product->id] ?? 0)
                                        <span class="help-block">
                                            <br>{{ trans('cart.minimum_value', ['value' => session('arrErrorQty')[$product->id]]) }}
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="tt-price subtotal">
                                            {{sc_currency_render($item->subtotal)}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    <div class="tt-shopcart-btn">
                        <div class="col-left">
                            <a href="{{ sc_route('home') }}" class="btn-link"><i class="icon-e-19"></i> {{ trans('cart.back_to_shop') }}</a>
                        </div>
                        <div class="col-right">
                            <a class="btn-link" type="button"
                            onClick="if(confirm('Confirm ?')) window.location.href='{{ sc_route('cart.clear', ['instance' => 'cart']) }}';">
                            <i class="icon-h-02"></i> {{ trans('cart.remove_all') }}</a>
                        </div>
                    </div>
                </div>

                <div class="tt-shopcart-col">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="tt-shopcart-box">
                                <h4 class="tt-title">
                                    ESTIMATE SHIPPING AND TAX
                                </h4>
                                <a href="{{route('login')}}">{{ trans('account.login') }}</a> | <a href="{{route('register')}}">{{ trans('account.register') }}</a>

                                    <form class="form-default" id="form-process" role="form" method="POST" action="{{ sc_route('checkout.prepare') }}">
                                        @csrf
                                    @if (sc_config('customer_lastname'))
                                        
                                        <div class="row  mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="{{ trans('cart.first_name') }}"
                                                    value="{{old('first_name', $shippingAddress['first_name'])}}">
                                                    @if($errors->has('first_name'))
                                                        <span class="help-block">{{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="{{ trans('cart.last_name') }}"
                                                    value="{{old('last_name', $shippingAddress['last_name'])}}">
                                                    @if($errors->has('last_name'))
                                                        <span class="help-block">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="{{ trans('cart.first_name') }}"
                                            value="{{old('first_name', $shippingAddress['first_name'])}}">
                                            @if($errors->has('first_name'))
                                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    @endif

                                    @if (sc_config('customer_name_kana'))
                                        <div class="row  mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('first_name_kana') ? ' has-error' : '' }}">
                                                    <input class="form-control" name="first_name_kana" type="text"
                                                        placeholder="{{ trans('cart.first_name_kana') }}"
                                                        value="{{old('first_name_kana', $shippingAddress['first_name_kana'])}}">
                                                    @if($errors->has('first_name_kana'))
                                                    <span class="help-block">{{ $errors->first('first_name_kana') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('last_name_kana') ? ' has-error' : '' }}">
                                                    <input class="form-control" name="last_name_kana" type="text" placeholder="{{ trans('cart.last_name_kana') }}"
                                                        value="{{old('last_name_kana',$shippingAddress['last_name_kana'])}}">
                                                    @if($errors->has('last_name_kana'))
                                                    <span class="help-block">{{ $errors->first('last_name_kana') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row  mt-2">
                                        @if (sc_config('customer_phone'))
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" name="email" type="text" placeholder="{{ trans('cart.email') }}"
                                                    value="{{old('email', $shippingAddress['email'])}}">
                                                @if($errors->has('email'))
                                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" name="phone" type="text" placeholder="{{ trans('cart.phone') }}"
                                                    value="{{old('phone',$shippingAddress['phone'])}}">
                                                @if($errors->has('phone'))
                                                    <span class="help-block">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <input class="form-control" name="email" type="text" placeholder="{{ trans('cart.email') }}"
                                                value="{{old('email', $shippingAddress['email'])}}">
                                            @if($errors->has('email'))
                                                <span class="help-block">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        @endif
                                    </div>

                                    @if (sc_config('customer_country'))
                                    <div class="form-group select-wrapper select-wrapper-sm  mt-2">
                                        @php
                                            $ct = old('country',$shippingAddress['country']);
                                        @endphp
                                        <select class="form-control form-control--sm country" name="country">
                                            <option value="">{{ trans('cart.country') }}</option>
                                            @foreach ($countries as $k => $v)
                                            <option value="{{ $k }}" {{ ($ct ==$k) ? 'selected':'' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                                {{ $errors->first('country') }}
                                            </span>
                                        @endif
                                    </div>
                                    @endif

                                    <div class="row  mt-2">
                                        
                                        @if (sc_config('customer_postcode'))
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input class="form-control" name="postcode" type="text" placeholder="{{ trans('cart.postcode') }}"
                                                    value="{{ old('postcode',$shippingAddress['postcode'])}}">
                                                    @if($errors->has('postcode'))
                                                        <span class="help-block">{{ $errors->first('postcode') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        @if (sc_config('customer_company'))
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input class="form-control" name="company" type="text" placeholder="{{ trans('cart.company') }}"
                                                    value="{{ old('company',$shippingAddress['company'])}}">
                                                    @if($errors->has('company'))
                                                        <span class="help-block">{{ $errors->first('company') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @if (sc_config('customer_address1'))
                                        <div class="form-group">
                                            <input class="form-control" name="address1" type="text" placeholder="{{ trans('cart.address1') }}"
                                                value="{{ old('address1',$shippingAddress['address1'])}}">
                                            @if($errors->has('address1'))
                                                <span class="help-block">{{ $errors->first('address1') }}</span>
                                            @endif
                                        </div>
                                    @endif

                                    @if (sc_config('customer_address2'))
                                        <div class="form-group">
                                            <input class="form-control" name="address2" type="text" placeholder="{{ trans('cart.address2') }}"
                                                value="{{ old('address2',$shippingAddress['address2'])}}">
                                            @if($errors->has('address2'))
                                                <span class="help-block">{{ $errors->first('address2') }}</span>
                                            @endif
                                        </div>
                                    @endif

                                    @if (sc_config('customer_address3'))
                                        <div class="form-group">
                                            <input class="form-control" name="address3" type="text" placeholder="{{ trans('cart.address3') }}"
                                                value="{{ old('address3',$shippingAddress['address3'])}}">
                                            @if($errors->has('address3'))
                                                <span class="help-block">{{ $errors->first('address3') }}</span>
                                            @endif
                                        </div>
                                    @endif

                                    <textarea class="form-control" rows="3" name="comment"
                                            placeholder="{{ trans('cart.note') }}....">{{ old('comment','')}}</textarea>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="tt-shopcart-box">
                                @if (!sc_config('shipping_off'))
                                    <div class="card">
                                        <div class="card-body {{ $errors->has('shippingMethod') ? ' has-error' : '' }}">
                                            <h4 class="tt-title">
                                                {{ trans('cart.shipping_method') }}
                                            </h4>
                                            @if($errors->has('shippingMethod'))
                                            <span class="help-block">{{ $errors->first('shippingMethod') }}</span>
                                            @endif

                                            <ul class="list-form-column"> 
                                                @foreach ($shippingMethod as $key => $shipping)
                                                <li>
                                                    <label class="radio">
                                                    <input id="formcheckoutRadio1{{$key}}" type="radio" name="shippingMethod" value="{{ $shipping['key'] }}" {{ (old('shippingMethod') == $key)?'checked':'' }} {{ ($shipping['permission'])?'':'disabled' }}>
                                                    <span class="outer"><span class="inner"></span></span><img title="{{ $shipping['title'] }}"
                                                    alt="{{ $shipping['title'] }}"
                                                    src="{{ sc_file($shipping['image']) }}" style="width: 60px;"> {{ $shipping['title'] }}</label>
                                                </li>
                                                {{-- Render view --}}
                                                @if (view()->exists($shipping['pathPlugin'].'::render'))
                                                    @include($shipping['pathPlugin'].'::render')
                                                @endif
                                                {{-- //Render view --}}

                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                @if (!sc_config('payment_off'))
                                    <div class="mt-2"></div>
                                    <div class="card">
                                        <div class="card-body {{ $errors->has('paymentMethod') ? ' has-error' : '' }}">
                                            <h4 class="tt-title">
                                                {{ trans('cart.payment_method') }}
                                            </h4>
                                            @if($errors->has('paymentMethod'))
                                                <span class="help-block">{{ $errors->first('paymentMethod') }}</span>
                                            @endif

                                            <ul class="list-form-column">                                            
                                                @foreach ($paymentMethod as $key => $payment)

                                                    <li>
                                                        <label class="radio">
                                                        <input id="formcheckoutRadio4{{$key}}" type="radio" name="paymentMethod" value="{{ $payment['key'] }}" {{ (old('shippingMethod') == $key)?'checked':'' }} {{ ($payment['permission'])?'':'disabled' }}>
                                                        <span class="outer"><span class="inner"></span></span><img title="{{ $payment['title'] }}"
                                                        alt="{{ $payment['title'] }}"
                                                        src="{{ sc_file($payment['image']) }}" style="width: 60px;"> {{ $payment['title'] }}</label>
                                                    </li>

                                                    {{-- Render view --}}
                                                    @if (view()->exists($payment['pathPlugin'].'::render'))
                                                        @include($payment['pathPlugin'].'::render')
                                                    @endif
                                                    {{-- //Render view --}}

                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-xl-4">
                <div class="tt-shopcart-wrapper"> 
                    <div class="tt-shopcart-box tt-boredr-large">
                        @foreach ($totalMethod as $key => $plugin)
                            @if (view()->exists($plugin['pathPlugin'].'::render'))
                                @include($plugin['pathPlugin'].'::render')
                            @endif
                        @endforeach

                        <hr>

                        @if (view()->exists($sc_templatePath.'.common.render_total'))
                            @include($sc_templatePath.'.common.render_total')
                        @endif

                        <div
                            class="form-group {{ $errors->has('totalMethod') ? ' has-error' : '' }}">
                            @if($errors->has('totalMethod'))
                                <span class="help-block">{{ $errors->first('totalMethod') }}</span>
                            @endif
                        </div>

                        {{-- //Total method --}}

                        {!! $viewCaptcha ?? ''!!}

                        <button class="btn btn-lg" type="submit" id="button-form-process"><span class="icon icon-check_circle"></span> {{ trans('cart.checkout') }}</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
    

@endif

</section>

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

{{-- Render script from total method --}}
@foreach ($totalMethod as $key => $plugin)
@if (view()->exists($plugin['pathPlugin'].'::script'))
    @include($plugin['pathPlugin'].'::script')
@endif
@endforeach
{{--// Render script from total method --}}

{{-- Render script from shipping method --}}
@foreach ($shippingMethod as $key => $plugin)
@if (view()->exists($plugin['pathPlugin'].'::script'))
    @include($plugin['pathPlugin'].'::script')
@endif
@endforeach
{{--// Render script from shipping method --}}

{{-- Render script from payment method --}}
@foreach ($paymentMethod as $key => $plugin)
@if (view()->exists($plugin['pathPlugin'].'::script'))
    @include($plugin['pathPlugin'].'::script')
@endif
@endforeach
{{--// Render script from payment method --}}

{{-- Render include script --}}
@if (!empty($layout_page) && $includePathScript = config('sc_include_script.'.$layout_page, []))
@foreach ($includePathScript as $script)
  @if (view()->exists($script))
    @include($script)
  @endif
@endforeach
@endif
{{--// Render include script --}}

<script type="text/javascript">
    function updateCart(obj){
        let new_qty = obj.val();
        let storeId = obj.data('store_id');
        let rowid = obj.data('rowid');
        let id = obj.data('id');
        $.ajax({
            url: '{{ sc_route('cart.update') }}',
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            data: {
                id: id,
                rowId: rowid,
                new_qty: new_qty,
                storeId: storeId,
                _token:'{{ csrf_token() }}'},
            success: function(data){
                error= parseInt(data.error);
                if(error ===0)
                {
                    window.location.replace(location.href);
                }else{
                    $('.item-qty-'+id).css('display','block').html(data.msg);
                }

                }
        });
    }

    // function buttonQty(action){

    //     if(action === 'reduce'){
    //         $('.qty-input').val(parseInt($('.qty-input').val()) - 1);
    //     }else{
    //         $('.qty-input').val(parseInt($('.qty-input').val()) + 1);
    //     }
    //     updateCart($('.qty-input'))
    // }

    $('#button-form-process').click(function(){
        $('#form-process').submit();
        $(this).prop('disabled',true);
    });

    $('#addressList').change(function(){
        var id = $('#addressList').val();
        if(!id) {
            return;   
        } else if(id == 'new') {
            $('#form-process [name="first_name"]').val('');
            $('#form-process [name="last_name"]').val('');
            $('#form-process [name="phone"]').val('');
            $('#form-process [name="postcode"]').val('');
            $('#form-process [name="company"]').val('');
            $('#form-process [name="country"]').val('');
            $('#form-process [name="address1"]').val('');
            $('#form-process [name="address2"]').val('');
            $('#form-process [name="address3"]').val('');
        } else {
            $.ajax({
            url: '{{ sc_route('customer.address_detail') }}',
            type: 'GET',
            dataType: 'json',
            async: false,
            cache: false,
            data: {
                id: id,
            },
            success: function(data){
                error= parseInt(data.error);
                if(error === 1)
                {
                    alert(data.msg);
                }else{
                    $('#form-process [name="first_name"]').val(data.first_name);
                    $('#form-process [name="last_name"]').val(data.last_name);
                    $('#form-process [name="phone"]').val(data.phone);
                    $('#form-process [name="postcode"]').val(data.postcode);
                    $('#form-process [name="company"]').val(data.company);
                    $('#form-process [name="country"]').val(data.country);
                    $('#form-process [name="address1"]').val(data.address1);
                    $('#form-process [name="address2"]').val(data.address2);
                    $('#form-process [name="address3"]').val(data.address3);
                }

                }
        });
        }
    });

</script>
@endpush

@push('styles')
{{-- Your css style --}}
@endpush