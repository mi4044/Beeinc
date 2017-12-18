<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>常见问题-蜜蜂科技</title>
	<link rel="shortcut icon" href="__ROOT__/Public/Web/images/logo.ico" type="image/x-icon" />
    <link type="text/css" href="__ROOT__/Public/Web/contact%20us/css/contact.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/bootstrap.min.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/hallooou.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/color_main.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/contact.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/font/font.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="__ROOT__/Public/Web/contact%20us/css/zzsc-demo.css">
    <link rel="stylesheet" href="__ROOT__/Public/Web/contact%20us/css/tabs-vertical.css">
    <link href="__ROOT__/Public/Web/index/css/animate.css" rel="stylesheet">
</head>
<style>
    body{font-family: "PingFang Regular"}
    #scroll-1 {
        height:800px;
        overflow:auto;
        position: fixed;
    }
    #scroll-1 ul {
    }    #scroll-1::-webkit-scrollbar {
             width:10px;
             height:10px;
         }
</style>
<body>
<nav class="navbar navbar-custom navbar-fixed-top " style="border-width: 0 0 30px;position:fixed" role="navigation" id="nav">
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
    <div class="overlay" id="overlay" >
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

<div class="zzsc-container">
    <div class="tabs-vertical">

        <div style="position: fixed;width: 500px;height: 100px;background-color:#FFFFFF;z-index: 100">
            <ol style="position: absolute;margin-left: 159px" class="breadcrumb">
                <li><a href="__APP__/Help/index">客户帮助</a></li>
                <li class="active">常见问题</li>
            </ol>
            <div class="help_1">
                <span class="divcss5-x5">Software specifications </span>
            </div>
        </div>
        <div id='scroll-1'>    
            <ul class="left-class">
                <?php if(is_array($cate)): $k = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li>
					<?php if($k-1 == '0' ): ?><a class="tab-active" data-index="<?php echo ($k-1); ?>" href="#">— <?php echo ($vo['title']); ?></a>
					<?php else: ?>
					<a data-index="<?php echo ($k-1); ?>" href="#">— <?php echo ($vo['title']); ?></a><?php endif; ?>
				</li><?php endforeach; endif; else: echo "" ;endif; ?> 

            </ul>
        </div>
        <div class="tabs-content-placeholder">

            <?php if(is_array($problem)): $k = 0; $__LIST__ = $problem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; if($k-1 == 0 ): ?><div class="tab-content-active">
					<?php echo ($v['content']); ?>
				</div>
				<?php else: ?>
				<div>
					<?php echo ($v['content']); ?>
				</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>

    </div>
</div>

<script src="__ROOT__/Public/Web/contact%20us/js/jquery.min.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/bootstrap.min.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/tab/hallooou.js"></script>
<script>
    $(document).ready(function() {
        var widget = $('.tabs-vertical');
        var tabs = widget.find('ul a'),
                content = widget.find('.tabs-content-placeholder > div');
        tabs.on('click', function (e) {
            e.preventDefault();
           // Get the data-index attribute, and show the matching content div
            index = $(this).data('index');

            tabs.removeClass('tab-active');
            content.removeClass('tab-content-active');

            $(this).addClass('tab-active');
            content.eq(index).addClass('tab-content-active');
        });

    });
    var index;
    var index2=0;
    $(document).on('click','ul li a',function(){
        if(index2!=$(this).attr("data-index")){
            var _scrollTop = $('#nav').offset().top;
            $('html,body').stop().animate({scrollTop:_scrollTop-150},350);
            index2 = $(this).attr("data-index");
        }
    });
</script>
</body>
</html>