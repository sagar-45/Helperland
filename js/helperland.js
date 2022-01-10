// Helperland page start

const toTop=document.querySelector('.up-arrow');
const navbar=document.querySelector(".navbar");
const logo=document.querySelector(".logo");
window.addEventListener('scroll',() =>{
if(window.pageYOffset>1)
{
    navbar.style.backgroundColor="#525252";
    logo.style.height="54px"
}
else
{
    navbar.style.backgroundColor="transparent";
    logo.style.height="100%";
}
if(window.pageYOffset>200)
{
    toTop.classList.add("active");
}
else{
    toTop.classList.remove("active");
}
});

