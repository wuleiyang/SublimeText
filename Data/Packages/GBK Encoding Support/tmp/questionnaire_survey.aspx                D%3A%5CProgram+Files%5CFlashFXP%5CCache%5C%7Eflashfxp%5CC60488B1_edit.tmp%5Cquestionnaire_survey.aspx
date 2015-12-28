<%@ Page Language="C#" AutoEventWireup="true" CodeFile="questionnaire_survey.aspx.cs" Inherits="questionnaire_survey" %>
<%@ Register Src="userControl/top.ascx" TagName="top" TagPrefix="myTop" %>
<%@ Register Src="userControl/top2.ascx" TagName="top2" TagPrefix="myTop2" %>
<%@ Register Src="userControl/bottom.ascx" TagName="btm" TagPrefix="myBtm" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><%=te %></title>
<meta name="keywords" content=<%=ke %>/>
<meta name="description" content=<%=de %>/>
<link rel="stylesheet" type="text/css"  href="images/css.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/lrtk.js"></script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<style>
#form1 table{ border-collapse:collapse;}
#form1 table tr td{border:1px solid #242123; border-collapse:collapse;}
</style>
</head>
<body>
  <!--头部-->
  <div id="Nav"><myTop:top ID="top1" runat="server" /></div>
  <!--头部 End-->
  <!--导航-->
  <div id="Nav2"><myTop2:top2 ID="top2" runat="server" /></div>
  <!--导航 End-->

<form id="form1" runat="server">
<div class="qt_survey" style="position:relative"><a href="index.aspx">首页</a><span class="yspan" style="position:absolute;right:170px;top:4px"></span><a  href="questionnaire_survey.aspx">调查问卷</a></div>
<div class="qt_survey_tishi"><span>尊敬的用户: </span>    <p>感谢您长期以来对利曼的支持，您的支持是我们不断前进的动力。为提供更及时、周到的服务，您的意见和建议对我们非常重要，邀请您填写下列表单。每位按规范填写的用户将获得一次年底抽奖机会，届时将电话通知获奖者。我们期待您的参与！谢谢合作！<span>(标*为必填项)</span></p></div>
<div class="table_1">
  <table cellspacing="0" cellpadding="0"  border="0"  style="border-collapse:collapse"  width="100%">
  <caption class="tdbg">用户信息</caption>
<tr>
<td width="15%" height="28">填表人姓名<span>*</span></td>
<td width="15%"><input type="text" class="wenbenk" id="xingming" runat="server" /></td>
<td width="10%">职务</td>
<td width="30%"><input type="text" class="wenbenk" id="zhiwu" runat="server" /></td>
<td width="15%">电子邮箱<span>*</span></td>
<td width="15"><input type="text" class="wenbenk" id="youxiang" runat="server" style="width:143px;" /></td>
</tr>

<tr>
<td  height="28" class="tdbg" style=" font-weight:normal">电&nbsp;&nbsp;&nbsp;&nbsp;话<span>*</span></td>
<td><input type="text" class="wenbenk" id="dianhua" runat="server" /></td>
<td class="tdbg" style=" font-weight:normal">传真</td>
<td><input type="text" class="wenbenk" id="chuanzhen" runat="server" /></td>
<td class="tdbg" style=" font-weight:normal">手机</td>
<td><input type="text" class="wenbenk" id="shouji" runat="server" /></td>
</tr>

<tr>
<td  height="28">仪器型号<span>*</span></td>
<td><input type="text" class="wenbenk" id="xinghao" runat="server" /></td>
<td>安装号</td>
<td><input type="text" class="wenbenk" id="anzhuanghao" runat="server" /></td>
<td>序列号<span>*</span></td>
<td><input type="text" class="wenbenk" id="xuliehao" runat="server" /></td>
</tr>

<tr>
<td height="35" class="tdbg" style=" font-weight:normal">单位名称<span>*</span></td>
<td colspan="3"><input type="text" class="wenbenkh" id="danwei" runat="server" /></td>
<td class="tdbg" style=" font-weight:normal">部门</td>
<td><input type="text" class="wenbenkh" id="bumen" runat="server" /></td>
</tr>

<tr>
<td height="35">通讯地址<span>*</span></td>
<td colspan="3"><input type="text" class="wenbenkh" id="dizhi" runat="server" /></td>
<td>邮政编码</td>
<td><input type="text" class="wenbenkh" id="youbian" runat="server" /></td>
</tr>
</table>

