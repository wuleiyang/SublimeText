<?php
function getleft()
{
    if($_SESSION['verydeals_user_type']=="1")
    {
		include "include/left_released.php";
	}
	else if($_SESSION['verydeals_user_type']=="2")
    {
		include "include/left_invest.php";
	}
	else if($_SESSION['verydeals_user_type']=="3")
    {
		include "include/left_Property.php";
	}
	else if($_SESSION['verydeals_user_type']=="4")
    {
		include "include/left_invest_root.php";
	}
}
function unescape($str) {   
$str = rawurldecode($str);   
preg_match_all("/%u.{4}|&#x.{4};|&#d+;|.+/U",$str,$r);   
$ar = $r[0];   
foreach($ar as $k=>$v) {   
if(substr($v,0,2) == "%u")   
$ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,-4)));   
elseif(substr($v,0,3) == "&#x")   
$ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,3,-1)));   
elseif(substr($v,0,2) == "&#") {   
$ar[$k] = iconv("UCS-2","GBK",pack("n",substr($v,2,-1)));   
}   
}   
return join("",$ar);   
}  


function comparetime1($time1,$time2)
{
if(strtotime($time1)>strtotime($time2))
return true;
else
return false;
}

function getbanner($id,$conn)
{
	$img = "";
		   $sql="select * from advertisement where id=".$id.";";
            $result=mysql_query($sql,$conn);
			if($row=mysql_fetch_array($result))
			{
				$img = $row["imgurl"];
			}
			return $img;
}
function checkadmin()
{
	if($_SESSION['adminid']=="")
	{
		echo "<script>window.parent.location.href='default.php';</script>";
		exit;
	}
}
function checkadmin2()
{
	if($_SESSION['adminid']=="")
	{
		echo "<script>history.back();</script>";
		exit;
	}
}
function checkuserlogin()
{
	if($_SESSION['userid']=="")
	{
		echo "<script>alert('请先登录');window.parent.location.href='login.php';</script>";
		exit;
	}
}
function checkuserpower($seldptid)
{
	   $powerarr=explode(",",$_SESSION['power']);
		   $ishas = false;
		    for($i = 0;$i < count($powerarr);$i++)
			{
				if($powerarr[$i] == $seldptid)
				{
					$ishas = true;
					break;
				}
			}
	if(!$ishas)
	{
	   //echo "您暂无此查看权限";
	   echo "<script>alert('Sorry, you are not authorized to visit this page.');window.parent.location.href='committee.php';</script>";
		exit;

	}
}

function powerdown($classid)
{
		   $powerarr=explode(",",$_SESSION['power']);
		   $ishas = false;
		    for($i = 0;$i < count($powerarr);$i++)
			{
				if($powerarr[$i] == $classid)
				{
					$ishas = true;
					break;
				}
			}
			return $ishas;
}
function setcookday($day)
{
	return 3600*24*$day;
	//return 900;
}

function resendmail($conn)
{
	if($_SESSION['tmpusername'] == "")
	{
		echo "<script>window.location.href='register.php';</script>";
	}
	$mnmu = mobilenum();
			$sql="select * from sitinfo where id=1;";
            $result=mysql_query($sql,$conn);
            $other8 = "";
			$other9 = "";
			if($row=mysql_fetch_array($result))
			{
				$other8 = $row["other8"];
				$other9 = $row["other9"];
			}
			$rs=mysql_query("update users set firstmailnum='".$mnmu."' where id=".$_SESSION['newusersid'].";",$conn);
			$activatelink = "<a href='http://".$_SERVER['SERVER_NAME']."/actionServer.php?action=firstmailauth&xuser=".$_SESSION['newusersid']."&firstmailnum=".$mnmu."'>".$other9.",点击此链接进入验证</a>";
			sendmail($_SESSION['tmpusername'],$other8,$activatelink);
}

