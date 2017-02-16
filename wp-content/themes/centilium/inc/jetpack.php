<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Centilium
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function centilium_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'centilium_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function centilium_jetpack_setup
add_action( 'after_setup_theme', 'centilium_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function centilium_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function centilium_infinite_scroll_render
