@extends('panel.App')

  @section('style')
      <link rel="stylesheet" href="{{asset('assets/panel/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
      <style type="text/css">
        .table>tbody {
            vertical-align: revert-layer;
        }
        .table tbody tr td {
            padding: 5px 0px;
            padding-left: 1%;
        }
        .card button {
          padding: 2px 10px !important;
        }
        .btn {
          padding: 2px 10px !important;
        }
        .hide {
          display: none;
        }
      </style>
  @endsection

  @section('content')

      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Randevular</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="../main/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Randevular</li>
                </ol>
              </nav>
            </div>

          </div>
          <div class="card overflow-hidden chat-application">
            <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
              <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                <i class="ti ti-menu-2 fs-5"></i>
              </button>
              <form class="position-relative w-100">
                <input type="text" class="form-control search-chat py-2 ps-5" id="searchAppointment" placeholder="Search">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
            <div class="d-flex w-100">
              <div class="left-part border-end w-20 flex-shrink-0 d-none d-lg-block">
                <!-- <div class="px-9 pt-4 pb-3">
                  <button class="btn btn-primary fw-semibold py-8 w-100">Add New Contact</button>
                </div> -->
                <ul class="list-group mh-n100" data-simplebar>
                  <li class="list-group-item border-0 p-0 mx-9 ItemPointer" data-id="1">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-inbox fs-5"></i>Hepsi
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9 ItemPointer" data-id="2">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-star"></i>Onaylanan
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9 ItemPointer" data-id="3">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-file-text fs-5"></i>Bekleyen
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9 ItemPointer" data-id="4">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-alert-circle"></i>Tamamlanan
                    </a>
                  </li>

                  <li class="border-bottom my-3"></li>
                  <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">Diğer seçenekler</li>

                  <li class="list-group-item border-0 p-0 mx-9 ItemPointer" data-id="5">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-bookmark fs-5 text-primary"></i>Ödeme Yapılmadı
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9 ItemPointer" data-id="6">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-bookmark fs-5 text-warning"></i>Ödeme Alındı
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9 ItemPointer" data-id="7">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-bookmark fs-5 text-success"></i>İade Edildi
                    </a>
                  </li>
                </ul>
              </div>
              <div class="d-flex w-100">
                <div class="min-width-340">
                  <div class="border-end user-chat-box h-100">
                    <div class="px-4 pt-9 pb-6 d-none d-lg-block">
                      <form class="position-relative">
                        <input type="text" class="form-control search-chat py-2 ps-5" id="searchAppointment" placeholder="Search" />
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                      </form>
                    </div>
                    <div class="app-chat">

                      <ul class="chat-users mh-n100 ItemList" data-id="1" data-simplebar>
                        @foreach($Appointments as $Appointment)
                        <li class="Item" data-id="{{$Appointment['uid']}}" data-client="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">
                          <a class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user bg-light-subtle Appointment" data-app-id="{{$Appointment['uid']}}">
                            <span class="position-relative">
                              <img src="{{$Appointment['Treatment']['Img']}}" alt="user-{{$Appointment['Id']}}" width="40" height="40" class="rounded-circle">
                            </span>
                            <div class="ms-6 d-inline-block w-75">
                              <h6 class="mb-1 fw-semibold chat-title" data-username="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}
                              </h6>
                              <span class="fs-2 text-body-color d-block">{{$Appointment['Client']['Mail']}}</span>
                            </div>
                          </a>
                        </li>
                        @endforeach
                      </ul>


                      <ul class="chat-users mh-n100 hide ItemList" data-id="2" data-simplebar>
                        @foreach($Appointments as $Appointment)
                          @if($Appointment['Status']=='1')
                            <li class="Item" data-id="{{$Appointment['uid']}}" data-client="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">
                              <a class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user bg-light-subtle Appointment" data-app-id="{{$Appointment['uid']}}">
                                <span class="position-relative">
                                  <img src="{{$Appointment['Treatment']['Img']}}" alt="user-{{$Appointment['Id']}}" width="40" height="40" class="rounded-circle">
                                </span>
                                <div class="ms-6 d-inline-block w-75">
                                  <h6 class="mb-1 fw-semibold chat-title" data-username="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}
                                  </h6>
                                  <span class="fs-2 text-body-color d-block">{{$Appointment['Client']['Mail']}}</span>
                                </div>
                              </a>
                            </li>
                          @endif
                        @endforeach
                      </ul>

                      <ul class="chat-users mh-n100 hide ItemList" data-id="3" data-simplebar>
                       @foreach($Appointments as $Appointment)
                          @if($Appointment['Status']=='0')
                            <li class="Item" data-id="{{$Appointment['uid']}}" data-client="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">
                              <a class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user bg-light-subtle Appointment" data-app-id="{{$Appointment['uid']}}">
                                <span class="position-relative">
                                  <img src="{{$Appointment['Treatment']['Img']}}" alt="user-{{$Appointment['Id']}}" width="40" height="40" class="rounded-circle">
                                </span>
                                <div class="ms-6 d-inline-block w-75">
                                  <h6 class="mb-1 fw-semibold chat-title" data-username="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}
                                  </h6>
                                  <span class="fs-2 text-body-color d-block">{{$Appointment['Client']['Mail']}}</span>
                                </div>
                              </a>
                            </li>
                          @endif
                        @endforeach
                      </ul>

                      <ul class="chat-users mh-n100 hide ItemList" data-id="4" data-simplebar>
                        @foreach($Appointments as $Appointment)
                          @if($Appointment['Status']=='3')
                            <li class="Item" data-id="{{$Appointment['uid']}}" data-client="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">
                              <a class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user bg-light-subtle Appointment" data-app-id="{{$Appointment['uid']}}">
                                <span class="position-relative">
                                  <img src="{{$Appointment['Treatment']['Img']}}" alt="user-{{$Appointment['Id']}}" width="40" height="40" class="rounded-circle">
                                </span>
                                <div class="ms-6 d-inline-block w-75">
                                  <h6 class="mb-1 fw-semibold chat-title" data-username="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}
                                  </h6>
                                  <span class="fs-2 text-body-color d-block">{{$Appointment['Client']['Mail']}}</span>
                                </div>
                              </a>
                            </li>
                          @endif
                        @endforeach
                      </ul>

                      <ul class="chat-users mh-n100 hide ItemList" data-id="5" data-simplebar>
                        @foreach($Appointments as $Appointment)
                          @if($Appointment['Status']=='1')
                            @if($Appointment['PaymentStatus']=='0')
                              <li class="Item" data-id="{{$Appointment['uid']}}" data-client="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">
                                <a class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user bg-light-subtle Appointment" data-app-id="{{$Appointment['uid']}}">
                                  <span class="position-relative">
                                    <img src="{{$Appointment['Treatment']['Img']}}" alt="user-{{$Appointment['Id']}}" width="40" height="40" class="rounded-circle">
                                  </span>
                                  <div class="ms-6 d-inline-block w-75">
                                    <h6 class="mb-1 fw-semibold chat-title" data-username="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}
                                    </h6>
                                    <span class="fs-2 text-body-color d-block">{{$Appointment['Client']['Mail']}}</span>
                                  </div>
                                </a>
                              </li>
                            @endif
                          @endif
                        @endforeach
                      </ul>

                      <ul class="chat-users mh-n100 hide ItemList" data-id="6" data-simplebar>
                        @foreach($Appointments as $Appointment)
                          @if($Appointment['Status']=='1')
                            @if($Appointment['PaymentStatus']=='1')
                              <li class="Item" data-id="{{$Appointment['uid']}}" data-client="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">
                                <a class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user bg-light-subtle Appointment" data-app-id="{{$Appointment['uid']}}">
                                  <span class="position-relative">
                                    <img src="{{$Appointment['Treatment']['Img']}}" alt="user-{{$Appointment['Id']}}" width="40" height="40" class="rounded-circle">
                                  </span>
                                  <div class="ms-6 d-inline-block w-75">
                                    <h6 class="mb-1 fw-semibold chat-title" data-username="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}
                                    </h6>
                                    <span class="fs-2 text-body-color d-block">{{$Appointment['Client']['Mail']}}</span>
                                  </div>
                                </a>
                              </li>
                            @endif
                          @endif
                        @endforeach
                      </ul>



                      <ul class="chat-users mh-n100 hide ItemList" data-id="7" data-simplebar>
                        @foreach($Appointments as $Appointment)
                          @if($Appointment['Status']=='1')
                            @if($Appointment['PaymentStatus']=='2')
                              <li class="Item" data-id="{{$Appointment['uid']}}" data-client="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">
                                <a class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user bg-light-subtle Appointment" data-app-id="{{$Appointment['uid']}}">
                                  <span class="position-relative">
                                    <img src="{{$Appointment['Treatment']['Img']}}" alt="user-{{$Appointment['Id']}}" width="40" height="40" class="rounded-circle">
                                  </span>
                                  <div class="ms-6 d-inline-block w-75">
                                    <h6 class="mb-1 fw-semibold chat-title" data-username="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}
                                    </h6>
                                    <span class="fs-2 text-body-color d-block">{{$Appointment['Client']['Mail']}}</span>
                                  </div>
                                </a>
                              </li>
                            @endif
                          @endif
                        @endforeach
                      </ul>

                    </div>
                  </div>
                </div>
                <div class="w-100">
                  <div class="chat-container h-100 w-100">
                    <div class="chat-box-inner-part h-100">
                      <div class="chatting-box app-email-chatting-box">
                        <div class="p-9 py-3 border-bottom chat-meta-user d-flex align-items-center justify-content-between">
                          <h5 class="text-dark mb-0 fs-5">Randevu Detayı</h5>
                            <!--<ul class="list-unstyled mb-0 d-flex align-items-center">
                            <li class="d-lg-none d-block">
                              <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                <i class="ti ti-arrow-left"></i>
                              </a>
                            </li>
                            <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="important">
                              <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                <i class="ti ti-star"></i>
                              </a>
                            </li>
                            <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                              <a class="d-block text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                <i class="ti ti-pencil"></i>
                              </a>
                            </li>
                            <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                              <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                <i class="ti ti-trash"></i>
                              </a>
                            </li>
                          </ul> -->
                        </div>
                        <style type="text/css">
                          .chat:not(.active-chat){
                            display: none;
                          }
                        </style>
                        <div class="position-relative overflow-hidden">
                          <div class="position-relative">
                            <div class="chat-box email-box mh-n100 p-9" data-simplebar="init">
                              @foreach($Appointments as $key=>$Appointment)
                                  <div class="chat-list chat <?= $key==0?'active-chat' : '' ?> AppDetail" data-app-id="{{$Appointment['uid']}}" data-client="{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}">
                                    <div class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                      <div class="d-flex align-items-center gap-3">
                                        <img src="{{asset('assets/upload/Default.png')}}" alt="user4" width="72" height="72" class="rounded-circle">
                                        <div>
                                          <h6 class="fw-semibold fs-4 mb-0">{{$Appointment['Client']['FirstName']}} {{$Appointment['Client']['LastName']}}</h6>
                                          <p class="mb-0">{{$Appointment['Client']['BirthDate']}}</p>
                                          <p class="mb-0">T.c: {{$Appointment['Client']['Identification']}}</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-4 mb-7">
                                        <p class="mb-1 fs-2">Telefon</p>
                                        <h6 class="fw-semibold mb-0">{{$Appointment['Client']['Cell']}}</h6>
                                      </div>
                                      <div class="col-8 mb-7">
                                        <p class="mb-1 fs-2">Mail</p>
                                        <h6 class="fw-semibold mb-0">{{$Appointment['Client']['Mail']}}</h6>
                                      </div>
                                      <div class="col-12 mb-9">
                                        <p class="mb-1 fs-2">Tedavi</p>
                                        <h6 class="fw-semibold mb-0">Liposuction</h6>
                                      </div>
                                      <div class="col-4 mb-7">
                                        <p class="mb-1 fs-2">Tedavi Fiyatı</p>
                                        <h6 class="fw-semibold mb-0">{{$Appointment['TreatmentCost']}}$</h6>
                                      </div>
                                      <div class="col-8 mb-7">
                                        <p class="mb-1 fs-2">Toplam Tutar</p>
                                        <h6 class="fw-semibold mb-0">{{$Appointment['Cost']}}$</h6>
                                      </div>
                                      <div class="col-4 mb-7">
                                        <p class="mb-1 fs-2">Acente</p>
                                        <h6 class="fw-semibold mb-0">Muavilla (Mücella kantaroğlu)</h6>
                                      </div>
                                      <div class="col-4 mb-7">
                                        <p class="mb-1 fs-2">komisyon</p>
                                        <h6 class="fw-semibold mb-0">{{$Appointment['CommissionRate']}}%</h6>
                                      </div>
                                      <div class="col-4 mb-7">
                                        <p class="mb-1 fs-2">Ek Komisyonu</p>
                                        <h6 class="fw-semibold mb-0">{{$Appointment['AgencyFee']}}%</h6>
                                      </div>

                                      <div class="col-12 mb-9">
                                        <p class="mb-1 fs-2">Durumu</p>
                                        <h6 class="fw-semibold mb-0">
                                          <? 
                                              if($Appointment['Status']=='1'){
                                                  if ($Appointment['PaymentStatus']=='0') {
                                                      //echo '<div class="text-primary">Ödeme Yapılmadı</div>';
                                                      echo '<button class="btn btn-sm btn-warning">Ödeme Yap</button>';
                                                  }elseif($Appointment['PaymentStatus']=='1'){
                                                      echo '<div class="text-success">Ödeme Alındı</div>';
                                                  }else {
                                                      echo '<div class="text-primary">Ödeme İade Edildi</div>';
                                                  }
                                              }elseif($Appointment['Status']=='2') {
                                                  echo '<div class="text-danger">İptal Edildi</div>';
                                              }elseif($Appointment['Status']=='3') {
                                                  echo '<div class="text-danger">Teslim Edildi</div>';
                                              }
                                          ?>
                                        </h6>
                                      </div>
                                    </div>

                                    </div>
                                    
                              @endforeach

                              

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="offcanvas offcanvas-start user-chat-box" tabindex="-1" id="chat-sidebar" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasExampleLabel"> Contact </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="px-9 pt-4 pb-3">
                  <button class="btn btn-primary fw-semibold py-8 w-100">Add New Contact</button>
                </div>
                <ul class="list-group h-n150" data-simplebar>
                  <li class="list-group-item border-0 p-0 mx-9">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-inbox fs-5"></i>All Contacts
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-star"></i>Starred
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-file-text fs-5"></i>Pening Approval
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-alert-circle"></i>Blocked
                    </a>
                  </li>
                  <li class="border-bottom my-3"></li>
                  <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">CATEGORIES</li>
                  <li class="list-group-item border-0 p-0 mx-9">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-bookmark fs-5 text-primary"></i>Engineers
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-bookmark fs-5 text-warning"></i>Support Staff
                    </a>
                  </li>
                  <li class="list-group-item border-0 p-0 mx-9">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-bookmark fs-5 text-success"></i>Sales Team
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

        @endsection

        @section('script')

            <script src="{{asset('assets/panel/js/vendor.min.js')}}"></script>
            <!-- Import Js Files -->

            <!-- solar icons -->
            <script src="{{asset('assets/panel/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

            <script src="{{asset('assets/panel/js/datatable/datatable-advanced.init.js')}}"></script>
            <script type="text/javascript">
                
              $(document).ready(function(){
                ///
                $(document).on('click','.ItemPointer',function(){
                      $('.ItemList').addClass('hide');
                      $('.AppDetail').fadeOut();
                      $('.ItemList[data-id='+$(this).attr('data-id')+']').removeClass('hide');
                });
                ///
                $(document).on('click','.Appointment',function(){
                      $('.AppDetail').fadeOut();
                      $('.AppDetail[data-app-id='+$(this).attr('data-app-id')+']').fadeIn();
                });
                ///
                $(document).on('change','#searchAppointment', function(){
                    $('.Item').fadeOut('fast');
                    if($(this).val()==''){
                      $('.Item').fadeIn('slow');
                    }else {
                      $('.Item').each((index,item)=>{
                          if($(item).data('id') == $(this).val()){
                              $(item).fadeIn('slow');
                          }
                          if($(item).data('client').toLowerCase().includes($(this).val().toLowerCase())){
                              $(item).fadeIn('slow');
                          }
                      });
                    }
                    $('.ContainerTitle').text($(this).data('title'));
                });
                ///
              });



            </script>
        @endsection
