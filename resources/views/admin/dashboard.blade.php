@extends($templatePathAdmin.'layout')

@section('main')

<!--begin::Entry-->
<div class="container py-8">

  <div class="row">
    <div class="col-lg-3">
      <!--begin::Callout-->
      <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <!--begin::Icon-->
            <div class="mr-6">
              <span class="svg-icon svg-icon-primary svg-icon-4x">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z" fill="#000000" opacity="0.3" />
                  </g>
                </svg>
                <!--end::Svg Icon-->
              </span>
            </div>
            <!--end::Icon-->
            <!--begin::Content-->
            <div class="d-flex flex-column">
              <a href="{{ sc_route_admin('admin_order.index') }}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">{{ number_format($totalOrder) }}</a>
              <div class="text-dark-75">{{ trans('admin.total_order') }}</div>
            </div>
            <!--end::Content-->
          </div>
        </div>
      </div>
      <!--end::Callout-->
    </div>
    <div class="col-lg-3">
      <!--begin::Callout-->
      <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <!--begin::Icon-->
            <div class="mr-6">
              <span class="svg-icon svg-icon-danger svg-icon-4x">
                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000" />
                    <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3" />
                  </g>
                </svg>
                <!--end::Svg Icon-->
              </span>
            </div>
            <!--end::Icon-->
            <!--begin::Content-->
            <div class="d-flex flex-column">
              <a href="{{ sc_route_admin('admin_product.index') }}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">{{ number_format($totalProduct) }}</a>
              <div class="text-dark-75">{{ trans('admin.total_product') }}</div>
            </div>
            <!--end::Content-->
          </div>
        </div>
      </div>
      <!--end::Callout-->
    </div>
    <div class="col-lg-3">
      <!--begin::Callout-->
      <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <!--begin::Icon-->
            <div class="mr-6">
              <span class="svg-icon svg-icon-success svg-icon-4x">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Sketch.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8" />
                    <polygon fill="#000000" points="23 8 12 20 1 8" />
                  </g>
                </svg>
                <!--end::Svg Icon-->
              </span>
            </div>
            <!--end::Icon-->
            <!--begin::Content-->
            <div class="d-flex flex-column">
              <a href="{{ sc_route_admin('admin_customer.index') }}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">{{ number_format($totalCustomer) }}</a>
              <div class="text-dark-75">{{ trans('admin.total_customer') }}</div>
            </div>
            <!--end::Content-->
          </div>
        </div>
      </div>
      <!--end::Callout-->
    </div>
    <div class="col-lg-3">
      <!--begin::Callout-->
      <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <!--begin::Icon-->
            <div class="mr-6">
              <span class="svg-icon svg-icon-primary svg-icon-4x">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z" fill="#000000" opacity="0.3" />
                  </g>
                </svg>
                <!--end::Svg Icon-->
              </span>
            </div>
            <!--end::Icon-->
            <!--begin::Content-->
            <div class="d-flex flex-column">
              <a href="{{ sc_route_admin('admin_news.index') }}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">{{ number_format($totalNews) }}</a>
              <div class="text-dark-75">{{ trans('admin.total_blogs') }}</div>
            </div>
            <!--end::Content-->
          </div>
        </div>
      </div>
      <!--end::Callout-->
    </div>
  </div>

</div>
<!--end::Section-->

<!--begin::Section-->
<div class="container">

  <!--begin::Card-->
  <div class="card card-custom gutter-b">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">{{ trans('admin.order_month') }}</h3>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Chart-->
      <div id="chart_2"></div>
      <!--end::Chart-->
    </div>
  </div>
  <!--end::Card-->

</div>
<!--end::Section-->

<!--begin::Section-->
<div class="container">

  <!--begin::Card-->
  <div class="card card-custom gutter-b">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">{{ trans('admin.order_year') }}</h3>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Chart-->
      <div id="chart_5"></div>
      <!--end::Chart-->
    </div>
  </div>
  <!--end::Card-->

</div>
<!--end::Section-->

