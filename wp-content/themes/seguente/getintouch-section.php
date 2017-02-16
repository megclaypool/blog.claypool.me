<?php
/**
 * @package Seguente
 */
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
$getin_bg_image = $seguente_theme_options['getin_bg_image'];

if ($getin_bg_image != '') { ?>
	<div class="get-in-touch" style="background: url(<?php echo esc_url($getin_bg_image); ?>) 50% 0 no-repeat fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"> 
<?php } else { ?>
	<div class="get-in-touch">
<?php } ?>
	<div id="get-in-touch-wrap">
		<div>
			<?php $page = array();
			$git_page = $seguente_theme_options['getin_page'];
			if ( 'page-none-selected' != $git_page ) {
				$page[] = $git_page;
			} 
			
			$args = array(
				'posts_per_page' => 1,
				'post_type' => 'page',
				'post__in' => $page,
				'orderby' => 'post__in'
			);
			
			$seguente_git_query = new WP_Query( $args );
			
			if ( $seguente_git_query->have_posts() ) :
				while ( $seguente_git_query->have_posts() ) : $seguente_git_query->the_post();
					the_title( sprintf( '<h2 class="boxtitle wow bounceInLeft" data-wow-delay="0.1s"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<?php the_excerpt(); ?>
					<a href="<?php echo esc_url(get_permalink()); ?>" class="git-link"><?php echo esc_html($seguente_theme_options['getin_button_text']); ?></a>
				<?php 
				endwhile;
			else : ?>
				<h2 class="boxtitle wow bounceInLeft" data-wow-delay="0.1s"><?php esc_html_e('Get In Touch with Us', 'seguente'); ?></h2>
				<p class="text wow bounceInRight" data-wow-delay="0.2s"><?php esc_html_e('Get In Touch with Us', 'seguente'); ?></p>
				<a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="git-link"><?php echo esc_html($seguente_theme_options['getin_button_text']); ?></a>
			<?php
			endif; wp_reset_postdata(); ?>			
			
		</div>
	</div>
</div>