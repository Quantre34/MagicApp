@extends('panel.app')

@section('style')
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap-datepicker3.standalone.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2-bootstrap4.min.css')}}" />
@endsection
@section('content')

<script type="text/javascript">
  window.Get = {};
  window.Get['Features'] = {};
  window.Get['Packages'] = {};
  window.Get['AgencyFee'] = {{User('Parent')['AgencyFee'] ?? 0}};
  window.Get['CommissionRate'] = {{User('Parent')['CommissionRate'] ?? 0}};

  @foreach($Packages as $key => $Package)
      var i = 0;
      window.Get['Packages'][{{$Package['Id']}}] = {};
      window.Get['Packages'][{{$Package['Id']}}]['Defaults'] = {};
      @php $Packages[$key]['Defaults'] = []; @endphp
      @foreach($Package['Features'] as $Feature)
          @if($Feature['Checked']=='1')
              @php $Packages[$key]['Defaults'][] = $Feature; @endphp
              window.Get['Packages'][{{$Package['Id']}}]['Defaults'][{{$Feature['Id']}}] = { Id:{{$Feature['Id']}}, Cost:{{$Feature['Cost']}}, Multiply:'{{$Feature['Multiply']}}',Title:'{{$Feature['Title']}}' };
          @endif
      @endforeach
  @endforeach

</script>
      <main>
        <div class="container">
          <!-- Title and Top Buttons Start -->
          <div class="page-title-container col-12 row">
            <div class="col-6">
              <!-- Title Start -->
              <div class="col-12 col-md-7">
                <a href="/panel" class="muted-link pb-1 d-inline-block breadcrumb-back">
                  <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                  <span class="text-small align-middle">Panel</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">@Lang('NewAppointment.Title')</h1>

              </div>
              <!-- Title End -->
            </div>
            
          </div>
          <!-- Title and Top Buttons End -->

          <!-- New Appointment Start -->
          <div class="row col-12">
            <div class="col-6">
              <h2 class="small-title">@Lang('NewAppointment.OnlineAppointment')</h2>
            </div>
            
<!--             <div style="align-items: right!important; display: inline-flex!important;" class="col-6 align-items-right justify-content-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">PreConsultation</button>
            </div> -->
          </div>




          <div class="card mb-5 wizard short-border" id="appointmentsWizard">
            <div class="card-header border-0 pb-0">
              <ul class="nav nav-tabs justify-content-center" role="tablist">


                <li onclick="Prev()" class="nav-item tab-Category" role="presentation">
                  <a class="nav-link text-center" href="#CategoryChoice" role="tab">
                    <div class="mb-1 title d-none d-sm-block">@Lang('NewAppointment.Category')</div>
                    <div class="text-small description d-none d-md-block">@Lang('NewAppointment.ChooseCategory')</div>
                  </a>
                </li>
                <li onclick="Prev()" class="nav-item tab-Treatment" role="presentation">
                  <a class="nav-link text-center" href="#TreatmentTab" role="tab">
                    <div class="mb-1 title d-none d-sm-block">@Lang('NewAppointment.Treatment')</div>
                    <div class="text-small description d-none d-md-block">@Lang('NewAppointment.ChooseTreatment')</div>
                  </a>
                </li>
<!--                 <li onclick="Prev()" class="nav-item" role="presentation">
                  <a class="nav-link text-center" href="#ClinicTab" role="tab">
                    <div class="mb-1 title d-none d-sm-block">Clinic</div>
                    <div class="text-small description d-none d-md-block">Choose a Clinic</div>
                  </a>
                </li> -->
                <li onclick="Prev()" class="nav-item tab-Date" role="presentation">
                  <a class="nav-link text-center" href="#dateTab" role="tab">
                    <div class="mb-1 title d-none d-sm-block">@Lang('NewAppointment.Date')</div>
                    <div class="text-small description d-none d-md-block">@Lang('NewAppointment.ChooseDate')</div>
                  </a>
                </li>
                <li onclick="Prev()" class="nav-item tab-Package" role="presentation">
                  <a class="nav-link text-center" href="#PackageTab" role="tab">
                    <div class="mb-1 title d-none d-sm-block">@Lang('NewAppointment.Package')</div>
                    <div class="text-small description d-none d-md-block">@Lang('NewAppointment.ChoosePackage')</div>
                  </a>
                </li>
                <li onclick="Prev()" class="nav-item tab-Info" role="presentation">
                  <a class="nav-link text-center" href="#PersonalInfo" role="tab">
                    <div  class="mb-1 title d-none d-sm-block">@Lang('NewAppointment.PersonalInfo')</div>
                    <div class="text-small description d-none d-md-block">@Lang('NewAppointment.Fill')</div>
                  </a>
                </li>
                <li onclick="LastChoiceClicked();" class="nav-item tab-Payment" role="presentation">
                  <a class="nav-link text-center" href="#PayDetailTab" role="tab">
                    <div class="mb-1 title d-none d-sm-block">@Lang('NewAppointment.PaymentDetails')</div>
                    <div class="text-small description d-none d-md-block">@Lang('NewAppointment.Fill')</div>
                  </a>
                </li> 

                <li class="nav-item d-none" role="presentation">
                  <a class="nav-link text-center" href="#completeTab" role="tab"></a>
                </li>
              </ul>
            </div>
            <div class="card-body pt-7">
              <div class="tab-content">



                <!-- CategoryChoice -->
                <div class="tab-pane fade sh-xl-60 text-center" id="CategoryChoice" role="tabpanel">
                  <h5 class="card-title">@Lang('NewAppointment.ChooseCategory')</h5>
                  <p class="card-text text-alternate mb-4">@Lang('NewAppointment.ClickNext')</p>
                  <div class="row g-2">
                    @foreach($Categories as $Category)
