<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$context['foo'] = 'bar';

date_default_timezone_set('America/Los_Angeles');
$context['current_date'] = date('l\, F jS, Y');
$context['current_time'] = date('G:i');

    // Render twig file with the give $context array.
    Timber::render( 'welcome.twig', $context );


$templates = array( 'index.twig' );
if ( is_home() ) {

	array_unshift( $templates, 'home.twig' );
}
Timber::render( $templates, $context );
