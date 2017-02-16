<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Seguente
 */
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
if ( $seguente_theme_options['post_navigation'] == 'sidebar') { get_template_part('post','nav'); } 

if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>
	<div id="archives" class="widget wow fadeIn widget_archive" data-wow-delay="0.5s">
		<div class="widget-title clearfix">
			<h4><?php esc_html_e( 'Archives', 'seguente' ); ?></h4>
			<div class="widget-separator-holder clearfix">
				<div class="widget-separator"></div>
			</div>
		</div>
		<ul>
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>
	</div>
	<div id="meta" class="widget wow fadeIn widget_meta" data-wow-delay="0.5s">
		<div class="widget-title clearfix">
			<h4><?php esc_html_e( 'Meta', 'seguente' ); ?></h4>
			<div class="widget-separator-holder clearfix">
				<div class="widget-separator"></div>
			</div>
		</div>	
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</div>
<?php endif; ?>
