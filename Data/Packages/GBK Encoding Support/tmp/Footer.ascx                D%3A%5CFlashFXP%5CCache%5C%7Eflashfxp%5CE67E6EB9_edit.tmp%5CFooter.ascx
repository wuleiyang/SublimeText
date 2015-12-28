<%@ Control Language="C#" AutoEventWireup="true" CodeFile="Footer.ascx.cs" Inherits="Contral_Footer" %>


<div class="footer clearfix">
	<script type="text/javascript">
	    (function() {
	        var $backToTopTxt = "", $backToTopEle = $('<div id="top"><a href="#topo" id="topo"></a></div>').appendTo($(".footer"))
				.text($backToTopTxt).attr("title", $backToTopTxt).click(function() {
				    $("html, body").animate({ scrollTop: 0 }, 620);
				}), $backToTopFun = function() {
				    var st = $(document).scrollTop(), winh = $(window).height();
				    (st > 0) ? $backToTopEle.show() : $backToTopEle.hide();
				    //IE6下的定位
				    if (!window.XMLHttpRequest) {
				        $backToTopEle.css("top", st + winh - 166);
				    }
				};
	        $(window).bind("scroll", $backToTopFun);
	        $(function() { $backToTopFun(); });
	    })();
    </script>
	<!--<div id="top"><a href="#topo" id="topo"></a></div>-->
	<div class="foot">
    	<div class="foot_l">
        	<ul class="clearfix">
                <li><a href="http://www.webthink.com.cn/about.aspx">关于网思</a></li>
                <li>|</li>
                <li><a href="http://www.webthink.com.cn/service.aspx">服务领域</a></li>
                <li>|</li>
                <li><a href="http://www.webthink.com.cn/solution.aspx">解决方案</a></li>
                <li>|</li>
                <li><a href="http://www.webthink.com.cn/case.aspx">客户案例</a></li>
                <li>|</li>
                <li><a href="http://www.webthink.com.cn/news.aspx">公司动态</a></li>
                <li>|</li>
                <li><a href="http://www.webthink.com.cn/contact.aspx">联系我们</a></li>

            </ul>
            
            <p class="en">Our company which offers website plan and visual design as the core of innovation. We offer our customers 
high quality design service through the professional process and creative perspective.</p>
             <p class="cn">Copyright 2007-2015 版权所有 网博思创网络技术（北京）有限公司 <a href="http://tongji.baidu.com/web/welcome/login" target="_blank">百度统计</a><!-- <script src="http://s24.cnzz.com/stat.php?id=4271564&web_id=4271564" language="JavaScript"></script> --></p>
        </div>
        <div class="foot_r">
        	<img src="images/wexin.png" />
            关注网思手机站
        </div>
    </div>
</div>
