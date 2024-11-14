@extends('panel.app')

@section('style')
  <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/quill.bubble.css')}}" />
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
            <h1 class="mb-0 pb-0 display-4" id="title">{{Lang::get('Consult.Consult')}}</h1>
          </div>
          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->
<script type="text/javascript">
      function GetMessages(uid){
         $.ajax({
              type: 'POST',
              url: '/ajax',
              cache: false,
              headers: {
                'X-CSRF-TOKEN': @json(csrf_token())
              },
              data: {
                action: 'GetMessages',
                uid: uid
              },
              success: function(data){
                var Container = $('#MessageContainer');
                var Messages = data['data'];
                var Type;
                Container.empty();
                $('#MessageForm input[name=ChatId]').val(uid);
                $('#MessageForm input[name=Title]').val(data['Chat']['Title']);
                $('#MessageForm input[name=Title]').attr('disabled','disabled');
                $('#MessageForm').append('<input type="text" hidden name="ChatId" value="'+data['Chat']['uid']+'">');
                Messages.forEach(function(Item){
                  if(Item['User']['Type']=='2'){
                      Type = '{{Lang::get('Consult.Admin')}}';
                  }else if (Item['User']['Type']=='1'){
                    Type = '{{Lang::get('Consult.Manager')}}';
                  }else {
                    Type = '{{Lang::get('Consult.Agent')}}';
                  }
                  var Files = '<br>';
                  Item['Attachments'].forEach(function(File){
                      Files += '<div class="me-2 mt-3"><div class="row g-0 rounded-sm sh-8 border"><div class="col-auto"><div class="sw-10 d-flex justify-content-center align-items-center h-100"><a target="_blank" href="/assets/upload/'+File['name']+'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-arrow-end-bottom mb-3 d-inline-block text-primary"><path d="M17 8 10.3536 14.6464C10.1583 14.8417 9.84171 14.8417 9.64645 14.6464L3 8M10 2 10 14M17 18 3 18"></path></svg></a></div></div><div class="col rounded-sm-end d-flex flex-column justify-content-center pe-3"><div class="d-flex justify-content-between"><p class="mb-0 clamp-line" data-line="1">'+File['name']+'</p><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" ><i data-acorn-icon="download" data-acorn-size="17" class="text-alternate"></i></a></div><div class="text-small text-primary">521 KB</div></div></div></div><br>';
                  });
                  Container.append('<div class="border-bottom border-separator-light"><div class="row g-0 sh-sm-5 h-auto"><div class="col-auto"><img src="'+(Item['User']['ProfilPic'] ?? "{{URL::asset('assets/upload/Default.png')}}" )+'" class="card-img rounded-xl sh-5 sw-5" alt="thumb" /></div><div class="col ps-3"><div class="row h-100 g-2"><div class="col h-sm-100 d-flex flex-column justify-content-sm-center mb-1 mb-sm-0"><div>'+Item['User']['FirstName']+' '+Item['User']['LastName']+'</div><div class="text-small text-muted"> '+Type+' </div></div><div class="col-12 order-3 order-sm-0 col-sm-auto sw-sm-11 lh-1-5 text-small text-muted text-sm-end d-flex flex-column justify-content-sm-center">'+Item['create_at']+'</div></div></div></div><div><div class="mt-4"><p>'+Item['Content']+'</p></div>'+Files+'</div></div>');
                });
                $('#SubmitBtn span').html('{{Lang::get('Consult.Send')}}');
                window.location = '#SubmitBtn';
              },
            });
    }
</script>


      <div class="row gx-5">
        <div class="col-xl-4 mb-5">


          <!-- Doctors List Start -->
          
            <div class="form-group mb-3 mt-3">
              <h2 class="small-title">{{Lang::get('Consult.Chats')}}</h2>
              <input type="text" placeholder="search"  name="Query" class="form-control" onchange="javascript:
              $('.Item').fadeOut('fast');
              $('.Item').each(function(){
                if ($(this).attr('title').toLowerCase().includes($('input[name=Query]').val().toLowerCase()) || $(this).attr('user').toLowerCase().includes($('input[name=Query]').val().toLowerCase())) {
                    $(this).fadeIn('slow');
                }
              });
              ">
            </div>
          <div id="ChatContainer" class="row g-2">
            @if(!empty($Chats))
              @foreach($Chats as $Chat)
                <div title="{{$Chat['Title']}}" user="{{$Chat['User']['FirstName']??'Silindi'}} {{$Chat['User']['LastName']??''}}" onclick="javascript:GetMessages('{{$Chat['uid']}}');" class=" {{($Chat['Pulse'] ?? false)? 'pulse' : ''}} col-auto col-xl-12 Item">
                  <div class="card active hover-border-primary">
                    <div class="card-body">
                      <div class="row g-0 sh-6">
                        <div class="col-auto">
                          <img
                            src="{{$Chat['User']['ProfilPic'] ?? URL::asset('assets/upload/Default.png')}}"
                            class="card-img rounded-xl sh-6 sw-6 no-delay"
                            data-bs-delay="0"
                            alt="thumb"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom"
                            title="{{$Chat['User']['FirstName']??'Silindi'}} {{$Chat['User']['LastName'] ?? ''}}"
                          />
                        </div>
                        <div class="col d-none d-xl-block">
                          <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                            <div class="d-flex flex-column">
                              <a href="#" class="body-link">{{$Chat['Title']}}</a>
                              <div class="text-small text-muted">{{$Chat['User']['FirstName']??'Silindi'}} {{$Chat['User']['LastName']??''}}</div>
                              <div class="text-small text-muted">{{ (!empty($Chat['User']))? ((($Chat['User']['Type']=='2')? Lang::get('Consult.Admin') : (($Chat['User']['Type']=='1')? Lang::get('Consult.Manager') : Lang::get('Consult.Agent') ))) : 'Silindi' 
                              }}</div>
                            </div>
