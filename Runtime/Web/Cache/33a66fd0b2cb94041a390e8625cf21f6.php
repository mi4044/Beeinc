<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>加盟申请-蜜蜂科技</title>
    <meta name="viewport" content="user-scalable=no,width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="__ROOT__/Public/Web/images/logo.ico" type="image/x-icon" />
    <link href="__ROOT__/Public/Web/contact%20us/css/bootstrap.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/hallooou.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/color_main.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/Define..css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/contact%20us/css/font/font.css" rel="stylesheet">
    <link href="__ROOT__/Public/Web/index/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="__ROOT__/Public/Web/Join/css/Join.css" />
    <link href="__ROOT__/Public/Web/contact%20us/css/layer.css" rel="stylesheet">
</head>
<body id="home" style="background-color: #f5f5f5">
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
<div class="container-fluid" style="width: 84%;margin-top: -20px">
<div id="formbox">
    <form name="reply" id="formpersonal" method="post" action="__URL__/insert">
        <div class="Join_title">蜜蜂科技智能移动营销软件代理申请表</div>
        <div class="Join_one">
            <span>代理信息</span>
        </div>
        <div class="Join_two">
            <div>
                <p>申请代理区域：</p>
                <div class="info">
                    <select id="s_province" name="province"></select>  
                    <select id="s_city" name="city" ></select>  
                    <script class="resources library" src="__ROOT__/Public/Web/Join/js/address.js" type="text/javascript"></script>
                    <script type="text/javascript">_init_area();</script>
                    <div id="show"></div>
                </div>
            </div>
            <span style="float: left;margin-top: 30px;font-size: 18px">申请代理产品：</span>
            <div class="info">
                <div style="float: left;margin-left: 90px;margin-top: 15px">
                    <div style="width: 158px">
                        <input type="checkbox" id="checkbox_a1" name="product[]" value="石全石美" class="chk_1">
                        <label for="checkbox_a1"></label>
                        <span style="float: left;text-indent: 1em">石全石美</span>
                    </div>
                </div>
                <div style="float: left;margin-left: 90px;margin-top: 15px">
                    <div style="width: 158px">
                        <input type="checkbox" id="checkbox_a2" name="product[]" value="蜜蜂软件" class="chk_1">
                        <label for="checkbox_a2"></label>
                        <span style="float: left;text-indent: 1em">蜜蜂软件</span>
                    </div>
                </div>
                <div style="float: left;margin-left: 90px;margin-top: 15px">
                    <div style="width: 158px">
                        <input type="checkbox" id="checkbox_a3" name="product[]" value="蜜蜂软件地板版" class="chk_1">
                        <label for="checkbox_a3"></label>
                        <span style="float: left;text-indent: 1em">蜜蜂软件地板版</span>
                    </div>
                </div>
                <div style="margin-left: 126px;margin-top: 20px">
                    <div style="float: left;margin-left: 90px;margin-top: 20px">
                        <div style="width: 158px">
                            <input type="checkbox" id="checkbox_a4" name="product[]" value="蜜蜂软件木门版" class="chk_1">
                            <label for="checkbox_a4"></label>
                            <span style="float: left;text-indent: 1em">蜜蜂软件木门版</span>
                        </div>
                    </div>
                    <div style="float: left;margin-left: 90px;margin-top: 20px">
                        <div style="width: 158px">
                            <input type="checkbox" id="checkbox_a5" name="product[]" value="蜜蜂软件卫浴版" class="chk_1">
                            <label for="checkbox_a5"></label>
                            <span style="float: left;text-indent: 1em">蜜蜂软件卫浴版</span>
                        </div>
                    </div>
                    <div style="float: left;margin-left: 90px;margin-top: 20px">
                        <div style="width: 158px">
                            <input type="checkbox" id="checkbox_a6" name="product[]" value="蜜蜂软件石材版" class="chk_1">
                            <label for="checkbox_a6"></label>
                            <span style="float: left;text-indent: 1em">蜜蜂软件石材版</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Join_information">
            <span>申请者公司信息</span>
        </div>
        <div class="Join_two">
            <div style="margin-top: 10px">
                <p>公司名称：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 120px" id="username" name="company_name" class="text" tabindex="1" required/>
                <label id="companyname_succeed" class="blank"></label>
                <span class="clear"></span>
            </div>
            <div style="margin-top: 10px">
                <p>公司地址：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 120px" id="companyaddr" name="company_addr" class="text" tabindex="12" required/>
                <label id="companyaddr_succeed" class="blank"></label>
                <span class="clear"></span>
                <label id="companyaddr_error"></label>
            </div>
            <div style="margin-top: 10px">
                <p>注册资金：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 120px" id="companysite" name="companysite" class="text" tabindex="14" placeholder="注册资金:数字(单位:万)" required />
                <label id="companysite_succeed" class="blank"></label>
                <span class="clear"></span>
                <label id="companysite_error"></label>
            </div>
            <div style="margin-top: 10px">
                <p>法定代表：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 120px"  id="name1" name="represent_name" class="text" tabindex="1" required/>
                <label id="username_succeed1" class="blank"></label>
                <span class="clear"></span>
                <div id="username_error1"></div>
            </div>
            <div style="margin-top: 10px">
                <p>固定电话：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 120px" id="tel" name="telephone" class="text" value="" tabindex="9" required/>
                <label id="tel_succeed" class="blank"></label>
                <span class="clear"></span>
                <label id="tel_error"></label>
            </div>
            <div style="margin-top: 10px">
                <p>主要业务和经营：</p>
                <textarea style="width: 480px" rows="8" name="business" placeholder="当前主营业务及年度经营规模"></textarea>
            </div>
            <div style="margin-top: 10px">
                <p>法人代表身份证：</p>
                <input style="color:#FFFFFF; margin-left: 66px;background-color: #00bbb9;width: 240px;height:50px;border:1px #00bbb9 solid;" type="button" id="upload_button" value="上传" class="yellow_button disabled">
				<img id="showImg" style="margin-left: 80px;width:50px;height:50px;" src="__PUBLIC__/Web/images/1_03.png" alt=""/>
				<a id="delImg" href="javascript:void(0)"  onclick="delOne('showImg')" style="margin-left: 30px;color: #757372;visibility:hidden;">删除</a>
				<input type="hidden" id="newbikephotoName" name="card_image" value="" />
            </div>
            <div style="margin-top: 10px">
                <p>营业执照副本：</p>
                <input style="color:#FFFFFF; margin-left: 85px;background-color: #00bbb9;width: 240px;height:50px;border:1px #00bbb9 solid;" type="button" id="upload_button1" value="上传" class="yellow_button disabled">
                <img id="showImg1" style="margin-left: 80px;width:50px;height:50px;"  src="__PUBLIC__/Web/images/1_03.png" alt=""/>
                <a id="delImg1" href="javascript:void(0)"  onclick="delTwo('showImg1')" style="margin-left: 30px;color: #757372;visibility:hidden;">删除</a>
				<input type="hidden" id="newbikephotoName1" name="licence_image" value="" />
            </div>
            <div style="margin-top: 10px">
                <p>税务登记证：</p>
                <input style="color:#FFFFFF; margin-left: 104px;background-color: #00bbb9;width: 240px;height:50px;border:1px #00bbb9 solid;" type="button" id="upload_button2" value="上传" class="yellow_button disabled">
                <img id="showImg2" style="margin-left: 80px;width:50px;height:50px;" src="__PUBLIC__/Web/images/1_03.png" alt=""/>
                <a id="delImg2" href="javascript:void(0)"  onclick="delThree('showImg2')" style="margin-left: 30px;color: #757372;visibility:hidden;">删除</a>
				<input type="hidden" id="newbikephotoName2" name="tax_reg_certificate" value="" />
            </div>
        </div>
        <div class="Join_information">
            <span>授权者信息</span>
        </div>
        <div class="Join_two">
            <div style="margin-top: 10px">
                <p>授权人姓名：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 100px"  id="username1" name="realname" class="text" tabindex="1" required/>
                <span class="clear"></span>
            </div>
            <div style="margin-top: 10px">
                <p>所在部门：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 118px" id="name" name="department" class="text" tabindex="1" required/>
            </div>
            <div style="margin-top: 10px">
                <p>邮箱：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 155px" id="mail" name="email" class="text" tabindex="4" />
                <label id="mail_succeed" class="blank"></label>
                <span class="clear"></span>
                <label id="mail_error"></label>
            </div>
            <div style="margin-top: 10px">
                <p>手机：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 154px" id="mobile2" name="mobile" class="text" value="" tabindex="10" required/>
                <label id="mobile_succeed2" class="blank"></label>
                <span class="clear"></span>
                <label id="mobile_error2"></label>
            </div>
			<div style="margin-top: 10px">
                <p>QQ：</p>
                <input type="text" style="width: 480px;height: 50px;margin-left: 164px" id="mobile1" name="qq" class="text" value="" tabindex="10" />
                <label id="mobile_succeed1" class="blank"></label>
                <span class="clear"></span>
                <label id="mobile_error1"></label>
            </div>
        </div>
        <div class="Join_information">
            <span>代理市场调查</span>
        </div>
        <div class="Join_two">
            <div style="margin-top: 10px">
                <p>计划投入资金和团队人数：</p>
                <textarea name="invest" style="margin-left: 0px;width: 480px"  rows="8" placeholder="计划投入的资金和目前团队的人数团队"></textarea>
            </div>
            <div style="margin-top: 10px">
                <p>代理市场调研：</p>
                <textarea name="market_research" style="margin-left: 90px;width: 480px" rows="8" placeholder="1、主要目标客户及数量；2、目标客户所在市场；3、目标客户对欲申请代理的蜜蜂产品的需求程度"></textarea>
            </div>
            <div style="margin-top: 10px">
                <p>未来12月营销措施：</p>
                <textarea name="measure" style="margin-left: 52px;width: 480px" rows="8" placeholder="1、销售目标预计：2、主要营销措施："></textarea>
            </div>
            <div style="margin-top: 10px">
                <p>其他说明：</p>
                <textarea name="other_info" style="margin-left: 125px;width: 480px" rows="8"></textarea>
            </div>
        </div>
        <div style="height:200px;">
            <input type="submit" class="disabled1" id="registsubmit" value="申请加盟" tabindex="8">
        </div>
    </form>
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
</body>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/jquery-1.11.3.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/main.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Web/contact%20us/js/TouchSlide.1.1.js" ></script>
<script src="__ROOT__/Public/Web/contact%20us/js/bootstrap.min.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/hallooou.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/jquery.smoove.js"></script>

