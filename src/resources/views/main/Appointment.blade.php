@extends('main.App')        
@section('content')
<div class="page-header">
   <div class="wrapper">
      <div class="container d-flex justify-content-between align-items-center flex-wrap">
         <div class="title">Make an Appointment</div>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
               <li class="breadcrumb-item" itemprop="itemListElement" itemscope=""
                  itemtype="http://schema.org/ListItem">
                  <a itemprop="item" href="/"><span
                     itemprop="name">Home</span></a>
                  <meta itemprop="position" content="1">
               </li>
               <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope=""
                  itemtype="http://schema.org/ListItem">
                  <span itemprop="name"> Make an Appointment</span>
                  <meta itemprop="item" content="https://www.medescare.com/appointment">
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
            <div class="col-lg-5 text-center"><img data-src="{{asset('assets/upload/appointment.png')}}" src="{{asset('assets/upload/appointment.png')}}" class="img-fluid" title alt></div>
            <div class="col-lg-7">
               <form action="ajax" class="appointment offer-form row align-items-center no-ajax" method="POST" target="MakeAppointment">
                  <div class="header-2 mb-4 col-12">
                     <span class="name ln-1">Medescare</span>
                     <div class="title">Fill out an appointment form</div>
                     <p>You can contact us faster and get an offer from us by filling out the appointment form.</p>
                  </div>
                  <div class="col-12 mb-3"> </div>
                    <div class="form-group col-12 mb-3">
                        <input type="text" class="form-control rounded-pill" name="FullName" value required placeholder="Full Name">
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <input type="tel" class="form-control rounded-pill" name="Cell" value required placeholder="Phone">
                    </div>
                     <div class="form-group col-lg-6 mb-3">
                        <input type="email" class="form-control rounded-pill" name="Mail" value placeholder="E-mail">
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <select style="padding: 1.2rem 1rem !important; border: 1px solid #ced4da; width: 100%;" name="Category" class="form-select rounded-pill" required>
                            <option value selected>Select Service</option>
                            @if(Categories())
                                @foreach(Categories() as $Category)
                                    <option value="{{$Category['Title']}}" >{{$Category['Title']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <input type="date" min="{{date('Y-m-d')}}" max="{{date('Y-m-d',strtotime('+1 year'))}}" class="form-control rounded-pill" name="Date" value id="appointment-date">
                    </div>
                    <div class="col-12 mb-3 types">
                       <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="Type" id="online" value="Online Appointment" checked>
                            <label class="form-check-label" for="online"> Online Appointment</label>
                       </div>
                       <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="Type" id="face_to_face" value="In-Office Appointment">
                            <label class="form-check-label" for="face_to_face"> In-Office Appointment </label></div>
                       <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="Type" id="phone" value="On The Phone">
                            <label class="form-check-label" for="phone">Phone</label>
                       </div>
                    </div>
                  <div class="form-group col-12 mb-3"><textarea rows="5" class="form-control" name="Message"
                     placeholder="Message"></textarea></div>
                  <!--                             <div class="col-12">
                     <div class="g-recaptcha" data-sitekey="6LdGKZ8asdfpAAAAAB0CasdfsgnIK8W0WeZnhrNYvqTligNIl"></div>
                     </div> -->
                  <div class="col-lg-8">
                     <div class="form-check">
                        <input class="form-check-input border-light text-dark" checked type="checkbox" name="kvkk" id="kvkk" required>
                        <label class="form-check-label bg-white text-dark" for="kvkk"> I have read and accepted the explanatory text of the personal data protection law. 
                            <span class="show_kvkk cursor-pointer" title="Personal Data Protection Law"> <u>Personal Data Protection Law.</u></span>
                        </label>
                     </div>
                  </div>
                  <div class="col-lg-4 text-end">
                     <button type="submit"
                        class="btn btn-primary text-white rounded-pill fw-bold px-5 mt-3 mt-xxl-0 d-inline-flex align-items-center">
                        Send
                        <svg class="cvzicon ms-2 ln-1">
                           <use xlink:href="{{asset('assets/main/img/icons.svg#paper')}}"></use>
                        </svg>
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection