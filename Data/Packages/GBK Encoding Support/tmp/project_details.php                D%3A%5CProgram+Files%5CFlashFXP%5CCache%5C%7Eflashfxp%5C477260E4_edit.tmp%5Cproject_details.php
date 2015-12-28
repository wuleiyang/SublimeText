<?php
@session_start();
header("Content-type: text/html; charset=gb2312"); 
if(!isset($_SESSION['verydeals_user_type'])){ ?>
    <html>
    <head>
		<meta http-equiv="X-UA-Compatible" content="IE=8">
		<script type="text/javascript" src="js/default.js"></script>
	</head>
    <body>
    <script language="javascript" src="scripts/jquery.js"></script>
    <link rel="stylesheet" href="easydialog/easydialog.css" />
    <script src="easydialog/easydialog.min.js"></script>
	<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="scripts/public.js"></script>
	<style>
	body{background:#666;}
	*{margin: 0;padding: 0;text-decoration: none;}
		.vloginbox{position: relative;height: 370px;width: 700px;z-index: 1200;margin:200px auto 0;background:#fff;}
		.vpopclose{background: url(http://y0.ifengimg.com/p/login/20130924/close_01.png) no-repeat scroll 0 0 rgba(0, 0, 0, 0);
			cursor: pointer;display: block;height: 26px;overflow: hidden;width: 26px;text-indent: -9999px;}
		.loginbox,.con3title{margin:0 auto;width:235px;}
		.loginbox{background:none;}
		.loginbox span{font-size:12px;}
		.con3title{margin-top:30px;}
		.vloginbox{width:500px;height:280px;}
		.vl_pop{float:right;margin: -10px;padding-bottom: 20px;}
	</style>
</head>
<body>	
	<div style="display: block;text-align: center;" class="vloginbox">
		<div class="vl_pop">
        <a style="display: block;" title="关闭" class="vpopclose" href="default.html">关闭</a>
      </div>
			<div style="clear:both;content:'';height:0;line-height:0;"></div>
            <div class="con3title"></div>
              <div class="loginbox">
                <table cellpadding="0" cellspacing="0" width="100%" border="0">
                  <tr>
                    <td colspan="2" height="10"></td>
                  </tr>
                  <tr>
                    <td height="24" width="68" align="right"><span>用户名：</span></td>
                    <td><div class="inbox"><input type="text" class="in1" name="username" id="username" value="" /></div></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="5"></td>
                  </tr>
                  <tr>
                    <td height="24" width="68" align="right"><span>密&nbsp;&nbsp;&nbsp;码：</span></td>
                    <td><div class="inbox"><input type="password" name="userpwd" id="userpwd" value="" class="in1" /></div></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="3"></td>
                  </tr>
                  <tr>
                   <td align="right" ><span>验证码：</span></td>
                    <td align="left" valign="middle"><input type="text" name="chkcode" id="chkcode" class="code" style="float:left; margin-top:5px;" /><img src="checkNum_session.php" id="checkimg" style="cursor:pointer;width:60px; height:24px;margin:4px 0 0 4px;" class="codeImg"  onClick="this.src = 'checkNum_session.php?' + Math.random();"/></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="5"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                    <img src="images/loading5.gif" id="imgload" style="display:none"/>
                    <a href="reg.php"><img src="images/zc.gif" id="imgload" /></a>
                      <input type="image" src="images/loginbtn.gif" class="submit" onClick="check()" id="btnsubmit" /><label id="lb_err" style="display:none; color:#900">用户名错误！</label>
                    </td>
                  </tr>
                </table>
              </div>
		</div>
	<!--<div style="display: block;" class="vloginbox">
		<div class="vl_pop">
        <a style="display: block;" title="关闭" class="vpopclose" href="default.html">关闭</a>
      </div>
  <div class="vlcont">
    <div class="vlogintitle">
      <div class="vl_tab">
        <ul id="">
          <li class="current"><a class="vl_log" href="javascript:void(0);">登录</a></li>
        </ul>
      </div>
      
    </div>
    
    <div class="vloginmain">

      <div style="display:block;" class="vlogbox">
        <div class="vlogboxmain">
	
	  <form target="LoginFrame" method="POST" action="" name="login_form" id="login_form">
          <div class="vlogboxFrame">
            <ul>
              <li>
                <label>用户名</label>
                <div class="vloginpbox">
                  <input type="text" value="" name="username" id="username" data-fid="f6c55d2a577">
                </div>
              </li>
              <li>
                <label>密&nbsp;&nbsp;码</label>
                <div class="vloginpbox">
                  <input type="password" value="" name="userpwd" id="userpwd" data-fid="f6c71cc30fc">
                </div>
              </li>
			  <li>
				<label>验证码</label>
				<div class="" style="width:220px;overflow:hidden;">
                <input type="text" name="chkcode" maxlength="4" id="chkcode" class="code" style="float:left; width:80px;margin-top:5px;margin-right:5px" /><img src="checkNum_session.php" id="checkimg" style="cursor:pointer;width:60px; height:24px;margin-top:2px;" class="codeImg"  onClick="this.src = 'checkNum_session.php?' + Math.random();"/>
				</div>
              </li>
			  <li style="text-align:center;list-style:none">
				<span id="lb_err" style="display:none; margin: 0 auto;color:#900">用户名错误！</span>
				<img style="display:none" id="imgload" src="images/loading5.gif">
			  </li>
            </ul>
            <input type="hidden" value="" id="comfrom" name="comfrom">
            <div class="login_pwd">
              <a  class="loginbtn" id="btnsubmit" href="javascript:void(0);" onclick="check()">登录</a>
              <a  class="loginbtn" href="reg.php" id="">去注册</a>
            </div>
          </div> 
		  
	  </form>
        </div>
      </div>-->
      <!--登录 end-->
      <div style="display: none;" id="result"></div>
    </div>
  </div>
</div>
    </body>
    </html>
    <?php
    exit;
    }
?>
<?php include "inc/init.php"; ?>

<?php include "include/func_project_details.php"; ?>
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

<?php
if(isset($_SESSION['verydeals_user_type'])):
?>

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
	<div class="Exchange">
      <?php getleft(); ?>
	 </div>
    <?php
    if($_SESSION['verydeals_user_type']=="3" && $_SESSION['verydeals_user_type']=="4")
	{
		?>
		<!--<div class="second">
            <div class="second_">
            <table width="189" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><center>威地平台交易支持</center></td>
              </tr>
              <tr>
                <td><div class="CEOs"><img src="<?php echo $root_img;?>" /></div></td>
              </tr>
              <tr>
                <td><p>联系人：<?php echo $root_truename;?><br />
            职&nbsp;&nbsp;务：业务专员<br />
            电&nbsp;&nbsp;话：<?php echo $root_telephone;?><br />
            手&nbsp;&nbsp;机：<?php echo $root_mobile;?><br />
            邮&nbsp;&nbsp;件：<?php echo $root_name;?></p></td>
              </tr>
            </table>
            </div>
    	</div>-->
		<?php
	}
	?>
    </div>
    <div class="heart_right">
     <div class="White">
       <div class="Gray">
          <div class="MyInves">
            <div class="MyInves_">
                <div class="Share" style="height:33px; margin-top:10px;">
                  <ul style="float:right; margin-right:10px;">
                 <?php echo $toptradebtn;?>
                   <?php echo $favorites_str;?>
                   <?php
                   if($_SESSION['verydeals_user_type']!=4)
				   {
					   ?>
					                     <li style="display:none">
                  <a href="#" class="Redd_" id="share_head" onClick="initshare_head()">分享</a>
                  <div class="noshow" id="div_noshow" style="display:block">
          <?php echo $colleagues_list;?>
                  </div>
                  </li>
					   <?php
				   }
				   ?>

                  <li><a href="#" class="Redd_ will">投诉建议</a></li>
                  <div class="Bomb">
                     <form action="actionServer.php" onSubmit="return checkcomplaint()">
                  <input type="hidden" name="action" value="complaint"/>
                  <input type="hidden" name="reurl" value=""/>
                  <input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>"/>
    <table width="295" border="0" cellspacing="0" cellpadding="0">
    <tr><td height="10"></td></tr>
<tr>
<td align="center" valign="middle"><textarea class="boxtext" name="contentcomplaint" id="contentcomplaint"></textarea></td>
</tr>
<tr><td height="10"></td></tr>
<tr>
<td align="right" valign="middle"><input type="image" src="images/Send.jpg" style="margin-right:8px;" /></td>
</tr>
</table>
</form>
  </div>
                  </ul>
                 </div>
                <div class="Building">
                <div class="photo"><img src="<?php echo $proimg;?>" /></div>
                <div class="pright">
                 <div class="number">
                 <table width="370" border="0" cellspacing="0" cellpadding="0" height="78">
  <tr>
    <td height="50" colspan="3" align="left" valign="top"><h2><?php echo $title;?></h2></td>
    </tr>
    <tr>
    <td width="80" align="left" valign="middle">项目编号：</td>
    <td width="154" align="left" valign="middle"><?php echo $pro_sn;?></td>
    <td width="136" align="right" valign="middle"><a href="#">收藏(<label><?php echo $hot_count;?></label>)</a>&nbsp;<a href="#">浏览(<label><?php echo $clikc_count;?></label>)</a></td>
    </tr>
    <tr>
    <td align="left" valign="middle">发布人：</td>
    <td align="left" valign="middle"><?php echo $publisher;?></td>
    <td colspan="2" align="right" valign="middle">发布时间：<?php echo $createtime1;?></td>
    </tr>
</table>

                 </div>
                 <div class="count">
                  <h2>￥<?php echo $price;?>亿</h2>
                  <span>面积：<?php echo $area;?>平米&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $area_price;?>元/平米</span>
                  <p>名称：<?php echo $title1;?></p>
                  <p>类型：<?php echo $pro_typename;?></p>
                  <p>现状：<?php echo $pro_statusname;?></p>
                  <p>区域：<?php echo $pro_citysname;?>/<?php echo $pro_cbdname;?></p>
                 </div>
                </div>
               </div>
                <div class="location">
               <div class="co_worker margin">
          <ul>
     <li class="Point" id="li_1"><label></label><a href="javascript:void(0)" onClick="showli('li_1')">项目介绍</a></li>
           <li id="li_2"><label></label><a href="javascript:void(0)" onClick="showli('li_2')">位置地图</a></li>
           <li id="li_3"><label></label><a href="javascript:void(0)" onClick="showli('li_3')">建筑信息</a></li>
           <li id="li_4"><label></label><a href="javascript:void(0)" onClick="showli('li_4')">项目图片</a></li>
           <li id="li_5"><label></label><a href="javascript:void(0)" onClick="showli('li_5')">配套设施</a></li>
           <li id="li_6"><label></label><a href="javascript:void(0)" onClick="showli('li_6')">财务指标</a></li>
           <li id="li_7"><label></label><a href="javascript:void(0)" onClick="showli('li_7')">交易条件</a></li>
           <li id="li_8"><label></label><a href="javascript:void(0)" onClick="showli('li_8')">产权人信息</a></li>
           <!--<li><label></label><a href="Dea_Author.html">发布人信息</a></li>-->
          </ul>
         </div>
               <div class="place place_" id="place_1" style="display:block">
                 <div class="Final">
                        <p><?php echo $describe_content;?></p><br />
<?php echo $downlist;?>
<!--<a href="#" class="open">展开</a>-->
                 </div>
               </div>
               <!--位置地图-->
               <div class="place" id="place_2" style="display:none">

                <div class="map">

                 <p><span>项目地址：</span><?php echo $place_address;?></p>

                 <p><span>位置描述：</span><?php echo $place_describe;?></p>

                 <p><span>公共交通：</span><?php echo $place_traffic;?></p>

                 <p><span>位置地图：</span></p>

                 <div class="map_">

                   <div style="width:606px;height:402px;" id="dituContent"><img style="width:606px;height:402px;"  src="<?php echo $place_map;?>"/></div>

                   <script type="text/javascript">

    //创建和初始化地图函数：

    function initMap(){

        createMap();//创建地图

        setMapEvent();//设置地图事件

        addMapControl();//向地图添加控件

        addMarker();//向地图中添加marker

    }

    

    //创建地图函数：

    function createMap(){

        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图

        var point = new BMap.Point(116.459441,39.910287);//定义一个中心点坐标

        map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中

        window.map = map;//将map变量存储在全局

    }

    

    //地图事件设置函数：

    function setMapEvent(){

        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)

        map.enableScrollWheelZoom();//启用地图滚轮放大缩小

        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)

        map.enableKeyboard();//启用键盘上下左右键移动地图

    }

    

    //地图控件添加函数：

    function addMapControl(){

        //向地图中添加缩放控件

	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});

	map.addControl(ctrl_nav);

        //向地图中添加缩略图控件

	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});

	map.addControl(ctrl_ove);

        //向地图中添加比例尺控件

	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});

	map.addControl(ctrl_sca);

    }

    

    //标注点数组

    var markerArr = [{title:"北京市朝阳区永安东里16号CBD国际大厦",content:"北京市朝阳区东二环北京站东侧，二环内北京站商圈",point:"116.458515|39.910287",isOpen:1,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}

		 ];

    //创建marker

    function addMarker(){

        for(var i=0;i<markerArr.length;i++){

            var json = markerArr[i];

            var p0 = json.point.split("|")[0];

            var p1 = json.point.split("|")[1];

            var point = new BMap.Point(p0,p1);

			var iconImg = createIcon(json.icon);

            var marker = new BMap.Marker(point,{icon:iconImg});

			var iw = createInfoWindow(i);

			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});

			marker.setLabel(label);

            map.addOverlay(marker);

            label.setStyle({

                        borderColor:"#808080",

                        color:"#333",

                        cursor:"pointer"

            });

			

			(function(){

				var index = i;

				var _iw = createInfoWindow(i);

				var _marker = marker;

				_marker.addEventListener("click",function(){

				    this.openInfoWindow(_iw);

			    });

			    _iw.addEventListener("open",function(){

				    _marker.getLabel().hide();

			    })

			    _iw.addEventListener("close",function(){

				    _marker.getLabel().show();

			    })

				label.addEventListener("click",function(){

				    _marker.openInfoWindow(_iw);

			    })

				if(!!json.isOpen){

					label.hide();

					_marker.openInfoWindow(_iw);

				}

			})()

        }

    }

    //创建InfoWindow

    function createInfoWindow(i){

        var json = markerArr[i];

        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");

        return iw;

    }

    //创建一个Icon

    function createIcon(json){

        var icon = new BMap.Icon("http://map.baidu.com/image/us_cursor.gif", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})

        return icon;

    }

    

    initMap();//创建和初始化地图

