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
                            <a href="{{ sc_route_admin('admin_user.index') }}" class="btn  btn-flat btn-default"
                               title="List"><i class="fa fa-list"></i><span
                                        class="hidden-xs"> {{trans('admin.back_list')}}</span></a>

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ $url_action }}" method="post" accept-charset="UTF-8" class="form-horizontal"
                      id="form-main" enctype="multipart/form-data">


                    <div class="card-body">
                        <div class="fields-group">

                            <div class="form-group row  {{ $errors->has('name') ? ' text-red' : '' }}">
                                <label for="name" class="col-sm-2  control-label">{{ trans('permission.name') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="name" name="name"
                                               value="{{ old('name',$permission['name']??'')}}"
                                               class="form-control name" placeholder=""/>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('name') }}
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row  {{ $errors->has('slug') ? ' text-red' : '' }}">
                                <label for="slug" class="col-sm-2  control-label">{{ trans('permission.slug') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="slug" name="slug"
                                               value="{{ old('slug',$permission['slug']??'') }}"
                                               class="form-control slug" placeholder=""/>
                                    </div>
                                    @if ($errors->has('slug'))
                                        <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('slug') }}
                                            </span>
                                    @endif
                                </div>
                            </div>


                            {{-- select http_method --}}
                            <div class="form-group row {{ $errors->has('http_uri') ? ' text-red' : '' }}">
                                @php
                                    $old_http_uri = old('http_uri',($permission)?explode(',', $permission->http_uri):[]);
                                @endphp
                                <label for="http_uri"
                                       class="col-sm-2  control-label">{{ trans('permission.admin.select_http_uri') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control input-sm http_uri select2" multiple="multiple"
                                            data-placeholder="{{ trans('permission.admin.method_placeholder') }}"
                                            style="width: 100%;" name="http_uri[]">
                                        <option value=""></option>
                                        @foreach ($routeAdmin as  $route)
                                            <option value="{{ $route['uri'] }}" {{ in_array($route['uri'], $old_http_uri)?'selected':'' }} >{{ $route['name']?$route['method'].'::'.$route['name']:$route['uri'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('http_uri'))
                                        <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('http_uri') }}
                                            </span>
                                    @endif
                                </div>
                            </div>
                            {{-- //select http_uri --}}


                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer row">
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



    <script type="text/javascript">
    </script>

@endpush
