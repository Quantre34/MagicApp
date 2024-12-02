   @extends('panel.App')

    @section('content')


    <style type="text/css">
      input[type="radio"]:checked + .treatmentcard {
            box-shadow: 0 0 10px rgb(16 185 224);      
      }
      input[type="checkbox"]:checked + .treatmentcard {
            box-shadow: 0 0 10px rgb(16 185 224);      
      }
    </style>



      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Tedaviler</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="">Anasayfa</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Tedaviler</li>
                </ol>
              </nav>
            </div>
            @if(User('Type')=='0')
            <div class="d-flex align-items-center justify-content-between gap-6">
              <button onclick="SendForm()" class="btn btn-success d-flex align-items-center gap-1 fs-3 py-2 px-9">
                <i class="ti ti-plus fs-4"></i>
                Randevu Oluştur
              </button>
            </div>
            @endif
          </div>


          <div class="card position-relative overflow-hidden">
            <div class="shop-part d-flex w-100">
              <div class="shop-filters flex-shrink-0 border-end d-none d-lg-block">
                <ul class="list-group pt-2 border-bottom rounded-0">
                  <h6 class="my-3 mx-4 fw-semibold">Filter by Category</h6>

                  <li class="list-group-item border-0 p-0 mx-4 mb-2 Category" data-id="All" data-title="Hepsi">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-circles fs-5"></i>Hepsi
                    </a>
                  </li>
                  @foreach($Categories as $Category)
                  <li class="list-group-item border-0 p-0 mx-4 mb-2 Category" data-id="{{$Category['uid']}}" data-title="{{$Category['Title']}}">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1" href="javascript:void(0)">
                      <i class="ti ti-circles fs-5"></i>{{$Category['Title']}}
                    </a>
                  </li>
                  @endforeach
                </ul>
                
                
