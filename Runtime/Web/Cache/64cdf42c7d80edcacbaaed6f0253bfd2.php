<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>产品-蜜蜂科技</title>
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
<div id="slideBox" class="slideBox">
    <div class="bd">
        <ul>
            <li>
                <div style="height: 875px;background-image: url('__ROOT__/Public/Web/Product/img/代言人.jpg')">
                    <p style="position: relative;left: 36%;top: 21.7%;font-family: 'PingFang Regular';color: #FFFFFF;font-size: 4em">iOS、Android、Windows</p>
                    <p style="position: relative;left: 46%;top: 23.4%;font-family: 'PingFang Regular';color: #FFFFFF;font-size: 4em">无一不适应</p>
                </div>
            </li>
            <li>
                <div style="height: 875px;background-image: url('__ROOT__/Public/Web/Product/img/产品_02_02.png')">
                    <div style="position: absolute;text-align: center;margin-left: 12.5%;margin-top: 1%;font-family: FZLTHK--GBK1-0;">
                        <span style="font-size: 55px;">满载众多贴心服务</span>
                        <p style="font-size: 55px;;margin-top: -20px">处处只为有效提升您的业绩</p>
                        <p style="font-size: 20px">无论您是企业用户还是零售用户，蜜蜂商务团队的技术团队都理应与您协作，您可以随时<br>
                            通过多种方式约见他们，请他们帮助您解决关于蜜蜂产品的营销的一切问题</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <span class="prev hidden-xs hidden-sm"></span>
    <span class="next hidden-xs hidden-sm"></span>
    <ul class="hd">
        <li></li>
        <li></li>
    </ul>
