<?php
/**
 * Template part for displaying single posts.
 *
 * @package Centilium
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>
	<header class="entry-header"><!--Post Title-->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								
		<div class="post-meta"><!--Pot Tags-->
			<?php centilium_post_meta(); ?>
		</div>
	</header>
							
	<div class="post-image feature-post-image">
		<?php if ( has_post_thumbnail() ) : ?>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('centilium_big'); ?></a>
				
				<?php endif; ?>
	</div>
	
							
	<div class="post-content">
		<?php the_content(); ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'centilium' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<div class="post-tags">
		<?php centilium_entry_tags(); ?>
	</div>
	
	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit This Post', 'centilium' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

	
	<nav class="navigation post-navigation" role="navigation">
		<?php centilium_next_prev_post(); ?>
	</nav><!-- .navigation -->
</article>

