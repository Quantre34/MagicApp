
<!DOCTYPE html>
<html lang="en" data-footer="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Medescare | Agency</title>
    <meta name="description" content="Medical Assistant" />
    <link rel="shortcut icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{URL::asset('assets\icon\favicon.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('assets\icon\favicon.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('assets\icon\favicon.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('assets\icon\favicon.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{URL::asset('assets\icon\favicon.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{URL::asset('assets\icon\favicon.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{URL::asset('assets\icon\favicon.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{URL::asset('assets\icon\favicon.png')}}" />

    @yield("style")

    <link rel="icon" type="image/png" href="{{URL::asset('assets\icon\favicon.png')}}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{URL::asset('assets\icon\favicon.png')}}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{URL::asset('assets\icon\favicon.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{URL::asset('assets\icon\favicon.png')}}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{URL::asset('assets\icon\favicon.png')}}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{URL::asset('assets\icon\favicon.png')}}" />
    <meta name="msapplication-square70x70logo" content="{{URL::asset('assets\icon\favicon.png')}}" />
    <meta name="msapplication-square150x150logo" content="{{URL::asset('assets\icon\favicon.png')}}" />
    <meta name="msapplication-wide310x150logo" content="{{URL::asset('assets\icon\favicon.png')}}" />
    <meta name="msapplication-square310x310logo" content="{{URL::asset('assets\icon\favicon.png')}}" />
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::asset('assets/font/CS-Interface/style.css')}}" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap.min.css')}}" />




    <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/OverlayScrollbars.min.css')}}" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/styles.css')}}"/>
    <!-- Template Base Styles End -->

    <!--  Cell input with COuntry Code -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <style type="text/css">
      main{
        padding-left: 3%!important;
        padding-top: 0px !important;
      }
      .intl-tel-input {
        display: table-cell;
      }
      .intl-tel-input .selected-flag {
        z-index: 4;
      }
      .intl-tel-input .country-list {
        z-index: 5;
      }
      .input-group .intl-tel-input .form-control {
        border-top-left-radius: 4px;
        border-top-right-radius: 0;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 0;
      }
      .iti {
        width: 100% !important;
      }
      .card .card-body, .card .card-footer, .card .card-header {
        padding: 2px 0px 0px 15px !important;
      }
.pulse{
    border-radius: 15%;
    animation: Pulse 1s linear infinite
}
@keyframes Pulse{
    0%{
        box-shadow: 0 0 0 0 var(--warning-darker) , 0 0 0 0 var(--warning-darker)
    }
    40%{
        box-shadow: 0 0 0 1px var(--warning-darker) , 0 0 0 0 var(--warning-darker)
    }
    80%{
        box-shadow: 0 0 0 2px var(--warning-darker) , 0 0 0 1.5px var(--warning-darker)
    }
    100%{
        box-shadow: 0 0 0 0 var(--warning-darker) , 0 0 0 1.5px var(--warning-darker)
    }
}


/*@media screen (max-width:1050px){
  .logo > img {
    width:125px!important;
    height: 35px;
  }
}*/
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <!--  Cell input with COuntry Code -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="{{URL::asset('assets/js/sweetalert.min.js')}}"></script>

    <link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}" />
    <script src="{{URL::asset('assets/js/base/loader.js')}}"></script>
    <script type="text/javascript">
      /*---------------*/
      function SweetSelect(Id){
                  if (document.getElementById(Id) !== null && jQuery().select2) {
              jQuery('#'+Id).select2({minimumResultsForSearch: Infinity, placeholder: ''});
              return true;
            }
      }
      /*---------------*/
  </script>


    <!-- hold on -->
    <link href="{{URL::asset('assets/css/HoldOn.css')}}" rel="stylesheet">
    <script type="text/javascript">var options={theme:"sk-circle",message:'Yükleniyor',textColor:"white"};</script>
    <!-- hold on -->
  </head>

<div class="row mt-5 ms-6">
    <div class="col-6">
      <h1 class="text-uppercase">@Lang('OrderDetail.OrderDetail')</h1>
    </div>
    <div class="col-6 d-flex justify-content-end ">
      <button onclick="PrintAppInfo()" class="me-7 btn btn-primary">Çıktı al</button>
    </div>
