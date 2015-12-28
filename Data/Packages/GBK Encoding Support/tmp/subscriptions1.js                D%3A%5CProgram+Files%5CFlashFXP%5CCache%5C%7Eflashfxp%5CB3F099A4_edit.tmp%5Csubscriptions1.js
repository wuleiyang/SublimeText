function setorder(x)
{
	document.getElementById("ordertype").value = x;
	document.form_search.submit();
}
/*所在城市*/

  function setPro_citys(xid,xname)
{
	var o = document.getElementsByName("dd_citys");
	for(var i = 0;i < o.length;i++)
	{
		var x = o[i].children.item(0);
		  x.style.background  = "white";
          x.style.color  = "#666";
		  x.style.display ="inline";
	}
	document.getElementById("pro_citys").value = xid;
	document.getElementById("pro_citysname").value = xname;
	document.getElementById("css_citys_"+xid).style.background ="#CC3B3A";
	document.getElementById("css_citys_"+xid).style.color ="white";
	document.getElementById("css_citys_"+xid).style.display ="inline";
}
function setPro_flag(h_prefix,link_prefix,dd_prefix,xid,xname)
{

  var xlink_cbd = document.getElementById(link_prefix + "_" + xid);
	$(xlink_cbd).addClass('Unique').parent().siblings('dd').find('a').removeClass('Unique');
	var html = document.getElementById(dd_prefix).innerHTML;
	html = "<input type='hidden' name='"+h_prefix+"[]' id='"+h_prefix+"_" + xid + "' value='" + xname + "'/>";

	document.getElementById(dd_prefix).innerHTML = html; 
	var allinkid = link_prefix + "_all";
	var a = h_prefix+"[]";
	if(document.getElementsByName(a).length > 0)
	{
	   document.getElementById(allinkid).className = "Unique2";
	}
	else
	{
		document.getElementById(allinkid).className = "Unique";
	}


}
function setPro_flags(h_prefix,link_prefix,dd_prefix,xid,xname)
{

  var xlink_cbd = document.getElementById(link_prefix + "_" + xid);
	$(xlink_cbd).addClass('Unique').parent().siblings('dd').find('a').removeClass('Unique');
	var html = document.getElementById(dd_prefix).innerHTML;
	html = "<input type='hidden' name='"+h_prefix+"[]' id='"+h_prefix+"_" + xid + "' value='" + xname + "'/>";
	//alert(html);
	document.getElementById(dd_prefix).innerHTML = html; 
	var allinkid = link_prefix + "_all";
	var a = h_prefix+"[]";
	if(document.getElementsByName(a).length > 0)
	{
	   document.getElementById(allinkid).className = "Unique2";
	}
	else
	{
		document.getElementById(allinkid).className = "Unique";
	}


}

function setPro_flag_more(h_prefix,link_prefix,dd_prefix,xid,xname)
{
	var flag = false;
	if(document.getElementsByName(h_prefix+"[]").length > 0)
	{
		for(var i = 0;i < document.getElementsByName(h_prefix+"[]").length;i++)
		{
			var myxid = h_prefix + "_" + xid;

			if(document.getElementsByName(h_prefix+"[]")[i].id==myxid)
			{
				flag = true;
				break;
			}
		}
	}
    if(!flag)
	{
		var html = document.getElementById(dd_prefix).innerHTML;
		html = html + "<input type='hidden' name='" + h_prefix + "[]' id='" + h_prefix + "_" + xid + "' value='" + xname + "'/><a href='javascript:void(0)' id='" + link_prefix + "_" + xid + "' style='background:#CC3B3A;color:white' onclick=\"del_flag('"+h_prefix+"','"+link_prefix+"','" + xid + "')\">" + xname + "</a>&nbsp;";
		document.getElementById(dd_prefix).innerHTML = html;
		document.getElementById(dd_prefix).style.display = "block";
	}
	var allinkid = link_prefix + "_all";
	var a = h_prefix+"[]";
	if(document.getElementsByName(a).length > 0)
	{
	   document.getElementById(allinkid).className = "Unique2";
	}
	else
	{
		document.getElementById(allinkid).className = "Unique";
	}

}
function del_flag(h_prefix,link_prefix,xid)
{

	var o = document.getElementById(h_prefix + "_" + xid);
	o.parentNode.removeChild(o);
	 var o1 = document.getElementById(link_prefix + "_" + xid);
	o1.parentNode.removeChild(o1);
}

