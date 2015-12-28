<?php  include "inc/conn.php";?>
<?php  include "inc/func_lm.php";?>
<?php  include "inc/func_my.php";?>
<?php
$sql=mysql_query("select * from industry_type order by createtime desc;",$conn);
$industry_type .= "<select name='industry'>";
while($rs=mysql_fetch_array($sql))
{
    $industry_type.="<option value='".$rs["id"]."'>".$rs["name"]."</option>";
}
$industry_type .= "</select>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>投资</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="scripts/jquery.js"></script>
    <script language="javascript" src="scripts/public.js"></script>
</head>

<body>
<!--top-->
<div id="head">
    <script language="javascript">include('top.html','head');</script>
</div>
<!--end-->

<!--content-->
<div class="banners">
    <div class="bannerbox"><img src="uploads/banner3.jpg" alt="交易平台" /></div>
</div>
<div class="main">
<div class="content">
<table cellpadding="0" cellspacing="0" width="100%" border="0">
<tr>
<td width="228" valign="top">
    <?php  include "wdptleft.php";?>

    <a href="faq.php"><img src="uploads/faq.gif" title="" alt="" class="joinPic" /></a>
</td>
<td valign="top">
    <div class="rightCon width736">
        <div class="righttitle width729">
            <div class="t1"><label>成为会员</label><span>Become a Member</span></div>
            <div class="t3"><span>首页&nbsp;&gt;&nbsp;威地平台&nbsp;&gt;&nbsp;成为会员</span></div>
            <div class="clear"></div>
        </div>
        <div class="business">
            <div class="member">
                <p><span class="colorspan"><A href="platform.html">威地平台</A></span>是一个会员制的投资信息交流平台。所有威地会员都必须经过威地鹏图的验证和评估，目的是要把威地打造成一个更可值得依赖和信任的平台。</p><br />
                <p>如果你是机构投资者，产权人和融资人，或经授权的中介代理，且有5000万以上的产权交易与投融资需求，欢迎加入我们的威地平台。威地平台只接受有商业法律主体的会员申请。</p><br />
                <p class="pfont"><span class="colorspan"><A href="platform.html">VD Platform</A></span> is a member only investment information exchange platform. All VD members must be verified and assessed by Very-Deals
                    Company in order to build Very-Deals a more reliable and trustworthy platform. </p><br />
                <p class="pfont">If you are institutional investors, property owners & fund seekers, or authorized brokers/agents, and have property transactions and
                    financing requirements at above RMB50 Million, you are welcome to join VD Platform. VD Platform only accepts membership
                    applications from business legal entities</p><br />
            </div>
            <p class="membertitle">申请成为会员<span>Apply Membership </span></p>
            <div class="memberbox">
                <form action="actionServer.php" method="post" id="regf" onsubmit="return check()">
                    <input type="hidden" name="action" value="guestadd"/>
                    <table cellspacing="0" cellpadding="0" width="100%" border="0" class="table">
                        <tr><td colspan="2" height="15"></td></tr>
                        <tr><td colspan="2" height="20" style="font-size:14px;">*&nbsp;<label id="lbim" class="">我是 I am</label></td></tr>
                        <tr><td height="5"></td></tr>
                        <?php
                        $i = 0;
                        $sql=mysql_query("select * from user_mes where type = 1 order by createtime desc,id desc;",$conn);
                        while($rs=mysql_fetch_array($sql))
                        {
                            $xtype1id = $rs["id"]==6?"id='xtype1id'":"";
                            ?>

                            <tr>
                                <td height="20" width="20" style="vertical-align:top;padding:2px 0 0 0;"><input type="radio" value="<?php echo $rs["id"]?>" onclick="showother(this)"  name="mestype1" <?php echo $selstr;?>/></td>
                                <td width="716"><label <?php echo $xtype1id;?> class=""><?php echo $rs["title"]?> <?php echo $rs["title_en"]?></label>
                                    <?php if($rs['id']==5){?>
                                        <textarea style="display:none;" name="mycontent" class="in2 midd" id='txtother'></textarea>
                                    <?php } ?>
                                </td>

                            </tr>

                        <?php

                        }
                        ?>
                        <tr><td height="5px"></td></tr>
