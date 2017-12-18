<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>意见反馈-蜜蜂科技</title>
    <link href="__ROOT__/Public/Web/contact%20us/css/bootstrap.min.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/hallooou.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/color_main.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/feedback.css" rel="stylesheet">
    <link rel="stylesheet" href="__ROOT__/Public/Web/contact%20us/css/Define..css" />
    <link href="__ROOT__/Public/Web/index/css/animate.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/font/font.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/layer.css" rel="stylesheet">
    <script>
        function addfed(){
            var name=$('#corpName').val();
            var email=$('#email').val();
            var mobile=$('#sms').val();
            var content=$('#content').val();
            if(content=='')
            {
				layer.msg('反馈内容不能为空！');
            }else{
                $.post('__URL__/feedback',{'name':name,'email':email,'mobile':mobile,'content':content},function(data)
                {
                    data=eval("("+data+")");
                    if(data.status==0){
                        var index=layer.open({
                            type: 1,
                            title: "",
                            area: ["300px", "150px"],
                            zIndex: 200,
                            shadeClose: true,
                            skin: 'layui-layer-rim', //加上边框
                            content: $("#yong_li"),
                            btn: ["确定"],
                            yes:function(){
                                $(".Land").removeClass('hied_zsm').addClass('show_zsm');
                                layer.close(index);
                            }
                        })
                    }else if(data.status==2){
                        layer.msg('邮箱格式不合法，请输入正确的邮箱地址');
                    }else if(data.status==3){
                        layer.msg('手机格式不合法，请输入正确的手机号码');
                    }else if(data.status==1){
                        var index=layer.open({
                            type: 1,
                            title: "",
                            area: ["300px", "150px"],
                            zIndex: 200,
                            shadeClose: true,
                            skin: 'layui-layer-rim', //加上边框
                            content: $("#yong_hu"),
                            btn: ["确定"],
                            yes:function(){
                                $(".Land").removeClass('hied_zsm').addClass('show_zsm');
                                layer.close(index);
                            }
                        })
                    }
                })
            }
        }
    </script>
</head>

<body>
<div style="width: 100%;height: 120px">
    <nav class="navbar navbar-custom navbar-fixed-top " style="border-width: 0 0 30px" role="navigation">
        <div class="navbar-header pull-left">
            <a class="navbar-brand page-scroll" href="__APP__"><img class="logo_img"  src="__ROOT__/Public/Web/index/images/logo.png"></a>
        </div>
        <ul class="nav navbar-nav font_nav visible-lg">
            <!-- row_nav.html start -->
			<!------ 横向导航栏 ------>
<?php  if(empty($_SESSION["userid"])) { echo '<li><a href="__APP__/public/login" class="button">登录</a></li>'; }else { echo '<li><a href="__APP__/personalcenter/index" class="button">个人中心</a></li>'; } ?>
<li><a href="__APP__/recharge/index" class="button">充值</a></li>
<li><a href="__APP__/about/cooperation" class="button">合作企业</a></li>
<li><a href="__APP__/online/index" class="button">在线购买</a></li>
			<!-- row_nav.html end -->
        </ul>
        <div class="Administrato">
            <p>用户数</p>
            <span id="team"><?php echo $num;?></span>
        </div>
        <div class=" pull-right">
            <div class="button_container toggle">
                <span class="top"></span><span class="middle"></span><span class="bottom"></span>
            </div>
        </div>
        <div class="overlay" id="overlay">
            <nav class="overlay-menu">
                <ul>
                    <!-- column_nav.html start -->
					<!------ 纵向导航栏 ------>
<li><a href="__APP__/index/index">首页</a></li>
<li><a href="__APP__/product/index">产品商城</a></li>
<li><a href="__APP__/zhaoshang/index">招商加盟</a></li>
<li><a href="__APP__/news/index">新闻动态</a></li>
<li><a href="__APP__/about/index">关于我们</a></li>
<li><a href="__APP__/help/index">客户帮助</a></li>
<li><a href="__APP__/servicenet/index">服务网点</a></li>
<li><a href="http://www.tcatc.cn/" target="_blank">天材资讯</a></li>
<li>
	<div class="nav_tu">
		<ul>
			<?php  if(empty($_SESSION["userid"])) { echo '<li><a href="__APP__/public/login" class="button">登录</a></li>'; }else { echo '<li><a href="__APP__/personalcenter/index" class="button">个人中心</a></li>'; } ?>
			<li><a href="__APP__/Recharge/index" class="button">充值</a></li>
			<li><a href="__APP__/about/cooperation" class="button">合作企业</a></li>
			<li><a href="__APP__/online/index" class="button">在线购买</a></li>
		</ul>
	</div>
