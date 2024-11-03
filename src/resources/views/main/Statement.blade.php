<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ (str_contains(Request::url(), 'magicmedical'))? 'Agency | MagicMedical' : 'Agency | Medescare' }}</title>
    <!-- Bootstrap Css Cdn --> 
    <link rel="shortcut icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Style Css -->
    <link rel="stylesheet" href="{{asset('assets/css/landing-page.css?1')}}">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Futura:wght@700&display=swap" />
          <!-- hold on -->
    <link href="{{URL::asset('assets/css/HoldOn.css')}}" rel="stylesheet">
    <script type="text/javascript">var options={theme:"sk-circle",message:'Yükleniyor',textColor:"white"};</script>
    <!-- hold on -->
    <meta name="author" content="Quantre34">
    <meta property="og:site_name" content="{{ (str_contains(Request::url(), 'magicmedical'))? 'MagicMedical' : 'Medescare' }}" />
    <meta property="og:title" content="{{ (str_contains(Request::url(), 'magicmedical'))? 'MagicMedical' : 'Medescare' }} Agency Panel"/>
    <meta property="og:description" content="Your Agency Gateway to Health Tourism" />
    <meta property="og:type" content="B2B Agency Panel" />
    <meta property="og:url" content="{{Request::url()}}" />


    <meta property="og:image" content="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic-medical.png') : asset('assets/img/logo/1_MEDESCARE-LOGO-MAVI.png')}}" />
    <meta property="og:image:width" content="10" />
    <meta property="og:image:height" content="10" />

</head>

