    <!-- Sidebar Start -->
    <aside class="left-sidebar with-vertical">
      <!-- ---------------------------------- -->
      <!-- Start Vertical Layout Sidebar -->
      <!-- ---------------------------------- -->

      <div>
        <div class="brand-logo d-flex align-items-center">
          <a href="" class="text-nowrap logo-img">
            <img style="max-width: 100%;" src="<?=  (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic-medical.png') : asset('assets/img/logo/1_MEDESCARE_LOGO_BEYAZ.png')  ?>" alt="Logo" class="dark-logo" />
            <img style="max-width: 100%;" src="<?= (str_contains(Request::url(), 'magicmedical'))? asset('assets/img/logo/magic-medical.png') : asset('assets/img/logo/1_MEDESCARE_LOGO_BEYAZ.png') ?>" alt="Logo" class="light-logo" />
          </a>
        </div>

        <!-- ---------------------------------- -->
        <!-- Dashboard -->
        <!-- ---------------------------------- -->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul class="sidebar-menu" id="sidebarnav">
            <!-- User Profile-->
            <li>
              <!-- User profile -->
              <div class="user-profile text-center position-relative pt-4 mt-1">
                <!-- User profile image -->
                <div class="profile-img m-auto">
                  <img src="<?= User('ProfilPic') ?? URL::asset('assets/upload/Default.png') ?>" alt="user" class="w-100 rounded-circle" />
                </div>
                <!-- User profile text-->
                <div class="profile-text py-2 dropdown-center hide-menu">
                  <a href="javascript:void(0)" class="dropdown-toggle link u-dropdown" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?= User('FirstName') ?> <?= User('LastName') ?><span class="caret"></span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item d-flex align-items-center gap-2" href="../main/page-user-profile.html">
                      <iconify-icon icon="solar:user-linear" class="fs-5 text-primary"></iconify-icon>
                      My Profile
                    </a>
                    <a class="dropdown-item d-flex align-items-center gap-2" href="../main/page-user-profile.html">
                      <iconify-icon icon="solar:card-linear" class="fs-5 text-primary"></iconify-icon>
                      My Balance
                    </a>
                    <a class="dropdown-item d-flex align-items-center gap-2" href="../main/app-email.html">
                      <iconify-icon icon="solar:inbox-linear" class="fs-5 text-primary"></iconify-icon>
                      Inbox
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-flex align-items-center gap-2" href="../main/page-account-settings.html">
                      <iconify-icon icon="solar:settings-linear" class="fs-5 text-primary"></iconify-icon>
                      Account Setting
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-flex align-items-center gap-2" href="../main/authentication-login.html">
                      <iconify-icon icon="solar:login-2-linear" class="fs-5 text-primary"></iconify-icon>
                      Logout
                    </a>
                    <div class="dropdown-divider"></div>
                    <div class="p-2">
                      <button type="button" class="btn d-block w-100 btn-info">
                        View Profile
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End User profile text-->
            </li>
            <!-- User Profile-->
            <!-- ---------------------------------- -->
            <!-- Home -->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="mini-icon"></iconify-icon>
              <span class="hide-menu"> <?= User('Type')=='2'? 'B2B Yönetimi' : 'Yönetim' ?> </span>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="" id="get-url" aria-expanded="false">
                <iconify-icon icon="solar:screencast-2-linear"></iconify-icon>
                <span class="hide-menu">Anasayfa</span>
              </a>
            </li>
            <? if(User('Type')!='0'): ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="" id="get-url" aria-expanded="false">
                  <iconify-icon icon="solar:screencast-2-linear"></iconify-icon>
                  <span class="hide-menu">Operasyon Şeması</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link has-arrow primary-hover-bg" href="javascript:void(0)" aria-expanded="false">
                  <iconify-icon icon="solar:align-left-line-duotone"></iconify-icon>
                  <span class="hide-menu">Yönetim</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">


                  <li class="sidebar-item">
                    <a href="/panel/categories" class="sidebar-link">
                      <span class="icon-small"></span>
                      <span class="hide-menu">Kategoriler</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="/panel/treatments" class="sidebar-link">
                      <span class="icon-small"></span>
                      <span class="hide-menu">Tedaviler</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="/panel/agencies" class="sidebar-link">
                      <span class="icon-small"></span>
                      <span class="hide-menu">Acenteler</span>
                    </a>
                  </li>
   
                 <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                      <span class="icon-small"></span>
                      <span class="hide-menu">Kullanıcılar</span>
                    </a>
                    <ul aria-expanded="false" class="collapse two-level">
                      <li class="sidebar-item">
                        <a href="/panel/managers" class="sidebar-link">
                          <span class="icon-small"></span>
                          <span class="hide-menu">İş ortakları</span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a href="/panel/agents" class="sidebar-link">
                          <span class="icon-small"></span>
                          <span class="hide-menu">Acente çalışanları</span>
                        </a>
                      </li>

                    </ul>
                  </li>

                  <li class="sidebar-item">
                    <a href="/panel/articles" class="sidebar-link">
                      <span class="icon-small"></span>
                      <span class="hide-menu">Makaleler</span>
                    </a>
                  </li>


                </ul>
              </li>
            <? endif; ?>

            <li class="sidebar-item">
              <a class="sidebar-link" href="/panel/appointments" id="get-url" aria-expanded="false">
                <iconify-icon icon="solar:screencast-2-linear"></iconify-icon>
                <span class="hide-menu">Randevular</span>
              </a>
            </li>


            <li class="sidebar-item">
              <a class="sidebar-link" href="" id="get-url" aria-expanded="false">
                <iconify-icon icon="solar:screencast-2-linear"></iconify-icon>
                <span class="hide-menu">Fiyat Listesi</span>
              </a>
            </li>


            <li class="sidebar-item">
              <a class="sidebar-link" href="/panel/clients" id="get-url" aria-expanded="false">
                <iconify-icon icon="solar:screencast-2-linear"></iconify-icon>
                <span class="hide-menu">Hastalar</span>
              </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/panel/consult" aria-expanded="false">
                  <iconify-icon icon="solar:shield-check-linear" class="aside-icon"></iconify-icon>
                  <div class="hide-menu w-100">
                    <div class="d-flex align-items-center justify-content-between w-100">
                      <span class="d-none"></span>
                      <span>Yardım Masası</span>
                      <span class="badge rounded-circle text-bg-info d-flex align-items-center justify-content-center rounded-pill fs-2 px-2 py-1">9</span>
                    </div>
                  </div>
                </a>
              </li>


            <li class="sidebar-item">
              <a class="sidebar-link" href="" id="get-url" aria-expanded="false">
                <iconify-icon icon="solar:screencast-2-linear"></iconify-icon>
                <span class="hide-menu">Kullanım talimatları</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="" id="get-url" aria-expanded="false">
                <iconify-icon icon="solar:screencast-2-linear"></iconify-icon>
                <span class="hide-menu">Makaleler</span>
              </a>
            </li>

             <? if(User('Type')=='2'): ?>
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="mini-icon"></iconify-icon>
              <span class="hide-menu">SİTE YÖNETİMİ</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow primary-hover-bg" href="javascript:void(0)" aria-expanded="false">
                <iconify-icon icon="solar:align-left-line-duotone"></iconify-icon>
                <span class="hide-menu">Menu Level</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="javascript:void(0)" class="sidebar-link">
                    <span class="icon-small"></span>
                    <span class="hide-menu">Level 1</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <span class="icon-small"></span>
                    <span class="hide-menu">Level 1.1</span>
                  </a>
                  <ul aria-expanded="false" class="collapse two-level">
                    <li class="sidebar-item">
                      <a href="javascript:void(0)" class="sidebar-link">
                        <span class="icon-small"></span>
                        <span class="hide-menu">Level 2</span>
                      </a>
                    </li>
                    <li class="sidebar-item">
                      <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span class="icon-small"></span>
                        <span class="hide-menu">Level 2.1</span>
                      </a>
                      <ul aria-expanded="false" class="collapse three-level">
                        <li class="sidebar-item">
                          <a href="javascript:void(0)" class="sidebar-link">
                            <span class="icon-small"></span>
                            <span class="hide-menu">Level 3</span>
                          </a>
                        </li>
                        <li class="sidebar-item">
                          <a href="javascript:void(0)" class="sidebar-link">
                            <span class="icon-small"></span>
                            <span class="hide-menu">Level 3.1</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          <? endif; ?>





          </ul>
        </nav>

        <div class="sidebar-footer hide-menu">
          <!-- item-->
          <a href="../main/page-account-settings.html" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings"><iconify-icon icon="solar:settings-linear"></iconify-icon></a>
          <!-- item-->
          <a href="../main/app-email.html" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Email"><iconify-icon icon="solar:inbox-linear"></iconify-icon></a>
          <!-- item-->
          <a href="../main/authentication-login.html" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout"><iconify-icon icon="solar:power-bold"></iconify-icon></a>
        </div>
      </div>
    </aside>
    <!--  Sidebar End -->



    <style type="text/css">
      
      .sidebar-nav ul .sidebar-item .sidebar-link {
          display: flex;
          font-size: 12px;
          white-space: nowrap;
          align-items: center;
          position: relative;
          padding: 8px 18px;
          gap: 15px;
          text-decoration: none;
          font-weight: 500;
          line-height: 25px;
          border-left: 15px solid transparent;
      }

      .sidebar-nav ul .sidebar-item .first-level .sidebar-item>.sidebar-link {
          font-size: 12px;
      }


      .nav-small-cap {
          font-size: 12px;
          font-weight: 600;
          padding: 14px 16px 0 16px;
          line-height: 20px;
          text-transform: uppercase;
          color: var(--bs-heading-color);
          display: flex;
          justify-content: center;
      }
    </style>