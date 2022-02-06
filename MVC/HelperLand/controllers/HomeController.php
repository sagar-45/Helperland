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
        $function='home';
        include('./views/index.php');
    }
    function about()
    {
        $function='about';
        include('./views/about.php');
    }
    function Customer_signUp()
    {
        $function='Customer_signUp';
        include('./views/Customer_signUp.php');
    }
    function faq()
    {
        $function='FAQ';
        include('./views/faq.php') ;
    }
    function prices()
    {
        $function='price';
        include('./views/prices.php');
    }
    function contact()
    {
        $function='contact';
        include('./views/contact.php');
    }
    function service()
    {
        $function='service-pro';
        include('./views/service.php');
    }
    function customer_service_history()
    {
        $function='serviceH';
        include('./views/c_service_history.php');
    }
    function sp_newService()
    {
        $function='sp_new';
        include('./views/sp_newService.php');
    }
    function logout()
    {
        $base_url="http://localhost/HelperLand/";
        session_unset();
        session_destroy();
        header('Location:' .$base_url."?controller=Home&&function=index");   
    }
    function resetPassword()
    {
        $function='resetPassword';
        $_SESSION['forgot_email']=$_GET['email'];
        include('./views/resetPassword.php');
    }
    function forgotPassword()
    {
        $base_url="http://localhost/HelperLand/";
        if(isset($_POST))
        {
            $_SESSION['forgot_password']=1;
            $email=$_POST['email'];
            $check=$this->modal->checkEmail($email);
            if($check!="User Not Found")
            {
                $this->reset_password($email);
            }
            else
            {
                $_SESSION['forgot_password_error']="Please Enter Valid Email Id";
            }
            unset($_SESSION['forgot_password']);
            header('Location:' .$base_url."?controller=Home&&function=index");
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
        $base_url="http://localhost/HelperLand/";
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
            if($result==1)
            {
                $_SESSION['email_exist']=1;
                header('Location:' .$base_url."?controller=Home&&function=Customer_signUp"); 
            }
            else
            {
                $_SESSION['register']=1;
                header('Location:' .$base_url."?controller=Home&&function=index");
            }
        }
        else
        {
            echo 'Error Occured Try Again';
        }
    }
    function login()
    {
        $base_url="http://localhost/HelperLand/";
        if(isset($_POST))
        {
            $details=[
            'email'=>$_POST['email'],
            'password'=>$_POST['password']
            ];
            $message=$this->modal->select_user($details);
            $this->createSession($message,$base_url);
        }
    }
    function sp_signUp()
    {
        $base_url="http://localhost/HelperLand/";
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
            if($result==1)
            {
                $_SESSION['email_exist']=1;
                header('Location:' .$base_url."?controller=Home&&function=service"); 
            }
            else
            {
                $_SESSION['register']=1;
                header('Location:' .$base_url."?controller=Home&&function=index");
            }
        }
        else
        {
            echo 'Error Occured Try Again';
        }
    }
    function createSession($message,$base_url)
    {
        if($message!="UserName or Password Incorrect" && $message!="User Not Found")
        {
            $_SESSION['userId']=$message['UserId'];
            $_SESSION['UserName']=$message['FirstName']." ".$message['LastName'];
            $_SESSION['email']=$message['Email'];
            $_SESSION['password']=$message['Password'];
            $_SESSION['Mobile']=$message['Mobile'];
            $_SESSION['UserTypeId']=$message['UserTypeId'];
            if($_SESSION['UserTypeId']==1)
            {
                header('Location:' .$base_url."?controller=Home&&function=customer_service_history");
            }
            else
            {
                header('Location:' .$base_url."?controller=Home&&function=sp_newService");
            }
        }
        else
        {
            $_SESSION['error']=$message;
            header('Location:' .$base_url."?controller=Home&&function=index");
        }
    }
    function reset_password($email)
    {
        require_once('./PHPMailer/PHPMailerAutoload.php');
        $mail=new PHPMailer;
        $mail->SMTPDebug=0;
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth=true;
        $mail->Username='helperland123@gmail.com';
        $mail->Password='helperland@123';
        $mail->SMTPSecure='tls';
        $mail->Port=587;
        $mail->setFrom('helperland123@gmail.com','HelperLand');
        $mail->addAddress($email);
        $mail->addReplyTo('helperland123@gmail.com');
        $mail->isHTML(true);
        $mail->Subject="Password Change";
        $mail->Body="This is link to Reset Password:<a href='http://localhost/HelperLand/?controller=Home&&function=resetPassword&email=$email'>http://localhost/HelperLand/?controller=Home&&function=resetPassword</a>";
        $mail->AltBody="";
        if(!$mail->send())
        {
            return "message no sent";
        }
        else
        {
            $_SESSION['forgot_password_email']=$email;
            return "message Sent";
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
}
?>
