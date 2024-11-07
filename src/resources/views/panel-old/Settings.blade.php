@extends('panel.app')
@section('style')
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/OverlayScrollbars.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2-bootstrap4.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap-datepicker3.standalone.min.css')}}" />
@endsection
@section('content')
  <main>
    <div class="container">
      <!-- Title and Top Buttons Start -->
      <div class="page-title-container">
        <div class="row">
          <!-- Title Start -->
          <div class="col-12 col-md-7">
            <a href="/panel" class="muted-link pb-1 d-inline-block breadcrumb-back">
              <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
              <span class="text-small align-middle">Panel</span>
            </a>
            <h1 class="mb-0 pb-0 display-4" id="title">@Lang('Settings.Settings')</h1>
          </div>
          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8">
          <!-- Profile Start -->
          <h2 class="small-title">@Lang('Settings.Profile')</h2>
          <div class="card mb-5">
            <div class="card-body">
              <div class="row">
<!--                 <div class="col-auto">
                  <div class="sw-6 sw-xl-14">
                    <img src="{{User('ProfilPic') ?? '/assets/img/profile/Default.png'}}" class="img-fluid rounded-100" alt="thumb" />
                  </div>
                </div> -->

                <form id="FileUploadForm" callback="javascript:FileUploaded2('{url}');" action="ajax" method="POST" target="UploadFile" >  
                @csrf()              
                <div class="mb-3">
                  <div class="col-sm-8 col-md-9 col-lg-10">
                      <div class="col-auto">
                        <div class="sw-6 sw-xl-14">
                          <img src="{{User('ProfilPic') ?? '/assets/img/profile/Default.png'}}" class="img-fluid rounded-100" alt="thumb" id="ProfilPic" style="width: 100%;"  onclick="javascript:$(this).parent().children('input[type=file]').click();" />
                          <input onchange="javascript:$(this).parent().children('button[type=submit]').click();" type="file" hidden name="ProfilPic">
                          <button type="submit" hidden class="btn submit">submit</button>
                        </div>
                      </div>
                  </div>
                </div> 
                </form>
                <script type="text/javascript">
                  function FileUploaded2(url){
                    $('input[name=ProfilPic]').parent().children('img').attr('src', url);
                    $('#UserForm input[name=ProfilPic]').val(url);
                  }
                </script>


                <div class="col d-flex flex-column justify-content-between">
                  <div class="d-flex flex-row justify-content-between">
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <div class="align-center h5 mb-0 mt-1 mb-3">{{User('FirstName')}} {{User('LastName')}}</div>
                      <!-- <div class="text-muted mb-2"></div> -->
                    </div>
<!--                     <button class="btn btn-outline-primary btn-icon btn-icon-start" type="button">
                      <i data-acorn-icon="edit"></i>
                      <span>Edit</span>
                    </button> -->
                  </div>
                  <div class="d-flex mb-1">
                    <div class="me-3 me-md-7">
                      <p class="text-small text-muted mb-1">@Lang('Settings.AgencyId')</p>
                      <p class="mb-0 text-primary">{{User('Parent')['Id']}}</p>
                    </div>
                    <div class="me-3 me-md-7">
                      <p class="text-small text-muted mb-1">@Lang('Settings.AgencyTitle')</p>
                      <p class="mb-0 text-primary">{{User('Parent')['Title']}}</p>
                    </div>
                    <div class="me-3 me-md-7">
                      <p class="text-small text-muted mb-1">@Lang('Settings.AgencyFee')</p>
                      <p class="mb-0 text-primary">{{User('Parent')['AgencyFee']}} %</p>
                    </div>
                    <div class="me-3 me-md-7">
                      <p class="text-small text-muted mb-1">@Lang('Settings.Rate')</p>
                      <p class="mb-0 text-primary">{{User('Parent')['Rate']}} / 5</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Profile End -->

          <!-- Personal Information Start -->
          <h2 class="small-title">@Lang('Settings.PersonalInfo')</h2>
          <div class="card mb-5">
            <div class="card-body">
              <form id="UserForm" action="ajax" method="POST" target="UpdateMyInfo">
                <input type="text" hidden name="ProfilPic" value="{{User('ProfilPic') ?? ''}}">
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Name')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" name="FirstName" class="form-control" value="{{User('FirstName')}}" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.LastName')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" name="LastName" class="form-control" value="{{User('LastName')}}" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Mail')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" name="Mail" class="form-control" value="{{User('Mail')}}" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Phone')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="tel" id="Cell" name="Cell" class="form-control" value="{{User('Cell')}}" />
                  </div>
                </div>
