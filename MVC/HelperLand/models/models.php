<?php
class Models 
{
    function __construct()
    {
        try{
            $server="localhost:3307";
            $db='helperland';
            $user='root';
            $password='';
            $this->conn=new mysqli($server,$user,$password,$db);
        }
        catch(Exception $e){
            die('Connection is not establish');
        }
    }
    function insert_contactUs($details)
    {
        $name=$details['name'];
        $Email=$details['Email'];
        $Subject=$details['subject'];
        $PhoneNumber=$details['PhoneNumber'];
        $Message=$details['Message'];
        $fileName=$details['fileName'];
        $filetmp=$details['filetmp'];
        $CreateOn=$details['CreateOn'];
        $CreateBy=$details['CreateBy'];
        move_uploaded_file($filetmp,"D:/XAMPP/htdocs/HelperLand/Files/".$fileName);
        $sql="INSERT INTO `contactus` ( `Name`,`Email`,`Subject`,`PhoneNumber`,`Message`,`CreatedOn`,`UploadFileName`,`CreatedBy`) VALUES ('$name','$Email','$Subject','$PhoneNumber','$Message','$CreateOn','$fileName','$CreateBy')";
        mysqli_query($this->conn,$sql); 
    }
    function insert_user($details)
    {
        $fname=$details['fname'];
        $lname=$details['lname'];
        $email=$details['email'];
        $password=$details['password'];
        $mobile_no=$details['mobile_no'];
        $userType=$details['userType'];
        $create_date=$details['create_date'];
        $status=$details['status'];
        $isRegister=$details['isRegister'];
        $isactive=$details['isactive'];
        if(!$this->checkEmail($email))
        {
            $sql="INSERT INTO `user` (`FirstName`,`LastName`,`Email`,`Password`,`Mobile`,`UserTypeId`,`CreatedDate`,`Status`,`isRegisteredUser`,`isActive`) VALUES ('$fname','$lname','$email','$password','$mobile_no','$userType','$create_date','$status','$isRegister','$isactive')";
            mysqli_query($this->conn,$sql);
            return 1;
        }
        else
        {
            return 0;
        }
    }
    function select_user($details)
    {
        $email=$details['email'];
        $result=$this->checkEmail($email);
        if($result)
        {
            if(isset($_SESSION['forgot_password']))
            {
                return $result;
            }
            else
            {
                $password=$details['password'];
                return $this->selectUserByPassword($result,$password);
            }
        }
        else
        {
            return "User Not Found";
        }
    }
    function selectUserByPassword($result,$password)
    {
        foreach($result as $res1)
        {
            if($res1['Password']==$password)
            {
                return $res1;
            }
        }
        return "UserName or Password Incorrect";
    }
    function checkEmail($email)
    {
        $sql="SELECT * FROM `user` WHERE `Email`='$email'";
        $result=mysqli_query($this->conn,$sql);
        if($result->num_rows>0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    function changePassword($email,$password)
    {
        $sql="UPDATE `user` SET `Password`='$password' WHERE `Email`='$email'";
        mysqli_query($this->conn,$sql);
    }
    function send_email($email,$sub,$msg)
    {
        require_once('./PHPMailer/PHPMailerAutoload.php');
        $mail=new PHPMailer;
        $mail->SMTPDebug=0;
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth=true;
        $mail->Username='rathodsagar1362001@gmail.com';
        $mail->Password='sagar2001@';
        $mail->SMTPSecure='tls';
        $mail->Port=587;
        $mail->setFrom('rathodsagar1362001@gmail.com','HelperLand');
        $mail->addAddress($email);
        $mail->addReplyTo('rathodsagar1362001@gmail.com');
        $mail->isHTML(true);
        $mail->Subject=$sub;
        $mail->Body=$msg;
        $mail->AltBody="";
        if(!$mail->send())
        {
            return "message no sent";
        }
        else
        {
            return "message Sent";
        }
    }
    function checkPostalCode($postal_code)
    {
        $sql="SELECT * FROM `user` WHERE `ZipCode`='$postal_code'";
        $sp_number=mysqli_query($this->conn,$sql);
        $i=0;
        if($sp_number->num_rows>0)
        {
            $sp=Array();
            foreach ($sp_number as $vars)
            {
                $sp[$i]=[
                    $i."1"=>$vars['UserId'],
                    $i."2"=>$vars['FirstName']." ".$vars['LastName'],
                    $i."3"=>$vars['Email']
                ];
                $i++;
            }
            return json_encode($sp);
        }
        else
        {
            return "error";
        }
    }
    function storeAddress($details)
    {
        $addressline1=$details['addressline1'];
        $addressline2=$details['addressline2'];
        $city=$details['city'];
        $postalCode=$details['postalCode'];
        $mobile=$details['mobile'];
        $isDeleted=$details['IsDeleted'];
        $userid=$details['UserId'];
        $email=$details['email'];
        $sql="INSERT INTO `useraddress` (`UserId`,`AddressLine1`,`AddressLine2`,`City`,`PostalCode`,`IsDeleted`,`Mobile`,`Email`) VALUES ('$userid','$addressline1','$addressline2','$city','$postalCode',$isDeleted,'$mobile','$email')";
        mysqli_query($this->conn,$sql);
    }
    function getAddress($userid)
    {
        $sql="SELECT * FROM `useraddress` WHERE `UserId`= '$userid' and `IsDeleted`=0";
        $total_add_no=mysqli_query($this->conn,$sql);
        $i=0;
        if($total_add_no->num_rows > 0)
        {
            $array=Array();
            foreach ($total_add_no as $vars)
            {
                $array[$i]=[
                    $i."1"=>$vars['AddressLine1'],
                    $i."2"=>$vars['AddressLine2'],
                    $i."3"=>$vars['City'],
                    $i."4"=>$vars['PostalCode'], 
                    $i."5"=>$vars['Mobile']
                ];
                $i++;
            }
            return json_encode($array);
        }
    }
    function booking_service_modal($details)
    {
        $userId=$details['userId'];
        $serviceStartDate=date('Y-m-d H:i:s',strtotime(str_replace("/",".",$details['serviceStartDate'])));
        $postalCode=$details['postalCode'] ;
        $serviceHourlyrate=$details['serviceHourlyrate'];
        $serviceHours=$details['serviceHours'];
        $extraHours=$details['extraHours'];
        $addressline1=$details['addressline1'];
        $addressline2=$details['addressline2'];
        $city=$details['city'];
        $service_mobile=$details['service_mobile'];
        $comments=$details['comments'];
        $haspets=$details['haspets'];
        $subtotal=$details['subtotal'];
        $discount=$details['discount'];
        $totalcost=$details['totalcost'];
        $paymentDue=$details['paymentDue'];
        $paymentDone=$details['paymentDone'];
        $status=$details['status'];
        $email=$details['Email'];
        $createDate=$details['createDate'];
        $serviceid=$details['Serviceid'];
        $sql="INSERT INTO `servicerequest`(`UserId`,`ServiceId`,`ServiceStartDate`,`ZipCode`,`ServiceHourlyRate`,`ServiceHours`,`ExtraHours`,`SubTotal`,`Discount`,`TotalCost`,`Comments`,`PaymentDue`,`HasPets`,`CreatedDate`,`PaymentDone`,`Status`) VALUES ('$userId','$serviceid','$serviceStartDate','$postalCode','$serviceHourlyrate','$serviceHours','$extraHours','$subtotal','$discount','$totalcost','$comments',$paymentDue,$haspets,'$createDate',$paymentDone,'$status')";
        mysqli_query($this->conn,$sql);
        $serviceRequestId=mysqli_insert_id($this->conn);

        $sql2="INSERT INTO `servicerequestaddress` (`ServiceRequestId`,`AddressLine1`,`AddressLine2`,`City`,`PostalCode`,`Mobile`,`Email`) VALUES ('$serviceRequestId','$addressline1','$addressline2','$city','$postalCode','$service_mobile','$email')";
        mysqli_query($this->conn,$sql2);

        if(array_key_exists("extra_services",$details))
        {
            $extra_services=$details['extra_services'];
            foreach($extra_services as $service){
                $sql3="INSERT INTO `servicerequestextra` (`ServiceRequestId`,`ServiceExtraId`) VALUES ('$serviceRequestId','$service')";
                mysqli_query($this->conn,$sql3);
            }
        }
        return $serviceRequestId;
    }
    function insert_and_send_mail_to_favoriteSp($favourite_sp,$userId,$sub,$serviceRequestId)
    {
        foreach($favourite_sp as $sp){
            $sql="INSERT INTO `favoriteandblocked` (`UserId`,`TargetUserId`,`IsFavorite`) VALUES ('$userId','$sp',1)";
            mysqli_query($this->conn,$sql);
            $msg="A service request ".$serviceRequestId." has been directly assigned to you";
            $this->send_mail_to_favorite_Sp($sp,$sub,$msg);
        }
    }
    function send_mail_to_favorite_Sp($sp,$sub,$msg)
    {
        $sql5="SELECT `Email` FROM `user` WHERE `UserId`=$sp";
        $email_sp=mysqli_query($this->conn,$sql5);
        $email_sp1=$email_sp->fetch_assoc();
        $this->send_email($email_sp1['Email'],$sub,$msg);
    }
    function send_mail_to_all_Sp($postalCode,$sub,$msg)
    {
        $ans=$this->checkPostalCode($postalCode);
        $sp=json_decode($ans,true);
        $j=0;
        foreach($sp as $i)
        {
            $this->send_email($i[$j.'3'],$sub,$msg);
            $j=$j+1;
        }
    }
    // get customer dashboard table data
    function customer_dashboard_tableData_modal($user,$status1,$status2)
    {
        $sql="SELECT * FROM `servicerequest` WHERE `UserId`='$user' and `Status` IN ($status1,$status2)";
        $ans=mysqli_query($this->conn,$sql);
        return $ans;
    }
    function requestData($serviceid)
    {
        $sql="SELECT * FROM `servicerequest` LEFT JOIN `servicerequestaddress` ON 
        `servicerequest`.`ServiceRequestId`=`servicerequestaddress`.`ServiceRequestId` 
        LEFT JOIN `servicerequestextra` ON
        `servicerequest`.`ServiceRequestId`=`servicerequestextra`.`ServiceRequestId`
        WHERE `servicerequest`.`ServiceId`='$serviceid'";
        $ans=mysqli_query($this->conn,$sql);
        return $ans;
    }
    function reschedule_date_time($serviceid,$date,$userid)
    {
        $sql="SELECT * FROM `servicerequest` WHERE `ServiceId`='$serviceid'";
        $ans=mysqli_query($this->conn,$sql);
        $row=$ans->fetch_row();
        $date=str_replace('/','-',$date.":00");
        $date=date('Y-m-d H:i:s', strtotime($date));        
        if($row[14]==null)
        {
            $sql="UPDATE `servicerequest` SET `ModifiedDate`='$date',`ServiceStartDate`='$date',`ModifiedBy`='$userid' WHERE `ServiceId`='$serviceid'";
            mysqli_query($this->conn,$sql);
            $this->send_reschedule_mail($row,$date);
            return "Reschedule Request Complete";
        }
        else
        {
            $rescheduled_date=date("Y-m-d",strtotime($date));
            $new_time=date('H.i',strtotime($date));
            $total_time=$this->given_total_requred_time($row[8])+$new_time;
            $check=$this->check_sp_available_on_time($row[14],$new_time,$total_time,$rescheduled_date,$serviceid);
            if($check=='0')
            {
                $sql="UPDATE `servicerequest` SET `ModifiedDate`='$date',`ServiceStartDate`='$date',`ModifiedBy`='$userid' WHERE `ServiceId`='$serviceid'";
                mysqli_query($this->conn,$sql);
                $this->send_reschedule_mail($row,$date);
                return "Reschedule Request Complete";
            }
            return $check;
        }
    }
    function send_reschedule_mail($row,$date)
    {
        $sub="Reschedule Request";
        $msg="Service Request $row[0] has been rescheduled by customer. New date and time are $date";
        if($row[14]==null)
        {
            $this->send_mail_to_all_Sp($row[4],$sub,$msg);
        }
        else
        {
            $this->send_mail_to_favorite_Sp($row[14],$sub,$msg);
        }
    }
    function check_sp_available_on_time($id,$new_time,$total_time,$rescheduled_date,$serviceid)
    {
        $sql="SELECT * FROM `servicerequest` WHERE `ServiceProviderId`=$id and `Status` IN (0,1) and `ServiceId`<>'$serviceid'";
        $result=mysqli_query($this->conn,$sql);
        $st="";
        foreach($result as $data)
        {
            $next_date=date("Y-m-d",strtotime($data['ServiceStartDate']));
            if($rescheduled_date==$next_date)
            {
                $next_start_time=date("H.i",strtotime($data['ServiceStartDate']));
                $next_end_time=($this->given_total_requred_time($data['SubTotal'])+$next_start_time)."0";
                if($new_time < $next_start_time)
                {
                    if($total_time >= $next_start_time)
                    {
                        return ("Another service request has been assigned to the service provider on $next_date from $next_start_time to $next_end_time. Either choose another date or pick up a different time slot.");
                    }
                }
                else
                {
                    if($new_time <= $next_end_time)
                    {
                        return ("Another service request has been assigned to the service provider on $next_date from $next_start_time to $next_end_time. Either choose another date or pick up a different time slot.");
                    }
                }
            }
        }
        return 0;
    }
    function given_total_requred_time($total_need_time)
    {
        $seconds=$total_need_time*3600;
        $hours=floor($total_need_time);
        $seconds-=$hours*3600;
        $minutes=floor($seconds/60);
        $seconds-=$minutes*60;
        if($minutes==6){
            $hours=$hours+1;
            $minutes='00';
        }
        return $hours.".".$minutes;
    }
    function cancle_request($serviceid,$userid,$reason)
    {
        $sql="UPDATE `servicerequest` SET `Status`=4 WHERE `ServiceId`='$serviceid'";
        mysqli_query($this->conn,$sql);
        $sql2="SELECT * FROM `servicerequest` WHERE `ServiceId`='$serviceid' ";
        $ans=mysqli_query($this->conn,$sql2);
        $row=$ans->fetch_row();
        $sub="Cancle Service Request";
        $msg="Service Request $serviceid has been cancelled by customer";
        if($row[14]!=null)
        {
            $this->send_mail_to_favorite_Sp($row[14],$sub,$msg);
        }
    }
    // function get_pagination_details($user,$status1,$status2)
    // {
    //     $sql="SELECT * FROM `servicerequest` WHERE `UserId`=$user and `Status` IN ($status1,$status2)";
    //     return mysqli_num_rows(mysqli_query($this->conn,$sql));
    // }
    function show_rating($spid)
    {
        $sql="SELECT `user`.`FirstName`,`user`.`LastName`,ROUND(AVG(`rating`.`OnTimeArrival`),2) as OnTimeArrival,ROUND(AVG(`rating`.`Friendly`),2) as Friendly,ROUND(AVG(`rating`.`QualityOfService`),2) as QualityOfService,ROUND(AVG(`rating`.`Ratings`),2) as Ratings FROM `user` LEFT JOIN `rating` ON `user`.`UserId`=`rating`.`RatingTo` WHERE `RatingTo`=$spid";
        return mysqli_query($this->conn,$sql);
    }
    function give_rating_sp($userid,$spid,$serviceRequestId,$comments,$on_arrival,$friendly,$qos,$date)
    {
        $rating=($on_arrival+$friendly+$qos)/3;
        $sql="INSERT INTO `rating`(`ServiceRequestId`,`RatingFrom`,`RatingTo`,`Ratings`,`Comments`,`RatingDate`,`OnTimeArrival`,`Friendly`,`QualityOfService`) VALUES ('$serviceRequestId','$userid','$spid','$rating','$comments','$date','$on_arrival','$friendly','$qos')";
        mysqli_query($this->conn,$sql);
    }
    function get_user_data($userid)
    {
        $sql="SELECT * FROM `user` WHERE `UserId`='$userid'";
        return mysqli_query($this->conn,$sql);
    }
    function change_my_profile_data($userid,$firstName,$lastName,$email,$mobile,$dob)
    {
        $dob=date("Y-m-d",strtotime($dob));
        $sql="UPDATE `user` SET `FirstName`='$firstName',`LastName`='$lastName',`Email`='$email',`Mobile`='$mobile',`DateOfBirth`='$dob' WHERE `UserId`=$userid";
        mysqli_query($this->conn,$sql);
    }
    function get_my_address($userid)
    {
        $sql="SELECT * FROM `useraddress` WHERE `UserId`= '$userid' and `IsDeleted`=0";
        return (mysqli_query($this->conn,$sql));
    }
    function change_addresses($addressid,$streetname,$houseNumber,$postalCode,$city,$mobile)
    {
        $sql="UPDATE `useraddress` SET `AddressLine1`='$streetname',`AddressLine2`='$houseNumber',`PostalCode`='$postalCode',`City`='$city',`Mobile`='$mobile' WHERE `AddressId`='$addressid'";
        if(mysqli_query($this->conn,$sql))
        {
            return 1;
        }
        return 0;
    }
    function delete_address($addressid)
    {
        $sql="UPDATE `useraddress` SET `IsDeleted`=1 WHERE `AddressId`=$addressid";
        if(mysqli_query($this->conn,$sql))
        {
            return 1;
        }
        return 0;
    }
    function change_password($userid,$old_pass,$new_pass)
    {
        $sql="SELECT * FROM `user` WHERE `UserId`=$userid and `Password`='$old_pass'";
        $ans=mysqli_query($this->conn,$sql);
        if($ans->num_rows > 0)
        {
            $row=$ans->fetch_assoc();
            $this->changePassword($row['Email'],$new_pass);
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
?>
