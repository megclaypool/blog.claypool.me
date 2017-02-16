<?php 
/**
 * @package Seguente
 *
 */
if (!is_front_page()) {
	echo '<ul>';
    echo '<li><a href="';
    echo esc_url(home_url());
    echo '">';
    esc_html_e('Home','seguente');
    echo '</a></li><li class="separator"> / </li>';
    if (is_category() || is_single()) {
        echo '<li>';
        the_category(' </li><li class="separator"> / </li><li> ');
        if (is_single()) {
            echo '</li><li class="separator"> / </li><li>';
            the_title();
            echo '</li>';
        }
    } elseif (is_page()) {
        if( wp_get_post_parent_id( get_queried_object_id()) ){
            $anc = get_post_ancestors( get_queried_object_id());
                 
            foreach ( $anc as $ancestor ) {
                $output = '<li><a href="'.esc_url(get_permalink($ancestor)).'" title="'.esc_attr(get_the_title($ancestor)).'">'.esc_html(get_the_title($ancestor)).'</a></li> <li class="separator">/</li>';
            }
			echo $output;
            echo '<li title="'.esc_attr(get_the_title()).'"> '.esc_html(get_the_title()).'</li>';
        } else {
            echo '<li> ';
            echo esc_html(the_title());
            echo '</li>';
        }
    }  
elseif (is_tag()) {
	esc_html_e('Tag: ','seguente');esc_attr(single_tag_title());
}
elseif (is_day()) {echo"<li> " . esc_html__('Archive for ','seguente'); the_archive_title(); echo'</li>';}
elseif (is_month()) {echo"<li> " . esc_html__('Archive for ','seguente'); the_archive_title(); echo'</li>';}
elseif (is_year()) {echo"<li> " . esc_html__('Archive for ','seguente'); the_archive_title(); echo'</li>';}
elseif (is_author()) {echo"<li> " . esc_html__('Author: ','seguente'); esc_url(the_author_posts_link()); echo'</li>';}
elseif (get_query_var('paged')) {echo "<li> " . esc_html__('Page: ','seguente'); get_query_var('paged'); echo'</li>';}
elseif (is_search()) {echo"<li> " . esc_html__('Search Results ','seguente'); echo'</li>';}
echo '</ul>';
}