<!--                 <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Bio</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <textarea class="form-control" rows="3">I'm a Cyborg, But That's OK</textarea>
                  </div>
                </div> -->
                <div class="mb-3 row mt-5">
                  <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button type="submit" class="btn btn-outline-primary">@Lang('Settings.Update')</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Personal Information End -->

          <!-- Contact Start -->
          <h2 class="small-title">@Lang('Settings.Agency')</h2>
          <div class="card mb-5">
            <div class="card-body">

                <form id="FileUploadForm" action="ajax" method="POST" target="UploadFile" >                
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Logo')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <center>
                      <div style="width: 20%;"  class="col-auto">
                        <div sclass="sw-5 me-3">
                          <img id="AgencyLogo" style="width: 200%;"  onclick="javascript:$(this).parent().children('input[type=file]').click();" src="{{ User('Parent')['Logo'] ?? URL::asset('assets/img/profile/Default.png')}}"  class="img-fluid rounded-xl" alt="thumb" />
                          <input onchange="javascript:$(this).parent().children('button[type=submit]').click();" type="file" hidden name="AgencyLogo">
                          <button type="submit" hidden class="btn submit">submit</button>
                        </div>
                      </div>
                    </center>
                  </div>
                </div> 
                </form>
<script type="text/javascript">
  function FileUploaded(url){
    $('input[name=AgencyLogo]').parent().children('img').attr('src', url);
    $('#AgencyForm input[name=AgencyLogo]').val(url);
  }
</script>
              <form id="AgencyForm" action="ajax" target="AlterMyAgency" method="POST">
                <input type="text" hidden name="AgencyLogo" value="{{User('Parent')['Logo'] ?? '/assets/img/profile/Default.png'}}">
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Title')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" value="{{User('Parent')['Title']}}" name="Title" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Mail')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="email" name="Mail" class="form-control" value="{{User('Parent')['Mail']}}" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Phone')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="tel" name="Tell" id="Tell" class="form-control" value="{{User('Parent')['Tell']}}" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Country')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" name="Country" class="form-control" value="{{User('Parent')['Country']}}" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Province')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" name="Province" class="form-control" value="{{User('Parent')['Province']}}" />
                  </div>
                </div>                
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.City')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" name="City" class="form-control" value="{{User('Parent')['City']}}" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('Settings.Address')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" name="Adress" class="form-control" value="{{User('Parent')['Adress']}}" />
                  </div>
                </div>
                <div class="mb-3 row mt-5">
                  <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button type="submit" class="btn btn-outline-primary">@Lang('Settings.Update')</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Contact End -->
        </div>

        <div class="col-xl-4">
          <!-- Payment Methods Start -->
          <div class="d-flex justify-content-between">
            <h2 class="small-title">@Lang('Settings.Payment')</h2>
            <button onclick="Edit('#CommissionBtn')" class="btn btn-icon btn-icon-start btn-xs btn-background-alternate p-0 text-small pe-1" type="button">
              <i data-acorn-icon="edit" class="align-middle me-1" data-acorn-size="14"></i>
              <span  class="align-bottom">@Lang('Settings.Edit')</span>
            </button>
          </div>
          <div class="card mb-5">
            <form id="AlterAgencyCommission" action="ajax" method="POST" target="AlterAgencyCommission">
              <div class="card-body">
                <div class="mb-4">
                  <div class="text-primary mb-1">@Lang('Settings.AgencyFee') (%)</div>
                  <input style="background-color: var(--foreground)!important;color: var(--body)!important;" class="form-control" type="text" name="AgencyFee" max="{{User('Parent')['CommissionRate'] ?? (User('CommissionRate') ?? 15)}}" value="{{User('Parent')['AgencyFee'] ?? 0}}">
                  <div class="text-muted">@Lang('Settings.Max'): {{User('Parent')['CommissionRate'] ?? (User('CommissionRate') ?? 15)}}%</div>
                  <div id="CommissionBtn">
                
                  </div>                
                </div>
                
              </div>

            </form>
          </div>
          <!-- Payment Methods End -->

          <!-- Billing History Start -->
          <div class="d-flex justify-content-between">
            <h2 class="small-title">@Lang('Settings.Coworkers')</h2>
          </div>
          <div style="overflow-y:scroll; height:auto;" class="card mb-5 ">
            <div class="card-body flex text-center UserList">
              @foreach($Coworkers as $User)
              <div  style="border: 1px solid black; border-radius: 30px; " class="mb-4">

                <center>
                    <div class="sw-5 me-3">
                      <img src="{{ $User['ProfilPic'] ?? asset('assets/upload/Default.png') }}" class="img-fluid rounded-xl" alt="thumb" />
                    </div>
                </center>

                <div  class="text-primary mb-1">{{$User['FirstName']}} {{$User['LastName']}}</div>
                <div>{{$User['Parent']['Title'] ?? ''}}</div>
                <div class="text-muted">{{$User['Mail']}}</div>
                <div class="text-muted">{{substr($User['Cell'], 0, 5).'***'.substr($User['Cell'], -4)}}</div>
                <div class="text-muted">{{ ($User['Status']=='1')? 'Active' : 'Pasive' }}</div>
              </div>
              @endforeach

            </div>
          </div>
          <!-- Billing History End -->
        </div>
      </div>
    </div>
  </main>
