<?php

/*
*   Security : Deny Direct Url Access
*/
if(!defined('ABSPATH')) {
    exit;
}

/*
*   Functions to add custom style
*   css Files
*   wp_enqueue_style();
*/

function Template_Add_Styles(){
    global $css,$arfont ;
    
    wp_enqueue_style('bootstrap',  $css.'bootstrap.min.css' );
    
    /**
    Arabic Font + bootstrap-rtl
    **/
    if(is_rtl()){ wp_enqueue_style('ar-font', $arfont );  wp_enqueue_style('bootstrap-rtl',  $css.'bootstrap-rtl.min.css' ); }
    
    wp_enqueue_style('font-awesome-fl', $css.'font-awesome.min.css' );
    wp_enqueue_style('animate', $css.'animate.css' );
    wp_enqueue_style('hover', $css.'hover-min.css' );
    wp_enqueue_style('magnific-popup', $css.'magnific-popup.css' );
    wp_enqueue_style('carousssel', $css.'owl.carousel.css' );
    wp_enqueue_style('caroudsel', $css.'slick.css' );
    wp_enqueue_style('carodusel', $css.'slick-theme.css' );
    wp_enqueue_style('lightbox', $css.'lightbox.min.css' );
    wp_enqueue_style('main-style', $css.'style-ar.css' );
    wp_enqueue_style('main-responsive', $css.'responsive.css' );
    wp_enqueue_style('taboo-css', $css.'taboo.css' );
    
    
}

/*
*   Functions to add custom style
*   JS Files
*   wp_enqueue_script();
*/


function Template_Add_Scripts(){
    global $js;
    wp_enqueue_script('jquedry-js', $js.'modernizr-2.8.3.min.js' , array(), null,false);
    wp_enqueue_script('jquery-js', $js.'jquery.min.js' , array(), null,true);
    wp_enqueue_script('jquery-ui', $js.'jquery-ui.min.js' , array(), null,true);
    wp_enqueue_script('swiper', $js.'bootstrap.min.js' , array(), null,true);
    wp_enqueue_script('loader', $js.'jquery.meanmenu.js' , array(), null,true);
    wp_enqueue_script('bootstrap-js', $js.'wow.min.js' , array(), null,true);
    wp_enqueue_script('wow-js', $js.'slick.min.js' , array(), null,true);
    wp_enqueue_script('main-js', $js.'owl.carousel.min.js' , array(), null,true);
    wp_enqueue_script('lightbox-js', $js.'jquery.magnific-popup.js' , array(), null,true);
    wp_enqueue_script('lightbosx-js', $js.'jquery.counterup.min.js' , array(), null,true);
    wp_enqueue_script('ldightbosx-js', $js.'waypoints.min.js' , array(), null,true);
    wp_enqueue_script('sticky-sidebar-js', $js.'lightbox.min.js' , array(), null,true);
    wp_enqueue_script('sticky-siddsdebar-js', $js.'main.js' , array(), null,true);
//    wp_enqueue_script('taboo-js', $js.'taboo.js' , array(), null,true);
}


/*
*   Add Actions
*   JS Files
*   wp_enqueue_script();
*/
add_action( 'wp_enqueue_scripts', 'Template_Add_Styles' );
add_action( 'wp_enqueue_scripts', 'Template_Add_Scripts' );


/*
*
*   ADD Media Uploader JS TO ADMIN FOOTER
*
*/
add_action( 'admin_enqueue_scripts', 'themed_admin_scripts' );
if( !function_exists('themed_admin_scripts') ) {
    function themed_admin_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'wp-media-uploader', get_template_directory_uri() . '/core/assets/js/wp_media_uploader.js', array( 'jquery' ), 3.0 );
        wp_enqueue_script('custom-admin-js' , get_template_directory_uri() . '/core/assets/js/admin.js',array('jquery'));
    }

}

/*
*
*   ADD CSS TO ADMIN FOOTER
*
*/
function load_custom_wp_admin_style() {
        global $css;
        wp_register_style( 'custom_wp_admin_css', $css . '/admin.css', true, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
        wp_register_style( 'redux_it', THEME_URL.'/core/theme-options/ReduxCore/assets/css/redux-style.css', true, '1.0.0' );
        wp_enqueue_style( 'redux_it' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );



/*
*
*   INITALIZE Media Uploader JS TO ADMIN FOOTER
*/
function wp_media_script() { 
    echo "<script>  $.wpMediaUploader();  </script> ";
}
add_action('admin_footer', 'wp_media_script');



/*
*   ADD Date Picker
*/
wp_enqueue_script('jquery-ui-datepicker');
wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
wp_enqueue_style('jquery-ui');
