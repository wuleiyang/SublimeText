<?php  include "inc/conn.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=gbk">
    <title></title>
    <meta name="description" content="" id="description">
    <meta name="keywords" content="">
    <link href="css/css.css" rel="stylesheet" type="text/css">
    <script src="js/b.js" async="" charset="utf-8" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/model.js"></script>
    <script type="text/javascript" src="js/public.js"></script>
    <script>
        $(function()
        {
            $('#scrollelement').Scrolls({prevbtn:'.left-scroll-btn',nextbtn:'.right-scroll-btn',visible:3});
        });
    </script>
    <!--<script src="js/bw.js" charset="UTF-8" type="text/javascript"></script>-->
    <link href="js/m-front-icon.css" type="text/css" rel="stylesheet">
    <script charset="UTF-8" src="js/Enter.js" id="BDBridgeSendData" language="javascript" type="text/javascript"></script>
    <link href="css/m-front-mess.css" type="text/css" rel="stylesheet">
    <link href="css/m-front-invite.css" type="text/css" rel="stylesheet">
    <style>
        @import "http://qiao.baidu.com/v3/asset/css/m-webim-lite.css?v=20130705";
    </style>
    <script charset="UTF-8" src="js/Refresh.js" id="BDBridgeReport" language="javascript" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="spry/spry.js" type="text/javascript"></script>
    <link href="spry/spry.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="swf/swfobject.js"></script>
    <script src="http://jwpsrv.com/library/uHU8ppUvEeK0fSIACpYGxA.js"></script>
</head>
<body>
<div class="container">
<div class="content">
<div class="leftcontent">
    <div id="menu">
        <div class="logobox"></div>
        <div class="menubox">
            <div class="positionbox"></div>
            <ul id="navigation">
                <li><a href="index.php">HOME</a><a href="index.php" class="titlea nobga">首页</a></li>
                <li id="li_hidemenu_1"><a href="about.php">About Us</a><a href="about.php" class="titlea">关于我们</a>
                    <div class="hidemenu" style="display:none" id="hidemenu_1">
                        <a href="about.php" class="imga"><img src="images/gywm.jpg"></a>
                    </div>
                </li>
                <li id="li_hidemenu_2"><a href="list1.php?c=2">Film&amp;Television</a><a style="display: none;" href="list1.php?c=2" class="titlea">影视</a>
                    <div class="hidemenu" style="display:none" id="hidemenu_2">
                        <a href="list.php?c=2" class="imga"><img src="images/dy.jpg"></a>
                    </div>
                </li>
                <li id="li_hidemenu_3"><a href="list1.php?c=3">Celebration Party</a><a style="display: none;" href="list1.php?c=3" class="titlea">晚会庆典</a>
                    <div class="hidemenu" style="display:none" id="hidemenu_3">
                        <a href="list1.php?c=3" class="imga"><img src="images/qc.jpg"></a>
                    </div>
                </li>
                <li id="li_hidemenu_4"><a style="display: inline;" href="list1.php?c=4">Brand Promotion</a><a style="display: none;" href="list1.php?c=4" class="titlea">品牌推广</a>
                    <div class="hidemenu" style="display: none;" id="hidemenu_4">
                        <a href="list1.php?c=4" class="imga"><img src="images/kxp.jpg"></a>
                    </div>
                </li>
                <li id="li_hidemenu_5">
                    <a href="list1.php?c=5">Style Match</a>
                    <a style="display: none;" href="list1.php?c=5" class="titlea">文体赛事</a>
                    <div class="hidemenu" style="display:none" id="hidemenu_5">
                        <a href="list1.php?c=5" class="imga">
                            <img src="images/ty.jpg">
                        </a>
                    </div>
                </li>
                <li id="li_hidemenu_6"><a href="xgy.php">Star Imaging</a><a style="display: none;" href="xgy.php" class="titlea">享影视</a>
                    <div class="hidemenu" style="display:block" id="hidemenu_6">
                        <a href="xgy.php" class="imga"><img src="images/zf.jpg"></a>
                    </div>
                </li>
                <li id="li_hidemenu_7"><a href="community.php">Community</a><a href="community.php" style="display: none;"  class="titlea">公益</a>
                    <div class="hidemenu" style="display: none;" id="hidemenu_7">
                        <a href="community.php" class="imga"><img src="images/gy.jpg"></a>
                    </div>
                </li>
                <li id="li_hidemenu_8"><a href="contact.php">Contact Us</a><a href="contact.php" class="titlea">联系我们</a>
                    <div class="hidemenu" style="display:none" id="hidemenu_8">
                        <a href="contact.php" class="imga"><img src="images/lxwm.jpg"></a>
                    </div>
                </li>
            </ul>
        </div>

        <script>

            $(function()
            {
                var items=$('#navigation > li');
                items.each(function(i){this.index=i;})
                var tid;
                items.hover(function(e)
                {
                    var _this=$(this);
                    tid=setTimeout(function(){
                        _this.children('div').slideDown().end()
                            .children('a').eq(0).hide();
                        _this.children('a').eq(1).show();

                    },500);
                    e.stopPropagation();

                },function(e)
                {
                    clearTimeout(tid);
                    $(this).children('div').stop(true,true).slideUp().end()
                        .children('a').stop(true,true).eq(1).hide();
                    $(this).children('a').eq(0).stop(true,true).show();
                    e.stopPropagation();
                })

            })
        </script>
    </div>
