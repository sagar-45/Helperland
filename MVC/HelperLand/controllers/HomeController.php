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
    function book_service()
    {
        $function='bookS';
        include('./views/book_service.php');
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
            $_SESSION['UserName']=$message['FirstName']." ".$message['LastName'];
            $_SESSION['email']=$message['Email'];
            $_SESSION['password']=$message['Password'];
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
            "serviceStartDate"=>date("Y-m-d"),
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
            "Email"=>$_SESSION['email']
        ];
        $sub="New Service Request";
        if(!empty($_POST['extra_services']))
        {
            $details['extra_services']=$_POST['extra_services'];
        }
        $ans=$this->modal->booking_service_modal($details);
        if(!empty($_POST['favourite_sp']))
        {
            $this->modal->send_mail_to_favoriteSp($_POST['favourite_sp'],$_SESSION['userId'],$sub,$ans);
        }
        if(empty($_POST['favourite_sp']))
        {
            $this->modal->send_mail_to_all_Sp($_POST['postalCode'],$sub,$ans);
        }
        echo $ans;
    }
}
?>
