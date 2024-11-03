@extends('panel.app')

@section('style')
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/glide.core.min.css')}}" />
@endsection

@section('content')
  <main>
    <div class="container">
      <!-- Title and Top Buttons Start -->
      <div class="page-title-container">
        <div class="row">
          <!-- Title Start -->
          <div class="col-12 col-md-7">
            <span class="align-middle text-muted d-inline-block lh-1 pb-2 pt-2 text-small">{{Lang::get('AgencyDashboard.Panel')}}</span>
            <h1 class="mb-0 pb-0 display-4" id="title">{{Lang::get('AgencyDashboard.Hello')}}, {{User('FirstName')}}!</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row">
        <div class="col-xl-4 mb-5">
          <!-- About Start -->
          <h2 class="small-title">{{Lang::get('AgencyDashboard.About')}}</h2>
          <div class="card h-100-card">
            <div class="card-body">
              <div class="d-flex align-items-center flex-column mb-4">
                <div class="d-flex align-items-center flex-column">
                  <div class="sw-13 position-relative mb-3">
                    <img src="{{$Agency->Logo ?? URL::asset('assets/img/profile/default-logo.png') }}" class="img-fluid rounded-xl" alt="thumb" />
                  </div>
                  <div class="h5 mb-0">{{User('FirstName')}} {{User('LastName')}}</div>
                  <div class="text-muted">{{$Agency->Title}}</div>
                </div>
              </div>
<!--               <div class="d-flex justify-content-between mb-2">
                <div class="text-center">
                  <p class="text-small text-muted mb-1">BLOOD</p>
                  <p>A+</p>
                </div>
                <div class="text-center">
                  <p class="text-small text-muted mb-1">AGE</p>
                  <p>27</p>
                </div>
                <div class="text-center">
                  <p class="text-small text-muted mb-1">WEIGHT</p>
                  <p>64</p>
                </div>
                <div class="text-center">
                  <p class="text-small text-muted mb-1">HEIGHT</p>
                  <p>1.68</p>
                </div>
              </div> -->
              <div class="mb-5">

              </div>

              <div class="mb-5">
                <p class="text-small text-muted mb-2">{{Lang::get('AgencyDashboard.Contact')}}</p>

                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 me-1">
                      <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                    </div>
                  </div>
                  <div class="col text-alternate">{{($Agency->Country ?? 'Default').'  '.($Agency->CountryCode ?? '')}}</div>
                </div>

                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 me-1">
                      <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                    </div>
                  </div>
                  <div class="col text-alternate">{{$Agency->Tell ?? 'No Tell Number'}}</div>
                </div>

                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 me-1">
                      <i data-acorn-icon="input-group" class="text-primary" data-acorn-size="17"></i>
                    </div>
                  </div>
                  <div class="col text-alternate">{{$Agency->Fax ?? 'No Fax Number'}}</div>
                </div>

                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 me-1">
                      <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                    </div>
                  </div>
                  <div class="col text-alternate">{{$Agency->Mail ?? 'No Mail'}}</div>
                </div>

                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 me-1">
                      <i data-acorn-icon="pin" class="text-primary" data-acorn-size="17"></i>
                    </div>
                  </div>
                  <div class="col text-alternate">{{$Agency->Adress ?? 'No Adress Info'}}</div>
                </div>

              </div>

<!--               <div class="mb-4">
                <p class="text-small text-muted mb-2">DOCTOR</p>
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 me-1">
                      <i data-acorn-icon="health" class="text-primary" data-acorn-size="17"></i>
                    </div>
                  </div>
                  <div class="col text-alternate align-middle">Antoine Spears</div>
                </div>
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 me-1">
                      <i data-acorn-icon="building" class="text-primary" data-acorn-size="17"></i>
                    </div>
                  </div>
                  <div class="col text-alternate">The Royal Melbourne Hospital City</div>
                </div>
              </div> -->

              <div>
                <p class="text-small text-muted mb-2">{{Lang::get('AgencyDashboard.Members')}}</p>
                @if(!empty($Members))
                  @foreach($Members as $Member)
                    <div class="row g-0">
                      <div class="col-auto">
                        <div class="sw-3 me-1">
                          <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                        </div>
                      </div>
                      <div class="col text-alternate align-middle">{{$Member->FirstName}} {{$Member->LastName}}</div>
                    </div>
                  @endforeach
                @endif
              </div>
              <br>
              <div>
                <p class="text-small text-muted mb-2">{{Lang::get('AgencyDashboard.Notes')}}</p>
                @if(!empty($Notes))
                  @foreach($Notes as $Note)
                    <div class="row g-0">
                      <div class="col-auto">
                        <div class="sw-3 me-1">
                          <i data-acorn-icon="warning-hexagon" class="text-primary" data-acorn-size="17"></i>
                        </div>
                      </div>
                      <div class="col text-alternate align-middle">{{$Note->Note}}</div>
                    </div>
                  @endforeach
                @endif
              </div>
              <br>

            </div>
          </div>
          <!-- About End -->
        </div>
