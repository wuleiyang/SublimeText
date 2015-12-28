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
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
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
   <div class="Login"><div class="Login_left"></div><div class='robinren_'>
   <?php include "include/head_login.php"; ?>
   <?php

   	   $sql = "select * from users where id=".$_SESSION['verydeals_id'].";";
	   $rs=mysql_fetch_array(mysql_query($sql));
	   $name = $rs["name"];
	   $truename = $rs["truename"];
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
		  $companyaddress = $rs["companyaddress"];
		  $companymail = $rs["companymail"];
		  $jobtitle = $rs["jobtitle"];
	    $countryid = trim($rs["countryid"]);
		 $provincialid = $rs["provincialid"];
		 $sex = $rs["sex"]==""?"先生":$rs["sex"];
		 $sexstr = $sex=="先生"?"     <label>先生</label>":"<label>女士</label>";
		  $city = $rs["city"];
       $sql=mysql_query("select * from country;",$conn); 
	   $i==1;
  while($rs=mysql_fetch_array($sql)) 
  {

		if($countryid==trim($rs["id"]))
		 {
			 $first_country_id = $rs["id"];
			 $first_country_name = $rs["name"];
		 }

	 $countrylist.="<a href='#' onclick=\"getprovincial('".$rs["id"]."')\">".$rs["name"]."</a>";
	 $i++;
  }
   ?>
   </div></div>
   <div class="heart">
   
<?php getleft(); ?>


    <div class="heart_right">
     <div class="White">
       <div class="Gray">
         <div class="manage ">个人信息 <label class="script"> Personal Information</label></div>
          <div class="MyInves">
           <div class="MyInves_">
          <div class="co_worker">
          <ul>
           <li class="Point"><label></label><a href="personal_profile_s_show.php?m=<?php echo $_REQUEST["m"];?>">个人档案 <span>Personal Profile</span></a></li>
           <li><label></label><a href="company_profile_s_show.php?m=<?php echo $_REQUEST["m"];?>">公司档案 <span> Company Profile</span></a></li>
          </ul>
         </div>
         <form method="post" action="actionServer.php" onsubmit="return check()">
         <input type="hidden" name="action" value="updateinfo"/>
         <input type="hidden" name="companynum" id="companynum" value="<?php echo $companynum;?>" disabled="disabled"/>
         <input type="hidden" name="countryid" id="countryid" value="<?php echo $countryid;?>"/>
         <input type="hidden" name="provincialid" id="provincialid" value="<?php echo $provincialid;?>"/>
         <input type="hidden" name="city" id="city" value="<?php echo $city;?>"/>
            <div class="colleague">
             <div class="heading"><span>会员姓名： <?php echo $truename;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;会员编号： <?php echo $_SESSION['verydeals_users_sn'];?></span><div class="Editor"><a href="personal_profile_s.php?m=if" class="hold1">编辑</a></div></div>
              <div class="quired">
               <table width="100%" border="0" cellspacing="0" cellpadding="0" class="meter">
  <tr>
   <td width="3%">&nbsp;</td>
   <td colspan="2" align="left" valign="top">
    <div style="width: 191px;height: 207px;overflow: hidden;">
      <img id="txtimg" style="width: 100%;float:left;" src="<?php echo $img;?>"/>
    </div>
   </td>
   </tr>
  <tr>
  <td align="center" valign="top">&nbsp;</td>
   <td width="10%" align="left" valign="top">称&nbsp;&nbsp;&nbsp;&nbsp;谓：</td>
   <td width="87%"><?php echo $sexstr;?></td>
  </tr>
  <tr>
  <td align="center" valign="top"></td>
   <td align="left" valign="top">职&nbsp;&nbsp;&nbsp;&nbsp;务：</td>
   <td><?php echo $jobtitle;?></td>
  </tr>
  <tr>
  <td align="center" valign="top"></td>
   <td align="left" valign="top">出生日期：</td>
   <td>
<?php echo $birthday;?>
   </td>
  </tr>
  
</table>
               <table width="100%" border="0" cellspacing="0" cellpadding="0" class="meter">
               <tr><td height="20"></td></tr>

  <tr>
    <td width="3%" align="center" valign="top"></td>
    <td width="10%" align="left" valign="top"> 公司名称：</td>
    <td width="87%" align="left" valign="middle"><?php echo $companyname;?></td>
    </tr>

  <tr>
  <td align="center" valign="top"></td>
    <td align="left" valign="top">公司编号：</td>
    <td align="left" valign="middle"><?php echo $companynum;?></td>
    </tr>

  <tr>
  <td align="center" valign="top"></td>
    <td align="left" valign="top">办公地址：</td>
    <td align="left" valign="middle"><?php echo $companyaddress;?></td>
    </tr>
    
  <tr>
  <td align="center" valign="top"></td>
    <td align="left" valign="top"> 国家城市：</td>
    <td align="left" valign="middle">
   
	<label> <?php echo $first_country_name;?></label>
     <label id="first_provincial_name"></label>
     <label id="first_city_name"></label>
    </td>
    </tr>
  
  <tr>
  <td align="center" valign="top">&nbsp;</td>
    <td align="left" valign="top">联系邮箱：</td>
    <td align="left" valign="middle"><?php echo $companymail;?></td>
    </tr>
    
    <tr>
  <td align="center" valign="top"></td>
    <td align="left" valign="top">电&nbsp;&nbsp;&nbsp;&nbsp;话：</td>
    <td align="left" valign="middle"><?php echo $telephone;?></td>
    </tr>
    
    <tr>
  <td align="center" valign="top"></td>
    <td align="left" valign="top">手&nbsp;&nbsp;&nbsp;&nbsp;机：</td>
    <td align="left" valign="middle"><?php echo $mobile;?></td>
    </tr>
    
    <tr>
  <td align="center" valign="top">&nbsp;</td>
    <td align="left" valign="top">传&nbsp;&nbsp;&nbsp;&nbsp;真：</td>
    <td align="left" valign="middle"><?php echo $fax;?></td>
    </tr>
</table>
             </div>
            </div></form>
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
<script type="text/javascript" src="js/personal_profile_S.js"></script> 
  </div>
</body>
</html>
