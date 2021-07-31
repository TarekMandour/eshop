@php
/*
$layout_page = shop_profile
** Variables:**
- $addresses
*/ 
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="container-indent">
  <div class="container container-fluid-custom-mobile-padding">
      
      <div class="tt-shopping-layout">
          <h2 class="tt-title-border">{{ trans('account.my_profile') }}</h2>
          <div class="row">
              <div class="col-md-3 aside aside--left">
                  @include($sc_templatePath.'.account.nav_customer')
              </div>
              <div class="col-md-8 aside">
                  <div class="tt-wrapper">
                      <h3 class="tt-title">{{ $title ?? '' }}</h3>

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
                              <button title="{{ trans('account.addresses.default') }}" class="btn  link-icn js-show-form"><i class="mdi mdi-star-circle"></i></button>
                          </div>
                        @endforeach
                      @endif
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