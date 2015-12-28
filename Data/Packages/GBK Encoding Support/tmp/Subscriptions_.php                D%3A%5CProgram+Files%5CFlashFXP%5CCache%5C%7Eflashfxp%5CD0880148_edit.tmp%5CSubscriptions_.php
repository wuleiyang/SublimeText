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
     </ul>
    </div>
    <div class="heart_right">
     <div class="White">
       <div class="Gray">
       <div class="manage">我的订阅 <label class="script">My Subscriptions</label></div>
       	<div class="site">请订阅你感兴趣的投资项目</div>
          <div class="MyInves">
            <div class="MyInves_">
            <?php include "include/func_subscriptions_.php"; ?>
            </div>
          </div>
          <?php 
		  if($subscription_count > 0)
		  {
			  ?>
			            <div class="reading"><span>您已订阅<?php echo $subscription_count;?>项条件：</span><a href="<?php echo $typelink;?>&action=delall" onclick="return confirm( '您是否确定删除？ ') ;">全部删除</a></div>

			  <?php
		  }
		  ?>
          <div class="MyInves">
            <div class="MyInves_">
              <div class="tabel">
              <?php
			    $sql=mysql_query("select * from subscription where userid =".$_SESSION['verydeals_id']." and pro_kind = '".$_REQUEST["pk"]."' order by id desc;",$conn); 
           // echo "select * from subscription where userid =".$_SESSION['verydeals_id']." and pro_kind = '".$_REQUEST["pk"]."' order by id desc;";
           while($rs=mysql_fetch_array($sql))
		   {
        ?>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px #cccccc dashed;">
	
  <tr>
    <td width="1%" align="left" valign="middle" border="1"><h2><?php /* echo $rs["pro_citys"]; */?> </h2></td>
    <td width="15%" align="left"><label><?php if($_REQUEST['pk']==2) echo "投资类型";else echo "融资类型"; ?>：</label></td>
    <td width="78%" align="left">
<?php if($rs["investment_type"]==''){ echo '全部'; }else echo $rs["investment_type"];?>
    </td>
    <td width="6%" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="top"><label>所属行业：</label></td>
    <td align="left" valign="top">
<?php if($rs["industry_type"]=='') echo '全部'; else echo $rs["industry_type"];?>
    </td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
		<td align="left" valign="middle">&nbsp;</td>
		<td align="left" valign="top"><label>所在城市：</label></td>
		<td align="left" valign="top">
			<?php if($rs["pro_citys"]==''){ echo '全部'; }else echo $rs["pro_citys"];?>
		</td>
		<td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="top"><label>交易报价：</label></td>
    <td align="left" valign="top">
<?php if($rs["pro_offer"]=='') echo '全部'; else echo $rs["pro_offer"];?>
    </td>
        <td align="right" valign="middle"><a href="<?php echo $typelink;?>&action=del&id=<?php echo $rs["id"];?>" class="Unique" onclick="return confirm( '您是否确定删除？ ') ;">删除</a></td>

  </tr>

</table>
			  <?php
		   }
			  ?>
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
    <script type="text/javascript" src="js/subscriptions_.js"></script>
      <?php echo $setPro_flag_more_investment_type_js;echo $setPro_flag_investment_type_js;?>
      <?php echo $setPro_flag_more_industry_type_js;echo $setPro_flag_industry_type_js;?>
      <?php echo $setPro_flag_more_pro_citys_js;echo $setPro_flag_pro_citys_js;?>
      <?php echo $setPro_flag_more_pro_offer_js;echo $setPro_flag_pro_offer_js;?>
      <?php echo $cityfirstjs;?>
  </div>
</body>
</html>
