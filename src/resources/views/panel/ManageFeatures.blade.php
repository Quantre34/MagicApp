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
            <h1 class="mb-0 pb-0 display-4" id="title">@Lang('ManageFeature.InsertFeature')</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8">


          <!-- Agency Information Start -->
          <h2 class="small-title">@Lang('ManageFeature.FeatureInfo')</h2>
          <div class="card mb-5">
            <div class="card-body">
              <form id="FeatureForm" action="ajax" target="InsertFeature" method="POST">

                <input hidden type="text" class="form-control" name="Id" />
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageFeature.Title')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Title" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageFeature.Cost')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="number" class="form-control" name="Cost" />
                  </div>
                </div> 

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageFeature.Type')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Checked" id="CategorySelect">
                        <option selected value='1'>@Lang('ManageFeature.Default')</option>
                        <option value='0'>@Lang('ManageFeature.Optional')</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageFeature.Package')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Package" id="ParentSelect">
                      <option label="&nbsp;"></option>
                      @foreach($Packages as $Package)
                        <option value="{{$Package['Id']}}">{{$Package['Title']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageFeature.Order')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="number" class="form-control" name="Order" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageFeature.Multiply') (@Lang('ManageFeature.PerTDay'))</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single" data-width="100%" name="Multiply" id="genderSelect">
                      <option selected value='0'>@Lang('ManageFeature.DontMultiply')</option>
                      <option  value='1'>@Lang('ManageFeature.Multiply')</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageFeature.Status')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Status" id="StatusSelect">
                      <option selected value='1'>@Lang('ManageFeature.Active')</option>
                      <option value='0'>@Lang('ManageFeature.Passive')</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row mt-5">
                  <div id="FeatureFormButtons" class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button id="SubmitBtn" type="submit" class="btn btn-outline-primary">@Lang('ManageFeature.InsertFeature')</button>
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
            <h2 class="small-title">@Lang('ManageFeature.Choose')</h2>
          </div>
          <div style="overflow-y:scroll; height:50%;" class="card mb-5">
            <div class="card-body flex text-center FeatureList">
              @foreach($Packages as $Package)
                <div style="font-weight: 800; font-size: 20px;" class="text-primary mb-1">{{$Package['Title']}}</div>
                @if(!empty($Package['Features']))
                  @foreach($Package['Features'] as $Feature)
                    <div onclick="SetFeatureInfo('{{$Feature['Id']}}')" style="border:  1px solid black; border-radius: 30px; " class="mb-4">
                      <div  class="text-primary mb-1">{{$Feature['Title']}}</div>
                      <div>@Lang('ManageFeature.Cost'): {{$Feature['Cost']}} &euro;</div>
                      <div class="text-muted">{{ ($Feature['Checked']=='1')? Lang::get('ManageFeature.Default') : Lang::get('ManageFeature.Optional') }}</div>
                      <div class="text-muted">@Lang('ManageFeature.Order'): {{$Feature['Order']}}</div>
                    </div>
                  @endforeach
                  @else 
                    <div>No Feature Found!</div>
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
  <script type="text/javascript">
    function Reset(){
      $('#FeatureForm')[0].reset();
      $('#title').html('@Lang('ManageFeature.InsertFeature')');
      $('#FeatureForm option').removeAttr('selected');
      $('#FeatureForm select').trigger('change');
      $('#FeatureForm #ResetBtn').remove();
      $('#FeatureForm').attr('target','InsertFeature');
      $('#FeatureForm button[type=submit]').html('@Lang('ManageFeature.InsertFeature')');
      $('.select2-selection').css('background-color','var(--input)');///let the selects bg be...
      $('#FeatureForm').each((e)=>{
          console.log(e);
          $( ".select2-selection__choice__remove" ).click();
      });
      $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
    }
    function GetFeatures(){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetFeatures',
            Id: 'All'
          },
          success: function(data){
            if (data['outcome']) {
                $('.FeatureList').empty();
                Object.entries(data['data']).forEach( Parent => {
                  console.log(Parent);
                  const [PackKey, Package] = Parent;
                  $('.FeatureList').append(`<div  style="font-weight: 800; font-size: 20px;" class="text-primary mb-1">${Package['Title']}</div>`);
                  if (Package['Features'].length > 0) {
                      console.log('Feature Passes the test');
                      Object.entries(Package['Features']).forEach( Item => {
                          const [key, value] = Item;
                          console.log(value);
                          $('.FeatureList').append('<div onclick="SetFeatureInfo(\''+value['Id']+'\')" style="border:  1px solid black; border-radius: 30px; " class="mb-4"><div  class="text-primary mb-1">'+value['Title']+'</div><div>@Lang('ManageFeature.Cost'): '+value['Cost']+' &euro;</div><div class="text-muted">'+((value['Checked']=='1')? 'Default': 'Optional')+'</div><div class="text-muted">@Lang('ManageFeature.Order'): '+value['Order']+'</div></div>');
                      });
                  }else {
                    $('.FeatureList').append('<div>No Treatment Found!</div><hr>');
                  }
                });
            }
            //console.log(data);
          }
        });
    }
    function SetFeatureInfo(Id){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetFeatureInfo',
            Id: Id
          },
          success: function(data){
            if (data['outcome']) {
              $('#title').html('@Lang('ManageFeature.UpdateFeature')');
              $('#FeatureForm #ResetBtn').remove();
                $('#FeatureForm').attr('target', 'AlterFeature');
                $('#FeatureForm input[name=uid]').val(data['data']['uid']);
                $('#FeatureForm button[type=submit]').html('@Lang('ManageFeature.UpdateFeature')');
                $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
                Object.entries(data['data']).forEach(Item => {
                    const [key, value] = Item;
                    $('#FeatureForm input[name='+key+']').val(value);
                });
                $('#FeatureForm option').removeAttr('selected');
                $('#ParentSelect option').each((key , value)=> {
                  if($(value).val()==data['data']['ParentId']){
                    $(value).attr('selected','selected');
                  }
                });
                $('#StatusSelect option').each((key , value)=> {
                  if($(value).val()==data['data']['Status']){
                    $(value).attr('selected','selected');
                  }
                });
                $('#CategorySelect option').each((key , value)=> {
                  console.log($(value).val() + ' == ' + data['data']['Checked']);
                  if($(value).val()==data['data']['Checked']){
                    $(value).attr('selected','selected');
                  }
                });
                $('#genderSelect option').each((key , value)=> {
                  if($(value).val()==data['data']['Multiply']){
                    $(value).attr('selected','selected');
                  }
                });                $('#FeatureForm select').trigger('change');
                $('#FeatureFormButtons').append('<button id="ResetBtn" class="btn btn-outline-danger" onclick="Reset()">@Lang('ManageFeature.Reset')</button>');
            }
            console.log(data);
          }
        });
    }
    ///
$(document).ready(function(){
  SweetSelect('MultiplySelect');
});

  </script>
  <script>
  setTimeout(function(){
    Reset();
  }, 300);

</script>
@endsection
  </body>
</html>
