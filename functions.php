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




add_action( 'admin_menu', 'dkjdkjd_add_admin_menu' );
add_action( 'admin_init', 'dkjdkjd_settings_init' );


function dkjdkjd_add_admin_menu(  ) { 

	add_submenu_page( 'tools.php', 'kadlk', 'kadlk', 'manage_options', 'kadlk', 'dkjdkjd_options_page' );

}


function dkjdkjd_settings_init(  ) { 

	register_setting( 'pluginPage', 'dkjdkjd_settings' );

	add_settings_section(
		'dkjdkjd_pluginPage_section', 
		__( 'Your section description', 'ddddd' ), 
		'dkjdkjd_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'dkjdkjd_text_field_0', 
		__( 'Settings field description', 'ddddd' ), 
		'dkjdkjd_text_field_0_render', 
		'pluginPage', 
		'dkjdkjd_pluginPage_section' 
	);

	add_settings_field( 
		'dkjdkjd_text_field_1', 
		__( 'Settings field description', 'ddddd' ), 
		'dkjdkjd_text_field_1_render', 
		'pluginPage', 
		'dkjdkjd_pluginPage_section' 
	);

	add_settings_field( 
		'dkjdkjd_checkbox_field_2', 
		__( 'Settings field description', 'ddddd' ), 
		'dkjdkjd_checkbox_field_2_render', 
		'pluginPage', 
		'dkjdkjd_pluginPage_section' 
	);

	add_settings_field( 
		'dkjdkjd_select_field_3', 
		__( 'Settings field description', 'ddddd' ), 
		'dkjdkjd_select_field_3_render', 
		'pluginPage', 
		'dkjdkjd_pluginPage_section' 
	);


}


function dkjdkjd_text_field_0_render(  ) { 

	$options = get_option( 'dkjdkjd_settings' );
	?>
	<input type='text' name='dkjdkjd_settings[dkjdkjd_text_field_0]' value='<?php echo $options['dkjdkjd_text_field_0']; ?>'>
	<?php

}


function dkjdkjd_text_field_1_render(  ) { 

	$options = get_option( 'dkjdkjd_settings' );
	?>
	<input type='text' name='dkjdkjd_settings[dkjdkjd_text_field_1]' value='<?php echo $options['dkjdkjd_text_field_1']; ?>'>
	<?php

}


function dkjdkjd_checkbox_field_2_render(  ) { 

	$options = get_option( 'dkjdkjd_settings' );
	?>
	<input type='checkbox' name='dkjdkjd_settings[dkjdkjd_checkbox_field_2]' <?php checked( $options['dkjdkjd_checkbox_field_2'], 1 ); ?> value='1'>
	<?php

}


function dkjdkjd_select_field_3_render(  ) { 

	$options = get_option( 'dkjdkjd_settings' );
	?>
	<select name='dkjdkjd_settings[dkjdkjd_select_field_3]'>
		<option value='1' <?php selected( $options['dkjdkjd_select_field_3'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['dkjdkjd_select_field_3'], 2 ); ?>>Option 2</option>
	</select>

<?php

}


function dkjdkjd_settings_section_callback(  ) { 

	echo __( 'This section description', 'ddddd' );

}


function dkjdkjd_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>kadlk</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

