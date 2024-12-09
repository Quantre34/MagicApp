@extends('main.App')        

    @section('content')


<div class="page-header">
    <div class="wrapper">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="title">Photo Gallery</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="assets/img/foto-galeria-1.jpg" title="Home">Home</a></li>
                    <li class="breadcrumb-item"><a href="assets/img/foto-galeria-1.jpg" title="Photo Gallery">Photo Gallery</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Before &amp; After Obesity</li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="/"><span itemprop="name">Home</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="/photo-gallery"><span itemprop="name">Photo Gallery</span></a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <span itemprop="name">Before &amp; After Obesity</span>
                        <meta itemprop="item" content="https://www.medescare.com/photo-gallery">
                        <meta itemprop="position" content="3">
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="page pb-6 pb-xxl-8">
    <div class="container">
        <div class="page-wrapper">
            <ul class="redirects mb-sm-7">
                <li><a href="/blog" title="Blog">Blog</a></li>
                <li class="active"><a href="/video-gallery" title="Video Galeria">Video Galeria</a></li>
                <li ><a href="/photo-gallery" title="Foto Galeria">Foto Galeria</a>
                </li>
            </ul>
            <div class="header-2 center w-100 mt-4 mt-sm-0 mb-4 mb-sm-5"><span class="name">Medescare</span>
                <div class="title">
                    <h1 class="title">Testimonials</h1>
                </div>
            </div>
            <div class="row g-4 g-xs-3 g-sm-4 mt-6 mt-sm-8 mb-4 mb-sm-5">


            @foreach($Medias as $Media)
               <div class="col-xs-6 col-md-4 col-xxl-3">
                    <div class="image-item"><a href="{{$Media['Path']}}" data-fslightbox="gallery"
                            class="ratio ratio-1x1 d-block"><img src="{{$Media['Img']}}"
                                class="w-100 h-100 of-cover" alt="Medescare | Clinic"
                                title="Medescare | Clinic"></a></div>
                </div>
            @endforeach
 
 <!--                <div class="col-xs-6 col-md-4 col-xxl-3">
                    <div class="image-item"><a href="https://www.youtube.com/watch?v=z0488pLFLwo" data-fslightbox="gallery"
                            class="ratio ratio-1x1 d-block"><img src="https://natural.clinic/wp-content/uploads/2023/09/Group-4441.webp"
                                class="w-100 h-100 of-cover" alt="Para &amp; Pas Obezitet"
                                title="Para &amp; Pas Obezitet"></a></div>
                </div>
                <div class="col-xs-6 col-md-4 col-xxl-3">
                    <div class="image-item"><a href="https://www.youtube.com/watch?v=-IOa1AM_xyg" data-fslightbox="gallery"
                            class="ratio ratio-1x1 d-block"><img src="https://natural.clinic/wp-content/uploads/2023/09/Group-4442.webp"
                                class="w-100 h-100 of-cover" alt="Para &amp; Pas Obezitet"
                                title="Para &amp; Pas Obezitet"></a></div>
                </div>
                <div class="col-xs-6 col-md-4 col-xxl-3">
                    <div class="image-item"><a href="https://www.youtube.com/watch?v=PB6YdPFqbQI" data-fslightbox="gallery"
                            class="ratio ratio-1x1 d-block"><img src="https://natural.clinic/wp-content/uploads/2023/09/Group-4443.webp"
                                class="w-100 h-100 of-cover" alt="Para &amp; Pas Obezitet"
                                title="Para &amp; Pas Obezitet"></a></div>
                </div> -->



            </div>
        </div>
    </div>
</div>
@endsection

