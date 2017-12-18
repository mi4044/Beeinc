<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>新闻-蜜蜂科技</title>
<link rel="shortcut icon" href="__ROOT__/Public/Web/images/logo.ico" type="image/x-icon" />
<link href="__ROOT__/Public/Web/contact%20us/css/bootstrap.min.css" rel="stylesheet">
<link href="__ROOT__/Public/Web/contact%20us/css/hallooou.css" rel="stylesheet">
<link href="__ROOT__/Public/Web/contact%20us/css/color_main.css" rel="stylesheet">
<link href="__ROOT__/Public/Web/contact%20us/css/contact.css" rel="stylesheet">
<link rel="stylesheet" href="__ROOT__/Public/Web/Define/css/Define..css" />
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/contact.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/jquery.row-grid.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/jq_scroll.js"></script>
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Web/contact%20us/css/style.css">
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Web/contact%20us/css/press.css">
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Web/contact%20us/css/font/font.css">
<link href="__ROOT__/Public/Web/index/css/animate.css" rel="stylesheet">
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        function anim(duration){
            $('#mint').animate(
                    {height: 'toggle'},
                    {duration: duration}
            );
        }
        $('#closebtn').click(function() {
            $('#mintbar').slideUp();
            anim(600);
        });

        $('#mint').click(function() {
            anim(600);
            $('#mintbar').slideDown('slow');
        });
    });
</script>
<body>
<nav class="navbar navbar-custom navbar-fixed-top " style="border-width: 0 0 30px" role="navigation">
    <div class="navbar-header pull-left">
        <a class="navbar-brand page-scroll" href="#"><img class="logo_img"  src="__ROOT__/Public/Web/index/images/logo.png"></a>
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
<div class="container-fluid">
    <div class="top_1">
       <ol class="breadcrumb">
			<?php if($news['type'] == 0 ): ?><li><a href="__APP__/News/ournews">新闻动态</a></li>
			<?php elseif($news['type'] == 1): ?>
			<li><a href="__APP__/News/index">新闻动态</a></li><?php endif; ?>
            <li class="active">新闻详情</li>
        </ol>
        <div style="width: 100%;height: 100px">
        <p><?php echo ($news['title']); ?></p>
        <p>Date _<br><?php echo ($news['create_time']); ?></p>
        <a class="jiathis_button_weixin"><img style="float: right;margin-right: 30px;margin-top: -20px" src="__ROOT__/Public/Web/contact%20us/images/Unknown.png"></a>
        </div>
        <hr style="width: 98%;border-bottom:1px solid #000;margin-top: 30px;"  size="1">
    </div>
    <div class="col-md-7">
        <div class="wz" style="margin-left: 125px">
                <div>
                    <?php echo ($news['content']); ?>
                </div>
            <hr style="border-bottom:1px solid #000;margin-top: 30px;"  size="1">
        </div>
    </div>

    <div class="col-md-1"></div>
    <div class="col-md-2">
        <div class="scrollbox">
            <div id="scrollDiv">
                <ul>
					<?php if(is_array($newsmenu)): $i = 0; $__LIST__ = $newsmenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a href="__APP__/news/newsinfo/id/<?php echo ($vo['id']); ?>">
                        <div class="img_1">
                            <p><img src="<?php echo ($vo['cover']); ?>"></p>
                            <h3 style="margin-top: 30px"><?php echo ($vo['title']); ?></h3>
                            <p style="margin-top: 10px"><?php echo ($vo['subtitle']); ?></p>
                        </div>
						</a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="scroltit"><div class="updown" id="but_up">向下</div></div>
        <div style="margin-top: 50px;width: 300px">
            <div style="float: left">
                <img style="width: 90px;height: 90px;" src="__ROOT__/Public/Web/contact%20us/images/new_1.png" alt=""/>
                <p style="text-align: center">关注蜜蜂软件</p>
            </div>
            <div style="float: left;margin-left: 50px">
                <img style="width: 90px;height: 90px;" src="__ROOT__/Public/Web/contact%20us/images/new_2.png" alt=""/>
                <p style="text-align: center">关注天材资讯</p>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<script src="__ROOT__/Public/Web/contact%20us/js/jq_scroll.js" type="text/javascript"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/bootstrap.min.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/hallooou.js"></script>
<script type="text/javascript" >
    var jiathis_config={
        summary:"",
        shortUrl:false,
        hideMore:false
    }
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#scrollDiv").Scroll({line:1,speed:500,timer:3000,up:"but_up",down:"but_down"});
    });
</script>

</body>
</html>