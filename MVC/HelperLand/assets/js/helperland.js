const email_input=document.querySelector('.email_input');
function outsideemail()
{
    let value=email_input.value;
    if(value==0)
    {
        document.querySelector(".email_error").innerHTML='Please enter email id';
        document.querySelector(".email_error").style.display='block';
    }
    else
    {
        document.querySelector(".email_error").style.display='none';
    }
}
const password_input=document.querySelector('.password_input');
function outsidepassword()
{
    let value=password_input.value;
    if(value==0)
    {
        document.querySelector(".password_error").innerHTML='Please Enter Password';
        document.querySelector(".password_error").style.display='block';
    }
    else
    {
        document.querySelector(".password_error").style.display='none';
    }
}
const login_button=document.querySelector('.login-modal');
function login_module()
{   
    const email_input=document.querySelector('.email_input').value+"";
    const password_input=document.querySelector('.password_input').value+"";
    if(email_input.length>0 && password_input.length>0)
    {
        $.ajax({
            type:"POST",
            url:"http://localhost/HelperLand/?controller=Home&&function=login",
            data:{
                "email":email_input,
                "password":password_input,
            },
            beforeSend:function(){
                $(".preloader").css("display","block");
            },
            success:function(response){
                $(".preloader").css("display","none");
                if(response == "customer")
                {
                    window.location.replace("http://localhost/HelperLand/?controller=Home&&function=customer_dashboard");
                }
                else if(response == "service provider" )
                {
                    window.location.replace("http://localhost/HelperLand/?controller=Home&&function=sp_newService");
                }
                else if(response == "book_service_login")
                {
                    gonext("schedule_plan","your_details");
                    // document.querySelectorAll(".login")[1].remove.click();
                    document.querySelector(".after_login").load(window.location.href+ ".after_login");
                }
                else
                {
                    document.querySelector(".alert").innerHTML=response;
                    document.querySelector(".alert").style.display='block';
                    setTimeout(function(){ document.querySelector(".alert").style.display='none'},5000);
                }
            }
        });
    }
    if(email_input.length==0 || password_input.length==0)
    {
        outsideemail();
        outsidepassword();
        login_button.disabled=true;
    }
}
function login_enble()
{
    login_button.disabled=false;
}
function forgot_password()
{
    const forgot_email=document.querySelector(".forgot_email_input");
    if(forgot_email.value.length==0)
    {
        document.querySelector(".email_error1").style.display='block';
        document.querySelector(".email_error1").innerHTML='Please Enter Email id';   
    }
    else
    {
        $.ajax({
            type:"POST",
            url:"http://localhost/HelperLand/?controller=Home&&function=forgotPassword",
            data:{
                "email":forgot_email.value,
            },
            beforeSend:function(){
                $(".preloader").css("display","block");
            },
            success:function(response){
                $(".preloader").css("display","none");
                if(response == "Please Enter Valid Email Id")
                {
                    document.querySelector(".forgot_alert").innerHTML=response;
                    document.querySelector(".forgot_alert").style.display='block';
                    setTimeout(function(){ document.querySelector(".forgot_alert").style.display='none'},5000);
                }
                else
                {
                    document.querySelector(".forgot_suceess").click();
                }
            }
        });   
    }
}
function login_enble()
{
    login_button.disabled=false;
}
const CsignUp_fname=document.querySelector(".cfname");
function validate_fname()
{
    let value=CsignUp_fname.value;
    if(value==0)
    {
        document.querySelector(".error1").style.display='block';
        document.querySelector(".error1").innerHTML='Please Enter First Name';
    }
    else
    {
        document.querySelector(".error1").style.display='none';
    }
}
const CsignUp_lname=document.querySelector(".clname");
function validate_lname()
{
    let value=CsignUp_lname.value;
    if(value==0)
    {
        document.querySelector(".error2").style.display='block';
        document.querySelector(".error2").innerHTML='Please Enter Last Name';
    }
    else
    {
        document.querySelector(".error2").style.display='none';
    }
}
const cemail=document.querySelector('.cemail');
function validate_cemail()
{
    let value=cemail.value;
    if(value==0)
    {
        document.querySelector(".error3").style.display='block';
        document.querySelector(".error3").innerHTML='Please Enter Email id';
    }
    else
    {
        document.querySelector(".error3").style.display='none';
    }
}
const cnumber=document.querySelector(".cnumber");
function validate_cnumber()
{
    let value=cnumber.value;
    if(value==0)
    {
        document.querySelector(".error4").style.display='block';
        document.querySelector(".error4").innerHTML='Please Enter Mobile Number';
    }
    else if(value.toString().length!=10)
    {
        document.querySelector(".error4").style.display='block';
        document.querySelector(".error4").innerHTML='Please Enter 10 digits Mobile Number';   
    }
    else
    {
        document.querySelector(".error4").style.display='none';
    }
}
const cpassword=document.querySelector(".cpassword");
function validate_cpassword()
{
    let value=cpassword.value;
    if(value==0)
    {
        document.querySelector(".error5").style.display='block';
        document.querySelector(".error5").innerHTML='Please Enter Password';
    }
    else
    {
        document.querySelector(".error5").style.display='none';
    }
}
const ccpassword=document.querySelector(".ccpassword");
function validate_ccpassword()
{
    let value=ccpassword.value;
    if(value==0)
    {
        document.querySelector(".error6").style.display='block';
        document.querySelector(".error6").innerHTML='Please Enter Confirm Password';
    }
    else
    {
        document.querySelector(".error6").style.display='none';
    }
}
const register_btn=document.querySelector(".register_btn");
function register($url)
{
    if(CsignUp_fname.value=="" || CsignUp_lname.value=="" || cemail.value=="" || cnumber.value=="" || cpassword.value=="" || ccpassword.value=="")
    {
        if(CsignUp_fname.value=="")
        {
            validate_fname();
        }
        if(CsignUp_lname.value=="")
        {
            validate_lname();
        }
        if(cemail.value=="")
        {
            validate_cemail();
        }
        if(cnumber.value=="")
        {
            validate_cnumber();
        }
        if(cpassword.value=="")
        {
            validate_cpassword();
        }
        if(ccpassword.value=="")
        {
            validate_ccpassword();
        }
        register_btn.disabled=true;
    }
    else if(cpassword.value.length<6)
    {
        document.querySelector(".error5").style.display='block';
        document.querySelector(".error5").innerHTML='Password should be 6 letter long';
        register_btn.disabled=true;
    }
    else if(cpassword.value!=ccpassword.value)
    {
        document.querySelector(".error6").style.display='block';
        document.querySelector(".error6").innerHTML='Password & Confirm Password are not match'; 
        register_btn.disabled=true;
    }
    else
    {
        $.ajax({
            type:"POST",
            url:$url,
            data:{
                "fname":CsignUp_fname.value,
                "lname":CsignUp_lname.value,
                "email-add":cemail.value,
                "mbno":cnumber.value,
                "password":cpassword.value,
            },
            success:function(response){
                if(response=="Email exist")
                {
                    document.querySelector(".email_exist").click();
                }
                else
                {
                    window.location.replace("http://localhost/HelperLand/?controller=Home&&function=index");
                }
            }

        });  
    }
}
function customerSignup()
{
   register("http://localhost/HelperLand/?controller=Home&&function=customerSignup");
}
function spSignup()
{
    register("http://localhost/HelperLand/?controller=Home&&function=sp_signUp");
}
function register_btn_enble()
{
    register_btn.disabled=false;
}
function logout()
{
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=logout",
        success:function(response){
            sessionStorage.setItem("logout",2);
            window.location.replace("http://localhost/HelperLand/?controller=Home&&function=index");
        }
    })
}
/* in book service page go for next tab ----> start */
function gonext(current_step,next_step)
{
    document.querySelector("."+current_step).classList.remove('active');
    document.querySelector("."+current_step).classList.add('previous');
    document.querySelector("."+next_step).classList.remove("disabled");
    document.querySelector("."+next_step).click();
}
/* in book service page go for next tab ----> end */
/* in book service page setup sevice tab in postal code validate ----> start */
function validate_postalcode()
{
    var postal_code=document.querySelector(".postal_code").value;
    if(postal_code.length==0)
    {
        document.querySelector(".postal_code_error").innerHTML='Please Enter Postal Code'; 
        setTimeout(function() {document.querySelector(".postal_code_error").innerHTML = ''}, 5000);  
    }
    else
    {
        $.ajax({
            type:"POST",
            url:"http://localhost/HelperLand/?controller=Home&&function=check_sp_availability",
            data:{
                "postalCode_data":postal_code,
            },
            beforeSend:function(){
                $(".preloader").css("display","block");
            },
            success:function(response){
                $(".preloader").css("display","none");
                if(response == 0)
                {
                    document.querySelector(".postal_code_error").innerHTML="We are not providing service in this area. We’ll notify you if any helper would start working near your area.";
                    setTimeout(function() {document.querySelector(".postal_code_error").innerHTML = ''}, 5000);
                }
                else
                {
                    document.querySelector(".basic_time").innerHTML="3 Hrs";
                    document.querySelector(".total_time").innerHTML="3";
                    document.querySelector(".total_price").innerHTML="54";
                    document.querySelector(".per_price").innerHTML="54";
                    document.querySelector(".discount_data").innerHTML="00";
                    document.querySelector(".e_price").innerHTML="54";
                    document.querySelector(".add-postal_code").value=postal_code;
                    gonext("setup_service","schedule_plan");
                    $("#schedule_plan .date input").datepicker({dateFormat:'dd/mm/yy',minDate: 0});
                }
            }
        });
    }
}
/* in book service page setup sevice tab in postal code validate ----> end */
/* in book service page go from schedule & plan tab to your details tab ----> start */
function from_schedule_plan_to_details()
{
    get_address();
    get_sp();
    gonext("schedule_plan","your_details");
}
/* in book service page go from schedule & plan tab to your details tab ----> end */
/* in book service page go from your details tab to make payment tab ----> start */
function from_your_details_to_payment()
{
    if($("input[name='address']:checked").val())
    {
        gonext("your_details","make_payment");
    }
    else
    {
        $("#your_details .address_alert").css("display","block");
        setTimeout(function(){$("#your_details .address_alert").css("display","none") },5000);
    }
}
/* in book service page go from your details tab to make payment tab ----> end */
/* in book service page in your details tab show add address card ----> start*/
function add_new_address()
{
    document.querySelector(".add_new_address_btn").style.display="none";
    document.querySelector(".address_card").style.display="block";
}
/* in book service page in your details tab show add address card ----> end*/
/* in book service page in your details tab hide add address card ----> start */
function hide_card_new_address()
{
    document.querySelector(".add_new_address_btn").style.display="block";
    document.querySelector(".address_card").style.display="none";
}
/* in book service page in your details tab hide add address card ----> end */
/* in book service page in your details tab select favourite sp ----> start */
function select_fav_sp(clicked)
{
    var $element=$("."+clicked);
    if($element.hasClass("active"))
    {
        $element.removeClass("active");
        $element.html("Select");
    }
    else
    {
        $element.addClass("active");
        $element.html("Remove");
    }
}
/* in book service page in your details tab select favourite sp ----> end */
/* in book service page in your details tab create new address data validate ----> start */
function create_new_address()
{
    var $street=$(".street").val();
    var $house_no=$(".house_no").val();
    var $city=$(".add_city").val();
    var $postalCode=$(".add-postal_code").val();
    var $phone_number=$(".add_phone_number").val();
    if($street=="" || $house_no=="" || $city=="" || $phone_number=="")
    {
        $(".address_card_alert").html("Please fill all details !!!");
        $(".address_card_alert").css("display","block")
        setTimeout(function(){$(".address_card_alert").css("display","none") },5000);
    }
    else if($phone_number.length!=10)
    {
        $(".address_card_alert").html("Mobile number must be 10 digit long !!!");
        $(".address_card_alert").css("display","block")
        setTimeout(function(){$(".address_card_alert").css("display","none") },5000);
    }
    else
    {
        $.ajax({
            type:"POST",
            url:"http://localhost/HelperLand/?controller=Home&&function=store_userAddress",
            data:{
                "addressline1":$street,
                "addressline2":$house_no,
                "city":$city,
                "postalCode":$postalCode,
                "mobile":$phone_number
            },
            success:function(response){
                set_address_div($street,$house_no,$city,$postalCode,$phone_number);
                hide_card_new_address();
            }
        }); 
    }
}
/* in book service page in your details tab create new address data validate ----> end */
/* in book service page in your details tab get address from database ----> start */
function get_address()
{
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=get_userAddress",
        success:function(response){
            $res=JSON.parse(response);
            for(var i in $res)
            {
                set_address_div($res[i][i+"1"],$res[i][i+"2"],$res[i][i+"3"],$res[i][i+"4"],$res[i][i+"5"]);
            }
        }

    });
}
/* in book service page in your details tab get address from database ----> end */
/* in book service page in your details tab get service provider from database ----> start */
function get_sp()
{
    var postal_code=document.querySelector(".postal_code").value;
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=check_sp_availability",
        data:{
            "postalCode_data":postal_code,
        },
        success:function(response){
            $sp=JSON.parse(response);
            for(var i in $sp)
            {
                var $clone=$("#your_details .favourite_sp").find(".fav_sp_card:first").clone();
                var $count=$("#your_details .favourite_sp .fav_sp_card").length+1;
                $clone.find(".name").html($sp[i][i+"2"]);
                $clone.attr("id",($sp[i][i+"1"]));
                $clone.find("button").addClass($sp[i][i+"1"]+"");
                $clone.appendTo("#your_details .favourite_sp .fav_sp_row");
            }
        }
    }); 
}
/* in book service page in your details tab get service provider from database ----> end */
/* in book service page in your details tab create new address div ----> start */
function set_address_div($street,$house_no,$city,$postalCode,$phone_number)
{
    var $clone=$(".details ul").find("li:first").clone();
    var $count=$(".details ul li").length+1;
    $clone.find("label").attr("for","add"+$count);
    $clone.find("label .add").attr("id","add"+$count);
    $clone.find(".address").html($street+" "+$house_no+" , "+$city+" "+$postalCode);
    $clone.find(".no").html($phone_number);
    $clone.appendTo(".details ul");
}
/* in book service page in your details tab create new address div ----> end */
function enble_apply_btn()
{
    if($("#make_payment .promo_code input").val()=="")
    {
        $("#make_payment .promo_code .btn").attr("disabled",true);
    }
    else
    {
        $("#make_payment .promo_code .btn").attr("disabled",false);
    }
}

