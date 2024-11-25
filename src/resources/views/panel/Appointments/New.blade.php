@extends('panel.App')

    @section('content')

      <script type="text/javascript">
        window.Get = {};
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
          transition-duration: 0.2s;
          transform-origin: 50% 50%;
      }
      .hide {
        display: none!important;
      }
      input[type="radio"]:checked + .treatmentcard {
/*          border: 2px solid #007bff; */
          box-shadow: 0 0 10px rgb(16 185 224);
      }
      input[type="checkbox"]:checked + .treatmentcard {
/*          border: 2px solid #007bff;*/
          box-shadow: 0 0 10px rgb(16 185 224);
      }
      table{
        width: 100%;
      }
      </style>
      <div class="body-wrapper">
        <div class="container-fluid">
          

<!--                 
                'Date'             => htmlspecialchars(@$_POST['Date']),
                'Package'          => htmlspecialchars(@$_POST['Package']),
                'AmountToPay'      => htmlspecialchars(@$_POST['AmountToPay']),
                'CountryCode'      => htmlspecialchars(@$_POST['CountryCode']),
                'PaymentMethod'    => htmlspecialchars(@$_POST['PaymentMethod']),
                'Features'         => explode(',', $_POST['Features'] ?? ''),
                'Status'            => htmlspecialchars(request('Status'))
-->

          <div class="checkout">
            <div class="card">
              <div class="card-body p-4">
                <div class="wizard-content">
                  <form action="ajax" target="NewAppointment" method="POST" class="tab-wizard wizard-circle needs-validation " id="NewAppointment" novalidate >

                    <input type="hidden" name="Category" value="{{$Category['uid']}}">
                    <input type="hidden" name="Treatment" value="{{$Treatment['uid']}}">
                    <input type="hidden" name="AgencyFee" value="{{$Agency['AgencyFee']}}">
                    <input type="hidden" name="CommissionRate" value="{{$Agency['CommissionRate']}}">
                    <input type="hidden" name="Package" >
                    <input type="hidden" name="Date" >
                    <input type="hidden" name="CountryCode" >

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


                          @foreach($Packages as $Package)

                          <div class="col-sm-6 col-xxl-6 " >
                            <label>
                              <input type="radio" style="display: none;" value="{{$Package['uid']}}" data-rate="{{$Package['Rate']}}" name="PackageChoice">
                            <div class="card overflow-hidden rounded-2 border treatmentcard" >
                              <div class="position-relative">
                                <a class="hover-img d-block overflow-hidden">
                                  <img src="{{$Package['Img']}}" class="card-img-top rounded-0" alt="monster-img">
                                </a>
                              </div>
                              <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">{{$Package['Title']}}</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                  <h6 class="fw-semibold fs-4 mb-0">
                                    <span class="ms-2 fw-normal text-muted fs-3">
                                      <p>{{$Package['Description']}}</p>
                                    </span>
                                  </h6>
                                  <br>
     <!--                              <div class="col-12">
                                    <ul style="list-style: none outside none!important;" class=" d-flex align-items-center mb-0">
                                    
                                    @for ($i=0; $i < $Package['Stat']; $i++)
                                      <li>
                                        <a class="me-1" href="javascript:void(0)">
                                          <i class="ti ti-star text-warning"></i>
                                        </a>
                                      </li>
                                    @endfor
                                  </ul>
                                  </div> -->
                                </div>
                              </div>
                            </div>
                            </label>
                          </div>
                          @endforeach
                        </div> 
                        
                    </section>


                    <!-- Step 4 -->
                    <h6>Features</h6>
                    <section class="step-1">
                        <div class="mb-3">
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
                                <input type="radio" class="btn-check" name="Gender" value="Female" id="Gender1" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Gender1">Kadın</label>
                              </div>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" name="Gender" value="Male" id="Gender2" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Gender2">Erkek</label>
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
                              <textarea class="form-control" name="PrevOperations"></textarea>
                            </div>

                            <div class="row col-12">
                              <label for="exampleInputPassword1" class="form-label">Smoke</label>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" value="True"  name="Smoke" id="Smoke1" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Smoke1">Evet</label>
                              </div>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" name="Smoke" value="False"  id="Smoke2" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12"  for="Smoke2">Hayır</label>
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
                                <input type="radio" class="btn-check" value="True" name="Alergy" id="Alergy1" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Alergy1">Evet</label>
                              </div>
                              <div class="mb-1 col-6">
                                <input type="radio" class="btn-check" value="False" name="Alergy" id="Alergy2" autocomplete="off"  />
                                <label class="btn btn-outline-primary col-12" for="Alergy2">Hayır</label>
                              </div>
                            </div>
                            <div class="mb-1 col-12 hide area-Alergy">
                              <label for="exampleInputPassword1" class="form-label">Türü</label>
                              <textarea class="form-control" name="AlergyType"></textarea>
                            </div>

                        </div>
                      </div>
                    </div>
                  </div>
                    </section>



                    <h6>ÖNİZLEME</h6>
                    <section class="payment-method text-center">


                  <h3>@Lang('NewAppointment.PaymentDetails')</h3>
                    <div class="mb-3  text-center ">
                            <label class="form-label"><h5>@Lang('NewAppointment.TotalAmount')</h5></label>
                            <input readonly name="TotalAmount"  class="result form-control" type="text" id="TotalAmount">
                    </div>
                    <div class="mb-3  text-center ">
                            <label class="form-label"><h5>@Lang('NewAppointment.AmountToPay')</h5></label>
                            <input  name="AmountToPay"  class="result form-control" type="text" id="AmountToPay">
                    </div>
                    <div class="mb-3  text-center ">
                            <label class="form-label"><h5>@Lang('NewAppointment.Commission')</h5></label>
                            <input readonly name="Commission"  class="result form-control" type="text" id="Commission">
                    </div>
                    <div class="mb-3  text-center ">
                            <label class="form-label"><h5>@Lang('NewAppointment.RemainingAmount')</h5></label>
                            <input  name="Remaining"  class="result form-control" type="text" id="Remaining" >
                    </div>

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">@Lang('NewAppointment.PaymentMethods')</label>
                      <select class="form-select" required name="PaymentMethod">
                        <option  selected></option>
                        @foreach($PaymentMethods as $Method)
                          <option selected value="{{$Method['Id']}}">{{$Method['Title']}}</option>
                        @endforeach
                      </select>
                    </div>


                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">@Lang('NewAppointment.AppointmentStatus')</label>
                      <select class="form-select" required name="Status">
                        <option selected value="1">Active</option>
                        <option value="2">On Hold</option>
                      </select>
                    </div>

                    </section>





                    <!-- Step 5 -->
