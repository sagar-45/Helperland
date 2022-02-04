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
            return 0;
        }
        else
        {
            return 1;
        }
    }
    function select_user($details)
    {
        $email=$details['email'];
        $result=$this->checkEmail($email);
        if($result->num_rows>0)
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
    function changePassword($password)
    {
        $email=$_SESSION['forgot_password_email'];
        $sql="UPDATE `user` SET `Password`='$password' WHERE `Email`='$email'";
        mysqli_query($this->conn,$sql);
    }
}
?>
