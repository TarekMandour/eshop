@php
/*
$layout_page = shop_profile
** Variables:**
- $addresses
*/ 
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')
<div class="holder">
  <div class="container">
      <div class="row">
          <div class="col-md-4 aside aside--left">
              @include($sc_templatePath.'.account.nav_customer')
          </div>
          <div class="col-md-14 aside">
              <div class="row vert-margin">
                  <div class="col-sm-9">
                      <div class="card">
                          <div class="card-body">
                              <h3>{{ $title }}</h3>
                              @if (count($addresses) ==0)
                                <div class="text-danger">
                                  {{ trans('account.addresses.empty') }}
                                </div>
                              @else
                                @foreach($addresses as $address)
                                  <p>
                                    @if (sc_config('customer_lastname'))
                                    <b>{{ trans('account.first_name') }}:</b> {{ $address['first_name'] }}<br>
                                    <b>{{ trans('account.last_name') }}:</b> {{ $address['last_name'] }}<br>
                                    @else
                                    <b>{{ trans('account.name') }}:</b> {{ $address['first_name'] }}<br>
                                    @endif
                                    
                                    @if (sc_config('customer_phone'))
                                    <b>{{ trans('account.phone') }}:</b> {{ $address['phone'] }}<br>
                                    @endif

                                    @if (sc_config('customer_postcode'))
                                    <b>{{ trans('account.postcode') }}:</b> {{ $address['postcode'] }}<br>
                                    @endif

                                    <b>{{ trans('account.address1') }}:</b> {{ $address['address1'] }}<br>

                                    @if (sc_config('customer_address2'))
                                    <b>{{ trans('account.address2') }}:</b> {{ $address['address2'] }}<br>
                                    @endif

                                    @if (sc_config('customer_address3'))
                                    <b>{{ trans('account.address3') }}:</b> {{ $address['address3'] }}<br>
                                    @endif

                                    @if (sc_config('customer_country'))
                                    <b>{{ trans('account.country') }}:</b> {{ $countries[$address['country']] ?? $address['country'] }}<br>
                                    @endif
                                  </p>
                                  <div class="mt-2 clearfix">
                                      <a title="{{ trans('account.addresses.edit') }}" href="{{ sc_route('customer.update_address', ['id' => $address->id]) }}" class="btn  link-icn"><i class="icon-pencil"></i>{{ trans('account.addresses.edit') }}</a>
                                      <a href="JAVASCRIPT:;" title="{{ trans('account.addresses.delete') }}" data-id="{{ $address->id }}" class="btn  link-icn delete-address"><i class="icon-recycle"></i>{{ trans('account.addresses.delete') }}</a>
                                      <button title="{{ trans('account.addresses.default') }}" class="btn  link-icn js-show-form"><i class="icon-star"></i></button>
                                  </div>
                                @endforeach
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

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
<script>
  $('.delete-address').click(function(){
    var r = confirm("{{ trans('account.confirm_delete') }}");
    if(!r) {
      return;
    }
    var id = $(this).data('id');
    $.ajax({
            url:'{{ sc_route("member.delete_address") }}',
            type:'POST',
            dataType:'json',
            data:{id:id,"_token": "{{ csrf_token() }}"},
                beforeSend: function(){
                $('#loading').show();
            },
            success: function(data){
              if(data.error == 0) {
                location.reload();
              }
            }
        });
  });
</script>
@endpush