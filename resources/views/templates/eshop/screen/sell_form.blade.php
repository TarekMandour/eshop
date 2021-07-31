@extends($sc_templatePath.'.layout')

@section('block_main')
<!--form-->
<section class="section section-sm section-first bg-default text-md-left">

    <div class="holder">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-18 col-lg-12">
					<h2 class="text-center">Get a Quote</h2>
					<div class="form-wrapper">
						<form action="{{ route('sellmylaptop_form') }}" method="post" class="box" id="form-process" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form_content" id="collapseExample">
                        
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('name'))?"input-error":"" }}"
                                        name="name" placeholder="Name"
                                        value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('phone'))?"input-error":"" }}"
                                        name="phone" placeholder="Phone"
                                        value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        {{ $errors->first('phone') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('email'))?"input-error":"" }}"
                                        name="email" placeholder="Email"
                                        value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('address'))?"input-error":"" }}"
                                        name="address" placeholder="Address"
                                        value="{{ old('address') }}">
                                    @if ($errors->has('address'))
                                    <span class="help-block">
                                        {{ $errors->first('address') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('modal_name') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('modal_name'))?"input-error":"" }}"
                                        name="modal_name" placeholder="Modal Name"
                                        value="{{ old('modal_name') }}">
                                    @if ($errors->has('modal_name'))
                                    <span class="help-block">
                                        {{ $errors->first('modal_name') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('hard_drive') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('hard_drive'))?"input-error":"" }}"
                                        name="hard_drive" placeholder="Hard Drive"
                                        value="{{ old('hard_drive') }}">
                                    @if ($errors->has('hard_drive'))
                                    <span class="help-block">
                                        {{ $errors->first('hard_drive') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('ram_size') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('ram_size'))?"input-error":"" }}"
                                        name="ram_size" placeholder="RAM Size"
                                        value="{{ old('ram_size') }}">
                                    @if ($errors->has('ram_size'))
                                    <span class="help-block">
                                        {{ $errors->first('ram_size') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('brand'))?"input-error":"" }}"
                                        name="brand" placeholder="Brand"
                                        value="{{ old('brand') }}">
                                    @if ($errors->has('brand'))
                                    <span class="help-block">
                                        {{ $errors->first('brand') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('processors') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('processors'))?"input-error":"" }}"
                                        name="processors" placeholder="Processors"
                                        value="{{ old('processors') }}">
                                    @if ($errors->has('processors'))
                                    <span class="help-block">
                                        {{ $errors->first('processors') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('age_laptop') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('age_laptop'))?"input-error":"" }}"
                                        name="age_laptop" placeholder="Age of Laptop"
                                        value="{{ old('age_laptop') }}">
                                    @if ($errors->has('age_laptop'))
                                    <span class="help-block">
                                        {{ $errors->first('age_laptop') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('operating_system') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('operating_system'))?"input-error":"" }}"
                                        name="operating_system" placeholder="Operating System"
                                        value="{{ old('operating_system') }}">
                                    @if ($errors->has('operating_system'))
                                    <span class="help-block">
                                        {{ $errors->first('operating_system') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('condition_laptop') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('condition_laptop'))?"input-error":"" }}"
                                        name="condition_laptop" placeholder="Condition of Laptop"
                                        value="{{ old('condition_laptop') }}">
                                    @if ($errors->has('condition_laptop'))
                                    <span class="help-block">
                                        {{ $errors->first('condition_laptop') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <input type="file"
                                        class="is_required validate account_input form-control {{ ($errors->has('photo'))?"input-error":"" }}"
                                        name="photo" placeholder="photo"
                                        value="{{ old('photo') }}">
                                    @if ($errors->has('photo'))
                                    <span class="help-block">
                                        {{ $errors->first('photo') }}
                                    </span>
                                    @endif
                                </div>

                                


                                <br><br>
                                <div class="text-center submit">
                                    <button type="submit" name="SubmitCreate" class="btn button-lg button-secondary" id="button-form-process">{{ trans('account.signup') }}</button>
                                </div>
                            </div>
                        
                        </form>
					</div>
				</div>
			</div>
		</div>
    </div>
    
</section>
<!--/form-->
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
					<h1>Get a Quote</h1>
					
					<ul class="breadcrumbs">
            <li><a href="{{ sc_route('home') }}">{{ trans('front.home') }}</a></li>
            <li><span>Sell My Laptop</span></li>
          </ul>
					
				</div>
			</div>
		</div>
	</div>
<picture style="display: none;"><source data-srcset="{{ sc_file($bannerBreadcrumb['image'] ?? '') }}" srcset="{{ sc_file($bannerBreadcrumb['image'] ?? '') }}"><img alt="" class="lazyautosizes lazyloaded ls-is-cached" data-sizes="auto" data-parent-fit="cover"></picture></div>

@endsection
{{-- //breadcrumb --}}
