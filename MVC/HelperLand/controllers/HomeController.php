<?php
class HomeController
{
    function __construct()
    {
        include('./models/models.php');
        $this->modal=new Models();
    }
    function index()
    {
        $base_url="http://localhost/HelperLand/";
        include('./views/index.php');
    }
    function about()
    {
        $base_url='http://localhost/HelperLand/';
        $function='about';
        include('./views/about.php');
    }
    function Customer_signUp()
    {
        $base_url='http://localhost/HelperLand/';
        $function='Customer_signUp';
        include('./views/Customer_signUp.php');
    }
    function faq()
    {
        $base_url="http://localhost/HelperLand/";
        $function='FAQ';
        include('./views/faq.php') ;
    }
    function prices()
    {
        $base_url="http://localhost/HelperLand/";
        $function='price';
        include('./views/prices.php');
    }
    function contact()
        {
            $base_url="http://localhost/HelperLand/";
            $function='contact';
            include('./views/contact.php');
        }
        function getTouchwithUs()
        {
            $base_url="http://localhost/HelperLand/";
            if(isset($_POST))
            {
                $name=$_POST['fname'].$_POST['lname'];
                $Email=$_POST['email-add'];
                $Subject=$_POST['subject'];
                $PhoneNumber=$_POST['mbno'];
                $Message=$_POST['message'];
                $fileName=$_FILES['i1']['name'];
                $filetmp=$_FILES['i1']['tmp_name'];
                $CreateOn=date("Y-m-d H:i:a");
                $this->modal->insert_contactUs('contactus',$name,$Email,$Subject,$PhoneNumber,$Message,$CreateOn,$fileName,$filetmp);
                header('Location:' .$base_url."?controller=Home&&function=index");
            }
            else 
            {
                echo 'Error Occured Try Again';
            }
        }
}
?>