<?php  include "inc/conn.php";?>
<?php  include "../inc/func_lm.php";?>
<?php  include "../inc/func_my.php";?>
<?php
  checkadmin();
   $fid = $_REQUEST["ftype"]==""?"0":$_REQUEST["ftype"];
   $sid = $_REQUEST["stype"]==""?"0":$_REQUEST["stype"];

  
if($_REQUEST["action"] == "deldptar")
{
	  if(!empty($_POST["del"]))
		{  
			$id_arr=$_POST[del];
	     $id=implode(",",$id_arr);
         $rs=mysql_query("delete from users_sub where userid in ($id)",$conn);
			$_SESSION["addsuc"] = "suc";

			
		}
}
if($_REQUEST["id"] != "")
{
         $rs=mysql_query("delete from users_sub where userid=".$_REQUEST["id"].";",$conn);

}

$sql = "select users_sub.*,users.users_sn,users.truename,users.user_type from users,users_sub where users.id=users_sub.userid and users_sub.fid =".$_REQUEST["fid"]." and users.user_type = ".$_REQUEST["findtype"]."  ";
$swhere = "";
$orderby = " order by users.createtime desc ";
$search_type = trim($_REQUEST["search_type"]);
if($search_type==""||$search_type=="0")
{
	$searchstr = "<select name='search_type'><option value='0' selected='selected'>搜索类型</option><option value='1'>会员编号</option><option value='2'>真实姓名</option></select>";
}
else if($search_type=="1")
{
	$searchstr = "<select name='search_type'><option value='0'>搜索类型</option><option value='1' selected='selected'>会员编号</option><option value='2'>真实姓名</option></select>";
}
else
{
	$searchstr = "<select name='search_type'><option value='0'>搜索类型</option><option value='1'>会员编号</option><option value='2' selected='selected'>真实姓名</option></select>";
	
}

$keys = $_REQUEST["keys"];
if($keys != "")
{
		if($search_type==""||$search_type=="0")
	{
			$sql.= " and (users.truename like '%".$keys."%' or users.companyname  like '%".$keys."%')";
	
	}
	else if($search_type=="1")
	{
		$sql.= " and (users.users_sn like '%".$keys."%')";
		
	}
	else if($search_type=="2")
	{
		$sql.= " and (users.truename like '%".$keys."%')";		
	}
}
$sql.=$orderby;
$ps = 16;
$rs=mysql_query($sql);
$allcount = mysql_num_rows($rs);
$sqlpage =  getlimitsql($sql,$ps);
$yeshu=ceil($allcount/$ps);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<head id="Head1"><title>
	列表页面
</title>
<link href="Style/admin.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/loaf.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script language="javascript" type="text/javascript">
    function func()
    {
        var flag=confirm("是否删除？？");
        return flag;
    }   

</script>
<script type="text/javascript" src="js/alert2.js"></script>
</head>
<body style=" padding-left:10px;">
<script type="text/javascript" src="../jBox/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="../jBox/jquery.jBox-2.3.min.js"></script>
  <script type="text/javascript" src="../jBox/i18n/jquery.jBox-zh-CN.js"></script>

  <link type="text/css" rel="stylesheet" href="../jBox/Skins/default.css"/>

<div class="position">当前位置 > 威地平台 > 浏览管理其下人员&nbsp;<a href="users.php">返回<a>&nbsp;
</div>

<div class="tableTop">
   <form action="users_desc_sub.php" method="get">
   <input type="hidden" name="fid"  value="<?php echo $_REQUEST["fid"];?>" />
   <input type="hidden" name="findtype"  value="<?php echo $_REQUEST["findtype"];?>" />
   <input type="hidden" name="notype"  value="<?php echo $_REQUEST["notype"];?>" />
     <span style=" float:right;">
          <?php echo $searchstr;?>
<label style="color:#800040">关键字：</label>
   <input name="keys" type="text" id="keys" value="<?php echo $keys;?>" />
   <input type="image" name="btnSearch" id="btnSearch" src="images/chaxun.gif" style="border-width:0px;" />
  </span>
  </form>
  </div>
 <form action="users_desc_sub.php?s=1&action=deldptar&fid=<?php echo $_REQUEST["fid"];?>&findtype=<?php echo $_REQUEST["findtype"];?>&notype=<?php echo $_REQUEST["notype"];?>&p=<?php echo $_REQUEST["p"];?>" method="post" name="delform" id="delform">
