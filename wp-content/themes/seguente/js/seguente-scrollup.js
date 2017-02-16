var scrollup=jQuery.noConflict();
scrollup(document).ready(function() {
	var offset = 220;
	var duration = 500;
	scrollup(window).scroll(function() {
		if (scrollup(this).scrollTop() > offset) {
			scrollup('.back-to-top').fadeIn(duration);
		} else {
			scrollup('.back-to-top').fadeOut(duration);
		}
	});
				
	scrollup('.back-to-top').click(function(event) {
		event.preventDefault();
		scrollup('html, body').animate({scrollTop: 0}, duration);
		return false;
	})
});