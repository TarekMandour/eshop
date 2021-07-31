@extends($templatePathAdmin.'layout')

@section('main')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
  <!--begin::Container-->
  <div class="container py-8">


    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-body" id="pjax-container">

        <div class="d-flex flex-column mb-10 mb-md-0">
          <div class="font-weight-bolder font-size-lg mb-3">Details :</div>
        </div>

        <div class="card-body pt-2">
          <!--begin::Table-->
          <div class="table-responsive">
            <table class="table table-borderless mb-0">
              <tbody>
                <!--begin::Item-->
                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Name : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->name}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Phone : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->phone}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Email :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->email}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Address :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->address}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Modal Name :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->modal_name}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Hard Drive :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->hard_drive}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    RAM Size :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->ram_size}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Brand :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->brand}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Processors :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->processors}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Age of Laptop :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->age_laptop}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Operating System :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->operating_system}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Condition of Laptop :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->condition_laptop}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Attachment :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">
                    @if ($data->photo != null)
                    <img src="{{asset('/data/selllaptop')}}/{{$data->photo}}" style="width: 50%;" />
                    @endif
                  </td>
                </tr>
                <!--end::Item-->
              </tbody>
            </table>
          </div>
          <!--end::Table-->
        </div>


        
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
