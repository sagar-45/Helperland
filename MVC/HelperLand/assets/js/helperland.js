/* email validate */
function validate_value($value, $error, $string) {
    if ($value == '') {
        $("." + $error).html('Please enter ' + $string);
        $("." + $error).css('display', 'block');
    }
    else {
        $("." + $error).css('display', 'none');
        return 1;
    }
}
/* password validate */
function passwordValidate($password, $error) {
    if ($password == '') {
        $("." + $error).html('Please enter Password');
        $("." + $error).css('display', 'block');
    }
    else if ($password.length < 6 || $password.length > 14) {
        $("." + $error).html('Password Length must be in between  6 to 14 characters');
        $("." + $error).css('display', 'block');
    }
    else if ($password.length >= 6 && $password.length <= 14) {
        if (!/[A-Z]/.test($password)) {
            $("." + $error).html('Password must contain at least 1 capital letter.');
            $("." + $error).css('display', 'block');
        }
        else if (!/[a-z]/.test($password)) {
            $("." + $error).html('Password must contain at least 1 small letter');
            $("." + $error).css('display', 'block');
        }
        else if (!/[0-9]/.test($password)) {
            $("." + $error).html('Password must contain at least 1 number');
            $("." + $error).css('display', 'block');
        }
        else if (!/[_\-!"@;,.:]/.test($password)) {
            $("." + $error).html('Password must contain at least one special character.');
            $("." + $error).css('display', 'block');
        }
        else {
            $("." + $error).css('display', 'none');
            return 1;
        }
    }
}
/* login function */
const login_button = document.querySelector('.login-modal');
function login_module($email_error, $password_error) {
    $email_input = $('.email_input').val();
    $password_input = $('.password_input').val();
    $email = validate_value($email_input, $email_error, 'email id')
    $password = passwordValidate($password_input, $password_error);
    if ($email == 1 && $password == 1) {
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=login",
            data: {
                "email": $email_input,
                "password": $password_input,
            },
            beforeSend: function () {
                $(".preloader").css("display", "block");
            },
            success: function (response) {
                $(".preloader").css("display", "none");
                if (response == "customer") {
                    window.location.replace("http://localhost/HelperLand/?controller=Home&&function=customer_dashboard");
                }
                else if (response == "service provider") {
                    window.location.replace("http://localhost/HelperLand/?controller=Home&&function=sp_newService");
                }
                else if (response == 'admin') {
                    window.location.replace("http://localhost/HelperLand/?controller=Home&&function=admin_serviceRequests");
                }
                else {
                    $(".alert").html(response);
                    $(".alert").css("display", 'block');
                    setTimeout(function () { $(".alert").css("display", 'none') }, 5000);
                }
            }
        });
    }
}
function user_active($str) {
    $token = $str.split(":")[0].substring(0, 24);
    $userid = $str.split(':')[1];
    if (check_link($token)) {
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=active_user",
            data: {
                'token': $token,
                'userid': $userid
            },
            beforeSend: function () {
                $(".preloader").css("display", "block");
            },
            success: function (response) {
                $(".preloader").css("display", "none");
                window.location.replace("http://localhost/HelperLand/?controller=Home&&function=index");
            }
        });
    }
    else {
        window.location.replace("http://localhost/HelperLand/?controller=Home&&function=error");
    }
}
/* forgot password function */
function forgot_password($error) {
    $forgot_email = $(".forgot_email_input").val();
    if (validate_value($forgot_email, $error, 'email id')) {
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=forgotPassword",
            data: {
                "email": $forgot_email,
            },
            beforeSend: function () {
                $(".preloader").css("display", "block");
            },
            success: function (response) {
                $(".preloader").css("display", "none");
                if (response == "Please Enter Valid Email Id") {
                    $(".email_error1").html(response);
                    $(".email_error1").css('display', 'block');
                }
                else {
                    $("#forgot_password").modal("hide");
                    $("#forgot_link").modal("show");
                }
            }
        });
    }
}
/* check forgot password link is available or not */
function check_link_is_available($str, $curr_date, $curr_time) {
    $token = $str.split(":")[0];
    $date = $str.split(":")[1];
    $time = $str.split(":")[2];
    if ($curr_date == $date) {
        if (($curr_time - $time) <= 5000) {
            if(!check_link($token))
            {
                window.location.replace("http://localhost/HelperLand/?controller=Home&&function=error");
            }
        }
        else {
            window.location.replace("http://localhost/HelperLand/?controller=Home&&function=error");
        }
    }
    else {
        window.location.replace("http://localhost/HelperLand/?controller=Home&&function=error");
    }
}
function check_link($token) {
    var $ans;
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=check_forgot_link",
        async: false,
        data: {
            "token": $token
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            if (response == '0') {
                window.location.replace("http://localhost/HelperLand/?controller=Home&&function=error");
                $ans = 0;
            }
            else {
                $ans = 1;
            }
        }
    });
    return $ans;
}
/* password change */
function reset_password($token) {
    $new_password = $(".cpassword").val();
    $ccpassword = $(".ccpassword").val();
    $pass = passwordValidate($new_password, 'error5');
    $cpass = confirmPassword_validate($ccpassword, 'error6');
    if ($pass == 1 && $cpass == 1) {
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=setPassword",
            data: {
                "token": $token,
                'new_password': $new_password
            },
            beforeSend: function () {
                $(".preloader").css("display", "block");
            },
            success: function (response) {
                $(".preloader").css("display", "none");
                if (response == '1') {
                    sessionStorage.afterPages = 2;
                    window.location.replace("http://localhost/HelperLand/?controller=Home&&function=index");
                }
            }
        });
    }
}
/* for validate mobile number */
function validate_mobile($value, $error, $string) {
    $res = validate_value($value, $error, $string);
    if ($res) {
        if ($value.length != 10) {
            $("." + $error).html($string + ' must be 10 digit long');
            $("." + $error).css('display', 'block');
            return 0;
        }
    }
    return $res;
}
/* for confirm password validation */
function confirmPassword_validate($value, $error) {
    $password = $(".cpassword").val();
    if ($password != $value) {
        $("." + $error).html('Password and confirm password are not match');
        $("." + $error).css('display', 'block');
    }
    else {
        $("." + $error).css('display', 'none');
        return 1;
    }
}
/* for customer and service provider registration */
function register($url) {
    $fname = $(".cfname").val();
    $lname = $(".clname").val();
    $email = $(".cemail").val();
    $number = $(".cnumber").val();
    $password = $(".cpassword").val();
    $ccpassword = $(".ccpassword").val();
    $fname_val = validate_value($fname, 'error1', 'first name');
    $lname_val = validate_value($lname, 'error2', 'last name');
    $email_val = validate_value($email, 'error3', 'email');
    $mobile_val = validate_mobile($number, 'error4', 'mobile number');
    $password_val = passwordValidate($password, 'error5');
    $ccpassword_val = confirmPassword_validate($ccpassword, 'error6');
    if ($fname_val == 1 && $lname_val == 1 && $email_val == 1 && $mobile_val == 1 && $password_val == 1 && $ccpassword_val == 1) {
        $.ajax({
            type: "POST",
            url: $url,
            data: {
                "fname": $fname,
                "lname": $lname,
                "email-add": $email,
                "mbno": $number,
                "password": $password,
            },
            beforeSend: function () {
                $(".preloader").css("display", "block");
            },
            success: function (response) {
                $(".preloader").css("display", "none");
                if (response == "Email exist") {
                    $("#exist").modal("show");
                }
                else {
                    window.location.replace("http://localhost/HelperLand/?controller=Home&&function=index");
                }
            }

        });
    }
}
/* for customer sign up */
function customerSignup() {
    register("http://localhost/HelperLand/?controller=Home&&function=customerSignup",);
}
/* for service provider sign up */
function spSignup() {
    register("http://localhost/HelperLand/?controller=Home&&function=sp_signUp");
}
/* for logout user */
function logout() {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=logout",
        success: function (response) {
            sessionStorage.setItem("logout", 2);
            window.location.replace("http://localhost/HelperLand/?controller=Home&&function=index");
        }
    })
}
/* in book service page go for next tab */
function gonext(current_step, next_step) {
    $("." + current_step).removeClass("active").addClass("previous");
    $("." + next_step).removeClass("disabled");
    document.querySelector("." + next_step).click();
}
/* in book service page setup sevice tab in postal code validate */
function validate_postalcode($userid) {
    $postalcode = $("#setup_service .input .postal_code").val();
    if ($postalcode.length == 0) {
        $(".postal_code_error").html("Please Enter Postal Code");
        setTimeout(function () { $(".postal_code_error").html(" ") }, 5000);
    }
    else {
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=check_sp_availability",
            data: {
                "postalCode_data": $postalcode,
                'userid': $userid
            },
            beforeSend: function () {
                $(".preloader").css("display", "block");
            },
            success: function (response) {
                $(".preloader").css("display", "none");
                if (response == 0) {
                    $(".postal_code_error").html("We are not providing service in this area. We’ll notify you if any helper would start working near your area.");
                    setTimeout(function () { $(".postal_code_error").html(" ") }, 5000);
                }
                else {
                    $(".basic_time").html("3 Hrs");
                    $(".total_time").html("3");
                    $(".total_price").html("54");
                    $(".per_price").html("54");
                    $(".discount_data").html("00");
                    $(".e_price").html("54");
                    $(".add-postal_code").value = $postalcode;
                    gonext("setup_service", "schedule_plan");
                    $("#schedule_plan .date input").datepicker({ dateFormat: 'dd/mm/yy', minDate: 0 });
                }
            }
        });
    }
}
/* set date on payment card */
function set_date() {
    $(".payment .service_date").html($(".book_time .date input").val());
}
/* in book service page go from schedule & plan tab to your details tab */
function from_schedule_plan_to_details($userid) {
    get_address();
    get_sp($userid);
    gonext("schedule_plan", "your_details");
}
/* in book service page go from your details tab to make payment tab */
function from_your_details_to_payment() {
    if ($("input[name='address']:checked").val()) {
        gonext("your_details", "make_payment");
    }
    else {
        $("#your_details .address_alert").css("display", "block");
        setTimeout(function () { $("#your_details .address_alert").css("display", "none") }, 5000);
    }
}
/* in book service page in your details tab show add address card */
function add_new_address() {
    $(".add_new_address_btn").css("display", 'none');
    $(".address_card").css("display", 'block');
    $(".address_card .add-postal_code").val($("#setup_service .postal_code").val());
}
/* in book service page in your details tab hide add address card */
function hide_card_new_address() {
    document.querySelector(".add_new_address_btn").style.display = "block";
    document.querySelector(".address_card").style.display = "none";
}
/* in book service page in your details tab select favourite sp  */
function select_fav_sp(clicked) {
    var $element = $("." + clicked);
    $(".favourite_sp .fav_sp_row .select_fav_sp").removeClass('active');
    $(".favourite_sp .fav_sp_row .select_fav_sp").html("Select");
    if ($element.hasClass("active")) {
        $element.removeClass("active");
        $element.html("Select");
    }
    else {
        $element.addClass("active");
        $element.html("Remove");
    }
}
/* in book service page in your details tab create new address data validate */
function create_new_address() {
    var $street = $(".street").val();
    var $house_no = $(".house_no").val();
    var $city = $(".add_city").val();
    var $postalCode = $(".add-postal_code").val();
    var $phone_number = $(".add_phone_number").val();
    if ($street == "" || $house_no == "" || $city == "" || $phone_number == "") {
        $(".address_card_alert").html("Please fill all details !!!");
        $(".address_card_alert").css("display", "block")
        setTimeout(function () { $(".address_card_alert").css("display", "none") }, 5000);
    }
    else if ($phone_number.length != 10) {
        $(".address_card_alert").html("Mobile number must be 10 digit long !!!");
        $(".address_card_alert").css("display", "block")
        setTimeout(function () { $(".address_card_alert").css("display", "none") }, 5000);
    }
    else {
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=store_userAddress",
            data: {
                "addressline1": $street,
                "addressline2": $house_no,
                "city": $city,
                "postalCode": $postalCode,
                "mobile": $phone_number
            },
            success: function (response) {
                get_address()
                hide_card_new_address();
            }
        });
    }
}
/* in book service page in your details tab get address from database  */
function get_address() {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=get_userAddress",
        success: function (response) {
            $("#your_details .details ul").html(response);
        }

    });
}
/* in book service page in your details tab get service provider from database */
function get_sp($userid) {
    $postal_code = $(".postal_code").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=get_sp",
        data: {
            "postalCode_data": $postal_code,
            "userid": $userid
        },
        success: function (response) {
            $("#your_details .favourite_sp .fav_sp_row").html(response);
        }
    });
}
function enble_apply_btn() {
    if ($("#make_payment .promo_code input").val() == "") {
        $("#make_payment .promo_code .btn").attr("disabled", true);
    }
    else {
        $("#make_payment .promo_code .btn").attr("disabled", false);
    }
}
/* complete book service functiion */
function book_service_complete() {
    $postalCode = $(".postal_code").val();
    $serviceHourlyrate = "18";
    $serviceHours = $(".basic_time").html().split(" ")[0];
    $extraHours = $(".total_time").html() - $serviceHours;
    $extra_services = [];
    $(".duration .active").each(function () {
        $extra_services.push($(this).attr("class")[8]);
    });
    $favourite_sp = null;
    if ($("#your_details .fav_sp_row .fav_sp_card .btn").hasClass("active")) {
        $favourite_sp = $("#your_details .fav_sp_row .fav_sp_card .active").attr("class").split(" ")[2];
    }
    $serviceStartDate = $(".payment .time .service_date").html() + " " + $(".payment .time_label").html() + ":00";
    $address_radio = $('input[name="address"]:checked');
    $service_address = $address_radio.siblings(".address").html();
    $addressline1 = $service_address.split(" ")[0];
    $addressline2 = $service_address.split(" ")[1];
    $city = $service_address.split(" ")[3];
    $service_mobile = $address_radio.siblings(".no").html();
    $comments = $("#schedule_plan .comment textarea").val();
    $haspets = ($("#schedule_plan .comment #pet").is(":checked") ? 1 : 0);
    $subtotal = $(".total_time").html();
    $discount = "0";
    $serviceid = Math.floor(1000 + Math.random() * 9000);
    $totalcost = $(".total_price").html();
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=booking_service",
        data: {
            "postalCode": $postalCode,
            "serviceStartDate": $serviceStartDate,
            "serviceHourlyrate": $serviceHourlyrate,
            "serviceHours": $serviceHours,
            "extraHours": $extraHours,
            "extra_services": $extra_services,
            "favourite_sp": $favourite_sp,
            "addressline1": $addressline1,
            "addressline2": $addressline2,
            "city": $city,
            "service_mobile": $service_mobile,
            "comments": $comments,
            "haspets": $haspets,
            "subtotal": $subtotal,
            "discount": $discount,
            "totalcost": $totalcost,
            "paymentDue": 0,
            "paymentDone": 1,
            "Serviceid": $serviceid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#booking_sucess .id").html(response);
            $(".booking_sucess_popup").click();
        }
    });
}
/* only take number in input */
function isNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
}