</div>
<div class="index_section sec03">
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
                    <div class="font_CP">
                        <p><img style="width: 200px" src="__ROOT__/Public/Web/Product/img/产品_03_03.png"></p>
                        <span style="color:#2D2A2A;margin-top: 0px">石材行业移动营销解决方案</span>
                        <p style="color:#2D2A2A;margin-top: 50px">
                            “石全石美”是一款石材产品应用设计、虚拟体验及移动营销的工具软件。<br>
                            软件是经过对消费者行为深入洞察、对石材企业销售全过程深入研究后，集成先进的VR<br>
                            技术研发而成。软件解决了石材企业产品展示困难、顾客体验弱、售前沟通互动少、销<br>
                            售无跟踪、销售人员行销不便、购买决策慢、成交效率低、销售成本高等痛点；软件内<br>
                            置全景式体验场景、丰富的石材产品素材，顾客可通过软件自由设计、沉浸式地体验未<br>
                            来之家，并快速做出石材选购的决定。<br>
                        </p>
                        <p style="margin-top: 40px;"><a href="__APP__/online/sqsminfo" style="color: rgb(0, 202, 200)">进一步了解 ></a><small style="margin-left: 30px;"><a href="javascript:void(0);" style="color:rgb(0, 202, 200)">购买 ></a></small></p>
                    </div>
                    <p style="margin-top: 30px">
                        <a style="float: left" href="https://itunes.apple.com/us/app/shi-quan-shi-mei-zhuan-zhu/id1129689772?l=zh&ls=1&mt=8" target="_blank">
                            <div class="effect-milo">
                                <img src="__ROOT__/Public/Web/Product/img/产品_03.png" alt="img11"/>
                            </div>
                        </a>

                        <a style="float: left;margin-left: 98px"  href="__ROOT__/Public/Download/SQSM/SQSM.apk">
                            <div class="effect-milo">
                                <img src="__ROOT__/Public/Web/Product/img/产品_05.png" alt="img11"/>
                            </div>
                        </a>
                        <a style="float: left;margin-left: 98px" href="__ROOT__/Public/Download/SQSM/SQSM.exe">
                            <div class="effect-milo">
                                <img src="__ROOT__/Public/Web/Product/img/产品_07.png" alt="img11"/>
                            </div>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="index_section sec04">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-5">
                <div class="block_font block_top">
                    <div class="font_CP">
                        <p style="font-size: 3em;;font-family: 'PingFang Regular'">蜜蜂软件</p>
                        <span>妙，在于它能帮你做到你想要的一切</span>
                        <p>
                            蜜蜂软件是中国泛家居行业移动营销软件的首倡者与首创者，它以革新世界<br>
                            的VR技术为核心。结合VR眼镜等体感设备。让消费者在虚拟空间中沉浸式<br>
                            的体验到未来之家蜜蜂软件应用于“陶瓷”、“木地板”、“木门”、“壁纸”、“灯<br>
                            等领域，帮助终端企业有效的解决了 产品场景在展示困难 、产品移动营销<br>
                            具”不便 、消费无体验 、销售沟通互动少、销售跟踪服务无渠道 、销售成 <br>
                            本高等传统痛点
                        </p>
                        <p style="margin-top: 40px;">
                            <a href="__APP__/online/mfrjinfo" style="color: rgb(0, 202, 200)">进一步了解 ></a>
                            <small style="margin-left: 30px;font-size: 15px">
                                <a href="javascript:void(0);" style="color:rgb(0, 202, 200)">购买 ></a>
                            </small>
                        </p>
                    </div>
                    <p style="margin-top: 50px">
                        <a style="float: left" href="https://itunes.apple.com/us/app/mi-feng-ruan-jian-zhuan-zhu/id1115538210?mt=8" target="_blank">
                            <div class="effect-milo">
                                <img src="__ROOT__/Public/Web/Product/img/产品_03.png" alt="img11"/>
                            </div>
                        </a>

                        <a style="float: left;margin-left: 98px"  href="__ROOT__/Public/Download/MFRJ/MFRJ.apk">
                            <div class="effect-milo">
                                <img src="__ROOT__/Public/Web/Product/img/产品_05.png" alt="img11"/>
                            </div>
                        </a>
                        <a style="float: left;margin-left: 98px" href="__ROOT__/Public/Download/MFRJ/MFRJ.exe">
                            <div class="effect-milo">
                                <img src="__ROOT__/Public/Web/Product/img/产品_07.png" alt="img11"/>
                            </div>
                        </a>
                    </p>
                    <div class="clear"></div>
                    <div class="about_left">
                        <span>
                            <img src="__ROOT__/Public/Web/Product/img/陶瓷.png">
                            <p>陶瓷</p>
                        </span>
                        <span class="VR_left">
                            <img src="__ROOT__/Public/Web/Product/img/木地板.png">
                            <p>木地板</p>
                        </span>
                        <span class="VR_left">
                            <img src="__ROOT__/Public/Web/Product/img/木门.png">
                            <p>木门</p>
                        </span>
                        <span class="VR_left">
                            <img src="__ROOT__/Public/Web/Product/img/家具.png">
                            <p>家具</p>
                        </span>
                        <span class="VR_left">
                            <img src="__ROOT__/Public/Web/Product/img/卫浴.png">
                            <p>卫浴</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="index_section sec05">
    <div class="container-fluid">
       <div class="c_zz">
           <p>增值服务</p>
            <span style="text-indent: 2em;font-family: 'PingFang Regular'">
               在软件升级服务之外，我们更贴心的为您提供了诸多增值服务，“户型定制”“全景场景定制”“短信分享服务”。拥有这些服务，您即可通过有趣、实用且令人惊喜的的方式吸引到您的顾客。<br>
您也将即刻拥有新时代全新的、有效的营销方式
           </span>
           <a href="__APP__/online/service">查看增值服务详情></a>
       </div>

    </div>
</div>
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
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/jquery-1.11.3.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/main.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/TouchSlide.1.1.js" ></script>
<script>
    TouchSlide({
        slideCell:"#slideBox",
        titCell:".hd li",
        mainCell:".bd ul",
        effect:"leftLoop",
        autoPlay:true
    });
</script>
</body>
<script src="__ROOT__/Public/Web/contact%20us/js/bootstrap.min.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/hallooou.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/jquery.smoove.js"></script>
<script>$('.block').smoove({offset:'40%'});</script>
</html>