</div>
<div class="rightcontent Communityright">
<script type="text/javascript">
    $(document).ready(
        function(){
            $('.xingy_main_list_banner .text ul li').first().css({margin:"0"});
        }
    )
</script>
<div class="xingy_main">
<div class="nav">
    <ul>
        <li><a href="index.php">首页</a></li>
        <li><a href="about.php">关于我们</a></li>
        <li><a href="list1.php?c=2">影视</a></li>
        <li><a href="list1.php?c=3">晚会庆典</a></li>
        <li><a href="list1.php?c=4">品牌推广</a></li>
        <li><a href="list1.php?c=5">文体赛事</a></li>
        <li><a href="xgy.php">享影视</a></li>
        <li><a href="community.php">公益</a></li>
        <li><a href="contact.php">联系我们</a></li>
    </ul>
</div>



<?php
$sql="select * from xgy where fid=27 order by id desc limit 3";
$result=mysql_query($sql);
$data27=array();
while($row27=mysql_fetch_assoc($result)){
    $data27[]=$row27;
}
$sql="select * from article_type where id=27";
$class27=mysql_fetch_assoc(mysql_query($sql));


$sql="select * from xgy where fid=28 order by id desc limit 3";
$result=mysql_query($sql);
$data28=array();
while($row27=mysql_fetch_assoc($result)){
    $data28[]=$row27;
}

$sql="select * from article_type where id=28";
$class28=mysql_fetch_assoc(mysql_query($sql));

$sql="select * from xgy where fid=29 order by id desc limit 3";
$result=mysql_query($sql);
$data29=array();
while($row27=mysql_fetch_assoc($result)){
    $data29[]=$row27;
}
$sql="select * from article_type where id=29";
$class29=mysql_fetch_assoc(mysql_query($sql));


$sql="select * from xgy where fid=30 order by id desc limit 3";
$result=mysql_query($sql);
$data30=array();
while($row27=mysql_fetch_assoc($result)){
    $data30[]=$row27;
}
$sql="select * from article_type where id=30";
$class30=mysql_fetch_assoc(mysql_query($sql));

?>


<h1>享影视</h1>
<div class="xingy_main_list">
    <div class="xingy_main_list_banner">
        <div class="images">
            <div class="hdwrap">
                <div class="hdflash f_list">
                    <div class="flashlist">
