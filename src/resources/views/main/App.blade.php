<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>{{Main('Title')}}</title>
    <meta name="description" content="{{Main('Description')}}" />
    <meta name="keywords" content="{{Main('KeyWords')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="public" />
    <meta http-equiv="Expires" content="360" />
    <meta http-equiv="Cache-Control" content="max-age=604800, public" />
    <meta name="apple-touch-fullscreen" content="YES" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="shortcut icon" href="{{Main('Icon')}}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{Main('Icon')}}" type="x-icon" />
    <link rel="stylesheet" href="{{asset('assets/css/maineef3.css?v=0.3')}}" />
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Medescare | Health Tourism",
            "url": "https://www.medescare.com/",
            "description": "{{Main('Title')}}"
        }
    </script>
    <base href="http://localhost:8088/">
    <meta property="og:image" content="assets/uploads/2023/05/medworld-gastric-balloon.webp">
    <meta name="twitter:image:src" content="assets/uploads/2023/05/medworld-gastric-balloon.webp">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:domain" content="www.medescare.com">
    <meta name="twitter:url" content="{{$_SERVER['SERVER_NAME']}}">
    <meta property="og:title" content="{{Main('Title')}}" />
    <meta property="og:description"
        content="Sağlık Turizmi" />
    <meta property="og:url" content="https://www.medescare.com/categories" />
    <meta property="og:type" content="article" />
   <!--  <link rel="canonical" href="/home" />
    <link rel="alternate" hreflang="x-default" href="balon-gastrik.html"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css">
    @yield('style')
</head>
<style type="text/css">
    body {
        display: none;
    }
</style>
<div class="preloader"><img style="width: 5%!important;" src="{{asset('assets/icon/favicon.png')}}" alt="Medescare"></div>