</script>



                 </div>

                </div>

               </div>
               <!--建筑信息-->
               <div class="place" id="place_3" style="display:none">

                 <div class="erect">

                   <div>

                   <h2>建筑信息</h2>

                   <p><?php echo $build_zjxx;?></p>

                   </div>

                   <div>

                   <h2>建筑指标</h2>

                   <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="15%" align="left" valign="top"><span>土地面积：</span></td>

    <td width="39%" align="left" valign="top"><?php echo $build_tdmj;?></td>

    <td width="14%" align="left" valign="top"><span>土地使用年限：</span></td>

    <td width="32%" align="left" valign="top"><?php echo $build_cqnx2-$build_cqnx1;?>年（<?php echo $build_cqnx1;?>年-<?php echo $build_cqnx2;?>年）</td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>建设用地面积：</span></td>

    <td align="left" valign="top"><?php echo $build_zdmj;?>平米（只针对土地交易）</td>

    <td align="left" valign="top"><span>规划用途：</span></td>

    <td align="left" valign="top"><?php echo $build_ghyt;?></td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>总建筑面积：</span></td>

    <td align="left" valign="top"><?php echo $build_zjzmj;?>平米</td>

    <td align="left" valign="top"><span>建成时间：</span></td>

    <td align="left" valign="top"><?php echo $build_jcsj;?>年</td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>-&nbsp;&nbsp;&nbsp;地上面积：</span></td>

    <td align="left" valign="top"><?php echo $build_dsmj;?>平米</td>

    <td align="left" valign="top"><span>其他：</span></td>

    <td align="left" valign="top">&nbsp;</td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>-&nbsp;&nbsp;&nbsp;地下面积：</span></td>

    <td align="left" valign="top"><?php echo $build_dxmj;?>平米</td>

    <td align="left" valign="top"><span>-&nbsp;&nbsp;&nbsp;土地状况：</span></td>

    <td align="left" valign="top"><?php echo $build_tdzk;?></td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>建筑高度：</span></td>

    <td align="left" valign="top"><?php echo $build_jzgd;?>米</td>

    <td align="left" valign="top"><span>-&nbsp;&nbsp;&nbsp;建筑密度：</span></td>

    <td align="left" valign="top"><?php echo $build_jzmd;?>% </td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>总房间数：</span></td>

    <td align="left" valign="top"><?php echo $build_zfjs;?>间套</td>

    <td align="left" valign="top"><span>-&nbsp;&nbsp;&nbsp;容积率：</span></td>

    <td align="left" valign="top"><?php echo $build_rjl;?>% </td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>车位数量：</span></td>

    <td align="left" valign="top"><?php echo $build_cwsl;?></td>

    <td align="left" valign="top"><span>-&nbsp;&nbsp;&nbsp;绿地率：</span></td>

    <td align="left" valign="top"><?php echo $build_ldl;?>%</td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>-&nbsp;&nbsp;&nbsp;地上车位：</span></td>

    <td align="left" valign="top"><?php echo $build_dscw;?>个</td>

    <td align="left" valign="top">&nbsp;</td>

    <td align="left" valign="top">&nbsp;</td>

  </tr>

  <tr>

    <td align="left" valign="top"><span> -&nbsp;&nbsp;&nbsp;地下车位：</span></td>

    <td align="left" valign="top"><?php echo $build_dxcw;?>个</td>

    <td align="left" valign="top">&nbsp;</td>

    <td align="left" valign="top">&nbsp;</td>

  </tr>

