<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>石全石美购买详情-蜜蜂科技</title>
    <meta name="viewport" content="user-scalable=no,width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="__ROOT__/Public/Web/images/logo.ico" type="image/x-icon" />
    <link href="__ROOT__/Public/Web/contact%20us/css/bootstrap.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/hallooou.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/color_main.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/Define..css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/font/font.css" rel="stylesheet">
    <link rel="stylesheet" href="__ROOT__/Public/Web/contact%20us/css/cp.css" />
    <link rel="stylesheet" href="__ROOT__/Public/Web/Product/css/Product3.css" />
    <link href="__ROOT__/Public/Web/index/css/animate.css" rel="stylesheet">
</head>
<body class="bg02" id="home">
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
<div class="container-fluid Product4_title_1">
    <div>
        <p>全新的、专业的</p>
        <span>石全石美</span>
        <p>石材人早该拥有的先进移动营销软件
        出色的石材展示软件搭载先进的VR技术，完美组合，令你的工作方式焕然一新</p>
    </div>
    <dd>
        <p>
            石全石美是一款石材产品应用设计、虚拟体验及移动营销的工具型软件。<br>
            它是蜜蜂科技经过对石材消费者行为深入洞察、对石材销售过程深入研究后，集合先进的VR技术研发而成。<br>
            软件解决了石材企业产品展示困难、顾客体验弱、售前沟通互动少、销售无跟踪、销售人员行销不便、购买决策慢、成交效率低、销售成本高等痛点；<br>
            软件内置全景式体验场景、丰富的石材产品素材，顾客可通过软件自由完成室内外的石材设计、沉浸式地体验未来之家，并快速做出石材选购的决定。
        </p>
    </dd>
</div>
<div class="Product_title_4" style="height: 970px;">
    <div class="row">
        <div class="col-md-6">
            <img style="margin-top: 25%;margin-left: 100px" src="__ROOT__/Public/Web/Product/img/蜜蜂/shiquanshimei.png">
        </div>
        <div class="col-md-6  Product4_conter_1">
            <div>
                <dl>
                    <li>户型以及全景场景</li>
                </dl>
                <span>设计未来空间，早就非同一般的体验</span>
                <p>
                    场景，意在还原用户的未来之家，以满足消费者视觉的享受与需求，各种户<br>
                    型、各种功能空间、各种设计风格、各种产品组合方案，只要是石材的应用<br>
                    范围，应有尽有，足以应付销售中的种种需求。全景视角、VR模式，您瞬间<br>
                    即可让用户在自己家中观赏到石材的美感
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid Product4_title_2">
    <div class="container Product_conter_2">
        <dl>
            <li>齐全的大理石素材</li>
        </dl>
        <p style="font-size: 15px">
            石全石美集成了史上最齐全、最高清的大理石素材，你能用到的，我们都已帮你准备到。产品的基本信息、甚至供应商，我们都已帮你找到，以备你的不时之需
        </p>
        <img style="position: relative;left: 150px" src="__ROOT__/Public/Web/Product/img/蜜蜂/石全石美详情3-1.png">
    </div>
</div>
<div class="container-fluid" style="background-color: #FFFFFF">
    <div class="row">
        <div class="col-md-7">
            <img style="margin-top: 5%;margin-left: 130px" src="__ROOT__/Public/Web/Product/img/蜜蜂/石全石美详情4.png">
        </div>
        <div class="col-md-5">
            <div class="Product4_conter_2" style="margin-left: 10%">
                <dl>
                    <li>VR体验</li>
                </dl>
                <span>虚拟现实，超乎想象的体验方式</span>
                <p>
                    根据您的设计，您完全可以对产品进行深入的加工，在切割窗口中输入尺寸，<br>
                    且自由选择砖缝宽度、颜色，即可快速改变产品的规格及缝隙。不仅如此，您还<br>
                    可以在窗口中随意选择产品的局部纹理，以满足您的设计需求。<br>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid Product4_title_3" >
    <div class="container">
        <dl style="text-align: center">
            <li style="margin-top: 100px;font-size: 45px">产品设计</li>
        </dl>
        <span>一点一扫一拉，设计就是如此简单</span>
        <p style="font-size: 15px">
            为了研发出真正解决产品展示及销售服务的软件，蜜蜂科技首创了用户参与软件研发的模式，迄今已逾1000石材行业用户参与了软件研发与改进。
            所以，石全石美用极简的方式还原了您的产品流程与工作流程，软件即现实
        </p>
    </div>