<header style="display: none;">
    <div class="container">
        <div class="header__top d-flex align-items-center justify-content-end">
            <ul class="social d-none d-lg-flex align-items-center">
                <li><a href="{{Main('Facebook')}}" target="_blank" rel="nofollow external"
                        title="facebook" alt="facebook"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#facebook-f')}}"></use>
                        </svg></a></li>
                <li><a href="{{Main('Instagram')}}" target="_blank" rel="nofollow external"
                        title="instagram"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#instagram')}}"></use>
                        </svg></a></li>
                <li><a href="{{Main('Youtube')}}" target="_blank" rel="nofollow external"
                        class="yt" title="youtube"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#youtube-brand')}}"></use>
                        </svg></a></li>
                <li><a href="{{Main('Tiktok')}}" target="_blank" rel="nofollow external"
                        title="tiktok"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#tiktok')}}"></use>
                        </svg></a></li>
            </ul>
            <ul class="contact-info d-flex align-items-center">
                <li><span class="icon"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#phone-alt-2')}}"></use>
                        </svg></span>
                    <div><span class="text">Phone</span><a href="tel:{{Main('Whatsapp')}}"
                            rel="noopener external" class="stretched-link" title="Whatsapp">{{Main('Whatsapp')}}</a>
                    </div>
                </li>
                <li><span class="icon"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#envelope-light')}}"></use>
                        </svg></span>
                    <div><span class="text">Email</span><a href="mailto:{{Main('Mail')}}" class="stretched-link"
                            title="email">{{Main('Mail')}}</a></div>
                </li>
            </ul>
            <div class="contact d-xxl-none d-sm-block d-none"><button class="dropdown-toggle rounded-pill"
                    type="button" id="langmenu" data-bs-toggle="dropdown" aria-expanded="false"> Would
                    You Like Us to Call You?</button>
                <div class="sub-menu">
                    <div class="sub-menu-arrow"></div>
                    <div class="content">
                        <ul>
                            <li><a href="https://wa.me/{{Main('Whatsapp')}}" target="_blank" rel="noopener external"
                                    class="stretched-link" title="Whatsapp"><img
                                        data-src="{{asset('assets/img/pp_whatsapp.svg')}}" alt="WhatsApp" title="WhatsApp"></a>
                                <div class="text">Whatsapp</div>
                            </li>
                            <li><a href="viber://chat?number={{Main('Tell')}}" target="_blank" class="stretched-link"
                                    rel="noopener external" title="Viber"><img data-src="{{asset('assets/img/pp_viber.svg')}}"
                                        alt="Viber" title="Viber"></a>
                                <div class="text">Viber</div>
                            </li>
                            <li><a href="tel:{{Main('Tell')}}" class="stretched-link" rel="noopener external"
                                    title="phone"><img data-src="{{asset('assets/img/pp_phone.svg')}}" alt="Phone"
                                        title="Phone"></a>
                                <div class="text">Phone</div>
                            </li>
                            <li><a role="button" target="_blank" rel="noopener" class="stretched-link"
                                    data-bs-toggle="modal" data-bs-target="#open_call_form" title="Form"><img
                                        data-src="{{asset('assets/img/pp_form.svg')}}" alt="Would You Like Us to Call You?"
                                        title="Would You Like Us to Call You?"></a>
                                <div class="text">Would You Like Us to Call You?</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bottom"><a href="/home" class="logo"><img src="{{Main('AlternativeLogo')}}"
                    alt="{{Main('Title')}}" title="{{Main('Title')}}" width="215" height="49"><img
                    data-src="{{Main('Logo')}}" alt="{{Main('Title')}}" title="{{Main('Title')}}" class="d-none logo-dark"
                    width="215" height="49"></a>
            <ul class="menu">
                <li class="menu-item"><a href="/categories" title="Medical Units">Medical Units</a>
                    <div class="sub-menu">
                        <div class="sub-menu-arrow"></div>
                        <div class="content">
                            <ul>
                                @foreach(Categories() as $Category)
                                    <li><a href="/categories/{{$Category['Slug']}}" title="{{$Category['Title']}}">{{$Category['Title']}}</a></li>
                                @endforeach
                                <li>
                                    <a href="/categories" title="See All">See All
                                        <svg class="cvzicon">
                                            <use xlink:href="{{asset('assets/img/icons.svg#angle-double-right')}}"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>


                    @foreach(Categories(['Status'=>'1','FadeIn'=>'1']) as $Category)
                    <li class="menu-item"><a href="/treatments/{{$Treatment['Slug']}}" class="menu-link" title="Obesity">Obesity</a>
                                    <div class="sub-menu">
                                        <div class="sub-menu-arrow"></div>
                                        <div class="content">
                                            <ul>
                                    @foreach($Category['Treatments'] as $Treatment)
                                
                                                <li><a href="/treatments/{{$Treatment['Slug']}}"
                                                        title="{{$Treatment['Title']}}">{{$Treatment['Title']}}</a></li>
                                    @endforeach
                                    <li><a href="/categories/" title="See All"> See All<svg
                                                            class="cvzicon">
                                                            <use xlink:href="{{asset('assets/img/icons.svg#angle-double-right')}}"></use>
                                                        </svg></a></li>


                                                        </ul>
                                        </div>
                                    </div>
                                </li>
                    @endforeach




                <li class="menu-item"><a role="button" class="menu-link" title="Media">Media</a>
                    <div class="sub-menu">
                        <div class="sub-menu-arrow"></div>
                        <div class="content">
                            <ul>
                                <!-- <li><a href="lajme.html" title="News">News</a></li> -->
                                <li><a href="/blog" title="Blog">Blog</a></li>
                                <!-- <li><a href="katalogjet.html" title="Catalogs">Catalogs</a></li> -->
                                <li><a href="/video-gallery" title="Video Gallery">Video Gallery</a></li>
                                <li><a href="/photo-gallery" title="Photo Gallery">Photo Gallery</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="menu-item"><a href="/about" title="About Us">About Us</a>
       <!--              <div class="sub-menu">
                        <div class="sub-menu-arrow"></div>
                        <div class="content">
                            <ul>
                                <li><a href="about.php" title="About Us">About Us</a></li>
                                <li><a href="about.php" title="Our Trusted Doctors">Our Trusted Doctors</a></li>
                                <li><a href="about.php" title="Our Trusted Partners">Our Trusted Partners</a></li>
                                <li><a href="about.php" title="Our Team">Our Team</a></li>
                            </ul>
                        </div>
                    </div> -->
                </li>
                <li class="menu-item"><a href="/contact" class="menu-link" title="Contact">Contact</a></li>
                <li class="menu-item mobile"><a role="button" class="menu-link" title="Menu"><svg class="cvzicon">
                        <use xlink:href="{{asset('assets/img/icons.svg#bars-light')}}"></use>
                    </svg> Menu</a></li>
            </ul>
            <div class="contact d-none d-xxl-block"><button class="dropdown-toggle rounded-pill" type="button"> Would
                    You Like Us to Call You?</button>
                <div class="sub-menu">
                    <div class="sub-menu-arrow"></div>
                    <div class="content">
                        <ul>
                            <li><a href="https://wa.me/{{Main('Whatsapp')}}" rel="noopener external" target="_blank"
                                    class="stretched-link" rel="noopener" title="Whatsapp"><img
                                        data-src="{{asset('assets/img/pp_whatsapp.svg')}}" alt="WhatsApp" title="WhatsApp"></a>
                                <div class="text">Whatsapp</div>
                            </li>
                            <li><a href="viber://chat?number={{Main('Tell')}}" target="_blank" class="stretched-link"
                                    rel="noopener" title="Viber"><img data-src="/assets/img/pp_viber.svg"
                                        alt="Viber" title="Viber"></a>
                                <div class="text">Viber</div>
                            </li>
                            <li><a href="tel:{{Main('Tell')}}" target="_blank" class="stretched-link" rel="noopener"
                                    title="Phone"><img data-src="{{asset('assets/img/pp_phone.svg')}}" alt="Phone"
                                        title="Phone"></a>
                                <div class="text">Phone</div>
                            </li>
                            <li><a role="button" rel="noopener" target="_blank" class="stretched-link"
                                    data-bs-toggle="modal" data-bs-target="#open_call_form" title="Form"><img
                                        data-src="{{asset('assets/img/pp_form.svg')}}" alt="Would You Like Us to Call You?"
                                        title="Would You Like Us to Call You?"></a>
                                <div class="text">Would You Like Us to Call You?</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
 <!-- header --> 

