<?php
session_start();
class HomeController
{
    function __construct()
    {
        include('./models/models.php');
        $this->modal = new Models();
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
        include('./views/faq.php');
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
        include('./views/sp_newService.php');
    }
    function sp_upComingService()
    {
        include('./views/sp_upComingService.php');
    }
    function sp_service_schedule()
    {
        include('./views/sp_service_schedule.php');
    }
    function sp_serviceHistory()
    {
        include('./views/sp_serviceHistory.php');
    }
    function sp_myRating()
    {
        include('./views/sp_myRating.php');
    }
    function sp_blockCustomer()
    {
        include('./views/sp_blockCustomer.php');
    }
    function sp_mySetting()
    {
        include('./views/sp_mySetting.php');
    }
    function logout()
    {
        session_unset();
        session_destroy();
        echo "success";
    }
    function error()
    {
        include('./views/error.php');
    }
    function resetPassword()
    {
        include('./views/resetPassword.php');
    }
    function admin_serviceRequests()
    {
        include('./views/admin_serviceRequests.php');
    }
    function admin_user_man()
    {
        include('./views/admin_user_man.php');
    }
    function send_email($email, $sub, $msg)
    {
        require_once('./PHPMailer/PHPMailerAutoload.php');
        $mail = new PHPMailer;
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'rathodsagar1362001@gmail.com';
        $mail->Password = 'sagar2001@';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('rathodsagar1362001@gmail.com', 'HelperLand');
        $mail->addAddress($email);
        $mail->addReplyTo('rathodsagar1362001@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = $sub;
        $mail->Body = $msg;
        $mail->AltBody = "";
        if (!$mail->send()) {
            return "message no sent";
        } else {
            return "message Sent";
        }
    }
    function forgotPassword()
    {
        $email = $_POST['email'];
        $check = $this->modal->checkEmail($email);
        if ($check->num_rows > 0) {
            $row = $check->fetch_assoc();
            date_default_timezone_set("Asia/Calcutta");
            $date = date('ymd');
            $time = date("His");
            $msg = "This is link to Reset Password:<a href='http://localhost/HelperLand/?controller=Home&&function=resetPassword&token=" . $row['Token'] . ":" . $date . ":" . $time . "'>Reset Password</a>";
            $sub = "Password Change";
            $this->send_email($email, $sub, $msg);
        } else {
            echo "Please Enter Valid Email Id";
        }
    }
    function getTouchwithUs()
    {
        $base_url = "http://localhost/HelperLand/";
        if (isset($_POST)) {
            $details = [
                'name' => $_POST['fname'] . " " . $_POST['lname'],
                'Email' => $_POST['email-add'],
                'Subject' => $_POST['subject'],
                'PhoneNumber' => $_POST['mbno'],
                'Message' => $_POST['message'],
                'fileName' => $_FILES['i1']['name'],
                'filetmp' => $_FILES['i1']['tmp_name'],
                'CreateOn' => date("Y-m-d H:i:a"),
            ];
            if (isset($_SESSION['userId'])) {
                $details['CreateBy'] = $_SESSION['userId'];
            }
            $this->modal->insert_contactUs($details);
            header('Location:' . $base_url . "?controller=Home&&function=index");
        } else {
            echo 'Error Occured Try Again';
        }
    }
    function customerSignup()
    {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token = bin2hex(random_bytes(24));
        if (isset($_POST)) {
            $details = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email-add'],
                'mobile_no' => $_POST['mbno'],
                'password' => $password,
                'userType' => 1,
                'create_date' => date("Y-m-d H:i:a"),
                'status' => 'New',
                'isRegister' => 1,
                'isactive' => 0,
                'token' => $token
            ];
            $result = $this->modal->insert_user($details);
            if ($result == 0) {
                echo "Email exist";
            } else {
                $_SESSION['register'] = 1;
                $this->send_email($details['email'], "Created Account", "Hello " . $details['fname'] . "<br>Your account has been successfully created");
                $this->send_email($details['email'], "Active Account", 'Please Click Link to Active account: <a href="http://localhost/HelperLand/?controller=Home&&function=index&token=' . $token . ':' . $result . '">Click Here</a>');
            }
        } else {
            echo 'Error Occured Try Again';
        }
    }
    function login()
    {
        $details = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        $message = $this->modal->select_user($details);
        if (is_array($message)) {
            $this->createSession($message);
            if (isset($_SESSION['UserTypeId'])) {
                if ($_SESSION['UserTypeId'] == 1) {
                    echo "customer";
                } else if ($_SESSION['UserTypeId'] == 2) {
                    echo "service provider";
                } elseif ($_SESSION['UserTypeId'] == 3) {
                    echo 'admin';
                }
            }
        } else {
            echo $message;
        }
    }
    function sp_signUp()
    {
        $token = bin2hex(random_bytes(24));
        if (isset($_POST)) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $details = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email-add'],
                'mobile_no' => $_POST['mbno'],
                'password' => $password,
                'userType' => 2,
                'create_date' => date("Y-m-d H:i:a"),
                'status' => 'New',
                'isRegister' => 1,
                'isactive' => 0,
                'token' => $token
            ];
            $result = $this->modal->insert_user($details);
            if ($result == -1) {
                echo "Email exist";
            } else {
                $_SESSION['register'] = 1;
                $this->send_email($details['email'], "Created Account", "Hello " . $details['fname'] . "<br>Your account has been successfully created");
                $this->send_email($details['email'], "Active Account", 'Please Click Link to Active account: <a href="http://localhost/HelperLand/?controller=Home&&function=index&token=' . $token . ':' . $result . '">Click Here</a>');
            }
        } else {
            echo 'Error Occured Try Again';
        }
    }
    function active_user()
    {
        $new_token = bin2hex(random_bytes(24));
        $token = $_POST['token'];
        $userid = $_POST['userid'];
        $this->modal->user_active($token, $userid, $new_token);
    }
    function createSession($message)
    {
        if ($message != "UserName or Password Incorrect" && $message != "User Not Found") {
            $_SESSION['userId'] = $message['UserId'];
            $_SESSION['UserName'] = $message['FirstName'];
            $_SESSION['email'] = $message['Email'];
            $_SESSION['Mobile'] = $message['Mobile'];
            $_SESSION['UserTypeId'] = $message['UserTypeId'];
        }
    }
    function setPassword()
    {
        if (isset($_POST)) {
            $token = $_POST['token'];
            $password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
            $ans = $this->modal->changePassword($token, $password);
            if ($ans == 1) {
                echo 1;
            }
        }
    }
    function check_forgot_link()
    {
        $token = $_POST['token'];
        $ans = $this->modal->check_link($token);
        if ($ans->num_rows <= 0) {
            echo 0;
        } else {
            echo 1;
        }
    }
    function check_sp_availability()
    {
        $postal_code = $_POST["postalCode_data"];
        $userid = $_POST['userid'];
        $ans = $this->modal->checkPostalCode($postal_code, $userid);
        if (!$ans->num_rows > 0) {
            echo 0;
        } else {
            echo $ans;
        }
    }
    function store_userAddress()
    {
        $details = [
            "addressline1" => $_POST['addressline1'],
            "addressline2" => $_POST['addressline2'],
            "city" => $_POST['city'],
            "postalCode" => $_POST['postalCode'],
            "mobile" => $_POST['mobile'],
            "IsDeleted" => 0,
            "UserId" => $_SESSION['userId'],
            "email" => $_SESSION['email'],
        ];
        $this->modal->storeAddress($details);
    }
    function get_userAddress()
    {
        $ans = $this->modal->getAddress($_SESSION['userId']);
        if ($ans->num_rows > 0) {
            foreach ($ans as $row) {
?>
                <li>
                    <label for="<?php echo $row['AddressId'] ?>">
                        <input type="radio" id="<?php echo $row['AddressId'] ?>" class="add" name="address">
                        <b>Address: </b><span class="address"><?php echo $row['AddressLine1'] . " " . $row['AddressLine2'] . " , " . $row['City'] . " " . $row['PostalCode'] ?></span><br>
                        <b class="phone_number">Phone number:</b><span class="no"><?php echo $row['Mobile'] ?></span>
                    </label>
                </li>
            <?php
            }
        }
    }
    function get_sp()
    {
        $postal_code = $_POST['postalCode_data'];
        $userid = $_POST['userid'];
        $ans = $this->modal->get_fav_sp_list($userid);
        foreach ($ans as $row) {
            ?>
            <div class="fav_sp_card" id="<?php echo $row['TargetUserId'] ?>" onclick="select_fav_sp(this.id)">
                <img src="./assets/images/avatar-<?php echo $row['UserProfilePicture'] == null ? 'hat' : $row['UserProfilePicture'] ?>.png" />
                <span class="name"><?php echo $row['FirstName'] . " " . $row['LastName'] ?></span>
                <button class="btn select_fav_sp <?php echo $row['TargetUserId'] ?>" type="button">Select</button>
            </div>
            <?php
        }
    }
    function booking_service()
    {
        $details = [
            "userId" => $_SESSION['userId'],
            "serviceStartDate" => $_POST['serviceStartDate'],
            "postalCode" => $_POST['postalCode'],
            "serviceHourlyrate" => $_POST['serviceHourlyrate'],
            "serviceHours" => $_POST['serviceHours'],
            "extraHours" => $_POST['extraHours'],
            "addressline1" => $_POST['addressline1'],
            "addressline2" => $_POST['addressline2'],
            "city" => $_POST['city'],
            "service_mobile" => $_POST['service_mobile'],
            "comments" => $_POST['comments'],
            "haspets" => $_POST['haspets'],
            "subtotal" => $_POST['subtotal'],
            "discount" => $_POST['discount'],
            "totalcost" => $_POST['totalcost'],
            "paymentDue" => $_POST['paymentDue'],
            "paymentDone" => $_POST['paymentDone'],
            "Email" => $_SESSION['email'],
            "createDate" => date('Y-m-d'),
            "Serviceid" => $_POST['Serviceid'],
            "HasIssue" => 0
        ];
        $sub = "New Service Request";
        if (!empty($_POST['extra_services'])) {
            $details['extra_services'] = $_POST['extra_services'];
        }
        if ($_POST['favourite_sp'] != null) {
            $details['spid'] = $_POST['favourite_sp'];
        }
        $ans = $this->modal->booking_service_modal($details);
        if ($_POST['favourite_sp'] != null) {
            $msg = "A service request " . $ans . " has been directly assigned to you";
            $this->send_mail_to_favorite_Sp($_POST['favourite_sp'], $sub, $msg);
        }
        if ($_POST['favourite_sp'] == null) {
            $this->send_mail_to_all_Sp($_POST['postalCode'], $sub, "A service request " . $ans . " has created", $_SESSION['userId']);
        }
        echo $ans;
    }
    function send_mail_to_favorite_Sp($sp, $sub, $msg)
    {
        $email_sp = $this->modal->send_mail_to_favorite_Sp($sp);
        $email_sp = $email_sp->fetch_assoc();
        $this->send_email($email_sp['Email'], $sub, $msg);
    }
    function send_mail_to_all_Sp($postalCode, $sub, $msg, $userid)
    {
        $ans = $this->modal->checkPostalCode($postalCode, $userid);
        foreach ($ans as $row) {
            $this->send_email($row['Email'], $sub, $msg);
        }
    }
    // get customer dashboard table data
    function HourtoMinute($time)
    {
        $t = explode(":", $time);
        return $t[0] * 60 + $t[1];
    }
    function MintoHour($min)
    {
        $h = (int)($min / 60);
        $m = round($min % 60);
        if ($h < 10) {
            $h = "0" . $h;
        }
        if ($m < 10) {
            $m = "0" . $m;
        }
        return $h . ":" . $m;
    }
    function customer_dashboard_tableData()
    {
        $user = $_POST['userId'];
        $status1 = $_POST['Status1'];
        $status2 = $_POST['Status2'];
        $ans = $this->modal->customer_dashboard_tableData_modal($user, $status1, $status2);
        if ($ans->num_rows > 0) {
            foreach ($ans as $data) {
                $starttime = date('H:i', strtotime($data['ServiceStartDate']));
                $totalMin = $this->HourtoMinute($starttime) + ($data['SubTotal'] * 60);
                $totaltime = $this->MintoHour($totalMin);
            ?>
                <tr>
                    <td><?php echo $data['ServiceId'] ?></td>
                    <td id="<?php echo $data['ServiceId'] ?>" onclick="show_RequestDetails_Popup(this.id,<?php echo $status1 ?>)">
                        <img src="./assets/images/calendar.png" class="img-fluid calendar" /><b><?php echo date('Y-m-d', strtotime($data['ServiceStartDate'])) ?></b><br />
                        <img src="./assets/images/clock.png" class="img-fluid clock" /><?php echo $starttime ?> - <?php echo $totaltime ?>
                    </td>
                    <td>
                        <?php if ($data['ServiceProviderId'] != Null) {
                            $ans2 = $this->modal->show_rating($data['ServiceProviderId']);
                            $row2 = mysqli_fetch_array($ans2);
                            $var = $row2['Ratings'] == '' ? 0 : $row2['Ratings'];
                        ?>
                            <div class="rating">
                                <img src="./assets/images/avatar-<?php echo $row2['UserProfilePicture'] == null ? 'hat' : $row2['UserProfilePicture'] ?>.png" class="img-fluid cap" />
                                <div class="star">
                                    <p><?php echo $row2['FirstName'] . " " . $row2['LastName'] ?></p>
                                    <div class="rateYo readOnly_data" data-rateyo-rating="<?php echo $var ?>"></div>
                                    <span class="result"><?php echo $var ?></span>
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
                    if ($status1 == 0 && $status2 == 1) {
                    ?>
                        <td>
                            <button class="btn reschedule" data-bs-toggle="modal" data-bs-target="#reschedule_request" data-bs-dismiss="modal" onclick="reschedule_request(<?php echo $data['ServiceId'] ?>)">Reschedule</button>
                            <button class="btn cancle" data-bs-toggle="modal" data-bs-target="#cancle_request" data-bs-dismiss="modal" onclick="cancle_request(<?php echo $data['ServiceId'] ?>)">Cancle</button>
                        </td>
                    <?php
                    }
                    if ($status1 == 3 && $status2 == 4) {
                    ?>
                        <td class="status">
                            <div class="<?php echo $data['Status'] == 3 ? 'status-c' : 'status-d' ?>">
                                <p class="text"><?php echo $data['Status'] == 3 ? 'Completed' : 'Cancelled' ?></p>
                            </div>
                        </td>
                        <td>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#rate_sp" <?php echo $data['Status'] == 4 ? 'disabled' : '' ?> onclick="show_rating_card(<?php echo $data['ServiceRequestId'] ?>,<?php echo $data['ServiceProviderId'] ?>,<?php echo $data['UserId'] ?>)">Rate SP</button>
                        </td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }
        }
    }
    function give_extra_service_name($serviceextraid)
    {
        if ($serviceextraid == 1) {
            return "Inside Cabinets";
        }
        if ($serviceextraid == 2) {
            return "Inside Fridge";
        }
        if ($serviceextraid == 3) {
            return "Inside Oven";
        }
        if ($serviceextraid == 4) {
            return "Laundry wash & dry";
        }
        if ($serviceextraid == 5) {
            return "Interior windows";
        }
    }
    function show_request_popup()
    {
        $serviceid = $_POST['serviceId'];
        $status1 = $_POST['status1'];
        $ans = $this->modal->requestData($serviceid);
        $extra = "";
        if ($ans->num_rows > 0) {
            foreach ($ans as $data) {
                $extra = $extra . $this->give_extra_service_name($data['ServiceExtraId']) . " , ";
            }
            $starttime = date('H:i', strtotime($data['ServiceStartDate']));
            $totalMin = $this->HourtoMinute($starttime) + ($data['SubTotal'] * 60);
            $totaltime = $this->MintoHour($totalMin);
            ?>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal_title">Service Details</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                    </div>
                    <div>
                        <div class="modal_time"><b><?php echo date("d/m/Y H:i", strtotime($data['ServiceStartDate'])) . " - " . $totaltime ?></b></div>
                        <div class="modal_main">Duration: <span class="modal_data"><?php echo $data['SubTotal'] . " Hrs" ?></span></div>
                    </div>
                    <hr>
                    <div>
                        <div class="modal_main">Service ID: <span class="modal_data"><?php echo $data['ServiceId'] ?></span></div>
                        <div class="modal_main">Extras: <span class="modal_data"><?php echo $extra ?></span></div>
                        <div class="modal_main">Net Amount: <span class="modal_data amount"><?php echo $data['TotalCost'] . " €"  ?></span></div>
                    </div>
                    <hr>
                    <div>
                        <div class="modal_main">Service Address: <span class="modal_data"><?php echo $data['AddressLine1'] . " " . $data['AddressLine2'] . " , " . $data['City'] . " " . $data['PostalCode'] ?></span></div>
                        <div class="modal_main">Billing Address: <span class="modal_data"><?php echo $data['AddressLine1'] . " " . $data['AddressLine2'] . " , " . $data['City'] . " " . $data['PostalCode'] ?></span></div>
                        <div class="modal_main">Phone: <span class="modal_data"><?php echo $data['Mobile'] ?></span></div>
                        <div class="modal_main">Email: <span class="modal_data"><?php echo $data['Email'] ?></span></div>
                    </div>
                    <hr>
                    <div>
                        <div class="modal_main">Comments</div>
                        <div><i class="bi bi-x"></i><?php echo ($data['HasPets'] == 1) ? 'I have Pets at home.' : "I don't have pets at home.  " ?></div>
                    </div>
                    <hr>
                    <?php
                    if ($status1 == '0') {
                    ?>
                        <div>
                            <button class="btn reschedule" data-bs-toggle="modal" data-bs-target="#reschedule_request" data-bs-dismiss="modal" onclick="reschedule_request(<?php echo $data['ServiceId'] ?>)"><i class="bi bi-arrow-clockwise"></i> Reschedule</button>
                            <button class="btn cancle" data-bs-toggle="modal" data-bs-target="#cancle_request" data-bs-dismiss="modal" onclick="cancle_request(<?php echo $data['ServiceId'] ?>)"><i class="bi bi-x-lg"></i> Cancle</button>
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
        $serviceid = $_POST['serviceId'];
        $userid = $_POST['userid'];
        $date = $_POST['date'] . " " . $_POST['time'];
        $date = str_replace('/', '-', $date);
        $ans = $this->modal->reschedule_date_time($serviceid);
        $row = $ans->fetch_assoc();
        $sub = "Reschedule Request";
        $msg = "Service Request " . $serviceid . " has been rescheduled by customer. New date and time are " . $date;
        if ($row['ServiceProviderId'] == null) {
            $this->modal->reschedule_request($serviceid, $date, $userid);
            $this->send_mail_to_all_Sp($row['ZipCode'], $sub, $msg, $userid);
            echo "Reschedule Request Successfully";
        } else {
            $starttime = date('H:i', strtotime($_POST['time']));
            $totalMin = $this->HourtoMinute($starttime) + ($row['SubTotal'] * 60);
            $totaltime = $this->MintoHour($totalMin);
            $ans2 = $this->modal->check_sp_available_modal($row['ServiceProviderId'], date('Y-d-m', strtotime($_POST['date'])), $serviceid);
            $res = $this->check_sp_available($ans2, $starttime, $totaltime);
            if (!$res) {
                $this->modal->reschedule_request($serviceid, date("Y-m-d H:i:s", strtotime($date)), $userid);
                $this->send_mail_to_favorite_Sp($row['ServiceProviderId'], $sub, $msg);
                echo "Reschedule Request Successfully";
            } else {
                echo ("Another service request has been assigned to the service provider on " . $res['ServiceDate'] . " from " . $res['ServiceStarttime'] . " to " . $res['ServiceEndtime'] . ". Either choose another date or pick up a different time slot.");
            }
        }
    }
    function cancle_request()
    {
        $serviceid = $_POST['serviceId'];
        $userid = $_POST['userid'];
        $reason = $_POST['reason'];
        $ans = $this->modal->cancle_request($serviceid, $userid, $reason);
        $row = $ans->fetch_assoc();
        $sub = "Cancle Service Request";
        $msg = "Service Request $serviceid has been cancelled By Customer";
        if ($row['ServiceProviderId'] != null) {
            $this->send_mail_to_favorite_Sp($row['ServiceProviderId'], $sub, $msg);
        }
        $this->send_mail_to_favorite_Sp($row['UserId'], $sub, "Service Request $serviceid has been cancelled by Admin");
    }
    function show_rating()
    {
        $userid = $_POST['userid'];
        $serviceRequestid = $_POST['serviceRequestid'];
        $spid = $_POST['spid'];
        $ans = $this->modal->show_rating($spid);
        $row = mysqli_fetch_array($ans);
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
            </div>
            <div class="rating">
                <img src="./assets/images/avatar-<?php echo $row['UserProfilePicture'] == null ? 'hat' : $row['UserProfilePicture'] ?>.png" class="img-fluid cap" />
                <div class="star">
                    <p><?php echo $row['FirstName'] . " " . $row['LastName'] ?></p>
                    <div class="rateYo readOnly_data"></div>
                    <span class="result"><?php echo $row['Ratings'] == null ? 0 : $row['Ratings'] ?></span>
                </div>
            </div>
            <span><b>Rate Your Service Provider</b></span>
            <hr>
            <div class="diff_rating">
                <div class="on_time_arival">
                    <span>On time arrival</span>
                    <div class="rateYo" data-rateyo-rating="<?php echo $row['OnTimeArrival'] == null ? 0 : $row['OnTimeArrival'] ?>"></div>
                </div>
                <div class="friendly">
                    <span>Friendly</span>
                    <div class="rateYo" data-rateyo-rating="<?php echo $row['Friendly'] == null ? 0 : $row['Friendly'] ?>"></div>
                </div>
                <div class="qos">
                    <span>Quality of service</span>
                    <div class="rateYo" data-rateyo-rating="<?php echo $row['QualityOfService'] == null ? 0 : $row['QualityOfService'] ?>"></div>
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
        $userid = $_POST['userid'];
        $serviceRequestid = $_POST['serviceRequestid'];
        $spid = $_POST['spid'];
        $comments = $_POST['comments'];
        $on_arrival = $_POST['on_arrival'];
        $friendly = $_POST['friendly'];
        $qos = $_POST['qos'];
        $date = date("Y-m-d H:i:s");
        $this->modal->give_rating_sp($userid, $spid, $serviceRequestid, $comments, $on_arrival, $friendly, $qos, $date);
    }
    function fav_block_sp()
    {
        $userid = $_POST['userid'];
        $ans = $this->modal->fav_block_sp($userid);
        foreach ($ans as $row) {
            $ans2 = $this->modal->get_rating_info($row[`user` . 'UserId']);
            $row2 = $ans2->fetch_assoc();
            $ans3 = $this->modal->get_total_number_data($row[`user` . 'UserId']);
            $row3 = $ans3->fetch_assoc();
        ?>
            <tr>
                <td>
                    <div class="favorite_card">
                        <img src="./assets/images/avatar-<?php echo $row['UserProfilePicture'] == null ? 'hat' : $row['UserProfilePicture'] ?>.png" />
                        <b>
                            <p class="name"><?php echo $row['FirstName'] . " " . $row['LastName'] ?></p>
                        </b>
                        <div class="rating">
                            <div class="star">
                                <div class="rateYo readOnly_data" data-rateyo-rating="<?php echo $row2['Ratings'] == null ? 0 : $row2['Ratings'] ?>"></div>
                                <span class="result"><?php echo $row2['Ratings'] == null ? 0 : $row2['Ratings'] ?></span>
                            </div>
                        </div>
                        <p class="total_cleaning"><?php echo $row3['number'] ?> Cleanings</p>
                        <button class="btn favorite_btn" id="<?php echo $row[`user` . 'UserId'] ?>" onclick="set_favorite_sp(this.id,<?php echo $_SESSION['userId'] . ',', $row['IsFavorite'] ?>)"><?php echo $row['IsFavorite'] == 1 ? "Unfavorite" : "Favorite" ?></button>
                        <button class="btn block_btn" id="<?php echo $row[`user` . 'UserId'] ?>" onclick="set_block_sp(this.id,<?php echo $_SESSION['userId'] . ',' . $row['IsBlocked'] ?>)"><?php echo $row['IsBlocked'] == 1 ? "Unblock" : "Block" ?></button>
                    </div>
                </td>
            </tr>
            <?php
        }
    }
    function set_fav_sp()
    {
        $spid = $_POST['spid'];
        $custid = $_POST['custid'];
        $isfav = $_POST['isfav'];
        if ($isfav == 1) {
            $isfav = 0;
        } else {
            $isfav = 1;
        }
        $this->modal->set_fav_sp($spid, $custid, $isfav);
    }
    function set_block_sp()
    {
        $spid = $_POST['spid'];
        $custid = $_POST['custid'];
        $isblock = $_POST['isblock'];
        if ($isblock == 1) {
            $isblock = 0;
        } else {
            $isblock = 1;
        }
        $this->modal->set_block_sp($spid, $custid, $isblock);
    }
    function get_user_data()
    {
        $userid = $_POST['userid'];
        $ans = $this->modal->get_user_data($userid);
        $row = $ans->fetch_assoc();
        echo json_encode($row);
    }
    function change_my_profile()
    {
        $userid = $_POST['userid'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];
        $ans = $this->modal->change_my_profile_data($userid, $firstName, $lastName, $email, $mobile, $dob);
        $message = array('UserId' => $userid, 'FirstName' => $firstName, "LastName" => $lastName, 'Email' => $email, 'Mobile' => $mobile, 'UserTypeId' => $_SESSION['UserTypeId']);
        $this->createSession($message);
    }
    function my_addresses()
    {
        $userid = $_POST['userid'];
        $ans = $this->modal->getAddress($userid);
        if ($ans->num_rows > 0) {
            foreach ($ans as $row) {
            ?>
                <tr>
                    <td>
                        <b>Address: </b><span><?php echo $row['AddressLine1'] . " " . $row['AddressLine2'] . " , " . $row['City'] . " " . $row['PostalCode'] ?></span><br>
                        <b>Phone number: </b><span><?php echo $row['Mobile'] ?></span>
                    </td>
                    <td>
                        <i class="bi bi-pencil-square" onclick="edit_address('<?php echo $row['AddressId'] ?>','<?php echo $row['AddressLine1'] ?>','<?php echo $row['AddressLine2'] ?>','<?php echo $row['City'] ?>','<?php echo $row['PostalCode'] ?>','<?php echo $row['Mobile'] ?>')"></i>
                        <i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#delete_address" onclick="delete_address_click('<?php echo $row['AddressId'] ?>')"></i>
                    </td>
                </tr>
            <?php
            }
        }
    }
    function change_addresses()
    {
        $addressid = $_POST['addressid'];
        $streetname = $_POST['streetname'];
        $houseNumber = $_POST['houseNumber'];
        $postalCode = $_POST['postalCode'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        echo $this->modal->change_addresses($addressid, $streetname, $houseNumber, $postalCode, $city, $mobile);
    }
    function delete_addresses()
    {
        $addressid = $_POST['addressid'];
        echo $this->modal->delete_address($addressid);
    }
    function change_password()
    {
        $userid = $_POST['userid'];
        $old_pass = $_POST['old_pass'];
        $new_pass = password_hash($_POST['new_pass'], PASSWORD_BCRYPT);
        echo $this->modal->change_password($userid, $old_pass, $new_pass);
    }
    /* service provider pages */
    function get_data_of_requests()
    {
        $status = $_POST['status'];
        $haspets = $_POST['haspets'];
        $distance = $_POST['distance'];
        $userid = $_POST['userid'];
        date_default_timezone_set("Asia/Calcutta");
        $curr_date = date("Y-m-d", time());
        $ans = $this->modal->get_data_of_requests_modal($status, $haspets, $distance, $userid, $curr_date);
        if ($ans->num_rows > 0) {
            foreach ($ans as $row) {
                $starttime = date('H:i', strtotime($row['ServiceStartDate']));
                $totalMin = $this->HourtoMinute($starttime) + ($row['SubTotal'] * 60);
                $totaltime = $this->MintoHour($totalMin);
                $date = date("Y-m-d", strtotime($row['ServiceStartDate']));
                $ans2 = $this->modal->check_sp_available_modal($userid, $date, $row['ServiceId']);
                $res = $this->check_sp_available($ans2, $starttime, $totaltime);
            ?>
                <tr>
                    <td><?php echo $row['ServiceId'] ?></td>
                    <td onclick="show_sp_RequestDetails_Popup(<?php echo $row['ServiceId'] ?>,0,<?php echo $userid ?>)">
                        <img src="./assets/images/calendar.png" class="img-fluid calendar" /><b><?php echo date('Y-m-d', strtotime($row['ServiceStartDate'])) ?></b><br />
                        <img src="./assets/images/clock.png" class="img-fluid clock" /><?php echo $starttime . "-" . $totaltime ?>
                    </td>
                    <td>
                        <span class="name"><?php echo $row['FirstName'] . " " . $row['LastName'] ?></span><br />
                        <div class="mydiv">
                            <img src="./assets/images/home.png" class="img-fluid home" />
                            <div class="desc"><?php echo $row['AddressLine1'] . " " . $row['AddressLine2'] . "<br>" . $row['PostalCode'] . " " . $row['City'] ?></div>
                        </div>
                    </td>
                    <td>
                        <?php echo $row['TotalCost'] . " €" ?>
                    </td>
                    <td class="time_conflict">
                        <?php
                        if (!empty($res)) {
                        ?>
                            <span><b><?php echo $res['ServiceId'] ?></b></span><br>
                            <img src="./assets/images/clock.png" class="img-fluid clock" /><span><?php echo $res['ServiceStarttime'] . "-" . $res['ServiceEndtime'] ?></span>
                        <?php
                        } else {
                            echo 'No';
                        }
                        ?>
                    </td>
                    <td>
                        <button class="btn accept" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="accept_service(<?php echo $_SESSION['userId'] ?>,<?php echo $row['ServiceId'] ?>)" <?php echo empty($res) != true ? 'disabled' : '' ?>>Accept</button>
                    </td>
                </tr>
            <?php
            }
        }
    }
    function accept_service_requests()
    {
        $userid = $_POST['userid'];
        $serviceid = $_POST['serviceid'];
        $ans2 = $this->modal->check_request_accept_or_not($serviceid);
        $row = $ans2->fetch_assoc();
        if ($row['ServiceProviderId'] != null) {
            echo 0;
            return;
        } else {
            $curr_date = date('Y-m-d H:i:s');
            $sub = "Accepted Service Request";
            $msg = "Your service request " . $row['ServiceId'] . " has been Accepted";
            $this->modal->complete_accept_service_request($userid, $serviceid, $curr_date);
            $this->send_mail_to_favorite_Sp($row['UserId'], $sub, $msg);
            $sub2 = "Service Not Available";
            $msg2 = "Service request " . $serviceid . " is no more available";
            $this->send_mail_to_all_Sp($row['ZipCode'], $sub2, $msg2, $userid);
            echo 1;
        }
    }
    function check_sp_available($ans, $starttime, $totaltime)
    {
        $another_service = [];
        foreach ($ans as $row) {
            $old_request_starttime = date('H:i', strtotime($row['ServiceStartDate']));
            $totalMin = $this->HourtoMinute($old_request_starttime) + ($row['SubTotal'] * 60);
            $old_request_totaltime = $this->MintoHour($totalMin);
            $another_service['ServiceId'] = $row['ServiceId'];
            $another_service['ServiceDate'] = $row['ServiceStartDate'];
            $another_service['ServiceStarttime'] = $old_request_starttime;
            $another_service['ServiceEndtime'] = $old_request_totaltime;
            if ($old_request_starttime == $starttime || $old_request_totaltime == $totaltime) {
                return $another_service;
            } else if ($starttime < $old_request_starttime) {
                if ($totaltime > $old_request_starttime) {
                    return $another_service;
                } else if (date("H:i", strtotime('+1 hour', strtotime($totaltime))) > $old_request_starttime) {
                    return $another_service;
                }
            } else if ($starttime > $old_request_starttime) {
                if ($starttime < $old_request_totaltime) {
                    return $another_service;
                } else if (date("H:i", strtotime('+1 hour', strtotime($old_request_totaltime))) > $starttime) {
                    return $another_service;
                }
            }
        }
    }
    function upcoming_service_requests()
    {
        $userid = $_POST['userid'];
        $status = $_POST['status'];
        $ans = $this->modal->get_data_upcoming_requests_modal($userid, $status);
        if ($ans->num_rows > 0) {
            foreach ($ans as $row) {
                $starttime = date('H:i', strtotime($row['ServiceStartDate']));
                $totalMin = $this->HourtoMinute($starttime) + ($row['SubTotal'] * 60);
                $totaltime = $this->MintoHour($totalMin);
            ?>
                <tr>
                    <td><?php echo $row['ServiceId'] ?></td>
                    <td onclick="show_sp_RequestDetails_Popup(<?php echo $row['ServiceId'] ?>,<?php echo $status ?>,<?php echo $userid ?>)">
                        <img src="./assets/images/calendar.png" class="img-fluid calendar" /><b><?php echo date('Y-m-d', strtotime($row['ServiceStartDate'])) ?></b><br />
                        <img src="./assets/images/clock.png" class="img-fluid clock" /><?php echo $starttime . "-" . $totaltime ?>
                    </td>
                    <td>
                        <span class="name"><?php echo $row['FirstName'] . " " . $row['LastName'] ?></span><br />
                        <div class="mydiv">
                            <img src="./assets/images/home.png" class="img-fluid home" />
                            <div class="desc"><?php echo $row['AddressLine1'] . " " . $row['AddressLine2'] . "<br>" . $row['PostalCode'] . " " . $row['City'] ?></div>
                        </div>
                    </td>
                    <?php
                    if ($status == 1) {
                    ?>
                        <td>
                            <?php echo $row['TotalCost'] . " €" ?>
                        </td>
                        <td></td>
                        <td>
                            <?php
                            date_default_timezone_set('Asia/Calcutta');
                            if (date("Y-m-d H:i:s") > date("Y-m-d H:i:s", strtotime(date('Y-m-d', strtotime($row['ServiceStartDate'])) . $totaltime))) {
                            ?>
                                <button class="btn complete" onclick="complete_request(<?php echo $userid ?>,<?php echo $row['ServiceId'] ?>)">Complete</button>
                            <?php
                            }
                            ?>

                            <button class="btn cancle" data-bs-toggle="modal" data-bs-target="#cancle_request" data-bs-dismiss="modal" onclick="cancle_request(<?php echo $row['ServiceId'] ?>)">Cancle</button>
                        </td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }
        }
    }
    function show_sp_request_popup()
    {
        $serviceid = $_POST['serviceId'];
        $status = $_POST['status'];
        $userid = $_POST['userid'];
        $ans = $this->modal->requestData($serviceid);
        $extra = "";
        if ($ans->num_rows > 0) {
            foreach ($ans as $data) {
                $extra = $extra . $this->give_extra_service_name($data['ServiceExtraId']) . " , ";
            }
            $starttime = date('H:i', strtotime($data['ServiceStartDate']));
            $totalMin = $this->HourtoMinute($starttime) + ($data['SubTotal'] * 60);
            $totaltime = $this->MintoHour($totalMin);
            ?>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal_title">Service Details</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                    </div>
                    <div class="text">
                        <div>
                            <div class="modal_time"><b><?php echo date("d/m/Y H:i", strtotime($data['ServiceStartDate'])) . " - " . $totaltime ?></b></div>
                            <div class="modal_main">Duration: <span class="modal_data"><?php echo $data['SubTotal'] . " Hrs" ?></span></div>
                        </div>
                        <hr>
                        <div>
                            <div class="modal_main">Service ID: <span class="modal_data"><?php echo $data['ServiceId'] ?></span></div>
                            <div class="modal_main">Extras: <span class="modal_data"><?php echo $extra ?></span></div>
                            <div class="modal_main">Net Amount: <span class="modal_data amount"><?php echo $data['TotalCost'] . " €"  ?></span></div>
                        </div>
                        <hr>
                        <div>
                            <div class="modal_main">Customer Name: <span class="modal_data"><?php echo $data['FirstName'] . " " . $data['LastName'] ?></span></div>
                            <div class="modal_main">Service Address: <span class="modal_data"><?php echo $data['AddressLine1'] . " " . $data['AddressLine2'] . " , " . $data['City'] . " " . $data['PostalCode'] ?></span></div>
                            <div class="modal_main">Distance: <span class="modal_data"><?php echo $data['Distance'] ?></span></div>
                        </div>
                        <hr>
                        <div>
                            <div class="modal_main">Comments</div>
                            <div><i class="bi bi-x"></i><?php echo ($data['HasPets'] == 1) ? 'I have Pets at home.' : "I don't have pets at home.  " ?></div>
                        </div>
                        <hr>
                        <?php
                        if ($status != '3') {
                            if ($status == '0') {
                                $date = date("Y-m-d", strtotime($data['ServiceStartDate']));
                                $ans2 = $this->modal->check_sp_available_modal($userid, $date, $data['ServiceId']);
                                $res = $this->check_sp_available($ans2, $starttime, $totaltime);
                        ?>
                                <div>
                                    <button class="btn accept_inModal" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="accept_service(<?php echo $_SESSION['userId'] ?>,<?php echo $data['ServiceId'] ?>)" <?php echo empty($res) != true ? 'disabled' : '' ?>><i class="bi bi-check2"></i>Accept</button>
                                </div>
                            <?php
                            }
                            if ($status == '1') {
                            ?>
                                <div>
                                    <button class="btn cancle" data-bs-toggle="modal" data-bs-target="#cancle_request" data-bs-dismiss="modal" onclick="cancle_request(<?php echo $data['ServiceId'] ?>)"><i class="bi bi-x-lg"></i>Cancle</button>
                                    <?php
                                    if (date("Y-m-d H:i:s") > date("Y-m-d H:i:s", strtotime(date('Y-m-d', strtotime($data['ServiceStartDate'])) . $totaltime))) {
                                    ?>
                                        <button class="btn complete" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="complete_request(<?php echo $data['ServiceProviderId']  ?>,<?php echo $data['ServiceId'] ?>)"><i class="bi bi-check2"></i>Complete</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="map">
                        <iframe src="https://maps.google.com/maps?q=<?php echo $data['AddressLine1'] . " " . $data['AddressLine2'] . " , " . $data['City'] . " " . $data['PostalCode'] ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    function complete_request()
    {
        $serviceid = $_POST['serviceid'];
        $this->modal->complete_service_request($serviceid);
    }
    function cancle_request_by_sp()
    {
        $serviceid = $_POST['serviceid'];
        $userid = $_POST['userid'];
        $this->modal->cancle_request_by_sp_modal($serviceid);
        $ans = $this->modal->check_request_accept_or_not($serviceid);
        $row = $ans->fetch_assoc();
        $sub = "Cancle Service Request";
        $msg = "Your Servce request " . $serviceid . " has been cancelled by Service Provider";
        $this->send_mail_to_favorite_Sp($row['UserId'], $sub, $msg);
        $sub2 = "New Service Request";
        $msg2 = "A service request " . $serviceid . " has created";
        $this->send_mail_to_all_sp($row['ZipCode'], $sub2, $msg2, $userid);
    }
    function get_sp_serviceSchedule()
    {
        $userid = $_POST['userid'];
        $ans = $this->modal->get_sp_requests($userid);
        $data = array();
        foreach ($ans as $row) {
            $starttime = date('H:i', strtotime($row['ServiceStartDate']));
            $totalMin = $this->HourtoMinute($starttime) + ($row['SubTotal'] * 60);
            $totaltime = $this->MintoHour($totalMin);
            $curr_date = date("Y-m-d");
            if ($row['Status'] == '0' || $row['Status'] == '1') {
                $color = "#1d7a8c";
            }
            if ($row['Status'] == '3' || $row['Status'] == '4') {
                $color = "#c1c1c1";
            }
            $data[] = array(
                'id' => $row['ServiceId'],
                'title' => "$starttime" . " - " . "$totaltime",
                'start' => date("Y-m-d", strtotime($row['ServiceStartDate'])),
                'end' => date("Y-m-d", strtotime($row['ServiceStartDate'])),
                'color' => "$color"
            );
        }
        echo json_encode($data);
    }
    function load_my_rating()
    {
        $userid = $_POST['userid'];
        $rating_status = $_POST['rating_status'];
        $ans = $this->modal->load_my_rating_modal($userid, $rating_status);
        foreach ($ans as $row) {
            $starttime = date('H:i', strtotime($row['RatingDate']));
            $totalMin = $this->HourtoMinute($starttime) + ($row['SubTotal'] * 60);
            $totaltime = $this->MintoHour($totalMin);
            if ($row['Ratings'] > 0 && $row['Ratings'] <= 1) {
                $rating = "Poorly";
            }
            if ($row['Ratings'] > 1 && $row['Ratings'] <= 2) {
                $rating = "Enough";
            }
            if ($row['Ratings'] > 2 && $row['Ratings'] <= 3) {
                $rating = "Average";
            }
            if ($row['Ratings'] > 3 && $row['Ratings'] <= 4) {
                $rating = "Good";
            }
            if ($row['Ratings'] > 4 && $row['Ratings'] <= 5) {
                $rating = "Excellent";
            }
        ?>
            <tr>
                <td>
                    <div class="rating">
                        <div>
                            <?php echo $row['ServiceRequestId'] ?><br>
                            <b><?php echo $row['FirstName'] . " " . $row['LastName'] ?></b>
                        </div>
                        <div>
                            <img src="./assets/images/calendar.png" class="img-fluid calendar" /><b><?php echo date("d/m/Y", strtotime($row['RatingDate'])) ?></b><br />
                            <img src="./assets/images/clock.png" class="img-fluid clock" /><?php echo $starttime . "-" . $totaltime ?>
                        </div>
                        <div>
                            <b>ratings</b><br>
                            <div class="rateYo readOnly_data" data-rateyo-rating=<?php echo $row['Ratings'] ?>></div>
                            <span class="result"><?php echo $rating ?></span>
                        </div>
                        <hr>
                        <div class="cust_comments">
                            <b>Customer Comment</b>
                            <p><?php echo $row[`rating` . 'Comments'] ?></p>
                        </div>
                    </div>
                </td>
            </tr>
        <?php
        }
    }
    function load_block_customer()
    {
        $userid = $_POST['userid'];
        $ans = $this->modal->load_block_customer($userid);
        foreach ($ans as $row) {
        ?>
            <tr>
                <td>
                    <div class="img">
                        <img src="./assets/images/cap.png" />
                    </div>
                    <b>
                        <p><?php echo $row['FirstName'] . " " . $row['LastName'] ?></p>
                    </b>
                    <button class="btn <?php echo $row['IsBlocked'] == 1 ? 'block' : 'unblock' ?>" id="<?php echo $row['UserId'] ?>" onclick="block_unblock_cust(this.id,<?php echo $_SESSION['userId'] ?>)"><?php echo $row['IsBlocked'] == 1 ? 'Unblock' : 'Block' ?></button>
                </td>
            </tr>
        <?php
        }
    }
    function block_unblock_customer()
    {
        $custid = $_POST['custid'];
        $spid = $_POST['spid'];
        $this->modal->block_unblock_customer_modal($custid, $spid);
    }
    function get_default_address()
    {
        $userid = $_POST['userid'];
        $ans = $this->modal->get_default_address_modal($userid);
        if ($ans->num_rows > 0) {
            $row = $ans->fetch_assoc();
            echo json_encode($row);
        } else {
            echo 0;
        }
    }
    function set_sp_profile_data()
    {
        $userid = $_POST['userid'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];
        $nationality = $_POST['nationality'];
        $gender = $_POST['gender'];
        $avatar = $_POST['avatar'];
        $addressid = $_POST['addressid'];
        $street = $_POST['street'];
        $house_no = $_POST['house_no'];
        $postalCode = $_POST['postalCode'];
        $city = $_POST['city'];
        $date = date('Y-m-d H:i:s');
        $this->modal->set_sp_profile_data_modal($userid, $firstName, $lastName, $email, $mobile, $dob, $nationality, $gender, $avatar, $addressid, $street, $house_no, $postalCode, $city, $date);
    }
    /* service provider pages */
    /* admin pages */
    function get_servicerequest_admin()
    {
        $serviceid = $_POST['serviceid'];
        $postalcode = $_POST['postalcode'];
        $email = $_POST['email'];
        $customer = $_POST['customer'];
        $sp = $_POST['sp'];
        $status = $_POST['status'];
        $sppayment = $_POST['sppayment'];
        $pstatus = $_POST['pstatus'];
        $issue = $_POST['issue'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $ans = $this->modal->get_servicerequest_admin($serviceid, $postalcode, $email, $customer, $sp, $status, $sppayment, $pstatus, $issue, $startdate, $enddate);
        foreach ($ans as $row) {
            if ($row[`servicerequest` . 'Status'] == 0) {
                $status_text = "New";
            } else if ($row[`servicerequest` . 'Status'] == 1) {
                $status_text = "Pending";
            } else if ($row[`servicerequest` . 'Status'] == 3) {
                $status_text = "Completed";
            } else if ($row[`servicerequest` . 'Status'] == 4) {
                $status_text = "Cancelled";
            }
            if ($row['ServiceProviderId'] != null) {
                $res = $this->modal->show_rating($row['ServiceProviderId']);
                $res = $res->fetch_assoc();
            }
            $starttime = date('H:i', strtotime($row['ServiceStartDate']));
            $totalMin = $this->HourtoMinute($starttime) + ($row['SubTotal'] * 60);
            $totaltime = $this->MintoHour($totalMin);
        ?>
            <tr id='<?php echo $row['ServiceId'] ?>'>
                <td><?php echo $row['ServiceId'] ?></td>
                <td>
                    <img src="./assets/images/calendar.png" class="img-fluid calendar"><b><?php echo date("Y-m-d", strtotime($row['ServiceStartDate'])) ?></b><br>
                    <img src="./assets/images/clock.png" class="img-fluid clock"><span class="starttime"><?php echo $starttime ?></span> - <p class="total_time"><?php echo $totaltime ?></p>
                </td>
                <td class="details">
                    <p class="name"><?php echo $row['FirstName'] . " " . $row['LastName'] ?></p>
                    <div class="mydiv">
                        <img src="./assets/images/home.png" class="img-fluid home">
                        <div class="desc">
                            <span><?php echo $row['AddressLine1'] . " " . $row['AddressLine2'] . " " . $row['City'] . " " . $row['PostalCode'] ?></span>
                        </div>
                    </div>
                </td>
                <td>
                    <?php
                    if ($row['ServiceProviderId'] != null) {
                    ?>
                        <div class="rating" id="<?php echo $row['ServiceProviderId'] ?>">
                            <img src="./assets/images/avatar-<?php echo $res['UserProfilePicture'] == null ? 'hat' : $res['UserProfilePicture'] ?>.png" class="img-fluid cap" />
                            <div class="star">
                                <p><?php echo $res['FirstName'] . " " . $res['LastName'] ?></p>
                                <div class="rateYo readOnly_data" data-rateyo-rating="<?php echo $res['Ratings'] == null ? 0 : $res['Ratings'] ?>"></div>
                                <span class="result"><?php echo $res['Ratings'] == null ? 0 : $res['Ratings'] ?></span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </td>
                <td><?php echo $row['TotalCost'] . " €" ?></td>
                <td><?php echo $row['TotalCost'] . " €" ?></td>
                <td>0.00 €</td>
                <td><span class="status <?php echo $status_text ?> "><?php echo $status_text ?></span></td>
                <td><span class="status <?php echo $row[`servicerequest` . 'Status'] == 3 ? 'Completed' : 'Cancelled' ?>"><?php echo $row[`servicerequest` . 'Status'] == 3 ? 'Settled' : 'Not Applicable' ?></span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn menu dropdown-toggle" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./assets/images/menu.png">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="drop1">
                            <?php
                            if ($row[`servicerequest` . 'Status'] != 3) {
                            ?>
                                <li><a class="dropdown-item" onclick="open_edit_sr(<?php echo $row['ServiceId'] ?>)">Edit & Reschedule</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cancle_request" data-bs-dismiss="modal" onclick="cancle_request('<?php echo $row['ServiceId'] ?>')">Cancle SR by Cust</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a class="dropdown-item" onclick="refun_modal('<?php echo $row['ServiceId'] ?>')">Refund</a></li>
                            <?php
                            }
                            ?>
                            <li><a class="dropdown-item" href="#">Inquiry</a></li>
                            <li><a class="dropdown-item" href="#">History Log</a></li>
                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                            <li><a class="dropdown-item" href="#">Other Transactions</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php
        }
    }
    function changeSR_admin()
    {
        $serviceid = $_POST['serviceid'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $street = $_POST['street'];
        $house_no = $_POST['house_no'];
        $city = $_POST['city'];
        $postalcode = $_POST['postalcode'];
        $spid = $_POST['spid'];
        $userid = $_POST['userid'];
        $datetime = date("Y-m-d H:i:s", strtotime($date . " " . $time));
        $sub = "Reschedule Service Request";
        $msg = "Service Request " . $serviceid . " has been rescheduled by Admin. New date and time are " . $datetime . " and Address : " . $street . " " . $house_no . " " . $city . " " . $postalcode;
        $ans = $this->modal->reschedule_date_time($serviceid);
        $row = $ans->fetch_assoc();
        if ($spid != null) {
            $starttime = date('H:i', strtotime($time));
            $totalMin = $this->HourtoMinute($starttime) + ($row['SubTotal'] * 60);
            $totaltime = $this->MintoHour($totalMin);
            $ans2 = $this->modal->check_sp_available_modal($row['ServiceProviderId'], $date, $serviceid);
            $res = $this->check_sp_available($ans2, $starttime, $totaltime);
            if (!empty($res)) {
                echo ("Another service request has been assigned to the service provider on " . $date . " from " . $res['ServiceStarttime'] . " to " . $res['ServiceEndtime'] . ". Either choose another date or pick up a different time slot.");
            } else {
                $this->modal->change_sr_admin($serviceid, $datetime, $street, $house_no, $city, $postalcode, $userid, 1);
                $this->send_mail_to_favorite_Sp($spid, $sub, $msg);
                $this->send_mail_to_favorite_Sp($row['UserId'], $sub, $msg);
                echo "1";
            }
        } else {
            $this->modal->change_sr_admin($serviceid, $datetime, $street, $house_no, $city, $postalcode, $userid, 0);
            $this->send_mail_to_favorite_Sp($row['UserId'], $sub, $msg);
            echo "1";
        }
    }
    function get_filter_SelectOption()
    {
        $typeid1 = $_POST['typeid1'];
        $typeid2 = $_POST['typeid2'];
        $ans = $this->modal->get_filter_option($typeid1, $typeid2);
        foreach ($ans as $row) {
        ?>
            <option value="<?php echo $row['FirstName'] . ' ' . $row['LastName'] ?>"><?php echo $row['FirstName'] . ' ' . $row['LastName'] ?></option>
        <?php
        }
    }
    function get_userManagement_admin()
    {
        $postalcode = $_POST['postalcode'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $usertype = $_POST['usertype'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $ans = $this->modal->get_userManagement_admin($postalcode, $email, $username, $usertype, $startdate, $enddate);
        foreach ($ans as $row) {
        ?>
            <tr>
                <td><?php echo $row['FirstName'] . " " . $row['LastName'] ?></td>
                <td></td>
                <td>
                    <img src="./assets/images/calendar.png" />
                    <b><?php echo date("d/m/Y", strtotime($row['CreatedDate'])) ?></b>
                </td>
                <td><?php echo $row['UserTypeId'] == 1 ? 'Customer' : 'Service provider' ?></td>
                <td><?php echo $row['Mobile'] ?></td>
                <td><?php echo $row['ZipCode'] ?></td>
                <td><span class="status <?php echo $row['IsActive'] == 1 ? 'Active' : 'Inactive' ?>"><?php echo $row['IsActive'] == 1 ? 'Active' : 'Inactive' ?></span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn menu dropdown-toggle" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./assets/images/menu.png">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="drop1">
                            <li><a class="dropdown-item" onclick="change_userstatus(<?php echo $row['UserId'] . ',' . $row['IsActive'] ?>)"><?php echo $row['IsActive'] == 1 ? 'Inactive' : 'Active' ?></a></li>
                            <?php
                            if ($row['UserTypeId'] == 2 && $row['IsApproved'] == 0) {
                            ?>
                                <li><a class="dropdown-item" onclick="approved_sp(<?php echo $row['UserId'] ?>)">Approved</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </td>
            </tr>
<?php
        }
    }
    function change_userStatus()
    {
        $userid = $_POST['userid'];
        $status = $_POST['status'];
        $ans = $this->modal->get_user_data($userid);
        $res = $ans->fetch_assoc();
        if ($status == 1) {
            $status = 0;
            $this->send_email($res['Email'], "Active Account", 'Please Click Link to Active account: <a href="http://localhost/HelperLand/?controller=Home&&function=index&token=' . $res['Token'] . ':' . $userid . '">Click Here</a>');
        } else {
            $status = 1;
        }
        $this->modal->change_userStatus($userid, $status);
    }
    function approved_sp()
    {
        $userid = $_POST['userid'];
        $this->modal->approved_sp($userid);
    }
    function refund_amount()
    {
        $serviceid = $_POST['serviceid'];
        $amount = $_POST['refundAmount'];
        $this->modal->refund_to_customer($serviceid, $amount);
        $ans = $this->modal->check_request_accept_or_not($serviceid);
        $row = $ans->fetch_assoc();
        $this->send_mail_to_favorite_Sp($row['UserId'], "Refund Amount", "Amount " . $amount . " refunded for service " . $serviceid);
    }
}
?>
