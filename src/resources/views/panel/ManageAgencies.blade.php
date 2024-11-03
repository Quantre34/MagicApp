@extends('panel.app')
@section('style')
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/OverlayScrollbars.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2-bootstrap4.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap-datepicker3.standalone.min.css')}}" />
  <style type="text/css">
      .switch, .switch__input {
        position: relative;
        -webkit-tap-highlight-color: transparent;
      }
      .switch {
        margin: auto;
      }
      .switch__input,
      .switch__input:before {
        background-color: hsl(var(--hue),10%,10%);
      }
      .switch__input {
        border-radius: 0.75em;
        cursor: pointer;
        display: block;
        width: 3em;
        height: 1.5em;
        transition: background-color var(--trans-dur) var(--trans-timing);
        -webkit-appearance: none;
        appearance: none;
      }
      .switch__input:before {
        border-radius: 50%;
        content: "";
        display: block;
        position: absolute;
        top: 0.125em;
        left: 0.125em;
        width: 1.25em;
        height: 1.25em;
        transition:
          background-color var(--trans-dur) var(--trans-timing),
          transform var(--trans-dur) var(--trans-timing);
      }
      .switch__icon,
      .switch__icon-part {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
      }
      .switch__icon {
        background-color: red;
        border-radius: 50%;
        overflow: hidden;
        pointer-events: none;
        top: 0.125em;
        left: 0.125em;
        width: 1.25em;
        height: 1.25em;
        transition: transform var(--trans-dur) var(--trans-timing);
      }
      .switch__icon-part {
        transition:
          box-shadow var(--trans-dur) var(--trans-timing),
          transform var(--trans-dur) var(--trans-timing);
      }
      .switch__icon-part--1,
      .switch__icon-part--2,
      .switch__icon-part--3 {
        border-radius: 50%;
      }
      .switch__icon-part--1 {
        background-color: hsl(var(--hue),10%,90%);
        top: calc(50% - 0.375em);
        left: calc(50% - 0.375em);
        width: 0.75em;
        height: 0.75em;
      }
      .switch__icon-part--2 {
        background-color: hsl(var(--hue),10%,10%);
        top: calc(50% - 0.4375em);
        left: calc(50% - 0.0625em);
        width: 0.5em;
        height: 0.5em;
        transform: translate(-0.1875em,0.1875em) scale(0.2);
      }
      .switch__icon-part--3 {
        box-shadow: 0 0 0 0.625em hsl(var(--hue),10%,10%) inset;
        width: 1.25em;
        height: 1.25em;
        transform: scale(0.25);
      }
      .switch__icon-part--3 ~ .switch__icon-part {
        background-color: hsl(var(--hue),10%,10%);
        border-radius: 0.0625em;
        top: 50%;
        left: 50%;
        width: 0.125em;
        height: 0.1875em;
        transform-origin: 50% 0;
      }
      .switch__icon-part--4 {
        transform: translateX(-50%) rotate(0) translateY(0.25em);
      }
      .switch__icon-part--5 {
        transform: translateX(-50%) rotate(45deg) translateY(0.25em);
      }
      .switch__icon-part--6 {
        transform: translateX(-50%) rotate(90deg) translateY(0.25em);
      }
      .switch__icon-part--7 {
        transform: translateX(-50%) rotate(135deg) translateY(0.25em);
      }
      .switch__icon-part--8 {
        transform: translateX(-50%) rotate(180deg) translateY(0.25em);
      }
      .switch__icon-part--9 {
        transform: translateX(-50%) rotate(225deg) translateY(0.25em);
      }
      .switch__icon-part--10 {
        transform: translateX(-50%) rotate(270deg) translateY(0.25em);
      }
      .switch__icon-part--11 {
        transform: translateX(-50%) rotate(315deg) translateY(0.25em);
      }
      .switch__sr {
        overflow: hidden;
        position: absolute;
        width: 1px;
        height: 1px;
      }
      /* `:checked` state */
      .switch__input:checked {
        background-color: hsl(var(--hue),10%,90%);
      }
      .switch__input:checked:before,
      .switch__input:checked ~ .switch__icon {
        transform: translateX(1.5em);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--2 {
        transform: translate(0,0) scale(1);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--3 {
        box-shadow: 0 0 0 0.25em hsl(var(--hue),10%,10%) inset;
        transform: scale(1);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--4 {
        transform: translateX(-50%) rotate(0) translateY(0.625em) scale(0);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--5 {
        transform: translateX(-50%) rotate(45deg) translateY(0.625em) scale(0);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--6 {
        transform: translateX(-50%) rotate(90deg) translateY(0.625em) scale(0);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--7 {
        transform: translateX(-50%) rotate(135deg) translateY(0.625em) scale(0);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--8 {
        transform: translateX(-50%) rotate(180deg) translateY(0.625em) scale(0);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--9 {
        transform: translateX(-50%) rotate(225deg) translateY(0.625em) scale(0);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--10 {
        transform: translateX(-50%) rotate(270deg) translateY(0.625em) scale(0);
      }
      .switch__input:checked ~ .switch__icon .switch__icon-part--11 {
        transform: translateX(-50%) rotate(315deg) translateY(0.625em) scale(0);
      }
       .switch__input:checked ~ .switch__icon {
        background-color: green;
        color: hsl(var(--hue),10%,90%);
      }
       .switch__input:checked + .DeafultUserField {
        display: block;
      }
  </style>
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
            <h1 class="mb-0 pb-0 display-4" id="title">@Lang('ManageAgency.InsertAgency')</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8">

          <!-- Agency Information Start -->
          <h2 class="small-title">@Lang('ManageAgency.AgencyInfo')</h2>
          <div class="card mb-5">
            <div class="card-body">
              <form id="AgencyForm" action="ajax" target="InsertAgency" method="POST">
                <input hidden type="text" class="form-control" name="uid" />
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.CompanyName')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Title" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Mail')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Mail" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Tell')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Tell" />
                  </div>
                </div>  
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Whatsapp')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Whatsapp" />
                  </div>
                </div> 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Instagram')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Instagram" />
                  </div>
                </div> 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.WebPage')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="WebPage" />
                  </div>
                </div> 
  <!--               <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Country')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Country" />
                  </div>
                </div>  -->

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Country')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="search" data-width="100%" name="Country" id="CategorySelect">
                      @foreach($Countries as $Country)                      
                          <option value="{{$Country['name']}}" code="{{$Country['dial_code']}}">{{$Country['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
<!--                 <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Province')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Province" />
                  </div>
                </div> 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.City')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="City" />
                  </div>
                </div> --> 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Address')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Adress" />
                  </div>
                </div> 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.VatNumber')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="VatNumber" />
                  </div>
                </div>   

                @if(User('Type')=='2')
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Parent')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="ParentId" id="genderSelect">
                        <option value="null">@Lang('ManageAgency.NoParent')</option>
                      @foreach($Managers as $Manager)                      
                          <option value="{{$Manager['uid']}}">{{$Manager['FirstName']}} {{$Manager['LastName']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                @endif

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.Status')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Status" id="StatusSelect">
                        <option value="1">@Lang('ManageAgency.Active')</option>
                        <option value="0">@Lang('ManageAgency.Passive')</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.CommissionRate')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="number" class="form-control" max="{{ (User('Type')=='1')? (User('CommissionRate') ?? 0) : 100 }}" name="CommissionRate" />
                    <p class="text-muted mt-1">Max: {{ (User('Type')=='1')? (User('CommissionRate') ?? 0) : 100 }}%</p>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Add Default User</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <label class="switch">
                      <input onchange="ShowUserSide(this)" value="true" class="switch__input" name="DefaultUser" type="checkbox" role="switch" />
                      <span class="switch__icon">
                        <span class="switch__icon-part switch__icon-part--1"></span>
                        <span class="switch__icon-part switch__icon-part--2"></span>
                        <span class="switch__icon-part switch__icon-part--3"></span>
                        <span class="switch__icon-part switch__icon-part--4"></span>
                        <span class="switch__icon-part switch__icon-part--5"></span>
                        <span class="switch__icon-part switch__icon-part--6"></span>
                        <span class="switch__icon-part switch__icon-part--7"></span>
                        <span class="switch__icon-part switch__icon-part--8"></span>
                        <span class="switch__icon-part switch__icon-part--9"></span>
                        <span class="switch__icon-part switch__icon-part--10"></span>
                        <span class="switch__icon-part switch__icon-part--11"></span>
                      </span>
                    </label>
                  </div>
                </div>

                <div style="display: none;" class="DeafultUserField mb-3 row ms-5">

                    <div class="mb-3 row col-12">
                      <div class="col-6">
                        <label class="col-6 col-lg-3 col-md-3 col-sm-4 ">First Name</label>
                        <div class="col-sm-8 col-md-9 col-lg-10">
                          <input type="text" class="form-control" name="FirstName" />
                        </div>
                      </div>
                     <div class="col-6">
                        <label class="col-6 col-lg-3 col-md-3 col-sm-4 ">Last Name</label>
                        <div class="col-sm-8 col-md-9 col-lg-10">
                          <input type="text" class="form-control" name="LastName" />
                        </div>
                      </div>
                    </div>

                </div>

                <div class="mb-3 row mt-5">
                  <div id="AgencyFormButtons" class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button id="SubmitBtn" type="submit" class="btn btn-outline-primary">@Lang('ManageAgency.InsertAgency')</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Agency Information End -->

        </div>
        <div class="col-xl-4">
          <!-- Payment Methods Start -->
          <div class="d-flex justify-content-between">

<!--             <button class="btn btn-icon btn-icon-start btn-xs btn-background-alternate p-0 text-small pe-1" type="button">
              <i data-acorn-icon="edit" class="align-middle me-1" data-acorn-size="14"></i>
              <span class="align-bottom">Edit</span>
            </button> -->
            <div class="form-group mb-3 mt-3">
              <h2 class="small-title">@Lang('ManageAgency.ChooseAgency')</h2>
              <input type="text" placeholder="search"  name="Query" class="form-control" onchange="javascript:
              $('.Item').fadeOut('fast');
              $('.Item').each(function(){
                if ($(this).attr('title').toLowerCase().includes($('input[name=Query]').val().toLowerCase()) || $(this).attr('mail').toLowerCase().includes($('input[name=Query]').val().toLowerCase())) {
                    $(this).fadeIn('slow');
                }
              });
              ">
            </div>
          </div>

          <div style="overflow-y:scroll; height:90vh;" class="card mb-5 ">
            <div class="card-body flex text-center AgencyList">

              @if(!empty($Agencies))
                @foreach($Agencies as $Agency)
                <div title="{{$Agency['Title']}}" Mail="{{$Agency['Mail']}}" onclick="SetAgencyInfo('{{$Agency['uid']}}')" style="border:  1px solid black; border-radius: 30px; " class="mb-4 Item">
                  <div  class="text-primary mb-1">{{$Agency['Title']}}</div>
                  <div>{{$Agency['Mail']}}</div>
                  <div class="text-muted">{{$Agency['Tell']}}</div>
                  <div class="text-muted">{{ ($Agency['Status']=='1')? Lang::get('ManageAgency.Active') : Lang::get('ManageAgency.Passive') }}</div>
                </div>
                @endforeach
              @else 
                <div  style="border:  1px solid black; border-radius: 30px; " class="mb-4">
                  <div  class="text-danger mb-1">@Lang('ManageAgency.AgencyNotFound')</div>
                </div>
              @endif

            </div>
          </div>
        
<!--           <div class="d-flex justify-content-between">
            <h2 class="small-title">@Lang('ManageAgency.ChooseApplication')</h2>
          </div>
          <div style="overflow-y:scroll; height:27%;" class="card mb-5 ">
            <div class="card-body flex text-center ApplicationList">
              @if(!empty($Applications))
                @foreach($Applications as $Application)
                  @if(User('Type') == '2' || $Application['ReferenceCode'] == User('Id'))
                    <div onclick="SetApplicationInfo('{{$Application['Id']}}')" style="border:  1px solid {{ ($Application['Status']=='1')? 'green' : 'red' }}; border-radius: 30px; " class="mb-4">
                    <div  class="text-primary mb-1">{{$Application['FullName']}}</div>
                    <div>{{($Application['Title'])? Lang::get('ManageAgency.CompanyTitle').':' . $Application['Title'] : ''}}</div>
                    <div class="text-muted">{{$Application['Mail']}}</div>
                    <div class="text-muted">{{$Application['Cell']}}</div>
                    <div class="text-muted">@Lang('ManageAgency.CountryCode'): {{$Application['CountryCode']}}</div>
                    <div class="text-muted">@Lang('ManageAgency.ReferenceCode'): {{$Application['ReferenceCode']}}</div>
                    <div class="text-muted">{{ ($Application['Status']=='1')? Lang::get('ManageAgency.Active') : Lang::get('ManageAgency.Passive') }}</div>
                  </div>
                  @endif
                @endforeach
              @else
                <div  style="border:  1px solid black; border-radius: 30px; " class="mb-4">
                    <div  class="text-danger mb-1">@Lang('ManageAgency.ApplicationNotFound')</div>
                </div>
              @endif
            </div>
          </div> -->


        </div>
      </div>
    </div>
  </main>
@endsection
@section('script')
  <script src="{{URL::asset('assets/js/vendor/select2.full.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/vendor/datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/pages/settings.js')}}"></script>
  <script src="{{URL::asset('assets/js/common.js')}}"></script>
  <script src="{{URL::asset('assets/js/scripts.js')}}"></script>
  <script type="text/javascript">

    function ShowUserSide(e){
        if ($(e).is(':checked')) {
            console.log('shown');
            $('.DeafultUserField').css('display','block');
        }else {
            console.log('hiden');
            $('.DeafultUserField').css('display', 'none');
        }
    }

    function Reset(){
      $('#AgencyForm')[0].reset();
      $('#title').html('@Lang('ManageAgency.InsertAgency')');
      $('#AgencyForm #ResetBtn').remove();
      $('#AgencyForm #DelButton').remove();
      $('input[name=DefaultUser]').fadeIn();
      if ($('input[name=DefaultUser]').is(':checked')) {
          $('input[name=DefaultUser]').clicked();
      }
      $('input[name=DefaultUser]').change();
      $('#AgencyForm').attr('target','InsertAgency');
      $('#AgencyForm button[type=submit]').html('@Lang('ManageAgency.InsertAgency')');
      $('.select2-selection').css('background-color','var(--input)');///let the selects bg be...
    }
    function GetAgencies(){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetAgencies'
          },
          success: function(data){
            if (data['outcome']) {
                $('.AgencyList').empty();
                Object.entries(data['data']).forEach( Item => {
                    const [key, value] = Item;
                    $('.AgencyList').append('<div onclick="SetAgencyInfo(\''+value['uid']+'\')" style="border:  1px solid black; border-radius: 30px; " class="mb-4"><div  class="text-primary mb-1">'+value['Title']+'</div><div>'+value['Mail']+'</div><div class="text-muted">'+value['Tell']+'</div><div class="text-muted">'+((value['Status']=='1')? '@Lang('ManageAgency.Active')': '@Lang('ManageAgency.Passive')')+'</div></div>');
                });
                if ($('input[name=DefaultUser]').is(':checked')) {
                    $('input[name=DefaultUser]').clicked();
                }
                $('input[name=DefaultUser]').change();
            }
          }
        });
    }
    // function GetApplications(){
    //     $.ajax({
    //       type: 'POST',
    //       url: '/ajax',
    //       cache: false,
    //       headers: {
    //         'X-CSRF-TOKEN': @json(csrf_token())
    //       },
    //       data: {
    //         action: 'GetApplications'
    //       },
    //       success: function(data){
    //         if (data['outcome']) {
    //             $('.ApplicationList').empty();
    //             Object.entries(data['data']).forEach( Item => {
    //                 const [key, value] = Item;
    //                 $('.ApplicationList').append('<div onclick="SetApplicationInfo(\''+value['Id']+'\')" style="border:  1px solid '+((value['Status']=='1')? 'green': 'red')+'; border-radius: 30px; " class="mb-4"><div  class="text-primary mb-1">'+value['FullName']+'</div><div>'+value['Mail']+'</div><div class="text-muted">'+value['Cell']+'</div><div class="text-muted">Country Code: '+value['CountryCode']+'</div><div class="text-muted">'+((value['Status']=='1')? '@Lang('ManageAgency.Active')': '@Lang('ManageAgency.Passive')')+'</div></div>');
    //             });
    //             if ($('input[name=DefaultUser]').is(':checked')) {
    //                 $('input[name=DefaultUser]').clicked();
    //             }
    //             $('input[name=DefaultUser]').change();
    //         }
    //       }
    //     });
    // }
    function SetAgencyInfo(uid){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetAgencyInfo',
            uid: uid
          },
          success: function(data){
            if (data['outcome']) {
              Reset();
              $('#title').html('@Lang('ManageAgency.UpdateAgency')');
              $('#AgencyForm #ResetBtn').remove();
              $('#AgencyForm #DelButton').remove();
              $('#AgencyForm').attr('target', 'AlterAgency');
              $('#AgencyForm input[name=uid]').val(data['data']['uid']);
              $('#AgencyForm button[type=submit]').html('@Lang('ManageAgency.UpdateAgency')');
              $('option').removeAttr('selected');
              
              Object.entries(data['data']).forEach(Item => {
                const [key, value] = Item;
                $('#AgencyForm input[name='+key+']').val(value);
                $(`option[value="${value}"]`).attr('selected','selected');
              });
              
              if (data['data']['ParentId']) {
                $(`option[value=${data['data']['ParentId']}]`).attr('selected','selected');
              }                
              
              $('#AgencyForm select').change();
              $('input[name=DefaultUser]').fadeOut();
              $('#AgencyFormButtons').append(`<button id="DelButton" class="btn btn-outline-danger" onclick="javascript:DelAgency('${data['data']['uid']}');return false;">@Lang('Base.Delete')</button>`);
              $('#AgencyFormButtons').append('<button id="ResetBtn" class="btn btn-outline-warning" onclick="Reset()">@Lang('ManageAgency.Reset')</button>');
            }
          }
        });
    }
    function SetApplicationInfo(Id){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetApplicationInfo',
            Id: Id
          },
          success: function(data){
            if (data['outcome']) {
              if (data['data']['Status']=='1') {
                  Reset();
                  $('#title').html('Complete Application');
                  $('#AgencyForm #ResetBtn').remove();
                  $('#AgencyForm #DelButton').remove();
                  $('#AgencyForm').attr('target', 'CompleteApplication');
                  
                  $('#AgencyForm button[type=submit]').html('Complete Application');
                  /* form fields */
                  values = data['data'];
                  $('#AgencyForm input[name=uid]').val(data['data']['Id']);
                  $('input[name=Title]').val(values['Title']);
                  $('input[name=Tell]').val(values['Cell']);
                  $('input[name=Mail]').val(values['Mail']);
                  $('option').removeAttr('selected');
                  $('#genderSelect option').each(function(i,item){
                    if ($(item).attr('value') == data['data']['ReferenceCode']) {
                        $(item).attr('selected','selected');
                    }
                  });
                  $('#CategorySelect option').each(function(i,item){
                    if ($(item).attr('code') == '+'+data['data']['CountryCode']) {
                        $(item).attr('selected','selected');
                    }
                  });

                  // $('input[name=DefaultUser]').fadeOut();
                  $('#CategorySelect').trigger('change');
                  $('#AgencyFormButtons').append('<button id="ResetBtn" class="btn btn-outline-danger" onclick="Reset()">Reset</button>');
              }else {
                Swal.fire('This Application is Already Processed','','error');
              }
            }
            console.log(data);
          }
        });
    }


    setTimeout(function(){
      @if(isset($_GET['Agency']))
        SetAgencyInfo('{{$_GET['Agency']}}');
      @endif
      @if(isset($_GET['Application']))
        SetApplicationInfo('{{$_GET['Application']}}');
      @endif
      Reset();
    }, 500);


    function DelAgency(uid){
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: '@Lang('Base.AreUSure')',
      text: "@Lang('ManageAgency.DelAgencyWarning')",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: '@Lang('Base.ConfirmDel')',
      cancelButtonText: '@Lang('Base.DenyDel')',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
          type: "POST",
          url: "/ajax",
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            'action': 'DelAgency',
            'uid': uid
          },
          success: function(data){
              if (data['outcome']==true){
                  swalWithBootstrapButtons.fire(
                    '@Lang('Base.Success')!',
                    '@Lang('Base.Successfuly')',
                    'success',
                  ).then(() => {
                      if (data['route']) {
                          window.location = data['route'];
                      }
                  });
              }else {
                Swal.fire('@Lang('Base.Failed')',data['ErrorMessage'],'error');
              }
            }
          });
      }else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire(
            '@Lang('Base.Failed')',
            '@Lang('Base.Canceled')',
            'error'
          );
      }
    })
    return false; 
    }
  </script>
@endsection
  </body>
</html>
