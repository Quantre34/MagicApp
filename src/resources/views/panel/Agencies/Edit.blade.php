   @extends('panel.App')

   @section('style')
      <link rel="stylesheet" href="{{asset('assets/panel/libs/dropzone/dist/min/dropzone.min.css')}}">
   @endsection

    @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Acente Düzenle</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel/categories">Acenteler</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{$Agency['Title']}}</li>
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
            <div class="card-body">
  
                            <div class="row">
                              <div class="col-lg-12">


                <form id="FileUploadForm" action="ajax" method="POST" target="UploadFile" >                
                <div class="mb-3 row">
                  <label for="exampleInputtext1" class="form-label">Görsel</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <center>
                      <div style="width: 100%;"  class="col-auto">
                        <div sclass="sw-5 me-3">
                        <div class="mx-auto">
                            <img id="Logo" onclick="javascript:$('input[type=file][name=Logo]').click();" src="{{$Agency['Logo']??'/assets/img/Default-Package.jpg'}}" style="width: 100%;max-width: 200px;" alt="thumb">
                        </div>
                          <input onchange="javascript:$('.LogoSend[type=submit]').click();" type="file" hidden name="Logo">
                          <button type="submit" hidden class="btn submit LogoSend">submit</button>
                        </div>
                      </div>
                    </center>
                  </div>
                </div> 
                </form>
                <form id="AlterAgency" action="ajax" target="AlterAgency" method="POST" class="needs-validation" novalidate>
                  
                    <input type="text" hidden required name="Logo" value="{{$Agency['Logo']}}">
                    <input hidden type="text" class="form-control" name="uid" value="{{$Agency['uid']}}" />

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Başlık</label>
                      <input type="text" name="Title" required class="form-control" id="exampleInputtext1" value="{{$Agency['Title']}}" >
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Mail</label>
                      <input type="text"  name="Mail" required class="form-control" id="exampleInputtext1" value="{{$Agency['Mail']}}">
                    </div>
                     <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Telefon</label>
                      <input type="text"  name="Tell" required class="form-control" id="exampleInputtext1" value="{{$Agency['Tell']}}">
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Whatsapp</label>
                      <input type="text"  name="Whatsapp" class="form-control" id="exampleInputtext1" value="{{$Agency['Whatsapp']}}">
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Instagram</label>
                      <input type="text"  name="Instagram" class="form-control" id="exampleInputtext1" value="{{$Agency['Instagram']}}">
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Websitesi</label>
                      <input type="text"  name="WebPage" class="form-control" id="exampleInputtext1" value="{{$Agency['WebPage']}}">
                    </div>
                     <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">VatNumber</label>
                      <input type="text"  name="VatNumber" class="form-control" id="exampleInputtext1" value="{{$Agency['VatNumber']}}">
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Ülke</label>
                      <select class="form-select"  required name="Country" id="Country">
                          @foreach($Countries as $Country)
                              <option {{$Country['name'] == $Agency['Country'] ? 'selected' : ''}} value="{{$Country['name']}}">{{$Country['name']}}</option>
                          @endforeach                        
                      </select>
                    </div>

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Yöneticisi</label>
                      <select class="form-select" required name="ParentId" <?= User('Type')=='0'? 'disabled' : '' ?>>
                          @foreach($Managers as $Manager)
                              <option {{$Manager['uid'] == $Agency['ParentId'] ? 'selected' : ''}} value="{{$Manager['uid']}}">{{$Manager['FirstName']}} {{$Manager['LastName']}}</option>
                          @endforeach                        
                      </select>
                    </div>

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Adres</label>
                      <textarea class="form-control" required name="Adress">{{$Agency['Adress']}}</textarea>
                    </div>

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Komisyon oranı</label>
                      <input type="text"  name="CommissionRate" class="form-control" id="exampleInputtext1" value="{{$Agency['CommissionRate']}}">
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Durum</label>
                      <select class="form-select" required name="Status">
                        <option {{$Agency['Status']=='0'? 'Selected' : ''}} value="0">Pasif</option>
                        <option  {{$Agency['Status']=='1'? 'Selected' : ''}} value="1">Aktif</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                      <button id="savebtn" class="btn btn-primary">Save</button>
                      <button class="btn bg-danger-subtle text-danger">Cancel</button>
                    </div>
                  </div>
                </div>
                </form>

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
        <script src="{{asset('assets/panek/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
        <script type="text/javascript">

          SweetSelect('Country');

          function Slugify(str) {
            return String(str)
              .normalize('NFKD') // split accented characters into their base characters and diacritical marks
              .replace(/[\u0300-\u036f]/g, '') // remove all the accents, which happen to be all in the \u03xx UNICODE block.
              .trim() // trim leading or trailing whitespace
              .toLowerCase() // convert to lowercase
              .replace(/[^a-z0-9 -]/g, '') // remove non-alphanumeric characters
              .replace(/\s+/g, '-') // replace spaces with hyphens
              .replace(/-+/g, '-'); // remove consecutive hyphens
          }
          $(document).ready(function(){
            $('form input[name=Title]').on('change', function(){
              var Slug = Slugify($(this).val());
              $('input[name=Slug]').val(''+Slug);
            });
          });

          function FileUploaded(url){
            $('#Logo').attr('src', url);
            $('#AlterAgency input[name=Logo]').val(url);
          }


        </script>      
@endsection
