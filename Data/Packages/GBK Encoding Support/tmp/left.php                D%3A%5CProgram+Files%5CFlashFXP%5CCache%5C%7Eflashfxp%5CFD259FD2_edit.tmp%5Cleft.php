<link href="css/style.css" rel="stylesheet" type="text/css" />
<div class="c_top">
         <div class="cr_1">
            <h3 class="title"><img src="images/search.gif" /></h3>
            <div class="search">
               <dl>
<form name="searchso" id="searchso" action="cpzs.php" method="post" onSubmit="return Checksearchso();" enctype="multipart/form-data">
                  <dd>
				  <?php
			 $sql=mysql_query("select  *  from  cpzser order by erid asc",$conn); 
              ?>
<script language = "JavaScript">
var onecount;
onecount=0;
subcat = new Array();
        <?php
        $count = 0; 
		while($rs=mysql_fetch_array($sql)) 
        { 
        ?>
subcat[<?php echo $count;?>] = new Array("<?php echo $rs["ername"];?>","<?php echo $rs["yiid"];?>","<?php echo $rs["erid"];?>");
        <?php
        $count = $count + 1;
		}
        ?>
onecount=<?php echo $count;?>;

function changelocation(yiid)
    {
    document.searchso.erid.length = 0; 
    document.searchso.erid.options[0] = new Option('==不限大类==','');

	

    var yiid=yiid;
    var i;
    document.searchso.erid.options[0] = new Option('==不限小类==','');
    for (i=0;i < onecount; i++)
        {
            if (subcat[i][1] == yiid)
            { 
                document.searchso.erid.options[document.searchso.erid.length] = new Option(subcat[i][0], subcat[i][2]);
            }        
        }
        
    }    