@yield('content')

 <!-- footer --> 
 <footer>
    <div class="container">
        <div class="footer__top"><a href="/home" class="logo" title="{{Main('Title')}}">
            <img src="{{Main('AlternativeLogo')}}" style="margin-top: 75px;" width="215" height="49" alt="{{Main('Title')}}"
                    title="{{Main('Item')}}"></a>
            <ul class="social">
                <li><a href="{{Main('Facebook')}}" target="_blank" rel="nofollow external"
                        title="Facebook"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#facebook-f')}}"></use>
                        </svg></a></li>
                <li><a href="{{Main('Instagram')}}" target="_blank" rel="nofollow external"
                        title="Instagram"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#instagram')}}"></use>
                        </svg></a></li>
                <li><a href="{{Main('Youtube')}}" target="_blank" rel="nofollow external"
                        class="yt" title="Youtube"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#youtube')}}"></use>
                        </svg></a></li>
                <li><a href="{{Main('Tiktok')}}" target="_blank" rel="nofollow external"
                        title="Tiktok"><svg class="cvzicon">
                            <use xlink:href="{{asset('assets/img/icons.svg#tiktok')}}"></use>
                        </svg></a></li>
            </ul>
        </div>
        <div class="row gx-4 gy-4 gy-lg-0 menu-area justify-content-between mt-4 my-sm-6">
            <div class="col-sm-auto">
                <div class="title">Menu</div>
                <ul class="menu">
                    <li><a href="/categories" title="Services">Services</a></li>
                    <li><a href="/photo-gallery" title="Photo Gallery">Photo Gallery</a></li>
                    <li><a href="/video-gallery" title="Video Gallery">Video Gallery</a></li>
                    <li><a href="/about" title="About Us">About Us</a></li>
                    <li><a href="/contact" title="Contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-sm-auto d-none d-sm-block">
                <div class="title">Services</div>
                <ul class="menu">
                    <li><a href="/categories" title="Medical Units">MEDICAL UNITS</a></li>
                    <li><a href="/categories/{{GetData('category',['Id'=>'5'])['Slug']}}" title="Obesity"> {{Categories(['Id'=>'5'])[0]['Title']}}</a></li>
                    <li><a href="/categories/{{GetData('category',['Id'=>'5'])['Slug']}}" title="Aesthetic"> {{Categories(['Id'=>'3'])[0]['Title']}}</a></li>
                    <li><a href="/categories/{{GetData('category',['Id'=>'5'])['Slug']}}" title="Hair"> {{Categories(['Id'=>'1'])[0]['Title']}}</a></li>
                </ul>
            </div>
            <div class="col-sm-auto d-none d-sm-block">
                <div class="title">Media</div>
                <ul class="menu">
                    <li><a href="/blog" title="Blog">Blog</a></li>
                    <li><a href="/video-gallery" title="Video Gallery">Video Gallery</a></li>
                    <li><a href="/photo-gallery" title="Photo Gallery">Photo Gallery</a></li>
                </ul>
            </div>
            <div class="col-sm-auto d-none d-sm-block">
                <div class="title"><a href="#" rel="noopener" data-bs-toggle="modal"
                        data-bs-target="#cooperation_form" title="For Cooperation"> For Cooperation</a></div>
                <div class="page-content text-white"> </div><a
                    href="{{Main('Location')}}"
                    target="_blank" rel="nofollow external" title="Google Reviews">
                    	<img data-src="{{Main('Logo')}}" width="175" class="img-fluid rounded-3" alt="Google Reviews" title="Google Reviews">
                    </a>
            </div>
            <div class="col-lg-3 mt-5 mt-lg-0">
                <div class="title">Contact</div>
                <ul class="menu">
                    <li class="contact position-relative"><span></span> {{Main('Address')}}<a href="{{Main('Location')}}"
                            title="Google Maps" target="_blank" rel="noopener external"
                            class="map-link stretched-link"></a> </li>
                    <li class="contact"><span>T.</span>
                        <div class>
                             <a href="https://wa.me/{{Main('Whatsapp')}}" target="_blank" rel="noopener external"
                                class="d-block">{{Main('Whatsapp')}}
                            </a> 
                               
                               
                            </div>
                    </li>
                    <li class="contact"><span>M.</span><a href="mailto:{{Main('Mail')}}"
                            title="{{Main('Mail')}}">{{Main('Mail')}}</a></li>
                </ul>
            </div>
        </div>
       
        <div class="row copyr mt-4 g-2">
            <div class="col-md-6 text-center text-md-start"> Copyright © 2024 <b>Medescare</b> All rights reserved.
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center justify-content-md-end">
                <ul class="flex-wrap justify-content-center align-items-center align-items-sm-start justify-content-sm-start">
                    <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
                 
                </ul>
            </div>
        </div>
        
    </div>
