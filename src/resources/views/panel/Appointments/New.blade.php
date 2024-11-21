@extends('panel.App')

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
      <style type="text/css">
        
      .step-1 ul {
        list-style-type: none!important;
      }

      .step-1 li {
        display: inline-block!important;
      }

       .step-1 input[type="radio"][id^="cb"] {
        display: none;
      }

      .step-1 label {
        border: 1px solid #fff;
        padding: 10px;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
      }

      .step-1 label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
      }

      .step-1 label img {
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
      }

      .step-1 input[type="radio"]:checked + .step-1 label {
        border-color: #ddd;
      }

      .step-1 input[type="radio"]:checked + .step-1 label:before {
        content: "✓";
        background-color: grey;
        transform: scale(1);
      }

      .step-1 input[type="radio"]:checked  + .step-1 label img {
        transform: scale(0.9);
        box-shadow: 0 0 5px #333;
        z-index: -1;
      }

      .form-imagecheck {
          position: relative;
          margin: 0;
          cursor: pointer;
      }
      .form-imagecheck-input {
          position: absolute;
          z-index: -1;
          opacity: 0;
      }
      .form-imagecheck-figure {
          position: relative;
          display: block;
          margin: 0;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          border: grey;
          border-radius: 3px;
      }
      .form-imagecheck-input:checked~.form-imagecheck-figure {
          border-color: grey;
      }

      .form-imagecheck-image {
          max-width: 100%;
          display: block;
          opacity: .64;
          transition: opacity .3s;
      }
      .form-imagecheck-image:first-child {
          border-top-left-radius: 2px;
          border-top-right-radius: 2px;
      }
      .form-imagecheck-image:last-child {
          border-bottom-right-radius: 2px;
          border-bottom-left-radius: 2px;
      }

      .form-imagecheck-input:checked~.form-imagecheck-figure .form-imagecheck-image, .form-imagecheck-input:focus~.form-imagecheck-figure .form-imagecheck-image, .form-imagecheck:hover .form-imagecheck-image {
          opacity: 1;
          border: 1px solid #009efb;
          width: 75%;
      }
      .form-imagecheck-input:checked~.form-imagecheck-figure {
          width: 100%;
          height: 100%;
      }
      .step-1 label img {
          height: 100%;
          width: 75%;
          transition-duration: 0.2s;
          transform-origin: 50% 50%;
      }
      .hide {
        display: none!important;
      }
      </style>
      <div class="body-wrapper">
        <div class="container-fluid">
          

          <div class="checkout">
            <div class="card">
              <div class="card-body p-4">
                <div class="wizard-content">
                  <form action="#" class="tab-wizard wizard-circle">


<!--                     <h6>Category</h6>
                    <section class="step-1">
                        <div class="mb-3">
                          <div class="row g-2">
                            @foreach($Categories as $key=>$Category)
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input type="radio" class="form-imagecheck-input" Id="{{$Category['Id']}}" name="CategoryChoice">
                                  <span class="form-imagecheck-figure d-flex justify-content-center " style="flex-direction: column;align-items: center;">
                                    <img src="{{$Category['Img']}}" alt="-" class="form-imagecheck-image">
                                    <b>{{$Category['Title']}}</b>
                                  </span>
                                </label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                    </section>

                    <h6>Treatment</h6>
                    <section >
                        <div class="mb-3">
                          <label class="form-label">Image Check Radio</label>
                          <div class="row g-2" id="TreatmentBox">
                          </div>
                        </div>
                    </section> -->

                    <h6>Date</h6>
                    <section class="payment-method text-center">
                         <div onmousemove="BlockDate()" class=" sh-xl-60 text-center" >
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
                    </section>
                    <!-- Step 4 -->
                    <h6>Package</h6>
                    <section class="payment-method text-center">
                        <div id="PackAgeBox" class="row g-2 col-12 input-group">

