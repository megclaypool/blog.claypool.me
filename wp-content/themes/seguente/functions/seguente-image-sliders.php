<?php
/**
 * Seguente functions and definitions
 *
 * @package Seguente
 */

function seguente_ideal_slider() {
	global $post;
	$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
	$slider_cat = $seguente_theme_options['image_slider_cat'];
	$num_of_slides = $seguente_theme_options['slider_num'];
	
	$seguente_slider_query = new WP_Query(
		array(
			'posts_per_page' => $num_of_slides,
			'cat' 	=> $slider_cat
		)
	);?>
	<div class="clear"></div>
	<div id="slider">
		<?php while ( $seguente_slider_query->have_posts() ): $seguente_slider_query->the_post(); ?>
			<?php if ($slider_cat !='') { ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<img src="<?php echo esc_url($image[0]); ?>" title="<?php the_title(); ?>" alt="<?php esc_html(the_excerpt()); ?>" link="<?php esc_url(the_permalink()); ?>"/>
					<?php } else { ?>
						<img class="attachment-full wp-post-image rs-slide-image" alt="<?php esc_attr_e('Slide','seguente');?>" src="<?php echo esc_url(get_template_directory_uri().'/images/assets/slide.jpg');?>">
					<?php } ?>
			<?php } else { ?>
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('full'); ?>
				<?php } else { ?>
					<?php if ($slider_cat !='') { ?>
						<img class="attachment-full wp-post-image rs-slide-image" alt="<?php esc_attr_e('Slide','seguente');?>" src="<?php echo esc_url(get_template_directory_uri().'/images/assets/slide.jpg');?>">
					<?php } else { ?>
						<img class="attachment-full wp-post-image rs-slide-image" alt="<?php esc_attr_e('Slide','seguente');?>" src="<?php echo esc_url(get_template_directory_uri().'/images/assets/slide1.jpg');?>">
					<?php } ?>
				<?php } ?>
			<?php } ?>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
<?php }

function seguente_unslider_slider() {
	global $post;
	$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
	$slider_cat = $seguente_theme_options['image_slider_cat'];
	$num_of_slides = $seguente_theme_options['slider_num'];
	$button_text = $seguente_theme_options['caption_button_text'];

	$seguente_slider_query = new WP_Query(
		array(
			'posts_per_page' => $num_of_slides,
			'cat' 	=> $slider_cat
		)
	);?>
	<div class="clear"></div>
	<div class="banner">
		<ul>
		<?php while ( $seguente_slider_query->have_posts() ): $seguente_slider_query->the_post(); ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<li style="background: url(<?php echo esc_url($image[0]); ?>) 50% 0 no-repeat;">
			<?php if ($seguente_theme_options['captions_on'] == '1') { ?>	
				<div class="inner">
					<a class="post-title" href="<?php esc_url(the_permalink()); ?>"><h1><?php the_title(); ?></h1></a>
					<?php the_excerpt(); ?>
				</div>
				<?php if ($seguente_theme_options['captions_button'] == '1') { ?>
					<a href="<?php esc_url(the_permalink()); ?>" class="btn"><?php echo esc_html($button_text); ?></a>
				<?php }; ?>
			<?php }; ?>			
			</li>
		<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
	<div class="clear"></div>

<?php 
}

function seguente_localize_scripts_ideal(){
	$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
	$animation_speed = $seguente_theme_options['animation_speed'];
	$slideshow_speed = $seguente_theme_options['slideshow_speed'];
	$slider_height = $seguente_theme_options['slider_height'];
	$slider_effect = $seguente_theme_options['image_slider_effect'];
		$datatoBePassed = array(
        	'slideshowSpeed' => $slideshow_speed,
        	'animationSpeed' => $animation_speed,
			'sliderHeight' => $slider_height,
			'sliderEffect' => $slider_effect,
    	);
	if ($seguente_theme_options['captions_on'] == '1') {
		if (is_front_page() && ! is_home()) {
			wp_enqueue_script( 'seguente-slides-captions', get_template_directory_uri() .'/js/seguente-slides-captions.js' , array( 'jquery' ), '', true );
			wp_localize_script( 'seguente-slides-captions', 'php_vars', $datatoBePassed );
		}
	}else{
		wp_enqueue_script( 'seguente-ideal-slides', get_template_directory_uri() .'/js/seguente-ideal-slides.js' , array( 'jquery' ), '', true );
		wp_localize_script( 'seguente-ideal-slides', 'php_vars', $datatoBePassed );
	}

	
}

function seguente_localize_scripts_unslider(){
	wp_enqueue_script( 'seguente-slides', get_template_directory_uri() .'/js/seguente-slides.js' , array( 'jquery' ), '', true );
	$seguente_theme_options = seguente_get_options( 'seguente_theme_options' );
	$animation_speed = $seguente_theme_options['animation_speed'];
	$slideshow_speed = $seguente_theme_options['slideshow_speed'];
		$datatoBePassed = array(
        	'slideshowSpeed' => $slideshow_speed,
        	'animationSpeed' => $animation_speed,
    	);
	wp_localize_script( 'seguente-slides', 'php_vars', $datatoBePassed );
}

add_action( 'wp_enqueue_scripts', 'seguente_localize_scripts_ideal' );
add_action( 'wp_enqueue_scripts', 'seguente_localize_scripts_unslider' );
