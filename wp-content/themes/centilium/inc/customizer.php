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
function centilium_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
		
		// Add Radio-Image control support to the theme customizer
		class Customizer_Radio_Image_Control extends WP_Customize_Control {
			public $type = 'radio-image';
			
			public function enqueue() {
				wp_enqueue_script( 'jquery-ui-button' );
			}
			
			// Markup for the field's title
			public function title() {
				echo '<span class="customize-control-title">';
					$this->label();
					$this->description();
				echo '</span>';
			}

			// The markup for the label.
			public function label() {
				// The label has already been sanitized in the Fields class, no need to re-sanitize it.
				echo $this->label;
			}

			// Markup for the field's description
			public function description() {
				if ( ! empty( $this->description ) ) {
					// The description has already been sanitized in the Fields class, no need to re-sanitize it.
					echo '<span class="description customize-control-description">' . $this->description . '</span>';
				}
			}
			
			public function render_content() {
				if ( empty( $this->choices ) ) {
					return;
				}
				$name = '_customize-radio-' . $this->id;
				?>
				<?php $this->title(); ?>
				<div id="input_<?php echo $this->id; ?>" class="image">
					<?php foreach ( $this->choices as $value => $label ) : ?>
						<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
							<label for="<?php echo $this->id . $value; ?>">
								<img src="<?php echo esc_html( $label ); ?>">
							</label>
						</input>
					<?php endforeach; ?>
				</div>
				<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
				<?php
			}
		}
		
// Header Settings SECTION
		$wp_customize->add_section( 
			'header_settings', array(
				'title' => __( 'Logo / Search Settings', 'centilium' ),
				'priority' => 20
		) );
		
	//Logo Upload	
		$wp_customize->add_setting( 
			'custom_logo' , array(
				'sanitize_callback' => 'esc_url_raw',
		));
		 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'custom_logo',
				array(
					'label' =>  __( 'Custom Logo', 'centilium' ),
					'section' => 'header_settings',
					'settings' => 'custom_logo',
				)
			)
		);
		
		//Search Field 
		$wp_customize->add_setting( 
			'search_hide' , array(
				'default'     => 'on',
				'sanitize_callback' => 'sanitize_enable_disable_feature',
				)
		);
		$wp_customize->add_control(			
				'search_hide',
				array(
					'label' =>  __( 'Header Search Field', 'centilium' ),
					'description' =>  __( 'Enable / Disable the Search field in the header.', 'centilium' ),
					'section' => 'header_settings',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'On',
						'off' 	=> 'Off',
					),
				)
		);
		
		
		
		
// Author Info SECTION
		$wp_customize->add_section( 
			'article_settings', array(
				'title' => __( 'Author Info', 'centilium' ),
				'priority' => 20
		) );
	// Author Information
		$wp_customize->add_setting( 
			'author_bio' , array(
				'default'     => 'on',
				'sanitize_callback' => 'sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(			
				'author_bio',
				array(
					'label' =>  __( 'Display Author Info', 'centilium' ),
					'description' =>  __( 'Enable / Disable the Author information to be displayed below the single Posts.', 'centilium' ),
					'section' => 'article_settings',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'On',
						'off' 	=> 'Off',
					),
				)
		);		
		
		// Design & Layout SECTION
		$wp_customize->add_section( 
			'colors', array(
				'title' => __( 'Layout Colors', 'centilium' ),
				'priority' => 40
		) );
		
		// Theme Background
		$wp_customize->add_setting(
			'theme_background',
			array(
				'default' => '#1B1B1D',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_background',
				array(
					'label' => __( 'Theme Background', 'centilium' ),
					'section' => 'colors',
					'settings' => 'theme_background',
				)
			)
		);
		
		// Theme color
		$wp_customize->add_setting(
			'theme_color',
			array(
				'default' => '#2096DA',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_color',
				array(
					'label' => __( 'Theme Color', 'centilium' ),
					'section' => 'colors',
					'settings' => 'theme_color',
				)
			)
		);
		