</footer>


<nav class="panel-menu">
    <ul>

        @foreach(Categories() as $Category)
            <li><a href="#" title="{{$Category['Title']}}">{{$Category['Title']}}</a>
                @if($Category['Treatments'])
                <ul>
                    @foreach($Category['Treatments'] as $Treatment)
                        <li><a href="/treatments/{{$Treatment['Slug']}}" title="{{$Treatment['Title']}}">{{$Treatment['Title']}}</a></li>                    
                    @endforeach
                    <li><a href="/categories/{{$Category['Slug']}}" title="View All">View All</a></li>
                </ul>
                @endif
            </li>
        @endforeach

        <li><a role="button" title="Media">Media</a>
            <ul>
                <li><a href="/blog" title="Blog">Blog</a></li>
                <li><a href="/video-gallery" title="Video Gallery">Video Gallery</a></li>
                <li><a href="/photo-gallery" title="Photo Gallery">Photo Gallery</a></li>
            </ul>
        </li>
        <li><a href="/about" title="Contact">About Us</a></li>
<!--         <li><a role="button" title="About Us">About Us</a>
            <ul>
                <li><a href="rreth-nesh.html" title="About Us">About Us</a></li>
                <li><a href="partneret.html" title="Our Trusted Partners">Our Trusted Partners</a></li>
                <li><a href="mjeket.html" title="Our Trusted Doctors">Our Trusted Doctors</a></li>
                <li><a href="policies/politika-e-privat-sis-1.html" title="Privacy Policy">Privacy Policy</a></li>
                <li><a role="button" title="Our Offices" data-bs-toggle="modal" data-bs-target="#officesModal" class="item">Our Offices</a></li>
                <li><a href="ekipi-yne.html" title="Our Team">Our Team</a></li>
            </ul>
        </li> -->
        <li><a href="/contact" title="Contact">Contact</a></li>
    </ul>
    <div class="mm-navbtn-names">
        <div class="mm-closebtn">Close</div>
        <div class="mm-backbtn">Back</div>
    </div>
