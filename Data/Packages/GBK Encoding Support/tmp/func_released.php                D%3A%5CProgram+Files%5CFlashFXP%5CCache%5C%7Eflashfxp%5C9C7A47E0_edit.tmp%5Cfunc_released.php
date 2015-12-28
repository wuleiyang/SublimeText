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

$pk =trim($_REQUEST["pk"])==""|| !is_numeric($_REQUEST["pk"])?"1":trim($_REQUEST["pk"]);
if($pk==1)
{
	$menustr = "<li class='over'><label></label><a href='my_projects_S.php?m=re&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='my_projects_S.php?m=re&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='my_projects_S.php?m=re&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
}
else if($pk==2)
{
	$menustr = "<li><label></label><a href='my_projects_S.php?m=re&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li class='over'><label></label><a href='my_projects_S.php?m=re&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='my_projects_S.php?m=re&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
}
else 
{
	$menustr = "<li><label></label><a href='my_projects_S.php?m=re&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='my_projects_S.php?m=re&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li class='over'><label></label><a href='my_projects_S.php?m=re&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";

}
$ordertype = trim($_REQUEST["ordertype"])==""?"clikc_count":trim($_REQUEST["ordertype"]);
$isdesc = trim($_REQUEST["isdesc"])==""?"desc":trim($_REQUEST["isdesc"]);
$isdesc = $isdesc=="desc"||""?"asc":"desc";
		$countsql = "select count(*) from project where project.pro_kind = ".$pk." and project.ispass = 0;";
			$rs=mysql_fetch_array(mysql_query($countsql));
			$xcount = $rs[0];
