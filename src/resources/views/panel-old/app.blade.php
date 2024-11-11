<?php 
if (empty($_SESSION['User'])) {
    header('location:/Login');
    exit;
}
if (isset($_GET['Terminate'])) {
    echo '<script>alert("'.$_SESSION['User']['uid'].' is Terminated");window.location = reload();</script>';
    unset($_SESSION['User']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" data-footer="true">
  <head>
    <meta name="author" content="Quantre34">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ (str_contains(Request::url(), 'magicmedical'))? 'Agency | MagicMedical' : 'Agency | Medescare' }}</title>
    <meta name="description" content="Medical Assistant" />
    <link rel="shortcut icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : 'assets\img\favicon\magic.png' }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : 'assets\img\favicon\magic.png' }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : 'assets\img\favicon\magic.png' }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : 'assets\img\favicon\magic.png' }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />

    @yield("style")

    <link rel="icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <meta name="msapplication-square70x70logo" content="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <meta name="msapplication-square150x150logo" content="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <meta name="msapplication-wide310x150logo" content="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <meta name="msapplication-square310x310logo" content="{{ (str_contains(Request::url(), 'medescare'))? '\assets\icon\favicon.png' : '\assets\img\favicon\magic.png' }}" />
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::asset('assets/font/CS-Interface/style.css')}}" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/OverlayScrollbars.min.css')}}" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/styles.css')}}"/>
    <!-- Template Base Styles End -->

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
.pulse{
    border-radius: 15%;
    animation: Pulse 1s linear infinite
}
@keyframes Pulse{
    0%{
        box-shadow: 0 0 0 0 var(--warning-darker) , 0 0 0 0 var(--warning-darker)
    }
    40%{
        box-shadow: 0 0 0 1px var(--warning-darker) , 0 0 0 0 var(--warning-darker)
    }
    80%{
        box-shadow: 0 0 0 2px var(--warning-darker) , 0 0 0 1.5px var(--warning-darker)
    }
    100%{
        box-shadow: 0 0 0 0 var(--warning-darker) , 0 0 0 1.5px var(--warning-darker)
    }
}

/*@media screen (max-width:1050px){
  .logo > img {
    width:125px!important;
    height: 35px;
  }
}*/
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <!--  Cell input with COuntry Code -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="{{URL::asset('assets/js/sweetalert.min.js')}}"></script>

    <link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}"/>
    <script src="{{URL::asset('assets/js/base/loader.js')}}"></script>
    <script type="text/javascript"> 
      /*---------------*/
      function SweetSelect(Id){
            if (document.getElementById(Id) !== null && jQuery().select2) {
              jQuery('#'+Id).select2({minimumResultsForSearch: Infinity, placeholder: ''});
              return true;
            }
      }
      /*---------------*/
  </script>


    <!-- hold on -->
    <link href="{{URL::asset('assets/css/HoldOn.css')}}" rel="stylesheet">
    <script type="text/javascript">var options={theme:"sk-circle",message:'Yükleniyor',textColor:"white"};</script>
    <!-- hold on -->
  </head>

  <body>
    <div id="root">


    @include('panel.nav')

 		@yield('content')

 		@include('panel.footer')
    </div>

    @include('panel.theme-settings')

    @include('panel.niches')

    <!-- Theme Settings & Niches Buttons Start -->
    <div class="settings-buttons-container">
      <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#settings" id="settingsButton">
        <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Settings">
          <i data-acorn-icon="paint-roller" class="position-relative"></i>
        </span>
      </button>
<!--       <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#niches" id="nichesButton">
        <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Niches">
          <i data-acorn-icon="toy" class="position-relative"></i>
        </span>
      </button> -->
    </div>
    <!-- Theme Settings & Niches Buttons End -->

    <!-- Search Modal Start -->
    <div class="modal fade modal-under-nav modal-search modal-close-out" id="searchPagesModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header border-0 p-0">
            <button type="button" class="btn-close btn btn-icon btn-icon-only btn-foreground" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body ps-5 pe-5 pb-0 border-0">
            <input id="searchPagesInput" class="form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete" type="text" autocomplete="off" />
          </div>
          <div class="modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0">
            <span class="text-alternate d-inline-block m-0 me-3">
              <i data-acorn-icon="arrow-bottom" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
              <span class="align-middle text-medium">Navigate</span>
            </span>
            <span class="text-alternate d-inline-block m-0 me-3">
              <i data-acorn-icon="arrow-bottom-left" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
              <span class="align-middle text-medium">Select</span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- Search Modal End -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


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
      z-index:100;
    }

    .whatsapp-icon {
      margin-bottom:13px;
    }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>



    <!-- Vendor Scripts Start -->
    <script src="{{URL::asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/OverlayScrollbars.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/autoComplete.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/clamp.min.js')}}"></script>
    <script src="{{URL::asset('assets/icon/acorn-icons.js')}}"></script>
    <script src="{{URL::asset('assets/icon/acorn-icons-interface.js')}}"></script>
    <script src="{{URL::asset('assets/icon/acorn-icons-medical.js')}}"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="{{URL::asset('assets/js/base/helpers.js')}}"></script>
    <script src="{{URL::asset('assets/js/base/globals.js')}}"></script>
    <script src="{{URL::asset('assets/js/base/nav.js')}}"></script>
    <script src="{{URL::asset('assets/js/base/search.js')}}"></script>
    <script src="{{URL::asset('assets/js/base/settings.js')}}"></script>
    <!-- Template Base Scripts End -->
    <script src="{{URL::asset('assets/js/pages/consult.js')}}"></script>

    <!-- icons -->
    <!-- <script src="{{URL::asset('assets/icon/acorn-icons.js')}}"></script> -->
    <script src="{{URL::asset('assets/icon/acorn-icons-commerce.js')}}"></script>
    <!-- <script src="{{URL::asset('assets/icon/acorn-icons-interface.js')}}"></script> -->
    <script src="{{URL::asset('assets/icon/acorn-icons-learning.js')}}"></script>
    <!-- <script src="{{URL::asset('assets/icon/acorn-icons-medical.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- Page Specific Scripts End -->



    <script src="{{URL::asset('assets/js/HoldOn.js')}}"></script>




  </body>