</nav>

<div class="whatsapp_pp">
    <div class="close_pp"></div>
    <div class="head_pp">
        <div class="user-img">
            <div class="img-content">
                <!-- <div class="img"></div> -->
                <img style="width: 25px;" src="{{Main('Icon')}}">
            </div>
        </div>
        <div class="user-info">
            <div class="user-name">Medescare</div>
            <div class="user-job">Support</div>
        </div>
    </div>
    <div class="wp-content-panel">
        <div class="content-message">
            <div class="message">
                <div class="sender">Medescare</div>
                <div class="mcontent">
                    <p>Hello!</p> Do you have any questions? You can write to us!
                </div>
                <div class="mtime">17:21</div>
            </div>
        </div>
    </div><a
        href="https://api.whatsapp.com/send?phone={{Main('Whatsapp')}}&amp;text=Hello,%20I%20am%20contacting%20you%20for%20information%20through%20your%20website%20medescare.com."
        target="_blank" class="button_pp" rel="noopener external"><svg width="20" height="20" viewBox="0 0 90 90"
            xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"
            class="WhatsappButton__Icon-jyajcx-0 jkaHSM">
            <path
                d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522 c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982 c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537 c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938 c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537 c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333 c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882 c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977 c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344 c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223 C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z">
            </path>
        </svg> Start Chat</a>
</div>


<div class="whatsapp_bubble"><svg viewBox="0 0 90 90" fill="rgb(255, 255, 255)" width="28" height="28">
    <path
        d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522 c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982 c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537 c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938 c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537 c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333 c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882 c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977 c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344 c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223 C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z">
    </path>
</svg>
</div>


