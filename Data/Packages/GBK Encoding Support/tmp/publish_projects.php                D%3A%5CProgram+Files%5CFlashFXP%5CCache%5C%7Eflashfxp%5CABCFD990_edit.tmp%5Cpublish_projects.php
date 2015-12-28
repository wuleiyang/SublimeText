<?php include "inc/init.php"; ?>
<?php include "include/func_present.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>投资</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico" />
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="scripts/jquery.js"></script>
    <script language="javascript" src="scripts/public.js"></script>
    <script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>


    <link rel="stylesheet" href="editor/themes/default/default.css" />
    <link rel="stylesheet" href="editor/plugins/code/prettify.css" />
    <script charset="utf-8" src="editor/kindeditor.js"></script>
    <script charset="utf-8" src="editor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="editor/plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="facility_zbpt"]', {
                cssPath : 'editor/plugins/code/prettify.css',
                uploadJson : 'editor/php/upload_json.php',
                fileManagerJson : 'editor/php/file_manager_json.php',
                allowFileManager : true,
                allowUpload : false,
                items : [ ],
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=form1]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=form1]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
</head>

<body>
<!--top-->
<div id="head">
    <script language="javascript">
        include('top.html','head');
    </script>
</div>
<!--end-->

<div class="Shadow"></div>

<!--content-->
<div class="main main_">
<div class="content">
<div class="Login"><div class="Login_left"></div><div class='robinren_'><?php include "include/head_login.php"; ?></div></div>
<div class="heart">
<?php getleft(); ?>
<div class="heart_right">
<div class="White">
<div class="Gray">
<form method="post" action="actionServer.php" name="form_pro" id="form_pro" onSubmit="return check()">
<input type="hidden" name="action" value="<?php echo $actionvalue;?>"/>
<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST["ci"];?>"/>
<input type="hidden" name="pro_kind" value="<?php echo $pro_kind;?>"/>
<input name="xcity" type="hidden" id="xcity" value="<?php echo $xcity;?>" />
<input type="hidden" name="pro_type" id="pro_type" value="<?php echo $pro_typefirstid;?>"/>
<input type="hidden" name="pro_status" id="pro_status" value="<?php echo $pro_statusfirstid;?>"/>
<input type="hidden" name="sbscpt_offer" id="sbscpt_offer" value="<?php echo $sbscpt_offerfirstid;?>"/>

<div class="MyInves">
<div class="MyInves_">
<div class="manage trading"><div style=" float:left;">房地产项目发布 <label class="script">Publish Real Estate Project</label></div><input type="submit" value="发布" class="hold" /></div>
<div id="div_errmes" style="display:none;height:30px; overflow:hidden; line-height:30px; font-size:14px; color:#F00; padding-left:10px;">错误</div>

