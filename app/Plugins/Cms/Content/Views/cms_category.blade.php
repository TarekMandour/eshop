@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="container-indent">
  <div class="container">
    <h1 class="tt-title-subpages noborder">{{ $title ?? '' }}</h1>
    <div class="tt-blog-masonry">
      <div class="tt-blog-init tt-grid-col-3 tt-layout-01-post tt-add-item">
        @if ($entries->count())
          @foreach ($entries as $entryDetail)
            <div class="element-item">
              <div class="tt-post">
                <div class="tt-post-img">
                  <a href="{{ $entryDetail->getUrl() }}"><img src="{{ sc_file($entryDetail->getThumb()) }}" alt="{{ $entryDetail->title }}"></a>
                </div>
                <div class="tt-post-content">
                  <div class="tt-background"></div>
                  <h2 class="tt-title"><a href="{{ $entryDetail->getUrl() }}">{{ $entryDetail->title }}</a></h2>
                </div>
              </div>
            </div>
          @endforeach
        @else
          {!! trans('front.no_data') !!}
        @endif
      </div>
      

    </div>
    {{ $entries->links() }}
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
