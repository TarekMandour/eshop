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
                    First Name : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->first_name}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Last Name : 
                    <!--end::Symbol--> 
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->last_name}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Company Name :
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->company_name}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Phone Number : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->phone_number}}</td>
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
                    Street Address : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->street_address}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    City : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->city}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    State : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->state}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Computers : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->computers}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Laptops : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->laptops}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Monitors - TFT : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->monitors}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Monitors - CRT : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->crt}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Servers : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->servers}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Networking : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->networking}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Hard Drives : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->harddrives}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Data Tapes : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->datatapes}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Mobile Phones : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->mobile}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Office ( Landline Phones ) : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->office}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Tablets : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->tablets}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Printers : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->printers}}</td>
                </tr>

                <tr>
                  <td class="w-40px align-middle pb-6 pl-0 pr-2">
                    <!--begin::Symbol-->
                    Other : 
                    <!--end::Symbol-->
                  </td>
                  <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$data->other}}</td>
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
