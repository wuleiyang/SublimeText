<?php
$pk1=(!isset($_REQUEST['pk'])) ?  1 : (int)$_REQUEST['pk'];
if($_POST){
    print_r($_POST);
    die;
}
if($_REQUEST["action"] == "del" && isset($_GET['id'])){
    $sql = "delete from subscription where id=".$_GET['id'];
    $rs=mysql_query($sql,$conn);
}

 if($_REQUEST["action"] == "delall")
{

		$sql = "delete from subscription where userid=".$_SESSION['verydeals_id']." and pro_kind=".$pk1;
		 $rs=mysql_query($sql,$conn);
}

if($_SESSION['verydeals_user_type']=="4")
{
	$typelink = "subscriptions_.php?pk=".$_REQUEST["pk"]."&m=scpt";
}
else
{
	$typelink = "subscriptions_.php?pk=".$_REQUEST["pk"]."&mp=5";
}

			 $rs=mysql_fetch_array(mysql_query("select * from users where id=".$_SESSION['verydeals_id'].";"));
				 if($rs==true)
				 {
					 if($rs["companymail"]!="")
					 {
						 $email = $rs["companymail"];
		
					 }
				 }
				$submitbtn = "<input type='submit' value='' class='define' id='btnsubmit'  style='background:url(images/define.jpg) no-repeat'/>";

$pk = trim($_REQUEST["pk"])==""||!is_numeric(trim($_REQUEST["pk"]))?2:trim($_REQUEST["pk"]);
if($_SESSION['verydeals_user_type']==4)
{

	$menuGlide = $pk==2?"<li><span></span><a href='my_subcriptions_a1.php?mp=5'><h2>房地产投资</h2>Real Estate Investment</a><label></label></li>
<li class='Glide'><span></span><a href='subscriptions_.php?pk=2&mp=5'><h2>股权投资</h2>Equity Investment</a><label></label></li><li><span></span><a href='subscriptions_.php?pk=3&mp=5'><h2>债权融资</h2> Debt Financing</a><label></label></li>":"<li><span></span><a href='my_subcriptions_a1.php?mp=5'><h2>房地产投资</h2>Real Estate Investment</a><label></label></li>
<li><span></span><a href='subscriptions_.php?pk=2&mp=5'><h2>股权投资</h2>Equity Investment</a><label></label></li><li class='Glide'><span></span><a href='subscriptions_.php?pk=3&mp=5'><h2>债权融资</h2> Debt Financing</a><label></label></li>";

}
else
{
	$menuGlide = $pk==2?"<li><span></span><a href='Subscriptions.php?m=scpt'><h2>房地产投资</h2>Real Estate Investment</a><label></label></li>
<li class='Glide'><span></span><a href='subscriptions_.php?pk=2&m=scpt'><h2>股权投资</h2>Equity Investment</a><label></label></li><li><span></span><a href='subscriptions_.php?pk=3&m=scpt'><h2>债权融资</h2> Debt Financing</a><label></label></li>":"<li><span></span><a href='Subscriptions.php?m=scpt'><h2>房地产投资</h2>Real Estate Investment</a><label></label></li>
<li><span></span><a href='subscriptions_.php?pk=2&m=scpt'><h2>股权投资</h2>Equity Investment</a><label></label></li><li class='Glide'><span></span><a href='subscriptions_.php?pk=3&m=scpt'><h2>债权融资</h2> Debt Financing</a><label></label></li>";

}

