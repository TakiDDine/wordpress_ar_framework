<?php



/*
*   Contact us Logic
*   
*/
if(!empty($onta_theme['email-reciever'])) {

            if(isset($_POST['submit-contact-Form'])){
                    $contactfullname      = $_POST['contact-full-name'];
                    $contactemail          = $_POST['contact-email'];
                    $contactsubject        = $_POST['contact-subject'];
                    $contactmessage        = $_POST['contact-message'];
                    if(!empty($contactemail) and !empty($contactmessage)){
                    if(!is_email($contactemail)) { $_SESSION['flash-conatct'] = '<div class="alert alert-danger">البريد الالكتروني غير صحيح</div>';}
                    $to = $onta_theme['email-reciever'];
                    $headers = array('Content-Type: text/html; charset=UTF-8');
                    if(wp_mail( $to, $contactsubject, $contactmessage , $headers )) {
                        $_SESSION['flash-conatct'] = '<div class="alert alert-success">تم الإرسال بنجاح</div>';  
                    }
                    }
                    else {
                      $_SESSION['flash-conatct'] = '<div class="alert alert-danger">المرجوا ادخال المعلومات</div>';  
                    }
            }
}




$args = array(
    'numberposts' => -1,
    'post_status'      => 'publish',
    'suppress_filters' => true ,
);
$categories = get_categories($args);






/*
*
*   جلب المقالات للرئيسية
*/
$args = array(
    'numberposts' => 6,
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$HomePosts = get_posts( $args ); 





/*
*
*   جلب المقالات لصفحة المدونة
*/
$args = array(
    'numberposts' => $onta_theme['counter-blogs'],
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$blogPosts = get_posts( $args ); 










































