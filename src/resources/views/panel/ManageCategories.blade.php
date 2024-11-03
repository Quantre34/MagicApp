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
            <h1 class="mb-0 pb-0 display-4" id="title">@Lang('ManageCategory.InsertCategory')</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8">


          <!-- Agency Information Start -->
          <h2 class="small-title">@Lang('ManageCategory.CategoryInfo')</h2>
          <div class="card mb-5">
            <div class="card-body">


                <form id="FileUploadForm" action="ajax" method="POST" target="UploadFile" >                
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManagePackage.PackageImage')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <center>
                      <div style="width: 100%;"  class="col-auto">
                        <div sclass="sw-5 me-3">
                        <div class="mx-auto">
                            <img id="Logo" onclick="javascript:$('input[type=file][name=Logo]').click();" src="/assets/img/Default-Package.jpg" style="width: 100%;" alt="thumb">
                        </div>
                          <input onchange="javascript:$('.LogoSend[type=submit]').click();" type="file" hidden name="Logo">
                          <button type="submit" hidden class="btn submit LogoSend">submit</button>
                        </div>
                      </div>
                    </center>
                  </div>
                </div> 
                </form>
              <script type="text/javascript">
                function FileUploaded(url){
                  $('#Logo').attr('src', url);
                  $('#CategoryForm input[name=Img]').val(url);
                }
              </script>


              <form id="CategoryForm" action="ajax" target="" method="POST">

                <input type="text" hidden name="Img">
                <input hidden type="text" class="form-control" name="Id" />
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCategory.Title')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Title" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCategory.Slug')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Slug" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCategory.Status')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Status" id="StatusSelect">                      
                        <option value="1">@Lang('ManageCategory.Active')</option>
                        <option value="0">@Lang('ManageCategory.Passive')</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row mt-5">
                  <div id="CategoryFormButtons" class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button id="SubmitBtn" type="submit" class="btn btn-outline-primary">@Lang('ManageCategory.InsertCategory')</button>
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
            <h2 class="small-title">@Lang('ManageCategory.Choose')</h2>
<!--             <button class="btn btn-icon btn-icon-start btn-xs btn-background-alternate p-0 text-small pe-1" type="button">
              <i data-acorn-icon="edit" class="align-middle me-1" data-acorn-size="14"></i>
              <span class="align-bottom">Edit</span>
            </button> -->
          </div>
          <div style="overflow-y:scroll; height:93%;" class="card mb-5 ">
            <div class="card-body flex text-center CategoryList">

              @foreach($Categories as $Category)
              <div onclick="SetCategoryInfo('{{$Category['Id']}}')" style="border:  1px solid black; border-radius: 30px; " class="mb-4">
               
                <center>
                  <div class="col-auto">
                    <div class="sw-5 me-3">
                      <img src="{{ $Category['Img'] ?? asset('/assets/img/Default-Package.jpg') }}" class="img-fluid rounded-xl" alt="thumb" />
                    </div>
                  </div>
                </center>


                <div  class="text-primary mb-1">{{$Category['Title']}}</div>
                <div class="text-muted">{{ ($Category['Status']=='1')? Lang::get('ManageCategory.Active') : Lang::get('ManageCategory.Passive') }}</div>
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
            //console.log(data);
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
  </body>
</html>
