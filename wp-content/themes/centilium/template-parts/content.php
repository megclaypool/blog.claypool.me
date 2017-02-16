<?php
/**
 * Template part for displaying posts.
 *
 * @package Centilium
 */

?>
<?php if (get_theme_mod('article_display') =='excerpt_full_featured'){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>

	<header class="entry-header"><!--Post Title-->
	
		<?php the_title( sprintf( '<h1 class="entry-title excerpt-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
		<div class="post-image"><!--Featured Image-->
			<?php if ( has_post_thumbnail() ) : ?>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('centilium_big'); ?></a>
				
			<?php endif; ?>
		</div>
								
			<div class="post-meta"><!--Post Meta-->
				<?php centilium_post_meta(); ?>
			</div>
	</header>
							
		<div class="post-excerpt">
			<?php
			/* the post excerpts */
				the_excerpt();
			?> 
						
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'centilium' ),
				'after'  => '</div>',
			) );
			?>
			<div class="readmore">
				<a class="post-readmore float-r" href="<?php echo get_permalink(); ?>"><?php esc_attr_e('READ MORE', 'centilium'); ?></a>
			</div>
		</div>
		
		<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'centilium' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article>

<?php

} else {

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-box content-list'); ?>>

		
	<div class="post-content-list">
		<header class="entry-header"><!--Post Title-->
			<?php the_title( sprintf( '<h1 class="entry-title excerpt-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
											
				<div class="post-meta"><!--Post Meta-->
					<?php centilium_post_meta(); ?>
				</div>
		</header>
				<div class="post-image"><!--Featured Image-->
			<?php if ( has_post_thumbnail() ) : ?>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('centilium_smallfeatured'); ?></a>
				
			<?php endif; ?>
		</div>				
			<div class="post-excerpt">
				<?php
				/* the post excerpts */
					the_excerpt();
				?> 
							
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'centilium' ),
					'after'  => '</div>',
				) );
				?>
				<div class="readmore">
					<a class="post-readmore float-r" href="<?php echo get_permalink(); ?>"><?php esc_attr_e('READ MORE', 'centilium'); ?></a>
				</div>
			</div>
	</div>
	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'centilium' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article>
<?php

}

?>