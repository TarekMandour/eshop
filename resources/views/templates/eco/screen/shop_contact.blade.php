@php
/*
$layout_page = shop_contact
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')
<div class="holder">
    <div class="container">
        <div class="row">
            <div class="col-sm-18">
                <div class="contact-map">
                    {!! sc_store('mapg') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="holder">
	<div class="container">
		<div class="row vert-margin">
			<div class="col-sm-9">
                <div class="title-wrap">
                    <h2 class="h1-style">Get In Touch With Us</h2>
                </div>
                <form method="post" action="{{ sc_route('contact.post') }}" class="contact-form" data-toggle="validator" class="contact-form" id="form-process">
                    {{ csrf_field() }}
                    <div id="contactFormWrapper">
                        <div class="">
                            <div class="form-group">
                                <div class="row vert-margin-middle">
                                    <div class="col-lg">
                                        <div class=" {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>{{ trans('front.contact_form.name') }}:</label>
                                            <input type="text" class="form-control form-control--sm {{ ($errors->has('name'))?"input-error":"" }}"
                                                name="name" placeholder="{{ trans('front.contact_form.name') }}" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                {{ $errors->first('name') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class=" {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>{{ trans('front.contact_form.email') }}:</label>
                                            <input type="email" class="form-control form-control--sm {{ ($errors->has('email'))?"input-error":"" }}"
                                                name="email" placeholder="{{ trans('front.contact_form.email') }}" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                {{ $errors->first('email') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row vert-margin-middle">
                                    <div class="col-lg">
                                        <div class="{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label>{{ trans('front.contact_form.phone') }}:</label>
                                            <input type="telephone" class="form-control form-control--sm {{ ($errors->has('phone'))?"input-error":"" }}"
                                                name="phone" placeholder="{{ trans('front.contact_form.phone') }}" value="{{ old('phone') }}">
                                            @if ($errors->has('phone'))
                                            <span class="help-block">
                                                {{ $errors->first('phone') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label class="control-label">{{ trans('front.contact_form.subject') }}:</label>
                                            <input type="text" class="form-control form-control--sm {{ ($errors->has('title'))?"input-error":"" }}"
                                                name="title" placeholder="{{ trans('front.contact_form.subject') }}" value="{{ old('title') }}">
                                            @if ($errors->has('title'))
                                            <span class="help-block">
                                                {{ $errors->first('title') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row vert-margin-middle">
                                    <div class="col-lg">
                                        <div class="{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <label class="control-label">{{ trans('front.contact_form.content') }}:</label>
                                            <textarea class="form-control {{ ($errors->has('content'))?"input-error":"" }}" rows="5"
                                                cols="75" name="content" placeholder="{{ trans('front.contact_form.content') }}">{{ old('content') }}</textarea>
                                            @if ($errors->has('content'))
                                            <span class="help-block">
                                                {{ $errors->first('content') }}
                                            </span>
                                            @endif
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
    
                        {!! $viewCaptcha?? '' !!}
    
                        {{-- Button submit --}}
                        <div class="btn-toolbar form-group mt-3">
                            <input type="submit" value="{{ trans('front.contact_form.submit') }}" class="btn" id="button-form-process">
                        </div>
                        {{--// Button submit --}}
                    </div>
                </form>

            </div>
			<div class="col-sm-9">
                <div class="text-icn-blocks">

                    <div class="text-icn-block-hor">
                        <div class="icn">
                            <i class="icon-phone"></i>
                        </div>
                        <div class="text">
                            <h4>Phone:</h4>
                            <p>{{ sc_store('long_phone') }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="text-icn-block-hor">
                        <div class="icn">
                            <i class="icon-time"></i>
                        </div>
                        <div class="text">
                            <h4>Opening Hour:</h4>
                            <p>{{ sc_store('time_active') }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="text-icn-block-hor">
                        <div class="icn">
                            <i class="icon-location"></i>
                        </div>
                        <div class="text">
                            <h4>address:</h4>
                            <p>{{ sc_store('address') }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="text-icn-block-hor">
                        <div class="icn">
                            <i class="icon-location"></i>
                        </div>
                        <div class="text">
                            <h4>email:</h4>
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
                        </div>
                    </div>

                    

                </div>
            </div>
		</div>
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