</table>



                   </div>

                   <div>

                   <h2>楼层平面</h2>

                   <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="21%" align="left" valign="top"><span>总楼层数：</span></td>

    <td width="79%" align="left" valign="top"><?php echo $build_zlcs;?>层</td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>地上层数：</span></td>

    <td align="left" valign="top"><?php echo $build_dscs;?>层</td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>地下层数：</span></td>

    <td align="left" valign="top"><?php echo $build_dxcs;?>层</td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>标准层高：</span></td>

    <td align="left" valign="top"> <?php echo $build_bzcg;?>米</td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>标准净高：</span></td>

    <td align="left" valign="top"><?php echo $build_bzjg;?>米</td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>标准层建筑面积：</span></td>

    <td align="left" valign="top"><?php echo $build_bzcjzmj;?>平米</td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>主力户型/开间面积：</span></td>

    <td align="left" valign="top"><?php echo $build_kjmj;?>平米</td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>标准房间面积：</span></td>

    <td align="left" valign="top"><?php echo $build_bzfjmj;?>平米</td>

  </tr>

</table>



                   </div>

                   <div>

                   <h2>建材装修</h2>

                   <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="21%" align="left" valign="top"><span>装修情况：</span></td>

    <td width="79%" align="left" valign="top"><?php echo $build_zxqk;?></td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>建筑结构：</span></td>

    <td align="left" valign="top"><?php echo $build_jzjg;?></td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>外立面：</span></td>

    <td align="left" valign="top"><?php echo $build_wlm;?></td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>内墙：</span></td>

    <td align="left" valign="top"><?php echo $build_nq;?></td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>大堂及公共部分：</span></td>

    <td align="left" valign="top"><?php echo $build_dtggbf;?></td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>其他说明：</span></td>

    <td align="left" valign="top"><?php echo $build_qtsm;?></td>

  </tr>