<div class="container">
  <!--begin::Row-->
  <div class="row">
    <div class="col-lg-6">
      <!--begin::Mixed Widget 14-->
      <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
          <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ trans('admin.top_customer_new') }}</span>
          </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-0 pb-3">
          <div class="tab-content">
            <!--begin::Table-->
            <div class="table-responsive">
              <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                  <tr class="text-left text-uppercase">
                    <th>{{ trans('order.id') }}</th>
                    <th><span class="text-dark-75">{{ trans('order.phone') }}</span></th>
                    <th>{{ trans('order.status') }}</th>
                    <th>{{ trans('order.created_at') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($topOrder))
                    @foreach ($topOrder as $order)
                          <tr>
                            <td><a href="{{ route('admin_order.detail',['id'=>$order->id]) }}">Order#{{ $order->id }}</a></td>
                            <td>{{ $order->phone }}</td>
                            <td><span class="badge badge-{{ $mapStyleStatus[$order->status]??'' }}">{{ $order->orderStatus->name }}</span></td>
                            <td>{{ $order->created_at }}</td>
                          </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!--end::Table-->
          </div>
        </div>
        <!--end::Body-->
      </div>
      <!--end::Mixed Widget 14-->
    </div>
    <div class="col-lg-6">
      <!--begin::Advance Table Widget 4-->
      <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
          <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ trans('admin.top_customer_new') }}</span>
          </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-0 pb-3">
          <div class="tab-content">
            <!--begin::Table-->
            <div class="table-responsive">
              <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                  <tr class="text-left text-uppercase">
                    <th>{{ trans('customer.id') }}</th>
                    <th><span class="text-dark-75">{{ trans('customer.name') }}</span></th>
                    <th>{{ trans('customer.phone') }}</th>
                    <th>{{ trans('customer.created_at') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($topCustomer))
                    @foreach ($topCustomer as $customer)
                      <tr>
                        <td><a href="{{ sc_route_admin('admin_customer.edit',['id'=>$customer->id]) }}">ID#{{ $customer->id }}</a></td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->created_at }}</td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!--end::Table-->
          </div>
        </div>
        <!--end::Body-->
      </div>
      <!--end::Advance Table Widget 4-->
    </div>
  </div>
  <!--end::Row-->
</div>


@endsection


@push('styles')
@endpush

@push('scripts')

<script type="text/javascript">

  const primary = '#6993FF';
  const success = '#1BC5BD';
  const info = '#8950FC';
  const warning = '#FFA800';
  const danger = '#F64E60';

  var KTApexChartsDemo = function () {
    // Private functions

    var _demo2 = function () {
      const apexChart = "#chart_2";
      var options = {
        series: [{
          name: '{{ trans('chart.order') }}',
          data: {!! json_encode(array_values($orderInMonth)) !!}
        }, {
          name: '{{ trans('chart.amount') }}',
          data: {!! json_encode(array_values($amountInMonth)) !!}
        }],
        chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: {!! json_encode(array_keys($orderInMonth)) !!}
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        colors: [primary, success]
      };

      var chart = new ApexCharts(document.querySelector(apexChart), options);
      chart.render();
    }

    var _demo5 = function () {
      const apexChart = "#chart_5";
      var options = {
        series: [{
          name: "{{ trans('chart.amount') }}",
          type: 'column',
          data: {!! json_encode(array_values($dataInYear)) !!}
        }, {
          name: "{{ trans('chart.order') }}",
          type: 'line',
          data: {!! json_encode(array_values($dataordersInYear)) !!}
        }],
        chart: {
          height: 350,
          type: 'line',
          stacked: false
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [1, 4]
        },
        title: {
          text: '{{ trans('chart.static_month') }}',
          align: 'left',
          offsetX: 110
        },
        xaxis: {
          categories: {!! json_encode(array_keys($dataInYear)) !!},
        },
        yaxis: [
          {
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: primary
            },
            labels: {
              style: {
                colors: primary,
              }
            },
            title: {
              text: "{{ trans('chart.amount') }}",
              style: {
                color: primary,
              }
            },
            tooltip: {
              enabled: true
            }
          },
          {
            seriesName: "{{ trans('chart.static_month') }}",
            opposite: true,
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: success
            },
            labels: {
              style: {
                colors: success,
              },
            },
            title: {
              text: "{{ trans('chart.order') }}",
              style: {
                color: success,
              }
            }
          },
        ],
        tooltip: {
          fixed: {
            enabled: true,
            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
            offsetY: 30,
            offsetX: 60
          },
        },
        legend: {
          horizontalAlign: 'left',
          offsetX: 40
        }
      };

      var chart = new ApexCharts(document.querySelector(apexChart), options);
      chart.render();
    }

    return {
      // public functions
      init: function () {
        _demo2();
        _demo5();
      }
    };
  }();

  jQuery(document).ready(function () {
    KTApexChartsDemo.init();
  });

</script>

@endpush
