<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="Shortcut Icon" href="<?php echo G_WEB_PATH; ?>/favicon.ico">
<?php echo seo(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/index.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Comm.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/color.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/css.css"/>
<!--link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/MyCart.css"/-->
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/163style.css">
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/163cssdq.css">
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/inside_header_style.css">

<?php echo css(); ?>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/cloud-zoom.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo G_PLUGIN_PATH; ?>/layer/layer.min.js"></script>
<?php echo js(); ?>
<?php echo GetConfiga('verify'); ?>
</head>
<body>

<?php include self::includes("index.toolbar"); ?>
<script type="text/javascript">
$(document).ready( function() {
/* 商品分类 指向 移除 效果 */
  $("#goods_class").mouseover( function() {
    $( '#drop_box' ).attr( 'style', 'display: block;' );
    $( '#goods_class_i' ).addClass( "up" );
  });
  $("#goods_class").mouseout( function() {
    $( '#drop_box' ).attr( 'style', 'display: none;' );
    $( '#goods_class_i' ).removeClass( "up" );
  });
});
</script>
<div class="nav_bar fix_nav_bar">
    <div class="wrap_full_w clearfix">
        <div id="goods_class" class="drop_nav">
        <span class="drop_title">商品分类<i id="goods_class_i" class="nav_ico"></i></span>
        <div id="drop_box" class="drop_box" style="display: none;">
        <div class="cate_tree">
        <ul>
            <li><a href="<?php echo WEB_PATH; ?>/cgoods_list/">全部商品</a></li>
            <?php if(is_array(GetCate('0',12,0))) foreach(GetCate('0',12,0) AS $two_cate): ?>
            <li>
            <a href="<?php echo WEB_PATH; ?>/cgoods_list/<?php echo $two_cate['cateid']; ?>_0_0" target="_blank"> <?php echo $two_cate['name']; ?> </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </div>
<div class="nav_ico nav-bolan"></div></div>
</div><!--下拉菜单-->
    <div class="main_nav">
        <ul>
            <?php if(is_array(Getheader('index','classstyle'))) foreach(Getheader('index','classstyle') AS $k => $indexnav): ?>
            <li class="m-menu-list-item">
            <?php if ( $k > 0 ) { ?>
                <var>|</var>
            <?php } ?>
                <a class="m-menu-list-item-link" href="<?php echo $indexnav['url']; ?>" target="<?php echo $indexnav['url_target']; ?>"> <?php echo $indexnav['name']; ?> </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    </div>
</div>

<div class="clear"></div>
<!--<input id="Button1" type="button" nctype="tanchu" value="点击弹出层" style="display:none;" onclick="ShowDiv('MyDiv','fade')" />-->
<!--弹出层时背景层DIV-->
<div id="fade" class="black_overlay"></div>
<div id="MyDiv" class="white_content">
<div style="text-align: right; cursor: pointer; height: 40px;">
<!--<span style="font-size: 16px;marign-top:20px;" onclick="CloseDiv('MyDiv','fade')"><font color="white">关闭</font></span>-->
</div>
</div>
<style>
.black_overlay{
display: none;
position: absolute;
top: 0%;
left: 0%;
width: 100%;
height: 100%;
background-color: black;
z-index:1003;
-moz-opacity: 0.8;
opacity:.80;
filter: alpha(opacity=80);
}
.white_content {
display: none;
position: absolute;
top: 3%;
left: 480px;
width: 610px;
height: 98%;
border: 8px solid gray;
background-color: #333;
z-index:2000;
overflow: auto;
}

</style>
<script>
//弹出隐藏层
function ShowDiv(show_div,bg_div){
  document.getElementById(show_div).style.display='block';
  document.getElementById(bg_div).style.display='block' ;
  var bgdiv = document.getElementById(bg_div);
  bgdiv.style.width = document.body.scrollWidth;
  // bgdiv.style.height = $(document).height();
  $("#"+bg_div).height($(document).height());
};
//关闭弹出层
function CloseDiv(show_div,bg_div)
{
  document.getElementById(show_div).style.display='none';
  document.getElementById(bg_div).style.display='none';
};
$(function(){
  if ( $.browser.msie && $.browser.version <= 7 ){
    ShowDiv('MyDiv','fade');
    //$('input[id="Button1"]').trigger('click');
  }
}); 
</script>
<style>
.fixedNav{
    position:fixed;
    top:0px;
    left:0px;
    width:100%;
    z-index:100000;
    _position:absolute;
    _top:expression(eval(document.documentElement.scrollTop));
}
</style>
<!--导航 header_nav 结束-->
<script>

$(function(){
  $(window).scroll(function() { 
    <?php if(!isset($isindex) || $isindex!='Y'): ?>   
        if($(window).scrollTop()>=130&&$(window).scrollTop()<=560){
            $(".head_nav").addClass("fixedNav");    
            $("#m_all_sort").fadeOut();
        }else if($(window).scrollTop()>560){
            $(".head_nav").addClass("fixedNav");
            $("#m_all_sort").fadeOut();
    } else if($(window).scrollTop()<130){
            $(".head_nav").removeClass("fixedNav");
    }
    <?php  else: ?> 
        if($(window).scrollTop()>=520){
            $(".head_nav").addClass("fixedNav");
            $("#m_all_sort").hide();
         $(".m_menu_all").mouseenter(function(){
                $(".m_all_sort").show();
         })
         $(".m_menu_all").mouseleave(function(){
                $(".m_all_sort").hide();
         })
         $(".m_all_sort").mouseenter(function(){
                $(this).show();
         })
         $(".m_all_sort").mouseleave(function(){
                $(this).hide();
         })
        }   else if($(window).scrollTop()<520){
            $(".head_nav").removeClass("fixedNav");
            $("#m_all_sort").show();
              $(".m_menu_all").mouseenter(function(){
                $("#m_all_sort").show();
              })
            $(".m_menu_all").mouseleave(function(){
                $("#m_all_sort").show();
              })
            $(".m_all_sort").mouseenter(function(){
                $(this).show();
         })
            $(".m_all_sort").mouseleave(function(){
                $(this).show();
         })
        }   
    <?php endif; ?>
  });
});

    $(document).ready(function(){
        $.get("<?php echo WEB_PATH; ?>/member/cart/getnumber/"+new Date().getTime(),function(data){
            $("#sCartTotal").text(data);
        });
    });

document.onkeydown=function(event)
{ 
    e = event ? event :(window.event ? window.event : null);
    ss= document.getElementById('txtSearch').value;
    if(e.keyCode==13 && ss!=""){
     window.location.href="<?php echo WEB_PATH; ?>/soso="+$("#txtSearch").val();
    }
}

$(function(){
$("#butSearch").click(function() {
    if ( $("#txtSearch").val() ) 
    {
        window.location.href = "<?php echo WEB_PATH; ?>/soso="+$("#txtSearch").val();
    }
});
});

    $(".yu_ff").mouseover(function(){
      $(".h_1yyg_eject").show();
    })
    $(".yu_ff").mouseout(function(){
      $(".h_1yyg_eject").hide();
    })

    <?php if(!isset($isindex) || $isindex!='Y'): ?>
         $("#m_all_sort").hide();
         $(".m_menu_all").mouseenter(function(){
                $(".m_all_sort").show();
         })
         $(".m_menu_all").mouseleave(function(){
                $(".m_all_sort").hide();
         })
         $(".m_all_sort").mouseenter(function(){
                $(this).show();
         })
         $(".m_all_sort").mouseleave(function(){
                $(this).hide();
         })
    <?php endif; ?>
    
    //收藏
    function AddFavorite(sURL, sTitle){
        try
        {
            window.external.addFavorite(sURL, sTitle);
        }
        catch (e)
        {
            try
            {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e)
            {
                alert("您可以通过快捷键Ctrl+D进行添加");
            }
        }
    }
    
    $(".mobile").mouseover(function(){
        $(".h_mobile").show();
        $(".h_mobile  s").css("background","../images/headbg11.png").css("background-position","5px -64px");
    })
    $(".h_mobile").mouseout(function(){
        $(".h_mobile").hide();
    })
</script>
