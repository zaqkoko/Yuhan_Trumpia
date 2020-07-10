$(function(){
  $("#gnb > li").mouseenter(function(){
    $(this).children('.sub').addClass('active');
  });
  $("#gnb > li").mouseleave(function(){
    $(this).children('.sub').removeClass('active');
  });
});
