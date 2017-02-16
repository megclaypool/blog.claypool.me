var owl=jQuery.noConflict();
owl(document).ready(function() {
	owl("#owl-wrap").owlCarousel({
    	autoPlay: 6000,
        items : 3,
        itemsDesktop : [1299,3],
        itemsDesktopSmall : [979,3],
		pagination: false,
		paginationNumbers: false
	
	});
});