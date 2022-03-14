<?php
class Models
{
    function __construct()
    {
        try {
            $server = "localhost:3307";
            $db = 'helperland';
            $user = 'root';
            $password = '';
            $this->conn = new mysqli($server, $user, $password, $db);
        } catch (Exception $e) {
            die('Connection is not establish');
        }
    }
    function insert_contactUs($details)
    {
        $name = $details['name'];
        $Email = $details['Email'];
        $Subject = $details['subject'];
        $PhoneNumber = $details['PhoneNumber'];
        $Message = $details['Message'];
        $fileName = $details['fileName'];
        $filetmp = $details['filetmp'];
        $CreateOn = $details['CreateOn'];
        $CreateBy = $details['CreateBy'];
        move_uploaded_file($filetmp, "D:/XAMPP/htdocs/HelperLand/Files/" . $fileName);
        $sql = "INSERT INTO `contactus` ( `Name`,`Email`,`Subject`,`PhoneNumber`,`Message`,`CreatedOn`,`UploadFileName`,`CreatedBy`) VALUES ('$name','$Email','$Subject','$PhoneNumber','$Message','$CreateOn','$fileName','$CreateBy')";
        mysqli_query($this->conn, $sql);
    }
    function insert_user($details)
    {
        $fname = $details['fname'];
        $lname = $details['lname'];
        $email = $details['email'];
        $password = $details['password'];
        $mobile_no = $details['mobile_no'];
        $userType = $details['userType'];
        $create_date = $details['create_date'];
        $status = $details['status'];
        $isRegister = $details['isRegister'];
        $isactive = $details['isactive'];
        $token = bin2hex(random_bytes(24));
        $ans = $this->checkEmail($email);
        if ($ans->num_rows <= 0) {
            $sql = "INSERT INTO `user` (`FirstName`,`LastName`,`Email`,`Password`,`Mobile`,`UserTypeId`,`CreatedDate`,`Status`,`isRegisteredUser`,`isActive`,`Token`) VALUES ('$fname','$lname','$email','$password','$mobile_no','$userType','$create_date','$status','$isRegister','$isactive','$token')";
            mysqli_query($this->conn, $sql);
            return 1;
        } else {
            return 0;
        }
    }
    function select_user($details)
    {
        $email = $details['email'];
        $result = $this->checkEmail($email);
        if ($result) {
            if (isset($_SESSION['forgot_password'])) {
                return $result;
            } else {
                $password = $details['password'];
                return $this->selectUserByPassword($result, $password);
            }
        } else {
            return "User Not Found";
        }
    }
    function selectUserByPassword($result, $password)
    {
        foreach ($result as $res1) {
            if ($res1['Password'] == $password) {
                return $res1;
            }
        }
        return "UserName or Password Incorrect";
    }
    function checkEmail($email)
    {
        $sql = "SELECT * FROM `user` WHERE `Email`='$email'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    function check_link($token)
    {
        $sql = "SELECT * FROM `user` WHERE `Token`='$token'";
        return mysqli_query($this->conn, $sql);
    }
    function changePassword($token, $password)
    {
        $token_new = bin2hex(random_bytes(24));
        $sql2 = "UPDATE `user` SET `Password`='$password',`Token`='$token_new' WHERE `Token`='$token'";
        mysqli_query($this->conn, $sql2);
        return 1;
    }
    function send_mail_to_favorite_Sp($sp)
    {
        $sql5 = "SELECT `Email` FROM `user` WHERE `UserId`=$sp";
        return mysqli_query($this->conn, $sql5);
    }
    function checkPostalCode($postal_code, $userid)
    {
        $sql = "SELECT * FROM `user` WHERE `user`.`UserTypeId`=2 AND `user`.`ZipCode`='$postal_code' AND `user`.`UserId`!='$userid' AND NOT EXISTS (SELECT `TargetUserId` FROM `favoriteandblocked` WHERE `user`.`UserId`=`favoriteandblocked`.`TargetUserId` AND `favoriteandblocked`.`IsBlocked`=1 AND `favoriteandblocked`.`UserId`=$userid) AND NOT EXISTS (SELECT `UserId` FROM `favoriteandblocked` WHERE `user`.`UserId`=`favoriteandblocked`.`UserId` AND `favoriteandblocked`.`IsBlocked`=1 AND `favoriteandblocked`.`TargetUserId`=$userid) ";
        return mysqli_query($this->conn, $sql);
    }
    function storeAddress($details)
    {
        $addressline1 = $details['addressline1'];
        $addressline2 = $details['addressline2'];
        $city = $details['city'];
        $postalCode = $details['postalCode'];
        $mobile = $details['mobile'];
        $isDeleted = $details['IsDeleted'];
        $userid = $details['UserId'];
        $email = $details['email'];
        $sql = "INSERT INTO `useraddress` (`UserId`,`AddressLine1`,`AddressLine2`,`City`,`PostalCode`,`IsDeleted`,`Mobile`,`Email`) VALUES ('$userid','$addressline1','$addressline2','$city','$postalCode',$isDeleted,'$mobile','$email')";
        mysqli_query($this->conn, $sql);
    }
    function getAddress($userid)
    {
        $sql = "SELECT * FROM `useraddress` WHERE `UserId`= '$userid' and `IsDeleted`=0";
        return mysqli_query($this->conn, $sql);
    }
    function booking_service_modal($details)
    {
        $userId = $details['userId'];
        $serviceStartDate = date('Y-m-d H:i:s', strtotime(str_replace("/", ".", $details['serviceStartDate'])));
        $postalCode = $details['postalCode'];
        $serviceHourlyrate = $details['serviceHourlyrate'];
        $serviceHours = $details['serviceHours'];
        $extraHours = $details['extraHours'];
        $addressline1 = $details['addressline1'];
        $addressline2 = $details['addressline2'];
        $city = $details['city'];
        $service_mobile = $details['service_mobile'];
        $comments = $details['comments'];
        $haspets = $details['haspets'];
        $subtotal = $details['subtotal'];
        $discount = $details['discount'];
        $totalcost = $details['totalcost'];
        $paymentDue = $details['paymentDue'];
        $paymentDone = $details['paymentDone'];
        $status = $details['status'];
        $email = $details['Email'];
        $createDate = $details['createDate'];
        $serviceid = $details['Serviceid'];
        $sql = "INSERT INTO `servicerequest`(`UserId`,`ServiceId`,`ServiceStartDate`,`ZipCode`,`ServiceHourlyRate`,`ServiceHours`,`ExtraHours`,`SubTotal`,`Discount`,`TotalCost`,`Comments`,`PaymentDue`,`HasPets`,`CreatedDate`,`PaymentDone`,`Status`) VALUES ('$userId','$serviceid','$serviceStartDate','$postalCode','$serviceHourlyrate','$serviceHours','$extraHours','$subtotal','$discount','$totalcost','$comments',$paymentDue,$haspets,'$createDate',$paymentDone,'$status')";
        mysqli_query($this->conn, $sql);
        $serviceRequestId = mysqli_insert_id($this->conn);

        $sql2 = "INSERT INTO `servicerequestaddress` (`ServiceRequestId`,`AddressLine1`,`AddressLine2`,`City`,`PostalCode`,`Mobile`,`Email`) VALUES ('$serviceRequestId','$addressline1','$addressline2','$city','$postalCode','$service_mobile','$email')";
        mysqli_query($this->conn, $sql2);

        if (array_key_exists("extra_services", $details)) {
            $extra_services = $details['extra_services'];
            foreach ($extra_services as $service) {
                $sql3 = "INSERT INTO `servicerequestextra` (`ServiceRequestId`,`ServiceExtraId`) VALUES ('$serviceRequestId','$service')";
                mysqli_query($this->conn, $sql3);
            }
        }
        return $serviceRequestId;
    }
    function insert_favoriteSp($favourite_sp, $userId)
    {
        $sql = "INSERT INTO `favoriteandblocked` (`UserId`,`TargetUserId`,`IsFavorite`) VALUES ('$userId','$favourite_sp',1)";
        mysqli_query($this->conn, $sql);
    }
    // get customer dashboard table data
    function customer_dashboard_tableData_modal($user, $status1, $status2)
    {
        $sql = "SELECT * FROM `servicerequest` WHERE `UserId`='$user' and `Status` IN ($status1,$status2)";
        $ans = mysqli_query($this->conn, $sql);
        return $ans;
    }
    function requestData($serviceid)
    {
        $sql = "SELECT * FROM `servicerequest` LEFT JOIN `servicerequestaddress` ON 
        `servicerequest`.`ServiceRequestId`=`servicerequestaddress`.`ServiceRequestId` 
        LEFT JOIN `servicerequestextra` ON
        `servicerequest`.`ServiceRequestId`=`servicerequestextra`.`ServiceRequestId` LEFT JOIN `user` ON `servicerequest`.`UserId`=`user`.`UserId`
        WHERE `servicerequest`.`ServiceId`='$serviceid'";
        $ans = mysqli_query($this->conn, $sql);
        return $ans;
    }
    function reschedule_date_time($serviceid)
    {
        $sql = "SELECT * FROM `servicerequest` WHERE `ServiceId`='$serviceid'";
        return mysqli_query($this->conn, $sql);
    }
    function reschedule_request($serviceid, $date, $userid)
    {
        $date = date('Y-m-d H:i:s', strtotime($date));
        $sql = "UPDATE `servicerequest` SET `ModifiedDate`='$date',`ServiceStartDate`='$date',`ModifiedBy`='$userid' WHERE `ServiceId`='$serviceid'";
        mysqli_query($this->conn, $sql);
    }
    function cancle_request($serviceid, $userid, $reason)
    {
        $sql = "UPDATE `servicerequest` SET `Status`=4 WHERE `ServiceId`='$serviceid'";
        mysqli_query($this->conn, $sql);
        $sql2 = "SELECT * FROM `servicerequest` WHERE `ServiceId`='$serviceid' ";
        return mysqli_query($this->conn, $sql2);
    }
    function show_rating($spid)
    {
        $sql = "SELECT `user`.`FirstName`,`user`.`LastName`,`user`.`UserProfilePicture`,ROUND(AVG(`rating`.`OnTimeArrival`),2) as OnTimeArrival,ROUND(AVG(`rating`.`Friendly`),2) as Friendly,ROUND(AVG(`rating`.`QualityOfService`),2) as QualityOfService,ROUND(AVG(`rating`.`Ratings`),2) as Ratings FROM `user` LEFT JOIN `rating` ON `user`.`UserId`=`rating`.`RatingTo` WHERE `RatingTo`=$spid";
        return mysqli_query($this->conn, $sql);
    }
    function give_rating_sp($userid, $spid, $serviceRequestId, $comments, $on_arrival, $friendly, $qos, $date)
    {
        $rating = ($on_arrival + $friendly + $qos) / 3;
        $sql = "SELECT * FROM `rating` WHERE `ServiceRequestId`='$serviceRequestId'";
        $ans = mysqli_query($this->conn, $sql);
        if ($ans->num_rows > 0) {
            $sql2 = "UPDATE `rating` SET `Ratings`='$rating',`Comments`='$comments',`RatingDate`='$date',`OnTimeArrival`='$on_arrival',`Friendly`='$friendly',`QualityOfService`='$qos' WHERE `ServiceRequestId`='$serviceRequestId'";
            mysqli_query($this->conn, $sql2);
        } else {
            $sql2 = "INSERT INTO `rating`(`ServiceRequestId`,`RatingFrom`,`RatingTo`,`Ratings`,`Comments`,`RatingDate`,`OnTimeArrival`,`Friendly`,`QualityOfService`) VALUES ('$serviceRequestId','$userid','$spid','$rating','$comments','$date','$on_arrival','$friendly','$qos')";
            mysqli_query($this->conn, $sql2);
        }
    }
    function get_user_data($userid)
    {
        $sql = "SELECT * FROM `user` WHERE `UserId`='$userid'";
        return mysqli_query($this->conn, $sql);
    }
    function change_my_profile_data($userid, $firstName, $lastName, $email, $mobile, $dob)
    {
        $dob = date("Y-m-d", strtotime($dob));
        $sql = "UPDATE `user` SET `FirstName`='$firstName',`LastName`='$lastName',`Email`='$email',`Mobile`='$mobile',`DateOfBirth`='$dob' WHERE `UserId`=$userid";
        mysqli_query($this->conn, $sql);
    }
    function get_my_address($userid)
    {
        $sql = "SELECT * FROM `useraddress` WHERE `UserId`= '$userid'";
        return (mysqli_query($this->conn, $sql));
    }
    function change_addresses($addressid, $streetname, $houseNumber, $postalCode, $city, $mobile)
    {
        $sql = "UPDATE `useraddress` SET `AddressLine1`='$streetname',`AddressLine2`='$houseNumber',`PostalCode`='$postalCode',`City`='$city',`Mobile`='$mobile' WHERE `AddressId`='$addressid'";
        if (mysqli_query($this->conn, $sql)) {
            return 1;
        }
        return 0;
    }
    function delete_address($addressid)
    {
        $sql = "UPDATE `useraddress` SET `IsDeleted`=1 WHERE `AddressId`=$addressid";
        if (mysqli_query($this->conn, $sql)) {
            return 1;
        }
        return 0;
    }
    function change_password($userid, $old_pass, $new_pass)
    {
        $sql = "SELECT * FROM `user` WHERE `UserId`=$userid and `Password`='$old_pass'";
        $ans = mysqli_query($this->conn, $sql);
        if ($ans->num_rows > 0) {
            $row = $ans->fetch_assoc();
            $this->changePassword($row['Email'], $new_pass);
            return 1;
        } else {
            return 0;
        }
    }
    /* service provider pages */
    function get_data_of_requests_modal($status, $haspets, $distance, $userid)
    {
        $sql = "SELECT * FROM `servicerequest` LEFT JOIN `user` ON `servicerequest`.`UserId`=`user`.`UserId` LEFT JOIN `servicerequestaddress` ON `servicerequest`.`ServiceRequestId`=`servicerequestaddress`.`ServiceRequestId` WHERE `servicerequest`.`Status`=$status AND `servicerequest`.`HasPets`=$haspets AND `servicerequest`.`Distance`<=$distance AND NOT EXISTS (SELECT `TargetUserId` FROM `favoriteandblocked` WHERE `user`.`UserId`=`favoriteandblocked`.`TargetUserId` AND `favoriteandblocked`.`IsBlocked`=1 AND `favoriteandblocked`.`UserId`=$userid) AND NOT EXISTS (SELECT `UserId` FROM `favoriteandblocked` WHERE `user`.`UserId`=`favoriteandblocked`.`UserId` AND `favoriteandblocked`.`IsBlocked`=1 AND `favoriteandblocked`.`TargetUserId`=$userid)";
        return mysqli_query($this->conn, $sql);
    }
    function check_sp_available_modal($userid, $date, $serviceid)
    {
        $sql = "SELECT * FROM `servicerequest` WHERE `ServiceProviderId`='$userid' AND `Status`=1 AND DATE(`ServiceStartDate`)='$date' AND `ServiceId`!=$serviceid";
        return mysqli_query($this->conn, $sql);
    }
    function check_request_accept_or_not($serviceid)
    {
        $sql = "SELECT * FROM `servicerequest` WHERE `ServiceId`='$serviceid'";
        return mysqli_query($this->conn, $sql);
    }
    function complete_accept_service_request($userid, $serviceid, $curr_date)
    {
        $sql = "UPDATE `servicerequest` SET `ServiceProviderId`=$userid,`SPAcceptedDate`='$curr_date',`Status`=1 WHERE `ServiceId`=$serviceid";
        mysqli_query($this->conn, $sql);
    }
    function get_data_upcoming_requests_modal($userid, $status)
    {
        $sql = "SELECT * FROM `servicerequest` LEFT JOIN `user` ON `servicerequest`.`UserId`=`user`.`UserId` LEFT JOIN `servicerequestaddress` ON `servicerequest`.`ServiceRequestId`=`servicerequestaddress`.`ServiceRequestId` WHERE `servicerequest`.`ServiceProviderId`=$userid AND `servicerequest`.`Status`=$status";
        return mysqli_query($this->conn, $sql);
    }
    function complete_service_request($serviceid)
    {
        $sql = "UPDATE `servicerequest` SET `Status`='3' WHERE `ServiceId`='$serviceid'";
        mysqli_query($this->conn, $sql);
    }
    function cancle_request_by_sp_modal($serviceid)
    {
        $sql = "UPDATE `servicerequest` SET `Status`=0,`ServiceProviderId`=null,`SPAcceptedDate`=null WHERE `ServiceId`='$serviceid'";
        mysqli_query($this->conn, $sql);
    }
    function get_all_sp($zipcode, $userid)
    {
        $sql = "SELECT * FROM `user` WHERE `ZipCode`='$zipcode' AND `UserId`<>'$userid'";
        return mysqli_query($this->conn, $sql);
    }
    function load_my_rating_modal($userid, $rating_status)
    {
        $sql = "SELECT *,`rating`.`Comments` FROM `user` LEFT JOIN `rating`  ON `rating`.`RatingFrom`=`user`.`UserId` LEFT JOIN `servicerequest` ON `rating`.`ServiceRequestId`=`servicerequest`.`ServiceRequestId` WHERE `RatingTo`=$userid ";
        if ($rating_status != 'all') {
            $sql = $sql . " AND `rating`.`Ratings` BETWEEN $rating_status-1 AND $rating_status";
        }
        return mysqli_query($this->conn, $sql);
    }
    function load_block_customer($userid)
    {
        $sql = "SELECT DISTINCT(`servicerequest`.`UserId`),`user`.`FirstName`,`user`.`LastName`,`favoriteandblocked`.`IsBlocked` FROM `servicerequest` LEFT JOIN `favoriteandblocked` ON `servicerequest`.`ServiceProviderId`=`favoriteandblocked`.`UserId` AND `servicerequest`.`UserId`=`favoriteandblocked`.`TargetUserId` LEFT JOIN `user` ON `servicerequest`.`UserId`=`user`.`UserId` WHERE `servicerequest`.`ServiceProviderId`=$userid";
        return mysqli_query($this->conn, $sql);
    }
    function block_unblock_customer_modal($custid, $spid)
    {
        $sql = "SELECT * FROM `favoriteandblocked` WHERE `UserId`=$spid AND `TargetUserId`=$custid ";
        $ans = mysqli_query($this->conn, $sql);
        if ($ans->num_rows > 0) {
            $res = $ans->fetch_assoc();
            if ($res['IsBlocked'] == 1) {
                $sql2 = "UPDATE `favoriteandblocked` SET `IsBlocked`=0 WHERE `UserId`=$spid AND `TargetUserId`=$custid";
            } else {
                $sql2 = "UPDATE `favoriteandblocked` SET `IsBlocked`=1 WHERE `UserId`=$spid AND `TargetUserId`=$custid";
            }
        } else {
            $sql2 = "INSERT INTO `favoriteandblocked` (`UserId`,`TargetUserId`,`IsFavorite`,`IsBlocked`) VALUES ($spid,$custid,0,1)";
        }
        mysqli_query($this->conn, $sql2);
    }
    function get_default_address_modal($userid)
    {
        $sql = "SELECT * FROM `useraddress` WHERE `UserId`='$userid' AND `IsDefault`=1";
        return mysqli_query($this->conn, $sql);
    }
    function set_sp_profile_data_modal($userid, $firstName, $lastName, $email, $mobile, $dob, $nationality, $gender, $avatar, $addressid, $street, $house_no, $postalCode, $city, $date)
    {
        $sql = "UPDATE `user` SET `FirstName`='$firstName',`LastName`='$lastName',`Mobile`='$mobile',`Gender`='$gender',`DateOfBirth`='$dob',`UserProfilePicture`='$avatar',`ZipCode`='$postalCode',`ModifiedDate`='$date',`ModifiedBy`='$userid',`Status`='old' WHERE `UserId`='$userid'";
        mysqli_query($this->conn, $sql);
        if ($addressid != null) {
            $sql2 = "UPDATE `useraddress` SET `AddressLine1`='$street',`AddressLine2`='$house_no',`City`='$city',`PostalCode`='$postalCode',`Mobile`='$mobile',`IsDefault`=1 WHERE `AddressId`='$addressid'";
        } else {
            $sql2 = "INSERT INTO `useraddress` (`UserId`,`AddressLine1`,`AddressLine2`,`City`,`PostalCode`,`Mobile`,`Email`,`IsDefault`) VALUES ('$userid','$street','$house_no','$city','$postalCode','$mobile','$email',1)";
        }
        mysqli_query($this->conn, $sql2);
    }
    /* service provider pages */
}
