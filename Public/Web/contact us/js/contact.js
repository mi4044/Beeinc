/**
 * Created by Administrator on 2015/12/31.
 */
var width=$(".bannerbox").width();
var i=-1;
var timer=0;
$(document).ready(function () {
    move();
    timer=setInterval("move()",3000);
})
function move(){
    i++;
     $('.baner-01-a').animate({"top":"40%",opacity:1},{
            });
}
