@extends('main.App')        

    @section('content')


          <div class="page-header">
            <div class="wrapper">
                <div class="container d-flex justify-content-between align-items-center flex-wrap">
                    <div class="title">Blog</div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                                itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span
                                        itemprop="name">Home</span></a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope
                                itemtype="http://schema.org/ListItem"><span itemprop="name">Blog</span>
                                <meta itemprop="item" content="/blog">
                                <meta itemprop="position" content="2">
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
                        <li class="active"><a href="/blog" title="Blog">Blog</a></li>
                        <li><a href="/video-gallery" title="Video Gallery">Video Gallery</a></li>
                        <li><a href="/photo-gallery" title="Photo Gallery">Photo Gallery</a></li>
                    </ul>
                    
                    <div class="header-2 center mt-4 mt-sm-0 mb-4 mb-sm-5">
                        <span class="name">Medescare</span>
                        <div class="title">
                            <div>Check out Medescare's blogs</div>
                        </div>
                    </div>

                    <div class="row g-4 g-xs-3 g-sm-4">

                        @foreach($Blogs as $Blog)
                        <div class="col-xs-6 col-lg-4">
                            <div class="news-item">
                                <figure class="mb-0 ratio ratio-4x3">
                                    <img src="{{$Blog['Img']}}" class="w-100 h-100 of-cover" alt="{{$Blog['Title']}}" title="{{$Blog['Title']}}">
                                </figure>
                                <a href="/blog/{{$Blog['Slug']}}" class="title stretched-link" title="{{$Blog['Title']}}">
                                    <p class="title">{{$Blog['Title']}}</p>
                                </a>
                                <p>{{substr($Blog['Content'], -35)}}...</p>
                                <a href="/blog/{{$Blog['Slug']}}" class="more"> Read more
                                    <svg class="cvzicon fs-4 ln-1 bg-primary text-white rounded-circle">
                                        <use xlink:href="{{asset('assets/img/icons.svg#angle-right')}}"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>



                </div>
            </div>
        </div>


    @endsection