</table>



                   </div>

                 </div>

               </div>
               <!--项目图片-->
               <div class="place" id="place_4" style="display:none">

                 <div class="images">

                  <ul>
<?php echo $pro_imgslist;?>
                   <div class="clear"></div>

                  </ul>

                 </div>

               </div>
               <!--配套设施-->
               <div class="place" id="place_5" style="display:none">
                 <div class="erect">
                   <div>
                   <h2>硬件设置</h2>
                   <p><span>客梯：</span>&nbsp;<?php echo $facility_kt;?></p>
                   <p><span>货梯：</span>&nbsp;<?php echo $facility_ht;?></p>
                   <p><span>空调：</span>&nbsp;<?php echo $facility_ktiao;?></p>
                   <p><span>供暖：</span>&nbsp;<?php echo $facility_gn;?></p>
                   <p><span>供水：</span>&nbsp;<?php echo $facility_gs;?></p>
                   <p><span>供电：</span>&nbsp;<?php echo $facility_gd;?></p>
                   <p><span>燃气：</span>&nbsp;<?php echo $facility_rq;?></p>
                   <p><span>其他：</span>&nbsp;<?php echo $facility_qt;?></p>
                   </div>
                   <div>
                   <h2>楼内配套</h2>
                   <p><?php echo $facility_lnpt_list;?></p>
                   </div>
                   <div>
                   <h2>周边配套</h2>
