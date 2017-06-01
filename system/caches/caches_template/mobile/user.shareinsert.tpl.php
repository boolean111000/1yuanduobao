<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.cmsapi"); ?>
<?php echo js("jquery.uploadView"); ?>
<?php include self::includes("index.header_top"); ?>
<style type="text/css">
    .m-member-nav{ text-align: center;color:#999; }
    .ress_btn{
        line-height: 35px;
        text-align: center;
        color: #fff;
        border: 1px solid #ca0626;
        display: inline-block;
        border-radius: 3px;
        box-shadow: 0 1px 2px #fff;
        background: #db3752;
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
        background: #db3752;color: #fff;
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
</style>
<span id="dialog_alert"></span>
<section class="clearfix g-member" id="ress_new_box">
<form id="share_form" action="<?php echo WEB_PATH; ?>/member/share/mobile_shareinsert" method="post" enctype="multipart/form-data">   
    <div class="m-round m-member-nav" id="select">
        <li>添加晒单</li>
        <input type="hidden" id="share_id" name="share_id" value="<?php echo $share_id;?>"/>
        <li>标  题：<input type="text" id="title" name="title"></li>
        <li>内  容：<input type="text" id="contents" name="contents"></li>
        <div class="control-group js_uploadBox">
            <div class="btn-upload">
              <input class="js_upFile" type="file" id="cover" name="cover" style="border:0;" />
            </div>  
            <div class="js_showBox "></div>
        </div>
        <div style=" text-align: center;">
         <input type="submit" name="submit" value="确认添加" />
        </div>
    </div>
 </form>   
</section>
<script>
$(".js_upFile").uploadView({
    uploadBox: '.js_uploadBox',//设置上传框容器
    showBox :  '.js_showBox',//设置显示预览图片的容器
    width :    100, //预览图片的宽度，单位px
    height :   100, //预览图片的高度，单位px
    allowType: ["gif", "jpeg", "jpg", "bmp", "png"], //允许上传图片的类型
    maxSize :  3, //允许上传图片的最大尺寸，单位M
    success:function( e ) {
        $(".js_uploadText").text('更改');
        $.PageDialog.ok( '图片上传成功' );
    }
});
</script>
<?php include self::includes("index.footer"); ?>