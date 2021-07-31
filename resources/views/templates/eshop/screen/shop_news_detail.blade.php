@php
/*
$layout_page = shop_news_detail
**Variables:**
- $news: no paginate
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="container-indent">
	<div class="container container-fluid-custom-mobile-padding">
		<div class="row justify-content-center">
			<div class="col-xs-12 col-md-10 col-lg-8 col-md-auto">
				<div class="tt-post-single">
					<h1 class="tt-title">
						{{ $title ?? '' }}
          </h1>
          <div class="tt-autor">{{ date_format($news->created_at, "Y-m-d") }}</div>
					<div class="tt-post-content">
						{!! sc_html_render($news->content) !!}
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
