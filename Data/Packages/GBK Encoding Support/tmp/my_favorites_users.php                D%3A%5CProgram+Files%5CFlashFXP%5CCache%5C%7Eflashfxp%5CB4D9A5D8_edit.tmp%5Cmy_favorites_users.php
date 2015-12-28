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

     <?php include "include/func_my_favorites_users.php"; ?>

     </ul>

    </div> 

    <div class="heart_right">

     <div class="White">

       <div class="Gray">

         <div class="manage ">投资人收藏 <label class="script">Investor Favorites</label></div>

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

     <input type="hidden" name="mp" id="mp" value="<?php echo $_REQUEST["mp"] ;?>"/>

                    <input type="hidden" name="pk" value="<?php echo $_REQUEST["pk"];?>"/>

             <input type="text" value="<?php echo $keys;?>" name="keys" id="keys"  class="textbook"/>

              <input type="image" src="images/sumch.jpg"  class="sumch"/>

           </form>

            <div class="Time">

<?php echo $orderbylist;?>



       </div>

           </div>

            <div class="Browse">

             <ul>

<?php echo $list;?>

             </ul>

<div class="pages"><?php echo getpagejs1($yeshu);?></div>            </div>

            </div>

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

  </div>

</body>

</html>

