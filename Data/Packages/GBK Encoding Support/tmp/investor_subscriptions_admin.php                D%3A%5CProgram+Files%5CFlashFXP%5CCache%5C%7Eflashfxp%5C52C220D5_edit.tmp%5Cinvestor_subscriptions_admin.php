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
    <script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<script language="javascript" src="scripts/jquery.js"></script>
<script language="javascript" src="scripts/public.js"></script>

</head>

<body>
<div class="position" style="color:#C30">当前位置 > 会员管理 > 投资人订阅</div>
  <!--top-->
<!--end-->
&nbsp;&nbsp;&nbsp;&nbsp;筛选作用:系统会帮助您筛选出来时间区间内的项目信息发送给订阅用户.<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;开始时间: <input type="text"  id="createtime"  value="<?php if($_GET["stime"]==""){echo date("Y-m-d H:i:s",mktime(0,0,0,date("m"),date("d")-14,date("Y")));}else{ echo $_GET['stime'];} ?>"  onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate" style="width:220px" />  结束时间: <input type="text"  id="endtime"  value="<?php if($_GET["etime"]==""){ echo date("Y-m-d H:i:s");}else{ echo $_GET['etime'];} ?>"  onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate" style="width:220px" /> <a href='javascript:;'id="sarech">筛选</a>
<br/><br/><br/>
<script>
    $(function(){
        $("#sarech").click(function (){
            if($("#createtime").val()==''){
                window.location.reload();
            }else{
				//alert($("#endtime").val());
                if($("#endtime").val()!=""){
                    window.location.href='?mp=2&pk=<?php echo $_GET['pk']?>&stime='+$("#createtime").val()+'&etime='+$("#endtime").val();
                    return false;
                }
                window.location.href='?mp=2&pk=<?php echo $_GET['pk']?>&stime='+$("#createtime").val();
            }
        })
    })
</script>
<div class="Shadow"></div>

<!--content-->
<div class="main main_">
 <div class="content">
   <div class="heart">
    <div class="Glide_li">
     <ul>
<?php

$pk =trim($_REQUEST["pk"])==""|| !is_numeric($_REQUEST["pk"])?"1":trim($_REQUEST["pk"]);
if($pk==1)
{
	$menustr = "<li class='over'><label></label><a href='investor_subscriptions_admin.php?mp=2&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='investor_subscriptions_admin.php?mp=2&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='investor_subscriptions_admin.php?mp=2&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
}
else if($pk==2)
{
	$menustr = "<li><label></label><a href='investor_subscriptions_admin.php?mp=2&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li class='over'><label></label><a href='investor_subscriptions_admin.php?mp=2&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='investor_subscriptions_admin.php?mp=2&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
}
else 
{
	$menustr = "<li><label></label><a href='investor_subscriptions_admin.php?mp=2&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='investor_subscriptions_admin.php?mp=2&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li class='over'><label></label><a href='investor_subscriptions_admin.php?mp=2&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";

}
if($_REQUEST["pk"]=="")
{ 
	if($_GET['stime'] && $_GET['etime']){
		$s="SELECT * FROM project WHERE date_format(createtime,'%Y-%m-%d') BETWEEN date_format('".$_GET['stime']."','%Y-%m-%d') AND date_format('".$_GET['etime']."','%Y-%m-%d') AND pro_kind = '1' order by createtime desc;";
		//echo "2";
	}
	else
	{
		$s="select * from project where pro_kind = '1' and DATE_SUB(CURDATE(), INTERVAL 14 DAY) <= date(createtime) order by createtime desc;";
		//echo "1";
	}
}
else
{
	if($_GET['stime'] && $_GET['etime']){
		$s="SELECT * FROM project WHERE date_format(createtime,'%Y-%m-%d') BETWEEN date_format('".$_GET['stime']."','%Y-%m-%d') AND date_format('".$_GET['etime']."','%Y-%m-%d') AND pro_kind = '".$_REQUEST["pk"]."' order by createtime desc;";
		//echo "2";
	}else{
		$s="select * from project where pro_kind = '".$_REQUEST["pk"]."' and DATE_SUB(CURDATE(), INTERVAL 14 DAY) <= date(createtime) order by createtime desc;";
		//echo "3";
	}

}

 //$sql="select * form project where date_format(createtime,'%Y-%m-%d %H:%i:%s') detween date_format('2014-11-06 14:48:33','%Y-%m-%d %H:%i:%s') and date_format('2015-1-06 14:48:33','%Y-%m-%d %H:%i:%s')";
	//echo $ddd="select * from project where date_format(createtime,'%Y-%m-%d') becween 最小时间 and 最大时间 ";
	//SELECT *FROM project WHERE date_format( createtime, '%Y-%m-%d' ) BETWEEN date_format( '2013-01-07 15:32:19', '%Y-%m-%d' ) AND date_format( '2015-01-07 15:32:19', '%Y-%m-%d' ) 
	//select * from tbname where date_format(createtime,'%Y-%m-%d') > 
	//if()$sql="SELECT * FROM project WHERE date_format(createtime,'%Y-%m-%d') BETWEEN date_format('".$_GET['stime']."','%Y-%m-%d') AND date_format('".$_GET['etime']."','%Y-%m-%d') AND pro_kind = '".$_REQUEST["pk"]."';";
