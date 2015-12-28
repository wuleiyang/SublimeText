<?php
if($_REQUEST["action"] == "deldptar")
{
	$id_arr=$_GET[del];
	$id=implode(",",$id_arr);
   $rs=mysql_query("delete from project where id in ($id)",$conn);
   
}
if($_REQUEST["ci"] != "")
{
     $rs=mysql_query("delete from project where id = ".$_REQUEST["ci"].";",$conn);
	 $rs=mysql_query("delete from pro_comment where fid = ".$_REQUEST["ci"].";",$conn);
}
	    	 $deljs = "<script type=\"text/javascript\">var xstr = \"项目发布审核(\" + document.getElementById(\"lbCount\").innerHTML + \")\"; window.parent.frames['leftFrame'].mtreea8_3.innerHTML =xstr ;</script>";

$selusertype = trim($_REQUEST["selusertype"]);
$seluserid = trim($_REQUEST["seluserid"]);
$pk =trim($_REQUEST["pk"])==""|| !is_numeric($_REQUEST["pk"])?"1":trim($_REQUEST["pk"]);
if($pk==1)
{
	$menustr = "<li class='over'><label></label><a href='my_projects_admin.php?m=re&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='my_projects_admin.php?m=re&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='my_projects_admin.php?m=re&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
}
else if($pk==2)
{
	$menustr = "<li><label></label><a href='my_projects_admin.php?m=re&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li class='over'><label></label><a href='my_projects_admin.php?m=re&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='my_projects_admin.php?m=re&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
}
else 
{
	$menustr = "<li><label></label><a href='my_projects_admin.php?m=re&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='my_projects_admin.php?m=re&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li class='over'><label></label><a href='my_projects_admin.php?m=re&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";

}
$ordertype = trim($_REQUEST["ordertype"])==""?"ispass":trim($_REQUEST["ordertype"]);
$isdesc = trim($_REQUEST["isdesc"])==""?"desc":trim($_REQUEST["isdesc"]);
$isdesc = $isdesc=="desc"?"asc":"desc";

	if($_REQUEST["keys"]!="")
{
	  $keys = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_REQUEST["keys"]);   
		  $keys = replaceHtmlAndJs($keys);
		   $keys = unescape($keys);
	$sqlwhere.=" and(title like '%".$keys."%' or title1 like '%".$keys."%') ";
}
if($_REQUEST["selusertype"]=="")
{
 $selusertype_str = "<select name='selusertype' onchange=\"document.myform.submit()\"><option value='' selected='selected'>全部人员</option><option value='1'>管理员</option><option value='2'>发布人</option></select>";
  $seluserid_str="<select name='seluserid' onchange=\"document.myform.submit()\"><option value='' selected='selected'>所有</option></select>";
}
else if($_REQUEST["selusertype"]==1)
{
 $selusertype_str = "<select name='selusertype' onchange=\"document.myform.submit()\"><option value=''>全部人员</option><option value='1' selected='selected'>管理员</option><option value='2'>发布人</option></select>";
    $seluserid_str.="<select name='seluserid' onchange=\"document.myform.submit()\"><option value='' selected='selected'>所有</option>";
	  $sql1=mysql_query("select * from users where user_type=3 order by createtime;",$conn); 
	  while($rs1=mysql_fetch_array($sql1)) 
	  {
		  if($rs1["id"]==$seluserid)
		  {
			  $selected = "selected='selected'";
		  }
		  else
		  {
			 $selected = ""; 
		  }
		  $seluserid_str.="<option value='".$rs1["id"]."' ".$selected.">".$rs1["name"]."</option>";
	  }
	$seluserid_str.="</select>";
}
else if($_REQUEST["selusertype"]==2)
{
 $selusertype_str = "<select name='selusertype' onchange=\"document.myform.submit()\"><option value=''>全部人员</option><option value='1'>管理员</option><option value='2' selected='selected'>发布人</option></select>";
     $seluserid_str.="<select name='seluserid' onchange=\"document.myform.submit()\"><option value='' selected='selected'>所有</option>";
 	  $sql1=mysql_query("select * from users where user_type<>3 and user_type<>4 order by createtime;",$conn); 
	  while($rs1=mysql_fetch_array($sql1)) 
	  {
		  if($rs1["id"]==$seluserid)
		  {
			  $selected = "selected='selected'";
		  }
		  else
		  {
			 $selected = ""; 
		  }
		  $seluserid_str.="<option value='".$rs1["id"]."' ".$selected.">".$rs1["name"]."</option>";
	  }
	$seluserid_str.="</select>";
}



	   if($selusertype==1 && $seluserid=="")
	   {
		   $sqlwhere.=" and project.fid in (select userid from users_sub where users_sub.fid in (select id from users where user_type=3 order by createtime)) ";
	   }
	   else if($selusertype==1 && $seluserid!="")
	   {
		   $sqlwhere.=" and project.fid in (select userid from users_sub where users_sub.fid = ".$seluserid.") ";
	   }
	   else if($selusertype==2 && $seluserid!="")
	   {
		   $sqlwhere.=" and project.fid = ".$seluserid." ";
	   }
	     if($pk==1)
	   {
		   		$sql = "select * from project where project.pro_kind = ".$pk." ".$sqlwhere." ";

	   }
	   else
	   {
		   		$sql = "select project.*,industry_type.`name` as 'industry_type_name' from project,industry_type where project.industry_type = industry_type.id and project.pro_kind = ".$pk." ".$sqlwhere." ";

	   }
	    $extra_order = $ordertype=="ispass"?",project.createtime desc":"";
		$orderby = " order by project.".$ordertype." ".$isdesc." ".$extra_order;
		$sql.=$orderby;
		$ps = 12;
		$rs=mysql_query($sql);
		$allcount = mysql_num_rows($rs);
		$sqlpage =  getlimitsql($sql,$ps);
		$yeshu=ceil($allcount/$ps);
		$dt = mysql_query($sqlpage,$conn);
		while($row = mysql_fetch_array($dt))
		{
			 $sql1 = "select * from users_sub,users where users_sub.fid = users.id and users_sub.userid = ".$row["fid"].";";
             $rs1=mysql_fetch_array(mysql_query($sql1));
			 if($rs1==true)
			 {
				 $root_name = $rs1["name"];
			 }
			 	 $sql1 = "select * from users where users.id  = ".$row["fid"].";";
             $rs1=mysql_fetch_array(mysql_query($sql1));
			 if($rs1==true)
			 {
				 $author_name = $rs1["truename"];
			 }
	
			$createtime = date('Y-m-d',strtotime($row["createtime"]));
			if($pk==1)
			{
				$showlink = "publish_projects_admin.php?m=pr&action=edit&ci=".trim($row['id'])."";
				$titlelink = "project_details_Sadmin.php?back=pro&m=".$_REQUEST["m"]."&id=".trim($row['id'])."&pk=".$_REQUEST["pk"];
			}
			else if($pk==2)
			{
				$showlink = "Equity_sent_admin.php?m=es&action=edit&ci=".trim($row['id'])."";
				$titlelink = "project_details_nadmin.php?back=pro&m=".$_REQUEST["m"]."&id=".trim($row['id'])."&pk=".$_REQUEST["pk"];
			}
			else
			{
				$showlink = "Equity_sent_admin.php?m=zqrz&action=edit&ci=".trim($row['id'])."";
				$titlelink = "project_details_nadmin.php?back=pro&m=".$_REQUEST["m"]."&id=".trim($row['id'])."&pk=".$_REQUEST["pk"];
			}
					if($row["ispass"]==0)
			{
				$ispasstr="<a href='#' class='hue4'>待审核</a>";
			}
			else if($row["ispass"]==1)
			{
				$ispasstr="<a href='#' class='hue5'>已发布</a>";
			}
			else if($row["ispass"]==2)
			{
				$ispasstr="<a href='#' class='hue6'>暂停</a>";
			}
					$locadimg1 = "&nbsp;<img src='images/loading5.gif' id='load1_".$row["id"]."'  style='display:none'/>";
		$linkstrindex1 = "";
				if($row["iselite"] == 1)
				{
					$linkstrindex1 = "<a href='javascript:void(0)' id='link1_".$row["id"]."' onclick=\"setstatus1('".$row["id"]."','project','iselite')\" >已推荐</a>";
				}
				else
				{
				  $linkstrindex1 = "<a href='javascript:void(0)' id='link1_".$row["id"]."' onclick=\"setstatus1('".$row["id"]."','project','iselite')\" >推荐</a>";
				}
				
			$locadimg2 = "&nbsp;<img src='images/loading5.gif' id='load2_".$row["id"]."'  style='display:none'/>";
		    //$linkstrindex2 = "<a href='javascript:void(0)' id='link2_".$row["id"]."' onclick=\"setmail('".$row["pro_citys"]."','".$row["pro_cbd"]."','".$row["pro_type"]."','".$row["pro_area"]."','".$row["sbscpt_offer"]."','".$row["id"]."')\" >订阅</a>";
			$list.="<li><table width='660' border='0' cellspacing='0' cellpadding='0'>";
			$list.="<tr>";
			$list.="<td width='20' rowspan='2' align='center' valign='top'><input type='checkbox' name='del[]' value='".trim($row['id'])."' /></td>";
			$list.="<td width='14' rowspan='3' align='center' valign='top'></td>";
			$list.="<td width='292' align='left' valign='top'><a href='".$titlelink."'>".trim($row['title'])."</a></td>";
			$list.="<td width='152' align='right' valign='top'>￥".trim($row['price'])."亿</td>";
			$list.="<td width='61' align='right' valign='top'>".$ispasstr."</td>";
			$list.="<td width='65'>&nbsp;</td>";
			$list.="<td width='65' align='right' valign='top'>".$linkstrindex1.$locadimg1."</td>";
			$list.="<td width='65' align='right' valign='top'>".$linkstrindex2.$locadimg2."</td>";
			$list.="<td width='66' align='right' valign='top'><a href='".$showlink."' class='color'>修改</a></td>";
			$list.="</tr>";
			$list.="<tr>";
			
			if($row["pro_kind"]==1)
			{
				$list.="<td align='left' valign='top'>面积：".trim($row['area'])."平米   ".trim($row['area_price'])."元/平米<p>产权管理员:".$root_name."</p></td>";
			}
			else
			{
	
				$list.="<td align='left' valign='top'>行业：".trim($row['industry_type_name'])."<p>产权管理员管理员:".$root_name."</p</td>";
			}
			$list.="<td align='right' valign='top'>发布时间：".$createtime."<p>发布人:".$author_name."</p></td>";
			$list.="<td align='right' valign='top'>浏览(<label>".trim($row['clikc_count'])."</label>)</td>";
			$list.="<td align='center' valign='top'>收藏(<label>".trim($row['hot_count'])."</label>)</td>";

			$list.="<td></td><td></td><td align='right' valign='top'><a href='my_projects_admin.php?ci=".$row["id"]."&m=".$_REQUEST["m"]."&pk=".$_REQUEST["pk"]."&p=".$_REQUEST["p"]."' onclick=\"return confirm( '您确认要删除吗？ ') ;\" class='color'>删除</a></td>";
			$list.="</tr>";
			$list.="</table></li>";
			
		}
		$countsql = "select count(*) from project where project.pro_kind = ".$pk." and project.ispass = 0 ".$sqlwhere.";";
			$rs=mysql_fetch_array(mysql_query($countsql));
			$xcount = $rs[0];

if($ordertype=="createtime")
{
	if($isdesc=="desc")
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' class='action'  onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' class='action'  onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
	else
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
}
else if($ordertype=="comment_count")
{
	if($isdesc=="desc")
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a class='action' href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";
	}
	else
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
}
else if($ordertype=="hot_count")
{
	if($isdesc=="desc")
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' class='action' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' class='action' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
	else
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
}
else if($ordertype=="clikc_count")
{
	if($isdesc=="desc")
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a class='action' href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a class='action' href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
	else
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";


	}
}
else if($ordertype=="ispass")
{
	if($isdesc=="desc")
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a class='action' href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a class='action' href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
	else
	{
		//$orderbylist = "<div class='Time_'><a href='#' class='action' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' onclick=\"setorder('comment_count')\">交流</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">浏览</a></div>";
		$orderbylist = "<div class='Time_'><a href='#' class='action' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
}
?>