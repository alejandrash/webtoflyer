(function() {
    "use strict";

    // custom scrollbar

    //$("html").niceScroll({styler:"fb",cursorcolor:"#050A24", cursorwidth: '5', cursorborderradius: '10px', background: '#7b7b7b', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

   // $(".left-side").niceScroll({styler:"fb",cursorcolor:"#00C6D7", cursorwidth: '3', cursorborderradius: '10px', background: '#7b7b7b', spacebarenabled:false, cursorborder: '0'});
    
    if ($('#wraprod').length > 0) { 
        //$("#wraprod").niceScroll({styler:"fb",cursorcolor:"#e0b713", cursorwidth: '10', cursorborderradius: '10px', background: '#7b7b7b', spacebarenabled:true, cursorborder: '20'});
    }


    //$(".left-side").getNiceScroll();
    //if ($('body').hasClass('left-side-collapsed')) {
    //    $(".left-side").getNiceScroll().hide();
    //}



    // Toggle Left Menu
   jQuery('.menu-list > a').click(function() {
      
      var parent = jQuery(this).parent();
      var sub = parent.find('> ul');
      
      if(!jQuery('body').hasClass('left-side-collapsed')) {
         if(sub.is(':visible')) {
            sub.slideUp(200, function(){
               parent.removeClass('nav-active');
               jQuery('.main-content').css({height: ''});
               mainContentHeightAdjust();
            });
         } else {
            visibleSubMenuClose();
            parent.addClass('nav-active');
            sub.slideDown(200, function(){
                mainContentHeightAdjust();
            });
         }
      }
      return false;
   });

   function visibleSubMenuClose() {
      jQuery('.menu-list').each(function() {
         var t = jQuery(this);
         if(t.hasClass('nav-active')) {
            t.find('> ul').slideUp(200, function(){
               t.removeClass('nav-active');
            });
         }
      });
   }

   function mainContentHeightAdjust() {
      // Adjust main content height
      var docHeight = jQuery(document).height();
      if(docHeight > jQuery('.main-content').height())
         jQuery('.main-content').height(docHeight);
   }

   //  class add mouse hover
   jQuery('.custom-nav > li').hover(function(){
      jQuery(this).addClass('nav-hover');
   }, function(){
      jQuery(this).removeClass('nav-hover');
   });


   // Menu Toggle
   jQuery('.toggle-btn').click(function(){
       //$(".left-side").getNiceScroll().hide();
       
       if ($('body').hasClass('left-side-collapsed')) {
           //$(".left-side").getNiceScroll().hide();
       }
      var body = jQuery('body');
      var bodyposition = body.css('position');

      if(bodyposition != 'relative') {

         if(!body.hasClass('left-side-collapsed')) {
            body.addClass('left-side-collapsed');
            jQuery('.custom-nav ul').attr('style','');

            jQuery(this).addClass('menu-collapsed');

         } else {
            body.removeClass('left-side-collapsed chat-view');
            jQuery('.custom-nav li.active ul').css({display: 'block'});

            jQuery(this).removeClass('menu-collapsed');

         }
      } else {

         if(body.hasClass('left-side-show'))
            body.removeClass('left-side-show');
         else
            body.addClass('left-side-show');

         mainContentHeightAdjust();
      }

   });
   

   searchform_reposition();

   jQuery(window).resize(function(){

      if(jQuery('body').css('position') == 'relative') {

         jQuery('body').removeClass('left-side-collapsed');

      } else {

         jQuery('body').css({left: '', marginRight: ''});
      }

      searchform_reposition();

   });

   function searchform_reposition() {
      if(jQuery('.searchform').css('position') == 'relative') {
         jQuery('.searchform').insertBefore('.left-side-inner .logged-user');
      } else {
         jQuery('.searchform').insertBefore('.menu-right');
      }
   }
})(jQuery);

                      // Dropdowns Script
						$(document).ready(function() {
						  $(document).on('click', function(ev) {
						    ev.stopImmediatePropagation();
						    $(".dropdown-toggle").dropdown("active");
						  });
                            var wheight = $(document).height();
                            $('.sidebar-menu').css('height',wheight);
						});
						
	
     
  /************** Search ****************/
		$(function() {
	    var button = $('#loginButton');
	    var box = $('#loginBox');
	    var form = $('#loginForm');
	    button.removeAttr('href');
	    button.mouseup(function(login) {
	        box.toggle();
	        button.toggleClass('active');
	    });
	    form.mouseup(function() { 
	        return false;
	    });
	    $(this).mouseup(function(login) {
	        if(!($(login.target).parent('#loginButton').length > 0)) {
	            button.removeClass('active');
	            box.hide();
	        }
	    });
	});


$(function() {
    var offset = $("#sidebar").offset();
    var topPadding = 0;
    $(window).scroll(function() {
    if ($("#sidebar").height() < $(window).height() && $(window).scrollTop() > offset.top) { /* LINEA MODIFICADA POR ALEX PARA NO ANIMAR SI EL SIDEBAR ES MAYOR AL TAMANO DE PANTALLA */
    $("#sidebar").stop().animate({
    marginTop: $(window).scrollTop() - offset.top + topPadding
    });
    } else {
    $("#sidebar").stop().animate({
    marginTop: 0
    });
    };
    });
});