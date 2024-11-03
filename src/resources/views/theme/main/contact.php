<?php require_once 'head.php';
require_once 'header.php';
?>  
<div class="preloader"><img src="assets/img/njemjek-icon.svg" alt="Një Mjek"></div>
<div class="page-header">
    <div class="wrapper">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="title">Contact</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem"><a itemprop="item" href="homepage.php"><span
                                itemprop="name">Home</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem"><span itemprop="name">Contact</span>
                        <meta itemprop="item" content="contact.php">
                        <meta itemprop="position" content="2">
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>


    <div class="page contact pb-6 pb-xxl-8">
        <div class="container">
            <div class="page-wrapper">
                <div class="row align-items-center g-4">
                    <div class="col-lg-6">
                        <div class="header-2"><span class="name">A Doctor</span>
                            <div class="title">
                                <div class="title">Our Contact Information</div>
                            </div>
                            <p>You can continue by clicking on the icons for more information about diseases.</p>
                        </div>
                        <ul class="contact-list mt-4">
                            <li class="position-relative">
                                <div class="icon"><svg class="cvzicon">
                                        <use xlink:href="/assets/img/icons.svg#map-marker-alt"></use>
                                    </svg></div> Center, Square (St.) Zahir Pajaziti, No. 74, (B. 2), Fl. 2, No. 9,
                                Prishtina 10000 <a href="https://maps.app.goo.gl/vaw7j2gTMVoFvjpu6" title="Google Maps"
                                    target="_blank" rel="noopener external" class="map-link stretched-link"></a>
                            </li>
                            <li>
                                <div class="icon"><svg class="cvzicon">
                                        <use xlink:href="/assets/img/icons.svg#phone-alt-2"></use>
                                    </svg></div>
                                <div> <a href="https://wa.me/38348333752" target="_blank" rel="noopener external"
                                        title="+383 48 333 752">+383 48 333 752,</a> <a
                                        href="https://wa.me/905415573736" target="_blank" rel="noopener external"
                                        title="+90 541 557 37 36">+90 541 557 37 36,</a> <a href="tel:+902162084819"
                                        title="+90 216 208 48 19">+90 216 208 48 19,</a> <a
                                        href="https://wa.me/355692214538" target="_blank" rel="noopener external"
                                        title="+355 69 221 4538">+355 69 221 4538,</a> <a
                                        href="https://wa.me/38976223677" target="_blank" rel="noopener external"
                                        title="+389 76 223 677">+389 76 223 677,</a> </div>
                            </li>
                            <li>
                                <div class="icon"><svg class="cvzicon">
                                        <use xlink:href="/assets/img/icons.svg#envelope-light"></use>
                                    </svg></div><a href="mailto:info@njemjek.com"
                                    title="info@njemjek.com">info@njemjek.com</a>
                            </li>
                            <li class="flex-column align-items-start pt-4">
                                <div class="title d-block">Follow us on our social media accounts!</div>
                                <ul class="social">
                                    <li><a href="https://www.facebook.com/nje.mjek.turqi/" target="_blank"
                                            rel="nofollow external" title="facebook"><svg class="cvzicon">
                                                <use xlink:href="/assets/img/icons.svg#facebook-f"></use>
                                            </svg></a></li>
                                    <li><a href="https://www.instagram.com/nje_mjek/" target="_blank"
                                            rel="nofollow external" title="instagram"><svg class="cvzicon">
                                                <use xlink:href="/assets/img/icons.svg#instagram"></use>
                                            </svg></a></li>
                                    <li><a href="https://www.youtube.com/@njemjekvideo/videos" target="_blank"
                                            rel="nofollow external" title="youtube"><svg class="cvzicon">
                                                <use xlink:href="/assets/img/icons.svg#youtube"></use>
                                            </svg></a></li>
                                    <li><a href="https://vt.tiktok.com/ZSR9LM1JC/" target="_blank"
                                            rel="nofollow external" title="tiktok"><svg class="cvzicon">
                                                <use xlink:href="/assets/img/icons.svg#tiktok"></use>
                                            </svg></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <form action="https://www.njemjek.com/ajax/contact" class="form-wrapper offer-form row no-ajax"
                            method="POST">
                            <div class="header-2 mb-4"><span class="name ln-1">A Doctor</span>
                                <div class="title">Our Contact Form</div>
                                <p class="mb-3">You can contact us faster and get an offer by filling out the contact form.</p>
                            </div>
                            <div class="form-group col-12 mb-3"><svg class="cvzicon icon">
                                    <use xlink:href="/assets/img/icons.svg#user"></use>
                                </svg><input type="text" class="form-control rounded-pill" name="name" value=""
                                    placeholder="Full Name"></div>
                            <div class="form-group col-12 mb-3"><svg class="cvzicon icon">
                                    <use xlink:href="/assets/img/icons.svg#phone-alt-2"></use>
                                </svg><input type="tel" class="form-control rounded-pill" name="phone" value=""
                                    placeholder="Phone"></div>
                            <div class="form-group col-12 mb-3"><svg class="cvzicon icon">
                                    <use xlink:href="/assets/img/icons.svg#envelope-light"></use>
                                </svg><input type="email" class="form-control rounded-pill" name="email" value=""
                                    placeholder="Email"></div>
                            <div class="form-group col-12 mb-3">
                                <div class="file w-100">
                                    <div class="file-name">Upload File</div><button type="button" class="fileselect"
                                        title="upload_file"><svg class="cvzicon">
                                            <use xlink:href="/assets/img/icons.svg#upload"></use>
                                        </svg></button><input type="file" name="file" class="d-none upload-file">
                                </div>
                            </div>
                            <div class="form-group col-12 mb-3"><textarea rows="5" class="form-control" name="message"
                                    placeholder="Message"></textarea><svg class="cvzicon icon">
                                    <use xlink:href="/assets/img/icons.svg#comment"></use>
                                </svg></div>
                            <div class="col-12 mb-3">
                                <div class="g-recaptcha mb-4" data-sitekey="6LdGKZ8pAAAAAB0CgnIK8W0WeZnhrNYvqTligNIl">
                                    <div style="width: 304px; height: 78px;">
                                        <div><iframe title="reCAPTCHA" width="304" height="78" role="presentation"
                                                name="a-q872i4vd2yos" frameborder="0" scrolling="no"
                                                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                                                src="https://www.google.com/recaptcha/api2/anchor?ar=2&amp;k=6LdGKZ8pAAAAAB0CgnIK8W0WeZnhrNYvqTligNIl&amp;co=aHR0cHM6Ly93d3cubmplbWplay5jb206NDQz&amp;hl=en&amp;v=hfUfsXWZFeg83qqxrK27GB8P&amp;size=normal&amp;cb=f30w6u6lrtn2"></iframe>
                                        </div><textarea id="g-recaptcha-response" name="g-recaptcha-response"
                                            class="g-recaptcha-response"
                                            style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-xxl-row justify-content-between align-items-center">
                                <div class="form-check"><input class="form-check-input border-light text-dark"
                                        checked="" type="checkbox" name="kvkk" id="kvkk" required=""><label
                                        class="form-check-label bg-white text-dark" for="kvkk"> I have read and accepted
                                        the explanatory text of the personal data protection law. <span
                                            class="show_kvkk cursor-pointer"
                                            title="Personal Data Protection Law"> <u>Personal Data Protection
                                                Law.</u></span></label></div><button type="submit"
                                    class="btn btn-primary text-white rounded-pill fw-bold px-5 mt-3 mt-xxl-0">
                                    Send<svg class="cvzicon ms-2 ln-1">
                                        <use xlink:href="/assets/img/icons.svg#paper"></use>
                                    </svg></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="maps mt-5">
                    <div class="ratio"> <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.6500153880716!2d28.78316897632573!3d40.98914392060243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa3c1a12aa3ab%3A0x1c2abeef78625d30!2sMedes%20Care!5e0!3m2!1str!2str!4v1722784381459!5m2!1str!2str"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                </div>
                <iframe
                    src=""
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="page-content mt-5">
                    <h1>Contact&nbsp;A Doctor</h1>
                </div>
            </div>
        </div>
    </div>


 
    <?php require_once 'footer.php'?>  


   