$my_sql = "select project.*,industry_type.`name` as 'idstrname' from project,industry_type where project.id > 0 and project.industry_type = industry_type.id and project.ispass=1 and project.pro_kind=".$pk." ";
		
		if(!empty($_REQUEST["pro_citys"]))
		{					
				$tempsqlwheres = "";
				$sqlwheres.=" and (";
				$sizes=count($_REQUEST["pro_citys"]);
				$array=$_REQUEST["pro_citys"];
				for($y = 0;$y < $sizes;$y++){
					if($y==$sizes - 1)
					{
						$sqlwheres.=" project.pro_citys=".$array[$y]." ";
						$tempsqlwheres.=" id=".$array[$y]." ";
					}
					else
					{
						$sqlwheres.=" project.pro_citys=".$array[$y]." or ";
						$tempsqlwheres.=" id=".$array[$y]." or ";
					}
				}
				$tempsqlwheres="select * from pro_citys where ".$tempsqlwheres." ;";
					//echo $tempsqlwheres;exit;
			     $tempsqls=mysql_query($tempsqlwheres,$conn); 
				while($rs=mysql_fetch_array($tempsqls)) 
				{
					$subscription_pro_citys.=$rs["name"]." ";
				}
				
		}
		
   /*投资类型*/
   if(!empty($_REQUEST["hinvestment_type"]))
  {
	  $tempsqlwhere = "";
	  $sqlwhere.=" and (";
			$array = $_REQUEST["hinvestment_type"];  
			$size = count($array);  
			for($y=0; $y< $size; $y++)
			{
				  if($y==$size-1)
				  {
					  $sqlwhere.=" project.investment_type=".$array[$y]." ";
					  $tempsqlwhere.=" id=".$array[$y]." ";
				  }
				  else
				  {
					  $sqlwhere.=" project.investment_type=".$array[$y]." or ";
					  $tempsqlwhere.=" id=".$array[$y]." or ";
				  }
			}
      $table=($pk==2) ? "" : "2";
			   $tempsqlwhere="select * from investment_type{$table} where ".$tempsqlwhere." ;";
			     $tempsql=mysql_query($tempsqlwhere,$conn); 
				while($rs=mysql_fetch_array($tempsql)) 
				{
					$sct_investment_type.=$rs["name"]." ";
				}
		
			
  }