<div class="Save">
    <div class="Upload" style="position:relative">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="3" align="center" valign="top"><div class="Preview"><img id="pro_img" src="<?php echo $proimg;?>" /></div></td>
            </tr>
            <tr><td height="6"></td></tr>
            <tr>
                <td align="left" valign="middle">
                    <input type="hidden" name="proimg" id="proimg" value="<?php echo $proimg;?>"/>
                    <iframe src="ajaxfileupload_img.php?txtid=proimg&imgid=pro_img" onload="turnHeight('iframe1');" frameBorder=0 scrolling="no" style="height:22px; width:274px;"></iframe>
                </td>
            </tr>
        </table>
        <div class="BigImg">
            <img id="getUrl" src="" title="点击关闭"/>
        </div>
        <script type="text/javascript">
            $(function(){
                var img=$('#getUrl')
                $('#pro_img').click(function(){
                    $('.BigImg').show();;
                    img.attr('src',$(this).attr('src'));
                })
                img.bind('click',function(){$('.BigImg').hide();})
            })
        </script>

    </div>
    <div class="Upload_">
        <div class="Enter">
            <table width="375" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td colspan="4" align="left" valign="top"><input type="text" name="title" id="title" style="width:368px;" value="<?php echo $title;?>" maxlength="100" class="publish" />

                    </td>
                </tr>
                <tr>
                    <td width="69" align="left" valign="middle"><div style="display:<?php echo $showtxt;?>">项目编号：</div></td>
                    <td width="144" align="left" valign="top"><?php echo $pro_sn;?></td>
                    <td width="90" align="right" valign="middle">
                        <div style="display:<?php echo $showtxt;?>"><a href="#">收藏(<label><?php echo $hot_count;?></label>)</a></div>
                    </td>
                    <td width="72" align="right" valign="middle">
                        <div style="display:<?php echo $showtxt;?>"><a href="#">浏览(<label><?php echo $clikc_count;?></label>)</a></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="left" valign="middle"><!--<div style="display:<?php//echo $showtxt;?>"><span style="margin-right:8px;">发布时间：</span><?php//echo date('Y-m-d H:i:s',$createtime);?></div>--></td>
                </tr>
            </table>
        </div>
        <div class="culate">
            <table width="405" border="0" cellspacing="0" cellpadding="0">
                <tr><td height="8"></td></tr>
                <tr>
                    <td colspan="2"><label>￥<input type="text" name="price" id="price" value="<?php echo $price;?>" onKeyUp="write_lbPrice()"  class="nario4"/>亿</label></td>
                </tr>
                <tr><td height="8"></td></tr>
                <tr>
                    <td width="43"><span>面积：</span></td>
                    <td width="332"><input type="text" name="area" id="area" value="<?php echo $area;?>"  class="nario3"/>&nbsp;<span>平米&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $area_price;?></span></td>
                </tr>
                <tr><td height="5"></td></tr>
                <tr>
                    <td align="left">名称：</td>
                    <td><input type="text" name="title1" id="title1" value="<?php echo $title1;?>"  class="nario2"/></td>
                </tr>
                <tr><td height="5"></td></tr>
                <tr>
                    <td>类型：</td>
                    <td>
                        <div class="genus moon">
                            <?php echo $pro_typelist;?>
                        </div>
                    </td>
                </tr>
                <tr><td height="5"></td></tr>
                <tr >
                    <td >现状：</td>
                    <td>
                        <div class="genus moon">
                            <?php echo $pro_statuslist;?>
                        </div>
                    </td>
                </tr>
                <tr><td height="5"></td></tr>


                <tr>
                    <td colspan="2" align="left" valign="middle">
                        <div class="Sail Flower">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="18%" align="right"><h2> 城&nbsp;&nbsp;&nbsp;&nbsp;市：</h2></td>
                                    <td width="89%">
                                        <dl class="acreage">
                                            <?php echo $pro_cityslist;?>
                                            <?php echo $pro_citysmore;?>
                                            <dd id="dd_pro_citys" style="display:none"></dd>
                                            <input type="hidden" name="pro_citys" id="pro_citys" value="<?php echo $pro_cityfirst;?>"/>
                                        </dl></td>
                                </tr>
                            </table>
                            <div class="clear"></div>
                        </div>
                        <div class="Sail Flower">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="18%" align="right" valign="top"><h2>区&nbsp;&nbsp;&nbsp;&nbsp;县：</h2></td>
                                    <td width="88%"><dl class="acreage" id="dl_pro_cbd">

                                            <!--<dd id="div_cbd_more"></dd>-->
                                        </dl></td>
                                </tr>
                            </table>
                            <div id="div_cbd_more">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="Sail Flower">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="18%" align="right" valign="top"><h2>价格区间：</h2></td>
                                    <td width="88%"><dl class="acreage">
                                            <?php echo $pro_offerlist;?>
                                            <?php echo $pro_offermore;?>
                                            <dd id="dd_pro_offer" style="display:none"></dd>
                                            <input type="hidden" name="pro_offer" id="pro_offer" value="<?php echo $pro_offerfirst;?>"/>
                                        </dl></td>
                                </tr>
                            </table>

                            <div class="clear"></div>
                        </div>


                        <div class="Sail Flower">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="18%" align="right"valign="top"><h2>房产面积：</h2></td>
                                    <td width="88%"><dl class="acreage">
                                            <?php echo $pro_arealist;?>
                                            <?php echo $pro_areamore;?>
                                            <dd id="dd_pro_area" style="display:none"></dd>
                                            <input type="hidden" name="pro_area" id="pro_area" value="<?php echo $pro_areafirst;?>"/>
                                        </dl></td>
                                </tr>
                            </table>

                            <div class="clear"></div>
                        </div>

                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="location">
