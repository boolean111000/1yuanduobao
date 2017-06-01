<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("login"); ?>
<?php echo js("jquery.Validform.min"); ?>
<?php echo js("jquery.pageDialog"); ?>
<?php include self::includes("index.header_top"); ?>
<section>
    <form action="<?php echo WEB_PATH; ?>/member/user/UserLogin" method="post" id="registerform">
    <div class="registerCon">
        <ul>
            <li class="accAndPwd">
                <dl><input id="txtAccount" name="user" type="text" datatype="m | e" nullmsg="请填写帐号！" errormsg="手机号/邮箱！"  placeholder="请输入您的手机号码|邮箱" class="lEmail">
                <s class="rs4"></s></dl>
                <dl>
                    <input type="password" name="pass" id="txtPassword"  datatype="*6-20" nullmsg="请设置密码！" errormsg="密码范围在6~20位之间！" class="lPwd" placeholder="密码">
                    <s class="rs3"></s>
                </dl>
                <dl>
                    <input type="text" class="lVerify" datatype="*4-6" name="captcha" nullmsg="请输入验证码！" placeholder="验证码"><span class="fog"><img id="checkcode" src="<?php echo G_WEB_PATH; ?>/?plugin=true&api=Captcha"/></span>
                    <s class="rs3"></s>
                </dl>
            </li>
            <li><a id="btnLogin" class="nextBtn orgBtn">登 录</a>
            <input name="hidLoginForward" type="hidden" id="hidLoginForward" value="http://m.yungoucms.cn/mobile/home" /></li>
            <li class="rSelect"><a href="<?php echo WEB_PATH; ?>/member/finduser/findpassword">忘记密码？</a> 
            <b></b><a href="<?php echo WEB_PATH; ?>/register">新用户注册</a></li>
        </ul>
    </div>
    </form>
</section>
<!-- footer 开始-->
<script language="javascript">
    if(!$.PageDialog){
        window.document.write("<scr"+"ipt  type='text/javascript' src='<?php echo G_TEMPLATES_JS; ?>/jquery.pageDialog.js'></sc"+"ript>");
    }
    if(!$.YunCmsApi){
        window.document.write("<scr"+"ipt  type='text/javascript'  src='<?php echo G_TEMPLATES_JS; ?>/jquery.cmsapi.js'></sc"+"ript>");
    }
</script>

<!-- footer 开始-->
<footer class="footer">
    <?php if($user=login('bool')): ?>
    <div class="u-ft-nav"><!-- 登录后 -->
        <span><a href="<?php echo WEB_PATH; ?>">首页</a><b></b></span>
        <!-- <span><a href="<?php echo WEB_PATH; ?>/article-1.html">新手指南</a><b></b></span> -->
        <span><a href="<?php echo WEB_PATH; ?>/member/home/userindex" class="Member"><?php echo Getusername($user['uid']); ?></a>
        <a href="<?php echo WEB_PATH; ?>/member/user/logout" onclick="$.YunCmsApi.ToAjax(this)"  class="Exit">退出</a><b></b></span>
    </div>
    <?php  else: ?>
    <div class="u-ft-nav" ><!-- 登录前 -->
        <span><a href="<?php echo WEB_PATH; ?>">首页</a><b></b></span>
        <!-- <span><a href="<?php echo WEB_PATH; ?>/article-1.html">新手指南</a><b></b></span> -->
        <span><a href="<?php echo WEB_PATH; ?>/login&time=<?php echo time(); ?>">登录</a><b></b></span>
        <span><a href="<?php echo WEB_PATH; ?>/register">注册</a></span>
    </div>
    <?php endif; ?>
        <!--p class="m-ftA">
        <a href="">触屏版</a>
        <a href="" >电脑版</a>
        <a href="">下载客户端</a>
    </p-->
    <!--p class="grayc">客服热线<span class="orange"><?php echo _cfg("cell"); ?></span></p-->
    <a class="z-top" style="display:none;"><b class="z-arrow"></b></a>
     <div ><!-- 登录前 -->
        <span style="color:#999; text-align:center; height:25px; line-height:25px;">copyright  @2016-2017</span><br />
        <span style="color:#999; text-align:center;">深圳市三人行广告传媒有限公司</span>
       
    </div>
</footer>
<!-- footer 结束-->

<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/TouchSlide.1.1.js"></script>
<script type="text/javascript">
TouchSlide({
    slideCell:"#focus",
    titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
    mainCell:".bd ul",
    effect:"leftLoop",
    autoPlay:true,//自动播放
    autoPage:true //自动分页
});
</script>
</body>
</html>

<script type="text/javascript">

$("#btnLogin").click(function(){
    $("#registerform").submit();    
});
$("#registerform").Validform({
    tiptype:function(msg,o,cssctl){
        //msg：提示信息;
        //o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
        //cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
        
        if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;       
            $.PageDialog.ok(msg);
        }
    },
    callback:function(data){
        if(data.status == -1){
            $.PageDialog.ok(data.msg);
        }else{
            window.location.href='<?php echo WEB_PATH; ?>/member/home/userindex';
        }
    },
    ajaxPost:true
});

$(document).ready(function(){
    $("#checkcode").attr("data",$("#checkcode").attr("src"));
    $("#checkcode").click(function(){
        $(this).attr("src",$(this).attr("data")+"&="+new Date().getTime());
    });
    $("#btnLogin").click(function(){
        console.log("fefe");
        $("#registerform").submit();
    });
});
</script>