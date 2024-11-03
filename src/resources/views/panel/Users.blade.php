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
                  <a href="/panel/Manage/Users">
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
                    <button onclick="TriggerDel();" class="dropdown-item" id="deleteChecked" type="button">@Lang('Application.Delete')</button>
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
              <div id="checkboxTable container-fluid">
                <form id="ProductForm" action="ajax" method="POST" target="">
                @csrf
                <table class="datatable table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Mail</th>
                        <th>Cell</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="ProductContainer">


                  </tbody>
                </table>

                <!-- Items Container Start -->
                

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
      function TriggerDel(){
        $('#ProductForm').attr('target','DelUsers');$('#ProductForm').trigger('submit');
      }
      function TriggerApprove(){
        $('#ProductForm').attr('target','ActivateUsers');$('#ProductForm').trigger('submit');
      }
      function TriggerReject(){
        $('#ProductForm').attr('target','PassifyUsers');$('#ProductForm').trigger('submit');
      }


    function GetUsers(){
        $.ajax({
          type: 'POST',
          url: '/ajax',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': @json(csrf_token())
          },
          data: {
            action: 'GetUsers'
          },
          success: function(data){
            if (data['outcome']) {
                $('.ProductContainer').empty();
                Object.entries(data['data']).forEach( Item => {
                  console.log(Item);
                    const [key, value] = Item;
                    Item = value;
                    $('.ProductContainer').append(`<tr class="Product-Item" style="color:${Item['Type']=='2'? 'red' : (Item['Type']=='1'? 'green' : 'yellow') }!important" title="${Item['FirstName']} ${Item['LastName']}"  >
                    <td>
                    <a href="/panel/Manage/Users?User=${Item['uid']}"
                        class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                       ${Item['FirstName']}  ${Item['LastName']} 
                      </a>
                    </td>
                    <td>${Item['Mail']}</td>
                    <td>${Item['Cell']}</td>
                    <td><span class="badge bg-outline-${(Item['Status']=='1'?'success': 'danger')} group">${((Item['Status']=='1')? '@Lang('ManageUser.Active')': '@Lang('ManageUser.Passive')')}</span></td>
                    <td><label class="form-check mt-2">
                                      <input value="${Item['uid']}" name="Users[]" type="checkbox" class="form-check-input pe-none" />
                                    </label></td>
                  </tr>`);
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

      $(document).ready(function(){
        GetUsers();
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

<!-- <div class="card mb-2 Product-Item" style="border: 1px solid ${Item['Type']=='2'? 'Red' : (Item['Type']=='1'? 'green' : 'yellow') }" title="${Item['FirstName']} ${Item['LastName']}">
                          <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <div class="col py-4 py-lg-0">
                              <div class="ps-5 pe-4 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                  <a
                                    href="/panel/Manage/Users?User=${Item['uid']}"
                                    class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                   ${Item['FirstName']}  ${Item['LastName']} 
                                  </a>
                                  <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                    <div class="lh-1 text-alternate">${Item['Mail']}</div>
                                  </div>
                                  <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                    <div class="lh-1 text-alternate">${Item['Cell']}</div>
                                  </div>
                                  <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                    <span class="badge bg-outline-${(Item['Status']=='1'?'success': 'danger')} group">${((Item['Status']=='1')? '@Lang('ManageUser.Active')': '@Lang('ManageUser.Passive')')}</span>
                                  </div>
                                  <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                    <label class="form-check mt-2">
                                      <input value="${Item['uid']}" name="Users[]" type="checkbox" class="form-check-input pe-none" />
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> -->



