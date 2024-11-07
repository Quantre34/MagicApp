@extends('panel.app')
@section('style')
    <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/fullcalendar.min.css')}}" />
@endsection

@section('content')
  <main>
    <div class="container">
      <!-- Title and Top Buttons Start -->
      <div class="page-title-container">
        <div class="row">
          <!-- Title Start -->
          <div class="col-12 col-md-7">
            <span class="align-middle text-muted d-inline-block lh-1 pb-2 pt-2 text-small">{{Lang::get('AdminDashboard.Panel')}}</span>
            <h1 class="mb-0 pb-0 display-4" id="title">{{Lang::get('AdminDashboard.Hello')}}, {{User('FirstName')}}</h1>
          </div>
          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row">
        <!-- Patients Start -->
        <div class="col-xl-6 mb-5">
          <div class="d-flex">
            <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
              <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                <span class="small-title"></span>
              </a>
              <div class="dropdown-menu font-standard">
                <div class="nav flex-column" role="tablist">
<!--                   <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Today's</a>
                  <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Tomorrow's</a>
 -->                  <a class="active dropdown-item text-medium" href="#" aria-selected="false" role="tab">{{Lang::get('AdminDashboard.Weekly')}}</a>
                </div>
              </div>
            </div>
            <h2 class="small-title">{{Lang::get('AdminDashboard.Clients')}}</h2>
          </div>
<?php $i = 0; ?>
@foreach($Appointments as $key => $Appointment)
  @if(date('Y-m-d', strtotime($Appointment['AppointmentDate'])) >= date('Y-m-d') && date('Y-m-d', strtotime($Appointment['AppointmentDate'])) <= date('Y-m-d', strtotime('+5 days')) )
  @endif
    <div class="card mb-2">
      <div class="card-body py-3">
        <label class="form-check custom-icon mb-0 checked-line-through checked-opacity-75 mt-2">
          <input type="checkbox" class="form-check-input" <?= (date('Y-m-d H:i', strtotime($Appointment['AppointmentDate'])) < date('Y-m-d H:i'))? 'checked': '' ?> />
          <span class="form-check-label">
            <span class="content">
              <span class="mb-1 lh-1-25">{{$Appointment['Client']['FirstName']. $Appointment['Client']['LastName']}}</span>
              <span class="d-block text-small text-primary">{{date('Y-m-d',strtotime($Appointment['AppointmentDate']))}}</span>
            </span>
          </span>
        </label>
      </div>
    </div>
    <?php $i++; ?>
@endforeach
@if($i==0)
  <div class="card mb-2">
    <div class="card-body py-3">
      <label class="form-check custom-icon mb-0 checked-line-through checked-opacity-75 mt-2">
        <input type="checkbox" class="form-check-input"  />
        <span class="form-check-label">
          <span class="content">
            <span class="mb-1 lh-1-25">{{Lang::get('AdminDashboard.NoAppointments')}}</span>
            <span class="d-block text-small text-primary"></span>
          </span>
        </span>
      </label>
    </div>
  </div>
@endif

        </div>
        <!-- Patients End -->

        <!-- Schedule Calendar Start -->
        <div class="col-xl-6 mb-5">
          <h2 class="small-title">{{Lang::get('AdminDashboard.Schedule')}}</h2>
          <div class="card h-auto h-xl-100-card">
            <div class="card-body sh-xl-50">
              <div id="calendar" class="compact h-100"></div>
            </div>
          </div>
        </div>
        <!-- Schedule Calendar End -->
<script type="text/javascript">
function DateClicked(data){
  console.log(data);
  $.ajax({
    type: 'POST',
    url: '/ajax',
    cache: false,
    headers: {'X-CSRF-TOKEN': @json(csrf_token())},
    data: {
      action : 'GetAppointments',
      Parameter : {AppointmentDate: data.dateStr} 
    },
    success: function(result){
      $('#modal-title').html(data.dateStr);
      console.log(result);
      data = result['data'];
      $('#ModalContainer').empty();
      for (i in data){
        $('#ModalContainer').append(`<div class="border-bottom border-separator-light pb-3 mb-3"><a href="/panel/Appointments/${data[i]['uid']}"><div class="text-primary">${data[i]['Client']['FirstName']} ${data[i]['Client']['LastName']}</div></a><div class="mb-2">${data[i]['Category']['Title']}</div><div class="text-muted">${data[i]['Treatment']['Title']}</div></div>`);
      }
    }
  });
}

function GetAppointments(parameter=false){
  if (parameter) {
      $.ajax({
        type: 'POST',
        url: '/ajax',
        cache: false,
        headers: {'X-CSRF-TOKEN': @json(csrf_token())},
        data: {
          action: 'GetAppointments',
          Parameter: parameter
        },
        success: function(data){
          if (data['outcome']) {
              for (i in data['data']){
                    calendar.addEvent({
                      title: data['data'][i]['Client']['FirstName'] +' '+ data['data'][i]['Client']['LastName'],
                      start: data['data'][i]['AppointmentDate'],
                      end: data['data'][i]['AppointmentDate']
                    });
              }
          }
        }
      });
  }else {
      $.ajax({
        type: 'POST',
        url: '/ajax',
        cache: false,
        headers: {'X-CSRF-TOKEN': @json(csrf_token())},
        data: {
          action: 'GetAppointments',
          Parameter: 'All'
        },
        success: function(data){
          if (data['outcome']) {
              for (i in data['data']){
                    window.calendar.addEvent({
                      title: data['data'][i]['Client']['FirstName'] +' '+ data['data'][i]['Client']['LastName'],
                      start: data['data'][i]['AppointmentDate'],
                      end: data['data'][i]['AppointmentDate']
                    });
              }
          }
        }
      });
  }
}

