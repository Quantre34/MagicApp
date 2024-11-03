<style type="text/css">
       .menu-container .label, .user-container .name {
    font-family: var(--font-heading);
    font-size: 14px;
}
</style>

      <div id="nav" class="nav-container d-flex">
        <div class="nav-content d-flex">
          <!-- Logo Start -->
          <div style="width: 100%! important;" class="logo position-relative ">
            <a href="/panel">
              <!-- Logo can be added directly -->
              <!-- <img src="{{URL::asset('assets/img/logo/logo-white.svg')}}" alt="logo" />    '/assets/img/logo/1_MEDESCARE LOGO BEYAZ.png'    -->
              <img class="img-fluid" src="{{ (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic-medical.png') : asset('assets/img/logo/1_MEDESCARE_LOGO_BEYAZ.png')}}" alt="logo" />
              <!-- Or added via css to provide different ones for different color themes {{(User('Type')=='1')? '/assets/img/logo/medical-miracle.png' :  ((User('Parent')=='4516QXqEiCBgnha7z6sG3eR64vuw9l')? '/assets/img/logo/medical-miracle.png' : '/assets/img/logo/1_MEDESCARE LOGO BEYAZ.png') ;}}-->
<!--               <div class="img">
              </div> -->
            </a>
          </div>
          <!-- Logo End -->
          <!-- User Menu Start -->
          <div class="user-container d-flex">
            <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="profile" alt="profile" src="{{User('ProfilPic') ?? URL::asset('assets/upload/Default.png')}}" />
              <div class="name">{{User('FirstName')}} {{User('LastName')}}</div>
              <div class="text-small text-muted">{{ User('Type')=='1'? User('Invitation') : '' }}</div>
            </a>

           <div class="dropdown-menu dropdown-menu-end user-menu wide">
              <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                  <div class="text-extra-small text-primary">{{Lang::get('Navbar.Account')}}</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>  
                      <a href="/panel/Home">{{Lang::get('Navbar.UserInfo')}}</a>
                    </li>
                    <li>
                      <a href="/panel/Home">{{Lang::get('Navbar.Preferences')}}</a>
                    </li>
                    <li>
                      <a href="/panel/Home">{{Lang::get('Navbar.Calendar')}}</a>
                    </li>
                  </ul>
                </div>
<!--                 <div class="col-6 pe-1 ps-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">Security</a>
                    </li>
                    <li>
                      <a href="#">Billing</a>
                    </li>
                  </ul>
                </div> -->
              </div>
              <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-2 pt-2">
                  <div class="text-extra-small text-primary">{{Lang::get('Navbar.Application')}}</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a data-bs-toggle="modal" data-bs-target="#settings">{{Lang::get('Navbar.Language')}}</a>
                    </li>
                    <li>
                      <!-- <a href="javascript:Swal.fire('Under Construction!');">{{Lang::get('Navbar.Language')}}</a> -->
                      <form onchange="javascript:$(this).submit();" action="ajax" method="POST" target="ChangeLang" >
                        <select name="Lang" class="form-control">
                          <option {{(App::getLocale()=='tr')? 'selected': ''}} value="tr">Turkçe</option>
                          <option {{(App::getLocale()=='en' || App::getLocale()=='')? 'selected': ''}}  value="en">English</option>
                          <option {{(App::getLocale()=='de')? 'selected': ''}}  value="de">Deutsch</option>
                        </select>
                      </form>
                    </li>
                    @if(User('Type')=='1')
                    <li>
                      <form onchange="javascript:$(this).submit();" action="ajax" method="POST" target="ChangeInvitation" >
                        <label>{{Lang::get('Navbar.Invitation')}}</label>
                        <input type="text" name="Invitation" class="form-control" value="{{User('Invitation')}}">
                      </form>
                    </li>
                    @endif
                  </ul>
                </div>