</div>
<main id="main">
      <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container appointment-card">
          <div class="row">
            <!-- Top Buttons Start -->
            <div class="col-12 col-md-5 d-flex align-items-end justify-content-end">
            </div>
            <!-- Top Buttons End -->
          </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row gx-4 gy-1">
          <div class="col-12 col-xl-12 col-xxl-12 mb-1">
            <!-- Status Start -->
            <div class="mb-1">
              <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-6">
                  <div class="card sh-13 sh-lg-15 sh-xl-14">
                    <div class="h-100 row g-0 card-body align-items-center py-3">
                      <div class="col-auto pe-3">
                        <div class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-tag text-primary"><path d="M8.05025 2.5C8.66225 2.5 8.96824 2.5 9.25214 2.58612C9.37751 2.62415 9.49883 2.6744 9.61437 2.73616C9.87601 2.87601 10.0924 3.09238 10.5251 3.52513L16.0251 9.02514C17.0182 10.0182 17.5148 10.5148 17.6331 11.1098C17.6844 11.3674 17.6844 11.6326 17.6331 11.8902C17.5148 12.4852 17.0182 12.9818 16.0251 13.9749L13.9749 16.0251C12.9818 17.0182 12.4852 17.5148 11.8902 17.6331C11.6326 17.6844 11.3674 17.6844 11.1098 17.6331C10.5148 17.5148 10.0182 17.0182 9.02512 16.0251L3.52513 10.5251C3.09238 10.0924 2.87601 9.87601 2.73616 9.61437C2.6744 9.49883 2.62415 9.37751 2.58612 9.25214C2.5 8.96825 2.5 8.66225 2.5 8.05025L2.5 6C2.5 4.59554 2.5 3.89331 2.83706 3.38886C2.98298 3.17048 3.17048 2.98298 3.38886 2.83706C3.89331 2.5 4.59554 2.5 6 2.5L8.05025 2.5Z"></path><path d="M5.5 6C5.5 5.72386 5.72386 5.5 6 5.5V5.5C6.27614 5.5 6.5 5.72386 6.5 6V6C6.5 6.27614 6.27614 6.5 6 6.5V6.5C5.72386 6.5 5.5 6.27614 5.5 6V6Z"></path></svg>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center lh-1-25">@Lang('OrderDetail.AppKey')</div>
                        <div class="text-primary">{{$Order['uid']}}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                  <div class="card sh-13 sh-lg-15 sh-xl-14">
                    <div class="h-100 row g-0 card-body align-items-center py-3">
                      <div class="col-auto pe-3">
                        <div class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-clipboard text-primary"><path d="M6 3.88235V3.88235C5.06812 3.88235 4.60218 3.88235 4.23463 4.0346C3.74458 4.23758 3.35523 4.62693 3.15224 5.11699C3 5.48453 3 5.95047 3 6.88236V14.5C3 15.9045 3 16.6067 3.33706 17.1111C3.48298 17.3295 3.67048 17.517 3.88886 17.6629C4.39331 18 5.09554 18 6.5 18H13.5C14.9045 18 15.6067 18 16.1111 17.6629C16.3295 17.517 16.517 17.3295 16.6629 17.1111C17 16.6067 17 15.9045 17 14.5V6.88235C17 5.95047 17 5.48453 16.8478 5.11699C16.6448 4.62693 16.2554 4.23758 15.7654 4.0346C15.3978 3.88235 14.9319 3.88235 14 3.88235V3.88235"></path><path d="M6 3.41176C6 3.02851 6 2.83688 6.05184 2.68221C6.1515 2.38487 6.38487 2.1515 6.68221 2.05184C6.83688 2 7.02851 2 7.41176 2H12.5882C12.9715 2 13.1631 2 13.3178 2.05184C13.6151 2.1515 13.8485 2.38487 13.9482 2.68221C14 2.83688 14 3.02851 14 3.41176V3.41176C14 3.79502 14 3.98665 13.9482 4.14132C13.8485 4.43866 13.6151 4.67203 13.3178 4.77169C13.1631 4.82353 12.9715 4.82353 12.5882 4.82353H7.41177C7.02851 4.82353 6.83688 4.82353 6.68221 4.77169C6.38487 4.67203 6.1515 4.43866 6.05184 4.14132C6 3.98665 6 3.79502 6 3.41176V3.41176Z"></path></svg>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center lh-1-25">@Lang('OrderDetail.PaymentStatus')</div>
                            <div class="text-primary">Not Completed</div>                      
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                  <div class="card sh-13 sh-lg-15 sh-xl-14">
                    <div class="h-100 row g-0 card-body align-items-center py-3">
                      <div class="col-auto pe-3">
                        <div class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-calendar text-primary"><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 14.5C18 15.9045 18 16.6067 17.6629 17.1111C17.517 17.3295 17.3295 17.517 17.1111 17.6629C16.6067 18 15.9045 18 14.5 18L5.5 18C4.09554 18 3.39331 18 2.88886 17.6629C2.67048 17.517 2.48298 17.3295 2.33706 17.1111C2 16.6067 2 15.9045 2 14.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path><path d="M2 9H18M7 2 7 5.5M13 2 13 5.5M5 15H6"></path></svg>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center lh-1-25">@Lang('OrderDetail.AppointmentDate')</div>
                        <div class="text-primary">{{ date('Y-m-d', strtotime($Order['AppointmentDate'])) }} -- {{ date('Y-m-d', strtotime($Order['AppointmentDate'].'+'.$Order['Treatment']['EstimatedTime'].' days')) }}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                  <div class="card sh-13 sh-lg-15 sh-xl-14">
                    <div class="h-100 row g-0 card-body align-items-center py-3">
                      <div class="col-auto pe-3">
                        <div class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-shipping text-primary"><path d="M2 2H3.33333C4.38252 2 5.37049 2.49398 6 3.33333V3.33333C6.32456 3.76607 6.5 4.29241 6.5 4.83333V11.5C6.5 12.6046 7.39543 13.5 8.5 13.5H17"></path><path d="M15.25 4C15.9522 4 16.3033 4 16.5556 4.16853C16.6648 4.24149 16.7585 4.33524 16.8315 4.44443C17 4.69665 17 5.04777 17 5.75L17 9.25C17 9.95223 17 10.3033 16.8315 10.5556C16.7585 10.6648 16.6648 10.7585 16.5556 10.8315C16.3033 11 15.9522 11 15.25 11L10.75 11C10.0478 11 9.69665 11 9.44443 10.8315C9.33524 10.7585 9.24149 10.6648 9.16853 10.5556C9 10.3033 9 9.95223 9 9.25L9 5.75C9 5.04777 9 4.69665 9.16853 4.44443C9.24149 4.33524 9.33524 4.24149 9.44443 4.16853C9.69665 4 10.0478 4 10.75 4L15.25 4Z"></path><path d="M13 4V7"></path><path d="M7 15.5C7 14.6716 7.67158 14 8.5 14V14C9.32843 14 10 14.6716 10 15.5V15.5C10 16.3284 9.32842 17 8.5 17V17C7.67157 17 7 16.3284 7 15.5V15.5zM13 15.5C13 14.6716 13.6716 14 14.5 14V14C15.3284 14 16 14.6716 16 15.5V15.5C16 16.3284 15.3284 17 14.5 17V17C13.6716 17 13 16.3284 13 15.5V15.5z"></path></svg>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center lh-1-25">@Lang('OrderDetail.Agency')</div>
                        <div class="text-primary">{{$Order['Agency']['Title']}}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Status End -->



            <!-- Cart Start -->