<div class="co_worker margin">
    <ul>
        <li class="Point" id="li_1"><label></label><a href="javascript:void(0)" onClick="showli('li_1')">项目介绍</a></li>
        <li id="li_2"><label></label><a href="javascript:void(0)" onClick="showli('li_2')">位置地图</a></li>
        <li id="li_3"><label></label><a href="javascript:void(0)" onClick="showli('li_3')">建筑信息</a></li>
        <li id="li_4"><label></label><a href="javascript:void(0)" onClick="showli('li_4')">项目图片</a></li>
        <li id="li_5"><label></label><a href="javascript:void(0)" onClick="showli('li_5')">配套设施</a></li>
        <li id="li_6"><label></label><a href="javascript:void(0)" onClick="showli('li_6')">财务指标</a></li>
        <li id="li_7"><label></label><a href="javascript:void(0)" onClick="showli('li_7'),write_lbPrice()">交易条件</a></li>
        <li id="li_8"><label></label><a href="javascript:void(0)" onClick="showli('li_8')">产权人信息</a></li>
    </ul>
</div>
<div class="place">
<div class="press" id="place_1">
    <script language="javascript" src="scripts/jquery.js"></script>
    <link rel="stylesheet" href="editor/themes/default/default.css" />
    <link rel="stylesheet" href="editor/plugins/code/prettify.css" />
    <script charset="utf-8" src="editor/kindeditor.js"></script>
    <script charset="utf-8" src="editor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="editor/plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="describe_content"]', {
                cssPath : 'editor/plugins/code/prettify.css',
                uploadJson : 'editor/php/upload_json.php',
                fileManagerJson : 'editor/php/file_manager_json.php',
                allowFileManager : true,
                allowUpload : false,
                afterBlur: function(){this.sync();},
                items : [ ],
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=form_pro]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
    <textarea name="describe_content" id="describe_content" style="width:635px;height:120px;visibility:hidden;"><?php echo $describe_content;//htmlspecialchars($describe_content); ?></textarea>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="Explain">
        <tr><td height="10"></td></tr>
        <tr>
            <td colspan="3"><h2>上传说明文档：<br /></h2></td>
        </tr>
        <tr><td height="5"></td></tr>
        <tr>
            <td width="100%">
                <table id="tab_upload">
                    <?php echo $describe_file_list;?>
                </table>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr><td height="5"></td></tr>
        <tr>
            <td width="80%">
                <input type="hidden" name="upload_file_count" id="upload_file_count" value="<?php echo $upload_file_count;?>" />
                <input type="hidden" name="describe_file" id="describe_file" value="<?php echo $describe_file;?>" />
                <input type="hidden" name="describe_file1" id="describe_file1" value="<?php echo $describe_file1;?>" />
                <input type="hidden" name="describe_file2" id="describe_file2" value="<?php echo $describe_file2;?>" />
                <iframe src="ajaxfileupload_user1.php?txtid=describe_file&showtext=" onload="turnHeight('iframe1');" frameBorder=0 scrolling="no" style="height:25px;"></iframe>
            </td>
        </tr>
    </table>

</div>
<div class="tructure" id="place_2" style="display:none">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="10%" align="left" valign="middle">项目地址：</td>
            <td colspan="2" align="left" valign="middle"><input type="text" value="<?php echo $place_address;?>" class="boxes" name="place_address" id="place_address" /></td>
        </tr>
        <tr>
            <td align="left" valign="middle">位置描述：</td>
            <td colspan="2" align="left" valign="middle"><input type="text" value="<?php echo $place_describe;?>" class="boxes" name="place_describe" id="place_describe" /></td>
        </tr>
        <tr>
            <td align="left" valign="middle">公共交通：</td>
            <td colspan="2" align="left" valign="middle"><input type="text" value="<?php echo $place_traffic;?>" class="boxes" name="place_traffic" id="place_traffic" /></td>
        </tr>
        <tr>
            <td align="left" valign="middle">位置地图：</td>
            <td>
                <input type="hidden" name="place_map" id="place_map" value="<?php echo $place_map;?>" />
                <iframe src="ajaxfileupload_user2.php?txtid=place_map&imgid=place_map_img" onload="turnHeight('iframe1');" frameBorder=0 scrolling="no" style="height:25px; width:350px;"></iframe>
                <div id='div_place_map_img' style="width:550px;height:410px;overflow:auto;margin-top:6px;"><? if($place_map!=""){?><img id="place_map_img" src="<?php echo $place_map;?>"/><? }?></div>
            </td>
            <td align="right" valign="middle"></td>
        </tr>
    </table>

