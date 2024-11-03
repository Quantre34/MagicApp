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
            <h1 class="mb-0 pb-0 display-4" id="title">@Lang('ManagePackage.InsertPackage')</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8">


          <!-- Agency Information Start -->
          <h2 class="small-title">@Lang('ManagePackage.PackageInfo')</h2>
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
                  $('#PackageForm input[name=Logo]').val(url);
                }
              </script>
                <form id="PackageForm" action="ajax" target="InsertPackage" method="POST">
                <input hidden type="text" class="form-control" name="Id" />
                <input type="text" hidden name="Logo">

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManagePackage.Title')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Title" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManagePackage.Rate')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Rate" />
                  </div>
                </div>


                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManagePackage.Description')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Description" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">@Lang('ManagePackage.Status')</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-single-no-search" data-width="100%" name="Status" id="StatusSelect">
                      <option selected value='1'>@Lang('ManagePackage.Active')</option>
                      <option value='0'>@Lang('ManagePackage.Passive')</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row mt-5">
                  <div id="PackageFormButtons" class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button id="SubmitBtn" type="submit" class="btn btn-outline-primary">@Lang('ManagePackage.InsertPackage')</button>
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
            <h2 class="small-title">@Lang('ManagePackage.Choose')</h2>
          </div>
          <div style="overflow-y:scroll; height:100%;" class="card mb-5 ">
            <div class="card-body flex text-center PackageList">
              @if(!empty($Packages))
                @foreach($Packages as $Package)
                <div onclick="SetPackageInfo('{{$Package['Id']}}')" style="border: 1px solid black; border-radius: 30px;" class="mb-4">

                  <center>
                    <div class="col-auto">
                      <div class="sw-5 me-3">
                        <img src="{{ $Package['Logo'] ?? asset('assets/img/Default-Package.jpg') }}" class="img-fluid rounded-xl" alt="thumb" />
                      </div>
                    </div>
                  </center>

                  <div  class="text-primary mb-1">{{$Package['Title'] ?? ''}}</div>
                  <div class="text-muted">@Lang('ManagePackage.Rate'): {{$Package['Rate']}}</div>
                  <div class="text-muted"> @Lang('ManagePackage.Description'): {{ substr($Package['Description'] ?? '' , 0, 30)}}...</div>
                  <div class="text-muted">{{ ($Package['Status']=='1')? Lang::get('ManagePackage.Active') : Lang::get('ManagePackage.Passive') }}</div>
                </div>
                @endforeach
              @else 
                <div>@Lang('ManagePackage.NotFound')</div>
                <hr>
              @endif
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
      $('#PackageForm')[0].reset();
      $('#title').html('@Lang('ManagePackage.InsertPackage')');
      $('#PackageForm option').removeAttr('selected');
      $('#CategorySelect').trigger('change');
      $('#TypeSelect').trigger('change');
      $('#ParentSelect').trigger('change');
      $('img[id=Logo]').attr('src', '/assets/img/Default-Package.jpg');
      $('#PackageForm #ResetBtn').remove();
      $('#PackageForm').attr('target','InsertPackage');
      $('#PackageForm button[type=submit]').html('@Lang('ManagePackage.InsertPackage')');
      $('.select2-selection').css('background-color','var(--input)');///let the selects bg be...
      $('#PackageForm').each((e)=>{
          console.log(e);
          $( ".select2-selection__choice__remove" ).click();
      });
      $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
    }
    function GetPackages(){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetPackages',
            Id: 'All'
          },
          success: function(data){
            if (data['outcome']) {
                $('.PackageList').empty();
                Object.entries(data['data']).forEach( Item => {
                    const [key, value] = Item;
                    console.log(value);
                    $('.PackageList').append('<div onclick="SetPackageInfo(\''+value['Id']+'\')" style="border:  1px solid black; border-radius: 30px; " class="mb-4"><center><div class="col-auto"><div class="sw-5 me-3"><img src="'+(value['Logo']??'{{URL::asset('assets/upload/Default.png')}}')+'" class="img-fluid rounded-xl" alt="thumb" /></div></div></center><div  class="text-primary mb-1">'+value['Title']+'</div><div class="text-muted">@Lang('ManagePackage.Rate'): '+value['Rate']  +'</div><div class="text-muted">Description: '+value['Description'].substr(0, 30)+'...</div><div class="text-muted">'+((value['Status']=='1')? 'Active': 'Pasive')+'</div></div>');
                });

            }
            //console.log(data);
          }
        });
    }
    function SetPackageInfo(Id){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetPackageInfo',
            Id: Id
          },
          success: function(data){
            if (data['outcome']) {
              $('#title').html('@Lang('ManagePackage.UpdatePackage')');
              $('#PackageForm #ResetBtn').remove();
              $('#Logo').attr('src', (data['data']['Logo'] ?? '/assets/img/Default-Package.jpg'));
                $('#PackageForm').attr('target', 'AlterPackage');
                $('#PackageForm input[name=Id]').val(data['data']['Id']);
                $('#PackageForm button[type=submit]').html('@Lang('ManagePackage.UpdatePackage')');
                $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
                Object.entries(data['data']).forEach(Item => {
                    const [key, value] = Item;
                    $('#PackageForm input[name='+key+']').val(value);
                });
                $('#PackageForm option').removeAttr('selected');
                $('#StatusSelect option').each((key , value)=> {
                    if($(value).val()==data['data']['Status']){
                      $(value).attr('selected','selected');
                    }
                });
                $('#PackageForm select').trigger('change');
                $('#PackageFormButtons').append('<button id="ResetBtn" class="btn btn-outline-danger" onclick="Reset()">@Lang('ManagePackage.Reset')</button>');
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
