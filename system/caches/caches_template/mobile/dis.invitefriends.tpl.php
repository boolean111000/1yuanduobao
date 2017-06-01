<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.cmsapi"); ?>
<?php echo js("template"); ?>
<?php echo js("template.fun"); ?>
<?php echo js("jquery.pageDialog"); ?>

<?php include self::includes("index.header_top"); ?>
<script type="text/javascript">
    $.YunCmsApi.SetTopStyle({
        "Title":    "邀请好友",
        "Member":   true,
        "Home":     true
    });
</script>

<style type="text/css">
    .m-member-nav{ text-align: center;color:#999; }
    .ress_btn{          
        line-height: 35px;       
        text-align: center;
        color: #fff;
        border: 1px solid #FE6D0B;
        display: inline-block;
        border-radius: 3px;
        box-shadow: 0 1px 2px #E7E7E7;
        background: #f60;
        width:100%;
        font-size: 1.5em;
    }   
    .ress_btn:hover{
        color: #fff;
    }
    #ress_list li{position: relative;text-align:left;}
    #ress_list span{display: inline-block;text-indent: 10px;width: 70%}
    #ress_list li i{ 
        position: absolute;
        display: inline-block;
        right: 10px;
        top:8px;
        color: #fff;
        border-radius: 3px; 
        background: #ccc;
        cursor: pointer;
        text-align: center;
        line-height: 30px;
        padding: 0px 5px;
    }
    #ress_list li i.hover{
        background: #f60;color: #fff;
    }
    #select{
        text-align: left;text-indent: 10px;
    }
    #select select{
        padding-right: 10px;
    }
    #select input,select{border-radius: 3px; padding-right: 10px;border: 1px solid #bbb;    border-radius: 3px; padding: 5px 8px;}
    .ress_new_box_btn a{ width: 48%; margin-left: 1%;}
    .ress_new_box_btn a:nth-child(1){
        background: #ccc; border: 1px solid #aaa;
    }
    .invite{
        display: inline;
        line-height: 27px;
        height: auto;
        word-break: break-all;
        word-wrap: break-word;
        margin-left: 10px;
        margin-right: 10px; 
    }
</style>

<section class="clearfix g-member">
    <div class="m-round m-member-nav">
        <ul>    
            <li>邀请好友加入分销</li>
            <li> <?php echo $url; ?> </li>
            <img src="http://qr.topscan.com/api.php?text=<?php echo $url; ?>" />
        </ul>
    </div>
</section>

<?php include self::includes("index.footer"); ?>