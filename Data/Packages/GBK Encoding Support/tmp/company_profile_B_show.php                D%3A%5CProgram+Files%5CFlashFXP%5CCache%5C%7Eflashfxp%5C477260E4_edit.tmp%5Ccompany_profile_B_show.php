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
   <div class="Login"><div class="Login_left"></div><div class="robinren robinren_"><?php include "include/head_login.php"; ?></div></div>
   <div class="heart">
   <div class="terrace">
    <div class="terrace">
       <div class="Exchange">
     <ul>
<?php getleft(); ?>
</ul>
</div>
    <?php
   	   $sql = "select * from users where id=".$_SESSION['verydeals_id'].";";
	   $rs=mysql_fetch_array(mysql_query($sql));
	   $name = $rs["name"];
	   $user_type = $rs["user_type"];
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
		 		 $touzi_type = $rs["touzi_type"];
		 $touzi_city = $rs["touzi_city"];
		 $industry_type = $rs["industry_type"];
		 $trade_scale = $rs["trade_scale"];
		 $fund_type = $rs["fund_type"];
		  $jobtitle = $rs["jobtitle"];
	    $countryid = trim($rs["countryid_com"])==""?"1":trim($rs["countryid_com"]);
		 $provincialid = trim($rs["provincialid_com"])==""?"1":$rs["provincialid_com"];
		 $sex = $rs["sex"]==""?"男":$rs["sex"];
		 $sexstr = $sex=="男"?"     <input type='radio' name='sex' value='男' checked='checked' style='margin:8px 5px 0 0;'/><label>男</label><input type='radio' name='sex' value='女' style='margin:8px 5px 0 0;'/><label>女</label>":"<input type='radio' name='sex' value='男' style='margin:8px 5px 0 0;'/><label>男</label><input type='radio' name='sex' value='女' checked='checked' style='margin:8px 5px 0 0;'/><label>女</label>";
		  $city = $rs["city_com"];
		  		  $enterprise = trim($rs["enterprise"]);
				  $trade = trim($rs["trade"]);
				  $industry = $rs["industry"];
				  $logo = trim($rs["logo"])==""?"images/logo_.jpg":trim($rs["logo"]);

  
  $rs=mysql_fetch_array(mysql_query("select * from country where id =".$countryid.";"));
   $country_name = $rs["name"];
   
      $rs=mysql_fetch_array(mysql_query("select * from provincial where pid =".$provincialid.";"));
   $provincial_name = $rs[1];
   
         $rs=mysql_fetch_array(mysql_query("select * from city where city ='".$city."';"));
   $city_name = $rs[1];
   
      $address_desc = $country_name ;
   if($provincial_name!="")
   {
	   $address_desc.="/".$provincial_name;
   }
      if($city_name!="")
   {
	   $address_desc.="/".$city_name;
   }
  
  
         $sql="select * from industry_type where id=".$industry.";";
		 $rs=mysql_fetch_array(mysql_query($sql));
         $first_industry_type_name = $rs["name"];
		 
           $sql=mysql_query("select * from enterprise_type;",$conn); 
	   $i==1;
  while($rs=mysql_fetch_array($sql)) 
  {

	if($enterprise==trim($rs["id"]))
	 {

	 $enterprise_typelist.="<label>".$rs["name"]."</label>";
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
  	  	$sql=mysql_query("select * from fund_type;",$conn); 
    while($rs=mysql_fetch_array($sql)) 
	{
		        $issel = "";
				$str = explode("-", $fund_type);
				  $n = 1;
				foreach ($str as $value)
				{
					if($n==count($str))	
					{
						  if(trim($value)==trim($rs["name"]))
						   {
							 $fund_type_list.="".$rs["name"];
		
						   }
					}
					else
					{
						if(trim($value)==trim($rs["name"]))
					   {
						 $fund_type_list.="".$rs["name"]."、";
	
					   }
					}
		
				   $n++;
				}
	}
   ?>
    </div> 
    </div>
    <div class="heart_right">
     <div class="White">
       <div class="Gray">
         <div class="manage ">个人信息 <label class="script"> Personal Information</label></div>
          <div class="MyInves">
           <div class="MyInves_">
            <div class="co_worker">
          <ul>
           <li><label></label><a href="personal_profile_B_show.php?m=osf">个人档案 <span>Personal Profile</span></a></li>
           <li class="Point"><label></label><a href="company_profile_B_show.php?m=osf">公司档案 <span> Company Profile</span></a></li>
           <li><label></label><a href="colleagues.php?m=osf">我的同事 <span>My Colleagues</span></a></li>
          </ul>
         </div>
                              <form method="post" action="actionServer.php" onsubmit="return check()">
         <input type="hidden" name="action" value="update_company_B"/>
         <input type="hidden" name="countryid" id="countryid" value="<?php echo $countryid;?>"/>
         <input type="hidden" name="provincialid" id="provincialid" value="<?php echo $provincialid;?>"/>
          <input type="hidden" name="industry" id="industry" value="<?php echo $first_industry_type_id;?>"/>
          
         <input type="hidden" name="city" id="city" value="<?php echo $city;?>"/>

            <div class="colleague">
             <div class="heading"><span>公司名称： <?php echo $companyname;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司编号： <?=$companynum;?> </span><div class="Editor"><a href="company_profile_B.php?m=osf" class="hold1">编辑</a></div></div>
             <div class="quired">
               <table width="100%" border="0" cellspacing="0" cellpadding="0" class="meter">
  <tr>
  <td width="2%" align="left" valign="top"></td>
    <td width="16%" align="left" valign="top">所在位置：</td>
    <td width="82%" align="left" valign="top">
     <div class="choose" id="first_country_name" style='width:auto;padding-left:0px;float:none;'><?php echo $address_desc;?></div>
    </td>
  </tr>
  <tr>
  <td align="left" valign="top"></td>
    <td align="left" valign="top">企业类型：</td>
    <td align="left" valign="top">
<?php echo $enterprise_typelist;?>    </td>
  </tr>
  <tr>
  <td align="left" valign="top"></td>
    <td align="left" valign="top">交易角色：</td>
    <td align="left" valign="top">
<?php echo $tradelist;?>    </td>
  </tr>
  <tr>
  <td align="left" valign="top"></td>
    <td align="left" valign="top">资金类型：</td>
    <td align="left" valign="top">
<?php echo $fund_type_list;?>    </td>
  </tr>
  <tr>
  <td align="left" valign="top"></td>
    <td align="left" valign="top">所属行业：</td>
    <td align="left" valign="top">
     <div class="choose" id="first_industry_type_name"><?php echo $first_industry_type_name;?></div>
    </td>
  </tr>
</table>
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr><td height="9"></td></tr>
  <tr>
    <td width="18%" align="left" valign="top" style="padding-top:20px">&nbsp;&nbsp;公司LOGO：</td>
    <td align="left" valign="top">
       <div class="Avatar"><img id="txtimg" style="width:104px; height:87px;" src="<?php echo $logo;?>" /></div> 
    <div class="padding">
            <input type="hidden" name="logo" id="logo" value="<?php echo $logo;?>"/>
        
    </div>
    </td>
    </tr>
  <tr><td height="9"></td></tr>
  <tr>
    <td align="left" valign="top">&nbsp;&nbsp;网    址：</td>
    <td align="left" valign="top"><?php echo $companywebsite;?></td>
    </tr>
    <tr><td height="9"></td></tr>
  <tr>
    <td align="left" valign="top"><p style='padding-top:3px;'>&nbsp;&nbsp;公司介绍：</p></td>
    <td align="left" valign="top" style="line-height:22px; letter-spacing:1px;"><?php echo $companydesc;?></td>
    </tr>
    <tr><td height="9"></td></tr>
        <tr><td height="9"></td></tr>

            <tr>
   <td colspan="3" align="left" valign="top">
   <div class="prompted2" id="tr_err"></div></td>
    </tr>
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
    <script type="text/javascript" src="js/company_profile_B.js"></script> 

  </div>
</body>

</html>
