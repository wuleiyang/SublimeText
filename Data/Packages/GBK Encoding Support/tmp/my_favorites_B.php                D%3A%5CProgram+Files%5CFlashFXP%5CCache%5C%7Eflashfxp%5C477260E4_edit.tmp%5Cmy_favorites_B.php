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
    <div class="terrace">
     <?php getleft(); ?> 
     <?php include "include/func_my_favorites_B.php"; ?>
    </div>
    <div class="heart_right">
     <div class="White">
       <div class="Gray">
         <div class="manage ">我的收藏 <label class="script">My Favorites</label></div>
         <div class="Glide_li">
          <ul>
<?php echo $menustr;?>          
</ul>
         </div>
         <div class="Audit">
          <div class="Audit_">
            <div class="channel">
                         <form name="myform" id="myform" action="" method="get" onsubmit="return check()">
     <input type="hidden" name="ordertype" id="ordertype" value="<?php echo $ordertype;?>"/>
     <input type="hidden" name="isdesc" id="isdesc" value="<?php echo $isdesc;?>"/>
     <input type="hidden" name="m" id="m" value="<?php echo $m ;?>"/>
                    <input type="hidden" name="pk" value="<?php echo $_REQUEST["pk"];?>"/>
             <input type="text" value="<?php echo $keys;?>" name="keys" id="keys"  class="textbook"/>
              <input type="image" src="images/sumch.jpg"  class="sumch"/>
           </form>
            <div class="Time">
<?php echo $orderbylist;?>
       </div>
           </div>
            <div class="Browse">
                           <form action="my_favorites_B.php" method="get" name="delform" id="delform">
             <input type="hidden" name="action" value="deldptar"/>
              <input type="hidden" name="m" value="<?php echo $_REQUEST["m"];?>"/>
               <input type="hidden" name="pk" value="<?php echo $_REQUEST["pk"];?>"/>
               <input type="hidden" name="p" value="<?php echo $_REQUEST["p"];?>"/>
             <ul>
<?php echo $list;?>
             </ul>
              </form>
                       <div class="All" style="padding-left:15px;">
                <table width="660" border="0" cellspacing="0" cellpadding="0" >
                <tr>
                 <td width="20" align="center" valign="middle"><input type="checkbox" name="checkbox" id="checkbox_all"  onclick="checkAll()"/></td>
             
                 <td width="615" align="left" valign="middle"><a href="#" class="red" onclick="return addtc();">&nbsp;&nbsp;取消收藏</a></td>
                </tr>
               </table>
             </div>
<div class="pages"><?php echo getpagejs1($yeshu);?></div>            </div>
          </div>
          <div class="Audit_foot"></div>
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
  <script type="text/javascript">
    function setorder(x)
{
	document.getElementById("ordertype").value = x;
	document.myform.submit();
}
  </script>
      <script type="text/javascript">
  function checkAll() 
{ 
  if(document.getElementById("checkbox_all").checked)
  {
	   document.getElementById("checkbox_all").checked = false;
  }
  else
  {
	  	   document.getElementById("checkbox_all").checked = true;

  }
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
if(!confirm('确定取消所选的收藏?')){
          return false;
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

  </div>
</body>
</html>
