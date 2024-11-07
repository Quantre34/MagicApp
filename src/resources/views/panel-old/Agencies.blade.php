@extends('panel.app')
  @section('content')
      <main>
        <div class="container">
          <!-- Title and Top Buttons Start -->
          <div class="page-title-container">
            <div class="row g-0">
              <!-- Title Start -->
              <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                  <a href="/panel/" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Panel</span>
                  </a>
                  <h1 class="mb-0 pb-0 display-4" id="title">@Lang('Application.List')</h1>
                </div>
              </div>
              <!-- Title End -->

              <!-- Top Buttons Start -->
              <div class="w-100 d-md-none"></div>
              <div class="col-12 col-sm-6 col-md-auto d-flex align-items-end justify-content-end mb-2 mb-sm-0 order-sm-3">
                <!-- <a id="XmlSendBtn" href="/panel/products/new"><button type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                  <i id="XmlSendIcon" data-acorn-icon="plus"></i>
                  <span>Ürün Ekle</span>
                </button></a> -->
<!--                 <div class="dropdown d-inline-block d-lg-none">
                  <button
                    type="button"
                    class="btn btn-outline-primary btn-icon btn-icon-only ms-1"
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="outside"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i data-acorn-icon="sort"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end custom-sort">
                    <a class="dropdown-item sort" data-sort="name" href="#">Title</a>
                    <a class="dropdown-item sort" data-sort="email" href="#">Stock</a>
                    <a class="dropdown-item sort" data-sort="phone" href="#">Price</a>
                    <a class="dropdown-item sort" data-sort="group" href="#">Status</a>
                  </div>
                </div> -->
                <div class="btn-group ms-1 check-all-container-checkbox-click">
                  <div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" data-target="#checkboxTable">
                    <!-- <span class="form-check float-center">
                      <input type="checkbox" class="form-check-input" id="checkAll" />
                    </span> -->
                    <a href="/panel/Manage/Agencies">
                      <span class="form-check" style="display: flex; justify-content: start; padding-top: 0.4rem;padding-left: 0.4rem;">
                        <h3 style="display: flex; justify-content: start;" >@Lang('ManageAgency.New')</h3>
                      </span>
                    </a>
                  </div>
                  <button
                    type="button"
                    class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-offset="0,3"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  ></button>
                  <div class="dropdown-menu dropdown-menu-end">
                    <button onclick="TriggerApprove();" class="dropdown-item" id="deleteChecked" type="button">@Lang('Application.Activate')</button>
                    <button onclick="TriggerReject();" class="dropdown-item" id="deleteChecked" type="button">@Lang('Application.Passify')</button>
                   
                  </div>
                </div>
              </div>
              <!-- Top Buttons End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

<form callback="javascript:XmlUploaded('{url}');"  id="XmlLoadForm" action="ajax" method="post" target="UploadFile" class="d-none">
  @csrf
  <input onchange="javascript:$('#XmlLoadFormBtn').click();" type="file" name="File">
  <button id="XmlLoadFormBtn" type="submit" ></button>
</form>


          <!-- Controls Start -->
          <div class="row mb-2">
            <!-- Search Start -->
            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
              <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                <input onchange="SearchProduct(this)" class="form-control" placeholder="@Lang('Application.Search')" />
                <span class="search-magnifier-icon">
                  <i data-acorn-icon="search"></i>
                </span>
                <span class="search-delete-icon d-none">
                  <i data-acorn-icon="close"></i>
                </span>
              </div>
            </div>
            <!-- Search End -->

            <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
              <div class="d-inline-block">
                <!-- Print Button Start -->
<!--                 <button
                  class="btn btn-icon btn-icon-only btn-foreground-alternate shadow"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  data-bs-delay="0"
                  title="Print"
                  type="button"
                >
                  <i data-acorn-icon="print"></i>
                </button> -->
                <!-- Print Button End -->

                <!-- Export Dropdown Start -->
<!--                 <div class="d-inline-block">
                  <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                    <span
                      class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown"
                      data-bs-delay="0"
                      data-bs-placement="top"
                      data-bs-toggle="tooltip"
                      title="Export"
                    >
                      <i data-acorn-icon="download"></i>
                    </span>
                  </button>
                  <div class="dropdown-menu shadow dropdown-menu-end">
                    <button class="dropdown-item export-copy" type="button">Copy</button>
                    <button class="dropdown-item export-excel" type="button">Excel</button>
                    <button class="dropdown-item export-cvs" type="button">Cvs</button>
                  </div>
                </div> -->
                <!-- Export Dropdown End -->

                <!-- Length Start -->
