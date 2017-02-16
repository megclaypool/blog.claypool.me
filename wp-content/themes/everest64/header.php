<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package everest64
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'everest64' ); ?></a>

		<div class="header">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="col-md-3 site-branding">
						<?php if (function_exists('the_custom_logo')) : ?>	                            
			                <?php echo '<div class="site-logo">'; ?>
			    				<?php the_custom_logo(); ?>
			    			<?php echo '</div>'; ?>    
			            <?php endif; ?>
			            
			            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</div><!-- .site-branding -->

					<div class="col-md-9">
				
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						      	<span class="sr-only"><?php _e('Toggle navigation','everest64'); ?></span>
						      	<span class="icon-bar"></span>
						      	<span class="icon-bar"></span>
						      	<span class="icon-bar"></span>
							</button>
						</div>							

						<div class="navbar-collapse collapse"> 
		                    <?php
					            wp_nav_menu( array(
					                'menu'              => 'primary',
					                'theme_location'    => 'primary',
					                'depth'             => 4,
					                'container'         => 'div',
					                'container_class'   => 'collapse navbar-collapse',
					        		'container_id'      => 'bs-example-navbar-collapse-1',
					                'menu_class'        => 'nav navbar-nav navbar-right',
					                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					                'walker'            => new wp_bootstrap_navwalker())
					            );
					        ?>
					    </div>
		            </div>
				</div><!-- .container -->
			</nav>
		</div><!-- .header -->

		<div id="content" class="site-content">