<?php 
$DailyCost = 0;
$DailyProfit = 0;
$WeeklyCost = 0;
$WeeklyProfit = 0;
$MonthlyCost = 0;
$MonthlyProfit = 0;

if(!empty($Appointments)){
  foreach($Appointments as $Appointment){
      if (date('Y-m-d', strtotime($Appointment['create_at'])) == date('Y-m-d')) {
          $DailyCost = $DailyCost + $Appointment['Cost'];
          $DailyProfit = $DailyProfit + ($Appointment['Cost'] * $Agency->CommissionRate) / 100 ;
      }
      if (date('Y-m-d', strtotime($Appointment['create_at'])) >= date('Y-m-d', strtotime('-7 day'))) {
          $WeeklyCost = $WeeklyCost + $Appointment['Cost'];
          $WeeklyProfit = $WeeklyProfit + ($Appointment['Cost'] * $Agency->CommissionRate) / 100 ;
      }
      if (date('Y-m-d', strtotime($Appointment['create_at'])) >= date('Y-m-d', strtotime('-30 day'))) {
          $MonthlyCost = $MonthlyCost + $Appointment['Cost'];
          $MonthlyProfit = $MonthlyProfit + ($Appointment['Cost'] * $Agency->CommissionRate) / 100 ;
      }
  }
}
?>
        <div class="col-xl-8">
          <!-- Stats Start -->
          <h2 class="small-title">{{Lang::get('AgencyDashboard.Stats')}}</h2>
          <div class="row gx-2">
            <div class="col-12 p-0">
              <div class="glide glide-small" id="statsCarousel">
                <div class="glide__track" data-glide-el="track">
                  <div class="glide__slides">

<!--                     <div class="glide__slide">
                      <div class="card mb-5 hover-border-primary">
                        <span class="position-absolute e-3 t-4 z-index-1">
                          <i data-acorn-icon="chevron-bottom" class="text-primary" data-acorn-size="14"></i>
                        </span>
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                          <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                            <i data-acorn-icon="laboratory" class="text-primary"></i>
                          </div>
                          <div class="text-center mb-0 sh-8 d-flex align-items-center lh-1-5">
                            {{Lang::get('AgencyDashboard.CommissionRate')}}
                          </div>
                          <div class="display-6 text-primary">{{$Agency->CommissionRate}}%</div>
                        </div>
                      </div>
                    </div> -->

<!--                     <div class="glide__slide">
                      <div class="card mb-5 hover-border-primary">
                        <span class="position-absolute e-3 t-4 z-index-1">
                          <i data-acorn-icon="chevron-bottom" class="text-primary" data-acorn-size="14"></i>
                        </span>
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                          <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                            <i data-acorn-icon="laboratory" class="text-primary"></i>
                          </div>
                          <div class="text-center mb-0 sh-8 d-flex align-items-center lh-1-5">
                            Daily
                            <br />
                            Profit
                          </div>
                          <div class="display-6 text-primary">{{$DailyProfit}}</div>
                        </div>
                      </div>
                    </div> -->

                    <div class="glide__slide">
                      <div class="card mb-5 hover-border-primary">
                        <span class="position-absolute e-3 t-4 z-index-1">
                          <i data-acorn-icon="chevron-bottom" class="text-primary" data-acorn-size="14"></i>
                        </span>
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                          <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                            <i data-acorn-icon="laboratory" class="text-primary"></i>
                          </div>
                          <div class="text-center mb-0 sh-8 d-flex align-items-center lh-1-5">
                            {{Lang::get('AgencyDashboard.WeeklyProfit')}}
                          </div>
                          <div class="display-6 text-primary">{{$WeeklyProfit}}</div>
                        </div>
                      </div>
                    </div>

                    <div class="glide__slide">
                      <div class="card mb-5 hover-border-primary">
                        <span class="position-absolute e-3 t-4 z-index-1">
                          <i data-acorn-icon="chevron-bottom" class="text-primary" data-acorn-size="14"></i>
                        </span>
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                          <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                            <i data-acorn-icon="laboratory" class="text-primary"></i>
                          </div>
                          <div class="text-center mb-0 sh-8 d-flex align-items-center lh-1-5">
                            {{Lang::get('AgencyDashboard.MontlyProfit')}}
                          </div>
                          <div class="display-6 text-primary">{{$MonthlyProfit}}</div>
                        </div>
                      </div>
                    </div>

