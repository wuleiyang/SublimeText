<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Index.aspx.cs" Inherits="web_shouye_Index" %>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<ct:Seo runat="server" />
	<link rel="stylesheet" type="text/css" href="../style/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../style/reset.css">
	<link rel="stylesheet" href="../style/css.css">
	<script type="text/javascript" src="../js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery.SuperSlide.2.1.1.js"></script>
	<script type="text/javascript" src="../js/animate.js"></script>
</head>
<body>
	<!-- 头部 -->
	<ct:Head runat="server" />
	<!-- 轮播图 -->
	<div id="slideBox" class="slideBox1">
			<div class="bd">
				<ul>
					<%=bannerImgs%>
				</ul>
			</div>
			<div class="hd">
				<ul><%=bannerLi%></ul>
			</div>
			<!-- 下面是前/后按钮代码，如果不需要删除即可 -->
			<a class="prev" href="javascript:void(0)"></a>
			<a class="next" href="javascript:void(0)"></a>
	</div>
	<!-- 主体内容 -->
	<section>
		<div class="content">
			<!-- 内容左侧 -->
			<div class="con_l">
				<!-- 新闻中心 -->
				<div class="new bd_radius">
					<div class="tit">
						<div class="tit_txt">
							<i></i>
							<b>新闻中心</b>
						</div>
						<div class="index_more">
							<a href="../web_news/Index.aspx?num=3">HOMEMAGIC <b>NEWS</b></a>
						</div>
					</div>
					<div class="new_con con_pd">
						<div class="new_con_l">
							<div class="title">
								<i></i>
								<span>[焦点]</span>
								<a href="../web_news/BusinessNews.aspx?num=3">总裁贾锋赴鞍山考察并会见鞍山市长吴忠琼</a>
							</div>
							<div class="new_con_txt">
								<p>8月20日，鞍山市市长吴忠琼女士在鞍山胜利宾馆接见我司总裁贾锋、总裁助理兼投资发展部总经理周小俊等一行六人，鞍山市副市长赵红巍、立山区区委书记...</p>
								<a href="../web_news/BusinessNews.aspx?num=3"><img src="../images/2.jpg" alt=""></a>
							</div>
						</div>
						<div class="new_con_r">
							<ul>
								<%=newsList%>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- 招商运营 -->
				<div class="zs bd_radius">
					<div class="tit">
						<div class="tit_txt">
							<i></i>
							<b>招商运营</b>
						</div>
						<div class="index_more">
							<a href="../web_operations/Sales.aspx?num=5">HOMEMAGIC <b>MERCHANTS</b></a>
						</div>
					</div>
					<div class="zs_con con_pd">
						<%=salesList%>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- 内容右侧 -->
			<div class="con_r">
				<div class="video_box">
					<div class="con_r_video bd_radius2 video_layer">
						<div class="ajax_video">
						<object style="display:none;" class id="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="330" height="231">
                                  <param name="movie" value="flvplayer.swf">
                                  <param name="quality" value="high">
                                  <param name="allowFullScreen" value="true">
                                  <param name="FlashVars" value="vcastr_file=<%=video %>&&BufferTime=3&IsAutoPlay=1">
                                  <embed src="flvplayer.swf" allowfullscreen="true" flashvars="vcastr_file=<%=video %>&&IsAutoPlay=1" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="330" height="231"></embed>
                                </object>
						</div>
						<i>
						
						</i>
						<div class="video_tit">
							<span>Enterprise video</span>
							<p>企业宣传视频</p>
						</div>
						<b></b>
					</div>
				</div>
				
				<div class="clearfix"></div>
				<!-- 分享 -->
				<div class="share_btn bd_radius2">
					<div class="sina"><i><img src="../images/sina.jpg" alt=""></i>官方微博&nbsp;Weibo</div>
					<div class="wx"><i><img src="../images/wx.jpg" alt=""></i>官方微信&nbsp;WeChat</div>
				</div>
				<!-- 地图 -->
				<div class="map bd_radius">
					<div class="tit">
						<div class="tit_txt">
							<i></i>
							<b>项目介绍</b>
						</div>
						<div class="index_more">
							<a href="../web_project/Project.aspx?num=4">HOMEMAGIC <b>PROJECT</b></a>
						</div>
					</div>
					<div class="con_p">
						<div class="map_l">
							<div class="map_img">
								<div class="l"><img src="../images/map.jpg" alt=""></div>
								<div class="r">
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="map_con">
								<a href=""><img src="../images/map_xq.png" alt=""></a>
								<div>华美立家制定宏大发展版图，从2014至2016年3年30城发展规划正在快速推进华美立家制定宏大发展版图，从2014至2016年...</div>
							</div>							
						</div>
						<div class="map_r">
							<ul>
								<%=xiangmu%>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="clearfix"></div>
	<!--底部-->
	<ct:Footer runat="server" />
</body>

<script type="text/javascript" src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
    (function($) {//滚动轴样式
        $(window).load(function() { $(".map_r").mCustomScrollbar({ theme: "dark-3" }); });
    })(jQuery);
</script>
<script type="text/javascript">
    jQuery(".slideBox1").slide({ mainCell: ".bd ul", autoPlay: false }); //主页大bannner滚动
</script>
 
<!--[if lt IE 9]>
<script type="text/javascript" src="PIE.js"></script>   
<link rel="stylesheet" href="style/lt_ie9.css">
<style>
 .bd_radius,.bd_radius2,.bd_radius3{behavior: url(PIE.htc);}
</style>
<![endif]-->
</html>