<?php
	/**
	*
 	* Template Name: Full Width
	* @package Centilium
	*
	*/
	
get_header(); ?>

<div id="primary" class="row">
	<main id="main" class="col-md-12" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php get_template_part( 'template-parts/content', 'page' ); ?>
		
		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
			comments_template();
			endif;
		?>
		
		<?php endwhile; // end of the loop. ?>
		
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>