function book_service_complete()
{
    $postalCode=$(".postal_code").val();
    $serviceHourlyrate="18";
    $serviceHours=$(".basic_time").html().split(" ")[0];
    $extraHours=$(".total_time").html()-$serviceHours;
    $extra_services=[];
    $(".duration .active").each(function(){
        $extra_services.push($(this).attr("class")[8]);
    });
    $favourite_sp=[];
    $("#your_details .fav_sp_row .fav_sp_card .active").each(function(){
        $favourite_sp.push($(this).attr("class").split(" ")[2]);
    });
    $serviceStartDate=$(".payment .time").html().split("@")[0]+" "+$(".payment .time_label").html()+":00";
    $address_radio=$('input[name="address"]:checked');
    $service_address=$address_radio.siblings(".address").html();
    $addressline1=$service_address.split(" ")[0];
    $addressline2=$service_address.split(" ")[1];
    $city=$service_address.split(" ")[3];                                 
    $service_mobile=$address_radio.siblings(".no").html();
    $comments=$("#schedule_plan .comment textarea").val();
    $haspets=($("#schedule_plan .comment #pet").is(":checked")?1:0);
    $subtotal=$(".total_time").html();
    $discount="0";
    $status=0;
    $serviceid=Math.random();
    $totalcost=$(".total_price").html();
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=booking_service",
        data:{
            "postalCode":$postalCode ,
            "serviceStartDate":$serviceStartDate,
            "serviceHourlyrate":$serviceHourlyrate,
            "serviceHours":$serviceHours,
            "extraHours":$extraHours,
            "extra_services":$extra_services,
            "favourite_sp":$favourite_sp,
            "addressline1":$addressline1,
            "addressline2":$addressline2,
            "city":$city,
            "service_mobile":$service_mobile,
            "comments":$comments,
            "haspets":$haspets,
            "subtotal":$subtotal,
            "discount":$discount,
            "totalcost":$totalcost,
            "paymentDue":0,
            "paymentDone":1,
            "status":$status,
            "Serviceid":$serviceid
        },
        beforeSend:function(){
            $(".preloader").css("display","block");
        },
        success:function(response){
            $(".preloader").css("display","none");
            $("#booking_sucess .id").html(response);
            $(".booking_sucess_popup").click();
        }
    });
}
function isNumber(evt)
{
    var ch=String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
}

