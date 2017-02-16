<?php
/**
 * Centilium functions and definitions
 *
 * @package Centilium
 */
 
 
/*-----------------------------------------------------------------------------------*/
/*  Set the content width based on the theme's design and stylesheet.
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'centilium_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function centilium_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Centilium, use a find and replace
	 * to change 'centilium' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'centilium', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'centilium_big', 750, 350, array('center','top') ); //big Post Featured
	add_image_size( 'centilium_smallfeatured', 298, 248, array('center','top') ); //featured image
	add_image_size( 'centilium_small', 120, 120, true ); //small

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'centilium' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'centilium_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // centilium_setup
add_action( 'after_setup_theme', 'centilium_setup' );


/*-----------------------------------------------------------------------------------*/
/*  Custom Excerpts.
/*-----------------------------------------------------------------------------------*/
function centilium_new_excerpt_more ($more){
	return '...';
}
add_filter('excerpt_more','centilium_new_excerpt_more');

function centilium_custom_excerpt_length ($lenth){
	return 70; // Excerpts
}
add_filter ('excerpt_length', 'centilium_custom_excerpt_length', 999);

/*-----------------------------------------------------------------------------------*/
/*  Add Post Thumbnail Support.
/*-----------------------------------------------------------------------------------*/
	function centilium_get_thumbnail_url( $size = 'featured' ) {
		global $post;
		if (has_post_thumbnail( $post->ID ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
			return $image[0];
		}
		
		// use first attached image if no featured image was already set.
		$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
		if (!empty($images)) {
			$image = reset($images);
			$image_data = wp_get_attachment_image_src( $image->ID, $size );
			return $image_data[0];
		}
	}

//Display small search bar in the mobile menu.
	if ( ! function_exists( 'centilium_small_search_bar' ) ) {
		function centilium_small_search_bar() {  ?>
         	<div class="mobile_search">
				<?php
					if ( get_theme_mod('search_hide') != 'off' ){				
					get_search_form();
					} 
				?>
			</div>
         	<?php }  
	}


//We create a function to handle Mobile Menu if Header Image is uploaded.
	if ( ! function_exists( 'centilium_header_image_menu' ) ) {
		function centilium_header_image_menu() {
			if ( get_header_image() != '' && get_theme_mod('custom_logo') != '' ){ ?>
         	<style type="text/css">
				@media screen and (max-width:950px) {
					.head-nav ul{
						top:200px;
					}
					
				}
			</style>
         	<?php } 
			
			if ( get_header_image() != '' && get_theme_mod('custom_logo') == '' ){ ?>
         	<style type="text/css">
				@media screen and (max-width:950px) {
					.head-nav ul{
						top:180px;
					}
					
					.header-image{
						margin-top: -120px;
						bottom: -70px;
						
					}
					
				}
				@media screen and (max-width:700px) {				
					.header-image{
						margin-top: -120px;
						bottom: -70px;
						
					}
					
				}
				@media screen and (max-width:620px) {
					.head-nav ul{
						top:170px;
					}
					
					.header-image{
						margin-top: -120px;
						bottom: -60px;
						
					}
					
				}
			</style>
         	<?php } 
			
			if (get_header_image() == '' && get_theme_mod('custom_logo') != '') { ?>
         	<style type="text/css">
				@media screen and (max-width:950px) {
					.head-nav ul{
						top:110px;
					}
					
				}
				@media screen and (max-width:420px) {
					.head-nav ul{
						top:120px;
					}
					
				}
				@media screen and (max-width:360px) {
					.head-nav ul{
						top:110px;
					}
					
				}
			</style>
         	<?php } 
			
			if (get_header_image() == '' && get_theme_mod('custom_logo') == ''){ ?>
         	<style type="text/css">
				@media screen and (max-width:950px) {
					.head-nav ul{
						top:90px;
					}
					
				}
				@media screen and (max-width:690px) {
					.head-nav ul{
						top:87px;
					}
					
				}
				@media screen and (max-width:360px) {
					.head-nav ul{
						top:80px;
					}
					
				}
			</style>
         	<?php }
		}
	}
	
add_action( 'wp_head', 'centilium_header_image_menu' );


if ( ! function_exists( 'centilium_posts_pagination' ) ) {
function centilium_posts_pagination() {  
		the_posts_pagination();
	}                 
}

/*-----------------------------------------------------------------------------------*/
/*  Post Meta infos
/*-----------------------------------------------------------------------------------*/
	//Display meta info if enabled.
if ( ! function_exists( 'centilium_post_meta' ) ) {
function centilium_post_meta(){ 
	if ( get_theme_mod('post_meta') != 'off' ) { ?>
		<ul>
			<li><?php centilium_posted_on(); ?></li>
			<li><?php centilium_entry_author(); ?></li>
			<li><?php centilium_entry_category(); ?></li>
			<li><?php centilium_entry_comments(); ?></li>
		</ul>
<?php }
	}
}


/*-----------------------------------------------------------------------------------*/
/*  Single Post Settings
/*-----------------------------------------------------------------------------------*/
		
//Display Post Next/Prev buttons if enabled.
if ( ! function_exists( 'centilium_next_prev_post' ) ) {
function centilium_next_prev_post() { ?>
	<div class="next_prev_post">
		<?php 
			previous_post_link( '<div class="nav-previous"> %link</div>', '<i class="fa fa-chevron-left"></i>'. __('Previous Post','centilium'));
			next_post_link( '<div class="nav-next">%link</div>', __('Next Post','centilium'). '<i class="fa fa-chevron-right"></i>' );
		?>
	</div><!-- .next_prev_post -->
<?php }                 
}


//Display Author box if enabled.
if ( ! function_exists( 'centilium_author_box' ) ) {
	function centilium_author_box() { ?>
		<div class="post-author-box">
			<div class="postauthor">
				<h4><?php _e('About The Author', 'centilium'); ?></h4>
				<div class="author-box">
					<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '150' );  } ?>
					<div class="author-box-content">
						<div class="vcard clearfix">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="nofollow" class="fn"><i class="fa fa-user"></i><?php the_author_meta( 'nickname' ); ?></a>
						</div>
							<p><?php the_author_meta('description') ?></p>
					</div>
				</div>
			</div>
		</div>		
<?php 	}                 
}