<!--                 <div class="col-6 pe-1 ps-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">Devices</a>
                    </li>
                    <li>
                      <a href="#">Storage</a>
                    </li>
                  </ul>
                </div> -->
              </div>
              <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                  <div class="separator-light"></div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="/panel/Consult">
                        <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">{{Lang::get('Navbar.Help')}}</span>
                      </a>
                    </li>
                    <li>
                      <a href="/panel/Guidebook" >
                        <i data-acorn-icon="file-text" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">{{Lang::get('Navbar.Docs')}}</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                  <ul class="list-unstyled">
<!--                     <li>
                      <a href="#">
                        <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li> -->
                    <li>
                      <a href="/Logout">
                        <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">{{Lang::get('Navbar.Logout')}}</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div> 

          </div>
          <!-- User Menu End -->

          <!-- Icons Menu Start -->
          <ul class="list-unstyled list-inline text-center menu-icons">
            <li class="list-inline-item">
              <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
              </a>
            </li>
<!--             <li class="list-inline-item">
              <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
              </a>
            </li> -->
            <li class="list-inline-item">
              <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                  <i data-acorn-icon="bell" data-acorn-size="18"></i>
                  <span class="position-absolute notification-dot rounded-xl"></span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                <div class="scroll">
                  <ul class="list-unstyled border-last-none Notification-Container">

                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                      <div class="align-self-center">
                        <a href="#">@Lang('Base.NoNotification')</a>
                      </div>
                    </li>

<!--                     <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="{{URL::asset('assets/img/profile/profile-2.webp')}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">New order received! It is total $147,20.</a>
                      </div>
                    </li>

                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="{{URL::asset('assets/img/profile/profile-3.webp')}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">3 items just added to wish list by a user!</a>
                      </div>
                    </li>

                    <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="{{URL::asset('assets/img/profile/profile-6.webp')}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">Kirby Peters just sent a new message!</a>
                      </div>
                    </li> -->

                  </ul>
                </div>
              </div>
            </li>
            <li class="list-inline-item">
              <a href="/Logout" >
                <i data-acorn-icon="logout" class="light" data-acorn-size="18"></i>
              </a>
            </li>
          </ul>
          <!-- Icons Menu End -->

          <!-- Menu Start -->
          <div class="menu-container flex-grow-1">
            <ul style="height: fit-content;" id="menu" class="menu">
<!--               <li>
                <a href="#dashboards" data-href="Dashboards.Patient.html">
                  <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
                  <span class="label">Home</span>
                </a>
                <ul id="dashboards">
                  <li>
                    <a href="/panel/Dashboard/Agency">
                      <span class="label">Agency</span>
                    </a>
                  </li>
                  <li>
                    <a href="/panel/Dashboard/Admin">
                      <span class="label">Admin</span>
                    </a>
                  </li>
                </ul>
              </li> -->
              <li>
                <a href="/panel/Home">
                  <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
                  <span class="label">{{Lang::get('Navbar.Home')}}</span>
                </a>
              </li>
              @if(User('Type') == '1' || User('Type')=='2')
                <li>
                  <a href="/panel/Tree">
                    <i data-acorn-icon="category" class="icon" data-acorn-size="18"></i>
                    <span class="label">@Lang('Navbar.Map')</span>
                  </a>
                </li>
              @endif
              @if(User('Type') == '1' || User('Type')=='2')
                <li>
                  <a href="#InsertUpdate">
                    <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
                    <span class="label">{{Lang::get('Navbar.Management')}}</span>
                  </a>
                  <ul id="InsertUpdate">

                    
                    <li>
                      <a href="/panel/Users">
                        <span class="label">{{Lang::get('Navbar.Users')}}</span>
                      </a>
                    </li>
                    
                    <li>
                      <a href="/panel/Agencies">
                        <span class="label">{{Lang::get('Navbar.Agencies')}}</span>
                      </a>
                    </li>

                    <li>
                      <a href="/panel/Applications">
                        <span class="label">{{Lang::get('Navbar.Applications')}}</span>
                      </a>
                    </li>
                    @if(User('Type')=='2')
                      <li>
                        <a href="/panel/Manage/Articles">
                          <span class="label">{{Lang::get('Navbar.Articles')}}</span>
                        </a>
                      </li>
                      <li>
                        <a href="/panel/Manage/Packages">
                          <span class="label">{{Lang::get('Navbar.Packages')}}</span>
                        </a>
                      </li>
                      <li>
                        <a href="/panel/Manage/Features">
                          <span class="label">{{Lang::get('Navbar.Features')}}</span>
                        </a>
                      </li>