<!--                         <div class="col-6 col-xl-3">
                          <label class="form-check custom-card w-100 position-relative p-0 m-0">
                            <input Id="{{$Category['Id']}}" type="radio" class="form-check-input position-absolute e-2 t-2 z-index-1" name="CategoryChoice" />
                            <span class="card form-check-label w-100 custom-border">
                              <span class="card-body text-center">
                                <i data-acorn-icon="bone" class="text-primary"></i>
                                <span class="mt-3 mb-1 text-body text-primary d-block">{{$Category['Title']}}</span>
                                <span class="text-extra-small fw-medium text-muted d-block">{{ count(($Category['Treatments'] ?? [] )) }} @Lang('NewAppointment.Treatment')</span>
                              </span>
                            </span>
                          </label>
                        </div> -->

                      <div class="col-6 col-xl-3">
                        <label class="form-check custom-card w-100 position-relative p-0 m-0">
                          <input Id="{{$Category['Id']}}" onchange="Skip()"  type="radio" class="form-check-input position-absolute e-2 t-2 z-index-1" name="CategoryChoice" />
                          <span style="padding: 0 !important;" class="card form-check-label w-100 custom-border">
                            <span style="padding: 0 !important;" class="card-body text-center">
                              <img style="
                                position: relative;
                                z-index: 11;
                                top: 0px;
                                object-fit: cover;
                                max-width: 100%;
                                opacity: 0.5;
                                width: 100%;
                                height: 200px;
                                border-radius: 15px;
                              " src="{{$Category['Img'] ?? '/assets/img/Default-Package.jpg' }}" style="width:250px;height: 100px;border-radius: 10px;">
                              <span style="position: absolute; top: 40%; left: 50%; transform: translate(-50%,-50%); z-index:21; color:var(--body) !important;
                              opacity:1 !important; font-size: 20px;font-weight:bold;backdrop-filter: blur(10px);" class="mt-3 mb-1 text-body text-primary d-block">{{$Category['Title']}}</span>
                              <!-- <span style="position: absolute; top: 40%; left: 50%; transform: translate(-50%,-50%); z-index:20; color:var(--body) !important;
                              opacity:1 !important; " class="text-extra-small fw-medium text-muted d-block">{{ count(($Category['Treatments'] ?? [] )) }} @Lang('NewAppointment.Treatment')</span> -->
                            </span>
                          </span>
                        </label>
                      </div>


                    @endforeach

                  </div>
                </div>
                <!-- CategoryChoice -->


                <!-- treatmentChoice -->
                <div class="tab-pane fade sh-xl-AUTO text-center" id="TreatmentTab" role="tabpanel">
                  <h5 class="card-title">@Lang('NewAppointment.ChooseTreatment')</h5>
                  <p class="card-text text-alternate mb-4">@Lang('NewAppointment.ClickNext')</p>
                  <div id="TreatmentBox" class="row g-2">





<!-- <div class="col-6 col-xl-3">
  <label class="form-check custom-card w-100 position-relative p-0 m-0">
    <input Id="'+Treatment['Id']+'" onchange="TreatmentChoiceClicked(this)" data-time="'+Treatment['EstimatedTime']+'" type="radio" class="form-check-input position-absolute e-2 t-2 z-index-1" name="TreatmentChoice" value="'+Treatment['Cost']+'" />
    <span style="padding: 0 !important;" class="card form-check-label w-100 custom-border">
      <span style="padding: 0 !important;" class="card-body text-center">
        <img style="
          position: relative;
          z-index: 11;
          top: 0px;
          object-fit: cover;
          max-width: 100%;
          opacity: 0.6;
          width: 100%;
          height: 50%;
          border-radius: 15px;
        " src="/assets/upload/LH1dDC50ZF1GWjT.png" style="width:250px;height: 100px;border-radius: 10px;">
        <span style="position: absolute; top: 40%; left: 50%; transform: translate(-50%,-50%); z-index:20; color:white !important;
        opacity:1 !important; font-size: 20px;font-weight:bold;" class="mt-3 mb-1 text-body text-primary d-block">'+Treatment['Title']+' </span>
        <span class="text-extra-small fw-medium text-muted d-block"></span>
      </span>
    </span>
  </label>
</div> -->


                  </div>
                </div>
                <!-- treatmentChoice -->


<!--                 <div class="tab-pane fade sh-xl-60 text-center" id="ClinicTab" role="tabpanel">
                  <h5 class="card-title">Choose a Clinic</h5>
                  <p class="card-text text-alternate mb-4">Choose the clinic and click on the next button</p>
                  <div id="ClinicBox" class="row g-2">

                  </div>
                </div> -->



                <div onmousemove="BlockDate()" class="tab-pane fade sh-xl-60 text-center" id="dateTab" role="tabpanel">
                  <h5 class="card-title">@Lang('NewAppointment.ChooseDate')</h5>
                  <p class="card-text text-alternate mb-4">@Lang('NewAppointment.ClickNext')</p>
                  <div  class="row mb-2 justify-content-center">
                    <div class="col-12 col-sm-6 col-xl-4">
                      <label ></label>
                      <div id="datePickerEmbed" min="{{date('Y-m-d',strtotime('now'))}}" class="border border-1 rounded-md p-3"></div>
                    </div>
                  </div>
