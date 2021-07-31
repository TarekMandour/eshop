@php
/*
$layout_page = shop_order_success
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="holder mt-0">
  <div class="container">
      <div class="page404-bg">
        <div class="page404-text">
            <div class="txt2 mb-5">{{ $title }}</div>
            <div class="txt4">{{ trans('order.success.msg') }}</div>
            <div class="txt2">{{ trans('order.success.order_info',['order_id'=>session('orderID')]) }}</div>
          </div>
      </div>
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
