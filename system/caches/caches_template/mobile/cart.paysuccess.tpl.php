<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.GoodsPicSlider"); ?>
<?php echo js("jquery.cmsapi"); ?>
<?php include self::includes("index.header_top"); ?>
<script>
$('.z-HReturn').click(function(){
    history.go(-2);
});
</script>
<script type="text/javascript">
    $(function(){
        $("#sliderBox").picslider()
    });
    $.YunCmsApi.SetTopStyle({
        "Title":"购买结果",
        "Home":true,
        "Member":false,
        "Shop":true
    }); 
</script>
        <input name="hidShopID" type="hidden" id="hidShopID" value="131118151938166319">
        <section id="shopResultBox" class="clearfix g-pay-success">
        <div class="g-pay-auto">
        <div class="z-pay-tips"><s></s><b><em class="gray6">恭喜您,支付成功，请等待系统为您揭晓！</em></b></div>
        </div>
        <div class="u-Btn"><div class="u-Btn-li"><a href="<?php echo WEB_PATH; ?>/member/shop/userbuylist" class="z-CloseBtn">查看购买记录</a></div>
        <div class="u-Btn-li"><a href="<?php echo WEB_PATH; ?>" class="z-DefineBtn">继续购物</a></div></div>      
        </section>
    </div>
<?php include self::includes("index.footer"); ?>

