<?php
if($_REQUEST["action"] == "deldptar")
{
	$id_arr=$_GET[del];
	$id=implode(",",$id_arr);
   $rs=mysql_query("delete from pro_favorites where id in ($id)",$conn);
   
}
if($_REQUEST["delmf"] != "")
{
     $rs=mysql_query("delete from pro_favorites where proid = ".$_REQUEST["delmf"]." and userid=".$_SESSION['verydeals_id'].";",$conn);
}
if($_SESSION['verydeals_user_type']=="4")
{
	$typelink = "my_favorites_users.php?mp=8";
}
else
{
	$typelink = "my_favorites_B.php?m=re";
}
$pk =trim($_REQUEST["pk"])==""|| !is_numeric($_REQUEST["pk"])?"1":trim($_REQUEST["pk"]);
$pk = replaceHtmlAndJs($pk);
$pk = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$pk); 
if($pk==1)
{
	$menustr = "<li class='over'><label></label><a href='".$typelink."&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='".$typelink."&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='".$typelink."&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
}
else if($pk==2)
{
	$menustr = "<li><label></label><a href='".$typelink."&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li class='over'><label></label><a href='".$typelink."&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li><label></label><a href='".$typelink."&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";
}
else 
{
	$menustr = "<li><label></label><a href='".$typelink."&pk=1'><h2>房地产投资</h2><span>Real Estate Investment</span></a></li><li><label></label><a href='".$typelink."&pk=2'><h2>股权投资</h2><span>Equity Investment</span></a></li><li class='over'><label></label><a href='".$typelink."&pk=3'><h2>债权融资</h2><span>Debt Financing</span></a></li>";

}
$ordertype = trim($_REQUEST["ordertype"])==""?"comment_count":trim($_REQUEST["ordertype"]);
$isdesc = trim($_REQUEST["isdesc"])==""?"desc":trim($_REQUEST["isdesc"]);
$isdesc = $isdesc=="desc"?"asc":"desc";

if($ordertype=="comment_count")
{
	if($isdesc=="desc")
	{
		$orderbylist = "<div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";
	}
	else
	{
		$orderbylist = "<div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_1'><a href='#'  onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
}
else if($ordertype=="hot_count")
{
	if($isdesc=="asc")
	{
		$orderbylist = "<div class='Time1_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' class='action' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
	else
	{
		$orderbylist = "<div class='Time1_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
}
else if($ordertype=="clikc_count")
{
	if($isdesc=="asc")
	{
		$orderbylist = "<div class='Time_'><a class='action' href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time1_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
	else
	{
		$orderbylist = "<div class='Time_'><a href='#'  onclick=\"setorder('clikc_count')\">浏览</a></div><div class='Time1_'><a href='#' onclick=\"setorder('hot_count')\">收藏</a></div>";

	}
}
	if($_REQUEST["keys"]!="")
{
  $keys = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_REQUEST["keys"]);   
		  $keys = replaceHtmlAndJs($keys);
		   $keys = unescape($keys);
	$sqlwhere.=" and(title like '%".$keys."%' or title1 like '%".$keys."%') ";
}

		$sql = "select project.*,pro_favorites.id as 'fav_id' from pro_favorites,project where pro_favorites.proid = project.id and project.ispass=1 and userid in(select userid from users_sub where fid=".$_SESSION['verydeals_id']." )  and project.pro_kind = ".$pk." ".$sqlwhere." ";
		$orderby = " order by project.".$ordertype."+0 ".$isdesc." ";
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
			$t_str = $_SESSION['verydeals_user_type']==4?"&t=4":"";
			$createtime = date('Y-m-d',strtotime($row["createtime"]));
			if($pk==1)
			{
				$showlink = "project_details.php?mp=6&id=".trim($row['id']);
			}
			else if($pk==2)
			{
				$showlink = "project_details_n1.php?mp=6&id=".trim($row['id']);
			}
			else
			{
				$showlink = "project_details_n1.php?mp=6&id=".trim($row['id']);
			}
			$ispasstr = $row["ispass"]==1?"已审核":"审核中";
			$list.="<li><table width='660' border='0' cellspacing='0' cellpadding='0'><tr>";
			$list.="<td width='14' rowspan='3' align='center' valign='top'></td>";
			$list.="<td width='364' align='left' valign='top'><a href='".$showlink."'>".trim($row['title'])."</a></td>";
			$list.="<td width='50' align='right' valign='top'>￥".trim($row['price'])."亿</td>";
			//$list.="<td width='65' align='center' valign='middle'></td>";//<a href='".$typelink."&ordertype=".$_REQUEST["ordertype"]."&isdesc=".$_REQUEST["isdesc"]."&m=".$_REQUEST["m"]."&pk=".$pk."&keys=".$_REQUEST["keys"]."&delmf=".trim($row['id'])."' onclick=\"return confirm( '您确认要取消收藏吗？ ') ;\"><img src='images/Hearts_.jpg' /></a>
			//$list.="<td align='right' valign='top'>&nbsp;</td>";
			// if($_REQUEST['pk']==1){
			// $list.="<td align='left' valign='top'>面积：".trim($row['area'])."平米   ".trim($row['area_price'])."元/平米</td>";
			// }
			$list.="<td align='right' valign='top'>发布时间：".$createtime."</td>";
			$list.="<td align='right' valign='top'></td>";
			$list.="<td align='center' width='56' valign='top'>浏览(<label>".trim($row['clikc_count'])."</label>)</td>";
			$list.="<td align='right' valign='top'>收藏(<label>".trim($row['hot_count'])."</label>)</td>";
			$list.="</tr>";


			$list.="</table></li>";
			
		}
		$countsql = "select count(*) from project where project.pro_kind = ".$pk." and project.ispass = 0;";
			$rs=mysql_fetch_array(mysql_query($countsql));
			$xcount = $rs[0];


	 $rs=mysql_fetch_array(mysql_query("select count(DISTINCT(fid)) from pro_comment where fid in (select proid from pro_favorites where userid = ".$_SESSION['verydeals_id'].") and isread =0 and ispass=1 and toid=".$_SESSION['verydeals_id']." GROUP BY fid;"));

	  if($rs[0]>0)
	  {
		  $isread_count = "<b>".$rs[0]."</b>";
	  }
	  else
	  {
		  $isread_count = "0";
	  }
?>