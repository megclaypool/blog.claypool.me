/**
 * Handles mobile menus.
 */
jQuery(document).ready(function($) {
		$( "span.menu" ).click(function() {
		$( ".head-nav ul" ).slideToggle(500, function() {
		// Animation complete.
	});
	});
});