/* customer dashboard page ----> start */
function loadnewServiceRequest($user,$status1,$status2)
{
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=customer_dashboard_tableData",
        data:{
            "userId":$user,
            "Status1":$status1,
            "Status2":$status2,
        },
        success:function(response){
            $("#service_history tbody").html(response);
            $(".readOnly_data").rateYo({
                readOnly: true,
                starWidth:'15px'
            });
            $("#reschedule_request .date input").datepicker({dateFormat:'dd/mm/yy',minDate: 0});
            $.fn.DataTable.ext.errMode='none';
            $('.table').DataTable({
                "pagingType": "full_numbers",
                "searching":false,
                "dom": '"B" <"top">rt<"bottom"lip><"clear">',
                "ordering": false,
                "oLanguage": {
                    "oPaginate": {
                        "sNext": '<i class="bi bi-chevron-right"></i>',
                        "sPrevious": '<i class="bi bi-chevron-left"></i>',
                        "sFirst":'<i class="bi bi-caret-left-fill"></i>',
                        'sLast':'<i class="bi bi-caret-right-fill"></i>'
                    }
                },
                "language": {
                    "infoEmpty": "No entries available to show"
                  },
                buttons: [
                    {
                     extend:'excel',
                     className:'btn',
                     text:'Export'
                    }
                ]
            });
        }
    });
}
function show_RequestDetails_Popup($id,$status1)
{
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=show_request_popup",
        data:{
            "serviceId":$id,
            "status1":$status1
        },
        success:function(response){
            $("#details_request").html(response);
            $("#details_request").modal('show');
        }
    });
}
function reschedule_request($serviceid)
{
    $("#reschedule_request .modal-content .reschedule_btn").attr("id",$serviceid);
}
function reschedule_request_date_time($serviceid,$userid)
{
    $date=$("#reschedule_request .reschedule_date_time .date input").val();
    $time=$("#reschedule_request .reschedule_date_time #when_need").val();
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=reschedule_date_time",
        data:{
            "serviceId":$serviceid,
            "date":$date,
            "time":$time,
            "userid":$userid
        },
        beforeSend:function(){
            $(".preloader").css("display","block");
        },
        success:function(response){
            $(".preloader").css("display","none");
            $("#reschedule_request .alert").html(response);
            $("#reschedule_request .alert").css("display","block");
            setTimeout(function(){$("#reschedule_request .alert").css("display","none")},5000);
            loadnewServiceRequest($userid,0,1);
        }
    });
}
function cancle_request($serviceid)
{
    $("#cancle_request .modal-content .cancle_btn").attr("id",$serviceid);
}
function cancle_btn($serviceid,$userid)
{
    if(!$(".reason textarea").val())
    {
        $(".reschedule_btn").css("disabled","true");
        $(".reason textarea").focus();
    }
    else
    {
        $(".reschedule_btn").css("disabled","false");
        $.ajax({
            type:"POST",
            url:"http://localhost/HelperLand/?controller=Home&&function=cancle_request",
            data:{
                "serviceId":$serviceid,
                "userid":$userid,
                "reason":$(".reason textarea").val()
            },
            beforeSend:function(){
                $(".preloader").css("display","block");
            },
            success:function(response){
                $(".preloader").css("display","none");
                $("#cancle_request").modal("hide");
                loadnewServiceRequest($userid,0,1);
            }
        });
    }
}
function show_rating_card($serviceRequestid,$spid,$userid)
{
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=show_rating",
        data:{
            "userid":$userid,
            "serviceRequestid":$serviceRequestid,
            "spid":$spid
        },
        success:function(response){
            $("#rate_sp div").html(response);
            $data=($(".table_page tbody .result").html()=='')?'0':$("#rate_sp .result").html();
            $(".readOnly_data").rateYo({
                readOnly: true,
                starWidth:'15px',
                rating:$data
            });
            $(".rateYo").rateYo();
            $(".rateYo").rateYo("option", "starWidth", "15px");
        }
    });
}
function give_rating($userid,$serviceRequestid,$spid)
{
    $on_arrival=$(".rateYo").rateYo('rating')[1];
    $friendly=$(".rateYo").rateYo('rating')[2];
    $qos=$(".rateYo").rateYo('rating')[3];
    $.ajax({
        type:'POST',
        url:"http://localhost/HelperLand/?controller=Home&&function=give_rating",
        data:{
            "userid":$userid,
            "serviceRequestid":$serviceRequestid,
            "spid":$spid,
            "comments":$("#rate_sp .feedback textarea").val(),
            "on_arrival":$on_arrival,
            "friendly":$friendly,
            "qos":$qos
        },
        success:function(response){
            loadnewServiceRequest($userid,3,4);
        }
    });
}
function load_my_data($userid)
{
    $.ajax({
        type:'POST',
        url:"http://localhost/HelperLand/?controller=Home&&function=get_user_data",
        dataType:'json',
        data:{
            "userid":$userid,
        },
        beforeSend:function(){
            $(".preloader").css("display","block");
        },
        success:function(response){
            $(".preloader").css("display","none");
            $("#my_details .first_name input").val(response.FirstName);
            $("#my_details .last_name input").val(response.LastName);
            $("#my_details .email-address input").val(response.Email);
            $("#my_details .mobile_number input").val(response.mobile); 
            $("#my_details .dob input").val(response.DOB);            
        }
    });
}
function change_my_profile_data($userid)
{
    $firstName=$("#my_details .first_name input").val();
    $lastName=$("#my_details .last_name input").val();
    $email=$("#my_details .email-address input").val();
    $mobile=$("#my_details .mobile_number input").val(); 
    $date=$("#my_details .dob .date").val();
    $month=$("#my_details .dob .month").val();
    $year=$("#my_details .dob .year").val();
    $("#my_details .alert").removeClass("alert-success").addClass('alert-danger');
    $dob=$year+"-"+$month+"-"+$date;
    if($firstName=="")
    {
        $("#my_details .alert").css("display","block");
        $("#my_details .alert").html("Please Enter First Name");
    }
    else if($lastName=="")
    {
        $("#my_details .alert").css("display","block");
        $("#my_details .alert").html("Please Enter Last Name");
    }
    else if($mobile=="")
    {
        $("#my_details .alert").css("display","block");
        $("#my_details .alert").html("Please Enter Mobile Number");
    }
    else if($mobile.length!=10)
    {
        $("#my_details .alert").css("display","block");
        $("#my_details .alert").html("Please Enter Valid Mobile Number");
    }
    else if($month=='04' || $month=='06' || $month=='09' || $month=='11')
    {
        if($date>30)
        {
            $("#my_details .alert").css("display","block");
            $("#my_details .alert").html("Please Enter Valid Date of Birth");
        }
        else
        {
            send_data($userid,$firstName,$lastName,$email,$mobile,$dob);
        }
    }
    else if($month=='02')
    {
        if($year%4==0)
        {
            if($date>29)
            {
                $("#my_details .alert").css("display","block");
                $("#my_details .alert").html("Please Enter Valid Date of Birth");
            }
            else
            {
                send_data($userid,$firstName,$lastName,$email,$mobile,$dob);
            }
        }
        if($year%4!=0)
        {
            if($date>28)
            {
                $("#my_details .alert").css("display","block");
                $("#my_details .alert").html("Please Enter Valid Date of Birth");
            }
            else
            {
                send_data($userid,$firstName,$lastName,$email,$mobile,$dob);
            }
        }
    }
    else
    {
        send_data($userid,$firstName,$lastName,$email,$mobile,$dob);
    }
    setTimeout(function(){$(".alert").css("display","none")},2000);
}
function send_data($userid,$firstName,$lastName,$email,$mobile,$dob)
{
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=change_my_profile",
        data:{
            'userid':$userid,
            'firstName':$firstName,
            'lastName':$lastName,
            'email':$email,
            'mobile':$mobile,
            'dob':$dob
        },
        beforeSend:function(){
            $(".preloader").css("display","block");
        },
        success:function(response){
            $(".preloader").css("display","none");
            $(".welcome b").html($firstName);
            $("#my_details .alert").removeClass("alert-danger").addClass('alert-success');
            $("#my_details .alert").css("display","block");
            $("#my_details .alert").html("User details Updated Successfully !!");
        }
    });
}
function get_my_address($userid)
{
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=my_addresses",
        data:{
            'userid':$userid
        },
        success:function(response){
            $("#my_addresses .table tbody").html(response);
        }
    });
}
function edit_address($addressid,$streetname,$housenumber,$city,$postalcode,$mobile)
{
    $("#edit_address").modal("show");
    $('#edit_address .edit').attr('id',$addressid);
    $('#edit_address .details .street_name input').val($streetname);
    $('#edit_address .details .house_number input').val($housenumber);
    $('#edit_address .details .postal_code input').val($postalcode);
    $('#edit_address .details .city input').val($city);
    $('#edit_address .details .mobile_number input').val($mobile);
}
function change_address($userid)
{
    $addressid=$('#edit_address .edit').attr('id');
    $street=$('#edit_address .details .street_name input').val();
    $house_no=$('#edit_address .details .house_number input').val();
    $postalCode=$('#edit_address .details .postal_code input').val();
    $city=$('#edit_address .details .city input').val();
    $mobile=$('#edit_address .details .mobile_number input').val();
    if($street=='')
    {
        $("#edit_address .alert").css("display","block");
        $("#edit_address .alert span").html("Please Enter Street Name");
    }
    else if($house_no=='')
    {
        $("#edit_address .alert").css("display","block");
        $("#edit_address .alert span").html("Please Enter House Number");
    }
    else if($postalCode=='')
    {
        $("#edit_address .alert").css("display","block");
        $("#edit_address .alert span").html("Please Enter Postal Code");
    }
    else if($city=='')
    {
        $("#edit_address .alert").css("display","block");
        $("#edit_address .alert span").html("Please Enter City");
    }
    else if($mobile=='')
    {
        $("#edit_address .alert").css("display","block");
        $("#edit_address .alert span").html("Please Enter Mobile Number");
    }
    else
    {
        $.ajax({
            type:"POST",
            url:"http://localhost/HelperLand/?controller=Home&&function=change_addresses",
            data:{
                'addressid':$addressid,
                'streetname':$street,
                'houseNumber':$house_no,
                'postalCode':$postalCode,
                'city':$city,
                'mobile':$mobile
            },
            success:function(response){
                if(response=='1')
                {
                    $("#edit_address").modal("hide");
                    $("#my_addresses .alert").css("display","block");
                    $("#my_addresses .alert").html("Address Update Successfully !!!!");
                    get_my_address($userid);
                }
            }
        });
        
    }
    setTimeout(function(){$(".alert").css("display","none")},2000);
}
function delete_address_click($addressid){
    $("#delete_address .btn").attr("id",$addressid);
}
function delete_address_confirm($addressid,$userid){
    $.ajax({
        type:"POST",
        url:"http://localhost/HelperLand/?controller=Home&&function=delete_addresses",
        data:{
            'addressid':$addressid,
        },
        success:function(response){
            if(response=='1')
                {
                    $("#delete_address").modal("hide");
                    $("#my_addresses .alert").css("display","block");
                    $("#my_addresses .alert").html("Delete Address Successfully !!!!");
                    get_my_address($userid);
                    setTimeout(function(){$(".alert").css("display","none")},2000);
                }
        }
    });
}
function change_password($userid)
{
    $old_pass=$("#change_password .old_pass").val();
    $new_pass=$("#change_password .new_pass").val();
    $confirm_pass=$("#change_password .confirm_pass").val();
    $("#change_password .alert").removeClass('alert-success').addClass('alert-danger');
    if($old_pass=='')
    {
        $("#change_password .alert").html("Please enter Old Password.");
        $("#change_password .alert").css("display","block");
    }
    else if($new_pass=='')
    {
        $("#change_password .alert").html("Please enter New Password.");
        $("#change_password .alert").css("display","block");
    }
    else if($confirm_pass=='')
    {
        $("#change_password .alert").html("Please enter Confirm Password.");
        $("#change_password .alert").css("display","block");
    }
    else if($new_pass.length < 6)
    {
        $("#change_password .alert").html("Password must be 6 letter.");
        $("#change_password .alert").css("display","block");
    }
    else if($new_pass!=$confirm_pass)
    {
        $("#change_password .alert").html("Password and Confirm Password must be match.");
        $("#change_password .alert").css("display","block");
    }
    else
    {
        $.ajax({
            type:"POST",
            url:"http://localhost/HelperLand/?controller=Home&&function=change_password",
            data:{
                'userid':$userid,
                'old_pass':$old_pass,
                'new_pass':$new_pass,
                'confirm_pass':$confirm_pass
            },
            success:function(response){
                if(response==1)
                {
                    $("#change_password .alert").html("You have successfully changed your password!");
                    $("#change_password .alert").css("display","block");    
                    $("#change_password .alert").removeClass('alert-danger').addClass('alert-success');
                }
                else
                {
                    $("#change_password .alert").html("Your current password is wrong!");
                    $("#change_password .alert").css("display","block");
                }
            }
        });
    }
    setTimeout(function(){$(".alert").css("display","none")},2000);
}
/* customer dashboard page ----> end */

/* in home page when scroll is happen ----> start */
const toTop=document.querySelector('.up-arrow');
const navbar=document.querySelector(".nav-light");
const logo=document.querySelector(".logo");
const dark_link=document.querySelectorAll(".dark");
window.addEventListener('scroll',() =>{
if(window.pageYOffset>1)
{
    navbar.style.backgroundColor="#525252";
    logo.style.height="55px";
    logo.style.width="73px";
    dark_link[0].style.backgroundColor="#006072";
    dark_link[1].style.backgroundColor="#006072";
    dark_link[2].style.backgroundColor="#006072";
}
else
{
    navbar.style.backgroundColor="transparent";
    logo.style.height="100%";
    logo.style.width="100%";
    dark_link[0].style.backgroundColor="transparent";
    dark_link[1].style.backgroundColor="transparent";
    dark_link[2].style.backgroundColor="transparent";
}
if(window.pageYOffset>200)
{
    toTop.classList.add("active");
}
else{
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