$table=($pk==2) ? "" : "2";
      $sql=mysql_query("select * from investment_type{$table} order by createtime;",$conn);
  $i=1;
  while($rs=mysql_fetch_array($sql)) 
  {
	   if(!empty($_REQUEST["hinvestment_type"]))//存在行业类型
		{  
			for($y=0; $y< $size; $y++)
			{ 
			  if($array[$y]==$rs["id"])
			  {
					  $setPro_flag_investment_type_js .= "setPro_flag('hinvestment_type','link_investment_type','dd_investment_type','".$rs["id"]."','".$rs["name"]."');";
			  }
			   if($i>5&&$array[$y]==$rs["id"]&&$is_show_investment_type_more_value==0)
			  {
				  $is_show_investment_type_more_value = 1;
			  }
		    }
			
		}
		 if($i>5)  //结果大于5
		 {

		    $investment_typelist.="<dd><a href='javascript:void(0)' style='display:none' name='link_investment_type_more' id='link_investment_type_".$rs["id"]."' onclick=\"setPro_flag('hinvestment_type','link_investment_type','dd_investment_type',".$rs["id"].",'".$rs["name"]."');\">".$rs["name"]."</a></dd>";
		 }
		 else
		 {

				if($i==1)
				{
					$investment_typefirst = $rs["id"];
					$investment_typejs = "<script>setinvestment_type(".$rs["id"].",'".$rs["name"]."');</script>";
				}
		
		    $investment_typelist.="<dd><a href='javascript:void(0)' id='link_investment_type_".$rs["id"]."' onclick=\"setPro_flag('hinvestment_type','link_investment_type','dd_investment_type',".$rs["id"].",'".$rs["name"]."');\">".$rs["name"]."</a></dd>";
		 }
		 		 $is_show_investment_type_more = "<input type='hidden' name='is_show_investment_type_more' id='is_show_investment_type_more' value='".$is_show_investment_type_more_value."'/>";

		 if($investment_type==$rs["id"]) //描红
		 {
			$edit_investment_typejs = "<script>setPro_flag('hinvestment_type','link_investment_type','dd_investment_type',".$investment_type.",'".$rs["name"]."');</script>";
		 }

		$i++;
  }
    if($i>5)
  {
	  $investment_typemore = "<div id='investment_type_more' onclick=\"showmore('link_investment_type_more','investment_type_more','is_show_investment_type_more')\" style='cursor:pointer;color:#666'>更多>></div>";
  }
     if(!empty($_REQUEST["hinvestment_type"]))
  {
	$sqlwhere.=" ) ";
  }

      $setPro_flag_more_investment_type_js = "<script>".$setPro_flag_more_investment_type_js."</script>";
	$setPro_flag_investment_type_js = "<script>".$setPro_flag_investment_type_js."</script>";
	
	
	   /*所属行业*/
   if(!empty($_REQUEST["hindustry_type"]))
  {
	  $tempsqlwhere = "";
	  $sqlwhere.=" and (";
			$array = $_REQUEST["hindustry_type"];  
			$size = count($array);  
			for($y=0; $y< $size; $y++)
			{ 
				  if($y==$size-1)
				  {
					  $sqlwhere.=" project.industry_type=".$array[$y]." ";
					  $tempsqlwhere.=" id=".$array[$y]." ";
				  }
				  else
				  {
					  $sqlwhere.=" project.industry_type=".$array[$y]." or ";
					  $tempsqlwhere.=" id=".$array[$y]." or ";
				  }
		   }
		      $tempsqlwhere="select * from industry_type where ".$tempsqlwhere." ;"; 
			     $tempsql=mysql_query($tempsqlwhere,$conn); 
				while($rs=mysql_fetch_array($tempsql)) 
				{
					$sct_industry_type.=$rs["name"]." ";
				}
  }
  if(trim($_REQUEST["pro_citys"])!="")
  {
	  $tempsqlwhere = "";
	        $tempsqlwhere="select * from pro_citys where id=".$_REQUEST["pro_citys"]." ;"; 
			     $tempsql=mysql_query($tempsqlwhere,$conn); 
				while($rs=mysql_fetch_array($tempsql)) 
				{
					$sct_pro_citys.=$rs["name"]." ";
				}
  }
					
      $sql=mysql_query("select * from industry_type order by createtime;",$conn); 
  $i=1;
  while($rs=mysql_fetch_array($sql)) 
  {
	  	  	if(!empty($_REQUEST["hindustry_type"]))
		{  
			for($y=0; $y< $size; $y++)
			{ 
		      if($array[$y]==$rs["id"])
			  {
					  $setPro_flag_industry_type_js .= "setPro_flag('hindustry_type','link_industry_type','dd_industry_type','".$rs["id"]."','".$rs["name"]."');";
			  }
			     if($i>7&&$array[$y]==$rs["id"]&&$is_show_industry_type_more_value==0)
			  {
				  $is_show_industry_type_more_value = 1;
			  }
		
			  //echo unescape($array[$i])."<br>";				
			}  
			
		}
		 if($i>7)
		 {

		    $industry_typelist.="<dd><a href='javascript:void(0)' style='display:none' name='link_industry_type_more' id='link_industry_type_".$rs["id"]."' onclick=\"setPro_flag('hindustry_type','link_industry_type','dd_industry_type',".$rs["id"].",'".$rs["name"]."');\">".$rs["name"]."</a></dd>";
		 }
		 else
		 {

				if($i==1)
				{
					$industry_typefirst = $rs["id"];
					$industry_typejs = "<script>setindustry_type(".$rs["id"].",'".$rs["name"]."');</script>";
				}
						    $industry_typelist.="<dd><a href='javascript:void(0)' id='link_industry_type_".$rs["id"]."' onclick=\"setPro_flag('hindustry_type','link_industry_type','dd_industry_type',".$rs["id"].",'".$rs["name"]."');\">".$rs["name"]."</a></dd>";

		
		 }
		 $is_show_industry_type_more = "<input type='hidden' name='is_show_industry_type_more' id='is_show_industry_type_more' value='".$is_show_industry_type_more_value."'/>";

		$i++;
  }
    if($i>7)
  {
	  $industry_typemore = "<div id='industry_type_more' onclick=\"showmore('link_industry_type_more','industry_type_more','is_show_industry_type_more')\" style='cursor:pointer;color:#666'>更多>></div>";
  }
     if(!empty($_REQUEST["hindustry_type"]))
  {
	$sqlwhere.=" ) ";
  }

      $setPro_flag_more_industry_type_js = "<script>".$setPro_flag_more_industry_type_js."</script>";
	$setPro_flag_industry_type_js = "<script>".$setPro_flag_industry_type_js."</script>";
	
 /*所在城市*/
   if(!empty($_REQUEST["hpro_citys"]))
  {
	  $sqlwhere.=" and (";
			$array = $_REQUEST["hpro_citys"];  
			$size = count($array);  
			for($y=0; $y< $size; $y++)
			{
				if($y==$size-1)
				  {
					  $sqlwhere.=" project.pro_citys=".$array[$y]." ";
				  }
				  else
				  {
					  $sqlwhere.=" project.pro_citys=".$array[$y]." or ";
				  }
			}
  }
      $sql=mysql_query("select * from pro_citys order by createtime;",$conn); 
  $i=1;
  $is_show_pro_citys_more_value = 0;
  while($rs=mysql_fetch_array($sql)) 
  {
	           if(trim($_REQUEST["pro_citys"])!=""&&trim($_REQUEST["pro_citys"])==$rs["id"])
				{
						$pro_cityfirst = trim($_REQUEST["pro_citys"]);
						$cityfirstjs = "<script>setPro_citys(".$rs["id"].",'".$rs["name"]."');</script>";
						$sqlwhere.=" and (project.pro_citys=".$_REQUEST["pro_citys"].") ";
						$pro_cityfirst = trim($_REQUEST["pro_citys"]);
						
				}
				else
				{
					if($i==1)
					{
						$sqlwhere.=" and (project.pro_citys=".$rs["id"].") ";
						$pro_cityfirst = $rs["id"];
						$cityfirstjs = "<script>setPro_citys(".$rs["id"].",'".$rs["name"]."');</script>";
						$pro_cityfirst = $rs["id"];
					}
				}
 
          	if($i>9&&trim($_REQUEST["pro_citys"])==$rs["id"]&&$is_show_pro_citys_more_value==0)
			  {
				  $is_show_pro_citys_more_value = 1;
			  }
			  if(trim($_REQUEST["pro_citys"])==$rs["id"])
			 {
				 $citysstyle = "background:#CC3B3A;color:white";
			 }
			 else
			 {
				 $citysstyle = "";
			 }
			
		 if($i>9)
		 {

		    $pro_cityslist.="<dd name=\"dd_citys\"><a href='javascript:void(0)' id='css_citys_".$rs["id"]."' style='display:none;".$citysstyle."' name='link_pro_citys_more' id='link_pro_citys_".$rs["id"]."' onclick=\"setPro_citys(this,".$rs["id"].",'".$rs["name"]."',pro_citys);\">".$rs["name"]."</a></dd>";
		 }
		 else
		 {

		
		    $pro_cityslist.="<dd name=\"dd_citys\"><a href='javascript:void(0)' id='css_citys_".$rs["id"]."' style='display:inline;".$citysstyle."'  id='link_pro_citys_".$rs["id"]."' onclick=\"setPro_citys(this,".$rs["id"].",'".$rs["name"]."',pro_citys);\">".$rs["name"]."</a></dd>";
		 }
		 $is_show_pro_citys_more = "<input type='hidden' name='is_show_pro_citys_more' id='is_show_pro_citys_more' value='".$is_show_pro_citys_more_value."'/>";

		 if($pro_citys==$rs["id"])
		 {

			$edit_pro_citysjs = "<script>setPro_flag('hpro_citys','link_pro_citys','dd_pro_citys',".$pro_citys.",'".$rs["name"]."');</script>";
		 }

		$i++;
  }

  if($i>9)
  {
	  $pro_citysmore = "<div id='pro_citys_more' onclick=\"showmore('link_pro_citys_more','pro_citys_more','is_show_pro_citys_more')\" style='cursor:pointer;color:#666'>更多>></div>";
  }
   $set_pro_citys_showmore_js = "<script>showmore('link_pro_citys_more','pro_citys_more','is_show_pro_citys_more');initshowmore('link_pro_citys_more','pro_citys_more','is_show_pro_citys_more');</script>";
     if(!empty($_REQUEST["hpro_citys"]))
  {
	$sqlwhere.=" ) ";
  }

      $setPro_flag_more_pro_citys_js = "<script>".$setPro_flag_more_pro_citys_js."</script>";
	$setPro_flag_pro_citys_js = "<script>".$setPro_flag_pro_citys_js."</script>";
	
 /*交易报价*/
   if(!empty($_REQUEST["hpro_offer"]))
  {
            $tempsqlwhere = "";
			$array = $_REQUEST["hpro_offer"];  
			$size = count($array);  
				for($y=0; $y< $size; $y++)
			{
					 if($y==$size-1)
					  {
						  //$sqlwhere.=" pro_offer=".$array[$y]." ";
						   $offerwhere.=" id=".$array[$y]." ";
						   $tempsqlwhere.=" id=".$array[$y]." ";
					  }
					  else
					  {
						  //$sqlwhere.=" pro_offer=".$array[$y]." or ";
						  $offerwhere.=" id=".$array[$y]." or ";
						   $tempsqlwhere.=" id=".$array[$y]." or ";
					  }
			}
			   $tempsqlwhere="select * from pro_offer where ".$tempsqlwhere." ;"; 
			     $tempsql=mysql_query($tempsqlwhere,$conn); 
				while($rs=mysql_fetch_array($tempsql)) 
				{
					$sct_pro_offer.=$rs["name"]." ";
				}
			$offersql = "select * from pro_offer where ".$offerwhere.";";
			$sqloffer=mysql_query($offersql,$conn); 
			$offercount = mysql_num_rows($sqloffer);
			$sqlwhere.=" and ";
			$n = 1;
			  while($rs=mysql_fetch_array($sqloffer)) 
			  {
				  		 if($n==$offercount)
					  {
						   $sqlwhere.=" (project.price>=".$rs["offer_min"]." and project.price<=".$rs["offer_max"].") ";
					  }
					  else
					  {
						  $sqlwhere.=" (project.price>=".$rs["offer_min"]." and project.price<=".$rs["offer_max"].") or ";
					  }
					  $n++;
			  }
  }
      $sql=mysql_query("select * from pro_offer order by createtime;",$conn); 
  $i=1;
  while($rs=mysql_fetch_array($sql)) 
  {
	  	  	if(!empty($_REQUEST["hpro_offer"]))
		{  
			for($y=0; $y< $size; $y++)
			{ 
			  if($array[$y]==$rs["id"])
			  {
			 $setPro_flag_pro_offer_js .= "setPro_flag('hpro_offer','link_pro_offer','dd_pro_offer','".$rs["id"]."','".$rs["name"]."');";
			  }
		       if($i>5&&$array[$y]==$rs["id"]&&$is_show_pro_offer_more_value==0)
			  {
				  $is_show_pro_offer_more_value = 1;
			  }
		
			  //echo unescape($array[$i])."<br>";				
			}  
			
		}
		 if($i>5)
		 {

		    $pro_offerlist.="<dd><a name='link_pro_type_more' href='javascript:void(0)' style='display:none' name='link_pro_offer_more' id='link_pro_offer_".$rs["id"]."' onclick=\"setPro_flag('hpro_offer','link_pro_offer','dd_pro_offer',".$rs["id"].",'".$rs["name"]."');\">".$rs["name"]."</a></dd>";
		 }
		 else
		 {

				if($i==1)
				{
					$pro_offerfirst = $rs["id"];
					$pro_offerjs = "<script>setpro_offer(".$rs["id"].",'".$rs["name"]."');</script>";
				}
		
		    $pro_offerlist.="<dd><a href='javascript:void(0)' id='link_pro_offer_".$rs["id"]."' onclick=\"setPro_flag('hpro_offer','link_pro_offer','dd_pro_offer',".$rs["id"].",'".$rs["name"]."');\">".$rs["name"]."</a></dd>";
		 }
		 $is_show_pro_offer_more = "<input type='hidden' name='is_show_pro_offer_more' id='is_show_pro_offer_more' value='".$is_show_pro_offer_more_value."'/>";

		 if($pro_offer==$rs["id"])
		 {

			$edit_pro_offerjs = "<script>setPro_flag('hpro_offer','link_pro_offer','dd_pro_offer',".$pro_offer.",'".$rs["name"]."');</script>";
		 }

		$i++;
  }

  if($i>5)
  {
	  $pro_offermore = "<div id='pro_type_more' onclick=\"showmore('link_pro_type_more','pro_type_more','is_show_pro_type_more')\" style='cursor:pointer;color:#666'>更多>></div>";
  }
      $setPro_flag_more_pro_offer_js = "<script>".$setPro_flag_more_pro_offer_js."</script>";
	$setPro_flag_pro_offer_js = "<script>".$setPro_flag_pro_offer_js."</script>";
	
	
	