<!--                 <div class="dropdown-as-select d-inline-block" data-childSelector="span">
                  <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                    <span
                      class="btn btn-foreground-alternate dropdown-toggle"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      data-bs-delay="0"
                      title="Item Count"
                    >
                      10 Items
                    </span>
                  </button>
                  <div class="dropdown-menu shadow dropdown-menu-end">
                    <a class="dropdown-item" href="#">5 Items</a>
                    <a class="dropdown-item active" href="#">10 Items</a>
                    <a class="dropdown-item" href="#">20 Items</a>
                  </div>
                </div> -->
                <!-- Length End -->
              </div>
            </div>
          </div>
          <!-- Controls End -->

          <div class="row g-0">
            <div class="col-12 mb-5">
              <!-- List Items Start -->
              <div id="checkboxTable">
                <form id="ProductForm" action="ajax" method="POST" target="">
                @csrf
<!--                 <div class="mb-4 mb-lg-3 bg-transparent no-shadow d-none d-lg-block">
                  <div class="row g-0">
                    <div class="col-auto sw-11 d-none d-lg-flex"></div>
                    <div class="col">
                      <div class="ps-5 pe-4 h-100">
                        <div class="row g-0 h-100 align-content-center custom-sort">
                          <div class="col-lg-4 d-flex flex-column mb-lg-0 pe-3 d-flex">
                            <div class="text-muted text-small cursor-pointer sort" data-sort="name">Başlık</div>
                          </div>
                          <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                            <div class="text-muted text-small cursor-pointer sort" data-sort="email">Stok</div>
                          </div>
                          <div class="col-lg-3 d-flex flex-column pe-1 justify-content-center">
                            <div class="text-muted text-small cursor-pointer sort" data-sort="phone">Fiyat</div>
                          </div>
                          <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                            <div class="text-muted text-small cursor-pointer sort" data-sort="group">Durum</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

                <!-- Items Container Start -->
                <div class="ProductContainer">

                </div>

                <!-- Items Container Start -->

                <!-- List Items End -->
                </form>
              </div>
            </div>
            <!-- Items Pagination Start -->
