<!DOCTYPE html>
    <html>

    <head>
      <title>Helperland</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="stylesheet" type="text/css" href="./assets/css/header3.css" />
      <link rel="stylesheet" type="text/css" href="./assets/css/pagination.css" />
      <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
      <link rel="stylesheet" type="text/css" href="./assets/css/bookS.css" />
      <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    </head>

    <body id="bookS" onload="loadnewServiceRequest(<?php echo $_SESSION['userId'] ?>,0,1)">
    <div class="preloader"></div>
<?php
  require_once('header3.php');
?>
</section>
<!-- img section start -->
<section id="main-img">
  <img src="./assets/images/book_service.jpg" class="img-fluid" alt="" />
</section>
<!-- img section end -->
<!-- Modal for confirm service time -->
<button type="button" class="btn modal_btn time_popup" data-bs-toggle="modal" data-bs-target="#confirm_time">hello</button>
<div class="modal fade" id="confirm_time" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header">
                    <h4>Confirm the service time</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                </div>
                <div class="modal-body">
                    <span>
                      Booking time is less than recommended, we may not be able to finish the job. Please confirm if you wish to proceed with your booking?
                    </span><br>
                    <button class="btn ok" data-bs-dismiss="modal">OK</button>
                </div>
        </div>
      </div>
  </div>
<!-- Modal for confirm service time -->
<!-- Modal for book request sucess -->
<button type="button" class="btn modal_btn booking_sucess_popup" data-bs-toggle="modal" data-bs-target="#booking_sucess">helo</button>
<div class="modal fade" id="booking_sucess" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <span class="true"><img src="./assets/images/correct-white-medium.png" /></span>
                <p class="text">Booking is successfully submitted</p>
                <p>Service Request Id:<span class="id"></span> </p>
                <button type="button" class="btn ok_book" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