</li>





					<!-- column_nav.html end -->
                </ul>
            </nav>
        </div>
    </nav>
    <div class="container" style="height: 800px">
        <div class="contact_1 feedback_title">
            <div style="margin-top: 10%">
                <span>意见反馈</span>
                <form id="thisForm" class="messages">
                    <div class="messlist">
                        <label>名字</label>
                        <div class="kao">
                            <input class="stext" type='text' name="corpName"  placeholder="John doe" id="corpName" value="" />
                            <span class="tipinfo"></span>
                        </div>
                        <div class="clears"></div>
                    </div>
                    <div class="messlist">
                        <label>邮件</label>
                        <div class="kao">
                            <input  type='text' name="email" placeholder="E-mail " id="email" value=""/>
                            <span class="tipinfo"></span>
                        </div>
                        <div class="tipinfo"></div>
                        <div class="clears"></div>

                    </div>
                    <div class="messlist">
                        <label>手机</label>
                        <div class="kao">
                            <input class="stext" type='text' name="sms"placeholder="Tel" id="sms" value="" />
                            <span class="tipinfo"></span>
                        </div>
                        <div class="clears"></div>
                    </div>
                    <div class="messlist textareas">
                        <label>反馈内容</label>
                        <textarea placeholder="Content..."  id="content"></textarea>
                        <div class="clears"></div>
                    </div>
                    <div class="messsub">
                        <input onclick="addfed()"  type="button"  value="提交" style="color:#fff;" />
                    </div>
                </form>
            </div>
        </div>
    </div>
<div style="display: none;" id="yong_hu">
    <div style="font-family: 'PingFang Regular';font-size: 18px;line-height: 50px;margin-top: 10%;text-align: center">反馈成功</div>
</div>
<div style="display: none;" id="yong_li">
    <div style="font-family: 'PingFang Regular';font-size: 18px;line-height: 50px;margin-top: 10%;text-align: center">反馈失败</div>
</div>
<div class="clear"></div>
<!-- footer.html start -->
<footer id="footer">
    <div class="container-fluid b-navbox" style="height: 280px">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
                <ul class="fl b-nav">
                    <li>
                        <p><a href="__APP__/product/index">产品商城</a></p>
                        <a href="__APP__/online/sqsminfo">石全石美</a>
                        <a href="__APP__/online/mfrjinfo">蜜蜂软件</a>
                    </li>
                    <li>
                        <p><a href="__APP__/zhaoshang/index">招商加盟</a></p>
                        <a href="__APP__/zhaoshang/index">招商公告</a>
                        <a href="__APP__/zhaoshang/join">申请表</a>
                    </li>
                    <li>
                        <p><a href="__APP__/help/index">客户帮助</a></p>
                        <a href="__APP__/help/videolist">视频教学</a>
                        <a href="__APP__/help/questionlist">常见问题</a>
                        <a href="__APP__/help/feedback">意见反馈</a>
                    </li>
                    <li>
                        <p><a href="__APP__/servicenet/index">服务网点</a></p>
                        <a href="__APP__/servicenet/index">服务网点</a>
                        <a href="__APP__/servicenet/index">经销商查询</a>
                    </li>
                    <li>
                        <p><a href="__APP__/about/index">关于我们</a></p>
                        <a href="__APP__/about/index">企业介绍</a>
                        <a href="__APP__/about/team.html">团队介绍</a>
                        <a href="__APP__/about/cooperation.html">合作客户</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="fr rmw">
                    <div class="cord">
                        <ul>
                            <li><img style="width: 90px;height: 90px;" src="__ROOT__/Public/Web/contact%20us/images/Y_5.png" alt=""/></li>
                            <li>关注天材资讯</li>
                        </ul>

                    </div>
                    <div class="cord">
                        <ul>
                            <li><img style="width: 90px;height: 90px;" src="__ROOT__/Public/Web/contact%20us/images/Y_6.png" alt=""/></li>
                            <li>关注蜜蜂科技</li>
                        </ul>
                        <div style="width: 230px;">
                            <p>成都.高新区福年广场.T1-1808<br>+028-83530603</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy" style="height: 120px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <div class="fl">
                        <hr>
                        Copyringht@ <?php echo date("Y");?> Bee Inc.保留所有权利     蜀ICP备14012254号-1
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer.html end -->
</div>
</body>
<script src="__ROOT__/Public/Web/contact%20us/js/jquery.min.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/bootstrap.min.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/hallooou.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Web/Define/js/main.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Web/Define/js/TouchSlide.1.1.js" ></script>
<script src="__ROOT__/Public/Web/contact%20us/js/layer.js"></script>
</html>