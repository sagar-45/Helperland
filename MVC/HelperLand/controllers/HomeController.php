<?php
session_start();
class HomeController
{
    function __construct()
    {
        include('./models/models.php');
        $this->modal=new Models();
    }
    function index()
    {
        include('./views/index.php');
    }
    function about()
    {
        include('./views/about.php');
    }
    function Customer_signUp()
    {
        include('./views/Customer_signUp.php');
    }
    function faq()
    {
        include('./views/faq.php') ;
    }
    function prices()
    {
        include('./views/prices.php');
    }
    function contact()
    {
        include('./views/contact.php');
    }
    function service()
    {
        include('./views/service.php');
    }
    function book_service()
    {
        include('./views/book_service.php');
    }
    function customer_dashboard()
    {
        include("./views/customer_dashboard.php");
    }
    function customer_service_history()
    {
        include('./views/c_service_history.php');
    }
    function customer_favorite_sp()
    {
        include('./views/customer_favorite_sp.php');
    }
    function my_settings()
    {
        include('./views/my_settings.php');
    }
    function sp_newService()
    {
        $function='sp_new';
        include('./views/sp_newService.php');
    }
    function logout()
    {
        session_unset();
        session_destroy(); 
        echo "success";  
    }
    function resetPassword()
    {
        $function='resetPassword';
        $_SESSION['forgot_email']=$_GET['email'];
        include('./views/resetPassword.php');
    }
    function forgotPassword()
    {
        $email=$_POST['email'];
        $check=$this->modal->checkEmail($email);
        $msg="This is link to Reset Password:<a href='http://localhost/HelperLand/?controller=Home&&function=resetPassword&email=$email'>http://localhost/HelperLand/?controller=Home&&function=resetPassword</a>";
        $sub="Password Change";
        if($check)
        {
            $this->modal->send_email($email,$sub,$msg);
        }
        else
        {
            echo "Please Enter Valid Email Id";
        }
    }
    function getTouchwithUs()
    {
        $base_url="http://localhost/HelperLand/";
        if(isset($_POST))
        {
            $details=[
                'name'=>$_POST['fname']." ".$_POST['lname'],
                'Email'=>$_POST['email-add'],
                'Subject'=>$_POST['subject'],
                'PhoneNumber'=>$_POST['mbno'],
                'Message'=>$_POST['message'],
                'fileName'=>$_FILES['i1']['name'],
                'filetmp'=>$_FILES['i1']['tmp_name'],
                'CreateOn'=>date("Y-m-d H:i:a"),
            ];
            if(isset($_SESSION['userId']))
            {
                $details['CreateBy']=$_SESSION['userId'];
            }
            $this->modal->insert_contactUs($details);
            header('Location:' .$base_url."?controller=Home&&function=index");
        }
        else 
        {
            echo 'Error Occured Try Again';
        }
    }
    function customerSignup()
    {
        if(isset($_POST))
        {
            $details=[
            'fname'=>$_POST['fname'],
            'lname'=>$_POST['lname'],
            'email'=>$_POST['email-add'],
            'mobile_no'=>$_POST['mbno'],
            'password'=>$_POST['password'],
            'userType'=>1,
            'create_date'=>date("Y-m-d H:i:a"),
            'status'=>'New',
            'isRegister'=>1,
            'isactive'=>0
            ];
            $result=$this->modal->insert_user($details);
            if($result==0)
            {
                echo "Email exist"; 
            }
            else
            {
                $_SESSION['register']=1;
                $this->modal->send_email($details['email'],"Created Account","Hello ".$details['fname']."<br>Your account has been successfully created");
            }
        }
        else
        {
            echo 'Error Occured Try Again';
        }
    }
    function login()
    {
        $details=[
        'email'=>$_POST['email'],
        'password'=>$_POST['password']
        ];
        $message=$this->modal->select_user($details);
        $this->createSession($message);
        if(isset($_SESSION['UserTypeId']))
        {
            if($_SESSION['UserTypeId']==1)
            {
                echo "customer";
            }
            else if($_SESSION['UserTypeId']==2)
            {
                echo "service provider";
            }
        }
        else
        {
            echo $message;
        }
    }
    function sp_signUp()
    {
        if(isset($_POST))
        {
            $details=[
            'fname'=>$_POST['fname'],
            'lname'=>$_POST['lname'],
            'email'=>$_POST['email-add'],
            'mobile_no'=>$_POST['mbno'],
            'password'=>$_POST['password'],
            'userType'=>2,
            'create_date'=>date("Y-m-d H:i:a"),
            'status'=>'New',
            'isRegister'=>1,
            'isactive'=>0
            ];
            $result=$this->modal->insert_user($details);
            if($result==0)
            {
                echo "Email exist"; 
            }
            else
            {
                $_SESSION['register']=1;
            }
        }
        else
        {
            echo 'Error Occured Try Again';
        }
    }
    function createSession($message)
    {
        if($message!="UserName or Password Incorrect" && $message!="User Not Found")
        {
            $_SESSION['userId']=$message['UserId'];
            $_SESSION['UserName']=$message['FirstName'];
            $_SESSION['email']=$message['Email'];
            $_SESSION['Mobile']=$message['Mobile'];
            $_SESSION['UserTypeId']=$message['UserTypeId'];
        }
    }
    function setPassword()
    {
        $base_url="http://localhost/HelperLand/";
        if(isset($_POST))
        {
            $email=$_POST['email'];
            $password=$_POST['new_password'];
            $this->modal->changePassword($email,$password);
            header('Location:' .$base_url."?controller=Home&&function=index");
        }
    }
    function check_sp_availability()
    {
        $postal_code=$_POST["postalCode_data"];
        $ans=$this->modal->checkPostalCode($postal_code);
        if($ans=="error")
        {
            echo 0;
        }
        else
        {
            $_SESSION["area_postal_code"]=$postal_code;
            echo $ans;
        }
    }
    function store_userAddress()
    {
        $details=[
            "addressline1"=>$_POST['addressline1'],
            "addressline2"=>$_POST['addressline2'],
            "city"=>$_POST['city'],
            "postalCode"=>$_POST['postalCode'],
            "mobile"=>$_POST['mobile'],
            "IsDeleted"=>0,
            "UserId"=>$_SESSION['userId'],
            "email"=>$_SESSION['email'],
        ];
        $this->modal->storeAddress($details);
    }
    function get_userAddress()
    {
        $ans=$this->modal->getAddress($_SESSION['userId']);
        echo $ans;
    }
    function booking_service()
    {
        $details=[
            "userId"=>$_SESSION['userId'],
            "serviceStartDate"=>$_POST['serviceStartDate'],
            "postalCode"=>$_POST['postalCode'] ,
            "serviceHourlyrate"=>$_POST['serviceHourlyrate'],
            "serviceHours"=>$_POST['serviceHours'],
            "extraHours"=>$_POST['extraHours'],
            "addressline1"=>$_POST['addressline1'],
            "addressline2"=>$_POST['addressline2'],
            "city"=>$_POST['city'],
            "service_mobile"=>$_POST['service_mobile'],
            "comments"=>$_POST['comments'],
            "haspets"=>$_POST['haspets'],
            "subtotal"=>$_POST['subtotal'],
            "discount"=>$_POST['discount'],
            "totalcost"=>$_POST['totalcost'],
            "paymentDue"=>$_POST['paymentDue'],
            "paymentDone"=>$_POST['paymentDone'],
            "status"=>$_POST['status'],
            "Email"=>$_SESSION['email'],
            "createDate"=>date('Y-m-d'),
            "Serviceid"=>$_POST['Serviceid'],
        ];
        $sub="New Service Request";
        if(!empty($_POST['extra_services']))
        {
            $details['extra_services']=$_POST['extra_services'];
        }
        $ans=$this->modal->booking_service_modal($details);
        if(!empty($_POST['favourite_sp']))
        {
            $this->modal->insert_and_send_mail_to_favoriteSp($_POST['favourite_sp'],$_SESSION['userId'],$sub,$ans);
        }
        if(empty($_POST['favourite_sp']))
        {
            $this->modal->send_mail_to_all_Sp($_POST['postalCode'],$sub,"A service request ".$ans." has created");
        }
        echo $ans;
    }
    // get customer dashboard table data
    function HourtoMinute($time)
    {
        $t=explode(":",$time);
        return $t[0]*60+$t[1];
    }
    function MintoHour($min)
    {
        $h=(int)($min/60);
        $m=round($min%60);
        if($h<10){$h="0".$h;}
        if($m<10){$m="0".$m;}
        return $h.":".$m;
    }
    function customer_dashboard_tableData()
    {
        $user=$_POST['userId'];
        $status1=$_POST['Status1'];
        $status2=$_POST['Status2'];
        $ans=$this->modal->customer_dashboard_tableData_modal($user,$status1,$status2);
        if($ans->num_rows>0)
        {
            foreach($ans as $data)
            {
                $starttime=date('H:i',strtotime($data['ServiceStartDate']));
                $totalMin=$this->HourtoMinute($starttime)+($data['SubTotal']*60);
                $totaltime=$this->MintoHour($totalMin);
                ?>
                <tr>
                  <td><?php echo $data['ServiceId'] ?></td>
                  <td id="<?php echo $data['ServiceId']?>" onclick="show_RequestDetails_Popup(this.id,<?php echo $status1?>)">
                    <img src="./assets/images/calendar.png" class="img-fluid calendar" /><b><?php echo date('Y-m-d',strtotime($data['ServiceStartDate'])) ?></b><br />
                    <img src="./assets/images/clock.png" class="img-fluid clock" /><?php echo $starttime ?> - <?php echo $totaltime ?>
                  </td>
                  <td>
                      <?php if($data['ServiceProviderId']!=Null)
                      {
                        $ans2=$this->modal->show_rating($data['ServiceProviderId']);
                        $row2=mysqli_fetch_array($ans2);
                        $var=$row2['Ratings']==''?0:$row2['Ratings'];
                      ?>
                    <div class="rating">
                        <img src="./assets/images/cap.png" class="img-fluid cap" />
                        <div class="star">
                            <p><?php echo $row2['FirstName']." ".$row2['LastName'] ?></p>
                            <div class="rateYo readOnly_data" data-rateyo-rating="<?php echo $var ?>"></div>
                            <span class="result"><?php echo $var?></span>
                        </div>
                    </div>
                    <?php
                      }
                    ?>
                  </td>
                  <td>
                    <div class="rupee">
                        <strong class="rs"><?php echo $data['TotalCost'] ?></strong><span class="uro">€</span>
                    </div>
                  </td>
                  <?php
                    if($status1==0 && $status2==1)
                    { 
                  ?>
                  <td>
                      <button class="btn reschedule" data-bs-toggle="modal" data-bs-target="#reschedule_request" data-bs-dismiss="modal" onclick="reschedule_request(<?php echo $data['ServiceId']?>)">Reschedule</button>
                      <button class="btn cancle" data-bs-toggle="modal" data-bs-target="#cancle_request" data-bs-dismiss="modal" onclick="cancle_request(<?php echo $data['ServiceId']?>)">Cancle</button>
                  </td>
                  <?php
                    }
                    if($status1==3 && $status2==4)
                    {
                    ?>
                    <td class="status">
                        <div class="<?php echo $data['Status']==3?'status-c':'status-d' ?>">
                        <p class="text"><?php echo $data['Status']==3?'Completed':'Cancelled' ?></p>
                        </div>
                    </td>
                    <td>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#rate_sp" <?php echo $data['Status']==4?'disabled':'' ?> onclick="show_rating_card(<?php echo $data['ServiceRequestId'] ?>,<?php echo $data['ServiceProviderId'] ?>,<?php echo $data['UserId'] ?>)">Rate SP</button>
                    </td>
                    <?php
                    }
                  ?>
              </tr>
              <?php
            }
        }
    }
    function show_request_popup()
    {
        $serviceid=$_POST['serviceId'];
        $status1=$_POST['status1'];
        $ans=$this->modal->requestData($serviceid);
        $extra="";
        if($ans->num_rows>0)
        {
            foreach($ans as $data)
            {
                if($data['ServiceExtraId']==1)
                {
                    $extra=$extra."Inside Cabinets , ";
                }
                if($data['ServiceExtraId']==2)
                {
                    $extra=$extra."Inside Fridge , ";
                }
                if($data['ServiceExtraId']==3)
                {
                    $extra=$extra."Inside Oven , ";
                }
                if($data['ServiceExtraId']==4)
                {
                    $extra=$extra."Laundry wash & dry , ";
                }
                if($data['ServiceExtraId']==5)
                {
                    $extra=$extra."Interior windows";
                }
            }
            $starttime=date('H:i',strtotime($data['ServiceStartDate']));
            $totalMin=$this->HourtoMinute($starttime)+($data['SubTotal']*60);
            $totaltime=$this->MintoHour($totalMin);
            ?>
             <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal_title">Service Details</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                    </div>
                    <div>
                        <div class="modal_time"><b><?php echo date("d/m/Y H:i",strtotime($data['ServiceStartDate']))." - ". $totaltime?></b></div>
                        <div class="modal_main">Duration: <span class="modal_data"><?php echo $data['SubTotal'] ." Hrs"?></span></div>
                    </div>
                    <hr>
                    <div>
                        <div class="modal_main">Service ID: <span class="modal_data"><?php echo $data['ServiceId'] ?></span></div>
                        <div class="modal_main">Extras: <span class="modal_data"><?php echo $extra?></span></div>
                        <div class="modal_main">Net Amount: <span class="modal_data amount"><?php echo $data['TotalCost']." €"  ?></span></div>
                    </div>
                    <hr>
                    <div>
                        <div class="modal_main">Service Address: <span class="modal_data"><?php echo $data['AddressLine1']." ".$data['AddressLine2']." , ".$data['City']." ".$data['PostalCode'] ?></span></div>
                        <div class="modal_main">Billing Address: <span class="modal_data"><?php echo $data['AddressLine1']." ".$data['AddressLine2']." , ".$data['City']." ".$data['PostalCode'] ?></span></div>
                        <div class="modal_main">Phone: <span class="modal_data"><?php echo $data['Mobile'] ?></span></div>
                        <div class="modal_main">Email: <span class="modal_data"><?php echo $data['Email'] ?></span></div>
                    </div>
                    <hr>
                    <?php 
                        if($data['Comments']!="")
                        { 
                    ?>
                        <div>
                            <div class="modal_main">Comments</div>
                            <div><i class="bi bi-x"></i><?php echo $data['Comments'] ?></div>
                        </div>
                        <hr>
                    <?php
                        }
                        if($status1=='0')
                        {
                    ?>
                    <div>
                        <button class="btn reschedule" data-bs-toggle="modal" data-bs-target="#reschedule_request" data-bs-dismiss="modal" onclick="reschedule_request(<?php echo $data['ServiceId']?>)"><i class="bi bi-arrow-clockwise" ></i> Reschedule</button>
                        <button class="btn cancle" data-bs-toggle="modal" data-bs-target="#cancle_request" data-bs-dismiss="modal" onclick="cancle_request(<?php echo $data['ServiceId']?>)"><i class="bi bi-x-lg"></i> Cancle</button>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
             </div>
            <?php
        }
    }
    function reschedule_date_time()
    {
        $serviceid=$_POST['serviceId'];
        $userid=$_POST['userid'];
        $date=$_POST['date']." ".$_POST['time'];
        $ans=$this->modal->reschedule_date_time($serviceid,$date,$userid);
        echo $ans;
    }
    function cancle_request()
    {
        $serviceid=$_POST['serviceId'];
        $userid=$_POST['userid'];
        $reason=$_POST['reason'];
        $this->modal->cancle_request($serviceid,$userid,$reason);
    }
    function show_rating()
    {
        $userid=$_POST['userid'];
        $serviceRequestid=$_POST['serviceRequestid'];
        $spid=$_POST['spid'];
        $ans=$this->modal->show_rating($spid);
        $row=mysqli_fetch_array($ans);
        ?>
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
          </div>
          <div class="rating">
              <img src="./assets/images/cap.png" class="img-fluid cap" />
              <div class="star">
                  <p><?php echo $row['FirstName']." ".$row['LastName'] ?></p>
                  <div class="rateYo readOnly_data"></div>
                  <span class="result"><?php echo $row['Ratings']?></span>
              </div>
          </div>
          <span><b>Rate Your Service Provider</b></span>
          <hr>
          <div class="diff_rating">
            <div class="on_time_arival">
              <span>On time arrival</span>
              <div class="rateYo" data-rateyo-rating="<?php echo $row['OnTimeArrival'] ?>"></div>
            </div>
            <div class="friendly">
              <span>Friendly</span>
              <div class="rateYo" data-rateyo-rating="<?php echo $row['Friendly'] ?>" ></div>
            </div>
            <div class="qos">
              <span>Quality of service</span>
              <div class="rateYo" data-rateyo-rating="<?php echo $row['QualityOfService'] ?>" ></div>
            </div>
          </div>
          <div class="feedback"> 
            <span>Feedback on service provider</span><br>
            <textarea row='3'></textarea>
          </div>
          <button class="btn rating_submit" data-bs-dismiss="modal" data-bs-toggle="modal" onclick="give_rating(<?php echo $userid ?>,<?php echo $serviceRequestid ?>,<?php echo $spid ?>)">Submit</button>
        </div>
        <?php
    }
    function give_rating()
    {
        $userid=$_POST['userid'];
        $serviceRequestid=$_POST['serviceRequestid'];
        $spid=$_POST['spid'];
        $comments=$_POST['comments'];
        $on_arrival=$_POST['on_arrival'];
        $friendly=$_POST['friendly'];
        $qos=$_POST['qos'];
        $date=date("Y-m-d H:i:s");
        $ans=$this->modal->give_rating_sp($userid,$spid,$serviceRequestid,$comments,$on_arrival,$friendly,$qos,$date);
    }
    function get_user_data()
    {
        $userid=$_POST['userid'];
        $ans=$this->modal->get_user_data($userid);
        $row= $ans->fetch_assoc();
        echo json_encode(array("FirstName"=>$row['FirstName'],"LastName"=>$row['LastName'],"Email"=>$row['Email'],"mobile"=>$row['Mobile'],"DOB"=>$row['DateOfBirth']));
    }
    function change_my_profile()
    {
        $userid=$_POST['userid'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $dob=$_POST['dob'];
        $ans=$this->modal->change_my_profile_data($userid,$firstName,$lastName,$email,$mobile,$dob);
        $message=array('UserId'=>$userid,'FirstName'=>$firstName,"LastName"=>$lastName,'Email'=>$email,'Mobile'=>$mobile,'UserTypeId'=>$_SESSION['UserTypeId']);
        $this->createSession($message);
    }
    function my_addresses()
    {
        $userid=$_POST['userid'];
        $ans=$this->modal->get_my_address($userid);
        if($ans->num_rows>0)
        {
            foreach($ans as $row)
            {
        ?>
                <tr>
                    <td>
                        <b>Address: </b><span><?php echo $row['AddressLine1']." ".$row['AddressLine2']." , ".$row['City']." ".$row['PostalCode'] ?></span><br>
                        <b>Phone number: </b><span><?php echo $row['Mobile']?></span>
                    </td>
                    <td>
                        <i class="bi bi-pencil-square" onclick="edit_address('<?php echo $row['AddressId'] ?>','<?php echo $row['AddressLine1']?>','<?php echo $row['AddressLine2']?>','<?php echo $row['City']?>','<?php echo $row['PostalCode']?>','<?php echo $row['Mobile']?>')"></i>
                        <i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#delete_address" onclick="delete_address_click('<?php echo $row['AddressId'] ?>')"></i>
                    </td>
                </tr>
        <?php
           }
        }
    }
    function change_addresses()
    {
        $addressid=$_POST['addressid'];
        $streetname=$_POST['streetname'];
        $houseNumber=$_POST['houseNumber'];
        $postalCode=$_POST['postalCode'];
        $city=$_POST['city'];
        $mobile=$_POST['mobile'];
        echo $this->modal->change_addresses($addressid,$streetname,$houseNumber,$postalCode,$city,$mobile);
    }
    function delete_addresses()
    {
        $addressid=$_POST['addressid'];
        echo $this->modal->delete_address($addressid);
    }
    function change_password()
    {
        $userid=$_POST['userid'];
        $old_pass=$_POST['old_pass'];
        $new_pass=$_POST['new_pass'];
        echo $this->modal->change_password($userid,$old_pass,$new_pass);
    }
}
?>