if($_REQUEST["keys"]!="")
{
	$keys = trim($_REQUEST["keys"]);
	$keys = unescape($keys);
	$sqlwhere.=" and(project.title like '%".$keys."%' or project.title1 like '%".$keys."%') ";
}
$ordertype = trim($_REQUEST["ordertype"])==""?"createtime":trim($_REQUEST["ordertype"]);
$isdesc = trim($_REQUEST["isdesc"])==""?"desc":trim($_REQUEST["isdesc"]);
$isdesc = $isdesc=="desc"?"asc":"desc";
$my_sql.=$sqlwhere;
if($ordertype=="createtime")
{
	if($isdesc=="desc")
	{
		$orderbylist = "<div class='Time_'><a href='#' onclick=\"setorder('price')\">交易报价</a></div><div class='Time_'><a href='#' class='action' onclick=\"setorder('createtime')\">发布时间</a></div>";

	}
	else
	{
		$orderbylist = "<div class='Time_'><a href='#' onclick=\"setorder('price')\">交易报价</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div>";

	}
}
else if($ordertype=="price")
{
	if($isdesc=="desc")
	{
		$orderbylist = "<div class='Time_'><a href='#' class='action' onclick=\"setorder('price')\">交易报价</a></div><div class='Time_'><a href='#'  onclick=\"setorder('createtime')\">发布时间</a></div>";

	}
	else
	{
		$orderbylist = "<div class='Time_'><a href='#' onclick=\"setorder('price')\">交易报价</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div>";

	}

}
        if($subscription_pro_citys!="")
		{
					$orderby = " order by ".$ordertype." ".$isdesc." ";
				
				$my_sql.=$orderby;
				$ps = 6;
				$rs=mysql_query($my_sql);
				$allcount = mysql_num_rows($rs);
				$sqlpage =  getlimitsql($my_sql,$ps);
				$yeshu=ceil($allcount/$ps);
				$dt = mysql_query($sqlpage,$conn);
				while($row = mysql_fetch_array($dt))
				{
					$describe_content = replaceHtmlAndJs($row["describe_content"]);
				   $describe_content = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$describe_content);   
				   $describe_content = strlen($describe_content)>230?strMax($describe_content, 230):$describe_content;
				   $createtime = date('Y-m-d', strtotime($row["createtime"]));
				   $title = $row["title"];
				   $mail_content.="<p><b>".$title."</b>&nbsp;"."<br><a href='http://".$_SERVER['HTTP_HOST']."/project_details.php?id=".$row["id"]."'>".$describe_content."</a></p>";
				   
				   $rs=mysql_fetch_array(mysql_query("select * from pro_citys where id=".$row['pro_citys'].";"));
				   $xpro_citysname = $rs["name"];
				   $rs=mysql_fetch_array(mysql_query("select * from pro_area where id=".$row['pro_area'].";"));
				   $xpro_areaname = $rs["name"];
  	
				}
					if($sct_investment_type==''){$sct_investment_type='全部';}
					if($sct_industry_type==''){$sct_industry_type='全部';}
					if($sct_pro_offer==''){$sct_pro_offer='全部';}
					$subscription_sql = "insert into subscription(userid,pro_kind,investment_type,industry_type,pro_offer,pro_citys,createtime)values(".$_SESSION['verydeals_id'].",'".$_REQUEST["pk"]."','".$sct_investment_type."','".$sct_industry_type."','".$sct_pro_offer."','".$subscription_pro_citys."',now());";
					//echo $subscription_sql;exit;
				  $rs_x=mysql_fetch_array(mysql_query("select * from subscription where userid = ".$_SESSION['verydeals_id']." and pro_kind='".$_REQUEST["pk"]."' and investment_type = '".$sct_investment_type."' and industry_type = '".$sct_investment_type."' and pro_offer ='".$sct_pro_offer."' and pro_citys = '".$sct_pro_citys."' ;"));//查询一次是否存在过该键值
                  if($rs_x!=true)
				  {
				  	 $rs=mysql_query($subscription_sql,$conn);
				     $rs=mysql_fetch_array(mysql_query("select * from users where id=".$_SESSION['verydeals_id'].";"));
					if($rs==true)
					 {
						 if($rs["companymail"]!="")
						 {
							 $email = $rs["companymail"];


                             //todo 发送订阅邮件

									//sendmail($rs["companymail"],"威地投资信息快报 VD Newsletter",$mail_content);
						 }
					 }
				  }
		
		
				echo "<script type='text/javascript'>location.href='actionServer.php?action=subscriptions&pk=".$_REQUEST["pk"]."';</script>";
				exit;

		}