function mailtomanager($dptid,$newusername)
{

			$sql="select * from users where users.departmentid = ".$dptid." and users.manager = 1 LIMIT 1;";
			 $rs=mysql_fetch_array(mysql_query($sql));
			 $managermail = "";
			 $title = "用户“".$newusername."”邮件验证成功！！！，等待审核";
			 if($rs==true)
			 {
				 $managermail = $rs["username"];
			 }
			sendmail($managermail,$title,$title);
}
function getloginbar()
{
	$loginstr = "<div class='login' style='display:block'><span><a href='login.php'><img src='images/loginbutton.gif' /></a>&nbsp;&nbsp;<a href='register.php'><img src='images/zhuce.gif' /></a>&nbsp;&nbsp;<a href='findpwd1.php'><img src='userimages/findpwd.gif' /></a></span></div>
";
   if($_COOKIE['userid'] != "")
   {
	
	    $rs=mysql_fetch_array(mysql_query("select * from users where id=".$_COOKIE['userid']." ;"));
		if($rs==true)
		{
			 	   $_SESSION['username']=$rs['username'];
				   $_SESSION['realname']=$rs['realname'];
				   $_SESSION['userid']=$rs['id'];
				    $_SESSION['manager']=$rs['manager'];
		            $_SESSION['power']=$rs['power'];
					$_SESSION['departmentid']=$rs['departmentid'];
				    $loginstr = "<div class='login'><span class='hui_'><a href='members.php?show=7&id=".$_SESSION['userid']."'><img src='images/hui.gif' /></a></span><span class='tuichu'><a href='actionServer.php?action=logout'><img type='image' src='userimages/tuichu.gif' class='enter' /></a></span><span class='username'>Welcome  <label>".$_SESSION['realname']."！</label></span></div>";

		}
   }
   if($_SESSION['username'] == "")
   {
		if (isset($_COOKIE["username"]))
		{
			 $_SESSION['username']=$_COOKIE["username"];
			 $_SESSION['realname']=$rs['realname'];
			  $_SESSION['userid']=$rs['id'];
			  $_SESSION['manager']=$rs['manager'];
		      $_SESSION['power']=$rs['power'];
			 $loginstr = "<div class='login'> <span class='hui_'><a href='members.php'><img src='images/hui.gif' /></a></span><span class='tuichu'><a href='actionServer.php?action=logout'><img src='userimages/tuichu.gif' class='enter' /></a></span><span class='username'>Welcome  <label>".$_SESSION['realname']."！</label></span></div>";

		}

   }
   return $loginstr;

}

	function standardtree($xtable,&$dptreestr,$conn,$rootid)
{

	       	$dptreestr .="<script type=\"text/javascript\">";
			$rootname = "";
			if($rootid == "1")
			{
				$rootname = "精英私游";
			}
			else if($rootid == "2")
			{
				$rootname = "媒体中心";
			}
				else if($rootid == "3")
			{
				$rootname = "精英教育";
			}
				else if($rootid == "4")
			{
				$rootname = "何为精英";
			}
       $dptreestr .="mnews".$rootid." = new dTree('mnews".$rootid."','dtnews".$rootid."');mnews".$rootid.".config.folderLinks=false;mnews".$rootid.".config.closeSameLevel=true;mnews".$rootid.".add(-1,-2,'".$rootname."');mnews".$rootid.".add(0,-1,'".$rootname."','','','mainFrame');";
	   
	   
		$sql="select * from ".$xtable." where classid = ".$rootid." order by createtime desc;"; 
	$dt1=mysql_query($sql,$conn);
        
     while($row = mysql_fetch_array($dt1))
	 {

             $addstr = $row["classid"]==3?"":"&nbsp;<a href=article_show.php?action=add&cid=".$row["classid"]." target=mainFrame>添加</a>";
			 $xname = $row["classid"]==3?$row["classname"]:"<a href=article_list.php?cid=".$row["classid"]." target=mainFrame>".$row["classname"]."</a>&nbsp;";
             $dptreestr .="mnews".$rootid.".add(".$row["classid"].",0,'".$xname."".$addstr."','','mainFrame');";
			 
			  //$dptreestr .="mnews.add(".$row["classid"].",0,'".$row["classname"]."&nbsp;<a href=txtclass_show.php?action=edit&pid=".$row["parentid"]."&cid=".$row["classid"]." target=mainFrame>编辑</a>&nbsp;<a onclick=\"isdeltxt(".$row["classid"].")\" href=#>删除</a>','','mainFrame');";
			recursionstandardTree($xtable,$dptreestr,$row["classid"],$conn,$rootid);	

	 }

    $dptreestr .="mnews".$rootid.".draw();</script>";


}

function recursionstandardTree($xtable,&$dptreestr,$parentID,$conn,$rootid)
    {
		   $sql = "select * from ".$xtable." where parentid =".$parentID." order by createtime desc";
	       $dt2 = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($dt2))
        {

             $addstr = $row["classid"]==3?"":"&nbsp;<a href=article_show.php?action=add&cid=".$row["classid"]." target=mainFrame>添加</a>";
             $editstr = "";
			 if($row["classid"] == 5 || $row["classid"] == 6)
			 {
				 $editstr = "&nbsp;<a href=txtclass_show.php?action=edit&pid=".$row["parentid"]."&cid=".$row["classid"]." target=mainFrame>编辑</a>&nbsp;<a href=article_show.php?action=add&cid=".$row["classid"]." target=mainFrame>添加</a>";
			 }
				  $dptreestr .="mnews".$rootid.".add(".$row["classid"].",".$parentID.",'<a href=article_list.php?cid=".$row["classid"]." target=mainFrame>".$row["classname"]."</a>".$editstr."','','','mainFrame');";

            recursionstandardTree($xtable,$dptreestr,$row["classid"],$conn,$rootid);
        }
    }
	


