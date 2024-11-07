      <!-- Layout Footer Start -->
      <footer>
        <div class="footer-content">
          <div class="container">
            <div class="row">
              <div class="col-5 col-sm-5">
                <p class="mb-0 text-muted text-medium">{{ (str_contains(Request::url(), 'magicmedical'))? 'MagicMedical' : 'Medescare' }}  © 2024 | All Rights Reserved.</p>
              </div>
              <div class="col-5 col-sm-5 d-flex justify-content-end ">
                <p class="mb-0 text-muted text-medium">
                  {!! (str_contains(Request::url(), 'magicmedical'))? '' : '<a onclick="SetModalContent(`0`);" type="button" >Terms&Conditions</a> |' !!}
                   <a type="button" onclick="SetModalContent(`1`);" >@Lang('Cookie.Privacy')</a></p>
                   {!! (str_contains(Request::url(), 'magicmedical'))? '<a onclick="SetModalContent(`2`);" type="button" >  <span class="me-2"></span> Impressum</a>  ' : '' !!}
              </div>
              <div class="col-5 col-sm-5 d-flex justify-content-end ">
              </div>
<!--               <div class="col-sm-6 d-none d-sm-block">
                <ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Review</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Purchase</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://acorn-html-docs.coloredstrategies.com/" target="_blank" class="btn-link">Docs</a>
                  </li>
                </ul>
              </div> -->
            </div>
          </div>
        </div>
      </footer>
      <!-- Layout Footer End -->


      <!-- Button trigger modal -->


