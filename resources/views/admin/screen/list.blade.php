@extends($templatePathAdmin.'layout')

@section('main')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
  <!--begin::Container-->
  <div class="container py-8">
    <!--begin::Notice-->
    <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">

        <div class="card-tools">
          @if (!empty($topMenuRight) && count($topMenuRight))
            @foreach ($topMenuRight as $item)
                <div class="menu-right">
                  @php
                      $arrCheck = explode('view::', $item);
                  @endphp
                  @if (count($arrCheck) == 2)
                    @if (view()->exists($arrCheck[1]))
                      @include($arrCheck[1])
                    @endif
                  @else
                    {!! trim($item) !!}
                  @endif
                </div>
            @endforeach
          @endif
        </div>
        <div class="card-title">
          @if (!empty($topMenuLeft) && count($topMenuLeft))
            @foreach ($topMenuLeft as $item)
                <div class="menu-left">
                  @php
                  $arrCheck = explode('view::', $item);
                  @endphp
                  @if (count($arrCheck) == 2)
                    @if (view()->exists($arrCheck[1]))
                      @include($arrCheck[1])
                    @endif
                  @else
                    {!! trim($item) !!}
                  @endif
                </div>
            @endforeach
          @endif
        </div>
        <!-- /.box-tools -->
      
    </div>
    <!--end::Notice-->

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-header with-border">
        <div class="card-toolbar">
          @if (!empty($removeList))
            <div class="menu-left mr-2">
              <span class="btn btn-danger font-weight-bolder grid-trash" title="{{ trans('admin.delete') }}"><i class="fas fa-trash-alt"></i></span>
            </div>
          @endif

          @if (!empty($buttonRefresh))
            <div class="menu-left mr-2">
              <span class="btn btn-primary font-weight-bolder grid-refresh" title="{{ trans('admin.refresh') }}"><i class="fas fa-sync-alt"></i></span>
            </div>
          @endif

          @if (!empty($menuRight) && count($menuRight))
            @foreach ($menuRight as $item)
                <div class="menu-right">
                @php
                    $arrCheck = explode('view::', $item);
                @endphp
                @if (count($arrCheck) == 2)
                  @if (view()->exists($arrCheck[1]))
                    @include($arrCheck[1])
                  @endif
                @else
                  {!! trim($item) !!}
                @endif
                </div>
            @endforeach
          @endif
        </div>

        <div class="card-title">

          @if (!empty($buttonSort))
          <div class="menu-left">
            <div class="input-group float-right ml-1" style="width: 250px;">
              <div class="btn-group">
                <select class="form-control rounded-0 float-right" id="order_sort">
                {!! $optionSort??'' !!}
                </select>
              </div>
              <div class="input-group-append">
                  <button title="{{ trans('admin.sort') }}" id="button_sort" type="submit" class="btn btn-primary"><i class="fas fa-sort-amount-down-alt"></i></button>
              </div>
            </div>
          </div>
          @endif

          @if (!empty($menuLeft) && count($menuLeft))
            @foreach ($menuLeft as $item)
                <div class="menu-left">
                  @php
                      $arrCheck = explode('view::', $item);
                  @endphp
                  @if (count($arrCheck) == 2)
                    @if (view()->exists($arrCheck[1]))
                      @include($arrCheck[1])
                    @endif
                  @else
                    {!! trim($item) !!}
                  @endif
                </div>
            @endforeach
          @endif
        </div>

      </div>
      <div class="card-body" id="pjax-container">
        @php
            $urlSort = $urlSort ?? '';
        @endphp
        <div id="url-sort" data-urlsort="{!! strpos($urlSort, "?")?$urlSort."&":$urlSort."?" !!}"  style="display: none;"></div>

        <!--begin: Datatable-->
        <div class="table-responsive">
          <table class="table table-head-custom table-vertical-center checkTrash" id="kt_advance_table_widget_4">
            <thead>
              <tr>
                @if (!empty($removeList))
                <th>
                  <label class="checkbox checkbox-lg checkbox-inline mr-2">
                    <input type="checkbox" value="1" />
                    <span></span>
                  </label>
                </th>
                @endif
                @foreach ($listTh as $key => $th)
                  @if($loop->last)
                  <th style="min-width: 100px">{!! $th !!}</th>
                  @else
                  <th>{!! $th !!}</th>
                  @endif
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($dataTr as $keyRow => $tr)
              <tr>
                  @if (!empty($removeList))
                  <td>
                    <label class="checkbox checkbox-lg checkbox-inline">
                      <input type="checkbox" data-id="{{ $tr['id']??'' }}" />
                      <span></span>
                    </label>
                  </td>
                  @endif
                  @foreach ($tr as $key => $trtd)
                      <td>{!! $trtd !!}</td>
                  @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
          <!--end: Datatable-->
        </div>

        <div class="block-pagination clearfix m-10">
          <div class="ml-3 float-left">
            {!! $resultItems??'' !!}
          </div>
          <div class="pagination pagination-sm mr-3 float-right">
            {!! $pagination??'' !!}
          </div>
        </div>
        
      </div>
      <div class="card-footer clearfix">
        @if (!empty($blockBottom) && count($blockBottom))
          @foreach ($blockBottom as $item)
            <div class="clearfix">
              @php
              $arrCheck = explode('view::', $item);
              @endphp
              @if (count($arrCheck) == 2)
                @if (view()->exists($arrCheck[1]))
                  @include($arrCheck[1])
                @endif
              @else
                {!! trim($item) !!}
              @endif
            </div>    
          @endforeach
        @endif
      </div>
    </div>
    <!--end::Card-->
  </div>
  <!--end::Container-->
