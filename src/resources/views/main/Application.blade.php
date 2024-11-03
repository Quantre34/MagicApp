<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Quantre34">
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="{{asset('assets/css/Application-global.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/Application.css')}}" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"
    />
    <link rel="shortcut icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <link href="{{URL::asset('assets/css/HoldOn.css')}}" rel="stylesheet">
    <script type="text/javascript">var options={theme:"sk-circle",message:'Yükleniyor',textColor:"white"};</script>
    <title>Apply | {{ (str_contains(Request::url(), 'magicmedical'))? 'MAGİCMEDİCAL' : 'MEDESCARE' }}</title>
  </head>
  <body>




    <div class="signup">

      <div class="frame">
        <div class="frame1">
          <img
            class="medescare-icon-1"
            alt="Medescare"
            src="{{ (str_contains(Request::url(), 'magicmedical'))? '/assets/img/logo/magic-medical-blue.jpg' : '/assets/img/Application/medescare-icon-1@2x.png' }}"
          />
        </div>
      </div>
      <b class="registration-form">@Lang('Application.FormTitle')</b>
      
      <div class="agency-information-wrapper">
        <div class="agency-information">@Lang('Application.AgencyInfo')</div>
      </div>
      <label class="agency-company-name-parent">
        <input class="agency-company" type="text" name="Title" placeholder="@Lang('Application.Title')">
        <img class="frame-child" alt="" src="{{asset('assets/img/Application/frame-3@2x.png')}}" />
      </label>  
      <label class="agency-company-name-parent">
        <input class="vat-number" type="text" name="VatNumber" placeholder="@Lang('Application.Vat')">
        <img class="icon-info-empty"  src="{{asset('assets/img/Application/-icon-info-empty@2x.png')}}" />
      </label>

      <div class="agency-company-name-parent">
        <select id="CategorySelect" name="Country" class="form-control agency-company LangSelect" style="height: 5vh; left: 0; top: 0; font-size: 15px;">
          <option style="opacity: 0.1;" value="null">Ülke Seç</option>
          @foreach($Countries as $Country)
            <option value="{{ $Country['name'] }}" >{{ $Country['name'] }}</option>
          @endforeach
        </select>
      </div>
      <label class="agency-company-name-parent">
        <input class="address" type="text" name="Address" placeholder="@Lang('Application.Address')">
        <img class="icon-pin-alt"  src="{{asset('assets/img/Application/-icon-pin-alt@2x.png')}}" />
      </label>