// Post Display SECTION
		$wp_customize->add_section( 
			'post_display', array(
				'title' => __( 'Article Settings', 'centilium' ),
				'priority' => 40
		) );
		//Display
		$wp_customize->add_setting(
			'article_display',
			array(
				'default' => 'excerpt_full_featured',
				'sanitize_callback' => 'sanitize_display',
			)
		);

		$wp_customize->add_control(	
			new Customizer_Radio_Image_Control(
				$wp_customize,
				'article_display', array(
					'label' => __( 'Post Display', 'centilium' ),
					'section' => 'post_display',
					'choices' => array(
						'excerpt_smallfeatured' => get_template_directory_uri() .'/images/customizer/smallthumb.png',
						'excerpt_full_featured' => get_template_directory_uri() .'/images/customizer/bigthumb.png',
					),
				)
			)
		);
		
		
			//Post Meta
		$wp_customize->add_setting( 
			'post_meta' , array(
				'default'     => 'on',
				'sanitize_callback' => 'sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(	
				'post_meta', array(
					'label' =>  __( 'Post Meta', 'centilium' ),
					'description' =>  __( 'Enable / Disable the Posts Meta Info ', 'centilium' ),
					'section' => 'post_display',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'Enable',
						'off' 	=> 'Disable',
					),
				)
		);
		
		//Author Off
		$wp_customize->add_setting( 
			'author_meta' , array(
				'default'     => 'on',
				'sanitize_callback' => 'sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(	
				'author_meta', array(
					'label' =>  __( 'Author Name', 'centilium' ),
					'description' =>  __( 'Enable / Disable the Author Name. If Post Meta is Disabled, Author Name is off by default. ', 'centilium' ),
					'section' => 'post_display',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'Enable',
						'off' 	=> 'Disable',
					),
				)
		);
		
		//Categories Off
		$wp_customize->add_setting( 
			'category_meta' , array(
				'default'     => 'on',
				'sanitize_callback' => 'sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(	
				'category_meta', array(
					'label' =>  __( 'Category Meta', 'centilium' ),
					'description' =>  __( 'Enable / Disable the Category Meta. If Post Meta is Disabled, Category Meta is off by default. ', 'centilium' ),
					'section' => 'post_display',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'Enable',
						'off' 	=> 'Disable',
					),
				)
		);
		
		//Comments Count
		$wp_customize->add_setting( 
			'comments_count' , array(
				'default'     => 'on',
				'sanitize_callback' => 'sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(	
				'comments_count', array(
					'label' =>  __( 'Comments Count', 'centilium' ),
					'description' =>  __( 'Enable / Disable the Post Comments Count Info. If Post Meta is Disabled, Comments are off by default. ', 'centilium' ),
					'section' => 'post_display',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'Enable',
						'off' 	=> 'Disable',
					),
				)
		);
	
}
add_action( 'customize_register', 'centilium_customize_register' );

/*-----------------------------------------------------------------------------------*/
/*  CUSTOM DATA SANITIZATION
/*-----------------------------------------------------------------------------------*/
// Sanitize checkbox
function sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

// Sanitize Enable / Disable feature
function sanitize_enable_disable_feature( $input ) {
    $valid = array(
		'on' => 'On',
		'off' => 'Off',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Sanitize display
function sanitize_display( $input ) {
    $valid = array(
		'excerpt_smallfeatured' => 'Excerpt + Small Featured image',
		'excerpt_full_featured' => 'Excerpt + Full-width Featured image',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


// Style settings output.
function add_style_settings() {
	
	$theme_background = get_theme_mod( 'theme_background', '#1B1B1D' );
	$theme_color = get_theme_mod( 'theme_color', '#2096DA' );
	$custom_css = get_theme_mod( 'custom_css' );
		
	?>
	<style type="text/css">
		<!--Theme Background Color-->
		.site-header,.site-header,.foot-top,.post-box,.card-box,.page-header,.comments-area,.post-author-box,.no-results .page-content,.widget { background: <?php echo $theme_background ?>; }
		
		<!--Theme Color-->
		.site-header,.site-header { border-bottom: 7px solid <?php echo $theme_color ?>;}
		.widget,.widget { border-bottom: 1px solid <?php echo $theme_color ?>;}
		
		.widget h1,.post-meta a,.page-links a:hover,.site-footer .widget h2,.post-readmore:hover,.post-navigation .nav-previous a:hover,.post-navigation .nav-next a:hover,.entry-title a:hover,.error-404 h2,.widget a:hover,.pagination a:hover,.pagination .currenttext,.error-404 input[type="submit"]:hover,input[type="submit"]:hover,input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="search"],textarea { color: <?php echo $theme_color ?>;}
		
		.foot-bottom,.head-nav ul,.foot-bottom,.page-links a,.post-readmore,.post-navigation .nav-previous a,.post-navigation .nav-next a,.pagination a,.error-404 input[type="submit"],input[type="submit"]{ background: <?php echo $theme_color ?>;}
		
		.post-box,.post-box,.card-box,.page-header,.comments-area,.post-author-box,.no-results .page-content{ border-top: 1px solid <?php echo $theme_color ?>;}
		.page-links a:hover,.widget select:focus,input[type="text"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="password"]:focus,input[type="search"]:focus,textarea:focus{ border: 1px solid <?php echo $theme_color ?>;}
		
		.post-readmore:hover,.post-navigation .nav-previous a:hover,.post-navigation .nav-next a:hover,.pagination a:hover,.pagination .currenttext,.error-404 input[type="submit"]:hover,input[type="submit"]:hover{ border: 2px solid <?php echo $theme_color ?>;}
		
		<!--Menu Hover-->
		.main-navigation .current_page_item > a,.main-navigation .current-menu-item > a,.main-navigation .current_page_ancestor > a,.main-navigation li:hover > a,.main-navigation li.focus > a,.head-nav ul ul { background: <?php echo $theme_color ?>; }
		
	</style>
	<?php
}
add_action( 'wp_head', 'add_style_settings' );


//Loading Customizer Styles
function customizer_inline_css() {
?>
	<style type="text/css">
	
	.ui-state-active img {
		border: 2px solid #2096da;
	}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'customizer_inline_css' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function centilium_customize_preview_js() {
	wp_enqueue_script( 'centilium_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'centilium_customize_preview_js' );
