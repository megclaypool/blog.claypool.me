<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Centilium
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'centilium' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if ( get_header_image() ){ ?>
			<div class="<?php if ( get_header_image() != ''){ echo 'header-image'; } ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
				</a>
			</div>
		<?php } ?> <!--./End If Header Image-->
		
		<div class="container">	
			<?php if ( get_theme_mod('custom_logo') ) { ?>
				<div class="logo logo-image float-l">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" alt="<?php bloginfo( 'name' ); ?>">
					<img src="<?php echo get_theme_mod('custom_logo')?>">
					</a>
				</div>
			<?php } else { ?>
				<div class="logo float-l">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
			<?php  
				} 
			?>
			
			<div class="header-right float-r">
				<div class="header-top">
					<ul>
						<li><?php centilium_small_search_bar(); ?></li>
							<div class="clearfix"></div>
					</ul>
				</div>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<div class="head-nav">
						<span class="menu"> </span><!--Mobile MENU-->
						
							<?php wp_nav_menu( array( 
							'theme_location' => 'primary',  
							) ); ?>
					</div>
				</nav><!-- #site-navigation -->	
			</div>
				<div class="clearfix"> </div>
		</div>
		
		
	</header> 

<div id="content">
	<div class="container">
<!-- header -->
