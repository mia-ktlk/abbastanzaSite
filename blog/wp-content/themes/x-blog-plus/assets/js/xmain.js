(function ($) {
	"use strict";

	   $.fn.xblogAccessibleDropDown = function () {
			    var el = $(this);

			    $("a", el).focus(function() {
			        $(this).parents("li").addClass("hover");
			    }).blur(function() {
			        $(this).parents("li").removeClass("hover");
			    });
		}
    
    //document ready function
    jQuery(document).ready(function($){
    	$("#top-menu").xblogAccessibleDropDown();
    	$(".site-info p, .site-info").addClass('xfooter');
    	$(".footer-copyright,.xfooter,.xfooter a").css('display','block');
    	
        }); // end document ready



}(jQuery));	