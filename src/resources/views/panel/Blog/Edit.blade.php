   @extends('panel.App')

   @section('style')
      <link rel="stylesheet" href="{{asset('assets/panel/libs/dropzone/dist/min/dropzone.min.css')}}">
   @endsection

    @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Blog Düzenle</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel/articles">Bloglar</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{$Blog['Title']}}</li>
                </ol>
              </nav>
            </div>
            <div class="d-flex align-items-center justify-content-between gap-6">
              <a class="text-warning d-flex align-items-center ">
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
                            <img id="Logo" onclick="javascript:$('input[type=file][name=Logo]').click();" src="{{$Article['Img']??'/assets/img/Default-Package.jpg'}}" style="width: 100%;max-width: 400px;" alt="thumb">
                        </div>
                          <input onchange="javascript:$('.LogoSend[type=submit]').click();" type="file" hidden name="Logo">
                          <button type="submit" hidden class="btn submit LogoSend">submit</button>
                        </div>
                      </div>
                    </center>
                  </div>
                </div> 
                </form>
                <form id="ArticleForm" action="ajax" target="AlterBlog" method="POST" class="needs-validation" novalidate>
                  
                    <input type="text" hidden required name="Img" value="{{$Blog['Img']}}">
                    <input hidden type="text" class="form-control" name="Id" value="{{$Article['Id']}}" />

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Başlık</label>
                      <input type="text" name="Title" required class="form-control" id="exampleInputtext1" value="{{$Blog['Title']}}" >
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Url Anahtarı</label>
                      <input type="text"  name="Slug" required class="form-control" id="exampleInputtext1" value="{{$Blog['Slug']}}">
                    </div>
                    <div class="mb-1 row" >
                      <label for="exampleInputtext1" class="form-label">İçerik</label>
                      <div style="width:100%;" id="editor" onfocusout="javascript: $('textarea[name=Content]').html($(this).children('.ql-editor').html());" class=" html-editor-snow html-editor sh-13 editor">
                        {{$Blog['Content']}}
                      </div>
                    </div>
                    <textarea hidden id="text-area" name="Content">{{$Blog['Content']}}</textarea>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Kategori</label>
                      <select class="form-select"  name="Type">
                        <option {{$Blog['Type']=='0'? 'Selected' : ''}} value="0">Panel</option>
                        <option  {{$Blog['Type']=='1'? 'Selected' : ''}} value="1">Websitesi</option>
                      </select>
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Durum</label>
                      <select class="form-select" required name="Status">
                        <option {{$Blog['Status']=='0'? 'Selected' : ''}} value="0">Pasif</option>
                        <option  {{$Blog['Status']=='1'? 'Selected' : ''}} value="1">Aktif</option>
                      </select>
                    </div>
                  </div>


                  <div class="col-12">
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                      <button id="savebtn" class="btn btn-primary">Düzenle</button>
                    </div>
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
      $('#ArticleForm input[name=Img]').val(url);
    }

</script>      @endsection
