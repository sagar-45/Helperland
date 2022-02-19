function book_extra_service1()
{
    var parent=document.querySelector(".service-1");
    if(!parent.classList.contains("active"))
    {
        addActiveclass(parent);
        document.querySelector(".service-1_card").classList.add("active");
        document.querySelector(".service-1_card").style.display='block';
    }
    else
    {
        removeActiveclass(parent);
        document.querySelector(".service-1_card").classList.remove("active");
        document.querySelector(".service-1_card").style.display='none';
    }
    total_time();
    check_time();
}
function book_extra_service2()
{
    var parent=document.querySelector(".service-2");
    if(!parent.classList.contains("active"))
    {
        addActiveclass(parent);
        document.querySelector(".service-2_card").classList.add("active");
        document.querySelector(".service-2_card").style.display='block';
    }
    else
    {
        removeActiveclass(parent);
        document.querySelector(".service-2_card").classList.remove("active");
        document.querySelector(".service-2_card").style.display='none';
    }
    total_time();
    check_time();
}
function book_extra_service3()
{
    var parent=document.querySelector(".service-3");
    if(!parent.classList.contains("active"))
    {
        addActiveclass(parent);
        document.querySelector(".service-3_card").classList.add("active");
        document.querySelector(".service-3_card").style.display='block';
    }
    else
    {
        removeActiveclass(parent);
        document.querySelector(".service-3_card").classList.remove("active");
        document.querySelector(".service-3_card").style.display='none';
    }
    total_time();
    check_time();
}
function book_extra_service4()
{
    var parent=document.querySelector(".service-4");
    if(!parent.classList.contains("active"))
    {
        addActiveclass(parent);
        document.querySelector(".service-4_card").classList.add("active");
        document.querySelector(".service-4_card").style.display='block';
    }
    else
    {
        removeActiveclass(parent);
        document.querySelector(".service-4_card").classList.remove("active");
        document.querySelector(".service-4_card").style.display='none';
    }
    total_time();
    check_time();
}
function book_extra_service5()
{
    var parent=document.querySelector(".service-5");
    if(!parent.classList.contains("active"))
    {
        addActiveclass(parent);
        document.querySelector(".service-5_card").classList.add("active");
        document.querySelector(".service-5_card").style.display='block';
    }
    else
    {
        removeActiveclass(parent);
        document.querySelector(".service-5_card").classList.remove("active");
        document.querySelector(".service-5_card").style.display='none';
    }
    total_time();
    check_time();
}
function addActiveclass(parent)
{
    parent.classList.add("active");
    parent.children['0'].style.border="3px solid #1d7a8c";
    var src_value=parent.querySelector("img").src;
    src_value=src_value.replace(".png","-green.png");
    parent.querySelector("img").src=src_value;
}
function removeActiveclass(parent)
{
    parent.classList.remove("active");
    parent.children['0'].style.border="1px solid #c8c8c8";
    var src_value=parent.querySelector("img").src;
    src_value=src_value.replace("-green.png",".png");
    parent.querySelector("img").src=src_value;
}



function getTimeValue()
{

    var time=document.querySelector("#when_need").value;
    var minute=(time.slice(3,4)==5)?"30":"00";
    document.querySelector(".time_label").innerHTML=time.slice(0,2)+":"+minute;
    check_time();
}
function selectbedroom()
{
    document.querySelector(".bed_select").innerHTML=document.querySelector(".bed").value;
}
function selectbathroom()
{
    document.querySelector(".bath_select").innerHTML=document.querySelector(".bath").value;
}
function selectHowMuchtimeHelper()
{
    var $how_much_time=parseFloat($(".how_much_time").val());
    var $extra_service_time=parseFloat(count_extra_service())/2;
    $(".basic_time").html(($how_much_time-$extra_service_time)+" Hrs");
    confirm_service_time($extra_service_time,$how_much_time);
    document.querySelector(".total_time").innerHTML=$how_much_time; 
    total_time();
    check_time();
}
function total_time()
{
    var value1=document.querySelector(".basic_time").innerHTML.split(" ")[0];
    var $extra=count_extra_service();
    var totalPrice=(parseFloat(value1)*18)+parseFloat($extra*13);
    document.querySelector(".total_time").innerHTML=(parseFloat(value1)+parseFloat($extra/2));
    document.querySelector(".total_price").innerHTML=totalPrice;
    document.querySelector(".per_price").innerHTML=totalPrice;
    document.querySelector(".e_price").innerHTML=totalPrice;
    document.querySelector(".how_much_time").value=parseFloat(value1)+parseFloat($extra/2);
}
function count_extra_service()
{
    return ($(".duration .active").length);
}
function check_time()
{
    var $total_time=$(".total_time").html();
    var $need_time=$("#when_need").val();
    var $total=(parseFloat($total_time)+(parseFloat($need_time)));
    if($total>21)
    {
        $("#schedule_plan .errors").html("Booking change not saved! Helper must be able to finish cleaning by 9pm. Please try again");
        $("#schedule_plan .continue").attr("disabled",true);
    }
    else
    {
        $("#schedule_plan .errors").html("");
        $("#schedule_plan .continue").attr("disabled",false);
    }
}
function confirm_service_time($extra_service_time,$how_much_time)
{
    if($how_much_time-$extra_service_time < 3)
    {
        $(".time_popup").click();
        var $objs=$(".duration .active");
        $objs.each(function(){
            var $fun_name="book_extra_service"+$(this).attr("class")[8];
            window[$fun_name]();
            $(".basic_time").html('3 Hrs');
            total_time();
        });
    }
    else if($how_much_time < parseFloat($(".total_time").html()))
    {
        if($extra_service_time > 0)
        {
            $(".time_popup").click();
        }
    }
}

