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
	$ordertype = trim($_REQUEST["ordertype"])==""?"createtime":trim($_REQUEST["ordertype"]);
$isdesc = trim($_REQUEST["isdesc"])==""?"asc":trim($_REQUEST["isdesc"]);
$isdesc = $isdesc=="asc"?"desc":"asc";
if($ordertype=="createtime")
{
	if($isdesc=="desc")
	{
		$orderbylist = "<td width='84' align='center' valign='top' bgcolor='#f6f6f4'><a href='#' class='Gray_' onclick=\"setorder('createtime')\">入会时间</a></td>";

	}
	else
	{
		$orderbylist = "<td width='84' align='center' valign='top' bgcolor='#f6f6f4'><a href='#' class='jian' onclick=\"setorder('createtime')\">入会时间</a></td>";

	}
}
$xpass1 = trim($_REQUEST["xpass1"])==""?"业务类型":trim($_REQUEST["xpass1"]);
$xpass1 = unescape($xpass1);
$xpass = trim($_REQUEST["xpass"])==""?"投资类型":trim($_REQUEST["xpass"]);
$xpass = unescape($xpass);
$xpass_css = "deal";
$xpass_css1 = "deal";
if($xpass1=="业务类型")
{
	$xpass1where = "";
}
else if($xpass1=="独家")
{
	$xpass1where = " and(users.isdujia=1) ";
	$xpass_css1 = "deal dealRed";
	
}
else if($xpass1=="分享")
{
	$xpass1where = " and(users.isdujia=0) ";
	$xpass_css1 = "deal dealRed";
}

