<?php

 /**
 * @author soulaimane takiddine <takiddine.job@gmail.com>
 * @copyright 2018 soulaimane takiddine
 * @website  <www.takiddine.com>
 **/

if(!defined('ABSPATH')) {
    exit;
}

if ( !defined( 'THEME_DIR' ) ) {
    define( 'THEME_DIR', get_template_directory() );
}

if ( !defined( 'THEME_URL' ) ) {
    define( 'THEME_URL', get_template_directory_uri() );
}

/*
*   INITIALIZE FILES DIRECTORY
*/
$css                = THEME_URL . '/core/assets/css/';
$js                 = THEME_URL . '/core/assets/js/';
$images             = THEME_URL . '/core/assets/images/';
$iransansFont       = THEME_URL . '/core/assets/arfont/iransans/font.css';


// wordpress theme Setup
require_once THEME_DIR. '/core/setup.php';

// Functions
require_once THEME_DIR. '/core/functions.php';

// Assets To Load JS and Css files
require_once THEME_DIR. '/core/assets.php';

// Load MetaBoxs
require_once THEME_DIR. '/core/metabox.php';

// Load Shortcodes
require_once THEME_DIR. '/core/shortcodes.php';

// Load security
require_once THEME_DIR. '/core/security.php';

// Load widgets 
require_once THEME_DIR. '/core/widgets.php';

// Arabic Fonts 
require_once THEME_DIR. '/core/arab-font.php';    

// AJAX
require_once THEME_DIR. '/core/ajax.php';

/*
*   Redux Framework : theme Settings
*   For More Help : https://docs.reduxframework.com
*/
include_once THEME_DIR . '/core/theme-options/ReduxCore/framework.php';
require_once THEME_DIR.  '/core/theme-options/config.php';


/*
*   Codestar Framework : theme Settings
*   For More Help : http://codestarframework.com/documentation 
*/
require_once THEME_DIR .'/core/codestar/cs-framework.php';



// Bootstrap Nav Walker 
require_once THEME_DIR. '/core/class-wp-bootstrap-navwalker.php';

require_once THEME_DIR . '/core/redux-metaboxes/metaboxes_api.php';

// HTML Compressor 
require_once THEME_DIR. '/core/html-compressor.php';

// portfolio
//require_once THEME_DIR. '/core/gallery_folio/plugin.php';
//require_once THEME_DIR. '/core/gallery_video/plugin.php';

/*
 To do , if the Theme is not activated , stop all the down stop to apear , the only thing will apear is activation page
* now i have the extension of metabox , so every thing is fucked , yay baby
*/
//require_once THEME_DIR. '/core/libraries/init.php';







/**
 * Add iFrame to allowed wp_kses_post tags
 *
 * @param string $tags Allowed tags, attributes, and/or entities.
 * @param string $context Context to judge allowed tags by. Allowed values are 'post',
 *
 * @return mixed
 */
function custom_wpkses_post_tags( $tags, $context ) {
	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'custom_wpkses_post_tags', 10, 2 );


