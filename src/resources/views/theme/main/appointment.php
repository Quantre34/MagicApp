
<?php require_once 'head.php';
require_once 'header.php';
?>  
<div class="preloader" style="display: none;"><img src="/assets/img/njemjek-icon.svg" alt="Një Mjek"></div>

<div class="page-header">
    <div class="wrapper">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="title">Make an Appointment</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope=""
                        itemtype="http://schema.org/ListItem"><a itemprop="item" href="homepage.php"><span
                                itemprop="name">Home</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope=""
                        itemtype="http://schema.org/ListItem"><span itemprop="name"> Make an Appointment</span>
                        <meta itemprop="item" content="https://www.njemjek.com/make-an-appointment">
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
                    <div class="col-lg-5 text-center"><img data-src="/uploads/2022/06/12344.png" class="img-fluid" title alt></div>
                    <div class="col-lg-7">
                        <form action="https://www.njemjek.com/ajax/appointment"
                            class="appointment offer-form row align-items-center no-ajax" method="POST">
                            <div class="header-2 mb-4 col-12"><span class="name ln-1">Një Mjek</span>
                                <div class="title">Fill out an appointment form</div>
                                <p>You can contact us faster and get an offer from us by filling out the appointment form.</p>
                            </div>
                            <div class="col-12 mb-3"> </div>
                            <div class="form-group col-12 mb-3"><input type="text" class="form-control rounded-pill"
                                    name="name" value required placeholder="Full Name"></div>
                            <div class="form-group col-lg-6 mb-3"><input type="tel" class="form-control rounded-pill"
                                    name="phone" value required placeholder="Phone"></div>
                            <div class="form-group col-lg-6 mb-3"><input type="email" class="form-control rounded-pill"
                                    name="email" value placeholder="E-mail"></div>
                            <div class="form-group col-lg-6 mb-3"><select style="padding: 1.2rem 1rem !important; border: 1px solid #ced4da; width: 100%;" name="service"
                                    class="form-select rounded-pill" required>
                                    <option value selected>Select Service</option>
                                    <option value="73"> Obesity</option>
                                    <option value="74"> Aesthetics</option>
                                    <option value="75"> Hair</option>
                                    <option value="76"> Dentistry</option>
                                    <option value="103"> Stomach Reduction / Gastric Tightening</option>
                                    <option value="104"> Gastric Bypass</option>
                                    <option value="105"> Gastric Balloon</option>
                                    <option value="108"> Facial Aesthetics</option>
                                    <option value="111"> Nose Aesthetics</option>
                                    <option value="106"> Stomach Botox</option>
                                    <option value="112"> Eyebrow Lift</option>
                                    <option value="113"> Facelift</option>
                                    <option value="114"> Eyelid Aesthetics</option>
                                    <option value="115"> Ear Aesthetics</option>
                                    <option value="109"> Breast Aesthetics</option>
                                    <option value="117"> Breast Reduction</option>
                                    <option value="119"> Breast Reconstruction</option>
                                    <option value="120"> Gynecomastia</option>
                                    <option value="110"> Body Aesthetics</option>
                                    <option value="121"> Liposuction</option>
                                    <option value="122"> Tummy Tuck</option>
                                    <option value="124"> Arm Lift</option>
                                    <option value="77"> TYPE II DIABETES</option>
                                    <option value="136"> Metabolic Surgery</option>
                                    <option value="137"> Ileal Interposition</option>
                                    <option value="138"> Transit Bipartition</option>
                                    <option value="126"> FUE Hair Transplant</option>
                                    <option value="127"> DHI Hair Transplant</option>
                                    <option value="128"> SAFIR Hair Transplant</option>
                                    <option value="129"> Beard and Mustache Transplant</option>
                                    <option value="130"> Eyebrow Transplant</option>
                                    <option value="131"> Dental Implant</option>
                                    <option value="132"> Zirconium Coating</option>
                                    <option value="133"> Teeth Whitening</option>
                                    <option value="134"> Dental Bridge</option>
                                    <option value="135"> Smile Design</option>
                                    <option value="140"> Brain Surgery</option>
                                </select></div>
                            <div class="form-group col-lg-6 mb-3"><input type="date" min="2024-08-03" max="2025-08-03"
                                    class="form-control rounded-pill" name="date" value id="appointment-date"></div>
                            <div class="col-12 mb-3 types">
                                <div class="form-check-inline"><input class="form-check-input" type="radio" name="type"
                                        id="online" value="Online Appointment" checked><label class="form-check-label"
                                        for="online"> Online Appointment</label></div>
                                <div class="form-check-inline"><input class="form-check-input" type="radio" name="type"
                                        id="face_to_face" value="In-Office Appointment"><label class="form-check-label"
                                        for="face_to_face"> In-Office Appointment </label></div>
                                <div class="form-check-inline"><input class="form-check-input" type="radio" name="type"
                                        id="phone" value="Phone"><label class="form-check-label" for="phone">
                                        Phone</label></div>
                            </div>
                            <div class="form-group col-12 mb-3"><textarea rows="5" class="form-control" name="message"
                                    placeholder="Message"></textarea></div>
                            <div class="col-12">
                                <div class="g-recaptcha" data-sitekey="6LdGKZ8pAAAAAB0CgnIK8W0WeZnhrNYvqTligNIl"></div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-check"><input class="form-check-input border-light text-dark" checked
                                        type="checkbox" name="kvkk" id="kvkk" required><label
                                        class="form-check-label bg-white text-dark" for="kvkk"> I have read and accepted
                                        the explanatory text of the personal data protection law. <span
                                            class="show_kvkk cursor-pointer"
                                            title="Personal Data Protection Law"> <u>Personal Data Protection
                                                Law.</u></span></label></div>
                            </div>
                            <div class="col-lg-4 text-end"><button type="submit"
                                    class="btn btn-primary text-white rounded-pill fw-bold px-5 mt-3 mt-xxl-0 d-inline-flex align-items-center">
                                    Send<svg class="cvzicon ms-2 ln-1">
                                        <use xlink:href="assets/img/icons.svg#paper"></use>
                                    </svg></button></div>
                        </form>
                    </div>
                </div>
                <div class="page-content mt-5">
                    <h1>Fill out an appointment form</h1>
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once 'footer.php'?>  


 