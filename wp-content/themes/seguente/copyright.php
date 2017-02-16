<?php
/**
 * @package Seguente
 */  
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
?>
<div id="copyright">
	<div class="copyright-wrap">
		<span class="right"><?php printf(__( '%1$s powered by %2$s', 'seguente' ),'<a href="'.esc_url( __( 'http://vmthemes.com/seguente/', 'seguente')).'">Seguente Theme</a>','<a href="' . esc_url( __( 'https://wordpress.org/', 'seguente' ) ) . '">WordPress</a>'
); ?></span>
	</div>
</div><!--copyright-->