@extends('main.App')        
 
    @section('style')
    <style type="text/css">
        .swiper-slide {
            height: fit-content!important;
        }
        .swiper-slide-active {
            height: fit-content!important;
        }
        .swiper-wrapper {
            height: fit-content!important;
        }
    </style>
    @endsection
    @section('content')

    <div class="home-slider" style="min-height:400px">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">

                @foreach(GetData('slider',['Status'=>'1']) as $Slider)
                    <div class="swiper-slide">
                        <div class="video-wrapper slide-video ratio"><video autoplay muted width="400" height="400"
                                class="home-video lazy-video" playsinline preload="none" loop
                                data-src="{{$Slider['File']}}">
                                <source src="{{$Slider['File']}}" type="video/mp4"></video></div>
                        <div class="wrapper">
                            <div class="container">
                                <div class="content">
                                    <div class="title-1">{{$Slider['Info']}}</div>
                                    <div class="title-2">
                                        <p class="title-2">{{$Slider['Title']}}</p>
                                    </div>
                                    <p>{{$Slider['Content']}}</p> 
                                    <a href="{{$Slider['Target']}}" title="Learn More" class="rounded-pill btn btn-primary"> Learn More<svg class="cvzicon">
                                        <use xlink:href="assets/img/icons.svg#chevron-right-light"></use>
                                    </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach




<!--                 <div class="swiper-slide" data-swiper-autoplay="5000">
                    <div class="img-wrapper ratio">
                        <picture>
                            
                            <img  src="assets/img/slider-2.webp" width="100%" height="100%" class="w-100 h-100 of-cover" data-transform-origin="0% 0% 0px" alt="Professional Services and Reliability" title="Professional Services and Reliability"></picture>
                        <script type="application/ld+json">
                            {
                                "@context": "https://schema.org",
                                "@type": "ImageObject",
                                "author": "A Doctor",
                                "contentUrl": "assets/uploads//2024/06/slider-mobile-rhinoplasty-hotel-campaign.jpg"
                            }
                        </script>
                    </div>
                    <div class="wrapper">
                        <div class="container">
                            <div class="content">
                                <div class="title-1">Professional Services and Reliability</div>
                                <div class="title-2">
                                    <p class="title-2">New Nose, New Look</p>
                                </div>
                                <p>Reshape your nose and enjoy 7 days of vacation on the coast of Istanbul</p> 
                                <a href="/categories/plastic-surgery" title="Learn More" class="rounded-pill btn btn-primary"> Learn More<svg class="cvzicon">
                                    <use xlink:href="assets/img/icons.svg#chevron-right-light"></use>
                                </svg></a>
                            </div>
                        </div>
                    </div>
                </div> -->

  