?>
      <form method="get" name="form_search" id="form_search" action="subscriptions_.php" onsubmit="return check()">
     <input type="hidden" name="action" value="go"/>
     <input type="hidden" name="ordertype" id="ordertype" value="<?php echo $ordertype;?>"/>
     <input type="hidden" name="isdesc" id="isdesc" value="<?php echo $isdesc;?>"/>
     <input type="hidden" name="pk" id="pk" value="<?php echo $pk;?>"/>
<div class="Estate" style="margin:15px 0 0 11px;">
      <div class="Blue">
       <ul>
<?php echo $menuGlide; ?>
       </ul>
      </div>
       <div class="middle">
        <div class="Six">
        <!--1-->
        <div class="Sail">
          <table width="623" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="75" align="left" valign="top"><h2><?php if($_REQUEST['pk']==2) echo "投资类型";else echo "融资类型"; ?>：</h2></td>
    <td width="40" align="left" valign="top"><a href="#" id='link_investment_type_all' class="Unique" onclick="del_all_flag('hinvestment_type','link_investment_type','dd_investment_type','link_investment_type_all')">全部</a></td>
    <td align="left" valign="top">
    <dl class="Haas">
<?php echo $investment_typelist;?>
<dd id="div_investment_type_more">
 <?php echo $investment_typemore;?>

         </dd>