<!--                             <div class="d-flex">
                              <button class="btn btn-sm btn-icon btn-icon-only btn-outline-primary ms-1" type="button">
                                <i data-acorn-icon="more-vertical"></i>
                              </button>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            @else
              <div class="col-auto col-xl-12">
                <div class="card active hover-border-primary">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      
                      <div class="col d-none d-xl-block">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <a href="#" class="body-link">Chat No found</a>
                            <div class="text-small text-muted">-</div>
                          </div>
                     
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
          </div>
          <!-- Doctors List End -->
        </div>

        <div class="col-xl-8">

          <!-- Consult Start -->
          <div >
            <h2 class="small-title">{{Lang::get('Consult.Messages')}} </h2>
            <div class="card mb-2">
              <div id="MessageContainer" class="card-body border-last-none">
                

              </div>
            </div>
          </div>
          <!-- Consult End -->

          <!-- Consult Answer Start -->
          <div class="card">
            <div class="card-body">
              <form id="MessageForm" action="ajax" target="SendMessage" method="POST">
                <div class="mb-3  text-center ">
                        <label class="form-label"><h5>{{Lang::get('Consult.Subject')}}</h5></label>
                        <input name="Title" class="result form-control" type="text" id="Title" >
                </div>
                <div data-id="quillEditorFilledEmail" data-label="fuck" class="mb-3 filled custom-control-container editor-container">
                  <br>
                  <label><h5  class="text-muted">{{Lang::get('Consult.Answer')}}</h5></label>
                  <div  class="html-editor sh-16" id="quillEditorFilledEmail"></div>
                  <i data-acorn-icon="notebook-1"></i>
                </div>
                <input hidden type="text" name="Content">
                <button id="SubmitBtn" onclick="javascript:
                  HoldOn.open(options);
                  var Content = window.Quill.root.innerHTML;
                  $('input[name=Content]').val(Content);
                  $(this).parent('form').trigger('submit');
                  GetMessages('\''+$('input[name=ChatId]').val()+'\'');
                  HoldOn.close();
                " class="btn btn-icon btn-icon-end btn-outline-primary" type="button">
                  <span>{{Lang::get('Consult.CreateChat')}}</span>
                  <i data-acorn-icon="send"></i>
                </button>
              </form>
              <form id="FileUploadForm"  action="ajax" method="POST" target="UploadFile" >
                  <input onchange="javascript: $(this).parent('form').submit();" hidden name="File" class="result form-control" type="File" id="File" >
                  <button onclick="javascript:$('#File').click();return false;" type="text " class="btn btn-outline-primary btn-icon btn-icon-only me-1">
                    <i data-acorn-icon="attachment"></i>
                  </button>
                  
              </form>
            </div>
          </div>
          <!-- Consult Answer End -->
        </div>
      </div>
    </div>
  </main>


  <script type="text/javascript">
    function FileUploaded($url){
        $('#MessageForm').append('<input hidden type="text" value="'+$url+'" name="Attachments[]">');
        $('#FileUploadForm').append('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-check-circle mb-3 d-inline-block text-primary"><path d="M17 5L10.6329 12.2032C10.2511 12.6351 9.58418 12.6556 9.17656 12.248L6.92857 10"></path><path d="M18 10C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10C2 5.58172 5.58172 2 10 2C11.0609 2 12.0736 2.20651 13 2.58152"></path></svg>');
    }
  </script>
@endsection

@section('script')
  <!-- Page Specific Scripts Start -->
  <script src="{{URL::asset('assets/js/vendor/quill.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/vendor/quill.active.js')}}"></script>

  <!-- Page Specific Scripts End -->
  <script type="text/javascript">
    // $(document).ready(function(){
    //     GetMessages('{{@$Chats[0]['uid']}}');
    // });
          function GetChats(){
            $.ajax({
              type: 'POST',
              url: '/ajax',
              headers: {'X-CSRF-TOKEN': @json(csrf_token())},
              data : {
                action: 'GetChats'
              },
              cache: false,
              success: function(data){
                if (data['outcome']) {
                    var Container = $('#ChatContainer');
                    Container.empty();
                    data['data'].forEach((Item)=>{
                      Container.append('<div onclick="javascript:GetMessages(\''+Item['uid']+'\');" class=" '+((Item['Pulse'])? 'Pulse': '')+' col-auto col-xl-12"><div class="card active hover-border-primary"><div class="card-body"><div class="row g-0 sh-6"><div class="col-auto"><img src="'+(Item['User']['ProfilPic'] ?? '/assets/upload/Default.png')+'" class="card-img rounded-xl sh-6 sw-6 no-delay" data-bs-delay="0" alt="thumb" data-bs-toggle="tooltip" data-bs-placement="bottom" title="'+Item['User']['FirstName']+' '+Item['User']['LastName']+'"/></div><div class="col d-none d-xl-block"><div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between"><div class="d-flex flex-column"><a href="#" class="body-link">'+Item['Title']+'</a><div class="text-small text-muted">'+Item['User']['FirstName']+' '+Item['User']['LastName']+'</div><div class="text-small text-muted">'+((Item['User']['Type']=='2')? '{{Lang::get('Consult.Admin')}}' : ((Item['User']['Type']=='1')? '{{Lang::get('Consult.Manager')}}' : '{{Lang::get('Consult.Agent')}}'))  +'</div></div></div></div></div></div></div></div>');
                    });
                }
              }
            });
          }
  </script>
  @endsection



