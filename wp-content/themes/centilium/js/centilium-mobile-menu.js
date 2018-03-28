/**
 * Handles mobile menus.
 */
jQuery(document).ready(function($) {
	$( "span.menu" ).click(function() {
		$( ".head-nav ul" ).slideToggle(500, function() {
		// Animation complete.
		});
	});
	
	    // Add button to sub-menu parent to show nested pages on the mobile menu
        $( '.menu-navigation li.page_item_has_children, .menu-navigation li.menu-item-has-children' ).prepend( '<span class="menu-dropdown-btn"><i class="fa fa-angle-right"></i></span>' );
        
        // Sub-menu toggle button
        $( '.menu-navigation a[href="#"], .menu-dropdown-btn' ).bind( 'click', function(e) {
            e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
            $(this).find('.fa:first').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
            
        });
        
        
        // Mobile menu toggle button
        $( '.header-menu-button' ).click( function(e){
            $( 'body' ).toggleClass( 'show-main-menu' );
        });
        $( '.main-menu-close' ).click( function(e){
            $( '.header-menu-button' ).click();
        });
        
                
        // Don't search if no keywords have been entered
        $(".search-submit").bind('click', function(event) {
            if ( $(this).parents(".search-form").find(".search-field").val() == "") event.preventDefault();
        });
});