@endsection
@section('script')
  <script src="{{URL::asset('assets/js/vendor/select2.full.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/vendor/datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/pages/settings.js')}}"></script>
  <script type="text/javascript">

// const input = document.querySelector("#Tell");
// window.intlTelInput(input, {
//   initialCountry: "auto",
//   geoIpLookup: callback => {
//     fetch("https://ipapi.co/json")
//       .then(res => res.json())
//       .then(data => callback(data.country_code))
//       .catch(() => callback("tr"));
//   },
//   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // just for formatting/placeholders etc
// });


    function Edit(Selector){
      $(Selector).empty();
      $(Selector).append('<div style="float:left;" class="mt-3"><div class="col-sm-8 col-md-9 col-lg-10 ms-auto"><button type="submit" class="btn btn-outline-primary">Update</button></div></div>');
    }
    $(document).ready(function(){
      $('input[name=AgencyFee]').on('change',function(){
        if ($(this).val() > {{User('Parent')['CommissionRate'] ?? User('CommissionRate')}}) {
            Swal.fire('Failed', 'Allowed Max Fee is {{User('Parent')['CommissionRate'] ?? User('CommissionRate')}}%', 'error').then((result)=>{
                $(this).val({{User('Parent')['CommissionRate'] ?? User('CommissionRate')}});
            });
        }
      });
      ///
      /* Tell Input */
      const Tell = document.querySelector("#Tell");
      const TellInput = window.intlTelInput(Tell, {
          initialCountry: "{{Country(User('Parent')['CountryCode'])['code']??'90'}}",
          utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      });
      $("input[name=Tell").on('change',function() {
        var CountrySelect = TellInput.getSelectedCountryData();
        // window.Get['Tell']=$(this).val();
        // window.Get['CountryCode']=ConutrySelect.dialCode;
        $('#AgencyForm').append('CountryCode',CountrySelect.dialCode);
      });
      /* Cell Input */
      const Cell = document.querySelector("#Cell");
      const CellInput = window.intlTelInput(Cell, {
          initialCountry: "{{Country(User('Parent')['CountryCode'] ?? 90)['code']}}",
          utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      });
      $("input[name=Cell").on('change',function() {
        var ConutrySelect = phoneInput.getSelectedCountryData();
        console.log(ConutrySelect);
        // window.Get['Cell']=$(this).val();
        // window.Get['CountryCode']=ConutrySelect.dialCode;
      });    
    });
  </script>
@endsection