<!--                     <div class="glide__slide">
                      <div class="card mb-5 hover-border-primary">
                        <span class="position-absolute e-3 t-4 z-index-1">
                          <i data-acorn-icon="check" class="text-primary" data-acorn-size="14"></i>
                        </span>
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                          <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                            <i data-acorn-icon="blood" class="text-primary"></i>
                          </div>
                          <div class="text-center mb-0 sh-8 d-flex align-items-center lh-1-5">
                            Daily 
                            <br />
                            Total
                          </div>
                          <div class="display-6 text-primary">{{$DailyCost}}</div>
                        </div>
                      </div>
                    </div> -->

                    <div class="glide__slide">
                      <div class="card mb-5 hover-border-primary">
                        <span class="position-absolute e-3 t-4 z-index-1">
                          <i data-acorn-icon="check" class="text-primary" data-acorn-size="14"></i>
                        </span>
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                          <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                            <i data-acorn-icon="heart" class="text-primary"></i>
                          </div>
                          <div class="text-center mb-0 sh-8 d-flex align-items-center lh-1-5">
                            {{Lang::get('AgencyDashboard.WeeklyTotal')}}
                          </div>
                          <div class="display-6 text-primary">{{$WeeklyCost}}</div>
                        </div>
                      </div>
                    </div>

                    <div class="glide__slide">
                      <div class="card mb-5 hover-border-primary">
                        <span class="position-absolute e-3 t-4 z-index-1">
                          <i data-acorn-icon="chevron-bottom" class="text-primary" data-acorn-size="14"></i>
                        </span>
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                          <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                            <i data-acorn-icon="laboratory" class="text-primary"></i>
                          </div>
                          <div class="text-center mb-0 sh-8 d-flex align-items-center lh-1-5">
                            {{Lang::get('AgencyDashboard.MontlyTotal')}}
                          </div>
                          <div class="display-6 text-primary">{{$MonthlyCost}}</div>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Stats End -->

          <div class="row">
            <!-- Appointments Start -->
            <div class="col-xl-6 mb-5">
              <div class="d-flex justify-content-between">
                <h2 class="small-title">{{Lang::get('AgencyDashboard.Appointments')}}</h2>
                <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
                  <a href="/panel/Appointments/New"><span class="align-bottom">{{Lang::get('AgencyDashboard.AddNew')}}</span></a>
                  <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
                </button>
              </div>
              <div class="card h-xl-100-card">
                <div class="card-header border-0 pb-0 d-flex justify-content-center">
                  <div class="glide-tab-container">
                    <div class="glide glide-tab" id="appointmentsCarousel">
                      <div class="glide__track" data-glide-el="track">
                        <div class="glide__slides nav nav-pills" role="tablist">

