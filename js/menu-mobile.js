var $ = jQuery.noConflict();

// Detect Mobile Touch Support
var eventClick = 'click';
var eventHover = 'mouseover mouseout';

(function($){
  if ('ontouchstart' in document.documentElement) {
    $('html').addClass('touch');
    $('body').addClass('touch-gesture');
    eventClick = 'touchon touchend';
    eventHover = 'touchstart touchend';
  } else {
    $('html').addClass('no-touch');
  }
})(jQuery); 

jQuery(document).ready(function($) {

  // Hover plus icon sub-menu  
  $('#nav-container a, .nav-child-container').bind( eventHover, function(event) {
    $(this).toggleClass('hover');    
  });
  

  /* Sidebar Functionality */
  
  var opened = false;
  $('.menu-button').bind('click', function(event) {
    $('#pager').toggleClass('active');
    $('#sidemenu').toggleClass('active');
    if(opened){
      opened = false;
      setTimeout(function() {
        $('#sidemenu-container').removeClass('active');
      }, 500);
    } else {
      $('#sidemenu-container').addClass('active');
      opened = true;
    }
  });
    
  $('.mobile-nav a').bind('click', function(event) {
    event.preventDefault();
    var path = $(this).attr('href');
    $('#pager').toggleClass('active');
    $('#sidemenu').toggleClass('active');
    setTimeout(function() {
      window.location = path;
    }, 500);
  });

  // Navigation overlay
  $('.navigation-overlay').click(function(){
    $('#pager').toggleClass('active');
    $('#sidemenu').toggleClass('active');
  });

  // Check if the child menu has an active item. If yes, then it will expand the menu by default. 
  var $navItems = $('.mobile-nav ul li');

  $navItems.each(function(index){
    if ($(this).hasClass('current-menu-item')) {
      $parentUl = $(this).parent();
      //$parentUl.height($parentUl.children('li').length * 46 + "px");
      $parentUl.prev().addClass('active');
      $parentUl.addClass('active');
      $anchor = $parentUl.prev();
      $anchor.children('.nav-child-container').addClass('active');
    }
  });

});