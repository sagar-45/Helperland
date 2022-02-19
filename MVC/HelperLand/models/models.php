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
        $sql="INSERT INTO `useraddress` (`UserId`,`AddressLine1`,`AddressLine2`,`City`,`PostalCode`,`IsDeleted`,`Mobile`,`Email`) VALUES ('$userid','$addressline1','$addressline2','$city','$postalCode','$isDeleted','$mobile','$email')";
        mysqli_query($this->conn,$sql);
    }
    function getAddress($userid)
    {
        $sql="SELECT * FROM `useraddress` WHERE `UserId`= '$userid'";
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
        $serviceStartDate=$details['serviceStartDate'];
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
        $email=$details['Email'];
        $sql="INSERT INTO `servicerequest`(`UserId`,`ServiceId`,`ServiceStartDate`,`ZipCode`,`ServiceHourlyRate`,`ServiceHours`,`ExtraHours`,`SubTotal`,`Discount`,`TotalCost`,`Comments`,`PaymentDue`,`HasPets`,`CreatedDate`,`PaymentDone`) VALUES ('$userId','$userId','$serviceStartDate','$postalCode','$serviceHourlyrate','$serviceHours','$extraHours','$subtotal','$discount','$totalcost','$comments',$paymentDue,$haspets,'$serviceStartDate',$paymentDone)";
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
    function send_mail_to_favoriteSp($favourite_sp,$userId,$sub,$serviceRequestId)
    {
        foreach($favourite_sp as $sp){
            $sql="INSERT INTO `favoriteandblocked` (`UserId`,`TargetUserId`,`IsFavorite`) VALUES ('$userId','$sp',1)";
            mysqli_query($this->conn,$sql);
            $msg="A service request ".$serviceRequestId." has been directly assigned to you";
            $sql5="SELECT `Email` FROM `user` WHERE `UserId`=$sp";
            $email_sp=mysqli_query($this->conn,$sql5);
            $email_sp1=$email_sp->fetch_assoc();
            $this->send_email($email_sp1['Email'],$sub,$msg);
        }
    }
    function send_mail_to_all_Sp($postalCode,$sub,$serviceRequestId)
    {
        $msg="A service request ".$serviceRequestId." has created";
        $ans=$this->checkPostalCode($postalCode);
        $sp=json_decode($ans,true);
        $j=0;
        foreach($sp as $i)
        {
            $this->send_email($i[$j.'3'],$sub,$msg);
            $j=$j+1;
        }
    }
}
?>
