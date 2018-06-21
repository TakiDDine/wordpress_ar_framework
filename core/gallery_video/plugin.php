<?php
global $wpdb;

require_once THEME_DIR . '/core/gallery_video/functions.php';

/*
*
*  نداء الستايل الخاص بالاضافة
*
*/
function load_gallery_video_style() {
    
 wp_register_style( 'bootstrap-galley', get_template_directory_uri().'/core/gallery_video/assets/css/bootstrap.min.css', true, '1.0.0' );
  wp_register_style( 'style-galley', get_template_directory_uri().'/core/gallery_video/assets/css/style.css', true, '1.0.0' );
  wp_enqueue_style( 'bootstrap-galley' );
  wp_enqueue_style( 'style-galley' );
}
add_action( 'admin_enqueue_scripts', 'load_gallery_video_style' );


/*
*   نداء الجافاسكربت الخاصة بالاضافة
*/
function bootstrap_js() {
     wp_register_script( 'some-js', get_template_directory_uri().'/core/gallery_video/assets/js/bootstrap.min.js');
     wp_enqueue_script( 'some-js' );
}
add_action( 'admin_enqueue_scripts', 'bootstrap_js');



/*
*   انشاء جدول الفيديوهات في قاعدة البيانات
*   $t_name => اسم الجدول في قاعدة البيانات 
*/
$t_name = $wpdb->prefix.'video_gallery';
if($wpdb->get_var("SHOW TABLES LIKE '$t_name'") != $t_name) :
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $t_name ( `id` INT(11) NOT NULL AUTO_INCREMENT , `video` TEXT NOT NULL , PRIMARY KEY (`id`))";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
endif;


/*
*    انشاء القائمة في لوحة التحكم
*/
function video_plugin(){
    // Menu Admin
    add_menu_page(
        "الفديوهات", 	                // Title Website
        "معرض الفديوهات" ,				// Menu Name
        "manage_options", 			// View This Menu
        "all_videos", 				// Slug In URL
        "video_plugin_function", 	// Function To Execute
        "dashicons-video-alt3", 	// Menu Icon
        4
    );
}
add_action("admin_menu","video_plugin");




/*
*   دالة انشاء صفحة الفيديوهات في لوحة التحكم
*/
function video_plugin_function(){
    require_once( get_template_directory() . '/core/gallery_video/gallery_video.php');
}


