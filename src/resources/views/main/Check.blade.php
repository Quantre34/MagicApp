<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title>Medescare | Check Appointment</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/icon/favicon.png')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/login-1.css')}}">
    <script src="{{URL::asset('assets/icon/acorn-icons.js')}}"></script>
    <script src="{{URL::asset('assets/icon/acorn-icons-interface.js')}}"></script>
    <script src="{{URL::asset('assets/icon/acorn-icons-medical.js')}}"></script>
    <!--  Cell input with COuntry Code -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <style type="text/css">
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

    /* mobile optimization test */
    @if(isMobile())
    .container {
        width: 100vw;
        height: 100%;
/*      height: calc(var(--vh, 1vh) * 50);*/

    }
    .pinned, .logoin {
        width: 100%!important;
    }
    #SignUpForm input {
        margin: 2px 0 !important;
    }
    @endif
    /* mobile optimization test */
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <!--  Cell input with COuntry Code -->

    <script type="text/javascript">
        window.Get = {};
        @if(isMobile())
            const resizeOps = () => {
                document.documentElement.style.setProperty("--vh", window.innerHeight * 0.01 + "px");
            };
            resizeOps();
            window.addEventListener("resize", resizeOps);
        @endif
    </script>
</head>
<body >

<center>
<section>
    <div class="container " id="container">
        <div  class="form-container sign-in-container">
            <form action="javascript:return false;">
                <!-- Logo Start -->
                <div  class="logo position-relative" style="margin-bottom: 15%;">
                    <img class="logoin" width="250" src="{{URL::asset('assets/img/logo/1_MEDESCARE-LOGO-MAVI.png')}}" alt="logo" />
                </div>
                <!-- Logo End -->
                <h3>{{Lang::get('Login.CheckUrApp')}}</h3>
                @if(!isMobile())
                    <div class="social-container">
                        <a href="https://instagram.com/medescare" target="_blank" class="social"><i data-acorn-icon="instagram"></i></a>
                        <a href="https://facebook.com/medescare" target="_blank" class="social"><i data-acorn-icon="facebook"></i></a>
                        <a href="mailto:info@medescare.com" target="_blank" class="social"><i data-acorn-icon="email"></i></a>
                    </div>
                @endif
                
                <label>
                    <input class="form-control" type="text" onkeypress="javascript:window.Get['AppId']=$(this).val();" onchange="javascript:window.Get['AppId']=$(this).val();" name="AppId" placeholder="@Lang('Login.AppointmentId')" />
                </label>
                
                <button onclick="javascript:window.location = '/Check/'+window.Get['AppId']" type="submit">@Lang('Login.Check')</button>
            </form>
        </div>
        <div  class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right" style="display: flex; flex-direction: columns; align-items: center;">
                        <p style="text-align: center;">@Lang('Login.PoweredBy')</p>
                        <img class="pinned" width="200" src="{{('/assets/img/logo/medical-miracle.png')}}">
                        <br><br><br>
                    </div>
                </div>
        </div>
    </div>
</section>
</center>

<!-- Animated Wave Background  -->
<!-- <div class="ocean">
    <div class="wave"></div>
    <div class="wave"></div>
</div> -->
<!-- Log In Form Section -->

<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

$(document).ready(function(){
    _initIcons();
   const phoneInputField = document.querySelector("#Cell");
   const phoneInput = window.intlTelInput(phoneInputField, {
          initialCountry: "{{ (App::getLocale()=='en')? 'us' : App::getLocale() }}",
          utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      });
  $("input[name=Cell").on('change',function() {
    var ConutrySelect = phoneInput.getSelectedCountryData();
    console.log(ConutrySelect);
    window.Get['Cell']=$(this).val();
    window.Get['CountryCode']=ConutrySelect.dialCode;
  });
});


  function _initIcons() {
    if (typeof AcornIcons !== 'undefined') {
      new AcornIcons().replace();
    }
  }

</script>
        @if (\Session::has('outcome'))
          <script type="text/javascript">
              $(document).ready(function(){
                  islem = '<?php echo (Session::get('outcome')==true)? 'İşlem başarılı' : 'İşlem başarısız'; ?>';
                  Swal.fire(islem, '<?php echo Session::get('ErrorMessage');  ?>','<?php echo (Session::get('outcome') ==  true)? 'success' : 'error'; ?>').then((result)=>{
                      <?php 
                      echo (\Session::has('route'))? 'window.location="'.Session::get('route').'"; ' : '' ;
                      echo (\Session::has('tag'))? '$("#'.Session::get('tag').'").css("border", "1px solid red");' : '' ;
                      ?>
                  });s
              });
          </script>
        @endif
<a href="https://wa.me/905379797206?text=Hello" class="whatsapp" target="_blank"><img class="whatsapp-icon" src="{{asset('assets/svg/icons8-whatsapp-96.svg')}}"></a>
<style type="text/css">
  .whatsapp {
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:30px;
  z-index:9999;
}

.whatsapp-icon {
  margin-bottom:13px;
}
</style>
@include('main.Cookie')
</body>
</html>