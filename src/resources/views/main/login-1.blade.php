<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

  <!-- Core Css -->
  <link rel="stylesheet" href="assets/panel/css/styles.css" />

  <title>Monster Bootstrap Admin</title>
  <script type="text/javascript">
    window.Get = {};
  </script>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
     <img src="{{asset('assets/icon/favicon.png')}}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper" class="auth-customizer-none">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center">
              <div class="col-12">
                <a href="../main/index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                  <img src="assets/panel/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
                  <img src="assets/panel/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
                </a>
              </div>
              <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                <h3 class="mb-1 fs-7 fw-bolder"> Medescare Panel</h3>

                <div class="position-relative text-center my-4">
                  <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                </div>
                <form method="POST" id="LoginForm" target="ajax" action="Login">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="email" name="Mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="Password" class="form-control" id="exampleInputPassword1">
                  </div>

                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                  <!-- <div class="d-flex align-items-center justify-content-center">
                    <a class="text-primary fw-medium ms-2" href="../main/authentication-register.html">Create an
                      account</a>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
          <div class="col-xl-7 col-xxl-8 d-none d-xl-block">
            <div class="d-none d-xl-flex align-items-center justify-content-center h-100">
              <img src="assets/panel/images/backgrounds/user-login.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <!-- Import Js Files -->
  <script src="assets/panel/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/panel/libs/simplebar/dist/simplebar.min.js"></script>
  <script src="assets/panel/js/theme/app.init.js"></script>
  <script src="assets/panel/js/theme/theme.js"></script>
  <script src="assets/panel/js/theme/app.min.js"></script>

  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>



<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<input type="hidden" name="Cell" id="Cell">
<script type="text/javascript">
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');


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



</body>

</html>