<script type="text/javascript" src="__ROOT__/Public/Web/Join/js/Validate.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Web/Join/js/Validate.form.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Web/Join/js/address.js"></script>
<script src="__ROOT__/Public/Web/contact%20us/js/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__/ajaxupload/ajaxupload.js"></script>
<script>
    $('.block').smoove({offset:'40%'});
	function delOne(delName){
		var imgname=delName;
		$("#showImg").attr("style","margin-left: 80px;width:50px;height:50px;visibility:hidden;");
		$("#delImg").attr("style","margin-left: 30px;color: #757372;visibility:hidden;");
		};
	function delTwo(delName){
		var imgname=delName;
		$("#showImg1").attr("style","margin-left: 80px;width:50px;height:50px;visibility:hidden;");
		$("#delImg1").attr("style","margin-left: 30px;color: #757372;visibility:hidden;");
		};
	function delThree(delName){
		var imgname=delName;
		$("#showImg2").attr("style","margin-left: 80px;width:50px;height:50px;visibility:hidden;");
		$("#delImg2").attr("style","margin-left: 30px;color: #757372;visibility:hidden;");
		};
	
	$(function(){
	var button = $('#upload_button'), interval;
    var fileType = "pic",fileNum = "one"; 
    new AjaxUpload(button,{
        action: "<?php echo U('zhaoshang/uploadpic');?>",
        name: 'userfile',
        onSubmit : function(file, ext){
            if(fileType == "pic")
            {
                if (ext && /^(jpg|png|jpeg|bmp)$/.test(ext)){
                    this.setData({
                        'info': '文件类型为图片'
                    });
                } else {
                     alert('文件格式错误，请上传格式为.png .jpg .jpeg .bmp 的图片');
                    return false;               
                }
            }
            if(fileNum == 'one')
                this.disable();
				interval = window.setInterval(function(){
               /* var text = confirmdiv.text();
                if (text.length < 14){
                    confirmdiv.text(text + '.');                    
                } else {
                    //confirmdiv.text('文件上传中');        
                }*/
				}, 200);
			},
			onComplete: function(file, response){
			if(response != "success"){
				if(response =='2'){
					alert("文件格式错误，请上传格式为.png .jpg .jpeg .bmp的图片");
				}else{
					if(response.length>20){
						alert("文件上传失败请重新上传"+response);			
					}else{
					 	$("#newbikephotoName").val("./Public/Source/Zhaoshang/"+response);
						$("#showImg").attr("style","margin-left: 80px;width:50px;height:50px;visibility:visible;");
						$("#showImg").attr("src","http://www.beeinc.cn:8080/ht/Public/Source/Zhaoshang/"+response);
						$("#delImg").attr("style","margin-left: 30px;color: #757372;visibility:visible;")	
					}
				}
				
			}                  
            window.clearInterval(interval);           
            this.enable();
            if(response == "success")
				alert('上传成功');              
			}
		});
	});
	
	$(function(){
	var button = $('#upload_button1'), interval;
    var fileType = "pic",fileNum = "one"; 
    new AjaxUpload(button,{
        action: "<?php echo U('zhaoshang/uploadpic');?>",
        name: 'userfile',
        onSubmit : function(file, ext){
            if(fileType == "pic")
            {
                if (ext && /^(jpg|png|jpeg|bmp)$/.test(ext)){
                    this.setData({
                        'info': '文件类型为图片'
                    });
                } else {
                     alert('文件格式错误，请上传格式为.png .jpg .jpeg .bmp 的图片');
                    return false;               
                }
            }
            if(fileNum == 'one')
                this.disable();
				interval = window.setInterval(function(){
               /* var text = confirmdiv.text();
                if (text.length < 14){
                    confirmdiv.text(text + '.');                    
                } else {
                    //confirmdiv.text('文件上传中');        
                }*/
				}, 200);
			},
			onComplete: function(file, response){
			if(response != "success"){
				if(response =='2'){
					alert("文件格式错误，请上传格式为.png .jpg .jpeg .bmp的图片");
				}else{
					if(response.length>20){
						alert("文件上传失败请重新上传"+response);			
					}else{
					 	$("#newbikephotoName1").val("./Public/Source/Zhaoshang/"+response);
						$("#showImg1").attr("style","margin-left: 80px;width:50px;height:50px;visibility:visible;");
						$("#showImg1").attr("src","http://www.beeinc.cn:8080/ht/Public/Source/Zhaoshang/"+response);
						$("#delImg1").attr("style","margin-left: 30px;color: #757372;visibility:visible;")	
					}
				}
				
			}                  
            window.clearInterval(interval);           
            this.enable();
            if(response == "success")
				alert('上传成功');              
			}
		});
	});
	
	$(function(){
	var button = $('#upload_button2'), interval;
    var fileType = "pic",fileNum = "one"; 
    new AjaxUpload(button,{
        action: "<?php echo U('zhaoshang/uploadpic');?>",
        name: 'userfile',
        onSubmit : function(file, ext){
            if(fileType == "pic")
            {
                if (ext && /^(jpg|png|jpeg|bmp)$/.test(ext)){
                    this.setData({
                        'info': '文件类型为图片'
                    });
                } else {
                     alert('文件格式错误，请上传格式为.png .jpg .jpeg .bmp 的图片');
                    return false;               
                }
            }
            if(fileNum == 'one')
                this.disable();
				interval = window.setInterval(function(){
               /* var text = confirmdiv.text();
                if (text.length < 14){
                    confirmdiv.text(text + '.');                    
                } else {
                    //confirmdiv.text('文件上传中');        
                }*/
				}, 200);
			},
			onComplete: function(file, response){
			if(response != "success"){
				if(response =='2'){
					alert("文件格式错误，请上传格式为.png .jpg .jpeg .bmp的图片");
				}else{
					if(response.length>20){
						alert("文件上传失败请重新上传"+response);			
					}else{
					 	$("#newbikephotoName2").val("./Public/Source/Zhaoshang/"+response);
						$("#showImg2").attr("style","margin-left: 80px;width:50px;height:50px;visibility:visible;");
						$("#showImg2").attr("src","http://www.beeinc.cn:8080/ht/Public/Source/Zhaoshang/"+response);
						$("#delImg2").attr("style","margin-left: 30px;color: #757372;visibility:visible;")	
					}
				}
				
			}                  
            window.clearInterval(interval);           
            this.enable();
            if(response == "success")
				alert('上传成功');              
			}
		});
	});
</script>
</html>