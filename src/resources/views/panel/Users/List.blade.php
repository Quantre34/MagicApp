@extends('panel.App')

  @section('style')
      <link rel="stylesheet" href="{{asset('assets/panel/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
      <style type="text/css">
        .table>tbody {
            vertical-align: revert-layer;
        }
        .table tbody tr td {
            padding: 5px 0px;
            padding-left: 1%;
        }
        .card button {
          padding: 2px 10px !important;
        }
        .btn {
          padding: 2px 10px !important;
        }
      </style>
  @endsection

  @section('content')

      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Kullanıcılar</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel">Anasayfa</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Kullanıcılar</li>
                </ol>
              </nav>
            </div>
            <div class="d-flex align-items-center justify-content-between gap-6">
<!--               <select class="form-select border fs-3" aria-label="Default select example">
                <option selected>November 2024</option>
                <option value="1">February 2024</option>
                <option value="2">March 2024</option>
                <option value="3">April 2024</option>
              </select> -->
              <!-- <a href="/panel/{{$Type}}/new" class="btn btn-success d-flex align-items-center gap-1 fs-3 py-2 px-9">
                <i class="ti ti-plus fs-4"></i>
                Yeni Ekle
              </a> -->
            </div>
          </div>
          <div class="datatables">

      <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="file_export" class="table w-100 table-bordered display text-nowrap datatable">
                    <thead>
                      <!-- start row -->
                        <tr>
                          <th>Profil</th>
                          <th>İsim/Soyisim</th>
                          <th>Mail</th>
                          <th>Telefon</th>
                          <th>Yönetici</th>
                          <th>Komisyon</th>
                          <th>Durum</th>
                          <th></th>
                        </tr>
                      <!-- end row -->
                    </thead>

                    <tbody>
                      @foreach($Users as $User)
                        <tr>
                          <td> <img style="width: 50px;height: 50px;" src="{{$User['ProfilPic']??'assets/img/profile/Default.png'}}"> </td>
                          <td>{{$User['FirstName']}} {{$User['LastName']}}</td>
                          <td>{{$User['Mail']}}</td>
                          <td>{{$User['Cell']}}</td>
                          <td>{{ !empty($User['Parent']['Title'])? $User['Parent']['Title'] : (!empty($User['Parent']['FirstName'])? $User['Parent']['FirstName'].' '.$User['Parent']['LastName'] : '') }}</td>
                          <td>{{$User['CommissionRate']??'0'}} %</td>
                          <td class="hidden-xs" width="150">
                              <span class="badge  bg-<?=  $User['Status']=='1'? 'success' : 'danger' ?>-subtle text-<?= $User['Status']=='1'? 'success' : 'danger' ?>"><?= $User['Status']=='1'? 'Aktif' : 'Pasif' ?></span>
                          </td>
                          <td>
                            <div class="box">
                               <a href="/panel/{{$Type}}/{{$User['uid']}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                              </a>
                          </div>
                           
                          </td>
                        </tr>
                      @endforeach
                    </tbody>

                  </table>
                </div>
              </div>
            </div>


           </div>
              </div>
            </div>


        @endsection

        @section('script')

            <script src="{{asset('assets/panel/js/vendor.min.js')}}"></script>
            <!-- Import Js Files -->

            <!-- solar icons -->
            <script src="{{asset('assets/panel/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

            <script src="{{asset('assets/panel/js/datatable/datatable-advanced.init.js')}}"></script>
        @endsection