</div>
<div>
    <div>
        <div class="Product4_conter_3">
            <div>
                <span>1、产品展示及旋转移动</span>
                <p>
                    材质库中收录了最全的石材素材，你可以用任何直<br>
                    观的方式找到它。选中，手指在轻触想要更换的区<br>
                    域，即可发现产品已意想不到的铺贴到了场景中。<br>
                    在任意区域，您可以移动产品的坐标，使她们之间<br>
                    的纹理缝隙完整对齐。同时，您也可以旋转它们，<br>
                    让它们换一个角度去铺贴，或许更好看。
                </p>
            </div>
        </div>
        <div class="Product4_conter_4">
            <img src="__ROOT__/Public/Web/Product/img/蜜蜂/6-1.jpg">
        </div>
    </div>
    <div>
        <div class="Product4_conter_6">
            <img src="__ROOT__/Public/Web/Product/img/蜜蜂/6-2.jpg">
        </div>
        <div class="Product4_conter_5">
            <div>
                <span>2、产品加工</span>
                <p>
                    根据你的设计，你完全可以对现有产品和现场拍摄<br>
                    的产品进行深度的加工，任意尺寸切割产品、加工<br>
                    平缝V缝U型缝、重新设计魔方大理石、研发全新的<br>
                    水刀拼花，不仅如此，十分接地气的背景墙对花功<br>
                    能，让玉石背景墙的设计预览，不在话下。如此强<br>
                    大的功能，想想都令人激动万分。
                </p>
            </div>
        </div>
    </div>
    <div>
        <div class="Product4_conter_3">
            <div>
                <span>3、花片设计与波打线</span>
                <p>
                    花片功能让你的设计思维超越以往，拥有它，<br>
                    你可以在任意区域铺贴多种花色的产品，以达<br>
                    到对比的效果；你也可以通过它自由设计各种<br>
                    款式的波打线、腰线、背景墙
                </p>
            </div>
        </div>
        <div class="Product4_conter_4">
            <img src="__ROOT__/Public/Web/Product/img/蜜蜂/6-3.png">
        </div>
    </div>
    <div>
        <div class="Product4_conter_6">
            <img src="__ROOT__/Public/Web/Product/img/蜜蜂/6-4.jpeg">
        </div>
        <div class="Product4_conter_5">
            <div>
                <span>4、拍摄铺贴</span>
                <p>
                    任何石材，任何环境，你都可以使用拍摄功能，<br>
                    将它拍摄下来，并对它进行编辑，从而还原它<br>
                    的纹理与尺寸。接下来，即可将它铺贴到你指<br>
                    定的区域，查看它的应用效果。同时，你还可<br>
                    以将它保存至材质库，以备后用
                </p>
            </div>
        </div>
    </div>
    <div>
        <div class="Product4_conter_3">
            <div>
                <span>5、光影自适应</span>
                <p>
                    无论高亮洁石材、哑光或者半哑光，程序都能识别<br>
                    你的选择并根据产品自身特性，智能调整场景中的<br>
                    环境属性：镜面反射或者哑面漫反射，使产品表现<br>
                    更直观、真实
                </p>
            </div>
        </div>
        <div class="Product4_conter_4">
            <img src="__ROOT__/Public/Web/Product/img/蜜蜂/6-5.jpeg">
        </div>
    </div>
    <div>
        <div class="Product4_conter_6">
            <img src="__ROOT__/Public/Web/Product/img/蜜蜂/6-6.jpeg">
        </div>
        <div class="Product4_conter_5">
            <div>
                <span>6、统计</span>
                <p>
                    优秀的设计方案，最终都是为了促成销售，<br>
                    那又如何能够离开销售预算书呢。我们并<br>
                    没有给你提供计算器，因为我们拥有更加<br>
                    高智商的功能，不劳您动手，只需一键，<br>
                    即可将场景中所有的石材用量分门别类的<br>
                    给您统计成表格。您要做的，只是填写价<br>
                    格而已
                </p>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="container-fluid Product4_title_4">
    <div>
        <span>分享－为您提供不能没有的一切</span>
        <p>1、分享，提升服务品质，帮您获取顾客信息</p>
        <p>2、水印信息，让顾客保留您的联系方式并记住您</p>
        <p>3、分享回执，销售跟踪，万事尽在掌控之中</p>
        <p>4、远程服务，近在眼前</p>
        <p>5、在线购买，现在购买</p>
        <p>6、分享记录，石材销售的大数据分析，让您对您的客户了如指掌</p>
        <a href="javascript:void(0);">了解短信分享服务更多   ></a>
    </div>
</div>
<div class="container-fluid Product4_title_5">
    <div>
        <span>让您随时保持更新，而且还免费</span>
        <p>
            石全石美软件可以免费更新。有新版本发布时，它会适时提醒您下载最新版本，因此您不会错过任何精彩功能。<br>
            当然，不止这些。我们每个月会定期发布更多的全景场景和大理石材质，让您的软件时刻充满新鲜感。
        </p>
    </div>
</div>
<div class="Product_title_4" style="height: 970px;">
    <div class="row">
        <div class="col-md-6">
            <img style="margin-top: 25%;margin-left: 100px" src="__ROOT__/Public/Web/Product/img/蜜蜂/shiquanshimei.png">
        </div>
        <div class="col-md-6  Product4_conter_1">
            <div>
                <dl>
                    <li>定制服务</li>
                </dl>
                <span>极致营销方式，从本质打动顾客</span>
                <p>
                    石材销售最厉害的方式，其实极为简单，那就是让顾客在自己未来的家里去体验您的<br>
                    产品应用。他的户型，他的结构，他的风格，您的产品；如此，天下再无难做的销售。<br>
                    石全石美先进的VR技术，以及蜜蜂科技的定制服务，正是专属的顶级营销解决方案。<br>
                    而您，只需要为我们提供您顾客的户型图和需求，剩下的，就由我们去搞定，确保帮<br>
                    助您在软件内还原顾客的家
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid Product5_title_5">
    <div>
        <span>天材资讯</span>
        <dd>最好新媒体，先知于天下</dd>
        <p>
            泛家居行业新媒体平台和推广服务运营商，资讯实时更新。<br>
            行业大事、产品趋势、设计潮流不必再等邻居给您八卦，明了的入口、<br>
            智能的推荐，只需刷一刷，绝对不错过任何精彩
        </p>
    </div>
</div>
<div class="container-fluid Product6_title_6">
    <p>注：想更多更直观的了解石全石美，请下载石全石美试用版app,若想将石全石美试用版升级为完整版，请购买石全石美激活码，以激活全数功能</p>
    <a href="javascript:void(0);"><input type="button" value="立即购买" class="disableds"></a>
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
</body>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/jquery-1.11.3.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/main.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/TouchSlide.1.1.js" ></script>
<script src="__ROOT__/Public/Web/contact%20us/js/bootstrap.min.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/hallooou.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/jquery.smoove.js"></script>
<script>
    $('.block').smoove({offset:'40%'});
</script>
</html>