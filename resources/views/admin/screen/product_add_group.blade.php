@extends($templatePathAdmin.'layout')

@section('main')


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
                            <a href="{{ sc_route_admin('admin_product.index') }}" class="btn  btn-flat btn-default"
                               title="List">
                                <i class="fa fa-list"></i><span class="hidden-xs"> {{trans('admin.back_list')}}</span>
                            </a>
                        </div>
                    </div>


                </div>
                <!-- /.card-header -->


                <!-- form start -->
                <form action="{{ sc_route_admin('admin_product.create') }}" method="post" name="form_name"
                      accept-charset="UTF-8"
                      class="form-horizontal" id="form-main" enctype="multipart/form-data">
                    <input type="hidden" name="kind" value="{{ SC_PRODUCT_GROUP }}">

                    <div id="main-add" class="card-body">
                        {{-- descriptions --}}
                        @foreach ($languages as $code => $language)
                            <div class="card">
                                <div class="card-header with-border">
                                    <h3 class="card-title">{{ $language->name }} {!! sc_image_render($language->icon,'20px','20px', $language->name) !!}</h3>
                                </div>

                                <div class="card-body">
                                    <div
                                            class="form-group row {{ $errors->has('descriptions.'.$code.'.name') ? ' text-red' : '' }}">
                                        <label for="{{ $code }}__name"
                                               class="col-sm-2 col-form-label">{{ trans('product.name') }} <span
                                                    class="seo" title="SEO"><i class="fa fa-coffee"
                                                                               aria-hidden="true"></i></span>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="fas fa-pencil-alt"></i></span>
                                                </div>
                                                <input type="text" id="{{ $code }}__name"
                                                       name="descriptions[{{ $code }}][name]"
                                                       value="{!! old('descriptions.'.$code.'.name') !!}"
                                                       class="form-control input-sm {{ $code.'__name' }}"
                                                       placeholder=""/>
                                            </div>
                                            @if ($errors->has('descriptions.'.$code.'.name'))
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i>
                                    {{ $errors->first('descriptions.'.$code.'.name') }}
                                </span>
                                            @else
                                                <span class="form-text">
                                        <i class="fa fa-info-circle"></i> {{ trans('admin.max_c',['max'=>200]) }}
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div
                                            class="form-group row   {{ $errors->has('descriptions.'.$code.'.keyword') ? ' text-red' : '' }}">
                                        <label for="{{ $code }}__keyword"
                                               class="col-sm-2 col-form-label">{{ trans('product.keyword') }} <span
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
                                                       value="{!! old('descriptions.'.$code.'.keyword') !!}"
                                                       class="form-control input-sm {{ $code.'__keyword' }}"
                                                       placeholder=""/>
                                            </div>
                                            @if ($errors->has('descriptions.'.$code.'.keyword'))
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i>
                                    {{ $errors->first('descriptions.'.$code.'.keyword') }}
                                </span>
                                            @else
                                                <span class="form-text">
                                        <i class="fa fa-info-circle"></i> {{ trans('admin.max_c',['max'=>200]) }}
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div
                                            class="form-group row {{ $errors->has('descriptions.'.$code.'.description') ? ' text-red' : '' }}">
                                        <label for="{{ $code }}__description"
                                               class="col-sm-2 col-form-label">{{ trans('product.description') }} <span
                                                    class="seo" title="SEO"><i class="fa fa-coffee"
                                                                               aria-hidden="true"></i></span></label>
                                        <div class="col-sm-8">
                                    <textarea id="{{ $code }}__description"
                                              name="descriptions[{{ $code }}][description]"
                                              class="form-control input-sm {{ $code.'__description' }}"
                                              placeholder=""/>{{ old('descriptions.'.$code.'.description') }}</textarea>
                                            @if ($errors->has('descriptions.'.$code.'.description'))
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i>
                                    {{ $errors->first('descriptions.'.$code.'.description') }}
                                </span>
                                            @else
                                                <span class="form-text">
                                        <i class="fa fa-info-circle"></i> {{ trans('admin.max_c',['max'=>300]) }}
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        {{-- //descriptions --}}


                        {{-- select category --}}
                        <div class="form-group row {{ $errors->has('category') ? ' text-red' : '' }}">
                            @php
                                $listCate = [];
                                if (is_array(old('category'))) {
                                    foreach(old('category') as $value){
                                        $listCate[] = (int)$value;
                                    }
                                }
                            @endphp
                            <label for="category" class="col-sm-2 col-form-label">
                                {{ trans('product.admin.select_category') }}
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm category select2" multiple="multiple"
                                        data-placeholder="{{ trans('product.admin.select_category') }}"
                                        style="width: 100%;"
                                        name="category[]">
                                    <option value=""></option>
                                    @foreach ($categories as $k => $v)
                                        <option value="{{ $k }}"
                                                {{ (count($listCate) && in_array($k, $listCate))?'selected':'' }}>{{ $v }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('category') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- //select category --}}


                        {{-- sku --}}
                        <div class="form-group row kind kind0 kind1 kind2 {{ $errors->has('sku') ? ' text-red' : '' }}">
                            <label for="sku" class="col-sm-2 col-form-label">{{ trans('product.sku') }}</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="text" style="width: 100px;" id="sku" name="sku"
                                           value="{!! old('sku')??'' !!}" class="form-control input-sm sku"
                                           placeholder=""/>
                                </div>
                                @if ($errors->has('sku'))
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('sku') }}
                                </span>
                                @else
                                    <span class="form-text">
                                    {{ trans('product.sku_validate') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- //sku --}}


                        {{-- alias --}}
                        <div class="form-group row kind kind0 kind1 kind2 {{ $errors->has('alias') ? ' text-red' : '' }}">
                            <label for="alias" class="col-sm-2 col-form-label">{!! trans('product.alias') !!}</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="text" id="alias" name="alias"
                                           value="{!! old('alias')??'' !!}" class="form-control input-sm alias"
                                           placeholder=""/>
                                </div>
                                @if ($errors->has('alias'))
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('alias') }}
                                </span>
                                @else
                                    <span class="form-text">
                                    {{ trans('product.alias_validate') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- //alias --}}


                        {{-- sort --}}
                        <div class="form-group row   {{ $errors->has('sort') ? ' text-red' : '' }}">
                            <label for="sort" class="col-sm-2 col-form-label">{{ trans('product.sort') }}</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="number" style="width: 100px;" id="sort" name="sort"
                                           value="{!! old('sort')??0 !!}" class="form-control input-sm sort"
                                           placeholder=""/>
                                </div>
                                @if ($errors->has('sort'))
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('sort') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- //sort --}}


                        {{-- status --}}
                        <div class="form-group row ">
                            <label for="status" class="col-sm-2 col-form-label">{{ trans('product.status') }}</label>
                            <div class="col-sm-8">
                                @if (old())
                                    <input class="checkbox" type="checkbox"
                                           name="status" {{ ((old('status') ==='on')?'checked':'')}}>
                                @else
                                    <input class="checkbox" type="checkbox" name="status" checked>
                                @endif

                            </div>
                        </div>
                        {{-- //status --}}

                        <hr class="kind">
                        {{-- List product in groups --}}
                        <div class="form-group row kind kind2 {{ $errors->has('productInGroup') ? ' text-red' : '' }}">

                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-8"><label>{{ trans('product.admin.select_product_in_group') }}</label>
                            </div>
                        </div>
                        <div class="form-group row kind kind2 {{ $errors->has('productInGroup') ? ' text-red' : '' }}">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                @if (old('productInGroup'))
                                    @foreach (old('productInGroup') as $pID)
                                        @if ( (int)$pID)
                                            @php
                                                $newHtml = str_replace('value="'.(int)$pID.'"', 'value="'.(int)$pID.'" selected',
                                                $htmlSelectGroup);
                                            @endphp
                                            {!! $newHtml !!}
                                        @endif
                                    @endforeach
                                @endif
                                <button type="button" id="add_product_in_group" class="btn btn-flat btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    {{ trans('product.admin.add_product') }}
                                </button>
                                @if ($errors->has('productInGroup'))
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('productInGroup') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- //end List product in groups --}}
                    </div>


                    <!-- /.card-body -->


                    <div class="card-footer kind kind0  kind1 kind2 row" id="card-footer">
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
    <style>
        #start-add {
            margin: 20px;
        }
    </style>

@endpush

@push('scripts')
    @include($templatePathAdmin.'component.ckeditor_js')

    <script type="text/javascript">


        // Select product in group
        $('#add_product_in_group').click(function (event) {
            var htmlSelectGroup = '{!! $htmlSelectGroup !!}';
            $(this).before(htmlSelectGroup);
            $('.select2').select2();
            $('.removeproductInGroup').click(function (event) {
                $(this).closest('table').remove();
            });
        });
        $('.removeproductInGroup').click(function (event) {
            $(this).closest('table').remove();
        });
        //end select in group

        $('textarea.editor').ckeditor(
            {
                filebrowserImageBrowseUrl: '{{ sc_route_admin('admin.home').'/'.config('lfm.url_prefix') }}?type=product',
                filebrowserImageUploadUrl: '{{ sc_route_admin('admin.home').'/'.config('lfm.url_prefix') }}/upload?type=product&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '{{ sc_route_admin('admin.home').'/'.config('lfm.url_prefix') }}?type=Files',
                filebrowserUploadUrl: '{{ sc_route_admin('admin.home').'/'.config('lfm.url_prefix') }}/upload?type=file&_token={{csrf_token()}}',
                filebrowserWindowWidth: '900',
                filebrowserWindowHeight: '500'
            }
        );

    </script>

@endpush