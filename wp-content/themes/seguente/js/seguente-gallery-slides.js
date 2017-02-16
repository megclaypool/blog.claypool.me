var flex=jQuery.noConflict();
flex(window).load(function(){
	flex('.flexslider').flexslider({
		slideshowSpeed: 5000,
		animationSpeed: 1000,
		animation: 'fade',
        start: function(slider){
          	flex('body').removeClass('loading');
        }
	});
});