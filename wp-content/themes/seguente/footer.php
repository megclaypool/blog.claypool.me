<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Seguente
 */ 
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );?>
	<div class="clear"></div>
	<div id="footer">
	<?php if ( $seguente_theme_options['footer_widgets'] == '1') { ?>
		<div id="footer-wrap">
			<?php  get_sidebar('footer'); ?>
		</div><!--footer-wrap-->
	<?php } ?>
	</div><!--footer-->
	<?php get_template_part( 'copyright' ); ?>
</div><!--grid-container-->
<?php wp_footer(); ?>
</body>
</html>