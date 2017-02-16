<?php 
/**
 * @package Seguente
 *
 */ 
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
$blog_posts_home_image = $seguente_theme_options['blog_posts_home_image'];
$blog_posts_top_image = $seguente_theme_options['blog_posts_top_image'];
if ( have_posts() ) : ?>
<div class="clear"></div>
<?php if ($blog_posts_home_image != '') { ?>
	<div class="home-blog" style="background: url(<?php echo esc_url($blog_posts_home_image); ?>) 50% 0 no-repeat fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">	
<?php } else { ?>
	<div class="home-blog">	
<?php } 
	 if ($blog_posts_top_image !='') { ?>
	<div class="blog-top-image" style="background: url(<?php echo esc_url($blog_posts_top_image); ?>) 50% 0 no-repeat fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
<?php } else { ?>
		<div class="blog-top-image">
<?php } ?>
			<div>
				<?php get_template_part( 'title','section'); ?>
			</div>
		</div>
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
</div>