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
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
            <div class="card mb-0">
              <div class="card-body">
                <a href="/" class="align-items-center d-flex justify-content-center logo-img mb-5 text-center text-nowrap w-100">
                  <img src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic-medical.png') : Main('Logo')}}" class="dark-logo" alt="Logo-Dark" />
                  <!-- <img src="{{Main('AlternativeLogo')}}" class="light-logo" alt="Logo-light" /> -->
                </a>
                <div class="row">
 <!--                  <div class="col-6 mb-2 mb-sm-0">
                    <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                      <img src="../assets/images/svgs/google-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                      <span class="flex-shrink-0">with Google</span>
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                      <img src="../assets/images/svgs/facebook-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                      <span class="flex-shrink-0">with FB</span>
                    </a>
                  </div> -->
                </div>
                <div class="position-relative text-center my-4">
                  <!-- <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">or sign in with</p> -->
                  <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                </div>
                <div class="login-form">
                  <form method="POST" id="LoginForm" target="ajax" action="Login" class="LoginForm needs-validation"  novalidate>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{Lang::get('Login.Email')}}</label>
                        <input type="email" name="Mail" class="form-control"  aria-describedby="emailHelp">
                      </div>
                      <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">{{Lang::get('Login.Password')}}</label>
                        <input type="password" name="Password" class="form-control" >
                      </div>
                    
  <!--                   <div class="d-flex align-items-center justify-content-between mb-4">
                      <div class="form-check">
                        <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label text-dark" for="flexCheckChecked">
                          Remeber this Device
                        </label>
                      </div>
                      <a class="text-primary fw-medium" href="../main/authentication-forgot-password.html">Forgot Password ?</a>
                    </div> -->
                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">{{Lang::get('Login.Login')}}</button>
                  <div class="position-relative text-center my-4">
                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">or</p>
                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                  </div>
                    <div class="d-flex align-items-center justify-content-center">
                      <a class="text-primary fw-medium ms-2" href="javascript:$('.signup-form').fadeIn('slow');$('.login-form').fadeOut('fast');">{{Lang::get('Login.ApplyForAgency')}}</a>
                    </div>
                  </form>
                </div>


                <div class="signup-form" style="display: none;">
                  <form method="POST" id="LoginForm" target="ajax" action="SignUp" class="LoginForm needs-validation"  novalidate>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{Lang::get('Login.FullName')}}</label>
                        <input type="email" name="FullName" class="form-control" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{Lang::get('Login.CompanyName')}}</label>
                        <input type="email" name="Title" class="form-control" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{Lang::get('Login.Email')}}</label>
                        <input type="email" name="Mail" class="form-control" aria-describedby="emailHelp">
                      </div>
                       <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{Lang::get('Login.ReferenceCode')}}</label>
                        <input type="email" name="ReferenceCode" class="form-control" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input type="email" id="Cell" name="Cell" class="form-control" aria-describedby="emailHelp">
                      </div>                    

                      <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">{{Lang::get('Login.ApplyForAgency')}}</button>
                      <div class="position-relative text-center my-4">
                        <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">or</p>
                        <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                      </div>
                      <div class="d-flex align-items-center justify-content-center">
                        <a class="text-primary fw-medium ms-2" href="javascript:$('.login-form').fadeIn('slow');$('.signup-form').fadeOut('fast');">{{Lang::get('Login.Login')}}</a>
                      </div>
                  </form>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="icon ti ti-settings fs-7"></i>
      </button>


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