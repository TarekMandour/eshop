@extends($templatePathAdmin.'layout')

@if (!empty($dataNotFound))
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
                            <a href="{{ sc_route_admin('admin_store.index') }}" class="btn  btn-flat btn-default"
                               title="List">
                                <i class="fa fa-list"></i><span class="hidden-xs"> {{trans('admin.back_list')}}</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-tools">
                        <div class="btn-group float-right">
                            <a href="{{ sc_route_admin('admin_store.index') }}" class="btn  btn-flat btn-default"
                               title="List">
                                <i class="fa fa-list"></i><span class="hidden-xs"> {{trans('admin.back_list')}}</span>
                            </a>
                        </div>
                    </div>

                    <div class="card-body table-responsivep-0">
                        {{ trans('admin.data_notfound') }}
                    </div>
                </div>
            </div>
        </div>
                @endsection
                @else
                @section('main')

            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container py-8">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <br>
                        <div class="card-tools" style="text-align: center">
                            <div class="btn-group">


                                <input class="switch-data-store" data-store="{{ $store->id }}" name="active"
                                       data-on-text="{{ trans('admin.maintain_enable') }}"
                                       data-off-text="{{ trans('admin.maintain_disable') }}"
                                       type="checkbox" {{ ($store->active == '1'?'checked':'') }}>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                {{-- Tab infomation --}}
                                <div class="row">
                                    <div class="col-md-5">
                                        <table class="table table-hover table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>{{ trans('store.logo') }}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="hidden" id="logo" name="logo"
                                                               value="{{ $store->logo }}"
                                                               class="form-control input-sm logo" placeholder=""/>
                                                    </div>
                                                    <div id="preview_image"
                                                         class="img_holder">{!! sc_image_render($store->logo,'100px', '', 'Logo') !!}</div>
                                                    <a data-input="logo" data-preview="preview_image" data-type="logo"
                                                       class="lfm pointer">
                                                        <i class="fa fa-image"></i> {{trans('product.admin.choose_image')}}
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>{{ trans('store.logo') }}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="hidden" id="logodk" name="logodk"
                                                               value="{{ $store->logodk }}"
                                                               class="form-control input-sm logodk" placeholder=""/>
                                                    </div>
                                                    <div id="preview_image"
                                                         class="img_holder">{!! sc_image_render($store->logodk,'100px', '', 'Logodk') !!}</div>
                                                    <a data-input="logodk" data-preview="preview_image" data-type="logo"
                                                       class="lfm pointer">
                                                        <i class="fa fa-image"></i> {{trans('product.admin.choose_image')}}
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>{{ trans('store.icon') }}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="hidden" id="icon" name="icon"
                                                               value="{{ $store->icon }}"
                                                               class="form-control input-sm icon" placeholder=""/>
                                                    </div>
                                                    <div id="preview_icon"
                                                         class="img_holder">{!! sc_image_render($store->icon,'100px', '', 'icon') !!}</div>
                                                    <a data-input="icon" data-preview="preview_icon" data-type="logo"
                                                       class="lfm pointer">
                                                        <i class="fa fa-image"></i> {{trans('product.admin.choose_image')}}
                                                    </a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><i class="fas fa-phone-alt"></i> {{ trans('store.phone') }}</td>
                                                <td><a href="#" class="editable-required editable editable-click"
                                                       data-name="phone" data-type="number" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.phone') }}"
                                                       data-value="{{ $store->phone }}" data-original-title=""
                                                       title="">{{$store->phone }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="fas fa-phone-square"></i> {{ trans('store.long_phone') }}
                                                </td>
                                                <td><a href="#" class="editable-required editable editable-click"
                                                       data-name="long_phone" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.long_phone') }}"
                                                       data-value="{{ $store->long_phone }}" data-original-title=""
                                                       title="">{{$store->long_phone }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="far fa-calendar-alt"></i> {{ trans('store.time_active') }}
                                                </td>
                                                <td><a href="#" class="editable-required editable editable-click"
                                                       data-name="time_active" data-type="textarea" data-pk=""
                                                       data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.time_active') }}"
                                                       data-value="{{ $store->time_active }}" data-original-title=""
                                                       title="">{{$store->time_active }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="far fa-calendar-alt"></i> Map
                                                </td>
                                                <td style="overflow: hidden;width: 245px;display: inline-grid;"><a href="#" class="editable-required editable editable-click"
                                                       data-name="mapg" data-type="textarea" data-pk=""
                                                       data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="Map"
                                                       data-value="{{ $store->mapg }}" data-original-title=""
                                                       title="">{{$store->mapg }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="fas fa-map-marked"></i> {{ trans('store.address') }}</td>
                                                <td><a href="#" class="editable-required editable editable-click"
                                                       data-name="address" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.address') }}"
                                                       data-value="{{ $store->address }}" data-original-title=""
                                                       title="">{{$store->address }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-location-arrow"></i></span> {{ trans('store.office') }}
                                                </td>
                                                <td><a href="#" class="editable-required editable editable-click"
                                                       data-name="office" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.office') }}"
                                                       data-value="{{ $store->office }}" data-original-title=""
                                                       title="">{{$store->office }}</a></td>
                                            </tr>
                                            <tr>
                                                <td><i class="fas fa-warehouse"></i> {{ trans('store.warehouse') }}</td>
                                                <td><a href="#" class="editable-required editable editable-click"
                                                       data-name="warehouse" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.warehouse') }}"
                                                       data-value="{{ $store->warehouse }}" data-original-title=""
                                                       title="">{{$store->warehouse }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="fas fa-envelope"></i> {{ trans('store.email') }}</td>
                                                <td><a href="#" class="editable-required editable editable-click"
                                                       data-name="email" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.email') }}"
                                                       data-value="{{ $store->email }}" data-original-title=""
                                                       title="">{{$store->email }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="fas fa-envelope"></i> {{ trans('store.email') }} 2</td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="email2" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.email') }} 2"
                                                       data-value="{{ $store->email2 }}" data-original-title=""
                                                       title="">{{$store->email2 }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="fas fa-envelope"></i> {{ trans('store.email') }} 3</td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="email3" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.email') }} 3"
                                                       data-value="{{ $store->email3 }}" data-original-title=""
                                                       title="">{{$store->email3 }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="fas fa-envelope"></i> {{ trans('store.email') }} 4</td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="email4" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.email') }} 4"
                                                       data-value="{{ $store->email4 }}" data-original-title=""
                                                       title="">{{$store->email4 }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="fas fa-envelope"></i> {{ trans('store.email') }} 5</td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="email5" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.email') }} 5"
                                                       data-value="{{ $store->email5 }}" data-original-title=""
                                                       title="">{{$store->email5 }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="fas fa-envelope"></i> {{ trans('store.email') }} 6</td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="email6" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.email') }} 6"
                                                       data-value="{{ $store->email6 }}" data-original-title=""
                                                       title="">{{$store->email6 }}</a></td>
                                            </tr>

                                            @if ($storeId == SC_ID_ROOT)
                                                {{-- Only the root domain can edit this information --}}
                                                <tr>
                                                    <td><i class="fab fa-chrome"></i> {{ trans('store.domain') }}</td>
                                                    <td><a href="#" class="editable-required editable editable-click"
                                                           data-name="domain" data-type="text" data-pk="" data-source=""
                                                           data-url="{{ sc_route_admin('admin_store.update') }}"
                                                           data-title="{{ trans('store.domain') }}"
                                                           data-value="{{ $store->domain }}" data-original-title=""
                                                           title="">{{$store->domain }}</a></td>
                                                </tr>
                                            @endif


                                            @if (sc_store_is_partner($storeId))
                                                {{-- Only the partner account can edit this information --}}
                                                <tr>
                                                    <td>
                                                        <i class="far fa-money-bill-alt nav-icon"></i> {{ trans('store.currency') }}
                                                    </td>
                                                    <td>
                                                        <a href="#" class="editable-required editable editable-click"
                                                           data-name="currency" data-type="select" data-pk=""
                                                           data-source="{{ json_encode($currencies) }}"
                                                           data-url="{{ sc_route_admin('admin_store.update') }}"
                                                           data-title="{{ trans('store.currency') }}"
                                                           data-value="{{ $store->currency }}" data-original-title=""
                                                           title=""></a>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>
                                                        <i class="fas fa-language nav-icon"></i> {{ trans('store.language') }}
                                                    </td>
                                                    <td>
                                                        <a href="#" class="editable-required editable editable-click"
                                                           data-name="language" data-type="select" data-pk=""
                                                           data-source="{{ json_encode($languages->pluck('name','code')->toArray()) }}"
                                                           data-url="{{ sc_route_admin('admin_store.update') }}"
                                                           data-title="{{ trans('store.language') }}"
                                                           data-value="{{ $store->language }}" data-original-title=""
                                                           title=""></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><i class="fas fa-clock"></i> {{ trans('store.timezone') }}</td>
                                                    <td>
                                                        <a href="#" class="editable-required editable editable-click"
                                                           data-name="timezone" data-type="select" data-pk=""
                                                           data-source="{{ json_encode($timezones) }}"
                                                           data-url="{{ sc_route_admin('admin_store.update') }}"
                                                           data-title="{{ trans('store.timezone') }}"
                                                           data-value="{{ $store->timezone }}" data-original-title=""
                                                           title=""></a>
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>
                                                    <i class="nav-icon  fas fa-object-ungroup "></i>{{ trans('store.template') }}
                                                </td>
                                                <td>
                                                    <a href="#" class="editable-required editable editable-click"
                                                       data-name="template" data-type="select" data-pk=""
                                                       data-source="{{ json_encode($templates) }}"
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.template') }}"
                                                       data-value="{{ $store->template }}" data-original-title=""
                                                       title=""></a>
                                                </td>
                                            </tr>

                                            </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    @php
                                        $descriptions = $store->descriptions->keyBy('lang');
                                    @endphp
                                    <div class="col-md-7">
                                        <table class="table table-hover table-bordered">
                                            <tbody>

                                            <tr>
                                                <td><i class="socicon-facebook"></i> Facebook
                                                </td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="facebook" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.facebook') }}"
                                                       data-value="{{ $store->facebook }}" data-original-title=""
                                                       title="">{{$store->facebook }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="socicon-twitter"></i> Twitter
                                                </td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="twitter" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.twitter') }}"
                                                       data-value="{{ $store->twitter }}" data-original-title=""
                                                       title="">{{$store->twitter }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="socicon-instagram"></i> Instagram
                                                </td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="instagram" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.instagram') }}"
                                                       data-value="{{ $store->instagram }}" data-original-title=""
                                                       title="">{{$store->instagram }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="socicon-snapchat"></i> Snapchat
                                                </td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="snapchat" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.snapchat') }}"
                                                       data-value="{{ $store->snapchat }}" data-original-title=""
                                                       title="">{{$store->snapchat }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="socicon-youtube"></i> Youtube
                                                </td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="youtube" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.youtube') }}"
                                                       data-value="{{ $store->youtube }}" data-original-title=""
                                                       title="">{{$store->youtube }}</a></td>
                                            </tr>

                                            <tr>
                                                <td><i class="socicon-linkedin"></i> Linkedin
                                                </td>
                                                <td><a href="#" class="editable editable-click"
                                                       data-name="linkedin" data-type="text" data-pk="" data-source=""
                                                       data-url="{{ sc_route_admin('admin_store.update') }}"
                                                       data-title="{{ trans('store.linkedin') }}"
                                                       data-value="{{ $store->linkedin }}" data-original-title=""
                                                       title="">{{$store->linkedin }}</a></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <table class="table table-hover table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>{{ trans('store.title') }}</td>
                                                <td>
                                                    @foreach ($languages->toArray() as  $codeLang => $lang)
                                                        {{ $languages[$codeLang]->name }} <img
                                                                src="{{ sc_file($languages[$codeLang]->icon )}}"
                                                                style="width:20px">:<br>
                                                        <i><a href="#" class="editable-required editable editable-click"
                                                              data-name="{{ 'title__'.$codeLang }}" data-type="text"
                                                              data-pk="" data-source=""
                                                              data-url="{{ sc_route_admin('admin_store.update') }}"
                                                              data-title="{{ trans('store.title') }}"
                                                              data-value="{{ $descriptions[$codeLang]['title'] ?? '' }}"
                                                              data-original-title=""
                                                              title="">{{ $descriptions[$codeLang]['title'] ?? '' }}</a></i>
                                                        <br>
                                                        <br>
                                                    @endforeach
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>{{ trans('store.keyword') }}</td>
                                                <td>
                                                    @foreach ($languages->toArray() as  $codeLang => $lang)
                                                        {{ $languages[$codeLang]->name }} <img
                                                                src="{{ sc_file($languages[$codeLang]->icon )}}"
                                                                style="width:20px">:<br>
                                                        <i><a href="#" class="editable-required editable editable-click"
                                                              data-name="{{ 'keyword__'.$codeLang }}" data-type="text"
                                                              data-pk="" data-source=""
                                                              data-url="{{ sc_route_admin('admin_store.update') }}"
                                                              data-title="{{ trans('store.keyword') }}"
                                                              data-value="{{ $descriptions[$codeLang]['keyword'] ?? '' }}"
                                                              data-original-title=""
                                                              title="">{{ $descriptions[$codeLang]['keyword'] ?? '' }}</a></i>
                                                        <br>
                                                        <br>
                                                    @endforeach
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>{{ trans('store.description') }}</td>
                                                <td>
                                                    @foreach ($languages->toArray() as  $codeLang => $lang)
                                                        {{ $languages[$codeLang]->name }} <img
                                                                src="{{ sc_file($languages[$codeLang]->icon )}}"
                                                                style="width:20px">:<br>
                                                        <i><a href="#" class="editable-required editable editable-click"
                                                              data-name="{{ 'description__'.$codeLang }}"
                                                              data-type="text" data-pk="" data-source=""
                                                              data-url="{{ sc_route_admin('admin_store.update') }}"
                                                              data-title="{{ trans('store.description') }}"
                                                              data-value="{{ $descriptions[$codeLang]['description'] ?? '' }}"
                                                              data-original-title=""
                                                              title="">{{ $descriptions[$codeLang]['description'] ?? '' }}</a></i>
                                                        <br>
                                                        <br>
                                                    @endforeach
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                {{-- //End tab infomation --}}
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- /.card -->


                @endsection
                @endif

                @push('styles')
                <!-- Ediable -->
                    <link rel="stylesheet" href="{{ sc_file('admin/plugin/bootstrap-editable.css')}}">
                    <style type="text/css">
                        #maintain_content img {
                            max-width: 100%;
                        }
                    </style>
                @endpush

                @if (empty($dataNotFound))
                    @push('scripts')
                    <!-- Ediable -->
                        <script src="{{ sc_file('admin/plugin/bootstrap-editable.min.js')}}"></script>

                        <script type="text/javascript">

                            // Editable
                            $(document).ready(function () {

                                //  $.fn.editable.defaults.mode = 'inline';
                                $.fn.editable.defaults.params = function (params) {
                                    params._token = "{{ csrf_token() }}";
                                    params.storeId = "{{ $storeId }}";
                                    return params;
                                };

                                $('.editable-required').editable({
                                    validate: function (value) {
                                        if (value == '') {
                                            return '{{  trans('admin.not_empty') }}';
                                        }
                                    },
                                    success: function (data) {
                                        if (data.error == 0) {
                                            alertJs('success', '{{ trans('admin.msg_change_success') }}');
                                        } else {
                                            alertJs('error', data.msg);
                                        }
                                    }
                                });

                                $('.editable').editable({
                                    validate: function (value) {
                                    },
                                    success: function (data) {
                                        if (data.error == 0) {
                                            alertJs('success', '{{ trans('admin.msg_change_success') }}');
                                        } else {
                                            alertMsg('error', data.msg);
                                        }
                                    }
                                });

                            });
                        </script>


                        <script type="text/javascript">

                            {!! $script_sort??'' !!}

                        </script>

                        {{-- //Pjax --}}
                        <script src="{{ sc_file('admin/plugin/jquery.pjax.js')}}"></script>

                        <script>
                            //Logo
                            $('.logo, .logodk, .icon').change(function () {
                                $.ajax({
                                    url: '{{ sc_route_admin('admin_store.update') }}',
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        "name": $(this).attr('name'),
                                        "value": $(this).val(),
                                        "_token": "{{ csrf_token() }}",
                                        "storeId": "{{ $storeId }}"
                                    },
                                })
                                    .done(function (data) {
                                        if (data.error == 0) {
                                            alertJs('success', '{{ trans('admin.msg_change_success') }}');
                                        } else {
                                            alertJs('error', data.msg);
                                        }
                                    });
                            });
                            //End logo


                            $("input.switch-data-store").bootstrapSwitch();
                            $('input.switch-data-store').on('switchChange.bootstrapSwitch', function (event, state) {
                                var valueSet;
                                if (state == true) {
                                    valueSet = '1';
                                } else {
                                    valueSet = '0';
                                }
                                $('#loading').show();
                                $.ajax({
                                    type: 'POST',
                                    dataType: 'json',
                                    url: "{{ sc_route_admin('admin_store.update') }}",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "name": $(this).attr('name'),
                                        "storeId": $(this).data('store'),
                                        "value": valueSet
                                    },
                                    success: function (response) {
                                        if (parseInt(response.error) == 0) {
                                            alertMsg('success', '{{ trans('admin.msg_change_success') }}');
                                        } else {
                                            alertMsg('error', response.msg);
                                        }
                                        $('#loading').hide();
                                    }
                                });
                            });


                        </script>

    @endpush
    @endif