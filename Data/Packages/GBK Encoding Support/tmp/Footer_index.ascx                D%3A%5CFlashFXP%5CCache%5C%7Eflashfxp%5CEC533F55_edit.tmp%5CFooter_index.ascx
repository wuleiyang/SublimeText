<%@ Control Language="C#" AutoEventWireup="true" CodeFile="Footer_index.ascx.cs" Inherits="UserControl_Footer" %>
 <div class="cler"></div>
    <div class="footer">
    <div class="foot">
        	<div class="foot_select">
           	  <form id="form1" name="form1" method="post" action="">
                    <label for="select2"></label>
                    <select name="select2" id="select2" onchange="s_click(this)">
                    <option>中化网站群</option>
                     <%=this.link1 %>
                    </select>
                    <label for="select3"></label>
                    <select name="select3" id="select3"  onchange="s_click(this)">
                    <option>合作伙伴</option>
                      <%=this.link2 %>
                    </select>
                    <label for="select"></label>
           	  	  <select name="select" id="select"  onchange="s_click(this)">
           	  	  <option>友情链接</option>
           	  	    <%=this.link3 %>
                </select>
          	  </form>
       	</div>
            <div class="foot_text">
            	<a href="helpMessage.aspx?name=wzdt&num=7">网站地图</a>  |  <a href="helpMessage.aspx?name=bqsm&num=7">版权声明</a>  |  <a href="About_map.aspx?num=7">联系我们</a>
            </div>
      </div>
        <div class="foot_p">
        	<p><img src="images/copy_img.jpg" /><a href="http://www.sinochem.com/"> <%=this.title%></a></p>
            <p><%=this.footmes%></p>
        </div>
    </div>
    <script type="text/javascript">
        //select跳页
        function s_click(obj) {
            var num = 0;
            for (var i = 0; i < obj.options.length; i++) {
                if (obj.options[i].selected == true) {
                    num++;
                }
            }
            if (num == 1) {
                var url = obj.options[obj.selectedIndex].value;
                window.open(url); //这里修改打开连接方式
            }
        }
    </script>