<!-- Modal for book request sucess -->
<!-- service section start -->
<section id="book_service">
  <div class="title">Set up your cleaning service</div>
  <div class="star">
    <div class="line1"></div>
    <img src="./assets/images/star.png" class="img-fluid" alt="" />
    <div class="line2"></div>
  </div>
  <div class="step_payment">
    <div class="step_p">
      <ul class="nav nav-tabs" role="tab-list">
        <li class="nav-item">
          <a class="nav-link setup_service active" data-bs-toggle="tab" href="#setup_service">
            <span class="all_name">Setup Service</span>
            <span class="triangle"></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link schedule_plan disabled" data-bs-toggle="tab" href="#schedule_plan">
            <span class="all_name">Schedule & Plan</span>
            <span class="triangle"></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link your_details disabled" data-bs-toggle="tab" href="#your_details">
            <span class="all_name">Your Details</span>
            <span class="triangle"></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link make_payment disabled" data-bs-toggle="tab" href="#make_payment">
            <span class="all_name">Make Payment</span>
            <span class="triangle"></span>
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div id="setup_service" class="tab-pane show active">
          <div class="title_mobile"><span>Setup Service</span>
            <hr>
          </div>
          <span>Enter yout Postal Code :</span><br>
            <div class="input">
              <div>
                <input type="text" class="postal_code" name="postal_code" placeholder="Postal Code" />
                <div class="postal_code_error errors">
                  <span></span>
                </div>
              </div>
              <button class="btn continue" onclick="validate_postalcode()">Check Availability</button>
            </div>
        </div>
        <div id="schedule_plan" class="tab-pane fade">
          <div class="title_mobile"><span>Schedule & Plan</span>
            <hr>
          </div>
          <div class="rooms_bath">
            <p class="select_title">Select number of rooms and bath</p>
            <select class="bed" onchange="selectbedroom()">
              <option value="1">1 bed</option>
              <option value="2">2 bed</option>
              <option value="3">3 bed</option>
            </select>
            <select class="bath" onchange="selectbathroom()">
              <option value="1">1 bath</option>
              <option value="2">2 bath</option>
              <option value="3">3 bath</option>
            </select>
          </div>
          <div class="hr"></div>
          <div class="book_time">
            <div class="when">
              <p class="select_title">When do you need the cleaner?</p>
              <div class="date">
                <img src="./assets/images/admin_calendar.png">
                <input type="text" value="<?php echo date("d/m/Y"); ?>" />
              </div>
              <select id="when_need" onchange="getTimeValue()">
                <option value="08">8:00</option>
                <option value="08.5">8:30</option>
                <option value="09">9:00</option>
                <option value="09.5">9:30</option>
                <option value="10">10:00</option>
                <option value="10.5">10:30</option>
                <option value="11">11:00</option>
                <option value="11.5">11:30</option>
                <option value="12">12:00</option>
                <option value="12.5">12:30</option>
                <option value="13">13:00</option>
                <option value="13.5">13:30</option>
                <option value="14">14:00</option>
                <option value="14.5">14:30</option>
                <option value="15">15:00</option>
                <option value="15.5">15:30</option>
                <option value="16">16:00</option>
                <option value="16.5">16:30</option>
                <option value="17">17:00</option>
                <option value="17.5">17:30</option>
                <option value="18">18:00</option>
              </select>
            </div>
            <div class="how_time">
              <p class="select_title">How long do you need your cleaner to stay?</p>
              <select class="how_much_time" onclick="selectHowMuchtimeHelper()">
                <option value="3">3.0 Hrs</option>
                <option value="3.5">3.5 Hrs</option>
                <option value="4">4.0 Hrs</option>
                <option value="4.5">4.5 Hrs</option>
                <option value="5">5.0 Hrs</option>
                <option value="5.5">5.5 Hrs</option>
                <option value="6">6.0 Hrs</option>
                <option value="6.5">6.5 Hrs</option>
                <option value="7">7.0 Hrs</option>
                <option value="7.5">7.5 Hrs</option>
                <option value="8">8.0 Hrs</option>
                <option value="8.5">8.5 Hrs</option>
                <option value="9">9.0 Hrs</option>
                <option value="9.5">9.5 Hrs</option>
                <option value="10">10.0 Hrs</option>
                <option value="10.5">10.5 Hrs</option>
                <option value="11">11.0 Hrs</option>
                <option value="11.5">11.5 Hrs</option>
                <option value="12">12.0 Hrs</option>
              </select>
            </div>
          </div>
          <div class="errors"> </div>
          <div class="hr11"></div>
          <div class="middle">
            <p class="select_title">Extra Services</p>
            <div class="extra">
              <div class="extra-1 service-1" onclick="book_extra_service1()">
                <div class="outer_border">
                  <img src="./assets/images/3.png" alt="" class="img-fluid">
                </div>
                <p>Inside Cabinets</p>
              </div>
              <div class="extra-1 service-2" onclick="book_extra_service2()">
                <div class="outer_border">
                  <img src="./assets/images/5.png" alt="" class="img-fluid">
                </div>
                <p>Inside fridge</p>
              </div>
              <div class="extra-1 service-3" onclick="book_extra_service3()">
                <div class="outer_border">
                  <img src="./assets/images/4.png" alt="" class="img-fluid">
                </div>
                <p>Inside oven</p>
              </div>
              <div class="extra-1 service-4" onclick="book_extra_service4()">
                <div class="outer_border">
                  <img src="./assets/images/2.png" alt="" class="img-fluid">
                </div>
                <p>Laundry wash & dry</p>
              </div>
              <div class="extra-1 service-5" onclick="book_extra_service5()">
                <div class="outer_border">
                  <img src="./assets/images/1.png" alt="" class="img-fluid">
                </div>
                <p>Interior windows</p>
              </div>
            </div>
          </div>
          <div class="hr11"></div>
          <div class="comment">
            <p class="select_title">Comments</p>
            <textarea rows=2></textarea>
            <input type="checkbox" id="pet"><label for="pet">I have pets at home</label>
          </div>
          <div class="hr12"></div>
          <button class="btn continue" onclick="from_schedule_plan_to_details()">Continue</button>
        </div>

        <div id="your_details" class="tab-pane fade">
          <div class="title_mobile"><span>Your Details</span>
            <hr>
          </div>
          <div class="alert alert-danger alert-dismissible fade show address_alert" role="alert">
          Please choose an address
          </div>
            <div class="details">
              <span>Enter your contact details,so we  can serve you in better way!</span>
              <ul>
                <li>
                  <label for="add1">
                    <input type="radio" id="add1" class="add" name="address">
                    <b>Address: </b><span class="address"></span><br>
                    <b class="phone_number">Phone number:</b><span class="no"></span>
                  </label>
                </li>
              </ul>
              <button class="btn add_new_address_btn" type="button" onclick="add_new_address()">+ Add New Address</button>
              <div class="alert alert-danger alert-dismissible fade show address_card_alert" role="alert">
              </div>
              <div class="add_address">
                  <div class="address_card">
                    <div class="street_name">
                      <labe>Street Name</labe><br>
                      <input type="text" placeholder="Street Name" name="street" class="street"/>
                    </div>
                    <div class="house_number">
                      <labe>House Number</labe><br>
                      <input type="text" placeholder="House Number" name="house_no" class="house_no"/>
                    </div>
                    <div class="postal_code">
                      <labe>Postal Code</labe><br>
                      <input type="text" placeholder="House Number" name="add-postal_code" class="add-postal_code" disabled/>
                    </div>
                    <div class="city">
                      <labe>City</labe><br>
                      <input type="text" placeholder="City" name="add_city" class="add_city" />
                    </div>
                    <div class="PhoneNumber">
                      <labe>Phone Number</labe><br>
                      <input type="text" placeholder="Phone Number" name="add_phone_number" class="add_phone_number" />
                    </div><br>
                    <button class="btn save_btn" type="button" onclick="create_new_address()">Save</button>
                    <button class="btn cancle_btn" type="button" onclick="hide_card_new_address()">Cancle</button>
                  </div>
                </div>
                <div class="favourite_sp">
                  <span>Your Favourite Service Providers</span>
                  <hr>
                  <span class="text">You can choose your favourite service provider from the below list</span>
                  <div class="fav_sp_row">
                    <div class="fav_sp_card" onclick="select_fav_sp(this.id)">
                      <div class="img"><img src="./assets/images/cap.png"/></div>
                      <span class="name">Sandip Patel</span>
                      <button class="btn select_fav_sp" type="button">Select</button>
                    </div>
                  </div>
                </div>
                <hr>
              <button class="btn continue" onclick="from_your_details_to_payment()">Continue</button>
            </div>
        </div>

        <div id="make_payment" class="tab-pane fade">
          <div class="title_mobile"><span>Make Payment</span>
            <hr>
          </div>
          <div class="alert alert-danger alert-dismissible fade show payment_alert" role="alert">
          Please enter entire details!!! 
          </div>
          <div class="payment_tab">
            <span>Pay securely with Helperland payment gateway!</span>
            <div class="promo_code">
              Promo code (optional)<br>
              <input type="text" placeholder="Promo code (optional)" onkeypress="enble_apply_btn()"/>
              <button type="button" class="btn" disabled onmouseover="enble_apply_btn()">Apply</button>
            </div>
            <hr>
            <div class="card_no">
              <i class="bi bi-credit-card"></i>
              <input type="text" class="card_no_input" placeholder="Card number" onkeypress="isNumber(event)"/>
              <span class="month_cvc">
                <input type="text" class="month_input" maxlength="2" placeholder="MM" onkeypress="isNumber(event)" onkeyup="month_validate()"/> /
                <input type="text" class="year_input" maxlength="2" placeholder="YY" onkeypress="isNumber(event)"/>
                <input type="text" class="cvc_input" maxlength="3" placeholder="CVC" onkeypress="isNumber(event)"/>
              </span>
            </div>
            <div class="accept_card">
              <span>Accepted cards:</span><br>
              <img src="./assets/images/visa_card.jpg"/>
            </div>
            <hr class="hr_line">
            <div class="privacy_check">
              <input type="checkbox" id="privacy"/>
              <label for="privacy">
                  I accept the <span class="color_text">terms and conditions,</span> the <span class="color_text">cancellation policy</span> and the <span class="color_text">privacy policy.</span> I confirm that Helperland will start executing the contract before the end of the cancellation period and that I will lose my right of cancellation as a consumer once the contract has been fully performed.
              </label>
            </div>
            <hr>
            <button type="button" class="btn continue" onclick="book_service_complete()">Complete Booking</button>
          </div>
        </div>
      </div>
    </div>
    <!-- card section start -->
    <div class="payment">
      <div class="card-pay">
        <div class="card_title">
          Payment Summary
        </div>
        <div class="time"><?php echo date("d/m/Y"); ?> @ <span class="time_label">08:00</span><br><span class="bed_select">1</span> bed, <span class="bath_select">1</span> bath.</div>
        <div class="duration">
          <span class="d_title"><b>Duration</b></span><br>
          <span>Basic<span class="right_t basic_time">0 Hrs</span></span><br>
          <span class="service-1_card card_extra">Inside cabinets (extra)<span class="right_t">30 Mins</span><br></span>
          <span class="service-2_card card_extra">Inside fridge (extra)<span class="right_t">30 Mins</span><br></span>
          <span class="service-3_card card_extra">Inside oven (extra)<span class="right_t">30 Mins</span><br></span>
          <span class="service-4_card card_extra">Laundry wash & dry (extra)<span class="right_t">30 Mins</span><br></span>
          <span class="service-5_card card_extra">Interior windows (extra)<span class="right_t">30 Mins</span><br></span>
          <div class="hr1"></div>
          <span><b>Total Service Time<span class="right_t"><span class="total_time">0</span> Hrs</span></b></span>
        </div>
        <div class="hr2"></div>
        <div class="discount">
          <span>Per cleaning<span class="right_t ">$<span class="per_price">00</span></span></span><br>
          <span>Discount<span class="right_t "><span class="discount_data">00</span></span></span>
        </div>
        <div class="hr3"></div>
        <div class="price">
          <span class="total">Total Payment<b class="right_t">$<span class="total_price">00</span></b></span>
          <span>Effective Price<b class="right_t">$<span class="e_price">00</span></b></span>
          <br>
          <span class="small_letter">*You will save 20% according to §35a EStG.</span>
        </div>
        <div class="happy">
          <img src="./assets/images/smiley.png" alt="" class="img-fluid">
          <span>See what is always included</span>
        </div>
      </div>
      <div class="question">
        <div class="q_title">Questions?</div>
        <div class="accordion" id="accordionId">
          <div class="heading" id="headingOne">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              Which Helperland professional will come to my place?
            </span>
          </div>
          <div class="hr1"></div>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionId">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
              diam tincidunt, fringilla ante vitae, dapibus velit.
            </div>
          </div>
          <div class="heading" id="headingOne">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
              Which Helperland professional will come to my place?
            </span>
          </div>
          <div class="hr1"></div>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionId">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
              diam tincidunt, fringilla ante vitae, dapibus velit.
            </div>
          </div>
          <div class="heading" id="headingOne">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseOne">
              Which Helperland professional will come to my place?
            </span>
          </div>
          <div class="hr1"></div>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionId">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
              diam tincidunt, fringilla ante vitae, dapibus velit.
            </div>
          </div>
          <div class="heading" id="headingOne">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
              Which Helperland professional will come to my place?
            </span>
          </div>
          <div class="hr1"></div>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionId">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
              diam tincidunt, fringilla ante vitae, dapibus velit.
            </div>
          </div>
          <div class="heading" id="headingOne">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseOne">
              Which Helperland professional will come to my place?
            </span>
          </div>
          <div class="hr1"></div>
          <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionId">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
              diam tincidunt, fringilla ante vitae, dapibus velit.
            </div>
          </div>
          <div class="heading" id="headingOne">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseOne">
              Which Helperland professional will come to my place?
            </span>
          </div>
          <div class="hr1"></div>
          <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionId">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
              diam tincidunt, fringilla ante vitae, dapibus velit.
            </div>
          </div>
          <div class="heading" id="headingOne">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseOne">
              Which Helperland professional will come to my place?
            </span>
          </div>
          <div class="hr1"></div>
          <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionId">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
              diam tincidunt, fringilla ante vitae, dapibus velit.
            </div>
          </div>
        </div>
        <a href="<?= $base_url."?controller=Home&&function=faq"?>">For more help</a>
      </div>
    </div>
  </div>
  <!-- card section end -->
</section>
<?php
include('news_letter.php');
include("footer2.php");
?>
<script src="./assets/js/helperland.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./assets/js/book_service_schedule_plan.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</body>

</html>
