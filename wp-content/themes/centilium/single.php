<?php
/**
 * The template for displaying all single posts.
 *
 * @package Centilium
 */

get_header(); ?>

<div id="primary" class="row">
	<main id="main" class="col-md-8" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php if (get_theme_mod('author_bio') !='off'){ centilium_author_box(); } ?>
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

	<aside class="col-md-4">
		<?php get_sidebar(); ?>
	</aside>
</div><!-- #primary -->
<?php get_footer(); ?>
