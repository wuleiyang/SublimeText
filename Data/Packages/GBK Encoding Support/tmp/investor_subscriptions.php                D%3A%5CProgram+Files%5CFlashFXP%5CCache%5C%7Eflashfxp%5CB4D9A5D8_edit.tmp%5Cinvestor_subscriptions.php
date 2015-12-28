<?php include "inc/init.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>投资</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico" />
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="scripts/jquery.js"></script>
    <script language="javascript" src="scripts/public.js"></script>
</head>

<body>

<!--top-->
<div id="head">
    <script language="javascript">
        include('top.html','head');
    </script>
</div>
<!--end-->

<div class="Shadow"></div>

<!--content-->
<div class="main main_">
<div class="content">
<div class="Login"><div class="Login_left"></div><div class="robinren_"><?php include "include/head_login.php"; ?></div></div>
<div class="heart">
<div class="Exchange">
    <ul>
        <?php getleft(); ?>
        <?php

        $pk =trim($_REQUEST["pk"])==""|| !is_numeric($_REQUEST["pk"])?"1":trim($_REQUEST["pk"]);
        if($pk==1)
        {
            
            $menustr = "<li class='over'><label></label><a href='investor_subscriptions.php?mp=2&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='investor_subscriptions.php?mp=2&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='investor_subscriptions.php?mp=2&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
        }
        else if($pk==2)
        {


            
            $menustr = "<li><label></label><a href='investor_subscriptions.php?mp=2&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li class='over'><label></label><a href='investor_subscriptions.php?mp=2&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='investor_subscriptions.php?mp=2&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
        }
        else
        {
            $menustr = "<li><label></label><a href='investor_subscriptions.php?mp=2&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='investor_subscriptions.php?mp=2&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li class='over'><label></label><a href='investor_subscriptions.php?mp=2&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";

        }


//城市
        $sql=mysql_query("select * from pro_citys order by createtime;",$conn);
        while($rs=mysql_fetch_array($sql))
        {
            $citys_list.="<a href='#' onclick=\"setcitys('".$rs["name"]."')\">".$rs["name"]."</a>";
            if(trim($_REQUEST["xpass_city"])==$rs["name"]&& trim($_REQUEST["xpass_city"])!="")
            {
                $jsstr .= "  document.getElementById('span_city').innerHTML = '".$rs["name"]."';";
            }
        }
        $citys_list="<a href='#' onclick=\"setcitys('全部')\">全部</a>".$citys_list;

//房屋类型
        $sql=mysql_query("select * from pro_type order by createtime;",$conn);
        while($rs=mysql_fetch_array($sql))
        {
            $pro_type_list.="<a href='#' onclick=\"setpro_type('".$rs["name"]."')\">".$rs["name"]."</a>";
            if(trim($_REQUEST["xpass_pro_type"])==$rs["name"]&& trim($_REQUEST["xpass_pro_type"])!="")
            {
                $jsstr .= "  document.getElementById('span_pro_type').innerHTML = '".$rs["name"]."';";
            }

        }
        $pro_type_list="<a href='#' onclick=\"setpro_type('全部')\">全部</a>".$pro_type_list;

//融资类型
	if($pk==2){
		$itype='';
	}elseif($pk==3){
		$itype='2';
	}
        $sql=mysql_query("select * from investment_type".$itype." order by createtime;",$conn);
        while($rs=mysql_fetch_array($sql))
        {
            $rzlx.="<a href='#' onclick=\"setrzlx('".$rs["name"]."')\">".$rs["name"]."</a>";
            if(trim($_REQUEST["xpass_rzlx"])==$rs["name"]&& trim($_REQUEST["xpass_rzlx"])!="")
            {
                $jsstr .= "  document.getElementById('span_rzlx').innerHTML = '".$rs["name"]."';";
            }

        }
        $rzlx="<a href='#' onclick=\"setrzlx('全部')\">全部</a>".$rzlx;