function recursionpowerTree($xtable,&$dptreestr,$parentID,$conn)
    {
		   $sql = "select * from ".$xtable." where parentid =".$parentID." order by createtime desc";
	       $dt2 = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($dt2))
        {
			
		         $chkd = "";
			 for($i = 0;$i < count($myarr);$i++)
			 {
				    if ($row["classid"] ==$myarr[$i])
                    {
				    $chkd = "checked=checked";
                        break;
                    }
			 }
			 $deitstr = "&nbsp;<input type=checkbox ".$chkd." name=power[] value=".$row["classid"].">";
			 $dptreestr .="mdpower.add(".$row["classid"].",".$parentID.",'".$deitstr."<a href=#>".$row["classname"]."</a>','','title','mainFrame');";

            recursionpowerTree($xtable,$dptreestr,$row["classid"],$conn);
        }
    }
	function recursionpowerTree2($xtable,&$dptreestr,$parentID,$conn)
    {
		   $sql = "select * from ".$xtable." where parentid =".$parentID." order by createtime desc";
	       $dt2 = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($dt2))
        {
			
		         $chkd = "";
			 for($i = 0;$i < count($myarr);$i++)
			 {
				    if ($row["classid"] ==$myarr[$i])
                    {
				    $chkd = "checked=checked";
                        break;
                    }
			 }
			 $deitstr = "&nbsp;<input type=checkbox ".$chkd." name=power[] disabled=\"disabled\" value=".$row["classid"].">";
			 $dptreestr .="mdpower.add(".$row["classid"].",".$parentID.",'".$deitstr."<a href=#>".$row["classname"]."</a>','','title','mainFrame');";

            recursionpowerTree2($xtable,$dptreestr,$row["classid"],$conn);
        }
    }
function getSelectClass($xtable,&$dptmtselect,$conn)
{
    $dptmtselect .= "<option value='0'>一级分类</option>";
	$sql = "select * from ".$xtable." where parentid = 0";
	$dt = mysql_query($sql,$conn);
	while($row = mysql_fetch_array($dt))
	{
		$text = "┣";
		for ($j = 0; $j < $row["depth"]; $j++)
		{
			$text = "&nbsp;".$text;
		}
		$selectstr = "";
		if($_REQUEST["action"] == "edit")
		{
			$selectstr = $_REQUEST["pid"] == $row["classid"]?"selected='selected'":"";
		}
		$dptmtselect .= "<option ".$selectstr." value='".$row["classid"]."'>".$text.$row["classname"]."</option>";
		recursionSelect($xtable,$dptmtselect,$row["classid"],$conn);
	}
	$dptmtselect .= "</select>";
}



function recursionSelect($xtable,&$dptmtselect,$parentID,$conn)
{
	//$sql = "select * from ".$xtable." where ParentID=".$parentID;
	$sql = "select * from ".$xtable." where parentid=".$parentID;
	$dt = mysql_query($sql,$conn);
	while($row = mysql_fetch_array($dt))
	{
		$text = "┣";
		for ($j = 0; $j < $row["depth"];$j++)
		{
			$text = "&nbsp;".$text;
		}
		$selectstr = "";
		if($_REQUEST["action"] == "edit")
		{
			$selectstr = $_REQUEST["pid"] == $row["classid"]?"selected='selected'":"";
		}
		$dptmtselect .= "<option ".$selectstr." value='".$row["classid"]."'>".$text.$row["classname"]."</option>";
		recursionSelect($xtable,$dptmtselect,$row["classid"],$conn);
	}

}

