<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("user.message"); ?>
<?php include self::includes("index.header"); ?>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.js"></script>
<div class="clear"></div>
<!--商品 wrap 开始-->
<div class="layout980 clearfix">
    <?php include self::includes("user.left"); ?>
    <!--个人中心中间 开始-->
    <div class="R-content">
        <div class="member-t"><h2>邀请好友加入分销</h2></div>
        <div id="divInvited" class="success-invitation gray02">
            <p>复制链接邀请好友加入分销，一起赚佣金啦！</p>
            <span><b></b><input id="txtInfo" style="width:818px;height:20px; " disabled="disabled" value="<?php echo $url; ?>" onpaste="return false" type="text"></span>
            <div class="d_clip_copy"></div>
            <div id="d_clip_container" style="position:relative;overflow:hidden">
                <div id="d_clip_button" class="bluebut f12" style="text-align:center;line-height:22px;width:60px;padding:0;">复制</div>
            </div>
            <img src="http://qr.topscan.com/api.php?text=<?php echo $url; ?>">
        </div>
    </div>
    <!--个人中心中间 结束-->
</div>
<!--商品 wrap 结束-->
<script type="text/javascript">
    var clip = null;
    function copy(id){ return document.getElementById(id); }
    function initx()
    {
        clip = new ZeroClipboard.Client();
        clip.setHandCursor(true);
        ZeroClipboard.setMoviePath("<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.swf");
        clip.addEventListener('mouseOver',function (client){
            clip.setText(copy('txtInfo').value );
        });

        clip.addEventListener('complete',function(client,text){
            alert("邀请复制成功");
        });
        clip.glue('d_clip_button','d_clip_container');
    }
    $(function(){
        initx();
    })
</script>
<div class="clear"></div>
<?php include self::includes("index.footer"); ?>