<table cellspacing="0" cellpadding="0"  border="0"  style="border-collapse:collapse" id="tb">
<caption class="tdbg">服务反馈</caption>

<tr >
<td  width="11%" rowspan="2" ><span style="float:left; color:#000000; margin-left:18px;">仪器使<br />用状况</span><span style="float:left; margin-top:10px; margin-left:5px;"  >*</span></td>
<td width="9%" height="35">良好</td>
<td width="20%"><asp:RadioButton ID="qk11" runat="server" GroupName="qk1" Checked="true" /></td>
<td width="10%">一般</td>
<td width="20%"><asp:RadioButton ID="qk12" runat="server" GroupName="qk1" /></td>
<td width="10%">较差</td>
<td  width="20%"><asp:RadioButton ID="qk13" runat="server" GroupName="qk1" /></td>
</tr>
<tr >
<td width="9%"  height="35">主要问题</td>
<td  colspan="5"><input type="text" class="wenbenkh" id="zhuwenti1" runat="server" /></td>
</tr>

<tr >
<td  width="11%" rowspan="2" ><span style="float:left; color:#000000; margin-left:18px;">客服代表<br />服务状况</span><span style="float:left; margin-top:10px; margin-left:5px;"  >*</span></td>
<td width="9%" height="35">良好</td>
<td width="20%"><asp:RadioButton ID="qk21" runat="server" GroupName="qk2" Checked="true" /></td>
<td width="10%">一般</td>
<td width="20%"><asp:RadioButton ID="qk22" runat="server" GroupName="qk2" /></td>
<td width="10%">较差</td>
<td  width="20%"><asp:RadioButton ID="qk23" runat="server" GroupName="qk2" /></td>
</tr>
<tr >
<td width="9%"  height="35">主要问题</td>
<td  colspan="5"><input type="text" class="wenbenkh" id="zhuwenti2" runat="server" /></td>
</tr>

<tr >
<td  width="15%" rowspan="2" ><span style="float:left; color:#000000; margin-left:18px;">维修/安装工<br />程师的评价</span><span style="float:left; margin-top:10px; margin-left:5px;"  >*</span></td>
<td width="9%" height="35">良好</td>
<td width="18%"><asp:RadioButton ID="qk31" runat="server" GroupName="qk3" Checked="true" /></td>
<td width="10%">一般</td>
<td width="18%"><asp:RadioButton ID="qk32" runat="server" GroupName="qk3" /></td>
<td width="10%">较差</td>
<td  width="20%"><asp:RadioButton ID="qk33" runat="server" GroupName="qk3" /></td>
</tr>
<tr >
<td width="9%"  height="35">主要问题</td>
<td  colspan="5"><input type="text" class="wenbenkh" id="zhuwenti3" runat="server" /></td>
</tr>

<tr >
<td  width="11%" rowspan="2" ><span style="float:left; color:#000000; margin-left:18px; ">备品备件<br />使用情况</span><span style="float:left; margin-top:10px; margin-left:5px;"  >*</span></td>
<td width="9%" height="35">良好</td>
<td width="20%"><asp:RadioButton ID="qk41" runat="server" GroupName="qk4" Checked="true" /></td>
<td width="10%">一般</td>
<td width="20%"><asp:RadioButton ID="qk42" runat="server" GroupName="qk4" /></td>
<td width="10%">较差</td>
<td  width="20%"><asp:RadioButton ID="qk43" runat="server" GroupName="qk4" /></td>
</tr>
<tr >
<td width="9%"  height="35">主要问题</td>
<td  colspan="5" ><input type="text" class="wenbenkh" id="zhuwenti4" runat="server" /></td>

</tr>

<tr >

<td width="11%"  height="140">应用及维护需求</td>
<td  colspan="6" >
<textarea name="tear" class="totea" id="zhuwenti" runat="server" ></textarea>
</td>

</tr>
</table>

<script type="text/javascript">

var item=document.getElementById("tb");
var trs=item.getElementsByTagName("tr");
for(a=0;a<trs.length;a++){
	var tds=trs[a].getElementsByTagName("td");
	for(b=0;b<tds.length;b++){
		var imgs=tds[b].getElementsByTagName("img");
		for(i=0;i<imgs.length;i++){
		imgs[i].onclick=function(){
		//按/把字符串截成数组
		var arr = this.src.split("/") ;
		//获得最后一个数组
		var sc = arr[arr.length-1];
		
		if(sc == "wjtc1.jpg"){
			this.src ="images/wjtc2.jpg";
		}else{
			this.src ="images/wjtc1.jpg";
		}
		   }
		   }
	}
	

}

