<?php
/**
 * @package Seguente
 */
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
$about_bg_image = $seguente_theme_options['about_bg_image'];

if ($about_bg_image != '') { ?>
	<div class="about" style="background: url(<?php echo esc_url($about_bg_image); ?>) 50% 0 no-repeat fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"> 
<?php } else { ?>
	<div class="about">
<?php } ?>
	<div id="about-wrap">
		<div>
			<?php $page = array();
			$about_page = $seguente_theme_options['about_page'];
			if ( 'page-none-selected' != $about_page ) {
				$page[] = $about_page;
			} 
			
			$args = array(
				'posts_per_page' => 1,
				'post_type' => 'page',
				'post__in' => $page,
				'orderby' => 'post__in'
			);
			
			$seguente_about_query = new WP_Query( $args );
			
			if ( $seguente_about_query->have_posts() ) :
				while ( $seguente_about_query->have_posts() ) : $seguente_about_query->the_post(); ?>
					<div class="about-title">
						<div class="title">
							<?php the_title( sprintf( '<h2 class="boxtitle wow bounceInLeft" data-wow-delay="0.1s"><a href="%s" rel="bookmark">', esc_url( get_permalink()) ), '</a></h2>' ); ?>
						</div>
					</div>
					<div class="about-button">
						<a href="<?php echo esc_url(get_permalink()); ?>" class="about-link"><?php echo esc_html($seguente_theme_options['about_button_text']); ?></a>
					</div>
				<?php 
				endwhile;
			else : ?>
					<div class="about-title">
						<div class="title">
							<h2 class="boxtitle wow bounceInLeft" data-wow-delay="0.1s"><?php bloginfo('name'); ?></h2>
						</div>
					</div>
					<div class="about-button">
						<a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="about-link"><?php echo esc_html($seguente_theme_options['about_button_text']); ?></a>
					</div>	
				<?php
			endif; wp_reset_postdata(); ?>	
		</div>
	</div>
</div>