function getallpowerstr($conn)
{
		   $sql = "select * from department where classid <> 88 and classid <> 89;";
	       $dt = mysql_query($sql,$conn);
		   $powerstr = "";
		   while($row = mysql_fetch_array($dt))
	       {
			   $powerstr.= $row["classid"].",";
		   }
		   $powerstr = substr($powerstr,0,strlen($powerstr)-1);
		   return $powerstr;
}
function getSelectClassbyuser($xtable,&$dptmtselect,$did,$conn)
{
	$sql = "select * from ".$xtable." where parentid = 0";
	$dt = mysql_query($sql,$conn);
	while($row = mysql_fetch_array($dt))
	{
		$text = "┣";
		for ($j = 0; $j < $row["depth"]; $j++)
		{
			$text = "&nbsp;".$text;
		}
		$selectstr = "";
		if($did != "")
		{
			$selectstr = $did == $row["classid"]?"selected='selected'":"";
		}
		$dptmtselect .= "<option ".$selectstr." value='".$row["classid"]."'>".$text.$row["classname"]."</option>";
		recursionSelectbyuser($xtable,$dptmtselect,$row["classid"],$did,$conn);
	}
	$dptmtselect .= "</select>";
}
function recursionSelectbyuser($xtable,&$dptmtselect,$parentID,$did,$conn)
{
	//$sql = "select * from ".$xtable." where ParentID=".$parentID;
	$sql = "select * from ".$xtable." where parentid=".$parentID;
	$dt = mysql_query($sql,$conn);
	while($row = mysql_fetch_array($dt))
	{
		$text = "┣";
		for ($j = 0; $j < $row["depth"];$j++)
		{
			$text = "&nbsp;".$text;
		}
		$selectstr = "";
		if($did != "")
		{
			$selectstr = $did == $row["classid"]?"selected='selected'":"";
		}
		$dptmtselect .= "<option ".$selectstr." value='".$row["classid"]."'>".$text.$row["classname"]."</option>";
		recursionSelectbyuser($xtable,$dptmtselect,$row["classid"],$did,$conn);
	}

}

function getusertree(&$usertree,$conn)
{

	       	$usertree .="<script type=\"text/javascript\">";
       $usertree .="mutree = new dTree('mutree');mutree.add(-1,-2,'员工树');mutree.add(0,-1,'员工树','','','mainFrame');";
		$sql="select * from department where parentid = 0 order by createtime desc;"; 
	$dt1=mysql_query($sql,$conn);
        
     while($row = mysql_fetch_array($dt1))
	 {

                
            $usertree .= "mutree.add(".$row["classid"].",0,'".$row["classname"]. "','','title','mainFrame','img/imgfolder.gif','img/imgfolder.gif');";
           $usql = "select * from users where departmentid=".$row["classid"].";";
            	$dtu=mysql_query($usql,$conn);
				
            while($urow = mysql_fetch_array($dtu))
            {
                $usertree .= "mutree.add(".$row["classid"].$urow["id"].",".$row["classid"].",'".$urow["username"]."&nbsp;<a href=user_show.aspx?action=edit&id=".$urow["id"]." target=mainFrame>编辑</a>&nbsp;','user_show.aspx?action=edit&id=".$urow["id"]."','".$urow["username"]. "','mainFrame','img/cd.gif','img/cd.gif');";

            }
			//recursionuserTree($usertree,$row["classid"],$conn);

	 }

    $usertree .="mutree.openAll();document.write(mutree);</script>";


}

function recursionuserTree(&$usertree,$parentID,$conn)
    {
		   $sql = "select * from department where parentid =".$parentID." order by createtime desc";
	       $dt = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($dt))
        {
            $usertree .= "mutree.add(".$row["classid"].",".$parentID.",'".$row["classname"]."','','','mainFrame');";
            $pid = $row["classid"];
		   $usql = "select * from users where departmentid=".$row["classid"].";";
            $dt2 = mysql_query($sql,$conn);
            while($urow = mysql_fetch_array($dt2))
            {
                $usertree.= "mutree.add(".$row["classid"]."".$urow["id"].",".$row["classid"].",'".$urow["username"]."','','title','mainFrame','','img/cd.gif','img/cd.gif');";

            }
		 recursionuserTree($usertree,$pid,$conn);

        }
    }
	
function getlimitsql($sql,$ps)
{
	$p = 1;
	if($_REQUEST["p"] != "")
	{
		$p = $_REQUEST["p"];
	}
	$cpid = ($p-1)*$ps;
	$sql = $sql." limit ".$cpid.",".$ps.";";
    return $sql;
}
	
function addclick($pnum,$conn)
{
	$rs=mysql_query("update cpzs set clickcount=clickcount+1 where b='".$pnum."';",$conn);
}


function getdpttitle($xtable,$pid,$conn)
{
	     $rs=mysql_fetch_array(mysql_query("select * from ".$xtable." where classid = ".$pid.";"));
		 return $rs["classname"];
}


