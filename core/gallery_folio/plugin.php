<?php



/*
*
*  نداء الستايل الخاص بالاضافة
*
*/
function load_gallery_folio_style() {
    wp_register_style( 'bootstrap_folio', get_template_directory_uri().'/core/gallery_folio/assets/css/bootstrap.min.css', true, '1.0.0' );
    wp_register_style( 'style_folio', get_template_directory_uri().'/core/gallery_folio/assets/css/style.css', true, '1.0.0' );
    wp_enqueue_style( 'bootstrap_folio' );
    wp_enqueue_style( 'style_folio' );
}
add_action( 'admin_enqueue_scripts', 'load_gallery_folio_style' );



/*
*   نداء الجافاسكربت الخاصة بالاضافة
*/
function bootstraph_js() {
     wp_register_script( 'some-js', get_template_directory_uri().'/core/gallery_folio/assets/js/bootstrap.min.js');
     wp_enqueue_script( 'some-js' );
}
add_action( 'admin_enqueue_scripts', 'bootstraph_js');


/*
*   انشاء جدول الصور في قاعدة البيانات
*   $t_name => اسم الجدول في قاعدة البيانات 
*/
global $wpdb;
$t_name = $wpdb->prefix.'images_gallery';
if($wpdb->get_var("SHOW TABLES LIKE '$t_name'") != $t_name) :
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $t_name ( `id` INT(11) NOT NULL AUTO_INCREMENT , `image` TEXT NOT NULL , PRIMARY KEY (`id`))";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
endif;



/*
*    انشاء القائمة في لوحة التحكم
*/
function image_plugin(){
    add_menu_page(
        "معرض الصور", 	// Title Website
        "معرض الصور", 				// Menu Name
        "manage_options", 			// View This Menu
        "images_gallery", 					// Slug In URL
        "image_plugin_function", 				// Function To Execute
        "dashicons-camera", 		// Menu Icon
        4
    );
}
add_action("admin_menu","image_plugin");



/*
*   دالة انشاء صفحة الصور في لوحة التحكم
*/
function image_plugin_function(){
    require_once( get_template_directory() . '/core/gallery_folio/gallery_folio.php');
}
