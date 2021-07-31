@extends($templatePathAdmin.'layout')

@section('main')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
  <!--begin::Container-->
  <div class="container py-8">


    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-body" id="pjax-container">

        <div class="table-responsive">

          <table class="table table-head-custom table-vertical-center checkTrash" id="kt_advance_table_widget_4">
              <thead>
              <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $row)
                  <tr>
                      <td>
                          {{$key + 1}}
                      </td>

                      <td>{{$row->name}}</td>
                      <td>{{$row->phone}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->created_at}}</td>

                      <td>
                          <a href="{{route('admin_slaptop.show', $row->id)}}"
                             class="btn btn-icon btn-warning btn-circle btn-sm mr-2">
                              <i class="icon-nm fas fa-eye" aria-hidden='true'></i>
                          </a>
                          <a href="{{route('admin_slaptop.delete', $row->id)}}"
                             class="btn btn-icon btn-danger btn-circle btn-sm mr-2">
                              <i class="icon-nm fas fa-trash" aria-hidden='true'></i>
                          </a>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
        <!--end: Datatable-->

        
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
{!! $js ?? '' !!}
@endpush
