<?php  include "inc/initsit.php";?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?php  include "include/func_seo.php";?>

<link href="css/css.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="scripts/jquery.js"></script>

<script type="text/javascript" src="scripts/model.js"></script>

<script type="text/javascript" src="scripts/public.js"></script>

</head>



<body>

<div class="container mvcontainer" style="width:1341px; margin:0 auto">

	<div class="content" style="width:1341px; margin:0 auto">

    	<div class="leftcontent">

        	<div id="menu">

        

        <?php  include "control/menu.php";?>

        <?php

	$c =trim($_REQUEST["c"])==""|| !is_numeric($_REQUEST["c"])?"2":trim($_REQUEST["c"]);

	$c = replaceHtmlAndJs($c);

		$c = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$c); 

		$f = replaceHtmlAndJs(trim($_REQUEST["f"]));

		$f = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$f); 

	   $sql1=mysql_query("select  *  from  article_type where fid=".$c."  order by id asc;",$conn);

	   $i = 0;

 while($rs=mysql_fetch_array($sql1)) 

 { 

     $xcss =  "";

	 if($f == $rs["id"])

	 {

		 $xcss = "style='color:#900'";

	 }

	 if($i==0)

	 {

		 	 $clist.="<a href='list.php?c=".$c."&f=".$rs["id"]."' ".$xcss."><b>".$rs["name"]."</b></a>";



	 }

	 else

	 {

		 	 $clist.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='list.php?c=".$c."&f=".$rs["id"]."' ".$xcss."><b>".$rs["name"]."</b></a>";

	 }

	 $i++;

  }

        	$sql = "select id,img,img1,name from article where cid = ".$c." ";

	if(trim($_REQUEST["f"])!=""&& is_numeric($_REQUEST["f"]))

	{

		$sql.=" and fid = ".$f." ";

	}

		$orderby = " order by article.createtime desc,id desc ";

		$sql.=$orderby;

		$ps = 12;

		$rs=mysql_query($sql);

		$allcount = mysql_num_rows($rs);

		$sqlpage =  getlimitsql($sql,$ps);

		$yeshu=ceil($allcount/$ps);

		$dt = mysql_query($sqlpage,$conn);

		while($row = mysql_fetch_array($dt))

		{

			$createtime = date('Y-m-d', strtotime($row["createtime"]));

			$name = $row["name"];

				$name = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$name);   

				//$name = strlen($name)>90?strMax($name, 90):$name;

				$img = $row["img"]==""?"images/Nopic.gif":$row["img"];

				$img1 = $row["img1"]==""?"images/Nopic.gif":$row["img1"];

			$listnews .= "<li style=\"margin-right: 0px;\"><a href='show.php?t=".$_REQUEST["t"]."&fid=".$row["id"]."&c=".$_REQUEST["c"]."&p=".$_REQUEST["p"]."&ctype=".$_REQUEST["f"]."' title='".$row["name"]."'><img src='".$img1."' changeurl='".$img."' defaulturl='".$img1."' /></a><p><A href='show.php?t=".$_REQUEST["t"]."&fid=".$row["id"]."&c=".$_REQUEST["c"]."&ctype=".$_REQUEST["f"]."'>".$name."</A></p></li>";

		}

		?>

            </div>

        </div>

        <div class="rightcontent mvright" style=" float:left; margin-left:60px;">

            <div class="positionbg"></div>

            <div class="mvlist">

            <div class="dtitle1"><?php echo $clist;?></div>

            <div class="clear"></div>

            <br />

            	<ul class="mvlistul clear">

                <?php echo $listnews;?>

                </ul>

                <div class="clear"></div>

                <div class="mvpagebox">

                	<div class="pages">

        <?php echo getpagejs1($yeshu);?> 

                    </div>

                </div>

            </div>

        </div>

    </div>

      <?php  include "control/bottom.php";?>

</div>

</body>

</html>

            <script type="text/javascript">

document.getElementById("hidemenu_<?php echo $_REQUEST["c"];?>").style.display = "block";

$(function()

{	

	$('#li_hidemenu_<?php echo $_REQUEST["c"];?>').unbind();

})

</script>

