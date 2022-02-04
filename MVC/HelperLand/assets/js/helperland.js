// Helperland page start
const email_input=document.querySelector('.email_input');
function outsideemail()
{
    let value=email_input.value;
    if(value==0)
    {
        document.querySelector(".email_error").innerHTML='Please enter email id';
        document.querySelector(".email_error").style.display='block';
    }
    else
    {
        document.querySelector(".email_error").style.display='none';
    }
}
const password_input=document.querySelector('.password_input');
function outsidepassword()
{
    let value=password_input.value;
    if(value==0)
    {
        document.querySelector(".password_error").innerHTML='Please Enter Password';
        document.querySelector(".password_error").style.display='block';
    }
    else
    {
        document.querySelector(".password_error").style.display='none';
    }
}
const login_button=document.querySelector('.login-modal');
function login_module()
{   
    login_button.disabled=false;
    if(email_input.value.length>0 && password_input.value.length>0)
    {
        login_button.disabled=false;
    }
    else if(email_input.value.length==0 || password_input.value.length==0)
    {
        outsideemail();
        outsidepassword();
        login_button.disabled=true;
    }
}
const forgot_email=document.querySelector('.forgot_email_input');
function forgotemail()
{
    let value=forgot_email.value;
    if(value==0)
    {
        document.querySelector(".email_error1").style.display='block';
        document.querySelector(".email_error1").innerHTML='Please Enter Email id';
    }
    else
    {
        document.querySelector(".email_error1").style.display='none';
    }
}
const CsignUp_fname=document.querySelector(".cfname");
function validate_fname()
{
    let value=CsignUp_fname.value;
    if(value==0)
    {
        document.querySelector(".error1").style.display='block';
        document.querySelector(".error1").innerHTML='Please Enter First Name';
    }
    else
    {
        document.querySelector(".error1").style.display='none';
    }
}
const CsignUp_lname=document.querySelector(".clname");
function validate_lname()
{
    let value=CsignUp_lname.value;
    if(value==0)
    {
        document.querySelector(".error2").style.display='block';
        document.querySelector(".error2").innerHTML='Please Enter Last Name';
    }
    else
    {
        document.querySelector(".error2").style.display='none';
    }
}
const cemail=document.querySelector('.cemail');
function validate_cemail()
{
    let value=cemail.value;
    if(value==0)
    {
        document.querySelector(".error3").style.display='block';
        document.querySelector(".error3").innerHTML='Please Enter Email id';
    }
    else
    {
        document.querySelector(".error3").style.display='none';
    }
}
const cnumber=document.querySelector(".cnumber");
function validate_cnumber()
{
    let value=cnumber.value;
    if(value==0)
    {
        document.querySelector(".error4").style.display='block';
        document.querySelector(".error4").innerHTML='Please Enter Mobile Number';
    }
    else if(value.toString().length!=10)
    {
        document.querySelector(".error4").style.display='block';
        document.querySelector(".error4").innerHTML='Please Enter 10 digits Mobile Number';   
    }
    else
    {
        document.querySelector(".error4").style.display='none';
    }
}
const cpassword=document.querySelector(".cpassword");
function validate_cpassword()
{
    let value=cpassword.value;
    if(value==0)
    {
        document.querySelector(".error5").style.display='block';
        document.querySelector(".error5").innerHTML='Please Enter Password';
    }
    else
    {
        document.querySelector(".error5").style.display='none';
    }
}
const ccpassword=document.querySelector(".ccpassword");
function validate_ccpassword()
{
    let value=ccpassword.value;
    if(value==0)
    {
        document.querySelector(".error6").style.display='block';
        document.querySelector(".error6").innerHTML='Please Enter Confirm Password';
    }
    else
    {
        document.querySelector(".error6").style.display='none';
    }
}


const toTop=document.querySelector('.up-arrow');
const navbar=document.querySelector(".nav-light");
const logo=document.querySelector(".logo");
const dark_link=document.querySelectorAll(".dark");
window.addEventListener('scroll',() =>{
if(window.pageYOffset>1)
{
    navbar.style.backgroundColor="#525252";
    logo.style.height="54px";
    dark_link[0].style.backgroundColor="#006072";
    dark_link[1].style.backgroundColor="#006072";
    dark_link[2].style.backgroundColor="#006072";
}
else
{
    navbar.style.backgroundColor="transparent";
    logo.style.height="100%";
    dark_link[0].style.backgroundColor="transparent";
    dark_link[1].style.backgroundColor="transparent";
    dark_link[2].style.backgroundColor="transparent";
}
if(window.pageYOffset>200)
{
    toTop.classList.add("active");
}
else{
    toTop.classList.remove("active");
}
});