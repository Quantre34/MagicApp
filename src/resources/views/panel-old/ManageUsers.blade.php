@extends('panel.app')
@section('style')
<style>


</style>
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/OverlayScrollbars.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2-bootstrap4.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap-datepicker3.standalone.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/MultipleSelect.css')}}" />
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
            <h1 class="mb-0 pb-0 display-4" id="title">@Lang('ManageUser.InsetUser')</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8" style="height: max-content;">


          <!-- Agency Information Start -->
          <h2 class="small-title">@Lang('ManageUser.UserInfo')</h2>
          <div class="card mb-5">
            <div class="card-body">
              
                <form id="FileUploadForm" action="ajax" method="POST" target="UploadFile" >                
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageUser.ProfilPic')</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <center>
                        <div style="width: 20%;"  class="col-auto">
                          <div sclass="sw-5 me-3">
                            <img id="ProfilPic" style="width: 200%;"  onclick="javascript:$(this).parent().children('input[type=file]').click();" src="{{URL::asset('assets/img/profile/Default.png')}}"  class="img-fluid rounded-xl" alt="thumb" />
                            <input onchange="javascript:$(this).parent().children('button[type=submit]').click();" type="file" hidden name="ProfilPic">
                            <button type="submit" hidden class="btn submit">submit</button>
                          </div>
                        </div>
                      </center>
                    </div>
                  </div> 
                </form>
                <script type="text/javascript">
                  function FileUploaded(url){
                    $('input[name=ProfilPic]').parent().children('img').attr('src', url);
                    $('#UserForm input[name=ProfilPic]').val(url);
                  }
                </script>
                
                <form id="UserForm" action="ajax" target="InsertUser" method="POST">
                <input hidden type="text" class="form-control" name="uid" />
                <input type="text" hidden name="ProfilPic">
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageUser.FirstName')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="FirstName" />
                  </div>
                </div>


                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageUser.LastName')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="LastName" />
                  </div>
                </div>


                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageUser.Mail')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="email" class="form-control" name="Mail" />
                  </div>
                </div> 

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageUser.Phone')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Cell" />
                  </div>
                </div> 

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Invitation</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Invitation" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageUser.Type')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select  class="select-single-no-search" data-width="100%" name="Type" id="CategorySelect">
                      @if(User('Type')=='2')
                        <option value="2">@Lang('ManageUser.Admin')</option>
                      @endif
                      <option selected value="0">@Lang('ManageUser.Agent')</option>
                      <option value="1">@Lang('ManageUser.Manager')</option>
                      
                    </select>
                  </div>
                </div>

                <div id="ParentContainer" class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageUser.Parent')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-picker"  data-live-search="true" data-width="100%" name="Parent" id="ParentSelect">
                      <option label="&nbsp;"></option>
                      <optgroup label="@Lang('Navbar.Agencies')">
                        @if(!empty($Agencies))
                          @foreach($Agencies as $Agency)
                            <option value="{{$Agency['uid']}}">{{$Agency['Title']}}</option>
                          @endforeach
                        @else
                          <option disabled label="&nbsp;">No Agency</option>
                        @endif
                      </optgroup>
                      <optgroup label="@Lang('Navbar.Users')">
                        @php $counstusers = 0; @endphp
                        @if(User('Type')=='2')
                        @foreach($Users as $User)
                          @if($User['Type']==1)
                            @if($User['uid']!==User('uid'))
                                @php $counstusers++; @endphp
                                <option value="{{$User['uid']}}">{{$User['FirstName']}} {{$User['LastName']}}</option>
                            @endif
                          @endif
                        @endforeach
                        @else
                            @php $counstusers++; @endphp
                            <option value="{{User('uid')}}">@Lang('ManageUser.Me')</option>
                        @endif
                        @if($counstusers==0)
                          <option disabled label="&nbsp;">No User</option>
                        @endif
                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageUser.Status')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Status" id="StatusSelect">
                      <option selected value='1'>@Lang('ManageUser.Active')</option>
                      <option value='0'>@Lang('ManageUser.Passive')</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageAgency.CommissionRate')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="number" class="form-control" name="CommissionRate" max="{{ (User('Type')=='1')? (User('CommissionRate') ?? 0) : 100 }}" />
                    <p class="text-muted mt-1">Max: {{ (User('Type')=='1')? (User('CommissionRate') ?? 0) : 100 }}%</p>
                  </div>
                </div> 

                <div class="mb-3 row mt-5">
                  <div id="UserFormButtons" class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button id="SubmitBtn" type="submit" class="btn btn-outline-primary">@Lang('ManageUser.InsetUser')</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Agency Information End -->

        </div>
        <div class="col-xl-4" style="height:75vh">

          <!-- Payment Methods Start -->
          <div class="d-flex justify-content-between">
            
            
            <div class="form-group mb-3 mt-3">
              <h2 class="small-title">@Lang('ManageUser.Choose')</h2>
              <input type="text" placeholder="search"  name="Query" class="form-control" onchange="javascript:
              $('.Item').fadeOut('fast');
              let $this = this;
              $('.Item').each(function(){
                console.log(this);
                console.log($this);
                if ($(this).attr('title').toLowerCase().includes($($this).val().toLowerCase()) || $(this).attr('mail').toLowerCase().includes($($this).val().toLowerCase())) {
                    $(this).fadeIn('slow');
                }
              });
              ">
            </div>
              <div  class="col-2 form-group mb-1 mt-7"> 
                  <i onclick="Swal.fire('','{{User('Type')=='2'? 'Red for Admins,': ''}} @Lang('ManageUser.ColorInfo')','info');" style="background-color: white;" data-acorn-icon="question-hexagon" aria-hidden="true"></i>
              </div>
          </div>
          <div style="overflow-y:scroll; height:75vh!important;" class="card mb-5">
            <div class="card-body flex text-center UserList">
              @foreach($Users as $User)
              <div title="{{$User['FirstName']}} {{$User['LastName']}}" mail="{{$User['Mail']}}" onclick="SetUserInfo('{{$User['uid']}}')" style="border: 1px solid {{ $User['Type']=='2'? 'Red'  : ($User['Type']=='1'? 'green' : 'yellow'); }}; border-radius: 30px; " class="mb-4 Item">
                <center>
                  <div class="col-auto">
                    <div class="sw-5 me-3">
                      <img src="{{ $User['ProfilPic'] ?? asset('assets/upload/Default.png') }}" class="img-fluid rounded-xl" alt="thumb" />
                    </div>
                  </div>
                </center>
                <div  class="text-primary mb-1">{{$User['FirstName']}} {{$User['LastName']}}</div>
                <div>{{$User['Parent']['Title'] ?? ''}}</div>
                <div class="text-muted">{{$User['Mail']}}</div>
                <div class="text-muted">{{$User['Cell']}}</div>
                <div class="text-muted">{{ ($User['Status']=='1')? Lang::get('ManageUser.Active') : Lang::get('ManageUser.Passive') }}</div>
              </div>
              @endforeach
            </div>
          </div>
          <!-- Payment Methods End -->

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
    function Reset(){
      $('#UserForm')[0].reset();
      $('#title').html('@Lang('ManageUser.InsertUser')');
      $('#UserForm option').removeAttr('selected');
      $('#CategorySelect').trigger('change');
      $('#TypeSelect').trigger('change');
      $('#ParentSelect').trigger('change');
      $('#UserForm #ResetBtn').remove();
      $('#UserForm #RemindBtn').remove();
      $('#UserForm #DelButton').remove();
      $('#UserForm').attr('target','InsertUser');
      $('#UserForm button[type=submit]').html('@Lang('ManageUser.InsertUser')');
      $('.select2-selection').css('background-color','var(--input)');///let the selects bg be...
      $('#UserForm').each((e)=>{
          console.log(e);
          $( ".select2-selection__choice__remove" ).click();
      });
      $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
    }


    function RemindPass(uid){
      $('#UserForm');
      $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'RemindPass',
            '_token': @json(csrf_token()),
            uid: uid
          },
          success: function(data){
            if (data['outcome']) {
                Swal.fire('Succes',data['Message'],'success');
            }else {
                Swal.fire('Failed',data['ErrorMessage'],'error');
            } 
          }
        });
    }



    function GetUsers(){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetUsers',
            Id: 'All'
          },
          success: function(data){
            if (data['outcome']) {
                $('.UserList').empty();
                Object.entries(data['data']).forEach( Item => {
                    const [key, value] = Item;
                    console.log(Item);
                    console.log(value['Parent'] ?? 'null');
                    var bordercolor = (value['Type']=='2')? 'red' : (value['Type']=='1'?  'green' : 'yellow');
                    $('.UserList').append('<div onclick="SetUserInfo(\''+value['uid']+'\')" style="border:  1px solid '+bordercolor+'; border-radius: 30px; " class="mb-4"><center><div class="col-auto"><div class="sw-5 me-3"><img src="'+(value['ProfilPic']??'{{URL::asset('assets/upload/Default.png')}}')+'" class="img-fluid rounded-xl" alt="thumb" /></div></div></center><div  class="text-primary mb-1">'+value['FirstName']+ ' ' +value['LastName']+'</div><div >'+((value['Parent'])? value['Parent']['Title']:'')+'</div><div class="text-muted">'+value['Mail']+'</div><div class="text-muted">'+value['Cell']+'</div><div class="text-muted">'+((value['Status']=='1')? '@Lang('ManageUser.Active')': '@Lang('ManageUser.Passive')')+'</div></div>');
                });

            }
            //console.log(data);
          }
        });
    }
    function SetUserInfo(uid){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetUserInfo',
            uid: uid
          },
          success: function(data){
            if (data['outcome']) {
              $('#title').html('@Lang('ManageUser.UpdateUser')');
              $('#UserForm #ResetBtn').remove();
              $('#UserForm #RemindBtn').remove();
              $('#UserForm #DelButton').remove();
              $('#ProfilPic').attr('src', (data['data']['ProfilPic'] ?? '/assets/upload/Default.png'));
                $('#UserForm').attr('target', 'AlterUser');
                $('#UserForm input[name=uid]').val(data['data']['uid']);
                $('#UserForm button[type=submit]').html('@Lang('ManageUser.UpdateUser')');
                $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
                Object.entries(data['data']).forEach(Item => {
                    const [key, value] = Item;
                    $('option[value='+Item['ParentId']+']').attr('selected','selected');
                    $('#UserForm input[name='+key+']').val(value);
                });
                $('#UserForm option').removeAttr('selected');
                $('#ParentSelect option').each((key , value)=> {
                    if($(value).val()==data['data']['ParentId']){
                      $(value).attr('selected','selected');
                    }
                    if (data['data']['Type']=='2') {
                        $('#ParentSelect option').removeAttr('selected');
                        $('#ParentSelect').attr('disabled','disabled');
                        $('#UserForm input[name=CommissionRate]').attr('disabled','disabled');
                    }else {
                        $('#ParentSelect').removeAttr('disabled');
                        if (data['data']['Type']!='1') {
                            $('#UserForm input[name=CommissionRate]').attr('disabled','disabled');
                        }else {
                            $('#UserForm input[name=CommissionRate]').removeAttr('disabled');
                        }
                    }
                });
                $('#StatusSelect option').each((key , value)=> {
                    if($(value).val()==data['data']['Status']){
                      $(value).attr('selected','selected');
                    }
                });
                $('#CategorySelect option').each((key, value)=>{
                    if ($(value).val()==data['data']['Type']) {
                        $(value).attr('selected', 'selected');
                    }
                });
                $('#UserForm select').trigger('change');
                $('#UserFormButtons').append(`<button id="RemindBtn" class="btn btn-outline-warning" onclick="RemindPass('${data['data']['uid']}');  return false;">Remind Pass</button>`);
                $('#UserFormButtons').append('<button id="ResetBtn" class="btn btn-outline-danger" onclick="Reset()">@Lang('ManageUser.Reset')</button>');
                $('#UserFormButtons').append(`<button id="DelButton" class="btn btn-outline-danger" onclick="javascript:DelUser('${data['data']['uid']}');return false;">@Lang('Base.Delete')</button>`);
                
            }
            console.log(data);
          }
        });
    }
    ///

    function DelUser(uid){
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: '@Lang('Base.AreUSure')',
      text: "@Lang('ManageUser.DelUserMessage')",
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
            'action': 'DelUser',
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
  <script>
  setTimeout(function(){
    Reset();
      @if(isset($_GET['User']))
        SetUserInfo('{{$_GET['User']}}');
      @endif
  }, 300);

</script>
@endsection
  </body>
</html>
