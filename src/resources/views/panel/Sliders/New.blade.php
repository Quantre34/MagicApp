   @extends('panel.App')

   @section('style')
      <link rel="stylesheet" href="{{asset('assets/panel/libs/dropzone/dist/min/dropzone.min.css')}}">
   @endsection

    @section('content')

      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Slider Ekle</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel/categories">Sliderlar</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Yeni Ekle</li>
                </ol>
              </nav>
            </div>
            <div class="d-flex align-items-center justify-content-between gap-6">
              <a href="/panel/categories" class="text-warning d-flex align-items-center ">
                <i class="fas fa-arrow-left"></i>
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
                            <img id="Logo" onclick="javascript:$('input[type=file][name=Logo]').click();" src="/assets/img/Default-Package.jpg" style="width: 100%;max-width: 400px;" alt="thumb">
                        </div>
                          <input onchange="javascript:$('.LogoSend[type=submit]').click();" type="file" hidden name="Logo">
                          <button type="submit" hidden class="btn submit LogoSend">submit</button>
                        </div>
                      </div>
                    </center>
                  </div>
                </div> 
                </form>
                <form action="ajax" target="InsertSlider" method="POST" class="needs-validation" novalidate>
                  
                    <input type="text" hidden required name="File" >

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Başlık</label>
                      <input type="text" name="Title" required class="form-control" id="exampleInputtext1" >
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Açıklama</label>
                      <input type="text"  name="Info" required class="form-control" id="exampleInputtext1" >
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Açıklama</label>
                      <textarea class="form-control" name="Content"></textarea>
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Durum</label>
                      <select class="form-select" required name="Status">
                        <option value="0">Pasif</option>
                        <option  value="1">Aktif</option>
                      </select>
                    </div>

                  <div class="col-12">
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                      <button id="savebtn" class="btn btn-primary">Save</button>
                      <button class="btn bg-danger-subtle text-danger">Cancel</button>
                    </div>
                  </div>
                </form>

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
        <script src="{{asset('assets/panek/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
        <script type="text/javascript">
              function FileUploaded(url){
                $('#Logo').attr('src', url);
                $('form input[name=File]').val(url);
              }

        </script>
      @endsection
