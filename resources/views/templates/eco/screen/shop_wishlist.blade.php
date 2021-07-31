@php
/*
$layout_page = shop_wishlist
**Variables:**
- $wishlist: no paginate
*/
@endphp
@extends($sc_templatePath.'.layout')

@section('block_main')
<div class="holder mt-6">
    <div class="container">
        @if (count($wishlist) ==0)
            {{ trans('front.empty_product') }}
        @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-order-history">
                <thead>
                    <tr style="background: #eaebec">
                        <th  scope="col" style="width: 50px;">No.</th>
                        <th  scope="col" style="width: 100px;">SKU</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Price</th>
                        <th scope="col" >Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wishlist as $item)
                    @php
                    $n = (isset($n)?$n:0);
                    $n++;
                    $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                    @endphp
                    <tr class="row_cart">
                        <td>{{ $n }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>
                            <a href="{{$product->getUrl() }}" class="row_cart-name">
                                <img width="100" src="{{sc_file($product->getImage())}}" alt="{{ $product->name }}">
                                <span>
                                    {{ $product->name }}<br />
                                    {{-- Process attributes --}}
                                    @if ($item->options->count())
                                    (
                                    @foreach ($item->options as $keyAtt => $att)
                                    <b>{{ $attributesGroup[$keyAtt] }}</b>: <i>{{ $att }}</i> ;
                                    @endforeach
                                    )<br>
                                    @endif
                                    {{-- //end Process attributes --}}
                                </span>
                            </a>
                        </td>
                        <td>{!! $product->showPrice() !!}</td>
                        <td>
                            <a onClick="return confirm('{{trans('messages.ask_delete')}}')" title="Remove Item" alt="Remove Item"
                                class="cart-table-prd-remove" href="{{ sc_route('cart.remove', ['id'=>$item->rowId, 'instance' => 'wishlist']) }}">
                                <i class="icon-recycle"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
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