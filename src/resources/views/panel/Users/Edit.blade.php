   @extends('panel.App')

   @section('style')
      <link rel="stylesheet" href="{{asset('assets/panel/libs/dropzone/dist/min/dropzone.min.css')}}">
   @endsection

    @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Kullanıcılar</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel/{{ $User['Type']=='1'? 'managers' : 'agents' }}">{{ $User['Type']=='1'?'Yöneticiler' : 'Temsilciler' }}</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{$User['FirstName']}} {{$User['LastName']}}</li>
                </ol>
              </nav>
            </div>
            <div class="d-flex align-items-center justify-content-between gap-6">
                <a class="text-warning d-flex align-items-center ">
                  <i href="/panel/agencies" class="fas fa-arrow-left"></i>
                   &nbsp Geri dön
                </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              

          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">{{$User['FirstName']}} {{$User['LastName']}}</h4>
            </div>
            <div class="card-body">

                  <div class="row">
                    <div class="col-lg-6 d-flex align-items-stretch">
                      <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                          <h4 class="card-title">Profil Resmi</h4>
                          <p class="card-subtitle mb-4">Profil resmini</p>
                          <div class="text-center">
                            <form id="FileUploadForm" action="ajax" method="POST" target="UploadFile" >                
                                <img id="ProfilPic" class="img-fluid rounded-circle" width="200" height="200" onclick="javascript:$(this).parent().children('input[type=file]').click();" src="{{$User['ProfilPic']??asset('assets/img/profile/Default.png')}}"  />
                                <input onchange="javascript:$(this).parent().children('button[type=submit]').click();" type="file" hidden name="ProfilPic">
                                <button type="submit" hidden class="btn submit">submit</button>
                            </form>  
                            <p class="mb-0">Allowed JPG, JPEG or PNG. Max size of 2MB</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-stretch">
                      <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                          <form class="needs-validation" novalidate action="ajax" id="UserForm" target="AlterUser" method="POST">
                            <input type="hidden" required name="uid" value="{{$User['uid']}}">
                            <input type="hidden" name="ProfilPic" value="{{$User['ProfilPic']}}">
                            <div class="row col-12">
                              <div class="mb-1 col-6">
                                <label class="form-label">İsim</label>
                                <input type="text" class="form-control" required name="FirstName" value="{{$User['FirstName']}}">
                              </div>
                              <div class="mb-1 col-6">
                                <label for="exampleInputPassword1" class="form-label">Soy İsim</label>
                                <input type="text" class="form-control" required name="LastName" value="{{$User['LastName']}}">
                              </div>
                            </div>
                            
                            <div class="mb-1">
                              <label class="form-label">Mail</label>
                              <input type="text" class="form-control" name="Mail" required value="{{$User['Mail']}}">
                            </div>
                            <div class="mb-1">
                              <label  class="form-label">Telefon</label>
                              <input type="text" class="form-control" name="Cell" required value="{{$User['Cell']}}">
                            </div>

                            @if(User('Type')=='2')
                              <div class="mb-1">
                                <label class="form-label">Komisyon Oranı</label>
                                <input type="text" class="form-control" name="CommissionRate" required value="{{$User['CommissionRate']}}">
                              </div>
                              @if($User['Type']!='2')
                                <div class="mb-1">
                                  <label  class="form-label">Yöneticisi</label>
                                  <select class="form-select" required name="ParentId">
                                      <option></option>
                                      @foreach(($User['Type'] ='1'? $Agencies : $Users ) as $Manager)
                                          <option {{$Manager['uid'] == $User['ParentId'] ? 'selected' : ''}} value="{{$Manager['uid']}}">
                                          {{ !empty($Manager['Title'])? $Manager['Title'] : (!empty($Manager['FirstName'])? $Manager['FirstName'].' '.$Manager['LastName'] : '') }}</option>
                                      @endforeach                        
                                  </select>
                                </div>
                              @endif
                              <div class="mb-1">
                                <label class="from-label">@Lang('ManageUser.Type')</label>
                                  <select  class="form-select" required name="Type">
                                    <option {{$User['Type']=='2'? 'Selected' : ''}} value="2">@Lang('ManageUser.Admin')</option>
                                    <option {{$User['Status']=='0'? 'Selected' : ''}}  value="0">@Lang('ManageUser.Agent')</option>
                                    <option {{$User['Status']=='0'? 'Selected' : ''}} value="1">@Lang('ManageUser.Manager')</option>
                                  </select>
                              </div>
                            @endif
                            <div class="mb-1">
                              <label for="exampleInputtext1" class="form-label">Durum</label>
                              <select class="form-select" required name="Status">
                                <option {{$User['Status']=='0'? 'Selected' : ''}} value="0">Pasif</option>
                                <option  {{$User['Status']=='1'? 'Selected' : ''}} value="1">Aktif</option>
                              </select>
                            </div>

                            <button hidden id="SubmitBtn" type="submit"></button>
                          </form>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                      <button onclick="$('#SubmitBtn').trigger('click');">Güncelle</button>
                    </div>

            </div>
          </div>