<dd id='dd_investment_type' style='display:none'></dd>
         </dl>
    </td>
  </tr>
</table>
         
         <div class="clear"></div>
         </div>
         <!--2-->
        <div class="Sail">
          <table width="623" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="75" align="left" valign="top"><h2>所属行业：</h2></td>
    <td width="40" align="left" valign="top"><a href="#" class="Unique" id='link_industry_type_all' onclick="del_all_flag('hindustry_type','link_industry_type','dd_industry_type','link_industry_type_all')">全部</a></td>
    <td align="left" valign="top">
    <dl class="genre">
<?php echo $industry_typelist;?>
<dd id="div_industry_type_more">
 <?php echo $industry_typemore;?>
         </dd>
<dd id='dd_industry_type' style='display:none'></dd>

         </dl>
    </td>
  </tr>
</table>
         
         <div class="clear"></div>
         </div>
         <!--3-->
        <div class="Sail">
          <table width="623" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="75" align="left" valign="top"><h2>所在城市：</h2></td>
    <td width="40" align="left" valign="top"><a href="javascript:void(0)" id='link_pro_citys_all' class="Unique" onclick="del_all_flag('hpro_citys','link_pro_citys','dd_pro_citys','link_pro_citys_all')">全部</a></td>
    <td align="left" valign="top">
    <dl class="genre">