<!--                           <div class="glide__slide active" data-bs-toggle="tab" data-bs-target="#dayOne" role="tab" aria-selected="true">
                            <button class="btn btn-foreground hover-outline px-1 py-3 rounded-xl sw-4" type="button">
                              <div class="text-alternate mb-2">Mo</div>
                              <div class="text-primary">18</div>
                            </button>
                          </div>
                          <div class="glide__slide" data-bs-toggle="tab" data-bs-target="#dayNone" role="tab" aria-selected="false">
                            <button class="btn btn-foreground hover-outline px-1 py-3 rounded-xl sw-4" type="button">
                              <div class="text-separator mb-2">Tu</div>
                              <div class="text-separator">19</div>
                            </button>
                          </div> -->
                        @if(!empty($Appointments))
                              @foreach($Appointments as $Appointment)
                                <div class="glide__slide " data-bs-toggle="tab" data-bs-target="#dayOne" role="tab" aria-selected="false">
                                  <button data-Id="{{$Appointment['Id']}}" class="AppointmentBtn btn btn-foreground hover-outline px-1 py-3 rounded-xl sw-4" type="button">
                                    <div class="text-alternate mb-2">{{date('D', strtotime($Appointment['AppointmentDate']))}}</div>
                                    <div class="text-primary">{{date('d', strtotime($Appointment['AppointmentDate']))}}</div>
                                  </button>
                                </div>
                              @endforeach
                        @endif
                        </div>
                      </div>
                      <div class="glide__arrows" data-glide-el="controls">
                        <button class="btn btn-icon btn-icon-only btn-link left-arrow btn-sm mt-3" data-glide-dir="<">
                          <i data-acorn-icon="chevron-left"></i>
                        </button>
                        <button class="btn btn-icon btn-icon-only btn-link right-arrow btn-sm mt-3" data-glide-dir=">">
                          <i data-acorn-icon="chevron-right"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-3">
                  <div class="tab-content">

                    <div class="tab-pane fade  show mb-n3" id="dayOne" role="tabpanel"><!-- active -->
                      <div class="mb-4 text-primary text-center" id="AppointmentDate">Date</div>

                      <div class="row g-0 mb-3">
                        <div class="col-auto">
                          <div class="sw-5 d-inline-block d-flex align-items-center pt-1">
                            <i data-acorn-icon="surgery" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                            <div class="d-flex flex-column ClientInfo">
                              <div class="text-body FullName">FullName</div>
                              <div class="text-muted Cell">Cell</div>
                              <div class="text-muted Mail">Mail</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row g-0 mb-3">
                        <div class="col-auto">
                          <div class="sw-5 d-inline-block d-flex align-items-center pt-1">
                            <i data-acorn-icon="lungs" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                            <div class="d-flex flex-column TreatmentInfo" id="">
                              <div class="text-body Title" >Title</div>
                              <div class="text-muted Province" >Province</div>
                              <div class="text-muted City">City</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row g-0 mb-3">
                        <div class="col-auto">
                          <div class="sw-5 d-inline-block d-flex align-items-center pt-1">
                            <i data-acorn-icon="stomach" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                            <div class="d-flex flex-column PaymentInfo">
                              <div class="text-body Cost">Cost</div>
                              <div class="text-muted PaymentDate">PaymentDate</div>
                              <div class="text-muted PaymentStatus">PaymentStatus</div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="tab-pane active show fade" id="dayNone" role="tabpanel">
                      <div class="mb-4 text-primary text-center">{{date('Y-m-d')}} {{date('D')}}</div>
                      <div class="text-center">
                        <img src="{{URL::asset('assets/img/illustration/icon-appointment.webp')}}" class="theme-filter" alt="launch" />
                        <p>{{Lang::get('AgencyDashboard.ClickTheAppointmentToSee')}}</p>
                        <a href="/panel/Appointments/New"><button class="btn btn-icon btn-icon-start btn-primary" type="button">
                          <i data-acorn-icon="calendar"></i>
                          <span>{{Lang::get('AgencyDashboard.NewAppointment')}}</span>
                        </button></a>
                      </div>
                    </div>


                    @if(empty($Appointments))
                    <div class="tab-pane active show fade" id="dayNone" role="tabpanel">
                      <div class="text-center">
                        <img src="{{URL::asset('assets/img/illustration/icon-appointment.webp')}}" class="theme-filter" alt="launch" />
                        <p>{{Lang::get('AgencyDashboard.NoAppointmentsForTheDay')}}</p>
                        <a href="/panel/Appointments/New"><button class="btn btn-icon btn-icon-start btn-primary" type="button">
                          <i data-acorn-icon="calendar"></i>
                          <span>{{Lang::get('AgencyDashboard.NewAppointment')}}</span>
                        </button></a>
                      </div>
                    </div>
                    @endif
