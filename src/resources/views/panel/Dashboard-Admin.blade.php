@extends('panel.App')
  @section('content')

      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">{{ Lang::get('AdminDashboard.Panel') }}</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" >{{ Lang::get('AdminDashboard.Home') }}</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('AdminDashboard.Panel') }}</li>
                </ol>
              </nav>
            </div>
            <!-- <div class="d-flex align-items-center justify-content-between gap-6">
              <select class="form-select border fs-3" aria-label="Default select example">
                <option selected>November 2024</option>
                <option value="1">February 2024</option>
                <option value="2">March 2024</option>
                <option value="3">April 2024</option>
              </select>
              <button class="btn btn-success d-flex align-items-center gap-1 fs-3 py-2 px-9">
                <i class="ti ti-plus fs-4"></i>
                Create
              </button>
            </div> -->
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body pb-0">
                  <div class="d-md-flex align-items-center">
                    <h4 class="card-title">{{ Lang::get('AdminDashboard.TotalIncome') }}</h4>
                    <div class="ms-auto">
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <h6 class="text-muted">
                            <i class="fa fa-circle me-1 text-success"></i>{{ Lang::get('AdminDashboard.PrevMonth') }}
                          </h6>
                        </li>
                        <li class="list-inline-item">
                          <h6 class="text-muted">
                            <i class="fa fa-circle me-1 text-info"></i>{{ Lang::get('AdminDashboard.CurrentMonth') }}
                          </h6>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div id="total-revenue" class="mx-n6"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Row -->
              <div class="row">
                <div class="col-sm-6">
                  <div class="card card-body">
                    <!-- Row -->
                    <div class="row align-items-center">
                      <div class="col-6">
                        <h1 class="fw-light">
                          <?
                            $total = 0;
                            foreach($AllAppointments as $Appointment){
                                if ($Appointment['PaymentStatus']=='1') {
                                    $total += $Appointment['Cost'];
                                }
                                
                            }
                            echo num2k($total);
                           ?>
                         </h1>
                        <h6 class="text-muted mb-0">{{ Lang::get('AdminDashboard.Profit') }}</h6>
                      </div>
                      <div class="col-6 text-end align-self-center">
                        <div id="new-clients"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card card-body">
                    <!-- Row -->
                    <div class="row align-items-center">
                      <div class="col-6">
                        <h1 class="fw-light">
                          <?
                            $total = 0;
                            foreach($AllAppointments as $Appointment){
                              if ($Appointment['Status']=='1' && $Appointment['PaymentStatus']=='1') {
                                  $total++;
                              }
                            }
                            echo $total;
                          ?>
                        </h1>
                        <h6 class="text-muted mb-0">{{ Lang::get('AdminDashboard.AppPaid') }}</h6>
                      </div>
                      <div class="col-6 text-end align-self-center">
                        <div id="all-projects"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card card-body">
                    <!-- Row -->
                    <div class="row align-items-center">
                      <div class="col-6">
                        <h1 class="fw-light"><?
                            $total = 0;
                            foreach($AllAppointments as $Appointment){
                              if ($Appointment['Status']=='0' || $Appointment['PaymentStatus']=='0') {
                                  $total++;
                              }
                            }
                            echo $total;
                          ?></h1>
                        <h6 class="text-muted mb-0">{{ Lang::get('AdminDashboard.AppOnHold') }}</h6>
                      </div>
                      <div class="col-6 text-end align-self-center">
                        <div id="new-items"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card card-body">
                    <!-- Row -->
                    <div class="row align-items-center">
                      <div class="col-6">
                        <h1 class="fw-light">
                          <?
                            $total = 0;
                            foreach($AllAppointments as $Appointment){
                              if ($Appointment['Status']=='3' && $Appointment['PaymentStatus']=='1') {
                                  $total++;
                              }
                            }
                            echo $total;
                          ?></h1>
                        <h6 class="text-muted mb-0">{{ Lang::get('AdminDashboard.AppCompleted') }}</h6>
                      </div>
                      <div class="col-6 text-end align-self-center">
                        <div id="invoices"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