<?php echo $pro_cityslist;?>
<dd id="div_pro_citys_more">
 <?php echo $pro_citysmore;?>
         </dd>
<dd id='dd_pro_citys' style='display:none'><input type="hidden" name="pro_citys[]" id="pro_citys" value="<?php echo $pro_cityfirst;?>"/></dd>

         </dl>
    </td>
  </tr>
</table>
         
         <div class="clear"></div>
         </div>
         <!--4-->
        <div class="Sail">
          <table width="623" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="75" align="left" valign="top"><h2>交易报价：</h2></td>
    <td width="40" align="left" valign="top"><a href="#" class="Unique" id='link_pro_offer_all' onclick="del_all_flag('hpro_offer','link_pro_offer','dd_pro_offer','link_pro_offer_all')">全部</a></td>
    <td align="left" valign="top">
    <dl class="acreage">
<?php echo $pro_offerlist;?>
 <dd id="div_pro_offer_more">
 <?php echo $pro_offermore;?>
         </dd>
<dd id='dd_pro_offer' style='display:none'></dd>
         </dl>
    </td>
  </tr>
</table>
        
         <div class="clear"></div>
         </div>
         <!--已选择
        <div class="Select">
         <table width="623" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="75" align="left" valign="top"><h2>您已选择：</h2></td>
    <td align="left" valign="top" class="infer">
     <a href="#" title="取消" class="par"><label>投资类型：</label>风险投资</a>
     <a href="#" title="取消" class="par"><label>所属行业：</label>房地产</a>
     <a href="#" title="取消" class="par"><label>所在区域：</label>北京</a>
     <a href="#" title="取消" class="par"><label>交易报价：</label>5千万～1亿</a>
    </td>
  </tr>