</div>
<div class="tructure" id="place_3" style="display:none">
    <script>
        KindEditor.ready(function(K) {
            editor2 = K.create('textarea[name="build_zjxx"]', {
                cssPath : 'editor/plugins/code/prettify.css',
                uploadJson : 'editor/php/upload_json.php',
                fileManagerJson : 'editor/php/file_manager_json.php',
                allowFileManager : true,
                allowUpload : false,
                items : [ ],
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=form_pro]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" valign="middle"><h2>建筑信息</h2></td>
        </tr>
        <tr>
            <td align="left" valign="middle">
                <textarea name="build_zjxx" id="build_zjxx" style="width:635px;height:120px;visibility:hidden;"><?=$build_zjxx //echo htmlspecialchars($build_zjxx); ?></textarea>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="4"><h2>建筑指标</h2></td>
        </tr>
        <tr>
            <td width="20%" align="left" valign="middle">占地面积：</td>
            <td width="30%" align="left" valign="middle"><input type="text" value="<?php echo $build_tdmj;?>"  class="meters" name="build_tdmj" id="build_tdmj"/>&nbsp;平米</td>
            <td width="20%" align="left" valign="middle">土地使用年限：</td>
            <td width="30%" align="left" valign="middle">
                <input type="text" name="build_cqnx1" id="build_cqnx1" class="meters"  style="width:55px" value="<?php echo $build_cqnx1;?>"/>
                <label style="float:none;">年至</label>
                <input type="text" name="build_cqnx2" id="build_cqnx2"  class="meters" style="width:55px" value="<?php echo $build_cqnx2;?>"/>
                <label style="float:none;">年</label>
            </td>
        </tr>
        <tr>
            <td align="left" valign="middle">建设用地面积：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_zdmj;?>"  class="meters" name="build_zdmj" id="build_zdmj"/>&nbsp;平米</td>
            <td align="left" valign="middle">规划用途：</td>
            <td align="left" valign="middle">
                <input type="text" name="build_ghyt" id="build_ghyt" class="meters" style="width:175px;" value="<?php echo $build_ghyt;?>"/>
            </td>
        </tr>
        <tr>
            <td align="left" valign="middle"> 总建筑面积：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_zjzmj;?>"  class="meters" name="build_zjzmj" id="build_zjzmj"/>&nbsp;平米</td>
            <td align="left" valign="middle">建成时间：</td>
            <td align="left" valign="middle"><input type="text" name="build_jcsj" id="build_jcsj" class="meters" style="width:55px" value="<?php echo $build_jcsj;?>"/>
                年</td>
        </tr>
        <tr>
            <td align="left" valign="middle">-&nbsp;&nbsp;&nbsp;地上面积：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_dsmj;?>"  class="meters" name="build_dsmj" id="build_dsmj"/>&nbsp;平米</td>
            <td align="left" valign="middle">其他：</td>
            <td align="left" valign="middle">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" valign="middle">-&nbsp;&nbsp;&nbsp;地下面积：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_dxmj;?>"  class="meters" name="build_dxmj" id="build_dxmj"/>&nbsp;平米</td>
            <td align="left" valign="middle">-&nbsp;&nbsp;&nbsp;土地状况：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_tdzk;?>"  class="meters" name="build_tdzk" id="build_tdzk"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">建筑高度：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_jzgd;?>"  class="meters" name="build_jzgd" id="build_jzgd"/>&nbsp;米</td>
            <td align="left" valign="middle">-&nbsp;&nbsp;&nbsp;建筑密度： </td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_jzmd;?>"  class="meters2" name="build_jzmd" id="build_jzmd"/>&nbsp;%</td>
        </tr>
        <tr>
            <td align="left" valign="middle">总房间数：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_zfjs;?>"  class="meters" name="build_zfjs" id="build_zfjs"/>&nbsp;间套</td>
            <td align="left" valign="middle">-&nbsp;&nbsp;&nbsp;容积率：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_rjl;?>"  class="meters2" name="build_rjl" id="build_rjl"/>&nbsp;</td>
        </tr>
        <tr>
            <td align="left" valign="middle"> 车位数量：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_cwsl;?>"  class="meters" name="build_cwsl" id="build_cwsl"/>&nbsp;个</td>
            <td align="left" valign="middle"> -&nbsp;&nbsp;&nbsp;绿地率：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_ldl;?>"  class="meters2" name="build_ldl" id="build_ldl"/>&nbsp;%</td>
        </tr>
        <tr>
            <td align="left" valign="middle">-&nbsp;&nbsp;&nbsp;地上车位：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_dscw;?>"  class="meters" name="build_dscw" id="build_dscw"/>&nbsp;个</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" valign="middle">-&nbsp;&nbsp;&nbsp;地下车位：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_dxcw;?>"  class="meters" name="build_dxcw" id="build_dxcw"/>&nbsp;个</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2" align="left" valign="middle"><h2>楼层平面</h2></td>
        </tr>
        <tr>

            <td width="20%" align="left" valign="middle">总楼层数：</td>
            <td width="80%"><input type="text" value="<?php echo $build_zlcs;?>"  class="meters" name="build_zlcs" id="build_zlcs"/>&nbsp;层</td>
        </tr>
        <tr>
            <td align="left" valign="middle">-&nbsp;&nbsp;&nbsp;地上层数：</td>
            <td><input type="text" value="<?php echo $build_dscs;?>"  class="meters" name="build_dscs" id="build_dscs"/>&nbsp;层</td>
        </tr>
        <tr>
            <td align="left" valign="middle">-&nbsp;&nbsp;&nbsp;地下层数：</td>
            <td><input type="text" value="<?php echo $build_dxcs;?>"  class="meters" name="build_dxcs" id="build_dxcs"/>&nbsp;层</td>
        </tr>
        <tr>
            <td align="left" valign="middle">标准层高：</td>
            <td><input type="text" value="<?php echo $build_bzcg;?>"  class="meters" name="build_bzcg" id="build_bzcg"/>&nbsp;米</td>
        </tr>
        <tr>
            <td align="left" valign="middle">标准净高：</td>
            <td><input type="text" value="<?php echo $build_bzjg;?>"  class="meters" name="build_bzjg" id="build_bzjg"/>&nbsp;米</td>
        </tr>
        <tr>
            <td align="left" valign="middle">标准层建筑面积： </td>
            <td><input type="text" value="<?php echo $build_bzcjzmj;?>"  class="meters" name="build_bzcjzmj" id="build_bzcjzmj"/>&nbsp;平米</td>
        </tr>
        <tr>
            <td align="left" valign="middle">主力户型/开间面积：</td>
            <td><input type="text" value="<?php echo $build_kjmj;?>"  class="meters" name="build_kjmj" id="build_kjmj"/>&nbsp;平米</td>
        </tr>
        <tr>
            <td align="left" valign="middle">标准房间面积：</td>
            <td><input type="text" value="<?php echo $build_bzfjmj;?>"  class="meters" name="build_bzfjmj" id="build_bzfjmj"/>&nbsp;平米</td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2" align="left" valign="middle"><h2>建材装修</h2></td>
        </tr>
        <tr>
            <td width="18%" align="left" valign="middle">装修情况：</td>
            <td width="82%" align="left" valign="middle"><input type="text" value="<?php echo $build_zxqk;?>"  class="meters3" name="build_zxqk" id="build_zxqk"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle"> 建筑结构：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_jzjg;?>"  class="meters3" name="build_jzjg" id="build_jzjg"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">外立面：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_wlm;?>"  class="meters3" name="build_wlm" id="build_wlm"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle"> 内墙：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_nq;?>"  class="meters3" name="build_nq" id="build_nq"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">大堂及公共部分：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $build_dtggbf;?>"  class="meters3" name="build_dtggbf" id="build_dtggbf"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">其他说明：</td>
            <td align="left" valign="middle"><textarea class="compile2" name="build_qtsm" id="build_qtsm"><?php echo $build_qtsm;?></textarea></td>
        </tr>
        <tr align="left" valign="middle"><td height="40"></td></tr>

    </table>
</div>
<div id="place_4" style="display:none" class="tructure">
    <ul class="picture" id="picarr"><?php echo $pro_imgslist;?></ul>
    <div class="clear"></div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr><td width="12%" height="11"></td></tr>
        <tr>
            <td>
                <iframe src="ajaxfileupload_user4.php" onload="turnHeight('iframe1');" frameBorder=0 scrolling="no"></iframe>
            </td>
        </tr>
        <tr><td height="11"></td></tr>
    </table>
    <div class="clear"></div>
</div>
<div class="tructure" id="place_5" style="display:none">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2" align="left" valign="middle"><h2>硬件设置</h2></td>
        </tr>
        <tr>
            <td width="7%" align="left" valign="middle">客梯：</td>
            <td width="93%" align="left" valign="middle"><input type="text" value="<?php echo $facility_kt;?>"  class="Setll" name="facility_kt" id="facility_kt"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">货梯：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $facility_ht;?>"  class="Setll" name="facility_ht" id="facility_ht"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">空调：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $facility_ktiao;?>"  class="Setll" name="facility_ktiao" id="facility_ktiao"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">供暖：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $facility_gn;?>"  class="Setll" name="facility_gn" id="facility_gn"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">供水：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $facility_gs;?>"  class="Setll" name="facility_gs" id="facility_gs"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">供电：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $facility_gd;?>"  class="Setll" name="facility_gd" id="facility_gd"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">燃气：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $facility_rq;?>"  class="Setll" name="facility_rq" id="facility_rq"/></td>
        </tr>
        <tr>
            <td align="left" valign="middle">其他：</td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $facility_qt;?>"  class="Setll" name="facility_qt" id="facility_qt"/></td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" valign="middle"><h2>楼内配套</h2></td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <?php echo $facility_lnpt_list;?>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2" align="left" valign="middle"><h2>周边配套</h2></td>
        </tr>
        <tr>
            <td colspan="2" align="left" valign="top">
                <textarea name="facility_zbpt" id="facility_zbpt" style="width:550px;height:70px;visibility:hidden;"><?=$facility_zbpt //echo htmlspecialchars($facility_zbpt); ?></textarea>

            </td>
        </tr>
    </table>
</div>
<div class="trust" id="place_6" style="display:none">
    <table width="624" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2"><h2>投资回报</h2></td>
        </tr>
        <tr><td width="129" height="13"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>出租率：</span></td>
            <td width="495" align="left" valign="middle"><input type="text" value="<?php echo $finance_czl;?>" class="Setll" name="finance_czl" id="finance_czl" />&nbsp;%</td>
        </tr>
        <tr align="left" valign="middle"><td height="7"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>投资回报率(ROI)：</span></td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $finance_tzhbl;?>" class="Setll" name="finance_tzhbl" id="finance_tzhbl" />&nbsp;%</td>
        </tr>
        <tr align="left" valign="middle"><td height="7"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>资本化率(Cap Rate)：</span></td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $finance_zbhl;?>" class="Setll" name="finance_zbhl" id="finance_zbhl" />&nbsp;%</td>
        </tr>
        <tr align="left" valign="middle"><td height="7"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>内部收益率(IRR)：</span></td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $finance_nbsyl;?>" class="Setll" name="finance_nbsyl" id="finance_nbsyl" />&nbsp;%</td>
        </tr>
        <tr align="left"><td height="12" valign="middle"></td></tr>
    </table>
    <table width="624" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="6"><h2>财务数据</h2></td>
        </tr>
        <tr><td width="65" height="7"></td></tr>
        <tr>
            <td colspan="6">
                <table id="td_date" width="100%">
                    <tr>
                        <td id="td_date2"><?php echo $pro_financelist;?></td>
                    </tr>

                    <!---->
                </table>

            </td>
        </tr>
        <tr>
            <td colspan="6"><input type="button" value="更&nbsp;多" class="servan" style="cursor:pointer" onClick="insertdate()" /></td>
        </tr>
        <tr><td colspan="6" height="15">&nbsp;</td></tr>
    </table>
</div>
<div class="trust" id="place_7" style="display:none">
    <table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left:0;">
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr><td width="62" height="13"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>交易价格：</span></td>
            <td width="488" align="left" valign="middle"><label id="lb_price"><?php echo trim($price);?></label>亿</td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="top"><span>交易方式：</span></td>
            <td align="left" valign="middle">
                <?php echo $trade_jyfs_list;?>
            </td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>付款方式：</span></td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $trade_fkfs;?>" class="Pit" name="trade_fkfs" id="trade_fkfs" /></td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>保 证 金：</span></td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $trade_bzj;?>"  class="Money" style="width:220px" name="trade_bzj" id="trade_bzj"/></td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>挂牌日期：</span></td>
            <td align="left" valign="middle"><input type="text" name="trade_gprq" id="trade_gprq"  style="width:220px" value="<?php echo $trade_gprq;?>"/>
            </td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="top"><span>其他条件： </span></td>
            <td align="left" valign="top">
                <script>
                    KindEditor.ready(function(K) {
                        editor3 = K.create('textarea[name="trade_qttj"]', {
                            cssPath : 'editor/plugins/code/prettify.css',
                            uploadJson : 'editor/php/upload_json.php',
                            fileManagerJson : 'editor/php/file_manager_json.php',
                            allowFileManager : true,
                            allowUpload : false,
                            items : [ ],
                            afterCreate : function() {
                                var self = this;
                                K.ctrl(document, 13, function() {
                                    self.sync();
                                    K('form[name=form_pro]')[0].submit();
                                });
                            }
                        });
                        prettyPrint();
                    });
                </script>
                <textarea name="trade_qttj" id="trade_qttj" style="width:435px;height:120px;visibility:hidden;"><?=$trade_qttj //echo htmlspecialchars($trade_qttj); ?></textarea>
            </td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
    </table>
</div>
<div class="trust" id="place_8" style="display:none">
    <table width="624" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2"><h2>产权人信息</h2></td>
        </tr>
        <tr><td width="67" height="13"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>公司名称：</span></td>
            <td width="557" align="left" valign="middle"><input type="text" value="<?php echo $owner_gsmc;?>" class="reput" name="owner_gsmc" id="owner_gsmc" /></td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>所在位置：</span></td>
            <td align="left" valign="middle">
                <select class="slc" name="countrySlc" id="countrySlc" onChange="ischina()"><?php echo $countrystr;?></select>
                <?php echo $owner_szwz_str;?>
                <select name="citySlc" id="citySlc" ><option value="-1">无</option></select>
            </td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>办公地址：</span></td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $owner_bgdz;?>" class="reput" name="owner_bgdz" id="owner_bgdz" /></td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="middle"><span>注册资本：</span></td>
            <td align="left" valign="middle"><input type="text" value="<?php echo $owner_zczb;?>"  class="meters" name="owner_zczb" id="owner_zczb"/>&nbsp;万元</td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="top"><span>企业类型：</span></td>
            <td align="left" valign="middle">
                <?php echo $owner_qylx_list;?>
            </td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td colspan="2" align="left" valign="middle"><span>持有产权/股权比例：</span>      <input type="text" value="<?php echo $owner_cygq;?>"  class="firing" name="owner_cygq" id="owner_cygq"/></td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td colspan="2" align="left" valign="middle"><span>转让产权/股权比例：</span>      <input type="text" value="<?php echo $owner_zrgq;?>"  class="firing" name="owner_zrgq" id="owner_zrgq"/></td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
        <tr>
            <td align="left" valign="top"><span>公司介绍： </span></td>
            <td align="left" valign="top">
                <script>
                    KindEditor.ready(function(K) {
                        editor3 = K.create('textarea[name="owner_gsjs"]', {
                            cssPath : 'editor/plugins/code/prettify.css',
                            uploadJson : 'editor/php/upload_json.php',
                            fileManagerJson : 'editor/php/file_manager_json.php',
                            allowFileManager : true,
                            allowUpload : false,
                            items : [ ],
                            afterCreate : function() {
                                var self = this;
                                K.ctrl(document, 13, function() {
                                    self.sync();
                                    K('form[name=form_pro]')[0].submit();
                                });
                            }
                        });
                        prettyPrint();
                    });
                </script>
                <textarea name="owner_gsjs" id="owner_gsjs" style="width:535px;height:120px;visibility:hidden;"><?=$owner_gsjs //echo htmlspecialchars($owner_gsjs); ?></textarea>
            </td>
        </tr>
        <tr><td height="7" align="left" valign="middle"></td></tr>
    </table>
</div>
</div>
</div>
</div>
</div></form>
</div>
</div>
<div class="heart_botm"></div>
</div>
<div class="clear"></div>
</div>
</div>
</div>

<!--底部-->
<div id="footer">
    <script language="javascript">include('footer.html','footer');</script>
</div>
</body>
<?php echo $my_pro_cbd;?>
<script type="text/javascript" src="js/present.js"></script>
<?php echo $cityfirstjs;?>
<?php echo $edit_cityjs;?>
<?php echo $edit_cbds;?>
<?php //echo $edit_offerjs;?>
<?php echo $edit_areajs;?>
<?php echo $edit_offerjs;?>
</script>
<?php echo $insertdatejs;?>
</html>