<!--                   <div class="row justify-content-center text-start">
                    <div class="col-12 col-sm-6 col-xl-4">
                      <label class="top-label mb-0 w-100">
                        <select id="selectTopLabel">
                          <option label="&nbsp;"></option>
                          <option value="11:00">11:00</option>
                          <option value="11:30">11:30</option>
                          <option value="14:00">14:00</option>
                          <option value="14:30">14:30</option>
                          <option value="15:00">15:00</option>
                          <option value="15:30">15:30</option>
                          <option value="16:00">16:00</option>
                        </select>
                        <span>TIME</span>
                      </label>
                    </div>
                  </div> -->
                </div>


<!-- package choice -->
                <div class="tab-pane fade sh-xl-auto text-center form-group col-12" id="PackageTab" role="tabpanel">
                  <h5 class="card-title">@Lang('NewAppointment.ChoosePackage')</h5>
                  <p class="card-text text-alternate mb-4">@Lang('NewAppointment.ClickNext')</p>
                  <div id="PackAgeBox" class="row g-2 col-12 input-group">

                    @foreach($Packages as $Package)
                      <div id="PackAgeInnerBox" class="PackAgeBox-{{$Package['Id']}} col-6 custom-card"> 
                          <!-- <label  class="form-check custom-card w-100 position-relative p-0 m-0"> -->
                          <!-- <input id="PackAgeInnerBox" onchange="PackAgeChoiceClicked(this)" type="radio" data-cost="{{$Package['Rate']}}" value="{{$Package['Id']}}" class="form-check-input position-absolute e-2 t-2 z-index-1" name="PackageChoice" /> -->
                          <div  class="card form-check-label w-100 custom-border package-border">
                            <div class="card-body text-center">
                              
                              <label  class="form-check custom-card w-100 position-relative p-0 m-0">
                                <input  onchange="PackAgeChoiceClicked(this)" type="radio" data-rate="{{$Package['Rate']}}" value="{{$Package['Id']}}" class="form-check-input position-absolute e-2 t-2 z-index-1" name="PackageChoice" />
                              <div class="mx-auto">
                                <img src="{{$Package['Logo']}}" style="width: 100%;" alt="thumb" />
                              </div>
                              <br>
                              <a href="#" class="fs-3 text-primary"><h2>{{$Package['Title']}}</h2></a>
                              <div class="text-muted text-medium mb-2"></div>

                              <div class="mb-2 row">
                              <div class="fs-4 text-muted sh-3 mb-1 ">
                                {{$Package['Description']}}
                              </div>

                              <div class="fs-5 text-muted sh-7 mb-1 PackageDescription">
                                
                              </div>
                            </label>
                            
                              <div class="col-6 FeatureBox ">


                                @if(!empty($Package['Features']))
                                  @foreach($Package['Features'] as $Feature)
                                    <div class="row col-12 g-0 align-items-left mb-1">
                                      <div  class="col ps-3 sh-4 d-flex align-items-center lh-1-25">
                                        <label class="label"> 
                                          <input onchange="FeatureChecked(this)" {{ ($Feature['Multiply']==1)? 'multiply' : '' }} disabled {{ ($Feature['Checked'])? 'checked disabled' : '' }} type="checkbox" data-parent="{{$Feature['ParentId']}}" data-id="{{$Feature['Id']}}" name="Features" data-cost="{{$Feature['Cost']}}" value="{{$Feature['Id']}}">
                                          {{$Feature['Title']}}
                                        </label>
                                      </div>
                                      <div class="col-auto">
                                        <div class="sw-3 sh-4 d-flex align-items-center">
                                          <i data-acorn-icon="{{$Feature['Icon']}}" class="text-primary"></i>
                                        </div>
                                      </div>
                                    </div>
                                  @endforeach
                                @endif
                              </div>

                              <div  class="data-rate col-6 justify-content-center align-items-center">
                                
                                <div class="row  g-0 align-items-center mb-1">
                                  <div class="col-auto">
                                    <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                      <span style="font-size: xx-large;" class="text-primary">€</span>
                                    </div>
                                  </div>
                                  <div class="col ps-3">
                                    <div style="font-size: 20px;" data-id="{{$Package['Id']}}" data-rate="{{$Package['Rate']}}" class="PackageIn-{{$Package['Id']}} TotalAmountOnPackage sh-4 d-flex align-items-center lh-1-25">
                                      <?php 
                                        $DefaultsTotal = 0;
                                        foreach($Package['Defaults'] as $Default){
                                            $DefaultsTotal += $Default['Cost'];
                                        } 
                                      ?>
                                      {{
                                        $DefaultsTotal;
                                      }}

                                    </div>
                                  </div>
                                </div> 
                                
                              </div>

                            </div>

                          </div>
                        </div>
                        <!-- </label> -->
                      </div>
                    @endforeach

                    <h2 class="mt-3  text-danger">@Lang('NewAppointment.PackageBottomMessage')</h2>
                  </div>
                </div>
