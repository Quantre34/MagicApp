@extends('panel.App') 
  
  @section('style')
    <link rel="stylesheet" href="{{URL::asset('assets/css/vendor/quill.bubble.css')}}" />
  @endsection

  @section('content')
      <div class="body-wrapper">
        <div class="container-fluid">

          <div class="card overflow-hidden chat-application">
            <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
              <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                <i class="ti ti-menu-2 fs-5"></i>
              </button>
              <form class="position-relative w-100">
                <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact" />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
            <div class="d-flex">
              <div class="w-30 d-none d-lg-block border-end user-chat-box">
                <div class="px-4 pt-9 pb-6">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                      <div class="position-relative">
                        <img src="assets/panel/images/profile/user-1.jpg" alt="user1" width="54" height="54" class="rounded-circle" />
                        <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                          <span class="visually-hidden">New alerts</span>
                        </span>
                      </div>
                      <div class="ms-3">
                        <h6 class="fw-semibold mb-2">{{User('FirstName')}} {{User('LastName')}}</h6>
                        <p class="mb-0 fs-2">{{User('Type')!='0'? 'Yönetici' : 'Görevli' }}</p>
                      </div>
                    </div>
                    <div class="dropdown">
                      <a class="text-dark fs-6 nav-icon-hover" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2 border-bottom" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-settings fs-4"></i>
                            </span>Setting
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-help fs-4"></i>
                            </span>Help
                            and feedback
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-layout-board-split fs-4"></i>
                            </span>Enable split View mode
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2 border-bottom" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-table-shortcut fs-4"></i>
                            </span>Keyboard
                            shortcut
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-login fs-4"></i>
                            </span>Sign
                            Out
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <form class="position-relative mb-4">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact" />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                  </form>
                  <div class="dropdown">
                    <a class="text-muted fw-semibold d-flex align-items-center" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Recent Chats<i class="ti ti-chevron-down ms-1 fs-5"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Sort by time</a>
                      </li>
                      <li>
                        <a class="dropdown-item border-bottom" href="javascript:void(0)">Sort by Unread</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Hide favourites</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="app-chat">
                  <ul id="ChatContainer" class="chat-users mb-0 mh-n100" data-simplebar >
                    @foreach($Chats as $Chat)
                    <li title="{{$Chat['Title']}}" user="{{$Chat['User']['FirstName']??'Silindi'}} {{$Chat['User']['LastName']??''}}" onclick="javascript:GetMessages('{{$Chat['uid']}}');" class=" {{($Chat['Pulse'] ?? false)? 'pulse' : ''}}" >
                      <a  class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user bg-light-subtle" id="chat_user_1" data-user-id="1">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-3.jpg" alt="user1" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              {{$Chat['User']['FirstName']}} {{$Chat['User']['LastName']}}
                            </h6>
                            <span class="fs-3 text-truncate text-body-color d-block">{{ strip_tags( substr($Chat['Title'], 0,30))  }}.</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">15 mins</p>
                      </a>
                    </li>
                    @endforeach