<?php echo $facility_zbpt;?>
                   </div>
                 </div>
               </div>
               <!--财务指标-->
               <div class="place" id="place_6" style="display:none">

                 <div class="erect">

                   <div>

                   <h2>投资回报</h2>

                   <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="21%" align="left" valign="top"><span>出租率：</span></td>

    <td width="79%" align="left" valign="top"><?php echo $finance_czl;?></td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>投资回报率(ROI)：</span></td>

    <td align="left" valign="top"><?php echo $finance_tzhbl;?></td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>资本化率(Cap Rate)：</span></td>

    <td align="left" valign="top"><?php echo $finance_zbhl;?></td>

  </tr>

   <tr>

    <td align="left" valign="top"><span>内部收益率(IRR)：</span></td>

    <td align="left" valign="top"><?php echo $finance_nbsyl;?></td>

  </tr>

</table>

                   </div>

                   <div>

                   <h2>财务数据</h2>

 <table width="100%" border="0" cellspacing="1" cellpadding="1" class="Data" bgcolor="#979b9a">
<?php echo $pro_financelist;?>
</table>



                   </div>

                 </div>

               </div>
               <!--交易条件-->
               <div class="place" id="place_7" style="display:none">
                 <div class="erect">
                   <div>
                   <h2>投资回报</h2>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="12%" align="left" valign="middle"><span>交易价格：</span></td>
    <td width="88%" align="left" valign="middle"><?php echo $price;?>￥元</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><span>交易方式： </span></td>
    <td align="left" valign="middle">    <?php echo $trade_jyfs_list;?></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><span>付款方式：</span></td>
    <td align="left" valign="middle"><?php echo $trade_fkfs;?></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><span>保证金： </span></td>
    <td align="left" valign="middle"><?php echo $trade_bzj;?></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><span>挂牌日期：</span></td>
    <td align="left" valign="middle"><?php echo $trade_gprq;?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><span>其他条件： </span></td>
    <td align="left" valign="middle"><?php echo $trade_qttj;?></td>
  </tr>