<script type="text/javascript">
  $(document).ready(function(){
    $('.AppointmentBtn').on('click', function(){
      let Id = $(this).data('id');
      $.ajax({
        type: 'POST',
        url: '/ajax',
        cache: false,
        headers: {'X-CSRF-TOKEN':@json(csrf_token())},
        data: {
          action: 'GetAppointment',
          Id: Id,
        },
        success: function(data){
          if (data['outcome']==true) {
              data = data['data'];
              $('#AppointmentDate').html(data['AppointmentDate']);

              // $('.ClinicInfo .Title').html(data['Clinic']['Title']);
              // $('.ClinicInfo .Province').html(data['Clinic']['Province']);
              // $('.ClinicInfo .City').html(data['Clinic']['City']);

              $('.TreatmentInfo .Title').html(data['Treatment']['Title']);
              $('.TreatmentInfo .Province').html(data['Category']['Title']);
              $('.TreatmentInfo .City').html(data['Treatment']['EstimatedTime'] + ' days');

              $('.ClientInfo .FullName').html(data['Client']['FirstName']+' '+data['Client']['LastName']);
              $('.ClientInfo .Cell').html(data['Client']['Cell']);
              $('.ClientInfo .Mail').html(data['Client']['Mail']);

              $('.PaymentInfo .Cost').html(data['Cost']);
              $('.PaymentInfo .PaymentDate').html(`Ödeme Tarihi: ${data['PaymentDate']}`);
              var Status = (data['PaymentStatus']=='1')? 'Ödeme Yapıldı' : 'Ödeme yapılmadı';
              $('.PaymentInfo .PaymentStatus').html(Status);
          }
        }
      });
    });

  });
</script>

                  </div>
                </div>
              </div>
            </div>
            <!-- Appointments End -->

            <!-- Your Doctors Start -->
            <div class="col-xl-6 mb-5">
              <h2 class="small-title">{{Lang::get('AgencyDashboard.RecentClients')}}</h2>
              <div style="height: 45%;overflow-y:scroll;" class="card">
                <div class="card-body mb-n3 border-last-none">
              @php 
              $OnActive = 0;
              @endphp
              @if(!empty($Appointments))
                @foreach($Appointments as $Appointment)
                @if(date('Y-m-d', strtotime($Appointment['AppointmentDate'])) >= date('Y-m-d') && date('Y-m-d', strtotime($Appointment['AppointmentDate'])) <= date('Y-m-d', strtotime('+5 days')) && $Appointment['Status']=='1')
                @php $OnActive++; @endphp
                  <div class="mb-3 pb-3 border-bottom border-separator-light">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <a href="#">
                          <!-- <img src="{{$Appointment['uid']}}" class="card-img rounded-xl sh-6 sw-6" alt="thumb" /> -->
                        </a>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <a href="#" class="body-link">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}</a>
                            <div class="text-small text-muted">{{date('Y-m-d', strtotime($Appointment['AppointmentDate']))}}</div>
                          </div>
<!--                           <div class="d-flex">
                            <a href="/panel/Clinics/{{$Appointment['uid']}}"><button class="btn btn-outline-secondary btn-sm ms-1" type="button">Detail</button></a>
                            <button class="btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1" type="button">
                              <i data-acorn-icon="more-vertical"></i>
                            </button>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                @endforeach
              @endif
              @if($OnActive==0)
                  <div class="mb-3 pb-3 border-bottom border-separator-light">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <a href="#">
                        </a>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <a href="#" class="body-link">{{Lang::get('AgencyDashboard.NotFound')}}</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              @endif
                </div>
              </div>

              <br>
              <h2 class="small-title">{{Lang::get('AgencyDashboard.OnholdClients')}}</h2>
              <div style="height: 45%;overflow-y:scroll;" class="card">
                <div class="card-body mb-n3 border-last-none">
              @php 
              $OnHold = 0;
              @endphp
              @if(!empty($Appointments))
                @foreach($Appointments as $Appointment)
                @if(date('Y-m-d', strtotime($Appointment['AppointmentDate'])) >= date('Y-m-d') && date('Y-m-d', strtotime($Appointment['AppointmentDate'])) <= date('Y-m-d', strtotime('+5 days')) && $Appointment['Status']=='2')
                @php $OnActive++; @endphp
                  <div class="mb-3 pb-3 border-bottom border-separator-light">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <a href="#">
                          <!-- <img src="{{$Appointment['uid']}}" class="card-img rounded-xl sh-6 sw-6" alt="thumb" /> -->
                        </a>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <a href="Doctors.Detail.html" class="body-link">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}</a>
                            <div class="text-small text-muted">{{date('Y-m-d', strtotime($Appointment['AppointmentDate']))}}</div>
                          </div>
                          <div class="d-flex">
                            <a href="/panel/Clinics/{{$Appointment['uid']}}"><button class="btn btn-outline-secondary btn-sm ms-1" type="button">Detail</button></a>
                            <button class="btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1" type="button">
                              <i data-acorn-icon="more-vertical"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                @endforeach
            @endif
            @if($OnHold==0)
                  <div class="mb-3 pb-3 border-bottom border-separator-light">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <a href="#">
                        </a>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <a href="#" class="body-link">{{Lang::get('AgencyDashboard.NotFound')}}</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              @endif
                </div>
              </div>

            </div>
            <!-- Your Doctors End -->


          </div>
        </div>
      </div>

      <div class="row" style="height: 250px;">

        <!-- Results Start -->
