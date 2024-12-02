   @extends('panel.App')

   @section('style')
      <link rel="stylesheet" href="{{asset('assets/panel/libs/dropzone/dist/min/dropzone.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/panel/libs/select2/dist/css/select2.min.css')}}">
   @endsection

    @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Tedavi Düzenle</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel/categories">Tedaviler</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{$Treatment['Title']}}</li>
                </ol>
              </nav>
              </div>
              <div class="d-flex align-items-center justify-content-between gap-6">
              <a href="panel/treatments" class="text-warning d-flex align-items-center ">
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

                  <form id="FileUploadForm" action="ajax" method="POST" target="UploadMultipleFile" >                
                  <div class="mb-3 row">
                    <label for="exampleInputtext1" class="form-label">Görsel</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <center>
                        <div style="width: 100%;"  class="col-auto">
                          <div sclass="sw-5 me-3">
                          <div class="mx-auto ImageContainer">
                              <img id="files" onclick="javascript:$('input[type=file][name=\'files[]\']').click();" src="{{$Treatment['Img']??'/assets/img/Default-Package.jpg'}}" style="width: 100%;max-width: 400px;" alt="thumb">
                          </div>
                            <input onchange="javascript:$('.LogoSend[type=submit]').click();" type="file" multiple hidden name="files[]">
                            <button type="submit" hidden class="btn submit LogoSend">submit</button>
                          </div>
                        </div>
                      </center>
                    </div>
                  </div> 
                  </form>
                  <form id="form-validate" action="ajax" target="AlterTreatment" method="POST" class="needs-validation" novalidate>
                    
                      <input type="text" hidden required name="Img" value="{{$Treatment['Img']}}">
                      <input hidden type="text" class="form-control" name="uid" value="{{$Treatment['uid']}}" />

                      <div class="mb-1">
                        <label for="exampleInputtext1" class="form-label">Başlık</label>
                        <input type="text" name="Title" required class="form-control" id="exampleInputtext1" value="{{$Treatment['Title']}}" >
                      </div>
                      <div class="mb-1">
                        <label for="exampleInputtext1" class="form-label">Url Anahtarı</label>
                        <input type="text"  name="Slug" required class="form-control" id="exampleInputtext1" value="{{$Treatment['Slug']}}">
                      </div>
                       <div class="mb-1">
                        <label for="exampleInputtext1" class="form-label">Fiyatı</label>
                        <input type="text"  name="Cost" required class="form-control" id="exampleInputtext1" value="{{$Treatment['Cost']}}">
                      </div>
                      <div class="mb-1">
                        <label for="exampleInputtext1" class="form-label">Tedavi süresi (Gün olarak)</label>
                        <input type="number"  name="EstimatedTime" required class="form-control" id="exampleInputtext1" value="{{$Treatment['EstimatedTime']}}">
                      </div>
                      <div class="mb-1">
                        <label for="exampleInputtext1" class="form-label">Kategori</label>
                        <select class="form-select" required name="Category">
                            @foreach($Categories as $Category)
                                <option value="{{$Category['Id']}}">{{$Category['Title']}}</option>
                            @endforeach                        
                        </select>
                      </div>


                      <div class="mb-3 row pt-3">
                          @foreach($Clinics as $key=>$Clinic)
                            <div class="col-sm-4">
                              <div class="form-check py-2">
                                <input <?= array_key_exists($Clinic['uid'], $Treatment['Clinics']) ? 'checked' : '' ?> type="checkbox" class="form-check-input" name="Clinics[]" id="{{$Clinic['uid']}}" value="{{$Clinic['uid']}}" />
                                <label class="form-check-label" for="{{$Clinic['uid']}}">{{$Clinic['Title']}}</label>
                              </div>
                            </div>    
                          @endforeach
                      </div>

                      <div class="mb-3 row pt-3 PriceContainer">
                          <!-- prices -->

                          <? foreach($Treatment['Clinics'] as $key=> $Cost): ?> 
                            <? $Clinic = toArray(DB::table('clinic')->where('uid',$key)->first()); ?>
                              <div class="row col-9 PriceItem" data-id="{{$Clinic['uid']}}">
                                <div class="col-lg-6">
                                  <div class="mb-4">
                                    <label for="exampleInputname2" class="form-label">Klinik</label>
                                    <input type="text" disabled class="form-control" id="exampleInputname2" value="{{$Clinic['Title']}}">
                                  </div>
                                </div>
                                <div class="col-lg-3">
                                  <div class="mb-4">
                                    <label for="exampleInputtext1" class="form-label">Fiyat</label>
                                    <div class="input-group">
                                      <input type="text" name="{{$Clinic['uid']}}" class="form-control" placeholder="--€" required value="{{$Cost}}">
                                      <span class="input-group-text px-6 PriceInfo" id="basic-addon1">
                                        <i class="ti ti-help fs-6"></i>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          <? endforeach; ?>

                      </div>


                      <div class="mb-1 row" >
                        <label for="exampleInputtext1" class="form-label">Açıklama</label>
                        <div style="width:100%;" id="editor" onfocusout="javascript: $('textarea[name=Description]').html($(this).children('.ql-editor').html());" class=" html-editor-snow html-editor sh-13 editor">
                          {{$Treatment['Description']}}
                        </div>
                      </div>
                      <textarea hidden id="text-area" name="Description">{{$Treatment['Description']}}</textarea>
                      <div class="mb-1">
                        <label for="exampleInputtext1" class="form-label">Durum</label>
                        <select class="form-select" required name="Status">
                          <option {{$Treatment['Status']=='0'? 'Selected' : ''}} value="0">Pasif</option>
                          <option {{$Treatment['Status']=='1'? 'Selected' : ''}} value="1">Aktif</option>
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

        <script src="{{asset('assets/panel/js/vendor.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
        <script src="{{asset('assets/panel/js/plugins/bootstrap-validation-init.js')}}"></script>
        <script src="{{asset('assets/panel/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
        <script src="{{asset('assets/panel/js/theme/app.init.js')}}"></script>

        <script src="{{asset('assets/panel/js/theme/theme.js')}}"></script>
        <script src="{{asset('assets/panel/js/theme/app.min.js')}}"></script>

        <script src="{{asset('assets/panel/libs/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/panel/libs/select2/dist/js/select2.min.js')}}"></script>
        <script src="{{asset('assets/panel/js/forms/select2.init.js')}}"></script>

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

          $(document).on('change', "input[name='Clinics[]']", function(){
              let uid = $(this).val();
              let Title = $('label[for='+uid+']').text();
              if ($(this).is(':checked')) {
                  $('.PriceContainer').append(`
                      <div class="row col-9 PriceItem" data-id="${uid}">
                          <div class="col-lg-6">
                            <div class="mb-4">
                              <label for="exampleInputname2" class="form-label">Klinik</label>
                              <input type="text" disabled class="form-control" id="exampleInputname2" value="${Title}">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="mb-4">
                              <label for="exampleInputtext1" class="form-label">Fiyat</label>
                              <div class="input-group">
                                <input type="text" name="${uid}" class="form-control" placeholder="--€" required>
                                <span class="input-group-text px-6 PriceInfo" id="basic-addon1">
                                  <i class="ti ti-help fs-6"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                  `);
              }else {
                $('.PriceItem[data-id='+uid+']').remove();
              }
          });


          $(document).on('click', '.PriceInfo', function(){
              toastr.info('Her Klinik için farklı ücret girilmelidir','{{Lang::get('Base.Failed')}}',{
                positionClass: 'toastr toast-bottom-right',
                containerId: 'toast-bottom-right'
              });
          });

        </script>     
      @endsection