<!-- package choice -->

                <!-- PersonalInfo -->
                <div class="tab-pane fade sh-xl-90 text-center" id="PersonalInfo" role="tabpanel">
                  <h5 class="card-title">@Lang('NewAppointment.Fill')</h5>
                  <p class="card-text text-alternate mb-4"></p>
                  <div class="row g-2">
                    <form class="row g-2" method="POST" action="javascript:void(0);" id="NewAppointmentForm">

                        <div class="form-group  col-6 Personal-Info" >
                          <h3>@Lang('NewAppointment.PersonalInfo')</h3>
                            <div class="mb-3  text-center ">
                                    <label class="form-label"><h5>@Lang('NewAppointment.FirstName')</h5></label>
                                    <input  name="FirstName" id="FirstName"  class="result form-control" type="text" id="Firstname" >
                            </div>
                            <div class="mb-3  text-center ">
                                    <label class="form-label"><h5>@Lang('NewAppointment.LastName')</h5></label>
                                    <input  name="LastName"  class="result form-control" type="text" id="LastName" >
                            </div>
                            <div class="mb-3  text-center ">
                                    <label class="form-label"><h5>@Lang('NewAppointment.PassportNumber')</h5></label>
                                    <input  name="Identification" id="Identification"  class="result form-control" type="text" id="Identification" >
                            </div>
                            <div class="mb-3 input-group col-12 text-center">
                              <label class="form-label"><h5>@Lang('NewAppointment.Phone')</h5></label>
                                <div class="input-group">
                                  <input type="tel" class="form-control" id="Cell" name="Cell" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                </div>
                            </div>
                            <div class="mb-3  text-center ">
                                    <label class="form-label"><h5>@Lang('NewAppointment.Mail')</h5></label>
                                    <input  name="Mail"  class="result form-control" type="text" id="Mail" >
                            </div>
                            <div class="input-group col-12">
                                <div class="mb-3  text-center col-6">
                                        <label class="form-label"><h5>@Lang('NewAppointment.Height') (Cm)</h5></label>
                                        <input  name="Height" class="result form-control" type="text" id="Height">
                                </div>
                                <div class="mb-3  text-center col-6">
                                        <label class="form-label"><h5>@Lang('NewAppointment.Weight') (Kg)</h5></label>
                                        <input  name="Weight"  class="result form-control" type="text" id="Weight">
                                </div>
                            </div>
                            <div class="mb-3  text-center">
                                    <label class="form-label"><h5>@Lang('NewAppointment.BirthDate')</h5></label>
                                    <input  name="Birth"  class="result form-control" type="date" id="Birth">
                            </div>
                            <div class="mb-3 text-center form-group col-12">
                              <label class="form-label"><h5>@Lang('NewAppointment.Gender')</h5></label>
                              <div class=" input-group ">
                                  <div class="form-check checkbox-parent-gender form-control col-5">
                                      <input hidden type="radio" class="form-check-input" id="Gender-Male" name="Gender" value="Male">
                                      <label class="form-check-label" for="Gender-Male">@Lang('NewAppointment.Male')</label>
                                  </div>
                                  <div class="form-check checkbox-parent-gender form-control col-5">
                                      <input hidden type="radio" class="form-check-input" id="Gender-Female" name="Gender" value="Female">
                                      <label class="form-check-label" for="Gender-Female">@Lang('NewAppointment.Female')</label>
                                  </div>
                              </div>
                          </div>
                        </div>

                        <div class="form-group col-6 Medical-Background" >
                          <h3>@Lang('NewAppointment.MedicalBackground')</h3>
                          <div class=" form-group col-12">
                              <div class="mb-3   text-center">
                                      <label class="form-label"><h5>@Lang('NewAppointment.OtherDiseases')</h5></label>
                                      <input  name="PrevDiagnosis"  class="result form-control" type="text"  >
                              </div>
                              <div class="mb-3   text-center">
                                      <label class="form-label"><h5>@Lang('NewAppointment.PreviousOperations')</h5></label>
                                      <input  name="PrevOperations"  class="result form-control" type="text"  >
                              </div>
                          </div>
                          <div class="mb-3 text-center form-group col-12">
                              <label class="form-label"><h5>@Lang('NewAppointment.Smoke')</h5></label>
                              <div class=" input-group ">
                                  <div class="form-check checkbox-parent-smoke form-control col-5">
                                      <input hidden type="radio" class="form-check-input" id="Smoke-True"  name="Smoke" value="True">
                                      <label class="form-check-label" for="Smoke-True">@Lang('NewAppointment.Yes')</label>
                                  </div>
                                  <div class="form-check checkbox-parent-smoke form-control col-5">
                                      <input hidden type="radio" class="form-check-input" id="Smoke-false" name="Smoke" value="False">
                                      <label class="form-check-label" for="Smoke-false">@Lang('NewAppointment.No')</label>
                                  </div>
                              </div>
                          </div>
                          <div class="mb-3  text-center ">
                                    <label class="form-label"><h5>@Lang('NewAppointment.HowOften')</h5></label>
                                    <input  name="SmokeFrequency"  class="result form-control" type="text" id="SmokeFrequency" >
                          </div>
                          <div class="mb-3 text-center form-group col-12">
                              <label class="form-label"><h5>@Lang('NewAppointment.Alcohol')</h5></label>
                              <div class=" input-group ">
                                  <div class="form-check checkbox-parent-alcohol form-control col-5">
                                      <input hidden type="radio" class="form-check-input" id="Alcohol-True" name="Alcohol" value="True">
                                      <label class="form-check-label" for="Alcohol-True">@Lang('NewAppointment.Yes')</label>
                                  </div>
                                  <div class="form-check checkbox-parent-alcohol form-control col-5">
                                      <input hidden type="radio" class="form-check-input" id="Alcohol-False" name="Alcohol" value="False">
                                      <label class="form-check-label" for="Alcohol-False">@Lang('NewAppointment.No')</label>
                                  </div>
                              </div>
                          </div>
                          <div class="mb-3  text-center ">
                                    <label class="form-label"><h5>@Lang('NewAppointment.HowOften')</h5></label>
                                    <input  name="AlcoholFrequency"  class="result form-control" type="text" id="AlcoholFrequency" >
                          </div>                          
                          <div class="mb-3 text-center form-group col-12">
                              <label class="form-label"><h5>@Lang('NewAppointment.Alergy')</h5></label>
                              <div class=" input-group ">
                                  <div class="form-check checkbox-parent-alergy form-control col-5">
                                      <input hidden type="radio" class="form-check-input" id="Alergy-True" name="Alergy" value="True">
                                      <label class="form-check-label" for="Alergy-True">@Lang('NewAppointment.Yes')</label>
                                  </div>
                                  <div class="form-check checkbox-parent-alergy form-control col-5">
                                      <input onchange="Skip()" hidden type="radio" class="form-check-input" id="Alergy-False" name="Alergy" value="False">
                                      <label class="form-check-label" for="Alergy-False">@Lang('NewAppointment.No')</label>
                                  </div>
                              </div>
                          </div>
                          <div class="mb-3  text-center ">
                                    <label class="form-label"><h5>@Lang('NewAppointment.AlergyType')</h5></label>
                                    <input onchange="Skip()" name="AlergyType"  class="result form-control" type="text" id="AlergyType" >
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
                <!-- PersonalInfo -->


        <!-- PayDetailTab -->
        <div class="tab-pane fade sh-xl-90 text-center col-12 justify-content-center" id="PayDetailTab" role="tabpanel">
          <center>
            <div class="row g-2 col-6">
                <div class="form-group  col-12 Personal-Info" >
                  <h3>@Lang('NewAppointment.PaymentDetails')</h3>
                    <div class="mb-3  text-center ">
                            <label class="form-label"><h5>@Lang('NewAppointment.TotalAmount')</h5></label>
                            <input disabled name="TotalAmount"  class="result form-control" type="text" id="TotalAmount">
                    </div>
                    <div class="mb-3  text-center ">
                            <label class="form-label"><h5>@Lang('NewAppointment.AmountToPay')</h5></label>
                            <input  name="AmountToPay"  class="result form-control" type="text" id="AmountToPay">
                    </div>
                    <div class="mb-3  text-center ">
                            <label class="form-label"><h5>@Lang('NewAppointment.Commission')</h5></label>
                            <input disabled name="Commission"  class="result form-control" type="text" id="Commission">
                    </div>
                    <div class="mb-3  text-center ">
                            <label class="form-label"><h5>@Lang('NewAppointment.RemainingAmount')</h5></label>
                            <input  name="Remaining"  class="result form-control" type="text" id="Remaining" >
                    </div>

                  <div class="form-group col-12">
                    <label class=" col-form-label">@Lang('NewAppointment.PaymentMethods')</label>
                      <select  class="select-single-no-search" data-width="100%" name="PaymentType" id="PaymentSelect">
                        <option  selected></option>
                        @foreach($PaymentMethods as $Method)
                          <option selected value="{{$Method['Id']}}">{{$Method['Title']}}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group col-12">
                    <label class="col-form-label">@Lang('NewAppointment.AppointmentStatus')</label>
                      <select class="select-single-no-search" data-width="100%" name="Status" id="StatusSelect">
                        <option selected value="1">Active</option>
                        <option value="2">On Hold</option>
                      </select>
                  </div>

