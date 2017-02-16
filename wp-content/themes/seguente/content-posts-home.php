<?php 
/**
 * @package Seguente
 *
 */ 
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
if ( have_posts() ) : ?>
<div class="clear"></div>
	<div class="content-posts-wrap">
		<div class="standard-posts-wrapper">
			<div class="posts-wrapper">	
				<div id="post-body">
					<div class="post-single">
					 <?php // Start the Loop.
					while ( have_posts() ) : the_post();					
						get_template_part('content');		
					endwhile; 		
					if ($seguente_theme_options['simple_paginaton'] == '1') {			
						// Displays links for next and previous pages. ?>
						<div class="clear"></div>
						<div class="simple-pagination">
							<?php posts_nav_link();	?>
						</div> <?php
					} else {		
						// Previous/next post navigation. ?>
						<div class="clear"></div> <?php 
						the_posts_pagination();		
					} ?>
					</div>
				</div><!--posts-body-->
			</div><!--posts-wrapper-->
		</div><!--standard-posts-wrapper-->
		<div class="sidebar-frame">
			<div class="sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php 
else: ?>
	<?php get_template_part( 'content', 'none' );
endif; ?>