<div class="modal fade" id="open_call_form" tabindex="-1" aria-labelledby="open_call_formLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header"><span class="modal-title" id="open_call_formLabel">Call Us?</span><button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button></div>
            <div class="row align-items-center">
                <div class="col-lg-5 text-center"><img data-src="assets/uploads/2022/06/12344.png" class="img-fluid" alt
                        style="max-height: 400px"></div>
                <div class="col-lg-7">
                    <form action="https://www.medescare.com/ajax/callform" class="no-ajax mt-3" method="POST"> <input
                            type="hidden" name="url" value="balon-gastrik.html#open_call_form">
                        <div class="modal-body pb-0">
                            <div class="mb-3">
                                <div class="wacu-input-label"> Full Name</div><input type="text" name="name"
                                    value class="form-control" />
                            </div>
                            <div class="mb-3">
                                <div class="wacu-input-label">Phone</div><input type="tel" name="tel" value
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <div class="wacu-input-label">Message</div><textarea name="message"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-check"><input class="form-check-input border-light text-dark" checked
                                    type="checkbox" name="kvkk" id="callformkvkk" required><label
                                    class="form-check-label bg-white text-dark" for="callformkvkk"> I have read and accept the personal data protection law. <span
                                        class="show_kvkk cursor-pointer"
                                        title="Personal Data Protection Law"> <u>Personal Data Protection Law.</u></span></label></div>
                            <div class="mb-3">
                                <div class="g-recaptcha mb-4"
                                    data-sitekey="6LdGKZ8pAAAAAB0CgnIK8W0WeZnhrNYvqTligNIl"></div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 pt-0 pb-2"><button type="button"
                                class="btn text-muted" data-bs-dismiss="modal"></button><button type="submit"
                                class="btn btn-primary text-white">Send</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cooperation_form" tabindex="-1" aria-labelledby="cooperation_formLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header"><span class="modal-title" id="cooperation_formLabel">For
                    Cooperation</span><button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button></div>
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="page-content mt-3 px-3"> </div>
                </div>
                <div class="col-lg-5 text-center"><img data-src="/assets/img/no-image.png" class="img-fluid" alt
                        style="max-height: 400px"></div>
                <div class="col-lg-7">
                    <form action="https://www.medescare.com/ajax/cooperation_form" class="no-ajax" method="POST">
                        <input type="hidden" name="url" value="balon-gastrik.html#cooperation_form">
                        <div class="modal-body pb-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="wacu-input-label"> Full Name</div><input type="text"
                                            name="name" value required class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="wacu-input-label"> Company Name</div><input type="text"
                                            name="company_name" value required class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="wacu-input-label">Phone</div><input type="tel" name="tel"
                                            value required class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="wacu-input-label">E-mail</div><input type="email" name="email"
                                            value required class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="wacu-input-label">Message</div><textarea name="message" required
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check"><input class="form-check-input border-light text-dark"
                                            checked type="checkbox" name="kvkk" id="kvkk" required><label
                                            class="form-check-label bg-white text-dark" for="kvkk"> I have read and accept the personal data protection law. <span
                                                class="show_kvkk cursor-pointer"
                                                title="Personal Data Protection Law"> <u>Personal Data Protection Law.</u></span></label></div>
                                </div>
                                <div class="col-12">
                                    <div class="g-recaptcha mb-4"
                                        data-sitekey="6LdGKZ8pAAAAAB0CgnIK8W0WeZnhrNYvqTligNIl"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 pt-0 pb-2"><button type="button"
                                class="btn text-muted" data-bs-dismiss="modal"></button><button type="submit"
                                class="btn btn-primary text-white">Send</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="fixed-contact-infos"><a href="/appointment" title="Make an Appointment" class="item"><svg class="cvzicon">
        <use xlink:href="{{asset('assets/img/icons.svg#clock-three')}}"></use>
    </svg><span class="text">Make an<br>Appointment</span></a><a role="button" title="Our Offices" class="item"
    data-bs-toggle="modal" data-bs-target="#officesModal"><svg class="cvzicon">
        <use xlink:href="{{asset('assets/img/icons.svg#map-marker-alt')}}"></use>
    </svg><span class="text">Our Offices</span></a>
</section>


