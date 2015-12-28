<?php  include "inc/conn.php";?>
<?php  include "../inc/func_lm.php";?>
<?php  include "../inc/func_my.php";?>
<?php  include "inc/func_article.php";?>
<?php
checkadmin();
$xnum = rand(0,50000);
if(strlen($xnum)<5)
{
	$xnum = "0".$xnum;
}
$id = 0;
$users_sn = "";
$truename = "";
$user_type = "";
$ispass = "";
$jobtitle = "";
$companymail = "";
$telephone = "";
$mobile = "";
$countryid = "";
$provincialid = "";
$cityid = "";
$companyname = "";
$companywebsite = "";
$industry = "";
$mestype1 = "";
$mestype2 = "";
$user_ming = "";
$pass_ming = "";
$user_category = "";
$createtime = "";
$btnname = "添加";
$mycontent = "";
$action = "add";
$label1selectstr = "";
$label2selectstr = "";
if($_REQUEST["action"] == "edit")
{
	$btnname = "修改";
	$rs=mysql_fetch_array(mysql_query("select * from users where id = ".$_REQUEST["id"].";"));
    $users_sn = $rs["users_sn"];
	$userpwd2 = $rs["userpwd2"];
	$truename = $rs["truename"];
	$user_type = $rs["user_type"];
	$ispass = $rs["ispass"];
	$jobtitle = $rs["jobtitle"];
	$companymail = $rs["companymail"];
	$telephone = $rs["telephone"];
	$mobile = $rs["mobile"];
	$countryid = $rs["countryid"];
	$provincialid = $rs["provincialid"];
	$city = $rs["city"];
	$companyname = $rs["companyname"];
	$companynum = $rs["companynum"];
	$companywebsite = $rs["companywebsite"];
	$industry = $rs["industry"];
	$mestype1 = $rs["mestype1"];
	$mestype2 = $rs["mestype2"];
	$mycontent = $rs["mycontent"];
	$user_ming = $rs["user"];
	$sex=$rs['sex'];
	$img = trim($rs["img"])==""?"images/looking.jpg":$rs["img"];
	$pass_ming = $rs["pass"];
	$user_category = $rs["user_category"];
	$isdujia = $rs["isdujia"];
	 $pro_type = trim($rs["pro_type"]);
	 $trade = trim($rs["trade"]);
	 $contact_mail = trim($rs["contact_mail"]);
	 if($user_type==1||$user_type==3)
	 {
		 $showprotype = "block";
	 }
	 else
	 {
		 $showprotype = "none";
	 }
	$createtime = $rs["createtime"];
    $radioispass = $ispass=="1"?"<input type='radio' name='ispass' value='1' checked='checked'/>通过<input type='radio' name='ispass' value='0'/>不通过":"<input type='radio' name='ispass' value='1'/>通过<input type='radio' name='ispass' value='0' checked='checked'/>不通过";
	    $radioisdujia = $isdujia=="1"?"<input type='radio' name='isdujia' value='1' checked='checked'/>独家<input type='radio' name='isdujia' value='0'/>分享":"<input type='radio' name='isdujia' value='1'/>独家<input type='radio' name='isdujia' value='0' checked='checked'/>分享";
if($pro_type=="房地产投资")
{
	$pro_typelist = "<select name='pro_type' id='pro_type'><option value='房地产投资' selected='selected'>房地产投资</option><option value='股权投资'>股权投资</option><option value='债券投资'>债券投资</option></select>";
}
else if($pro_type=="股权投资")
{
	$pro_typelist = "<select name='pro_type' id='pro_type'><option value='房地产投资'>房地产投资</option><option value='股权投资' selected='selected'>股权投资</option><option value='债券投资'>债券投资</option></select>";
}
else if($pro_type=="债券投资")
{
	$pro_typelist = "<select name='pro_type' id='pro_type'><option value='房地产投资' selected='selected'>房地产投资</option><option value='股权投资'>股权投资</option><option value='债券投资' selected='selected'>债券投资</option></select>";
}

if($trade==1)
{
	$tradelist = "<input type='radio' value='1'  name='trade' class='radio' checked='checked'/>产权人<input type='radio' value='2'  name='trade' class='radio'/>融资人<input type='radio' value='3'  name='trade' class='radio'/>经纪人";
}
else if($trade==2)
{
	$tradelist = "<input type='radio' value='1'  name='trade' class='radio'/>产权人<input type='radio' value='2'  name='trade' class='radio' checked='checked'/>融资人<input type='radio' value='3'  name='trade' class='radio'/>经纪人";
}
else if($trade==3)
{
	$tradelist = "<input type='radio' value='1'  name='trade' class='radio'/>产权人<input type='radio' value='2'  name='trade' class='radio'/>融资人<input type='radio' value='3'  name='trade' class='radio' checked='checked'/>经纪人";
}
else if($trade==4)
{
	$tradelist = "<input type='radio' value='4'  name='trade' class='radio' checked='checked'/>投资人<input type='radio' value='5'  name='trade' class='radio'/>投资人代表";
}
else if($trade==5)
{
	$tradelist = "<input type='radio' value='4'  name='trade' class='radio'/>投资人<input type='radio' value='5'  name='trade' class='radio' checked='checked'/>投资人代表";
}
	$id = $_REQUEST["id"];
		$sql="select * from user_mes where type = 1 order by createtime desc,id desc;";
	$rs=mysql_query($sql,$conn);
	while($row = mysql_fetch_array($rs))
	{
		    
			 if($mestype1 == $row["id"])
			 {
				 		  	 $label1selectstr.="<input type='radio' value='".$row["id"]."' name='mestype1'  checked='checked'  />";

			 }
			 else
			 {
				 		  	 $label1selectstr.="<input type='radio' value='".$row["id"]."' name='mestype1' />";

			 }
			 $label1selectstr.=$row["title"];
	}
	
			if($user_type==1)
		{
			$div_trade_show = "block";
			$li_trade_show = "block";
			$radiouser_type = "<input type='radio' name='user_type' value='1' checked='checked' onclick='showtrade(0)'/>产权方会员<input type='radio' name='user_type' value='2' onclick='showtrade(0)'/>投资方会员<input type='radio' name='user_type' value='3' onclick='showtrade(3)'/>产权管理员<input type='radio' name='user_type' value='4' onclick='showtrade(4)'/>投资管理员";
		}
		else if($user_type==2)
		{
			$div_trade_show = "block";
			$li_trade_show = "block";
			$radiouser_type = "<input type='radio' name='user_type' value='1' onclick='showtrade(0)'/>产权方会员<input type='radio' name='user_type' value='2' checked='checked' onclick='showtrade(0)'/>投资方会员<input type='radio' name='user_type' value='3' onclick='showtrade(3)'/>产权管理员<input type='radio' name='user_type' value='4' onclick='showtrade(4)'/>投资管理员";
		}
		else if($user_type==3)
		{
			$div_trade_show = "none";
			$li_trade_show = "none";
			$radiouser_type = "<input type='radio' name='user_type' value='1' onclick='showtrade(0)'/>产权方会员<input type='radio' name='user_type' value='2' onclick='showtrade(0)'/>投资方会员<input type='radio' name='user_type' value='3' checked='checked' onclick='showtrade(3)'/>产权管理员<input type='radio' name='user_type' value='4' onclick='showtrade(4)'/>投资管理员";
		}
				else if($user_type==0)
		{
			$div_trade_show = "none";
			$li_trade_show = "none";
			$radiouser_type = "<input type='radio' name='user_type' value='1' onclick='showtrade(1)'/>产权方会员<input type='radio' name='user_type' value='2' onclick='showtrade(2)'/>投资方会员<input type='radio' name='user_type' value='3' onclick='showtrade(0)'/>产权管理员<input type='radio' name='user_type' value='4' onclick='showtrade(0)'/>投资管理员";
		}
		else
		{
			$div_trade_show = "none";
			$li_trade_show = "none";
			$radiouser_type = "<input type='radio' name='user_type' value='1' onclick='showtrade(1)'/>产权方会员<input type='radio' name='user_type' value='2' onclick='showtrade(2)'/>投资方会员<input type='radio' name='user_type' value='3' onclick='showtrade(0)'/>产权管理员<input type='radio' name='user_type' value='4' checked='checked' onclick='showtrade(0)'/>投资管理员";
		}
		$showtradejs = "<script>showtrade(".$user_type.");</script>";
			$sql="select * from user_mes where type = 2 order by createtime desc,id desc;";
	$rs=mysql_query($sql,$conn);
	while($row = mysql_fetch_array($rs))
	{
		    
			 if($mestype2 == $row["id"])
			 {
				 		  	 $label2selectstr.="<input type='checkbox' value='".$row["id"]."' name='mestype2' checked='checked' />";

			 }
			 else
			 {
				 		  	 $label2selectstr.="<input type='checkbox' value='".$row["id"]."' name='mestype2' />";

			 }
			 $label2selectstr.=$row["title"];
	}
		$provincialstr = "<select name='provincialid' id='provincialid' onchange='getcity()'><option value='0' selected='selected'>所在省</option>";
	$sql="select  *  from  provincial;";
	$rs=mysql_query($sql,$conn);
		while($row = mysql_fetch_array($rs))
	{
         if($provincialid==$row["pid"])
		 {
			 $selstr = "selected='selected'";
		 }
		 else
		 {
			$selstr = ""; 
		 }
		 $provincialstr.="<option value='".$row["pid"]."' ".$selstr.">".$row["Provincial"]."</option>";
	}
	$provincialstr.="</select>";
	$action = "update";
}
if($_REQUEST["action"] == "update")
{
	$createtime = $_REQUEST["createtime"]==""?date('Y-m-d H:i:s'):$_REQUEST["createtime"];
		 $userpwd = md5(trim($_REQUEST["userpwd"]));
			 $userpwd2 = trim($_REQUEST["userpwd"]);
			 $users_sn_h = trim($_REQUEST["users_sn_h"]);
			 $companymail = $_REQUEST["companymail"];
			 $companynum = $_REQUEST["companynum"];
			 $old_companyname = trim($_REQUEST["old_companyname"]);
			 $companyname = trim($_REQUEST["companyname"]);
	         $name = $companymail;
			 if(trim($_REQUEST["user_type"])==1 || trim($_REQUEST["user_type"])==3)
			 {
				  $rschk=mysql_fetch_array(mysql_query("select * from users where companyname='".$companyname."' limit 1;"));
				   if($rschk==true)
				   {
					   $companyname = $rschk["companyname"];
					   $companynum = $rschk["companynum"];
				   }
				   else
				   {
					   $companynum = "B10".date("Ymds");
				   }
			 }
			 else
			 {
					  $rschk=mysql_fetch_array(mysql_query("select * from users where companyname='".$companyname."' limit 1;"));
				   if($rschk==true)
				   {
					   $companyname = $rschk["companyname"];
					   $companynum = $rschk["companynum"];
				   }
				   else
				   {
					   $companynum = "B20".date("Ymds");
				   }
		
			 }

	$sql = "update users set name='".$name."',companynum='".$companynum."',userpwd = '".$userpwd."',userpwd2 = '".$userpwd2."',truename = '".trim($_REQUEST["truename"])."',user_type='".trim($_REQUEST["user_type"])."',jobtitle='".trim($_REQUEST["jobtitle"])."',companymail='".$companymail."',ispass='".trim($_REQUEST["ispass"])."',telephone = '".trim($_REQUEST["telephone"])."',mobile='".trim($_REQUEST["mobile"])."',countryid=".trim($_REQUEST["countrySlc"]).",provincialid=".$_REQUEST["provincialid"].",city='".$_REQUEST["citySlc"]."',companyname='".$_REQUEST["companyname"]."',companywebsite='".$_REQUEST["companywebsite"]."',industry='".$_REQUEST["industry"]."',mestype1='".$_REQUEST["mestype1"]."',mestype2='".$_REQUEST["mestype2"]."',mycontent='".$_REQUEST["mycontent"]."',img='".$_REQUEST["img"]."',isdujia=".$_REQUEST["isdujia"].",pro_type='".$_REQUEST["pro_type"]."',trade=".trim($_REQUEST["trade"]).",contact_mail='".$_REQUEST["contact_mail"]."',createtime='".$createtime."' where id = ".$_REQUEST["id"].";";

	$rs=mysql_query($sql,$conn);
	  if($_REQUEST["back"]==0)
	  {
		  $backurl = "users_all.php";
	  }
	  else if($_REQUEST["back"]==1)
	  {
		  $backurl = "users_root.php?p=".$_REQUEST["p"]."&user_type=".$_REQUEST["user_type"]."&search_type=".$_REQUEST["search_type"];
	  }
	  else if($_REQUEST["back"]=="2")
	  {
		 $backurl = "users.php";  
	  }
	 	  echo "<script>location.href='".$backurl."?p=".$_REQUEST["p"]."&r=1';</script>";
	 exit;
}
if($_REQUEST["action"] == "insert")
{
	$createtime = $_REQUEST["createtime"]==""?date('Y-m-d H:i:s'):$_REQUEST["createtime"];
	$companymail = $_REQUEST["companymail"];
	$name = $companymail;
	 if(trim($_REQUEST["user_type"])==1 || trim($_REQUEST["user_type"])==3)
	 {
		  $users_sn = "A10".date("Y").randomkeys(5);
		  $companynum = "B10".date("Y").randomkeys(5);
	 }
	  if(trim($_REQUEST["user_type"])==2 || trim($_REQUEST["user_type"])==4)
	 {
		  $users_sn = "A20".date("Y").$xnum;
		  $companynum = "B20".date("Y").$xnum;
	 }
	
		 $userpwd = md5(trim($_REQUEST["userpwd"]));
			 $userpwd2 = trim($_REQUEST["userpwd"]);
				 $sql = "insert into users(name,users_sn,userpwd,userpwd2,truename,user_type,ispass,jobtitle,companymail,telephone,mobile,countryid,provincialid,city,companyname,companywebsite,industry,mestype1,mestype2,mycontent,isdujia,pro_type,trade,img,companynum,contact_mail,createtime)values('".$name."','".$users_sn."','".$userpwd."','".$userpwd2."','".trim($_REQUEST["truename"])."',".trim($_REQUEST["user_type"]).",1,'".trim($_REQUEST["jobtitle"])."','".$companymail."','".trim($_REQUEST["telephone"])."','".trim($_REQUEST["mobile"])."',".$_REQUEST["countrySlc"].",".trim($_REQUEST["provincialid"]).",'".trim($_REQUEST["citySlc"])."','".$_REQUEST["companyname"]."','".$_REQUEST["companywebsite"]."','".$_REQUEST["industry"]."','".$_REQUEST["mestype1"]."','".$_REQUEST["mestype2"]."','".$_REQUEST["mycontent"]."',".trim($_REQUEST["isdujia"]).",'".trim($_REQUEST["pro_type"])."',".trim($_REQUEST["trade"]).",'".$_REQUEST["img"]."','".$companynum."','".trim($_REQUEST["contact_mail"])."',now());";

	$rs=mysql_query($sql,$conn);
		  if($_REQUEST["back"]==0)
	  {
		  $backurl = "users_all.php";
	  }
	  else 	  if($_REQUEST["back"]==1)
	  {
		  $backurl = "users_root.php?p=".$_REQUEST["p"]."&search_type=".$_REQUEST["search_type"]."&user_type=".$_REQUEST["search_type"];
	  }
	  else if($_REQUEST["back"]=="2")
	  {
		 $backurl = "users.php";  
	  }
	  echo "<script>location.href='".$backurl."?p=".$_REQUEST["p"]."&r=1';</script>";
	 exit;
}
if($_REQUEST["action"] == "add")
{
	$btnname = "添加";
	 $div_trade_show = "block";
			$li_trade_show = "block";
	 $showprotype = "block";
	 	$tradelist = "<input type='radio' value='1'  name='trade' class='radio' checked='checked'/>产权人<input type='radio' value='2'  name='trade' class='radio'/>融资人<input type='radio' value='3'  name='trade' class='radio'/>经纪人";

	 	$pro_typelist = "<select name='pro_type' id='pro_type'><option value='房地产投资' selected='selected'>房地产投资</option><option value='股权投资'>股权投资</option><option value='债券投资'>债券投资</option></select>";
    $radioispass = "<input type='radio' name='ispass' value='1' checked='checked'/>通过<input type='radio' name='ispass' value='0'/>不通过";
	 $radioisdujia = "<input type='radio' name='isdujia' value='1' checked='checked'/>独家<input type='radio' name='isdujia' value='0'/>分享";
				$radiouser_type = "<input type='radio' name='user_type' value='1' onclick='showtrade(0)'/>产权方会员<input type='radio' name='user_type' value='2' checked='checked' onclick='showtrade(0)'/>投资方会员<input type='radio' name='user_type' value='3' onclick='showtrade(3)'/>产权管理员<input type='radio' name='user_type' value='4' onclick='showtrade(4)'/>投资管理员";
						$showtradejs = "<script>showtrade(0);</script>";


	$id = $_REQUEST["id"];
		$sql="select * from user_mes where type = 1 order by createtime desc,id desc;";
	$rs=mysql_query($sql,$conn);
	$a = 1;
	while($row = mysql_fetch_array($rs))
	{
		    
			 if($a == 1)
			 {
				 		  	 $label1selectstr.="<input type='radio' value='".$row["id"]."' name='mestype1'  checked='checked'  />";

			 }
			 else
			 {
				 		  	 $label1selectstr.="<input type='radio' value='".$row["id"]."' name='mestype1' />";

			 }
			 $a++;
			 $label1selectstr.=$row["title"];
	}
	


			$sql="select * from user_mes where type = 2 order by createtime desc,id desc;";
	$rs=mysql_query($sql,$conn);
	while($row = mysql_fetch_array($rs))
	{

				 $label2selectstr.="<input type='checkbox' value='".$row["id"]."' name='mestype2' checked='checked'/>";
			 $label2selectstr.=$row["title"];
	}
		$provincialstr = "<select name='provincialid' id='provincialid' onchange='getcity()'><option value='0' selected='selected'>所在省</option>";
	$sql="select  *  from  provincial;";
	$rs=mysql_query($sql,$conn);
		while($row = mysql_fetch_array($rs))
	{

		 $provincialstr.="<option value='".$row["pid"]."'>".$row["Provincial"]."</option>";
	}
	$provincialstr.="</select>";
	$action = "insert";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	无标题页
</title><link rel="StyleSheet" href="style/ADMIN.CSS" type="text/css" />  
<script type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../My97DatePicker/WdatePicker.js"></script>
     <script type="text/javascript">
  function turnHeight(iframe)  
{  
    var frm = document.getElementById(iframe);  
    var subWeb = document.frames ? document.frames[iframe].document : frm.contentDocument;  
    if(frm != null && subWeb != null)  
    { frm.height = subWeb.body.scrollHeight + 20;}  
}
     </script>
</head>
<body>
             <?php
				$countrystr = "";
                  $sql=mysql_query("select * from country  order by id asc;",$conn); 
				while($rs=mysql_fetch_array($sql)) 
				{ 
				     $selstr = $countryid == $rs["id"]?"selected='selected'":"";
                     $countrystr .= "<option value='".$rs["id"]."' ".$selstr.">".$rs["name"]."</option>";

				}
				
                  $sql=mysql_query("select * from industry_type  order by id asc;",$conn); 
				while($rs=mysql_fetch_array($sql)) 
				{ 
				     $selstr = $industry == $rs["id"]?"selected='selected'":"";
                     $industry_typestr .= "<option value='".$rs["id"]."' ".$selstr.">".$rs["name"]."</option>";

				}
				$industry_typestr = "<select class='slc' name='industry' id='industry'>".$industry_typestr."</select>";
              ?>
              
              
    <form name="form1" method="post" action="users_show.php" id="form1" onsubmit="return check()">
<input name="action" type="hidden" id="action" value="<?php echo $action;?>" />
<input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
<input name="xpro" type="hidden" id="xpro" value="<?php echo $provincialid;?>" />
<input name="xcity" type="hidden" id="xcity" value="<?php echo $city;?>" />
<input name="p" type="hidden" id="p" value="<?php echo $_REQUEST["p"];?>" />
<input name="back" type="hidden" id="back" value="<?php echo $_REQUEST["back"];?>" />
<input name="search_type" type="hidden" id="search_type" value="<?php echo $_REQUEST["search_type"];?>" />
<input name="user_type" type="hidden" id="user_type" value="<?php echo $_REQUEST["user_type"];?>" />
<input name="users_sn_h" type="hidden" id="users_sn_h" value="<?php echo $users_sn;?>" />
<input name="old_companyname" type="hidden" id="old_companyname" class="text_t" value="<?php echo $companyname;?>" />
<input name="old_companymail" type="hidden" id="old_companymail" class="text_t" value="<?php echo $companymail;?>" />

<div class="right">
<div class="position">当前位置  > 成为会员</div>
<div class="cont">
<ul>
<li><h4>会员编号</h4> 
<input name="users_sn" type="text" id="users_sn" class="text_t" value="<?php echo $users_sn;?>" readonly="readonly" style="background:#999" />
</li>
<li><h4>公司编号</h4> 
<input name="companynum" type="text" id="companynum" class="text_t" value="<?php echo $companynum;?>" readonly="readonly" style="background:#999" />
</li>
<li><h4>注册邮箱</h4> 
<input name="companymail" type="text" id="companymail" class="text_t" value="<?php echo $companymail;?>" />
<input type="button" value="检测注册邮箱" onclick="do_check_companymail()"/>
</li>
<li><h4>性别</h4>
<?php if ($sex=="先生"): ?>
	<input type='radio' value="先生" name='sex' checked="checked"/> Mr.先生
	<input type='radio' value="女士" name='sex'/> Mr.女士
<?php elseif($sex="女士") : ?>
	<input type='radio' value="先生" name='sex' /> Mr.先生
	<input type='radio' value="女士" name='sex' checked="checked"/> Mr.女士
<?php endif ?>
</li>
<li><h4>会员头像</h4> 
   <img id="txtimg" style="width:129px; height:145px;float:left;" src="../<?php echo $img;?>"/>

   <div class="looking_">
   <a href="#">&nbsp;上传头像</a>
   <div>
           <input type="hidden" name="img" id="img" value="<?php echo $img;?>"/>
        <iframe src="../ajaxfileupload_user_info_admin.php?txtid=img&imgid=txtimg" onload="turnHeight('iframe1');" frameBorder=0 scrolling="no" style="height:25px;"></iframe>
   </div>
   </div>
</li>
<li><h4>我需要或我有</h4>
<?php echo $label2selectstr;?>
</li>
<?php if($mestype1!=5): ?>
<li><h4>会员类型</h4> 
<?php echo $radiouser_type;?>
</li>
<?php endif; ?>
<li><h4>我是</h4>
<?php echo $label1selectstr;?>
</li>
<?php if($mestype1==5): ?>
<li><h4>其他申请说明</h4>
<textarea class="midd" rows="10" cols="60" name="mycontent" id="mycontent"><?php echo $mycontent;?></textarea>
</li>
<?php endif; ?>

<li><h4>审核</h4> 
<?php echo $radioispass;?>
</li>

<li id="li_trade" style="display:<?php echo $div_trade_show;?>"><h4>交易角色</h4>
<div id="div_trade" style="display:<?php echo $li_trade_show;?>">
<?php echo $tradelist;?>
</div>
</li>
<li style="display:none"><h4>业务类型</h4> 
<?php echo $radioisdujia;?>
</li>
<li><h4>密码</h4> 
<input name="userpwd" type="text" id="userpwd" class="text_t" value="<?php echo $userpwd2;?>" />
</li>
<li><h4>公司名称</h4> 
<input name="companyname" type="text" id="companyname" class="text_t" value="<?php echo $companyname;?>" />
</li>
<li style="display:none"><h4>项目类型</h4> 
<?php echo $pro_typelist;?>
</li>
<li><h4>公司网址</h4>
<input name="companywebsite" type="text" id="companywebsite" class="text_t" value="<?php echo $companywebsite;?>" />
</li>
<li><h4>行业</h4>
<?php echo $industry_typestr;?>
</li>

<li><h4>国家</h4>
<select class="slc" name="countrySlc" id="countrySlc" onchange="getprovincial()"><?php echo $countrystr;?></select>
</li>
<li><h4>省</h4>
<?php echo  $provincialstr;?>
</li>
<li><h4>市</h4>
<select name="citySlc" id="citySlc" ><option value="-1">无</option></select>
</li>
<li><h4>姓名</h4>
<input name="truename" type="text" id="truename" class="text_t" value="<?php echo $truename;?>" />
</li>
<li><h4>职务</h4>
<input name="jobtitle" type="text" id="jobtitle" class="text_t" value="<?php echo $jobtitle;?>" />
</li>
<li style="display:none"><h4>联系邮箱</h4>
<input name="contact_mail" type="text" id="contact_mail" class="text_t" value="<?php echo $contact_mail;?>" />
</li>
<li><h4>电话</h4>
<input name="telephone" type="text" id="telephone" class="text_t" value="<?php echo $telephone;?>" />
</li>
<li><h4>手机</h4>
<input name="mobile" type="text" id="title" class="text_t" value="<?php echo $mobile;?>" />
</li>

<li id="fileli" style="display:block"><h4>时间</h4>
<input type="text" name="createtime" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate" style="width:220px" value="<?php echo $createtime;?>"/>
</li>

<li>
<img src="images/loading5.gif" style="display:none" id="imgload"/>
<input type="submit" name="Button1" value="<?php echo $btnname;?>" id="btnsubmit" style="display:block" /></li>
</ul>
</div>
</div>
    </form>
</body>
<script type="text/javascript">
	 var xpro = document.getElementById('xpro').value.replace(/(\s*$)/g, "");
	 var xcity = document.getElementById('xcity').value.replace(/(\s*$)/g, "");
  function getprovincial()
  {
	 var countryid = $("#countrySlc").find('option:selected').val();
	 if(countryid == "1")
	 {		

	 var sltAreaInfo = document.getElementById('provincialSlc');
			   $.ajax({
		   type: "POST",
		   url: "../actionServer.php",
		   data: "action=provincial",
		   success: function(msg){
			 document.getElementById('provincialSlc').disabled = false;
			 document.getElementById('citySlc').disabled = false;
			 var myarr1 = msg.split(",");
			  sltAreaInfo.options.length = 0;
			 for(var i = 0;i < myarr1.length-1;i++)
			 {
			   var myarr2 = myarr1[i].split("|");
			   var oOption = document.createElement("OPTION");

				sltAreaInfo.options.add(new Option(myarr2[1], myarr2[0]));	   
				
			 }
			 $("#provincialSlc").attr("value",xpro);
			 getcity();
	
		   }
		});
	 }
	 else
	 {
		 	var sltAreaInfo = document.getElementById('provincialSlc');
			 sltAreaInfo.options.length = 0;
			 sltAreaInfo.options.add(new Option("无","-1"));
			  document.getElementById('provincialSlc').disabled = true;
			 document.getElementById('citySlc').disabled = true;
			 getcity();
	 }

	 
  }
  
   function getcity()
  {
	 var pid = $("#provincialid").find('option:selected').val();
	 var countryid = $("#countrySlc").find('option:selected').val();
	 if(countryid == "1")
	 {
		 	 
	 var sltAreaInfo = document.getElementById('citySlc');
			   $.ajax({
		   type: "POST",
		   url: "../actionServer.php",
		   data: "action=city&pid=" + pid,
		   success: function(msg){
			 var myarr1 = msg.split(",");
			  sltAreaInfo.options.length = 0;
			 for(var i = 0;i < myarr1.length-1;i++)
			 {
			   var myarr2 = myarr1[i].split("|");
			   var oOption = document.createElement("OPTION");
				sltAreaInfo.options.add(new Option(myarr2[1], myarr2[0]));	   
			 }
			setcity();
	
		   }
		});
	 }
	 else
	 {
		 		 	var sltAreaInfo = document.getElementById('citySlc');
			 sltAreaInfo.options.length = 0;
			 sltAreaInfo.options.add(new Option("无","-1"));
	 }

  }
  function setcity()
  {
	   b =document.getElementById("xcity").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
	          for(var i = 0;i < document.getElementById('citySlc').children.length;i++)
              {
                  var a = document.getElementById('citySlc').options[i].value;
				  a = a.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
                 if(a.replace(/(\s*$)/g, "")== b.replace(/(\s*$)/g, ""))
                 {
				
                    document.getElementById('citySlc').options[i].selected = true;
                 }
              }
  }
  
function check_companymail()
{
	    document.getElementById("imgload").style.display = "inline";
		document.getElementById("btnsubmit").style.display = "none";
	var old_companymail = trim(document.getElementById("old_companymail").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1'));
	var companymail = trim(document.getElementById("companymail").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1'));
    var pro_snflag = false;
		if(old_companymail==companymail)
		{
			pro_snflag = true;
		}
		else
		{
					           $.ajax({
					   type: "POST",
					   async: false,
					   url: "../actionServer.php",
					   data: "action=chk_field&tabname=users&fieldname=companymail&field=" + escape(companymail) ,
					   success: function(msg){
						 msg = msg.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
				        if(msg=="1")
						{
							pro_snflag = true;
						}
						else
						{
							pro_snflag = false;
						}
						 
					   }
					});
		}

	    document.getElementById("imgload").style.display = "none";
		document.getElementById("btnsubmit").style.display = "inline";
	 return pro_snflag;
}
function do_check_companymail()
{
		if(document.getElementById("companymail").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1')=="")
	{
		alert("请填注册邮箱");
		return false;
	}
		
	if(check_companymail())
	{
		alert("注册邮箱可用!");
	}
	else
	{
	   alert("注册邮箱已存在!");
	}
}
function check()
{

	if(document.getElementById("companymail").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1')=="")
	{
		alert("请填注册邮箱");
		return false;
	}
	if($("#provincialid").find('option:selected').val()==0||$("#provincialid").find('option:selected').val()=="")
	{
				alert("请选择省");
		return false;
	}
	if(!check_companymail())
	{
       alert("注册邮箱已存在!");
	   return false;
	}
	
	if(document.getElementById("companyname").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1')=="")
	{
		alert("请填写公司名称");
		return false;
	}
	var o = document.getElementsByName("user_type")
	var user_type_flag = false;
	for(var i = 0;i < o.length;i++)
	{
		if(o[i].checked)
		{
			user_type_flag = true;
		}
	}
	if(!user_type_flag)
	{
		alert("请选择会员类型");
		return false;
	}

}
function showtrade(x)
{
	var div_trade = document.getElementById("div_trade");
	if(x==3)
	{
		var html = "<input type='radio' value='1'  name='trade' class='radio' checked='checked'/>产权人<input type='radio' value='2'  name='trade' class='radio'/>融资人<input type='radio' value='3'  name='trade' class='radio'/>经纪人";
		document.getElementById("li_trade").style.display = "block";
		document.getElementById("div_trade").style.display = "block";
	}
	else if(x==4)
	{
		var html = "<input type='radio' value='4'  name='trade' class='radio' checked='checked'/>投资人<input type='radio' value='5'  name='trade' class='radio'/>投资人代表";
		document.getElementById("li_trade").style.display = "block";
		document.getElementById("div_trade").style.display = "block";
	}
	else
	{
		var html = "<input type='radio' value='4'  name='trade' class='radio' checked='checked'/>投资人<input type='radio' value='5'  name='trade' class='radio'/>投资人代表";
		document.getElementById("li_trade").style.display = "none";
		document.getElementById("div_trade").style.display = "none";
	}
	div_trade.innerHTML = html;
}
  getcity();
  function ltrim(s){     
    return s.replace(/(^\s*)/, "");  
 }   
 //去右空格;   
function rtrim(s){   
  return s.replace(/(\s*$)/, "");  
}   
 //去左右空格;   
 function trim(s){  
   //s.replace(/(^\s*)|(\s*$)/, "");  
  return rtrim(ltrim(s)); 
 }
</script>
<?php echo $showtradejs;?>
</html>
