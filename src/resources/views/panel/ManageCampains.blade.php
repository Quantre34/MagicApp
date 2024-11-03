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
            <h1 class="mb-0 pb-0 display-4" id="title">@Lang('ManageCampaign.InsertCampaign')</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8">


          <!-- Agency Information Start -->
          <h2 class="small-title">@Lang('ManageCampaign.CampaignInfo')</h2>
          <div class="card mb-5">
            <div class="card-body">
              
                <form id="FileUploadForm" action="ajax" method="POST" target="UploadFile" >                
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCampaign.BannerPic')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <center>
                      <div style="width: 20%;"  class="col-auto">
                        <div sclass="sw-5 me-3">
                          <img id="Img" style="width: 200%;"  onclick="javascript:$(this).parent().children('input[type=file]').click();" src="{{URL::asset('assets/img/profile/Default.png')}}"  class="img-fluid rounded-xl" alt="thumb" />
                          <input onchange="javascript:$(this).parent().children('button[type=submit]').click();" type="file" hidden name="Img">
                          <button type="submit" hidden class="btn submit">submit</button>
                        </div>
                      </div>
                    </center>
                  </div>
                </div> 
                </form>
                <script type="text/javascript">
                  function FileUploaded(url){
                    $('input[name=Img]').parent().children('img').attr('src', url);
                    $('#CampainForm input[name=Img]').val(url);
                  }
                </script>
                <form id="CampainForm" action="ajax" target="InsertCampain" method="POST">
                <input hidden type="text" class="form-control" name="Id" />
                <input type="text" hidden name="Img" value="/assets/upload/Default.png">
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCampaign.Title')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Title" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCampaign.Slogan')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Slogan" />
                  </div>
                </div>


                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCampaign.Description')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Text" />
                  </div>
                </div> 

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCampaign.Discount')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Discount" />
                  </div>
                </div> 

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCampaign.DiscountType')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="DiscountType" id="CategorySelect">
                      <option selected value='0'>%</option>
                      <option value='1'>€</option>
                      <option value='2'> (.*) / 10</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCampaign.Target')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Type" id="ParentSelect">
                      <option selected value='0'>@Lang('ManageCampaign.Agency')</option>
                      <option value='1'>@Lang('ManageCampaign.Manager')</option>
                      <option value='2'>@Lang('ManageCampaign.Clinic')</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManageCampaign.Status')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Status" id="StatusSelect">
                      <option selected value='1'>@Lang('ManageCampaign.Active')</option>
                      <option value='0'>@Lang('ManageCampaign.Passive')</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row mt-5">
                  <div id="CampainFormButtons" class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button id="SubmitBtn" type="submit" class="btn btn-outline-primary">@Lang('ManageCampaign.InsertCampaign')</button>
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
            <h2 class="small-title">@Lang('ManageCampaign.Choose')</h2>
          </div>
          <div style="overflow-y:scroll; height:100%;" class="card mb-5 ">
            <div class="card-body flex text-center CampainList">
              @foreach($Campains as $Campain)
              <div onclick="SetCampainInfo('{{$Campain['Id']}}')" style="border: 1px solid black; border-radius: 30px; " class="mb-4">

                <center>
                  <div class="col-auto">
                    <div class="sw-5 me-3">
                      <img style="width:200%;" src="{{ $Campain['Img'] ?? asset('assets/upload/Default.png') }}"   />
                    </div>
                  </div>
                </center>
                <div  class="text-primary mb-1">{{$Campain['Title']}}</div>
                <div>{{$Campain['Discount'] ?? 0}} <?php echo ($Campain['DiscountType']=='0')? '%' : (($Campain['DiscountType']=='1')? '€' : '/ 10') ?></div>
                <div class="text-muted">{{ ($Campain['Status']=='1')? @Lang::get('ManageCampaign.Active') : Lang::get('ManageCampaign.Passive') }}</div>
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
      $('#CampainForm')[0].reset();
      $('#title').html('@Lang('ManageCampaign.InsertCampaign')');
      $('#CampainForm option').removeAttr('selected');
      $('#CategorySelect').trigger('change');
      $('#TypeSelect').trigger('change');
      $('#ParentSelect').trigger('change');
      $('#CampainForm #ResetBtn').remove();
      $('#CampainForm').attr('target','InsertCampain');
      $('#CampainForm button[type=submit]').html('@Lang('ManageCampaign.InsertCampaign')');
      $('.select2-selection').css('background-color','var(--input)');///let the selects bg be...
      $('#CampainForm').each((e)=>{
          console.log(e);
          $( ".select2-selection__choice__remove" ).click();
      });
      $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
    }
    function GetCampains(){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetCampain',
            Id: 'All'
          },
          success: function(data){
            if (data['outcome']) {
                $('.CampainList').empty();
                Object.entries(data['data']).forEach( Item => {
                    const [key, Campain] = Item;
                    console.log(Campain);
                    $('.CampainList').append('<div onclick="SetCampainInfo(\''+Campain['Id']+'\')" style="border:  1px solid black; border-radius: 30px; " class="mb-4"><center><div class="col-auto"><div class="sw-5 me-3"><img style="width:200%;" src="'+(Campain['Img']??'{{URL::asset('assets/upload/Default.png')}}')+'" /></div></div></center><div  class="text-primary mb-1">'+Campain['Title']+'</div><div >'+Campain['Discount']+' '+((Campain['DiscountType']=='0')? '%' : ((Campain['DiscountType']=='1')? '€' : '/ 10') )+'</div><div class="text-muted"></div><div class="text-muted"></div><div class="text-muted">'+((Campain['Status']=='1')? '@Lang('ManageCampaign.Active')': '@Lang('ManageCampaign.Passive')')+'</div></div>');
                });

            }
            //console.log(data);
          }
        });
    }
    function SetCampainInfo(Id){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetCampain',
            Id: Id
          },
          success: function(data){
            if (data['outcome']) {
              $('#title').html('@Lang('ManageCampaign.UpdateCampaign')');
              $('#CampainForm #ResetBtn').remove();
              $('#Img').attr('src', (data['data']['Img'] ?? '/assets/upload/Default.png'));
                $('#CampainForm').attr('target', 'AlterCampain');
                $('#CampainForm input[name=uid]').val(data['data']['uid']);
                $('#CampainForm button[type=submit]').html('@Lang('ManageCampaign.UpdateCampaign')');
                $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
                Object.entries(data['data']).forEach(Item => {
                    const [key, value] = Item;
                    $('option[value='+Item['ParentId']+']').attr('selected','selected');
                    $('#CampainForm input[name='+key+']').val(value);
                });
                $('#CampainForm option').removeAttr('selected');
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
                $('#CategorySelect option').each((key, value)=>{
                    if ($(value).val()==data['data']['DiscountType']) {
                        $(value).attr('selected', 'selected');
                    }
                });
                $('#CampainForm select').trigger('change');
                $('#CampainFormButtons').append('<button id="ResetBtn" class="btn btn-outline-danger" onclick="Reset()">@Lang('ManageCampaign.Reset')</button>');
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
