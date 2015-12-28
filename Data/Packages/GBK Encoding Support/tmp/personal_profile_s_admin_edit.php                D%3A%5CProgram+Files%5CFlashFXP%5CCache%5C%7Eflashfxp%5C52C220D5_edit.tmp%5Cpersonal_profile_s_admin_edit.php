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
<div class="position" style="color:#C30">当前位置 > 会员管理 > 个人信息</div>
   <?php
   	   $sql = "select * from users where id=".$_REQUEST['ci'].";";
	   $rs=mysql_fetch_array(mysql_query($sql));
	   $name = $rs["name"];
	   $truename = $rs["truename"];
	   $birthday = $rs["birthday"];
	    $users_sn = $rs["users_sn"];
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
		  $jobtitle = $rs["jobtitle"];
	    $countryid = trim($rs["countryid"]);
		 $provincialid = $rs["provincialid"];
		 $pro_type = trim($rs["pro_type"]);
		  $contact_mail = $rs["contact_mail"];
		 $sex = $rs["sex"]==""?"先生":$rs["sex"];
		 $sexstr = $sex=="先生"?"     <input type='radio' name='sex' value='先生' checked='checked' style='margin:8px 5px 0 0;'/><label>先生</label><input type='radio' name='sex' value='女士' style='margin:8px 5px 0 0;'/><label>女士</label>":"<input type='radio' name='sex' value='先生' style='margin:8px 5px 0 0;'/><label>先生</label><input type='radio' name='sex' value='女士' checked='checked' style='margin:8px 5px 0 0;'/><label>女士</label>";
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
  if($pro_type=="房地产投资")
  {
	  $first_pro_type_name = "房地产投资";
	  $pro_typelist = "<a href='#' onclick=\"setpro_type('房地产投资')\">房地产投资</a><a href='#' onclick=\"setpro_type('股权投资')\">股权投资</a><a href='#' onclick=\"setpro_type('债券投资')\">债券投资</a>";
  }
  else   if($pro_type=="股权投资")
  {
	  $first_pro_type_name = "股权投资";
	  $pro_typelist = "<a href='#' onclick=\"setpro_type('房地产投资')\">房地产投资</a><a href='#' onclick=\"setpro_type('股权投资')\">股权投资</a><a href='#' onclick=\"setpro_type('债券投资')\">债券投资</a>";
  }
    else   if($pro_type=="债券投资")
  {
	  $first_pro_type_name = "债券投资";
	  $pro_typelist = "<a href='#' onclick=\"setpro_type('房地产投资')\">房地产投资</a><a href='#' onclick=\"setpro_type('股权投资')\">股权投资</a><a href='#' onclick=\"setpro_type('债券投资')\">债券投资</a>";
  }
   ?>
   </div>
    <div class="heart_left">
     <div class="White">
       <div class="Gray">
         <div class="manage ">个人信息 <label class="script"> Personal Information</label></div>
          <div class="MyInves">
           <div class="MyInves_">
            <div class="co_worker">
          <ul>
           <li class="Point"><label></label><a href="ersonal_profile_s_admin_edit.php?ci=<?php echo $_REQUEST["ci"];?>">个人档案 <span>Personal Profile</span></a></li>
           <li><label></label><a href="company_profile_S_admin.php?ci=<?php echo $_REQUEST["ci"];?>">公司档案 <span> Company Profile</span></a></li>
          </ul>
         </div>
         <form method="post" action="actionServer.php" onsubmit="return check()">
         <input type="hidden" name="action" value="updateinfo"/>
         <input type="hidden" name="pro_type" id="pro_type" value="<?php echo $pro_type;?>"/>
         <input type="hidden" name="companynum" id="companynum" value="<?php echo $companynum;?>"/>
         <input type="hidden" name="countryid" id="countryid" value="<?php echo $countryid;?>"/>
         <input type="hidden" name="provincialid" id="provincialid" value="<?php echo $provincialid;?>"/>
         <input type="hidden" name="city" id="city" value="<?php echo $city;?>"/>
                   <input type="hidden" name="ci" id="ci" value="<?php echo $_REQUEST["ci"];?>"/>
            <div class="colleague">
             <div class="heading"><span>会员姓名： <?php echo $truename;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;会员编号： <?php echo $users_sn;?></span></div>
              <div class="quired">
               <table width="100%" border="0" cellspacing="0" cellpadding="0" class="meter">
  <tr>
   <td width="3%">&nbsp;</td>
   <td colspan="2" align="left" valign="top">
        <input type="hidden" name="img" id="img" value="<?php echo $img;?>"/>
        <iframe src="ajaxfileupload_user_info.php?txtid=img&imgid=txtimg" onload="turnHeight('iframe1');" frameBorder=0 scrolling="no" style="height:25px;"></iframe>
 </div>
   </div>
      <img id="txtimg" style="width:189px; height:205px;float:left;" src="<?php echo $img;?>"/>

   </td>
   </tr>
  <tr>
  <td align="center" valign="top"><font color="#d7433f">*</font></td>
   <td width="10%" align="left" valign="top">称&nbsp;&nbsp;&nbsp;&nbsp;谓：</td>
   <td width="87%"><?php echo $sexstr;?></td>
  </tr>
  <tr>
  <td align="center" valign="top"><font color="#d7433f">*</font></td>
   <td align="left" valign="top">职&nbsp;&nbsp;&nbsp;&nbsp;务：</td>
   <td><input type="text" name="jobtitle" id="jobtitle" value="<?php echo $jobtitle;?>" class="nario5" /></td>
  </tr>
  <tr>
  <td align="center" valign="top"></td>
   <td align="left" valign="top">出生日期：</td>
   <td>
