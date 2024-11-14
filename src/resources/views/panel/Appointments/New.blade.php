@extends('panel.App')
    @section('content')



<script type="text/javascript">
  window.Get = {};
  window.Get['Features'] = {};
  window.Get['Packages'] = {};
  window.Get['AgencyFee'] = {{User('Parent')['AgencyFee'] ?? 0}};
  window.Get['CommissionRate'] = {{User('Parent')['CommissionRate'] ?? 0}};

  @foreach($Packages as $key => $Package)
      var i = 0;
      window.Get['Packages'][{{$Package['Id']}}] = {};
      window.Get['Packages'][{{$Package['Id']}}]['Defaults'] = {};
      @php $Packages[$key]['Defaults'] = []; @endphp
      @foreach($Package['Features'] as $Feature)
          @if($Feature['Checked']=='1')
              @php $Packages[$key]['Defaults'][] = $Feature; @endphp
              window.Get['Packages'][{{$Package['Id']}}]['Defaults'][{{$Feature['Id']}}] = { Id:{{$Feature['Id']}}, Cost:{{$Feature['Cost']}}, Multiply:'{{$Feature['Multiply']}}',Title:'{{$Feature['Title']}}' };
          @endif
      @endforeach
  @endforeach

</script>
<style type="text/css">
  
.step-1 ul {
  list-style-type: none!important;
}

.step-1 li {
  display: inline-block!important;
}

 .step-1 input[type="radio"][id^="cb"] {
  display: none;
}

.step-1 label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

.step-1 label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

.step-1 label img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

.step-1 input[type="radio"]:checked + .step-1 label {
  border-color: #ddd;
}

.step-1 input[type="radio"]:checked + .step-1 label:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
}

.step-1 input[type="radio"]:checked  + .step-1 label img {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
}
</style>
      <div class="body-wrapper">
        <div class="container-fluid">
          

          <div class="checkout">
            <div class="card">
              <div class="card-body p-4">
                <div class="wizard-content">
                  <form action="#" class="tab-wizard wizard-circle">
                    <!-- Step 1 -->
                    <h6>Category</h6>
                    <section class="step-1">


<ul>
  <li><input type="radio" name="test" id="cb1" />
    <label for="cb1"><img src="http://lorempixel.com/100/100" /></label>
  </li>
  <li><input type="radio" name="test" id="cb2" />
    <label for="cb2"><img src="http://lorempixel.com/101/101" /></label>
  </li>
  <li><input type="radio" name="test" id="cb3" />
    <label for="cb3"><img src="http://lorempixel.com/102/102" /></label>
  </li>
  <li><input type="radio" name="test" id="cb4" />
    <label for="cb4"><img src="http://lorempixel.com/103/103" /></label>
  </li>