?>
     </ul>
     <div class="White">
       <div class="Gray">
         <div class="Glide_li">
          <ul><?php echo $menustr ;?></ul>
         </div>
         <div class="Audit">
          <div class="Audit_">
            <div class="channel" style="display:none">
                   <form name="myform" id="myform" action="" method="get" onsubmit="return check()">
     <input type="hidden" name="ordertype" id="ordertype" value="<?php echo $_REQUEST["ordertype"];?>"/>
     <input type="hidden" name="isdesc" id="isdesc" value="<?php echo $_REQUEST["isdesc"];?>"/>
           <input type="hidden" name="xpass_city" id="xpass_city" value="<?php echo $_REQUEST["xpass_city"];?>"/>
                     <input type="hidden" name="xpass_pro_type" id="xpass_pro_type" value="<?php echo $_REQUEST["xpass_pro_type"];?>"/>
          <input type="hidden" name="xpass_pro_area" id="xpass_pro_area" value="<?php echo $_REQUEST["xpass_pro_area"];?>"/>
          <input type="hidden" name="xpass_pro_offer" id="xpass_pro_offer" value="<?php echo $_REQUEST["xpass_pro_offer"];?>"/>

                    <input type="hidden" name="pk" value="<?php echo $_REQUEST["pk"];?>"/>
     <input type="hidden" name="mp" id="mp" value="<?php echo $mp ;?>"/>
             <input type="text" value="<?php echo $keys;?>" name="keys" id="keys"  class="textbook"/>
             <input type="image" src="images/sumch.jpg"  class="sumch"/>
             </form>
           </div>
		   <form action="email.php?pk=<?php echo $_REQUEST["pk"]; ?>" method="post">
		   <input type="checkbox" class="input_all" onclick="CheckedAll();"/>全选
		   <input type="checkbox" class="input_no" onclick="CheckedNo();"/>取消
		   <input type="submit" value="发送" style="float: right;background: red;color:#fff;padding: 2px;border: none;margin: 4px 4px 0 0;">
		   
            <div class="OrderII">
            <?php
			//echo $s;
			$sql=mysql_query($s);
            while($row = mysql_fetch_array($sql))
			{
			?>
			
			
					               <div class="Order">
                                   
				<table width="650" border="0" cellspacing="0" cellpadding="0" height="25" style="margin-left:0;" >
			  <tr>

				<td  width="89" align="left" valign="middle">项目名称：</td>
				<td width="150" align="left" valign="middle"><span><a style="color:#2b5a86" target="_blank" href="project_details_Sadmin.php?back=pro&m=&id=<?php echo $row["id"];?>&pk=<?php  echo $_REQUEST["pk"];?> "><?php echo $row["title1"];?></a></span></td>
				<td width="70" align="left" valign="middle">发布人：</td>
				<td width="89" align="left" valign="middle"><span><a style="color:#2b5a86" target="_blank" href="http://test010.webthink.cc/personal_colleagues_s_admin.php?ci=<?php echo $row['fid']?>"><?php echo $row["author"];?></a></span></td>
				<td width="89" align="left" valign="middle">发布时间：</td>
				<td width="120" align="left" valign="middle"><span><?php echo $row["createtime"];?></span></td>
				<td width="52" align="right" valign="middle"><a href="#" class="selected unfold"><span>收起</span></a></td>
			  </tr>
			</table>
               </div>
               <div class="unfoldno" style="display:block">
               <?php
				if($_REQUEST["pk"]==1){
					$pro_citys=mysql_fetch_array(mysql_query("select * from pro_citys where id = '".$row["pro_citys"]."';",$conn));
					$pro_cbd=mysql_fetch_array(mysql_query("select * from pro_cbd where id = '".$row["pro_cbd"]."';",$conn));
						$pro_type= mysql_fetch_array(mysql_query("select * from pro_type where id = '".$row["pro_type"]."';",$conn));
						$pro_area= mysql_fetch_array(mysql_query("select * from pro_area where id = '".$row["pro_area"]."';",$conn));
						$sqls=mysql_query("select * from subscription where pro_kind = 1 and pro_citys = '".$pro_citys['name']."' and (pro_cbd = '".$pro_cbd['name']."' or pro_cbd = '全部') and (pro_type = '".$pro_type['name']."' or pro_type = '全部') and (pro_offer = '".$row['sbscpt_offer']."' or pro_offer = '全部') and (pro_area = '".$pro_area['name']."' or pro_area = '全部') and fasong = 0;");
				}else if($_REQUEST["pk"]==2){
					$pro_citys=mysql_fetch_array(mysql_query("select * from pro_citys where id = '".$row["pro_citys"]."';",$conn));
					$investment_type=mysql_fetch_array(mysql_query("select * from investment_type where id = '".$row["investment_type"]."';",$conn));
					$industry_type=mysql_fetch_array(mysql_query("select * from investment_type where id = '".$row["industry_type"]."';",$conn));
					$sqls=mysql_query("select * from subscription where pro_kind = 2 and pro_citys = '".$pro_citys['name']."' and (industry_type = '".$industry_type['name']."' or industry_type = '全部') and (pro_offer = '".$row['sbscpt_offer']."' or pro_offer = '全部') and (investment_type = '".$investment_type['name']."' or investment_type = '全部') and fasong = 0;");
				
				}else{
					$pro_citys=mysql_fetch_array(mysql_query("select * from pro_citys where id = '".$row["pro_citys"]."';",$conn));
					$investment_type=mysql_fetch_array(mysql_query("select * from investment_type where id = '".$row["investment_type"]."';",$conn));
					$industry_type=mysql_fetch_array(mysql_query("select * from investment_type where id = '".$row["industry_type"]."';",$conn));
					
					$sqls=mysql_query("select * from subscription where pro_kind = 3 and pro_citys = '".$pro_citys['name']."' and (industry_type = '".$industry_type['name']."' or industry_type = '全部') and (pro_offer = '".$row['sbscpt_offer']."' or pro_offer = '全部') and (investment_type = '".$investment_type['name']."' or investment_type = '全部') and fasong = 0;");
				}
						while($rows= mysql_fetch_array($sqls)){
						$user=mysql_fetch_array(mysql_query("select * from users where id = '".$rows["userid"]."';"));
						
			   ?>
			   <table class="form_table" border="0" cellspacing="0" cellpadding="0" style="margin-left:0;">
					<tr>
				<td width="50" align="left" valign="middle">订阅人：</td>
				<td width="120" align="left" valign="middle"><span><a href="personal_colleagues_s_admin.php?ci=<?=$user['id']?>" target="_blank"><?php if($user['truename']){
				echo $user['truename'];}else{ echo $user['name'];}?></a></span></td>
				<td width="63" align="left" valign="middle">公司名称：</td>
				<td  width="300" align="left" valign="middle"><span><br />
<a href="company_profile_S_admin.php?ci=<?=$user['id']?>&m=ppt" target="_blank"><?php if($user['companyname']){ echo $user['companyname'];}else{ echo '非会员';}?></a></span></td>
				<td width="63" align="left" valign="middle">订阅时间：</td>
				<td  width="140" align="left" valign="middle"><span><?php echo $rows['createtime'];?></span></td>
				<td><div class="xm" style="display:none" ><?php echo $row['id'];?></div></td>
				<td><div class="user" style="display:none"><?php echo $user['id'];?></div></td>
				<td><div class="pro_vip" style="display:none"><?php echo $rows['pro_vip'];?></div></td>
				<td><input class="f_val1" type="hidden" name="" value=""></td>
				<td><input class="f_val2" type="hidden" name="" value=""></td>
				<td><input class="f_val3" type="hidden" name="" value=""></td>
				<td><input type="checkbox" class="f_email" name="name" ></td>
			  </tr>
			  </table>
			  
			  <?php
				}
			  ?>
               </div>
               		<?php
				
	           }
	?>
               <script>
			   function CheckedAll(){
					$('.form_table :checkbox').attr('checked','checked');
					$(".form_table").each(function(){
						if($(this).find(".f_email").is(":checked")){
							var $xm = $(this).find(".xm").text();
							var $user = $(this).find(".user").text();
							var $pro_vip = $(this).find(".pro_vip").text();
							$(this).find(".f_val1").attr("value",$xm).attr('name','xm[]');
							$(this).find(".f_val2").attr("value",$user).attr('name','user[]');
							$(this).find(".f_val2").attr("value",$pro_vip).attr('name','pro_vip[]');
						}
					})
				}
				function CheckedNo(){				
					$('.Audit_ :checkbox').removeAttr('checked');
					$('.form_table .f_val1').attr('value','').attr('name','');
					$('.form_table .f_val2').attr('value','').attr('name','');
					$('.form_table .f_val3').attr('value','').attr('name','');
				}
				
			   $(function(){
				
					$(".f_email").click(function(){
						var $xm1 = $(this).parents("tr").find(".xm").text();
						var $user1 = $(this).parents("tr").find(".user").text();
						var $pro_vip1 = $(this).parents("tr").find(".pro_vip").text();
						if($(this).is(':checked')){//选中状态
							$(this).parents("tr").find(".f_val1").attr('value',$xm1).attr('name','xm[]');
							$(this).parents("tr").find(".f_val2").attr('value',$user1).attr('name','user[]');
							$(this).parents("tr").find(".f_val3").attr('value',$pro_vip1).attr('name','pro_vip[]');
							
						}else{
							$(this).parents("tr").find(".f_val1").attr('value','').attr('name','');
							$(this).parents("tr").find(".f_val2").attr('value','').attr('name','');
							$(this).parents("tr").find(".f_val3").attr('value','').attr('name','');
						}
						
					})
			   })
			  </script>
			   <div class="clear"></div>
<div class="pages"><?php echo getpagejs1($yeshu);?></div>
				
              </div>
			  </form>
          </div>
          <div class="Audit_foot"></div>
         </div>
       </div>
     </div>
    </div> 

      <div class="clear"></div> 
   </div>
</div>
</div>
<div class="clear"></div> 
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
	
	$(".OrderII a.unfold").click(function(){
	var parent=$(this).parents(".Order").next();
		if(parent.is(':hidden')){
			parent.show();
			$(this).find("span").text("收起")
		}else{
			parent.hide();
			$(this).find("span").text("展开")
		}
		
	})
var o=$('div.OrderII a.unfold'),a=o.find('span');

// o.click(function(){

	// var parent=$(this).parent(".Order").next(".unfoldno");

	// if(parent.is(':hidden')){

		// .o.parent(".Order").next(".unfoldno").hide();

		// a.removeClass('selected').text('展开');

		// $(this).find('span').addClass('selected').text('收起');

		// parent.show();

	// }else

	// {

		// $(this).find('span').removeClass('selected').text('展开');

		// parent.hide();

	// }

// });

})

  </script>
    <?php echo $jsstr;?>
 
</body>
</html>
