@extends('panel.app')
@section('style')
<style>

#QuillArea {
  resize: vertical!important;
}
</style>
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/OverlayScrollbars.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/select2-bootstrap4.min.css')}}" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/bootstrap-datepicker3.standalone.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/MultipleSelect.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/css/vendor/quill.bubble.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/vendor/quill.snow.css') }}" />
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
            <h1 class="mb-0 pb-0 display-4" id="title">Insert Article</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8">


          <!-- Agency Information Start -->
          <h2 class="small-title">Article Information</h2>
          <div class="card mb-5">
            <div class="card-body">
              
                <form id="FileUploadForm" action="ajax" method="POST" target="UploadFile">                
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Article İmage</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <center>
                      <div style="width: 100%;"  class="col-auto">
                        <div sclass="sw-5 me-3">
                        <div class="mx-auto">
                            <img id="Img" onclick="javascript:$('input[type=file][name=Img]').click();" src="/assets/img/Default-Package.jpg" style="width: 100%;" alt="thumb">
                        </div>
                          <input onchange="javascript:$('.LogoSend[type=submit]').click();" type="file" hidden name="Img">
                          <button type="submit" hidden class="btn submit LogoSend">submit</button>
                        </div>
                      </div>
                    </center>
                  </div>
                </div> 
                </form>
              <script type="text/javascript">
                function FileUploaded(url){
                  $('#Img').attr('src', url);
                  $('#ArticleForm input[name=Img]').val(url);
                }
              </script>
                <form id="ArticleForm" action="ajax" target="InsertArticle" method="POST">
                <input hidden type="text" class="form-control" name="Id" />
                <input type="text" hidden name="Img">

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Title</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Title" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Slug</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Slug" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Order</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="number" class="form-control" name="Order" />
                  </div>
                </div>
                <div class="mb-3 row" >
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Detay</label>
                  <div style="width:100%;" id="QuillArea" onfocusout="javascript: $('textarea[name=Description]').html($(this).children('.ql-editor').html());" class="col-sm-8 col-md-9 col-lg-10 html-editor-snow html-editor sh-13 quillEditorDetails">
                    <div id="QuillArea"></div>
                  </div>
                </div>
                <textarea hidden id="text-area" name="Description"></textarea>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Status</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Status" id="StatusSelect">
                      <option selected value='1'>Active</option>
                      <option value='0'>Pasive</option>
                    </select>
                  </div>
                </div>


                <div class="mb-3 row mt-5">
                  <div id="ArticleFormButtons" class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button id="SubmitBtn" type="submit" class="btn btn-outline-primary">Insert Article</button>
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
            <h2 class="small-title">Choose to Update</h2>
          </div>
          <div style="overflow-y:scroll; height:100%; height: 60vh;" class="card mb-5 ">
            <div class="card-body flex text-center ArticleList">
              @foreach($Articles as $Article)
              <div onclick="SetArticleInfo('{{$Article['Id']}}')" style="border: 1px solid black; border-radius: 30px; " class="mb-4">

                <center>
                  <div class="col-auto">
                    <div class="sw-5 me-3">
                      <img src="{{ $Article['Img'] ?? asset('/assets/img/Default-Package.jpg') }}" class="img-fluid rounded-xl" alt="thumb" />
                    </div>
                  </div>
                </center>

                <div  class="text-primary mb-1">{{$Article['Title'] ?? ''}}</div>
                <div class="text-muted"> Description: {{ substr($Article['Content'] ?? '' , 0, 30)}}...</div>
                <div class="text-muted">{{ ($Article['Status']=='1')? 'Active' : 'Pasive' }}</div>
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
  <script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/quill.active.js') }}"></script>
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


    function Reset(){
      $('#ArticleForm')[0].reset();
      $('#title').html('Insert Article');
      $('#ArticleForm option').removeAttr('selected');
      $('#CategorySelect').trigger('change');
      $('#TypeSelect').trigger('change');
      $('#ParentSelect').trigger('change');
      $('img[id=Img]').attr('src', '/assets/img/Default-Package.jpg');
      $('#ArticleForm #ResetBtn').remove();
      $('#ArticleForm').attr('target','InsertArticle');
      $('#ArticleForm button[type=submit]').html('Insert Article');
      $('.select2-selection').css('background-color','var(--input)');///let the selects bg be...
      $('#ArticleForm').each((e)=>{
          console.log(e);
          $( ".select2-selection__choice__remove" ).click();
      });
      $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
    }
    function GetArticles(){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetArticles',
            Id: 'All'
          },
          success: function(data){
            if (data['outcome']) {
                $('.ArticleList').empty();
                Object.entries(data['data']).forEach( Item => {
                    const [key, value] = Item;
                    console.log(value);
                    $('.ArticleList').append('<div onclick="SetArticleInfo(\''+value['Id']+'\')" style="border:  1px solid black; border-radius: 30px; " class="mb-4"><center><div class="col-auto"><div class="sw-5 me-3"><img src="'+(value['Img']??'{{URL::asset('assets/upload/Default.png')}}')+'" class="img-fluid rounded-xl" alt="thumb" /></div></div></center><div  class="text-primary mb-1">'+value['Title']+'</div><div class="text-muted">Article Fee: '+value['Cost']  +'</div><div class="text-muted">Description: '+value['Description'].substr(0, 30)+'...</div><div class="text-muted">'+((value['Status']=='1')? 'Active': 'Pasive')+'</div></div>');
                });

            }
            //console.log(data);
          }
        });
    }
    function SetArticleInfo(Id){
      HoldOn.open(options);
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetArticleInfo',
            Id: Id
          },
          success: function(data){
            if (data['outcome']) {
              $('#title').html('Update Article');
              $('#ArticleForm #ResetBtn').remove();
              $('#Img').attr('src', (data['data']['Img'] ?? '/assets/img/Default-Package.jpg'));
                $('#ArticleForm').attr('target', 'AlterArticle');
                $('#ArticleForm input[name=Id]').val(data['data']['Id']);
                $('#ArticleForm button[type=submit]').html('Update Article');
                $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
                Object.entries(data['data']).forEach(Item => {
                    const [key, value] = Item;
                    $('#ArticleForm input[name='+key+']').val(value);
                    if (key=='Content') {
                        $('#ArticleForm .ql-editor').html(value);
                        $('#ArticleForm #text-area').html(value);
                    }
                });
                $('#ArticleForm option').removeAttr('selected');
                $('#StatusSelect option').each((key , value)=> {
                    if($(value).val()==data['data']['Status']){
                      $(value).attr('selected','selected');
                    }
                });
                $('#ArticleForm select').trigger('change');
                $('#ArticleFormButtons').append('<button id="ResetBtn" class="btn btn-outline-danger" onclick="Reset()">Reset</button>');
            }
            HoldOn.close();
          }
        });
    }
    ///


    /// init Quill edior
function _initQuill() {
    Quill.register('modules/active', Active);
    const quillBubbleToolbarOptions = [
      ['bold', 'italic', 'underline', 'strike'],
      [{header: [1, 2, 3, 4, 5, 6, false]}],
      [{list: 'ordered'}, {list: 'bullet'}],
      [{align: []}],
    ];
    
    if (document.getElementsByClassName('quillEditorDetails')) {
      new Quill('.quillEditorDetails', {
        modules: {toolbar: quillBubbleToolbarOptions, active: {}},
        theme: 'snow',
      });
    }

    if (document.getElementsByClassName('quillEditorBubble')) {
      new Quill('.quillEditorBubble', {
        modules: {toolbar: quillBubbleToolbarOptions, active: {}},
        theme: 'bubble',
      });
    }
  }
  /// init Quill edior
$(document).ready(function(){
    _initQuill();
    $('#ArticleForm input[name=Title]').on('change', function(){
      var Slug = Slugify($(this).val());
      $('input[name=Slug]').val(''+Slug);
    });
});

  </script>
  <script>
  setTimeout(function(){
    Reset();
  }, 300);

</script>
@endsection
