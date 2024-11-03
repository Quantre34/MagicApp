@extends('main.App')        

    @section('content')



        <div class="page-header">
            <div class="wrapper">
                <div class="container d-flex justify-content-between align-items-center flex-wrap">
                    <div class="title">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Medical Units</font>
                        </font>
                    </div>
                    <nav aria-label="breadcrumbs">
                        <ol class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope=""
                                itemtype="http://schema.org/ListItem"> <a itemprop="item" href="homepage.php"> <span
                                        itemprop="name">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Home</font>
                                        </font>
                                    </span> </a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope=""
                                itemtype="http://schema.org/ListItem"> <span itemprop="name">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Medical Units</font>
                                    </font>
                                </span>
                                <meta itemprop="item" content="https://www.medescare.com/categories">
                                <meta itemprop="position" content="2">
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="page services pb-6 pb-xxl-8">
            <div class="container">
                <div class="page-wrapper">
                    @foreach($Categories as $Category)
                    <div class="header-2 center mt-4 mt-sm-0 mb-4 mb-sm-5"> <span class="name">
                            <!-- <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">A Doctor</font>
                            </font> -->
                        </span>
                        <div class="title">
                            <div class="title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{$Category['Title']}}</font>
                                </font>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 g-xl-4">

                            @foreach($Category['Treatments'] as $Treatment)
                                <div class="col-sm-6 col-lg-4 wow animate__backInUp" data-wow-delay=".3s"
                                    style="visibility: visible; animation-delay: 0.3s; animation-name: backInUp;">
                                    <div class="service-item">
                                        <figure class="mb-0 ratio ratio-1x1"> <img
                                                src="https://agency.medescare.com{{$Treatment['Img']}}"
                                                class="w-100 h-100 of-cover" alt="Brain Surgery"> </figure>
                                        <div class="name text-uppercase">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Medescare</font>
                                            </font>
                                        </div>
                                        <div class="title text-uppercase"><span>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">{{$Treatment['Title']}}</font>
                                                </font>
                                            </span></div>
                                        <div class="overlay"> <span class="d-block text-uppercase">
                                                <p class="d-block text-uppercase">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">{{$Treatment['Title']}}</font>
                                                    </font>
                                                </p>
                                            </span> <a href="/treatments/{{$Treatment['Slug']}}"
                                                class="stretched-link btn btn-white rounded-circle p-0 w-50px h-50px"> <svg
                                                    class="cvzicon">
                                                    <use xlink:href="{{Main('Icon')}}"></use>
                                                </svg> </a> </div>
                                    </div>
                                </div>
                            @endforeach

                    </div>
                    <div class="page-content mt-5">
                        <h1>
                            <font style="vertical-align: inherit;">
                                <!-- <font style="vertical-align: inherit;">Check out our medical units!</font> -->
                            </font>
                        </h1>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    @endsection