<!--                     <li>
                      <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user" id="chat_user_2" data-user-id="2">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-2.jpg" alt="user-2" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-danger">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              Bianca Anderson
                            </h6>
                            <span class="fs-3 text-truncate text-dark fw-semibold d-block">Nice looking dress
                              you...</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">30 mins</p>
                      </a>
                    </li>  -->


                    
                  </ul>
                </div>
              </div>
              <div class="w-70 w-xs-100 chat-container">
                <div class="chat-box-inner-part h-100">
                  <div class="chat-not-selected h-100 d-none">
                    <div class="d-flex align-items-center justify-content-center h-100 p-5">
                      <div class="text-center">
                        <span class="text-primary">
                          <i class="ti ti-message-dots fs-10"></i>
                        </span>
                        <h6 class="mt-2">Open chat from the list</h6>
                      </div>
                    </div>
                  </div>
                  <div class="chatting-box d-block">
                    <div class="p-9 border-bottom chat-meta-user d-flex align-items-center justify-content-between">
                      <div class="hstack gap-3 current-chat-user-name">
                        <div class="position-relative">
                          <img src="assets/panel/images/profile/user-3.jpg" alt="user1" width="48" height="48" class="rounded-circle" />
                          <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                            <span class="visually-hidden">New alerts</span>
                          </span>
                        </div>
                        <div>
                          <h6 class="mb-1 name fw-semibold"></h6>
                          <p class="mb-0 Title">Destek</p>
                        </div>
                      </div>
                      <ul class="list-unstyled mb-0 d-flex align-items-center">
                        <li>
                          <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                            <i class="ti ti-phone"></i>
                          </a>
                        </li>
                        <li>
                          <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                            <i class="ti ti-video"></i>
                          </a>
                        </li>
                        <li>
                          <a class="chat-menu text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="d-flex parent-chat-box">
                      <div class="chat-box w-xs-100">
                        <div class="chat-box-inner p-9" data-simplebar>
                          <div class="chat-list chat active-chat " id="MessageContainer" data-user-id="1">
                            
                              <!-- Message Content -->


                          </div>

                        </div>
                        <div class="px-9 py-6 border-top chat-send-message-footer">
                          
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2 w-85">
                              <form id="MessageForm" action="ajax" target="SendMessage" method="POST">      
                                <input type="hidden" name="Title" value="New Message">                      
                                <a class="position-relative nav-icon-hover z-index-5" href="javascript:void(0)">
                                  <i class="ti ti-mood-smile text-dark bg-hover-primary fs-7"></i>
                                </a>
                                <input name="Content" type="text" class="form-control message-type-box text-muted border-0 rounded-0 p-0 ms-2" placeholder="Type a Message" fdprocessedid="0p3op" />
                                <button type="submit" id="SendBtn" class="d-none"></button>
                              </form>
                            </div>
                            <ul class="list-unstyledn mb-0 d-flex align-items-center">

                              <li>
                                <form id="FileUploadForm"  action="ajax" method="POST" target="UploadFile" >
                                  <input onchange="javascript: $(this).parent('form').submit();" hidden name="File" class="result form-control" type="File" id="File" >
                                  <a onclick="javascript:$('#File').click();return false;" type="text " class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5">
                                      <i class="ti ti-paperclip"></i>
                                  </a>
                                </form>
                              </li>

                              <li>
                                <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:$('#SubmitBtn').trigger('click')">
                                  <i class="ti ti-send"></i>
                                </a>
                              </li> 
                            </ul>
                          </div>
                          
                        </div>
                      </div>
                      <div class="app-chat-offcanvas border-start">
                        <div class="custom-app-scroll mh-n100" data-simplebar>
                          <div class="p-3 d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold mb-0 text-nowrap">
                              Media <!-- <span class="text-muted">(36)</span> -->
                            </h6>
                            <a class="chat-menu d-lg-none d-block text-dark fs-6 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                              <i class="ti ti-x"></i>
                            </a>
                          </div>
                          <div class="offcanvas-body p-9">

                            <div class="files-chat">
                              <div class="FileContainer">
                                  <!-- File Content --> 
                              </div>
                              

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="offcanvas offcanvas-start user-chat-box chat-offcanvas" tabindex="-1" id="chat-sidebar" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                    Chats
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="px-4 pt-9 pb-6">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                      <div class="position-relative">
                        <img src="assets/panel/images/profile/user-1.jpg" alt="user1" width="54" height="54" class="rounded-circle" />
                        <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                          <span class="visually-hidden">New alerts</span>
                        </span>
                      </div>
                      <div class="ms-3">
                        <h6 class="fw-semibold mb-2">Markarn Doe</h6>
                        <p class="mb-0 fs-2">Designer</p>
                      </div>
                    </div>
                    <div class="dropdown">
                      <a class="text-dark fs-6 nav-icon-hover" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2 border-bottom" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-settings fs-4"></i>
                            </span>Setting
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-help fs-4"></i>
                            </span>Help
                            and feedback
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-layout-board-split fs-4"></i>
                            </span>Enable split View mode
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2 border-bottom" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-table-shortcut fs-4"></i>
                            </span>Keyboard
                            shortcut
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item d-flex align-items-center gap-2" href="javascript:void(0)">
                            <span>
                              <i class="ti ti-login fs-4"></i>
                            </span>Sign
                            Out
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <form class="position-relative mb-4">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact" />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                  </form>
                  <div class="dropdown">
                    <a class="text-muted fw-semibold d-flex align-items-center" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Recent Chats<i class="ti ti-chevron-down ms-1 fs-5"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Sort by time</a>
                      </li>
                      <li>
                        <a class="dropdown-item border-bottom" href="javascript:void(0)">Sort by Unread</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Hide favourites</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="app-chat">
                  <ul class="chat-users mh-n100" data-simplebar>
                    <li>
                      <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user bg-light-subtle" id="chat_user_1" data-user-id="1">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-2.jpg" alt="user1" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              Michell Flintoff
                            </h6>
                            <span class="fs-3 text-truncate text-body-color d-block">You: Yesterdy was great...</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">15 mins</p>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user" id="chat_user_2" data-user-id="2">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-2.jpg" alt="user-2" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-danger">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              Bianca Anderson
                            </h6>
                            <span class="fs-3 text-truncate text-dark fw-semibold d-block">Nice looking dress
                              you...</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">30 mins</p>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user" id="chat_user_3" data-user-id="3">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-8.jpg" alt="user-8" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-warning">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              Andrew Johnson
                            </h6>
                            <span class="fs-3 text-truncate text-body-color d-block">Sent a photo</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">2 hrs</p>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user" id="chat_user_4" data-user-id="4">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-4.jpg" alt="user-4" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              Daisy Wilson
                            </h6>
                            <span class="fs-3 text-truncate text-body-color d-block">Lorem ispusm text sud...</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">5 days</p>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user" id="chat_user_5" data-user-id="5">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-7.jpg" alt="user1" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              Mark, Stoinus & Rishvi..
                            </h6>
                            <span class="fs-3 text-truncate text-dark fw-semibold d-block">Lorem ispusm text ...</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">5 days</p>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user" id="chat_user_2" data-user-id="2">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-2.jpg" alt="user-2" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-danger">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              Bianca Anderson
                            </h6>
                            <span class="fs-3 text-truncate text-dark fw-semibold d-block">Nice looking dress
                              you...</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">30 mins</p>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user" id="chat_user_3" data-user-id="3">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-8.jpg" alt="user-8" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-warning">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              Andrew Johnson
                            </h6>
                            <span class="fs-3 text-truncate text-body-color d-block">Sent a photo</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">2 hrs</p>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endsection 

      @section('script')
      <script type="text/javascript">
        function FileUploaded(url){
            arr = url.split('/');
            $('#MessageForm').append('<input hidden type="text" value="'+url+'" name="Attachments[]">');
            $('.FileContainer').append(`<a href="javascript:void(0)" class="hstack gap-3 file-chat-hover justify-content-between text-nowrap mb-9">
                                  <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-1 text-bg-light p-6">
                                      <img src="assets/panel/images/chat/icon-adobe.svg" alt="monster-img" width="24" height="24" />
                                    </div>
                                    <div>
                                      <h6 class="fw-semibold">
                                        ${arr[arr.length-1]}
                                      </h6>
                                      <div class="d-flex align-items-center gap-3 fs-2 text-muted">
                                        <!-- <span>2 MB</span>
                                        <span>2 Dec 2023</span> -->
                                      </div>
                                    </div>
                                  </div>
                                  <span class="position-relative nav-icon-hover download-file">
                                    <i  onclick="javascript:window.location='${url}'" class="ti ti-download text-dark fs-6 bg-hover-primary"></i>
                                  </span>
                                </a> `);
        }
      </script>
      <script type="text/javascript">
      function GetMessages(uid){
             $.ajax({
                  type: 'POST',
                  url: '/ajax',
                  cache: false,
                  headers: {
                    'X-CSRF-TOKEN': @json(csrf_token())
                  },
                  data: {
                    action: 'GetMessages',
                    uid: uid
                  },
                  success: function(data){
                    var Container = $('#MessageContainer');
                    var Messages = data['data'];
                    var Type;
                    Container.empty();
                    $('.FileContainer').empty();
                    $('#MessageForm input[name=ChatId]').val(uid);
                    $('#MessageForm input[name=Title]').val(data['Chat']['Title']);
                    $('#MessageForm input[name=Title]').attr('disabled','disabled');
                    $('#MessageForm').append('<input type="text" hidden name="ChatId" value="'+data['Chat']['uid']+'">');
                    Messages.forEach(function(Item){
                      if(Item['User']['Type']=='2'){
                          Type = '{{Lang::get('Consult.Admin')}}';
                      }else if (Item['User']['Type']=='1'){
                        Type = '{{Lang::get('Consult.Manager')}}';
                      }else {
                        Type = '{{Lang::get('Consult.Agent')}}';
                      }
                      Item['Attachments'].forEach(function(File){
                          $('.FileContainer').append(`<a href="javascript:void(0)" class="hstack gap-3 file-chat-hover justify-content-between text-nowrap mb-9">
                                  <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-1 text-bg-light p-6">
                                      <img src="assets/panel/images/chat/icon-adobe.svg" alt="monster-img" width="24" height="24" />
                                    </div>
                                    <div>
                                      <h6 class="fw-semibold">
                                        ${File['name']}
                                      </h6>
                                      <div class="d-flex align-items-center gap-3 fs-2 text-muted">
                                        <!-- <span>2 MB</span>
                                        <span>2 Dec 2023</span> -->
                                      </div>
                                    </div>
                                  </div>
                                  <span class="position-relative nav-icon-hover download-file">
                                    <i  onclick="javascript:window.location='/assets/upload/'${File['name']}''" class="ti ti-download text-dark fs-6 bg-hover-primary"></i>
                                  </span>
                                </a> `);
                      });
                        Container.append(`<div class="hstack gap-3 align-items-start mb-7 justify-content-${Item['User']['uid']=='{{User('uid')}}'? 'end' : 'start'}">
                              <img src="assets/panel/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                              <div ${Item['User']['uid']=='{{User('uid')}}'? ' text-end' : ''}>
                                <h6 class="fs-2 text-muted ">
                                  ${Item['User']['FirstName']} ${Item['User']['LastName']}, ${Item['create_at']}
                                </h6>
                                <div class="p-2 ${Item['User']['uid']=='{{User('uid')}}'? 'bg-info-subtle' : 'text-bg-light'}  rounded-1 d-inline-block text-dark fs-3">
                                  ${Item['Content']}
                                </div>
                              </div>
                            </div>`);
                    });
                  },
                });
          }

      </script>
       <!-- Page Specific Scripts Start -->
  <script src="{{URL::asset('assets/js/vendor/quill.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/vendor/quill.active.js')}}"></script>

  <!-- Page Specific Scripts End -->
  <script type="text/javascript">
    // $(document).ready(function(){
    //     GetMessages('{{@$Chats[0]['uid']}}');
    // });
          function GetChats(){
            $.ajax({
              type: 'POST',
              url: '/ajax',
              headers: {'X-CSRF-TOKEN': @json(csrf_token())},
              data : {
                action: 'GetChats'
              },
              cache: false,
              success: function(data){
                if (data['outcome']) {
                    var Container = $('#ChatContainer');
                    Container.empty();
                    data['data'].forEach((Item)=>{
                      // Container.append('<div onclick="javascript:GetMessages(\''+Item['uid']+'\');" class=" '+((Item['Pulse'])? 'Pulse': '')+' col-auto col-xl-12"><div class="card active hover-border-primary"><div class="card-body"><div class="row g-0 sh-6"><div class="col-auto"><img src="'+(Item['User']['ProfilPic'] ?? '/assets/upload/Default.png')+'" class="card-img rounded-xl sh-6 sw-6 no-delay" data-bs-delay="0" alt="thumb" data-bs-toggle="tooltip" data-bs-placement="bottom" title="'+Item['User']['FirstName']+' '+Item['User']['LastName']+'"/></div><div class="col d-none d-xl-block"><div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between"><div class="d-flex flex-column"><a href="#" class="body-link">'+Item['Title']+'</a><div class="text-small text-muted">'+Item['User']['FirstName']+' '+Item['User']['LastName']+'</div><div class="text-small text-muted">'+((Item['User']['Type']=='2')? '{{Lang::get('Consult.Admin')}}' : ((Item['User']['Type']=='1')? '{{Lang::get('Consult.Manager')}}' : '{{Lang::get('Consult.Agent')}}'))  +'</div></div></div></div></div></div></div></div>');
                      Container.append(`<li onclick="javascript:GetMessages('${Item['uid']}');" title="${Item['Title']}" user="${Item['User']['FirstName']} ${Item['User']['FirstName']}"  class=" ${((Item['Pulse'])? 'Pulse': '')}" >
                      <a  class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user bg-light-subtle" id="chat_user_1" data-user-id="1">
                        <div class="d-flex align-items-center">
                          <span class="position-relative">
                            <img src="assets/panel/images/profile/user-3.jpg" alt="user1" width="48" height="48" class="rounded-circle" />
                            <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </span>
                          <div class="ms-3 d-inline-block w-75">
                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                              ${Item['User']['FirstName']} ${Item['User']['FirstName']}
                            </h6>
                            <span class="fs-3 text-truncate text-body-color d-block">${Item['Title'].length > 15? customReplace(Item['Title'],0,15) : Item['Title'] }</span>
                          </div>
                        </div>
                        <p class="fs-2 mb-0 text-muted">15 mins</p>
                      </a>
                    </li>`);
                    });
                }
              }
            });
          }
  </script>