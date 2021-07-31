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
                                     <a href="{{ sc_route_admin('admin_store_link.index') }}" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> {{trans('admin.back_list')}}</span></a>

                                 </div>
                             </div>
                         </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ $url_action }}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"  enctype="multipart/form-data">

                    <input type="hidden" value="en" name="lang" />
                    <div class="card-body">
                            <div class="form-group row {{ $errors->has('name') ? ' text-red' : '' }}">
                                <label for="name" class="col-sm-2 col-form-label">{{ trans('link.name') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="name" name="name" value="{!! old()?old('name'):$link['name']??'' !!}" class="form-control" placeholder="" />
                                    </div>
                                        @if ($errors->has('name'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('url') ? ' text-red' : '' }}">
                                <label for="url" class="col-sm-2 col-form-label">{{ trans('link.url') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="url" name="url" value="{!! old()?old('url'):$link['url']??'' !!}" class="form-control" placeholder="" />
                                    </div>
                                        @if ($errors->has('url'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('url') }}
                                            </span>
                                        @else
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ trans('link.admin.helper_url') }}
                                            </span>
                                        @endif
                                </div>
                            </div>


                            <div class="form-group row {{ $errors->has('target') ? ' text-red' : '' }}">
                                <label for="target" class="col-sm-2 col-form-label">{{ trans('link.admin.select_target') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control target select2" style="width: 100%;" name="target" >
                                        <option value=""></option>
                                        @foreach ($arrTarget as $k => $v)
                                            <option value="{{ $k }}" {{ (old('target',$link['target']??'') ==$k) ? 'selected':'' }}>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('target'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('target') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('group') ? ' text-red' : '' }}">
                                <label for="group" class="col-sm-2 col-form-label">{{ trans('link.admin.select_group') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control group select2" style="width: 100%;" name="group" >
                                        <option value=""></option>
                                        @foreach ($arrGroup as $k => $v)
                                            <option value="{{ $k }}" {{ (old('group',$link['group']??'') ==$k) ? 'selected':'' }}>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('group'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('group') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('parent_id') ? ' text-red' : '' }}">
                                <label for="parent_id"
                                    class="col-sm-2 col-form-label">{{ trans('link.parent_id') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control parent_id select2" style="width: 100%;" name="parent_id">
                                        <option value="0">==ROOT==</option>
                                        @php
                                        //$categories = [0=>'==ROOT==']+ $categories;
                                        @endphp
                                        @foreach ($categories as $k => $v)
  
                                        <option value="{{ $v->id }}"
                                        {{ (old('parent_id', $link['parent_id']??'') ==$v->id) ? 'selected':'' }}>{{ $v->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent_id'))
                                    <span class="form-text">
                                        <i class="fa fa-info-circle"></i> {{ $errors->first('parent_id') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('sort') ? ' text-red' : '' }}">
                                <label for="sort" class="col-sm-2 col-form-label">{{ trans('link.sort') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="number" style="width: 100px;" min = 0 id="sort" name="sort" value="{!! old()?old('sort'):$link['sort']??0 !!}" class="form-control sort" placeholder="" />
                                    </div>
                                        @if ($errors->has('sort'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('sort') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="status" class="col-sm-2 col-form-label">{{ trans('link.status') }}</label>
                                <div class="col-sm-8">
                                <input class="checkbox" type="checkbox" name="status"  {{ old('status',(empty($link['status'])?0:1))?'checked':''}}>

                                </div>
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
@endpush
