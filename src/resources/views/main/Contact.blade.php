@extends('main.App')        

    @section('content')


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
                        <div class="header-2">
                            <div class="title">
                                <div class="title">Our Contact Information</div>
                            </div>
                            <p>You can continue by clicking on the icons for more information about diseases.</p>
                        </div>
                        <ul class="contact-list mt-4">
                            <li class="position-relative">
                                <div class="icon"><svg class="cvzicon">
                                        <use xlink:href="/assets/img/icons.svg#map-marker-alt"></use>
                                    </svg></div> {{Main('Address')}}<a href="{{Main('Location')}}" title="Google Maps"
                                    target="_blank" rel="noopener external" class="map-link stretched-link"></a>
                            </li>
                            <li>
                                <div class="icon"><svg class="cvzicon">
                                        <use xlink:href="/assets/img/icons.svg#phone-alt-2"></use>
                                    </svg></div>
                                <div> <a href="https://wa.me/{{Main('Tell')}}" target="_blank" rel="noopener external"
                                        title="{{Main('Tell')}}">{{Main('Tell')}}</a> </div>
                            </li>
                            <li>
                                <div class="icon"><svg class="cvzicon">
                                        <use xlink:href="/assets/img/icons.svg#envelope-light"></use>
                                    </svg></div><a href="mailto:{{Main('Mail')}}"
                                    title="{{Main('Mail')}}">{{Main('Mail')}}</a>
                            </li>
                            <li class="flex-column align-items-start pt-4">
                                <div class="title d-block">Follow us on our social media accounts!</div>
                                <ul class="social">
                                    <li><a href="{{Main('Facebook')}}" target="_blank"
                                            rel="nofollow external" title="facebook"><svg class="cvzicon">
                                                <use xlink:href="/assets/img/icons.svg#facebook-f"></use>
                                            </svg></a></li>
                                    <li><a href="{{Main('Instagram')}}" target="_blank"
                                            rel="nofollow external" title="instagram"><svg class="cvzicon">
                                                <use xlink:href="/assets/img/icons.svg#instagram"></use>
                                            </svg></a></li>
                                    <li><a href="{{Main('Youtube')}}" target="_blank"
                                            rel="nofollow external" title="youtube"><svg class="cvzicon">
                                                <use xlink:href="/assets/img/icons.svg#youtube"></use>
                                            </svg></a></li>
                                    <li><a href="{{Main('Tiktok')}}" target="_blank"
                                            rel="nofollow external" title="tiktok"><svg class="cvzicon">
                                                <use xlink:href="/assets/img/icons.svg#tiktok"></use>
                                            </svg></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <form action="ajax" id="ContactForm" class="form-wrapper offer-form row " method="POST" target="Contact">
                            <div class="header-2 mb-4"><span class="name ln-1">A Doctor</span>
                                <div class="title">Our Contact Form</div>
                                <p class="mb-3">You can contact us faster and get an offer by filling out the contact form.</p>
                            </div>
                            <div class="form-group col-12 mb-3"><svg class="cvzicon icon">
                                    <use xlink:href="/assets/img/icons.svg#user"></use>
                                </svg><input type="text" class="form-control rounded-pill" required name="FullName" value=""
                                    placeholder="Full Name"></div>
                            <div class="form-group col-12 mb-3"><svg class="cvzicon icon">
                                    <use xlink:href="/assets/img/icons.svg#phone-alt-2"></use>
                                </svg><input type="tel" class="form-control rounded-pill" required name="Cell" value=""
                                    placeholder="Phone"></div>
                            <div class="form-group col-12 mb-3"><svg class="cvzicon icon">
                                    <use xlink:href="/assets/img/icons.svg#envelope-light"></use>
                                </svg><input type="email" class="form-control rounded-pill" required name="Mail" value=""
                                    placeholder="Email"></div>
                            <div class="form-group col-12 mb-3">
                                <div class="file w-100">
                                    <div class="file-name">Upload File</div><button onclick="javascript:$('#UploadInput').click();" type="button" class="fileselect"
                                        title="upload_file"><svg class="cvzicon">
                                            <use xlink:href="/assets/img/icons.svg#upload"></use>
                                        </svg></button>
                                        <!-- <input type="file" name="file" class="d-none upload-file"> -->
                                </div>
                            </div>
                            <div class="form-group col-12 mb-3"><textarea rows="5" class="form-control" name="Message"
                                    placeholder="Message"></textarea><svg class="cvzicon icon">
                                    <use xlink:href="/assets/img/icons.svg#comment"></use>
                                </svg></div>
                            <div class="col-12 mb-3">

                            </div>
                            <input type="hidden" name="FilePath">
                             <input  checked="" type="checkbox" name="kvkk" id="kvkk" required="" hidden>
                            </form>

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
                                $('#ContactForm input[name=FilePath]').val(url);
                              }
                            </script>


                            <div class="d-flex flex-column flex-xxl-row justify-content-between align-items-center">
                                <div class="form-check">
                                    <input onclick="javascript:$('#kvkk').click();" class="form-check-input border-light text-dark"
                                        checked="" type="checkbox" name="kvkk" id="kvkk" required=""><label
                                        class="form-check-label bg-white text-dark" for="kvkk"> I have read and accepted
                                        the explanatory text of the personal data protection law. <span
                                            class="show_kvkk cursor-pointer"
                                            title="Personal Data Protection Law"> <u>Personal Data Protection Law.</u></span></label></div>
                                            <button onclick="javascript:$('#ContactForm').submit();" class="btn btn-primary text-white rounded-pill fw-bold px-5 mt-3 mt-xxl-0">
                                                Send
                                                <svg class="cvzicon ms-2 ln-1">
                                                    <use xlink:href="/assets/img/icons.svg#paper"></use>
                                                </svg>
                                            </button>
                            </div>
                        





                    </div>
                </div>
                <div class="maps mt-5">
                    <div class="ratio"> <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.6500153880716!2d28.78316897632573!3d40.98914392060243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa3c1a12aa3ab%3A0x1c2abeef78625d30!2sMedes%20Care!5e0!3m2!1str!2str!4v1722784381459!5m2!1str!2str"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                </div>
                <!-- <iframe
                    src=""
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
        </div>
    </div>

@endsection

