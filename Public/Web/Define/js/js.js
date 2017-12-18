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

//CSS3 Animate-it
$('.animatedParent').appear();
$('.animatedClick').click(function(){
  var target = $(this).attr('data-target');


  if($(this).attr('data-sequence') != undefined){
    var firstId = $("."+target+":first").attr('data-id');
    var lastId = $("."+target+":last").attr('data-id');
    var number = firstId;

    //Add or remove the class
    if($("."+target+"[data-id="+ number +"]").hasClass('go')){
      $("."+target+"[data-id="+ number +"]").addClass('goAway');
      $("."+target+"[data-id="+ number +"]").removeClass('go');
    }else{
      $("."+target+"[data-id="+ number +"]").addClass('go');
      $("."+target+"[data-id="+ number +"]").removeClass('goAway');
    }
    number ++;
    delay = Number($(this).attr('data-sequence'));
    $.doTimeout(delay, function(){
      console.log(lastId);

      //Add or remove the class
      if($("."+target+"[data-id="+ number +"]").hasClass('go')){
        $("."+target+"[data-id="+ number +"]").addClass('goAway');
        $("."+target+"[data-id="+ number +"]").removeClass('go');
      }else{
        $("."+target+"[data-id="+ number +"]").addClass('go');
        $("."+target+"[data-id="+ number +"]").removeClass('goAway');
      }

      //increment
      ++number;

      //continute looping till reached last ID
      if(number <= lastId){return true;}
    });
  }else{
    if($('.'+target).hasClass('go')){
      $('.'+target).addClass('goAway');
      $('.'+target).removeClass('go');
    }else{
      $('.'+target).addClass('go');
      $('.'+target).removeClass('goAway');
    }
  }
});

$(document.body).on('appear', '.animatedParent', function(e, $affected){
  var ele = $(this).find('.animated');
  var parent = $(this);


  if(parent.attr('data-sequence') != undefined){

    var firstId = $(this).find('.animated:first').attr('data-id');
    var number = firstId;
    var lastId = $(this).find('.animated:last').attr('data-id');

    $(parent).find(".animated[data-id="+ number +"]").addClass('go');
    number ++;
    delay = Number(parent.attr('data-sequence'));

    $.doTimeout(delay, function(){
      $(parent).find(".animated[data-id="+ number +"]").addClass('go');
      ++number;
      if(number <= lastId){return true;}
    });
  }else{
    ele.addClass('go');
  }

});

 $(document.body).on('disappear', '.animatedParent', function(e, $affected) {
  if(!$(this).hasClass('animateOnce')){
    $(this).find('.animated').removeClass('go');
   }
 });

 $(window).load(function(){
  $.force_appear();
 });