<!--         <div class="col-6 mb-5">
          <h2 class="small-title">{{Lang::get('AgencyDashboard.Announcement')}}</h2>
              <div class="card mb-2 sh-11 sh-md-8">
                <div class="card-body pt-0 pb-0 h-100">
                  <div class="row g-0 h-100 align-content-center">
                    <div class="col-11 col-md-7 d-flex align-items-center mb-1 mb-md-0 order-1 order-md-1">
                      <a href="#" class="body-link text-truncate">
                        <i data-acorn-icon="file-text" class="sw-2 me-2 text-alternate" data-acorn-size="17"></i>
                        <span class="align-middle">Announcement Title</span>
                      </a>
                    </div>
                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-center text-muted order-3 order-md-2">12.11.2021</div>
                    <div class="col-1 col-md-2 d-flex align-items-center text-muted text-medium justify-content-end order-2 order-md-3">
                      <button class="btn btn-icon btn-icon-only btn-link btn-sm p-1" type="button">
                        <i data-acorn-icon="arrow-bottom"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card mb-2 sh-11 sh-md-8">
                <div class="card-body pt-0 pb-0 h-100">
                  <div class="row g-0 h-100 align-content-center">
                    <div class="col-11 col-md-7 d-flex align-items-center mb-1 mb-md-0 order-1 order-md-1">
                      <a href="#" class="body-link text-truncate">
                        <i data-acorn-icon="file-text" class="sw-2 me-2 text-alternate" data-acorn-size="17"></i>
                        <span class="align-middle">Announcement Title</span>
                      </a>
                    </div>
                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-center text-muted order-3 order-md-2">12.11.2021</div>
                    <div class="col-1 col-md-2 d-flex align-items-center text-muted text-medium justify-content-end order-2 order-md-3">
                      <button class="btn btn-icon btn-icon-only btn-link btn-sm p-1" type="button">
                        <i data-acorn-icon="arrow-bottom"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
        </div> -->
        <!-- Results End -->

        <!-- Check Up Start -->
        <div class="col-xl-6 mb-5">
          @if(!empty($Campain))
                    <h2 class="small-title">{{$Campain->Title}}</h2>
                    <div class="card w-100 sh-100 h-xl-100-card hover-img-scale-up position-relative">
                      <img src="{{$Campain->Img}}" class="card-img h-100 scale position-absolute" alt="card image" />
                      <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                        <div>
                          <div class="cta-2 mb-0 text-black w-75 w-sm-50">{{$Campain->Slogan}}</div>
                          <div class="cta-2 mb-3 text-black w-75 w-sm-50">{{$Campain->Discount}} Off</div>
                          <div class="w-50 text-black mb-3">
                            {{$Campain->Text}}
                          </div>
                        </div>
                        <!-- <div>
                          <a href="#" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                            <i data-acorn-icon="chevron-right"></i>
                            <span>View</span>
                          </a>
                        </div> -->
                      </div>
                    </div>
          @endif
        </div>
        <!-- Check Up End -->
      </div>
    </div>
  </main>
@endsection

@section('script')   
  <!-- Page Specific Scripts Start -->
  <script src="{{URL::asset('assets/js/vendor/glide.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/cs/glide.custom.js')}}"></script>
  <script src="{{URL::asset('assets/js/pages/dashboards.patient.js')}}"></script>


  <script src="{{URL::asset('assets/js/vendor/fullcalendar/main.min.js')}}"></script>
  <!-- Page Specific Scripts End -->
@endsection


