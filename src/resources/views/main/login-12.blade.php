<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
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

    .swal2-x-mark span {
        font-size:100%;
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
      input.form-control {
          width: 200px!important;
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
    </script>
</head>
<body >

<center>
<section>
    <div class="container " id="container">
        <div   class="form-container sign-up-container">

            <form  method="POST" id="SignUpForm" target="ajax" action="SignUp">
                <!-- Logo Start -->
                <div style="padding: 0;" class="logo position-relative"  >
                    <!-- <img style="@if(isMobile()) margin-top: 15%; @endif width:200px;" class="logoin" width="250" src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic_medikal-13.png') : asset('assets/img/logo/1_MEDESCARE-LOGO-MAVI.png')}}" alt="logo" /> -->
                </div>
                <!-- Logo End -->
                <h5>{{Lang::get('Login.ApplyForAgency')}}</h5>
                <label>
                    <input class="form-control" type="text" placeholder="{{Lang::get('Login.FullName')}}" name="FullName"/>
                </label>
                <label>
                    <input class="form-control" type="text" placeholder="{{Lang::get('Login.CompanyName')}}" name="Title"/>
                </label>
                <label>
                    <input width="200" class="form-control" type="email" name="Mail" placeholder="{{Lang::get('Login.Email')}}"/>
                </label>
                <label>
                    <input class="form-control" type="text" name="ReferenceCode" placeholder="{{Lang::get('Login.ReferenceCode')}}"/>
                </label>
                <label>
                    <input class="form-control" title="Not Valid"  type="tel"  id="Cell" name="Cell">
                </label>
                <button style="margin-top: 9px">{{Lang::get('Login.Send')}}</button>
            </form>
        </div>
        <div  class="form-container sign-in-container">

            <form method="POST" id="LoginForm" target="ajax" action="Login">
                <!-- Logo Start -->
                <div  class="logo position-relative " style="margin-bottom: 15%;">
                    <!-- <img style="width: 200px;" class="logoin"  src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic_medikal-13.png') : asset('assets/img/logo/1_MEDESCARE-LOGO-MAVI.png')}}" alt="logo" /> -->
                </div>
                <!-- Logo End -->
                <h3>{{Lang::get('Login.LoginWithYourMail')}}</h3>
                @if(!isMobile())
                    <div class="social-container">
                        <a href="https://instagram.com/medescare" target="_blank" class="social"><i data-acorn-icon="instagram"></i></a>
                        <a href="https://facebook.com/medescare" target="_blank" class="social"><i data-acorn-icon="facebook"></i></a>
                        <a href="mailto:info@medescare.com" target="_blank" class="social"><i data-acorn-icon="email"></i></a>
                    </div>
                @endif
                <label>
                    <input type="email" name="Mail" placeholder="Email"/>
                </label>
                <label>
                    <input type="password" name="Password" placeholder="Password"/>
                </label>
                <!-- <a href="#">Forgot your password?</a> -->
                <button type="submit">{{Lang::get('Login.Login')}}</button>
            </form>
        </div>
        <div  class="overlay-container">
            
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <!-- <p style="text-align: center;">@Lang('Login.PoweredBy')</p> -->
                        <img class="pinned" width="200" src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic-medical.png') : asset('assets/img/logo/1_MEDESCARE LOGO BEYAZ.png')}}">
                        <br><br><br>
                        <h1>{{Lang::get('Login.Login')}} </h1>
                        <p>{{Lang::get('Login.SignInText')}}</p>
                        <button class="ghost mt-5" id="signIn">{{Lang::get('Login.Login')}}</button>
                    </div>
                    <div class="overlay-panel overlay-right" style="display: flex; flex-direction: columns; align-items: center;">
                        <!-- <p style="text-align: center;">@Lang('Login.PoweredBy')</p> -->

                        <img class="pinned" width="200" src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic-medical.png') : asset('assets/img/logo/1_MEDESCARE LOGO BEYAZ.png')}}">
                       
                        <br><br><br>
                        <h1>{{Lang::get('Login.JoinUs')}} </h1>
                        <p>{{Lang::get('Login.ApplyForAgency')}} ... </p>
                        <a id="signUp" href="#"><button class="ghost" >{{Lang::get('Login.JoinUs')}}</button></a>
                        <button hidden class="ghost" id="signUp">{{Lang::get('Login.JoinUs')}}</button>
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
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');



signUpButton.addEventListener('click', () =>
    container.classList.add('right-panel-active'));
signInButton.addEventListener('click', () =>
    container.classList.remove('right-panel-active'));

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

<?php 
    if (isset($_GET['SignUp'])) {
        echo '$("#signUp").click();';
    }
?>

$('form').on('submit', function(e){
  if( $(this).attr('target') == 'ajax' ){
    e.preventDefault();
    let action = $(this).attr('action');
    let formData = new FormData(this);
    formData.append('action', action);
    formData.append('CountryCode', window.Get['CountryCode']);
    $.ajax({
      type: 'POST',
      url: "/ajax",
      cache: false,
        processData : false,
        datatype : 'json',
        contentType : false,
      headers: {'X-CSRF-TOKEN': @json(csrf_token())},
      data: formData,
      success: function(data){
        if (data['outcome']==true) {
          Swal.fire('{{Lang::get('Base.Success')}}',(data['Message']?? '{{Lang::get('Base.Successfuly')}}'),'success').then(()=>{
            if (data['route']) {
                window.location = data['route'];
            }
          });
        }else {
          Swal.fire('{{Lang::get('Base.Failed')}}', data['ErrorMessage'],'error');
        }
      }
    });
    return false;
  }
});


  function _initIcons() {
    if (typeof AcornIcons !== 'undefined') {
      new AcornIcons().replace();
    }
  }

    @if(isMobile())
        const resizeOps = () => {
            document.documentElement.style.setProperty("--vh", window.innerHeight * 0.01 + "px");
        };
        resizeOps();
        window.addEventListener("resize", resizeOps);
    @endif
</script>
<!--         @if (\Session::has('outcome'))
          <script type="text/javascript">
              $(document).ready(function(){
                  islem = '<?php echo (Session::get('outcome')==true)? 'İşlem başarılı' : 'İşlem başarısız'; ?>';
                  Swal.fire(islem, '<?php echo Session::get('ErrorMessage');  ?>','<?php echo (Session::get('outcome')==true)? 'success' : 'error'; ?>').then((result)=>{
                      <?php 
                      echo (\Session::has('route'))? 'window.location="'.Session::get('route').'"; ' : '' ;
                      echo (\Session::has('tag'))? '$("#'.Session::get('tag').'").css("border", "1px solid red");' : '' ;
                      ?>
                  });s
              });
          </script>
        @endif -->


        @include('main.Cookie')




</body>
</html>