//所属行业
        $sql=mysql_query("select * from industry_type order by createtime;",$conn);
        while($rs=mysql_fetch_array($sql))
        {
            $sshy.="<a href='#' onclick=\"setsshy('".$rs["name"]."')\">".$rs["name"]."</a>";
            if(trim($_REQUEST["xpass_sshy"])==$rs["name"]&& trim($_REQUEST["xpass_sshy"])!="")
            {
                $jsstr .= "  document.getElementById('span_sshy').innerHTML = '".$rs["name"]."';";
            }

        }
        $sshy="<a href='#' onclick=\"setsshy('全部')\">全部</a>".$sshy;



//企业类型
        $sql=mysql_query("select * from owner_qylx order by createtime;",$conn);
        while($rs=mysql_fetch_array($sql))
        {
            $qylx.="<a href='#' onclick=\"setqylx('".$rs["name"]."')\">".$rs["name"]."</a>";
            if(trim($_REQUEST["xpass_qylx"])==$rs["name"]&& trim($_REQUEST["xpass_qylx"])!="")
            {
                $jsstr .= "  document.getElementById('span_qylx').innerHTML = '".$rs["name"]."';";
            }

        }
        $qylx="<a href='#' onclick=\"setqylx('全部')\">全部</a>".$qylx;






//房屋面积
        $sql=mysql_query("select * from pro_area order by createtime;",$conn);
        while($rs=mysql_fetch_array($sql))
        {
            $pro_area_list.="<a href='#' onclick=\"setpro_area('".$rs["name"]."')\">".$rs["name"]."</a>";
            if(trim($_REQUEST["xpass_pro_area"])==$rs["name"]&& trim($_REQUEST["xpass_pro_area"])!="")
            {
                $jsstr .= "  document.getElementById('span_pro_area').innerHTML = '".$rs["name"]."';";
            }

        }
        $pro_area_list="<a href='#' onclick=\"setpro_area('全部')\">全部</a>".$pro_area_list;

