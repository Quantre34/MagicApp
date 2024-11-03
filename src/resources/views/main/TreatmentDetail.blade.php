@extends('main.App')        

    @section('content')

        <div class="page-header">
            <div class="wrapper">
                <div class="container d-flex justify-content-between align-items-center flex-wrap">
                    <div class="title">{{$Treatment['Title']}}</div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                                itemtype="http://schema.org/ListItem"><a itemprop="item" href="homepage.php"><span
                                        itemprop="name">Home</span></a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                                itemtype="http://schema.org/ListItem"><a itemprop="item" href="/treatments"><span
                                        itemprop="name">Treatments</span></a>
                                <meta itemprop="position" content="2">
                            </li>
                            <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope
                                itemtype="http://schema.org/ListItem"><span itemprop="name">{{$Treatment['Title']}}</span>
                                <meta itemprop="item" content="services-obesity.html">
                                <meta itemprop="position" content="3">
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

            
        <div class="page services pb-6 pb-xxl-8">
            <div class="container">
                <div class="page-wrapper">
                    <div class="header-2 center mt-4 mt-sm-0 mb-2 mb-sm-5"><span class="name">Medescare</span>
                        <div class="title">
                            <div class="title">{{$Treatment['Title']}}</div>
                        </div>
                    </div>
                    <div class="row g-3 service-form-wrapper gy-5 mb-6">
                        <div class="col-lg-7 col-xxl-8">
                            <figure class="ratio ratio-16x9"><img src="https://agency.medescare.com{{$Treatment['Img']}}"
                                    class="w-100 h-100 of-cover" alt="Obesity" title="Obesity"></figure>
                            <div class="page-content mt-5">
                                <h1 style="text-align: justify;">
                                    <font style="box-sizing:border-box; vertical-align:inherit">
                                        <font style="box-sizing:border-box; vertical-align:inherit"> {{$Treatment['Title']}} </font>
                                    </font>
                                </h1>

                                {!! $Treatment['Description'] !!}

                                <p><strong>Other pages</strong></p>
                                <ul>

                                @foreach($Blogs as $Blog)
                                      <li>
                                         <a href="/blog/{{$Blog['Slug']}}"
                                              title="{{$Blog['Title']}}"> {{$Blog['Title']}} </a>
                                      </li>
                                @endforeach
                                </ul>
                            </div>
                            <div class="row g-2 g-sm-4 mt-5">

                                @if(Categories())
                                    <?php $i = 0; ?>
                                    @foreach(Categories(['Id'=>$Treatment['ParentId']]) as $Category)
                                        @if($Category['Treatments'])
                                            @foreach($Category['Treatments'] as $Treatment)
                                                @if($i<4)
                                                    <?php $i++; ?>
                                                    <div class="col-6 col-sm-4 col-xxl-3">
                                                        <div class="sub-service-item">
                                                            <figure class="ratio ratio-1x1"><img src="https://agency.medescare.com{{$Treatment['Img']}}"
                                                                    alt="{{$Treatment['Title']}}"
                                                                    title="{{$Treatment['Title']}}"></figure><a
                                                                href="/treatments/{{$Treatment['Slug']}}"
                                                                title="{{$Treatment['Title']}}"
                                                                class="stretched-link">{{$Treatment['Title']}}</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-5 col-xxl-4">
                            <form action="ajax" class="no-ajax sticky-top" method="POST" target="MakeAppointment">
                                <input type="hidden" name="Category" value="{{$Treatment['Title']}}">
                                <input type="hidden" name="Type" value="Online Appointment">
                                <div class="title">Free Online Consultation</div>
                                <div class="form-group mb-4"><input type="text" class="form-control py-lg-3" name="FullName"
                                        required value placeholder="Full Name *"></div>
                                <div class="form-group mb-4"><input type="email" class="form-control py-lg-3" name="Mail"
                                        required value placeholder="E-mail *"></div>
                                <div class="form-group mb-4"><input type="text" class="form-control py-lg-3" name="Cell"
                                        required value placeholder="Phone *"></div>
                                <div class="form-group mb-4"><input type="date" class="form-control py-lg-3" name="Date"
                                        value placeholder="Preferred Time for Contact"></div>
                                <div class="form-group mb-4"><textarea class="form-control py-lg-3" name="Message" rows="3"
                                        placeholder="Message"></textarea></div>
                                <div class="form-check mb-4"><input class="form-check-input border-light text-dark" checked
                                        type="checkbox" name="kvkk" id="kvkk" required><label
                                        class="form-check-label bg-white text-dark" for="kvkk"> I have read and accepted the
                                        explanatory text of the law on the protection of personal data. <span
                                            class="show_kvkk cursor-pointer"
                                            title="Law on the protection of personal data"> <u>Law on the protection of personal
                                                data.</u></span></label></div>
                                <button type="submit" class="btn btn-primary w-100 fw-bold text-white">Consult the Doctor
                                    Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection