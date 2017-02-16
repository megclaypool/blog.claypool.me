<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Centilium
 */

?>
	</div><!-- .container -->
</div><!-- #content -->
	
<footer id="colophon" class="site-footer" role="contentinfo">	
	<div class="<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) { echo 'foot-top';} ?>">
		<div class="container">
			<div class="row">
				
					<div class="col-md-3 col-sm-3">
						<?php if ( is_active_sidebar( 'footer 1' ) ) : ?>
							<?php dynamic_sidebar( 'footer-1' ); ?>
						<?php endif; ?>
					</div>
					<div class="col-md-3 col-sm-3">
						<?php if ( is_active_sidebar( 'footer 2' ) ) : ?>
							<?php dynamic_sidebar( 'footer-2' ); ?>
						<?php endif; ?>
					</div>
					<div class="col-md-3 col-sm-3">
						<?php if ( is_active_sidebar( 'footer 3' ) ) : ?>
							<?php dynamic_sidebar( 'footer-3' ); ?>
						<?php endif; ?>
					</div>
					<div class="col-md-3 col-sm-3">
						<?php if ( is_active_sidebar( 'footer 4' ) ) : ?>
							<?php dynamic_sidebar( 'footer-4' ); ?>
						<?php endif; ?>
					</div>
				
			</div>
		</div>
	</div>
	<div class="foot-bottom">
		<div class="container">
			<div class="row">
					<div class="col-md-6 float-l">
						<?php centilium_copyright(); ?>	
					</div>
					<div class="col-md-6 float-r">
						<?php centilium_theme_by(); ?>
					</div>			
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
	
	
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
