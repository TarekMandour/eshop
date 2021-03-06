@php
/*
$layout_page = shop_item_list
**Variables:**
- $itemsList: paginate
Use paginate: $itemsList->appends(request()->except(['page','_token']))->links()
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main_content_center')
<div class="col-lg-8 col-xl-9">
<h6 class="aside-title">{{ $title }}</h6>
<section class="section section-xl bg-default">
    <div class="container">
      <div class="row row-30">
        @if ($itemsList->count())
            @foreach ($itemsList as $item)
            <div class="col-sm-6 col-lg-4 text-center">
                <!-- Post Classic-->
                <article class="post post-classic box-md"><a class="post-classic-figure" href="{{ $item->getUrl() }}">
                    <img src="{{ sc_file($item->getThumb()) }}" alt="" width="370" height="239"></a>
                    <h5 class="post-classic-title"><a href="{{ $item->getUrl() }}">{{ $item->name }}</a></h5>
                </article>
              </div>
            @endforeach

            <div class="pagination-wrap">
                <!-- Bootstrap Pagination-->
                <nav aria-label="Page navigation">
                    {{ $itemsList->links() }}
                </nav>
            </div>
        @else
            {!! trans('front.no_data') !!}
        @endif
      </div>
    </div>
  </section>
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


@section('filter')
<form action="" method="GET" id="filter_sort">
    <div class="pull-right">
        <div>
            @php
            $queries = request()->except(['filter_sort','page']);
            @endphp
            @foreach ($queries as $key => $query)
            <input type="hidden" name="{{ $key }}" value="{{ $query }}">
            @endforeach
            <select class="custom-select" name="filter_sort">
                <option value="">{{ trans('front.filters.sort') }}</option>
                <option value="name_asc" {{ ($filter_sort =='name_asc')?'selected':'' }}>
                    {{ trans('front.filters.name_asc') }}</option>
                <option value="name_desc" {{ ($filter_sort =='name_desc')?'selected':'' }}>
                    {{ trans('front.filters.name_desc') }}</option>
                <option value="sort_asc" {{ ($filter_sort =='sort_asc')?'selected':'' }}>
                    {{ trans('front.filters.sort_asc') }}</option>
                <option value="sort_desc" {{ ($filter_sort =='sort_desc')?'selected':'' }}>
                    {{ trans('front.filters.sort_desc') }}</option>
                <option value="id_asc" {{ ($filter_sort =='id_asc')?'selected':'' }}>{{ trans('front.filters.id_asc') }}
                </option>
                <option value="id_desc" {{ ($filter_sort =='id_desc')?'selected':'' }}>
                    {{ trans('front.filters.id_desc') }}</option>
            </select>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script type="text/javascript">
    $('[name="filter_sort"]').change(function(event) {
      $('#filter_sort').submit();
    });
</script>

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