function del_all_flag(h_prefix,link_prefix,dd_prefix,link_all)
{
	    var a = h_prefix + "[]" ;
		for(var i=0;i<document.getElementsByName(a).length;i++)
		{
			var arr = document.getElementsByName(a)[i].id.split("_");
			var xid = arr[arr.length-1];
			var link_prefixid = link_prefix + "_" + xid;
		  document.getElementById(link_prefixid).style.background  = "white";
          document.getElementById(link_prefixid).style.color  = "#666";
		}
		document.getElementById(dd_prefix).innerHTML = "";
		document.getElementById(link_all).className = "Unique";
}

function getcbd()
{
           $.ajax({
       type: "POST",
	   async: false,
       url: "actionServer.php",
       data: "action=getsub&tabname=pro_cbd&fid=" + document.getElementById("pro_citys").value ,
       success: function(msg){
         var myarr1 = msg.split("|");
		 var html = "";
		 var morehtml = "";
	 for(var i = 0;i < myarr1.length-1;i++)
			 {
			   
			   var myarr2 = myarr1[i].split(",");
			  if(i>5)
			  {
				   html = html + "<dd><a href='javascript:void(0)'  style='display:none' id='link_cbds_" + trim(myarr2[0]) + "' name='link_cbds_more'  onclick=\"setPro_flag('hcbds','link_cbds','dd_pro_cbd'," + myarr2[0] + ",'" + myarr2[1] + "');\">" + myarr2[1] + "</a></dd>";
	
			  }
			  else
			  {
			   html = html + "<dd><a href='javascript:void(0)' id='link_cbds_" + trim(myarr2[0]) + "' onclick=\"setPro_flag('hcbds','link_cbds','dd_pro_cbd'," + myarr2[0] + ",'" + myarr2[1] + "');\">" + myarr2[1] + "</a></dd>";
	
			  }
			 
			   
			 }
		
			 html = html + "<dd id='dd_pro_cbd' style='display:none'></dd>";
			morehtml = "<dd id=\"div_cbd_more\"><div onclick=\"showmore('link_cbds_more','cbd_more','is_show_cbd_more')\" id='cbd_more' style='cursor:pointer;color:#666;'>更多>></div></dd>";
			document.getElementById("dl_pro_cbd").innerHTML = html+morehtml;
			//document.getElementById("div_cbd_more").innerHTML = morehtml+morehtml;
			 if(document.getElementById("my_pro_cbd").value!='')
			 {
				 var my_pro_cbd = document.getElementById("my_pro_cbd").value;
				 var my_pro_cbd_name = document.getElementById("my_pro_cbd_name").value;
				 
				 //setPro_cbd(my_pro_cbd,my_pro_cbd_name);
			 }
       }
    });
}
getcbd();

function checkcodenum()
{
	var chkcode = document.getElementById("chkcode").value.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
	var pro_snflag = false;
			document.getElementById("imgload").style.display = "inline";
		document.getElementById("btnsubmit").style.display = "none";
		           $.ajax({
       type: "POST",
	   async: false,
       url: "actionServer.php",
       data: "action=ischkcode&chkcode=" + chkcode ,
       success: function(msg){
         msg = msg.replace(/^\s*(.*?)[\s\n]*$/g,'$1');
         if(msg == "false")
		 {
			 pro_snflag = false;
		 }
		 else
		 {
			pro_snflag = true; 
		 }
		document.getElementById("imgload").style.display = "none";
		document.getElementById("btnsubmit").style.display = "inline";
		 
       }
    });

	 return pro_snflag;
}

function showmore(names,moretxt,hcbdmored)
{
	var namesarr = document.getElementsByName(names);
	var obj = document.getElementById(moretxt);

for(var i = 0;i < namesarr.length;i++)
	{
		if(namesarr[i].style.display=="none")
		{
			namesarr[i].style.display = "inline";
		}
		else
		{
			namesarr[i].style.display = "none";
		}
	}

 	if(namesarr[0].style.display=="inline")
	{
		obj.innerHTML="收起>>";
	}
	else
	{
		obj.innerHTML="更多>>";
	
	}

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
function check()
{
	if(!checkcodenum())
	{
		document.getElementById("tr_err").style.display = "inline";
		document.getElementById("chkcode").focus();
		return false;
	}
}

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