<div class="modal fade" id="officesModal" tabindex="-1" aria-labelledby="officesModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title fs-4 text-uppercase fw-bold" id="officesModalLabel">Our Offices at Home </div><button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row gy-4">


                <div class="col-lg-6">
                    <div class="office">
                        <div class="office__header">
                            <div class="office__title">Central Office in Istanbul</div>
                            <div class="office__address position-relative">
                                <div class="icon"><svg class="cvzicon">
                                        <use xlink:href="{{asset('assets/img/icons.svg#map-marker-alt')}}"></use>
                                    </svg></div>
                                <address> {{Main('Address')}}</address>
                            </div>
                        </div>
                        <div class="office__body">
                            <div class="office__phone">
                                <div class="icon"><svg class="cvzicon">
                                        <use xlink:href="{{asset('assets/img/icons.svg#whatsapp')}}"></use>
                                    </svg></div><a href="https://wa.me/{{Main('Whatsapp')}}" title="{{Main('Whatsapp')}}"
                                    target="_blank"> +{{Main('Whatsapp')}}</a>
                            </div>
                            <div class="office__mail">
                                <div class="icon"><svg class="cvzicon">
                                        <use xlink:href="{{asset('assets/img/icons.svg#envelope-light')}}"></use>
                                    </svg></div><a href="mailto:{{Main('Mail')}}" title="{{Main('Mail')}}">
                                    {{Main('Mail')}}</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>

<div class="left-social-media">
    <div class="title">Social Media</div>
    <ul class="social">
        <li><a href="{{Main('Facebook')}}" target="_blank" rel="nofollow external"
                title="facebook"><svg class="cvzicon">
                <use xlink:href="{{asset('assets/img/icons.svg#facebook-f')}}"></use>
            </svg></a></li>
        <li><a href="{{Main('Instagram')}}" target="_blank" rel="nofollow external"
                title="instagram"><svg class="cvzicon">
                <use xlink:href="{{asset('assets/img/icons.svg#instagram')}}"></use>
            </svg></a></li>
        <li><a href="{{Main('Youtube')}}" target="_blank" rel="nofollow external"
                class="yt" title="youtube"><svg class="cvzicon">
                <use xlink:href="{{asset('assets/img/icons.svg#youtube')}}"></use>
            </svg></a></li>
        <li><a href="{{Main('Tiktok')}}" target="_blank" rel="nofollow external" title="tiktok"><svg
                class="cvzicon">
                <use xlink:href="{{asset('assets/img/icons.svg#tiktok')}}"></use>
            </svg></a></li>
    </ul>
</div>


@include('main.Cookie')


<div class="fixed-mobile-links">

    <a role="button" title="Our Offices" data-bs-toggle="modal"
    data-bs-target="#officesModal" class="item"><span class="icon"><svg class="cvzicon">
            <use xlink:href="{{asset('assets/img/icons.svg#map-marker-alt')}}"></use>
        </svg></span><span class="title">Our Offices</span></a> 

        <a href="{{Main('Instagram')}}"
    target="_blank" rel="nofollow external" title="Instagram" class="item"><span class="icon"><svg
            class="cvzicon">
            <use xlink:href="{{asset('assets/img/icons.svg#instagram')}}"></use>
        </svg></span><span class="title">Instagram</span></a> 

        <a href="tel:{{Main('Tell')}}"
    title="Viber" class="item"><span class="icon"><svg class="cvzicon">
            <use xlink:href="{{asset('assets/img/icons.svg#phone-alt-2')}}"></use>
        </svg></span><span class="title">Phone</span></a>

         <a href="https://wa.me/{{Main('Whatsapp')}}" target="_blank"
    rel="nofollow external" title="WhatsApp" class="item whatsapp"><span class="icon"><svg class="cvzicon">
            <use xlink:href="{{asset('assets/img/icons.svg#whatsapp')}}"></use>
        </svg></span><span class="title">WhatsApp</span></a>

    </div>




<script type="ad9df592b27e86c1985652df-text/javascript">
    window.options = {
        siteurl: "https://www.medescare.com/"
    };
    window.lang = {
        ajax: {
            url: "https://www.medescare.com?lang=en"
        },
        error: {
            title: "Error!",
            text: "Something went wrong",
            button: "Okay",
            mimeTypeErr: "The file extension you uploaded is not accepted. Only [JPG, JPEG, GIF, PNG, DOC, DOCX, XLS, XLSX, PDF, ZIP, RAR] are accepted.",
            fileSizeErr: "The file size you uploaded is not accepted. Maximum 10 MB."
        },
        waiting: {
            title: "Please wait",
        },
        success: {
            title: "Form submitted"
        },
        upload_file: "Upload file",
        readMore: "Read more",
        readLess: "Read less",
    };
