   @extends('panel.App')

   @section('style')
      <link rel="stylesheet" href="{{asset('assets/panel/libs/dropzone/dist/min/dropzone.min.css')}}">
   @endsection

    @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Paket Düzenle</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel/categories">Paketler</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Yeni</li>
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
                            <img id="Logo" onclick="javascript:$('input[type=file][name=Logo]').click();" src="{{$Package['Img']??'/assets/img/Default-Package.jpg'}}" style="width: 100%;max-width: 400px;" alt="thumb">
                        </div>
                          <input onchange="javascript:$('.LogoSend[type=submit]').click();" type="file" hidden name="Logo">
                          <button type="submit" hidden class="btn submit LogoSend">submit</button>
                        </div>
                      </div>
                    </center>
                  </div>
                </div> 
                </form>
                <form action="ajax" target="InsertPackage" method="POST" class="needs-validation" novalidate>
                  
                    <input type="text" hidden required name="Img" >

                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Başlık</label>
                      <input type="text" name="Title" required class="form-control" id="exampleInputtext1"  >
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Paket Ücreti(%)</label>
                      <input type="text" name="Rate" required class="form-control" id="exampleInputtext1"  >
                    </div>
                     <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Seviye(Yıldız)</label>
                      <input type="text" name="Stat" required class="form-control" id="exampleInputtext1"  >
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Açıklama</label>
                      <textarea class="form-control" name="Description"></textarea>
                    </div>
                    <div class="mb-1">
                      <label for="exampleInputtext1" class="form-label">Durum</label>
                      <select class="form-select" required name="Status">
                        <option value="0">Pasif</option>
                        <option value="1">Aktif</option>
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
      $('form input[name=Img]').val(url);
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
</script>      @endsection
