<?php

/*
*   Security : Deny Direct Url Access
*/
if(!defined('ABSPATH')) {
    exit;
}


/*
*   جلب محتوى الهيدر والفوتر
*/
function get_main_header() {
    require_once get_template_directory() .'/core/operations.php';
    require_once get_template_directory() .'/core/template/main-header.php';
}

function get_main_footer() {
    require_once get_template_directory() .'/core/template/main-footer.php';
}


/*
*  Get Related Posts  
*  usage Example :  $related = st_get_related_posts($post->ID,6);
*/
function st_get_related_posts( $post_id, $related_count, $args = array() ) {
    $args = wp_parse_args( (array) $args, array(
        'orderby' => 'rand',
        'return'  => 'query',
    ) );
    $related_args = array(
        'post_type'      => get_post_type( $post_id ),
        'posts_per_page' => $related_count,
        'post_status'    => 'publish',
        'post__not_in'   => array( $post_id ),
        'orderby'        => $args['orderby'],
        'tax_query'      => array()
    );

    $post       = get_post( $post_id );
    $taxonomies = get_object_taxonomies( $post, 'names' );
    foreach ( $taxonomies as $taxonomy ) {
        $terms = get_the_terms( $post_id, $taxonomy );
        if ( empty( $terms ) ) {
            continue;
        }
        $term_list                   = wp_list_pluck( $terms, 'slug' );
        $related_args['tax_query'][] = array(
            'taxonomy' => $taxonomy,
            'field'    => 'slug',
            'terms'    => $term_list
        );
    }

    if ( count( $related_args['tax_query'] ) > 1 ) {
        $related_args['tax_query']['relation'] = 'OR';
    }

    if ( $args['return'] == 'query' ) {
        return new WP_Query( $related_args );
    } else {
        return $related_args;
    }
}



/*
*   ترقيم الصفحات
*   مثال للاستخدام : 
*/
function theme_pagination($pages = '', $range = 4) {
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }

    if(1 != $pages) {
        echo '<section class="mt-50 mb-30 pl-20 pr-20">';
            echo '<nav class="pagination">';
                echo '<ul>';
                    if($paged > 1) {
                        echo '<li class="arrow"><a href="'. get_pagenum_link($paged - 1) .'"><i class="fas fa-angle-double-left"></i></a></li>';
                    }
                    for ($i=1; $i <= $pages; $i++) {
                        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                            if($paged == $i) {
                                echo '<li class="active"><a>'. $i .'</a></li>';
                            } else {
                                echo '<li><a href="'. get_pagenum_link($i) .'">'. $i .'</a></li>';
                            }
                        }
                    }
                    if ($paged < $pages) {
                        echo '<li class="arrow"><a href="'. get_pagenum_link($paged + 1) .'"><i class="fas fa-angle-double-right"></i></a></li>';
                    }
                echo '</ul>';
            echo '</nav>';
        echo '</section>';
    }
}



/*
*  مسار الصفحة
*/
function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
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
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}
























class app {
	
	static function dd ($d) {
       echo '<pre>';
        print_r($d);
        echo '</pre>';
    }

function getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}
	
function videoType($url) {
    if (strpos($url, 'youtube') > 0) {
        return 'youtube';
    } elseif (strpos($url, 'vimeo') > 0) {
        return 'vimeo';
    } else {
        return 'unknown';
    }
}	
	

     static function iframeVideo($url){  
if(self::videoType($url) == 'youtube') {
    $videoID = self::getYoutubeIdFromUrl($url);
    echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src=" https://www.youtube.com/embed/'.$videoID .'" allowfullscreen></iframe></div>' ;
}
    
if(self::videoType($url) == 'vimeo') {
    if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $output_array)) {
    echo '<div class="embed-responsive embed-responsive-16by9"><iframe src="https://player.vimeo.com/video/'.$output_array[5].'"></iframe></div>';
    
}
     
      
}
}
    
}


function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);










// usage : getYoutubeIdFromUrl($url);






