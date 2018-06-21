<?php


/*
*       القوائم
*/
function wpb_custom_new_menu() {
    register_nav_menu('top_header_menu',__( 'القائمة العلوية' ));
    register_nav_menu('phone_menu',__( 'قائمة الهاتف' ));
    register_nav_menu('primary_menu',__( 'قائمة الرئيسية' ));
    register_nav_menu('footer_menu',__( 'قائمة الفوتر' ));
}
add_action( 'init', 'wpb_custom_new_menu' );


function add_post_formats() {
    
		// Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Enable support for WooCommerce
        add_theme_support( 'woocommerce' );

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'rella-assets'
        ));

		// Allow shortcodes in widgets.
		add_filter( 'widget_text', 'do_shortcode' );
    
    
    
    /*
    *   نوع المواضيع
    */
    add_theme_support( 'post-formats', array( 'gallery', 'quote', 'video', 'aside', 'image', 'link' ) );
    
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    
        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'rella-assets'
        ));
    
    add_theme_support( 'woocommerce' );
    
    /*
    *   الشعار
    */
    add_theme_support( 'custom-logo' );

    
}
add_action( 'after_setup_theme', 'add_post_formats', 20 );