/*-----------------------------------------------------------------------------------*/
/*  Pagination (for WP 4.0 and earlier versions)
/*-----------------------------------------------------------------------------------*/
if (!function_exists('centilium_pagination')) {
	function centilium_pagination($pages = '', $range = 3) { 
		$showitems = ($range * 3)+1;
		global $paged; if(empty($paged)) $paged = 1;
		if($pages == '') {
			global $wp_query; $pages = $wp_query->max_num_pages; 
			if(!$pages){ $pages = 1; } 
		}
	if(1 != $pages) { 
		echo "<div class='pagination'><ul>";
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link(1)."'><i class='fa fa-chevron-left'></i> ".__('First','centilium')."</a></li>";
		if($paged > 1 && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link($paged - 1)."' class='inactive'>&lsaquo; ".__('Previous','centilium')."</a></li>";
			for ($i=1; $i <= $pages; $i++){ 
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) { 
					echo ($paged == $i)? "<li class='current'><span class='currenttext'>".$i."</span></li>":"<li><a rel='nofollow' href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
				} 
			} 
			if ($paged < $pages && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link($paged + 1)."' class='inactive'>".__('Next','centilium')." &rsaquo;</a></li>";
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo "<li><a rel='nofollow' class='inactive' href='".get_pagenum_link($pages)."'>".__('Last','centilium')." &raquo;</a></li>";
			echo "</ul></div>"; 
		}
	}
}
	


/**
 * Register Sidebar and Footer widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function centilium_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'centilium' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	//Register footer 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'centilium' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	//Register footer 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'centilium' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	//Register footer 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'centilium' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	//Register footer 4
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'centilium' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
}
add_action( 'widgets_init', 'centilium_widgets_init' );


/*
* Print Powered by WordPress
*/
if (!function_exists ('centilium_copyright')){
	function centilium_copyright(){
	?>
	<div class="copyright">
		<p><a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'centilium' ), 'WordPress' ); ?></a></p>
	</div>
	<?php
	}
}

/*
* Print Theme Developed by:
*/
if (!function_exists('centilium_theme_by')){
	function centilium_theme_by(){
		?>
		<div class="designed-by">
			<p><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'centilium' ), '<span> Centilium </span>', '<a href="//www.icynets.com" target="_blank" rel="nofollow">icyNETS</a>' ); ?></p>
		</div>
		<?php
	}
}

/**
 * Enqueue scripts and styles.
 */
function centilium_scripts() {
	wp_enqueue_style( 'centilium-roboto-condensed','//fonts.googleapis.com/css?family=Roboto+Condensed' );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	
	wp_enqueue_style( 'centilium-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css' );
	
	wp_enqueue_script( 'centilium-mobile-menu', get_template_directory_uri() . '/js/centilium-mobile-menu.js', array('jquery'), true );
	
	wp_enqueue_script( 'centilium-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'centilium-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'centilium_scripts' );

function centilium_custmizer_style() {
	wp_enqueue_style('centilium-customizer-css',get_template_directory_uri().'/css/customizer.css');
}
add_action('customize_controls_print_styles','centilium_custmizer_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-donate.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