if($ordertype=="createtime")
{
	if($isdesc=="asc")
	{
		$orderbylist = "<div class='Time1_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' class='action'  onclick=\"setorder('createtime')\"><b>发布时间</b></a></div><div class='Time1_'><a href='#'  onclick=\"setorder('hot_count')\">收藏</a></div><div class='Time1_'><a href='#' onclick=\"setorder('clikc_count')\">浏览</a></div>";

	}
	else
	{
		$orderbylist = "<div class='Time1_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' class='action2' onclick=\"setorder('createtime')\"><b>发布时间</b></a></div><div class='Time1_'><a href='#'  onclick=\"setorder('hot_count')\">收藏</a></div><div class='Time1_'><a href='#' onclick=\"setorder('clikc_count')\">浏览</a></div>";

	}
}
else if($ordertype=="comment_count")
{
	if($isdesc=="asc")
	{
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('hot_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('clikc_count')\">浏览</a></div>";
	}
	else
	{
		$orderbylist = "<div class='Time_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#'  onclick=\"setorder('hot_count')\">收藏</a></div><div class='Time_'><a href='#' onclick=\"setorder('clikc_count')\">浏览</a></div>";

	}
}
else if($ordertype=="hot_count")
{
	if($isdesc=="asc")
	{
		$orderbylist = "<div class='Time1_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time1_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time1_'><a href='#'  onclick=\"setorder('hot_count')\">收藏</a></div><div class='Time_'><a href='#' class='action' onclick=\"setorder('clikc_count')\"><b>浏览</b></a></div>";

	}
	else
	{
		$orderbylist = "<div class='Time1_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time1_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time1_'><a href='#'  onclick=\"setorder('hot_count')\">收藏</a></div><div class='Time_'><a href='#' class='action2' onclick=\"setorder('clikc_count')\"><b>浏览</b></a></div>";

	}
}
//收藏
else if($ordertype=="clikc_count")
{
	if($isdesc=="asc")
	{
		$orderbylist = "<div class='Time1_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time1_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a class='action' href='#'  onclick=\"setorder('hot_count')\"><b>收藏</b></a></a></div><div class='Time1_'><a href='#' onclick=\"setorder('clikc_count')\">浏览</a></div>";

	}
	else
	{
		$orderbylist = "<div class='Time1_'><a href='#' class='' onclick=\"setorder('ispass')\">审核中(<label>".$xcount."</label>)</a></div><div class='Time1_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time_'><a href='#' class='action2'  onclick=\"setorder('hot_count')\"><b>收藏</b></a></div><div class='Time1_'><a href='#' onclick=\"setorder('clikc_count')\">浏览</a></div>";

	}
}
else if($ordertype=="ispass")
{
	if($isdesc=="desc")
	{
		$orderbylist = "<div class='Time_'><a href='#' class='action2' onclick=\"setorder('ispass')\"><b>审核中(".$xcount.")</b></a></div><div class='Time1_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time1_'><a class='' href='#'  onclick=\"setorder('hot_count')\">收藏</a></div><div class='Time1_'><a href='#' onclick=\"setorder('clikc_count')\">浏览</a></div>";

	}
	else
	{
		$orderbylist = "<div class='Time_'><a href='#' class='action' onclick=\"setorder('ispass')\"><b>审核中(".$xcount.")</b></a></div><div class='Time1_'><a href='#' onclick=\"setorder('createtime')\">发布时间</a></div><div class='Time1_'><a href='#'  onclick=\"setorder('hot_count')\">收藏</a></div><div class='Time1_'><a href='#' onclick=\"setorder('clikc_count')\">浏览</a></div>";

	}
}
if($_REQUEST["keys"]!="")
{
$keys = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_REQUEST["keys"]);   
		  $keys = replaceHtmlAndJs($keys);
		   $keys = unescape($keys);
	$sqlwhere.=" and(title like '%".$keys."%' or title1 like '%".$keys."%') ";
}
        if($pk==1)
		{
			$sql = "select * from project where project.fid = ".$_SESSION['verydeals_id']." and project.pro_kind = ".$pk." ".$sqlwhere." ";
		}
		else
		{
			$sql = "select project.*,industry_type.`name` as 'industry_type_name' from project,industry_type where project.industry_type = industry_type.id and project.fid = ".$_SESSION['verydeals_id']." and project.pro_kind = ".$pk." ".$sqlwhere." ";

		}
        $extra_order = $ordertype=="ispass"?",project.createtime desc":"";
		if($_REQUEST["m"]=="re")
		{
			$orderby=" order by ispass asc,createtime desc";
		}
		else
		{
			$orderby = " order by project.".$ordertype." ".$isdesc." ".$extra_order;
		}
		$sql.=$orderby;
		
		//echo $sql;
		
		$ps = 10;
		$rs=mysql_query($sql);
		$allcount = mysql_num_rows($rs);
		$sqlpage =  getlimitsql($sql,$ps);
		$yeshu=ceil($allcount/$ps);
		$dt = mysql_query($sqlpage,$conn);
		while($row = mysql_fetch_array($dt))
		{
				 if($_SESSION['verydeals_id']!=trim($row["fid"])&&$_SESSION['verydeals_user_type']!="3")
				 {
						echo "<script>history.back();</script>";
						exit;
				 }
			$createtime = date('Y-m-d',strtotime($row["createtime"]));
			if($pk==1)
			{
				$showlink = "publish_projects.php?m=pr&action=edit&ci=".trim($row['id'])."";
				$titlelink = "project_details_S.php?m=".$_REQUEST["m"]."&pk=".$_REQUEST["pk"]."&id=".trim($row['id'])."";
			}
			else if($pk==2)
			{
				$showlink = "Equity_sent.php?m=es&action=edit&ci=".trim($row['id'])."";
				$titlelink = "project_details_n.php?m=".$_REQUEST["m"]."&pk=".$_REQUEST["pk"]."&id=".trim($row['id'])."";
			}
			else
			{
				$showlink = "Equity_sent.php?m=zqrz&action=edit&ci=".trim($row['id'])."";
				$titlelink = "project_details_n.php?m=".$_REQUEST["m"]."&pk=".$_REQUEST["pk"]."&id=".trim($row['id'])."";
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
			$list.="<li><table width='660' border='0' cellspacing='0' cellpadding='0'>";
			$list.="<tr>";
			$list.="<td width='20' rowspan='2' align='center' valign='top'><input type='checkbox' name='del[]' value='".trim($row['id'])."' /></td>";
			$list.="<td width='14' rowspan='3' align='center' valign='top'></td>";
			$list.="<td width='292' align='left' valign='top'><a href='".$titlelink."'>".trim($row['title'])."</a></td>";
			$list.="<td width='152' align='right' valign='top'>￥".trim($row['price'])."亿</td>";
			$list.="<td width='61' align='right' valign='top'>".$ispasstr."</td>";
			$list.="<td width='65'>&nbsp;</td>";
			$list.="<td width='66' align='right' valign='top'><a href='".$showlink."' class='color'>修改</a> <a href='my_projects_S.php?ci=".$row["id"]."&m=".$_REQUEST["m"]."&pk=".$_REQUEST["pk"]."&p=".$_REQUEST["p"]."' onclick=\"return confirm( '您确认要删除吗？ ') ;\" class='color'>删除</a></td>";
			$list.="</tr>";
			$list.="<tr>";
			if($row["pro_kind"]==1)
			{
				$list.="<td align='left' valign='top'>面积：".trim($row['area'])."平米   ".trim($row['area_price'])."元/平米</td>";
			}
			else
			{
				$list.="<td align='left' valign='top'>行业：".trim($row['industry_type_name'])."</td>";
			}
			$list.="<td align='right' valign='top' colspan='2'>发布时间：".$createtime."</td>";
			//$list.="<td align='center' valign='top'></td>";//收藏(<label>".trim($row['hot_count'])."</label>)
			$list.="<td align='right' valign='top'>收藏(<label>".trim($row['hot_count'])."</label>)</td>";
			$list.="<td align='right' valign='top'>浏览(<label>".trim($row['clikc_count'])."</label>)</td>";
			$list.="</tr>";
			$list.="</table></li>";
			
		}


	 $rs=mysql_fetch_array(mysql_query("select count(*) from pro_trade where pro_trade.fid in (select id from project where project.fid = ".$_SESSION['verydeals_id']." and project.pro_kind =".$pk.") and pro_trade.ispass_admin = 0;"));

	  if($rs==true)
	  {
		  $trade_count = $rs[0];
	  }
	  else
	  {
		  $trade_count = 0;
	  }
	  
		$sql = "select count(*) from pro_comment where pro_comment.myread = 0 and pro_comment.userid <> ".$_SESSION['verydeals_id']." and pro_comment.ispass = 1 and pro_comment.fid in (select id from project where project.fid = ".$_SESSION['verydeals_id']." and project.pro_kind =".$pk." );";
	  	 $rs=mysql_fetch_array(mysql_query($sql));
	  if($rs==true)
	  {
		  $comment_count = $rs[0];
	  }
	  else
	  {
		  $comment_count = 0;
	  }
?>