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
   <div class="Login"><div class="Login_left"></div><div class="robinren_"><?php include "include/head_login.php"; ?>
</div></div>
   <div class="heart">
       <div class="Exchange">
     <ul>
<?php getleft(); ?>
</ul>
</div>   <?php
   	   $sql = "select * from users where id=".$_SESSION['verydeals_id'].";";
	   $rs=mysql_fetch_array(mysql_query($sql));
	   $name = $rs["name"];
	   $birthday = $rs["birthday"];
	   $fax = $rs["fax"];
	   $img = trim($rs["img"])==""?"../images/looking.jpg":trim($rs["img"]);
	   $email = $rs["email"];
	   $telephone = $rs["telephone"];
	   $mobile = $rs["mobile"];
	    $enterprise = $rs["enterprise"];
		 $trade = $rs["trade"];
		  $companyname = $rs["companyname"];
		  $companynum = $rs["companynum"];
		  $companyaddress = trim($rs["companyaddress"]);
		   $companywebsite = trim($rs["companywebsite"]);
		   $companydesc = $rs["companydesc"];
		   		$companydesc = replaceHtmlAndJs($companydesc);
		$companydesc = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$companydesc); 
		  $jobtitle = $rs["jobtitle"];
	    $countryid = trim($rs["countryid_com"])==""?"1":trim($rs["countryid_com"]);
		 $provincialid = trim($rs["provincialid_com"])==""?"1":$rs["provincialid_com"];
		 $sex = $rs["sex"]==""?"男":$rs["sex"];
		 $sexstr = $sex=="男"?"<label>男</label>":"<label>女</label>";
		  $city = $rs["city_com"];
		  		  $enterprise = trim($rs["enterprise"]);
				  $trade = trim($rs["trade"]);
				  $industry = $rs["industry"];
				  $logo = trim($rs["logo"])==""?"images/logo_.jpg":trim($rs["logo"]);
	   $rsa=mysql_fetch_array(mysql_query("select * from country where id = ".$countryid.";"));
	   			 $first_country_name = $rsa["name"];
         $sql=mysql_query("select * from industry_type;",$conn); 
	   $i==1;
  while($rs=mysql_fetch_array($sql)) 
  {

		if($industry==trim($rs["id"]))
		 {
			 $industry_typelist.=$rs["name"];

		 }

	 $i++;
  }
  
           $sql=mysql_query("select * from enterprise_type;",$conn); 
	   $i==1;
  while($rs=mysql_fetch_array($sql)) 
  {

	if($enterprise==trim($rs["id"]))
	 {

			 $enterprise_typelist.=" <label>".$rs["name"]."</label>";

	 }

	 $i++;
  }
  
   if($trade==1)
{
	$tradelist = "产权人";
}
else if($trade==2)
{
	$tradelist = "融资人";
}
else if($trade==3)
{
	$tradelist = "经纪人";
}
else if($trade==4)
{
	$tradelist = "投资人";
}
else if($trade==5)
{
	$tradelist = "投资人代表";
}
   ?>
    <div class="heart_right">
     <div class="White">
       <div class="Gray">
         <div class="manage ">个人信息 <label class="script"> Personal Information</label></div>
          <div class="MyInves">
           <div class="MyInves_">
            <div class="co_worker">
          <ul>
           <li><label></label><a href="personal_profile_s_show.php?m=<?php echo $_REQUEST["m"];?>">个人档案 <span>Personal Profile</span></a></li>
           <li class="Point"><label></label><a href="company_profile_s_show.php?m=<?php echo $_REQUEST["m"];?>">公司档案 <span> Company Profile</span></a></li>
          </ul>
         </div>
                     <form method="post" action="actionServer.php" onsubmit="return check()">
         <input type="hidden" name="action" value="update_company"/>
         <input type="hidden" name="countryid" id="countryid" value="<?php echo $countryid;?>"/>
         <input type="hidden" name="provincialid" id="provincialid" value="<?php echo $provincialid;?>"/>
          <input type="hidden" name="industry" id="industry" value="<?php echo $first_industry_type_id;?>"/>
          
         <input type="hidden" name="city" id="city" value="<?php echo $city;?>"/>
            <div class="colleague">
             <div class="heading"><span>公司名称：<?php echo $companyname;?></span></div>
             <div class="heading"><span>公司编号：<?php echo $companynum;?> </span></div>
             <div class="Editor"><a href="company_profile_s.php?m=<?php echo $_REQUEST["m"];?>" class="hold1">编辑</a></div>
             <div class="quired">
               <table width="100%" border="0" cellspacing="0" cellpadding="0" class="meter">
  <tr>
  <td width="2%" align="left" valign="top"></td>
    <td width="10%" align="left" valign="top">所在位置：</td>
    <td width="88%" align="left" valign="top">
     <label id="first_country_name"><?php echo $first_country_name;?></label>
     <label id="first_provincial_name"></label>
     <label id="first_city_name"><?php echo  $city;?></label>
    </td>
  </tr>
  <tr>
  <td align="left" valign="top"></td>
    <td align="left" valign="top">企业类型：</td>
    <td align="left" valign="top">
<?php echo $enterprise_typelist;?>
    </td>
  </tr>
  <tr>
  <td align="left" valign="top"></td>
    <td align="left" valign="top">交易角色：</td>
    <td align="left" valign="top">
<?php echo $tradelist;?>
    </td>
  </tr>
  <tr>
  <td align="left" valign="top"></td>
    <td align="left" valign="top">所属行业：</td>
    <td align="left" valign="top">
     <?php echo $industry_typelist;?>
    </td>
  </tr>
</table>
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr><td height="9"></td></tr>
  <tr>
 	 <td width="2%" align="left" valign="top"></td>
    <td width="10%" align="left" valign="top" style="padding-top:20px">公司LOGO：</td>
    <td width="88%" align="left" valign="top">
    <div class="Avatar"><img id="txtimg" style="width:104px; height:87px;" src="<?php echo $logo;?>" /></div> 
    <div class="padding">
            <input type="hidden" name="logo" id="logo" value="<?php echo $logo;?>"/>
        
    </div>
    </td>
    </tr>
  <tr><td height="9"></td></tr>
  <tr>
  	<td width="2%" align="left" valign="top"></td>
    <td align="left" valign="top">网    址：</td>
    <td align="left" valign="top"><?php echo $companywebsite;?></td>
    </tr>
    <tr><td height="9"></td></tr>
  <tr>
  	<td width="2%" align="left" valign="top"></td>
    <td align="left" valign="top">公司介绍：</td>
    <td align="left" style="line-height:22px; letter-spacing:1px;"><?php echo $companydesc;?></td>
    </tr>
    <tr><td height="9"></td></tr>

</table>

             </div></form>
            </div>
         </div>
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
  <script type="text/javascript" src="js/company_profile_S.js"></script> 
  </div>
</body>

</html>
