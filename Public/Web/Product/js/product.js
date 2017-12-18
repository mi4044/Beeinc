/**
 * Created by Bee_101 on 2016/8/11.
 */
$(document).ready(function() {

	$('#fullpage').fullpage({

		sectionsColor:['#FFFFFF','#00cac8','#f5f5f5'], //控制每个section的背景颜色

		controlArrow:false,   //是否隐藏左右滑块的箭头(默认为true)

		verticalCentered: true,  //内容是否垂直居中(默认为true)

		css3: true, //是否使用 CSS3 transforms 滚动(默认为false)

		resize:false, //字体是否随着窗口缩放而缩放(默认为false)

		scrolllingSpeed:1000,  //滚动速度，单位为毫秒(默认为700)

		anchors:['page1','page2','page3'],  //定义锚链接(值不能和页面中任意的id或name相同，尤其是在ie下，定义时不需要加#)

		lockAnchors:false,  //是否锁定锚链接，默认为false。设置weitrue时，锚链接anchors属性也没有效果。

		loopBottom:false,  //滚动到最底部后是否滚回顶部(默认为false)

		loopTop:false, //滚动到最顶部后是否滚底部

		loopHorizontal:false,//左右滑块是否循环滑动

		autoScrolling:true, // 是否使用插件的滚动方式，如果选择 false，则会出现浏览器自带的滚动条

		scrollBar:false,//是否显示滚动条，为true是一滚动就是一整屏

		fixedElements:".logo", //固定元素

		menu:".menu",

		keyboardScrolling:true, //是否使用键盘方向键导航(默认为true)

		keyboardScrolling:true, //页面是否循环滚动（默认为false）

		navigation:true, //是否显示项目导航（默认为false）

		navigationTooltips:["page1","page2","page3"],//项目导航的 tip

		navigationColor:'#fff', //项目导航的颜色

		slidesNavigation:true,

	});

});
$(document).ready(function(){
    $("#anniu").click(function(){
        $("#dianji").show();
    });
});
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
window.onload = function() {
    //
    var max = 1000000,
            o = document.getElementById('team');
    var chrome = /chrome/i.test(navigator.userAgent);

    // 获取保存的数据
    if(chrome) {
        data_num = sessionStorage.getItem("num") || "";
    }
    var num_now = parseInt(data_num) || 50000;

    o.innerHTML = num_now + 1;

    // 每 0.1 秒更新一次数字，并保存数据
    setInterval(function() {
        num_now = num_now >= max ? 1 : num_now + 1;
        o.innerHTML = num_now;
        if(chrome) {
            sessionStorage.setItem("num", num_now);
        }
        else {
            document.cookie = "num=" + num_now + ";path=/;";
        }
    }, 18000);
};
