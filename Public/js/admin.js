$(function() {

  $('.toggle > a').on('click', function(event) {
  	event.preventDefault();
      $(this).next('ul.toggle-menu').toggle();
  });
   
   $('#right').width($(window).width()-$('#left').width()-10);
   $('#left').height($('#right').height());
   // alert($('#right').height());
   // $('#center,#left,#right').height($('#main').contents().height());
  //页面高度

});