</table>

                   </div>
                 </div>
               </div>
               <!--产权人信息-->
               <div class="place" id="place_8" style="display:none">

                 <div class="erect">

                   <div>

                   <h2>产权人信息：</h2>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="12%" align="left" valign="middle"><span>公司名称：</span></td>

    <td width="88%" align="left" valign="middle"><?php echo $owner_gsmc;?></td>

  </tr>

  <tr>

    <td width="12%" align="left" valign="middle"><span>公司编号：</span></td>

    <td width="88%" align="left" valign="middle"><?php echo $companynum;?></td>

  </tr>

  <tr>

    <td align="left" valign="middle"><span>所在位置：</span></td>

    <td><?php echo $company_place;?></td>

    </tr>

  <tr>
    <tr>

    <td align="left" valign="middle"><span>办公地址：</span></td>

    <td><?php echo $owner_bgdz;?></td>

    </tr>

  <tr>

    <td align="left" valign="middle"><span>注册资本：</span></td>

    <td align="left" valign="middle"><?php echo $owner_zczb;?>万元</td>

  </tr>

  <tr>

    <td align="left" valign="top"><span>企业类型：</span></td>

    <td align="left" valign="middle"><?php echo $owner_qylx;?></td>

  </tr>

  <tr>

    <td colspan="2" align="left" valign="middle"><span>持有产权/股权比例：<?php echo $owner_cygq;?></span></td>

    </tr>

  <tr>

    <td colspan="2" align="left" valign="middle"><span>转让产权/股权比例：<?php echo $owner_zrgq;?></span></td>

    </tr>

  <tr>

    <td align="left" valign="top"><span>公司介绍：</span></td>

    <td align="left" valign="middle"><?php echo $owner_gsjs;?></td>

  </tr>

  <tr><td height="10"></td></tr>

