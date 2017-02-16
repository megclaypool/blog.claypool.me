<?php
/**
 * Centilium Theme Customizer
 *
 * @package Centilium
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function centilium_customizer( $wp_customize ) {
	class WP_Donate_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		 <div class="support-box">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="RRA2W8Y77NDZS">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>			
		</div>
		<?php
		}
	}
	$wp_customize->add_section( 
	'centilium_section' , 
		array(
				'title'      => __('SUPPORT', 'centilium'),
				'priority'   => 1,
		) 
	);

	$wp_customize->add_setting(
		'donate_to_support',
		array(
			'default' => __('','centilium'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( 
	new WP_Donate_Customize_Control( 
	$wp_customize, 
	'donate_to_support', 
		array(
				'label' => __('Donate to support','centilium'),
				'section' => 'centilium_section',
				'setting' => 'donate_to_support',
			)
		)
	);


	class WP_Rate_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		 <div class="support-box">
			<a href="<?php echo esc_url( __('https://wordpress.org/support/view/theme-reviews/centilium#postform', 'centilium'));?>" target="_blank" class="rate" id="rate_this"><?php _e( 'RATE THIS THEME','centilium' ); ?></a>
		 </div>
		 <div class="support-us">
		 <?php _e('Please support our hard work by rating this Theme and Donating. This will motivate us to keep developing more elegant themes which you and others can continue to download and enjoy for free.','centilium');?>
		 </div>
		<?php
		}
	}

	$wp_customize->add_setting(
		'rate_theme',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( 
	new WP_Rate_Customize_Control( 
		$wp_customize, 'rate_theme', array(	
				'label' => __('Rate the Theme','centilium'),
				'section' => 'centilium_section',
				'setting' => 'rate_theme',
			)
		)
	);


}
add_action( 'customize_register', 'centilium_customizer' );