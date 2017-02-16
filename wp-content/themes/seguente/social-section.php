<?php
/**
 * @package Seguente
 */
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
$social_bg_image = $seguente_theme_options['social_bg_image'];

if ($social_bg_image != '') { ?>
	<div class="social" style="background: url(<?php echo esc_url($social_bg_image); ?>) 50% 0 no-repeat fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"> 
<?php } else { ?>
	<div class="social">
<?php } ?>
	<div id="social-wrap">
		<div id="social-bar">
			<?php get_template_part( 'menu', 'social' ); ?>		
		</div>
	</div>
</div>