<!--       <label class="agency-company-name-parent">
        <input class="address" type="text" name="Province" placeholder="@Lang('Application.Province')">
        <img class="icon-globe"  src="{{asset('assets/img/Application/-icon-globe@2x.png')}}" />
      </label>
      <label class="agency-company-name-parent">
        <input class="address" type="text" name="City" placeholder="@Lang('Application.City')">--
        <img class="icon-globe"  src="{{asset('assets/img/Application/-icon-globe@2x.png')}}" />
      </label> -->
      <label class="agency-company-name-parent">
        <input class="address" type="text" name="Website" placeholder="@Lang('Application.Website')">
        <img class="website-icon"  src="{{asset('assets/img/Application/website@2x.png')}}" />
      </label>

      <div class="agency-information-wrapper">
        <div class="agency-information">@Lang('Application.AgentInfo')</div>
      </div>

      <label class="agency-company-name-parent">
        <input class="address" type="text" name="FirstName" placeholder="@Lang('Application.FirstName')">
        <img class="website-icon"  src="{{asset('assets/img/Application/profile@2x.png')}}" />
      </label>
      <label class="agency-company-name-parent">
        <input class="address" type="text" name="LastName" placeholder="@Lang('Application.LastName')">
        <img class="website-icon"  src="{{asset('assets/img/Application/profile@2x.png')}}" />
      </label>
      <label class="agency-company-name-parent">
        <input class="vat-number" type="email" name="Mail" placeholder="@Lang('Application.Mail')">
        <img class="email-icon"  src="{{asset('assets/img/Application/email@2x.png')}}" />
      </label>
      <label class="agency-company-name-parent">
        <input class="whatsapp-number" type="text" name="Tell" placeholder="@Lang('Application.Tell')">
        <img class="frame-item"  src="{{asset('assets/img/Application/email@2x.png')}}" />
      </label>
      <label class="agency-company-name-parent">
        <input class="vat-number" type="text" name="ReferenceCode" placeholder="@Lang('Application.ReferenceCode')">
        <img class="vector-icon"  src="{{asset('assets/img/Application/vector@2x.png')}}" />
      </label>



      <div onclick="Send()" class="frame2">
        <div class="frame-inner"></div>
        <img class="vector-icon1" alt="" src="{{asset('assets/img/Application/vector@2x.png')}}" />

        <b  class="register">@Lang('Application.Register')</b>
      </div>

              <form onchange="javascript:$(this).submit();" action="ajax" method="POST" target="ChangeLang" >
                <select name="Lang" class="form-control LangSelect" >
                  <option {{(App::getLocale()=='tr')? 'selected': ''}} value="tr">Turkçe</option>
                  <option {{(App::getLocale()=='en')? 'selected': ''}}  value="en">English</option>
                  <option {{(App::getLocale()=='de')? 'selected': ''}}  value="de">Deutsch</option>
                </select>
              </form>
      <div class="thank-you-for-your-application-parent">
        <div class="thank-you-for">@Lang('Application.Thanks')</div>
        <div class="instagram-parent">
          <img class="instagram-icon" alt="" src="{{asset('assets/img/Application/instagram@2x.png')}}" />

          <img class="whatsapp-icon" alt="" src="{{asset('assets/img/Application/whatsapp@2x.png')}}" />

          <img class="facebook-icon" alt="" src="{{asset('assets/img/Application/facebook@2x.png')}}" />
        </div>
      </div>
      <div class="all-rights-reserved-medescar-wrapper">

        <div class="all-rights-reserved">
          @Lang('Application.Rights') | {{ (str_contains(Request::url(), 'magicmedical'))? 'MAGİCMEDİCAL' : 'MEDESCARE' }} 2024
        </div>
      </div>

    </div>
    <style type="text/css">
  
.agency-information {
  display: flex;
  justify-content: center;
}  

.LangSelect {
    width: 15vw;
    border-radius: 30px;
    font-size: 20px;
    display: block;
    text-align: center;
    height: 6vh;


    border-radius: var(--br-21xl);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    width: 300px;
/*    height: 0px;*/
}

.agency-company-name-parent {
    position: relative;
    border-radius: var(--br-21xl);
    background-color: var(--color-white);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    width: 300px;
    height: 0px;
    padding: 25px 0;
}
.register {
    position: absolute;
    top: 0;
    left: 10px;
    display: inline-block;
    width: 107px;
    height: 34px;
}


.signup {
    position: relative;
    background-color: var(--color-white);
    width: 100%;
    height: max-content!important;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 0 20px;
    box-sizing: border-box;
    gap: 40px;
    text-align: left;
    font-size: var(--font-size-mini);
    color: var(--color-silver);
    font-family: var(--font-lato)
  }


