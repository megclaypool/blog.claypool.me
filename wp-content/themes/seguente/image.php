<?php
/**
 * The template for displaying image attachments
 *
 * @package Seguente
 */

// Retrieve attachment metadata.
$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
get_header(); ?>
	<div id="main" class="<?php echo esc_attr($seguente_theme_options['layout_settings']);?>">
		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="content-posts-wrap">
				<div id="content-box">
					<div id="post-body">
						<div <?php post_class('post-single'); ?>>
							<h1 id="post-title" <?php post_class('entry-title'); ?>><?php the_title(); ?> </h1>
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="thumb-wrapper">
									<?php the_post_thumbnail('full'); ?>
								</div><!--thumb-wrapper-->
							<?php } ?>
							<div id="article">
								<?php seguente_the_attached_image(); ?>
								<?php the_content(); 
								wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'seguente' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
								) ); ?>
							<ul class="link-pages">	
								<li class="next-link"><?php esc_url(previous_image_link( '%link', '<i class="fa fa-chevron-right"></i><strong>'.esc_html__('Next', 'seguente').'</strong>')); ?></li>
								<li class="previous-link"><?php esc_url(next_image_link( '%link', '<i class="fa fa-chevron-left"></i><strong>'.esc_html__('Previous', 'seguente').'</strong>')); ?></li>
							</ul>		
								<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									comments_template( '', true );
								} ?>
							
							</div><!--article-->
						</div><!--post-single-->
					</div><!--post-body-->
				</div><!--content-box-->
			
			<div class="sidebar-frame">
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php endwhile; ?>
		</div><!--content-posts-wrap-->
	</div><!--main-->
<?php if ($seguente_theme_options['social_section_on'] == '1') {
	get_template_part( 'social', 'section' );	
}
get_footer(); ?>