<!--             <div class="card mb-1">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-1">
                    <div class="row g-0 d-flex align-items-middle">
                      <div class="col-9 ">
                        <h3 class="text-primary">Tedavi adı</h3>
                        <p> Vip transfer ( 6 days )</p>
                        <p> Vip Accommodation ( 6 days )</p>
                        <p> my note for this appointment</p>
                        <p>standart paket</p>
                      </div>
                      <div class="col-3 me-1">
                        <p>100€</p>
                      </div>
                    </div>
                    </div>                
                  </div>
                </div>
              </div>
            </div> -->
            <!-- Cart End -->

            <!-- Cart Start -->
            <div class="card mb-2">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="mt-2">
                      @php $Total = 0; @endphp
                        <div class="row ">
                          <div class="col-auto">
                            <img src="{{$Order['Treatment']['Img']}}" class="card-img rounded-md h-100 sw-13" alt="thumb" />
                          </div>
                          <div class="col">
                            <div class="ps-4 pt-0 pb-0 pe-0 h-100">
                              <div class="row g-0 h-100 align-items-start align-content-center">
                                <div class="col-12 d-flex flex-column mb-2">
                                  <a href="#"><div style="font-size: 20px;font-weight: bold;">{{$Order['Treatment']['Title']}}</div></a>
                                </div>
                                <div class="col-12 d-flex flex-column mb-md-0 pt-1">
                                  <div class="row g-0">
                                    <div class="col-6 d-flex flex-row pe-2 align-items-end text-alternate">
                                      <span>
                                        @Lang('OrderDetail.TreatmentCost'): {{$Order['Treatment']['Cost']}}
                                        <span class="text-small">£</span>
                                      </span>
                                    </div>
                                  </div>
                                  <?php 
                                      $UnitTotal = $Order['Treatment']['Cost'];
                                      $FeatureTotal = 0;
                                  ?>
                                  @foreach($Order['Features'] as $Feature)