if($xpass=="股权投资")
{
	$xpass="股权投资";
	$xpasswhere = " and(users.touzi_type like '%".$xpass."%') ";
//		$xpass_css = "deal dealRed";
}
else if($xpass=="房地产投资")
{
	$xpass="房地产投资";
	$xpasswhere = " and(users.touzi_type like '%".$xpass."%') ";
	//	$xpass_css = "deal dealRed";
}
else if($xpass=="债权融资")
{
	$xpass="债权融资";

	$xpasswhere = " and(users.touzi_type like '%".$xpass."%') ";
	//	$xpass_css = "deal dealRed";

}
else if($xpass=="投资类型")
{
	$xpass="投资类型";

	$xpasswhere = "";
	//$xpass_css = "deal dealRed";
}
else
{
		$xpass="其他";

	$xpasswhere = " and(users.touzi_type like '%".$xpass."%') ";
	//	$xpass_css = "deal dealRed";
}
if($_REQUEST["keys"]!="")
{
	$keys = trim($_REQUEST["keys"]);
	$keys = unescape($keys);
	$sqlwhere.=" and(users.name like '%".$keys."%' or users.truename like '%".$keys."%') ";
}
$sqlwhere.=$xpass1where.$xpasswhere;
    		$sql = "select users.*,country.`name` as 'countryname' from users,country where users.countryid = country.id and users.user_type = 2 and users.id in(select userid from users_sub where fid=".$_SESSION['verydeals_id']." ) ".$sqlwhere." " ;
		$orderby = " order by users.".$ordertype." ".$isdesc." ";
		$sql.=$orderby;
		$ps = 15;
		$rs=mysql_query($sql);
		$allcount = mysql_num_rows($rs);
		$sqlpage =  getlimitsql($sql,$ps);
		$yeshu=ceil($allcount/$ps);
		$dt = mysql_query($sqlpage,$conn);
		while($row = mysql_fetch_array($dt))
		{
					$xlink = trim($row["user_type"])==1||trim($row["user_type"])==3?"personal_colleagues_s.php?ci=".$row["id"]."&mp=1":"personal_colleagues_b.php?ci=".$row["id"]."&mp=1";
				    $xlink2 = trim($row["user_type"])==1||trim($row["user_type"])==3?"company_colleagues_B.php?ci=".$row["id"]."&mp=1":"company_colleagues_B.php?ci=".$row["id"]."&mp=1";

			$createtime = date('Y-m-d',strtotime($row["createtime"]));
			$list.="<tr><td align='center' valign='top'></td><td align='center' valign='top'><a href='".$xlink."'>".$row["truename"]."</a></td><td align='center' valign='top'>".$row["jobtitle"]."</td><td align='center' valign='top'><a href='".$xlink2."'>".$row["companyname"]."</a></td><td align='center' valign='middle'><p >".trim($row["countryname"])."-".trim($row["city"])."</p></td><td align='center' valign='top'></td><td align='center' valign='top'>".$xpass."</td><td align='center' valign='top'>".$createtime." </td></tr>";
		}
	?>

     </ul>
    </div> 
    <div class="heart_right">
     <div class="White">
       <div class="Gray">
         <div class="manage manage_">我的投资人 <label class="script">My Investors</label></div>
          <div class="MyInves">
            <div class="MyInves_">
              <div class="form">
              <table width="690" border="0" cellspacing="0" cellpadding="0">
                <tr>
    <td colspan="6" align="left" valign="middle" bgcolor="#f6f6f4">
     <form name="myform" id="myform" action="" method="get">
     <input type="hidden" name="ordertype" id="ordertype" value="<?php echo $ordertype;?>"/>
     <input type="hidden" name="isdesc" id="isdesc" value="<?php echo $isdesc;?>"/>
     <input type="hidden" name="xpass1" id="xpass1" value="<?php echo $xpass1;?>"/>
     <input type="hidden" name="xpass" id="xpass" value="<?php echo $xpass;?>"/>
     <input type="hidden" name="pk" value="<?php echo $_REQUEST["pk"];?>"/>
     <input type="hidden" name="mp" id="mp" value="<?php echo $mp ;?>"/>
             <input type="text" value="<?php echo $keys;?>" name="keys" id="keys"  class="textbook"/>
             <input type="image" src="images/sumch.jpg"  class="sumch"/>
             </form>
    </td>
    <td width="88" align="right" valign="middle" bgcolor="#f6f6f4">
         <div class="Options moon" style="width:80px; margin-top:0">
        <div class="<?php echo $xpass_css;?>"><?php echo $xpass;?></div>
        <div class="selectText Copy" style="width:80px; padding:0;">
        <a rel="房地产投资" href="javascript:void(0)" onclick="setxpass('投资类型')">投资类型</a>
        <a rel="房地产投资" href="javascript:void(0)" onclick="setxpass('房地产投资')">房地产投资</a>
        <a rel="股权投资" href="javascript:void(0)" onclick="setxpass('股权投资')">股权投资</a>
        <a rel="债权融资" href="javascript:void(0)" onclick="setxpass('债权融资')">债权融资</a>
        <a rel="其他" href="javascript:void(0)" onclick="setxpass('其他')">其他</a>
        </div>
        </div>
    </td>
    <?php echo $orderbylist;?>
    <td width="77" align="center" valign="middle" bgcolor="#f6f6f4" style="display:none">
    <div class="Options moon" style="width:69px;margin-top:0" style="display:none">
        <div class="<?php echo $xpass_css1;?>" style="display:none"><?php echo $xpass1;?></div>
        <div class="selectText Copy" style="width:69px; padding:0; display:none">
        <a rel="业务类型" href="javascript:void(0)" onclick="setxpass1('业务类型')">业务类型</a>
        <a rel="独家" href="javascript:void(0)" onclick="setxpass1('独家')">独家</a>
        <a rel="分享" href="javascript:void(0)" onclick="setxpass1('分享')">分享</a>
        </div>
        </div>
    </td>
  </tr>
  <?php echo $list;?>
</table>
              </div>
              <!--分页--><div class="pages"><?php echo getpagejs1($yeshu);?></div>
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
<div class="clear"></div> 
<!--底部-->
<div id="footer">
  <script language="javascript">include('footer.html','footer');</script>
  </div>
  <script type="text/javascript">
    function setxpass1(x)
  {
	  document.getElementById("xpass1").value = escape(x);
	  document.myform.submit();
  }
      function setxpass(x)
  {
	  document.getElementById("xpass").value = escape(x);
	  document.myform.submit();
  }
  function setorder(x)
{
	document.getElementById("ordertype").value = x;
	document.myform.submit();
}
  </script>
</body>
</html>
