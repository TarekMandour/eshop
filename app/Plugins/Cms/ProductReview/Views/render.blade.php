{{-- review --}}
@php
    $points = (new App\Plugins\Cms\ProductReview\Models\PluginModel)->getPointProduct($product->id);
    $pathPlugin = (new App\Plugins\Cms\ProductReview\AppConfig)->pathPlugin;
@endphp
<div class="tt-review-block">
   @if ($points->count())
      <div class="tt-review-comments">
         @foreach ($points as $k => $point)
         <div class="tt-item">
            <div class="tt-avatar">
               @if (auth()->user() && $point->customer_id == auth()->user()->id)
               <a href="#" class="review-item_report r-remove " data-id="{{ $point->id }}" ><i class="icon-recycle" aria-hidden="true"></i> Remove</a>
               @endif
            </div>
            <div class="tt-content">
               <div class="tt-rating">
                  @for ($i = 1;  $i <= $point->point; $i++)
                     <i class="icon-star"></i>
                  @endfor
               </div>
               <div class="tt-comments-info">
               <span class="username"><span>{{ $point->created_at }}</span></span>
               </div>
               <div class="tt-comments-title">{{ $point->name }}</div>
               <p>
                  {!! sc_html_render($point->comment) !!}
               </p>
            </div>
         </div>
         @endforeach
      </div>
     
   @else
   <div class="tt-row-custom-02">
      <h2 class="tt-title">
         {{ trans($pathPlugin.'::lang.no_review') }}
      </h2>
    </div>
   @endif

   <div class="tt-review-form">
      <div class="tt-message-info">
        <span>{{ trans($pathPlugin.'::lang.write_review') }}</span>
      </div>
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <div class="form-group required">
         <div class="col-sm-12">
            <label class="control-label" for="input-name">{{ trans($pathPlugin.'::lang.your_name') }}</label>
            <input disabled type="text"  value="{{ auth()->user()?auth()->user()->name:trans($pathPlugin.'::lang.guest') }}" id="input-name" class="form-control">
         </div>
         </div>
         <div class="form-group required {{ $errors->has('comment') ? ' has-error' : '' }}">
         <div class="col-sm-12">
            <label class="control-label" for="input-review">{{ trans($pathPlugin.'::lang.your_review') }}</label>
            <textarea {{  auth()->user()?'':'disabled' }} name="comment" rows="5" id="input-review" class="form-control">{!! old('comment') !!}</textarea>
         </div>
         @if ($errors->has('comment'))
         <span class="help-block">
               <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $errors->first('comment') }}
         </span>
         @endif
         </div>
         <div class="form-group required {{ $errors->has('point') ? ' has-error' : '' }}">
         <div class="col-sm-12" >
            <label class="control-label">{{ trans($pathPlugin.'::lang.rating') }}</label>
            &nbsp;&nbsp;&nbsp; {{ trans($pathPlugin.'::lang.bad') }}&nbsp;
            <input type="radio" style="display: inline-block;" {{ (old('point') == 1)?'checked':'' }} name="point" value="1" {{  auth()->user()?'':'disabled' }}>
            &nbsp;
            <input type="radio" style="display: inline-block;" {{ (old('point') == 2)?'checked':'' }} name="point" value="2" {{  auth()->user()?'':'disabled' }}>
            &nbsp;
            <input type="radio" style="display: inline-block;" {{ (old('point') == 3)?'checked':'' }} name="point" value="3" {{  auth()->user()?'':'disabled' }}>
            &nbsp;
            <input type="radio" style="display: inline-block;" {{ (old('point') == 4)?'checked':'' }} name="point" value="4" {{  auth()->user()?'':'disabled' }}>
            &nbsp;
            <input type="radio" style="display: inline-block;" {{ (old('point') == 5)?'checked':'' }} name="point" value="5" {{  auth()->user()?'':'disabled' }}>
            &nbsp;{{ trans($pathPlugin.'::lang.good') }}</div>
            @if ($errors->has('point'))
            <span class="help-block">
               <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $errors->first('point') }}
            </span>
            @endif
         </div>
         @if (sc_captcha_method() && in_array('review', sc_captcha_page()) && view()->exists(sc_captcha_method()->pathPlugin.'::render'))
         @php
            $titleButton = trans($pathPlugin.'::lang.submit');
            $idForm = 'form-review';
            $idButtonForm = 'button-review';
         @endphp
         @include(sc_captcha_method()->pathPlugin.'::render')
         @endif
        <div class="form-group">
            <button type="button" id="button-review" data-loading-text="Loading..."
            class="btn">{{ trans($pathPlugin.'::lang.submit') }}
            </button>
        </div>
      </form>
   </div>
   
</div>
{{-- //end review --}}