</table>

         </div>-->
         
        </div>
       </div>
       <div class="Bottom"></div>
     </div>
     <table width="662" border="0" cellspacing="0" cellpadding="0" class="tabulation">
  <tr>
    <td colspan="2" align="left" valign="top">您的订阅邮箱：<?php echo $email;?></td>
    </tr>
 <!-- <tr>
    <td colspan="2" align="left" valign="top">请选择简报发送频率（可多选）：</td>
    </tr>-->
  <tr>
    <td colspan="2">
     <table width="662" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="73" align="left" valign="top">订阅验证码：</td>
    <td width="96" align="left" valign="top"><input type="text" class="code" name="chkcode" id="chkcode" /></td>
    <td width="498" align="left" valign="top"><!--<img src="checkNum_session.php" id="checkimg" style="cursor:pointer;width:60px; height:24px;" class="codeImg"  onClick="this.src = 'checkNum_session.php?' + Math.random();"/>--><img id="code" src="verfy.php" style="margin-top:5px;" class="img" width="60" height="24" alt="看不清楚，换一张" title="看不清楚，换一张" style="cursor: pointer; vertical-align:middle;" onClick="this.src=this.src+'?'+Math.random();" /></td>
  </tr>
      <tr style="display:none" id="tr_err">
    <td colspan="3" align="left" valign="top"  style="color: #f00;">验证码不正确</td>
    </tr>
</table>
<tr><td height="10"></td></tr>
 <tr>
    <td colspan="2" align="left" valign="top">
      <img src="images/loading5.gif" id="imgload" style="display:none"/>
   <?php echo $submitbtn;?>
    </td>
    </tr>
    </td>
    </tr>
</table>
     </form>
              <?php

		 	 $rs=mysql_fetch_array(mysql_query("select count(*) from subscription where userid =".$_SESSION['verydeals_id']." and pro_kind='".$_REQUEST["pk"]."' order by createtime;"));
             if($rs==true)
			 {
				 $subscription_count = $rs[0];
			 }
		 ?>