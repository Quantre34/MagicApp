@extends('panel.App')

	@section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Tedavi Listesi</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Tedaviler</li>
                </ol>
              </nav>
            </div>
            <div class="d-flex align-items-center justify-content-between gap-6">
              <!-- <select class="form-select border fs-3" aria-label="Default select example">
                <option selected>November 2024</option>
                <option value="1">February 2024</option>
                <option value="2">March 2024</option>
                <option value="3">April 2024</option>
              </select> -->
              <!-- <button class="btn btn-success d-flex align-items-center gap-1 fs-3 py-2 px-9">
                <i class="ti ti-plus fs-4"></i>
                Create
              </button> -->
            </div>
          </div>
          <div class="product-list">
            <div class="card">
              <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center gap-6 mb-9">
                  <form class="position-relative">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="searchTreatment" placeholder="Tedavi Ara">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                  </form>
                  <!-- <a class="fs-6 text-muted" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Filter list">
                    <i class="ti ti-filter"></i>
                  </a> -->
                </div>
                <div class="table-responsive border rounded">
                  <table class="table align-middle text-nowrap mb-0">
                    <thead>
                      <tr>
                        <th scope="col">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                          </div>
                        </th>
                        <th scope="col">Products</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                    	@foreach($Treatments as $Treatment)
	                      <tr data-title="{{$Treatment['Title']}}" class="Treatment">
	                        <td>
	                          <div class="form-check mb-0">
	                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
	                          </div>
	                        </td>
	                        <td>
	                          <div class="d-flex align-items-center">
	                            <img src="{{$Treatment['Img']}}" class="rounded-circle" alt="monster-img" width="56" height="56">
	                            <div class="ms-3">
	                              <h6 class="fw-semibold mb-0 fs-4">{{$Treatment['Title']}}</h6>
	                              <p class="mb-0">{{$Treatment['Category']['Title']}}</p>
	                            </div>
	                          </div>
	                        </td>
	                        <td>
	                          <p class="mb-0">{{$Treatment['create_at']}}</p>
	                        </td>
	                        <td>
	                          <div class="d-flex align-items-center">
	                            <span class="text-bg-{{$Treatment['Status']=='1'? 'success' : 'danger'}} p-1 rounded-circle"></span>
	                            <p class="mb-0 ms-2">{{$Treatment['Status']=='1'? 'Aktif' : 'Pasif'}}</p>
	                          </div>
	                        </td>
	                        <td>
	                          <h6 class="mb-0 fs-4">€{{$Treatment['Cost']}}</h6>
	                        </td>
	                        <td>
	                          <a class="fs-6 text-muted" href="panel/services/{{$Treatment['uid']}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail">
                              <iconify-icon icon="material-symbols:model-training-outline-rounded"></iconify-icon>
	                          </a>
	                        </td>
	                      </tr>
	                    @endforeach


                    </tbody>
                  </table>
                  <div class="d-flex align-items-center justify-content-end py-1">
                    <p class="mb-0 fs-2">Rows per page:</p>
                    <select class="form-select w-auto ms-0 ms-sm-2 me-8 me-sm-4 py-1 pe-7 ps-2 border-0" aria-label="Default select example">
                      <option selected>5</option>
                      <option value="1">10</option>
                      <option value="2">25</option>
                    </select>
                    <p class="mb-0 fs-2">1–5 of 12</p>
                    <nav aria-label="...">
                      <ul class="pagination justify-content-center mb-0 ms-8 ms-sm-9">
                        <li class="page-item p-1">
                          <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center" href="javascript:void(0)">
                            <i class="ti ti-chevron-left"></i>
                          </a>
                        </li>
                        <li class="page-item p-1">
                          <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center" href="javascript:void(0)">
                            <i class="ti ti-chevron-right"></i>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
	@endsection
	@section('script')
	<script type="text/javascript">
		$(document).on('change','#searchTreatment', function(){
	        $('.Treatment').fadeOut('fast');
	        if($(this).val()==''){
	          $('.Treatment').fadeIn('slow');
	        }else {
	          $('.Treatment').each((index,item)=>{
	              if($(item).data('title').toLowerCase().includes($(this).val().toLowerCase())){
	                  $(item).fadeIn('slow');
	              }
	          });
	        }
	        $('.ContainerTitle').text($(this).data('title'));
	    });
	</script>
	@endsection