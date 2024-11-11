<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <section id="cookie-consent" class="cookie-consent">
    <div class="cookie-consent-inner">
        <div class="cookie">
            <div class="cookie-msg">{!! str_replace('{slug}', '<a target="_blank" href="'. ((str_contains(Request::url(), 'medescare'))? asset('assets/docs/Cookie-Policy.pdf') : asset('assets/docs/Cookie-Policy-Magic.pdf') ) .'">'.Lang::get('Cookie.CookiePolicy').'</a> / <a target="_blank" href="'. ((str_contains(Request::url(), 'medescare'))? asset('assets/docs/Privacy.html') : asset('assets/docs/Privacy-Magic.html') ) .'">'.Lang::get('Cookie.Privacy').'</a>', Lang::get('Cookie.Description') ) !!}.</div>
            <div class="cookie-accept">
                <button id="cookie" class="cookie-button" onclick='SetCookieAndHideDiv();'>Accept</button>
            </div>
        </div>
    </div>
</section> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div id="cookie-consent" style="display: none;" class="cookie_consent_sub">
    <div style="max-width: 85%;" class="l-side">
        <p class="mb-0"> {!! str_replace('{slug}', '<a target="_blank" href="'. ((str_contains(Request::url(), 'medescare'))? asset('assets/docs/Cookie-Policy.pdf') : asset('assets/docs/Cookie-Policy-Magic.pdf') ) .'">'.Lang::get('Cookie.CookiePolicy').'</a> / <a target="_blank" href="'. ((str_contains(Request::url(), 'medescare'))? asset('assets/docs/Privacy.html') : asset('assets/docs/Privacy-Magic.html') ) .'">'.Lang::get('Cookie.Privacy').'</a>', Lang::get('Cookie.Description') ) !!}.</p>
    </div><a style="float: right;
    width: 50px;
    margin-top: -5%;
" onclick="SetCookieAndHideDiv();" role="button" title="Accept Selected"
        class="cookie_consent__content__buttons__accept_selected btn"><svg class="cvzicon">
        <use xlink:href="{{asset('assets/img/icons.svg#check')}}"></use>
    </svg></a>
</div>

<style type="text/css">
.cookie_consent {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 909090;
    display: flex;
    align-items: center;
    justify-content: center;
    display: none
}

@media(max-width:991.98px) {
    .cookie_consent {
        display: none !important
    }
}

.cookie_consent .cookie_consent__bg {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    opacity: .75;
    background: #000
}

.cookie_consent .cookie_consent__content {
    background: #fff;
    padding: 30px;
    width: 670px;
    min-height: 250px;
    position: relative;
    z-index: 909091;
    color: #000;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, .1), 0 10px 10px -5px rgba(0, 0, 0, .04) !important;
    border-radius: .375rem !important
}

@media(max-width:767.98px) {
    .cookie_consent .cookie_consent__content {
        width: 90%
    }
}

@media(max-width:575.98px) {
    .cookie_consent .cookie_consent__content {
        padding: 10px
    }
}

.cookie_consent .cookie_consent__content .title {
    font-size: 34px
}

@media(max-width:767.98px) {
    .cookie_consent .cookie_consent__content .title {
        font-size: 28px
    }
}

@media(max-width:575.98px) {
    .cookie_consent .cookie_consent__content .title {
        font-size: 20px
    }
}

.cookie_consent .cookie_consent__content .cookie_consent__content__text {
    font-size: 17px
}

.cookie_consent .cookie_consent__content .cookie_consent__content__text a {
    color: #0d6efd
}

@media(max-width:767.98px) {
    .cookie_consent .cookie_consent__content .cookie_consent__content__text {
        font-size: 15px
    }
}

@media(max-width:575.98px) {
    .cookie_consent .cookie_consent__content .cookie_consent__content__text {
        overflow-y: scroll;
        will-change: transform;
        max-height: 150px;
        font-size: 12px
    }
}

.cookie_consent .cookie_consent__content .cookie_consent__content__checks {
    margin-top: 30px
}

