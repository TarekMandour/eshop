<h4 class="tt-title">
    {{ trans('cart.coupon') }}
</h4>

<div id="coupon-group" class="form-group {{ Session::has('error_discount')?'has-error':'' }} mt-2">
    <input type="text" {{ ($plugin['permission'])?'':'disabled' }} class="form-control" placeholder="{{ trans('cart.coupon') }}" id="coupon-value" aria-describedby="inputGroupSuccess3Status">
</div>
<span class="btn input-group-text {{ ($plugin['permission'])?'':'disabled' }}" {!! ($plugin['permission'])?'id="coupon-button"':'' !!}  data-loading-text="<i class='fa fa-spinner fa-spin'></i> checking">{{ trans('cart.apply') }}</span>
<span class="status-coupon" style="display: none;" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
<div class="coupon-msg  {{ Session::has('error_discount')?'text-danger':'' }}" style="text-align: left;padding-left: 10px; {{ Session::has('error_discount')? 'color:red':'' }}">{{ Session::has('error_discount')?Session::get('error_discount'):'' }}</div>