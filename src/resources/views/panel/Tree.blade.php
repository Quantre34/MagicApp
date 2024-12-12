@extends('panel.App')
  @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">{{ Lang::get('AdminDashboard.Operation') }}</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/panel">{{ Lang::get('AdminDashboard.Panel') }}</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{Lang::get('AdminDashboard.Operation')}}</li>
                </ol>
              </nav>
            </div>
            <
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">{{Lang::get('Base.Schema')}}</h4>
                </div>
                <div class="card-body">
                  <div class="myadmin-dd dd" id="nestable">
                    <ol class="dd-list">
                      <li class="dd-item" data-id="1">
                        <div class="dd-handle">{{Lang::get('Base.Me')}}</div>
                      </li>
                      <ol class="dd-list">                        
                        @foreach($SubManagers as $Manager)
                            <li class="dd-item" data-id="{{$Manager['Id']}}">
                                <div class="dd-handle">{{$Manager['FirstName']}} {{$Manager['LastName']}}</div>
                                <ol class="dd-list">
                                    @foreach($Manager['SubManagers'] as $Manager1)
                                        <li class="dd-item"  data-id="{{$Manager1['Id']}}">
                                          <div class="dd-handle">{{$Manager1['FirstName']}} {{$Manager1['LastName']}}</div></li>
                                            <ol class="dd-list">
                                            @foreach($Manager1['Agencies'] as $Agency)
                                                     <li class="dd-item" data-id="{{$Agency['Id']}}">
                                                        <div class="dd-handle">{{$Agency['Title']}}</div>
                                                            <ol class="dd-list">
                                                                    @foreach($Agency['Users'] ?? [] as $User)
                                                                        <li class="dd-item" data-id="{{$User['Id']}}">
                                                                          <div class="dd-handle">{{$User['FirstName']}} {{$User['LastName']}}</div>
                                                                            <ol class="dd-list">
                                                                                @foreach($User['Appointments'] as $Appointment)
                                                                                    <li class="dd-item">
                                                                                      <div class="dd-handle"><a href="/panel/Appointments/{{$Appointment['uid']}}">{{$Appointment['uid']}}</a>
                                                                                      </div></li>
                                                                                @endforeach
                                                                            </ol>
                                                                        </li>
                                                                    @endforeach
                                                            </ol>
                                                        </li>
                                            @endforeach
                                            </ol>
                                    @endforeach
                                    <li class="dd-item">
                                        @foreach($Manager['Agencies'] as $Agency)
                                            <ol class="dd-list">
                                                <li class="dd-item">
                                                  <div class="dd-handle">{{$Agency['Title']}}</div>
                                                    <ol class="dd-list">
                                                            <ol class="dd-list">
                                                            @foreach($Agency['Users'] ?? [] as $User)
                                                                <li class="dd-item" data-id="{{$User['Id']}}">
                                                                    <div class="dd-handle">{{$User['FirstName']}} {{$User['LastName']}}</div>
                                                                    <ol class="dd-list">
                                                                        @foreach($User['Appointments'] as $Appointment)
                                                                            <li class="dd-item"> <div class="dd-handle"><a href="/panel/Appointments/{{$Appointment['uid']}}">{{$Appointment['uid']}}</a>
                                                                            </div></li>
                                                                        @endforeach
                                                                    </ol>
                                                                </li>
                                                            @endforeach
                                                            </ol>
                                                        
                                                    </ol>
                                                </li>
                                            </ol>
                                        @endforeach
                                    </li>
                                </ol>
                            </li>
                        @endforeach
                        @foreach($Agencies as $Agency)
                            <li class="dd-item" data-id="{{$Agency['Id']}}">{{$Agency['Title']}}
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="{{$Agency['Id']}}"><div class="dd-handle">Agents</div>
                                        <ol class="dd-list">
                                        @foreach($Agency['Users'] ?? [] as $User)
                                            <li class="dd-item" data-id="{{$User['Id']}}">{{$User['FirstName']}} {{$User['LastName']}}
                                                <ol class="dd-list">
                                                    @foreach($User['Appointments'] as $Appointment)
                                                        <li class="dd-item" data-id="{{$Appointment['Id']}}"><a href="/panel/Appointments/{{$Appointment['uid']}}">{{$Appointment['uid']}}</li></a>
                                                    @endforeach
                                                </ol>
                                            </li>
                                        @endforeach
                                        </ol>
                                    </li>
                                </ol>
                            </li>
                        @endforeach
                          </ol>




                    </ol>
                  </div>
                </div>
              </div>
            </div>


            
          </div>
        </div>
      </div>
      @endsection
      @section('script')
        <script src="assets/panel/libs/nestable/jquery.nestable.js"></script>
        <script src="assets/panel/js/plugins/nestable-init.js"></script>
      @endsection