//报价
        $sql=mysql_query("select * from pro_offer order by createtime;",$conn);
        while($rs=mysql_fetch_array($sql))
        {
            $pro_offer_list.="<a href='#' onclick=\"setpro_offer('".$rs["name"]."')\">".$rs["name"]."</a>";
            if(trim($_REQUEST["xpass_pro_offer"])==$rs["name"]&& trim($_REQUEST["xpass_pro_offer"])!="")
            {
                $jsstr .= "  document.getElementById('span_pro_offer').innerHTML = '".$rs["name"]."';";
            }

        }

        $pro_offer_list="<a href='#' onclick=\"setpro_offer('全部')\">全部</a>".$pro_offer_list;
        $jsstr = "<script>".$jsstr."</script>";

        if($_REQUEST["xpass_city"]!="" && $_REQUEST["xpass_city"]!="全部")
        {

            $sqlwhere.=" and(pro_citys = '".trim($_REQUEST["xpass_city"])."' or pro_citys = '".trim($_REQUEST["xpass_city"])."') ";
        }
        if($_REQUEST["xpass_pro_type"]!="" && $_REQUEST["xpass_pro_type"]!="全部")
        {

            $sqlwhere.=" and(subscription.pro_type = '".$_REQUEST["xpass_pro_type"]."' or subscription.pro_type= '".$_REQUEST["xpass_pro_type"]."') ";
        }
        if($_REQUEST["pro_cbd"]!="")
        {

            $sqlwhere.=" and(pro_cbd = '".$_REQUEST["pro_cbd"]."' or pro_cbd = '".$_REQUEST["pro_cbd"]."') ";
        }
        if($_REQUEST["xpass_pro_area"]!="" && $_REQUEST["xpass_pro_area"]!="全部")
        {

            $sqlwhere.=" and(pro_area = '".$_REQUEST["xpass_pro_area"]."' or pro_area = '".$_REQUEST["xpass_pro_area"]."') ";
        }

        if($_REQUEST["xpass_pro_offer"]!="" && $_REQUEST["xpass_pro_offer"]!="全部")
        {

            $sqlwhere.=" and(price = '".$_REQUEST["xpass_pro_offer"]."') ";
        }
        if(trim($_REQUEST["keys"]) != "")
        {
            $keys =trim($_REQUEST["keys"]);
            $keys = unescape($keys);
            $sqlwhere.=" and(pro_citys like '%".$keys."%' or pro_cbd like '%".$keys."%' or subscription.pro_type like '%".$keys."%' or pro_area like '%".$keys."%' or pro_offer like '%".$keys."%' or investment_type like '%".$keys."%' or subscription.industry_type like '%".$keys."%') ";

        }
        $ordertype = trim($_REQUEST["ordertype"])==""?"createtime":trim($_REQUEST["ordertype"]);
        $isdesc = trim($_REQUEST["isdesc"])==""?"desc":trim($_REQUEST["isdesc"]);
        $isdesc = $isdesc=="desc"?"asc":"desc";


        if($pk==1){
        $sql = "select subscription.*,users.id as 'uid',users.`truename` as 'uname',users.companyname from subscription,users where subscription.userid = users.id and userid in (select userid from users_sub where fid = ".$_SESSION['verydeals_id'].") and pro_kind = ".$pk." ".$sqlwhere." ";
        $orderby = " order by ".$ordertype." ".$isdesc." ";
        $sql.=$orderby;
    }elseif($pk==2 || $pk==3){
           $_rzlx=(isset($_GET['xpass_rzlx']) && $_GET['xpass_rzlx']!="" && $_GET['xpass_rzlx']!="全部") ? " and investment_type='".$_GET['xpass_rzlx']."' " : " ";
           $_citys=(isset($_GET['xpass_city']) && $_GET['xpass_city']!="" && $_GET['xpass_city']!="全部") ? " and pro_citys='".$_GET['xpass_city']."' " : " ";   
            $_sshy=(isset($_GET['xpass_sshy']) && $_GET['xpass_sshy']!="" && $_GET['xpass_sshy']!="全部") ? " and subscription.industry_type='".$_GET['xpass_sshy']."' " : " "; //所属行业
            $_bj=(isset($_GET['xpass_pro_offer']) && $_GET['xpass_pro_offer']!="" && $_GET['xpass_pro_offer']!="全部") ? " and pro_offer='".$_GET['xpass_pro_offer']."' " : " "; 
    
$sql = "select subscription.*,users.id as 'uid',users.`truename` as 'uname',users.companyname from subscription,users where subscription.userid = users.id and userid in (select userid from users_sub where fid = ".$_SESSION['verydeals_id'].") and pro_kind = ".$pk. $_rzlx . $_citys . $_sshy. $_bj;

    }
        $ps = 12;
        $rs=mysql_query($sql);

        $allcount = mysql_num_rows($rs);
        $sqlpage =  getlimitsql($sql,$ps);
        $yeshu=ceil($allcount/$ps);
        $dt = mysql_query($sqlpage,$conn);

if($pk==1){
    $shaixuan='<ul><li><span id="span_pro_type">房产类型</span><div class="nofalse">'.$pro_type_list.'</div></li><li><span id="span_city">所在区域</span><div class="nofalse">'.$citys_list.'</div></li><li><span id="span_pro_area">房产面积</span><div class="nofalse nofalse2">'.$pro_area_list.'</div></li><li><span id="span_pro_offer">交易报价</span><div class="nofalse nofalse2">'. $pro_offer_list.'</div></li></ul>';
}elseif($pk==2 || $pk==3){
    $typestr= ($pk==2) ? "投资类型" : "融资类型";
    $shaixuan='<ul><li><span id="span_rzlx">'.$typestr.'</span><div class="nofalse">'.$rzlx.'</div></li><li><span id="span_city">所在城市</span><div class="nofalse">'.$citys_list.'</div></li><li><span id="span_sshy">所属行业</span><div class="nofalse nofalse2">'.$sshy.'</div></li><li><span id="span_pro_offer">价格区间</span><div class="nofalse nofalse2">'. $pro_offer_list.'</div></li></ul>';
}



        ?>
    </ul>
