var getElementsByName = function(tag, name){
   var returns = document.getElementsByName(name);
   if(returns.length > 0) return returns;
   returns = new Array();
   var e = document.getElementsByTagName(tag);
   for(var i = 0; i < e.length; i++){
    if(e[i].getAttribute("name") == name){
     returns[returns.length] = e[i];
    }
   }
   return returns;
}


function check()
{
	var title = document.getElementById("title").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
    if(title=="")
	{
	  showli('li_1');
	  document.getElementById("title").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“标题”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	 document.getElementById("div_errmes").style.display = "none";
	 
	     if(document.getElementById("price").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1')=="")
	{
	  showli('li_1');
	  document.getElementById("price").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“价格”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	 document.getElementById("div_errmes").style.display = "none";
	
		     if(document.getElementById("area").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1')=="")
	{
	  showli('li_1');
	  document.getElementById("area").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	 document.getElementById("div_errmes").style.display = "none";
	 

	 
	 	var title1 = document.getElementById("title1").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
    if(title1=="")
	{
	  showli('li_1');
	  document.getElementById("title1").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“名称”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	
//	document.getElementById("pro_type").value= document.getElementById("div_pro_type").innerHTML;
//	     if(document.getElementById("pro_type").value=="")
//	{
//	   showli('li_1');
//	   document.getElementById("div_errmes").innerHTML = "请选择“房屋类型”";
//	   document.getElementById("div_errmes").style.display = "block";
//	   return false;
//	}
	document.getElementById("div_errmes").style.display = "none";
	
		    if(document.getElementById("pro_cbd").value=="")
	{
	  showli('li_1');
	  document.getElementById("div_errmes").innerHTML = "请选择“区县”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	if(document.getElementById("pro_offer").value=="")
	{
	  showli('li_1');
	  document.getElementById("div_errmes").innerHTML = "请选择“交易报价”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	
		if(document.getElementById("pro_area").value=="")
	{
	  showli('li_1');
	  document.getElementById("div_errmes").innerHTML = "请选择“房产面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}

	document.getElementById("div_errmes").style.display = "none";
    /*项目介绍 验证*/
	if(document.getElementById("describe_content").value=="")
	{
	  showli('li_1');
	  document.getElementById("div_errmes").innerHTML = "请填写“项目介绍”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	/*位置地图 验证*/
	/*if(document.getElementById("place_address").value=="")
	{
	  showli('li_2');
	  document.getElementById("place_address").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“项目地址”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("place_describe").value=="")
	{
	  showli('li_2');
	  document.getElementById("place_describe").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“位置描述”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("place_traffic").value=="")
	{
	  showli('li_2');
	  document.getElementById("place_traffic").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“公共交通”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	if(document.getElementById("place_map").value=="")
	{
	  showli('li_2');
	  document.getElementById("place_map").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“位置地图”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";*/
	
	/*建筑信息 验证*/
   /*if(document.getElementById("build_zjxx").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_zjxx").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“建筑信息”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	
		if(document.getElementById("build_tdmj").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_tdmj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“土地面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	
		if(document.getElementById("build_zdmj").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_zdmj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“占地面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
				if(document.getElementById("build_zjzmj").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_zjzmj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“总建筑面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	
			if(document.getElementById("build_dsmj").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_dsmj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“地上面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("build_dxmj").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_dxmj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“地下面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("build_jzgd").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_jzgd").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“建筑高度”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("build_zfjs").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_zfjs").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“总房间数”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("build_cwsl").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_cwsl").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“车位数量”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("build_dscw").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_dscw").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“地上车位”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("build_dxcw").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_dxcw").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“地下车位”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
				if(document.getElementById("build_zlcs").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_zlcs").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“总楼层数”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
				if(document.getElementById("build_dscs").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_dscs").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“地上层数”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
				if(document.getElementById("build_dxcs").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_dxcs").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“地下层数”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
				if(document.getElementById("build_bzcg").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_bzcg").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“标准层高”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
				if(document.getElementById("build_bzjg").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_bzjg").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“标准净高”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
				if(document.getElementById("build_bzcjzmj").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_bzcjzmj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“标准层建筑面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
				if(document.getElementById("build_kjmj").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_kjmj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“主力户型/开间面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
				if(document.getElementById("build_bzfjmj").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_bzfjmj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“标准房间面积”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
					if(document.getElementById("build_zxqk").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_zxqk").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“装修情况”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
					if(document.getElementById("build_jzjg").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_jzjg").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“建筑结构”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
					if(document.getElementById("build_wlm").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_wlm").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“外立面”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
					if(document.getElementById("build_nq").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_nq").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“内墙”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	if(document.getElementById("build_dtggbf").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_dtggbf").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“大堂及公共部分”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	if(document.getElementById("build_qtsm").value=="")
	{
	  showli('li_3');
	  document.getElementById("build_qtsm").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“其他说明”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";*/
	
	/*项目图片验证*/
   /*if(document.getElementsByName("pro_imgs[]").length<1)
	{
	  showli('li_4');
	  document.getElementById("div_errmes").innerHTML = "请上传至少一张“项目图片”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";*/


	/*if(document.getElementById("facility_kt").value=="")
	{
	  showli('li_5');
	  document.getElementById("facility_kt").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“客梯”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("facility_ht").value=="")
	{
	  showli('li_5');
	  document.getElementById("facility_ht").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“货梯”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("facility_ktiao").value=="")
	{
	  showli('li_5');
	  document.getElementById("facility_ktiao").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“空调”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("facility_gn").value=="")
	{
	  showli('li_5');
	  document.getElementById("facility_gn").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“供暖”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("facility_gs").value=="")
	{
	  showli('li_5');
	  document.getElementById("facility_gs").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“供水”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("facility_gd").value=="")
	{
	  showli('li_5');
	  document.getElementById("facility_gd").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“供电”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("facility_rq").value=="")
	{
	  showli('li_5');
	  document.getElementById("facility_rq").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“燃气”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("facility_qt").value=="")
	{
	  showli('li_5');
	  document.getElementById("facility_qt").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“其他”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
var isflag = false;
	for(var i = 0;i < document.getElementsByName("facility_lnpt[]").length;i++)
	{
		if(document.getElementsByName("facility_lnpt[]")[i].checked)
		{
			isflag = true;
			break;
		}
	}
	if(!isflag)
	{
		showli('li_5');
	  document.getElementById("div_errmes").innerHTML = "请选择“楼内配套”";
	  document.getElementById("div_errmes").style.display = "block";
		return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	
	isflag = false;
	for(var i = 0;i < document.getElementsByName("trade_jyfs1[]").length;i++)
	{
		if(document.getElementsByName("trade_jyfs1[]")[i].checked)
		{
			isflag = true;
			break;
		}
	}
	if(!isflag)
	{
		showli('li_7');
	  document.getElementById("div_errmes").innerHTML = "请选择“交易方式”";
	  document.getElementById("div_errmes").style.display = "block";
		return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
	
		if(document.getElementById("trade_fkfs").value=="")
	{
	  showli('li_7');
	  document.getElementById("trade_fkfs").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“付款方式”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("trade_bzj").value=="")
	{
	  showli('li_7');
	  document.getElementById("trade_bzj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“保 证 金”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("trade_gprq").value=="")
	{
	  showli('li_7');
	  document.getElementById("trade_gprq").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“挂牌日期”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
		if(document.getElementById("trade_qttj").value=="")
	{
	  showli('li_7');
	  document.getElementById("trade_qttj").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“其他条件”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("owner_gsmc").value=="")
	{
	  showli('li_8');
	  document.getElementById("owner_gsmc").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“公司名称”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("owner_szwz").value=="")
	{
	  showli('li_8');
	  document.getElementById("owner_szwz").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“所在位置”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("owner_bgdz").value=="")
	{
	  showli('li_8');
	  document.getElementById("owner_bgdz").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“办公地址”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("owner_zczb").value=="")
	{
	  showli('li_8');
	  document.getElementById("owner_zczb").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“注册资本”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("owner_cygq").value=="")
	{
	  showli('li_8');
	  document.getElementById("owner_cygq").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“持有产权/股权比例”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("owner_zrgq").value=="")
	{
	  showli('li_8');
	  document.getElementById("owner_zrgq").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“转让产权/股权比例”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";
	
			if(document.getElementById("owner_gsjs").value=="")
	{
	  showli('li_8');
	  document.getElementById("owner_gsjs").focus();
	  document.getElementById("div_errmes").innerHTML = "请填写“公司介绍”";
	  document.getElementById("div_errmes").style.display = "block";
	  return false;
	}
	document.getElementById("div_errmes").style.display = "none";*/
	
}
function setpro_type(xid)
{
	document.getElementById("pro_type").value = xid.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
}
function setpro_status(xid)
{
	document.getElementById("pro_status").value = xid.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
}
function sbscpt_offer(xid)
{
	document.getElementById("sbscpt_offer").value = xid.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
}
function set_xlink(ddnames,cssnames,idname,xid)
{

	var ddarr = getElementsByName("dd","dd_citys");
	var o = getElementsByName("a", ddnames);

	for(var i = 0;i < o.length;i++)
	{

		o[i].style.background  = "white";
        o[i].style.color  = "#666";
	}
	// 	for(var i = 0;i < ddarr.length;i++)
	// {
 //        var n = $(ddarr[i]).children();
	// 	var m = document.getElementById(n.attr("id"));
	// 	m.style.background  = "white";
 //        m.style.color  = "#666";

	// }
	document.getElementById(idname).value = xid;
	document.getElementById(cssnames+xid).style.background ="#CC3B3A";
	document.getElementById(cssnames+xid).style.color ="white";
	
}

function setPro_cbd(xid,xname)
{
	document.getElementById("pro_cbd").value = xid;
    document.getElementById("dd_pro_cbd").innerHTML = "<a href='#' style='background:#CC3B3A;color:white'>" + xname + "</a>";
	document.getElementById("dd_pro_cbd").style.display = "block";
}

function setPro_offer(xid,xname)
{
	document.getElementById("pro_offer").value = xid;
    document.getElementById("dd_pro_offer").innerHTML = "<a href='#' style='background:#CC3B3A;color:white'>" + xname + "</a>";
	document.getElementById("dd_pro_offer").style.display = "block";
}

function setPro_area(xid,xname)
{
	document.getElementById("pro_area").value = xid;
    document.getElementById("dd_pro_area").innerHTML = "<a href='#' style='background:#CC3B3A;color:white'>" + xname + "</a>";
	document.getElementById("dd_pro_area").style.display = "block";
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
function getcbd()
{

           $.ajax({
       type: "POST",
       url: "actionServer.php",
       data: "action=getsub&tabname=pro_cbd&fid=" + document.getElementById("pro_citys").value ,
       success: function(msg){
		 
         var myarr1 = msg.split("|");
		 //document.getElementById("div_cbd_more").innerHTML = "";
		 var html = "";
		 var morehtml = "";
        var my_pro_cbd = document.getElementById("my_pro_cbd").value;
         for(var i = 0;i < myarr1.length-1;i++)
         {
		
           var myarr2 = myarr1[i].split(",");
		   	 var selectstr = "";
			 
			 if(my_pro_cbd==trim(myarr2[0]))
			 {
				 selectstr = "style='background:#CC3B3A;color:white'";
			 }else{
				 selectstr = "";
			 }
		   if(i >4){
			  html = html + "<dd name='dd_cbd' id='dd_cbd'><a "+selectstr+" href='javascript:void(0)' name='link_pro_cbd' id='css_cbd_"+trim(myarr2[0])+"' style='display:none;'  onclick=\"set_xlink('link_pro_cbd','css_cbd_','pro_cbd',"+trim(myarr2[0])+");\">" + trim(myarr2[1]) + "</a></dd>";
		   }else{
				html = html + "<dd name='dd_cbd' id='dd_cbd'><a "+selectstr+" href='javascript:void(0)' name='link_pro_cbd' id='css_cbd_"+trim(myarr2[0])+"' onclick=\"set_xlink('link_pro_cbd','css_cbd_','pro_cbd',"+trim(myarr2[0])+")\">" + trim(myarr2[1]) + "</a></dd>";
		   }
           
         }
		 morehtml = "<dd id=\"div_cbd_more\"><span id='pro_cbd_more' style='cursor:pointer;color:#d3d3d3;'  onclick=\"showmore('link_pro_cbd','pro_cbd_more','is_show_pro_citys_more')\">更多>> </span></dd>";
		 html = html + "<input type='hidden' name='pro_cbd' id='pro_cbd' value='"+my_pro_cbd+"'/><dd id='dd_pro_cbd' style='display:none'></dd>";
		 document.getElementById("dl_pro_cbd").innerHTML = html+morehtml;

			 //morehtml = "<a id='pro_cbd_more'  onclick=\"showmore('link_pro_cbd_more','pro_cbd_more','is_show_pro_citys_more')\">更多>> </a>";
			 //document.getElementById("div_cbd_more").innerHTML = morehtml;

       }
	   
    });
		   
}
getcbd();

function insertdate()
{
	var a = $(".samp_x").length;
	var newnum = a + 1;
	var tablename = "table_date"+newnum;
	var samp_title = "<input type='text' style='width:90px;background:#8f8f8f; color:#FFF;' value='财务数据'  id='pro_finance_title_" + newnum + "' name='pro_finance[]' onfocus=\"clearfinance('pro_finance_title_" + newnum + "')\"/>";
		var html = "<table id='"+tablename+"' width='100%'><tr><td colspan='6' align='left' valign='middle'> <samp   class='samp_x'>" + samp_title + "</samp></td></tr><tr><td height='7'></td></tr>";
		html = html+"<tr><td align='left' valign='middle' width='65'>&nbsp;</td><td width='130' align='left' valign='middle'>&nbsp;</td><td width='75' align='left' valign='middle'>&nbsp;</td><td width='137' align='left' valign='middle'>单位：万元</td><td width='78' align='left' valign='middle'>&nbsp;</td><td width='141' align='left' valign='middle'>&nbsp;</td></tr>";
		html = html+"<tr><td height='7' colspan='6'></td></tr>";
		html =html+"<tr><td align='left' valign='middle'><span>营业收入：</span></td><td align='left' valign='middle'><input type='text' name='yysr[]' value='' class='Income' /></td><td align='left' valign='middle'><span>营业利润：</span></td><td align='left' valign='middle'><input type='text' name='yylr[]' value='' class='Income' /></td><td align='right' valign='middle'><span>净利润：</span></td><td align='left' valign='middle'><input type='text' name='jlr[]' value='' class='Income' /></td></tr>";
		html =html+"<tr><td height='7' colspan='6'></td></tr>";
		html =html+"<tr><td align='left' valign='middle'><span>资产总计：</span></td><td align='left' valign='middle'><input type='text' name='zczj[]' value='' class='Income' /></td><td align='left' valign='middle'><span>负债总计：</span></td><td align='left' valign='middle'><input type='text' name='fzzj[]' value='' class='Income' /></td><td align='right' valign='middle'><span>所有者权益：</span></td><td align='left' valign='middle'><input type='text' name='syzqy[]' value='' class='Income' /></td></tr>";
		html =html+"<tr><td height='10' colspan='6'></td></tr><tr><td height='10' colspan='6'><input type='button' value='删除' style='width:90px;' onclick=\"deltablename('"+tablename+"')\"/></td></tr>";
		html+="<tr><td colspan='6' height='15'>&nbsp;</td></tr></table>"
	$("#td_date2").append(html);
}

function deltablename(xname)
{

			var a = $(".samp_x").length;
		var one = document.getElementById(xname);
	    one.parentNode.removeChild(one);
	if(a==1)
	{
		insertdate()
	}
}
function editimgname(xid)
{
	if(document.getElementById("link_name_" + xid).style.display == "none")
	{
		document.getElementById("link_name_" + xid).innerHTML = document.getElementById("txt_name_" + xid).value;
	     document.getElementById("link_name_" + xid).style.display = "inline";
	     document.getElementById("txt_name_" + xid).style.display = "none";
		 document.getElementById("edit_" + xid).innerHTML = "编辑";
	}
	else
	{
		document.getElementById("txt_name_" + xid).value =  document.getElementById("link_name_" + xid).innerHTML;
	     document.getElementById("link_name_" + xid).style.display = "none";
	     document.getElementById("txt_name_" + xid).style.display = "inline";
		 document.getElementById("edit_" + xid).innerHTML = "确定";
	}

}
function delself(xid)
{
	var o = document.getElementById("li_" + xid);
	o.parentNode.removeChild(o);
		var o1 = document.getElementById("pro_imgs_" + xid);
	o1.parentNode.removeChild(o1);
}
function nextspan(xid)
{
}

function showmore(names,moretxt,hcbdmored)
{
	var namesarr = document.getElementsByName(names);
	var obj = document.getElementById(moretxt);

for(var i = 4;i < namesarr.length;i++)
	{
		if(namesarr[i].style.display=="none")
		{
			namesarr[i].style.display = "inline";
			obj.innerHTML="收起>>";
		}
		else
		{
			namesarr[i].style.display = "none";
			obj.innerHTML="更多>>";
		}
	}

 // 	if(namesarr[0].style.display=="inline")
	// {
	// 	obj.innerHTML="收起>>";
	// }
	// else
	// {
	// 	obj.innerHTML="更多>>";
	
	// }

}
function initshowmore(names,moretxt,hcbdmored)
{
		var hcbdmored = document.getElementById(hcbdmored);
			var namesarr = document.getElementsByName(names);
			var obj = document.getElementById(moretxt);
	if(trim(hcbdmored.value)==1)
	{
		obj.innerHTML="收起>>";
		for(var i = 0;i < namesarr.length;i++)
		{
		  namesarr[i].style.display = "inline";
		}
	}
	else
	{
	   for(var i = 0;i < namesarr.length;i++)
		{
		  namesarr[i].style.display = "none";
		}
		obj.innerHTML="更多>>";
	}
}
function ischina()
{
	var countryid = $("#countrySlc").find('option:selected').val();
	countryid = countryid.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
	if(countryid!=1)
	{
		document.getElementById("provincialid").style.display = "none";
		document.getElementById("citySlc").style.display = "none";
	}
	else
	{
		document.getElementById("provincialid").style.display = "inline";
		document.getElementById("citySlc").style.display = "inline";
	}
	
}
  function getprovincial()
  {
	 var countryid = $("#countrySlc").find('option:selected').val();
	 if(countryid == "1")
	 {		

	 var sltAreaInfo = document.getElementById('provincialSlc');
			   $.ajax({
		   type: "POST",
		   url: "../actionServer.php",
		   data: "action=provincial",
		   success: function(msg){
			 document.getElementById('provincialSlc').disabled = false;
			 document.getElementById('citySlc').disabled = false;
			 var myarr1 = msg.split(",");
			  sltAreaInfo.options.length = 0;
			 for(var i = 0;i < myarr1.length-1;i++)
			 {
			   var myarr2 = myarr1[i].split("|");
			   var oOption = document.createElement("OPTION");

				sltAreaInfo.options.add(new Option(myarr2[1], myarr2[0]));	   
				
			 }
			 $("#provincialSlc").attr("value",xpro);
			 getcity();
	
		   }
		});
	 }
	 else
	 {
		 	var sltAreaInfo = document.getElementById('provincialSlc');
			 sltAreaInfo.options.length = 0;
			 sltAreaInfo.options.add(new Option("无","-1"));
			  document.getElementById('provincialSlc').disabled = true;
			 document.getElementById('citySlc').disabled = true;
			 getcity();
	 }

	 
  }
  
  
     function getcity()
  {
	 var pid = $("#provincialid").find('option:selected').val(); 
	 var sltAreaInfo = document.getElementById('citySlc');
			   $.ajax({
		   type: "POST",
		   url: "actionServer.php",
		   data: "action=city&pid=" + pid,
		   success: function(msg){
			 var myarr1 = msg.split(",");
			  sltAreaInfo.options.length = 0;
			 for(var i = 0;i < myarr1.length-1;i++)
			 {
			   var myarr2 = myarr1[i].split("|");
			   var oOption = document.createElement("OPTION");
				sltAreaInfo.options.add(new Option(myarr2[1], myarr2[0]));	   
			 }
			setcity();
	
		   }
		});
  }
  function setcity()
  {
	   b =document.getElementById("xcity").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
	          for(var i = 0;i < document.getElementById('citySlc').children.length;i++)
              {
                  var a = document.getElementById('citySlc').options[i].value;
				  a = a.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
                 if(a.replace(/(\s*$)/g, "")== b.replace(/(\s*$)/g, ""))
                 {
				
                    document.getElementById('citySlc').options[i].selected = true;
                 }
              }
  }
   getcity();
   ischina();
   
   
// 取得 指定元素的 子节点列表 //
// 子元素可以指定 name //
// 子元素可以指定 tagName //

// 取得 指定元素的 子节点列表 //
// 子元素可以指定 name //
// 子元素可以指定 tagName //

function child()
{
	// 取得指定元素的所有子元素中元素名为name的元素集合 (有name取name,无name取id )
	this.getChildsByName = function(element, name)
	{
		var state = "name";
		return this.getChilds(element, name, state);
	};
	// 取得指定元素的所有子元素中tagName为name的元素集合
	this.getChildsByTagName = function(element, name)
	{
		var state = "tagName";
		return this.getChilds(element, name, state);
	};
	// state为"name",取得 指定元素的 name为name子元素
	// state为"tagName",取得 指定元素的 tagName为name子元素
	this.getChilds = function(element, name, state)
	{
		
		return this.find(element, name, state);
		//return this.list_elment; // 返回集合
	};
	// 通用方法
	this.find = function(element, name, state)
	{
		var a = [];
		if (null == element) { return a; }
		var nodes = element.childNodes; // 所有子元素
		for ( var i = 0; i < nodes.length; i++)
		{
			if (nodes[i].nodeType == 1)
			{ //节点类型为1			
				var name_id = "";
				if (state == "name")
				{
					name_id = nodes[i].name == null ? nodes[i].id
					        : nodes[i].name; // 有name取name,无name取id
				}
				else if (state == "tagName")
				{
					name_id = nodes[i].tagName;
				}
				else
				{
					alert("请传参数,指定按name或tagName搜索元素!");
					return a;
				}
				if (name_id == name)
				{
					a.push(nodes[i]); // 加入集合
				}
				var bl = nodes[i].hasChildNodes(); // 有无下一层子元素
				if (bl)
				{
					a=a.concat(this.find(nodes[i], name, state)); // 递归
				}
			}
		}
		return a;
	};
}
//上下文单实例


function clearfinance(xid)
{
	if(trim(document.getElementById(xid).value)=="财务数据")
	{
		document.getElementById(xid).value = "";
	}
	//alert(xid);
}
function write_lbPrice()
{
	var price = document.getElementById("price").value;
	document.getElementById("lb_price").innerHTML = "￥" + price;
}
function del_describe(xtr,filenamex)
{
	var o1 = document.getElementById(xtr);
	o1.parentNode.removeChild(o1);
	document.getElementById(filenamex).value = "";
	var upload_file_count = parseInt(document.getElementById("upload_file_count").value);
		upload_file_count = upload_file_count-1;
	document.getElementById("upload_file_count").value = upload_file_count;
}
function ltrim(s){     
    return s.replace(/(^\s*)/, "");  
 }   
 //去右空格;   
function rtrim(s){   
  return s.replace(/(\s*$)/, "");  
}   
 //去左右空格;   
 function trim(s){  
   //s.replace(/(^\s*)|(\s*$)/, "");  
  return rtrim(ltrim(s)); 
 }