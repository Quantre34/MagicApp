@extends('panel.app')

@section('content')
      <main>
        <div class="container">
          <!-- Title and Top Buttons Start -->
          <div class="page-title-container">
            <div class="row">
              <!-- Title Start -->
              <div class="col-12 col-md-7">
                <a href="/panel" class="muted-link pb-1 d-inline-block breadcrumb-back">
                  <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                  <span class="text-small align-middle">panel</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">@Lang('GuideBook.Guidebook')</h1>
              </div>
              <!-- Title End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <div class="row gx-5">
            <div class="col-lg-4 mb-5">
              <!-- Index Start -->
              <h2 class="small-title">@Lang('GuideBook.Questions')</h2>
              <div id="guidebookIndex">



                <div class="card mb-2">
                  <div class="card-body px-5 py-4">
                    <div
                      class="d-flex flex-row align-content-center align-items-center cursor-pointer accordion-button p-0 no-shadow h5 m-0"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >
                      <i data-acorn-icon="virus" data-acorn-size="16" class="me-2 sw-2"></i>
                      <span class="flex-grow-1">What you wanna know?</span>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#guidebookIndex">
                      <div class="mt-4 mb-n2">

                        <div class="my-2 Question" data-Id="1">
                          <a  class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">@Lang('GuideBook.Q-1')</span>
                          </a>
                        </div>

                        <div class="my-2 Question" data-Id="2">
                          <a  class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">@Lang('GuideBook.Q-2')</span>
                          </a>
                        </div>

                        <div class="my-2 Question" data-Id="3">
                          <a   class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">@Lang('GuideBook.Q-3')</span>
                          </a>
                        </div>

                        <div class="my-2 Question" data-Id="4">
                          <a   class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">@Lang('GuideBook.Q-4')</span>
                          </a>
                        </div>

                        <div class="my-2 Question" data-Id="5">
                          <a  class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">@Lang('GuideBook.Q-5')</span>
                          </a>
                        </div>

                        <div class="my-2 Question" data-Id="6">
                          <a   class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">@Lang('GuideBook.Q-6')</span>
                          </a>
                        </div>

                        <div class="my-2 Question" data-Id="7">
                          <a   class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">@Lang('GuideBook.Q-7')</span>
                          </a>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

<!--                 <div class="card mb-2">
                  <div class="card-body px-5 py-4">
                    <div
                      class="d-flex flex-row align-content-center align-items-center cursor-pointer accordion-button p-0 no-shadow h5 m-0 collapsed"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo"
                      aria-expanded="false"
                      aria-controls="collapseTwo"
                    >
                      <i data-acorn-icon="brain" data-acorn-size="16" class="me-2 sw-2"></i>
                      <span class="flex-grow-1">Conditions and Treatments</span>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#guidebookIndex">
                      <div class="mt-4 mb-n2">
                        <div class="my-2">
                          <a href="#" class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">Pastry lollipop cake lollipop</span>
                          </a>
                        </div>
                        <div class="my-2">
                          <a href="#" class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">Cotton candy caramels icing</span>
                          </a>
                        </div>
                        <div class="my-2">
                          <a href="#" class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">Marshmallow liquorice cake liquorice</span>
                          </a>
                        </div>
                        <div class="my-2">
                          <a href="#" class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">Chocolate cake apple pie bear claw wafer</span>
                          </a>
                        </div>
                        <div class="my-2">
                          <a href="#" class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">Biscuit halvah muffin dragée</span>
                          </a>
                        </div>
                        <div class="my-2">
                          <a href="#" class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">Carrot cake toffee sugar plum candy canes</span>
                          </a>
                        </div>
                        <div class="my-2">
                          <a href="#" class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">Chocolate cake apple pie bear claw</span>
                          </a>
                        </div>
                        <div class="my-2">
                          <a href="#" class="body-link d-flex align-items-center">
                            <i data-acorn-icon="chevron-right" data-acorn-size="16" class="me-2 sw-2"></i>
                            <span class="align-middle flex-grow-1">Carrot cake ice cream macaroon</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->



              </div>
              <!-- Index End -->
            </div>
            <div class="col-lg-8">
              <!-- Details Start -->
              <h2 class="small-title">Explenation</h2>
              <div class="card">
                <div class="card-body answers">
                  <p><strong class="Content-title">Moon Tempor</strong></p>




<div style="display: block;" class="Answer-1">
    @Lang('GuideBook.Answer-1')
</div>

<div style="display: none;" class="Answer-2">
    @Lang('GuideBook.Answer-2')
</div>

<div style="display: none;" class="Answer-3">
    @Lang('GuideBook.Answer-3')
</div>

<div style="display: none;" class="Answer-4">
    @Lang('GuideBook.Answer-4')
</div>

<div style="display: none;" class="Answer-5">
    @Lang('GuideBook.Answer-5')
</div>

<div style="display: none;" class="Answer-6">
    @Lang('GuideBook.Answer-6')
</div>

<div style="display: none;" class="Answer-7">
    @Lang('GuideBook.Answer-7')
</div>



                </div>
              </div>
              <!-- Details End -->
            </div>
          </div>
        </div>
      </main>
@endsection
@section('script')
  <!-- Page Specific Scripts Start -->
  <script src="{{URL::asset('assets/js/common.js')}}"></script>
  <script src="{{URL::asset('assets/js/scripts.js')}}"></script>
  <!-- Page Specific Scripts End -->
  <script type="text/javascript"> 
    $(document).ready(function(){

      $('.Question').on('click', function(){
        $('.answers div').fadeOut('fast');
        $('.Content-title').html($('div[data-Id='+$(this).data('id')+']  span').html());
        $('.Answer-'+$(this).data('id')).fadeIn('slow');
      });
    });
  </script>
@endsection
  </body>
</html>
