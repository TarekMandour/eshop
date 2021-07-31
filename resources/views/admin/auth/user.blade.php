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
                                     <a href="{{ sc_route_admin('admin_user.index') }}" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> {{trans('admin.back_list')}}</span></a>

                                 </div>
                             </div>
                         </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ $url_action }}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"  enctype="multipart/form-data">


                    <div class="card-body">
                            <div class="form-group  row {{ $errors->has('name') ? ' text-red' : '' }}">
                                <label for="name" class="col-sm-2  control-label">{{ trans('user.name') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text"   id="name" name="name" value="{{ old('name',$user['name']??'')}}" class="form-control name" placeholder="" />
                                    </div>
                                        @if ($errors->has('name'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group  row {{ $errors->has('username') ? ' text-red' : '' }}">
                                <label for="username" class="col-sm-2  control-label">{{ trans('user.user_name') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text"   id="username" name="username" value="{{ old('username',$user['username']??'') }}" class="form-control username" placeholder="" />
                                    </div>
                                        @if ($errors->has('username'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('username') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group  row {{ $errors->has('email') ? ' text-red' : '' }}">
                                <label for="email" class="col-sm-2  control-label">{{ trans('user.email') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text"   id="email" name="email" value="{{ old('email',$user['email']??'') }}" class="form-control email" placeholder="" />
                                    </div>
                                        @if ($errors->has('email'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group  row {{ $errors->has('avatar') ? ' text-red' : '' }}">
                                <label for="avatar" class="col-sm-2  control-label">{{ trans('user.avatar') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" id="avatar" name="avatar" value="{{ old('avatar',$user['avatar']??'') }}" class="form-control avatar" placeholder=""  />
                                       <span class="input-group-btn">
                                         <a data-input="avatar" data-preview="preview_avatar" data-type="avatar" class="btn btn-primary lfm">
                                           <i class="fa fa-image"></i> {{trans('product.admin.choose_image')}}
                                         </a>
                                       </span>
                                    </div>
                                        @if ($errors->has('avatar'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('avatar') }}
                                            </span>
                                        @endif
                                        <div id="preview_avatar" class="img_holder">
                                        @if (old('avatar',$user['avatar']??''))
                                            <img src="{{ sc_file(old('avatar',$user['avatar']??'')) }}">
                                        @endif
                                        </div>
                                </div>
                            </div>

                            <div class="form-group  row {{ $errors->has('password') ? ' text-red' : '' }}">
                                <label for="password" class="col-sm-2  control-label">{{ trans('user.password') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="password"   id="password" name="password" value="{{ old('password')??'' }}" class="form-control password" placeholder="" />
                                    </div>
                                        @if ($errors->has('password'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('password') }}
                                            </span>
                                        @else
                                            @if ($user)
                                                <span class="form-text">
                                                     {{ trans('user.admin.keep_password') }}
                                                 </span>
                                            @endif
                                        @endif
                                </div>
                            </div>

                            <div class="form-group  row {{ $errors->has('password_confirmation') ? ' text-red' : '' }}">
                                <label for="password" class="col-sm-2  control-label">{{ trans('user.password_confirmation') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="password"   id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation')??'' }}" class="form-control password_confirmation" placeholder="" />
                                    </div>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('password_confirmation') }}
                                            </span>
                                        @else
                                            @if ($user)
                                                <span class="form-text">
                                                     {{ trans('user.admin.keep_password') }}
                                                 </span>
                                            @endif
                                        @endif
                                </div>
                            </div>

                            {{-- select roles --}}
                            <div class="form-group row {{ $errors->has('roles') ? ' text-red' : '' }}">
                            @php
                            $listRoles = [];
                                $old_roles = old('roles',($user)?$user->roles->pluck('id')->toArray():'');
                                if(is_array($old_roles)){
                                    foreach($old_roles as $value){
                                        $listRoles[] = (int)$value;
                                    }
                                }
                            @endphp
                                <label for="roles" class="col-sm-2  control-label">{{ trans('user.admin.select_roles') }}</label>
                                <div class="col-sm-8">

                            @if (isset($user['id']) && in_array($user['id'], SC_GUARD_ADMIN))
                                @if (count($listRoles))
                                @foreach ($listRoles as $role)
                                    {!! '<span class="badge badge-primary">'.($roles[$role]??'').'</span>' !!}
                                @endforeach
                                @endif
                            @else
                                <select class="form-control roles select2"  multiple="multiple" data-placeholder="{{ trans('user.admin.select_roles') }}" style="width: 100%;" name="roles[]" >
                                    <option value=""></option>
                                    @foreach ($roles as $k => $v)
                                        <option value="{{ $k }}"  {{ (count($listRoles) && in_array($k, $listRoles))?'selected':'' }}>{{ $v }}</option>
                                    @endforeach
                                </select>
                                    @if ($errors->has('roles'))
                                        <span class="form-text">
                                            {{ $errors->first('roles') }}
                                        </span>
                                    @endif
                            @endif
                                </div>
                            </div>
                            {{-- //select roles --}}

                            {{-- select permission --}}
                            <div class="form-group row {{ $errors->has('permission') ? ' text-red' : '' }}">
                                @php
                                $listPermission = [];
                                $old_permission = old('permission',($user?$user->permissions->pluck('id')->toArray():''));
                                    if(is_array($old_permission)){
                                        foreach($old_permission as $value){
                                            $listPermission[] = (int)$value;
                                        }
                                    }
                                @endphp
                                <label for="permission" class="col-sm-2  control-label">{{ trans('user.admin.add_permission') }}</label>
                                <div class="col-sm-8">
                                    @if (isset($user['id']) && in_array($user['id'], SC_GUARD_ADMIN))
                                        @if (count($listPermission))
                                            @foreach ($listPermission as $p)
                                                {!! '<span class="badge badge-primary">'.($permissions[$p]??'').'</span>' !!}
                                            @endforeach
                                        @endif
                                    @else
                                        <select class="form-control permission select2"  multiple="multiple" data-placeholder="{{ trans('user.admin.add_permission') }}" style="width: 100%;" name="permission[]" >
                                            <option value=""></option>
                                            @foreach ($permissions as $k => $v)
                                                <option value="{{ $k }}"  {{ (count($listPermission) && in_array($k, $listPermission))?'selected':'' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                            @if ($errors->has('permission'))
                                                <span class="form-text">
                                                    {{ $errors->first('permission') }}
                                                </span>
                                            @endif
                                    @endif

                                </div>
                            </div>
                        {{-- //select permission --}}


                        {{-- select store --}}
                        @if (sc_config_global('MultiVendorPro'))
                            @if (!empty($isAllStore))
                            <label for="store" class="col-sm-2 col-form-label">
                                {{ trans('store.select_store') }}
                            </label>
                            <span class="badge badge-primary">{{ trans('store.all_stories') }}</span>
                            @else
                                <div class="form-group row {{ $errors->has('store') ? ' text-red' : '' }}">
                                    @php
                                    $listStore = [];
                                    $store = old('store', ($storesPivot ?? []));
                                    if(is_array($store)){
                                        foreach($store as $value){
                                            $listStore[] = (int)$value;
                                        }
                                    }
                                    @endphp
                                    <label for="store" class="col-sm-2 col-form-label">
                                        {{ trans('store.select_store') }}
                                    </label>
                                    <div class="col-sm-8">
                                        <select class="form-control input-sm store" data-placeholder="{{ trans('store.select_store') }}" style="width: 100%;"
                                            name="store">
                                            @foreach ($stores as $id => $store)
                                            <option value="{{ $id }}" {{ (count($listStore) && in_array($id, $listStore))?'selected':'' }}>
                                                {{ sc_store('title', $id) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('store'))
                                        <span class="form-text">
                                            <i class="fa fa-info-circle"></i> {{ $errors->first('store') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @else
                            <input type="hidden" name="store" value="1">
                        @endif
                        {{-- //select store --}}



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