</script>

<table cellspacing="0" cellpadding="0"  border="0"  style="border-collapse:collapse"  width="100%">
  <caption class="tdbg" style=" height:30px; padding-top:8px;" >
    仪器、备件需求
  </caption>
<tr>
<td colspan="9" style="border:none;">
<table cellspacing="0"  cellpadding="0"  border="0"    width="100%" style=" border-collapse:collapse;"> 
  <tr >
<td  rowspan="4" width="12%">新仪器需求<br />
(请在您感兴趣 
的仪器后面划√)</td>
<td  width="15%" height="38">ICP光谱仪</td> 
<td  width="15%"><input type="checkbox" id="xq1" runat="server" /></td>
<td  width="15%">直流电弧光谱仪</td>
<td  width="15%"><input type="checkbox" id="xq2" runat="server" /></td>
<td  width="15%">全自动测汞仪</td>
<td  ><input type="checkbox" id="xq3" runat="server" /></td>

</tr>
  <tr>

<td  height="38">直读光谱仪</td>
<td><input type="checkbox" id="xq4" runat="server" /></td>
<td >总有机碳分析仪</td>
<td ><input type="checkbox" id="xq5" runat="server" /></td>
<td >元素分析仪</td>
<td ><input type="checkbox" id="xq6" runat="server" /></td>

</tr>
  <tr>

<td height="38">微波消解系统</td>
<td><input type="checkbox" id="xq7" runat="server" /></td>
<td >酸蒸馏纯化器</td>
<td ><input type="checkbox" id="xq8" runat="server" /></td>
<td >水分分析仪</td>
<td ><input type="checkbox" id="xq9" runat="server" /></td>

</tr>
  <tr>

<td height="38">其它需求</td>
<td colspan="5" ><input type="text" class="wenbenkh" id="qitaxuqiu" runat="server" /></td>


</tr>

  </table> 
</td>
 </tr>
   
  <tr>
    <td rowspan="2" width="114" style="border-top:none;" >备件需求</td>
    <td width="12%" height="38" style="border-top:none;">备件名称</td>
    <td width="12%" style="border-top:none;">数量</td>
    <td width="12%" style="border-top:none;">备件名称</td>
    <td width="12%" style="border-top:none;">数量</td>
    <td width="10%" style="border-top:none;">备件名称</td>
    <td width="10%" style="border-top:none;">数量</td>
    <td width="10%" style="border-top:none;">备件名称</td>
    <td style="border-top:none;">数量</td>
  </tr>
 
  <tr>

    <td width="12%" height="38"><input type="text" class="wenbenkh" id="beizhu1" runat="server"  /></td>
    <td width="12%"><input type="text" class="wenbenkh" id="beizhunum1" runat="server" /></td>
    <td width="12%"><input type="text" class="wenbenkh" id="beizhu2" runat="server" /></td>
    <td width="12%"><input type="text" class="wenbenkh" id="beizhunum2" runat="server" /></td>
    <td width="10%"><input type="text" class="wenbenkh" id="beizhu3" runat="server" /></td>
    <td width="10%"><input type="text" class="wenbenkh" id="beizhunum3" runat="server" /></td>
    <td width="10%"><input type="text" class="wenbenkh" id="beizhu4" runat="server" /></td>
    <td ><input type="text" class="wenbenkh" id="beizhunum4" runat="server" /></td>
   
  </tr>

</table>

<table cellspacing="0" cellpadding="0" width="960"  style="border-collapse:collapse"  border="0">
 <caption class="tdbg" style=" height:30px; padding-top:8px;" >
   其它意见
  </caption>
<tr>
<td width="100%"><textarea name="tear" class="totear" id="qitayijian" runat="server" ></textarea></td>
</tr>
</table>
<div class="tijiao">
<asp:ImageButton ID="imgbt" runat="server" ImageUrl="images/123.jpg" onclick="imgbt_Click" />
</div>
</div>

<div class="clear"></div>

</form>

  <!--底部-->
  <div id="bottom1"><myBtm:btm ID="btm1" runat="server" /></div>
  <!--底部 End--> 
</body>
</html>