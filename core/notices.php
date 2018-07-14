<?php

/*
*   Welcome Panel 
*/

function st_welcome_panel() {
echo
'<div class="welcome-panel-content">'
.'<h3>Your Welcome Title</h3>'
.'<iframe src="//www.youtube.com/embed/BirQTaTPYwA" height="480" width="854" allowfullscreen="" frameborder="0"></iframe>'
.'</div>';
}
remove_action('welcome_panel','wp_welcome_panel');
add_action('welcome_panel','st_welcome_panel');


function st_welcome_init() {
global $wpdb;
$wpdb->update($wpdb->usermeta,array('meta_value'=>1),array('meta_key'=>'show_welcome_panel'));
}

add_action('after_switch_theme','st_welcome_init');



/*
*
*   الرسالة التي تظهر بعد تثبيت القالب
*   
*/
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'my_theme_activation_notice' );
}

function my_theme_activation_notice(){
    ?>
    <div class="updated notice is-dismissible">
       <h1>شكراً لكم على ثقتكم في قالب سهى !</h1>
        <p>شكرا لكم من أجل تثبت قالبنا الرائع ، سيكون هناك الكثير من المميزات القادمة  <strong>استمتع !</strong>.</p>
    </div>
    <?php
}

