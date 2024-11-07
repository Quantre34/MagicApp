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
                <a href="/panel" class="muted-link pb-1 d-inline-block breadcrumb-back">
                  <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                  <span class="text-small align-middle">@Lang('Articles.Panel')</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">@Lang('Articles.ArticlesDetail')</h1>
              </div>
              <!-- Title End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <div class="row">
            <div class="col-12 col-xl-8 col-xxl-9 mb-5">
              <div class="card mb-5">
                <!-- Content Start -->
                <img src="{{$Article['Img'] ?? ''}}" class="card-img-top sh-60" alt="card image" />
                <div class="card-body">
                  <h4 class="mb-3">{!!$Article['Title']!!}</h4>
                  <div>
                    {!! $Article['Content'] !!}
                  </div>
                </div>
                <!-- Content End -->

                <div class="card-footer border-0 pt-0">
                  <div class="row align-items-center">
                    <!-- Comments and Likes Start -->
<!--                     <div class="col-6 text-muted">
                      <div class="row g-0">
                        <div class="col-auto pe-3">
                          <i data-acorn-icon="eye" class="text-primary me-1" data-acorn-size="15"></i>
                          <span class="align-middle">421</span>
                        </div>
                        <div class="col">
                          <i data-acorn-icon="message" class="text-primary me-1" data-acorn-size="15"></i>
                          <span class="align-middle">4</span>
                        </div>
                      </div>
                    </div> -->
                    <!-- Comments and Likes End -->

                    <!-- Social Buttons Start -->
<!--                     <div class="col-6">
                      <div class="d-flex align-items-center justify-content-end">
                        <button class="btn btn-sm btn-icon btn-icon-only btn-outline-primary ms-1" type="button">
                          <i data-acorn-icon="facebook"></i>
                        </button>
                        <button class="btn btn-sm btn-icon btn-icon-only btn-outline-primary ms-1" type="button">
                          <i data-acorn-icon="twitter"></i>
                        </button>
                      </div>
                    </div> -->
                    <!-- Social Buttons End -->
                  </div>
                </div>
              </div>

              <!-- About the Author Start -->
<!--               <h2 class="small-title">About the Author</h2>
              <div class="card mb-5">
                <div class="card-body">
                  <div class="row g-0">
                    <div class="col-auto">
                      <div class="sw-5 me-3">
                        <img src="img/profile/profile-15.webp" class="img-fluid rounded-xl" alt="thumb" />
                      </div>
                    </div>
                    <div class="col">
                      <a href="Doctors.Detail.html" class="stretched-link">Trent Dawson, M.D.</a>
                      <div class="text-muted mb-2">Neurologist</div>
                      <div class="text-alternate">
                        Cupcake chocolate cake jelly beans lemon drops danish bear claw carrot cake soufflé. Marshmallow jujubes tiramisu apple pie carrot cake
                        danish candy. Croissant croissant chocolate bar. Jelly macaroon apple pie croissant pastry cheesecake. Marshmallow oat cake lemon drops
                        chocolate bonbon powder lemon drops chocolate. Danish tootsie roll dessert soufflé.
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- About the Author End -->
            </div>

            <!-- Right Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
              <div class="mb-5">
                <div class="row mb-n2">

                  @if(!empty($Articles))
                    @foreach($Articles as $Article)
                    <div class="col-12 col-md-6 col-xl-12">
                      <div class="card mb-2 sh-11 sh-sm-13">
                        <div class="row g-0 h-100">
                          <div class="col-auto">
                            <img
                              src="{{$Article['Img']}}"
                              alt="alternate text"
                              class="card-img card-img-horizontal sw-10 sw-sm-14"
                            />
                          </div>
                          <div class="col position-static">
                            <div class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                              <div class="d-flex flex-column">
                                <a href="/panel/Articles/{{$Article['Slug']}}" class="stretched-link body-link">
                                  <div class="clamp-line" data-line="2">{{$Article['Title']}}</div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  @endif

                </div>
              </div>
            </div>
            <!-- Right Side End -->
          </div>
        </div>
      </main>
    @endsection

    @section('script')
    <!-- Page Specific Scripts Start -->
    <script src="{{URL::asset('assets/js/common.js')}}"></script>
    <script src="{{URL::asset('assets/js/scripts.js')}}"></script>
    <!-- Page Specific Scripts End -->
    @endsection

