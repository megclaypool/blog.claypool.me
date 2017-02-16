<?php
/**
 * Seguente functions and definitions
 *
 * @package Seguente
*/

function seguente_customize_register($wp_customize){
	
	class Seguente_WP_Customize_Info_Control extends WP_Customize_Control {
		public $type = 'info';
	
		public function render_content() {
			?>
				<strong> <?php esc_html_e('If you like our work. Buy us a coffee.','seguente'); ?></strong>
                <div class="donate">
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="T5VCDMLPPLBBS">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
				</div>
				<p class="btn">
					<a class="button button-primary" target="_blank" href="http://vmthemes.com/support/"><?php esc_html_e('Theme Support','seguente') ?></a><br><br>
					<a class="button button-primary" target="_blank" href="http://vmthemes.com/preview/seguente/"><?php esc_html_e('View Theme Demo','seguente') ?></a><br><br>
					<a class="button button-primary" target="_blank" href="http://vmthemes.com/seguente/#theme-pricing"><?php  esc_html_e('Upgrade to Pro','seguente') ?></a>
				</p>
        	<?php	
		}
	}
    
	// Google Fonts
	$google_fonts = array(
		__('Montserrat','seguente')	=> __('Montserrat','seguente'),
	);
						
	// Opacity
	$opacity = array(
		'1' => '1',
		'0.9'	=> '0.9',
		'0.8'	=> '0.8',
		'0.7'	=> '0.7',
		'0.6'	=> '0.6',
		'0.5'	=> '0.5',
		'0.4'	=> '0.4',
		'0.3'	=> '0.3',
		'0.2'	=> '0.2',
		'0.1'	=> '0.1',
		'0'	=> '0',
	);
	
	//Image Sliders
	$image_sliders = array('ideal' => __('Ideal Image Slider','seguente'), 'unslider' => __('Unslider','seguente'));
	
	// Slider Effects
	$options_effects = array('slide' => __('Slide', 'seguente'), 'fade' => __('Fade', 'seguente'));
	
	// Sidebar Position
	$theme_layout = array('col1' => __('No Sidebars','seguente'), 'col2-l' => __('Right Sidebar','seguente'), 'col2-r' => __('Left Sidebar','seguente'));
	
	// Blog Content
	$blog_content = array('excerpt' => __('Excerpt','seguente'),'full' => __('Full Content','seguente'));
	
	// Post Navigation Links Location
	$post_nav_array = array(
		'disable' => __('Disable', 'seguente'),
		'sidebar' => __('Main Sidebar', 'seguente'),
		'below' => __('Below Content', 'seguente'),

	);
	
	// Post Info Location
	$post_info_array = array(
		'disable' => __('Disable', 'seguente'),
		'above' => __('Above Content', 'seguente'),

	);
	
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
		
	//  =============================
    //  = Theme Options Panel       =
    //  =============================
	$wp_customize->add_panel( 'theme_options', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Seguente Theme Options', 'seguente' ),
	));
	
	//  =============================
    //  = Theme Info Section        =
    //  =============================					
	$wp_customize->add_section( 'seguente_theme_settings', array(
    	'title'          => __( 'Theme Information', 'seguente' ),
    	'priority'       => 999, 
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[theme_info]', array(
    	'default'        => '',
		'sanitize_callback' => 'seguente_no_sanitize',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new Seguente_WP_Customize_Info_Control($wp_customize, 'theme_info', array(
        'label'    => __(' ', 'seguente'),
        'section'  => 'seguente_theme_settings',
        'settings' => 'seguente_theme_options[theme_info]',
    )));

	//  =============================
    //  = General Section           =
    //  =============================					
	$wp_customize->add_section( 'seguente_general_settings', array(
    	'title'          => __( 'General Settings', 'seguente' ),
    	'priority'       => 1000,
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[theme_color]', array(
    	'default'        => '#28b78d',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_color', array(
        'label'    => __('Theme Color', 'seguente'),
        'section'  => 'seguente_general_settings',
        'settings' => 'seguente_theme_options[theme_color]',
    )));
	//===============================    
	$wp_customize->add_setting('seguente_theme_options[breadcrumbs]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('breadcrumbs', array(
        'settings' => 'seguente_theme_options[breadcrumbs]',
        'label'    => __('Display Breadcrumbs', 'seguente'),
        'section'  => 'seguente_general_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[animation]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('animation', array(
        'settings' => 'seguente_theme_options[animation]',
        'label'    => __('Enable Animation', 'seguente'),
        'section'  => 'seguente_general_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[responsive_design]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('responsive_design', array(
        'settings' => 'seguente_theme_options[responsive_design]',
        'label'    => __('Enable Responsive Design', 'seguente'),
        'section'  => 'seguente_general_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[scrollup]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('scrollup', array(
        'settings' => 'seguente_theme_options[scrollup]',
        'label'    => __('Enable Scrollup', 'seguente'),
        'section'  => 'seguente_general_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[scrollup_color]', array(
    	'default'        => '#888888',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'scrollup_color', array(
        'label'    => __('ScrollUp Color', 'seguente'),
        'section'  => 'seguente_general_settings',
        'settings' => 'seguente_theme_options[scrollup_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[scrollup_hover_color]', array(
    	'default'        => '#28b78d',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'scrollup_hover_color', array(
        'label'    => __('ScrollUp Hover Color', 'seguente'),
        'section'  => 'seguente_general_settings',
        'settings' => 'seguente_theme_options[scrollup_hover_color]',
    )));

	//  =============================
    //  = Logo Section              =
    //  =============================

	$wp_customize->add_section( 'seguente_logo_settings', array(
    	'title'          => __( 'Logo Settings', 'seguente' ),
    	'priority'       => 1001,
		'panel' => 'theme_options',
		'description' => __('To upload custom logo image - go to Appearance > Customize > Site Identity', 'seguente'),
	) );
	//===============================    
    $wp_customize->add_setting( 'seguente_theme_options[logo_width]', array(
        'default'        => '300',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_width', array(
        'label'      => __('Logo Width (px)', 'seguente'),
        'section'    => 'seguente_logo_settings',
        'settings'   => 'seguente_theme_options[logo_width]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[logo_height]', array(
        'default'        => '30',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_height', array(
        'label'      => __('Logo Height (px)', 'seguente'),
        'section'    => 'seguente_logo_settings',
        'settings'   => 'seguente_theme_options[logo_height]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[logo_top_margin]', array(
        'default'        => '12',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_top_margin', array(
        'label'      => __('Logo Top Margin (px)', 'seguente'),
        'section'    => 'seguente_logo_settings',
        'settings'   => 'seguente_theme_options[logo_top_margin]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[logo_left_margin]', array(
        'default'        => '0',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_left_margin', array(
        'label'      => __('Logo Left Margin (px)', 'seguente'),
        'section'    => 'seguente_logo_settings',
        'settings'   => 'seguente_theme_options[logo_left_margin]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[logo_bottom_margin]', array(
        'default'        => '0',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_bottom_margin', array(
        'label'      => __('Logo Bottom Margin (px)', 'seguente'),
        'section'    => 'seguente_logo_settings',
        'settings'   => 'seguente_theme_options[logo_bottom_margin]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[logo_right_margin]', array(
        'default'        => '25',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_right_margin', array(
        'label'      => __('Logo Right Margin (px)', 'seguente'),
        'section'    => 'seguente_logo_settings',
        'settings'   => 'seguente_theme_options[logo_right_margin]',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[logo_uppercase]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('logo_uppercase', array(
        'settings' => 'seguente_theme_options[logo_uppercase]',
        'label'    => __('Logo Uppercase', 'seguente'),
        'section'  => 'seguente_logo_settings',
        'type'     => 'checkbox',
    ));
	//===============================
     $wp_customize->add_setting('seguente_theme_options[google_font_logo]', array(
		'sanitize_callback' => 'seguente_sanitize_font_style',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'Montserrat',
 
    ));

    $wp_customize->add_control( 'google_font_logo', array(
        'settings' => 'seguente_theme_options[google_font_logo]',
        'label'   => __('Select logo font family','seguente'),
        'section' => 'seguente_logo_settings',
        'type'    => 'select',
        'choices'    => $google_fonts,
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[logo_font_size]', array(
        'default'        => '28',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_font_size', array(
        'label'      => __('Logo Font Size (px)', 'seguente'),
        'section'    => 'seguente_logo_settings',
        'settings'   => 'seguente_theme_options[logo_font_size]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[logo_font_weight]', array(
        'default'        => '700',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('logo_font_weight', array(
        'label'      => __('Logo Font Weight', 'seguente'),
        'section'    => 'seguente_logo_settings',
        'settings'   => 'seguente_theme_options[logo_font_weight]',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[text_logo_color]', array(
    	'default'        => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'text_logo_color', array(
        'label'    => __('Logo Color', 'seguente'),
        'section'  => 'seguente_logo_settings',
        'settings' => 'seguente_theme_options[text_logo_color]',
    )));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[enable_logo_tagline]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('enable_logo_tagline', array(
        'settings' => 'seguente_theme_options[enable_logo_tagline]',
        'label'    => __('Display Tagline Underneath Logo', 'seguente'),
        'section'  => 'seguente_logo_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[tagline_font_size]', array(
        'default'        => '16',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('tagline_font_size', array(
        'label'      => __('Tagline Font Size (px)', 'seguente'),
        'section'    => 'seguente_logo_settings',
        'settings'   => 'seguente_theme_options[tagline_font_size]',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[tagline_color]', array(
    	'default'        => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'tagline_color', array(
        'label'    => __('Tagline Color', 'seguente'),
        'section'  => 'seguente_logo_settings',
        'settings' => 'seguente_theme_options[tagline_color]',
    )));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[tagline_uppercase]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('tagline_uppercase', array(
        'settings' => 'seguente_theme_options[tagline_uppercase]',
        'label'    => __('Tagline Uppercase', 'seguente'),
        'section'  => 'seguente_logo_settings',
        'type'     => 'checkbox',
    ));
	//  =============================
    //  = Navigation Section        =
    //  =============================

	$wp_customize->add_section( 'seguente_navigation_settings', array(
    	'title'          => __( 'Navigation Settings', 'seguente' ),
    	'priority'       => 1002,
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting('seguente_theme_options[menu_sticky]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('menu_sticky', array(
        'settings' => 'seguente_theme_options[menu_sticky]',
        'label'    => __('Sticky Menu', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[menu_top_margin]', array(
        'default'        => '0',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('menu_top_margin', array(
        'label'      => __('Menu Top Margin (px)', 'seguente'),
        'section'    => 'seguente_navigation_settings',
        'settings'   => 'seguente_theme_options[menu_top_margin]',
    ));
	//===============================
     $wp_customize->add_setting('seguente_theme_options[google_font_menu]', array(
		'sanitize_callback' => 'seguente_sanitize_font_style',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'Montserrat',
 
    ));

    $wp_customize->add_control( 'google_font_menu', array(
        'settings' => 'seguente_theme_options[google_font_menu]',
        'label'   => __('Select Menu Font Family','seguente'),
        'section' => 'seguente_navigation_settings',
        'type'    => 'select',
        'choices'    => $google_fonts,
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[nav_font_size]', array(
        'default'        => '13',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('nav_font_size', array(
        'label'      => __('Menu Font Size (px)', 'seguente'),
        'section'    => 'seguente_navigation_settings',
        'settings'   => 'seguente_theme_options[nav_font_size]',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[menu_uppercase]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('menu_uppercase', array(
        'settings' => 'seguente_theme_options[menu_uppercase]',
        'label'    => __('Menu Uppercase', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[nav_font_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_font_color', array(
        'label'    => __('Navigation Menu Font Color', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'settings' => 'seguente_theme_options[nav_font_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[nav_sub_font_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_sub_font_color', array(
        'label'    => __('Navigation Sub Menu Font Color', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'settings' => 'seguente_theme_options[nav_sub_font_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[nav_border_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_border_color', array(
        'label'    => __('Navigation Menu Border Color', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'settings' => 'seguente_theme_options[nav_border_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[nav_bg_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg_color', array(
        'label'    => __('Navigation Menu Background Color', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'settings' => 'seguente_theme_options[nav_bg_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[nav_bg_sub_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg_sub_color', array(
        'label'    => __('SubMenu Background Color', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'settings' => 'seguente_theme_options[nav_bg_sub_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[nav_hover_font_color]', array(
    	'default'        => '#28b78d',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_hover_font_color', array(
        'label'    => __('Menu Hover Font Color', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'settings' => 'seguente_theme_options[nav_hover_font_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[nav_bg_hover_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg_hover_color', array(
        'label'    => __('Menu Background Hover Color', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'settings' => 'seguente_theme_options[nav_bg_hover_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[nav_cur_item_color]', array(
    	'default'        => '#28b78d',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_cur_item_color', array(
        'label'    => __('Selected Menu Color', 'seguente'),
        'section'  => 'seguente_navigation_settings',
        'settings' => 'seguente_theme_options[nav_cur_item_color]',
    )));
	//  =============================
    //  = Typography Section        =
    //  =============================
	$wp_customize->add_section( 'seguente_typography_settings', array(
    	'title'          => __( 'Typography Settings', 'seguente' ),
    	'priority'       => 1003,
		'panel' => 'theme_options',
	) );
	//===============================
     $wp_customize->add_setting('seguente_theme_options[google_font_body]', array(
		'sanitize_callback' => 'seguente_sanitize_font_style',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'Montserrat',
 
    ));

    $wp_customize->add_control( 'google_font_body', array(
        'settings' => 'seguente_theme_options[google_font_body]',
        'label'   => __('Select Body Font Family','seguente'),
        'section' => 'seguente_typography_settings',
        'type'    => 'select',
        'choices'    => $google_fonts,
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[body_font_size]', array(
        'default'        => '14',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('body_font_size', array(
        'label'      => __('Body Font Size (px)', 'seguente'),
        'section'    => 'seguente_typography_settings',
        'settings'   => 'seguente_theme_options[body_font_size]',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[body_font_color]', array(
    	'default'        => '#8a949b',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_font_color', array(
        'label'    => __('Body Font Color', 'seguente'),
        'section'  => 'seguente_typography_settings',
        'settings' => 'seguente_theme_options[body_font_color]',
    )));
	//  =============================
    //  = Header Section            =
    //  =============================
	$wp_customize->add_section( 'seguente_header_settings', array(
    	'title'          => __( 'Header Settings', 'seguente' ),
    	'priority'       => 1004,
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[header_bg_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label'    => __('Header Background Color', 'seguente'),
        'section'  => 'seguente_header_settings',
        'settings' => 'seguente_theme_options[header_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[header_opacity]', array(
        'default'        => '1',
		'sanitize_callback' => 'seguente_sanitize_opacity',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('header_opacity', array(
        'label'      => __('Header Background Color Opacity', 'seguente'),
        'section'    => 'seguente_header_settings',
        'settings'   => 'seguente_theme_options[header_opacity]',
        'type'    => 'select',
        'choices'    => $opacity,
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[header_top_enable]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('header_top_enable', array(
        'settings' => 'seguente_theme_options[header_top_enable]',
        'label'    => __('Display Top Header Section', 'seguente'),
        'section'  => 'seguente_header_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[header_address]', array(
        'default'        => '1234 Street Name, City Name, United States',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('header_address', array(
        'label'      => __('Address', 'seguente'),
        'section'    => 'seguente_header_settings',
        'settings'   => 'seguente_theme_options[header_address]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[header_phone]', array(
        'default'        => '(123) 456-7890',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('header_phone', array(
        'label'      => __('Phone Number', 'seguente'),
        'section'    => 'seguente_header_settings',
        'settings'   => 'seguente_theme_options[header_phone]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[header_email]', array(
        'default'        => 'info@yourdomain.com',
		'sanitize_callback' => 'seguente_sanitize_email',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('header_email', array(
        'label'      => __('Email', 'seguente'),
        'section'    => 'seguente_header_settings',
        'settings'   => 'seguente_theme_options[header_email]',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[address_color]', array(
    	'default'        => '#8a949b',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'address_color', array(
        'label'    => __('Top Section Font Color', 'seguente'),
        'section'  => 'seguente_header_settings',
        'settings' => 'seguente_theme_options[address_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[top_head_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'top_head_color', array(
        'label'    => __('Top Section Color', 'seguente'),
        'section'  => 'seguente_header_settings',
        'settings' => 'seguente_theme_options[top_head_color]',
    )));
	//  =============================
    //  = Home Page Section         =
    //  =============================
	$wp_customize->add_section( 'seguente_home_settings', array(
    	'title'          => __( 'Home Page Settings', 'seguente' ),
    	'priority'       => 1005,
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting('seguente_theme_options[image_slider_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('image_slider_on', array(
        'settings' => 'seguente_theme_options[image_slider_on]',
        'label'    => __('Enable Image Slider', 'seguente'),
        'section'  => 'seguente_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[about_section_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => true,
    ));
 
    $wp_customize->add_control('about_section_on', array(
        'settings' => 'seguente_theme_options[about_section_on]',
        'label'    => __('Display About Section', 'seguente'),
        'section'  => 'seguente_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[features_section_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('features_section_on', array(
        'settings' => 'seguente_theme_options[features_section_on]',
        'label'    => __('Display Features Section', 'seguente'),
        'section'  => 'seguente_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[services_section_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('services_section_on', array(
        'settings' => 'seguente_theme_options[services_section_on]',
        'label'    => __('Display Services Section', 'seguente'),
        'section'  => 'seguente_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[getin_home_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('getin_home_on', array(
        'settings' => 'seguente_theme_options[getin_home_on]',
        'label'    => __('Display Get In Touch Section', 'seguente'),
        'section'  => 'seguente_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[blog_section_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => true,
    ));
 
    $wp_customize->add_control('blog_section_on', array(
        'settings' => 'seguente_theme_options[blog_section_on]',
        'label'    => __('Display Latest News Section', 'seguente'),
        'section'  => 'seguente_home_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[social_section_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('social_section_on', array(
        'settings' => 'seguente_theme_options[social_section_on]',
        'label'    => __('Display Social Links', 'seguente'),
        'section'  => 'seguente_home_settings',
        'type'     => 'checkbox',
    ));
	//  =============================
    //  = Image Slider Section      =
    //  =============================
	$wp_customize->add_section( 'seguente_slider_settings', array(
    	'title'          => __( 'Image Slider Settings', 'seguente' ),
    	'priority'       => 1006,
		'panel' => 'theme_options',
	) );
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[default_image_slider]', array(
        'default'        => 'ideal',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('default_image_slider', array(
        'label'      => __('Default Image Slider', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[default_image_slider]',
        'type'    => 'select',
        'choices'    => $image_sliders,
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[slider_height]', array(
        'default'        => '500',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('slider_height', array(
        'label'      => __('Image Slider Height (px)', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[slider_height]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[image_slider_cat]', array(
        'default'        => '',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('image_slider_cat', array(
        'label'      => __('Image Slider Category', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[image_slider_cat]',
        'type'    => 'select',
        'choices'    => $options_categories,
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[slideshow_speed]', array(
        'default'        => '5000',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('slideshow_speed', array(
        'label'      => __('Slideshow Interval', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[slideshow_speed]',
		'description' => __('1000 = 1 second, default value: 5000', 'seguente'),
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[animation_speed]', array(
        'default'        => '800',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('animation_speed', array(
        'label'      => __('Animation Speed', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[animation_speed]',
		'description' => __('1000 = 1 second, default value: 800', 'seguente'),
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[slider_num]', array(
        'default'        => '3',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('slider_num', array(
        'label'      => __('Number of Slides', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[slider_num]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[image_slider_effect]', array(
        'default'        => 'fade',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('image_slider_effect', array(
        'label'      => __('Image Slider Effect', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[image_slider_effect]',
        'type'    => 'select',
        'choices'    => $options_effects,
		'description' => __('Can be only used with Ideal Image Slider', 'seguente'),
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[captions_on]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('captions_on', array(
        'settings' => 'seguente_theme_options[captions_on]',
        'label'    => __('Enable Slider Captions', 'seguente'),
        'section'  => 'seguente_slider_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[captions_pos_top]', array(
        'default'        => '180',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_pos_top', array(
        'label'      => __('Caption Position Top (px)', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[captions_pos_top]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[captions_width]', array(
        'default'        => '80',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_width', array(
        'label'      => __('Caption Width %', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[captions_width]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[captions_title_size]', array(
        'default'        => '44',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_title_size', array(
        'label'      => __('Caption Title Font Size px', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[captions_title_size]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[captions_text_size]', array(
        'default'        => '14',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_text_size', array(
        'label'      => __('Caption Text Font Size px', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[captions_text_size]',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[captions_box]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('captions_box', array(
        'settings' => 'seguente_theme_options[captions_box]',
        'label'    => __('Enable Captions Background', 'seguente'),
        'section'  => 'seguente_slider_settings',
        'type'     => 'checkbox',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[captions_box_color]', array(
    	'default'        => '#f6f6f6',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'captions_box_color', array(
        'label'    => __('Captions Background Color', 'seguente'),
        'section'  => 'seguente_slider_settings',
        'settings' => 'seguente_theme_options[captions_box_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[captions_box_opacity]', array(
        'default'        => '1',
		'sanitize_callback' => 'seguente_sanitize_opacity',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('captions_box_opacity', array(
        'label'      => __('Captions Background Color Opacity', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[captions_box_opacity]',
        'type'    => 'select',
        'choices'    => $opacity,
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[captions_title_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'captions_title_color', array(
        'label'    => __('Caption Title Color', 'seguente'),
        'section'  => 'seguente_slider_settings',
        'settings' => 'seguente_theme_options[captions_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[captions_text_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'captions_text_color', array(
        'label'    => __('Captions Text Color', 'seguente'),
        'section'  => 'seguente_slider_settings',
        'settings' => 'seguente_theme_options[captions_text_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[captions_button_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'captions_button_color', array(
        'label'    => __('Captions Button Color', 'seguente'),
        'section'  => 'seguente_slider_settings',
        'settings' => 'seguente_theme_options[captions_button_color]',
		'description' => __('Can be only used with Unslider Image Slider', 'seguente'),
    )));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[captions_button]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('captions_button', array(
        'settings' => 'seguente_theme_options[captions_button]',
        'label'    => __('Enable Captions Button', 'seguente'),
        'section'  => 'seguente_slider_settings',
        'type'     => 'checkbox',
		'description' => __('Can be only used with Unslider Image Slider', 'seguente'),
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[caption_button_text]', array(
        'default'        => 'Read More',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('caption_button_text', array(
        'label'      => __('Captions Button Text', 'seguente'),
        'section'    => 'seguente_slider_settings',
        'settings'   => 'seguente_theme_options[caption_button_text]',
		'description' => __('Can be only used with Unslider Image Slider', 'seguente'),
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[slider_dots]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('slider_dots', array(
        'settings' => 'seguente_theme_options[slider_dots]',
        'label'    => __('Enable Slider Dots', 'seguente'),
        'section'  => 'seguente_slider_settings',
        'type'     => 'checkbox',
		'description' => __('Can be only used with Unslider Image Slider', 'seguente'),
    ));
	//  =============================
    //  = Footer Section            =
    //  =============================
	$wp_customize->add_section( 'seguente_footer_settings', array(
    	'title'          => __( 'Footer Settings', 'seguente' ),
    	'priority'       => 1007,
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[footer_bg_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(
        'label'    => __('Footer Background Color', 'seguente'),
        'section'  => 'seguente_footer_settings',
        'settings' => 'seguente_theme_options[footer_bg_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[copyright_bg_color]', array(
    	'default'        => '#111111',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'copyright_bg_color', array(
        'label'    => __('Copyright Section Background Color', 'seguente'),
        'section'  => 'seguente_footer_settings',
        'settings' => 'seguente_theme_options[copyright_bg_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[footer_widget_title_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_widget_title_color', array(
        'label'    => __('Footer Widget Title Color', 'seguente'),
        'section'  => 'seguente_footer_settings',
        'settings' => 'seguente_theme_options[footer_widget_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[footer_widget_title_border_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_widget_title_border_color', array(
        'label'    => __('Footer Widget Title Border Color', 'seguente'),
        'section'  => 'seguente_footer_settings',
        'settings' => 'seguente_theme_options[footer_widget_title_border_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[footer_widget_text_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_widget_text_color', array(
        'label'    => __('Footer Widget Text Color', 'seguente'),
        'section'  => 'seguente_footer_settings',
        'settings' => 'seguente_theme_options[footer_widget_text_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[footer_widget_text_border_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_widget_text_border_color', array(
        'label'    => __('Footer Widget Text Border Color', 'seguente'),
        'section'  => 'seguente_footer_settings',
        'settings' => 'seguente_theme_options[footer_widget_text_border_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[footer_social_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_social_color', array(
        'label'    => __('Footer Social Icons Color', 'seguente'),
        'section'  => 'seguente_footer_settings',
        'settings' => 'seguente_theme_options[footer_social_color]',
    )));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[footer_widgets]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('footer_widgets', array(
        'settings' => 'seguente_theme_options[footer_widgets]',
        'label'    => __('Enable Footer Widgets', 'seguente'),
        'section'  => 'seguente_footer_settings',
        'type'     => 'checkbox',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[footer_copyright_text]', array(
        'default'        => 'Copyright '.date('Y').' '.get_bloginfo('site_title'),
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('footer_copyright_text', array(
        'label'      => __('Copyright Text', 'seguente'),
        'section'    => 'seguente_footer_settings',
        'settings'   => 'seguente_theme_options[footer_copyright_text]',
    ));
	//  =============================
    //  = Layout Section            =
    //  =============================
	$wp_customize->add_section( 'seguente_layout_settings', array(
    	'title'          => __( 'Layout Settings', 'seguente' ),
    	'priority'       => 1008,
		'panel' => 'theme_options',
	) );
	//===============================
     $wp_customize->add_setting('seguente_theme_options[layout_settings]', array(
		'sanitize_callback' => 'seguente_sanitize_theme_layout',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'col2-l',
 
    ));

    $wp_customize->add_control( 'layout_settings', array(
        'settings' => 'seguente_theme_options[layout_settings]',
        'label'   => __('Theme Layout','seguente'),
        'section' => 'seguente_layout_settings',
        'type'    => 'radio',
        'choices'    => $theme_layout,
    ));
	//  =============================
    //  = Blog Section              =
    //  =============================
	$wp_customize->add_section( 'seguente_blog_settings', array(
    	'title'          => __( 'Blog Settings', 'seguente' ),
    	'priority'       => 1009,
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[blog_posts_home_color]', array(
    	'default'        => '#eaeaea',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_posts_home_color', array(
        'label'    => __('Background Color', 'seguente'),
        'section'  => 'seguente_blog_settings',
        'settings' => 'seguente_theme_options[blog_posts_home_color]',
    )));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[blog_posts_home_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_posts_home_image', array(
        'label'    => __('Background Image', 'seguente'),
        'section'  => 'seguente_blog_settings',
        'settings' => 'seguente_theme_options[blog_posts_home_image]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[blog_posts_top_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_posts_top_color', array(
        'label'    => __('Top Section Background Color', 'seguente'),
        'section'  => 'seguente_blog_settings',
        'settings' => 'seguente_theme_options[blog_posts_top_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[blog_posts_top_font_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_posts_top_font_color', array(
        'label'    => __('Top Section Font Color', 'seguente'),
        'section'  => 'seguente_blog_settings',
        'settings' => 'seguente_theme_options[blog_posts_top_font_color]',
    )));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[blog_posts_top_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_posts_top_image', array(
        'label'    => __('Top Section Image', 'seguente'),
        'section'  => 'seguente_blog_settings',
        'settings' => 'seguente_theme_options[blog_posts_top_image]',
    )));

	//===============================
     $wp_customize->add_setting('seguente_theme_options[blog_content]', array(
		'sanitize_callback' => 'seguente_sanitize_blog_content',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'excerpt',
 
    ));

    $wp_customize->add_control( 'blog_content', array(
        'settings' => 'seguente_theme_options[blog_content]',
        'label'   => __('Blog Content','seguente'),
        'section' => 'seguente_blog_settings',
        'type'    => 'radio',
        'choices'    => $blog_content,
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[blog_excerpt]', array(
        'default'        => '50',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('blog_excerpt', array(
        'label'      => __('Blog Excerpt Length', 'seguente'),
        'section'    => 'seguente_blog_settings',
        'settings'   => 'seguente_theme_options[blog_excerpt]',
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[simple_paginaton]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => false,
    ));
 
    $wp_customize->add_control('simple_paginaton', array(
        'settings' => 'seguente_theme_options[simple_paginaton]',
        'label'    => __('Use Simple Pagination', 'seguente'),
        'section'  => 'seguente_blog_settings',
        'type'     => 'checkbox',
    ));
	//===============================
     $wp_customize->add_setting('seguente_theme_options[post_navigation]', array(
		'sanitize_callback' => 'seguente_sanitize_post_nav',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'below',
 
    ));

    $wp_customize->add_control( 'post_navigation', array(
        'settings' => 'seguente_theme_options[post_navigation]',
        'label'   => __('Post Navigation Links','seguente'),
        'section' => 'seguente_blog_settings',
        'type'    => 'radio',
        'choices'    => $post_nav_array,
    ));
	//===============================
     $wp_customize->add_setting('seguente_theme_options[post_info]', array(
		'sanitize_callback' => 'seguente_sanitize_post_info',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
		'default'        => 'above',
 
    ));

    $wp_customize->add_control( 'post_info', array(
        'settings' => 'seguente_theme_options[post_info]',
        'label'   => __('Post Info Position','seguente'),
        'section' => 'seguente_blog_settings',
        'type'    => 'radio',
        'choices'    => $post_info_array,
    ));
	//===============================
	$wp_customize->add_setting('seguente_theme_options[featured_img_post]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'seguente_sanitize_checkbox',
        'type'       => 'option',
		'default'        => '1',
    ));
 
    $wp_customize->add_control('featured_img_post', array(
        'settings' => 'seguente_theme_options[featured_img_post]',
        'label'    => __('Featured Image Inside the Post', 'seguente'),
        'section'  => 'seguente_blog_settings',
        'type'     => 'checkbox',
    ));
	//  =============================
    //  = About Us Settings         =
    //  =============================
	$wp_customize->add_section( 'seguente_about_settings', array(
    	'title'          => __( 'About Us Section', 'seguente' ),
    	'priority'       => 1010,
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[about_page]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('about_page', array(
	        'label'      => __('About Us Page', 'seguente'),
	        'section'    => 'seguente_about_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'seguente_theme_options[about_page]',
			'description' => __('Select Page to Display in About Us Section', 'seguente'),
    	));	
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[about_bg_color]', array(
    	'default'        => '#8a949b',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'about_bg_color', array(
        'label'    => __('Background Color', 'seguente'),
        'section'  => 'seguente_about_settings',
        'settings' => 'seguente_theme_options[about_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[about_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'about_bg_image', array(
        'label'    => __('Background Image', 'seguente'),
        'section'  => 'seguente_about_settings',
        'settings' => 'seguente_theme_options[about_bg_image]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[about_header_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'about_header_color', array(
        'label'    => __('Title Color', 'seguente'),
        'section'  => 'seguente_about_settings',
        'settings' => 'seguente_theme_options[about_header_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[about_button_text]', array(
        'default'        => 'Read More',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('about_button_text', array(
        'label'      => __('Button Text', 'seguente'),
        'section'    => 'seguente_about_settings',
        'settings'   => 'seguente_theme_options[about_button_text]',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[about_button_color]', array(
    	'default'        => '#28b78d',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'about_button_color', array(
        'label'    => __('Button Color', 'seguente'),
        'section'  => 'seguente_about_settings',
        'settings' => 'seguente_theme_options[about_button_color]',
    )));
	//  =============================
    //  = Features Settings         =
    //  =============================
	$wp_customize->add_section( 'seguente_features_settings', array(
    	'title'          => __( 'Features Section', 'seguente' ),
    	'priority'       => 1011,
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[features_bg_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_bg_color', array(
        'label'    => __('Background Color', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[features_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[features_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'features_bg_image', array(
        'label'    => __('Background Image', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[features_bg_image]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[features_title_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_title_color', array(
        'label'    => __('Title Color', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[features_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[features_text_color]', array(
    	'default'        => '#888888',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_text_color', array(
        'label'    => __('Text Color', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[features_text_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[features_icons_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_icons_color', array(
        'label'    => __('Incons Color', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[features_icons_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[features_circle_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'features_circle_color', array(
        'label'    => __('Squares Color', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[features_circle_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[feature_icon_size]', array(
        'default'        => '32',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_size', array(
        'label'      => __('Icons Size (px)', 'seguente'),
        'section'    => 'seguente_features_settings',
        'settings'   => 'seguente_theme_options[feature_icon_size]',
    ));

	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[features_page_1]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('features_page_1', array(
	        'label'      => __('Feature #1', 'seguente'),
	        'section'    => 'seguente_features_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'seguente_theme_options[features_page_1]',
			'description' => __('Select Page to Display as One of the Features', 'seguente'),
    	));	
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[feature_icon_1]', array(
        'default'        => 'fa-tablet',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_1', array(
        'label'      => __('Feature #1 Icon', 'seguente'),
        'section'    => 'seguente_features_settings',
        'settings'   => 'seguente_theme_options[feature_icon_1]',
		'description' => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'seguente' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    ));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[feature_image_1]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'feature_image_1', array(
        'label'    => __('Feature #1 Image', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[feature_image_1]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[features_page_2]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('features_page_2', array(
	        'label'      => __('Feature #2', 'seguente'),
	        'section'    => 'seguente_features_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'seguente_theme_options[features_page_2]',
			'description' => __('Select Page to Display as One of the Features', 'seguente'),
    	));	
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[feature_icon_2]', array(
        'default'        => 'fa-tint',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_2', array(
        'label'      => __('Feature #2 Icon', 'seguente'),
        'section'    => 'seguente_features_settings',
        'settings'   => 'seguente_theme_options[feature_icon_2]',
		'description' => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'seguente' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    ));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[feature_image_2]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'feature_image_2', array(
        'label'    => __('Feature #2 Image', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[feature_image_2]',
    )));


	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[features_page_3]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('features_page_3', array(
	        'label'      => __('Feature #3', 'seguente'),
	        'section'    => 'seguente_features_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'seguente_theme_options[features_page_3]',
			'description' => __('Select Page to Display as One of the Features', 'seguente'),
    	));	
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[feature_icon_3]', array(
        'default'        => 'fa-html5',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_3', array(
        'label'      => __('Feature #3 Icon', 'seguente'),
        'section'    => 'seguente_features_settings',
        'settings'   => 'seguente_theme_options[feature_icon_3]',
		'description' => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'seguente' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    ));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[feature_image_3]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'feature_image_3', array(
        'label'    => __('Feature #3 Image', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[feature_image_3]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[features_page_4]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('features_page_4', array(
	        'label'      => __('Feature #4', 'seguente'),
	        'section'    => 'seguente_features_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'seguente_theme_options[features_page_4]',
			'description' => __('Select Page to Display as One of the Features', 'seguente'),
    	));	
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[feature_icon_4]', array(
        'default'        => 'fa-shopping-cart',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('feature_icon_4', array(
        'label'      => __('Feature #4 Icon', 'seguente'),
        'section'    => 'seguente_features_settings',
        'settings'   => 'seguente_theme_options[feature_icon_4]',
		'description' => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'seguente' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    ));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[feature_image_4]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'feature_image_4', array(
        'label'    => __('Feature #4 Image', 'seguente'),
        'section'  => 'seguente_features_settings',
        'settings' => 'seguente_theme_options[feature_image_4]',
    )));
	//  =============================
    //  = Services Settings         =
    //  =============================
	$wp_customize->add_section( 'seguente_services_settings', array(
    	'title'          => __( 'Services Section', 'seguente' ),
    	'priority'       => 1012,
		'panel' => 'theme_options',
	) );
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[services_bg_color]', array(
    	'default'        => '#8a949b',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'services_bg_color', array(
        'label'    => __('Background Color', 'seguente'),
        'section'  => 'seguente_services_settings',
        'settings' => 'seguente_theme_options[services_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[services_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'services_bg_image', array(
        'label'    => __('Background Image', 'seguente'),
        'section'  => 'seguente_services_settings',
        'settings' => 'seguente_theme_options[services_bg_image]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[services_title_color]', array(
    	'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'services_title_color', array(
        'label'    => __('Title Color', 'seguente'),
        'section'  => 'seguente_services_settings',
        'settings' => 'seguente_theme_options[services_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[services_text_color]', array(
    	'default'        => '#e0e0e0',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'services_text_color', array(
        'label'    => __('Section Text Color', 'seguente'),
        'section'  => 'seguente_services_settings',
        'settings' => 'seguente_theme_options[services_text_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[services_icon_color]', array(
    	'default'        => '#e0e0e0',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'services_icon_color', array(
        'label'    => __('Section Icons Color', 'seguente'),
        'section'  => 'seguente_services_settings',
        'settings' => 'seguente_theme_options[services_icon_color]',
    )));
	//===============================
	for ( $count = 1; $count <= 6; $count++ ) {
    	$wp_customize->add_setting( 'seguente_theme_options[service_page_'.$count.']', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('service_page_'.$count, array(
	        'label'      => __('Service #', 'seguente') .$count,
	        'section'    => 'seguente_services_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'seguente_theme_options[service_page_'.$count.']',
			'description' => __('Select Page to Display as One of the Services', 'seguente'),
    	));
		//===============================	
		$wp_customize->add_setting( 'seguente_theme_options[service_icon_'. $count .']', array(
        	'default'        => '',
			'sanitize_callback' => 'seguente_sanitize_cb',
    	    'capability'     => 'edit_theme_options',
        	'type'           => 'option',
 
    	));
 
    	$wp_customize->add_control('service_icon_'.$count, array(
        	'label'      => __('Icon to Display in Box #','seguente') . $count,
	        'section'    => 'seguente_services_settings',
    	    'settings'   => 'seguente_theme_options[service_icon_'.$count.']',
			'description' => sprintf( __( 'Enter Font Awesome icon name. For example: fa-coffee. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'seguente' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
    	));
	}
	//  =============================
    //  = Get In Touch Settings     =
    //  =============================
	$wp_customize->add_section( 'seguente_git_settings', array(
    	'title'          => __( 'Get In Touch Section', 'seguente' ),
    	'priority'       => 1016,
		'panel' => 'theme_options',
	));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[getin_page]', array(
        	'default'        => '',
			'sanitize_callback' => 'absint',
	        'capability'     => 'edit_theme_options',
    	    'type'           => 'option',
    	));
 
		$wp_customize->add_control('getin_page', array(
	        'label'      => __('Get In Touch Page', 'seguente'),
	        'section'    => 'seguente_git_settings',
			'type'    => 'dropdown-pages',
	        'settings'   => 'seguente_theme_options[getin_page]',
			'description' => __('Select Page to Display in Get In Touch Section', 'seguente'),
    	));	
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[getin_bg_color]', array(
    	'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'getin_bg_color', array(
        'label'    => __('Background Color', 'seguente'),
        'section'  => 'seguente_git_settings',
        'settings' => 'seguente_theme_options[getin_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[getin_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'getin_bg_image', array(
        'label'    => __('Background Image', 'seguente'),
        'section'  => 'seguente_git_settings',
        'settings' => 'seguente_theme_options[getin_bg_image]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[getin_header_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'getin_header_color', array(
        'label'    => __('Title Color', 'seguente'),
        'section'  => 'seguente_git_settings',
        'settings' => 'seguente_theme_options[getin_header_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[getin_text_color]', array(
    	'default'        => '#888888',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'getin_text_color', array(
        'label'    => __('Subtitle Color', 'seguente'),
        'section'  => 'seguente_git_settings',
        'settings' => 'seguente_theme_options[getin_text_color]',
    )));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[getin_button_text]', array(
        'default'        => 'Contact us now',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('getin_button_text', array(
        'label'      => __('Button Text', 'seguente'),
        'section'    => 'seguente_git_settings',
        'settings'   => 'seguente_theme_options[getin_button_text]',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[getin_button_color]', array(
    	'default'        => '#28b78d',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'getin_button_color', array(
        'label'    => __('Button Color', 'seguente'),
        'section'  => 'seguente_git_settings',
        'settings' => 'seguente_theme_options[getin_button_color]',
    )));
	//  =============================
    //  = Latest News Settings      =
    //  =============================
	$wp_customize->add_section( 'seguente_news_settings', array(
    	'title'          => __( 'Latest News Section', 'seguente' ),
    	'priority'       => 1017,
		'panel' => 'theme_options',
	));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[blog_bg_color]', array(
    	'default'        => '#eaeaea',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_bg_color', array(
        'label'    => __('Background Color', 'seguente'),
        'section'  => 'seguente_news_settings',
        'settings' => 'seguente_theme_options[blog_bg_color]',
    )));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[blog_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_bg_image', array(
        'label'    => __('Background Image', 'seguente'),
        'section'  => 'seguente_news_settings',
        'settings' => 'seguente_theme_options[blog_bg_image]',
    )));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[blog_cat]', array(
        'default'        => '',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('blog_cat', array(
        'label'      => __('Latest News Category', 'seguente'),
        'section'    => 'seguente_news_settings',
        'settings'   => 'seguente_theme_options[blog_cat]',
        'type'    => 'select',
        'choices'    => $options_categories,
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[num_posts]', array(
        'default'        => '3',
		'sanitize_callback' => 'seguente_sanitize_number',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('num_posts', array(
        'label'      => __('Number of Posts', 'seguente'),
        'section'    => 'seguente_news_settings',
        'settings'   => 'seguente_theme_options[num_posts]',
    ));
	//===============================
    $wp_customize->add_setting( 'seguente_theme_options[blog_section_title]', array(
        'default'        => 'Latest News',
		'sanitize_callback' => 'seguente_sanitize_cb',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('blog_section_title', array(
        'label'      => __('Title Text', 'seguente'),
        'section'    => 'seguente_news_settings',
        'settings'   => 'seguente_theme_options[blog_section_title]',
    ));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[blog_title_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_title_color', array(
        'label'    => __('Title Color', 'seguente'),
        'section'  => 'seguente_news_settings',
        'settings' => 'seguente_theme_options[blog_title_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[blog_post_color]', array(
    	'default'        => '#243743',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_post_color', array(
        'label'    => __('Post Title Color', 'seguente'),
        'section'  => 'seguente_news_settings',
        'settings' => 'seguente_theme_options[blog_post_color]',
    )));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[blog_button_color]', array(
    	'default'        => '#28b78d',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'blog_button_color', array(
        'label'    => __('Button Color', 'seguente'),
        'section'  => 'seguente_news_settings',
        'settings' => 'seguente_theme_options[blog_button_color]',
    )));
	//  =============================
    //  = Social Settings           =
    //  =============================
	$wp_customize->add_section( 'seguente_social_settings', array(
    	'title'          => __( 'Social Links', 'seguente' ),
    	'priority'       => 1018,
		'panel' => 'theme_options',
		'description' => __("Enter your profile URL. To remove it, just leave it blank","seguente"),
	));
	//===============================
	$wp_customize->add_setting( 'seguente_theme_options[social_color]', array(
    	'default'        => '#f6f6f6',
		'sanitize_callback' => 'sanitize_hex_color',
    	'type'           => 'option',
    	'capability'     => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'social_color', array(
        'label'    => __('Background Color', 'seguente'),
        'section'  => 'seguente_social_settings',
        'settings' => 'seguente_theme_options[social_color]',
    )));
	//===============================
    $wp_customize->add_setting('seguente_theme_options[social_bg_image]', array(
        'default'           => '',
		'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'social_bg_image', array(
        'label'    => __('Background Image', 'seguente'),
        'section'  => 'seguente_social_settings',
        'settings' => 'seguente_theme_options[social_bg_image]',
    )));
}
 
add_action('customize_register', 'seguente_customize_register');


/**
 * Sets up theme custom styling
 * 
 */
function seguente_theme_custom_styling() {
	$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
	/**
	 * General Settings 
	 */	
	$theme_color = $seguente_theme_options['theme_color'];
	$scrollup_color = $seguente_theme_options['scrollup_color'];
	$scrollup_hover_color = $seguente_theme_options['scrollup_hover_color'];
	/**
	 * Logo Settings 
	 */		
	$logo_width = $seguente_theme_options['logo_width'];
	$logo_height = $seguente_theme_options['logo_height'];
	$logo_top_margin = $seguente_theme_options['logo_top_margin'];
	$logo_left_margin = $seguente_theme_options['logo_left_margin'];
	$logo_bottom_margin = $seguente_theme_options['logo_bottom_margin'];
	$logo_right_margin = $seguente_theme_options['logo_right_margin'];
	$logo_uppercase = $seguente_theme_options['logo_uppercase'];
	$google_font_logo = $seguente_theme_options['google_font_logo'];
	$logo_font_size = $seguente_theme_options['logo_font_size'];
	$logo_font_weight = $seguente_theme_options['logo_font_weight'];
	$text_logo_color = $seguente_theme_options['text_logo_color'];
	$tagline_font_size = $seguente_theme_options['tagline_font_size'];
	$tagline_color = $seguente_theme_options['tagline_color'];
	$tagline_uppercase = $seguente_theme_options['tagline_uppercase'];
	/**
	 * Navigation Settings
	 */	
	$menu_sticky = $seguente_theme_options['menu_sticky'];
	$menu_top_margin = $seguente_theme_options['menu_top_margin'];
	$google_font_menu = $seguente_theme_options['google_font_menu'];
	$nav_font_size = $seguente_theme_options['nav_font_size'];
	$menu_uppercase = $seguente_theme_options['menu_uppercase'];
	$nav_font_color = $seguente_theme_options['nav_font_color'];
	$nav_sub_font_color = $seguente_theme_options['nav_sub_font_color'];
	$nav_border_color = $seguente_theme_options['nav_border_color'];
	$nav_bg_color = $seguente_theme_options['nav_bg_color'];
	$nav_bg_sub_color = $seguente_theme_options['nav_bg_sub_color'];
	$nav_hover_font_color = $seguente_theme_options['nav_hover_font_color'];
	$nav_bg_hover_color = $seguente_theme_options['nav_bg_hover_color'];
	$nav_cur_item_color = $seguente_theme_options['nav_cur_item_color'];
	/**
	 * Typography Settings
	 */	
	$google_font_body = $seguente_theme_options['google_font_body'];
	$body_font_size = $seguente_theme_options['body_font_size'];
	$body_font_color = $seguente_theme_options['body_font_color'];
	/**
	 * Header Settings
	 */	
	$header_bg_color = $seguente_theme_options['header_bg_color'];
	$header_opacity = $seguente_theme_options['header_opacity'];
	$address_color = $seguente_theme_options['address_color'];
	$top_head_color = $seguente_theme_options['top_head_color'];
	/**
	 * Image Slider 
	 */	
	$slider_height = $seguente_theme_options['slider_height'];
	$captions_pos_top = $seguente_theme_options['captions_pos_top'];
	$captions_width = $seguente_theme_options['captions_width'];
	$captions_title_color = $seguente_theme_options['captions_title_color'];
	$captions_text_color = $seguente_theme_options['captions_text_color'];
	$captions_button_color = $seguente_theme_options['captions_button_color'];
	$slider_dots = $seguente_theme_options['slider_dots'];
	$captions_title_size = $seguente_theme_options['captions_title_size'];
	$captions_text_size = $seguente_theme_options['captions_text_size'];
	$captions_box = $seguente_theme_options['captions_box'];
	$captions_box_color = $seguente_theme_options['captions_box_color'];
	$captions_box_opacity = $seguente_theme_options['captions_box_opacity'];
	/**
	 * Footer Settings
	 */
	$footer_bg_color = $seguente_theme_options['footer_bg_color'];
	$copyright_bg_color = $seguente_theme_options['copyright_bg_color'];
	$footer_widget_title_color = $seguente_theme_options['footer_widget_title_color'];
	$footer_widget_title_border_color = $seguente_theme_options['footer_widget_title_border_color'];
	$footer_widget_text_color = $seguente_theme_options['footer_widget_text_color'];
	$footer_widget_text_border_color = $seguente_theme_options['footer_widget_text_border_color'];
	$footer_social_color = $seguente_theme_options['footer_social_color'];
	/**
	 * Blog Settings
	 */	
	$blog_posts_home_color = $seguente_theme_options['blog_posts_home_color'];
	$blog_bg_color = $seguente_theme_options['blog_bg_color'];
	$blog_title_color = $seguente_theme_options['blog_title_color'];
	$blog_post_color = $seguente_theme_options['blog_post_color'];
	$blog_posts_top_color = $seguente_theme_options['blog_posts_top_color'];
	$blog_posts_top_font_color = $seguente_theme_options['blog_posts_top_font_color'];
	$blog_button_color = $seguente_theme_options['blog_button_color'];
	/**
	* Features Section
	*/
	$features_bg_color = $seguente_theme_options['features_bg_color'];
	$features_text_color = $seguente_theme_options['features_text_color'];
	$features_title_color = $seguente_theme_options['features_title_color'];
	$features_icons_color = $seguente_theme_options['features_icons_color'];
	$feature_icon_size = $seguente_theme_options['feature_icon_size'];
	$features_circle_color = $seguente_theme_options['features_circle_color'];
	/**
	* About Section
	*/
	$about_bg_color = $seguente_theme_options['about_bg_color'];
	$about_header_color = $seguente_theme_options['about_header_color'];
	$about_button_color = $seguente_theme_options['about_button_color'];
	/**
	* Our Services Section
	*/
	$services_bg_color = $seguente_theme_options['services_bg_color'];
	$services_title_color = $seguente_theme_options['services_title_color'];
	$services_text_color = $seguente_theme_options['services_text_color'];
	$services_icon_color = $seguente_theme_options['services_icon_color'];
	/**
	* Get in Touch Section
	*/
	$getin_header_color = $seguente_theme_options['getin_header_color'];
	$getin_text_color = $seguente_theme_options['getin_text_color'];
	$getin_button_color = $seguente_theme_options['getin_button_color'];
	$getin_bg_color = $seguente_theme_options['getin_bg_color'];
	/**
	* Social Section
	*/
	$social_color = $seguente_theme_options['social_color'];
	
	$output = '';

	/**
	 * General Settings 
	 */
	if ( $theme_color )
	$output .= 'blockquote, address, .page-links a:hover, .post-format-wrap, .sidebar .widget .widget-separator-holder .widget-separator {border-color:' . $theme_color . '}' . "\n";
	$output .= '.meta span i, .more-link, .post-title h3:hover, #main .standard-posts-wrapper .posts-wrapper .post-single .text-holder-full .post-format-wrap p.link-text a:hover, .breadcrumbs .breadcrumbs-wrap ul li a:hover, #article p a, .navigation a, .link-post i.fa, .quote-post i.fa, #article .link-post p.link-text a:hover, .link-post p.link-text a:hover, .quote-post span.quote-author, .post-single ul.link-pages li a strong, .post-info span i, .footer-widget-col ul li a:hover, .sidebar ul.link-pages li.next-link a span, .sidebar ul.link-pages li.previous-link a span, .sidebar ul.link-pages li i, .btn-default:hover, .post-tags a, .post-title h2:hover, a:hover {color:' . $theme_color . '}' . "\n";
	$output .= 'button, .page-links a:hover {background:' . $theme_color . '}' . "\n";
	$output .= '.search-submit,.wpcf7-submit,.main-navigation ul ul, .content-boxes .circle, .section-title-right:after, .section-title:after, .content-btn, #comments .form-submit #submit, .post-button, .simple-pagination span, .pagination span, .pagination a {background-color:' . $theme_color . '}' . "\n";
	
	if ( $scrollup_color )
	$output .= '.back-to-top {color:' . $scrollup_color . '}' . "\n";
	
	if ( $scrollup_hover_color )
	$output .= '.back-to-top i.fa:hover {color:' . $scrollup_hover_color . '}' . "\n";

	/**
	 * Logo Settings 
	 */	
	if ( $logo_width )
	$output .= '#logo {width:' . $logo_width . 'px }' . "\n";
	
	if ( $logo_height )
	$output .= '#logo {height:' . $logo_height . 'px }' . "\n";
	
	if ( $logo_top_margin )
	$output .= '#logo { margin-top:' . $logo_top_margin . 'px }' . "\n";
	
	if ( $logo_left_margin )
	$output .= '#logo { margin-left:' . $logo_left_margin . 'px }' . "\n";
	
	if ( $logo_bottom_margin )
	$output .= '#logo { margin-bottom:' . $logo_bottom_margin . 'px }' . "\n";
	
	if ( $logo_right_margin )
	$output .= '#logo { margin-right:' . $logo_right_margin . 'px }' . "\n";
	
	if ( $logo_uppercase == '1' )
	$output .= '#logo {text-transform: uppercase }' . "\n";
	
	if ( $google_font_logo )
	$output .= '#logo {font-family:' . $google_font_logo . '}' . "\n";
	
	if ( $logo_font_size )
	$output .= '#logo {font-size:' . $logo_font_size . 'px }' . "\n";
	
	if ( $logo_font_weight )
	$output .= '#logo {font-weight:' . $logo_font_weight . '}' . "\n";

	if ( $text_logo_color )
	$output .= '#logo a {color:' . $text_logo_color . '}' . "\n";
	
	if ( $tagline_font_size )
	$output .= '#logo h5.site-description {font-size:' . $tagline_font_size . 'px }' . "\n";
	
	if ( $tagline_color )
	$output .= '#logo .site-description {color:' . $tagline_color . '}' . "\n";
	
	if ( $tagline_uppercase == '0' )
	$output .= '#logo .site-description {text-transform: none}' . "\n";

	if ( $tagline_uppercase == '1' )
	$output .= '#logo .site-description {text-transform: uppercase}' . "\n";

	/**
	 * Navigation Settings
	 */	
	if ( $menu_top_margin )
	$output .= '#navbar {margin-top:'. $menu_top_margin .'px}' . "\n";
	
	if ( $google_font_menu )
	$output .= '#navbar ul li a {font-family:' . $google_font_menu . '}' . "\n";
	
	if ( $nav_font_size )
	$output .= '#navbar ul li a {font-size:' . $nav_font_size . 'px}' . "\n";
	
	if ( $menu_uppercase == '1' )
	$output .= '#navbar ul li a {text-transform: uppercase;}' . "\n";
	
	if ( $nav_font_color )
	$output .= '.navbar-nav li a {color:' . $nav_font_color . '}' . "\n";
	
	if ( $nav_sub_font_color )
	$output .= '.navbar-nav .dropdown-menu li a {color:' . $nav_sub_font_color . '}' . "\n";
	
	if ( $nav_border_color )
	$output .= '.dropdown-menu {border-bottom: 5px solid ' . $nav_border_color . '}' . "\n";
	
	if ( $nav_bg_color )
	$output .= '.navbar-nav {background-color:' . $nav_bg_color . '}' . "\n";
	
	if ( $nav_bg_sub_color )
	$output .= '.dropdown-menu { background:'.$nav_bg_sub_color . '}' . "\n";
	
	if ( $nav_hover_font_color )
	$output .= '.navbar-nav li a:hover {color:' . $nav_hover_font_color . '}' . "\n";
	
	if ( $nav_bg_hover_color )
	$output .= '.navbar-nav ul li a:hover, .navbar-nav ul li a:focus, .navbar-nav ul li a.active, .navbar-nav ul li a.active-parent, .navbar-nav ul li.current_page_item a, #menu-navmenu li a:hover { background:' . $nav_bg_hover_color . '}' . "\n";
	
	if ( $nav_cur_item_color )
	$output .= '.active a { color:' . $nav_cur_item_color . ' !important}' . "\n";
	/**
	 * Typography Settings
	 */	
	if ( $google_font_body != 'None' )
	$output .= 'body {font-family:' . $google_font_body . '}' . "\n";
	
	if ( $body_font_size )
	$output .= 'body, p {font-size:' . $body_font_size . 'px}' . "\n";
	
	if ( $body_font_color )
	$output .= 'body {color:' . $body_font_color . '}' . "\n";
	/**
	 * Header Settings
	 */
	if ( $header_bg_color )
	$output .= '#header-holder { background-color: ' . $header_bg_color . '}' . "\n";
	
	if ( $header_opacity )
	$output .= '#header-holder {opacity:'. $header_opacity .'}' . "\n";
	
	if ( $address_color )
	$output .= '#header-top .top-phone, #header-top p, #header-top a, #header-top i, .top-address { color:' . $address_color . '}' . "\n";
	
	if ( $top_head_color )
	$output .= '#header-top { background-color: ' . $top_head_color . '}' . "\n";
	/**
	 * Image Slider 
	 */	
	if ( $slider_height )
	$output .= '.banner ul li { height:' . $slider_height . 'px;}' . "\n";

	if ( $captions_title_color )
	$output .= '.banner .inner h1 { color:' . $captions_title_color . '}' . "\n";
	$output .= '.iis-caption-title a { color:' . $captions_title_color . '}' . "\n";
	
	if ( $captions_text_color )
	$output .= '.banner .inner p { color: ' . $captions_text_color . '}' . "\n";
	$output .= '.iis-caption-content p { color: ' . $captions_text_color . '}' . "\n";
	
	if ( $captions_button_color )
	$output .= '.banner .btn { color: ' . $captions_button_color . '}' . "\n";
	$output .= '.banner .btn { border-color: ' . $captions_button_color . '}' . "\n";	
	
	if ( $captions_pos_top )
	$output .= '.banner .inner { padding-top: ' . $captions_pos_top . 'px}' . "\n";
	$output .= '.iis-caption { margin-top: ' . $captions_pos_top . 'px}' . "\n";
	
	if ( $captions_width )
	$output .= '.banner .inner { width: ' . $captions_width . '%}' . "\n";
	$output .= '.iis-caption { max-width: ' . $captions_width . '%}' . "\n";
	
	if ( $slider_dots == false )
	$output .= '.banner ol.dots { display: none;}' . "\n";
	
	if ( $captions_title_size )
	$output .= '.ideal-image-slider .iis-caption .iis-caption-title a { font-size: ' . $captions_title_size . 'px}' . "\n";
	$output .= '.ideal-image-slider .iis-caption .iis-caption-title a { line-height: ' . $captions_title_size . 'px}' . "\n";
	
	if ( $captions_text_size )
	$output .= '.iis-caption-content p { font-size: ' . $captions_text_size . 'px}' . "\n";
	
	if ( $captions_box == true )
	$output .= '.iis-caption { background: ' . $captions_box_color . '}' . "\n"; 
	
	if ( $captions_box_opacity )
	$output .= '.iis-caption { opacity: ' . $captions_box_opacity . '}' . "\n";
	 
	/**
	 * Footer Settings
	 */
	if ( $footer_bg_color )
	$output .= '#footer { background-color:' . $footer_bg_color . '}' . "\n";

	if ( $copyright_bg_color )
	$output .= '#copyright { background-color:' . $copyright_bg_color . '}' . "\n";
	
	if ( $footer_widget_title_color )
	$output .= '.footer-widget-col h4 { color:' . $footer_widget_title_color . '}' . "\n";
	
	if ( $footer_widget_title_border_color )
	$output .= '.footer-widget-col h4 { border-bottom: 4px solid ' . $footer_widget_title_border_color . '}' . "\n";
	
	if ( $footer_widget_text_color )
	$output .= '.footer-widget-col a, .footer-widget-col { color:' . $footer_widget_text_color . '}' . "\n";

	if ( $footer_widget_text_border_color )
	$output .= '.footer-widget-col ul li { border-bottom: 1px solid ' . $footer_widget_text_border_color . '}' . "\n";
	
	if ( $footer_social_color )
	$output .= '#social-bar-footer ul li a i { color:' . $footer_social_color . '}' . "\n";
	/**
	 * Blog Settings 
	 */
	if ($blog_posts_home_color)
	$output .= '.home-blog {background: none repeat scroll 0 0 ' . $blog_posts_home_color . '}' . "\n";

	if ($blog_post_color)
	$output .= '.from-blog h3 {color:' . $blog_post_color . ';}' . "\n";
	
	if ($blog_title_color)
	$output .= '.from-blog h2 {color:' . $blog_title_color . ';}' . "\n";
	
	if ($blog_bg_color)
	$output .= '.from-blog {background: none repeat scroll 0 0 ' . $blog_bg_color . ';}' . "\n";
	
	if ($blog_posts_top_color)
	$output .= '.blog-top-image {background: none repeat scroll 0 0 ' . $blog_posts_top_color . ';}' . "\n";
	
	if ($blog_posts_top_font_color)
	$output .= '.blog-top-image h1.section-title, .blog-top-image h1.section-title-right {color:' . $blog_posts_top_font_color . ';}' . "\n";
	
	if ($blog_button_color)
	$output .= '.from-blog a.blog-read-more {background-color: ' . $blog_button_color . ';}' . "\n";
	
	/**
	* Features Section
	*/
	if ( $features_bg_color )
	$output .= '#features { background-color:' . $features_bg_color . ';}' . "\n";
	
	if ( $features_text_color )
	$output .= 'h4.sub-title, #features p { color:' . $features_text_color . ';}' . "\n";
	
	if ( $features_title_color )
	$output .= '#features .section-title, #features h3 { color:' . $features_title_color . ';}' . "\n";
	
	if ( $features_icons_color )
	$output .= '#features .feature i.fa { color:' . $features_icons_color . ';}' . "\n";
	
	if ( $feature_icon_size)
	$output .= '#features .feature .circle i.fa { font-size:' . $feature_icon_size . 'px;}' . "\n";
	
	if ( $features_circle_color)
	$output .= '#features .feature .circle { background-color:' . $features_circle_color . ';}' . "\n";
	/**
	* About Section
	*/
	if ($about_header_color)
	$output .= '.about h2, .about h2 a {color:' . $about_header_color . ';}' . "\n";
	
	if ($about_bg_color)
	$output .= '.about {background: none repeat scroll 0 0 ' . $about_bg_color . ';}' . "\n";
	
	if ($about_button_color)
	$output .= '.about a.about-link {background-color: ' . $about_button_color . ';}' . "\n";
	/**
	* Our Services Section
	*/
	if ( $services_bg_color )
	$output .= '#services { background-color:' . $services_bg_color . ';}' . "\n";
	
	if ( $services_title_color )
	$output .= '#services h3, #services h3 a, .services-left .service .service-head h3 a { color:' . $services_title_color . ';}' . "\n";
	
	if ( $services_text_color )
	$output .= '#services p { color:' . $services_text_color . ';}' . "\n";
	
	if ($services_icon_color)
	$output .= '.services i.fa, .services-left .circle i.fa { color:' . $services_icon_color . ';}' . "\n";
	/**
	* Get in Touch Section
	*/
	if ($getin_bg_color)
	$output .= '.get-in-touch { background-color: ' . $getin_bg_color . '}' . "\n";
	
	if ($getin_header_color)
	$output .= '.get-in-touch h2.boxtitle, .get-in-touch h2.boxtitle a {color:' . $getin_header_color . ';}' . "\n";
	
	if ($getin_text_color)
	$output .= '.get-in-touch h4.sub-title, .get-in-touch p {color:' . $getin_text_color . ';}' . "\n";
	
	if ( $getin_button_color )
	$output .= '.git-link { background-color: ' . $getin_button_color . '}' . "\n";
	/**
	* Social Section
	*/
	if ( $social_color )
	$output .= '.social { background-color: ' . $social_color . '}' . "\n";
			
	// Output styles
	if ( isset( $output ) && $output != '' ) {
		$output = strip_tags( $output );
		$output = "<!--Custom Styling-->\n<style media=\"screen\" type=\"text/css\">\n" . esc_html($output) . "</style>\n";
		echo $output;
	}
}
add_action('wp_head','seguente_theme_custom_styling');

/**
 * Sanitization for checkbox input
 *
 * @param $input string (1 or empty) checkbox state
 * @return $output '1' or false
 */
function seguente_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}

/**
 * Sanitization for font style
 */
function seguente_sanitize_font_style( $value ) {
	$recognized = seguente_font_styles();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'seguente_font_style', current( $recognized ) );
}

/**
 * Sanitization for opacity value
 */
function seguente_sanitize_opacity( $value ) {
	$recognized = seguente_opacity();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'seguente_opacity', current( $recognized ) );
}

/**
 * Sanitization for layout value
 */
function seguente_sanitize_theme_layout( $value ) {
	$recognized = seguente_layout();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'seguente_layout', current( $recognized ) );
}

/**
 * Sanitization for navigation position
 */
function seguente_sanitize_post_nav( $value ) {
	$recognized = seguente_post_nav();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'seguente_post_nav', current( $recognized ) );
}

/**
 * Sanitization for post info position
 */
function seguente_sanitize_post_info( $value ) {
	$recognized = seguente_post_info();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'seguente_post_info', current( $recognized ) );
}

/**
 * Sanitization for blog content value
 */
function seguente_sanitize_blog_content( $value ) {
	$recognized = seguente_blog_content();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'seguente_blog_content', current( $recognized ) );
}

function seguente_sanitize_cat ( $input, $option ) {
	$output = '';
	if ( array_key_exists( $input, $option ) ) {
		$output = $input;
	}
	return $output;
}

/**
 * Sanitization callback function
 */
function seguente_sanitize_cb( $input ) {     
	return wp_kses_post( $input );
}

/**
 * Sanitization to validate that the input value is an integer
 */
function seguente_sanitize_number( $input ) {
	return absint( $input );
}

/**
 * Sanitization for image position
*/
function seguente_sanitize_image_pos( $input ) {
	$valid = array(
       'left' => 'left',
        'right' => 'right',
        'center' => 'center',
	);
	
	if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function seguente_sanitize_image_repeat( $input ) {
	$valid = array(
		'no-repeat' => 'no-repeat',
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
	);
	
	if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function seguente_sanitize_email( $email ) {
	if(is_email( $email )){
		return $email;
	}else{
		return '';
	}
} 

/**
 * Function for options that do not require sanitization.
 */
function seguente_no_sanitize( $input ) {
} 

function seguente_font_styles() {
	$default = array(
		'Montserrat' => 'Montserrat',
		);
	return apply_filters( 'seguente_font_styles', $default );
}

function seguente_opacity() {
	$default = array(
		'1' => '1',
		'0.9'	=> '0.9',
		'0.8'	=> '0.8',
		'0.7'	=> '0.7',
		'0.6'	=> '0.6',
		'0.5'	=> '0.5',
		'0.4'	=> '0.4',
		'0.3'	=> '0.3',
		'0.2'	=> '0.2',
		'0.1'	=> '0.1',
		'0'	=> '0',
	);
	return apply_filters( 'seguente_opacity', $default );
}

function seguente_layout() {
	$default = array(
	'col1' => 'col1', 
	'col2-l' => 'col2-l', 
	'col2-r' =>'col2-r',
	);
	return apply_filters( 'seguente_layout', $default );
}

function seguente_blog_content() {
	$default = array(
	'excerpt' => 'excerpt', 
	'full' => 'full', 
	);
	return apply_filters( 'seguente_blog_content', $default );
}

function seguente_post_nav() {
	$default = array(
		'disable' => 'disable',
		'sidebar' => 'sidebar',
		'below' => 'below',
	);
	return apply_filters( 'seguente_post_nav', $default );
}

function seguente_post_info() {
	$default = array(
		'disable' => 'disable',
		'above' => 'above',
	);
	return apply_filters( 'seguente_post_info', $default );
}

function seguente_get_option_defaults() {
	$defaults = array(
		'theme_color' => '#28b78d',
		'breadcrumbs' => '1',
		'animation' => false,
		'responsive_design' => '1',
		'scrollup' => '1',
		'scrollup_color' => '#888888',
		'scrollup_hover_color' => '#28b78d',
		'logo_width' => '300',
		'logo_height' => '30',
		'logo_top_margin' => '12',
		'logo_left_margin' => '0',
		'logo_bottom_margin' => '0',
		'logo_right_margin' => '25',
		'logo_uppercase' => '1',
		'google_font_logo' => 'Montserrat',
		'logo_font_size' => '28',
		'logo_font_weight' => '700',
		'text_logo_color' => '#000000',
		'enable_logo_tagline' => false,
		'tagline_font_size' => '16',
		'tagline_color' => '#000000',
		'tagline_uppercase' => '1',
		'menu_sticky' => '1',
		'menu_top_margin' => '0',
		'google_font_menu' => 'Montserrat',
		'nav_font_size' => '13',
		'menu_uppercase' => '1',
		'nav_font_color' => '#243743',
		'nav_sub_font_color' => '#fafafa',
		'nav_border_color' => '#fafafa',
		'nav_bg_color' => '#fafafa',
		'nav_bg_sub_color' => '#243743',
		'nav_hover_font_color' => '#28b78d',
		'nav_bg_hover_color' => '#243743',
		'nav_cur_item_color' => '#28b78d',
		'google_font_body' => 'Montserrat',
		'body_font_size' => '14',
		'body_font_color' => '#8a949b',
		'header_bg_color' => '#fafafa',
		'header_opacity' => '1',
		'header_top_enable' => false,
		'header_address' => '1234 Street Name, City Name, United States',
		'header_phone' => '(123) 456-7890',
		'header_email' => 'info@yourdomain.com',
		'address_color' => '#8a949b',
		'top_head_color' => '#fafafa',
		'image_slider_on' => false,
		'getstarted_section_on' => false,
		'features_section_on' => false,
		'about_section_on' => true,
		'services_section_on' => false,
		'getin_home_on' => false,
		'blog_section_on' => true,
		'social_section_on' => false,
		'default_image_slider' => 'ideal',
		'slider_height' => '500',
		'image_slider_cat' => '',
		'slideshow_speed' => '5000',
		'animation_speed' => '800',
		'slider_num' => '3',
		'image_slider_effect' => 'fade',
		'captions_on' => false,
		'captions_box' => false,
		'captions_box_color' => '#f6f6f6',
		'captions_box_opacity' => '1',
		'captions_pos_top' => '180',
		'captions_width' => '80',
		'captions_title_size' => '44',
		'captions_text_size' => '14',
		'captions_title_color' => '#ffffff',
		'captions_text_color' => '#ffffff',
		'captions_button_color' => '#ffffff',
		'captions_button' => '1',
		'caption_button_text' => 'Read More',
		'slider_dots' => '1',
		'footer_bg_color' => '#243743',
		'copyright_bg_color' => '#111111',
		'footer_widget_title_color' => '#ffffff',
		'footer_widget_title_border_color' => '#fafafa',
		'footer_widget_text_color' => '#ffffff',
		'footer_widget_text_border_color' => '#fafafa',
		'footer_social_color' => '#efefef',
		'footer_widgets' => '1',
		'footer_copyright_text' => 'Copyright '.date('Y').' '.get_bloginfo('site_title'),
		'layout_settings' => 'col2-l',
		'blog_posts_home_color' => '#eaeaea',
		'blog_posts_home_image' => '',
		'blog_posts_top_color' => '#fafafa',
		'blog_posts_top_font_color' => '#243743',
		'blog_posts_top_image' => '',
		'blog_content' => 'excerpt',
		'blog_excerpt' => '50',
		'simple_paginaton' => false,
		'post_navigation' => 'below',
		'post_info' => 'above',
		'featured_img_post' => '1',
		'features_bg_color' => '#fafafa',
		'features_bg_image' => '',
		'features_title_color' => '#243743',
		'features_text_color' => '#888888',
		'features_icons_color' => '#ffffff',
		'features_circle_color' => '#243743',
		'feature_icon_size' => '32',
		'features_page_1' => '',
		'features_page_2' => '',
		'features_page_3' => '',
		'features_page_4' => '',
		'feature_icon_1' => 'fa-tablet',
		'feature_image_1' => '',
		'feature_icon_2' => 'fa-tint',
		'feature_image_2' => '',
		'feature_icon_3' => 'fa-html5',
		'feature_image_3' => '',
		'feature_icon_4' => 'fa-shopping-cart',
		'feature_image_4' => '',
		'about_page' => '',
		'about_bg_color' => '#8a949b',
		'about_bg_image' => '',
		'about_header_color' => '#ffffff',
		'about_button_text' => 'Read More',
		'about_button_color' => '#28b78d',
		'services_bg_color' => '#8a949b',
		'services_bg_image' => '',
		'services_title_color' => '#ffffff',
		'services_text_color' => '#e0e0e0',
		'services_icon_color' => '#e0e0e0',
		'service_page_1' =>'',
		'service_page_2' =>'',
		'service_page_3' =>'',
		'service_page_4' =>'',
		'service_page_5' =>'',
		'service_page_6' =>'',
		'service_icon_1' => 'fa-anchor',
		'service_icon_2' => 'fa-cog',
		'service_icon_3' => 'fa-tachometer',
		'service_icon_4' => 'fa-paper-plane',
		'service_icon_5' => 'fa-code',
		'service_icon_6' => 'fa-umbrella',
		'getin_bg_color' => '#fafafa',
		'getin_bg_image' => '',
		'getin_header_color' => '#243743',
		'getin_page' =>'',
		'getin_text_color' => '#888888',
		'getin_button_text' => 'Contact us now',
		'getin_button_color' => '#28b78d',
		'blog_bg_color' => '#eaeaea',
		'blog_bg_image' => '',
		'blog_cat' => '',
		'num_posts' => '3',
		'blog_section_title' => 'Latest News',
		'blog_title_color' => '#243743',
		'blog_post_color' => '#243743',
		'blog_button_color' => '#28B78D',
		'social_color' => '#fafafa',
		'social_bg_image' => '',
	);
	return apply_filters( 'seguente_get_option_defaults', $defaults );
}

function seguente_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'seguente_theme_options', array() ), 
        seguente_get_option_defaults() 
    );
}
