   @extends('panel.App')

   @section('style')
      <link rel="stylesheet" href="{{asset('assets/panel/libs/dropzone/dist/min/dropzone.min.css')}}">
   @endsection

    @section('content')

      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Website</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel/categories">Website</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Ayarlar</li>
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



                <form action="ajax" target="AlterContact" method="POST" class="needs-validation" novalidate>
                  

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Mail</label>
                      <input type="text" name="Mail" required class="form-control" id="exampleInputtext1" value="{{$Settings['Mail']}}" >
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Telefon</label>
                      <input type="text" name="Tell" required class="form-control" id="exampleInputtext1" value="{{$Settings['Tell']}}" >
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Whatsapp</label>
                      <input type="text" name="Whatsapp" required class="form-control" id="exampleInputtext1" value="{{$Settings['Whatsapp']}}" >
                    </div>

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Instagram</label>
                      <input type="text" name="Instagram"  class="form-control" id="exampleInputtext1" value="{{$Settings['Instagram']}}" >
                    </div>
                     <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Facebook</label>
                      <input type="text" name="Facebook"  class="form-control" id="exampleInputtext1" value="{{$Settings['Facebook']}}" >
                     </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Twitter</label>
                      <input type="text" name="Twitter"  class="form-control" id="exampleInputtext1" value="{{$Settings['Twitter']}}" >
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Tiktok</label>
                      <input type="text" name="Tiktok"  class="form-control" id="exampleInputtext1" value="{{$Settings['Tiktok']}}" >
                    </div>

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Konumm</label>
                      <textarea class="form-control" name="Location">{{$Settings['Location']}}</textarea>
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Adres</label>
                      <textarea class="form-control" name="Address">{{$Settings['Address']}}</textarea>
                    </div>


                  <div class="col-12">
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                      <button id="savebtn" class="btn btn-primary">Düzenle</button>
                      <!-- <button class="btn bg-danger-subtle text-danger">Cancel</button> -->
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
                $('input[type=text][name=Icon]').val(url);
              }
              function FileUploaded2(url){
                $('#Cover').attr('src', url);
                $('input[type=text][name=Logo]').val(url);
              }
        </script>
      @endsection
