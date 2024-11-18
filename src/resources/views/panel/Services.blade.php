   @extends('panel.App')

    @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">

          @foreach($Categories as $Category)
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">{{$Category['Title']}}</h4>
            </div>
          </div>

          <div class="row el-element-overlay">
            @foreach($Category['Treatments'] as $Treatment)
              <div class="col-lg-3 col-md-6">
                <div class="card overflow-hidden">
                  <div class="el-card-item pb-3">
                    <div class="
                        el-card-avatar
                        mb-3
                        el-overlay-1
                        w-100
                        overflow-hidden
                        position-relative
                        text-center
                      ">
                      <img src="{{$Treatment['Img']}}" class="d-block position-relative w-100" alt="user" />
                      <div class="el-overlay w-100 overflow-hidden">
                        <ul class="
                            list-style-none
                            el-info
                            text-white text-uppercase
                            d-inline-block
                            p-0
                          ">
                          <li class="el-item d-inline-block my-0 mx-1">
                            <a class="
                                btn
                                default
                                btn-outline
                                image-popup-vertical-fit
                                el-link
                                text-white
                                border-white
                              " href="assets/panel/images/blog/blog-img1.jpg">
                              <i class="ti ti-search"></i>
                            </a>
                          </li>
                          <li class="el-item d-inline-block my-0 mx-1">
                            <a class="
                                btn
                                default
                                btn-outline
                                el-link
                                text-white
                                border-white
                              " href="javascript:void(0);">
                              <i class="ti ti-link"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="el-card-content text-center">
                      <h4 class="mb-0 card-title">{{$Treatment['Title']}}</h4>
                      <p class="card-subtitle"><?= FormatEuros($Treatment['Cost']); ?>$</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          @endforeach

        </div>
      </div>
    @endsection