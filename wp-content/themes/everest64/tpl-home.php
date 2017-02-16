<?php
/**
 * Template Name: Home page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package everest64
 */

get_header(); ?>

	<!-- Slider ======================================= --> 
	<section id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php
				$cid = get_theme_mod('slider_category_display');
				$category_link = get_category_link($cid);
				$everest64_cat = get_category($cid);
				if ($everest64_cat) {
        	?>

        	<?php
	            $args = array(
	              'posts_per_page' => 5,
	              'paged' => 1,
	              'cat' => $cid
	            );

	            $loop = new WP_Query($args);  
	            $cn = 0;
	            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
	        ?>

		    <div class="item">
			    <?php the_post_thumbnail('everest64-slider-thumb');?>
			    <div class="carousel-caption text-left">
			      	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
			      	<?php the_excerpt(); ?>
			    </div>
		    </div>

		    <?php    
      			endwhile;
      				wp_reset_postdata();  
      			endif; 
    				}
    		?>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="icon-next"></span>
		</a>
	</section><!-- end section -->
	<div class="menu-shadow"></div>




	<section class="middle-section">
		<div class="container">

			<div class="col-md-4">   
				<?php if (get_theme_mod('about_img') != '') : ?> 
	                <img src="<?php echo esc_url( get_theme_mod( 'about_img', '' ) ) ; ?>"  alt="" class="one img-responsive wow zoomIn animated" data-wow-delay="3s" style="visibility: visible; -webkit-animation-delay: 3s;"/>

	                <?php else : ?>  
	                <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/everest.jpg"  alt="" class="one img-responsive wow zoomIn animated" data-wow-delay="3s" style="visibility: visible; -webkit-animation-delay: 3s;"/>   
				<?php endif; ?>
	    	</div> <!-- end col-md-4 -->

			<div class="col-md-8  wow fadeInRight animated" data-wow-delay="4s" style="visibility: visible; -webkit-animation-delay: 4s;">   
	    		<h3 class="caps"><?php echo esc_html(get_theme_mod( 'about_title', __( 'Welcome to Everest64 Theme', 'everest64' ) ) ); ?></h3>   
	    		<p><?php echo html_entity_decode(esc_html(get_theme_mod( 'about_desc', __( '', 'everest64' ) ) )); ?></p>
	            <a class="btn read-more" href="<?php echo esc_url(get_theme_mod( 'about_url', 'everest64' )); ?>" ><?php _e('In Details', 'everest64'); ?></a>	            
			</div><!-- end col-md-8 -->

	   	</div><!-- end container -->
	</section><!-- end middle-section -->	
	<div class="clearfix"></div>




	<section class="featured-box">
        <div class="container">

        	<h3 class="cap text-center"><?php echo esc_html(get_theme_mod( 'services_title', __( 'Our Product Categories', 'everest64' ) ) ); ?></h3>        	

        	<?php if( get_theme_mod('services_page1')) { ?>
                <?php $queryvar = new WP_query('page_id='.get_theme_mod('services_page1' ,true)); ?>
                <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?> 
			        <div class="box wow fadeInRight animated" data-wow-delay="2s" style="visibility: visible; -webkit-animation-delay: 2s;">
		            	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
			                <?php if (has_post_thumbnail()) : ?>
				              	<?php the_post_thumbnail('everest64-package-thumb');?>
				            	<?php else : ?>
				              	<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/everest.jpg"  alt="" class="one img-responsive wow zoomIn animated" data-wow-delay="3s" style="visibility: visible; -webkit-animation-delay: 3s;"/>
				            <?php endif; ?>	                
				            <h4><?php the_title();?></h4>
			            </a>
		            </div>
			    <?php endwhile; ?>
			<?php } ?>

			<?php if( get_theme_mod('services_page2')) { ?>
                <?php $queryvar = new WP_query('page_id='.get_theme_mod('services_page2' ,true)); ?>
                <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?> 
			        <div class="box wow fadeInRight animated" data-wow-delay="2s" style="visibility: visible; -webkit-animation-delay: 2s;">
		            	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
			                <?php if (has_post_thumbnail()) : ?>
				              	<?php the_post_thumbnail('everest64-package-thumb');?>
				            	<?php else : ?>
				              	<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/everest.jpg"  alt="" class="one img-responsive wow zoomIn animated" data-wow-delay="3s" style="visibility: visible; -webkit-animation-delay: 3s;"/>
				            <?php endif; ?>	                
				            <h4><?php the_title();?></h4>
			            </a>
		            </div>
			    <?php endwhile; ?>
			<?php } ?>

			<?php if( get_theme_mod('services_page3')) { ?>
                <?php $queryvar = new WP_query('page_id='.get_theme_mod('services_page3' ,true)); ?>
                <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?> 
			        <div class="box wow fadeInRight animated" data-wow-delay="2s" style="visibility: visible; -webkit-animation-delay: 2s;">
		            	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
			                <?php if (has_post_thumbnail()) : ?>
				              	<?php the_post_thumbnail('everest64-package-thumb');?>
				            	<?php else : ?>
				              	<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/everest.jpg"  alt="" class="one img-responsive wow zoomIn animated" data-wow-delay="3s" style="visibility: visible; -webkit-animation-delay: 3s;"/>
				            <?php endif; ?>	                
				            <h4><?php the_title();?></h4>
			            </a>
		            </div>
			    <?php endwhile; ?>
			<?php } ?>

			<?php if( get_theme_mod('services_page4')) { ?>
                <?php $queryvar = new WP_query('page_id='.get_theme_mod('services_page4' ,true)); ?>
                <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?> 
			        <div class="box wow fadeInRight animated" data-wow-delay="2s" style="visibility: visible; -webkit-animation-delay: 2s;">
		            	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
			                <?php if (has_post_thumbnail()) : ?>
				              	<?php the_post_thumbnail('everest64-package-thumb');?>
				            	<?php else : ?>
				              	<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/everest.jpg"  alt="" class="one img-responsive wow zoomIn animated" data-wow-delay="3s" style="visibility: visible; -webkit-animation-delay: 3s;"/>
				            <?php endif; ?>	                
				            <h4><?php the_title();?></h4>
			            </a>
		            </div>
			    <?php endwhile; ?>
			<?php } ?>

        </div><!-- end container -->
    </section><!-- end featured-box -->
    <div class="clearfix"></div>





    <section class="our-packages wow fadeInRight animated" data-wow-delay="3s" style="visibility: visible; -webkit-animation-delay: 4s;">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <h3 class="caps text-center"><?php echo esc_html(get_theme_mod( 'package_title', __( 'Our Awesome Featured Packages', 'everest64' ) ) ); ?></h3>
	            </div>

	            <?php
					$cid = get_theme_mod('packages_category_display');
					$category_link = get_category_link($cid);
					$everest64_cat = get_category($cid);
					if ($everest64_cat) {
	        	?>

	        	<?php
		            $args = array(
		              'posts_per_page' => 8,
		              'paged' => 1,
		              'cat' => $cid
		            );

		            $loop = new WP_Query($args);  
		            $cn = 0;
		            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
		        ?>

		        <div class="col-md-3 col-sm-6 single center-block wow fadeInUp">
	            	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
		                <?php if (has_post_thumbnail()) : ?>
			              	<?php the_post_thumbnail('everest64-package-thumb');?>
			            	<?php else : ?>
			              	<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/everest.jpg" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />
			            <?php endif; ?>

		                <div class="on-hover">
			                <div class="outer">
			                    <div class="middle">
			                        <div class="inner">
			                            <h3 class="category"><?php the_title();?></h3>
			                            <div class="underline"></div>
			                            <?php the_excerpt(); ?>
			                        </div>
			                    </div>
			                </div>
		                </div>
		            </a>
	            </div>

			    <?php    
	      			endwhile;
	      				wp_reset_postdata();  
	      			endif; 
	    				}
	    		?> 

	        </div>
	    </div>
	</section>




	<section class="latest-post">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <h3 class="caps text-center"><?php echo esc_html(get_theme_mod( 'blog_title', __( 'Latest Blog Posts', 'everest64' ) ) ); ?></h3>
	            </div>

	            <?php
					$cid = get_theme_mod('blog_category_display');
					$category_link = get_category_link($cid);
					$everest64_cat = get_category($cid);
					if ($everest64_cat) {
	        	?>

	        	<?php
		            $args = array(
		              'posts_per_page' => 4,
		              'paged' => 1,
		              'cat' => $cid
		            );

		            $loop = new WP_Query($args);  
		            $cn = 0;
		            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
		        ?>

		        <div class="col col-md-3 col-sm-6">
	                <div class="single wow fadeInUp">
	                	<?php if (has_post_thumbnail()) : ?>
			              	<?php the_post_thumbnail('everest64-blog-thumb');?>
			            	<?php else : ?>
			              	<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/everest.jpg" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />
			            <?php endif; ?>

	                    
	                    <div class="content">
	                    	<div class="post-info">
	                    		<div class="pull-left"><i class="fa fa-calendar"></i> <?php echo get_the_date('d M Y');?></div>
	                    	</div>
	                        <h4 class="block-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
	                        <?php the_excerpt(); ?>
	                    </div>
	                </div>
	            </div>

			    <?php    
	      			endwhile;
	      				wp_reset_postdata();  
	      			endif; 
	    				}
	    		?>

	        </div>
	    </div>
	</section>
    

<?php
get_footer();