<!--                        <tr >-->
<!--                            <td width="20">&nbsp;</td>-->
<!--                            <td id="txtother" align="left" valign="top"  style="display:none"><textarea class="midd" name="mycontent" id="mycontent" onpropertychange="NotMax(this)"></textarea></td>-->
<!--                        </tr>-->

                        <tr><td colspan="2" height="20"></td></tr>
                        <tr><td colspan="2" height="20" style="font-size:14px;">*&nbsp;<label id="lbineed" class="">我需要或我有 I need or I have</label></td></tr>
                        <?php
                        $i = 0;
                        $selstr = "";
                        $sql=mysql_query("select * from user_mes where type = 2 order by createtime desc,id desc;",$conn);
                        while($rs=mysql_fetch_array($sql))
                        {
                            //$selstr = $i==0?"checked='checked'":"";
                            ?>
                            <tr><td height="5"></td></tr>
                            <tr>
                                <td height="20" width="20"><input type="checkbox"  value="<?php echo $rs["id"]?>" name="mestype2" id="mestype2" /></td>
                                <td><?php echo $rs["title"]?><label><?php echo $rs["title_en"]?></label></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>


                        <?php
                        $countrystr = "";
                        $sql=mysql_query("select * from country  order by id asc;",$conn);
                        while($rs=mysql_fetch_array($sql))
                        {
                            $countrystr .= "<option value='".$rs["id"]."'>".$rs["name"]."</option>";

                        }
                        ?>
                        <tr><td colspan="2" height="30"></td></tr>
                        <tr>
                            <td colspan="2"><p class="membertitle">公司信息<span>Company Information</span></p></td>
                        </tr>
                        <tr><td colspan="2">
                                <table cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tr>
                                        <td colspan="4" height="15"></td>
                                    </tr>

                                    <tr>
                                        <td width="25%" height="30" align="right">*&nbsp;<label id="lbcompanyname" class=""><span class="diftion">公司名称</span> Company Name</label>&nbsp;&nbsp;</td>
                                        <td colspan="3"><input type="text" value="" class="in2" name="companyname" id="companyname" maxlength="100" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" height="30" align="right">*&nbsp;<label id="lbcompanywebsite" class=""><span class="diftion">公司网址</span> Company Website</label>&nbsp;&nbsp;</td>
                                        <td colspan="3"><input type="text" value="" class="in2" name="companywebsite" id="companywebsite" maxlength="100" /></td>
                                    </tr>
                                    <tr>
                                        <td width="25%" height="30" align="right">*&nbsp;<label id="lbindustry" class=""><span class="diftion">行业</span> Industry</label>&nbsp;&nbsp;</td>
                                        <td colspan="3"><?php echo $industry_type;?></td>
                                    </tr>
                                    <tr>
                                        <td width="25%" height="30" align="right">*&nbsp;国家 <label>Country</label>&nbsp;&nbsp;</td>
                                        <td colspan="3">
                                            <select class="slc" name="countrySlc" id="countrySlc" onchange="getprovincial()"><?php echo $countrystr;?></select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="40" align="right">
                                            <span class="spcity">*&nbsp;省 <label>Province</label>&nbsp;</span>

                                        </td>
                                        <td width="24%">
                                            <select name="provincialSlc" id="provincialSlc" class="slc" onchange="getcity()">
                                                <option value="-1">无</option>
                                            </select>


                                        </td>
                                        <td width="10%" align="right" valign="middle">  <span class="spcity">*&nbsp; 市 <label>City</label></span></td>
                                        <td width="44%">
                                            <select name="citySlc" id="citySlc" class="slc">
                                                <option value="-1">无</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" height="30"></td>
                                    </tr>

                                    <tr>
                                        <td colspan="4"><p class="membertitle">申请人信息<span>Applicant Information</span></p></td>
                                    </tr>
                                    <tr><td colspan="4" height="15"></td></tr>
                                    <tr>
                                        <td width="25%" height="30" align="right">*&nbsp;<label id="lbtruename" class=""><span class="diftion">姓名</span>  Name</label>&nbsp;&nbsp;</td>
                                        <td colspan="3"><input type="text" value="" class="in2 need" name="truename" id="truename" maxlength="100" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" height="30" align="right">&nbsp;<label id="lbtruename" class=""><span class="diftion"></span>  </label>&nbsp;&nbsp;</td>
                                        <td colspan="3"><input type="radio" name="sex" value="先生" checked placeholder="">先生 Mr.&nbsp;&nbsp; <input type="radio" name="sex" value="女士" placeholder="">女士 Ms.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" height="30" align="right">*&nbsp;<label id="lbjobtitle" class="">职务 Job Title</label>&nbsp;&nbsp;</td>
                                        <td colspan="3"><input type="text" value="" class="in2 need"  name="jobtitle" id="jobtitle" maxlength="100" /></td>
                                    </tr>
                                    <tr>
                                        <td width="25%" height="30" align="right">*&nbsp;<label id="lbcompanymail" class="">企业邮箱 Company Mail</label>&nbsp;&nbsp;</td>
                                        <td colspan="3"><input type="text" value="" class="in2 need"  name="companymail" id="companymail" maxlength="100" />
                                            <input type="button" value="检测邮箱" onclick="do_check_companymail()"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" height="30" align="right">*&nbsp;<label id="lbtelephone" class="">电话 Telephone</label>&nbsp;&nbsp;</td>
                                        <td colspan="3"><input type="text" value="" class="in2 need" name="telephone" id="telephone" maxlength="50" /></td>
                                    </tr>
                                    <tr>
                                        <td width="25%" height="30" align="right"><label id="lbmobile" class="">*手机 Mobile</label>&nbsp;&nbsp;</td>
                                        <td colspan="3"><input type="text" value="" class="in2 need" name="mobile" id="mobile" maxlength="50" /></td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="middle" height="30">验证码 <label>Code</label>：</td>
                                        <td align="left" valign="top" height="30"><input type="text" name="chkcode" id="chkcode" class="code need" style="float:left; margin-top:5px;" /><img src="checkNum_session.php" id="checkimg" onclick="this.src = 'checkNum_session.php?' + Math.random();" style="cursor:pointer;width:60px; height:24px;"/></td>
                                    </tr>
                                    <tr><td height="10px"></td></tr>
                                    <tr>
                                        <td align="right" valign="middle"><input type="checkbox" id="chkgreen" name="chkgreen" onclick="ischk()" value="" style="float:right; margin-right:5px" />&nbsp;&nbsp;</td>
                                        <td colspan="3" align="left" valign="top" style="float:left; line-height:normal;">我同意&nbsp;<label>I agree</label></td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="middle">&nbsp;</td>
                                        <td colspan="3" align="left" valign="top"><div class="midd">
                                                &nbsp;&nbsp;&nbsp;&nbsp;此次基本信息提交并不等同于您已经完成会员申请程序，且也不能保证威地平台一定会接受您成为会员。<br />
                                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The submission of this basic application information shall
                                                    not mean that you have finished membership application process,
                                                    and <br />it is not guaranteed that VD Platform will accept you as a member.</label>
                                            </div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td height="50" colspan="3">
                                            <img src="images/loading5.gif" style="display:none" id="imgload"/>
                                            <input type="image" id="btnsubmit" name="btnsubmit" disabled="disabled" style="display:block" src="images/submit_.gif" /></td>
                                    </tr>
                                </table>
                            </td></tr>

                    </table></form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</td>
</tr>
</table>
</div>
</div>
<!--end-->
<?php
if($_SESSION['guestsuc'] != "")
{
    echo "<script>alert('    谢谢您的会员申请！我们会在24小时内联络您。\\nThank you for your membership application We will contact you within 24 yours.');</script>";
    $_SESSION['guestsuc'] = "";
}
?>
<!--footer-->
<div id="footer">
    <?php  include "footer.php";?>
</div>
<!--end-->
<script type="text/javascript" src="js/reg.js"></script>
</body>
</html>
<script>
    function show(im){
        im.src="yanzhengma.php?"+new Date;
    }


    $(function (){
        $("#btnsubmit").click(function (){
	  if($('input:radio[name="mestype1"]:checked').val()==5)
	  {
		  if(document.getElementById('txtother').value.replace(/(\s*$)/g, "")=="")
		  {
			  alert("请填写‘其他问题说明’");
			  return false;
		  }
		  
	
	  }

            var objs= $(".need");
            for (var i =0; i <= objs.size(); i++) {
                if(objs.eq(i).val()==""){
                    alert("请认真填写此项信息！");
                    $(".need").eq(i).css("border",'1px solid #f00').focus();
                    return false;
                }
            };
            $("#regf").submit();
            return false;
        })
        $(".need").blur(function (){
            $(this).css("border",'1px solid #c9c9c9');
        })

        $("input[name=mestype1]").change(function() {
            if($(this).val()==5){
                $("input[name=typename_anther]").css("display",'');
            }else{
                $("input[name=typename_anther]").css("display",'none');
            }
        });

    })
</script>