</div>
<div class="heart_right">
    <div class="White">
        <div class="Gray">
            <div class="manage manage_">投资人订阅 <label class="script">Investor Subscriptions</label></div>
            <div class="Glide_li">
                <ul><?php echo $menustr ;?></ul>
            </div>
            <div class="Audit">
                <div class="Audit_">
                    <div class="channel">
                        <form name="myform" id="myform" action="" method="get" onsubmit="return check()">
                            <input type="hidden" name="ordertype" id="ordertype" value="<?php echo $_REQUEST["ordertype"];?>"/>
                            <input type="hidden" name="isdesc" id="isdesc" value="<?php echo $_REQUEST["isdesc"];?>"/>
                            <input type="hidden" name="xpass_city" id="xpass_city" value="<?php echo $_REQUEST["xpass_city"];?>"/>
                            <input type="hidden" name="xpass_pro_type" id="xpass_pro_type" value="<?php echo $_REQUEST["xpass_pro_type"];?>"/>
                            <input type="hidden"  name="xpass_rzlx" id="xpass_rzlx" value="<?php echo $_REQUEST["xpass_rzlx"];?>" />
                         <input type="hidden"  name="xpass_sshy" id="xpass_sshy" value="<?php echo $_REQUEST["xpass_sshy"];?>" />
                            <input type="hidden" name="xpass_pro_area" id="xpass_pro_area" value="<?php echo $_REQUEST["xpass_pro_area"];?>"/>
                            <input type="hidden" name="xpass_pro_offer" id="xpass_pro_offer" value="<?php echo $_REQUEST["xpass_pro_offer"];?>"/>
<input type="hidden" name="xpass_qylx" id="xpass_qylx" value="<?php echo $_REQUEST["xpass_qylx"];?>"/>
                            <input type="hidden" name="pk" value="<?php echo $_REQUEST["pk"];?>"/>
                            <input type="hidden" name="mp" id="mp" value="<?php echo $mp ;?>"/>
                            <input type="text" value="<?php echo $keys;?>" name="keys" id="keys"  class="textbook"/>
                            <input type="image" src="images/sumch.jpg"  class="sumch"/>
                        </form>
                        <div class="false">
                            <?php echo $shaixuan ?>
                        </div>
                    </div>
                    <div class="OrderII">
                        <?php
                        while($row = mysql_fetch_array($dt))
                        {
                            ?>
                            <div class="Order">

                                <table width="650" border="0" cellspacing="0" cellpadding="0" height="25" style="margin-left:0;">
                                    <tr>

                                        <td width="50" align="left" valign="middle">订阅人：</td>
                                        <td width="85" align="left" valign="middle"><span style="cursor:pointer" onclick="location.href='personal_colleagues_b.php?ci=<?php echo $row["uid"];?>&mp=1'"><?php echo $row["uname"];?></span></td>
                                        <td width="89" align="left" valign="middle">公司名称：</td>
                                        <td width="267" align="left" valign="middle"><span style="cursor:pointer" onclick="location.href='company_colleagues_B.php?ci=<?php echo $row["uid"];?>&mp=1"><?php echo $row["companyname"];?></span></td>
                                        <td width="52" align="right" valign="middle"><a href="#" class="selected unfold">收起</a></td>
                                    </tr>
                                </table>
                            </div>


                            <?php  if($pk==1){ ?>
                            
                            <div class="unfoldno" style="display:block">
                                <?php
                                if(trim($row["pro_citys"])!="全部")
                                {
                                    echo "<p>> 所在城市：<span>".$row["pro_citys"]."</span> </p> ";
                                }
                                if(trim($row["pro_cbd"])!="全部")
                                {
                                    echo "<p>> 所在区县：<span>".$row["pro_cbd"]."</span> </p>   ";
                                }
                                if(trim($row["pro_type"])!="全部")
                                {
                                    echo " <p>> 房产类型：<span>".$row["pro_type"]."</span> </p>   ";
                                }
                                if(trim($row["pro_area"])!="全部")
                                {
                                    echo " <p>> 房产面积：<span>".$row["pro_area"]."</span> </p>   ";
                                }
                                if(trim($row["pro_offer"])!="全部")
                                {
                                    echo " <p>> 价格区间：<span>".$row["pro_offer"]."</span> </p>  ";
                                }
                                ?>
                            </div>
                            <?php }else{ ?>
                            <div class="unfoldno" style="display:block">
                                <?php
                                if(trim($row["pro_citys"])!="全部")
                                {
                                    echo "<p>> 所在城市：<span>".$row["pro_citys"]."</span> </p> ";
                                }
                                if(trim($row["industry_type"])!="全部")
                                {
                                    echo "<p>> 所属行业：<span>".$row["industry_type"]."</span> </p>   ";
                                }
                                if(trim($row["investment_type"])!="全部")
                                {
                                    echo " <p>> 融资类型：<span>".$row["investment_type"]."</span> </p>   ";
                                }
                                if(trim($row["pro_offer"])!="全部")
                                {
                                    echo " <p>> 价格区间:<span>".$row["pro_offer"]."</span> </p>  ";
                                }
                                ?>
                            </div>
                            <?php } ?>
                            <?php
                        }
                        ?>
                        <div class="clear"></div>
                        <div class="pages"><?php echo getpagejs1($yeshu);?></div>
                    </div>
                </div>
                <div class="Audit_foot"></div>
            </div>
        </div>
    </div>
    <div class="heart_botm"></div>
