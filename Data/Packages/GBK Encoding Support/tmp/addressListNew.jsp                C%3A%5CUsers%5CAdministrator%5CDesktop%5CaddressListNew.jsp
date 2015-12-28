<%@ page language="java" import="java.util.*" pageEncoding="GBK"%>
<%@ page import="java.sql.Connection,java.sql.Statement,java.sql.ResultSet,java.sql.SQLException,java.sql.DriverManager,com.teamsun.database.ehrDatabase"%>
<%
	String path = request.getContextPath();
	String basePath = request.getScheme() + "://" + request.getServerName() + ":" + request.getServerPort() + path + "/";
%>
<html>
	<head>
		<base href="<%=basePath%>">
		<title>通讯录</title>
	</head>
	<%
		//通过邮件地址获取from电话号码
		String fromMail = null;
		if(request.getParameter("fromMail")!=null && !request.getParameter("fromMail").equals("")){
			fromMail = request.getParameter("fromMail");
		}
		else if (request.getAttribute("fromMail")!=null && !request.getAttribute("fromMail").equals("")){
			fromMail = request.getAttribute("fromMail").toString();
		}
		String fromNumber = null;
		ehrDatabase db = null;
		Connection conn = null;
		Statement stmt = null;
		ResultSet rs = null;
		try {
				db = new ehrDatabase();
					//ehr系统数据库连接
				conn = db.getConnection();

				stmt = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
				
				if (fromMail != null) {
				//根据条件取信息
				String fromNumberSql = "select phone from addressList_v where mail='"+fromMail+"'";
				rs = stmt.executeQuery(fromNumberSql);
				if(rs.next()){
					fromNumber = rs.getString("phone");
					}
				}
				rs = null;
		}
		catch (Exception e) {
			e.printStackTrace();
		}
		
		String QdepartmentName = request.getParameter("QdepartmentName") == null ? "" : new String(request.getParameter("QdepartmentName").getBytes("ISO-8859-1"), "GBK");
		String QuserName = request.getParameter("QuserName") == null ? "" : new String(request.getParameter("QuserName").getBytes("ISO-8859-1"), "GBK");
		String QextensionNumber = request.getParameter("QextensionNumber") == null ? "" : new String(request.getParameter("QextensionNumber").getBytes("ISO-8859-1"), "GBK");
		String QmtNumber = request.getParameter("QmtNumber") == null ? "" : new String(request.getParameter("QmtNumber").getBytes("ISO-8859-1"), "GBK");
		String Qemail = request.getParameter("Qemail") == null ? "" : new String(request.getParameter("Qemail").getBytes("ISO-8859-1"), "GBK");
		//字符串过滤
		String tempStr = new String();
		int x;
		for (x = 0; x < QdepartmentName.length(); x++)
			if (QdepartmentName.charAt(x) != '\'' && QdepartmentName.charAt(x) != '%' && QdepartmentName.charAt(x) != '/' && QdepartmentName.charAt(x) != '部') {
				tempStr += QdepartmentName.charAt(x);
			}
		QdepartmentName = tempStr;

		tempStr = new String();
		for (x = 0; x < QuserName.length(); x++)
			if (QuserName.charAt(x) != '\'' && QuserName.charAt(x) != '%') {
				tempStr += QuserName.charAt(x);
			}
		QuserName = tempStr;

		tempStr = new String();
		for (x = 0; x < QextensionNumber.length(); x++)
			if (QextensionNumber.charAt(x) != '\'' && QextensionNumber.charAt(x) != '%') {
				tempStr += QextensionNumber.charAt(x);
			}
		QextensionNumber = tempStr;

		tempStr = new String();
		for (x = 0; x < QmtNumber.length(); x++)
			if (QmtNumber.charAt(x) != '\'' && QmtNumber.charAt(x) != '%') {
				tempStr += QmtNumber.charAt(x);
			}
		QmtNumber = tempStr;

		tempStr = new String();
		for (x = 0; x < Qemail.length(); x++)
			if (Qemail.charAt(x) != '\'' && Qemail.charAt(x) != '%') {
				tempStr += Qemail.charAt(x);
			}
		Qemail = tempStr;
		try {
			if (!QdepartmentName.equals("") || !QuserName.equals("") || !QextensionNumber.equals("") || !QmtNumber.equals("") || !Qemail.equals(""))
			{
			//根据条件取信息
			String ehrSql = "select dept,username,phone,mobile,mail,positionCategory from addressList_v where 1=1";
			if (!QdepartmentName.trim().equals("")) {
				ehrSql += " and dept like '%" + QdepartmentName.trim() + "%'";
			}
			if (!QuserName.trim().equals("")) {
				ehrSql += " and username like '%" + QuserName.trim() + "%'";
			}
			if (!QextensionNumber.trim().equals("")) {
				ehrSql += " and phone = '" + QextensionNumber.trim() + "'";
			}
			if (!QmtNumber.trim().equals("")) {
				ehrSql += " and mobile = '" + QmtNumber.trim() + "'";
			}
			if (!Qemail.trim().equals("")) {
				ehrSql += " and mail like '%" + Qemail.trim() + "%'";
			}
			ehrSql += " order by mail";
			rs = stmt.executeQuery(ehrSql);
			}
	%>
	<script>
function query() {
	var QdepartmentName = document.queryForm.QdepartmentName.value.replace(
			/(^\s*)|(\s*$)/g, '');
	var QuserName = document.queryForm.QuserName.value.replace(
			/(^\s*)|(\s*$)/g, '');
	var QextensionNumber = document.queryForm.QextensionNumber.value.replace(
			/(^\s*)|(\s*$)/g, '');
	var QmtNumber = document.queryForm.QmtNumber.value.replace(
			/(^\s*)|(\s*$)/g, '');
	var Qemail = document.queryForm.Qemail.value.replace(/(^\s*)|(\s*$)/g, '');
	if (QdepartmentName == '' && QuserName == '' && QextensionNumber == ''
			&& QmtNumber == '' && Qemail == '') {
		alert("至少输入一个查询条件！");
		return;
	}
	document.queryForm.submit();
}
</script>
	<style type="text/css">
	td{margin:0;padding: 0;}
A {
	VERTICAL-ALIGN: middle;
	COLOR: black;
	TEXT-DECORATION: none;
	font-size: 9pt
}

A:hover {
	COLOR: #0032b7;
	TEXT-DECORATION: none;
	font-size: 9pt
}

BODY {
	PADDING-RIGHT: 0px;
	PADDING-LEFT: 0px;
	PADDING-BOTTOM: 0px;
	MARGIN: 0px;
	PADDING-TOP: 0px scrollbar-arrow-color :   
		                                
			          0000FF;
	scrollbar-3dlight-color: A6CAF0;
	scrollbar-face-color: A6CAF0;
	scrollbar-darkshadow-color: A6CAF0;
	scrollbar-track-color: FFFBF0;
	scrollbar-highlight-color: FFFFFF;
	scrollbar-shadow-color: FFFFFF;
}

Table {
	border-collapse: collapse;
	font-size: 9pt;
	COLOR: black;
}

TH {
	border: 1px solid black;
	font-weight: normal;
	font-size: 9pt;
	COLOR: black;
	BACKGROUND-COLOR: #C4E0B7;
	line-height: 24px;
}

TD {
	line-height: 18px;
}

.List {
	border: 1px solid black;
	font-size: 9pt;
	BACKGROUND-COLOR: #ffffff;
}

.sItem {
	display: none;
}

.SearchButton {
	BORDER: black 0px solid;
	color: black;
	FONT-SIZE: 9pt;
	/*Font-weight	: bold;*/
	CURSOR: hand;
	/*LINE-HEIGHT	: 22px;*/
	BACKGROUND-COLOR: #DDDDDD;
	PADDING-left: 5px;
	PADDING-right: 5px;
	padding-top: 2px;
	padding-bottom: 0px;
	height: 20px;
	vertical-align: middle;
	text-decoration: none;
}

#outline {
	display: inline;
	padding: 0px
}