function getdpttypetitle($xdpttype)
{
	$xtypestr = "";
	if($xdpttype == "76")
	{
		$xtypestr = "新闻";
	}
	if($xdpttype == "84")
	{
		$xtypestr = "公告";
	}
	if($xdpttype == "85")
	{
		$xtypestr = "活动";
	}
	if($xdpttype == "86")
	{
		$xtypestr = "资源共享";
	}
	if($xdpttype == "87")
	{
		$xtypestr = "FAQ";
	}
	return $xtypestr;
}
function getpagejs($totalPage)
{
     $str= "<script type=\"text/javascript\" src=\"../js/mypager.js\"></script><script type=\"text/javascript\">var pg = new showPages('pg');pg.pageCount = ".$totalPage.";pg.argName = 'p';pg.printHtml(1);</script>";
        return $str;
}
function getpagejs1($totalPage)
{
     $str= "<script type=\"text/javascript\" src=\"js/mypager.js\"></script><script type=\"text/javascript\">var pg = new showPages('pg');pg.pageCount = ".$totalPage.";pg.argName = 'p';pg.printHtml(2);</script>";
        return $str;
}
function nullback()
{   
    echo "<script>history.back();</script>";
	exit;
}
function getpagejs2($totalPage)
{
     $str= "<script type=\"text/javascript\">pg.printHtml(1);</script>";
        return $str;
}
function curPageURL() 
{
    $pageURL = 'http';

    if ($_SERVER["HTTPS"] == "on") 
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80") 
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } 
    else 
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}


function getsmsmoburl($username,$mobilestr,$mobilephone)
{
  $rs=mysql_fetch_array(mysql_query("select * from sitinfo"));
  $smsUid=$rs['other5'];
  $smsKey=$rs['other6'];
  $smsText=$rs['other7'];
  $smsText = str_replace("{用户}",$username,$smsText);
  $smsText = str_replace("{激活码}",$mobilestr,$smsText);
  $smsurl = "http://sms.webchinese.cn/web_api/?Uid=".$smsUid."&Key=".$smsKey."&smsMob=".trim($mobilephone)."&smsText=".urlencode($smsText);
 return $smsurl;
}


function sendmail($tomail,$subject,$content)
{
	$rs=mysql_fetch_array(mysql_query("select * from sitinfo where id = 1;"));
	{
	  	$websmtp = $rs["websmtp"];
		$email = $rs["email"];
		$mailuser = $rs["mailuser"];
		$smtpport = $rs["smtpport"];
		$mailpassword = $rs["mailpassword"];
	}
	
	$smtpserver = $websmtp;//SMTP服务器 
	$smtpserverport =$smtpport;//SMTP服务器端口 
	$smtpusermail = $email;//SMTP服务器的用户邮箱 
	$smtpemailto = $tomail;//发送给谁 
	$smtpuser = $mailuser;//SMTP服务器的用户帐号 
	$smtppass = $mailpassword;//SMTP服务器的用户密码 
	$mailsubject = $subject;//邮件主题 
	$mailbody = $content;//邮件内容 
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件 
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证. 
	$smtp->debug = false;//是否显示发送的调试信息
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 

}
function checklevel($xuid,$conn)
{
	 $rs=mysql_fetch_array(mysql_query("select * from user where id=".$xuid.""));
   $ulevel=$rs['ulevel'];
   $jifen = $rs["jifen"];
   $newlevel = $ulevel;
	 $sql=mysql_query("select  *  from  userlevel order by yiidorder asc"); 
		 while($rs=mysql_fetch_array($sql)) 
		 { 
		   if($jifen >= $rs["jifen"])
		   {
			  $newlevel = $rs["yiid"];
			}
		 }
		 if($ulevel != $newlevel)
		 {
			 $rs=mysql_query("update user set ulevel=".$newlevel." where id=".$xuid,$conn);
		  }
	 return $newlevel;
}
function hasorder($ordernum)
{
		  $res=mysql_query("select * from userorder where userorder='".$ordernum."';");
          $numcom = mysql_num_rows($res);
	return $numcom	;		  
}
function hascar($uid)
{
		  $res=mysql_query("select * from car where userid=".$uid.";");
          $numcom = mysql_num_rows($res);
	return $numcom	;		  
}



function chknum($num)
{
	return preg_match("/[^\d-., ]/",$num);
}
function diff($day1,$day2) 

{ 

$a=explode("-",$day1); 

$b=explode("-",$day2); 

if(checkdate($a[1],$a[2],$a[0]) && checkdate($b[1],$b[2],$b[0])) 

{ 

$c=mktime(0,0,0,$a[1],$a[2],$a[0]); 

$d=mktime(0,0,0,$b[1],$b[2],$b[0]); 

$f=($d-$c)/3600/24; 

 return $f; 

} 
 

}
?>