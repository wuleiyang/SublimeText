<%@ Control Language="C#" AutoEventWireup="true" CodeFile="_footer.ascx.cs" Inherits="Control_footer" %>

 
<div class="footer">
  <div class="center">
    <div class="footer_">
	
      <ul class="footerul">
        <%=this.liststr %>
      </ul>
      <p>Copyright 2012 北京龙扬际程安全技术有限公司版权所有 ［京ICP备11031933号］技术支持 <a href="http://www.webthink.com.cn/" target="_blank">网博思创</a>
        <script type="text/javascript">

var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");

document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F06642533f4bd7285bafe79d32c5452df' type='text/javascript'%3E%3C/script%3E"));

</script>
</p>

    </div>
  </div>
</div>


<script>
    $(function() {
        var li = $('ul.footerul > li:last');
        li.css('border','none');
    })
</script>