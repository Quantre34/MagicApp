@extends('panel.App')
  @section('style')
    <link rel="stylesheet" href="/assets/panel/libs/owl.carousel/dist/assets/owl.carousel.min.css">
  @endsection
  @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Treatment Detail</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{$Treatment['Title']}}</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="shop-detail">
            <div class="card">
              <div class="card-body p-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div id="sync1" class="owl-carousel owl-theme">

                      @foreach($Images as $Image)
                        <div class="item rounded overflow-hidden">
                          <img src="{{$Image['Img']}}" alt="{{$Treatment['Title']}}" class="img-fluid">
                        </div>
                      @endforeach

                    </div>

                    <div id="sync2" class="owl-carousel owl-theme">
                      @foreach($Images as $Image)
                        <div class="item rounded overflow-hidden">
                          <img src="{{$Image['Img']}}" alt="{{$Treatment['Title']}}" class="img-fluid">
                        </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="shop-content">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="badge text-bg-{{$Treatment['Status']=='1'? 'success' : 'danger'}} fs-2 fw-semibold">{{$Treatment['Status']=='1'? 'Klinik Uygun' : 'Klinik Uygun Değil'}}</span>
                      </div>
                      <h4>{{$Treatment['Title']}}</h4>
                      <!-- <p class="mb-3">Medescare, anlaşmalı klinikleri ile size en uygun hizmeti vermek için</p> -->
                      <h4 class="fw-semibold mb-3">
                        <del class="fs-5 text-muted">{{$Treatment['Cost']+100}}€</del> {{$Treatment['Cost']}}€
                      </h4>
                      <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                          <li>
                            <a class="me-1" href="javascript:void(0)">
                              <i class="ti ti-star text-warning fs-4"></i>
                            </a>
                          </li>
                          <li>
                            <a class="me-1" href="javascript:void(0)">
                              <i class="ti ti-star text-warning fs-4"></i>
                            </a>
                          </li>
                          <li>
                            <a class="me-1" href="javascript:void(0)">
                              <i class="ti ti-star text-warning fs-4"></i>
                            </a>
                          </li>
                          <li>
                            <a class="me-1" href="javascript:void(0)">
                              <i class="ti ti-star text-warning fs-4"></i>
                            </a>
                          </li>
                          <li>
                            <a href="javascript:void(0)">
                              <i class="ti ti-star text-warning fs-4"></i>
                            </a>
                          </li>
                        </ul>
                        <!-- <a href="javascript:void(0)">(236 reviews)</a> -->
                      </div>
                      <h6 class="mb-0 fs-4 fw-semibold">Hizmeti Veren Kliniklerimiz</h6>
                      @foreach($Clinics as $Clinic)
                        <div class="d-flex align-items-center gap-8 " style="padding: 5px;">
                          <span class="mb-0 fs-4 fw-semibold">{{$Clinic['Title']}}</span>
                          <a class="d-block p-6">
                            <? $QrCode = new QrCode(); ?>
                            <img style="max-width: 50px;" src="{{ $QrCode->Create('https://wa.me/905379797206?text=Merhaba', 350) }}"></a>
                        </div>
                      @endforeach
                      <div class="d-sm-flex align-items-center gap-6 pt-8 mb-7">
                        <a href="panel/services" class="btn d-block btn-primary px-5 py-8 mb-6 mb-sm-0">Randevu Oluştur</a>
                        <a href="panel/consult" class="btn d-block btn-danger px-7 py-8">Uzmana Danış</a>
                      </div>
                      <p class="mb-0">Tedavi Süresi : {{$Treatment['EstimatedTime']}} gün</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body p-4">
                <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                      Açıklama
                    </button>
                  </li>
                  <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">
                      Reviews
                    </button>
                  </li> -->
                </ul>
                <div class="tab-content pt-4" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab" tabindex="0">
                    {!! $Treatment['Description'] !!}
                  </div>