<body>

    <!-- First Section -->
    <section class="firstSection">
        <header>
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">
                            <img class="img-fluid" width="200" src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic_medikal-13.png') : asset('assets/main/login/medescare-logo.svg')}}" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a  href="/Login" class="nav-link active" aria-current="page" >{{Lang::get('LandingPage.Login')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/Login?SignUp">{{Lang::get('LandingPage.SignUp')}}</a>
                                </li>
                                <li style="margin-top: 3%!important;" class="nav-item">
                                    <form onchange="javascript:$(this).submit();" action="ajax" method="POST" target="ChangeLang" >
                                        <select name="Lang" class="form-control">
                                          <option {{(App::getLocale()=='tr')? 'selected': ''}} value="tr">Turkçe</option>
                                          <option {{(App::getLocale()=='en')? 'selected': ''}}  value="en">English</option>
                                          <option {{(App::getLocale()=='de')? 'selected': ''}}  value="de">Deutsch</option>
                                        </select>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Home Top Content -->


        <section class="topContent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="topContentText">
                            <h4>{{Lang::get('LandingPage.h4-1')}}</h4>
                            <p>{{Lang::get('LandingPage.p1')}}</p>

                            <div class="btnContainer mt-5">
                                <a href="/Login" class="topContentBtn">{{Lang::get('LandingPage.GetStarted')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{('assets/main/login/top-content-images-1.svg')}}" alt="Top Content İmages" class="img-fluid">
                    </div>
                </div>
                <!-- Second Section -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="secondSectionText">
                            <p class="firstP">{{Lang::get('LandingPage.p2')}}</p>
                            <p>{{Lang::get('LandingPage.p3')}}</p>
                            <span>{{Lang::get('LandingPage.span1')}}
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="secondSectionİmg">
                            <img src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/landingpage3.png') : asset('assets/main/login/second-section-1.png')}}" alt="Second Section İmages" class="img-fluid">
                        </div>
                    </div>
                </div>
                <!-- Second Section End-->
                <!-- Three Section -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="secondSectionİmg">
                            <img src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/landingpage4.png') : asset('assets/main/login/second-section-2.png')}}" alt="Second Section İmages" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="secondSectionText">
                            <p class="firstP">{{Lang::get('LandingPage.p4')}}</p>
                            <span>{{Lang::get('LandingPage.span2')}}
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Three Section End-->
            </div>
        </section>
        <!-- Home Top Content End-->
    </section>
    <!-- First Section End-->
    <!-- Section Client -->
    <section class="client mt-5">
        <div class="container">
            <h6 class="text-center">{{Lang::get('LandingPage.h6-1')}}</h6>
            <div class="d-flex justify-content-center mt-4">
                <p class="text-center" style="width: 80%;">
                    {{ str_replace("{AppName}", ((str_contains(Request::url(), 'magicmedical'))? 'MagicMedical' : 'MedesCare'), Lang::get('LandingPage.p5')) }}
                </p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <img src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/landingpage5.png') : asset('assets/main/login/client-images.png')}}" alt="Client İmages" class="img-fluid position-images">
                </div>
            </div>
        </div>
    </section>
    <!-- Section Client End-->
    <!-- Section Agencies -->
    <section class="agencies">
        <div class="container">
            <p class="pt-5">{{Lang::get('LandingPage.p6')}}</p>
            <p class="text-white p2">{{Lang::get('LandingPage.p7')}}</p>
            <div class="row">
                <div class="col-lg-12">
                    <img src="{{('assets/main/login/agencies-photo.png')}}" alt="Agencies Photo" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- Section Agencies End-->
    <!-- Section Steps -->
    <section class="steps">
        <div class="container">
            <h6 class="text-center">{{Lang::get('LandingPage.h6-2')}}</h6>
            <p class="text-center mt-4">{{Lang::get('LandingPage.p8')}}</p>
            <div class="row mt-100">
                <div class="col-lg-3">
                    <h6>{{Lang::get('LandingPage.Step1')}}</h6>
                    <h5>{{Lang::get('LandingPage.h5-1')}}</h5>
                    <p>{{Lang::get('LandingPage.p9')}}
                    </p>
                </div>
                <div class="col-lg-3">
                    <h6>{{Lang::get('LandingPage.Step2')}}</h6>
                    <h5>{{Lang::get('LandingPage.h5-2')}}</h5>
                    <p>{{Lang::get('LandingPage.p10')}}</p>
                </div>
                <div class="col-lg-3">
                    <h6>{{Lang::get('LandingPage.Step3')}}</h6>
                    <h5>{{Lang::get('LandingPage.h5-3')}}</h5>
                    <p> {{Lang::get('LandingPage.p11')}}</p>
                </div>
                <div class="col-lg-3">
                    <h6>{{Lang::get('LandingPage.Step4')}}</h6>
                    <h5>{{Lang::get('LandingPage.h5-4')}}</h5>
                    <p>{{Lang::get('LandingPage.p12')}}</p>
                </div>
            </div>
            <div class="stepsEndText">
                <p class="text-center">{{ Lang::get('LandingPage.p13') }}</p>
            </div>
        </div>
    </section>
    <!-- Section Steps End-->
    <!-- Section The End Start-->
    <section class="end">
        <div class="container">
            <p class="endsp1">{{Lang::get('LandingPage.p14')}}</p>
            <p class="endsp2">{{Lang::get('LandingPage.p15')}}</p>
            <div class="row mt-100">
                <div class="col-lg-3">
                    <div class="iconBox">
                        <img src="{{('assets/main/login/icon-1.svg')}}" alt="end icon" class="img-fluid">
                        <h5 class="mt-3">{{Lang::get('LandingPage.ClientManagement')}}</h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="iconBox">
                        <img src="{{('assets/main/login/icon-2.svg')}}" alt="end icon" class="img-fluid">
                        <h5 class="mt-3">{{Lang::get('LandingPage.AppointmentSchedule')}}</h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="iconBox">
                        <img src="{{('assets/main/login/icon3.svg')}}" alt="end icon" class="img-fluid">
                        <h5 class="mt-3">{{Lang::get('LandingPage.ProfitTracking')}}</h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="iconBox">
                        <img src="{{('assets/main/login/icon-4.svg')}}" alt="end icon" class="img-fluid">
                        <h5 class="mt-3">{{Lang::get('LandingPage.WorkDone')}}</h5>
                    </div>
                </div>
            </div>
            <div class="row mt-100">
                <div class="col-lg-6">
                    <div class="AccountLeft">
                        <p>{{Lang::get('LandingPage.ReadyToStart')}}</p>
                        <br>
                        <span>{{Lang::get('LandingPage.CarryUrBusiness')}}</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accountRight">
                        <a href="/Login?SignUp">{{Lang::get('LandingPage.CreateAnAccount')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

            <div class="row mt-100">
                <div class="col-lg-12">
                    <div class="AccountLeft">
                         <a target="_blank" href="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/docs/Cookie-Policy-Magic.pdf') : asset('assets/docs/Cookie-Policy.pdf') }}" style="margin-right: 10px;"><span>Cookie Policy</span></a>
                         <a target="_blank" href="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/docs/Privacy-Magic.html') : asset('assets/docs/Privacy.html') }}" style="margin-right: 10px;"><span>Privacy Policy</span></a>
                         {!! (str_contains(Request::url(), 'medescare'))? '' :  '<a target="_blank" href="'.asset('assets/docs/Impressum.html').'" style="margin-right: 10px;"><span>Impressum</span></a>' !!}
                         
                    </div>
                </div>
            </div>
            <footer>
                <div class="row mt-100">
                    <div class="col-lg-6">
                        <h6 class="fs-bold">{{ (str_contains(Request::url(), 'magicmedical'))? 'MagicMedical' : 'Medescare' }} ®</h6>
                    </div>
<!--                     <div class="col-lg-2">
                        <h6 class="fs-bold">Info</h6>
                        <ul class="mt-2">
                            <li><a href="#">Getting Started</a></li>
                            <li><a href="#">Resources</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Tutorials</a></li>
                            <li><a href="#">Pricing</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2">
                        <h6 class="fs-bold">Support</h6>
                        <ul class="mt-2">
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">Requirements</a></li>
                            <li><a href="#">Help Desk</a></li>
                            <li><a href="#">Updates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2">
                        <h6 class="fs-bold">Connect</h6>
                        <ul class="mt-2">
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Linkedin</a></li>
                        </ul>
                    </div> -->
                    <div class="col-lg-6">
                        {!! (str_contains(Request::url(), 'medescare'))? '<a target="_blank" href="https://nethareket.com"><img class="img-fluid" style="width: 25vh;" src="/assets/img/logo/net-hareket-digital-agency.png"></a>' : '' !!}
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <!-- Section The End Final-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

<script src="{{URL::asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
<script src="{{URL::asset('assets/js/HoldOn.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                ///
                    $.fn.hasAttr = function(name){
                        return this.attr(name) !== undefined;
                    }
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
        </script>

@include('main.Cookie')
</body>

</html>