<!--                           @foreach($Packages as $Package)
                            <div id="PackAgeInnerBox" class="PackAgeBox-{{$Package['Id']}} col-6 custom-card" onclick="javascript:$('input[name="PackageChoice"]').click();"> 
                                <div  class="card form-check-label w-100 custom-border package-border">
                                  <div class="card-body text-center">
                                    
                                    <label class="form-check custom-card w-100 position-relative p-0 m-0">
                                        <input onchange="PackAgeChoiceClicked(this)" type="radio" data-rate="{{$Package['Rate']}}" value="{{$Package['Id']}}" class="form-check-input position-absolute e-2 t-2 z-index-1" name="PackageChoice" />
                                      <div class="mx-auto">
                                        <img src="{{$Package['Img']}}" style="width: 100%;" alt="thumb" />
                                      </div>
                                      <br>
                                      <a class="fs-3 text-primary"><h2>{{$Package['Title']}}</h2></a>
                                      <div class="text-muted text-medium mb-2"></div>

                                      
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
                          @endforeach  -->

                          @foreach($Packages as $Package)
                            <div class="col-6 col-sm-4">
                              <label class="form-imagecheck mb-2">
                                <input type="radio" class="form-imagecheck-input" Id="{{$Package['Id']}}" name="CategoryChoice">
                                <span class="form-imagecheck-figure d-flex justify-content-center " style="flex-direction: column;align-items: center;">
                                  <img src="{{$Package['Img']}}" alt="-" style="max-width: 100%;width: 100%;">
                                  <b>{{$Package['Title']}}</b>
                                </span>
                              </label>
                            </div>
                          @endforeach

                        </div> 

                        <h5 class="mt-3  text-danger">@Lang('NewAppointment.PackageBottomMessage')</h5>
                    </section>


                    <!-- Step 4 -->
                    <h6>Features</h6>
                    <section class="step-1">
                        <div class="mb-3">
                          <label class="form-label">Image Check Radio</label>
                          <div class="row g-2" id="FeatureBox">
                            <!-- FeatureBox Container -->
                          </div>
                        </div>
                    </section>

                     <h6>@Lang('NewAppointment.PersonalInfo')</h6>
                    <section>
                                               

                  <div class="row userinfo">
                    <div class="col-lg-6 d-flex align-items-stretch">
                      <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                         
                            <div class="row col-12">
                              <div class="mb-1 col-6">
                                <label class="form-label">İsim</label>
                                <input type="text" class="form-control" required name="FirstName" >
                              </div>
                              <div class="mb-1 col-6">
                                <label for="exampleInputPassword1" class="form-label">Soy İsim</label>
                                <input type="text" class="form-control" required name="LastName" >
                              </div>
                            </div>
                            <div class="mb-1">
                              <label class="form-label">T.C Kimlik NO</label>
                              <input type="text" class="form-control" name="Identification" required >
                            </div>
                            <div class="mb-1">
                              <label class="form-label">Mail</label>
                              <input type="text" class="form-control" name="Mail" required >
                            </div>
                            <div class="mb-1">
                              <label  class="form-label">Telefon</label>
                              <input id="Cell" type="text" class="form-control" name="Cell" required >
                            </div>



                            <div class="row col-12">
                              <div class="mb-1 col-6">
                                <label class="form-label">Boy</label>
                                <input type="text" class="form-control" required name="Height" >
                              </div>
                              <div class="mb-1 col-6">
                                <label for="exampleInputPassword1" class="form-label">Kilo</label>
                                <input type="text" class="form-control" required name="Weight" >
                              </div>
                            </div>
                            <div class="mb-1">
                              <label class="form-label">Doğum Tarihi</label>
                              <input type="date" class="form-control" name="Birth" required >
                            </div>

                            <div class="row col-12">
                              <label for="exampleInputPassword1" class="form-label">Cinsiyet</label>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" name="Gender" id="Gender1" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Gender1">Evet</label>
                              </div>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" name="Gender" id="Gender2" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Gender2">Hayır</label>
                              </div>
                            </div>


                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-stretch">
                      <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4 ">

                        

                            <div class="mb-1 col-12 " >
                              <label for="exampleInputPassword1" class="form-label">Daha önceki Tanılar</label>
                              <textarea class="form-control" name="PrevDiagnosis"></textarea>
                            </div>
                            <div class="mb-1 col-12" >
                              <label for="exampleInputPassword1" class="form-label">Daha önceki Operasyonlar</label>
                              <textarea class="form-control" name="PreOperations"></textarea>
                            </div>

                            <div class="row col-12">
                              <label for="exampleInputPassword1" class="form-label">Smoke</label>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" value="Yes"  name="Smoke" id="Smoke1" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Smoke1">Evet</label>
                              </div>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" name="Smoke" id="Smoke2" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" value="No"  for="Smoke2">Hayır</label>
                              </div>
                            </div>
                            <div class="mb-1 col-12 hide area-Smoke" >
                              <label for="exampleInputPassword1" class="form-label">Sıklığı</label>
                              <textarea class="form-control" name="SmokeFrequency"></textarea>
                            </div>

                             <div class="row col-12">
                              <label for="exampleInputPassword1" class="form-label">Alkol</label>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" value="Yes" name="Alcohol" id="Alcohol1" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Alcohol1">Evet</label>
                              </div>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" value="No" name="Alcohol" id="Alcohol2" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Alcohol2">Hayır</label>
                              </div>
                            </div>
                            <div class="mb-1 col-12 hide area-Alcohol">
                              <label for="exampleInputPassword1" class="form-label">Sıklığı</label>
                              <textarea class="form-control" name="AlcoholFrequency"></textarea>
                            </div>


                            <div class="row col-12">
                              <label for="exampleInputPassword1" class="form-label">Alerji</label>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" value="Yes" name="Alergy" id="Alergy1" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Alergy1">Evet</label>
                              </div>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" value="No" name="Alergy" id="Alergy2" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Alergy2">Hayır</label>
                              </div>
                            </div>
                            <div class="mb-1 col-12 hide area-Alergy">
                              <label for="exampleInputPassword1" class="form-label">Türü</label>
                              <textarea class="form-control" name="AlcoholFrequency"></textarea>
                            </div>



                    
