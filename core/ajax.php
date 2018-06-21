<?php


function my_enqueue() {    
    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/core/assets/js/ajax-theme.js', array('jquery') );
    wp_localize_script( 'ajax-script', 'varjs', array('ajax_url' => admin_url( 'admin-ajax.php' )) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );



function return_ajax_result() {
    
                    $fullname      = $_POST['fullname'];
                    $email          = $_POST['email'];
                    $subject        = $_POST['subject'];
                    $message        = $_POST['message'];
                
                    if(!empty($email) and !empty($message)){
                    if(!is_email($email)) { echo '<div class="alert alert-danger">البريد الالكتروني غير صحيح</div>'; }
                    }
                        
                    
                    $to = $onta_theme['email-reciever'];
                    $headers = array('Content-Type: text/html; charset=UTF-8');
                    if(wp_mail( $to, $subject, $message , $headers )) {
                        echo '<div class="alert alert-success">تم الإرسال بنجاح</div>';  
                    }
               
                    else {
                      echo '<div class="alert alert-danger">المرجوا ادخال المعلومات</div>';  
                    }
    
    die();
    
}
add_action( 'wp_ajax_submit_dak_lmerd', 'return_ajax_result' );
add_action( 'wp_ajax_nopriv_submit_dak_lmerd', 'return_ajax_result' );