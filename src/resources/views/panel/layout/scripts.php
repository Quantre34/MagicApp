    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->
    <script src="<?= asset('assets/js/vendor/jquery-3.5.1.min.js') ?>"></script>

    <script src="<?= asset('assets/panel/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset('assets/panel/libs/simplebar/dist/simplebar.min.js') ?>"></script>
    <script src="<?= asset('assets/panel/js/theme/app.init.js') ?>"></script>
    <script src="<?= asset('assets/panel/js/theme/theme.js') ?>"></script>
    <script src="<?= asset('assets/panel/js/theme/app.min.js') ?>"></script>
    <script src="<?= asset('assets/panel/js/theme/sidebarmenu.js') ?>"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="<?= asset('assets/panel/libs/apexcharts/dist/apexcharts.min.js') ?>"></script>
    <script src="<?= asset('assets/panel/js/dashboards/dashboard3.js') ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
    <script src="<?= asset('assets/js/HoldOn.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>

    <script src="<?= asset('assets/panel/libs/quill/dist/quill.min.js') ?>"></script>
    <script src="<?= asset('assets/panel/js/forms/quill-init.js') ?>"></script>

    <script type="text/javascript">
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
            }
            return "";
        }
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }
        function eraseCookie(name) {   
            document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
      /*---------------*/
      function SweetSelect(Id){
            if (document.getElementById(Id) !== null && jQuery().select2) {
              jQuery('#'+Id).select2({minimumResultsForSearch: Infinity, placeholder: ''});
              return true;
            }
      }
      /*---------------*/
  </script>


