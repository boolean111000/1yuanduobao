<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("user.message"); ?>
<?php include self::includes("index.header"); ?>
<div class="clear"></div>
<!--商品 wrap 开始-->
<div class="layout980 clearfix">
    <?php include self::includes("user.left"); ?>
<div class="R-content">

<div class="prompt orange">分销信息查看<s></s></div>
<div class="last">
    <ul>
        <li>
        <h3>您的分销佣金余额为：</h3>
        <b class="c_red"> <?php echo $info['dis_money']; ?> </b>元
        <a href="<?php echo WEB_PATH; ?>/member/distributor/withdrawals_apply" class="bluebut" title="申请提现">申请提现</a>
        </li>
        <li>
        <h3>您的下级总人数：</h3>
        <b class="c_red"> <?php echo $num; ?> </b>人
        <a href="<?php echo WEB_PATH; ?>/member/distributor/my_child" class="bluebut" title="查看下级">查看下级</a>
        </li>
    </ul>
</div>
</div>
</div>
<!--商品 wrap 结束-->
<div class="clear"></div>
<script type="text/javascript">
showLen(document.getElementById("qianming"));
function showLen(obj){
    if(140-obj.value.length<0){
        return; 
    }else{
        document.getElementById('shuru').innerHTML = '还能输入'+ (100-obj.value.length) +'个字符';
    }
}
</script>
<script>
    $("#nicxx").blur(function(){
        var ss= $("#nicxx").val();
        if(!ss.match(/([\u4e00-\u9fa5]{2,7})|([A-Za-z0-9 ]{2,7})/)){
          $(".Validform_checktip").css("display","block");
          $(".bluebut").attr("alt","cur");
        }else{
          $(".Validform_checktip").css("display","none");
          $(".bluebut").attr("alt","");
        }
    })
    $(".bluebut").click(function(){
        if( $(this).attr("alt")== "cur"){
          return false;
        }
    })
</script>
<?php include self::includes("index.footer"); ?>