<!--                 <div class="swiper-slide" data-swiper-autoplay="5000">
                    <div class="img-wrapper ratio">
                        <picture>
                           
                            <img src="assets/img/slider-5.webp" width="100%" height="100%" class="w-100 h-100 of-cover" data-transform-origin="0% 0% 0px" alt="Professional Services and Reliability" title="Professional Services and Reliability"></picture>
                        <script type="application/ld+json">
                            {
                                "@context": "https://schema.org",
                                "@type": "ImageObject",
                                "author": "A Doctor",
                                "contentUrl": "assets/uploads//2024/04/robotic-physical-therapy-mobile-slider.webp"
                            }
                        </script>
                    </div>
                    <div class="wrapper">
                        <div class="container">
                            <div class="content">
                                <div class="title-1">Professional Services and Reliability</div>
                                <div class="title-2">
                                    <p class="title-2">Robotic Physiotherapy</p>
                                </div>
                                <p>Physiotherapy for your body’s needs with modern robotics</p> 
                                <a href="robotik-fizioterapi.html" title="Learn More" class="rounded-pill btn btn-primary"> Learn More<svg class="cvzicon">
                                    <use xlink:href="assets/img/icons.svg#chevron-right-light"></use>
                                </svg></a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
        </div>
    </div>
    

  
    <div class="welcome">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 py-4 py-xxl-8 left-side">
                    <div class="header-1"> <span>Get to know us up close!</span>
                        <div class="title">Welcome!</div>
                    </div>
                    <div class="page-content">
                        <p>A Doctor is an advisory center for patients who need aesthetic surgery and medical treatment in Turkey.</p>
                        <p>The establishment of the center “A Doctor” is considered important to bring together the best doctors, the most serious hospitals, and the most suitable prices accurately according to the treatment protocol.</p>
                        <p>Besides this, we also enable the translation and then the evaluation of medical reports by the most prestigious doctors in the respective fields free of charge.</p>
                        <p>Recommending doctors or hospitals is more than a job, it is a responsibility. That is why we have set ourselves the slogan “Your trust is our responsibility.”</p>
                        <p>A Doctor operates under OnPoint Consulting Center SH.P.K.&nbsp;</p>
                    </div> 
                    <a href="about-us.html" class="read-more mt-4 d-table"><span>Read more</span>
                        <button class="btn btn-primary ms-2 text-white p-0 rounded-pill p-0 w-20px h-20px d-inline-flex align-items-center justify-content-center" title="Read more">
                            <svg class="cvzicon fs-6">
                                <use xlink:href="assets/img/icons.svg#angle-right"></use>
                            </svg>
                        </button>
                    </a>
                </div>
                <div class="col-lg-8 right-side">
                    <div class="row align-items-center">
                        <div class="col-xxl-3 col-lg-4 py-4 py-xxl-6 left">
                            <ul class="list d-none d-md-block">
                                <li class="madde" data-index="1">
                                    <a title="Our Patients" role="button" class="changeSlide mb-3 d-block" data-index="1">
                                        <div class="icon rounded-circle w-40px h-40px p-2">
                                            <img src="assets/img/home-icon-1.webp" alt="Our Patients" title="Our Patients">
                                        </div>
                                        <div class="title">Our Patients</div>
                                        <p class="mb-1">Some of our patients have shared moments from their experience with our organization and the treatment they received in our partner hospitals.</p>
                                    </a>
                                </li>
                                <li class="madde" data-index="2">
                                    <a title="Special Offers" role="button" class="changeSlide mb-3 d-block" data-index="2">
                                        <div class="icon rounded-circle w-40px h-40px p-2">
                                            <img src="assets/img/home-icon-2.svg" alt="Special Offers" title="Special Offers">
                                        </div>
                                        <div class="title">Special Offers</div>
                                        <p class="mb-1">We make sure to bring you the lowest prices, the highest quality services, and the most distinguished doctors in their respective fields.</p>
                                    </a>
                                </li>
                                <li class="madde" data-index="3">
                                    <a title="Free Consultation" role="button" class="changeSlide mb-3 d-block" data-index="3">
                                        <div class="icon rounded-circle w-40px h-40px p-2">
                                            <img src="assets/img/home-icon-3.webp" alt="Free Consultation" title="Free Consultation">
                                        </div>
                                        <div class="title">Free Consultation</div>
                                        <p class="mb-1">Get a free consultation with one of our doctors by using one of our communication lines like WhatsApp, Viber, or by filling out the form.</p>
                                    </a>
                                </li>
                            </ul>
                            <div class="swiper madde-thumbs-swiper d-block d-md-none">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a title="Our Patients" role="button" class="changeSlide mb-3 d-block" data-index="1">
                                            <div class="icon rounded-circle w-40px h-40px p-2">
                                                <img data-src="assets/uploads//2023/05/flag.webp" alt="Our Patients" title="Our Patients">
                                            </div>
                                            <div class="title">Our Patients</div>
                                            <p class="mb-1">Some of our patients have shared moments from their experience with our organization and the treatment they received in our partner hospitals.</p>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a title="Special Offers" role="button" class="changeSlide mb-3 d-block" data-index="2">
                                            <div class="icon rounded-circle w-40px h-40px p-2">
                                                <img src="assets/img/home-icon-1.webp" alt="Special Offers" title="Special Offers">
                                            </div>
                                            <div class="title">Special Offers</div>
                                            <p class="mb-1">We make sure to bring you the lowest prices, the highest quality services, and the most distinguished doctors in their respective fields.</p>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a title="Free Consultation" role="button" class="changeSlide mb-3 d-block" data-index="3">
                                            <div class="icon rounded-circle w-40px h-40px p-2">
                                                <img src="assets/img/home-icon-1.webp" alt="Free Consultation" title="Free Consultation">
                                            </div>
                                            <div class="title">Free Consultation</div>
                                            <p class="mb-1">Get a free consultation with one of our doctors by using one of our communication lines like WhatsApp, Viber, or by filling out the form.</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-pagination d-none"></div>
                            </div>
                        </div>
                        <div class="col-xxl-9 col-lg-8 tanitim-slide-area">
                            <div class="swiper px-sm-6 px-lg-0 py-5 py-lg-0" thumbsSlider>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-index="1">
                                        <figure class="ratio ratio-16x9">
                                            <a href="special-offers.png" data-fslightbox>
                                                <img src="assets/upload/special-offers.png" class="w-100 h-100 of-cover" alt="Our Patients" title="Our Patients">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="swiper-slide" data-index="2">
                                        <figure class="ratio ratio-16x9">
                                            <a href="uploads/2024/03/k-kampanya-01-al.webp" data-fslightbox>
                                                <img data-src="assets/upload/our-patient.png" class="w-100 h-100 of-cover" alt="Special Offers" title="Special Offers">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="swiper-slide" data-index="3">
                                        <figure class="ratio ratio-16x9">
                                            <a href="https://wa.me/{{Main('Whatsapp')}}" target="_blank" rel="noopener">
                                                <img src="assets/upload/free-consultation.png" class="w-100 h-100 of-cover" alt="Free Consultation" title="Free Consultation">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="d-flex flex-md-column flex-column-reverse">
        <div class="trust-cards py-4 py-lg-7">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="header-1">
                            <div class="title">Why Should We Be Your Choice?</div>
                            <p class="mb-0">You can learn more about why you should trust us in the sections below.</p>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-2 g-lg-4">
                            <div class="col-xs-6 col-lg-4 ">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="icon rounded-circle w-45px h-45px p-2"><img
                                                data-src="assets/uploads//2022/09/7-01.svg" alt="We Organize Everything">
                                        </div>
                                        <p class="text-secondary"><b>We Organize Everything</b></p>
                                        <p class="content text-clamp"> Our partners are premium hospitals in Turkey. Based on your request, we recommend the best hospital and doctor. Once you arrive at the selected hospital, the hospital's designated companion and OneDoctor will accompany you every day. You will be immediately informed of any updates regarding your treatment and travel in Turkey. When you return to your home country, we take responsibility for following up on the patient's condition for up to a year.</p> <a
                                            role="button" title="Read More" class="read-more"> Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-lg-4 ">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="icon rounded-circle w-45px h-45px p-2"><img
                                                data-src="assets/uploads//2022/09/8-01.svg" alt="24/7 Support"></div>
                                        <p class="text-secondary"><b>24/7 Support</b></p>
                                        <p class="content text-clamp"> When you arrive in Turkey for your treatment, your health guide will be available to you 24/7. If you need anything else, they will organize it for you, including any rest plans, travel arrangements, car rentals, etc.</p> <a role="button"
                                            title="Read More" class="read-more"> Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-lg-4 ">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="icon rounded-circle w-45px h-45px p-2"><img
                                                data-src="assets/uploads//2022/09/6-01.svg" alt="No Additional Costs"></div>
                                        <p class="text-secondary"><b>No Additional Costs</b></p>
                                        <p class="content text-clamp"> OneDoctor guarantees the best offer for your treatment. The offer we provide to you is the hospital's offer and it does not change even if you contact the hospital directly. You do not pay any additional costs for our services. The profit margin for us is covered by the hospital from their designated marketing fund.</p> <a
                                            role="button" title="Read More" class="read-more"> Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-lg-4 d-lg-none d-block">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="icon rounded-circle w-45px h-45px p-2"><img
                                                data-src="assets/uploads//2022/09/3-01-1.svg" alt="Premium Hospitals in Turkey">
                                        </div>
                                        <p class="text-secondary"><b>Premium Hospitals in Turkey</b></p>
                                        <p class="content text-clamp"> You can receive premium quality treatment in various locations and hospitals in Turkey. We have over 10 trusted partner hospitals in Turkey.</p> <a role="button" title="Read More"
                                            class="read-more"> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-services pt-4 py-lg-5 py-xl-6 pt-xl-3">
            <div class="container">
                <div class="home-services__top d-flex justify-content-between align-items-center mb-lg-4">
                    <div class="header-1">
                        <p class="mb-0"><span>What do we do?</span>
                            <div class="title"><span class="fw-semi-bold fs-normal text-primary d-inline-block">Medical</span> Units</div>
                        </p>
                    </div>
                </div>

                <div class="row g-2 g-xl-4">
                    @if(Categories(['Status'=>'1'],3))
                        @foreach(Categories(['Status'=>'1'],3,['update_at','desc']) as $Category)
                            <div class="col-sm-6 col-lg-4">
                                <div class="service-item">
                                    <figure class="mb-0 ratio ratio-1x1">
                                        <img
                                            src="https://agency.medescare.com{{$Category['Img']}}"
                                            class="w-100 h-100 of-cover" alt>
                                        <script type="application/ld+json">
                                            {
                                                "@context": "https://schema.org",
                                                "@type": "ImageObject",
                                                "author": "Quantre34",
                                                "contentUrl": "https://agency.medescare.com{{$Category['Img']}}"
                                            }
                                        </script>
                                    </figure>
                                    <p>
                                        <div class="title"><span>{{$Category['Title']}}</span></div>
                                    </p>
                                    <div class="overlay"><span class="d-block">{{$Category['Title']}}</span><a href="/treatments/{{$Category['Slug']}}"
                                            class="stretched-link btn btn-white rounded-circle p-0 w-50px h-50px"><svg
                                                class="cvzicon">
                                                <use xlink:href="assets/img/icons.svg#arrow-right-solid"></use>
                                            </svg></a></div>
                                </div>
                            </div>
                        @endforeach
                    @endif
   

                </div>
            </div>
        </div>
    </section>
    

    