</html>

  <script type="text/javascript">

    new AcornIcons().replace();

    let AsyncAuthCheck = setInterval(function(){
        $.ajax({
        type:  "POST",
        url: "/ajax",
        data: "action=AuthSync&_token="+@json(csrf_token()),
        cache: false,
        success: function(resp) {
          if (resp['outcome']==true) {
                if (resp['route']) {
                    window.location=resp['route'];
                }
          }else {
                if (resp['route']) {
                    window.location=resp['route'];
                    clearInterval(AsyncAuthCheck);
                }
            }
        }
      });                        
    },5000);

    let AsyncNotificationCheck = setInterval(function(){
        $.ajax({
        type:  "POST",
        url: "/ajax",
        data: "action=GetMyNotifications&_token="+@json(csrf_token()),
        cache: false,
        success: function(resp) {
          if (resp['outcome']==true) {
                if (resp['route']) {
                    window.location=resp['route'];
                }
                let Container = $('.Notification-Container');
                Container.html('');
                if (resp['data'].length > 0) {
                    resp['data'].forEach(Item => {
                      Container.append(`<li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                          <div class="align-self-center">
                            ${Item['Content']}
                          </div>
                        </li>`);
                    });
                }else {
                  Container.append(`<li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                          <div class="align-self-center">
                            <a href="#">@Lang('Base.NoNotification')</a>
                          </div>
                        </li>`);
                }

          }else {
                if (resp['route']) {
                    window.location=resp['route'];
                    clearInterval(AsyncNotificationCheck);
                }
            }
        }
      });                        
    },10000);

    $(document).ready(function(){

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
                          Swal.fire('{{Lang::get('Base.Success')}}', (data['Message']??  '{{Lang::get('Base.Successfuly')}}'), 'success').then((result)=>{
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
                    Swal.fire('{{Lang::get('Base.Failed')}}', data['ErrorMessage'], 'error').then((result)=>{
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
    });


function getAttributes($node) {
    var attrs = {};
    $.each( $node[0].attributes, function ( index, attribute ) {
        attrs[attribute.name] = attribute.value;
    } );
    return attrs;
}

function addDays( date, days ) {
  var result = new Date(date);
  result.setDate(result.getDate() + days);
  return result;
}


function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}

$.fn.hasAttr = function(name){
  return this.attr(name) !== undefined;
}
///
function SetModalContent(type){
  HoldOn.open(options);
  let action = 'GetDocContent';
  $.ajax({
    type: 'POST',
    url: '/ajax',
    cache: false,
    headers: {'X-CSRF-TOKEN': @json(csrf_token())},
    data: {
      action: action,
      Type: type
    },
    success: function(data){
        if (data['outcome']) {
            HoldOn.close();
            Swal.fire({
                    html: data['data'],
                    icon: false,
                    showCancelButton: true,
                    width: '90%',
                    showConfirmButton: false,
                    cancelButtonText: 'ok',
                  });

        }
    }
  });
}

    </script>


@if (\Session::has('outcome'))
  <script type="text/javascript">
      $(document).ready(function(){
          islem = '<?php echo (Session::get('outcome')==true)? Lang::get('Base.Success') : Lang::get('Base.Failed'); ?>';
          Swal.fire(islem, '<?php echo Session::get('ErrorMessage');  ?>','<?php echo (Session::get('outcome')==true)? 'success' : 'error'; ?>').then((result)=>{
              <?php 
              echo (\Session::has('route'))? 'window.location="'.Session::get('route').'"; ' : '' ;
              echo (\Session::has('tag'))? '$("#'.Session::get('tag').'").css("border", "1px solid red");' : '' ;
              ?>
          });s
      });
  </script>
@endif
    <!-- icons -->
    @yield('script')


