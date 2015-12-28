<?php include "inc/init.php"; ?>
<?php checkadmin();?>
<?php include "include/func_released_admin.php"; ?>
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
<div class="position" style="color:#C30">当前位置 > 项目管理 > 项目发布审核</div>

<!--content-->
<div class="main main_">
 <div class="content">
<div class="White">
       <div class="Gray">
         <div class="Glide_li">
          <ul><?php echo $menustr;?></ul>
         </div>
         <div class="Audit">
          <div class="Audit_">
            <div class="channel">
            <form name="myform" id="myform" action="" method="get" onsubmit="return check()">
     <input type="hidden" name="ordertype" id="ordertype" value="<?php echo $ordertype;?>"/>
     <input type="hidden" name="isdesc" id="isdesc" value="<?php echo $isdesc;?>"/>
                    <input type="hidden" name="pk" value="<?php echo $_REQUEST["pk"];?>"/>
     <input type="hidden" name="m" id="m" value="<?php echo $m ;?>"/>
     <?php //echo $selusertype_str;?>
     <?php //echo $seluserid_str;?>
     		<select name="">
     		  <option value="0">管理员姓名</option>
              <?
			  $resusr=mysql_query("select * from users where user_type='3' order by id desc");
			  while($rowusr=mysql_fetch_assoc($resusr))
			  {
			  ?>
              <option value="0"><?=$rowusr["truename"]?></option>
              <?
			  }
			  ?>
     		</select>
             <input type="text" value="<?php echo $keys;?>" name="keys" id="keys"  class="textbook"/>
             <input type="image" src="images/sumch.jpg"  class="sumch"/>
             </form>
            <div class="Time">
<?php echo $orderbylist;?>
       </div>
           </div>
            <div class="Browse edit">
               <form action="my_projects_admin.php" method="get" name="delform" id="delform">
             <input type="hidden" name="action" value="deldptar"/>
              <input type="hidden" name="m" value="<?php echo $_REQUEST["m"];?>"/>
               <input type="hidden" name="pk" value="<?php echo $_REQUEST["pk"];?>"/>
               <input type="hidden" name="p" value="<?php echo $_REQUEST["p"];?>"/>
             <ul><?php echo $list;?></ul>
               </form>
             <div class="All" style="padding-left:15px;">
                <table width="660" border="0" cellspacing="0" cellpadding="0" >
                <tr>
                 <td width="20" align="center" valign="middle"><input type="checkbox" name="checkbox" onclick="checkAll()" /></td>
                 <td width="615" align="left" valign="middle"><a href="#" class="red" onclick="return addtc();">&nbsp;&nbsp;全部删除</a></td>
                </tr>
               </table>
             </div><label id="lbCount" style="display:none"><?php echo $allcount;?></label>
<div class="pages"><?php echo getpagejs1($yeshu);?></div>

            </div>
          </div>
          <div class="Audit_foot"></div>
         </div>
       </div>
     </div>
</div>
</div>

<!--底部-->
<div id="footer">
  <script type="text/javascript">
  function setorder(x)
{
	document.getElementById("ordertype").value = x;
	document.myform.submit();
}
  function check()
  {
	  	if(document.getElementById("keys").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1') != "")
	{
			var keys = escape(document.getElementById("keys").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1'));
	}
  }
  </script>
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
  if (!confirm("确认要删除？")) {
            event.preventDefault();
            window.event.returnValue = false;
        }else{
         
       
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
 }
 else
 {
	  alert("没有选择任何项");

 }
}
	function setstatus1(xid,tabname,field)
{

     document.getElementById("load1_" + xid).style.display = "block";
            $.ajax({
       type: "POST",
       url: "actionServer.php",
       data: "action=setstatus&tabname=" + tabname + "&field=" + field + "&id=" + xid,
       success: function(msg){
         if(document.getElementById("link1_" + xid).innerHTML == "推荐")
         {
         document.getElementById("link1_" + xid).innerHTML = "已推荐";
         }
         else
         {
          document.getElementById("link1_" + xid).innerHTML = "推荐";
         }
         document.getElementById("load1_" + xid).style.display = "none";
         
       }
    });
}
function setmail(pro_citys,pro_cbd,pro_type,pro_area,sbscpt_offer,xid)
{
	var sbscpt_offer = escape(sbscpt_offer.replace(/^\s*(.*?)[\s\n]*$/g,'$1'));
	var pro_type = escape(pro_type.replace(/^\s*(.*?)[\s\n]*$/g,'$1'));
	     document.getElementById("load2_" + xid).style.display = "block";
            $.ajax({
       type: "POST",
	   async: false,
       url: "actionServer.php",
       data: "action=setmail&pro_citys=" + pro_citys + "&pro_cbd=" + pro_cbd + "&pro_type=" + pro_type + "&pro_area=" + pro_area + "&sbscpt_offer="+sbscpt_offer+"&proid="+xid,
       success: function(msg){
		   //document.write("action=setmail&pro_citys=" + pro_citys + "&pro_cbd=" + pro_cbd + "&pro_type=" + pro_type + "&pro_area=" + pro_area + "&sbscpt_offer="+sbscpt_offer+"&proid="+xid);
        document.getElementById("load2_" + xid).style.display = "none";
		alert("发送成功!");
         
       }
    });
}
  </script>
  </div>
  <?php echo $deljs;?>
</body>
</html>
