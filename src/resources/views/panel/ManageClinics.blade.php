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
            <h1 class="mb-0 pb-0 display-4" id="title">Insert Clinic</h1>
          </div>

          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row gx-5">
        <div class="col-xl-8">


          <!-- Agency Information Start -->
          <h2 class="small-title">Clinic Information</h2>
          <div class="card mb-5">
            <div class="card-body">
              <form id="ClinicForm" action="ajax" target="InsertClinic" method="POST">

                <input hidden type="text" class="form-control" name="uid" />
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Title</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Title" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Logo</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Logo"  />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Mail</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Mail" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tell</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Tell" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Fax</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Fax" />
                  </div>
                </div>    
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Country</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Country" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Province</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Province" />
                  </div>
                </div> 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">City</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="City" />
                  </div>
                </div> 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Adress</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="Adress" />
                  </div>
                </div> 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Rate/Starts</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="number" max="5" class="form-control" name="Rate" />
                  </div>
                </div> 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Category</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-multiple" multiple data-width="100%" name="Category[]" id="CategorySelect">
                      <option label="&nbsp;"></option>
                      @foreach($Categories as $Category)
                        <option value="{{$Category['Id']}}">{{$Category['Title']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Treatments</label>
                  <div id="CategoryParent" class="col-sm-8 col-md-9 col-lg-10">
                    <select class="select-multiple" multiple data-width="100%" name="Treatment[]" id="TreatmentSelect">
                      <option label="&nbsp;"></option>
                      @foreach($Categories as $Category)
                        @foreach($Category['Treatments'] as $Treatment)
                        <option value="{{$Treatment['Id']}}-{{$Treatment['Cost']}}">{{$Category['Title']}} - {{$Treatment['Title']}} - {{floatval($Treatment['Cost'])}}Tl</option>
                        @endforeach
                      @endforeach
                    </select>
                  </div>
                </div>


                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Commission Rate (%)</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" class="form-control" name="CommissionRate" />
                  </div>
                </div>

                <div class="mb-3 row mt-5">
                  <div id="ClinicFormButtons" class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button id="SubmitBtn" type="submit" class="btn btn-outline-primary">Insert Agency</button>
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
<!--             <button class="btn btn-icon btn-icon-start btn-xs btn-background-alternate p-0 text-small pe-1" type="button">
              <i data-acorn-icon="edit" class="align-middle me-1" data-acorn-size="14"></i>
              <span class="align-bottom">Edit</span>
            </button> -->
          </div>
          <div style="overflow-y:scroll; height:93%;" class="card mb-5 ">
            <div class="card-body flex text-center ClinicList">
              @foreach($Clinics as $Clinic)
              <div onclick="SetClinicInfo('{{$Clinic->uid}}')" style="border:  1px solid black; border-radius: 30px; " class="mb-4">
                <div  class="text-primary mb-1">{{$Clinic->Title}}</div>
                <div>{{$Clinic->Mail}}</div>
                <div class="text-muted">{{$Clinic->Tell}}</div>
                <div class="text-muted">{{ ($Clinic->Status=='1')? 'Active' : 'Pasive' }}</div>
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
      $('#ClinicForm')[0].reset();
      $('#title').html('Insert Clinic');
      $('main option').removeAttr('selected');
      $('#ClinicForm #ResetBtn').remove();
      $('#ClinicForm').attr('target','InsertClinic');
      $('#ClinicForm button[type=submit]').html('Insert Clinic');
      $('.select2-selection').css('background-color','var(--input)');///let the selects bg be...
      $('#ClinicForm').each((e)=>{
          console.log(e);
          $( ".select2-selection__choice__remove" ).click();
      });
      $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
    }
    function GetClinics(){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetClinics'
          },
          success: function(data){
            if (data['outcome']) {
                $('.ClinicList').empty();
                Object.entries(data['data']).forEach( Item => {
                    const [key, value] = Item;
                    $('.ClinicList').append('<div onclick="SetClinicInfo(\''+value['uid']+'\')" style="border:  1px solid black; border-radius: 30px; " class="mb-4"><div  class="text-primary mb-1">'+value['Title']+'</div><div>'+value['Mail']+'</div><div class="text-muted">'+value['Tell']+'</div><div class="text-muted">'+((value['Status']=='1')? 'Active': 'Pasive')+'</div></div>');
                });

            }
            //console.log(data);
          }
        });
    }
    function SetClinicInfo(uid){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetClinicInfo',
            uid: uid
          },
          success: function(data){
            if (data['outcome']) {
              $('#title').html('Update Clinic');
              $('#ClinicForm #ResetBtn').remove();
                $('#ClinicForm').attr('target', 'AlterClinic');
                $('#ClinicForm input[name=uid]').val(data['data']['uid']);
                $('#ClinicForm button[type=submit]').html('Update Clinic');
                $('.select2-search__field').attr('style','width: 0.75em;" aria-controls="select2-CategorySelect-results" aria-activedescendant="select2-CategorySelect-result-hgjq-1');
                Object.entries(data['data']).forEach(Item => {
                    const [key, value] = Item;
                    $('#ClinicForm input[name='+key+']').val(value);
                });
                $('option').removeAttr('selected');
                $('#ClinicForm option').removeAttr('selected');
                JSON.parse(data['data']['Treatments']).forEach(Item => {
                    $('option').each((key , value)=> {
                      if($(value).val().includes(Item.Id+'-')){
                        $(value).attr('selected','selected');
                      }
                    });
                    $('#TreatmentSelect').trigger('change');
                });
                JSON.parse(data['data']['Categories']).forEach(Item => {
                    console.log(Item);
                    $('option').each((key , value)=> {
                      if($(value).val()==Item){
                        $(value).attr('selected','selected');
                      }
                    });
                    $('#CategorySelect').trigger('change');
                });
                $('#ClinicFormButtons').append('<button id="ResetBtn" class="btn btn-outline-danger" onclick="Reset()">Reset</button>');
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
  <script>


$(document).on("click", ".select2-selection__choice", function(e){
    $this = $(this);
    if (e.target.className !='select2-selection__choice__remove') {
        var Valy = e.target.title.split('-');
        var Val = '' + $('#TreatmentSelect').val();
        Val = Val.split(',');
        Val.forEach((Item)=>{
          var CurrentValue = Item.split('-');
          if (Valy[2].includes(CurrentValue[1])) {
              window.CurrentValue = CurrentValue;
          }
        });
        var $Option = $('option[value=' + window.CurrentValue[0] + '-' + window.CurrentValue[1] + ']');
        const { value: value } =  Swal.fire({
          title: 'Treatment Cost',
          input: 'text',
          inputLabel: 'Enter New Cost for this Treatment for this clinic!',
          inputValue: CurrentValue[1],
          inputPlaceholder: 'Enter Value'
        }).then((result)=>{
          console.log(result);
            if (result.isConfirmed) {
              $Option.val(CurrentValue[0]+ '-' +result.value);
              var ListElement = $('li[title="'+e.target.title+'"]');
              ListElement.html('<span class="select2-selection__choice__remove" role="presentation">×</span>'+Valy[0] +' - '+ Valy[1] +' - '+ result.value+'Tl');
              ListElement.attr('title', Valy[0] +' - '+ Valy[1] +' - '+ result.value+'Tl');
              Swal.fire(`Entered value: ${result.value}`);
            }
        }); 
    }
    ///
    $('#CategoryParent input').on('change',function(){
        console.log($(this).val());
    });
});

</script>
@endsection
  </body>
</html>
