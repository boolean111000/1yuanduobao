<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.cmsapi"); ?>
<?php echo js("jquery.pageDialog"); ?>
<?php include self::includes("index.header_top"); ?>

<script type="text/javascript">
$.YunCmsApi.SetTopStyle({
    "Title":"帐户充值",
    "Home":true,
    "Member":true,
});

$( function() {
    var je = $("#ulOption li a");
    var dx = /\D/;
    $("#pay_Money").val('10');
    je.click( function() {
        je.removeClass("z-sel");
        var radio = je.index(this);
        je.eq(radio).addClass("z-sel");
        $("#Money").text(je.eq(radio).attr("money"));
        $("#pay_Money").val(je.eq(radio).attr("money"));
    });
    $("#input_money").keyup( function() {
        var input_money = $("#input_money").val();
        if ( ! dx.test( input_money ) ) {
            $("#Money").text( input_money );
            $("#pay_Money").val( input_money );
        }
    });
})
</script>

<div class="g-Total gray9">您的当前余额：<span class="orange arial"><?php echo $user_money; ?></span><?php echo L('cgoods.currency'); ?></div>

<section class="clearfix g-member">
    <form id="toPayForm" name="toPayForm" action="<?php echo WEB_PATH; ?>/member/cart/addmoney" method="post">
    <div class="g-Recharge" style="overflow:hidden;">
        <ul id="ulOption">
            <li><a href="javascript:;" class="z-sel" money="10">10元<s></s></a></li>
            <li><a href="javascript:;" money="20">20元<s></s></a></li>
            <li><a href="javascript:;" money="30">30元<s></s></a></li>
            <li><a href="javascript:;" money="100">100元<s></s></a></li>
            <li><a href="javascript:;" money="200">200元<s></s></a></li>
            <li><a><input type="text" id="input_money" class="z-init" placeholder="输入金额" maxlength="8" /><s></s></a></li>
        </ul>
    </div>
    <article class="clearfix mt10 m-round g-pay-ment g-bank-ct">
        <ul id="ulBankList">
            <li class="gray6 paylistli" id="pay_click">
            <s class="z-arrow z-arrow-close"></s>
            选择<em>支付平台</em>充值<em class="orange" id="Money" >10</em>元
            <input name="money" id="pay_Money" type="hidden" value=""></li>
            <?php if($paylist): ?>
            <div id="pay_list" class="payclass" style="display:block;">
            <input type="hidden" value="4" name="account" id="paylist_account">
            <?php if(is_array($paylist)) foreach($paylist AS $pay): ?>
            <li class="gray6" >         
            <i class="z-bank-Round <?php echo $pay['pay_id'] == 4 ? 'z-bank-Roundsel' : ''; ?>" payaccount="<?php echo $pay['pay_id']; ?>"><s></s></i><?php echo $pay['pay_name']; ?>
            </li>
            <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </ul>
        <?php if(findconfig('base','pay_bank_type')): ?>
        <ul id="ulBankList">
        <li class="gray6 paylistli">
        <s class="z-arrow z-arrow-close" id="paybank_click"></s>
        选择<em>银行</em>充值</li>
        <div id="paybank_list" class="payclass" style="display:none;">
        <input name="pay_bank" id="pay_bank"    type="hidden"  value="">
        <input name="account"  id="pay_bankway" type="hidden"  value="" />
        <?php if(findconfig('base','pay_bank_type')=='tenpay'): ?>
            <li class="gray9" payway="tenpay" urm="CMBCHINA-WAP"><i class="z-bank-Round"><s></s></i>招商银行            
            </li>
            <li class="gray9" payway="tenpay" urm="ICBC-WAP"><i class="z-bank-Round"><s></s></i>工商银行</li>
            <li class="gray9" payway="tenpay" urm="CCB-WAP"><i class="z-bank-Round"><s></s></i>建设银行</li>
        <?php endif; ?>
        <?php if(findconfig('base','pay_bank_type')=='yeepay'): ?>
            <li class="gray9" payway="yeepay" urm="CMBCHINA-WAP"><i class="z-bank-Round"><s></s></i>招商银行</li>
            <li class="gray9" payway="yeepay" urm="ICBC-WAP"><i class="z-bank-Round"><s></s></i>工商银行</li>
            <li class="gray9" payway="yeepay" urm="CCB-WAP"><i class="z-bank-Round"><s></s></i>建设银行</li>
        <?php endif; ?>
        <?php if(findconfig('base','pay_bank_type')=='cbpay'): ?>
            <li class="gray9" payway="cbpay" urm="cbpay1025"><i class="z-bank-Round"><s></s></i>招商银行</li>
            <li class="gray9" payway="cbpay" urm="cbpay105"><i class="z-bank-Round"><s></s></i>工商银行</li>
            <li class="gray9" payway="cbpay" urm="cbpay103"><i class="z-bank-Round"><s></s></i>建设银行</li>
        <?php endif; ?>
        </div>
        <?php endif; ?>
        </ul>
    </article>
    <div class="mt10 f-Recharge-btn">
        <input type="submit" style=" background: #db3752;border: 1px solid #db3752;" name="submit"  class="orgBtn" value="确认充值">
    </div>
    </form>
</section>

<script>
$( function() {
    $(".clearfix ul .paylistli").each( function(i) {
        var dlist = $(this);
        dlist.parent(".payclass").hide();   
        dlist.click(function() {
            var fs = dlist.find("s");
            if ( fs.hasClass("z-arrow-close") )
            {
                fs.removeClass("z-arrow-close");        
                fs.addClass("z-arrow-open");
                dlist.siblings(".payclass").show();                 
            }
            else
            {  
                fs.removeClass("z-arrow-open");     
                fs.addClass("z-arrow-close");
                dlist.siblings(".payclass").hide();                         
            }       
        });         
    });
}); 

$(".payclass > li").click( function() {
    $("li.gray9,li.gray6").find("i").removeClass("z-bank-Roundsel");
    $(this).find("i").addClass("z-bank-Roundsel");  
    if ( $(this).find("i").attr("payaccount") )
    {
        $("#paylist_account").val($(this).find("i").attr("payaccount"));    
    }
    if ( $(this).find("i").attr("urm") )
    {
        $("#pay_bankway").val($(this).attr("urm")); 
        $("#pay_bank").val($(this).attr("payway")); 
    }
});
</script>

<?php include self::includes("index.footer"); ?>