<!-- payment tests -->
<!--                   <script src="https://secure.payu.com/front/widget/js/payu-bootstrap.js"
                          pay-button="#pay-button"
                          merchant-pos-id="145227"
                          shop-name="Shop name"
                          total-amount="1000"
                          currency-code="eu"
                          customer-language="en"
                          customer-email="email@exampledomain.com"
                          sig="196ca2ae50b6d68987712e8787e9a6e7533f7b827bc36204dd2b937971a2de7a">
                </script>
                  <form  action="http://exampledomain.com/processOrder.php" method="POST">
                        <button id="payBtn" type="submit" id="pay-button">Pay now</button>
                  </form> -->
<!-- payment tests -->

                </div>
            </div>
          </center>
        </div>
        <!-- PayDetailTab -->






                <div class="tab-pane fade sh-xl-60" id="completeTab" role="tabpanel">
                  <div class="text-center d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="card-title" id="Result-Title"></h5>
                    <p class="card-text text-alternate mb-4" id="Result-ErrorMessage"></p>
                    <div id="Result-Button">
<!--                       <button class="btn btn-icon btn-icon-start btn-primary btn-reset" type="button">
                        <i data-acorn-icon="calendar"></i>
                        <span>New Appointment</span>
                      </button> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-center border-0 pt-1">
              <button onclick="Prev()" class="btn btn-icon btn-icon-start btn-outline-primary btn-prev" type="button">
                <i data-acorn-icon="chevron-left"></i>
                <span>@Lang('NewAppointment.Back')</span>
              </button>
              <button onclick="Next()" id="NextBtn" target="Next" class="btn btn-icon btn-icon-end btn-outline-primary btn-next" type="button">
                <span>@Lang('NewAppointment.Next')</span>
                <i data-acorn-icon="chevron-right"></i>
              </button>
            </div>
          </div>
          <!-- New Appointment End -->
        </div>



      </main>