</div>
<!--end::Entry-->

@endsection


@push('styles')
{!! $css ?? '' !!}
@endpush

@push('scripts')
    {{-- //Pjax --}}
   <script src="{{ sc_file('admin/plugin/jquery.pjax.js')}}"></script>

  <script type="text/javascript">

    $('.grid-refresh').click(function(){
      $.pjax.reload({container:'#pjax-container'});
    });

      $(document).on('submit', '#button_search', function(event) {
        $.pjax.submit(event, '#pjax-container')
      })

    $(document).on('pjax:send', function() {
      $('#loading').show()
    })
    $(document).on('pjax:complete', function() {
      $('#loading').hide()
    })

    // tag a
    $(function(){
     $(document).pjax('a.page-link', '#pjax-container')
    })


    $(document).ready(function(){
    // does current browser support PJAX
      if ($.support.pjax) {
        $.pjax.defaults.timeout = 2000; // time in milliseconds
      }
    });

    @if ($buttonSort)
      $('#button_sort').click(function(event) {
        var url = $('#url-sort').data('urlsort')+'sort_order='+$('#order_sort option:selected').val();
        $.pjax({url: url, container: '#pjax-container'})
      });
    @endif

  </script>
    {{-- //End pjax --}}


<script type="text/javascript">
{{-- sweetalert2 --}}
var selectedRows = function () {
    var selected = [];
    $('.checkTrash input:checkbox:checked').each(function(){
        if ($(this).data('id') !=null) {
          selected.push($(this).data('id'));
        }
    });

    return selected;
}

$('.grid-trash').on('click', function() {
  var ids = selectedRows().join();
  alert(ids);
  deleteItem(ids);
});

  function deleteItem(ids){
  Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true,
  }).fire({
    title: '{{ trans('admin.confirm_delete') }}',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: '{{ trans('admin.confirm_delete_yes') }}',
    confirmButtonColor: "#DD6B55",
    cancelButtonText: '{{ trans('admin.confirm_delete_no') }}',
    reverseButtons: true,

    preConfirm: function() {
        return new Promise(function(resolve) {
            $.ajax({
                method: 'post',
                url: '{{ $urlDeleteItem ?? '' }}',
                data: {
                  ids:ids,
                    _token: '{{ csrf_token() }}',
                },
                success: function (data) {
                    if(data.error == 1){
                      alertMsg('error', data.msg, '{{ trans('admin.warning') }}');
                      $.pjax.reload('#pjax-container');
                      return;
                    }else{
                      alertMsg('success', data.msg);
                      $.pjax.reload('#pjax-container');
                      resolve(data);
                    }

                }
            });
        });
    }

  }).then((result) => {
    if (result.value) {
      alertMsg('success', '{{ trans('admin.confirm_delete_deleted_msg') }}', '{{ trans('admin.confirm_delete_deleted') }}');
    } else if (
      // Read more about handling dismissals
      result.dismiss === Swal.DismissReason.cancel
    ) {
      // swalWithBootstrapButtons.fire(
      //   'Cancelled',
      //   'Your imaginary file is safe :)',
      //   'error'
      // )
    }
  })
}
{{--/ sweetalert2 --}}


</script>

{!! $js ?? '' !!}
@endpush