<!--                                     <div class="row">
                                      <div class="col-4 d-flex flex-row pe-2 align-items-end text-alternate">
                                        <span>{{$Feature['Title']}}</span>
                                        <span class="text-muted ms-1 me-1">:</span>
                                        <span>
                                          {{ $FeatureCost = ($Feature['Multiply']=='1')? $Order['Treatment']['EstimatedTime'] * $Feature['Cost'] : $Feature['Cost']}}
                                        </span>
                                        <span class="text-small">£</span>
                                      </div>
                                    </div> -->
                                    <?php
                                      $FeatureTotal += $FeatureCost;
                                      $UnitTotal += $FeatureCost;
                                    ?>
                                  @endforeach
                                  <div class="row">
                                    <div class="col-4 d-flex flex-row pe-2 align-items-end text-alternate">
                                      <span>{{$Order['Package']['Title']}}</span>
                                      <span class="text-muted ms-1 me-1">:</span>
                                      <span>
                                        {{ (($Order['Package']['Rate'] * $Order['Treatment']['Cost']) / 100) + $FeatureTotal }}
                                        <?php $UnitTotal += ($Order['Package']['Rate'] * $Order['Treatment']['Cost']) / 100; ?>
                                      </span>
                                      <span class="text-small">£</span>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <?php 
                          $Total += $UnitTotal + ($Order['AgencyFee'] * $Order['Treatment']['Cost']) / 100;
                        ?>

                    </div>
                    @if(!isMobile())
                    <div class="row me-3">

                      <div class="row g-0 mb-2">
                        <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.PaidAmount')</div>
                        <div class="col-auto sw-13 text-end">
                          <span>
                            <span class="text-small text-muted">£</span>
                            {{intval($Order['PaidAmount'])}}
                            <?php $Remain = $Total - $Order['PaidAmount']; ?>
                          </span>
                        </div>
                      </div>

                      <div class="row g-0 mb-2">
                        <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.Remaining')</div>
                        <div class="col-auto sw-13 text-end">
                          <span>
                            <span class="text-small text-muted">£</span>
                            <?php $Remain - ($Order['AgencyFee'] * $Order['Treatment']['Cost']) / 100 ?>
                            {{ intval($Remain) }}
                          </span>
                        </div>
                      </div>

                      <div class="row g-0 mb-2">
                        <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.Total')</div>
                        <div class="col-auto sw-13 text-end">
                          <span>
                            <span class="text-small text-muted">£</span>
                            {{intval($Total)}}
                          </span> 
                        </div>
                      </div>
                    </div>

                    @endif
                  </div>
                </div>
              </div>
            </div>
            <!-- Cart End -->

                  @if(isMobile())
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="row me-3">
                          <div class="row g-0 mb-2">
                            <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.PaidAmount')</div>
                            <div class="col-auto sw-13 text-end">
                              <span>
                                <span class="text-small text-muted">£</span>
                                {{intval($Order['PaidAmount'])}}
                                <?php $Remain = $Total - $Order['PaidAmount']; ?>
                              </span>
                            </div>
                          </div>
                          <div class="row g-0 mb-2">
                            <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.Remaining')</div>
                            <div class="col-auto sw-13 text-end">
                              <span>
                                <span class="text-small text-muted">£</span>
                                <?php $Remain - ($Order['AgencyFee'] * $Order['Treatment']['Cost']) / 100 ?>
                                {{ intval($Remain) }}
                              </span>
                            </div>
                          </div>
                          <div class="row g-0 mb-2">
                            <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.Total')</div>
                            <div class="col-auto sw-13 text-end">
                              <span>
                                <span class="text-small text-muted">£</span>
                                {{intval($Total)}}
                              </span> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif

            <!-- Cart Start -->
            <div class="card mb-1">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-1">
                    <div class="row g-0 d-flex align-items-middle">

                      <div class="col-3 ">
                        <h3>@Lang('OrderDetail.Client')</h3>
                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-user text-primary"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate align-middle">{{$Order['Client']['FirstName']}} {{$Order['Client']['LastName']}}</div>
                        </div>

                        <div class="row g-0 mb-2">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-email text-primary"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate">{{$Order['Client']['Mail']}}</div>
                        </div>

                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-link text-primary"><path d="M7 6.00003 6.00001 6.00002C5.07004 6.00002 4.60506 6.00001 4.22356 6.10223 3.18828 6.37963 2.37962 7.18828 2.10222 8.22356 2 8.60506 2 9.07004 2 10V10C2 10.93 2 11.395 2.10222 11.7764 2.37962 12.8117 3.18827 13.6204 4.22355 13.8978 4.60505 14 5.07003 14 5.99999 14H7M13 6.00003 14 6.00002C14.93 6.00002 15.3949 6.00001 15.7764 6.10223 16.8117 6.37963 17.6204 7.18828 17.8978 8.22356 18 8.60506 18 9.07004 18 10V10C18 10.93 18 11.395 17.8978 11.7764 17.6204 12.8117 16.8117 13.6204 15.7764 13.8978 15.395 14 14.93 14 14 14H13M7 10H13"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate">{{$Order['Client']['Identification']}}</div>
                        </div>


                      </div>
 
                      <div class="col-3 ">
                        <h3>@Lang('OrderDetail.Agency')</h3>


                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-email text-primary"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate align-middle">{{$Order['Agency']['Title']}}</div>
                        </div>

                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-user text-primary"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate align-middle">{{$Order['User']['FirstName']}} {{$Order['User']['LastName']}}</div>
                        </div>



                      </div>

                      <div class="col-3 ">
                        <h3>@Lang('OrderDetail.Background')</h3>

                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-user text-primary"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate align-middle">@Lang('OrderDetail.Smoke'): {{$Order['Client']['Background']['Smoke'] ?? 'Not User'}}</div>
                        </div>

                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-pin text-primary"><path d="M3.5 8.49998C3.5 -0.191432 16.5 -0.191368 16.5 8.49998C16.5 12.6585 12.8256 15.9341 11.0021 17.3036C10.4026 17.7539 9.59777 17.754 8.99821 17.3037C7.17467 15.9342 3.5 12.6585 3.5 8.49998Z"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate">@Lang('OrderDetail.Alcohol'): {{$Order['Client']['Background']['Alcohol'] ?? 'Not User'}}</div>
                        </div>

                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-phone text-primary"><path d="M2.36839 7.02416C2.12354 6.39146 2.25595 5.68011 2.67976 5.15035L4.20321 3.24603C5.07388 2.1577 6.76286 2.27131 7.47994 3.46644L8.71763 5.52926C8.89353 5.82244 8.90746 6.18516 8.75456 6.49097L8.10563 7.78883C8.0362 7.92769 7.99726 8.08102 8.00921 8.2358C8.15129 10.0757 9.92438 11.8487 11.7642 11.9908C11.919 12.0028 12.0723 11.9638 12.2112 11.8944L13.5091 11.2455C13.8149 11.0926 14.1776 11.1065 14.4708 11.2824L16.5336 12.5201C17.7287 13.2372 17.8423 14.9262 16.754 15.7968L14.8497 17.3203C14.3199 17.7441 13.6086 17.8765 12.9759 17.6317C7.87729 15.6586 4.34147 12.1228 2.36839 7.02416Z"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate">@Lang('OrderDetail.Alergy'): {{$Order['Client']['Background']['Alergy']?? 'No Alergy'}}</div>
                        </div>

                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-phone text-primary"><path d="M2.36839 7.02416C2.12354 6.39146 2.25595 5.68011 2.67976 5.15035L4.20321 3.24603C5.07388 2.1577 6.76286 2.27131 7.47994 3.46644L8.71763 5.52926C8.89353 5.82244 8.90746 6.18516 8.75456 6.49097L8.10563 7.78883C8.0362 7.92769 7.99726 8.08102 8.00921 8.2358C8.15129 10.0757 9.92438 11.8487 11.7642 11.9908C11.919 12.0028 12.0723 11.9638 12.2112 11.8944L13.5091 11.2455C13.8149 11.0926 14.1776 11.1065 14.4708 11.2824L16.5336 12.5201C17.7287 13.2372 17.8423 14.9262 16.754 15.7968L14.8497 17.3203C14.3199 17.7441 13.6086 17.8765 12.9759 17.6317C7.87729 15.6586 4.34147 12.1228 2.36839 7.02416Z"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate">@Lang('OrderDetail.PreviousOperations'): {{$Order['Client']['Background']['PrevOperations']}}</div>
                        </div>
                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-phone text-primary"><path d="M2.36839 7.02416C2.12354 6.39146 2.25595 5.68011 2.67976 5.15035L4.20321 3.24603C5.07388 2.1577 6.76286 2.27131 7.47994 3.46644L8.71763 5.52926C8.89353 5.82244 8.90746 6.18516 8.75456 6.49097L8.10563 7.78883C8.0362 7.92769 7.99726 8.08102 8.00921 8.2358C8.15129 10.0757 9.92438 11.8487 11.7642 11.9908C11.919 12.0028 12.0723 11.9638 12.2112 11.8944L13.5091 11.2455C13.8149 11.0926 14.1776 11.1065 14.4708 11.2824L16.5336 12.5201C17.7287 13.2372 17.8423 14.9262 16.754 15.7968L14.8497 17.3203C14.3199 17.7441 13.6086 17.8765 12.9759 17.6317C7.87729 15.6586 4.34147 12.1228 2.36839 7.02416Z"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate">@Lang('OrderDetail.PreviousDiagnosis'): {{$Order['Client']['Background']['PrevDiagnosis']}}</div>
                        </div>
                      </div>

                      <div class="col-3 ">
                        <h3>@Lang('OrderDetail.Payment')</h3>
                        <div class="row g-0 mb-1">
                          <div class="col-auto">
                            <div class="sw-3 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-credit-card text-primary"><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path><path d="M5 7H14.5"></path><path d="M8 11.5C8 11.0341 8 10.8011 7.92388 10.6173C7.82239 10.3723 7.62771 10.1776 7.38268 10.0761C7.19891 10 6.96594 10 6.5 10V10C6.03406 10 5.80109 10 5.61732 10.0761C5.37229 10.1776 5.17761 10.3723 5.07612 10.6173C5 10.8011 5 11.0341 5 11.5V11.5C5 11.9659 5 12.1989 5.07612 12.3827C5.17761 12.6277 5.37229 12.8224 5.61732 12.9239C5.80109 13 6.03406 13 6.5 13V13C6.96594 13 7.19891 13 7.38268 12.9239C7.62771 12.8224 7.82239 12.6277 7.92388 12.3827C8 12.1989 8 11.9659 8 11.5V11.5Z"></path></svg>
                            </div>
                          </div>
                          <div class="col text-alternate">{{$Order['PaymentMethod']['Title']??''}}</div>
                        </div>
                      </div>


                    </div>
                    </div>                
                  </div>
                </div>
              </div>
            </div>
            <!-- Cart End -->


          </div>



        </div>
      </div>
    </main>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>



    <!-- Vendor Scripts Start -->
    <script src="{{URL::asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/OverlayScrollbars.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/autoComplete.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/clamp.min.js')}}"></script>
    <script src="{{URL::asset('assets/icon/acorn-icons.js')}}"></script>
    <script src="{{URL::asset('assets/icon/acorn-icons-interface.js')}}"></script>
    <script src="{{URL::asset('assets/icon/acorn-icons-medical.js')}}"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="{{URL::asset('assets/js/base/helpers.js')}}"></script>
    <script src="{{URL::asset('assets/js/base/globals.js')}}"></script>
    <script src="{{URL::asset('assets/js/base/nav.js')}}"></script>
    <script src="{{URL::asset('assets/js/base/search.js')}}"></script>
    <script src="{{URL::asset('assets/js/base/settings.js')}}"></script>
    <!-- Template Base Scripts End -->
    <script src="{{URL::asset('assets/js/pages/consult.js')}}"></script>

    <!-- icons -->
    <!-- <script src="{{URL::asset('assets/icon/acorn-icons.js')}}"></script> -->
    <script src="{{URL::asset('assets/icon/acorn-icons-commerce.js')}}"></script>
    <!-- <script src="{{URL::asset('assets/icon/acorn-icons-interface.js')}}"></script> -->
    <script src="{{URL::asset('assets/icon/acorn-icons-learning.js')}}"></script>
    <!-- <script src="{{URL::asset('assets/icon/acorn-icons-medical.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- Page Specific Scripts End -->



    <script src="{{URL::asset('assets/js/HoldOn.js')}}"></script>


<script type="text/javascript">
  function PrintAppInfo(){
      var restore=document.body.innerHTML;
      var printcontent=document.getElementById("main").innerHTML;
      document.body.innerHTML=printcontent;
      window.print();
      document.body.innerHTML=restore;
  }
</script>



  </body>
</html>
