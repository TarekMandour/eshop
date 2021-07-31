@php
/*
$layout_page = shop_order_success
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="container-indent nomargin">
  <div class="tt-empty-cart">
    <span class="tt-icon icon-f-39"></span>
      <h4 class="tt-title">{{ $title }}</h4>
      <h1 class="tt-title">{{ trans('order.success.msg') }}</h1>
      <h4 class="tt-title">{{ trans('order.success.order_info',['order_id'=>session('orderID')]) }}</h4>
      <a href="{{ sc_route('home') }}" class="btn">{{ trans('cart.back_to_shop') }}</a>
  </div>
</div>

@endsection

@section('breadcrumb')
@endsection

@push('styles')
{{-- Your css style --}}
@endpush

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