<!--                      <li>
                        <a href="/panel/Manage/Clinics">
                          <span class="label">Clinics</span>
                        </a>
                      </li>  -->

                      <li>
                        <a href="/panel/Manage/Categories">
                          <span class="label">{{Lang::get('ManageCategory.Category')}}</span>
                        </a>
                      </li>

                      <li>
                        <a href="/panel/Manage/Treatments">
                          <span class="label">{{Lang::get('Navbar.Treatments')}}</span>
                        </a>
                      </li>

                      <li>
                        <a href="/panel/Manage/Campain">
                          <span class="label">{{Lang::get('Navbar.Campaign')}}</span>
                        </a>
                      </li>

                      <li>
                        <a href="/panel/Manage/Blog">
                          <span class="label">Blog</span>
                        </a>
                      </li>

<!--                       <li>
                        <a href="/panel/Manage/Articles">
                          <span class="label">Articles</span>
                        </a>
                      </li> -->
                    @endif
                  </ul>
                </li>
              @endif
              @if(User('Type')=='2')
<!--               <li>
                <a href="/panel/Notifications">
                  <i data-acorn-icon="calendar" class="icon" data-acorn-size="18"></i>
                  <span class="label">Notifications</span>
                </a>
              </li> -->
              @endif
              <li>
                <a href="/panel/Appointments">
                  <i data-acorn-icon="calendar" class="icon" data-acorn-size="18"></i>
                  <span class="label">{{Lang::get('Navbar.Appointments')}}</span>
                </a>
              </li>
<!--               <li>
                <a href="/panel/Results">
                  <i data-acorn-icon="form-check" class="icon" data-acorn-size="18"></i>
                  <span class="label">Results</span>
                </a>
              </li> -->
              
              <li>
                <a href="/panel/Categories">
                  <i data-acorn-icon="inbox" class="icon" data-acorn-size="18"></i>
                  <span class="label">{{Lang::get('Navbar.Categories')}}</span>
                </a>
              </li>

              <li>
                <a href="/panel/Clients">
                  <i data-acorn-icon="health" class="icon" data-acorn-size="18"></i>
                  <span class="label">{{Lang::get('Navbar.Clients')}}</span>
                </a>
              </li>
              <li id="Consult">
                <a href="/panel/Consult">
                  <i data-acorn-icon="messages" class="icon" data-acorn-size="18"></i>
                  <span class="label">{{Lang::get('Navbar.HelpDesk')}}</span>
                </a>
              </li>
              <li>
             
              <a href="/panel/Guidebook">
                <i data-acorn-icon="book-open" class="icon" data-acorn-size="18"></i>
                <span class="label">{{Lang::get('Navbar.GuideBook')}}</span>
              </a> 

                
              </li>
              <li>
                <a href="/panel/Articles">
                  <i data-acorn-icon="book" class="icon" data-acorn-size="18"></i>
                  <span class="label">{{Lang::get('Navbar.Articles')}}</span>
                </a>
              </li>
              @if(User('Type')=='0')
              <li >
                <a href="/panel/Settings">
                  <i data-acorn-icon="gear" class="icon" data-acorn-size="18"></i>
                  <span class="label">{{Lang::get('Navbar.Settings')}}</span>
                </a>
              </li>
              @endif
            </ul>
          </div>
          <!-- Menu End -->

          <!-- Mobile Buttons Start -->
          <div class="mobile-buttons-container">
            <!-- Menu Button Start -->
            <a href="#" id="mobileMenuButton" class="menu-button">
              <i data-acorn-icon="menu"></i>
            </a>
            <!-- Menu Button End -->
          </div>
          <!-- Mobile Buttons End -->
        </div>
        <div class="nav-shadow"></div>
      </div>