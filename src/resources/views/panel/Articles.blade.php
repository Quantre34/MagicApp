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
                  <span class="text-small align-middle">panel</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">@Lang('Articles.Articles')</h1>
              </div>
              <!-- Title End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <div class="row">
            <div class="col-xl-8 mb-5">
              <h2 class="small-title">@Lang('Articles.Popular')</h2>
              <div class="card">
                <a href="/panel/Articles/{{$Articles[0]['Slug']}}">
                  <img src="{{$Articles[0]['Img']}}" class="card-img-top sh-40 theme-filter" alt="card image" />
                </a>
                <div class="card-body">
                  <h4 class="mb-2 pb-1">
                    <a href="/panel/Articles/{{$Articles[0]['Slug']}}">{!!$Articles[0]['Title']!!}</a>
                  </h4>
                  <p class="text-alternate sh-8 clamp-line mb-0" data-line="3">
                    {!! substr($Articles[0]['Content'], 0, 500) !!}
                  </p>
                </div>
                <div class="card-footer border-0 pt-0">
                  <div class="row align-items-center">
<!--                     <div class="col-6">
                      <div class="d-flex align-items-center">
                        <div class="sw-5 d-inline-block position-relative me-3">
                          <a href="Doctors.Detail.html">
                            <img src="{{URL::asset('assets/img/profile/profile-15.webp')}}" class="img-fluid rounded-xl" alt="thumb" />
                          </a>
                        </div>
                        <div class="d-inline-block">
                          <a href="Doctors.Detail.html">Trent Dawson, M.D.</a>
                          <div class="text-muted text-small">Neurologist</div>
                        </div>
                      </div>
                    </div> -->
<!--                     <div class="col-6 text-muted">
                      <div class="row g-0 justify-content-end">
                        <div class="col-auto pe-3">
                          <i data-acorn-icon="eye" class="text-primary me-1" data-acorn-size="15"></i>
                          <span class="align-middle">145</span>
                        </div>
                        <div class="col-auto">
                          <i data-acorn-icon="message" class="text-primary me-1" data-acorn-size="15"></i>
                          <span class="align-middle">12</span>
                        </div>
                      </div>
                    </div> -->
                    <a href="/panel/Articles/{{$Articles[0]['Slug']}}">@Lang('Articles.SeeMore') --></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 mb-5">
              <h2 class="small-title">@Lang('Articles.Newest')</h2>
              @if(!empty($Articles))
                @foreach($Articles as $key => $Article)
                  @if($key !== 0)
                    <div class="card mb-2 sh-11 sh-sm-13">
                      <div class="row g-0 h-100">
                        <div class="col-auto">
                          <img src="{{$Article['Img']}}" alt="alternate text" class="card-img card-img-horizontal sw-10 sw-sm-14" />
                        </div>
                        <div class="col position-static">
                          <div class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                            <div class="d-flex flex-column">
                              <a href="/panel/Articles/{{$Article['Slug']}}" class="stretched-link body-link">
                                <div class="clamp-line" data-line="2">{!!$Article['Title']!!}</div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              @endif
            </div>
          </div>

      <!-- Departments Start -->
      <div class="d-flex justify-content-between">
        <h2 class="small-title">@Lang('Articles.Categories')</h2>
        @if(User('Type')=='2')
          <a href="/panel/Manage/Categories">
              <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
                <span class="align-bottom">@Lang('Articles.AddCategories')</span>
                <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
            </button>
          </a>
        @endif
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
              <div class="text-extra-small fw-medium text-muted">Treatments: {{count($Category['Treatments'] ?? [])}}</div>
            </a>
          </div>
        </div>
      @endforeach

      </div>
      <!-- Departments End -->

          <!-- Quick Reads Start -->
<!--           <h2 class="small-title">Quick Reads</h2>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-xxl-4 g-2">
            <div class="col">
              <div class="card h-100">
                <img src="{{URL::asset('assets/img/blog/small/blog-2.webp')}}" class="card-img-top sh-17" alt="card image" />
                <div class="card-body">
                  <h5 class="heading mb-3">
                    <a href="Articles.Detail.html" class="body-link stretched-link">
                      <span class="clamp-line sh-5" data-line="2">Thousands of devices measure BP. Know which ones to trust</span>
                    </a>
                  </h5>
                  <div>
                    <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                    <span class="align-middle">10 Min</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="{{URL::asset('assets/img/blog/small/blog-3.webp')}}" class="card-img-top sh-17" alt="card image" />
                <div class="card-body">
                  <h5 class="heading mb-3">
                    <a href="Articles.Detail.html" class="body-link stretched-link">
                      <span class="clamp-line sh-5" data-line="2">COVID-19 CPT coding and guidance</span>
                    </a>
                  </h5>
                  <div>
                    <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                    <span class="align-middle">15 Min</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="{{URL::asset('assets/img/blog/small/blog-6.webp')}}" class="card-img-top sh-17" alt="card image" />
                <div class="card-body">
                  <h5 class="heading mb-3">
                    <a href="Articles.Detail.html" class="body-link stretched-link">
                      <span class="clamp-line sh-5" data-line="2">US football coach fired for refusing vaccine</span>
                    </a>
                  </h5>
                  <div>
                    <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                    <span class="align-middle">15 Min</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="{{URL::asset('assets/img/blog/small/blog-5.webp')}}" class="card-img-top sh-17" alt="card image" />
                <div class="card-body">
                  <h5 class="heading mb-3">
                    <a href="Articles.Detail.html" class="body-link stretched-link">
                      <span class="clamp-line sh-5" data-line="2">Ex-pupil begins legal action over infected blood</span>
                    </a>
                  </h5>
                  <div>
                    <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                    <span class="align-middle">25 Min</span>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- Quick Reads End -->
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
      <!-- Layout Footer Start -->
    @endsection

  @section('script')
    <!-- Page Specific Scripts Start -->
    <script src="{{URL::asset('assets/js/cs/glide.custom.js')}}"></script>
    <script src="{{URL::asset('assets/js/pages/articles.js')}}"></script>
    <script src="{{URL::asset('assets/js/common.js')}}"></script>
    <script src="{{URL::asset('assets/js/scripts.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/glide.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/jquery.barrating.min.js')}}"></script>
    <!-- Page Specific Scripts End -->
  @endsection

