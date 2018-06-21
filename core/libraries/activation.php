<?php 



/*
*    Made by soulaimane takiddine <www.takiddine.com><takiddine.job@gmail.com>
*    Class To activate the theme
*    version : 1.0
*/ 



add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
    
    global $creator;
    
	add_menu_page( 'اسم القالب', 
                   $creator->name , 'manage_options', 
                  'theme_settings', 
                  'Admin_Settings', 
                  'dashicons-tickets', 6  );
}

function Admin_Settings(){
   global $creator; 
   require_once THEME_DIR.'/core/dashboard/welcome.php';
}

