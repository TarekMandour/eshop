@php
/*
$layout_page = shop_contact
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')

<div class="container-indent">
    <div class="container">
        <div class="contact-map">
            {!! sc_store('mapg') !!}
        </div>
    </div>
</div>

<div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
        <div class="tt-contact02-col-list">
            <div class="row">
                <div class="col-sm-12 col-md-4 ml-sm-auto mr-sm-auto">
                    <div class="tt-contact-info">
                        <i class="tt-icon icon-f-93"></i>
                        <h6 class="tt-title">LET’S HAVE A CHAT!</h6>
                        <address>
                            {{ sc_store('long_phone') }}<br>

                            <p>{{ sc_store('email') }}</p>
                            @if (sc_store('email2') != null)
                                <p>{{ sc_store('email2') }}</p>
                            @endif
                            @if (sc_store('email3') != null)
                                <p>{{ sc_store('email3') }}</p>
                            @endif
                            @if (sc_store('email4') != null)
                                <p>{{ sc_store('email4') }}</p>
                            @endif
                            @if (sc_store('email5') != null)
                                <p>{{ sc_store('email5') }}</p>
                            @endif
                            @if (sc_store('email6') != null)
                                <p>{{ sc_store('email6') }}</p>
                            @endif
                        </address>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="tt-contact-info">
                        <i class="tt-icon icon-f-24"></i>
                        <h6 class="tt-title">VISIT OUR LOCATION</h6>
                        <address>
                            {{ sc_store('address') }}
                        </address>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="tt-contact-info">
                        <i class="tt-icon icon-f-92"></i>
                        <h6 class="tt-title">WORK TIME</h6>
                        <address>
                            {{ sc_store('time_active') }}
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
        <form id="" class="contact-form form-default" method="post" action="{{ sc_route('contact.post') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control  {{ ($errors->has('name'))?"input-error":"" }}"
                            name="name" placeholder="{{ trans('front.contact_form.name') }}" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                        <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <input type="telephone" class="form-control {{ ($errors->has('phone'))?"input-error":"" }}"
                            name="phone" placeholder="{{ trans('front.contact_form.phone') }}" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            {{ $errors->first('phone') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control {{ ($errors->has('email'))?"input-error":"" }}"
                            name="email" placeholder="{{ trans('front.contact_form.email') }}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <input type="text" class="form-control form-control--sm {{ ($errors->has('title'))?"input-error":"" }}"
                            name="title" placeholder="{{ trans('front.contact_form.subject') }}" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                        <span class="help-block">
                            {{ $errors->first('title') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                        <textarea class="form-control {{ ($errors->has('content'))?"input-error":"" }}" rows="12"
                            cols="75" name="content" placeholder="{{ trans('front.contact_form.content') }}">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                        <span class="help-block">
                            {{ $errors->first('content') }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn">{{ trans('front.contact_form.submit') }}</button>
            </div>
        </form>
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