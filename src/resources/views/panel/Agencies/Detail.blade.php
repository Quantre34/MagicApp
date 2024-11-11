@extends('panel.App')

  @section('content')

        <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Acente Detay</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel/agencies">Acenteler</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{$Agency['Title']}}</li>
                </ol>
              </nav>
            </div>
<!--             <div class="d-flex align-items-center justify-content-between gap-6">
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
          <div class="card overflow-hidden">
            <div class="card-body p-0">
              <!-- <img src="{{asset('assets/panel/images/backgrounds/profilebg.jpg')}}" alt="monster-img" class="img-fluid"> -->
              <div class="mt-2">
                
              </div>
              <div class="row align-items-center mt-2">
                <div class="col-lg-4 order-lg-1 order-2">
                  <div class="d-flex align-items-center justify-content-around m-4">
                    <div class="text-center">
                      <i class="ti ti-file-description fs-6 d-block mb-2"></i>
                      <h4 class="mb-0 fw-semibold lh-1">{{count($Appointments)}}</h4>
                      <p class="mb-0 ">Randevu</p>
                    </div>
                    <div class="text-center">
                      <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
                      <h4 class="mb-0 fw-semibold lh-1">{{count($Clients)}}</h4>
                      <p class="mb-0 ">Hasta</p>
                    </div>
                    <div class="text-center">
                      <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                      <h4 class="mb-0 fw-semibold lh-1 Profit"></h4>
                      <p class="mb-0 ">Ciro</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mt-1 order-lg-2 order-1">
                  <div class="mt-1">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                      <div class="d-flex align-items-center justify-content-center round-110">
                        <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                          <img src="{{$Agency['logo']??'assets/upload/default-logo.png'}}" alt="monster-img" class="w-100 h-100">
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <h5 class="mb-0">{{$Agency['Title']}}</h5>
                      <!-- <p class="mb-0">Designer</p> -->
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 order-last">
                  <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-end my-3 mx-4 pe-4 gap-3">
                    <li>
                      <a class="d-flex align-items-center justify-content-center btn btn-success p-2 fs-4 rounded-circle" href="https://wa.me/{{$Agency['Whatsapp']}}" width="30" height="30">
                        <i class="ti ti-brand-whatsapp"></i>
                      </a>
                    </li>
                    <li>
                      <a class="btn btn-primary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle" href="{{$Agency['Facebook']}}">
                        <i class="ti ti-brand-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a class="btn btn-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle" href="{{$Agency['Instagram']}}">
                        <i class="ti ti-brand-instagram"></i>
                      </a>
                    </li>
                    <li>
                      <a href="/panel/agencies/edit/{{$Agency['uid']}}" class="btn btn-primary text-nowrap">Düzenle</a>
                    </li>
                  </ul>
                </div>
              </div>
              <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-primary-subtle rounded-2 rounded-top-0" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active hstack gap-2 rounded-0 fs-12 py-6" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
                    <i class="ti ti-user-circle fs-5"></i>
                    <span class="d-none d-md-block">Profil</span>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link hstack gap-2 rounded-0 fs-12 py-6" id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button" role="tab" aria-controls="pills-followers" aria-selected="false">
                    <i class="ti ti-heart fs-5"></i>
                    <span class="d-none d-md-block">Hastalar</span>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link hstack gap-2 rounded-0 fs-12 py-6" id="pills-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-friends" type="button" role="tab" aria-controls="pills-friends" aria-selected="false">
                    <i class="ti ti-user-circle fs-5"></i>
                    <span class="d-none d-md-block">Blanço</span>
                  </button>
                </li>
