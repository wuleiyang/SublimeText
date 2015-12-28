function setorder(x)
{
	document.getElementById("ordertype").value = x;
	document.form_search.submit();
}
/*所在城市*/
function check()
{
	if(!checkcodenum())
	{
		document.getElementById("tr_err").style.display = "block";
		document.getElementById("chkcode").focus();
		return false;
	}
}
var flag_ = 0;
function setPro_citys(_this,xid,xname,pro_citys){
	if(!_this.style.background){
		_this.style.background = "#CC3B3A";
		_this.style.color = "white";
		var html = document.getElementById("pro_citys").innerHTML;
		//alert(html);
		html =html+ "<input type='hidden' name='pro_citys[]' id='pro_citys_" + xid + "' value='" + xid + "'/>";
		document.getElementById("dd_pro_citys").innerHTML += html;
	}else{
		var o = document.getElementById("pro_citys_" + xid);
	     o.parentNode.removeChild(o);
		_this.style.background = null;
		_this.style.color ="#666";
		
	}
	var childNum = document.getElementById('dd_pro_citys').children.length;
	
	if(childNum>1){
		var dc =  document.getElementById("pro_citys_"+xid).value;
		document.getElementById("pro_citys").value=dc;
	}
		
		

}
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

/**
 *
 * @param h_prefix
 * @param link_prefix
 * @param dd_prefix
 * @param xid
 * @param xname
 */
function setPro_flag(h_prefix,link_prefix,dd_prefix,xid,xname)
{

  var xlink_cbd = document.getElementById(link_prefix + "_" + xid);
   if(xlink_cbd.style.color  == "white")
   {
	      
	      xlink_cbd.style.background  = "white";
          xlink_cbd.style.color  = "#666";
		  //alert(h_prefix + "_" + xid);
		 var o = document.getElementById(h_prefix + "_" + xid);
	     o.parentNode.removeChild(o);
   }
   else
   {
			//alert(h_prefix+"[]");
	      xlink_cbd.style.background  = "#CC3B3A";
           xlink_cbd.style.color  = "white";
		var html = document.getElementById(dd_prefix).innerHTML;
		html =html+ "<input type='hidden' name='"+h_prefix+"[]' id='"+h_prefix+"_" + xid + "' value='" + xid + "'/>";
		document.getElementById(dd_prefix).innerHTML = html;
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
function setPro_flag_more(h_prefix,link_prefix,dd_prefix,xid,xname)
{
	var flag = false;
	if(document.getElementsByName(h_prefix).length > 0)
	{
		for(var i = 0;i < document.getElementsByName(h_prefix).length;i++)
		{
			var myxid = h_prefix + "_" + xid;
			if(document.getElementsByName(h_prefix)[i].id==myxid)
			{
				flag = true;
				break;
			}
		}
	}
    if(!flag)
	{
		var html = document.getElementById(dd_prefix).innerHTML;
		html =html + "<input type='hidden' name='" + h_prefix + "[]' id='" + h_prefix + "_" + xid + "' value='" + xid + "'/><a href='javascript:void(0)' id='" + link_prefix + "_" + xid + "' style='background:#CC3B3A;color:white' onclick=\"del_flag('"+h_prefix+"','"+link_prefix+"','" + xid + "')\">" + xname + "</a>&nbsp;";
		document.getElementById(dd_prefix).innerHTML = html;
		document.getElementById(dd_prefix).style.display = "inline";
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
	    alert(document.getElementsByName(a).length);
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