</table>



                   </div>

                   

                 </div>

               </div>
              </div>
                <div class="location">
               <div class="co_worker margin">
               <script language="javascript" src="scripts/jquery.js"></script>
	<link rel="stylesheet" href="editor/themes/default/default.css" />
	<link rel="stylesheet" href="editor/plugins/code/prettify.css" />
	<script charset="utf-8" src="editor/kindeditor.js"></script>
	<script charset="utf-8" src="editor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="editor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="my_describe"]', {
				cssPath : 'editor/plugins/code/prettify.css',
				uploadJson : 'editor/php/upload_json.php',
				fileManagerJson : 'editor/php/file_manager_json.php',
				allowFileManager : true,
				allowUpload : false,
				items : [ ],
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=form_desc]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		
	
	</script>
          <ul class="tabshow">
           <li><label></label><a href="javascript:void(0)">我的备注</a></li>
          </ul>
         </div>
              <div class="tabscon1">
               <div class="place place_" style="display:block">

      
<form action="actionServer.php" name="form_desc" id="form_desc" method="post">
<input type="hidden" name="action" value="insert_desc"/>
<input type="hidden" name="fid" id="fid" value="<?php echo $_REQUEST["id"];?>"/>
<input type="hidden" name="pro_kind" id="pro_kind" value="<?php echo $pro_kind;?>"/>
   <?php echo $my_describe_str;?>

</form>
                  <!--<a href="#" class="open_">收起</a>-->
                  <div class="clear"></div>
                 
                 
               </div>
               <div class="place place_" style="display:none">
               <div class="Final">
               <p><?php echo $remark_desc;?></p>
               </div>
               </div>
               </div>
              </div>
            </div>
          </div>
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
  </div>
  
  

  
    <!--table 切换-->
  <script type="text/javascript">
    function checkcomplaint()
  {
	  	  var content = document.getElementById("contentcomplaint").value.replace(/(\s*$)/g, "");
	  if(content.length > 300 || content.length < 1 )
	  {
          alert("请将字符限制在300个以内!");
		  return false;
	  }
	  		document.getElementById("imgload").style.display = "inline";
		document.getElementById("btnsubmit").style.display = "none";
  }
  function check()
  {
	  var content = document.getElementById("content").value.replace(/(\s*$)/g, "");
	  if(content.length > 300 || content.length < 1 )
	  {
          alert("请将字符限制在300个以内!");
		  return false;
	  }
  }
  function showli(xid)
{
	for(var i = 1;i <=8;i++)
	{
		var yid = "li_" + i;
		var placeid = "place_" + i;
		if(document.getElementById(yid).id==xid)
		{
			document.getElementById(yid).className = "Point";
			document.getElementById(placeid).style.display = "block";
		}
		else
		{
			document.getElementById(yid).className = "";
			document.getElementById(placeid).style.display = "none";
		}
	}
}
function insert_trade()
{
	if(confirm( '您确认申请交易吗？ '))
	{
		document.form3.submit();
	}
}
function share_pro(uid,proid)
{
		           $.ajax({
       type: "POST",
	   async: false,
       url: "actionServer.php",
       data: "action=share_pro&uid=" + uid + "&proid=" + proid  ,
       success: function(msg){	 
	   alert('分享成功!');
       }
    });

	 return pro_snflag;
}
function initshare_head()
{
//document.getElementById("share_head").innerHTML = "分享";
	if(document.getElementById("div_noshow").style.display == "none")
	{
		document.getElementById("div_noshow").style.display = "block";
	}
	else
	{
		document.getElementById("div_noshow").style.display = "none";
	}
	
}

var isclear = false;
function cleartishi()
{
	if(!isclear)
	{
		document.getElementById("content").value = "";
		isclear = true;
	}
}
function setedit()
{
		  var my_describe = document.getElementById("my_describe").value.replace(/(\s*$)/g, "");
	  if(my_describe.length > 2000 || my_describe=="")
	  {
          alert("请将字符限制在2000个以内!");
		  return false;
	  }
	  document.form_desc.submit();
}
</script>
<?php endif;?>

</body>

</html>
