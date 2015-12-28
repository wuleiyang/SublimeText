<?php

  $id = $_REQUEST["ci"];
  $showtxt = $_REQUEST["action"]=="edit"?"block":"none";
  $proimg = "uploads/Preview.jpg";//主图
  $pro_kind = 1;
  if($id=="")
  {
	  	  $insertdatejs = "<script>insertdate();</script>";
  }
  		$countrystr = "";
                  $sql=mysql_query("select * from country  order by id asc;",$conn); 
				while($rs=mysql_fetch_array($sql)) 
				{ 
                     $countrystr .= "<option value='".$rs["id"]."' ".$selstr.">".$rs["name"]."</option>";

				}
  if($id=="" || !is_numeric($id))
  {
	  $actionvalue = "insert_project";
  }
  else
  {
	  $actionvalue = "update_project";
	   $sql = "select * from users where id=".$_SESSION['verydeals_id'].";";
	   $rs=mysql_fetch_array(mysql_query($sql));
	   $truename = $rs["truename"];
	  
	  	$sql = "select * from project where id=".$id.";";
	   	$rs=mysql_fetch_array(mysql_query($sql));
		if($rs==true)
		{
				 if($_SESSION['verydeals_id']!=trim($rs["fid"])&&$_SESSION['verydeals_user_type']!="3")
				 {
						echo "<script>history.back();</script>";
						exit;
				 }
		    $title = trim($rs["title"]);//标题
			$title1 = trim($rs["title1"]);//名称
			$proid = trim($rs["id"]);//标题
			$pro_sn = trim($rs["pro_sn"]);//项目编号
			$hot_count = trim($rs["hot_count"]);//收藏
			$clikc_count = trim($rs["clikc_count"]);//浏览
			$author = trim($rs["author"]);//发布人
			$price = trim($rs["price"]);//总价格
			$area = trim($rs["area"]);//面积
			$area_price = trim($rs["area_price"])."元/平米";//平方价格
			$pro_type = trim($rs["pro_type"]);//房产类型
			$pro_kind = trim($rs["pro_kind"]);//1房地产投资,2股权投资,3债权融资
			$status_desc = trim($rs["status_desc"]);//状态
			$pro_citys = trim($rs["pro_citys"]);//区域
			$pro_cbd = trim($rs["pro_cbd"]);//商圈
			$pro_area = trim($rs["pro_area"]);//房产面积
			$describe_content = trim($rs["describe_content"]);//项目介绍
			$describe_file = trim($rs["describe_file"]);//说明文档
			$place_address = trim($rs["place_address"]);//项目地址
			$place_describe = trim($rs["place_describe"]);//位置描述
			$place_traffic = trim($rs["place_traffic"]);//公共交通
			$place_map = trim($rs["place_map"])==""?"":trim($rs["place_map"]);//位置地图
			$build_zjxx = trim($rs["build_zjxx"]);//建筑信息
			$build_tdmj = trim($rs["build_tdmj"]);//土地面积
			$build_zdmj = trim($rs["build_zdmj"]);//占地面积
			$build_zjzmj = trim($rs["build_zjzmj"]);//总建筑面积
			$build_dsmj = trim($rs["build_dsmj"]);//地上面积
			$build_dxmj = trim($rs["build_dxmj"]);//地下面积
		    $build_jzgd = trim($rs["build_jzgd"]);//建筑高度
		    $build_zfjs = trim($rs["build_zfjs"]);//总房间数
		    $build_cwsl = trim($rs["build_cwsl"]);//车位数量
		    $build_dscw = trim($rs["build_dscw"]);//地上车位
		    $build_dxcw = trim($rs["build_dxcw"]);//地下车位
		    $build_cqnx1 = trim($rs["build_cqnx1"]);//产权年限1
		    $build_cqnx2 = trim($rs["build_cqnx2"]);//产权年限2
		    $build_ghyt = trim($rs["build_ghyt"]);//规划用途
		    $build_jcsj = trim($rs["build_jcsj"]);//建成时间
		    $build_tdzk = trim($rs["build_tdzk"]);//土地状况
		    $build_jzmd = trim($rs["build_jzmd"]);//建筑密度
		    $build_rjl = trim($rs["build_rjl"]);//容积率
		    $build_ldl = trim($rs["build_ldl"]);//绿地率
		    $build_zlcs = trim($rs["build_zlcs"]);//总楼层数
		    $build_dscs = trim($rs["build_dscs"]);//地上层数
		    $build_dxcs = trim($rs["build_dxcs"]);//地下层数
		    $build_bzcg = trim($rs["build_bzcg"]);//标准层高
		    $build_bzjg = trim($rs["build_bzjg"]);//标准净高
		    $build_bzcjzmj = trim($rs["build_bzcjzmj"]);//标准层建筑面积
		    $build_kjmj = trim($rs["build_kjmj"]);//主力户型/开间面积
		    $build_bzfjmj = trim($rs["build_bzfjmj"]);//标准房间面积
			$build_zxqk = trim($rs["build_zxqk"]);//装修情况
		    $build_jzjg = trim($rs["build_jzjg"]);//建筑结构
			$build_wlm = trim($rs["build_wlm"]);//外立面
		    $build_nq = trim($rs["build_nq"]);//内墙
			$build_dtggbf = trim($rs["build_dtggbf"]);//大堂及公共部分
		    $build_qtsm = trim($rs["build_qtsm"]);//其他说明
			$proimg = trim($rs["img"])==""?"uploads/Preview.jpg":trim($rs["img"]);//主图
		    $facility_kt = trim($rs["facility_kt"]);//客梯
			$facility_ht = trim($rs["facility_ht"]);//货梯
		    $facility_ktiao = trim($rs["facility_ktiao"]);//空调
			$facility_gn = trim($rs["facility_gn"]);//供暖
		    $facility_gs = trim($rs["facility_gs"]);//供水
			$facility_gd = trim($rs["facility_gd"]);//供电
		    $facility_rq = trim($rs["facility_rq"]);//燃气
			$facility_qt = trim($rs["facility_qt"]);//其他
		    $facility_lnpt = trim($rs["facility_lnpt"]);//楼内配套
			$facility_zbpt = trim($rs["facility_zbpt"]);//周边配套
			$finance_czl = trim($rs["finance_czl"]);//出租率
			$finance_tzhbl = trim($rs["finance_tzhbl"]);//投资回报率(ROI)
			$finance_zbhl = trim($rs["finance_zbhl"]);//资本化率(Cap Rate)
			$finance_nbsyl= trim($rs["finance_nbsyl"]);//内部收益率(IRR)
			$trade_jg = trim($rs["trade_jg"]);//交易价格
			$trade_jyfs1 = trim($rs["trade_jyfs1"]);//交易方式 多选
			$trade_jyfs2 = trim($rs["trade_jyfs2"]);//交易方式 单选
			$trade_fkfs = trim($rs["trade_fkfs"]);//付款方式
			$trade_bzj = trim($rs["trade_bzj"]);//保 证 金
			$trade_gprq = trim($rs["trade_gprq"]);//挂牌日期
			$trade_qttj = trim($rs["trade_qttj"]);//其他条件
			$owner_gsmc = trim($rs["owner_gsmc"]);//公司名称
			$owner_szwz = trim($rs["owner_szwz"]);//所在位置
			$owner_bgdz = trim($rs["owner_bgdz"]);//办公地址
			$owner_zczb = trim($rs["owner_zczb"]);//注册资本
			$owner_qylx = trim($rs["owner_qylx"]);//企业类型
			$owner_cygq = trim($rs["owner_cygq"]);//持有产权/股权比例
			$owner_zrgq = trim($rs["owner_zrgq"]);//转让产权/股权比例
			$owner_gsjs = trim($rs["owner_gsjs"]);//公司介绍
			$provincialid = trim($rs["provincialid"]);//公司介绍
			$xcity = trim($rs["xcity"]);//公司介绍
			$remark_desc = trim($rs["remark_desc"])==""?"备注(600字)":trim($rs["remark_desc"]);//公司介绍
			$trade_describe = trim($rs["trade_describe"])==""?"交易说明(600字)":trim($rs["trade_describe"]);//公司介绍
			$pro_status = trim($rs["pro_status"]);//发布时间
			$sbscpt_offer = trim($rs["sbscpt_offer"]);//发布时间
			$describe_file1 = trim($rs["describe_file1"]);//公司介绍
			$describe_file2 = trim($rs["describe_file2"]);//公司介绍
			$createtime = trim($rs["createtime"]);//发布时间
			$createtime = date('Y-m-d', strtotime($createtime));
			$ispass = trim($rs["ispass"]);//企业类型
			$company_country = trim($rs["company_country"]);//企业类型
			$describe_file_str = $describe_file==""?"":$describe_file;
			$upload_file_count = 0;
	
			if($ispass==0)
			{
				$ispassstr = "审核中<input type='hidden' name='ispass' value='0'/>";
			}
			else
			{
				$ispassstr = $ispass==1?"<input type='radio' name='ispass' value='1' checked='checked' style='margin:8px 5px 0 0;'/>发布&nbsp;&nbsp;<input type='radio' name='ispass' value='2' style='margin:8px 5px 0 0;'/>暂停":"<input type='radio' name='ispass' value='1'  style='margin:8px 5px 0 0;'/>发布&nbsp;&nbsp;<input type='radio' name='ispass' value='2' style='margin:8px 5px 0 0;' checked='checked'/>暂停";

			}
            if($describe_file!="")
			{
				$upload_file_count = $upload_file_count+1;
						 $describe_file_str_arr = explode('/',$describe_file);
						 $lastcount = count($describe_file_str_arr)-1;
						 $describe_file_str_name = $describe_file_str_arr[$lastcount];
				$describe_file_list.="<tr id='tr_upload_1'><td>".$describe_file_str_name."</td><td width='97'></td><td><a href='javascript:void(0)' onclick=\"del_describe('tr_upload_1','describe_file')\"  class='hue7'>删除</a></td></tr>";
			}
			if($describe_file1!="")
			{
				$upload_file_count = $upload_file_count+1;
						 $describe_file_str_arr = explode('/',$describe_file1);
						 $lastcount = count($describe_file_str_arr)-1;
						 $describe_file_str_name = $describe_file_str_arr[$lastcount];
				$describe_file_list.="<tr id='tr_upload_2'><td>".$describe_file_str_name."</td><td width='97'></td><td><a href='javascript:void(0)' onclick=\"del_describe('tr_upload_2','describe_file1')\"  class='hue7'>删除</a></td></tr>";
			}
			if($describe_file2!="")
			{
				$upload_file_count = $upload_file_count+1;
						 $describe_file_str_arr = explode('/',$describe_file2);
						 $lastcount = count($describe_file_str_arr)-1;
						 $describe_file_str_name = $describe_file_str_arr[$lastcount];
				$describe_file_list.="<tr id='tr_upload_3'><td>".$describe_file_str_name."</td><td width='97'></td><td><a href='javascript:void(0)' onclick=\"del_describe('tr_upload_3','describe_file2')\"  class='hue7'>删除</a></td></tr>";
			}
			
				$countrystr = "";
                  $sql=mysql_query("select * from country  order by id asc;",$conn); 
				while($rs=mysql_fetch_array($sql)) 
				{ 
				     $selstr = $company_country == $rs["id"]?"selected='selected'":"";
                     $countrystr .= "<option value='".$rs["id"]."' ".$selstr.">".$rs["name"]."</option>";

				}

		}
		else
		{
			echo "<script>history.back();</script>";
			exit;
		}
	  
  }
  $pro_typelist = "";
  $pro_typefirst = "";
  $pro_typefirstid = "";
  $sql=mysql_query("select * from pro_type order by id;",$conn); 
  $i=1;
  while($rs=mysql_fetch_array($sql)) 
  {
	  	// if($pro_type!=""&&$pro_type==trim($rs["name"]))
		if($pro_type==trim($rs["id"]))
		{
			 	 $pro_typefirst="<div class='like' id='div_pro_type'>".$rs["name"]."</div>";
				 $pro_typefirstid=$rs["id"];
		}
		else
		{
			if($i==1)
			{
			
				$pro_typefirst="<div class='like' id='div_pro_type'>".$rs["name"]."</div>";
				$pro_typefirstid=$rs["id"];
			}
		}

	    $pro_typelist.="<a href='javascript:void(0)' onclick=\"setpro_type('".$rs["id"]."')\">".$rs["name"]."</a>";
		$i++;
  }
  $pro_typelist=$pro_typefirst."<div class='Hotel Copy'>".$pro_typelist."</div>";
  //
    $pro_statuslist = "";
  $pro_statusfirst = "";
  $pro_statusfirstid = "";
  $sql=mysql_query("select * from pro_status order by id;",$conn); 
  $i=1;
  while($rs=mysql_fetch_array($sql)) 
  {
	     if($pro_status==trim($rs["id"]))
		 {
				$pro_statusfirst="<div class='like' id='div_pro_status'>".$rs["name"]."</div>";
				// $pro_statusfirstid=$rs["name"];
				$pro_statusfirstid=$rs["id"];
		 }
		 else
		 {
			 if($i==1)
			 {
				 
				$pro_statusfirst="<div class='like' id='div_pro_status'>".$rs["name"]."</div>";
				// $pro_statusfirstid=$rs["name"];
				$pro_statusfirstid=$rs["id"];
			}
		}

	    $pro_statuslist.="<a href='javascript:void(0)' onclick=\"setpro_status('".$rs["id"]."')\">".$rs["name"]."</a>";
		$i++;
  }
  $pro_statuslist=$pro_statusfirst."<div class='Hotel Copy'>".$pro_statuslist."</div>";
  //
  

  
    
    $sql=mysql_query("select * from provincial;",$conn); 
  while($rs=mysql_fetch_array($sql)) 
  {
	  	  if($provincialid==$rs[0])
	  {
		  	  $owner_szwz_str.="<option value='".$rs[0]."' selected>".$rs[1]."</option>";

	  }
	  else
	  {
		  	  $owner_szwz_str.="<option value='".$rs[0]."'>".$rs[1]."</option>";

	  }
  }
  $owner_szwz_str = "<select name='provincialid' id='provincialid' onchange='getcity()'>".$owner_szwz_str."</select>";
    $sql=mysql_query("select * from pro_citys order by createtime;",$conn); 
  $i=1;
  while($rs=mysql_fetch_array($sql)) 
  {

		 if($i>5)
		 {

			 $pro_cityslist.="<dd name='dd_citys'><a href='javascript:void(0)' style='display:none'   name='link_pro_citys_more' id='css_citys_".$rs["id"]."' onclick=\"set_xlink('link_pro_citys_more','css_citys_','pro_citys',".$rs["id"]."),getcbd(".$rs["id"].");showmore('link_pro_cbd','pro_cbd_more','is_show_pro_citys_more');\">".$rs["name"]."</a></dd>";
		 }
		 else
		 {

				if($i==1)
				{
					$pro_cityfirst = $rs["id"];
					$cityfirstjs = "<script>set_xlink('link_pro_citys_more','css_citys_','pro_citys',".$rs["id"].");showmore('link_pro_cbd','pro_cbd_more','is_show_pro_citys_more');</script>";
				}
		
		    $pro_cityslist.="<dd name='dd_citys' id='dd_citys'><a href='javascript:void(0)' name='css_citys'  id='css_citys_".$rs["id"]."' onclick=\"set_xlink('css_citys','css_citys_','pro_citys',".$rs["id"]."),getcbd(".$rs["id"].");showmore('link_pro_cbd','pro_cbd_more','is_show_pro_citys_more');\">".$rs["name"]."</a></dd>";
		 }
		 if($pro_citys==$rs["id"])
		 {
            if($i>5)
			{
							$edit_cityjs = "<script>set_xlink('dd_citys','css_citys_','pro_citys',".$rs["id"].");getcbd(".$pro_citys.");showmore('link_pro_citys_more','pro_citys_more','is_show_pro_citys_more')</script>";

			}
			else
			{
							$edit_cityjs = "<script>set_xlink('dd_citys','css_citys_','pro_citys',".$rs["id"].");getcbd(".$pro_citys.");</script>";

			}
		 }

		$i++;
  }
  
  if($i>5)
  {
	  $pro_citysmore = "<dd style='cursor:pointer;color:#d3d3d3;'  id='pro_citys_more' onclick=\"showmore('link_pro_citys_more','pro_citys_more','is_show_pro_citys_more')\" >更多>></dd>";
  }
  else
  {
	  $pro_citysmore = "<dd id='pro_citys_more' style='cursor:pointer;color:#d3d3d3;' onclick=\"showmore('link_pro_citys_more','pro_citys_more','is_show_pro_citys_more')\">收起>></dd>";
  }

  $edit_cbds = "<script>set_xlink('dd_cbd','css_cbd_','pro_cbd',".$pro_cbd.");";
    /*房产面积*/
  
      $sql=mysql_query("select * from pro_area order by createtime;",$conn); 
  $i=1;
  while($rs=mysql_fetch_array($sql)) 
  {
	      	 $selectstr = "";
			 if($pro_area==trim($rs[0]))
			 {
				 $selectstr = "style='background:#CC3B3A;color:white'";
			 }
			 else
			 {
				 $selectstr = "";
			 }
		 if($i>4)
		 {
			 $pro_arealist.="<dd name='dd_area'><a ".$selectstr." href='javascript:void(0)'  name='link_pro_area_more' id='css_area_".$rs["id"]."' onclick=\"set_xlink('link_pro_area_more','css_area_','pro_area',".$rs["id"].")\">".$rs["name"]."</a></dd>";
		 }
		 else
		 {
			if($i==1)
			{
				$pro_areafirst = $rs["id"];
			}
		    $pro_arealist.="<dd name='dd_area'><a ".$selectstr." href='javascript:void(0)' name='link_pro_area_more' id='css_area_".$rs["id"]."' onclick=\"set_xlink('link_pro_area_more','css_area_','pro_area',".$rs["id"].")\">".$rs["name"]."</a></dd>";
		 }
		 if($pro_area==$rs["id"])
		 {
			 	$edit_areajs = "<script>set_xlink('dd_area','css_area_','pro_area',".$rs["id"].");</script>";
		 }
		$i++;
  }
  if($i>3)
  {
	  $pro_areamore = "<dd id='pro_area_more' onclick=\"showmore('link_pro_area_more','pro_area_more','is_show_pro_area_more')\" style='color:#d3d3d3;cursor:pointer;'>收起>></dd>";
  }
  else
  {
	 $pro_areamore = "<dd id='pro_area_more' onclick=\"showmore('link_pro_area_more','pro_area_more','is_show_pro_area_more')\" style='color:#d3d3d3;cursor:pointer;'>更多>></dd>";

  }
  
      /*价格区间*/
  
      $sql=mysql_query("select * from pro_offer order by createtime;",$conn); 
  $i=1;
  while($rs=mysql_fetch_array($sql)) 
  {
	      	 $selectstr = "";
			 if($sbscpt_offer==trim($rs[1]))
			 {
				 $selectstr = "style='background:#CC3B3A;color:white'";
			 }
			 else
			 {
				 $selectstr = "";
			 }
		 if($i>4)
		 {
			 $pro_offerlist.="<dd name='dd_offer'><a ".$selectstr." href='javascript:void(0)'  name='link_pro_offer_more' id='css_offer_".$rs["name"]."' onclick=\"set_xlink('link_pro_offer_more','css_offer_','sbscpt_offer','".$rs["name"]."')\">".$rs["name"]."</a></dd>";
		 }
		 else
		 {
			if($i==1)
			{
				$pro_offerfirst = $rs["id"];
			}
		    $pro_offerlist.="<dd name='dd_offer'><a ".$selectstr." href='javascript:void(0)' name='link_pro_offer_more' id='css_offer_".$rs["name"]."' onclick=\"set_xlink('link_pro_offer_more','css_offer_','sbscpt_offer','".$rs["name"]."')\">".$rs["name"]."</a></dd>";
		 }
		 if($pro_area==$rs["id"])
		 {
			 	$edit_offerjs = "<script>set_xlink('dd_offer','css_offer_','sbscpt_offer','".$rs["name"]."');</script>";
		 }
		$i++;
  }
  if($i>3)
  {
	  //$pro_offermore = "<div class='even' id='pro_offer_more' onclick=\"showmore('link_pro_offer_more','pro_offer_more','is_show_pro_offer_more')\"><div class='Many Many2'>更多>></div>";
	  $pro_offermore = "<dd id='pro_offer_more' onclick=\"showmore('link_pro_offer_more','pro_offer_more','is_show_pro_offer_more')\" style='color:#d3d3d3;cursor:pointer;'>收起>></dd>";
  }
  else
  {
	 //$pro_offermore = "<div class='even' id='pro_offer_more' onclick=\"showmore('link_pro_offer_more','pro_offer_more','is_show_pro_offer_more')\"><div class='Many Many2'>收起>></div>";
	 $pro_offermore = "<dd id='pro_offer_more' onclick=\"showmore('link_pro_offer_more','pro_offer_more','is_show_pro_offer_more')\" style='color:#d3d3d3;cursor:pointer;'>收起>></dd>";

  }
  //
  	  $my_pro_cbd = "<input type='hidden' name='my_pro_cbd' id='my_pro_cbd' value='".$pro_cbd."'/><input type='hidden' name='my_pro_cbd_name' id='my_pro_cbd_name' value='".$rscbd["name"]."'/>";

  if($pro_cbd!="")
  {
	  $rscbd=mysql_fetch_array(mysql_query("select * from pro_cbd where id=".$pro_cbd.";"));
  }
  if($proid!="")
  {
		 $sql=mysql_query("select * from pro_imgs where fid = ".$proid." ORDER BY id asc;",$conn); 
		while($rs=mysql_fetch_array($sql)) 
		{
			$pro_imgslist.= "<input type='hidden' name='pro_imgs[]' id='pro_imgs_".$rs["img"]."' value='".$rs["img"]."'/><li id='li_".$rs["img"]."'><table width='160' border='0' cellspacing='0' cellpadding='0' height='145'><tr><td colspan='2' align='left' valign='middle' height='120'><div class='loud'><a href='".$rs["img"]."' target='_blank'><img src='".$rs["img"]."'</a></div></td></tr><tr><td width='101' align='right' valign='middle'><a href='javascript:void(0)' id='link_name_".$rs["img"]."' style='display:inline'>".$rs["name"]."</a><input type='text' name='txt_name[]' id='txt_name_".$rs["img"]."' value='".$rs["name"]."' style='width:65px; display:none'/>&nbsp;<a href='javascript:void(0)' style='display:inline' id='edit_".$rs["img"]."' onclick=\"editimgname('".$rs["img"]."')\">编辑</a></td><td width='59' align='right' valign='middle'><a href='javascript:void(0)'><img src='images/Delete.jpg' href='javascript:void(0)' onclick=\"delself('".$rs["img"]."')\" /></a></td></tr></table></li>";
		}
		
		
		$sql=mysql_query("select * from pro_finance where fid = ".$proid." ORDER BY id asc;",$conn); 
		$a = 0;
		while($rs=mysql_fetch_array($sql)) 
		{
			$tablename = "table_date".$a;
			$pro_financelist.= "<table id='".$tablename."' width='100%'><tr><td colspan='6' align='left' valign='middle'><samp  class='samp_x'><input type='text' style='width:90px;background:#8f8f8f; color:#FFF;' value='".$rs["name"]."' name='pro_finance[]' id='pro_finance_".$rs["id"]."' onfocus=\"clearfinance('pro_finance_".$rs["id"]."')\"/></samp></td></tr><tr><td height='7' colspan='6'></td></tr>";
			$pro_financelist.="<tr><td width='65' align='left'valign=\"middle\">&nbsp;</td><td width='130' align='left' valign=\"middle\">&nbsp;</td><td width='75' align='left' valign=\"middle\">&nbsp;</td><td width='137' align='left' valign='middle'>单位：万元</td><td width='78' align='left' valign='middle'></td><td width='141' align='left' valign='middle'>&nbsp;</td></tr>";
			$pro_financelist.="<tr><td height='7' colspan='6'></td></tr>";
			$pro_financelist.="<tr><td align='left' valign='middle'><span>营业收入：</span></td><td align='left' valign='middle'><input type='text' name='yysr[]' value='".$rs["yysr"]."' class='Income' /></td><td align='left' valign='middle'><span>营业利润：</span></td><td align='left' valign='middle'><input type='text' name='yylr[]' value='".$rs["yylr"]."' class='Income' /></td><td align='right' valign='middle'><span>净利润：</span></td><td align='left' valign='middle'><input type='text' name='jlr[]' value='".$rs["jlr"]."' class='Income' /></td></tr>";
			$pro_financelist.="<tr><td height='7' colspan='6'></td></tr>";
			$pro_financelist.="<tr><td align='left' valign='middle'><span>资产总计：</span></td><td align='left' valign='middle'><input type='text' name='zczj[]' value='".$rs["zczj"]."' class='Income' /></td><td align='left' valign='middle'><span>负债总计：</span></td><td align='left' valign='middle'><input type='text' name='fzzj[]' value='".$rs["fzzj"]."' class='Income' /></td><td align='right' valign='middle'><span>所有者权益：</span></td><td align='left' valign='middle'><input type='text' name='syzqy[]' value='".$rs["syzqy"]."' class='Income' /></td></tr>";
			$pro_financelist.="<tr><td height='10' colspan='6'></td></tr><tr><td height='10' colspan='6'><input type='button' style='width:90px;' onclick=\"deltablename('".$tablename."')\" value='删除'/></td></tr>";
			$pro_financelist.="<tr><td colspan='6' height='15'>&nbsp;</td></tr></table>";
			$a++;
		}
  }
  
    $sql=mysql_query("select * from facility_lnpt;",$conn); 

    while($rs=mysql_fetch_array($sql)) 
	{
		$issel = "";
		if($_REQUEST["ci"]!="")
		{
			$str = explode("-", $facility_lnpt);
			foreach ($str as $value)
			{
               if(trim($value)==trim($rs["name"]))
			   {
				   $issel = "checked='checked'";
				   break;
			   }
			}
		}
		$facility_lnpt_list.="<span><input type='checkbox' value='".trim($rs["name"])."' name='facility_lnpt[]' class='checbox' ".$issel."/>&nbsp;".$rs["name"]."</span>";
	}
	
	$sql=mysql_query("select * from trade_jyfs;",$conn); 
    while($rs=mysql_fetch_array($sql)) 
	{
		$issel = "";
		if($_REQUEST["ci"]!="")
		{
			if($rs["fid"]==1)
			{
				$str = explode("-", $trade_jyfs1);
				foreach ($str as $value)
				{
				   if(trim($value)==trim($rs["name"]))
				   {
					   $issel = "checked='checked'";
					   break;
				   }
				}
			}
			else
			{
				if(trim($trade_jyfs2)==trim($rs["name"]))
				{
					$issel = "checked='checked'";
				}
			}

		}
		if($rs["fid"]==1)
		{
		   $inputtype="checkbox";
		   $inputname ="trade_jyfs1[]";
		}
        else
		{
		   $inputtype="radio";
		   $inputname ="trade_jyfs2";
		}
		$trade_jyfs_list.="<label><input type='".$inputtype."' value='".trim($rs["name"])."' name='".$inputname."' class='radding' ".$issel."/>".$rs["name"]."</label>";
	}
	
	    $sql=mysql_query("select * from owner_qylx;",$conn); 
    $i = 0;
    while($rs=mysql_fetch_array($sql)) 
	{
		$issel = "";
		if($_REQUEST["ci"]!="")
		{
            if(trim($owner_qylx)==trim($rs["name"]))
			   {
				   $issel = "checked='checked'";
			   }
		}
		else
		{
			//$issel = $i==0?"checked='checked'":"";
		}
		$owner_qylx_list.=" <label><input type='radio' name='owner_qylx' value='".trim($rs["name"])."' class='radding' ".$issel." />".trim($rs["name"])."</label>";
		$i++;
	}
	if($_REQUEST["action"]!="edit")
	{
		$createtimestr = $createtime;
	}
	$status_show = $_REQUEST["action"]!="edit"?"none":"";
	if($_REQUEST["action"]=="")
	{
		$truename = "";
	}
	if($_REQUEST["action"]=="")
	{
		$pro_statuslist_show = "inline";
	}
		if($_REQUEST["action"]=="edit")
	{
		$pro_statuslist_show = "none";
	}
?>