<script type="text/javascript">
  /* Document Ready Start */
  $(document).ready(function(){
      SweetSelect('Status');

       const phoneInputField = document.querySelector("#Cell");
       const phoneInput = window.intlTelInput(phoneInputField, {
          initialCountry: "{{Country(User('Parent')['CountryCode'] ?? 90)['code']}}",
          utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      });

       $('.form-check').on('click', function(){
          $('.card').css('box-shadow','1px solid var(--seperator)');
          $(this).parent('.card').css('box-shadow', 'inset 0 0 0 1px rgba(var(--primary-rgb), 0.5) !important');
       });

      $('.Personal-Info input[type=text], .Medical-Background input[type=text], .Personal-Info input[type=date]').on('change', function(e){
        window.Get[""+$(this).attr('name')] =  $(this).val();
      });

      $('input[name=TotalAmount]').on('change', function(){
        window.Get['TotalAmount'] = $(this).val();
        window.Get['Commission'] =  ((window.Get['TreatmentCost'] ?? 0) * window.Get['AgencyFee'] / 100);
        $('input[name=Commission]').val(window.Get['Commission']);
        $('input[name=AmountToPay]').val(window.Get['TotalAmount'] / 2);
        $('input[name=AmountToPay]').change();
      });

      $('input[name=AmountToPay]').on('change', function(){
          if( $(this).val() < (window.Get['TotalAmount'] / 2) ){
              Swal.fire('You have to pay at least %50 of the Total Cost','','error').then((click)=>{
                $(this).val(window.Get['TotalAmount'] / 2);
                $('input[name=AmountToPay]').change();
              });
          }
          $('input[name=Remaining]').val(window.Get['TotalAmount'] - $(this).val() - (window.Get['AgencyFee'] * window.Get['TreatmentCost'] / 100) ) ;
      });

      $("input[name=Cell").on('change',function() {
        var ConutrySelect = phoneInput.getSelectedCountryData();
        window.Get['Cell']=$(this).val();
        window.Get['CountryCode']=ConutrySelect.dialCode;
      });

      $('input[name=Smoke]').on('click', function(){
          window.Get['Smoke'] = $(this).val();
          $('.checkbox-parent-smoke').css('background', 'var(--input)');
          $(this).parent().css('background','white');
          $(this).parent().css('color','#00000');
      });

      $('input[name=Alcohol]').on('click', function(){
          window.Get['Alcohol'] = $(this).val();
          $('.checkbox-parent-alcohol').css('background', 'var(--input)');
          $(this).parent().css('background','white');
      });

      $('input[name=Alergy]').on('click', function(){
          window.Get['Alergy'] = $(this).val();
          $('.checkbox-parent-alergy').css('background', 'var(--input)');
          $(this).parent().css('background','white');
      });   

      $('input[name=Gender]').on('click', function(){
          window.Get['Gender'] = $(this).val();
          $('.checkbox-parent-gender').css('background', 'var(--input)');
          $(this).parent('div[class=checkbox-parent-gender]').css('background','white)'); ///color of the option which is selected
          $('.checkbox-parent-gender').each((index, Item)=>{
            if ($(Item).children('input[name=Gender]').is(':checked')) {
              $(Item).css('background', 'white');
            }
          });
      });   

      $('#selectTopLabel').on('change', function(){
        window.Get['Time'] = $(this).val();
      });
      ///
      $('input[name=CategoryChoice]').on('click', function(){
          let TreatmentBox = $('#TreatmentBox');
          window.Get['Category'] = $(this).attr('Id');
          $.ajax({
            type: "POST",
            url: "/ajax",
            cache: false,
            headers: {'X-CSRF-TOKEN': @json(csrf_token())},
            data: {
              Id: window.Get['Category'],
              action: 'GetTreatments',
              _token: @json(csrf_token())
            },
            success: function(data){
              if (data['outcome']==true) {
                TreatmentBox.empty();
                  data['data'].forEach((Category)=>{
                    if (Category['Treatments'].length > 0) {
                      Category['Treatments'].forEach((Treatment)=>{
                        TreatmentBox.append('<div class="col-6 col-xl-3"> <label class="form-check custom-card w-100 position-relative p-0 m-0"> <input Id="'+Treatment['Id']+'" onchange="javascript:TreatmentChoiceClicked(this);" data-time="'+Treatment['EstimatedTime']+'" type="radio" class="form-check-input position-absolute e-2 t-2 z-index-1" name="TreatmentChoice" value="'+Treatment['Cost']+'" /> <span style="padding: 0 !important;" class="card form-check-label w-100 custom-border"> <span style="padding: 0 !important;" class="card-body text-center"> <img style="height: 200px; position: relative; z-index: 11; top: 0px; object-fit: cover; max-width: 100%; opacity: 0.5; width: 100%; border-radius: 15px; " src="'+Treatment['Img']+'" style="width:250px;height: 100px;border-radius: 10px;"> <span style="position: absolute; top: 40%; left: 50%; transform: translate(-50%,-50%); z-index:20; color:var(--body) !important; opacity:1 !important; font-size: 20px;font-weight:bold;backdrop-filter: blur(10px);" class="mt-3 mb-1 text-body text-primary d-block TreatmentTitle">'+Treatment['Title']+' </span> <span class="text-extra-small fw-medium text-muted d-block"></span> </span> </span> </label></div>');
                      });                      
                    }else {
                          TreatmentBox.append('<div style="border: 1px solid black; border-radius: 30px;" class="mb-4"><div class="text-danger mb-1">@Lang('NewAppointment.TreatmentNotFound')</div></div>');
                    }
                  }); 
              }else {
                Swal.fire('Failed','An Error occurred', 'error');
              }
            }
          });
         
      });
      ///
      setTimeout(function(){
          BlockDate();
      },1000);


  });
  /* Document Ready End */
  

  ///
  function FeatureChecked(e){

    const $this = e;
    var FeatureCost = 0;
    var package = $('.PackageIn-'+$($this).data('parent'));
    if ($($this).hasAttr('multiply')) {
        FeatureCost = $($this).data('cost') * window.Get['EstimatedTime'];
    }else {
      FeatureCost = $($this).data('cost');
    }
    if ($($this).is(":checked")) {

        window.Get['Features'][$($this).val()]=$($this).val();
        window.Get['TotalAmount'] = window.Get['TotalAmount'] ??  parseInt(window.Get['TreatmentCost'] ?? 0) + ( (window.Get['TreatmentCost'] *parseInt(package.data('rate')) / 100) ) + parseInt(FeatureCost);
        window.Get['TotalAmount'] = parseInt(window.Get['TotalAmount']) + parseInt(FeatureCost);
        $('input[name=TotalAmount]').val(window.Get['TotalAmount']);
        $('input[name=TotalAmount]').change();
        package.html(window.Get['TotalAmount']);

        console.table({
          DefaultsTotal : window.Get['Packages'][$($this).data('parent')]['Defaults'],
          FeatureCost : parseInt(FeatureCost),
          AgencyFee : parseInt((window.Get['TotalAmount'] * window.Get['AgencyFee']) / 100),
          PackageCost : parseInt(window.Get['PackageCost']),
          Treatmentcost : parseInt(window.Get['TreatmentCost'])
        });
    }else {
        var $thisValue = $($this).val();
        delete window.Get['Features'][$($this).val()];
        window.Get['TotalAmount'] = parseInt(window.Get['TotalAmount']) - parseInt(FeatureCost);
        $('input[name=TotalAmount]').val(window.Get['TotalAmount']);
        $('input[name=TotalAmount]').change();
        package.html(window.Get['TotalAmount']);

        console.table({
          DefaultsTotal : window.Get['Packages'][$($this).data('parent')]['Defaults'],
          AgencyFee : parseInt((window.Get['TotalAmount'] * window.Get['AgencyFee']) / 100),
          PackageCost : parseInt(window.Get['PackageCost']),
          Treatmentcost : parseInt(window.Get['TreatmentCost'])
        });
    }
  };
  ///
  function TreatmentChoiceClicked(e){
      // let ClinicBox = $('#ClinicBox');
      window.Get['Treatment'] = $(e).attr('Id');
      window.Get['TreatmentCost'] = parseInt($(e).val());
      window.Get['EstimatedTime'] = $(e).attr('data-time');
      var Description = $('.PackageDescription');

      Description.each(function(i,item) {
          $(item).empty();
          $(item).text($(item).text() + '@Lang('NewAppointment.TreatmentCost'): '+window.Get['TreatmentCost']+'€');
      });

      $('.TotalAmountOnPackage').each((key, Item)=>{
          var PackageId = parseInt($(Item).attr('data-id'));
          var PrevTotal = parseInt( ((window.Get['TreatmentCost'] ?? 0) *  parseInt($(Item).data('rate'))) / 100 ) + parseInt($(e).val());
          PrevTotal += parseInt(window.Get['TreatmentCost'] * {{User('Parent')['AgencyFee'] ?? 0}} / 100) ;

          Object.entries(window.Get['Packages'][PackageId]['Defaults']).forEach(([i,item])=>{
               var Feature = item;
               console.log(Feature);
               PrevTotal += parseInt((Feature.Multiply=='1')? Feature.Cost * (window.Get['EstimatedTime'] ?? 1) : Feature.Cost);
          });
          console.log(PackageId+': '+PrevTotal);
          $(Item).html( PrevTotal );
      });
      Skip();
  }
  ///
  function ClinicChoiceClicked(e){
    window.Get['Clinic'] = $(e).val();
  }
  ///
  function PackAgeChoiceClicked(e){
    $('#PackAgeInnerBox input[type=checkbox]').each(function(index,element){
      if (!$(this).hasAttr('checked')) {
          if($(this).data('parent') != $(e).val()){
            $(this).attr('disabled', true);
            element.checked = false;
          }else {
            $(this).removeAttr('disabled');
          }
      }
    });
    var PackageId = parseInt($(e).val());
    window.Get['Package'] = $(e).val();
    window.Get['PackageCost'] = ( parseInt(window.Get['TreatmentCost'] ?? 0) * parseInt($(e).data('rate')) ) / 100;
    var Cost = parseInt(window.Get['PackageCost']) + parseInt(window.Get['TreatmentCost'] ?? 0);
    var AgencyFee = (parseInt(window.Get['TreatmentCost'] ?? 0) * {{User('Parent')['AgencyFee'] ?? 0}} / 100);
    Cost += AgencyFee;


    window.Get['Features'] = {};
    Object.entries(window.Get['Packages'][PackageId]['Defaults']).forEach(([i,item])=>{
        window.Get['Features'][i] = i;
       var Feature = item;
       console.log(Feature);
       Cost += (Feature.Multiply=='1')? parseInt(Feature.Cost) * parseInt(window.Get['EstimatedTime']) : parseInt(Feature.Cost);
    });

    $('input[name=TotalAmount]').val(parseInt(Cost));
    $('input[name=TotalAmount]').trigger('change');

    console.table({
      DefaultsTotal : window.Get['Packages'][PackageId]['Defaults'],
      AgencyFee : AgencyFee,
      PackageCost : (  window.Get['TreatmentCost']  * parseInt($(e).data('rate')) ) / 100,
      Treatmentcost : parseInt(window.Get['TreatmentCost'])
    });
    // $('.package-border').css('border','1px solid var(--seperator)!important');
    $(e).parent().parent().parent().css('border','1px solid var(--primary)!important');
    $('.TotalAmountOnPackage[data-id="'+$(e).val()+'"]').text(parseInt(Cost));
  }
  ///
  function Prev(){
    let NextBtn = $('#NextBtn');
    if (NextBtn.attr('target')=='Purchase') {
        NextBtn.children('span').html('@Lang('NewAppointment.Next')');
        NextBtn.attr('target','Next');
    }
  }
  ///
  function Next(){
    let NextBtn = $('#NextBtn');
    console.log('Next Btn clicked');
    if (NextBtn.attr('target') == 'Purchase') {
        var data = new FormData();
        window.Get['action']='NewAppointment';
        window.Get['PaymentMethod'] = $('select[name=PaymentType]').val();
        window.Get['Status'] = $('select[name=Status]').val();
        Object.entries(window.Get).forEach(entry => {
          const [key, value] = entry;
          data.append(key, value); 
        });
        data.append('Features', Object.values( window.Get['Features'] ));
        $.ajax({
            type:'POST',
            url:"/ajax?marked=true",
            data: data,
            headers: {'X-CSRF-TOKEN': @json(csrf_token())},
            processData:false,
            datatype:'json',
            contentType:false,
            success: function(data){
                if (data['outcome']) {

                  $('#Result-Title').html('@Lang('NewAppointment.Thanks')');
                  $('#Result-ErrorMessage').html('@Lang('NewAppointment.Success')');
                  $('#Result-Button').html(`<a href="/panel/Appointments/${data['uid']}"><button class="btn btn-icon btn-icon-start btn-primary btn-reset" type="button"><i data-acorn-icon="calendar"></i><span>@Lang('NewAppointment.AppDetails')</span></button></a>`);
                  return false;
                }else {
                    Swal.fire('Failed!', data['ErrorMessage'], 'error').then((result)=>{
                        $('#Result-Title').html('@Lang('NewAppointment.Failed')');
                        $('#Result-ErrorMessage').html(data['ErrorMessage']);
                        $('#Result-Button').html('');
                        if (data['tag']) {
                          window.location = '#'+data['tag'];
                        }
                    });
                    return false;
                }
            }
          });
    }else {
      if ($( "#PersonalInfo" ).hasClass( "active" )) {
          LastChoiceClicked();
      }
    }
  }
  ///
  function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    return result;
  }
  ///
  function PickAuto(e){
    var EstimatedTime = parseInt(window.Get['EstimatedTime']);
    $('.FeatureBox label').each(function(i,item){
      if ($(item).text().includes('@Lang('NewAppointment.Accommodation')') ) {
        var data = {
          id : $(item).children('input').attr('data-id'),
          cost : $(item).children('input').attr('data-cost'),
          text : $(item).text(),
          value : $(item).children('input').val(),
          parent : $(item).children('input').attr('data-parent'),
          multiply : $(item).children('input').hasAttr('multiply')? 'multiply' : '',
          disabled : $(item).children('input').hasAttr('disabled')? 'disabled' : '',
          checked : $(item).children('input').hasAttr('checked')? 'checked' : ''
        }
        // console.table(data);
        var html = `<input onchange="FeatureChecked(this)" ${data.disabled} ${data.checked} ${data.attr}  ${data.multiply} type="checkbox" data-parent="${data.parent}" data-id="${data.id}" name="Features" data-cost="${data.cost}" value="${data.value}">${data.text} (${EstimatedTime} days)`;
        $(item).html(html);
      }
    });
    $('td').each((key, value)=>{
      const $this = $(value);
      var start = (new Date(parseInt($this.attr('data-date'))));
      for (var i = EstimatedTime - 1; i >= 0; i--) {
        if ( start.toLocaleDateString() == (new Date(addDays(e.date, i).getTime())).toLocaleDateString() ) {
            $this.addClass('active');
        }
      }
    });
    Skip();
  }
  ///
  function LastChoiceClicked(){
    $('#NextBtn span').html('@Lang('NewAppointment.Purchase')');
    $('#NextBtn').attr('target','Purchase');
  }
