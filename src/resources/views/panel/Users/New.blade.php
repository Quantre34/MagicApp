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
                                <img id="ProfilPic" class="img-fluid rounded-circle" width="200" height="200" onclick="javascript:$(this).parent().children('input[type=file]').click();" src="{{URL::asset('assets/img/profile/Default.png')}}"  />
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
                            <input type="hidden" name="ProfilPic" >
                            <div class="row col-12">
                              <div class="mb-1 col-6">
                                <label class="form-label">İsim</label>
                                <input type="text" class="form-control" required name="FirstName" >
                              </div>
                              <div class="mb-1 col-6">
                                <label for="exampleInputPassword1" class="form-label">Soy İsim</label>
                                <input type="text" class="form-control" required name="LastName" >
                              </div>
                            </div>
                            
                            <div class="mb-1">
                              <label class="form-label">Mail</label>
                              <input type="text" class="form-control" name="Mail" required >
                            </div>
                            <div class="mb-1">
                              <label  class="form-label">Telefon</label>
                              <input type="text" class="form-control" name="Cell" required >
                            </div>
                            <div class="mb-1">
                              <label class="form-label">Komisyon Oranı</label>
                              <input type="text" class="form-control" name="CommissionRate" required >
                            </div>
                            <div class="mb-1">
                              <label  class="form-label">Yöneticisi</label>
                              <select class="form-select" required name="ParentId">
                                  @foreach(($User['Type'] ='1'? $Agencies : $Users ) as $Manager)
                                      <option value="{{$Manager['uid']}}">
                                      {{ !empty($Manager['Title'])? $Manager['Title'] : (!empty($Manager['FirstName'])? $Manager['FirstName'].' '.$Manager['LastName'] : '') }}</option>
                                  @endforeach                        
                              </select>
                            </div>
                            @if(User('Type')=='2')
                              <div class="mb-1">
                                <label class="from-label">@Lang('ManageUser.Type')</label>
                                  <select  class="form-select" required name="Type">
                                    <option {{$User['Status']=='2'? 'Selected' : ''}} value="2">@Lang('ManageUser.Admin')</option>
                                    <option {{$User['Type']=='0'? 'Selected' : ''}} value="0">@Lang('ManageUser.Agent')</option>
                                    <option {{$User['Status']=='1'? 'Selected' : ''}} value="1">@Lang('ManageUser.Manager')</option>
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
                      <button class="btn btn-sm btn-primary" onclick="$('#SubmitBtn').trigger('click');">Güncelle</button>
                    </div>

            </div>
          </div>


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
        </script>      
      @endsection