</div>
<div class="clear"></div>
</div>
</div>
</div>

<!--底部-->
<div id="footer">
    <script language="javascript">include('footer.html','footer');</script>
</div>

<script type="text/javascript">
    function check()
    {
        if(document.getElementById("keys").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1') != "")
        {
            var keys = escape(document.getElementById("keys").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1'));
        }
    }
    function setcitys(x)
    {
        document.getElementById("span_city").innerHTML = x;
        document.getElementById("xpass_city").value = x;
        document.myform.submit();
    }
    function setpro_type(x)
    {
        document.getElementById("span_pro_type").innerHTML = x;
        document.getElementById("xpass_pro_type").value = x;
        document.myform.submit();
    }


  function setqylx(x)
    {
        document.getElementById("span_qylx").innerHTML = x;
        document.getElementById("xpass_qylx").value = x;
        document.myform.submit();
    }

    function setsshy(x)
    {
        document.getElementById("span_sshy").innerHTML = x;
        document.getElementById("xpass_sshy").value = x;
        document.myform.submit();
    }


    function setrzlx(x)
    {
        document.getElementById("span_rzlx").innerHTML = x;
        document.getElementById("xpass_rzlx").value = x;
        document.myform.submit();
    }

    function setpro_area(x)
    {
        document.getElementById("span_pro_area").innerHTML = x;
        document.getElementById("xpass_pro_area").value = x;
        document.myform.submit();
    }
    function setpro_offer(x)
    {
        document.getElementById("span_pro_offer").innerHTML = x;
        document.getElementById("xpass_pro_offer").value = x;
        document.myform.submit();
    }
    $(function(){

        $('.false li').hover(function(){

            $(this).find('.nofalse').show().end().addClass('hover')

        },function(){

            $(this).find('.nofalse').hide().end().removeClass('hover')

        })

    })



    $(function(){

        var o=$('div.OrderII > div:even'),a=o.find('a');

        o.click(function(){

            var parent=$(this).next('div');

            if(parent.is(':hidden')){

                //o.next().hide();

                a.removeClass('selected').text('展开');

                $(this).find('a').addClass('selected').text('收起');

                parent.show();

            }else

            {

                $(this).find('a').removeClass('selected').text('展开');

                parent.hide();

            }

        });

    })

</script>
<?php echo $jsstr;?>

</body>
</html>