<!-- 
          <div class="form-with-tabs">
            <h4 class="card-title mb-4 mt-5 text-dark">Form with Tabs</h4>
            <div class="card">
               <form class="needs-validation" novalidate>
              <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold" id="pills-personal-info-tab" data-bs-toggle="pill" data-bs-target="#pills-personal-info" type="button" role="tab" aria-controls="pills-personal-info" aria-selected="true">
                    Personal Info
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold" id="pills-account-details-tab" data-bs-toggle="pill" data-bs-target="#pills-account-details" type="button" role="tab" aria-controls="pills-account-details" aria-selected="false">
                    Account Details
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold" id="pills-social-links-tab" data-bs-toggle="pill" data-bs-target="#pills-social-links" type="button" role="tab" aria-controls="pills-social-links" aria-selected="false">
                    Social Links
                  </button>
                </li>
              </ul>
              <div class="card-body p-4">
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-personal-info" role="tabpanel" aria-labelledby="pills-personal-info-tab" tabindex="0">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label for="exampleInputfirstname2" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="exampleInputfirstname2" placeholder="John">
                        </div>
                        <div class="mb-4">
                          <label class="form-label">Country</label>
                          <select class="form-select" aria-label="Default select example">
                            <option selected="">India</option>
                            <option value="1">United Kingdom</option>
                            <option value="2">Srilanka</option>
                          </select>
                        </div>
                        <div class="mb-4">
                          <label for="exampleInputfirstname3" class="form-label">First Name</label>
                          <input id="exampleInputfirstname3" class="form-control" type="date">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label for="exampleInputlastname2" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="exampleInputlastname2" placeholder="Deo">
                        </div>
                        <div class="mb-4">
                          <label class="form-label">Language</label>
                          <select class="form-select" aria-label="Default select example">
                            <option selected="">English</option>
                            <option value="1">French</option>
                          </select>
                        </div>
                        <div class="mb-4">
                          <label for="exampleInputphoneno2" class="form-label">Phone no</label>
                          <input type="text" class="form-control" id="exampleInputphoneno2" placeholder="123 4567 201">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-flex align-items-center gap-3">
                          <button class="btn btn-primary">Submit</button>
                          <button class="btn bg-danger-subtle text-danger">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-account-details" role="tabpanel" aria-labelledby="pills-account-details-tab" tabindex="0">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label for="exampleInputUsername" class="form-label">Username</label>
                          <input type="text" class="form-control" id="exampleInputUsername" placeholder="John Deo">
                        </div>
                        <div class="mb-4">
                          <label class="form-label">Password</label>
                          <div class="input-group">
                            <input type="password" class="form-control" placeholder="John Deo">
                            <span class="input-group-text px-6" id="basic-addon1">
                              <i class="ti ti-eye fs-6"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label class="form-label">Email</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="John Deo">
                            <span class="input-group-text px-6" id="basic-addon1">@example.com</span>
                          </div>
                        </div>
                        <div class="mb-4">
                          <label class="form-label">Confirm Password</label>
                          <div class="input-group">
                            <input type="password" class="form-control" placeholder="John Deo">
                            <span class="input-group-text px-6" id="basic-addon1">
                              <i class="ti ti-eye fs-6"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-flex align-items-center gap-3">
                          <button class="btn btn-primary">Submit</button>
                          <button class="btn bg-danger-subtle text-danger">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-social-links" role="tabpanel" aria-labelledby="pills-social-links-tab" tabindex="0">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label for="exampleInputtwitter" class="form-label">Twitter</label>
                          <input type="text" class="form-control" id="exampleInputtwitter" placeholder="https://twitter.com/abc">
                        </div>
                        <div class="mb-4">
                          <label for="exampleInputgoogle" class="form-label">Google</label>
                          <input type="text" class="form-control" id="exampleInputgoogle" placeholder="https://plus.google.com/abc">
                        </div>
                        <div class="mb-4">
                          <label for="exampleInputinstagram" class="form-label">Instagram</label>
                          <input type="text" class="form-control" id="exampleInputinstagram" placeholder="https://instagram.com/abc">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label for="exampleInputfacebook" class="form-label">Facebook</label>
                          <input type="text" class="form-control" id="exampleInputfacebook" placeholder="https://facebook.com/abc">
                        </div>
                        <div class="mb-4">
                          <label for="exampleInputlinkedin" class="form-label">Linkedin</label>
                          <input type="text" class="form-control" id="exampleInputlinkedin" placeholder="https://linkedin.com/abc">
                        </div>
                        <div class="mb-4">
                          <label for="exampleInputquora" class="form-label">Quora</label>
                          <input type="text" class="form-control" id="exampleInputquora" placeholder="https://quora.com/abc">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-flex align-items-center gap-3">
                          <button class="btn btn-primary">Submit</button>
                          <button class="btn bg-danger-subtle text-danger">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
            </form>


            </div>
          </div>
 -->

            </div>
          </div>
        </div>
      </div>

      @endsection
      @section('script')
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
        <script src="{{asset('assets/panel/js/plugins/bootstrap-validation-init.js')}}"></script>
        <script type="text/javascript">
                  function FileUploaded(url){
                    $('input[name=ProfilPic]').parent().children('img').attr('src', url);
                    $('#UserForm input[name=ProfilPic]').val(url);
                  }

          function Reset(){
            $('#CategoryForm')[0].reset();
            $('#title').html('@Lang('ManageCategory.InsertCategory')');
            $('#CategoryForm option').removeAttr('selected');
            $('#CategoryForm #ResetBtn').remove();
            $('#CategoryForm').attr('target','InsertCategory');
            $('img[id=Logo]').attr('src', '/assets/img/Default-Package.jpg');
            $('#CategoryForm button[type=submit]').html('@Lang('ManageCategory.InsertCategory')');
            $('.select2-selection').css('background-color','var(--input)');///let the selects bg be...
            $('#CategoryForm').each((e)=>{
                console.log(e);
                $( ".select2-selection__choice__remove" ).click();
            });
            $('#CategorySelect').val('');
            $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
          }
          function GetCategories(){
              $.ajax({
                type: 'POST',
                url: '/ajax',
                cache: false,
                headers: {
                  'X-CSRF-TOKEN': @json(csrf_token())
                },
                data: {
                  action: 'GetCategories'
                },
                success: function(data){
                  if (data['outcome']) {
                      $('.CategoryList').empty();
                      Object.entries(data['data']).forEach( Item => {
                          const [key, value] = Item;
                          $('.CategoryList').append(`<div onclick="SetCategoryInfo('${value['Id']}')" style="border:  1px solid black; border-radius: 30px; " class="mb-4"><center><div class="col-auto"><div class="sw-5 me-3"><img src="${(value['Img']?? '/assets/img/Default-Package.jpg')}" class="img-fluid rounded-xl" alt="thumb" />
                          </div>
                        </div>
                      </center><div  class="text-primary mb-1">${value['Title']}</div><div class="text-muted">${((value['Status']=='1')? '{{Lang::get('ManageCategory.Active')}}': '{{Lang::get('ManageCategory.Active')}}')}</div></div>`);
                      });
                  }

                }
              });
          }
          function SetCategoryInfo(Id){
              $.ajax({
                type: 'POST',
                url: '/ajax',
                cache: false,
                headers: {
                  'X-CSRF-TOKEN': @json(csrf_token())
                },
                data: {
                  action: 'GetCategoryInfo',
                  Id: Id
                },
                success: function(data){
                  if (data['outcome']) {
                    $('#title').html('@Lang('ManageCategory.UpdateCategory')');
                    $('#CategoryForm #ResetBtn').remove();
                      $('#CategoryForm').attr('target', 'AlterCategory');
                      $('#CategoryForm input[name=uid]').val(data['data']['uid']);
                      $('#CategoryForm button[type=submit]').html('@Lang('ManageCategory.UpdateCategory')');
                      $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
                      Object.entries(data['data']).forEach(Item => {
                          const [key, value] = Item;
                          $('#CategoryForm input[name='+key+']').val(value);
                      });
                      $('#Logo').attr('src', data['data']['Img']); 
                      $('option').removeAttr('selected');
                      $(`option[value=${data['data']['Status']}]`).attr('selected','selected');
                      $('#CategorySelect').trigger('change');
                      console.log('Status:'+data['data']['Status']);
                      $('#CategorySelect').attr('value', data['data']['Status']);
                      $('#CategoryFormButtons').append('<button id="ResetBtn" class="btn btn-outline-danger" onclick="Reset()">{{Lang::get('ManageCategory.Reset')}}</button>');
                  }
                  console.log(data);
                }
              });
          }
          ///
        setTimeout(function(){
          Reset();
        }, 250);
      </script>      
@endsection
