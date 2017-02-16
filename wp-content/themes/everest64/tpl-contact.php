<?php
/**
 * Template Name: Contact page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package everest64
 */

get_header(); ?>

	<?php
		if ( is_active_sidebar( 'contact-block' ) ) : 
			dynamic_sidebar( 'contact-block' );  
		endif; 
	?>

	<div class="menu-shadow"></div>

	<section class="middle-section">
		<div class="container">

			<div class="col-md-12">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'contact' );
				endwhile; // End of the loop.
				?>

			</div>
		</div>
	</section>    

<?php
get_footer();