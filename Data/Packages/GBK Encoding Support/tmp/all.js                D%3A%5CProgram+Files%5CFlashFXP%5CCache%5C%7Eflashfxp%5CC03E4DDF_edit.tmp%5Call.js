$(function () {
    $(".nav li").last().css({ "border": "none" });
    $(".home-List li:even").css({ "margin-right": "10.15625%" });
    $(".ListMain ul.Cont li:even").css({ "margin-right": "5%" });
    var flag = 0;
    $(".ListMain .click").click(function () {
        
        $.post("../ajax/webAjax.ashx", { selectFlag: "ticket", voteid: $(this).attr("id"), yema: 'Request.QueryString["p"]' }, function (data) {
           
            if (data == "9" || data == "0") {
                //window.location.reload();
                alert("锟斤拷锟斤拷一直锟斤拷一锟斤拷锟斤拷品锟斤拷锟斤拷投票");

            } else {

                var defulatValue = parseInt($("#" + data).parent().find("span.number i").html());
                //alert(defulatValue);
                $("#" + data).parent().find("span.number i").html(++defulatValue);


            }

        });




    });
    $(".ListMain .btn a").click(function () {
        $(".ListMain .btn a").removeClass("curr");
        $(this).addClass("curr");
    });
    $(".ListCMain .Tick a.tou").click(function () {

        $.post("../ajax/webAjax.ashx", { selectFlag: "ticket1", voteid: $(this).attr("id") }, function (data) {
            if (data == "9" || data == "0") {
                //window.location.reload();
                alert("锟斤拷锟斤拷一直锟斤拷一锟斤拷锟斤拷品锟斤拷锟斤拷投票");

            } else {
                var defulatNumber = parseInt($(".ListCMain .Tick .number i").html());
                $(".ListCMain .Tick .number i").html(++defulatNumber);




            }

        });
       



    });
    $(".ListCMain .msg .foot a.Id").click(function () {
        return false;
    });
   // if($(window).width() > 360){
   //     location.href="http://xjh.webthink.cc";
   // }
});
//Javscript Document
window.onload = init;
function init(){

}