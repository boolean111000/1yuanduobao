<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("user.message"); ?>
<?php include self::includes("index.header"); ?>
<div class="clear"></div>
<!--商品 wrap 开始-->
<div class="layout980 clearfix">
<?php include self::includes("user.left"); ?>
<!--个人中心中间 开始-->
<div class="R-content">
    <div class="member-t"><h2>佣金记录</h2></div>
    <div id="divList0" class="list-tab recordList f12">
        <ul class="listTitle">
            <li class="">UID</li>
            <li class="">用户名</li>
            <li class="">变动金额</li>
            <li class="">佣金金额</li>
            <li class="">记录时间</li>
        </ul>
    <?php if ( is_array( $list ) ) foreach ( $list as $v ): ?>
    <ul>
        <li class=""> <?php echo $v['uid']; ?> </li>
        <li class=""> <?php echo $v['username']; ?> </li>
        <li class=""> <?php echo $v['change_money']; ?> </li>
        <li class=""> <?php echo $v['surplus_money']; ?> </li>
        <li class=""> <?php echo date( 'Y-m-d H:i:s', $v['add_time'] ); ?> </li>
    </ul>
    <?php endforeach; ?>
    </div>
    <?php if($total > $num): ?>
        <div class="pagesx"><?php echo $page->show('two'); ?></div> 
    <?php endif; ?> 
</div>  
<!--个人中心中间 结束-->
</div>
<!--商品 wrap 结束-->
<div class="clear"></div>
<?php include self::includes("index.footer"); ?>
