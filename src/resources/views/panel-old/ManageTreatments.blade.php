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
            <h1 class="mb-0 pb-0 display-4" id="title">@Lang('ManageTreatment.InsertTreatment')</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8">


          <!-- Agency Information Start -->
          <h2 class="small-title">@Lang('ManageTreatment.TreatmentInfo')</h2>
          <div class="card mb-5">
            <div class="card-body">

                <form id="FileUploadForm" action="ajax" method="POST" target="UploadFile" >                
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageTreatment.TreatmentImage')</label>
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
                  $('#TreatmentForm input[name=Img]').val(url);
                }
              </script>


              <form id="TreatmentForm" action="ajax" target="InsertTreatment" method="POST">

                <input hidden type="text" class="form-control" name="Id" />
                <input hidden type="text" class="form-control" name="Img" />
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageTreatment.Title')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Title" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageTreatment.Cost')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="number" class="form-control" name="Cost" />
                  </div>
                </div> 

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageTreatment.EstimatedTime')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="number" class="form-control" name="EstimatedTime" />
                  </div>
                </div> 

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageTreatment.Category')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Category" id="CategorySelect">
                      <option label="&nbsp;"></option>
                      @foreach($Categories as $Category)
                        <option value="{{$Category['Id']}}">{{$Category['Title']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageTreatment.Status')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Status" id="StatusSelect">
                      <option selected value='1'>@Lang('ManageTreatment.Active')</option>
                      <option value='0'>@Lang('ManageTreatment.Passive')</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row mt-5">
                  <div id="TreatmentFormButtons" class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button id="SubmitBtn" type="submit" class="btn btn-outline-primary">@Lang('ManageTreatment.InsertTreatment')</button>
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
            
            <div class="form-group mb-3 mt-3">
              <h2 class="small-title">@Lang('ManageTreatment.Choose')</h2>
              <input type="text" placeholder="search"  name="Query" class="form-control" onchange="javascript:
              $('.Item').fadeOut('fast');
              $('.Item').each(function(){
                if ($(this).attr('title').toLowerCase().includes( $('input[name=Query]').val().toLowerCase() )) {
                    $(this).fadeIn('slow');
                }
              });
              ">
            </div>

          </div>
          <div style="overflow-y:scroll; height:48%;" class="card mb-5 ">
            <div class="card-body flex text-center TreatmentList">
              @foreach($Categories as $Category)
                <div syle="font-size: 16px;" class="text-primary mb-1">{{$Category['Title']}}</div><hr>
                @if(!empty($Category['Treatments']))
                  @foreach($Category['Treatments'] as $Treatment)
                    <div title="{{$Treatment['Title']}}" onclick="SetTreatmentInfo('{{$Treatment['Id']}}')" style="border: 1px solid black; border-radius: 15px; " class="mb-4 Item">
<!--                       <center>
                        <div class="col-auto">
                          <div class="sw-5 me-3">
                            <img src="{{ $Treatment['Img'] ?? asset('/assets/img/Default-Package.jpg') }}" class="img-fluid rounded-xl" alt="thumb" />
                          </div>
                        </div>
                      </center> -->
                      <div  class="text-primary mb-1">{{$Treatment['Title']}}</div>
                      <div>{{$Category['Title']}}</div>
                      <div class="text-muted">@Lang('ManageTreatment.EstimatedTime'): {{$Treatment['EstimatedTime']}}</div>
                      <div class="text-muted">@Lang('ManageTreatment.Cost'): {{$Treatment['Cost']}} &euro;</div>
                      <div class="text-muted">{{ ($Treatment['Status']=='1')? Lang::get('ManageTreatment.Active') : Lang::get('ManageTreatment.Passive') }}</div>
                    </div>
                  @endforeach
                  @else 
                    <div>@Lang('ManageTreatment.NotFound')</div>
                    <hr>
                  @endif
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
      $('#TreatmentForm')[0].reset();
      $('#title').html('@Lang('ManageTreatment.InsertTreatment')');
      $('#TreatmentForm option').removeAttr('selected');
      $('#CategorySelect').trigger('change');
      $('#TreatmentForm #ResetBtn').remove();
      $('#TreatmentForm').attr('target','InsertTreatment');
      $('#TreatmentForm button[type=submit]').html('@Lang('ManageTreatment.InsertTreatment')');
      $('.select2-selection').css('background-color','var(--input)');///let the selects bg be...
      $('#Img').attr('src', '/assets/img/Default-Package.jpg');
      $('input[name=Img]').attr('src', '/assets/img/Default-Package.jpg');
      $('#TreatmentForm').each((e)=>{
          console.log(e);
          $( ".select2-selection__choice__remove" ).click();
      });
      $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
    }
    function GetTreatments(){
      // window.location.reload();
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetTreatmentCategories',
            Id: 'All'
          },
          success: function(data){
            console.log(data);
            if (data['outcome']) {
                $('.TreatmentList').empty();
                Object.entries(data['data']).forEach( Parent => {
                  const [Catkey, Category] = Parent;
                  $('.TreatmentList').append(`<div class="text-primary mb-1">${Category['Title']}</div><hr>`);
                  if (Category['Treatments'].length > 0) {
                      Object.entries(Category['Treatments']).forEach( Item => {
                          const [key, value] = Item;
                          
                          $('.TreatmentList').append('<div onclick="SetTreatmentInfo(\''+value['Id']+'\')" style="border: 1px solid black; border-radius: 30px; " class="mb-4"><div class="text-primary mb-1">'+value['Title']+'</div><div>'+Category['Title']+'</div><div class="text-muted">Estimated Time (Day): '+value['EstimatedTime']+' </div><div class="text-muted">Cost: '+value['Cost']+' &euro;</div><div class="text-muted">'+((value['Status']=='1')? '@Lang('ManageTreatment.Active')': '@Lang('ManageTreatment.Passive')')+'</div></div>');
                      });
                  }else {
                    $('.TreatmentList').append('<div>@Lang('ManageTreatment.NotFound')</div><hr>');
                  }
                });
            }
            //console.log(data);
          }
        });
    }
    function SetTreatmentInfo(Id){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetTreatmentInfo',
            Id: Id
          },
          success: function(data){
            if (data['outcome']) {
              $('#title').html('@Lang('ManageTreatment.UpdateTreatment')');
              $('#TreatmentForm #ResetBtn').remove();
                $('#TreatmentForm').attr('target', 'AlterTreatment');
                $('#TreatmentForm input[name=uid]').val(data['data']['uid']);
                $('#TreatmentForm button[type=submit]').html('@Lang('ManageTreatment.UpdateTreatment')');
                $('#Img').attr('src', (data['data']['Img'] ?? '/assets/img/Default-Package.jpg'));
                $('input[name=Img]').attr('src', (data['data']['Img'] ?? '/assets/img/Default-Package.jpg'));
                $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
                Object.entries(data['data']).forEach(Item => {
                    const [key, value] = Item;
                    $('#TreatmentForm input[name='+key+']').val(value);
                });
                $('#TreatmentForm option').removeAttr('selected');
                $('#CategorySelect option').each((key , value)=> {
                  if($(value).val()==data['data']['ParentId']){
                    $(value).attr('selected','selected');
                  }
                });
                $('#StatusSelect option').each((key , value)=> {
                  if($(value).val()==data['data']['Status']){
                    $(value).attr('selected','selected');
                  }
                });
                $('#CategorySelect').trigger('change');
                $('#StatusSelect').trigger('change');
                $('#TreatmentFormButtons').append('<button id="ResetBtn" class="btn btn-outline-danger" onclick="Reset()">@Lang('ManageTreatment.Reset')</button>');
            }
            console.log(data);
          }
        });
    }
    ///


  </script>
  <script>
  setTimeout(function(){
    Reset();
  }, 300);

</script>
@endsection
  </body>
</html>
