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

    <div class="holder">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-11 col-xl-13">
                    <div class="cart-table">
                        <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                            <div class="cart-table-prd-image text-center">
                                {{ trans('product.image') }}
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">{{ trans('product.name') }}</div>
                                <div class="cart-table-prd-qty">{{ trans('product.quantity') }}</div>
                                <div class="cart-table-prd-price">{{ trans('product.price') }}</div>
                                <div class="cart-table-prd-action">&nbsp;</div>
                            </div>
                        </div>
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
                            <div class="cart-table-prd {{ session('arrErrorQty')[$product->id] ?? '' }}{{ (session('arrErrorQty')[$product->id] ?? 0) ? ' has-error' : '' }}">
                                <div class="cart-table-prd-image">
                                    <a href="{{$product->getUrl() }}" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{sc_file($product->getImage())}}" alt="{{ $product->name }}"></a>
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">
                                        <h2 class="cart-table-prd-name"><a href="{{$product->getUrl() }}">
                                            {{ $product->name }}<br />

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
                                        </a></h2>
                                        <div class="cart-table-prd-price">
                                            <div class="price-new">{!! $product->showPrice() !!}</div>
                                        </div>
                                    </div>
                                    <div class="cart-table-prd-qty">
                                        <div class="qty qty-changer cart-col-qty">
                                            <button class="decrease" onclick="buttonQty('reduce')"></button>
                                            <div class="cart-qty">
                                                <input  type="number" data-id="{{ $item->id }}"
                                                    data-rowid="{{$item->rowId}}" data-store_id="{{$product->store_id}}" onChange="updateCart($(this));"
                                                    class="qty-input item-qty" name="qty-{{$item->id}}" value="{{$item->qty}}">
                                            </div>
                                            <button class="increase" onclick="buttonQty('increase')"></button>
                                        </div>
                                        <span class="text-danger item-qty-{{$item->id}}" style="display: none;"></span>
                                        @if (session('arrErrorQty')[$product->id] ?? 0)
                                        <span class="help-block">
                                            <br>{{ trans('cart.minimum_value', ['value' => session('arrErrorQty')[$product->id]]) }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="cart-table-prd-price-total">
                                        {{sc_currency_render($item->subtotal)}}
                                    </div>
                                </div>
                                <div class="cart-table-prd-action">
                                    <a onClick="return confirm('{{trans('messages.ask_delete')}}')" title="Remove Item" alt="Remove Item"
                                    class="cart-table-prd-remove" data-tooltip="Remove Product"
                                    href="{{ sc_route("cart.remove", ['id'=>$item->rowId, 'instance' => 'cart']) }}"><i class="icon-recycle"></i></a>
                                </div>
                            </div>
                        @endforeach 
                    </div>

                    <div class="text-center mt-1">
                        <a class="btn btn--grey btn-delete-all" type="button"
                        onClick="if(confirm('Confirm ?')) window.location.href='{{ sc_route('cart.clear', ['instance' => 'cart']) }}';">
                        {{ trans('cart.remove_all') }}</a>
                    </div>

                    <form class="sc-shipping-address" id="form-process" role="form" method="POST" action="{{ sc_route('checkout.prepare') }}">
                        @csrf
                    <div class="row mt-8">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <p><a href="{{route('login')}}">{{ trans('account.login') }}</a> | <a href="{{route('register')}}">{{ trans('account.register') }}</a></p>

                                    <div class="row  mt-2">
                                        @if (sc_config('customer_lastname'))
                                            <div class="col-sm-9">
                                                <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                    <input class="form-control" name="first_name" type="text"
                                                    placeholder="{{ trans('cart.first_name') }}"
                                                    value="{{old('first_name', $shippingAddress['first_name'])}}">
                                                    @if($errors->has('first_name'))
                                                        <span class="help-block">{{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                    <input class="form-control" name="last_name" type="text" placeholder="{{ trans('cart.last_name') }}"
                                                    value="{{old('last_name',$shippingAddress['last_name'])}}">
                                                    @if($errors->has('last_name'))
                                                        <span class="help-block">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <input class="form-control" name="first_name" type="text"
                                                placeholder="{{ trans('cart.first_name') }}"
                                                value="{{old('first_name', $shippingAddress['first_name'])}}">
                                                @if($errors->has('first_name'))
                                                    <span class="help-block">{{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                    @if (sc_config('customer_name_kana'))
                                        <div class="row  mt-2">
                                            <div class="col-sm-9">
                                                <div class="form-group {{ $errors->has('first_name_kana') ? ' has-error' : '' }}">
                                                    <input class="form-control" name="first_name_kana" type="text"
                                                        placeholder="{{ trans('cart.first_name_kana') }}"
                                                        value="{{old('first_name_kana', $shippingAddress['first_name_kana'])}}">
                                                    @if($errors->has('first_name_kana'))
                                                    <span class="help-block">{{ $errors->first('first_name_kana') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
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
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input class="form-control" name="email" type="text" placeholder="{{ trans('cart.email') }}"
                                                    value="{{old('email', $shippingAddress['email'])}}">
                                                @if($errors->has('email'))
                                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
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

                                    <br>
                                    
                                    <div id="collapse3" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <textarea class="form-control" rows="5" name="comment"
                                            placeholder="{{ trans('cart.note') }}....">{{ old('comment','')}}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            @if (!sc_config('shipping_off'))
                                <div class="card">
                                    <div class="card-body {{ $errors->has('shippingMethod') ? ' has-error' : '' }}">
                                        <h2>{{ trans('cart.shipping_method') }}</h2>
                                        @if($errors->has('shippingMethod'))
                                        <span class="help-block">{{ $errors->first('shippingMethod') }}</span>
                                        @endif

                                        @foreach ($shippingMethod as $key => $shipping)
                                        <div class="clearfix">
                                            <input id="formcheckoutRadio1{{$key}}" value="{{ $shipping['key'] }}" name="shippingMethod" type="radio" class="radio" {{ (old('shippingMethod') == $key)?'checked':'' }} {{ ($shipping['permission'])?'':'disabled' }}>
                                            <label for="formcheckoutRadio1{{$key}}">{{ $shipping['title'] }}</label>
                                        </div>
                                        {{-- Render view --}}
                                        @if (view()->exists($shipping['pathPlugin'].'::render'))
                                            @include($shipping['pathPlugin'].'::render')
                                        @endif
                                        {{-- //Render view --}}

                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if (!sc_config('payment_off'))
                                <div class="mt-2"></div>
                                <div class="card">
                                    <div class="card-body {{ $errors->has('paymentMethod') ? ' has-error' : '' }}">
                                        <h2>{{ trans('cart.payment_method') }}</h2>
                                        @if($errors->has('paymentMethod'))
                                            <span class="help-block">{{ $errors->first('paymentMethod') }}</span>
                                        @endif
                                        @foreach ($paymentMethod as $key => $payment)
                                            <div class="clearfix">
                                            <input id="formcheckoutRadio4{{$key}}" value="{{ $payment['key'] }}" name="paymentMethod" type="radio" class="radio" {{ (old('shippingMethod') == $key)?'checked':'' }} {{ ($payment['permission'])?'':'disabled' }}>
                                                <label for="formcheckoutRadio4{{$key}}"> <img title="{{ $payment['title'] }}"
                                                    alt="{{ $payment['title'] }}"
                                                    src="{{ sc_file($payment['image']) }}" style="width: 60px;"> {{ $payment['title'] }}</label>
                                            </div>

                                            {{-- Render view --}}
                                            @if (view()->exists($payment['pathPlugin'].'::render'))
                                                @include($payment['pathPlugin'].'::render')
                                            @endif
                                            {{-- //Render view --}}

                                        @endforeach

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-lg-7 col-xl-5 mt-3 mt-md-0">
                    <div class="form-group">
                        @foreach ($totalMethod as $key => $plugin)
                            @if (view()->exists($plugin['pathPlugin'].'::render'))
                                @include($plugin['pathPlugin'].'::render')
                            @endif
                        @endforeach
                    </div>

                    <div class="mt-2"></div>

                    {{-- Data total --}}
                    @if (view()->exists($sc_templatePath.'.common.render_total'))
                        @include($sc_templatePath.'.common.render_total')
                    @endif
                    {{-- Data total --}}

                    {{-- Total method --}}

                    <div
                        class="form-group {{ $errors->has('totalMethod') ? ' has-error' : '' }}">
                        @if($errors->has('totalMethod'))
                            <span class="help-block">{{ $errors->first('totalMethod') }}</span>
                        @endif
                    </div>

                    {{-- //Total method --}}

                    <div class="mt-2"></div>
                    <div class="card-total">
                        {!! $viewCaptcha ?? ''!!}
                        <button class="btn btn--full btn--lg" type="submit" id="button-form-process">{{ trans('cart.checkout') }}</button>
                    </div>
                    
                    
                </div>
            </form>
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

    function buttonQty(action){

        if(action === 'reduce'){
            $('.qty-input').val(parseInt($('.qty-input').val()) - 1);
        }else{
            $('.qty-input').val(parseInt($('.qty-input').val()) + 1);
        }
        updateCart($('.qty-input'))
    }

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