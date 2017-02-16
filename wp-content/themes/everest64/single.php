<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package everest64
 */

get_header(); ?>

	<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" class="center-block" alt="">	
	<?php endif;  ?>
	
	<div class="menu-shadow"></div>

	<section class="middle-section">
		<div class="container">

			<?php get_sidebar(); ?>

			<div class="col-md-9"> 

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'single' );

					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</div>
		</div>
	</section>

<?php
get_footer();