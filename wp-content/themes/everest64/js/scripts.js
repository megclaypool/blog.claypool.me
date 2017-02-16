/*
 *  Everest64 Theme Custom Scripts
 *  Copyright (c) 2016 Everest64 Theme
 *  http://www.sumanshresthaa.com.np/
 *  Licensed under MIT
 */

(function($) {  
  	//Bootstrap Carousel First Item Active
  	$('.carousel-inner .item:first-child').addClass('active');

  	//Pagination for Next & Previous Adding FontAwesome Icon
  	$('.nav-previous a').prepend('<i class="fa fa-chevron-left"></i>');
  	$('.nav-next a').prepend('<i class="fa fa-chevron-right"></i>');

})(jQuery);


(function($) {  
	// Activating Animations
	var wow = new WOW(
	  {
	    boxClass:     'wow',      // animated element css class (default is wow)
	    animateClass: 'animated', // animation css class (default is animated)
	    offset:       0,          // distance to the element when triggering the animation (default is 0)
	    mobile:       true,       // trigger animations on mobile devices (default is true)
	    live:         true,       // act on asynchronously loaded content (default is true)
	    callback:     function(box) {
	      // the callback is fired every time an animation is started
	      // the argument that is passed in is the DOM node being animated
	    },
	    scrollContainer: null // optional scroll container selector, otherwise use window
	  }
	);
	wow.init();
})(jQuery);



(function($) { 
	//Tab to top
  	$(window).scroll(function() {
    	if ($(this).scrollTop() > 1){  
      	$('.scroll-top-wrapper').addClass("show");
    	}
    	else{
      	$('.scroll-top-wrapper').removeClass("show");
    	}
  	});

  	$(".scroll-top-wrapper").on("click", function() {
    	$("html, body").animate({ scrollTop: 0 }, 600);
    	return false;
  	});

})(jQuery);