</script>

				  <select class="sl" name="yiid" id="yiid" onChange="changelocation(document.searchso.yiid.options[document.searchso.yiid.selectedIndex].value)">
      <option selected  value="">==不限大类==</option>
	  <?php
			 $sql=mysql_query("select  *  from  cpzsyi order by yiid asc",$conn); 
             while($rs=mysql_fetch_array($sql)) 
             { 
              ?>
      <option value="<?php echo $rs["yiid"];?>"><?php echo $rs["yiname"];?></option>
      <?php
       }
	   ?> 
    </select>
				  </dd>
                  <dd>
				  <select class="sl" name="erid" id="erid">
                  <option selected value="">==不限小类==</option>
                  </select>
				  </dd>
                  <dd><select class="sl" name="brandid" id="brandid">
                  <option selected  value="">==不限品牌==</option>
	  <?php
			 $sql=mysql_query("select  *  from  brand order by yiid asc",$conn); 
             while($rs=mysql_fetch_array($sql)) 
             { 
              ?>
      <option value="<?php echo $rs["yiid"];?>"><?php echo $rs["yiname"];?></option>
      <?php
       }
	   ?> 
                  </select></dd>
                  <dd><select class="sl" name="priceid" id="priceid">
                  <option selected  value="">==不限价格区域==</option>
	  <?php
			 $sql=mysql_query("select  *  from  price order by yiid asc",$conn); 
             while($rs=mysql_fetch_array($sql)) 
             { 
              ?>
      <option value="<?php echo $rs["yiid"];?>"><?php echo $rs["yiname"];?></option>
      <?php
       }
	   ?> 
                  </select></dd>
                  <dd style="height:28px;"><input type="text" class="in2" name="seachname"  id="seachname"/><a href="javascript:void(0);"><img src="images/search2.gif" /></a></dd></form>
               </dl>
            </div>
         </div>
         <div class="cr_2">
            <h3 class="title1"><img src="images/select.gif" /></h3>
            <ol>
               <li><a href="cpzs_do.php?t=sl">刚售出的产品</a></li>
               <li><a href="cpzs_do.php?t=att">被关注最多的产品</a></li>
               <li><a href="cpzs_do.php?t=com">被评论最多的产品</a></li>
               <li><a href="cpzs_do.php?t=clct">被收藏最多的产品</a></li>
            </ol>
         </div>
         <div class="cr_3">
            <h3 class="title2"><img src="images/title2.gif" /></h3>
            <p>0-500元<label>500-1000元</label>1000-2000元</p>
            <div class="in"><input type="text" /><label>—</label><input type="text" /><a href="javascript:void(0);"><img src="images/search2.gif" /></a></div>
         </div>
         </div>
         <div class="c_center">
            <h3 class="title3"><img src="images/paihang.gif" /></h3>
            <script language="javascript">
		    function getshow2(a){
				$("#xdiv1").hide();
				$("#xdiv2").hide();
				$("#xdiv3").hide();
				$("#xdiv4").hide();
				$("#xdiv5").hide();
				switch(a){
					case '1':
					$("#xdiv1").show();
					break;
					case '2':
					$("#xdiv2").show();
					break;
					case '3':
					$("#xdiv3").show();
					break;
					case '4':
					$("#xdiv4").show();
					break;
					case '5':
					$("#xdiv5").show();
					break;
					}
				}
            </script>
            <ul>
			   <?php
			 $sql=mysql_query("select  *  from  cpzs   order by ontop desc,id desc limit 0,5",$conn);
			 $cpzs=1; 
             while($rs=mysql_fetch_array($sql)) 
             { ?>
               <li >
               <p class="title4" id="show2" onmouseover="getshow2('<?php echo $cpzs;?>')"><label><?php echo $cpzs;?></label><?php echo jiequ($rs["a"],26);?></p>
               <div class="xli" id="xdiv<?php echo $cpzs;?>"  style="height:auto; overflow:hidden; height:auto;<?php if($cpzs!=1){?> display:none;<?php }?>padding-bottom:7px;">
               <a href="cpzsshow.php?id=<?php echo $rs["id"];?>"><img src="<?php echo $rs["img1"];?>" width="118" height="78" border="0" class="img" /></a>
               <p class="p1">￥<?php echo $rs["d"];?></p>
               <p class="p2">原价：￥<?php echo $rs["c"];?></p>
               <a href="caradd.php?id=<?php echo $rs["id"];?>"><img src="images/jiaru.gif"  border="0"/></a>
               </div>
               </li>
			   <?php 
			   $cpzs=$cpzs+1;
			   }?>
            </ul>
         </div>
         <div class="c_bottom">
         <h3 class="title5">
         <a href="#" id="four1" onmouseover="setTab('four',1,2)" class="ahover">推荐产品</a>
         <a href="#" id="four2" onmouseover="setTab('four',2,2)">热卖产品</a>
         </h3>
         <div class="txtc">
            <ol id="con_four_1">
			 <?php
			 $sql=mysql_query("select  *  from  cpzs where tuijian=1  order by id desc limit 0,5",$conn); 
             while($rs=mysql_fetch_array($sql)) 
             { ?>
               <li><span><a href="cpzsshow.php?id=<?php echo $rs["id"];?>"><img src="<?php echo $rs["img1"];?>" width="51" height="50" border="0" alt="<?php echo $rs["a"];?>" /></a></span>
               <div class="txt"><h3><a href="cpzsshow.php?id=<?php echo $rs["id"];?>"><?php echo jiequ($rs["a"],20);?></a></h3><p class="ptitle"><a href="cpzsshow.php?id=<?php echo $rs["id"];?>"><?php echo jiequ($rs["e"],70);?></a></p><p class="jiage">RMB&nbsp;&nbsp;<?php echo $rs["d"];?></p></div></li>
              <?php }?> 
            </ol>
            <ol id="con_four_2" style="display:none;">
               <?php
			 $sql=mysql_query("select  *  from  cpzs where hot=1  order by id desc limit 0,5",$conn); 
             while($rs=mysql_fetch_array($sql)) 
             { ?>
               <li><span><a href="cpzsshow.php?id=<?php echo $rs["id"];?>"><img src="<?php echo $rs["img1"];?>" width="51" height="50" border="0" alt="<?php echo $rs["a"];?>" /></a></span>
               <div class="txt"><h3><a href="cpzsshow.php?id=<?php echo $rs["id"];?>"><?php echo jiequ($rs["a"],20);?></a></h3><p class="ptitle"><a href="cpzsshow.php?id=<?php echo $rs["id"];?>"><?php echo jiequ($rs["e"],70);?></a></p><p class="jiage">RMB&nbsp;&nbsp;<?php echo $rs["d"];?></p></div></li>
              <?php }?> 
            </ol>
			<table width="230" border="0" align="left" >
  <tr>
    <td><img src="images/xl1.gif" /> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

			
         </div>
         </div>
		 