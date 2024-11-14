@extends('panel.app')


@section('content')
  <main>
    <div class="container">
      <!-- Title and Top Buttons Start -->
      <div class="page-title-container">
        <div class="row col-12">
          <!-- Title Start -->
          <div class="col-auto mb-3 mb-md-0 me-auto">
            <div class="w-auto sw-md-30">
              <a href="/panel" class="muted-link pb-1 d-inline-block breadcrumb-back">
                <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                <span class="text-small align-middle">Panel</span>
              </a>
              <h1 class="mb-0 pb-0 display-4" id="title">{{Lang::get('Appointments.Appointments')}}</h1>
            </div>
          </div>
          <!-- Title End -->


          @if(User('Type') == '0')
          <div class="{{ (isMobile())? 'container ' :  'row col-6'}}">
            <!-- Top Buttons Start -->
            <div class="row col-auto">
              <div class="d-flex align-items-end justify-content-end">
                <a class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto" data-toggle="modal" data-target="#exampleModal" >
                  <i data-acorn-icon="maximize"></i>
                  <span>{{Lang::get('Appointments.QrCode')}}</span>
                </a>
              </div>
            </div>
            <div class="row col-auto">
              <div class="d-flex align-items-end justify-content-end">
                  <a href="/panel/Appointments/New" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                    <i data-acorn-icon="calendar"></i>
                    <span>{{Lang::get('Appointments.NewAppointment')}}</span>
                  </a>
                </div>
              </div>
            <!-- Top Buttons End -->
          </div>
          @endif
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      @if(User('Type')=='0')

      <!-- appointments modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body"  style="background-color: #fff">
              <i class="mb-1 mt-1 ms-auto" onclick="Swal.fire('','@Lang('Appointments.QrInfo')','info');" style="background-color: white;" data-acorn-icon="question-hexagon" aria-hidden="true"></i>
              <?php $QrCode = new QrCode(); ?>
              <img src="{{ $QrCode->Create('https://wa.me/905379797206?text=Merhaba,+'.User('Parent')['Id'].'+kodlu+bayinizden+online+danismanlık+icin+ulasiyorum', 350) }}">
            </div>
          </div>
        </div>
      </div>
      <!-- appointments modal  end-->


      @endif




       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


      <!-- Active Appointments Start -->
      <h2 class="small-title">{{Lang::get('Appointments.ActiveAppointments')}}</h2>
      <div class="row g-2 mb-5">
      @if(!empty($Appointments))

      @foreach($Appointments as $Appointment)
        <div class="col-xl-6">
          <div class="card">
            <div class="card-body row col-12">

              <div class="text-primary mb-0 mt-1"><a href="/panel/Appointments/{{$Appointment['uid']}}">{{$Appointment['uid']}}</a></div>
              <div class="row {{(!isMobile())? 'g-3' : 'g-1'}} col-6">
                <div class="col-auto">
                  <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                    <i data-acorn-icon="health" class="text-primary"></i>
                  </div>
                </div>
                <div class="col">
                  <div class="{{(!isMobile())? 'card-body' : ''}} d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                    <div class="d-flex flex-column">
                      <div class="text-primary mb-0 mt-1">{{Date('Y-m-d', strtotime($Appointment['AppointmentDate']))}}</div>
                      <div class="text-alternate mb-2">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}</div>
                      <div class="text-muted">{{@$Appointment['Clinic']['Title'] ?? ''}}</div>
                      <div class="text-muted">{{@$Appointment['Category']['Title']}}</div>
                      <div class="text-muted">{{@$Appointment['Treatment']['Title']}}</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row g-3 {{(!isMobile())? 'col-6' : ''}}">
                  <div class="col">
                    <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-primary mb-0 mt-1">{{@$Appointment['Agency']['Title']}}</div>
                        <div class="text-muted">{{@$Appointment['Agency']['Tell']}}</div>
                        <div class="text-muted">{{@$Appointment['Agency']['Country']}}</div>
                      </div>
                    </div>
                  </div>
              </div>


            </div>
          </div>
        </div>
      @endforeach
      @else 
          <div class="col-xl-12">
          <div class="card">
            <div class="card-body row col-12">

              <div class="row g-3 col-12">
                <div class="col-auto">
                  <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                    <i data-acorn-icon="health" class="text-primary"></i>
                  </div>
                </div>
                <div class="col">
                  <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                    <div class="d-flex flex-column">
                      <div class="text-primary mb-0 mt-1">{{Lang::get('Appointments.NoAppointmentFound')}}</div>
                      <div class="text-alternate mb-2"></div>
                      <div class="text-muted"></div>
                      <div class="text-muted"></div>
                      <div class="text-muted"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row g-3 col-6">
                  <div class="col">
                    <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-primary mb-0 mt-1"></div>
                        <div class="text-muted"></div>
                        <div class="text-muted"></div>
                      </div>
                    </div>
                  </div>
              </div>
              @endif


      </div>
      <!-- Active Appointments End -->

      <!-- Quick Links Start -->
      <div class="mb-5">
        <h2 class="small-title">{{Lang::get('Base.QuickLinks')}}</h2>
        <div class="row g-2 row-cols-1 row-cols-xl-3">
            <div class="col">
              <div class="card h-100">
                <div class="card-body">
                  <div class="text-center">
                    <img src="{{URL::asset('assets/img/illustration/icon-appointment.webp')}}" class="theme-filter" alt="launch" />
                    <div class="d-flex flex-column sh-5">
                      <a href="/panel/Appointments" class="heading stretched-link">{{Lang::get('Base.ManageAppointments')}}</a>
                    </div>
                  </div>
                  <div class="text-muted text-center">@Lang('Base.QLAppointment')</div>
                </div>
              </div>
            </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-body">
                <div class="text-center">
                  <img src="{{URL::asset('assets/img/illustration/icon-support.webp')}}" class="theme-filter" alt="performance" />
                  <div class="d-flex flex-column sh-5">
                    <a href="/panel/Consult" class="heading stretched-link">{{Lang::get('Base.OnlineConsultation')}}</a>
                  </div>
                </div>
                <div class="text-muted text-center">
                  @Lang('Base.QLConsult')
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-body">
                <div class="text-center">
                  <img src="{{URL::asset('assets/img/illustration/icon-review.webp')}}" class="theme-filter" alt="configure" />
                  <div class="d-flex flex-column sh-5">
                    <a href="#" class="heading stretched-link">{{Lang::get('Base.CheckTheGuidebook')}}</a>
                  </div>
                </div>
                <div class="text-muted text-center">
                  @Lang('Base.QLGuidebook')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Quick Links End -->
    </div>
  </main>
@endsection


