<?php
/**
 * Everest64 Theme Customizer.
 *
 * @package everest64
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function everest64_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	$wp_customize->add_panel( 'theme_option', array(
        'priority' => 60,
        'title' => __( 'Everest64 Theme Option', 'everest64' ),
        'description' => __( 'Lets configure your site with Everest64 Theme Option', 'everest64' ),
    ));


    /**********************************************/
    /****** HOMEPAGE SLIDER CATEGORY SECTION ******/
    /**********************************************/

    $wp_customize->add_section('everest64_slider_section',array(
        'priority' => 1,
        'title' => __('Slider Section','everest64'),
        'description' => __('Customize Slider Section in Homepage. Make sure that slider images must be minimum of 1600px width and 650px height. The maximum no. of slides is 5.','everest64'),
        'panel' => 'theme_option'
    ));

    $wp_customize->add_setting('slider_category_display',array(
        'sanitize_callback' => 'everest64_sanitize_category',
        'default' => ''
    ));

    $wp_customize->add_control(new Everest64_Customize_Dropdown_Taxonomies_Control($wp_customize,'slider_category_display',array(
        'label' => __('Choose slider category to display','everest64'),
        'section' => 'everest64_slider_section',
        'settings' => 'slider_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
    ));



    /**********************************************/
    /****** HOMEPAGE ABOUT US SECTION ******/
    /**********************************************/

    $wp_customize->add_section('everest64_aboutus_section',array(
        'priority' => 2,
        'title' => __('About Us Section','everest64'),
        'description' => __('Customize About Us Section in Homepage. Add your company brief description here.', 'everest64'),
        'panel' => 'theme_option'
    ));

    $wp_customize->add_setting(
        'about_title',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'about_title',
            array(
            'label' => __('About Us Title', 'everest64'),
            'section' => 'everest64_aboutus_section',
            'settings' => 'about_title',
            'type' => 'text',
    ));


    $wp_customize->add_setting(
        'about_desc',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'about_desc',
            array(
            'label' => __('About Us Description', 'everest64'),
            'section' => 'everest64_aboutus_section',
            'settings' => 'about_desc',
            'type' => 'textarea',
    ));

    $wp_customize->add_setting(
        'about_url',
            array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
            'default' => '',
    ));
    $wp_customize->add_control(
        'about_url',
            array(
            'label' => __('About link URL', 'everest64'),
            'section' => 'everest64_aboutus_section',
            'settings' => 'about_url',
            'type' => 'text',
    ));

    $wp_customize->add_setting('about_img',array(
        'sanitize_callback' => 'esc_url_raw',
        'default' =>  ''
    )); 
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'about_img',array(
        'label' => __('Upload 460px width and 230px height image for About Image Section','everest64'),
        'section' => 'everest64_aboutus_section',
        'settings' => 'about_img'
        )  
    ));



    /**********************************************/
    /****** HOMEPAGE SERVICES CATEGORY SECTION ******/
    /**********************************************/

    $wp_customize->add_section('everest64_services_section',array(
        'priority' => 3,
        'title' => __('Services Section','everest64'),
        'description' => __('Customize Services Section in Homepage. Select any page to display as your service. This will display featured image, title and link of that page.', 'everest64'),
        'panel' => 'theme_option'
    ));

    $wp_customize->add_setting(
        'services_title',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'services_title',
            array(
            'label' => __('Services Heading Title', 'everest64'),
            'section' => 'everest64_services_section',
            'settings' => 'services_title',
            'type' => 'text',
    ));

    $wp_customize->add_setting(
        'services_page1',
        array(
            'sanitize_callback' => 'everest64_sanitize_integer',
        )
    );     
    $wp_customize->add_control(
        'services_page1',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Choose service page1 to display', 'everest64'),
            'section' => 'everest64_services_section',
        )
    );

    $wp_customize->add_setting(
        'services_page2',
        array(
            'sanitize_callback' => 'everest64_sanitize_integer',
        )
    );     
    $wp_customize->add_control(
        'services_page2',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Choose service page2 to display', 'everest64'),
            'section' => 'everest64_services_section',
        )
    );

    $wp_customize->add_setting(
        'services_page3',
        array(
            'sanitize_callback' => 'everest64_sanitize_integer',
        )
    );     
    $wp_customize->add_control(
        'services_page3',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Choose service page3 to display', 'everest64'),
            'section' => 'everest64_services_section',
        )
    );

    $wp_customize->add_setting(
        'services_page4',
        array(
            'sanitize_callback' => 'everest64_sanitize_integer',
        )
    );     
    $wp_customize->add_control(
        'services_page4',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Choose service page4 to display', 'everest64'),
            'section' => 'everest64_services_section',
        )
    );    



    /**********************************************/
    /****** HOMEPAGE FEATURED PACKAGES SECTION ******/
    /**********************************************/

    $wp_customize->add_section('everest64_packages_section',array(
        'priority' => 4,
        'title' => __('Featured Packages Section','everest64'),
        'description' => __('Customize Featured Packages Section in Homepage. You can display your company featured or most popular packages here from the choosen category.','everest64'),
        'panel' => 'theme_option'
    ));

    $wp_customize->add_setting(
        'package_title',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'package_title',
            array(
            'label' => __('Featured Packages Title', 'everest64'),
            'section' => 'everest64_packages_section',
            'settings' => 'package_title',
            'type' => 'text',
    ));

    $wp_customize->add_setting('packages_category_display',array(
        'sanitize_callback' => 'everest64_sanitize_category',
        'default' => ''
    ));

    $wp_customize->add_control(new Everest64_Customize_Dropdown_Taxonomies_Control($wp_customize,'packages_category_display',array(
        'label' => __('Choose Featured Packages category to display','everest64'),
        'section' => 'everest64_packages_section',
        'settings' => 'packages_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
    ));



    /**********************************************/
    /************* HOMEPAGE BLOG SECTION **************/
    /**********************************************/

    $wp_customize->add_section('everest64_blog_section',array(
        'priority' => 5,
        'title' => __('Blog Section','everest64'),
        'description' => __('Customize Blog Section in Homepage. Select the blog category to display in Homepage.','everest64'),
        'panel' => 'theme_option'
    ));

    $wp_customize->add_setting(
        'blog_title',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'blog_title',
            array(
            'label' => __('Blog Section Title', 'everest64'),
            'section' => 'everest64_blog_section',
            'settings' => 'blog_title',
            'type' => 'text',
    ));

    $wp_customize->add_setting('blog_category_display',array(
        'sanitize_callback' => 'everest64_sanitize_category',
        'default' => ''
    ));

    $wp_customize->add_control(new Everest64_Customize_Dropdown_Taxonomies_Control($wp_customize,'blog_category_display',array(
        'label' => __('Choose Blog category to display','everest64'),
        'section' => 'everest64_blog_section',
        'settings' => 'blog_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
    ));




    /**********************************************/
    /****** HOMEPAGE FOOTER ABOVE SECTION ******/
    /**********************************************/

    $wp_customize->add_section('everest64_footerabove_section',array(
        'priority' => 6,
        'title' => __('Footer Above Section','everest64'),
        'description' => __('Customize Footer Above Section in Homepage. Insert FontAwesome for icons as stated below and use textarea for contents. HTMLs are allowed here.', 'everest64'),
        'panel' => 'theme_option'
    ));


    $wp_customize->add_setting(
        'phone_icon',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'phone_icon',
            array(
            'label' => __('Insert Font awesome phone icon as <i class="fa fa-phone"></i> here', 'everest64'),
            'section' => 'everest64_footerabove_section',
            'settings' => 'phone_icon',
            'type' => 'text',
    ));
    $wp_customize->add_setting(
        'phone_column',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'phone_column',
            array(
            'label' => __('Phone Column Area : Insert your Phone Numbers here.', 'everest64'),
            'section' => 'everest64_footerabove_section',
            'settings' => 'phone_column',
            'type' => 'textarea',
    ));



    $wp_customize->add_setting(
        'email_icon',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'email_icon',
            array(
            'label' => __('Insert Font awesome email icon as <i class="fa fa-envelope"></i> here', 'everest64'),
            'section' => 'everest64_footerabove_section',
            'settings' => 'email_icon',
            'type' => 'text',
    ));
    $wp_customize->add_setting(
        'email_column',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'email_column',
            array(
            'label' => __('Email Column Area : Insert your Emails here.', 'everest64'),
            'section' => 'everest64_footerabove_section',
            'settings' => 'email_column',
            'type' => 'textarea',
    ));



    $wp_customize->add_setting(
        'address_icon',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'address_icon',
            array(
            'label' => __('Insert Font awesome address icon as <i class="fa fa-map"></i> here', 'everest64'),
            'section' => 'everest64_footerabove_section',
            'settings' => 'address_icon',
            'type' => 'text',
    ));
    $wp_customize->add_setting(
        'address_column',
            array(
            'sanitize_callback' => 'everest64_sanitize_text',
            'default' => '',
    ));
    $wp_customize->add_control(
        'address_column',
            array(
            'label' => __('Address Column Area : Insert your Address here.', 'everest64'),
            'section' => 'everest64_footerabove_section',
            'settings' => 'address_column',
            'type' => 'textarea',
    ));



    /**********************************************/
    /********** SOCIAL ICON LINKS SECTION ***********/
    /**********************************************/

    $wp_customize->add_section('everest64_social_section',array(
        'priority' => 7,
        'title' => __('Social Media Section','everest64'),
        'description' => __('Customize Social Section in Homepage. Make sure that you have filled all the social links, blank field will not be displayed in site and it will be hidden by default.', 'everest64'),
        'panel' => 'theme_option'
    ));

    $wp_customize->add_setting(
        'facebook_textbox',
            array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
            'default' => '',
    ));
    $wp_customize->add_control(
        'facebook_textbox',
            array(
            'label' => __('Facebook link URL', 'everest64'),
            'section' => 'everest64_social_section',
            'settings' => 'facebook_textbox',
            'type' => 'text',
    ));

    $wp_customize->add_setting(
        'twitter_textbox',
            array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
            'default' => '',
    ));
    $wp_customize->add_control(
        'twitter_textbox',
            array(
            'label' => __('Twitter link URL', 'everest64'),
            'section' => 'everest64_social_section',
            'settings' => 'twitter_textbox',
            'type' => 'text',
    ));

    $wp_customize->add_setting(
        'googleplus_textbox',
            array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
            'default' => '',
    ));
    $wp_customize->add_control(
        'googleplus_textbox',
            array(
            'label' => __('Googleplus link URL', 'everest64'),
            'section' => 'everest64_social_section',
            'settings' => 'googleplus_textbox',
            'type' => 'text',
    ));

    $wp_customize->add_setting(
        'linkedin_textbox',
            array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
            'default' => '',
    ));
    $wp_customize->add_control(
        'linkedin_textbox',
            array(
            'label' => __('LinkedIn link URL', 'everest64'),
            'section' => 'everest64_social_section',
            'settings' => 'linkedin_textbox',
            'type' => 'text',
    ));

    $wp_customize->add_setting(
        'youtube_textbox',
            array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
            'default' => '',
    ));      
    $wp_customize->add_control(
        'youtube_textbox',
            array(
            'label' => __('You Tube link URL', 'everest64'),
            'section' => 'everest64_social_section',
            'settings' => 'youtube_textbox',
            'type' => 'text',
    ));    

}
add_action( 'customize_register', 'everest64_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function everest64_customize_preview_js() {
	wp_enqueue_script( 'everest64_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'everest64_customize_preview_js' );


function everest64_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function everest64_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function everest64_sanitize_textarea( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function everest64_sanitize_category($input){
  $output=intval($input);
  return $output;
}