<!--                 <li class="nav-item" role="presentation">
                  <button class="nav-link hstack gap-2 rounded-0 fs-12 py-6" id="pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#pills-gallery" type="button" role="tab" aria-controls="pills-gallery" aria-selected="false">
                    <i class="ti ti-photo-plus fs-5"></i>
                    <span class="d-none d-md-block">Gallery</span>
                  </button>
                </li> -->
              </ul>
            </div>
          </div>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card shadow-none border">
                    <div class="card-body">
                      <h4 class="mb-3">Detay</h4>
                      <!-- <p class="card-subtitle">Hello, I am Markarn Doe. I love making websites and graphics. Lorem
                        ipsum dolor sit amet,
                        consectetur adipiscing elit.</p> -->
                      <div class="vstack gap-3 mt-4">
                        <div class="hstack gap-6">
                          <i class="ti ti-briefcase text-dark fs-6"></i>
                          <h6 class=" mb-0">{{$Agency['City']}} / {{$Agency['Province']}} / {{$Agency['Country']}}</h6>
                        </div>
                        <div class="hstack gap-6">
                          <i class="ti ti-mail text-dark fs-6"></i>
                          <h6 class=" mb-0"><a href="email:{{$Agency['Mail']}}">{{$Agency['Mail']}}</a></h6>
                        </div>
                        <div class="hstack gap-6">
                          <i class="ti ti-phone text-dark fs-6"></i>
                          <h6 class=" mb-0"><a href="tel:{{$Agency['Tell']}}">{{$Agency['Tell']}}</a></h6>
                        </div>
                        <div class="hstack gap-6">
                          <i class="ti ti-device-desktop text-dark fs-6"></i>
                          <h6 class=" mb-0"><a href="https://{{$Agency['WebPage']}}" target="_blank">{{$Agency['WebPage']}}</a></h6>
                        </div>
                        <div class="hstack gap-6">
                          <i class="ti ti-map-pin text-dark fs-6"></i>
                          <h6 class=" mb-0">{{$Agency['VatNumber']}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card shadow-none border">
                    <div class="card-body">
                      <h4 class="fw-semibold mb-3">Çalışanlar</h4>
                      <div class="row">
                        @foreach($Coworkers as $User)
                            <div class="col-12 ">
                              <div  style="justify-content: center;display: flex;">
                                <img style="width: 100px;" src="{{$User['ProfilPic'] ?? 'assets/upload/Default.png'}}" alt="monster-img" class="rounded-1 img-fluid mb-9">
                              </div>
                              
                              <div  style="justify-content: center;display: flex;">
                                <span>{{$User['FirstName']}} {{$User['LastName']}}</span>
                              </div>
                              
                            </div>
                        @endforeach
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
<!--                   <div class="card shadow-none border">
                    <div class="card-body">
                      <div class="form-floating mb-3">
                        <textarea class="form-control h-140" placeholder="Leave a comment here" id="floatingTextarea2"></textarea>
                        <label for="floatingTextarea2">Share your thoughts</label>
                      </div>
                      <div class="d-flex align-items-center gap-6 flex-wrap">
                        <a class="d-flex align-items-center round-32 justify-content-center btn btn-primary rounded-circle" href="javascript:void(0)">
                          <i class="ti ti-photo"></i>
                        </a>
                        <a href="javascript:void(0)" class="text-dark link-primary pe-3 py-2">Photo / Video</a>

                        <a class="d-flex align-items-center round-32 justify-content-center btn btn-secondary rounded-circle" href="javascript:void(0)">
                          <i class="ti ti-notebook"></i>
                        </a>
                        <a href="javascript:void(0)" class="text-dark link-secondary pe-3 py-2">Article</a>


                        <button class="btn btn-primary ms-auto">Post</button>
                      </div>
                    </div>
                  </div> -->
                  <div class="card">
                    <div class="card-body border-bottom">
                      <h4 for="floatingTextarea2">Randevular</h4>
            <div class="table-responsive">
              <table id="file_export" class="table w-100 table-bordered display text-nowrap datatable">
                <thead>
                  <!-- start row -->
                    <tr>
                      <th>#Id</th>
                      <th>Hasta</th>
                      <th>Tedavi</th>
                      <th>Paket</th>
                      <th>Tutar</th>
                      <th>Durum</th>
                    </tr>
                  <!-- end row -->
                </thead>
                <tbody>
                  @foreach(($Appointments??[]) as $Treatment)
                    <tr>
                      <td>#{{$Treatment['uid']}}</td>
                      <td>{{$Treatment['Client']['FirstName']}} {{$Treatment['Client']['LastName']}}</td>
                      <td>{{ strlen($Treatment['Treatment']['Title']) > 12 ? substr($Treatment['Treatment']['Title'],0,12).'...' : $Treatment['Treatment']['Title']  }}</td>
                       <td>{{$Treatment['Package']['Title']}}</td>
                       <td>{{$Treatment['Cost']}}</td>
                      <td class="hidden-xs" width="150">
                          <span class="badge  bg-<?= $Treatment['Status']=='1'? 'success' : 'danger' ?>-subtle text-<?= $Treatment['Status']=='1'? 'success' : 'danger' ?>"><?= $Treatment['Status']=='1'? 'Aktif' : 'Pasif' ?></span>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
                    </div>

<!--                     <div class="d-flex align-items-center gap-6 flex-wrap p-3 flex-lg-nowrap">
                      <img src="{{asset('assets/panel/images/profile/user-1.jpg')}}" alt="monster-img" class="rounded-circle" width="33" height="33">
                      <input type="text" class="form-control py-8" id="exampleInputtext" aria-describedby="textHelp" placeholder="Comment">
                      <button class="btn btn-primary">Comment</button>
                    </div> -->
                  </div>


                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab" tabindex="0">
              <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Hastalar <span class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">{{count($Clients)}}</span>
                </h3>
                <form class="position-relative">
                  <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Followers">
                  <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                </form>
              </div>
              <div class="row">
                @foreach(($Clients??[]) as $Client)
                  <div class="col-md-6 col-xl-4">
                    <div class="card">
                      <div class="card-body p-4 d-flex align-items-center gap-6 flex-wrap">
                        <img src="assets/upload/default-logo.png" alt="monster-img" class="rounded-circle" width="40" height="40">
                        <div>
                          <h5 class="fw-semibold mb-0">{{$Client['FirstName']}} {{$Client['LastName']}}</h5>
                          <span class="fs-2 d-flex align-items-center">
                            <i class="ti ti-map-pin text-dark fs-3 me-1"></i>{{$Client['Cell']}}
                          </span>
                        </div>
                        <button class="btn btn-outline-primary py-1 px-2 ms-auto">Detay</button>
                      </div>
                    </div>
                  </div>
                @endforeach


              </div>
            </div>
            <div class="tab-pane fade" id="pills-friends" role="tabpanel" aria-labelledby="pills-friends-tab" tabindex="0">
              <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                <form class="position-relative">
                  <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Friends">
                  <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                </form>
              </div>
              <div class="row">

<!-- TAB CONTENT -->
            <div class="card">
              <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold" id="pills-personal-info-tab" data-bs-toggle="pill" data-bs-target="#pills-personal-info" type="button" role="tab" aria-controls="pills-personal-info" aria-selected="true"> TOPLAM</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold" id="pills-account-details-tab" data-bs-toggle="pill" data-bs-target="#pills-account-details" type="button" role="tab" aria-controls="pills-account-details" aria-selected="false"> AYLIK </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold" id="pills-social-links-tab" data-bs-toggle="pill" data-bs-target="#pills-social-links" type="button" role="tab" aria-controls="pills-social-links" aria-selected="false"> HAFTALIK</button>
                </li>
              </ul>
              <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-personal-info" role="tabpanel" aria-labelledby="pills-personal-info-tab" tabindex="0">
                    <div class="row">

                          <div class="table-responsive">
                            <table id="file_export" class="table w-100 table-bordered display text-nowrap datatable">
                              <thead>
                                <!-- start row -->
                                  <tr>
                                    <th>#Id</th>
                                    <th>Hasta</th>
                                    <th>Tedavi</th>
                                    <th>Paket</th>
                                    <th>Tutar</th>
                                    <th>Komisyon</th>
                                    <th>Ek oran</th>
                                    <th>Kazanç</th>
                                    <th>Durum</th>
                                  </tr>
                                <!-- end row -->
                              </thead>
                              <tbody>
                                <?php $Profit = 0; ?>
                                @foreach(($Appointments??[]) as $Treatment)
                                  <?  
                                      $Comission = ($Treatment['TreatmentCost'] * $Treatment['CommissionRate']) / 100 ;
                                      $Fee = ($Treatment['TreatmentCost'] * $Treatment['AgencyFee']) / 100 ;  
                                      $profit = $Comission + $Fee;
                                      $Profit += $profit;
                                  ?>
                                  <tr>
                                    <td>#{{$Treatment['uid']}}</td>
                                    <td>{{$Treatment['Client']['FirstName']}} {{$Treatment['Client']['LastName']}}</td>
                                    <td>{{ strlen($Treatment['Treatment']['Title']) > 12 ? substr($Treatment['Treatment']['Title'],0,12).'...' : $Treatment['Treatment']['Title']  }}</td>
                                    <td>{{$Treatment['Package']['Title']}}</td>
                                    <td>{{$Treatment['Cost']}}</td>
                                    <td>{{$Treatment['CommissionRate']}}%</td>
                                    <td>{{$Treatment['AgencyFee']}}%</td>
                                    <td>{{ $profit }}₺</td>
                                    <td class="hidden-xs" width="150">
                                        <span class="badge  bg-<?= $Treatment['Status']=='1'? 'success' : 'danger' ?>-subtle text-<?= $Treatment['Status']=='1'? 'success' : 'danger' ?>"><?= $Treatment['Status']=='1'? 'Aktif' : 'Pasif' ?></span>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                               <tfoot>
                                <tr> 
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>{{ $Profit }}₺</td>
                                  <td></td>
                                  
                                </tr>
                              </tfoot>
                            </table>
                          </div>

                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-account-details" role="tabpanel" aria-labelledby="pills-account-details-tab" tabindex="0">
                    <div class="row">

                    <!-- MONTH -->

                          <div class="table-responsive">
                            <table id="file_export" class="table w-100 table-bordered display text-nowrap datatable">
                              <thead>
                                <!-- start row -->
                                  <tr>
                                    <th>#Id</th>
                                    <th>Hasta</th>
                                    <th>Tedavi</th>
                                    <th>Paket</th>
                                    <th>Tutar</th>
                                    <th>Komisyon</th>
                                    <th>Ek oran</th>
                                    <th>Kazanç</th>
                                    <th>Durum</th>
                                  </tr>
                                <!-- end row -->
                              </thead>
                              <tbody>
                                <?php $MProfit = 0; ?>
                                @foreach(($MonthlyAppointments??[]) as $Treatment)
                                  <?  
                                      $Comission = ($Treatment['TreatmentCost'] * $Treatment['CommissionRate']) / 100 ;
                                      $Fee = ($Treatment['TreatmentCost'] * $Treatment['AgencyFee']) / 100 ;  
                                      $profit = $Comission + $Fee;
                                      $MProfit += $profit;
                                  ?>
                                  <tr>
                                    <td>#{{$Treatment['uid']}}</td>
                                    <td>{{$Treatment['Client']['FirstName']}} {{$Treatment['Client']['LastName']}}</td>
                                    <td>{{ strlen($Treatment['Treatment']['Title']) > 12 ? substr($Treatment['Treatment']['Title'],0,12).'...' : $Treatment['Treatment']['Title']  }}</td>
                                    <td>{{$Treatment['Package']['Title']}}</td>
                                    <td>{{$Treatment['Cost']}}</td>
                                    <td>{{$Treatment['CommissionRate']}}%</td>
                                    <td>{{$Treatment['AgencyFee']}}%</td>
                                    <td>{{ $profit }}₺</td>
                                    <td class="hidden-xs" width="150">
                                        <span class="badge  bg-<?= $Treatment['Status']=='1'? 'success' : 'danger' ?>-subtle text-<?= $Treatment['Status']=='1'? 'success' : 'danger' ?>"><?= $Treatment['Status']=='1'? 'Aktif' : 'Pasif' ?></span>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                               <tfoot>
                                <tr> 
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>{{ $MProfit }}₺</td>
                                  <td></td>
                                  
                                </tr>
                              </tfoot>
                            </table>
                          </div>

                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-social-links" role="tabpanel" aria-labelledby="pills-social-links-tab" tabindex="0">
                    <div class="row">
                      <!-- WEEK -->


                          <div class="table-responsive">
                            <table id="file_export" class="table w-100 table-bordered display text-nowrap datatable">
                              <thead>
                                <!-- start row -->
                                  <tr>
                                    <th>#Id</th>
                                    <th>Hasta</th>
                                    <th>Tedavi</th>
                                    <th>Paket</th>
                                    <th>Tutar</th>
                                    <th>Komisyon</th>
                                    <th>Ek oran</th>
                                    <th>Kazanç</th>
                                    <th>Durum</th>
                                  </tr>
                                <!-- end row -->
                              </thead>
                              <tbody>
                                <?php $WProfit = 0; ?>
                                @foreach(($WeeklyAppointments??[]) as $Treatment)
                                  <?  
                                      $Comission = ($Treatment['TreatmentCost'] * $Treatment['CommissionRate']) / 100 ;
                                      $Fee = ($Treatment['TreatmentCost'] * $Treatment['AgencyFee']) / 100 ;  
                                      $profit = $Comission + $Fee;
                                      $WProfit += $profit;
                                  ?>
                                  <tr>
                                    <td>#{{$Treatment['uid']}}</td>
                                    <td>{{$Treatment['Client']['FirstName']}} {{$Treatment['Client']['LastName']}}</td>
                                    <td>{{ strlen($Treatment['Treatment']['Title']) > 12 ? substr($Treatment['Treatment']['Title'],0,12).'...' : $Treatment['Treatment']['Title']  }}</td>
                                    <td>{{$Treatment['Package']['Title']}}</td>
                                    <td>{{$Treatment['Cost']}}</td>
                                    <td>{{$Treatment['CommissionRate']}}%</td>
                                    <td>{{$Treatment['AgencyFee']}}%</td>
                                    <td>{{ $profit }}₺</td>
                                    <td class="hidden-xs" width="150">
                                        <span class="badge  bg-<?= $Treatment['Status']=='1'? 'success' : 'danger' ?>-subtle text-<?= $Treatment['Status']=='1'? 'success' : 'danger' ?>"><?= $Treatment['Status']=='1'? 'Aktif' : 'Pasif' ?></span>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr> 
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>{{ $WProfit }}₺</td>
                                  <td></td>
                                  
                                </tr>
                              </tfoot>
                            </table>
                          </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- TAB CONTENT -->





              </div>
            </div>
            <div class="tab-pane fade" id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab" tabindex="0">
              <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Gallery <span class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">12</span>
                </h3>
                <form class="position-relative">
                  <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Friends">
                  <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                </form>
              </div>
              <div class="row">
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s1.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Isuava wakceajo fe.jpg</h6>
                          <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Isuava wakceajo fe.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s2.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Ip docmowe vemremrif.jpg</h6>
                          <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Ip docmowe vemremrif.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s3.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Duan cosudos utaku.jpg</h6>
                          <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Duan cosudos utaku.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s4.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Fu netbuv oggu.jpg</h6>
                          <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Fu netbuv oggu.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s5.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Di sekog do.jpg</h6>
                          <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Di sekog do.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s6.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Lo jogu camhiisi.jpg</h6>
                          <span class="text-dark fs-2">Thu, Dec 15, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Lo jogu camhiisi.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s7.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Orewac huosazud robuf.jpg</h6>
                          <span class="text-dark fs-2">Fri, Dec 16, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Orewac huosazud robuf.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s8.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Nira biolaizo tuzi.jpg</h6>
                          <span class="text-dark fs-2">Sat, Dec 17, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Nira biolaizo tuzi.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s9.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Peri metu ejvu.jpg</h6>
                          <span class="text-dark fs-2">Sun, Dec 18, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Peri metu ejvu.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s10.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Vurnohot tajraje isusufuj.jpg</h6>
                          <span class="text-dark fs-2">Mon, Dec 19, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Vurnohot tajraje isusufuj.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s11.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Juc oz ma.jpg</h6>
                          <span class="text-dark fs-2">Tue, Dec 20, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Juc oz ma.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="card hover-img overflow-hidden rounded-2">
                    <div class="card-body p-0">
                      <img src="{{asset('assets/panel/images/products/s12.jpg')}}" alt="monster-img" height="220" class="w-100 object-fit-cover">
                      <div class="p-4 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="mb-0">Povipvez marjelliz zuuva.jpg</h6>
                          <span class="text-dark fs-2">Wed, Dec 21, 2023</span>
                        </div>
                        <div class="dropdown">
                          <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                          </a>
                          <ul class="dropdown-menu overflow-hidden">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">Povipvez marjelliz zuuva.jpg</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection

  @section('script')
    <script type="text/javascript">
      $('.Profit').text('<?= $Profit ?>₺');
    </script>
  @endsection