.tree {
	margin: 0px;
	padding-bottom: 0px;
}

.tree ul {
	margin-left: 10px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	padding-left: 0px;
}

.tree li {
	list-style-type: none;
	margin: 0px padding-bottom : 
		                                            
		    0px;
}

ul {
	list-style-type: none;
	font-size: 9pt;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

div {
	padding: 0px;
}
</style>
	<script>

var m_curwin;//定义当前被打开的窗口
var m_oOpened; //记录打开的窗口句柄.

function getOpened() {
	if (!m_oOpened) {
		m_oOpened = new Array();
	}
	return m_oOpened;
}

function onloadResize(nomoving) {
	var width = m_curwin.document.body.scrollWidth;
	var height = m_curwin.document.body.scrollHeight + 38;

	//if(!nomoving)
	//{
	var showx = screen.availWidth / 2 - width / 2;
	var showy = screen.availHeight / 2 - height / 2;

	m_curwin.moveTo(showx, showy);
	//}
	m_curwin.resizeTo(width + 30, height);
}

function extendedopen(sURL, sName, sFeatures, bReplace) {
	if (!sURL) {
		sURL = '';
	}
	if (!sName) {
		sName = '';
	}
	if (!sFeatures) {
		sFeatures = '';
	}
	if (!bReplace) {
		bReplace = '';
	}

	var t_bHasChip = false;

	var t_oOpenedList = getOpened();

	var t_retWin = window.open(sURL, sName, sFeatures, bReplace);

	for (i = 0; i < t_oOpenedList.length; i++) {

		if (t_oOpenedList[i].closed) {
			t_oOpenedList[i] = t_retWin;
			t_bHasChip = true;
			break;
		}
	}
	if (!t_bHasChip) {
		t_oOpenedList[t_oOpenedList.length] = t_retWin;
	}

	return t_retWin;
}

function openWinFromForm(oForm, title, width, height, autoresize, scrollbars) {
	if (!oForm) {
		return;
	}
	showx = screen.availWidth / 2 - width / 2;
	showy = screen.availHeight / 2 - height / 2;

	var isscrollbars;
	if (!scrollbars) {
		isscrollbars = 'yes'
	} else {
		isscrollbars = 'no'
	}

	m_curwin = extendedopen('', title, "width=" + width + ",height=" + height
			+ ",top=" + showy + ",left=" + showx
			+ ",directories=no,location=no,menubar=no,resizable=no,scrollbars="
			+ isscrollbars + ",status=no,titlebar=no,toolbar=no");
	if (autoresize) {
		//m_curwin.attachEvent('onload', onloadResize);
	}

	oForm.target = title;
	oForm.submit();

	m_curwin.focus();

	return m_curwin;
}

function openWin(url, title, width, height, autoresize, scrollbars) {

	/* 根据传进来的大小计算窗口所在屏幕位置 */
	var showx = (screen.availWidth - width) / 2;
	var showy = (screen.availHeight - height) / 2;

	var isscrollbars = scrollbars ? "yes" : "no";

	if (autoresize) {
		/* 在当前页面标记重算大小标记 */
		window.isResize = true;
	}

	var m_win = extendedopen(url, title, "width=" + width + ",height=" + height
			+ ",top=" + showy + ",left=" + showx
			+ ",directories=no,location=no,menubar=no,resizable=no,scrollbars="
			+ isscrollbars + ",status=no,titlebar=no,toolbar=no");
	if (m_win) {
		m_win.focus();
	}

	return m_win;
}
function postOpen(from, to, name) {
	form1.from.value = from;
	form1.to.value = to;
	var nameNew = encodeURI(name);
	form1.name.value = nameNew;
	openWinFromForm(form1, "dialWin", 350, 200, false, "no");
}
</script>
	<body text="#000000" bgcolor="#FFFFFF">
		<form name='form1' action='http://172.16.1.171:7003/telephony/makeCall.do' method='post'>
			<input type="hidden" name="from" />
			<input type="hidden" name="to" />
			<input type="hidden" name="name" />
		</form>
		<form name="queryForm" action='/addressListNew.jsp' method='post'>
			<input type="hidden" name="fromMail" value="<%=fromMail%>" />
			<br>
			<table width="100%" cellspacing="0" cellpadding="0">
				<tr>
					<td align="center">
						<table width="96%" bgcolor="#DDDDDD" style="margin-top: 0px; border: 1px solid black">
							<tr>
								<td width="8%" align="right">
									 部门名称：
								</td>
								<td width="10%" align="left">
									<input name=QdepartmentName type=text size=10 value="<%=QdepartmentName%>">
								</td>
								<td width="8%" align="right">
									姓名：
								</td>
								<td width="10%" align="left">
									<input name=QuserName type=text size=10 value="<%=QuserName%>">
								</td>
								<td width="8%" align="right">
									分机号码：
								</td>
								<td width="10%" align="left">
									<input name=QextensionNumber type=text size=10 value="<%=QextensionNumber%>">
								</td>
								<td width="8%" align="right">
									手机号码：
								</td>
								<td width="10%" align="left">
									<input name=QmtNumber type=text size=10 value="<%=QmtNumber%>">
								</td>
								<td width="8%" align="right">
									Email：
								</td>
								<td width="10%" align="left">
									<input name=Qemail type=text size=10 value="<%=Qemail%>">
								</td>
								<td width="10%" align="center">
									<input type="button" onClick="query()" value="查询" id="btnSearch" class="SearchButton">
								</td>
							</tr>
						</table>
						<br>
						<table width="96%" border="0">
							<tr valign="top">
								<td colSpan="5" align="center">
									通讯录信息如不准确，请进入"员工自助"系统进行个人信息维护，或联系人力部门进行调整和咨询。
								</td>
							</tr>
						</table>
						<table width="96%" border="1" style="margin-top: 0px; border: 1px solid black">
							<%
								if (rs == null) {
							%>
							<tr>
								<TD bgcolor="#F7F7F7" valign="middle" align="center" width="17%">
									平台								</TD>
  <TD bgcolor="#F7F7F7" valign="middle" align="center" width="9%">
									负责人								</TD>
<TD bgcolor="#F7F7F7" valign="middle" align="center" width="12%">
									分公司/办事处								</TD>
<TD bgcolor="#F7F7F7" valign="middle" align="center" width="19%">
									地址								</TD>
  <TD bgcolor="#F7F7F7" valign="middle" align="center" width="5%">
									邮编								</TD>
				  <TD bgcolor="#F7F7F7" valign="middle" align="center" width="7%">
									主任								</TD>
<TD bgcolor="#F7F7F7" valign="middle" align="center" width="12%">
									助理								</TD>
<TD bgcolor="#F7F7F7" valign="middle" align="center" width="7%">
									电话								</TD>
<TD bgcolor="#F7F7F7" valign="middle" align="center" width="12%">
									传真								</TD>
						  </TR>
							<TR>
								<TD colspan="3" align="center">
									华胜天成总部								</TD>
								<TD>
									北京市海淀区东北旺西路软件园二期华胜天成科研大楼								</TD>
								<TD>&nbsp;								</TD>
								<TD>&nbsp;								</TD>
								<TD>								</TD>
								<TD>
									前台：010-80986666								</TD>
								<TD>								</TD>
							</TR>
                            <TR>
							  <TD rowspan="2"><div align="left">东一区</div></TD>
								<TD rowspan="2">陈强、龙乘云</TD>
								<TD>
									上海分公司								</TD>
								<TD>上海市闵行区合川路2679号虹桥国际商务广场B栋601室</TD>
				  <TD>
									200051								</TD>
								<TD>龙乘云 </TD>
								<TD> 李燕霞</TD>
								<TD>
									021-62351222								</TD>
								<TD>
									021-62351629								</TD>
							</TR>
							<TR>
							  <TD>
								  杭州办事处								</TD>
								<TD>
									杭州市玉古路173号中田大厦6楼G座								</TD>
								<TD>
									310013								</TD>
								<TD>
									刘昌平								</TD>
								<TD>刘昌平（兼）</TD>
						  <TD>
									0571-87672710<br>
									0571-87672711<br>
									0571-87672712								</TD>
								<TD>
									0571-87672713								</TD>
							</TR>
							<TR>
								<TD><div align="left">东二区</div></TD>
								<TD>李文军 </TD>
								<TD>
									南京子公司/南京办事处								</TD>
								<TD>
									南京市汉中门大街303号南京国际服务外包大厦02栋D座8层								</TD>
								<TD>
									210036								</TD>
								<TD>李文军</TD>
								<TD>白翠翠</TD>
								<TD>
									025-88012000								</TD>
								<TD>025-88012020</TD>
						  </TR>
							<TR>
							  <TD><div align="left">东三区</div></TD>
								<TD>胡贵新</TD>
								<TD>
									武汉办事处								</TD>
								<TD>
									武汉市江汉经济开发区江兴路8号天策楼3栋2层								</TD>
								<TD>
									430024								</TD>
								<TD>
									胡贵新								</TD>
								<TD>
									王志梅								</TD>
								<TD>
									027-87322512<br>
									027-87322513								</TD>
								<TD>
									027-83565300								</TD>
							</TR>
							
							<TR>
								<TD rowspan="6">
									南区								</TD>
								<TD rowspan="6">
									洪国强								</TD>
								<TD>
									广州办事处								</TD>
								<TD>
									广州市天河区体育西路101-103号维多利广场B塔34楼								</TD>
								<TD>
									510620								</TD>
								<TD>&nbsp;								</TD>
								<TD>梁洁文</TD>
						  <TD>
									020-28092788								</TD>
								<TD>
									020-28092799								</TD>
							</TR>
							<TR>
								<TD>
									南宁办事处								</TD>
								<TD>
									广西南宁市青秀区金洲路25号太平洋世纪广场A座20层2001室								</TD>
								<TD>
									530021								</TD>
								<TD>								</TD>
								<TD>殷硕（兼）</TD>
								<TD>
									0771-5760050								</TD>
								<TD>
									0771-5760050								</TD>
							</TR>
							<TR>
								<TD>
									深圳子公司/深圳办事处								</TD>
								<TD>
									深圳市南山区高新中二道深圳软件园二期12栋601								</TD>
								<TD>
									518057								</TD>
								<TD>钟浩华</TD>
						  <TD>何苗苗</TD>
						  <TD>
									0755-86028082								</TD>
								<TD>
									0755-26711451								</TD>
							</TR>
							<TR>
								<TD>
									湖南办事处								</TD>
								<TD>
									长沙市韶山北路159号通程国际大酒店1202-03室</TD>
								<TD>
									410014								</TD>
								<TD>
																	</TD>
								<TD>
									钱海燕								</TD>
								<TD>
									0731-82225605<br>
									0731-82220229<br>
									0731-82220559								</TD>
								<TD>
									0731-82225605-888								</TD>
							</TR>
							<TR>
								<TD>
									福州分公司								</TD>
								<TD>
									福州市台江区八一七路茶亭国际13层12-13单元</TD>
								<TD>
									350003								</TD>
								<TD>
																	</TD>
								<TD>戴克强（兼）</TD>
								<TD>
									0591-88601965								</TD>
								<TD>
									0591-88012943								</TD>
							</TR>
							<TR>
								<TD>
									桂林办								</TD>
								<TD>
									桂林市七星区穿山东路11-123号樱特莱庄园明月36号</TD>
								<TD>
									541000								</TD>
								<TD>秦华</TD><TD>秦华（兼）</TD>
								<TD>
									0773-8999311								</TD>
								<TD>
									0773-8999311								</TD>
							</TR>
							<TR>
								<TD rowspan="4">
									西南区								</TD>
								<TD rowspan="4">
									王赛								</TD>
								<TD>
									成都联络处								</TD>
								<TD>
									成都市高新区天华二路219号天府软件园C区7号楼1层								</TD>
								<TD>
									610041								</TD>
								<TD>&nbsp;								</TD>
								<TD>
									陈姿伶								</TD>
								<TD>
									028-65538900								</TD>
								<TD>
									028-65538999								</TD>
							</TR>
							<TR>
								<TD>
									昆明办事处								</TD>
								<TD>
									昆明市人民中路22号长春花园17楼H座								</TD>
								<TD>
									650000								</TD>
								<TD>								</TD>
								<TD>胡春苗（兼）</TD>
								<TD>
									0871-3179389								</TD>
								<TD>
									0871-3179389								</TD>
							</TR>
							<TR>
								<TD>
									贵阳办事处								</TD>
								<TD>
									贵阳市大西门腾达广场A栋14-9								</TD>
								<TD>
									550001								</TD>
								<TD>
									徐锋								</TD>
								<TD>
									申琳								</TD>
								<TD>
									0851-5285309								</TD>
								<TD>
									0851-5285309								</TD>
							</TR>
							<TR>
								<TD height="72">
									重庆办事处								</TD>
								<TD>
									重庆市北部新区青枫北路12号1幢高新拓展区（A1A2）4号楼双子B座3楼01#</TD>
  <TD>
									400000								</TD>
								<TD>
									杨捷</TD>
								<TD>杨捷（兼）</TD>
								<TD>
									023-63824223								</TD>
								<TD>
									023-63824223								</TD>
						  </TR>
						  <TR>
								<TD rowspan="2">
									西北区								</TD>
								<TD rowspan="2">
									刘珩								</TD>
								<TD>
									西安办事处								</TD>
								<TD>
									西安市高新区科技路48号创业广场B座904室								</TD>
								<TD>
									710075								</TD>
								<TD>
									刘珩								</TD>
								<TD>
									李貂								</TD>
								<TD>
									029-87999716-19<br>
									029-88318108<br>
									029-88350998<br>
									029-88310566								</TD>
								<TD>
									029-87999718								</TD>
							</TR>
							<TR>
								<TD>
									乌鲁木齐办事处								</TD>
								<TD>
									乌鲁木齐市北京南路高新区高新街217号盈科广场A座14层12B-2								</TD>
								<TD>
									830000								</TD>
								<TD>
									贾小楠								</TD>
								<TD>
									慕郑玉								</TD>
								<TD>
									0991-6999527<br>
									0991-6999583<br>
									0991-6999511<br>
									0991-6999593								</TD>
								<TD>
									0991-6999527-8015								</TD>
							</TR>
						
							
							<TR>
								<TD rowspan="4">
									北区								</TD>
								<TD rowspan="4">
									韩冰								</TD>
								<TD>
									济南办事处								</TD>
								<TD>
									济南市历下区榜棚街1号华鲁大厦400室								</TD>
								<TD>
									250011								</TD>
								<TD>
									王率								</TD>
								<TD>
									徐石青								</TD>
								<TD>
									0531-67885593<br>
									0531-67885595<br>
									0531-67885596<br>
									0531-67885597<br>
									0531-67885599								</TD>
								<TD>
									0531-67885597								</TD>
							</TR>
                            
							<TR>
								<TD>
									沈阳分公司								</TD>
								<TD>
									沈阳市和平区和平北大街69号总统大厦A座1903室								</TD>
								<TD>
									110003								</TD>
								<TD>
									胡润泽								</TD>
								<TD>付滢淇</TD>
				  <TD>
									024-22812800<br>
									024-22812229								</TD>
								<TD>
									024-22812811								</TD>
							</TR>
							<TR>
								<TD>
									哈尔滨办事处								</TD>
								<TD>
									哈尔滨市南岗区民益街76号网通大厦2118室								</TD>
								<TD>
									150001								</TD>
								<TD>
									胡润泽								</TD>
								<TD>胡润泽（兼）</TD>
								<TD>
									0451-86299878<br>
									0451-53629122								</TD>
								<TD>
									0451-53629122								</TD>
							</TR>
                            <TR>
								<TD>天津办事处</TD>
								<TD>天津市和平区南马路11号 麦购国际大厦28层</TD>
								<TD>300022</TD>
								<TD>徐进峰</TD>
								<TD>徐进峰（兼）</TD>
								<TD>022-87341628</TD>
                                <TD>022-87341661</TD>
							</TR>
							<TR>
								<TD colspan="3" align="center">
									华胜天成科技（香港）有限公司								</TD>
								<TD>
									香港湾仔壮士敦道211号20楼A室								</TD>
								<TD>&nbsp;								</TD>
								<TD>&nbsp;								</TD>
								<TD>&nbsp;								</TD>
								<TD>
									852-28921008								</TD>
								<TD>
									852-28922502								</TD>
							</TR>
							<%
								} else if (!rs.next()) {
							%>

							<tr valign="top">
								<td colSpan=5 bgcolor="#DDDDDD" valign="middle" align="center">
									<b>无符合条件记录！</b>								</td>
							</tr>
							<%
								} else {
							%>
							<tr valign="top">
								<td width="17%" bgcolor="#DDDDDD" valign="middle" align="center">
									<b>部门名称</b>								</td>
  <td width="9%" bgcolor="#DDDDDD" valign="middle" align="center">
									<b>姓名</b>								</td>
<td width="12%" bgcolor="#DDDDDD" valign="middle" align="center">
									<b>分机号码</b>								</td>
<td width="19%" bgcolor="#DDDDDD" valign="middle" align="center">
									<b>手机号码</b>								</td>
  <td width="5%" bgcolor="#DDDDDD" valign="middle" align="center">
									<b>Email</b>								</td>
				  <td width="7%" bgcolor="#DDDDDD" valign="middle" align="center">
									<b>岗位类型</b>								</td>
						  </tr>
							<%
								String dataOutStr = "";
										rs.beforeFirst();
										int i = 0;
										while (rs.next()) {
											String departmentName = rs.getString("dept") == null ? "" : rs.getString("dept");
											String userName = rs.getString("username") == null ? "" : rs.getString("username");
											String extensionNumber = rs.getString("phone") == null ? "" : rs.getString("phone");
											String mtNumber = rs.getString("mobile") == null ? "" : rs.getString("mobile");
											String email = rs.getString("mail") == null ? "" : rs.getString("mail");
											if (email.split("@").length == 1) {
												email += "@teamsun.com.cn";
											}
											String positionCategory = rs.getString("positionCategory") == null ? "" : rs.getString("positionCategory");

											dataOutStr += "<tr valign='top'>\n";
											dataOutStr += "<td align='center' valign='middle'" + (i % 2 == 0 ? "" : "bgcolor='#F7F7F7'") + ">" + (departmentName.equals("") ? "&nbsp;" : departmentName) + "</td>\n";
											dataOutStr += "<td align='center' valign='middle'" + (i % 2 == 0 ? "" : "bgcolor='#F7F7F7'") + ">" + (userName.equals("") ? "&nbsp;" : userName) + "</td>\n";
											dataOutStr += "<td align='center' valign='middle'" + (i % 2 == 0 ? "" : "bgcolor='#F7F7F7'") + ">" + (extensionNumber.equals("") ? "&nbsp;" : extensionNumber);
											if (fromNumber != null && fromNumber.length() == 4 && extensionNumber != null && extensionNumber.length() >= 4) {
												dataOutStr += "<img src='/images/callPhone.gif' style='cursor:hand' onclick='postOpen(\"" + fromNumber + "\",\"" + extensionNumber + "\",\"" + userName + "\")' />";
											}
											dataOutStr += "</td>\n";
											dataOutStr += "<td align='center' valign='middle'" + (i % 2 == 0 ? "" : "bgcolor='#F7F7F7'") + ">" + (mtNumber.equals("") ? "&nbsp;" : mtNumber);
											if (fromNumber != null && fromNumber.length() == 4 && mtNumber != null && mtNumber.length() >= 4) {
												dataOutStr += "<img src='/images/callPhone.gif' style='cursor:hand' onclick='postOpen(\"" + fromNumber + "\",\"" + mtNumber + "\",\"" + userName + "\")' />";
											}
											
											dataOutStr += "</td>\n";
											dataOutStr += "<td align='center' valign='middle'" + (i % 2 == 0 ? "" : "bgcolor='#F7F7F7'") + ">" + (email.equals("") ? "&nbsp;" : email) + "</td>\n";
											dataOutStr += "<td align='center' valign='positionCategory'" + (i % 2 == 0 ? "" : "bgcolor='#F7F7F7'") + ">" + (positionCategory.equals("") ? "&nbsp;" : positionCategory) + "</td>\n";
											dataOutStr += "</tr>\n";
											i++;
										}
										//System.out.println("dataOutStr:\n"+dataOutStr);
										out.write(dataOutStr);
										//System.out.println("dataOutStr write is ok !");
									}

								} catch (Exception e) {
									e.printStackTrace();
								}
								try {
									if (rs != null) {
										rs.close();
										stmt.close();
										conn.close();
										db.close();
									}
								} catch (SQLException e) {
									e.printStackTrace();
								}
							%>
						</table>
				  </td>
				</tr>
			</table>
		</form>
	</body>
</html>
<script language="JavaScript" type="text/javascript">
document.onkeydown = function(evt) {
	var evt = window.event ? window.event : evt;
	if (evt.keyCode == 13) {
		query();
	}
}
</script>