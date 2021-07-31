@extends($templatePathAdmin.'layout')

@section('main')<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container py-8">

        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header with-border">
                <div class="card-toolbar">
                    <h2 class="card-title">{{ $title_description??'' }}</h2>
                </div>
            </div>
                <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ $url_action }}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"
                enctype="multipart/form-data">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h2>{{ trans('store.css') }}</h2>
                            <div class="form-group row {{ $errors->has('css') ? 'text-red' : '' }}">
                                <div class="col-sm-12">
                                        <textarea  id="css" name="css">{{ old('css',$css??'') }}</textarea>
                                        @if ($errors->has('css'))
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> {{ $errors->first('css') }}
                                            </span>
                                        @endif
                                </div>
                            </div>
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
<link rel="stylesheet" href="{{ sc_file('admin/plugin/mirror/doc/docs.css')}}">
<link rel="stylesheet" href="{{ sc_file('admin/plugin/mirror/lib/codemirror.css')}}">
@endpush

@push('scripts')
<script src="{{ sc_file('admin/plugin/mirror/lib/codemirror.js')}}"></script>
<script src="{{ sc_file('admin/plugin/mirror/mode/css/css.js')}}"></script>
<script>
    window.onload = function() {
      editor = CodeMirror(document.getElementById("css"), {
        mode: "text/html",
        value: document.documentElement.innerHTML
      });
    };
    var editor = CodeMirror.fromTextArea(document.getElementById("css"), {
      lineNumbers: true,
      styleActiveLine: true,
      matchBrackets: true
    });
  </script>
@endpush