</script>
<script async defer src="assets/js/vendor.js" type="ad9df592b27e86c1985652df-application/javascript"></script>
<script type="application/ld+json" async defer>
    {
        "@context": "http://schema.org",
        "@type": "Organization",
        "email": "info@medescare.com",
        "name": "Medescare",
        "legalName": "Medescare",
        "telephone": "{{Main('Tel')}}",
        "image": "assetsassets/uploads/2022/06/logo2.svg",
        "logo": "assetsassets/uploads/2022/06/logo2.svg",
        "url": "https://www.medescare.com",
        "dissolutionDate": "2022",
        "foundingDate": "2022",
        "founder": "Recep Özmen",
        "foundingLocation": "Istanbul",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Medescare - İstanbul",
            "addressLocality": "Istanbul",
            "postalCode": "34000",
            "addressCountry": "Turkey"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": 4.8,
            "reviewCount": 1037
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "{{Main('Tel')}}",
            "contactType": "sales",
            "areaServed": "TR",
            "availableLanguage": ["Turkey"]
        },
        "sameAs": ["{{Main('Facebook')}}", "{{Main('Instagram')}}",
            "h{{Main('Youtube')}}",
            "{{Main('Tiktok')}}"
        ],
        "brand": "Aesthetic and Health Treatments in Turkey",
        "description": "Medescare is a counseling center for patients who need aesthetic operations and health treatments in Turkey.",
        "knowsAbout": "Medescare is a counseling center for patients who need aesthetic operations and health treatments in Turkey."
    }
</script>
<script src="assets/js/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="ad9df592b27e86c1985652df-|49" defer></script>
<script type="text/javascript" src="{{asset('assets/js/beacon.js')}}"></script>
    @yield('script')
     <!-- header -->
<script type="text/javascript">
    document.querySelector('header').style.display = 'block';
    document.querySelector('body').style.display = 'block';
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){

    $('form').on('submit', function(e){
        let $this = $(this);
        if ($this.attr('action')=='ajax') {
            let target = $this.attr('target');
            let callback = $this.attr('callback');
            let formData = new FormData(this);
            formData.append('action', target);
            if($this.hasAttr('callback')){
              formData.append('callback', $this.attr('callback'));
            }
            $.ajax({
                type: $this.attr('method'),
                url: '/ajax',
                cache: false,
                processData: false,
                datatype: 'json',
                contentType: false,
                headers: {'X-CSRF-TOKEN' : @json(csrf_token())},
                data: formData,
                // beforeSend : function(){
                //     window.CurrentFormhtml = $this.html();
                //     $this.css('Yükleniyor...');
                // },
                success: function(data){
                    if (data['outcome']) {
                          if (!data['NoAlert']) {
                                alertify.success((data['Message']??  '{{Lang::get('Base.Successfuly')}}'));
                                $('input').css('border','1px solid var(--separator)');
                                if (data['route']) {
                                    window.location = data['route'];
                                }
                          }else {
                            if (data['route']) {
                                window.location = data['route'];
                            }
                          }
                    }else {
                        alertify.error(data['ErrorMessage']);
                        if (data['route']) {
                            window.location = data['route'];
                        }
                        if (data['tag']) {
                            $('input[name='+data['tag']+']').css('border', '1px solid red');
                            $('select[name='+data['tag']+']').css('border', '1px solid red');
                        }
                    }
                    //$this.html(window.CurrentFormhtml);
                    $('button[type=submit]',$this).removeAttr('disabled');
                } 
            });
        }
        return false;
    });
    ///
    $.fn.hasAttr = function(name){
        return this.attr(name) !== undefined;
    }
});
</script>
</body>


</html>



 <!-- footer --> 