<!--                     <h6>ÖNİZLEME</h6>
                    <section class="payment-method text-center">
                      <h5 class="fw-semibold fs-5">You made an Appointment!</h5>
                      <h6 class="fw-semibold text-primary mb-7">Your Appointment id: <span class="App-Id">00-0000-000-000</span></h6>
                      <img src="assets/panel/images/products/payment-complete.svg" alt="monster-img" class="img-fluid mb-4" width="350">
                      <p class="mb-0 fs-2">Appointment is made but payment is not done
                        <br>U can pay within 2 days
                      </p>
                      <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <a  class="btn btn-warning d-block mb-2 mb-sm-0">Ödemeye geç</a>
                      </div>
                    </section> -->

                    <button type="submit" style="display: block;">submit</button>
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
      <script src="{{asset('assets/panel/js/plugins/bootstrap-validation-init.js')}}"></script>
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
              var Country= phoneInput.getSelectedCountryData();
              $('input[name=CountryCode]').val(Country.dialCode);
              window.Get['Cell']=$(this).val();
              window.Get['CountryCode']=Country.dialCode;
            });
  

            $('#selectTopLabel').on('change', function(){
              window.Get['Time'] = $(this).val();
            });
            ///
            $(document).on('change','input[name=PackageChoice]', function(){
                window.PackageRate = $(this).data('rate');
                let FeatureBox = $('#FeatureBox');
                SetLoader(FeatureBox);
                $.ajax({
                  type: "POST",
                  url: "/ajax",
                  cache: false,
                  headers: {'X-CSRF-TOKEN': @json(csrf_token())},
                  data: {
                    uid: $(this).val(),
                    action: 'GetFeaturesForApp',
                    _token: @json(csrf_token())
                  },
                  success: function(data){
                    if (data['outcome']==true) {
                        FeatureBox.empty();
                        window.Package = data['Package'];
                        if (data['Features'].length) {
                            data['Features'].forEach((Feature)=>{
                              let Checked = Feature['Checked']=='1' ? 'checked ' : '';
                              let pointy = Feature['Checked']=='1' ? 'style="pointer-events: none;"' : ''; 
                              let Cost = Feature['Multiply']=='1' ? Feature['Cost']*parseInt({{$Treatment['EstimatedTime']}}) : Feature['Cost'];
                              FeatureBox.append(`<div class="col-sm-6 col-xxl-3 " >
                                  <label ${pointy}>
                                    <input type="checkbox" ${Checked} style="display: none;" value="${Feature['Id']}" Multiply="${Feature['Multiply']}"  name="Features[]" cost="${Cost}">
                                    <div class="card overflow-hidden rounded-2 border treatmentcard" >
                                      <div class="position-relative">
                                        <a class="hover-img d-block overflow-hidden">
                                          <img src="${Feature['Img']}" class="card-img-top rounded-0" alt="monster-img">
                                        </a>
                                      </div>
                                      <div class="card-body pt-3 p-4">
                                        <b class="fw-semibold fs-4">${Feature['Title']}</b>
                                        <div class="d-flex align-items-center justify-content-between">
                                          <p class="fw-semibold fs-4 mb-0">${Cost} €</p>
                                        </div>
                                      </div>
                                    </div>
                                  </label>
                                </div>`);
                            });
                        }else {
                          FeatureBox.append('<div style="border: 1px solid black; border-radius: 30px;" class="mb-4"><div class="text-danger mb-1">@Lang('Base.NotFound')</div></div>');
                        }
                    }else {
                      Swal.fire('Failed','An Error occurred', 'error');
                    }
                    CalculateTotal();
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
        function addDays(date, days) {
          var result = new Date(date);
          result.setDate(result.getDate() + days);
          return result;
        }
        ///
        function PickAuto(e){
          var EstimatedTime = parseInt({{$Treatment['EstimatedTime']}});
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
                $('#NewAppointment input[name="Date"]').val(window.Get['Date']);
                window.Get['DateFormat'] = 'Y-m-d';
                PickAuto(e);
            });  
        }

        $(document).on('change', 'input[type=radio]', function(){
            let key = $(this).attr('name');
            if ($(this).val()=='True') {
              $('.area-'+key).removeClass('hide');
            }else {
             $('.area-'+key).addClass('hide');
            }
        });

        function CalculateTotal(){
                window.Total = 0
                window.TreatmentCost = parseInt({{$Treatment['Cost']}});
                window.AgencyFee = parseInt({{User('Parent')['AgencyFee']}});

                window.PackageCost = (TreatmentCost * PackageRate) / 100;
                window.AgencyCost = (TreatmentCost * AgencyFee) / 100;

                let FeatureCosts = 0;
                $('#FeatureBox input[name="Features[]"]').each((index,item)=>{
                  if ($(item).is(':checked')){
                      console.log(item);
                      FeatureCosts += parseFloat($(item).attr('cost'));
                  }
                });

                Total = TreatmentCost + AgencyCost + PackageCost;
                Total += FeatureCosts; 
                window.Comission = (TreatmentCost * {{User('Parent')['CommissionRate']}}) / 100;
                window.AmountToPay = (Total * 25) / 100;
                window.Remaining = Total - AmountToPay;

                console.table({
                  'AgencyFee': AgencyFee,
                  'TreatmentCost': TreatmentCost,
                  'PackageCost': PackageCost,
                  'AgencyCost': AgencyCost,
                  'Comission': Comission,
                  'FeatureCosts': FeatureCosts,
                  'Total': Total
                });

                $('#TotalAmount').val(Total);
                $('#Commission').val(Comission);
                $('#AmountToPay').val(AmountToPay);
                $('#Remaining').val(Remaining);
        }
        ///
        $(".tab-wizard").steps({
          headerTag: "h6",
          bodyTag: "section",
          transitionEffect: "fade",
          titleTemplate: '<span class="step">#index#</span> #title#',
          labels: {
            finish: "Randevu Oluştur",
          },
          // onInit: function (event, currentIndex) {
          //   $(".actions a[href='#next']").hide();
          //   $(".actions a[href='#previous']").hide();
          // },
          onFinished: function (event, currentIndex) {
            $('#NewAppointment button[type=submit]').click();
            // Book();
            // swal(
            //   "Form Submitted!",
            //   "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed."
            // );
          },
        });


        function BookAppointment(uid){
            $('.wizard-content').html(`<section class="payment-method text-center"><h5 class="fw-semibold fs-5">You made an Appointment!</h5>
                      <h6 class="fw-semibold text-primary mb-7">Your Appointment id: <span class="App-Id">${uid}</span></h6>
                      <img src="assets/panel/images/products/payment-complete.svg" alt="monster-img" class="img-fluid mb-4" width="350">
                      <p class="mb-0 fs-2">Appointment is made but payment is not done
                        <br>U can pay within 2 days
                      </p>
                      <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <a  class="btn btn-warning d-block mb-2 mb-sm-0">Ödemeye geç</a>
                      </div></section>`);
        }
      </script>




    @endsection