<table id="tableList">
<thead>
<tr>
<td><a href='javascript:void(0)' onclick="checkAll()">全选</a></td>
<td>编号</td>
<td>姓名</td>
<td>类型</td>
<td>查看</td>
<td>删除</td>
</tr>
</thead>
   
   
<tbody id="tabTbody">
    <?php
    	$dt = mysql_query($sqlpage,$conn);
	while($row = mysql_fetch_array($dt))
	{
		$id = $row["userid"];
		$user_type = $row["user_type"];
		if($user_type==1)
		{
			$typename = "产权方会员";
		}
		else if($user_type==2)
		{
			$typename = "投资方会员";
		}
		else if($user_type==3)
		{
			$typename = "产权管理员";
		}
		else
		{
			$typename = "投资管理员";
		}
		$users_sn = $row["users_sn"];
		$truename = $row["truename"];
		$createtime = $row["createtime"];
		$truename = $keys == ""?$truename:str_replace($keys,"<font style='color:red'>".$keys."</font>",$truename);
		$users_sn = $keys == ""?$users_sn:str_replace($keys,"<font style='color:red'>".$keys."</font>",$users_sn);

		?>
		    
    <tr>
      
      <td class="td1" style="text-align:center;">
        <span class="chk" OnClientClick="changeColor()"><input name=del[] type="checkbox" id="id" value="<?php echo $id; ?>"></span>
      </td>
      <td><?php echo $users_sn;?></td>
       <td><?php echo $truename;?></td>
        <td><?php echo $typename;?></td>
        <td><a href='../personal_profile_B_admin.php?ci=<?php echo $row["userid"];?>' target="_blank">查看</a></td>
      <td class="del" ><a href="users_desc_sub.php?fid=<?php echo $_REQUEST["fid"];?>&notype=<?php echo $_REQUEST["notype"];?>&findtype=<?php echo $_REQUEST["findtype"]?>&id=<?php echo $id; ?>" onclick="return confirm( '您确认要删除吗？ ') ;" class="STYLE12">删除</a>
        
    </tr>
		<?php
	}
	?>

      
    <tr>
     <td class="tda1" colspan="9" style="text-align:center; width:100px;">
     共<span id="lbCount" style="color:Red;"><?php echo $allcount;?></span>条记录
     </td> 
     </tr> 
     <tr>
      <td class="tda1" colspan="9" ><?php echo getpagejs($yeshu);?>
</td>
    </tr>
    </tbody>
    </tbody>
</table> 
    </form>

<div class="fenye" >
 <div id="deleteMore"> <input type="submit" name="ImageButton1" id="ImageButton1" value="删除" onclick="return addtc();" style="border-width:0px;cursor:pointer" />
 <input type="button" value="关闭" onclick="window.close()" style="border-width:0px;"/>
 </div> 
  </div>
</div>
    <script type="text/javascript">
    function checkAll() 
{ 
var code_Values = document.getElementsByTagName("input"); 
for(i = 0;i < code_Values.length;i++){ 
if(code_Values[i].type == "checkbox") 
{ 
  if(code_Values[i].checked)
  {
    code_Values[i].checked = false;
  }
  else
  {
   code_Values[i].checked = true;
  }
} 
} 
} 
function addtc() 
{ 
var code_Values = document.getElementsByTagName("input"); 
var selids = "";
var flag = false;
for(i = 0;i < code_Values.length;i++){ 
if(code_Values[i].type == "checkbox") 
{ 
  if(code_Values[i].checked)
  {
      flag = true;
  }
} 
} 
 if(flag)
 {
	 if(!confirm("您确认要删除吗?"))
	 {
		 return false;
	 }
		 for(i = 0;i < code_Values.length;i++)
		 { 
			if(code_Values[i].type == "checkbox") 
			{ 
			  if(code_Values[i].checked)
			  {
				  selids += code_Values[i].value + ",";
			  }
			} 
	     }
		 selids = selids.substr(0,selids.length-1);
       //location.href='../actionServer.php?action=deldptar&selids=' + selids; 
       document.getElementById("delform").submit();
 }
 else
 {
	  alert("没有选择任何项");

 }
}
    </script>
</body>
<?php
if($_SESSION["addsuc"]!="")
{
	if ($_REQUEST["s"]==1) {
		echo "<script>alert('删除成功!');</script>";
		$_SESSION["addsuc"] = "";
	}else{
	echo "<script>alert('添加成功!');</script>";
	$_SESSION["addsuc"] = "";
}}
?>
</html>
