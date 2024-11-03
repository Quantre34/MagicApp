

@extends('main.App')        

    @section('content')

      <div class="page-header">
         <div class="wrapper">
            <div class="container d-flex justify-content-between align-items-center flex-wrap">
               <div class="title">Blog</div>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                     <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="/"><span itemprop="name">Home</span></a>
                        <meta itemprop="position" content="1">
                     </li>
                     <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="/blog"><span itemprop="name">Blog</span></a>
                        <meta itemprop="position" content="2">
                     </li>
                     <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="name">{{ $Blog['Title'] }}</span>
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
                            <div class="title">{{$Blog['Title']}}</div>
                        </div>
                    </div>
                    <div class="row g-3 service-form-wrapper gy-5 mb-6">
                           <div class="col-lg-7 col-xxl-8">
                              <div class="container">
                                 <div class="page-wrapper">
                                     <ul class="redirects mb-sm-7">
                                         <li class="active"><a href="/blog" title="Blog">Blog</a></li>
                                         <li><a href="/video-gallery" title="Video Gallery">Video Gallery</a></li>
                                         <li><a href="/photo-gallery" title="Photo Gallery">Photo Gallery</a></li>
                                     </ul>
                                    <div class="header-2 center w-100 mt-4 mt-sm-0 mb-4 mb-sm-5">
                                       <span class="name">Blog</span>
                                       <div class="title">{{ $Blog['Title'] }}</div>
                                    </div>
                                    <div class="news-detail" >
                                       <figure class="ratio ratio-16x9"><img src="{{$Blog['Img']}}"
                                    class="w-100 h-100 of-cover" alt="{{ $Blog['Title'] }}" title="{{ $Blog['Title'] }}"></figure>
                                          <div class="row">
                                             {!! $Blog['Content'] !!}
                                          </div>
                                          
                                 <div class="page-content mt-5">

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


                                    </div>
                                 </div>
                              </div>
                           </div>
                        <div class="col-lg-5 col-xxl-4">
                            <form action="ajax" class="no-ajax sticky-top" method="POST" target="MakeAppointment">
                                <input type="hidden" name="Category" value="{{$Blog['Title']}}">
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
