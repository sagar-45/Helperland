// Helperland page start
const toTop=document.querySelector('.up-arrow');
window.addEventListener('scroll',() =>{
if(window.pageYOffset>930)
{
    toTop.classList.add("active");
}
else{
    toTop.classList.remove("active");
}
});

// FAQ page start
$(document).ready(function(){
    $("#faq .accordion .heading").click(function(){
        if($(this).find("img.img-fluid").hasClass(".down-arrow"))
        {
             let image=document.getElementsByClassName("down-arrow");
        }
    });
});
