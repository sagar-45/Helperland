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
    function insert_contactUs($table,$name,$Email,$SubjectType,$PhoneNumber,$Message,$CreateOn,$fileName,$filetmp)
    {
        move_uploaded_file($filetmp,"D:/XAMPP/htdocs/HelperLand/Files/".$fileName);
        $sql="INSERT INTO `contactus` ( `Name`,`Email`,`Subject`,`PhoneNumber`,`Message`,`CreatedOn`,`UploadFileName`) VALUES ('$name','$Email','$SubjectType','$PhoneNumber','$Message','$CreateOn','$fileName')";
        mysqli_query($this->conn,$sql);
        
    }
}
?>
