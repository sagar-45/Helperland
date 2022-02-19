// Helperland page start

const toTop=document.querySelector('.up-arrow');
const navbar=document.querySelector(".navbar");
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

