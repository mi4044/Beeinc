<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>关于我们-蜜蜂科技</title>
	<link rel="shortcut icon" href="__ROOT__/Public/Web/images/logo.ico" type="image/x-icon" />
    <link href="__ROOT__/Public/Web/contact%20us/css/bootstrap.min.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/hallooou.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/color_main.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/contact.css" rel="stylesheet">
    <link rel="stylesheet" href="__ROOT__/Public/Web/contact%20us/css/Define..css" />
    <link href="__ROOT__/Public/Web/index/css/animate.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/font/font.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/layer.css" rel="stylesheet">
    <style>
        .tipinfo font.error{margin-left: 55%;font-family: "PingFang Regular";font-size: 14px;color:#eb0000;display:block;}
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px white inset;
        }
    </style>
    <script>
        function addmes(){
            var name=$('#corpName').val();
            var email=$('#email').val();
            var mobile=$('#sms').val();
            var content=$('#content').val();
            if(name=='')
            {
				layer.msg('请输入姓名！');
            }else{
                $.post('__URL__/leavemessage',{'name':name,'email':email,'mobile':mobile,'content':content},function(data)
                {
                    data=eval("("+data+")");
                    if(data.status==0){
                        var index=layer.open({
                            type: 1,
                            title: "",
                            area: ["300px", "150px"],
                            zIndex: 200,
                            skin: 'layui-layer-rim', //加上边框
                            content: $("#yong_li"),
                            scrollbar: false,
                            btn: ["确定"],
                        })
                       
                    }else if(data.status==2){
                        layer.msg('邮箱不正确，请输入正确的邮箱！');
                    }else if(data.status==3){
                        layer.msg('手机号不正确，请输入正确的11位手机号！');
                    }else if(data.status==4){
                        layer.msg('留言内容不能为空！');
                    }else if(data.status==1){
                        var index=layer.open({
                            type: 1,
                            title: "",
                            area: ["300px", "150px"],
                            zIndex: 200,
                            skin: 'layui-layer-rim', //加上边框
                            content: $("#yong_hu"),
                            scrollbar: false,
                            btn: ["确定"],
                            end: function () {
                                location.reload();
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
    <div class="menu">
        <ul>
            <li id="one1"><a href="index.html" style="color: #34bbc4">关于我们</a></li>
            <li id="one2"><a href="team.html">团队介绍</a></li>
            <li id="one3"><a href="cooperation.html">合作客户</a></li>
        </ul>
    </div>
    <div id="slideBox" class="slideBox">
        <div class="bd">
            <a class="pic"  href="#"><img src="__ROOT__/Public/Web/contact%20us/images/联系_02_02.png" /></a>
        </div>
    </div>
    <div class="menudiv" style="margin-top:-20px">
        <div id="con_one_1">
            <div class="Wikiword_one">
                <div class="col-md-6">
                <div class="left_g">
                    <p style="font-size: 40px;font-family:FZLTHK--GBK1-0">成都</p>
                    <p><span style="font-family:Comic Sans MS;font-size: 23px">Since</span> <span style="font-size: 25px">2011</span></p>
                    <br>
                    <div style="font-family:'PingFang Regular'">
                        <p>四川蜜蜂科技有限公司成立于2011年8月</p>
                        <p>是一家专注于为泛家居行业提供移动营销解决方案的互联网公司,“未来之家，尽在眼前”是蜜蜂的产品概念。</p>
                        <p> 蜜蜂科技首创了用VR技术改进泛家居行业产品展示与营销的模式——“移动营销”</p>
                        <p> 公司拥有强大的自主研发能力与专业的软件应用咨询、服务支持团队<p>
                        <p> 采用全球先进的VR、AR、云计算、大数据等移动互联网技术,架构智慧非凡的“泛家居行业移动营销解决方案”<p>
                        <p> 助力泛家居企业在移动互联网时代轻松、安全实现营销的“互联网+”变革<p>
                    </div>
                    <p><a style="color: #34bbc4" href="http://baike.baidu.com/link?url=V2GsK4suDO_CBe5BJqcKNJVPyy5kzJiHxzleBLGgr9wYfZQA1P-xdlioo_bhW49UgCNvrJZZ8I0BcSR6jLoyE_" target="view_window">查看详情》</a></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div style="margin-top: 10%;margin-left: 20%;">
            <div class="left_loge">
                <img style="width: 100px;height: 90px;" src="__ROOT__/Public/Web/contact%20us/images/蜜蜂软件二维码.png" alt=""/>
                <p>关注蜜蜂软件</p>
            </div>

            <div class="left_loge">
                <img style="width: 100px;height: 90px;" src="__ROOT__/Public/Web/contact%20us/images/天材资讯二维码.png" alt=""/>
                <p>关注天材资讯</p>
            </div>
            <div class="left_loge">
                <img style="width: 100px;height: 90px;" src="__ROOT__/Public/Web/contact%20us/images/qq二维码.png" alt=""/>
                <p>添加服务QQ号</p>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-sm-7 col-xs-7">
        <div class="lx_left">
            <div class="font_L">
                <span>我们的地址</span>
                <p>四川省 .成都.高新区福年广场.T1-1808#</p>
            </div>
            <div class="font_L" style="margin-top: 15%">
                <p style="font-size: 20px">联络方式</p>
                <div style="float: left">
                    <p>电话：+028-83530603  </p>
                </div>
                <div style="text-align: center">
                    <p>QQ：595656119</p>
                </div>
            </div>
            <div class="font_L" >
                <p style="font-size: 20px">联络邮件</p>
                <div style="float: left">
                    <p>595656119@qq.com</p>
                    <p>招聘</p>
                </div>
                <div style="text-align: center">
                    <p>595656119@qq.com</p>
                    <p>合作</p>
                </div>
            </div>
        </div>
        <div class="lx_left">
            <div class="font_L">
                <span >Our Address</span>
                <p>High-tech Zone Chengdu In Sichuan Provinces</p>
                <p>Fu Nian Square T1-1808#</p>
            </div>
            <div class="font_L" style="margin-top: 15%">
                <p style="font-size: 20px">Contact Information </p>
                <div style="float: left;">
                    <p>TEL：+028-83530603  </p>
                </div>
                <div style="text-align: center">
                    <p>QQ：595656119</p>
                </div>
            </div>
            <div class="font_L">
                <p style="font-size: 20px">Contact Email</p>
                <div style="float: left">
                    <p>595656119@qq.com</p>
                    <p>Recruitment </p>
                </div>
                <div style="text-align: center">
                    <p>595656119@qq.com</p>
                    <p>Cooperation</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
    </div>
    <div class="col-md-6 contact_1">
        <div style="margin-top: 10%">
            <span>给我们留言</span>
            <form id="thisForm" class="messages">
                <div class="messlist">
                    <label>姓 &nbsp;名</label>
                    <div class="kao">
                        <input class="stext" type='text' name="corpName"  placeholder="John doe" id="corpName" value="" />
                        <span class="tipinfo"></span>
                    </div>
                    <div class="clears"></div>
                </div>
                <div class="messlist">
                    <label>邮 &nbsp;件</label>
                    <div class="kao">
                        <input  type='text' name="email" placeholder="E-mail " id="email" value=""/>
                        <span class="tipinfo"></span>
                    </div>
                    <div class="tipinfo"></div>
                    <div class="clears"></div>

                </div>
                <div class="messlist">
                    <label>手 &nbsp;机</label>
                    <div class="kao">
                        <input class="stext" type='text' name="sms"placeholder="Tel" id="sms" value="" />
                        <span class="tipinfo"></span>
                    </div>
                    <div class="clears"></div>
                </div>
                <div class="messlist textareas">
                    <label>内 &nbsp;容</label>
                    <textarea placeholder="Content..."  id="content"></textarea>
                    <div class="clears"></div>
                </div>
                <div class="messsub">
                    <input onclick="addmes()"  type="button"  value="提交" style="color:#fff;" />
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-12" style="height: 30px"></div>
    <div style="display: none;" id="yong_hu">
        <div style="font-family: 'PingFang Regular';font-size: 18px;line-height: 50px;margin-top: 10%;text-align: center">留言成功</div>
    </div>
    <div style="display: none;" id="yong_li">
        <div id="" style="font-family: 'PingFang Regular';font-size: 18px;line-height: 50px;margin-top: 10%;text-align: center">留言失败</div>
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