<!--                 <div class="by-pricing border-bottom rounded-0">
                  <h6 class="mt-4 mb-3 mx-4 fw-semibold">By Pricing</h6>
                  <div class="pb-4 px-4">
                    <div class="form-check py-2 mb-0">
                      <input class="form-check-input p-2" type="radio" name="PriceTag" id="exampleRadios5" value="All" checked>
                      <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios5">
                        All
                      </label>
                    </div>
                    <div class="form-check py-2 mb-0">
                      <input class="form-check-input p-2" type="radio" name="PriceTag" id="exampleRadios6" value="0-1000">
                      <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios6">
                        0-50
                      </label>
                    </div>
                    <div class="form-check py-2 mb-0">
                      <input class="form-check-input p-2" type="radio" name="PriceTag" id="exampleRadios7" value="1000-2000">
                      <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios7">
                        50-100
                      </label>
                    </div>
                    <div class="form-check py-2 mb-0">
                      <input class="form-check-input p-2" type="radio" name="PriceTag" id="exampleRadios8" value="2000-3000">
                      <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios8">
                        100-200
                      </label>
                    </div>
                    <div class="form-check py-2 mb-0">
                      <input class="form-check-input p-2" type="radio" name="PriceTag" id="exampleRadios9" value="4000-5000">
                      <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios9">
                        Over 200
                      </label>
                    </div>
                  </div>
                </div> -->
                
                <div class="p-4">
                  <a href="javascript:void(0)" class="btn btn-primary w-100">Reset Filters</a>
                </div>
              </div>
              <div class="card-body p-4 pb-0">
                <div class="d-flex justify-content-between align-items-center gap-6 mb-4">
                  <a class="btn btn-primary d-lg-none d-flex" data-bs-toggle="offcanvas" href="#filtercategory" role="button" aria-controls="filtercategory">
                    <i class="ti ti-menu-2 fs-6"></i>
                  </a>
                  <h5 class="fs-5 mb-0 d-none d-lg-block ContainerTitle">Treatments</h5>
                  <form class="position-relative">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="searchTreatment" placeholder="Search Product">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                  </form>
                </div>
                
                <form action="panel/appointments/new" method="POST" id="AppointmentForm">
                  @csrf
                  @foreach($Categories as $key=>$Category)
                    <div class="Treatments row "  data-id="{{$Category['uid']}}">
                      
                    @foreach($Category['Treatments'] as $Treatment)
                        
                          <div class="col-sm-6 col-xxl-4 Treatment" data-title="{{$Treatment['Title']}}" data-cost="{{$Treatment['Cost']}}" >
                            <label>
                              <input type="radio" name="Treatments[]" style="display: none;" value="{{$Treatment['uid']}}">
                            <div class="card overflow-hidden rounded-2 border treatmentcard">
                              <div class="position-relative">
                                <a class="hover-img d-block overflow-hidden">
                                  <img src="{{$Treatment['Img']}}" class="card-img-top rounded-0" alt="monster-img">
                                </a>
                                <!-- <a href="javascript:void(0)" class="text-bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
                                  <i class="ti ti-basket fs-4"></i>
                                </a> -->
                              </div>
                              <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">{{$Treatment['Title']}}</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                  <h6 class="fw-semibold fs-4 mb-0">{{$Treatment['Cost']}} €
                                   <!--  <span class="ms-2 fw-normal text-muted fs-3">
                                      <del>$345</del>
                                    </span> -->
                                  </h6>
                                  <ul class="list-unstyled d-flex align-items-center mb-0">
                                    <li>
                                      <a class="me-1" href="javascript:void(0)">
                                        <i class="ti ti-star text-warning"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a class="me-1" href="javascript:void(0)">
                                        <i class="ti ti-star text-warning"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a class="me-1" href="javascript:void(0)">
                                        <i class="ti ti-star text-warning"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a class="me-1" href="javascript:void(0)">
                                        <i class="ti ti-star text-warning"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="javascript:void(0)">
                                        <i class="ti ti-star text-warning"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            </label>
                          </div>
                        
                        @endforeach

                      </div>
                    @endforeach
                    </form>

               
              </div>
              <div class="offcanvas offcanvas-start" tabindex="-1" id="filtercategory" aria-labelledby="filtercategoryLabel">
                <div class="offcanvas-body shop-filters w-100 p-0">
                  <ul class="list-group pt-2 border-bottom rounded-0">
                    <h6 class="my-3 mx-4 fw-semibold">Filter by Category</h6>

                    <li class="list-group-item border-0 p-0 mx-4 mb-2 Category" data-id="All" data-title="Hepsi">
                      <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1" href="javascript:void(0)">
                        <i class="ti ti-circles fs-5"></i>All
                      </a>
                    </li>
                    @foreach($Categories as $Category)
                      <li class="list-group-item border-0 p-0 mx-4 mb-2 Category" data-id="{{$Category['uid']}}" data-title="{{$Category['Title']}}">
                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1 " >
                          <i class="ti ti-hanger fs-5"></i>{{$Category['Title']}}
                        </a>
                      </li>
                    @endforeach
                    
                  </ul>

                  <div class="by-pricing border-bottom rounded-0">
                    <h6 class="mt-4 mb-3 mx-4 fw-semibold">By Pricing</h6>
                    <div class="pb-4 px-4">
                      <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios14" value="option1" checked>
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios14">
                          All
                        </label>
                      </div>
                      <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios15" value="option1">
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios15">
                          0-50
                        </label>
                      </div>
                      <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios16" value="option1">
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios16">
                          50-100
                        </label>
                      </div>
                      <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios17" value="option1">
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios17">
                          100-200
                        </label>
                      </div>
                      <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios18" value="option1">
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios18">
                          Over 200
                        </label>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="p-4">
                    <a href="javascript:void(0)" class="btn btn-primary w-100">Reset Filters</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    @endsection

    @section('script')
    <script type="text/javascript">
      $(document).on('click','.Category', function(){
          $('.Treatments').fadeOut('fast');
          if($(this).data('id')=='All'){
            $('.Treatments').fadeIn('slow');
          }else {
            $('.Treatments[data-id="'+$(this).data('id')+'"]').fadeIn('slow');
          }
          $('.ContainerTitle').text($(this).data('title'));
      });
    function SendForm(){
       if($('#AppointmentForm input:checked').length > 0){
          const form = document.getElementById('AppointmentForm');
          form.submit();
        }else {
          toastr.warning(
            "Lütfen Tedavi seçin!",
            "Bir şey unuttun!",
            {
              positionClass: "toastr toast-bottom-right",
              containerId: "toast-bottom-right",
            }
          );
        }
        
    }
    ///
    $(document).on('change','#searchTreatment', function(){
        $('.Treatment').fadeOut('fast');
        if($(this).val()==''){
          $('.Treatment').fadeIn('slow');
        }else {
          $('.Treatment').each((index,item)=>{
              if($(item).data('title').toLowerCase().includes($(this).val().toLowerCase())){
                  $(item).fadeIn('slow');
              }
          });
        }
        $('.ContainerTitle').text($(this).data('title'));
    });
    ///
    // $(document).on('change','.PriceTag', function(){
    //   $('.Treatment').fadeOut('fast');
    //   if($(this).val()==''){
    //     $('.Treatment').fadeIn('slow');
    //   }else {
    //     $('.Treatment').each((index,item)=>{
    //         if($(item).data('title').toLowerCase().includes($(this).val().toLowerCase())){
    //             $(item).fadeIn('slow');
    //         }
    //     });
    //   }
    //   $('.ContainerTitle').text($(this).data('title'));
    // });
    
    </script>
    @endsection