</ul>

                    </section>

                    <!-- Step 2 -->
                    <h6>Treatment</h6>
                    <section>
                      <div class="billing-address-content">
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="card shadow-none border">
                              <div class="card-body p-4">
                                <h6 class="mb-3 fs-4 fw-semibold">Johnathan Doe</h6>
                                <p class="mb-1 fs-2">E601 Vrundavan Heights, godrej garden city - 382481</p>
                                <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4">
                                  <i class="ti ti-device-mobile fs-7"></i>9999501050
                                </h6>
                                <a href="javascript:void(0)" class="btn btn-outline-primary  billing-address">Deliver To
                                  this address</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="card shadow-none border">
                              <div class="card-body p-4">
                                <h6 class="mb-3 fs-4 fw-semibold">ParleG Doe</h6>
                                <p class="mb-1 fs-2">D201 Galexy Heights, godrej garden city - 382481</p>
                                <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4">
                                  <i class="ti ti-device-mobile fs-7"></i>9999501050
                                </h6>
                                <a href="javascript:void(0)" class="btn btn-outline-primary  billing-address">Deliver To
                                  this address</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="card shadow-none border">
                              <div class="card-body p-4">
                                <h6 class="mb-3 fs-4 fw-semibold">Guddu Bhaiya</h6>
                                <p class="mb-1 fs-2">Mumbai khao gali, Behind shukan, godrej garden city - 382481</p>
                                <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4">
                                  <i class="ti ti-device-mobile fs-7"></i>9999501050
                                </h6>
                                <a href="javascript:void(0)" class="btn btn-outline-primary  billing-address">Deliver To
                                  this address</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="order-summary border rounded p-4 my-4">
                          <div class="p-3">
                            <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                            <div class="d-flex justify-content-between mb-4">
                              <p class="mb-0 fs-4">Sub Total</p>
                              <h6 class="mb-0 fs-4 fw-semibold">$285</h6>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <p class="mb-0 fs-4">Discount 5%</p>
                              <h6 class="mb-0 fs-4 fw-semibold text-danger">-$14</h6>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <p class="mb-0 fs-4">Shipping</p>
                              <h6 class="mb-0 fs-4 fw-semibold">Free</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                              <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                              <h6 class="mb-0 fs-5 fw-semibold">$271</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="payment-method-list payment-method">
                        <div class="delivery-option btn-group-active  card shadow-none border">
                          <div class="card-body p-4">
                            <h6 class="mb-3 fw-semibold fs-4">Delivery Option</h6>
                            <div class="btn-group flex-row gap-3 w-100" role="group" aria-label="Basic radio toggle button group">
                              <div class="position-relative form-check btn-custom-fill flex-fill ps-0">
                                <input type="radio" class="form-check-input ms-4 round-16" name="deliveryOpt1" id="btnradio1" autocomplete="off" checked>
                                <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio1">
                                  <div class="text-start ps-2">
                                    <h6 class="fs-4 fw-semibold mb-0">Free delivery</h6>
                                    <p class="mb-0 text-muted">Delivered on Firday, May 10</p>
                                  </div>
                                </label>
                              </div>
                              <div class="position-relative form-check btn-custom-fill flex-fill ps-0">
                                <input type="radio" class="form-check-input ms-4 round-16" name="deliveryOpt1" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio2">
                                  <div class="text-start ps-2">
                                    <h6 class="fs-4 fw-semibold mb-0">Fast delivery ($2,00)</h6>
                                    <p class="mb-0 text-muted">Delivered on Wednesday, May 8</p>
                                  </div>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="payment-option btn-group-active  card shadow-none border">
                          <div class="card-body p-4">
                            <h6 class="mb-3 fw-semibold fs-4">Payment Option</h6>
                            <div class="row">
                              <div class="col-lg-8">
                                <div class="btn-group flex-column" role="group" aria-label="Basic radio toggle button group">
                                  <div class="position-relative mb-3 w-100 form-check btn-custom-fill ps-0">

                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType1" id="btnradio3" autocomplete="off" checked>

                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio3">
                                      <div class="d-flex align-items-center">
                                        <div class="text-start ps-2">
                                          <h6 class="fs-4 fw-semibold mb-0">Pay with Paypal</h6>
                                          <p class="mb-0 text-muted">You will be redirected to PayPal website to
                                            complete your purchase securely.</p>
                                        </div>
                                        <img src="../assets/images/svgs/paypal.svg" alt="monster-img" class="img-fluid ms-auto">
                                      </div>
                                    </label>
                                  </div>
                                  <div class="position-relative mb-3 form-check btn-custom-fill ps-0">
                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType1" id="btnradio4" autocomplete="off">
                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio4">
                                      <div class="d-flex align-items-center">
                                        <div class="text-start ps-2">
                                          <h6 class="fs-4 fw-semibold mb-0">Credit / Debit Card</h6>
                                          <p class="mb-0 text-muted">We support Mastercard, Visa, Discover and Stripe.
                                          </p>
                                        </div>
                                        <img src="../assets/images/svgs/mastercard.svg" alt="monster-img" class="img-fluid ms-auto">
                                      </div>
                                    </label>
                                  </div>
                                  <div class="position-relative form-check btn-custom-fill ps-0">
                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType1" id="btnradio5" autocomplete="off">
                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio5">
                                      <div class="text-start ps-2">
                                        <h6 class="fs-4 fw-semibold mb-0">Cash on Delivery</h6>
                                        <p class="mb-0 text-muted">Pay with cash when your order is delivered.</p>
                                      </div>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <img src="../assets/images/products/payment.svg" alt="monster-img" class="img-fluid">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="order-summary border rounded p-4 my-4">
                          <div class="p-3">
                            <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                            <div class="d-flex justify-content-between mb-4">
                              <p class="mb-0 fs-4">Sub Total</p>
                              <h6 class="mb-0 fs-4 fw-semibold">$285</h6>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <p class="mb-0 fs-4">Discount 5%</p>
                              <h6 class="mb-0 fs-4 fw-semibold text-danger">-$14</h6>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <p class="mb-0 fs-4">Shipping</p>
                              <h6 class="mb-0 fs-4 fw-semibold">Free</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                              <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                              <h6 class="mb-0 fs-5 fw-semibold">$271</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>

                    <!-- Step 3 -->
                    <h6>Date</h6>
                    <section class="payment-method text-center">
                      <h5 class="fw-semibold fs-5">Thank you for your purchase!</h5>
                      <h6 class="fw-semibold text-primary mb-7">Your order id: 3fa7-69e1-79b4-dbe0d35f5f5d</h6>
                      <img src="../assets/images/products/payment-complete.svg" alt="monster-img" class="img-fluid mb-4" width="350">
                      <p class="mb-0 fs-2">We will send you a notification
                        <br>within 2 days when it ships.
                      </p>
                      <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <a href="./eco-shop.html" class="btn btn-success d-block mb-2 mb-sm-0">Continue Shopping</a>
                        <a href="javascript:void(0)" class="btn btn-primary d-block">Download Receipt</a>
                      </div>
                    </section>
                    <!-- Step 4 -->
                    <h6>Package</h6>
                    <section class="payment-method text-center">
                      <h5 class="fw-semibold fs-5">Thank you for your purchase!</h5>
                      <h6 class="fw-semibold text-primary mb-7">Your order id: 3fa7-69e1-79b4-dbe0d35f5f5d</h6>
                      <img src="../assets/images/products/payment-complete.svg" alt="monster-img" class="img-fluid mb-4" width="350">
                      <p class="mb-0 fs-2">We will send you a notification
                        <br>within 2 days when it ships.
                      </p>
                      <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <a href="./eco-shop.html" class="btn btn-success d-block mb-2 mb-sm-0">Continue Shopping</a>
                        <a href="javascript:void(0)" class="btn btn-primary d-block">Download Receipt</a>
                      </div>
                    </section>


                    <!-- Step 4 -->
                    <h6>Patient</h6>
                    <section class="payment-method text-center">
                      <h5 class="fw-semibold fs-5">Thank you for your purchase!</h5>
                      <h6 class="fw-semibold text-primary mb-7">Your order id: 3fa7-69e1-79b4-dbe0d35f5f5d</h6>
                      <img src="../assets/images/products/payment-complete.svg" alt="monster-img" class="img-fluid mb-4" width="350">
                      <p class="mb-0 fs-2">We will send you a notification
                        <br>within 2 days when it ships.
                      </p>
                      <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <a href="./eco-shop.html" class="btn btn-success d-block mb-2 mb-sm-0">Continue Shopping</a>
                        <a href="javascript:void(0)" class="btn btn-primary d-block">Download Receipt</a>
                      </div>
                    </section>


                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
    @section('script')
      <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="assets/panel/libs/jquery-steps/build/jquery.steps.min.js"></script>
  <script src="assets/panel/libs/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="assets/panel/js/forms/form-wizard.js"></script>
  <script src="assets/panel/js/apps/ecommerce.js"></script>

  @endsection