<!--                   <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">
                    <div class="row">
                      <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card shadow-none border w-100 mb-7 mb-lg-0">
                          <div class="card-body text-center p-4 d-flex flex-column justify-content-center">
                            <h6 class="mb-3">Average Rating</h6>
                            <h2 class="text-primary mb-3 fw-semibold fs-9">4/5</h2>
                            <ul class="list-unstyled d-flex align-items-center justify-content-center mb-0">
                              <li>
                                <a class="me-1" href="javascript:void(0)">
                                  <i class="ti ti-star text-warning fs-6"></i>
                                </a>
                              </li>
                              <li>
                                <a class="me-1" href="javascript:void(0)">
                                  <i class="ti ti-star text-warning fs-6"></i>
                                </a>
                              </li>
                              <li>
                                <a class="me-1" href="javascript:void(0)">
                                  <i class="ti ti-star text-warning fs-6"></i>
                                </a>
                              </li>
                              <li>
                                <a class="me-1" href="javascript:void(0)">
                                  <i class="ti ti-star text-warning fs-6"></i>
                                </a>
                              </li>
                              <li>
                                <a href="javascript:void(0)">
                                  <i class="ti ti-star text-warning fs-6"></i>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card shadow-none border w-100 mb-7 mb-lg-0">
                          <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <div class="d-flex align-items-center gap-9 mb-3">
                              <span class="flex-shrink-0 fs-2">1 Stars</span>
                              <div class="progress bg-primary-subtle w-100 h-4">
                                <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                              </div>
                              <h6 class="mb-0">(485)</h6>
                            </div>
                            <div class="d-flex align-items-center gap-9 mb-3">
                              <span class="flex-shrink-0 fs-2">2 Stars</span>
                              <div class="progress bg-primary-subtle w-100 h-4">
                                <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                              </div>
                              <h6 class="mb-0">(215)</h6>
                            </div>
                            <div class="d-flex align-items-center gap-9 mb-3">
                              <span class="flex-shrink-0 fs-2">3 Stars</span>
                              <div class="progress bg-primary-subtle w-100 h-4">
                                <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                              </div>
                              <h6 class="mb-0">(110)</h6>
                            </div>
                            <div class="d-flex align-items-center gap-9 mb-3">
                              <span class="flex-shrink-0 fs-2">4 Stars</span>
                              <div class="progress bg-primary-subtle w-100 h-4">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                              </div>
                              <h6 class="mb-0">(620)</h6>
                            </div>
                            <div class="d-flex align-items-center gap-9">
                              <span class="flex-shrink-0 fs-2">5 Stars</span>
                              <div class="progress bg-primary-subtle w-100 h-4">
                                <div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%;"></div>
                              </div>
                              <h6 class="mb-0">(160)</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card shadow-none border w-100 mb-7 mb-lg-0">
                          <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <button type="button" class="btn btn-outline-primary d-flex align-items-center gap-2 mx-auto">
                              <i class="ti ti-pencil fs-7"></i>Write an Review
                            </button>
                          </div>
                        </div>
                      </div> 
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="related-products pt-7">
              <h4 class="mb-3 fw-semibold">Related Products</h4>
              <div class="row">


                @foreach($Treatments as $Treatment)
                  <div class="col-sm-6 col-xxl-3">
                    <div class="card overflow-hidden rounded-2">
                      <div class="position-relative">
                        <a href="javascript:void(0)" class="hover-img d-block overflow-hidden">
                          <img src="{{$Treatment['Img']}}" class="card-img-top rounded-0" alt="monster-img">
                        </a>
                      </div>
                      <div class="card-body pt-3 p-4">
                        <h6 class="fw-semibold fs-4">{{$Treatment['Title']}}</h6>
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="fw-semibold fs-4 mb-0">{{$Treatment['Cost']+100}}€<span class="ms-2 fw-normal text-muted fs-3">
                              <del>{{$Treatment['Cost']}}</del>
                            </span>
                          </h6>
                          <ul class="list-unstyled d-flex align-items-center mb-0">
                            <a class="fs-6 text-muted" href="panel/services/{{$Treatment['uid']}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail">
                              <iconify-icon icon="material-symbols:model-training-outline-rounded"></iconify-icon>
                            </a>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
      @section('script')
        <script src="assets/panel/libs/owl.carousel/dist/owl.carousel.min.js"></script>
        <script src="assets/panel/js/apps/productDetail.js"></script>
      @endsection