function Skip(time=50){
  HoldOn.open(options);
  setTimeout(function(){
    var NextBtn = $('#NextBtn');
    if (NextBtn.attr('target')=='Next') {
      NextBtn.trigger('click');
    }
    HoldOn.close();
  }, time);
}
function BlockDate(){
      $('td').each((key, value)=>{
      const $this = $(value);
      var start = (new Date(parseInt($this.attr('data-date'))) );
      if ( start.getTime() <= (new Date()).getTime() ) {
          $this.addClass('disabled');
          
      }
    });
}
</script>
@endsection


@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6.7.7/js/tempus-dominus.min.js"></script>
  <!-- Page Specific Scripts Start -->
  <script src="{{URL::asset('assets/js/cs/wizard.js')}}"></script>
  <script src="{{URL::asset('assets/js/vendor/jquery.barrating.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/vendor/datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/vendor/select2.full.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/vendor/timepicker.js')}}"></script>
  <script src="{{URL::asset('assets/js/pages/appointments.new.js')}}"></script>
<!--   <script src="{{URL::asset('assets/js/common.js')}}"></script>
  <script src="{{URL::asset('assets/js/scripts.js')}}"></script> -->
  <!-- Page Specific Scripts End -->


  <script src="{{URL::asset('assets/js/pages/settings.js')}}"></script>


  <script src="https://cdn.checkout.com/js/framesv2.min.js"></script>
  <script type="text/javascript">
    if(screen.width < 900) {
        $('.data-cost').removeClass('col-6');
        $('.custom-card').removeClass('col-6');
        $('.FeatureBox ').removeClass('col-6');
    }
  </script>


@endsection