<!--             <div class="w-100 d-flex justify-content-center">
              <nav>
                <ul class="pagination">
                  <li class="page-item ">
                    <a id="Paginate-Prev" class="page-link shadow" href="#" tabindex="-1" aria-disabled="true">
                      <i data-acorn-icon="chevron-left"></i>
                    </a>
                  </li>
                  <div class="Paginatelist d-flex">

                  </div>
                  
                  <li class="page-item">
                    <a id="Paginate-Next" class="page-link shadow" href="#">
                      <i data-acorn-icon="chevron-right"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div> -->
            <!-- Items Pagination End -->
          </div>
        </div>
      </main>
  @endsection
  @section('script')
    <!-- Page Specific Scripts Start -->
    <script src="{{asset('assets/panel/js/cs/checkall.js')}}"></script>
    <script src="{{asset('assets/panel/js/pages/products.list.js')}}"></script>
    <!-- Page Specific Scripts End -->
    <script type="text/javascript">

      function TriggerApprove(){
        $('#ProductForm').attr('target','ActivateAgencies');$('#ProductForm').trigger('submit');
      }
      function TriggerReject(){
        $('#ProductForm').attr('target','PassifyAgencies');$('#ProductForm').trigger('submit');
      }


    function GetAgencies(){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetAgencies'
          },
          success: function(data){
            if (data['outcome']) {
                $('.ProductContainer').empty();
                Object.entries(data['data']).forEach( Item => {
                  console.log(Item);
                    const [key, value] = Item;
                    Item = value;
                    // $('.ApplicationList').append('<div onclick="SetApplicationInfo(\''+value['Id']+'\')" style="border:  1px solid '+((value['Status']=='1')? 'green': 'red')+'; border-radius: 30px; " class="mb-4"><div  class="text-primary mb-1">'+value['FullName']+'</div><div>'+value['Mail']+'</div><div class="text-muted">'+value['Cell']+'</div><div class="text-muted">Country Code: '+value['CountryCode']+'</div><div class="text-muted">'+((value['Status']=='1')? '@Lang('ManageAgency.Active')': '@Lang('ManageAgency.Passive')')+'</div></div>');
                    $('.ProductContainer').append(`<div class="card mb-2 Product-Item" style="border: 1px solid" title="${Item['Title']} ${Item['Mail']}">
                          <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <div class="col py-4 py-lg-0">
                              <div class="ps-5 pe-4 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                  <a
                                    href="/panel/Manage/Agencies?Agency=${Item['uid']}"
                                    class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                   ${Item['Title']}
                                  </a>
                                  <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                    <div class="lh-1 text-alternate">${Item['Mail']}</div>
                                  </div>
                                  <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                    <div class="lh-1 text-alternate">${Item['Tell']}</div>
                                  </div>
                                  <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                    <span class="badge bg-outline-${(Item['Status']=='1'?'success': 'danger')} group">${((Item['Status']=='1')? '@Lang('ManageUser.Active')': '@Lang('ManageUser.Passive')')}</span>
                                  </div>
                                  <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                    <label class="form-check mt-2">
                                      <input value="${Item['uid']}" name="Agencies[]" type="checkbox" class="form-check-input pe-none" />
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>`);
                });
                if ($('input[name=DefaultUser]').is(':checked')) {
                    $('input[name=DefaultUser]').clicked();
                }
                $('input[name=DefaultUser]').change();
            }
            console.log(data);
          }
        });
    }
      // function GetProducts(Page=0){
      //     HoldOn.open(options);
      //     $.ajax({
      //         type: 'POST',
      //         url: '/ajax',
      //         headers: {
      //           'X-CSRF-TOKEN': @json(csrf_token()),
      //         },
      //         data: {
      //             action: 'GetAllProducts',
      //             Page: Page
      //         },
      //         success: function(data){
      //             HoldOn.close();
      //             if (data['outcome']) {
      //                 let $data = data['data'];
      //                 let Container = $('.ProductContainer');
      //                 let PaginateList = $('.Paginatelist');
      //                 Container.empty();
      //                 PaginateList.empty();
      //                 $data.forEach(function(Item){
      //                   Container.append(`<div class="card mb-2 Product-Item" title="${Item['Title']}">
      //                     <div class="row g-0 h-100 sh-lg-9 position-relative">
      //                       <a href="/panel/products/${Item['uid']}" class="col-auto position-relative">
      //                         <img src="${JSON.parse(Item['Img'])[0]}" alt="product" class="card-img card-img-horizontal sw-11 h-100" />
      //                       </a>
      //                       <div class="col py-4 py-lg-0">
      //                         <div class="ps-5 pe-4 h-100">
      //                           <div class="row g-0 h-100 align-content-center">
      //                             <a
      //                               href="/panel/products/${Item['uid']}"
      //                               class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
      //                              ${Item['Title']}
      //                               <div class="text-small text-muted text-truncate position">#${Item['Type']}</div>
      //                             </a>
      //                             <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
      //                               <div class="lh-1 text-alternate">${Item['Stock']}</div>
      //                             </div>
      //                             <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
      //                               <div class="lh-1 text-alternate">${Item['Cost']} TL</div>
      //                             </div>
      //                             <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
      //                               <span class="badge bg-outline-success group">Aktif</span>
      //                             </div>
      //                             <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
      //                               <label class="form-check mt-2">
      //                                 <input value="${Item['uid']}" name="Products[]" type="checkbox" class="form-check-input pe-none" />
      //                               </label>
      //                             </div>
      //                           </div>
      //                         </div>
      //                       </div>
      //                     </div>
      //                   </div>`);
      //                 });
      //                 Object.values(data['Pages']).forEach(function(Item){
      //                     console.log(Item);
      //                     PaginateList.append(`<li class="page-item ${ (Page==Item)? 'active' : '' }"><a class="page-link shadow" href="javascript:GetProducts(${Item})">${Item}</a></li>`);
      //                 });
      //                 $('#Paginate-Prev').parent('li').removeClass('disabled');
      //                 $('#Paginate-Next').parent('li').removeClass('disabled');
      //                 if (Page == 0) {
      //                     $('#Paginate-Prev').parent('li').addClass('disabled');
      //                 }
      //                 if( Page >= (data['Pages'][ data['Pages'].length -1 ]) ){
      //                     $('#Paginate-Next').parent('li').addClass('disabled');
      //                 }
      //                 $('#Paginate-Prev').attr('href', `javascript:GetProducts(${Page-1})` );
      //                 $('#Paginate-Next').attr('href', `javascript:GetProducts(${Page+1})` );
      //             }
      //         }
      //     });
      // }

      $(document).ready(function(){
        GetAgencies();
      });

      function SearchProduct(e){
          let val = $(e).val();
          $('.Product-Item').fadeOut('fast');
          $('.Product-Item').each(function(){
              if(($(this).attr('title').toLowerCase()).includes(val.toLowerCase())){
                  $(this).fadeIn('slow');
              }
          });
      }

    </script>
  @endsection