<!-- 
                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" />
                    <label class="btn btn-outline-danger " for="option2">Radio</label> -->

                        </div>
                      </div>
                    </div>
                  </div>
                    </section>



                    <h6>ÖNİZLEME</h6>
                    <section class="payment-method text-center">
                      <h5 class="fw-semibold fs-5">Thank you for your purchase!</h5>
                      <h6 class="fw-semibold text-primary mb-7">Your order id: 3fa7-69e1-79b4-dbe0d35f5f5d</h6>
                      <img src="../assets/images/products/payment-complete.svg" alt="monster-img" class="img-fluid mb-4" width="350">
                      <p class="mb-0 fs-2">We will send you a notification
                        <br>within 2 days when it ships.
                      </p>
                      <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <a href="./eco-shop.html" class="btn btn-success d-block mb-2 mb-sm-0">Continue Shopping</a>
                        <a href="javascript:void(0)" class="btn btn-primary d-block">Download Receipt</a>
                      </div>
                    </section>





                    <!-- Step 5 -->
<!--                     <h6>ÖNİZLEME</h6>
                    <section class="payment-method text-center">
                      <h5 class="fw-semibold fs-5">Thank you for your purchase!</h5>
                      <h6 class="fw-semibold text-primary mb-7">Your order id: 3fa7-69e1-79b4-dbe0d35f5f5d</h6>
                      <img src="../assets/images/products/payment-complete.svg" alt="monster-img" class="img-fluid mb-4" width="350">
                      <p class="mb-0 fs-2">We will send you a notification
                        <br>within 2 days when it ships.
                      </p>
                      <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <a href="./eco-shop.html" class="btn btn-success d-block mb-2 mb-sm-0">Continue Shopping</a>
                        <a href="javascript:void(0)" class="btn btn-primary d-block">Download Receipt</a>
                      </div>
                    </section>
 -->

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="<?= asset('assets/js/vendor/jquery-3.5.1.min.js') ?>"></script>


    @endsection
    @section('script')
      <!-- solar icons -->
      <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
      <script src="assets/panel/libs/jquery-steps/build/jquery.steps.min.js"></script>
      <script src="assets/panel/libs/jquery-validation/dist/jquery.validate.min.js"></script>
      <script src="assets/panel/js/forms/form-wizard.js"></script>
      <script src="assets/panel/js/apps/ecommerce.js"></script>

      <script src="{{URL::asset('assets/js/vendor/datepicker/bootstrap-datepicker.min.js')}}"></script>
      <script type="text/javascript">
        /* Document Ready Start */
        $(document).ready(function(){
            SweetSelect('Status');
            _initDatepicker();
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
            $(document).on('change','input[name=CategoryChoice]', function(){
                console.log('CategoryChoice is made');
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
                              TreatmentBox.append(`<div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input Id="${Treatment['Id']}" onchange="javascript:TreatmentChoiceClicked(this);" data-time="${Treatment['EstimatedTime']}" type="radio" name="TreatmentChoice" value="${Treatment['Cost']}"  type="radio" class="form-imagecheck-input" >
                                  <span class="form-imagecheck-figure d-flex justify-content-center " style="flex-direction: column;align-items: center;">
                                    <img src="${Treatment['Img']}" alt="-" class="form-imagecheck-image">
                                    <b>${Treatment['Title']}</b>
                                  </span>
                                </label>
                              </div>`);
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
               Skip()
            });
            $(document).on('change','input[name=PackageChoice]', function(){
                console.log('CategoryChoice is made');
                let FeatureBox = $('#FeatureBox');
                window.Get['Category'] = $(this).attr('Id');
                $.ajax({
                  type: "POST",
                  url: "/ajax",
                  cache: false,
                  headers: {'X-CSRF-TOKEN': @json(csrf_token())},
                  data: {
                    Id: $(this).val(),
                    action: 'GetFeatures',
                    _token: @json(csrf_token())
                  },
                  success: function(data){
                    if (data['outcome']==true) {
                      FeatureBox.empty();
                        data['data'].forEach((Package)=>{
                          if (Package['Features'].length > 0) {
                            Package['Features'].forEach((Treatment)=>{
                              FeatureBox.append(`<div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input Id="${Treatment['Id']}" onchange="javascript:TreatmentChoiceClicked(this);" data-time="${Treatment['EstimatedTime']}" type="radio" name="TreatmentChoice" value="${Treatment['Cost']}"  type="radio" class="form-imagecheck-input" >
                                  <span class="form-imagecheck-figure d-flex justify-content-center " style="flex-direction: column;align-items: center;">
                                    <img src="${Treatment['Img']}" alt="-" class="form-imagecheck-image">
                                    <b>${Treatment['Title']}</b>
                                  </span>
                                </label>
                              </div>`);
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
               Skip()
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
            console.log('TreatmentChoice is made');
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
        function Book(){
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
            var NextBtn = $('a[href="#next"]');
            NextBtn.trigger('click');
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
        function _initDatepicker() {
           $('#datePickerEmbed').datepicker({ 
                format: 'yyyy-mm-dd',
                minDate: new Date()
            }).on('changeDate', function(e) {
                window.Get['Date'] = e.format();
                window.Get['DateFormat'] = 'Y-m-d';
                PickAuto(e);
            });  
        }

        $(document).on('change', 'input[type=radio]', function(){
            let key = $(this).attr('name');
            if ($(this).val()=='Yes') {
              $('.area-'+key).removeClass('hide');
            }else {
             $('.area-'+key).addClass('hide');
            }
        });
      </script>




    @endsection