<?php 
$sql="select * from advert where type = 10";
$resultadv=mysql_query($sql);
while ($advrow=mysql_fetch_assoc($resultadv)) {
   
 ?> 
                        <div class="f_out">
                            <a href="javascript:;">
                                <img src="<?php echo $advrow['img'] ?>"  title="<?php echo $advrow['name'] ?>"/>
                            </a>
                        </div>
<?php } ?>

                    </div>
                    <div class="flash_tab">
                        <div class="tabs f_tabs">
                            <ul>
                                <li class="f_tab opdiv">
                                    <a href="javascript:void(0);"></a>
                                </li>
                                <li class="f_tab opdiv">
                                    <a href="javascript:void(0);"></a>
                                </li>
                                <li class="f_tab opdiv">
                                    <a href="javascript:void(0);"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <script type="text/javascript" src="js/bigpicroll.js"></script>
                    <script type="text/javascript">
                        FeatureList(".f_list", {
                            "onclass": "noopdiv",
                            "offclass": "opdiv",
                            "pause_on_act": "mouseover",
                            "interval": 5000,
                            "speed": 5
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="text">
            <ul>
                <?php
                    $sql="select * from article_type where id=32";
                    $c32=mysql_fetch_assoc(mysql_query($sql));
                 ?>
                <li><a href="content.php?id=11"><img src="<?php echo $c32['img']; ?>" /></a><span><a href="content.php?id=11"><?php echo $c32['name']; ?></a></span></li>
                    <?php
                    $sql="select * from article_type where id=33";
                    $c32=mysql_fetch_assoc(mysql_query($sql));
                 ?>
                <li><a href="content.php?id=10"><img src="<?php echo $c32['img']; ?>" /></a><span><a href="content.php?id=10"><?php echo $c32['name']; ?></a></span></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <div class="xingy_main_list_main">
        <ul>
            <li><a href="#ggp"><img src="<?php echo $class27["img"]; ?>" /></a><span><a href="#ggp"><?php echo $class27["name"]; ?></a></span></li>
            <li><a href="#xcp"><img src="<?php echo $class28["img"]; ?>" /></a><span><a href="#xcp"><?php echo $class28["name"]; ?></a></span></li>
            <li><a href="#tv"><img src="<?php echo $class29["img"]; ?>" /></a><span><a href="#tv"><?php echo $class29["name"]; ?></a></span></li>
            <li><a href="#video"><img src="<?php echo $class30["img"]; ?>" /></a><span><a href="#video"><?php echo $class30["name"]; ?></a></span></li>
        </ul>
    </div>
</div>
<div class="clear"></div>
<div class="xingy_main_content">
<h2>共享星光出品</h2>
<!---广告页-->
<div class="section" id="ggp">
    <div class="tab">
        <div id="TabbedPanels1" class="TabbedPanels">


            <ul class="TabbedPanelsTabGroup" id="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data27[0]['img'] ?>" /><span></span></li>
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data27[1]['img'] ?>" /><span></span></li>
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data27[2]['img'] ?>" /><span></span></li>

            </ul>



            <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                    <?php if(strpos(strtolower($data27[0]['path']),"swf")>-1){?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data27[0]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data27[0]['id'] ?>">
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data27[0]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data27[0]['id'] ?>').setup({
                                file: '<?php echo $data27[0]['path'] ?>',
                                image: '<?php echo $data27[0]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>

                <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data27[1]['path']),"swf")>-1){?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data27[1]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data27[1]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data27[1]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data27[1]['id'] ?>').setup({
                                file: '<?php echo $data27[1]['path'] ?>',
                                image: '<?php echo $data27[1]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>
                </div>

                        <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data27[2]['path']),"swf")>-1){?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data27[2]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data27[2]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data27[2]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data27[2]['id'] ?>').setup({
                                file: '<?php echo $data27[2]['path'] ?>',
                                image: '<?php echo $data27[2]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>
            </div>
     
    </div><a name="ggp"></a>
    <div class="dl_main">
        <h3><?php echo $class27['name'] ?></h3>
        <div class="content">
            <?php echo $class27['content'] ?>
            <p class="btn"><a href="video_content.php?id=<?php echo $data27[0]['id'] ?>">&lt;……play</a></p>
        </div>
        <a href="xgylist.php?id=<?php echo $class27['id'] ?>" class="more">更多案例</a>
    </div>
</div>
<div class="video_hr"></div>




<!--宣传页-->
<div class="section">
    <div class="tab" id="xcp">
        <div id="TabbedPanels2" class="TabbedPanels">


            <ul class="TabbedPanelsTabGroup" id="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data28[0]['img'] ?>" /><span></span></li>
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data28[1]['img'] ?>" /><span></span></li>
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data28[2]['img'] ?>" /><span></span></li>

            </ul>



            <div class="TabbedPanelsContentGroup">
          <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data28[0]['path']),"swf")>-1){?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data28[0]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object> 
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data28[0]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data28[0]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object> 
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data28[0]['id'] ?>').setup({
                                file: '<?php echo $data28[0]['path'] ?>',
                                image: '<?php echo $data28[0]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>

                         <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data28[1]['path']),"swf")>-1){?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data28[1]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object> 
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data28[1]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data28[1]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object> 
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data28[1]['id'] ?>').setup({
                                file: '<?php echo $data28[1]['path'] ?>',
                                image: '<?php echo $data28[1]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>

                          <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data28[2]['path']),"swf")>-1){?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data28[2]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object> 
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data28[2]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data28[2]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object> 
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data28[2]['id'] ?>').setup({
                                file: '<?php echo $data28[2]['path'] ?>',
                                image: '<?php echo $data28[2]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div><a name="ggp"></a>
    <div class="dl_main">
        <h3><?php echo $class28['name'] ?></h3>
        <div class="content">
            <?php echo $class28['content'] ?>
            <p class="btn"><a href="video_content.php?id=<?php $data28[0]['id'] ?>">&lt;……play</a></p>
        </div>
        <a href="xgylist.php?id=<?php echo $class28['id'] ?>" class="more">更多案例</a>
    </div>
</div>
<div class="video_hr"></div>
<div class="clear"></div>
<!--微视频-->
<div class="section">
    <div class="tab" id="tv">
        <div id="TabbedPanels3" class="TabbedPanels">


            <ul class="TabbedPanelsTabGroup" id="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data29[0]['img'] ?>" /><span></span></li>
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data29[1]['img'] ?>" /><span></span></li>
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data29[2]['img'] ?>" /><span></span></li>

            </ul>



            <div class="TabbedPanelsContentGroup">
                        <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data29[0]['path']),"swf")>-1){?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data29[0]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object> 
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data29[0]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data29[0]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data29[0]['id'] ?>').setup({
                                file: '<?php echo $data29[0]['path'] ?>',
                                image: '<?php echo $data29[0]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>

                <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data29[1]['path']),"swf")>-1){?>
                   <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data29[1]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object> 
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data29[1]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data29[1]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data29[1]['id'] ?>').setup({
                                file: '<?php echo $data29[1]['path'] ?>',
                                image: '<?php echo $data29[1]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>

                            <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data29[2]['path']),"swf")>-1){?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data29[2]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data29[2]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data29[2]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data29[2]['id'] ?>').setup({
                                file: '<?php echo $data29[2]['path'] ?>',
                                image: '<?php echo $data29[2]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div><a name="ggp"></a>
    <div class="dl_main">
        <h3><?php echo $class29['name'] ?></h3>
        <div class="content">
            <?php echo $class29['content'] ?>
            <p class="btn"><a href="video_content.php?id=<?php $data29[0]['id'] ?>">&lt;……play</a></p>
        </div>
        <a href="xgylist.php?id=<?php echo $class29['id'] ?>" class="more">更多案例</a>
    </div>
</div>
<div class="video_hr"></div>
<div class="clear"></div>
<!--服务视频-->
<div class="section">
    <div class="tab" id="video">
        <div id="TabbedPanels4" class="TabbedPanels">


            <ul class="TabbedPanelsTabGroup" id="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data30[0]['img'] ?>" /><span></span></li>
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data30[1]['img'] ?>" /><span></span></li>
                <li class="TabbedPanelsTab" tabindex="0"><img src="<?php echo $data30[2]['img'] ?>" /><span></span></li>

            </ul>



            <div class="TabbedPanelsContentGroup">
                             <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data30[0]['path']),"swf")>-1){?>
                   <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data30[0]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data30[0]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data30[0]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data30[0]['id'] ?>').setup({
                                file: '<?php echo $data30[0]['path'] ?>',
                                image: '<?php echo $data30[0]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>

                <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data30[1]['path']),"swf")>-1){?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data30[1]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data30[1]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data30[1]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data30[1]['id'] ?>').setup({
                                file: '<?php echo $data30[1]['path'] ?>',
                                image: '<?php echo $data30[1]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>

               <div class="TabbedPanelsContent">
                   <?php if(strpos(strtolower($data30[2]['path']),"swf")>-1){?>
                   <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data30[2]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    <?php }else{ ?>
                    <div class="Movieplayer" id="play<?php echo $data30[2]['id'] ?>">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="347" height="218">
                    <param name="wmode" value="Opaque">
                    <embed width="347" height="218" name="plugin" src="<?php echo $data30[2]['path'] ?>" type="application/x-shockwave-flash" class="object_embed" wmode="transparent"></embed>
                    </object>
                    </div>
                        <script>
                             $(function(){
                                jwplayer('play<?php echo $data30[2]['id'] ?>').setup({
                                file: '<?php echo $data30[2]['path'] ?>',
                                image: '<?php echo $data30[2]['img'] ?>',
                                width: '344',
                                height: '219'
                                });
                            })
                        </script>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div><a name="ggp"></a>
    <div class="dl_main">
        <h3><?php echo $class30['name'] ?></h3>
        <div class="content">
            <?php echo $class30['content'] ?>
            <p class="btn"><a href="video_content.php?id=<?php $data30[0]['id'] ?>">&lt;……play</a></p>
        </div>
        <a href="xgylist.php?id=<?php echo $class30['id'] ?>" class="more">更多案例</a>
    </div>
</div>
<div class="video_hr"></div>
<div class="clear"></div>
<div class="xingy_main_content_page">
<!--    <ul>-->
<!--        <li><a href="javascript:;">首页</a></li>-->
<!--        <li><a href="javascript:;">上一页</a></li>-->
<!--        <li><a href="javascript:;">1</a></li>-->
<!--        <li><a href="javascript:;">2</a></li>-->
<!--        <li><a href="javascript:;">下一页</a></li>-->
<!--        <li><a href="javascipt:;">尾页</a></li>-->
<!--    </ul>-->
</div>
</div>
</div>
</div>
</div>
<div style="width: 1360px;" class="footer" id="footer">
    <div class="textfooter">
        <a href="contact.php">Contact Us</a>&nbsp;|
        <a href="#">Contribution</a>&nbsp;
        <span>@ 2012 共享星光</span>
        <label>京 ICP08018719</label>
    </div>
</div>
<script src="js/h.js" type="text/javascript"></script>
</div>

<!--<script type="text/javascript">
    document.getElementById("hidemenu_7").style.display = "block";
    $(function()
    {
        $('#li_hidemenu_7').unbind();
    })
</script>-->
<script charset="utf-8" src="file/m-webim-lite.js" type="text/javascript"></script>
<script type="text/javascript">
    var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    var TabbedPanels2 = new Spry.Widget.TabbedPanels("TabbedPanels2");
    var TabbedPanels3 = new Spry.Widget.TabbedPanels("TabbedPanels3");
    var TabbedPanels4 = new Spry.Widget.TabbedPanels("TabbedPanels4");
</script>
</body></html>