<!--     <div class="home-units">
        <div class="container">
            <div class="home-services__top mb-0 d-flex justify-content-between align-items-center mb-lg-4">
                <div class="header-1">
                    <span>Get to know us closely!</span>
                    <div class="title">
                        <span class="fw-semi-bold fs-normal text-primary d-inline-block">A Doctor's</span> Services
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="unit-item my-3 mx-2">
                                <div class="title">
                                    <p class="title">Oncology</p>
                                </div>
                                <p>Oncology is a branch of medicine that specializes in the diagnosis, treatment, and research of cancer.</p>
                                <a title="Oncology" href="onkologji.html" class="stretched-link more">
                                    Learn More
                                    <svg class="cvzicon fs-4 ln-1">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                                <figure>
                                    <img src="assets/img/oncology.webp" alt="Oncology" width="218" height="218">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="unit-item my-3 mx-2">
                                <div class="title">
                                    <p class="title">Organ Transplant</p>
                                </div>
                                <p>Organ transplantation is a procedure where an organ is removed from one body and placed into another body to replace a damaged organ.</p>
                                <a title="Organ Transplant" href="transplant-i-organeve.html" class="stretched-link more">
                                    Learn More
                                    <svg class="cvzicon fs-4 ln-1">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                                <figure>
                                    <img src="assets/img/organ-transplant.webp" alt="Organ Transplant" width="218" height="218">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="unit-item my-3 mx-2">
                                <div class="title">
                                    <p class="title">IVF</p>
                                </div>
                                <p>In vitro fertilization (IVF) is an assisted reproductive technology that involves combining an egg and sperm outside the body in a laboratory setting.</p>
                                <a title="IVF" href="ivf.html" class="stretched-link more">
                                    Learn More
                                    <svg class="cvzicon fs-4 ln-1">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                                <figure>
                                    <img src="assets/upload/ivf-photo-4.webp" alt="IVF" width="218" height="218">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="unit-item my-3 mx-2">
                                <div class="title">
                                    <p class="title">Cochlear Implant</p>
                                </div>
                                <p>A cochlear implant is a sophisticated medical device designed to provide sound to individuals with severe to profound hearing loss.</p>
                                <a title="Cochlear Implant" href="implant-koklear.html" class="stretched-link more">
                                    Learn More
                                    <svg class="cvzicon fs-4 ln-1">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                                <figure>
                                    <img src="assets/img/implant-kok.webp" alt="Cochlear Implant" width="218" height="218">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="unit-item my-3 mx-2">
                                <div class="title">
                                    <p class="title">Robotic Surgery</p>
                                </div>
                                <p>Robotic surgery is surgery performed with the assistance of robots, allowing doctors to perform many procedures with enhanced precision.</p>
                                <a title="Robotic Surgery" href="kirurgji-robotike.html" class="stretched-link more">
                                    Learn More
                                    <svg class="cvzicon fs-4 ln-1">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                                <figure>
                                    <img src="assets/img/robotik.webp" alt="Robotic Surgery" width="218" height="218">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="unit-item my-3 mx-2">
                                <div class="title">
                                    <p class="title">Ground & Air Ambulance</p>
                                </div>
                                <p>When a medical emergency occurs and there is a need for transport to a hospital, ground or air ambulance travel is the safest way.</p>
                                <a title="Ground & Air Ambulance" href="ambulanc-tok-sore-airore.html" class="stretched-link more">
                                    Learn More
                                    <svg class="cvzicon fs-4 ln-1">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                                <figure>
                                    <img src="assets/img/ambulance.webp" alt="Ground & Air Ambulance" width="218" height="218">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="unit-item my-3 mx-2">
                                <div class="title">
                                    <p class="title">Scoliosis</p>
                                </div>
                                <p>Scoliosis starts very subtly and can progress without any symptoms for a long time.</p>
                                <a title="Scoliosis" href="skolioz.html" class="stretched-link more">
                                    Learn More
                                    <svg class="cvzicon fs-4 ln-1">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                                <figure>
                                    <img src="assets/img/scoliosis.webp" alt="Scoliosis" width="218" height="218">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="unit-item my-3 mx-2">
                                <div class="title">
                                    <p class="title">PET-CT</p>
                                </div>
                                <p>Positron Emission Tomography (PET-CT) technology, combined with Computed Tomography (CT),</p>
                                <a title="PET-CT" href="pet-ct.html" class="stretched-link more">
                                    Learn More
                                    <svg class="cvzicon fs-4 ln-1">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                                <figure>
                                    <img src="assets/img/pet-ct.webp" alt="PET-CT" width="218" height="218">
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="unit-item my-3 mx-2">
                                <div class="title">
                                    <p class="title">Neurosurgery (Gamma Knife)</p>
                                </div>
                                <p>Gamma Knife or radiosurgery is a type of radiation surgery used to treat brain tumors, vascular malformations, and other anomalies.</p>
                                <a title="Neurosurgery (Gamma Knife)" href="neurokirurgji-gamma-knife.html" class="stretched-link more">
                                    Learn More
                                    <svg class="cvzicon fs-4 ln-1">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                                <figure>
                                    <img src="assets/img/neurosurgery.webp" alt="Neurosurgery (Gamma Knife)" width="218" height="218">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div> -->
    


    <div class="home-aesthetic pt-3 py-lg-4">
        <div class="container">
            <div class="header-2 mb-lg-4">
                <div class="title">
                    <span class="fw-semi-bold fs-normal text-primary d-inline-block">Medescare's</span> Aesthetics
                </div>
                <p>You can click on the icons below to learn more.</p>
            </div>
            <div class="row g-3 g-lg-4">
                <div class="col-xs-6 col-lg-3">
                    <div class="aesthetic-cat-item">
                        <figure class="ratio ratio-16x9">
                            <img src="assets/img/body-estetik.webp" class="w-100 h-100 of-cover" alt="Body Aesthetics">
                        </figure>
                        <div class="content">
                            <div class="title">
                                <p class="title">Body Aesthetics</p>
                            </div>
                            <ul>
                                @foreach(Treatments(['ParentId'=>'3']) as $Treatment)
                                    <li><a href="/treatments/{{ $Treatment['Slug'] }}" title="{{ $Treatment['Title']  }}"> {{ $Treatment['Title']  }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="aesthetic-cat-item">
                        <figure class="ratio ratio-16x9">
                            <img data-src="assets/uploads//2024/03/facial-small-background.webp" class="w-100 h-100 of-cover" alt="Facial Aesthetics">
                        </figure>
                        <div class="content">
                            <div class="title">
                                <p class="title">Facial Aesthetics</p>
                            </div>
                            <ul>

                                @foreach(Treatments(['ParentId'=>'3']) as $Treatment)
                                    <li><a href="/treatments/{{ $Treatment['Slug'] }}" title="{{ $Treatment['Title']  }}"> {{ $Treatment['Title']  }} </a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="aesthetic-cat-item">
                        <figure class="ratio ratio-16x9">
                            <img data-src="assets/uploads//2024/03/dentistry-2-small-background.webp" class="w-100 h-100 of-cover" alt="Dentistry">
                        </figure>
                        <div class="content">
                            <div class="title">
                                <p class="title">Dentistry</p>
                            </div>
                            <ul>
                                
                                @foreach(Treatments(['ParentId'=>'2']) as $Treatment)
                                    <li><a href="/treatments/{{ $Treatment['Slug'] }}" title="{{ $Treatment['Title']  }}"> {{ $Treatment['Title']  }} </a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="aesthetic-cat-item">
                        <figure class="ratio ratio-16x9">
                            <img data-src="assets/uploads//2024/03/hair-transplant-small-background.webp" class="w-100 h-100 of-cover" alt="Hair">
                        </figure>
                        <div class="content">
                            <div class="title">
                                <p class="title">Hair</p>
                            </div>
                          <ul>
                                
                                @foreach(Treatments(['ParentId'=>'1']) as $Treatment)
                                    <li><a href="/treatments/{{ $Treatment['Slug'] }}" title="{{ $Treatment['Title']  }}"> {{ $Treatment['Title']  }} </a></li>
                                @endforeach
                                
                                

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="step-by-step pt-4 py-xl-5">
        <div class="container">
            <div class="header-2 mb-lg-5">
                <div class="title">Step by Step</div>
                <p>How does it work?</p>
            </div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">01</button> Step
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="true">02</button> Step
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="true">03</button> Step
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="true">04</button> Step
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5" type="button" role="tab" aria-controls="pills-5" aria-selected="true">05</button> Step
                </li>
            </ul>
            <div class="tab-content mt-4 mt-md-5" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab" tabindex="0">
                    <div class="row align-items-center gy-3">
                        <div class="col-lg-6">
                            <div class="ratio ratio-16x9">
                                <img src="assets/img/step-1.webp" class="cover" alt="1">
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-5">
                            <div class="italic-title mb-lg-4 mb-2">Discussion with our agents about the possibility of assisting you</div>
                            <div class="step">Step 1</div>
                            <div class="title mb-lg-4 mb-2">Initial Contact</div>
                            <div class="page-content">
                                <p>After you contact us and send the required medical documentation, within 12-24 hours our staff will translate it and present it to the relevant doctor.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab" tabindex="0">
                    <div class="row align-items-center gy-3">
                        <div class="col-lg-6">
                            <div class="ratio ratio-16x9">
                                <img src="assets/img/step-2.webp" class="cover" alt="2">
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-5">
                            <div class="italic-title mb-lg-4 mb-2">Examination Phase by the Relevant Doctor</div>
                            <div class="step">Step 2</div>
                            <div class="title mb-lg-4 mb-2">Offers and Treatment Planning</div>
                            <div class="page-content">
                                <p style="text-align: justify;">After the assessment by the relevant specialists, we forward the doctors' findings and the hospital's offer, including the treatment plan and cost. Upon your request, your medical reports may be evaluated by more than one doctor/hospital.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab" tabindex="0">
                    <div class="row align-items-center gy-3">
                        <div class="col-lg-6">
                            <div class="ratio ratio-16x9">
                                <img src="assets/img/step-3.webp" class="cover" alt="3">
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-5">
                            <div class="italic-title mb-lg-4 mb-2">Airport Pickup</div>
                            <div class="step">Step 3</div>
                            <div class="title mb-lg-4 mb-2">Your Approval and Arrival in Turkey</div>
                            <div class="page-content">
                                <p>After you have decided to proceed with the medical treatment and purchased your travel tickets, according to the date and time of arrival, we will organize your airport/station pickup and schedule the necessary appointments with the relevant doctors. When required, we can also arrange hotel reservations.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab" tabindex="0">
                    <div class="row align-items-center gy-3">
                        <div class="col-lg-6">
                            <div class="ratio ratio-16x9">
                                <img src="assets/img/step-4.webp" class="cover" alt="4">
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-5">
                            <div class="italic-title mb-lg-4 mb-2">Initial Examination and Treatment Scheme Design</div>
                            <div class="step">Step 4</div>
                            <div class="title mb-lg-4 mb-2">Patient Treatment in Hospital</div>
                            <div class="page-content">
                                <p>Upon arrival, the patient is assigned an interpreter or companion to easily follow the procedures in the hospital. Our team in Istanbul provides 24-hour service to stay in contact and be near the patient whenever needed.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab" tabindex="0">
                    <div class="row align-items-center gy-3">
                        <div class="col-lg-6">
                            <div class="ratio ratio-16x9">
                                <img src="assets/img/step-5.webp" class="cover" alt="5">
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-5">
                            <div class="italic-title mb-lg-4 mb-2">Completion of Procedures and Return to the Airport</div>
                            <div class="step">Step 5</div>
                            <div class="title mb-lg-4 mb-2">Visit to Tourist Places and Return</div>
                            <div class="page-content">
                                <p>After the treatment process is completed, we arrange the patient's transfer to the airport or bus station, depending on the travel plan. After your return, we take care of monitoring your condition for up to one year. If required, we can also organize guided tours to visit tourist sites in Istanbul.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <section class="home-videos pt-4">
        <div class="container">
            <div class="header-2 mb-lg-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center align-items-start gap-2 w-100">
                <div class="title"><span class="fw-semi-bold fs-normal text-primary d-inline-block">Medescare</span> Video Gallery</div>
                <a href="/video-gallery" title="View All" class="text-decoration-underline fw-semi-bold"> View All</a>
            </div>
            <div class="swiper">

                <div class="swiper-wrapper">

                    <div class="swiper-slide" style="height: unset">
                        <div class="video-item m-3" style="height: calc(100% - 2rem)">
                            <figure class="ratio ratio-16x9"><img src="https://natural.clinic/wp-content/uploads/2023/09/Group-4444.webp" class="w-100 h-100 of-cover" alt="Guendalina Tavassi"></figure>
                            <div class="content"><a href="https://www.youtube.com/watch?v=ayWciIFD-pc" rel="noopener external" data-fslightbox="video" class="title stretched-link" title="Guendalina Tavassi">Guendalina Tavassi</a><a href="https://www.youtube.com/watch?v=ayWciIFD-pc" class="play ms-3" aria-label="Guendalina Tavassi"><svg class="cvzicon"><use xlink:href="assets/img/icons.svg#play-video"></use></svg></a></div>
                        </div>
                    </div>

                    <div class="swiper-slide" style="height: unset">
                        <div class="video-item m-3" style="height: calc(100% - 2rem)">
                            <figure class="ratio ratio-16x9"><img src="https://natural.clinic/wp-content/uploads/2023/09/Group-4441.webp" class="w-100 h-100 of-cover" alt="Michele Morrone"></figure>
                            <div class="content"><a href="https://www.youtube.com/watch?v=z0488pLFLwo" rel="noopener external" data-fslightbox="video" class="title stretched-link" title="Michele Morrone">Michele Morrone</a><a href="https://www.youtube.com/watch?v=z0488pLFLwo" class="play ms-3" aria-label="Michele Morrone"><svg class="cvzicon"><use xlink:href="assets/img/icons.svg#play-video"></use></svg></a></div>
                        </div>
                    </div>
                    
                    <div class="swiper-slide" style="height: unset">
                        <div class="video-item m-3" style="height: calc(100% - 2rem)">
                            <figure class="ratio ratio-16x9"><img src="https://natural.clinic/wp-content/uploads/2023/09/Group-4442.webp" class="w-100 h-100 of-cover" alt="Michele Morrone"></figure>
                            <div class="content"><a href="https://www.youtube.com/watch?v=-IOa1AM_xyg" rel="noopener external" data-fslightbox="video" class="title stretched-link" title="Michele Morrone">Michele Morrone</a><a href="https://www.youtube.com/watch?v=-IOa1AM_xyg" class="play ms-3" aria-label="Michele Morrone"><svg class="cvzicon"><use xlink:href="assets/img/icons.svg#play-video"></use></svg></a></div>
                        </div>
                    </div>

                    <div class="swiper-slide" style="height: unset">
                        <div class="video-item m-3" style="height: calc(100% - 2rem)">
                            <figure class="ratio ratio-16x9"><img src="https://natural.clinic/wp-content/uploads/2023/09/Group-4443.webp" class="w-100 h-100 of-cover" alt="Michele Morrone"></figure>
                            <div class="content"><a href="https://www.youtube.com/watch?v=PB6YdPFqbQI" rel="noopener external" data-fslightbox="video" class="title stretched-link" title="Michele Morrone">Nicolo Zaniolo</a><a href="https://www.youtube.com/watch?v=PB6YdPFqbQI" class="play ms-3" aria-label="Michele Morrone"><svg class="cvzicon"><use xlink:href="assets/img/icons.svg#play-video"></use></svg></a></div>
                        </div>
                    </div>

                    
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    

    <section class="home-before-after pt-4">
        <div class="container">
            <div
                class="header-2 mb-lg-5 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center align-items-start gap-2 w-100">
                <div class="l-side">
                    <div class="title"><span class="fw-semi-bold fs-normal text-primary d-inline-block">Medescare </span>
                        Foto Galeria</div>
                    <p>Klikoni mbi foto për më shumë foto të ngjajshme!</p>
                </div><a href="foto-galeria.html" title=""
                    class="text-decoration-underline fw-semi-bold"> Shiko të Gjitha</a>
            </div>
            <div class="swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="image-item"><a href="/photo-gallery"
                                class="ratio ratio-1x1 d-block"><img
                                    data-src="https://natural.clinic/wp-content/uploads/2023/08/dental-implant-a7-1.webp" class="w-100 h-100 of-cover"
                                    alt="Medescare | Clinic"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-item"><a href="/photo-gallery"
                                class="ratio ratio-1x1 d-block"><img
                                    data-src="https://natural.clinic/wp-content/uploads/2023/08/hair-transplant-a16.jpg" class="w-100 h-100 of-cover"
                                    alt="Medescare | Clinic"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-item"><a href="/photo-gallery"
                                class="ratio ratio-1x1 d-block"><img
                                   data-src="https://natural.clinic/wp-content/uploads/2023/07/rhinoplasy-surgery.png"
                                    class="w-100 h-100 of-cover" alt="Medescare | Clinic"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-item"><a href="/photo-gallery"
                                class="ratio ratio-1x1 d-block"><img
                                    data-src="https://natural.clinic/wp-content/uploads/2023/07/breast-surgery.png"
                                    class="w-100 h-100 of-cover" alt="Medescare | Clinic"></a></div>
                    </div>


                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>


    <section class="showcase-blogs pt-4">
        <div class="container">
            <div class="header-2 mb-lg-5 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center align-items-start gap-3 w-100">
                <div class="l-side">
                    <div class="title"><span class="fw-semi-bold fs-normal text-primary d-inline-block">Medescare </span> Medical Articles</div>
                    <p>For more similar articles click <a href="/blog" title="here" class="fw-bold">here</a></p>
                </div>
            </div>
            <div class="row gy-lg-4 gy-2">
                <div class="col-lg-6">
                    @foreach(GetData('blog', ['Status'=>'1'],1) as $Blog)
                        <div class="showcase-blog-item ratio first"><img data-src="{{ $Blog['Img'] }}" alt="{{ $Blog['Title'] }}">
                            <div class="title">{{ $Blog['Title'] }}</div><a href="/bog/{{ $Blog['Slug'] }}" title="{{ $Blog['Title'] }}" aria-label="{{ $Blog['Title'] }}"></a>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <div class="row gy-lg-4 gy-2">
                        @foreach(GetData('blog', ['Status'=>'1'],2,['Id','desc']) as $Blog)
                            <div class="col-lg-12 col-md-6">
                                <div class="showcase-blog-item ratio ratio-21x9"><img data-src="{{ $Blog['Img'] }}" alt="{{ $Blog['Title'] }}">
                                    <div class="title">{{ $Blog['Title'] }}</div><a href="/blog/{{ $Blog['Slug'] }}" title="{{ $Blog['Title'] }}" aria-label="{{ $Blog['Title'] }}"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <div class="home-others">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="home-doctors py-lg-5 pt-4">
                        <div class="header mb-lg-5 d-flex flex-column flex-sm-row align-items-sm-center align-items-start justify-content-between">
                            <div class="header-2">
                                <div class="title ln-1">Meet Our Collaborating Doctors</div>
                            </div>
                            <div class="actions d-flex align-items-center mt-2 mt-sm-0">
                                <a role="button" class="btn btn-outline-color-1 p-0 ln-0 swp-btn prev d-none d-sm-inline-block" title="You can continue by clicking on the icons to get more information.">
                                    <svg class="cvzicon">
                                        <use xlink:href="assets/img/icons.svg#angle-left"></use>
                                    </svg>
                                </a>
                                <a role="button" class="btn btn-outline-color-1 p-0 ln-0 swp-btn next d-none d-sm-inline-block" title="You can continue by clicking on the icons to get more information.">
                                    <svg class="cvzicon">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach(GetData('doctor',['Status'=>'1']) as $Doctor)
                                <div class="swiper-slide">
                                    <div class="doctor-item">
                                        <figure class="mb-0 ratio">
                                            <img src="{{$Doctor['Img']}}" class="w-100 h-100 of-cover" alt="{{$Doctor['Title']}}">
                                        </figure>
                                        <div class="overlay">
                                            <div class="content">
                                                <div class="title">{{$Doctor['Title']}}</div>
                                                <div class="department mt-0">{{$Doctor['Info']}}</div>
                                                <div class="desc">{{$Doctor['Description']}}</div>
                                                @if(trim($Doctor['Path'])!='') 
                                                    <a href="{{$Doctor['Path']}}" class="btn btn-white text-primary w-100 rounded-pill" title="View Profile">View Profile</a>
                                                @endif
                                                <a href="/appointment" target="_blank" rel="internal" class="btn btn-white text-primary w-100 rounded-pill" title="Book Appointment">Book Appointment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <!-- <div class="d-flex justify-content-center mt-3"><a href="doctors.html" class="text-decoration-underline fw-semi-bold"> View All</a></div> -->
                    </div>
                </div>
                <div class="col-md-5 py-lg-5 pt-4">
                    <div class="home-feedbacks">
                        <div class="header mb-lg-5 d-flex flex-column flex-sm-row align-items-sm-center align-items-start justify-content-between">
                            <div class="header-2">
                                <div class="title ln-1">Our Patients</div>
                                <p>Comments from our patients about us.</p>
                            </div>
                            <div class="actions d-flex align-items-center mt-2 mt-sm-0">
                                <a role="button" class="btn btn-outline-color-1 p-0 ln-0 swp-btn prev d-none d-md-inline-block" title="Comments from our patients about us.">
                                    <svg class="cvzicon">
                                        <use xlink:href="assets/img/icons.svg#angle-left"></use>
                                    </svg>
                                </a>
                                <a role="button" class="btn btn-outline-color-1 p-0 ln-0 swp-btn next d-none d-md-inline-block" title="Comments from our patients about us.">
                                    <svg class="cvzicon">
                                        <use xlink:href="assets/img/icons.svg#angle-right"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="feedback-item">
                                        <div class="image mb-3">
                                            <img data-src="/assets/img/profile/Default.png" class="w-100 h-100 of-cover" alt="Bedri Rexha">
                                        </div>
                                        <div class="name mb-3">
                                            <div class="title">Bedri Rexha</div>
                                            <div class="subtitle">Stomach Narrowing</div>
                                        </div>
                                        <div class="comment mb-2">
                                            <p style="text-align: center;">We had a very good experience at this hospital, thank you for your hospitality and kindness.</p>
                                            <p style="text-align: center;"><a href="https://www.google.com/maps/contrib/103879953580156472873?hl=en-US&amp;ved=1t:31294&amp;ictx=111">Comment on Google review</a></p>
                                        </div>
                                        <!-- <a href="patients/bedri-rexha.html" class="stretched-link"></a> -->
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="feedback-item">
                                        <div class="image mb-3">
                                            <img data-src="/assets/img/profile/Default.png" class="w-100 h-100 of-cover" alt="Besnik Alili">
                                        </div>
                                        <div class="name mb-3">
                                            <div class="title">Besnik Alili</div>
                                            <div class="subtitle">Medical Treatment</div>
                                        </div>
                                        <div class="comment mb-2">
                                            <p style="text-align: center;">You are a wonderful staff, thank you for everything.</p>
                                            <p style="text-align: center;"><a href="https://www.google.com/maps/contrib/100299885570583339168?hl=en-US&amp;ved=1t:31294&amp;ictx=111">Comment on Google review</a></p>
                                        </div>
                                        <!-- <a href="patients/besnik-alili.html" class="stretched-link"></a> -->
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="feedback-item">
                                        <div class="image mb-3">
                                            <img data-src="/assets/img/profile/Default.png" class="w-100 h-100 of-cover" alt="Skender Selmani">
                                        </div>
                                        <div class="name mb-3">
                                            <div class="title">Skender Selmani</div>
                                            <div class="subtitle">Stomach Narrowing</div>
                                        </div>
                                        <div class="comment mb-2">
                                            <p>I highly recommend this center, excellent doctors and staff, and everyone is so good and very good at their work.</p>
                                            <p><a href="https://www.google.com/maps/contrib/116984871427299455564/photos/@42.6598464,21.1614429,17z/data=!4m3!8m2!3m1!1e1?hl=en-US&amp;entry=ttu">Comment on Google review</a></p>
                                        </div>
                                        <!-- <a href="patients/skender-selmani.html" class="stretched-link"></a> -->
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="feedback-item">
                                        <div class="image mb-3">
                                            <img data-src="/assets/img/profile/Default.png" class="w-100 h-100 of-cover" alt="Elvis Rrashi">
                                        </div>
                                        <div class="name mb-3">
                                            <div class="title">Elvis Rrashi</div>
                                            <div class="subtitle">Medical Treatment</div>
                                        </div>
                                        <div class="comment mb-2">
                                            <p style="text-align: center;">Very satisfied with the entire Një Mjek staff. From the organizers to the doctors. May Allah reward brother Ekrem and Medina with good in this world and in the hereafter.</p>
                                            <p style="text-align: center;"><a href="https://g.co/kgs/YB2soR4">Comment on Google Review</a></p>
                                        </div>
                                        <!-- <a href="patients/elvis-rrashi.html" class="stretched-link"></a> -->
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="feedback-item">
                                        <div class="image mb-3">
                                            <img data-src="/assets/img/profile/Default.png" class="w-100 h-100 of-cover" alt="Eralda Shala">
                                        </div>
                                        <div class="name mb-3">
                                            <div class="title">Eralda Shala</div>
                                            <div class="subtitle">Stomach Narrowing</div>
                                        </div>
                                        <div class="comment mb-2">
                                            <p style="text-align: center;">I am very satisfied with the Një Mjek team. They are there for you at any time. The doctors are specialists and the hospital is of high standards. ❤️</p>
                                            <p style="text-align: center;"><a href="https://g.co/kgs/JnKT95K">Comment on Google Review</a></p>
                                        </div>
                                        <!-- <a href="patients/eralda-shala.html" class="stretched-link"></a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <!-- <div class="d-flex justify-content-center mt-3"><a href="patients.html" class="text-decoration-underline fw-semi-bold"> View All</a></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="home-offer pt-4 py-xl-5">
        <div class="container">
            <div class="header-2 mb-lg-5">
                <div class="title ln-1">Get a Free Offer</div>
                <p>Please fill out the form below to get an offer from us immediately!</p>
            </div>
            <form action="ajax" id="AppointmentForm" method="POST" class="offer-form no-ajax" target="MakeAppointment">
                <input type="hidden" name="url" value="home">
                <div class="row g-lg-4 g-2">
                    <div class="col-md-4 form-group">
                        <svg class="cvzicon icon">
                            <use xlink:href="assets/img/icons.svg#user"></use>
                        </svg>
                        <input type="text" name="FullName" class="form-control rounded-pill" placeholder="Full Name">
                    </div>
                    <div class="col-md-4 form-group">
                        <svg class="cvzicon icon">
                            <use xlink:href="assets/img/icons.svg#envelope-light"></use>
                        </svg>
                        <input type="email" name="Mail" class="form-control rounded-pill" placeholder="E-mail">
                    </div>
                    <div class="col-md-4 form-group">
                        <svg class="cvzicon icon">
                            <use xlink:href="assets/img/icons.svg#phone-alt-2"></use>
                        </svg>
                        <input type="tel" name="Cell" class="form-control rounded-pill" placeholder="Phone">
                    </div>
                    <div class="col-12 form-group">
                        <svg class="cvzicon comment icon">
                            <use xlink:href="assets/img/icons.svg#comment"></use>
                        </svg>
                        <textarea name="Message" class="form-control" rows="5" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="row mt-0 mt-lg-4 gy-lg-3 gy-2 align-items-center">
                    <div class="col-xxl-3 col-lg-5">
                        <div class="file w-100">
                            <div class="file-name">Upload File</div>
                            <button onclick="javascript:$('#UploadInput').click();" type="button" class="fileselect" title="Upload File">
                                <svg class="cvzicon">
                                    <use xlink:href="assets/img/icons.svg#upload"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-7">
                        <div class="form-check">
                            <input class="form-check-input border-light text-dark" type="checkbox" name="kvkk" id="kvkk" required>
                            <label class="form-check-label bg-white text-dark" for="kvkk">
                                I have read and accepted the explanatory text of the Personal Data Protection Law. 
                                <span class="show_kvkk cursor-pointer" title="Personal Data Protection Law">
                                    <u>Personal Data Protection Law.</u>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-xxl-3 d-flex justify-content-xxl-end">
                        <button type="submit" class="btn submit btn-primary fw-semi-bold rounded-pill">
                            Submit your request for an offer.
                            <svg class="cvzicon">
                                <use xlink:href="assets/img/icons.svg#angle-right"></use>
                            </svg>
                        </button>
                    </div>
                   <!--  <div class="col-12">
                        <div class="g-recaptcha mb-4" data-sitekey="asdfasdfasdfasdfasdfasdfsdfadsf"></div>
                    </div> -->
                </div>
                <input type="hidden" name="FilePath">
            </form>
        </div>
    </div>
    
    <form id="FileUploadForm" callback="javascript:FileUploaded2('{url}');" action="ajax" method="POST" target="UploadFile" >  
    @csrf()              
    <div class="mb-3">
      <div class="col-sm-8 col-md-9 col-lg-10">
          <div class="col-auto">
            <div class="sw-6 sw-xl-14">
              <input id="UploadInput" onchange="javascript:$(this).parent().children('button[type=submit]').click();" type="file" hidden name="File">
              <button type="submit" hidden class="btn submit">submit</button>
            </div>
          </div>
      </div>
    </div> 

    </form>
    <script type="text/javascript">
      function FileUploaded2(url){
        $('.file-name').text('Dosya yüklendi');
        $('.file').css('border','2px solid green');
        $('#AppointmentForm input[name=FilePath]').val(url);
      }
    </script>

    <div class="home-socials pt-5 py-xxl-3">
        <div class="container">
            <div class="row gy-md-5 gy-4">
                <div class="col-md-6">
                    <div class="social instagram">
                        <figure><img src="assets/img/ins-1.png" alt="Instagram" width="145" height="218"></figure>
                        <div class="content">
                            <div class="title"><span>Follow us on</span> Instagram</div>
                            <p>@nje_mjek on Instagram, you can follow us to stay informed about our work</p>
                        </div>
                        <a href="https://www.instagram.com/nje_mjek/" target="_blank" rel="noopener external" class="stretched-link">
                            <img src="assets/img/ins-2.svg" alt="Instagram" width="110" height="110">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social whatsapp">
                        <figure><img src="assets/img/wats-1.png" alt="WhatsApp" width="145" height="218"></figure>
                        <div class="content">
                            <div class="title"><span>You can contact us</span> Through WhatsApp</div>
                            <p>Through the number +905415573736, you can write or call us directly by clicking on the icon.</p>
                        </div>
                        <a href="https://wa.me/+905415573736" rel="noopener external" target="_blank" class="stretched-link">
                            <img src="assets/img/wats-2.svg" alt="WhatsApp" width="110" height="110">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <div class="stats py-lg-5 py-4">
        <div class="container">
            <div class="row g-lg-4 g-2 justify-content-around align-items-center">
                <div class="col-sm-auto col-12 stats-item" style="min-height: 80px">
                    <figure><img data-src="assets/uploads//2023/05/stats-icon-01.webp" alt="Years of Experience"></figure>
                    <div class="right-side d-flex align-items-center">
                        <div class="count"><span class="number" data-end="5"> 5</span><span>+</span></div>
                        <div class="desc">Years of Experience</div>
                    </div>
                </div>
                <div class="col-sm-auto col-12 stats-item" style="min-height: 80px">
                    <figure><img data-src="assets/uploads//2022/09/4-01-1.svg" alt="Happy Patients"></figure>
                    <div class="right-side d-flex align-items-center">
                        <div class="count"><span class="number" data-end="1000"> 1000</span><span>+</span></div>
                        <div class="desc">Happy Patients</div>
                    </div>
                </div>
                <div class="col-sm-auto col-12 stats-item" style="min-height: 80px">
                    <figure><img data-src="assets/uploads//2022/09/3-01-1.svg" alt="Partner Hospitals"></figure>
                    <div class="right-side d-flex align-items-center">
                        <div class="count"><span class="number" data-end="10"> 10</span><span>+</span></div>
                        <div class="desc">Partner Hospitals</div>
                    </div>
                </div>
                <div class="col-sm-auto col-12 stats-item" style="min-height: 80px">
                    <figure><img data-src="assets/uploads//2022/09/2-01-1.svg" alt="Qualified Doctors"></figure>
                    <div class="right-side d-flex align-items-center">
                        <div class="count"><span class="number" data-end="150"> 150</span><span>+</span></div>
                        <div class="desc">Qualified Doctors</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="home-partners py-lg-5 pt-4 pb-5 py-xxl-6">
        <div class="container">
            <div class="header-2 w-100 mb-lg-5 mw d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between">
                <div class="title ln-1">Our Trusted Partners</div>
            </div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img src="assets/img/medical-park.webp" alt="Medical Park Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Medical Park Hospital</div>
                                <div class="page-content">Medical Park Hospitals Group is Turkey's largest private hospital group with 29 hospitals in 14 cities, with an indoor area of over 760 thousand square meters, 200 operating rooms, and 5,200 beds continuously increasing since 1993.</div>
                            </div>
                            <!-- <a href="partners/medical-park-hospital.html" class="stretched-link" title aria-label="Medical Park Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img src="assets/img/liv-hospi.webp" alt="Liv Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Liv Hospital</div>
                                <div class="page-content">Liv Hospital Group consists of 154 beds, 8 operating rooms, and 50 clinics in a closed area of 30 thousand square meters.</div>
                            </div>
                            <!-- <a href="partners/liv-hospital.html" class="stretched-link" title aria-label="Liv Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img src="assets/img/medicana.webp" alt="Medicana Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Medicana Hospital</div>
                                <div class="page-content">Medicana Healthcare Group began medical services in 1992 with an experienced and specialized team, focusing on patient satisfaction and providing specialized services in the healthcare sector. Its hospitals and services fully comply with the Ministry of Health's Service Quality Standards and the Joint Commission International (JCI) accreditation standards.</div>
                            </div>
                            <!-- <a href="partners/medicana-hospital.html" class="stretched-link" title aria-label="Medicana Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img data-src="assets/uploads//2024/03/memorial-hospital.webp" alt="Memorial Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Memorial Hospital</div>
                                <div class="page-content">Memorial Hospital Group was the first Turkish hospital to be accredited by JCI (Joint Commission International) - the gold standard in healthcare, and operates under "Memorial Health Investments Corporation".</div>
                            </div>
                            <!-- <a href="partners/memorial-hospital.html" class="stretched-link" title aria-label="Memorial Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img src="assets/img/gaziosmanpasa-hos.webp" alt="Gaziosmanpaşa Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Gaziosmanpaşa Hospital</div>
                                <div class="page-content">Yeni Yüzyıl University Gaziosmanpaşa Hospital began serving in 1992. The hospital has 12 operating rooms, a capacity of 350 beds, a conference hall with a capacity of 150 people, a central automation system, and provides accommodation for the relatives of patients coming from other countries.</div>
                            </div>
                            <!-- <a href="partners/gaziosmanpasa-hospital.html" class="stretched-link" title aria-label="Gaziosmanpaşa Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img data-src="assets/uploads//2024/03/medipol-hospital.webp" alt="Medipol Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Medipol Hospital</div>
                                <div class="page-content">Medipol University Hospital is Turkey's largest private healthcare investment as a university hospital, covering general surgery, cardiovascular surgery, oncology, and dental services. Medipol University Hospital is a new reference center in the healthcare sector both nationally and internationally.</div>
                            </div>
                            <!-- <a href="partners/medipol-hospital.html" class="stretched-link" title aria-label="Medipol Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img src="assets/img/dunyagoz-hos.webp" alt="Dünyagöz Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Dünyagöz Hospital</div>
                                <div class="page-content">Since 1996, Dünyagöz Hospitals Group has provided solutions for all types of problems related to ocular and periocular health with 500 different treatment methods offered for all eye-related issues.</div>
                            </div>
                            <!-- <a href="partners/dunyagoz-hospital.html" class="stretched-link" title aria-label="Dünyagöz Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img src="assets/img/guven-hos.webp" alt="Güven Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Güven Hospital</div>
                                <div class="page-content">With the aim of providing medical services according to international standards, Ankara Güven Hospital, established in 1975, represents a harmony of modern medicine requirements and many years of experience.</div>
                            </div>
                            <!-- <a href="partners/guven-hospital.html" class="stretched-link" title aria-label="Güven Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img data-src="assets/uploads//2024/03/gurgan-clinic-ivf-clinic-center-njemjek.webp" alt="Gürgan Clinic"></div>
                            <div class="content shadow-sm">
                                <div class="title">Gürgan Clinic</div>
                                <div class="page-content">Gürgan Clinic is one of the most exclusive clinics in the world and one of Turkey's and the capital Ankara's most well-known centers. Located in Ankara Çankaya, Mustafa Kemal district, it has been serving the world for 24 years in IVF treatment, infertility, and gynecology and obstetrics with its modern and technological building.</div>
                            </div>
                            <!-- <a href="partners/gurgan-clinic.html" class="stretched-link" title aria-label="Gürgan Clinic"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img src="assets/img/emsey-hos.webp" alt="Emsey Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Emsey Hospital</div>
                                <div class="page-content">Since 2012, Emsey Hospital has been one of Turkey's leading private hospitals, and its quality of healthcare is accredited by the international accreditation organization JCI.</div>
                            </div>
                            <!-- <a href="partners/emsey-hospital.html" class="stretched-link" title aria-label="Emsey Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img data-src="assets/uploads//2024/03/biruni-njemjek.webp" alt="Biruni University Hospital"></div>
                            <div class="content shadow-sm">
                                <div class="title">Biruni University Hospital</div>
                                <div class="page-content">Biruni University Hospital is a comprehensive hospital established to provide world-class healthcare services and train future healthcare professionals with the strength derived from education, science, and technology.</div>
                            </div>
                            <!-- <a href="partners/biruni-university-hospital.html" class="stretched-link" title aria-label="Biruni University Hospital"></a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link-item">
                            <div class="ratio ratio-4x3 image"><img src="assets/img/romatem.webp" alt="ROMATEM"></div>
                            <div class="content shadow-sm">
                                <div class="title">ROMATEM</div>
                                <div class="page-content">Romatem is the first and only healthcare brand in Turkey in the field of rehabilitation. Founded in 2005, Romatem has transformed into a network of specialized clinics in physical therapy and rehabilitation over the past decade.</div>
                            </div>
                            <!-- <a href="partners/romatem.html" class="stretched-link" title aria-label="ROMATEM"></a> -->
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <!-- <div class="d-flex justify-content-center mt-lg-5"><a href="partners.html" class="text-decoration-underline fw-semi-bold"> View All</a></div> -->
        </div>
    </div>
    

    <div class="home-content py-5">
        <div class="container">
            <div class="page-content">
                <h1>Medescare</h1>
            </div>
        </div>
    </div>
    @endsection
