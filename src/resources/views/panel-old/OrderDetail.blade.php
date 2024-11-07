@extends('panel.app')
  @section('content')
    <main>
      <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
          <div class="row">
            <!-- Title Start -->
            <div class="col-auto mb-3 mb-md-0 me-auto">
              <div class="w-auto sw-md-30">
                <a href="/panel/Appointments" class="muted-link pb-1 d-inline-block breadcrumb-back">
                  <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                  <span class="text-small align-middle">@Lang('OrderDetail.Appointments')</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title"> @Lang('OrderDetail.OrderDetail') </h1>
              </div>
            </div>
            <!-- Title End -->

            <!-- Top Buttons Start -->
            <div class="col-12 col-md-5 d-flex align-items-end justify-content-end">
              <!-- Status Button Start -->
<!--               <div class="dropdown-as-select w-100 w-md-auto">
                <button
                  class="btn btn btn-outline-primary w-100 w-md-auto dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                ></button>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="#">Status: Pending</a>
                  <a class="dropdown-item" href="#">Status: Shipped</a>
                  <a class="dropdown-item active" href="#">Status: Delivered</a>
                </div>
              </div> -->
              <!-- Status Button End -->

              <!-- Dropdown Button Start -->
<!--               <div class="ms-1">
                <button
                  type="button"
                  class="btn btn-outline-primary btn-icon btn-icon-only"
                  data-bs-offset="0,3"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  data-submenu
                >
                  <i data-acorn-icon="more-horizontal"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                  <button class="dropdown-item" type="button">Edit</button>
                  <button class="dropdown-item" type="button">View Invoice</button>
                  <button class="dropdown-item" type="button">Track Package</button>
                </div>
              </div> -->
              <!-- Dropdown Button End -->
            </div>
            <!-- Top Buttons End -->
          </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row gx-4 gy-5">
          <div class="col-12 col-xl-8 col-xxl-9 mb-n5">
            <!-- Status Start -->
            <h2 class="small-title">@Lang('OrderDetail.Appointment')</h2>
            <div class="mb-5">
              <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-6">
                  <div class="card sh-13 sh-lg-15 sh-xl-14">
                    <div class="h-100 row g-0 card-body align-items-center py-3">
                      <div class="col-auto pe-3">
                        <div class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="tag" class="text-primary"></i>
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
                          <i data-acorn-icon="clipboard" class="text-primary"></i>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center lh-1-25">@Lang('OrderDetail.PaymentStatus')</div>
                            <?php 
                                if($Order['Status']=='1'){
                                    if ($Order['PaymentStatus']=='0') {
                                        echo '<div class="text-primary">Ödeme Yapılmadı</div>';
                                    }elseif($Order['PaymentStatus']=='1'){
                                        echo '<div class="text-primary">Ödeme Alındı</div>';
                                    }else {
                                        echo '<div class="text-primary">Ödeme İade Edildi</div>';
                                    }
                                }elseif($Order['Status']=='2') {
                                    echo '<div class="text-danger">İptal Edildi</div>';
                                }elseif($Order['Status']=='3') {
                                    echo '<div class="text-danger">Teslim Edildi</div>';
                                }
                            ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                  <div class="card sh-13 sh-lg-15 sh-xl-14">
                    <div class="h-100 row g-0 card-body align-items-center py-3">
                      <div class="col-auto pe-3">
                        <div class="border border-primary sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="calendar" class="text-primary"></i>
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
                          <i data-acorn-icon="shipping" class="text-primary"></i>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center lh-1-25">@Lang('OrderDetail.Agency')</div>
                        <div class="text-primary">{{$Order['Agency']['Title']??''}}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Status End -->

            <!-- Cart Start -->
            <h2 class="small-title">@Lang('OrderDetail.Content')</h2>
            <div class="card mb-5">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">

                    <div class="row mb-5">
                      @php $Total = 0; @endphp
                        <div class="row   ">
                          <div class="col-auto">
                            <img src="{{$Order['Treatment']['Img']}}" class="card-img rounded-md h-100 sw-13" alt="thumb" style="height: 30vh;" />
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
                                        Treatment Cost: {{$Order['Treatment']['Cost']}}
                                        <span class="text-small">€</span>
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
                                        <span class="text-small">€</span>
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
                                      <span class="text-small">€</span>
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
                    <div class="row mt-3">

                      <div class="row mb-2">
                        <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.SubTotal')</div>
                        <div class="col-auto sw-13 text-end">
                          <span>
                            <span class="text-small text-muted">€</span>
                            {{$Total}}
                          </span>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.PaidAmount')</div>
                        <div class="col-auto sw-13 text-end">
                          <span>
                            <span class="text-small text-muted">€</span>
                            {{intval($Order['PaidAmount'])}}
                            <?php $Remain = $Total - $Order['PaidAmount']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="row  mb-2">
                        <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.AgencyFee')</div>
                        <div class="col-auto sw-13 text-end">
                          <span>
                            <span class="text-small text-muted">€</span>
                            {{($Order['AgencyFee'] * $Order['Treatment']['Cost']) / 100}}
                          </span>
                        </div>
                      </div>
                      <div class="row  mb-2">
                        <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.Remaining')</div>
                        <div class="col-auto sw-13 text-end">
                          <span>
                            <span class="text-small text-muted">€</span>
                            <?php $Remain - ($Order['AgencyFee'] * $Order['Treatment']['Cost']) / 100 ?>
                            {{ intval($Remain) }}
                          </span>
                        </div>
                      </div>
                      <div class="row  mb-2">
                        <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.Total')</div>
                        <div class="col-auto sw-13 text-end">
                          <span>
                            <span class="text-small text-muted">€</span>
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
            <div class="card">
              <div class="card-body">
                <div class="row mt-5">

              <div class="row g-0 mb-2">
                <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.SubTotal')</div>
                <div class="col-auto sw-13 text-end">
                  <span>
                    <span class="text-small text-muted">€</span>
                    {{$Total}}
                  </span>
                </div>
              </div>
              <div class="row g-0 mb-2">
                <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.PaidAmount')</div>
                <div class="col-auto sw-13 text-end">
                  <span>
                    <span class="text-small text-muted">€</span>
                    {{intval($Order['PaidAmount'])}}
                    <?php $Remain = $Total - $Order['PaidAmount']; ?>
                  </span>
                </div>
              </div>
              <div class="row g-0 mb-2">
                <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.AgencyFee')</div>
                <div class="col-auto sw-13 text-end">
                  <span>
                    <span class="text-small text-muted">€</span>
                    {{($Order['AgencyFee'] * $Order['Treatment']['Cost']) / 100}}
                  </span>
                </div>
              </div>
              <div class="row g-0 mb-2">
                <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.Remaining')</div>
                <div class="col-auto sw-13 text-end">
                  <span>
                    <span class="text-small text-muted">€</span>
                    <?php $Remain - ($Order['AgencyFee'] * $Order['Treatment']['Cost']) / 100 ?>
                    {{ intval($Remain) }}
                  </span>
                </div>
              </div>
              <div class="row g-0 mb-2">
                <div class="col-auto ms-auto ps-3 text-muted">@Lang('OrderDetail.Total')</div>
                <div class="col-auto sw-13 text-end">
                  <span>
                    <span class="text-small text-muted">€</span>
                    {{intval($Total)}}
                  </span>
                </div>
              </div>

            </div>
              </div>
            </div>
            @endif
            <!-- Activity Start -->
            <h2 class="small-title">@Lang('OrderDetail.ActivityFlow')</h2>
            <div class="card mb-5">
              <div class="card-body">

                <div class="row g-0">
                  <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex sh-1"></div>
                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                      <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                  </div>
                  <div class="col mb-4">
                    <div class="h-100">
                      <div class="d-flex flex-column justify-content-start">
                        <div class="d-flex flex-column">
                          <a href="#" class="heading stretched-link">@Lang('OrderDetail.AppointmentScheduled')</a>
                          <div class="text-alternate">{{$Order['create_at']}}</div>
                          <!-- <div class="text-muted mt-1">Biscuit donut powder sugar plum pastry. Chupa chups topping pastry halvah.</div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                @if($Order['PaymentStatus']=='1')
                  <div class="row g-0">

                      <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                        <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                          <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                        </div>

                        <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                          <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                        </div>

                        <div class="w-100 d-flex h-100 justify-content-center position-relative">
                          <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                        </div>

                      </div>

                      <div class="col mb-4">
                        <div class="h-100">
                          <div class="d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                              <a href="#" class="heading stretched-link">@Lang('OrderDetail.PaymentReceived')</a>
                              <div class="text-alternate">{{$Order['update_at']}}</div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                @endif
                @if($Order['Status']=='2')
                <div class="row g-0">
                  <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                      <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative"></div>
                  </div>
                  <div class="col">
                    <div class="h-100">
                      <div class="d-flex flex-column justify-content-start">
                        <div class="d-flex flex-column">
                          <a href="#" class="heading stretched-link pt-0 text-danger">@Lang('OrderDetail.Canceled')</a>
                          <div class="text-alternate">{{$Order['update_at']}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @elseif($Order['Status']=='3')
                <div class="row g-0">
                  <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                      <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative"></div>
                  </div>
                  <div class="col">
                    <div class="h-100">
                      <div class="d-flex flex-column justify-content-start">
                        <div class="d-flex flex-column">
                          <a href="#" class="heading stretched-link pt-0 text-success">@Lang('OrderDetail.Completed')</a>
                          <div class="text-alternate">{{$Order['update_at']}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </div>
            <!-- Activity End -->
          </div>

          <!-- Address Start -->
          <div class="col-12 col-xl-4 col-xxl-3">
            <h2 class="small-title">@Lang('OrderDetail.Client') / @Lang('OrderDetail.Background')</h2>
            <div class="card mb-5">
              <div class="card-body mb-n5">
                <div class="mb-5">
                  <p class="text-small text-muted mb-2">@Lang('OrderDetail.Client')</p>

                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate align-middle">{{$Order['Client']['FirstName']}} {{$Order['Client']['LastName']}}</div>
                  </div>

                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate">{{$Order['Client']['Mail']}}</div>
                  </div>
                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="link" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate">{{$Order['Client']['Identification']}}</div>
                  </div>

                </div>

                <div class="mb-5">
                  <p class="text-small text-muted mb-2">@Lang('OrderDetail.Agency')</p>

                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate align-middle">{{$Order['User']['FirstName']??''}} {{$Order['User']['LastName']??''}}</div>
                  </div>

                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate align-middle">@Lang('OrderDetail.AgencyFee'): {{$Order['AgencyFee']}}%</div>
                  </div>

                </div>

                <div class="mb-5">
                  <p class="text-small text-muted mb-2">@Lang('OrderDetail.Background')</p>
                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate align-middle">@Lang('OrderDetail.Smoke'): {{$Order['Client']['Background']['Smoke'] ?? 'Not User'}}</div>
                  </div>
                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="pin" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate">@Lang('OrderDetail.Alcohol'): {{$Order['Client']['Background']['Alcohol'] ?? 'Not User'}}</div>
                  </div>
                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate">@Lang('OrderDetail.Alergy'): {{$Order['Client']['Background']['Alergy']?? 'No Alergy'}}</div>
                  </div>
                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate">@Lang('OrderDetail.PreviousOperations'): {{$Order['Client']['Background']['PrevOperations']??'No Operations'}}</div>
                  </div>
                  <div class="row g-0 mb-2">
                    <div class="col-auto">
                      <div class="sw-3 me-1">
                        <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                      </div>
                    </div>
                    <div class="col text-alternate">@Lang('OrderDetail.PreviousDiagnosis'): {{$Order['Client']['Background']['PrevDiagnosis']??'No Diagnosis'}}</div>
                  </div>
                </div>

                <div class="mb-5">
                  <div>
                    <p class="text-small text-muted mb-2"> @Lang('OrderDetail.Payment') </p>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 me-1">
                          <i data-acorn-icon="credit-card" class="text-primary" data-acorn-size="17"></i>
                        </div>
                      </div>
                      <div class="col text-alternate">{{$Order['PaymentMethod']['Title']??''}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Address End -->
        </div>
      </div>
    </main>
  @endsection