<!--                   <div class="d-md-flex align-items-center no-block">
                    <h4 class="card-title">Sales of the Month</h4>
                    <div class="ms-auto">
                      <select class="form-select">
                        <option selected>January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                      </select>
                    </div>
                  </div> -->
                  <!-- Row -->
                  <div class="row mt-4">
                    <div class="col-md-7">
                      <div id="sales-of-the-month" class="m-auto"></div>
                      <!-- <div class="round-overlap sales"><i class="mdi mdi-cart"></i></div> -->
                    </div>
                    <div class="col-md-5 align-self-center">
                      <h1 class="mb-0">{{$total}}<small>%</small>
                      </h1>
                      <h6 class="text-muted">{{count($Agencies)}} {{ Lang::get('AdminDashboard.TotalAgency') }}</h6>
                      <ul class="list-icons mt-4 list-style-none">
                        @foreach($Agencies as $Agency)
                          @if(count($Agency['Appointments']??[]))
                            <li class="my-1 py-1 hstack gap-2">
                              <i class="fa fa-circle text-secondary"></i> {{$Agency['Title']}}
                            </li>
                          @endif
                        @endforeach
                       
                      </ul>
                    </div>
                  </div>
                  <!-- Row -->
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card w-100 overflow-hidden">
                <div class="card-body pb-8">
                  <div class="d-md-flex no-block align-items-center">
                    <h4 class="card-title mb-0">{{ Lang::get('AdminDashboard.CurrentMonthsApps') }}</h4>
                    <!-- <div class="ms-auto">
                      <select class="form-select">
                        <option selected>November</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                      </select>
                    </div> -->
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table stylish-table align-middle text-nowrap">
                    <thead>
                      <tr>
                        <th class="border-bottom fs-3 ps-4">
                          #Id
                        </th>
                        <th class="border-bottom fs-3">
                          {{ Lang::get('AdminDashboard.Patient') }}
                        </th>
                        <th class="border-bottom fs-3">
                          {{ Lang::get('AdminDashboard.Treatments') }}
                        </th>
                        <th class="border-bottom fs-3 pe-4">
                          {{ Lang::get('AdminDashboard.Cost') }}
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($Appointments as $Appointment)
                        <tr>
                          <td>
                            <div class="hstack gap-3">
                              <span class="round-48 rounded-circle overflow-hidden bg-danger-subtle flex-shrink-0 hstack justify-content-center">
                                <h6 class="mb-0 fw-medium text-danger fs-4">S</h6>
                              </span>
                              <div>
                                <h6 class="mb-0 fw-medium fs-4">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}</h6>
                                <!-- <p class="mb-0 fs-3 text-body">Web Designer</p> -->
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3 text-body">{{$Appointment['Treatment']['Title']}}</p>
                          </td>
                          <td>
                            <span class="badge bg-danger-subtle text-danger rounded-pill">
                               <? 
                                if($Appointment['Status']=='1'){
                                    if ($Appointment['PaymentStatus']=='0') {
                                        echo '<div class="text-primary">Ödeme Yapılmadı</div>';
                                    }elseif($Appointment['PaymentStatus']=='1'){
                                        echo '<div class="text-primary">Ödeme Alındı</div>';
                                    }else {
                                        echo '<div class="text-primary">Ödeme İade Edildi</div>';
                                    }
                                }elseif($Appointment['Status']=='2') {
                                    echo '<div class="text-danger">İptal Edildi</div>';
                                }elseif($Appointment['Status']=='3') {
                                    echo '<div class="text-danger">Teslim Edildi</div>';
                                }
                              ?>
                            </span>
                          </td>
                          <td>
                            <p class="mb-0 fs-3 text-body">{{$Appointment['Cost']}}</p>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
  @endsection

@section('script')
    <script src="<?= asset('assets/panel/libs/apexcharts/dist/apexcharts.min.js') ?>"></script>
    <script src="<?= asset('assets/panel/js/dashboards/dashboard5.js') ?>"></script>
    <script type="text/javascript">



    var option_Sales_of_the_Month = {

        series: [
          @foreach($Agencies as $Agency)
            @if(count($Agency['Appointments']??[]))
              <?= count($Agency['Appointments']); ?>,
            @endif
          @endforeach
        ],
        labels: ["-", 
            @foreach($Agencies as $Agency)
              @if(count($Agency['Appointments']??[]))
                '<?= $Agency['Title'] ?>',
              @endif
            @endforeach
        ],
        chart: {
            type: "donut",
            height: 270,
            offsetY: 20,
            fontFamily: "inherit",
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 0,
        },
        plotOptions: {
            pie: {
                expandOnClick: true,
                donut: {
                    size: "88",
                    labels: {
                        show: false,
                        name: {
                            show: true,
                            offsetY: 7,
                        },
                        value: {
                            show: false,
                        },
                        total: {
                            show: false,
                            color: "#a1aab2",
                            fontSize: "13px",
                            label: "Our Visitor",
                        },
                    },
                },
            },
        },
        colors: ["#edf1f5", "var(--bs-primary)", "var(--bs-success)", "var(--bs-secondary)"],
        tooltip: {
            show: true,
            fillSeriesColor: false,
        },
        legend: {
            show: false,
        },
        responsive: [
            {
                breakpoint: 1025,
                options: {
                    chart: {
                        width: 250,
                    },
                },
            },
            {
                breakpoint: 769,
                options: {
                    chart: {
                        height: 270,
                        width: "100%",
                    },
                },
            },
            {
                breakpoint: 426,
                options: {
                    chart: {
                        height: 250,
                        offsetX: -20,
                        width: 250,
                    },
                },
            },
        ],
    };

    var chart_pie_donut = new ApexCharts(
        document.querySelector("#sales-of-the-month"),
        option_Sales_of_the_Month
    );
    chart_pie_donut.render();

    </script>
@endsection