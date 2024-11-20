@extends('panel.App')
  @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Dashboard</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="../main/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            </div>
            <div class="d-flex align-items-center justify-content-between gap-6">
             <!--  <select class="form-select border fs-3" aria-label="Default select example">
                <option selected>November 2024</option>
                <option value="1">February 2024</option>
                <option value="2">March 2024</option>
                <option value="3">April 2024</option>
              </select> -->
              <a href="/panel/appointments/new" class="btn btn-success d-flex align-items-center gap-1 fs-3 py-2 px-9">
                <i class="ti ti-plus fs-4"></i>
                Create
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-7">

              <div class="card uncover-exciting-enhancements">
                <div class="card-body position-relative z-1 row p-7 py-5">
                  <div class="col-xl-7 col-xxl-6">
                    <p class="mb-6 text-uppercase fs-3 fw-medium text-muted">Uncover Exciting
                      Enhancements</p>
                    <h2 class="mb-6 lh-sm pb-1">Better user experience.
                    </h2>
                    <h6 class="fw-normal">Find additional information in our most recent blog entry.
                    </h6>
                    <div class="hstack gap-9 mt-7 mb-5 pb-1">
                      <div class="hstack gap-2">
                        <div class="round-36 bg-white rounded-circle hstack justify-content-center">
                          <i class="ti ti-user fs-5 text-success"></i>
                        </div>
                        <div>
                          <p class="mb-0 fs-2">Team</p>
                          <h6 class="mb-0 fs-2">Up to 240</h6>
                        </div>
                      </div>
                      <div class="hstack gap-2">
                        <div class="round-36 bg-white rounded-circle hstack justify-content-center">
                          <i class="ti ti-circles-relation fs-5 text-primary"></i>
                        </div>
                        <div>
                          <p class="mb-0 fs-2">Progress</p>
                          <h6 class="mb-0 fs-2">Almost 85%</h6>
                        </div>
                      </div>
                    </div>
                    <!-- <a href="javascript:void(0)" class="btn btn-primary fs-3 py-2 fs-3 py-2">Discover updates</a> -->
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="hstack justify-content-between py-3">
                        <h5 class="mb-0 fw-medium">Toplam
                          <br /> Hasta
                        </h5>
                        <div class="hstack gap-9">
                          <i class="ti ti-heart text-warning fs-13 flex-shrink-0"></i>
                          <h2 class="mb-0 fw-medium fs-10 hstack align-items-start">28 
                          </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="hstack justify-content-between py-3">
                        <h5 class="mb-0 fw-medium">Tamamlanan
                          <br /> İşlem
                        </h5>
                        <div class="hstack gap-9">
                          <i class="ti ti-heart text-success fs-13 flex-shrink-0"></i>
                          <h2 class="mb-0 fw-medium fs-10 hstack align-items-start">75</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="row">
                <div class="col-md-6">
                  <div class="card text-bg-success">
                    <div class="card-body">
                      <h5 class="text-white fw-normal">{{Lang::get('AdminDashboard.Weekly')}}</h5>
                    </div>
                    <div id="total-profit"></div>
                    <div class="card-body">
                      <? 
                        $weektotal = 0;
                        foreach($WeeklyAppointments as $Appitem){
                            if ($Appitem['PaymentStatus']=='1') {
                                $weektotal += $Appitem['Cost'];
                            }
                        } 
                      ?>
                      <h5 class="fs-6 text-white mb-1">{{$weektotal}}$</h5>
                      <h6 class="text-white fw-medium mb-0">Kar</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card text-bg-primary">
                    <div class="card-body">
                      <h5 class="text-white fw-normal">Aylık</h5>
                    </div>
                    <div id="total-profit2"></div>
                    <div class="card-body">
                      <h5 class="fs-6 text-white mb-1">24000₺</h5>
                      <h6 class="text-white fw-medium mb-0">Ciro</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card coverage-bg">
                    <div class="card-body pb-3">
                      <h5 class="text-white fw-normal">Randevu</h5>
                    </div>
                    <div id="coverage"></div>
                    <div class="card-body pt-2">
                      <h5 class="fs-6 text-white mb-1">23</h5>
                      <h6 class="text-white fw-medium mb-0">Yeni Randevu</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card text-bg-secondary">
                    <div class="card-body">
                      <h5 class="text-white fw-normal">Bekleyen</h5>
                    </div>
                    <div id="pending-tasks"></div>
                    <div class="card-body">
                      <h5 class="fs-6 text-white mb-1">25</h5>
                      <h6 class="text-white fw-medium mb-0">Bekleyen Randevu</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-8">
              <div class="card w-100 overflow-hidden">
                <div class="card-body pb-8">
                  <div class="d-md-flex no-block align-items-center">
                    <h4 class="card-title mb-0">Bu ayın randevuları</h4>
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
                          Hasta
                        </th>
                        <th class="border-bottom fs-3">
                          Tedavi
                        </th>
                        <th class="border-bottom fs-3 pe-4">
                          Ücret
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

            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-7">
                    <h4 class="card-title mb-0">Görevler</h4>
                    <!-- <div class="ms-auto">
                      <button class="btn btn-rounded btn-success hstack gap-1" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="ti ti-plus fs-6"></i>
                        Add Task
                      </button>
                    </div> -->
                  </div>
                  <!-- .modal for add task -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                       <!--  <div class="modal-header d-flex align-items-center">
                          <h4 class="modal-title">Add Task</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> -->
                        <div class="modal-body">
                          <form>
                            <div class="mb-3">
                              <label class="form-label">Name</label>
                              <input type="text" class="form-control" placeholder="Enter Your Name" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Email address</label>
                              <input type="email" class="form-control" placeholder="Enter email" />
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-danger-subtle text-danger" data-bs-dismiss="modal">
                            Close
                          </button>
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            Submit
                          </button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  <!-- ============================================================== -->
                  <!-- To do list widgets -->
                  <!-- ============================================================== -->
                  <div class="to-do-widget mt-3 h-460" data-simplebar>
                    <ul class="list-task todo-list mb-0" data-role="tasklist">
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-2 border-info ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputSchedule" name="inputCheckboxesSchedule" />
                          <label for="inputSchedule" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-medium">Hasta ile iletişime geç</h5>
                          </label>
                        </div>
                        
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-2 border-danger ps-9 d-flex">
                          <input type="checkbox" class="form-check-input ms-0" id="inputCall" name="inputCheckboxesCall" />
                          <label for="inputCall" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-medium opacity-50 text-decoration-line-through">
                                Hastayı ara
                            </h5>
                            <span class="badge bg-danger-subtle text-danger rounded-pill">Today</span>
                          </label>
                        </div>
                        <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1 opacity-50">
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-8.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Priyanka" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="assets/panel/images/profile/user-7.jpg" alt="user" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Selina" />
                          </li>
                        </ul>
                      </li>




                    </ul>
                  </div>
                </div>
              </div>
            </div>





          </div>
        </div>
      </div>

@endsection

@section('script')
    <script src="<?= asset('assets/panel/libs/apexcharts/dist/apexcharts.min.js') ?>"></script>
    <script src="<?= asset('assets/panel/js/dashboards/dashboard3.js') ?>"></script>

@endsection