<input type="text" name="birthday" id="birthday" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" style="width:195px" value="<?php echo $birthday;?>"/>
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
 <tr><td height="20"></td></tr>
  <tr style="display:none">
    <td width="3%" align="center" valign="top"><font color="#d7433f">*</font></td>
    <td width="10%" align="left" valign="top"> 项目类型：</td>
    <td width="87%" align="left" valign="middle">
        <div class="pick2 moon">
     <div class="choose2"><?php echo $first_pro_type_name;?></div>
     <div class="nextse2 Copy">
     <?php echo $pro_typelist;?>
     </div>
    </div>
    </td>
    </tr>
  <tr>
  <td align="center" valign="top"></td>
    <td align="left" valign="top">公司编号：</td>
    <td align="left" valign="middle"><?php echo $companynum;?></td>
    </tr>

  <tr>
  <td align="center" valign="top"><font color="#d7433f">*</font></td>
    <td align="left" valign="top">办公地址：</td>
    <td align="left" valign="middle"><input type="text" name="companyaddress" id="companyaddress" value="<?php echo $companyaddress;?>" class="nario5" /></td>
    </tr>
    
  <tr>
  <td align="center" valign="top"><font color="#d7433f">*</font></td>
    <td align="left" valign="top"> 国家城市：</td>
    <td align="left" valign="middle">
        <label>国家</label>
    <div class="pick2 moon">
     <div class="choose2"><?php echo $first_country_name;?></div>
     <div class="nextse2 Copy">
     <?php echo $countrylist;?>
     </div>
    </div>
    <label>省</label>

    <div class="pick2 moon">
     <div class="choose2" id="first_provincial_name"></div>
     <div class="nextse2 Copy" id="div_provincial"></div>
    </div>
        <label>市</label>
    <div class="pick2 moon">
     <div class="choose2" id="first_city_name"></div>
     <div class="nextse2 Copy" id="div_city"></div>
    </div>
    </td>
    </tr>   
          <tr>
    <td width="3%" align="center" valign="top">&nbsp;</td>
    <td width="10%" align="left" valign="top"> 联系邮箱：</td>
    <td width="87%" align="left" valign="top"><?php echo $contact_mail;?></td>
    </tr>   
    <tr>
  <td align="center" valign="top"><font color="#d7433f">*</font></td>
    <td align="left" valign="top">电&nbsp;&nbsp;&nbsp;&nbsp;话：</td>
    <td align="left" valign="middle"><input type="text" name="telephone" id="telephone" value="<?php echo $telephone;?>" class="nario5" /></td>
    </tr>
    
    <tr>
  <td align="center" valign="top"><font color="#d7433f">*</font></td>
    <td align="left" valign="top">手&nbsp;&nbsp;&nbsp;&nbsp;机：</td>
    <td align="left" valign="middle"><input type="text" name="mobile" id="mobile" value="<?php echo $mobile;?>" class="nario5" /></td>
    </tr>
    
    <tr>
  <td align="center" valign="top">&nbsp;</td>
    <td align="left" valign="top">传&nbsp;&nbsp;&nbsp;&nbsp;真：</td>
    <td align="left" valign="middle"><input type="text" name="fax" id="fax" value="<?php echo $fax;?>" class="nario5" /></td>
    </tr>
    
    <tr>
   <td colspan="3" align="left" valign="top">
   <div class="prompted" id="tr_err">提&nbsp;&nbsp;&nbsp;&nbsp;示:</div></td>
    </tr>
    
  <tr>
  <td align="right" colspan="3"><input type="image" src="images/Save.jpg" style="float:right;" /></td>
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

<!--底部-->
<div id="footer">
  <script language="javascript">include('footer.html','footer');</script>
<script type="text/javascript" src="js/personal_profile_S.js"></script> 
  </div>
</body>
</html>
