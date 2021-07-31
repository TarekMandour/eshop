@extends($sc_templatePath.'.layout')

@section('block_main')
<!--form-->
<section class="section section-sm section-first bg-default text-md-left">

    <div class="holder">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-8">
					<div class="form-wrapper">
						<form action="{{ route('recycle_form') }}" method="post" class="box" id="form-process" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form_content" id="collapseExample">
                        
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('first_name'))?"input-error":"" }}"
                                        name="first_name" placeholder="First Name"
                                        value="{{ old('first_name') }}">
                                    @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        {{ $errors->first('first_name') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('last_name'))?"input-error":"" }}"
                                        name="last_name" placeholder="Last Name"
                                        value="{{ old('last_name') }}">
                                    @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        {{ $errors->first('last_name') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('company_name'))?"input-error":"" }}"
                                        name="company_name" placeholder="Company Name"
                                        value="{{ old('company_name') }}">
                                    @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        {{ $errors->first('company_name') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('phone_number'))?"input-error":"" }}"
                                        name="phone_number" placeholder="Phone Number"
                                        value="{{ old('phone_number') }}">
                                    @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        {{ $errors->first('phone_number') }}
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

                                <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('street_address'))?"input-error":"" }}"
                                        name="street_address" placeholder="Street Address"
                                        value="{{ old('street_address') }}">
                                    @if ($errors->has('street_address'))
                                    <span class="help-block">
                                        {{ $errors->first('street_address') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('city'))?"input-error":"" }}"
                                        name="city" placeholder="City"
                                        value="{{ old('city') }}">
                                    @if ($errors->has('city'))
                                    <span class="help-block">
                                        {{ $errors->first('city') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('state'))?"input-error":"" }}"
                                        name="state" placeholder="State"
                                        value="{{ old('state') }}">
                                    @if ($errors->has('state'))
                                    <span class="help-block">
                                        {{ $errors->first('state') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('computers') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('computers'))?"input-error":"" }}"
                                        name="computers" placeholder="Computers"
                                        value="{{ old('computers') }}">
                                    @if ($errors->has('computers'))
                                    <span class="help-block">
                                        {{ $errors->first('computers') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('laptops') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('laptops'))?"input-error":"" }}"
                                        name="laptops" placeholder="Laptops"
                                        value="{{ old('laptops') }}">
                                    @if ($errors->has('laptops'))
                                    <span class="help-block">
                                        {{ $errors->first('laptops') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('monitors') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('monitors'))?"input-error":"" }}"
                                        name="monitors" placeholder="Monitors - TFT"
                                        value="{{ old('monitors') }}">
                                    @if ($errors->has('monitors'))
                                    <span class="help-block">
                                        {{ $errors->first('monitors') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('crt') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('crt'))?"input-error":"" }}"
                                        name="crt" placeholder="Monitors - CRT"
                                        value="{{ old('crt') }}">
                                    @if ($errors->has('crt'))
                                    <span class="help-block">
                                        {{ $errors->first('crt') }}
                                    </span>
                                    @endif
                                </div>

                                
                                <div class="form-group{{ $errors->has('servers') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('servers'))?"input-error":"" }}"
                                        name="servers" placeholder="Servers"
                                        value="{{ old('servers') }}">
                                    @if ($errors->has('servers'))
                                    <span class="help-block">
                                        {{ $errors->first('servers') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('networking') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('networking'))?"input-error":"" }}"
                                        name="networking" placeholder="Networking"
                                        value="{{ old('networking') }}">
                                    @if ($errors->has('networking'))
                                    <span class="help-block">
                                        {{ $errors->first('networking') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('harddrives') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('harddrives'))?"input-error":"" }}"
                                        name="harddrives" placeholder="Hard Drives"
                                        value="{{ old('harddrives') }}">
                                    @if ($errors->has('harddrives'))
                                    <span class="help-block">
                                        {{ $errors->first('harddrives') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('datatapes') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('datatapes'))?"input-error":"" }}"
                                        name="datatapes" placeholder="Data Tapes "
                                        value="{{ old('datatapes') }}">
                                    @if ($errors->has('datatapes'))
                                    <span class="help-block">
                                        {{ $errors->first('datatapes') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('mobile'))?"input-error":"" }}"
                                        name="mobile" placeholder="Mobile Phones"
                                        value="{{ old('mobile') }}">
                                    @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        {{ $errors->first('mobile') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('office') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('office'))?"input-error":"" }}"
                                        name="office" placeholder="Office ( Landline Phones )"
                                        value="{{ old('office') }}">
                                    @if ($errors->has('office'))
                                    <span class="help-block">
                                        {{ $errors->first('office') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('tablets') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('tablets'))?"input-error":"" }}"
                                        name="tablets" placeholder="Tablets"
                                        value="{{ old('tablets') }}">
                                    @if ($errors->has('tablets'))
                                    <span class="help-block">
                                        {{ $errors->first('tablets') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('printers') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('printers'))?"input-error":"" }}"
                                        name="printers" placeholder="Printers"
                                        value="{{ old('printers') }}">
                                    @if ($errors->has('printers'))
                                    <span class="help-block">
                                        {{ $errors->first('printers') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('other') ? ' has-error' : '' }}">
                                    <input type="text"
                                        class="is_required validate account_input form-control {{ ($errors->has('other'))?"input-error":"" }}"
                                        name="other" placeholder="Other"
                                        value="{{ old('other') }}">
                                    @if ($errors->has('other'))
                                    <span class="help-block">
                                        {{ $errors->first('other') }}
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
                <div class="col-md-6 col-lg-6">
                    <div class="text-icn-blocks">

                        <div class="text-icn-block-hor">
                            <div class="icn">
                                <i class="icon-phone"></i>
                            </div>
                            <div class="text">
                                <h4>Call us now at:</h4>
                                <p>{{ sc_store('long_phone') }}</p>
                            </div>
                        </div>
                        <br>
                        <div class="text-icn-block-hor">
                            <div class="icn">
                                <i class="icon-whatsapp"></i>
                            </div>
                            <div class="text">
                                <h4>Contact us by watsapp:</h4>
                                <p>{{ sc_store('long_phone') }}</p>
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
            <li><span>Recycle</span></li>
          </ul>
					
				</div>
			</div>
		</div>
	</div>
<picture style="display: none;"><source data-srcset="{{ sc_file($bannerBreadcrumb['image'] ?? '') }}" srcset="{{ sc_file($bannerBreadcrumb['image'] ?? '') }}"><img alt="" class="lazyautosizes lazyloaded ls-is-cached" data-sizes="auto" data-parent-fit="cover"></picture></div>

@endsection
{{-- //breadcrumb --}}
