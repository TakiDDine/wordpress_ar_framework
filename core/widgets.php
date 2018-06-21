<?php 

if(!defined('ABSPATH')) {
    exit;
}

add_action( 'widgets_init', function(){
	
	/*	Sidbar Widgets */
	register_widget( 'categories_widget' );
	register_widget( 'Featured_Slider' );
	register_widget( 'tags_widget' );
	register_widget( 'search_widget' );
	register_widget( 'social_media_widget' );
	register_widget( 'about_me_widget' );
	register_widget( 'popular_posts_widget' );
	register_widget( 'instagram_widget' );
	register_widget( 'video_widget' );
    
	/* Footer Widgets */
	register_widget( 'LeftWidget' );
	register_widget( 'CenterWidget' );
	register_widget( 'RightWidget' );
	
});


if(function_exists('register_sidebar')) {
    
    register_sidebar ( array (
            'name' => 'القائمة الجانبية',
            'id' => 'home_sidebar',
            'description' => 'القائمة الجانبية الافتراضية في موقعك، كل ما يتم إضافته هنا سيظهر في جميع الصفحات التي يظهر بها قائمة جانبية ',
            'before_widget' => '<div id="%2$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>' ,
    ) );
    register_sidebar ( array (
            'name' => 'قائمة خاتمة الموقع',
            'id' => 'footer_widgets_1',
            'before_widget' => '<div id="%2$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>' ,
    ) );
    register_sidebar ( array (
            'name' => 'قائمة خاتمة الموقع',
            'id' => 'footer_widgets_2',
            'before_widget' => '<div id="%2$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>' ,
    ) );
    register_sidebar ( array (
            'name' => 'قائمة خاتمة الموقع',
            'id' => 'footer_widgets_3',
            'before_widget' => '<div id="%2$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>' ,
    ) );
}


/*
*       نداء الودجاتس
*
*/
require_once 'widgets/search.php';
require_once 'widgets/about-me.php';
require_once 'widgets/featured-slider.php';
require_once 'widgets/popular-posts.php';
require_once 'widgets/search.php';
require_once 'widgets/social-media.php';
require_once 'widgets/tags.php';
require_once 'widgets/categories.php';
require_once 'widgets/instagram-slider.php';
require_once 'widgets/videos-slider.php';
require_once 'widgets/footer-widgets.php';
