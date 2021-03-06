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
                            <a href="{{ sc_route_admin('admin_email_template.index') }}" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> {{trans('admin.back_list')}}</span></a>

                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ $url_action }}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"  enctype="multipart/form-data">


                    <div class="card-body">
                            <div class="form-group row  {{ $errors->has('name') ? ' text-red' : '' }}">
                                <label for="name" class="col-sm-2 col-form-label">{{ trans('email_template.name') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="name" id="name" name="name" value="{!! old()?old('name'):$obj['name']??'' !!}" class="form-control" placeholder="" />
                                    </div>
                                        @if ($errors->has('name'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row  {{ $errors->has('group') ? ' text-red' : '' }}">
                                <label for="group" class="col-sm-2 col-form-label">{{ trans('email_template.group') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control group select2" style="width: 100%;" name="group" >
                                        <option value=""></option>
                                        @foreach ($arrayGroup as $k => $v)
                                            <option value="{{ $k }}" {{ (old('group',$obj['group']??'') ==$k) ? 'selected':'' }}>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('group'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('group') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('text') ? ' text-red' : '' }}">
                                <label for="text" class="col-sm-2 col-form-label">{{ trans('email_template.text') }}</label>
                                <div class="col-sm-8">
                                        <textarea class="form-control" rows="10" id="text" name="text">{!! old('text',$obj['text']??'') !!}</textarea>
                                        @if ($errors->has('text'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('text') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="status" class="col-sm-2 col-form-label">{{ trans('email_template.status') }}</label>
                                <div class="col-sm-8">
                                    <input class="checkbox" type="checkbox" name="status"  {{ old('status',(empty($obj['status'])?0:1))?'checked':''}}>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <label>{{ trans('email_template.admin.variable_support') }}</label>
                                    <div id="list-variables">
                                    </div>                                   
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
<link rel="stylesheet" href="{{ sc_file('admin/plugin/mirror/doc/docs.css')}}">
<link rel="stylesheet" href="{{ sc_file('admin/plugin/mirror/lib/codemirror.css')}}">
@endpush

@push('scripts')
<script src="{{ sc_file('admin/plugin/mirror/lib/codemirror.js')}}"></script>
<script src="{{ sc_file('admin/plugin/mirror/mode/javascript/javascript.js')}}"></script>
<script src="{{ sc_file('admin/plugin/mirror/mode/css/css.js')}}"></script>
<script src="{{ sc_file('admin/plugin/mirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<script>
    window.onload = function() {
      editor = CodeMirror(document.getElementById("text"), {
        mode: "text/html",
        value: document.documentElement.innerHTML
      });
    };
    var myModeSpec = {
    name: "htmlmixed",
    tags: {
        style: [["type", /^text\/(x-)?scss$/, "text/x-scss"],
                [null, null, "css"]],
        custom: [[null, null, "customMode"]]
    }
    }
    var editor = CodeMirror.fromTextArea(document.getElementById("text"), {
      lineNumbers: true,
      styleActiveLine: true,
      matchBrackets: true
    });
  </script>


<script type="text/javascript">
    $(document).ready(function(){
        var group = $("[name='group'] option:selected").val();
        loadListVariable(group);
    });
    $("[name='group']").change(function(){
        var group = $("[name='group'] option:selected").val();
        loadListVariable(group);        
    });
    function loadListVariable(group){
    $.ajax({
        type: "get",
        data:{key:group},
        url: "{{route('admin_email_template.list_variable')}}",
        dataType: "json",
        beforeSend: function(){
                $('#loading').show();
            },        
        success: function (data) {
            html = '<ul>';
            $.each(data, function(i, item) {
                html +='<li>'+item+'</li>';
            });   
            html += '</ul>';         
            $('#list-variables').html(html);
            $('#loading').hide();
        }
    })

    }
</script>
@endpush