$(document).ready(function(){
  GetAppointments();
});


</script>
        <!-- Schedule Modal Start -->
        <div class="modal modal-right fade" id="scheduleModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 id="modal-title" class="modal-title">19 December 2021</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div id="ModalContainer" class="modal-body border-last-none">



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Schedule Modal End -->
      </div>

      <!-- Departments Start -->
      <div class="d-flex justify-content-between">
        <h2 class="small-title">{{Lang::get('AdminDashboard.Categories')}}</h2>
        <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
          <span class="align-bottom">{{Lang::get('AdminDashboard.AddCategories')}}</span>
          <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
        </button>
      </div>
      <div class="row g-2 mb-5">

      @foreach($Categories as $Category)
        <div class="col-6 col-md-4 col-xl-2 sh-23">
          <div class="card h-100 hover-scale-up">
            <a class="card-body text-center d-flex flex-column align-items-center" href="#">
              <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                <i data-acorn-icon="brain" class="text-primary"></i>
              </div>
              <p class="heading mt-3 text-body">{{$Category['Title']}}</p>
              <div class="text-extra-small fw-medium text-muted">@Lang('AdminDashboard.Treatments'): {{count($Category['Treatments'] ?? [])}}</div>
            </a>
          </div>
        </div>
      @endforeach

      </div>
      <!-- Departments End -->

      <!-- Charts Start -->
      <div class="row">
        <div class="col-xl-6 mb-5">
          <h2 class="small-title">{{Lang::get('AdminDashboard.AppointmentsByAgencies')}}</h2>
          <div class="card">
            <div class="card-body">
              <div class="sh-35">
                <canvas id="ageChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-5">
          <h2 class="small-title">{{Lang::get('AdminDashboard.AppointmentsByStatus')}}</h2>
          <div class="card">
            <div class="card-body">
              <div class="sh-35">
                <canvas id="genderChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Charts End -->

      <!-- Quick Links Start -->
      <h2 class="small-title">{{Lang::get('AdminDashboard.QuickLinks')}}</h2>
      <div class="row g-2 h-lg-100-card mb-5">
        <div class="col-12 col-lg-6 col-xl-3 h-100">
          <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <div class="cta-4 mb-3">{{Lang::get('AdminDashboard.LabResults')}}</div>
                <div class="text-muted mb-4 clamp-line" data-line="3">
                  Tootsie roll sweet roll pudding. Pastry liquorice wafer sweet. Chocolate bar jelly sugar plum cake sesame snaps gummies lollipop.
                </div>
              </div>
              <a href="#" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link sw-12">
                <i data-acorn-icon="form-check"></i>
                <span>View</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 h-100">
          <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <div class="cta-4 mb-3">{{Lang::get('AdminDashboard.ImagingResults')}}</div>
                <div class="text-muted mb-4 clamp-line" data-line="3">
                  Candy canes jelly beans donut gummies gummi biscuit chocolate bar powder bears halvah pie bear claw wafer cupcake oat cake marzipan.
                </div>
              </div>
              <a href="#" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link sw-12">
                <i data-acorn-icon="file-image"></i>
                <span>View</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 h-100">
          <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <div class="cta-4 mb-3">{{Lang::get('AdminDashboard.Prescriptions')}}</div>
                <div class="text-muted mb-4 clamp-line" data-line="3">
                  Tootsie roll sweet roll pudding. Pastry liquorice wafer sweet. Chocolate bar jelly sugar plum cake sesame snaps gummies lollipop.
                </div>
              </div>
              <a href="#" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link sw-12">
                <i data-acorn-icon="health"></i>
                <span>View</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 h-100">
          <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <div class="cta-4 mb-3">{{Lang::get('AdminDashboard.Guides')}}</div>
                <div class="text-muted mb-4 clamp-line" data-line="3">
                  Candy canes jelly beans donut gummies gummi biscuit ice cream chocolate bar powder bears halvah sweet roll muffin oat cake marzipan.
                </div>
              </div>
              <a href="#" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link sw-12">
                <i data-acorn-icon="notebook-1"></i>
                <span>View</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- Quick Links End -->
    </div>
  </main>
@endsection

@section('script')
    <!-- Vendor Scripts Start -->
    <script src="{{URL::asset('assets/js/vendor/Chart.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/chartjs-plugin-rounded-bar.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/chartjs-plugin-crosshair.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/fullcalendar/main.min.js')}}"></script>
    <!-- Vendor Scripts End -->

    <!-- Page Specific Scripts Start -->
    <script src="{{URL::asset('assets/js/cs/charts.extend.js')}}"></script>
    <script src="{{URL::asset('assets/js/pages/dashboards.doctor.js')}}"></script>
    <!-- Page Specific Scripts End -->
        <script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){
        @foreach($Agencies as $Agency)
          @if($Agency['Status']=='1')
            addData(window.SalesChart, "{{$Agency['Title']}}", parseInt({{count($Agency['Appointments'])}}) );
          @endif
        @endforeach
      }, 500);

      <?php 
      $i = 0;
      $o = 0;
      foreach($Agencies as $Agency){
        foreach($Agency['Appointments'] as $Appointment){
          if ($Appointment['Status']=='1') {
              $i = $i+1;
          }elseif($Appointment['Status']=='2'){
            $o = $o+1;
          }
        }
      }

      ?>
      });
    setTimeout(function(){
    addData(window.StatusChart, "{{Lang::get('AdminDashboard.Active')}}", {{$i}} );
    addData(window.StatusChart, "{{Lang::get('AdminDashboard.OnHold')}}", {{$o}} );
    }, 500);
    </script>
@endsection