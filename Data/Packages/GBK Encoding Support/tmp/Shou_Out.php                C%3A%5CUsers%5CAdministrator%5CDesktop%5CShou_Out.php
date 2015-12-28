<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php require_once('include/check.php'); ?>
<?php require_once('include/conn.php'); ?>

<?php if($_REQUEST['zhi']=="00"){?>
<?
	setlocale(LC_ALL, 'zh_CN.gbk'); 
	                          
							  	$year=$_REQUEST['year'];
		                        $mouth=$_REQUEST['mouth'];
								$lei=$_REQUEST['lei'];

                              if($lei!="0"){
							    $sql_type="select id,lei,name,adds,tel,adtime,replaytime from s_shou where lei='".$lei."'";
							  }
							  if($year!=""){
							    $sql_type="select id,lei,name,adds,tel,adtime,replaytime from s_shou where adtime >'".$year."' and adtime <'".$mouth."'";
							  }

							  $result_type=mysql_query($sql_type,$conn);		
									$result=array();
									$result[]=array('服务类型','收货人姓名','地址','电话','时间','回复时间');

							  while($row_type=mysql_fetch_row($result_type))
							  {
								$id=$row_type[0];
								array_shift($row_type);
								$result[]=$row_type;						
							 
                }
			
	
								$date=date('YmdHis');
								$fp = fopen('excelout/'.$date.'.csv', 'w+');

								foreach ($result as $fields) {
										fputcsv($fp, $fields);
								}

								fclose($fp);
								
								
	?>
	

<script>   
		alert("导出成功！");location.href="excelout/<?=$date?>.csv";
</script>

<?php } ?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
 <?include("public.php") ;?>
<LINK href="css.css" type="text/css" rel="stylesheet">
<script language="JavaScript" type="text/javascript" src="js/common.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.js"></script>

		

</head>
<body onLoad="MM_preloadImages('images/botton_submitb.gif','images/botton_resetb.gif')">

			<form action="Shou_Out.php?action=save" method="post" enctype="post" id="myform" name="myform">
			    <input type="hidden" name="zhi" value="00">
				<tr>
				  <td align="center" valign="bottom">
                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="table">
                    
					<tr class="td">
                      <td width="15%" height="30" align="right">类别：</td>
                      <td align="left">
					  	<select name="lei" id="lei">
							<option value="0">请选择</option>
							<option value="退货">退货</option>
							<option value="维修">维修</option>
                       	</select> 
                       </td>
                    </tr>
					
				    <tr class="td">
						<td width="15%" height="30" align="right">起始时间：</td>
						<td align="left">
						<input name="year" type="text" class="input" size="30" maxlength="50" value="">
                        <span style="color:#FF0000">如 2014-04-01,数字格式</span>
                        </td>
					</tr>
					<tr class="td">
						<td width="15%" height="30" align="right">终止时间：</td>
						<td align="left">
						<input name="mouth" type="text" class="input" size="30" maxlength="50" value="">
                        <span style="color:#FF0000">如 2014-04-01 ,数字格式</span>
                        </td>
					</tr>

				      
					 
				  </table></td>
				</tr>
				<tr>
				<div style="margin-left:20%;margin-top:20px;">
				  <td height="34" align="center" valign="bottom">
					<a href="javascript:document.myform.submit();" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','images/botton_submitb.gif',1)"><img src="images/botton_submit.gif" name="Image5" width="73" height="21" border="0" onClick="checkNull();"></a>　<a href="javascript:document.myform.reset()" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/botton_resetb.gif',1)"><img src="images/botton_reset.gif" name="Image6" width="73" height="21" border="0"></a></td>
			    </div>
				</tr>
			  </form>
		
</body>
</html>