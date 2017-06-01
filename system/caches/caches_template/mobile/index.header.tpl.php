<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
<?php echo seo(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/comm.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/index.css"/>
<?php echo css(); ?>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/jquery.cookie.js"></script>
<script type="text/javascript">
    /* cookie 设置 */
    var cookie_domain = "<?php echo _cfg( 'cookie_domain' ); ?>";
    var cookie_path   = "<?php echo _cfg( 'cookie_path' ); ?>";
    var cookie_pre    = "<?php echo _cfg( 'cookie_pre' ); ?>";
</script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/function.js"></script>
<script>;
 var APP = {
      WEB_PATH : '<?php echo WEB_PATH; ?>',
      G_WEB_PATH : '<?php echo G_WEB_PATH; ?>',
      G_PARAM_URL : '<?php echo G_PARAM_URL; ?>'
    };
</script>
<?php echo js(); ?>
</head>
<body>
<!-- header 开始 -->
<header class="header">
    <?php if($item): ?>
        <div class="head-l">
            <a href="javascript:;" onClick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <div class="head-r">
            <a id="btnCart" href="/mycart/index.do" class="z-shop"></a>
        </div>
    <?php  else: ?>
        <!-- 当前地区名称 -->
        <div id="show_area_name" onClick="province( 0 );" class="fl city-text" style="font-size: 16px;padding-bottom: 3px;"></div>
       <!--  <h1 class="fl"><span></span><a href="<?php echo G_WEB_PATH; ?>"></a></h1> -->
        <!-- <h1 class="fl"> </h1> -->
       
        <div class="fr head-r" style="float: right; position:relative;">
            <a href="<?php echo WEB_PATH; ?>/member/home/userindex&time=<?php echo time(); ?>" class="z-Member"></a>
            <a id="btnCart" href="<?php echo WEB_PATH; ?>/member/cart/cartlist" class="z-shop"><em id="sCartTotal">0</em></a>
        </div>
<!--         <h1 class="fl" style="width:140px;margin-top: 0px;margin-left: 2%;float: right;">
            <form style="width:140px;" action="<?php echo WEB_PATH; ?>/index/cloud_goods/search_goods" method="post">
                <input type="text" name="search_con" id="search_con" value="<?php echo $search_con;?>" style="width:90px;height: 30px" placeholder="请输入搜索内容" />
                <input type="submit" id="search_sub" name="search_sub" style="width:40px;height: 34px;border: 1px solid #ca0626;border-radius: 5px;box-shadow: 1px 1px 1px #ff7088 inset;background-color: #db3752;display: inline-block;color:white;" value="搜索"/>
            </form>
       </h1> -->
    <?php endif; ?>
</header>

<script type="text/javascript">
$(document).ready(function() {
    $.get("<?php echo WEB_PATH; ?>/member/cart/getnumber/"+new Date().getTime(),function(data){
        if ( data && data != 0 )
        {
            $("#sCartTotal").show();
            $("#sCartTotal").text(data);
        }
    });

    /* 优先使用cookie存储的地区 */
    var current_area_id = getCookie( 'area_id' );
    if ( current_area_id != null )
    {
        /* 调用地区名称 */
        var url = 'index/index/get_area_name/' + current_area_id;
        $.ajaxSetup({ async : false });
        $.get( url, '', function( res ) {
            $( '#show_area_name' ).html( res );
        } );
    }
    else
    {
        /* 使用经纬度定位 */
        // if ( window.navigator.geolocation ) {
        //     var options = { 
        //         enableHighAccuracy: true, 
        //     }; 
        //     window.navigator.geolocation.getCurrentPosition( handleSuccess, handleError, options ); 
        // } else { 
        //     alert( '获取地理位置信息失败' );
        // }
        // function handleSuccess( position ) 
        // {
        //     // 获取到当前位置经纬度
        //     var lng = position.coords.longitude; 
        //     var lat = position.coords.latitude;
        //     /* 经纬度 定位地区名称 */
        //     var url = 'index/index/get_geocoder/&location=' + lat + ',' + lng;
        //     $.get( url, '', function( res ) {
        //         if ( res == 'true' )
        //         {
        //             location.reload();
        //         }
        //     } );
        // }
        // function handleError( error ) 
        // {
        //     console.log( error );
        // }
    }
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/area_style.css">
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/mobile_area.js"></script>

<!-- 三级联动选择区  加载前... -->
<div id="areaSelect" class="area areaSelect" style="display: none">
    <h3 id="area_title">正在加载您需要的城市……</h3>
    <ul class="area_list" id="area_list">
        <li id="0">正在加载，点击取消</li>
    </ul>
</div>
<!-- header 结束 -->
