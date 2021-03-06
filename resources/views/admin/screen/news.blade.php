@extends($templatePathAdmin.'layout')

@section('main')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container py-8">

            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header with-border">
                    <div class="card-toolbar">
                        <h2 class="card-title">{{ $title_description??'' }}</h2>
                    </div>

                    <div class="card-title">
                        <div class="btn-group float-right" style="margin-right: 5px">
                            <a href="{{ sc_route_admin('admin_news.index') }}" class="btn  btn-flat btn-default"
                               title="List"><i
                                        class="fa fa-list"></i><span
                                        class="hidden-xs"> {{trans('admin.back_list')}}</span></a>

                        </div>
                    </div>
                </div>


                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ $url_action }}" method="post" accept-charset="UTF-8" class="form-horizontal"
                      id="form-main"
                      enctype="multipart/form-data">


                    <div class="card-body">
                        @php
                            $descriptions = $news?$news->descriptions->keyBy('lang')->toArray():[];
                        @endphp

                        @foreach ($languages as $code => $language)

                            <div class="card">
                                <div class="card-header with-border">
                                    <h3 class="card-title">{{ $language->name }} {!! sc_image_render($language->icon,'20px','20px', $language->name) !!}</h3>

                                </div>

                                <div class="card-body">
                                    <div
                                            class="form-group  row {{ $errors->has('descriptions.'.$code.'.title') ? ' text-red' : '' }}">
                                        <label for="{{ $code }}__title"
                                               class="col-sm-2 col-form-label">{{ trans('news.title') }} <span
                                                    class="seo" title="SEO"><i class="fa fa-coffee"
                                                                               aria-hidden="true"></i></span></label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="fas fa-pencil-alt"></i></span>
                                                </div>
                                                <input type="text" id="{{ $code }}__title"
                                                       name="descriptions[{{ $code }}][title]"
                                                       value="{{ old()? old('descriptions.'.$code.'.title'):($descriptions[$code]['title']??'') }}"
                                                       class="form-control {{ $code.'__title' }}" placeholder=""/>
                                            </div>
                                            @if ($errors->has('descriptions.'.$code.'.title'))
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('descriptions.'.$code.'.title') }}
                                </span>
                                            @else
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ trans('admin.max_c',['max'=>200]) }}
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div
                                            class="form-group  row {{ $errors->has('descriptions.'.$code.'.keyword') ? ' text-red' : '' }}">
                                        <label for="{{ $code }}__keyword"
                                               class="col-sm-2 col-form-label">{{ trans('news.keyword') }} <span
                                                    class="seo" title="SEO"><i class="fa fa-coffee"
                                                                               aria-hidden="true"></i></span></label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="fas fa-pencil-alt"></i></span>
                                                </div>
                                                <input type="text" id="{{ $code }}__keyword"
                                                       name="descriptions[{{ $code }}][keyword]"
                                                       value="{{ old()?old('descriptions.'.$code.'.keyword'):($descriptions[$code]['keyword']??'') }}"
                                                       class="form-control {{ $code.'__keyword' }}" placeholder=""/>
                                            </div>
                                            @if ($errors->has('descriptions.'.$code.'.keyword'))
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('descriptions.'.$code.'.keyword') }}
                                </span>
                                            @else
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ trans('admin.max_c',['max'=>200]) }}
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div
                                            class="form-group  row {{ $errors->has('descriptions.'.$code.'.description') ? ' text-red' : '' }}">
                                        <label for="{{ $code }}__description"
                                               class="col-sm-2 col-form-label">{{ trans('news.description') }} <span
                                                    class="seo" title="SEO"><i class="fa fa-coffee"
                                                                               aria-hidden="true"></i></span></label>
                                        <div class="col-sm-8">
                                    <textarea id="{{ $code }}__description"
                                              name="descriptions[{{ $code }}][description]"
                                              class="form-control {{ $code.'__description' }}"
                                              placeholder=""/>{{ old()?old('descriptions.'.$code.'.description'):($descriptions[$code]['description']??'') }}</textarea>
                                            @if ($errors->has('descriptions.'.$code.'.description'))
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('descriptions.'.$code.'.description') }}
                                </span>
                                            @else
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ trans('admin.max_c',['max'=>300]) }}
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div
                                            class="form-group row {{ $errors->has('descriptions.'.$code.'.content') ? ' text-red' : '' }}">
                                        <label for="{{ $code }}__content"
                                               class="col-sm-2 col-form-label">{{ trans('news.content') }}</label>
                                        <div class="col-sm-8">
                                <textarea id="{{ $code }}__content" class="editor"
                                          name="descriptions[{{ $code }}][content]">
                                        {{ old('descriptions.'.$code.'.content',($descriptions[$code]['content']??'')) }}
                                    </textarea>
                                            @if ($errors->has('descriptions.'.$code.'.content'))
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('descriptions.'.$code.'.content') }}
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                        <div class="form-group  row {{ $errors->has('alias') ? ' text-red' : '' }}">
                            <label for="alias"
                                   class="col-sm-2 col-form-label">{!! trans('news.alias') !!}</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="text" id="alias" name="alias"
                                           value="{!! old('alias',($news['alias']??'')) !!}"
                                           class="form-control alias" placeholder=""/>
                                </div>
                                @if ($errors->has('alias'))
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('alias') }}
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group  row {{ $errors->has('image') ? ' text-red' : '' }}">
                            <label for="image" class="col-sm-2 col-form-label">{{ trans('news.image') }}</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" id="image" name="image"
                                           value="{{ old('image',$news['image']??'') }}"
                                           class="form-control input-sm image" placeholder=""/>
                                    <div class="input-group-append">
                                        <a data-input="image" data-preview="preview_image" data-type="content"
                                           class="btn btn-primary lfm">
                                            <i class="fa fa-image"></i> {{trans('product.admin.choose_image')}}
                                        </a>
                                    </div>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('image') }}
                                </span>
                                @endif
                                <div id="preview_image" class="img_holder">
                                    @if (old('image',$news['image']??''))
                                        <img src="{{ sc_file(old('image',$news['image']??'')) }}">
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="form-group  row {{ $errors->has('sort') ? ' text-red' : '' }}">
                            <label for="sort" class="col-sm-2 col-form-label">{{ trans('news.sort') }}</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="number" style="width: 100px;" id="sort" name="sort"
                                           value="{{ old()?old('sort'):$news['sort']??0 }}" class="form-control sort"
                                           placeholder=""/>
                                </div>
                                @if ($errors->has('sort'))
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('sort') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label for="status" class="col-sm-2 col-form-label">{{ trans('news.status') }}</label>
                            <div class="col-sm-8">
                                <input class="checkbox" type="checkbox" name="status"
                                        {{ old('status',(empty($news['status'])?0:1))?'checked':''}}>

                            </div>
                        </div>

                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer clearfix">
                        @csrf
                        <div class="col-md-2">
                        </div>

                        <div class="col-md-8">
                            <div class="btn-group float-right">
                                <button type="submit" class="btn btn-primary">{{ trans('admin.submit') }}</button>
                            </div>

                            <div class="btn-group float-left">
                                <button type="reset" class="btn btn-warning">{{ trans('admin.reset') }}</button>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection

@push('styles')

@endpush

@push('scripts')
    @include($templatePathAdmin.'component.ckeditor_js')

    <script type="text/javascript">
        $('textarea.editor').ckeditor(
            {
                filebrowserImageBrowseUrl: '{{ sc_route_admin('admin.home').'/'.config('lfm.url_prefix') }}?type=content',
                filebrowserImageUploadUrl: '{{ sc_route_admin('admin.home').'/'.config('lfm.url_prefix') }}/upload?type=content&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '{{ sc_route_admin('admin.home').'/'.config('lfm.url_prefix') }}?type=Files',
                filebrowserUploadUrl: '{{ sc_route_admin('admin.home').'/'.config('lfm.url_prefix') }}/upload?type=file&_token={{csrf_token()}}',
                filebrowserWindowWidth: '900',
                filebrowserWindowHeight: '500'
            }
        );
    </script>

@endpush