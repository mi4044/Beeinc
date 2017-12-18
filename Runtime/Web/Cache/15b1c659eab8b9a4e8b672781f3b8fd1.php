<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>服务网点-蜜蜂科技</title>
    <meta name="viewport" content="user-scalable=no,width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="__ROOT__/Public/Web/images/logo.ico" type="image/x-icon" />
    <link href="__ROOT__/Public/Web/contact%20us/css/bootstrap.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/hallooou.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/color_main.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/Define..css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/font/font.css" rel="stylesheet">
    <link rel="stylesheet" href="__ROOT__/Public/Web/contact%20us/css/cp.css" />
    <link href="__ROOT__/Public/Web/index/css/animate.css" rel="stylesheet">
</head>
<body class="bg01" id="home">
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
<div class="sec06">
        <div class="row">
            <div class="col-md-5">
                <img src="__ROOT__/Public/Web/contact%20us/images/未标题-1_01.png">
            </div>
            <div class="col-md-7">
                <div style="color: #000000;font-family: 'PingFang Regular';margin-left: 7%;margin-top: 100px;">
                    <div style="margin-left: 15%">
                        <span style="font-size:50px">我们希望见到你</span>
                        <p style="font-size: 40px">service in your side</p>
                    </div>

                    <p style="font-size: 20px">
                        蜜蜂科技在全国多地设立有专业的销售、服务团队，他们将为您提供软件咨询、应<br>
                        用培训、软件更新、专属定制等多项专业化的服务，保证您的团队工作效率节节攀<br>
                        升。并且我们仍在持续增设更多的服务团队，我们将努力做到在您身边为您提供服务<br>
                    </p>
                </div>
            </div>
        </div>
        <div  style="width: 90%;margin-left: 150px;margin-top: 30px">
            <div class="row">
				
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-md-3"  style=" margin-bottom: 50px; border-left:1px solid #FFFFFF;">
                    <div style="color: #FFFFFF">
                        <span style="font-size: 18px"><?php echo ($vo['name']); ?></span>
                        <p style="margin-top: 25px">联系人： <?php echo ($vo['contacts']); ?> </p>
                        <p>电话：<?php echo ($vo['mobile']); ?></p>
                        <p>地址：<?php echo ($vo['address']); ?></p>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
				
                
            </div>
        </div>
    <div style="height: 60px"></div>
</div>
<div class="index_section sec07">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
        </div>
            <div class="col-md-5">
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-5">
                <div class="block_font block_top">
                    <div class="font_CP"   style="margin-top: 50%">
                            <span style="margin-top: -50px">从了解蜜蜂开始为你服务</span>
                            <p>
                                在初次与你见面时，商务团队将用心的来了解你的企业、产品以及需求，并为你细细<br>
                                讲解蜜蜂软件的领先优势和它能帮到你什么。商务团队不仅能保证你获知蜜蜂软件<br>
                                产品及服务，还能为你量身制定合适你的蜜蜂软件购买方案。
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="index_section sec08">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-5">
                <div class="block_font block_top">
                    <div class="font_CP">
                        <div style="margin-top: 35%">
                            <h3>安排讲座或者培训</h3>
                            <span>入门讲座</span>
                            <p>
                                如果您的团队想要深入了解蜜蜂软件，或者对比同类产品，您可以随时邀约蜜蜂服务团队，为您的团队开展一次讲座，为他们深入解析蜜蜂软件的功能及优势。
                            </p>
                            <span>培训服务</span>
                            <p>
                                如果您已经拥有蜜蜂软件，我们将根据您的需求为您的团队随时提供<br>
                                丰富多彩的培训服务，包括蜜蜂软件操作使用，蜜蜂软件商务应用，<br>
                                经典案例分享等，让您的团队可以通过蜜蜂软件赢得更多。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="index_section sec09">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
            <div class="block_font block_top">
                    <div class="font_CP">
                        <h2>随时随地让你流畅操作</h2>
                        <p>
                            无论何时何地，您都可以通过电话、网络、邮件等多种方式，第一时间让蜜蜂商务团队<br>
                            及技术团队帮您解决问题。如果您喜欢面对面的交流，也可以邀约任何一个区域的蜜蜂<br>
                            商务团队或蜜蜂技术团队。如果您有意向成为蜜蜂软件用户，我们甚至提供蜜蜂软件试<br>
                            用服务，您可以带着包含您企业产品及多项信息的蜜蜂软件试用版出差，或者向您的客<br>
                            户展示。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="index_section sec10">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
            <div class="block_font block_top">
                <div class="font_CP">
                    <h2>软件更新与增值服务</h2>
                    <span>入门讲座</span>
                    <p>
                        如果你的团队想要深入了解Mic，或者对比同类产品，你可以随时邀约Bee商务团<br>队，为你的团队开展一次讲座，为他们深入解析Mic的功能及优势。</p>
                    <span>培训服务</span>
                    <p>
                        如果你已经拥有Mic，我们将根据你的需求为你的团队随时提供丰富多彩的培训服<br>务，
                        包括Mic操作使用，Mic商务应用，经典案例分享等，让你的团队可以通过<br>Mic赢得更多。
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 10px"></div>
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
</body>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/jquery-1.11.3.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/main.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/TouchSlide.1.1.js" ></script>
<script src="__ROOT__/Public/Web/contact%20us/js/bootstrap.min.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/hallooou.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/jquery.smoove.js"></script>
<script>$('.block').smoove({offset:'40%'});</script>
</html>