/* customer pages ----> start */
function loadnewServiceRequest($user, $status1, $status2) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=customer_dashboard_tableData",
        data: {
            "userId": $user,
            "Status1": $status1,
            "Status2": $status2,
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#service_history tbody").html(response);
            $(".readOnly_data").rateYo({
                readOnly: true,
                starWidth: '15px'
            });
            $("#reschedule_request .date input").datepicker({ dateFormat: 'dd/mm/yy', minDate: 0 });
            pagination();
        }
    });
}
function show_RequestDetails_Popup($id, $status1) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=show_request_popup",
        data: {
            "serviceId": $id,
            "status1": $status1
        },
        success: function (response) {
            $("#details_request").html(response);
            $("#details_request").modal('show');
        }
    });
}
function reschedule_request($serviceid) {
    $("#reschedule_request .modal-content .reschedule_btn").attr("id", $serviceid);
}
function reschedule_request_date_time($serviceid, $userid) {
    $date = $("#reschedule_request .reschedule_date_time .date input").val();
    $time = $("#reschedule_request .reschedule_date_time #when_need").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=reschedule_date_time",
        data: {
            "serviceId": $serviceid,
            "date": $date,
            "time": $time,
            "userid": $userid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#reschedule_request .alert").html(response);
            $("#reschedule_request .alert").css("display", "block");
            setTimeout(function () { $("#reschedule_request .alert").css("display", "none") }, 5000);
            loadnewServiceRequest($userid, 0, 1);
        }
    });
}
function cancle_request($serviceid) {
    $("#cancle_request .modal-content .cancle_btn").attr("id", $serviceid);
}
function cancle_btn($serviceid, $userid, $usertypeid) {
    if (!$(".reason textarea").val()) {
        $(".reschedule_btn").css("disabled", "true");
        $(".reason textarea").focus();
    }
    else {
        $(".reschedule_btn").css("disabled", "false");
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=cancle_request",
            data: {
                "serviceId": $serviceid,
                "userid": $userid,
                "reason": $(".reason textarea").val()
            },
            beforeSend: function () {
                $(".preloader").css("display", "block");
            },
            success: function (response) {
                $(".preloader").css("display", "none");
                $("#cancle_request").modal("hide");
                if ($usertypeid == '3') {
                    load_data_of_admin_service_request();
                }
                else if ($usertypeid == '1') {
                    loadnewServiceRequest($userid, 0, 1);
                }
            }
        });
    }
}
function show_rating_card($serviceRequestid, $spid, $userid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=show_rating",
        data: {
            "userid": $userid,
            "serviceRequestid": $serviceRequestid,
            "spid": $spid
        },
        success: function (response) {
            $("#rate_sp div").html(response);
            $data = ($(".table_page tbody .result").html() == null) ? 0 : $("#rate_sp .result").html();
            $(".readOnly_data").rateYo({
                readOnly: true,
                starWidth: '15px',
                rating: $data
            });
            $(".rateYo").rateYo();
            $(".rateYo").rateYo("option", "starWidth", "15px");
        }
    });
}
function give_rating($userid, $serviceRequestid, $spid) {
    $on_arrival = $(".rateYo").rateYo('rating')[1];
    $friendly = $(".rateYo").rateYo('rating')[2];
    $qos = $(".rateYo").rateYo('rating')[3];
    $.ajax({
        type: 'POST',
        url: "http://localhost/HelperLand/?controller=Home&&function=give_rating",
        data: {
            "userid": $userid,
            "serviceRequestid": $serviceRequestid,
            "spid": $spid,
            "comments": $("#rate_sp .feedback textarea").val(),
            "on_arrival": $on_arrival,
            "friendly": $friendly,
            "qos": $qos
        },
        success: function (response) {
            loadnewServiceRequest($userid, 3, 4);
        }
    });
}
function customer_fav_sp($userid) {
    $.ajax({
        type: 'POST',
        url: "http://localhost/HelperLand/?controller=Home&&function=fav_block_sp",
        data: {
            "userid": $userid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $(".table_page tbody").html(response);
            $(".readOnly_data").rateYo({
                readOnly: true,
                starWidth: '15px'
            });
            pagination();
        }
    });
}
function set_favorite_sp($spid, $custid, $isfav) {
    $.ajax({
        type: 'POST',
        url: "http://localhost/HelperLand/?controller=Home&&function=set_fav_sp",
        data: {
            "spid": $spid,
            "custid": $custid,
            "isfav": $isfav
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            customer_fav_sp($custid);
        }
    });
}
function set_block_sp($spid, $custid, $isblock) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=set_block_sp",
        data: {
            'custid': $custid,
            'spid': $spid,
            "isblock": $isblock
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            customer_fav_sp($custid);
        }
    });
}
function load_my_data($userid) {
    var $data;
    $.ajax({
        type: 'POST',
        url: "http://localhost/HelperLand/?controller=Home&&function=get_user_data",
        dataType: 'json',
        async: false,
        data: {
            "userid": $userid,
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#my_details .first_name input").val(response.FirstName);
            $("#my_details .last_name input").val(response.LastName);
            $("#my_details .email-address input").val(response.Email);
            $("#my_details .mobile_number input").val(response.Mobile);
            var $date = new Date(response.DateOfBirth);
            $("#my_details .dob .date").val($date.getDate());
            $("#my_details .dob .month").val(($date.getMonth() + 1));
            $("#my_details .dob .year").val($date.getFullYear());
            $data = response;
        }
    });
    return $data;
}
function validate_user_data($firstName, $lastName, $email, $mobile, $date, $month, $year) {
    if ($firstName == "") {
        $("#my_details .alert").css("display", "block");
        $("#my_details .alert").html("Please Enter First Name");
        return 1;
    }
    else if ($lastName == "") {
        $("#my_details .alert").css("display", "block");
        $("#my_details .alert").html("Please Enter Last Name");
        return 1;
    }
    else if ($mobile == "") {
        $("#my_details .alert").css("display", "block");
        $("#my_details .alert").html("Please Enter Mobile Number");
        return 1;
    }
    else if ($mobile.length != 10) {
        $("#my_details .alert").css("display", "block");
        $("#my_details .alert").html("Please Enter Valid Mobile Number");
        return 1;
    }
    else if ($month == '4' || $month == '6' || $month == '9' || $month == '11') {
        if ($date > 30) {
            $("#my_details .alert").css("display", "block");
            $("#my_details .alert").html("Please Enter Valid Date of Birth");
            return 1;
        }
        else {
            return 0;
        }
    }
    else if ($month == '2') {
        if ($year % 4 == 0) {
            if ($date > 29) {
                $("#my_details .alert").css("display", "block");
                $("#my_details .alert").html("Please Enter Valid Date of Birth");
                return 1;
            }
            else {
                return 0;
            }
        }
        if ($year % 4 != 0) {
            if ($date > 28) {
                $("#my_details .alert").css("display", "block");
                $("#my_details .alert").html("Please Enter Valid Date of Birth");
                return 1;
            }
            else {
                return 0;
            }
        }
    }
    return 0;
}
function change_my_profile_data($userid) {
    $firstName = $("#my_details .first_name input").val();
    $lastName = $("#my_details .last_name input").val();
    $email = $("#my_details .email-address input").val();
    $mobile = $("#my_details .mobile_number input").val();
    $date = $("#my_details .dob .date").val();
    $month = $("#my_details .dob .month").val();
    $year = $("#my_details .dob .year").val();
    $("#my_details .alert").removeClass("alert-success").addClass('alert-danger');
    $dob = $year + "-" + $month + "-" + $date;
    $ans = validate_user_data($firstName, $lastName, $email, $mobile, $date, $month, $year);
    if ($ans == 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=change_my_profile",
            data: {
                'userid': $userid,
                'firstName': $firstName,
                'lastName': $lastName,
                'email': $email,
                'mobile': $mobile,
                'dob': $dob
            },
            beforeSend: function () {
                $(".preloader").css("display", "block");
            },
            success: function (response) {
                $(".preloader").css("display", "none");
                $(".welcome b").html($firstName);
                $("#my_details .alert").removeClass("alert-danger").addClass('alert-success');
                $("#my_details .alert").css("display", "block");
                $("#my_details .alert").html("User details Updated Successfully !!");
            }
        });
    }
    setTimeout(function () { $(".alert").css("display", "none") }, 2000);
}
function get_my_address($userid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=my_addresses",
        data: {
            'userid': $userid
        },
        success: function (response) {
            $("#my_addresses .table tbody").html(response);
        }
    });
}
function edit_address($addressid, $streetname, $housenumber, $city, $postalcode, $mobile) {
    $("#edit_address").modal("show");
    $('#edit_address .edit').attr('id', $addressid);
    $('#edit_address .details .street_name input').val($streetname);
    $('#edit_address .details .house_number input').val($housenumber);
    $('#edit_address .details .postal_code input').val($postalcode);
    $('#edit_address .details .city input').val($city);
    $('#edit_address .details .mobile_number input').val($mobile);
}
function validate_address($street, $house_no, $postalCode, $city) {
    if ($street == '') {
        $("#edit_address .alert").css("display", "block");
        $("#edit_address .alert").html("Please Enter Street Name");
        return 1;
    }
    else if ($house_no == '') {
        $("#edit_address .alert").css("display", "block");
        $("#edit_address .alert").html("Please Enter House Number");
        return 1;
    }
    else if ($postalCode == '') {
        $("#edit_address .alert").css("display", "block");
        $("#edit_address .alert").html("Please Enter Postal Code");
        return 1;
    }
    else if ($city == '') {
        $("#edit_address .alert").css("display", "block");
        $("#edit_address .alert").html("Please Enter City");
        return 1;
    }
    return 0;
}
function change_address($userid) {
    $addressid = $('#edit_address .edit').attr('id');
    $street = $('#edit_address .details .street_name input').val();
    $house_no = $('#edit_address .details .house_number input').val();
    $postalCode = $('#edit_address .details .postal_code input').val();
    $city = $('#edit_address .details .city input').val();
    $mobile = $('#edit_address .details .mobile_number input').val();
    $ans = validate_address($street, $house_no, $postalCode, $city);
    if ($ans == 0) {
        if ($mobile == '') {
            $("#edit_address .alert").css("display", "block");
            $("#edit_address .alert span").html("Please Enter Mobile Number");
        }
        else {
            $.ajax({
                type: "POST",
                url: "http://localhost/HelperLand/?controller=Home&&function=change_addresses",
                data: {
                    'addressid': $addressid,
                    'streetname': $street,
                    'houseNumber': $house_no,
                    'postalCode': $postalCode,
                    'city': $city,
                    'mobile': $mobile
                },
                success: function (response) {
                    if (response == '1') {
                        $("#edit_address").modal("hide");
                        $("#my_addresses .alert").css("display", "block");
                        $("#my_addresses .alert").html("Address Update Successfully !!!!");
                        get_my_address($userid);
                    }
                }
            });

        }
    }
    setTimeout(function () { $(".alert").css("display", "none") }, 2000);
}
function delete_address_click($addressid) {
    $("#delete_address .btn").attr("id", $addressid);
}
function delete_address_confirm($addressid, $userid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=delete_addresses",
        data: {
            'addressid': $addressid,
        },
        success: function (response) {
            if (response == '1') {
                $("#delete_address").modal("hide");
                $("#my_addresses .alert").css("display", "block");
                $("#my_addresses .alert").html("Delete Address Successfully !!!!");
                get_my_address($userid);
                setTimeout(function () { $(".alert").css("display", "none") }, 2000);
            }
        }
    });
}
function change_password($userid) {
    $old_pass = $("#change_password .old_pass").val();
    $new_pass = $("#change_password .new_pass").val();
    $confirm_pass = $("#change_password .confirm_pass").val();
    $("#change_password .alert").removeClass('alert-success').addClass('alert-danger');
    if ($old_pass == '') {
        $("#change_password .alert").html("Please enter Old Password.");
        $("#change_password .alert").css("display", "block");
    }
    else if ($new_pass == '') {
        $("#change_password .alert").html("Please enter New Password.");
        $("#change_password .alert").css("display", "block");
    }
    else if ($confirm_pass == '') {
        $("#change_password .alert").html("Please enter Confirm Password.");
        $("#change_password .alert").css("display", "block");
    }
    else if ($new_pass.length < 6) {
        $("#change_password .alert").html("Password must be 6 letter.");
        $("#change_password .alert").css("display", "block");
    }
    else if ($new_pass != $confirm_pass) {
        $("#change_password .alert").html("Password and Confirm Password must be match.");
        $("#change_password .alert").css("display", "block");
    }
    else {
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=change_password",
            data: {
                'userid': $userid,
                'old_pass': $old_pass,
                'new_pass': $new_pass,
                'confirm_pass': $confirm_pass
            },
            success: function (response) {
                if (response == 1) {
                    $("#change_password .alert").html("You have successfully changed your password!");
                    $("#change_password .alert").css("display", "block");
                    $("#change_password .alert").removeClass('alert-danger').addClass('alert-success');
                }
                else {
                    $("#change_password .alert").html("Your current password is wrong!");
                    $("#change_password .alert").css("display", "block");
                }
            }
        });
    }
    setTimeout(function () { $(".alert").css("display", "none") }, 2000);
}
/* customer pages ----> end */
/* service provider pages ----> start */
function data_of_this_page($status, $userid) {
    $distance = $("#filter .km_select").val();
    $haspets = $("#filter input[type='checkbox']").prop('checked') ? 1 : 0;
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=get_data_of_requests",
        data: {
            'status': $status,
            'haspets': $haspets,
            'distance': $distance,
            'userid': $userid
        },
        success: function (response) {
            $(".table tbody").html(response);
            pagination();
        }
    });
}
function accept_service($userid, $serviceid, $starttime, $totaltime, $date) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=accept_service_requests",
        data: {
            'userid': $userid,
            'serviceid': $serviceid,
            'starttime': $starttime,
            'totaltime': $totaltime,
            'date': $date
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#exist .false img").attr("src", "./assets/images/cross_error.png");
            $("#exist .false").css("background-color", '#a94442');
            if (response == 0) {
                $("#exist").modal("show");
                $("#exist p").html("This service request is no more available. It has been assigned to another provider.");
            }
            else if (response == 1) {
                $("#exist .false img").attr("src", "./assets/images/correct-white-medium.png");
                $("#exist .false").css("background-color", '#67b644');
                $("#exist p").html("Service Accepted");
                $("#exist").modal("show");
                data_of_this_page(0, $userid);
            }
            else {
                $("#exist").modal("show");
                $("#exist p").html("Another service request " + response.substring(1) + " has already been assigned which has time overlap with this service request. You can’t pick this one!");
            }
        }
    });
}
function data_of_upcoming_page($userid, $status) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=upcoming_service_requests",
        data: {
            'userid': $userid,
            'status': $status
        },
        success: function (response) {
            $(".table tbody").html(response);
            pagination();
        }
    });
}
function show_sp_RequestDetails_Popup($serviceid, $status, $userid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=show_sp_request_popup",
        data: {
            "serviceId": $serviceid,
            "status": $status,
            'userid': $userid
        },
        success: function (response) {
            $("#details_request").html(response);
            $("#details_request").modal('show');
        }
    });
}
function complete_request($userid, $serviceid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=complete_request",
        data: {
            'serviceid': $serviceid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#exist .false img").attr("src", "./assets/images/correct-white-medium.png");
            $("#exist .false").css("background-color", '#67b644');
            $("#exist p").html("Service Completed");
            $("#exist").modal("show");
            data_of_upcoming_page($userid, 1);
        }
    });
}
function cancle_request_by_sp($serviceid, $userid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=cancle_request_by_sp",
        data: {
            'serviceid': $serviceid,
            'userid': $userid
        },
        beforeSend: function () {
            $("#cancle_request").modal("hide");
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#exist .false img").attr("src", "./assets/images/correct-white-medium.png");
            $("#exist .false").css("background-color", '#67b644');
            $("#exist p").html("Service Cancelled");
            $("#exist").modal("show");
            data_of_upcoming_page($userid, 1);
        }
    });
}
function sp_serive_schedule($userid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=get_sp_serviceSchedule",
        data: {
            'userid': $userid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $(".calendar").fullCalendar({
                header: {
                    left: 'prev,next,title',
                    right: 'button'
                },
                events: JSON.parse(response),
                eventClick: function (event) {
                    show_sp_RequestDetails_Popup(event.id, 3, $userid);
                }
            });
        }
    });
}
function load_my_rating($userid, $rating_status) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=load_my_rating",
        data: {
            'userid': $userid,
            'rating_status': $rating_status
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#filter .table tbody").html(response);
            $(".rating .readOnly_data").rateYo({
                readOnly: true,
                starWidth: '13px'
            });
            pagination();
        }
    });
}
function get_rating_filter($userid) {
    load_my_rating($userid, $("#filter select").val());
}
function block_customer_page_details($userid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=load_block_customer",
        data: {
            'userid': $userid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#filter tbody").html(response);
            pagination();
        }
    });
}
function block_unblock_cust($custid, $spid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=block_unblock_customer",
        data: {
            'custid': $custid,
            'spid': $spid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            block_customer_page_details($spid);
        }
    });
}
function get_sp_data($userid) {
    $responds = load_my_data($userid);
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=get_default_address",
        dataType: 'json',
        data: {
            'userid': $userid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            if (response != 0) {
                $("#edit_address .div_header").attr("id", response.AddressId);
                $("#edit_address .streetName input").val(response.AddressLine1);
                $("#edit_address .houseNumber input").val(response.AddressLine2);
                $("#edit_address .postalcode input").val(response.PostalCode);
                $("#edit_address .city input").val(response.City);
            }
        }
    });
    $("#my_details .gender #" + $responds.Gender).prop('checked', true);
    if ($responds.UserProfilePicture == null) {
        $("#my_details .selcted_avatar_img").attr("src", "./assets/images/avatar-hat.png");
        $("#my_details .avatar .hat").addClass("active");
    }
    else {
        $("#my_details .selcted_avatar_img").attr("src", "./assets/images/avatar-" + $responds.UserProfilePicture + ".png");
        $("#my_details .avatar ." + $responds.UserProfilePicture).addClass("active");
    }
    $("#my_details .acc_status").html($responds.IsActive == 1 ? "Active" : "Deleted");
    $("#my_details .details .nationality").val($responds.Nationality);
}
function change_avatar($className) {
    $("#my_details .avatar img").removeClass("active");
    $("#my_details .avatar ." + $className).addClass("active");
    $("#my_details .selcted_avatar_img").attr("src", "./assets/images/avatar-" + $className + ".png");
}
function change_sp_profile_data($userid) {
    $firstName = $("#my_details .first_name input").val();
    $lastName = $("#my_details .last_name input").val();
    $email = $("#my_details .email-address input").val();
    $mobile = $("#my_details .mobile_number input").val();
    $date = $("#my_details .dob .date").val();
    $month = $("#my_details .dob .month").val();
    $year = $("#my_details .dob .year").val();
    $nationality = $("#my_details .nationality").val();
    $gender = $("input[name=gender]:checked", '.gender').attr("id");
    $avatar = $("#my_details .avatar .active").attr("class").split(" ")[0];
    $dob = $year + "-" + $month + "-" + $date;
    $addressid = $("#edit_address .div_header").attr("id");
    $street = $('#edit_address .streetName input').val();
    $house_no = $('#edit_address .houseNumber input').val();
    $postalCode = $('#edit_address .postalcode input').val();
    $city = $('#edit_address .city input').val();
    $ans = validate_user_data($firstName, $lastName, $email, $mobile, $date, $month, $year);
    if ($ans == 0) {
        $ans2 = validate_address($street, $house_no, $postalCode, $city);
        if ($ans2 == 0) {
            $.ajax({
                type: "POST",
                url: "http://localhost/HelperLand/?controller=Home&&function=set_sp_profile_data",
                data: {
                    'userid': $userid,
                    'firstName': $firstName,
                    'lastName': $lastName,
                    'email': $email,
                    'mobile': $mobile,
                    'dob': $dob,
                    'nationality': $nationality,
                    'gender': $gender,
                    'avatar': $avatar,
                    'addressid': $addressid,
                    'street': $street,
                    'house_no': $house_no,
                    'postalCode': $postalCode,
                    'city': $city
                },
                beforeSend: function () {
                    $(".preloader").css("display", "block");
                },
                success: function (response) {
                    $(".preloader").css("display", "none");
                    $(".alert-success").css("display", "block");
                    $(".alert-success").html("User data updated successfully !!!");
                    get_sp_data($userid);
                }
            });
        }
    }
    setTimeout(function () { $(".alert").css("display", "none") }, 2000);
}
/* service provider pages ----> end */
/* admin pages */
function load_data_of_admin_service_request() {
    $serviceid = $(".table_content .service_id").val();
    $postalcode = $(".table_content .postal_code").val();
    $email = $(".table_content .email ").val();
    $customer = $(".table_content .select_customer ").val();
    $sp = $(".table_content .select_sp ").val();
    $status = $(".table_content .select_status ").val();
    $sppayment = $(".table_content .select_sp_payment ").val();
    $pstatus = $(".table_content .select_p_status ").val();
    $issue = $(".table_content #issue ").prop("checked") == true ? 1 : 0;
    $startdate = $(".table_content .start_date").val();
    $enddate = $(".table_content .end_date").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=get_servicerequest_admin",
        data: {
            'serviceid': $serviceid,
            'postalcode': $postalcode,
            'email': $email,
            'customer': $customer,
            'sp': $sp,
            'status': $status,
            'sppayment': $sppayment,
            'pstatus': $pstatus,
            'issue': $issue,
            "startdate": $startdate,
            'enddate': $enddate
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $(".table_content .start_date").datepicker({ dateFormat: 'yy-mm-dd' });
            $(".table_content .end_date").datepicker({ dateFormat: 'yy-mm-dd' });
            $(".table_data tbody").html(response);
            $(".readOnly_data").rateYo({
                readOnly: true,
                starWidth: '15px'
            });
            pagination();
        }
    });
}
function open_edit_sr($serviceid) {
    $address = $(".table_data tbody #" + $serviceid + " .details .desc span").html();
    $street = $address.split(" ")[0];
    $house = $address.split(" ")[1];
    $postacode = $address.split(" ")[2];
    $city = $address.split(" ")[3];
    $date = $(".table_data tbody #" + $serviceid + " td:nth-child(2) b").html();
    $starttime = $(".table_data tbody #" + $serviceid + " .starttime").html().replace(":", ".");
    $("#reschedule_request .date input").val($date);
    $("#reschedule_request #when_need").val($starttime);
    $("#reschedule_request .street_name input").val($street);
    $("#reschedule_request .house_number input").val($house);
    $("#reschedule_request .city input").val($city);
    $("#reschedule_request .postal_code input").val($postacode);
    $("#reschedule_request .reschedule_btn").attr('id', $serviceid);
    $("#reschedule_request .date input").datepicker({ dateFormat: 'yy-mm-dd', minDate: 0 });
    $("#reschedule_request").modal("show");
}
function edit_sr_admin($serviceid, $userid) {
    $date = $("#reschedule_request .date input").val();
    $time = $("#reschedule_request #when_need").val().replace(".", ":");
    $street = $("#reschedule_request .street_name input").val();
    $house_no = $("#reschedule_request .house_number input").val();
    $city = $("#reschedule_request .city input").val();
    $postalcode = $("#reschedule_request .postal_code input").val();
    $spid = null;
    if ($(".table_data tbody #" + $serviceid + " td:nth-child(4) div").attr('id')) {
        $spid = $(".table_data tbody #" + $serviceid + " td:nth-child(4) div").attr('id');
    }
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=changeSR_admin",
        data: {
            'serviceid': $serviceid,
            'date': $date,
            'time': $time,
            'street': $street,
            'house_no': $house_no,
            'city': $city,
            'postalcode': $postalcode,
            'spid': $spid,
            'userid': $userid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $("#reschedule_request").modal("hide");
            if (response != 1) {
                $("#failed_edit .text").html(response);
                $("#failed_edit").modal("show");
            }
            else {
                load_data_of_admin_service_request();
                $(".table_content .alert").css("display", "block");
                $(".table_content .alert").html("Service request edited successfully!!");
                setTimeout(function () { $(".alert").css("display", 'none') }, 5000);
            }
        }
    });
}
function clear_filter() {
    $(".table_content .filter input").val("");
    if ($(".table_content #issue").length != 0) {
        $(".table_content #issue").prop('checked', false);
        $(".table_content .filter select").val('-1');
        $(".table_content .filter .select_customer").select2().val('-1');
        $(".table_content .filter .select_sp").select2().val('-1');
        load_data_of_admin_service_request();
    }
    else {
        $(".table_content .filter select").val('-1');
        $(".table_content .filter .select_username").select2().val('-1');
        load_admin_userManagement();
    }
}
function load_admin_userManagement() {
    $username = $(".table_content .select_username ").val();
    $usertype = $(".table_content .select_usertype ").val();
    $postalcode = $(".table_content .postal_code").val();
    $email = $(".table_content .email ").val();
    $startdate = $(".table_content .start_date").val();
    $enddate = $(".table_content .end_date").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=get_userManagement_admin",
        data: {
            'postalcode': $postalcode,
            'email': $email,
            'username': $username,
            'usertype': $usertype,
            "startdate": $startdate,
            'enddate': $enddate
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $(".table_content .start_date").datepicker({ dateFormat: 'yy-mm-dd' });
            $(".table_content .end_date").datepicker({ dateFormat: 'yy-mm-dd' });
            $(".table_data tbody").html(response);
            pagination();
        }
    });
}
function create_option($classname, $typeid1, $typeid2 = null) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=get_filter_SelectOption",
        data: {
            "typeid1": $typeid1,
            "typeid2": $typeid2
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $(".filter ." + $classname).append(response);
            if ($typeid2 == null) {
                $(".select_customer").select2();
                $(".select_sp").select2();
            }
            else {
                $(".select_username").select2();
            }
        }
    });
}
function change_userstatus($userid, $status) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=change_userStatus",
        data: {
            'userid': $userid,
            'status': $status
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            load_admin_userManagement();
        }
    });

}
function approved_sp($userid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/HelperLand/?controller=Home&&function=approved_sp",
        data: {
            'userid': $userid
        },
        beforeSend: function () {
            $(".preloader").css("display", "block");
        },
        success: function (response) {
            $(".preloader").css("display", "none");
            $(".table_content .alert").css("display", "block");
            $(".table_content .alert").html("User Approved successfully !!");
            setTimeout(function () { $(".alert").css("display", 'none') }, 2000);
            load_admin_userManagement();
        }
    });
}
function refun_modal($serviceid) {
    $("#refund_modal .refund_btn").attr('id', $serviceid);
    $("#refund_modal .all_amount .paid_amount .figure").html($(".table_content #" + $serviceid + " td:nth-child(5)").html());
    $("#refund_modal").modal("show");
}
function calculate_amount() {
    $total_amount = $("#refund_modal .paid_amount .figure").html().split(" ")[0];
    $given_amount = $("#refund_modal .calculate .amount input").val();
    $type_amount = $("#refund_modal .calculate .amount select").val();
    if ($type_amount == 0) {
        $refund_amount = $total_amount * $given_amount / 100;
    }
    else {
        $refund_amount = $given_amount
    }
    $("#refund_modal .refund_amount .figure").html($refund_amount + " €");
    $("#refund_modal .calculate .calculation input").val($refund_amount + " €");
}
function refund_amount($serviceid) {
    $total_amount = parseFloat($("#refund_modal .paid_amount .figure").html().split(" ")[0]);
    $refund_amount = parseFloat($("#refund_modal .refund_amount .figure").html().split(" ")[0]);
    if ($refund_amount > $total_amount) {
        $("#refund_modal .alert").html("Refunded amount must not be greater than the service amount paid by customer");
        $("#refund_modal .alert").css("display", "block");
    }
    else if ($refund_amount == '') {
        $("#refund_modal .alert").html("Please enter amount");
        $("#refund_modal .alert").css("display", "block");
    }
    else if ($("#refund_modal .reason").val() == '') {
        $("#refund_modal .alert").html("Please enter a reason");
        $("#refund_modal .alert").css("display", "block");
    }
    else if ($("#refund_modal .notes").val() == '') {
        $("#refund_modal .alert").html("Please enter a note");
        $("#refund_modal .alert").css("display", "block");
    }
    else {
        $.ajax({
            type: "POST",
            url: "http://localhost/HelperLand/?controller=Home&&function=refund_amount",
            data: {
                'serviceid': $serviceid,
                'refundAmount': $refund_amount
            },
            beforeSend: function () {
                $(".preloader").css("display", "block");
            },
            success: function (response) {
                $(".preloader").css("display", "none");
                $("#refund_modal").modal("hide");
                $(".table_content .alert").html("Service request amount has been successfully refunded");
                $(".table_content .alert").css("display", "block");
                setTimeout(function () { $(".table_content .alert").css("display", "none") }, 5000);
            }
        });
    }
    setTimeout(function () { $("#refund_modal .alert").css("display", "none") }, 5000);
}
function pagination() {
    $.fn.dataTable.ext.errMode = 'none';
    $('.table').DataTable({
        "pagingType": "full_numbers",
        "searching": false,
        "dom": '"B" <"top">rt<"bottom"lip><"clear">',
        "ordering": false,
        "info": false,
        "oLanguage": {
            "oPaginate": {
                "sNext": '<i class="bi bi-chevron-right"></i>',
                "sPrevious": '<i class="bi bi-chevron-left"></i>',
                "sFirst": '<i class="bi bi-caret-left-fill"></i>',
                'sLast': '<i class="bi bi-caret-right-fill"></i>'
            }
        },
        "language": {
            "infoEmpty": "No entries available to show"
        },
        buttons: [
            {
                extend: 'excel',
                className: 'btn',
                text: 'Export'
            }
        ]
    });
}
/* in home page when scroll is happen ----> start */
const toTop = document.querySelector('.up-arrow');
const navbar = document.querySelector(".nav-light");
const logo = document.querySelector(".logo");
const ws_navbrand = document.querySelector(".ws_navbrand");
const dark_link = document.querySelectorAll(".dark");
window.addEventListener('scroll', () => {
    if (window.pageYOffset > 0) {
        navbar.style.backgroundColor = "#525252";
        logo.style.height = "55px";
        logo.style.width = "73px";
        if (ws_navbrand != null) {
            ws_navbrand.style.width = "73px";
            ws_navbrand.style.height = "55px";
        }
        dark_link[0].style.backgroundColor = "#006072";
        dark_link[1].style.backgroundColor = "#006072";
        dark_link[2].style.backgroundColor = "#006072";
    }
    else {
        navbar.style.backgroundColor = "transparent";
        logo.style.height = "100%";
        logo.style.width = "100%";
        if (ws_navbrand != null) {
            ws_navbrand.style.width = "11.2%";
            ws_navbrand.style.height = "14%";
        }
        dark_link[0].style.backgroundColor = "transparent";
        dark_link[1].style.backgroundColor = "transparent";
        dark_link[2].style.backgroundColor = "transparent";
    }
    if (window.pageYOffset > 200) {
        toTop.classList.add("active");
    }
    else {
        toTop.classList.remove("active");
    }
});
/* in home page when scroll is happen ----> end */
// for popup
function login_popup() {
    document.querySelector(".login").click();
    sessionStorage.setItem('afterPages', 0);
}

function forgot_password_popup() {
    document.querySelector(".forgot_btn").click();
}

function forgot_link_success() {
    document.querySelector(".forgot_suceess").click();
}
