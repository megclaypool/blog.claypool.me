<?php
/**
 * Template Name: Home Page
 *
 * Template to display the home page.
 *
 * @package Seguente
 */
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
get_header(); ?>
	<div id="main" class="<?php echo esc_attr($seguente_theme_options['layout_settings']); ?>">
	<?php 
		
			if ($seguente_theme_options['image_slider_on'] == '1') {
					
				if ($seguente_theme_options['default_image_slider'] == 'ideal') {
					
					seguente_ideal_slider();
					
				} else { 
				
					seguente_unslider_slider(); 
				}
				
			}
			
			if ($seguente_theme_options['features_section_on'] == '1') {
			
				get_template_part( 'features', 'section' );
				
			}
			
			if ($seguente_theme_options['about_section_on'] == '1') {
			
				get_template_part( 'about', 'section' );
				
			}
			
			if ($seguente_theme_options['services_section_on'] == '1') {
			
					
					get_template_part( 'services', 'section' );
				
				
			}
			
			
			if ($seguente_theme_options['getin_home_on'] == '1') {
			
				get_template_part( 'getintouch', 'section' );
				
			}
			
			if ($seguente_theme_options['blog_section_on'] == '1') {
			
				get_template_part( 'fromblog', 'section' );
				
			} ?>		
	</div><!--main-->
	<?php if ($seguente_theme_options['social_section_on'] == '1') {
			get_template_part( 'social', 'section' );	
		}
get_footer(); ?>