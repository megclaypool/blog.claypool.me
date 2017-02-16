<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package everest64
 */

?>

			</div><!-- #content -->

			<div class="above-footer">
				<div class="container">

					<div class="col-md-6 search">						
						<?php get_search_form(); ?>
					</div>

					<div class="col-md-6 socials">
						<ul class="accordion"> 
							<?php 	               	
			               	$facebook =  esc_url(get_theme_mod('facebook_textbox'));
			                $twitter = esc_url(get_theme_mod('twitter_textbox'));
			                $googleplus = esc_url(get_theme_mod('googleplus_textbox'));
			                $linkedin = esc_url(get_theme_mod('linkedin_textbox'));
			                $youtube = esc_url(get_theme_mod('youtube_textbox')); 
			                
			                if($facebook){?>
			                <li class="tabs"><a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a></li>
			                <?php }
			                if($twitter){?>
			                <li class="tabs"><a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
			                <?php }
			                if($googleplus){?>
			                <li class="tabs"><a href="<?php echo $googleplus;?>"><i class="fa fa-google-plus"></i></a></li>
			                <?php }
			                if($linkedin){?>
			                <li class="tabs"><a href="<?php echo $linkedin;?>"><i class="fa fa-linkedin"></i></a></li>
			                <?php }
			                if($youtube){?>
			                <li class="tabs"><a href="<?php echo $youtube;?>"><i class="fa fa-youtube"></i></a></li>
			                <?php }
			            	?> 			    
						    
						</ul>						
					</div>

				</div>
			</div>

			<div class="top-footer">
				<div class="container">
					<div class="icon clearfix">

			    		<div class="fl">
			    			<?php echo html_entity_decode(esc_attr(get_theme_mod( 'phone_icon', __( '', 'everest64' ) ) )); ?>
			    		</div>
			    		<?php echo html_entity_decode(esc_attr(get_theme_mod( 'phone_column', __( '', 'everest64' ) ) )); ?>				
			    	</div>

			        <div class="icon clearfix">
			    		<div class="fl">
			    			<?php echo html_entity_decode(esc_attr(get_theme_mod( 'email_icon', __( '', 'everest64' ) ) )); ?>
			    		</div>
			    		<?php echo html_entity_decode(esc_attr(get_theme_mod( 'email_column', __( '', 'everest64' ) ) )); ?>				
			    	</div>

			        <div class="icon clearfix">
			    		<div class="fl">
			    			<?php echo html_entity_decode(esc_attr(get_theme_mod( 'address_icon', __( '', 'everest64' ) ) )); ?>
			    		</div>
			    		<?php echo html_entity_decode(esc_attr(get_theme_mod( 'address_column', __( '', 'everest64' ) ) )); ?>				
			    	</div>

				</div>
			</div>

			<div class="footer">
				<div class="container">
					<?php
			    		if ( is_active_sidebar( 'footer-block' ) ) : 
							dynamic_sidebar( 'footer-block' );  
						endif; 
			    	?>
				</div>
			</div>

			<footer id="colophon" class="site-footer" role="contentinfo">
				
				<div class="site-info">
					<p class="copyrights">
						<?php printf( esc_html__( 'Copyright &copy;', 'everest64' ));  echo date("Y"); ?>
						<span class="sep"> | </span>
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
						<span class="sep"> | </span>
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'everest64' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'everest64' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'everest64' ), 'everest64', '<a href="'.esc_url( __( 'http://sumanshresthaa.com.np', 'everest64' ) ).'" rel="designer">Suman Shrestha</a>' ); ?>
					</p>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->

		</div><!-- #page -->

		<div class="scroll-top-wrapper">
			<span class="scroll-top-inner"><i class="fa fa-angle-double-up"></i></span>
		</div>

		<?php wp_footer(); ?>

	</body>
</html>