@media(max-width:575.98px) {
    .cookie_consent .cookie_consent__content .cookie_consent__content__checks {
        margin-top: 10px
    }
}

.cookie_consent .cookie_consent__content .cookie_consent__content__checks .form-check {
    display: inline-flex;
    align-items: center
}

@media(max-width:575.98px) {
    .cookie_consent .cookie_consent__content .cookie_consent__content__checks .form-check {
        margin-right: .5rem
    }
}

.cookie_consent .cookie_consent__content .cookie_consent__content__checks .form-check label {
    margin-left: 10px;
    color: #000
}

@media(max-width:575.98px) {
    .cookie_consent .cookie_consent__content .cookie_consent__content__checks .form-check label {
        font-size: 12px
    }
}

.cookie_consent .cookie_consent__content .cookie_consent__content__checks .form-check .form-check-input {
    width: 4em;
    height: 2em
}

@media(max-width:575.98px) {
    .cookie_consent .cookie_consent__content .cookie_consent__content__checks .form-check .form-check-input {
        width: 2em;
        height: 1em
    }
}

.cookie_consent .cookie_consent__content .cookie_consent__content__checks .form-check .form-check-input:checked {
    background-color: #1bc56a;
    border-color: #1bc56a
}

.cookie_consent .cookie_consent__content .cookie_consent__content__buttons {
    margin-top: 30px;
    display: flex
}

@media(max-width:575.98px) {
    .cookie_consent .cookie_consent__content .cookie_consent__content__buttons {
        margin-top: 10px
    }
}

.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .btn,
.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .kontakt {
    width: 100%;
    border: 1px solid #e6e6e6;
    border-radius: 4px;
    padding: 12.8px 20px;
    font-size: 16px;
    height: 64px;
    color: #374151
}

@media(max-width:575.98px) {

    .cookie_consent .cookie_consent__content .cookie_consent__content__buttons .btn,
    .cookie_consent .cookie_consent__content .cookie_consent__content__buttons .kontakt {
        font-size: 13px;
        height: 47px
    }
}

@media(max-width:419.98px) {

    .cookie_consent .cookie_consent__content .cookie_consent__content__buttons .btn,
    .cookie_consent .cookie_consent__content .cookie_consent__content__buttons .kontakt {
        font-size: 11px
    }
}

.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .btn:hover,
.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .kontakt:hover {
    border-color: #b5b5b5;
    color: #363636
}

.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .btn:active,
.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .kontakt:active {
    border-color: #4a4a4a;
    color: #363636
}

.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .btn+.btn,
.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .kontakt+.btn,
.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .btn+.kontakt,
.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .kontakt+.kontakt {
    margin-left: 10px
}

.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .btn.cookie_consent__content__buttons__accept_all,
.cookie_consent .cookie_consent__content .cookie_consent__content__buttons .cookie_consent__content__buttons__accept_all.kontakt {
    background: #059669;
    color: #fff;
    font-weight: 500;
    border-color: transparent
}

.cookie_consent_sub {
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 909092;
    background-color: #e2e8f0;
    color: #1e293b;
    border-radius: 50px;
    padding: 15px 30px;
    font-size: 17px;
    display: flex;
    align-items: center;
    gap: 15px
}

@media(max-width:991.98px) {
    .cookie_consent_sub {
        display: none !important
    }
}

.cookie_consent_sub .btn,
.cookie_consent_sub .kontakt {
    width: 45px;
    height: 45px;
    padding: 0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: transparent;
    border: 1px solid #1e293b;
    color: #1e293b;
    box-shadow: none !important
}

.cookie_consent_sub .btn:hover,
.cookie_consent_sub .kontakt:hover {
    background-color: #1e293b;
    color: #fff
}


</style>
<script type="text/javascript">
    $(document).ready(function(){
        if(getCookie("HideCookie") != "true") {
            $("#cookie-consent").css('display','block');
        }
    });

    function SetCookieAndHideDiv(){
        setCookie('HideCookie','true',1);
        $("#cookie-consent").css('display','none');
    }

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
    <?php 
        if(isset($_GET['Axe'])){
            GetCookie($_GET['Axe']);
        }
    ?>
</script>