@media (max-width: 768px) {
    .LangSelect {
      width: 50vw;
      border-radius: 30px;
      font-size: 20px;
      display: block;
      text-align: center;
      height: 4vh;
  }
  .register {
      position: absolute;
      top: 0;
      left: 42px;
      display: inline-block;
      width: 107px;
      height: 34px;
  }
  .vector-icon1 {
      position: absolute;
      top: 8px;
      left: 231px;
      width: 18px;
      height: 18px;
      object-fit: contain;
  }
.frame-inner {
    position: absolute;
    top: 0;
    left: 209px;
    border-radius: 17px;
    background: linear-gradient(135deg, #0bb4dc, #035aaa);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
    width: 56px;
    height: 34px;
  }

}

select {
    outline: none;
    border: 1px solid #fff;
    padding: 8px;
    border-radius: 4px;
    background-color: white;
    appearance: none; /* Remove the default arrow */
    -webkit-appearance: none; /* Safari and Chrome */
    -moz-appearance: none; /* Firefox */
}

/* Add custom arrow icon for select element */
select {
    background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px;
}

    </style>
    <script src="{{URL::asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/HoldOn.js')}}"></script>
    <script src="{{URL::asset('assets/js/HoldOn.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">

                  function Send(){
                      HoldOn.open(options);

                      let formData = new FormData();
                      formData.append('action', 'AgencyApply');
                      $('input').each(function(){
                        formData.append($(this).attr('name'),$(this).val());
                      });
                      $('select').each(function(){
                        formData.append($(this).attr('name'),$(this).val());
                      });
                      $.ajax({
                        type: 'POST',
                        url: '/ajax',
                        cache: false,
                        processData: false,
                        datatype: 'json',
                        contentType: false,
                        headers: {'X-CSRF-TOKEN' : @json(csrf_token())},
                        data: formData,
                        success: function(data){
                          HoldOn.close();
                          if (data['outcome']) {
                                if (!data['NoAlert']) {
                                    Swal.fire('@Lang('Base.Success')', (data['Message']?? '@Lang('Base.Successfuly')'), 'success').then((result)=>{
                                      $('input').css('border','1px solid var(--separator)');
                                      if (data['route']) {
                                          window.location = data['route'];
                                      }
                                    });
                                }else {
                                  if (data['route']) {
                                        window.location = data['route'];
                                  }
                                }
                          }else {
                              Swal.fire('@Lang('Base.Failed')', data['ErrorMessage'], 'error').then((result)=>{
                                if (data['route']) {
                                    window.location = data['route'];
                                }
                                if (data['tag']) {
                                    $('input[name='+data['tag']+']').parent('label').css('border', '1px solid red');
                                    $('select[name='+data['tag']+']').parent('label').css('border', '1px solid red');
                                }
                              });
                          }
                        } 
                      });
                  }


            $(document).ready(function(){
                ///
                    $.fn.hasAttr = function(name){
                        return this.attr(name) !== undefined;
                    }
                    ///
                    _initCategorySelect();
                    
                  $('form').on('submit', function(e){
                    let $this = $(this);
                    if ($this.attr('action')=='ajax') {
                        HoldOn.open(options);
                        let target = $this.attr('target');
                        let callback = $this.attr('callback');
                        let formData = new FormData(this);
                        formData.append('action', target);
                        if($this.hasAttr('callback')){
                          formData.append('callback', $this.attr('callback'));
                        }
                        $.ajax({
                          type: $this.attr('method'),
                          url: '/ajax',
                          cache: false,
                          processData: false,
                          datatype: 'json',
                          contentType: false,
                          headers: {'X-CSRF-TOKEN' : @json(csrf_token())},
                          data: formData,
                          success: function(data){
                            HoldOn.close();
                            if (data['outcome']) {
                                  if (!data['NoAlert']) {
                                      Swal.fire('Success', (data['Message']?? 'Task Completed'), 'success').then((result)=>{
                                        $('input').css('border','1px solid var(--separator)');
                                        if (data['route']) {
                                            window.location = data['route'];
                                        }
                                      });
                                  }else {
                                    if (data['route']) {
                                          window.location = data['route'];
                                    }
                                  }
                            }else {
                                Swal.fire('Failed!', data['ErrorMessage'], 'error').then((result)=>{
                                  if (data['route']) {
                                      window.location = data['route'];
                                  }
                                  if (data['tag']) {
                                      $('input[name='+data['tag']+']').css('border', '1px solid red');
                                      $('select[name='+data['tag']+']').css('border', '1px solid red');
                                  }
                                });
                            }
                          } 
                        });
                    }
                    return false;
                  });
                  ///
            });


        function _initCategorySelect() {
          if (document.getElementById('CategorySelect') !== null && jQuery().select2) {
              jQuery('#CategorySelect').select2({minimumResultsForSearch: 3, placeholder: ''});
          }
        }
        </script>

        @include('main.Cookie')
  </body>
</html>
