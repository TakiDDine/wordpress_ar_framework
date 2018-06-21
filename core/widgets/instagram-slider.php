<?php

class instagram_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'Insta_widget', // Base ID
			esc_html__( 'معرض الأنستغرام', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'اظهار صور الأنستغرام على شكل معرض', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {  


        
function rudr_instagram_api_curl_connect( $api_url ){
	$connection_c = curl_init(); // initializing
	curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
	curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
	curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
	$json_return = curl_exec( $connection_c ); // connect and get json data
	curl_close( $connection_c ); // close connection
	return json_decode( $json_return ); // decode and return
}


        
        
        
$access_token = $instance['accessToken'];
$photo_count = 9;
$json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
$json_link .="access_token={$access_token}&count={$photo_count}";
        
$json = rudr_instagram_api_curl_connect($json_link);

        
//        $json = file_get_contents($json_link);

    
        
           $result = json_decode($result);

$obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);








?>
        
       
 <div class="content-block">
                            <h2 class="title"><?php echo $instance['title']; ?></h2>
                            <div class="swiper-container"  data-slides-per-view="1" data-loop="1">
                                <div class="swiper-wrapper">
                                   
                                           
                                           
                                           <?php
                    echo '<pre>';
        var_dump($json);
                    echo '</pre>';
        
        
        
                                           foreach (array_chunk($obj['data'],9, true) as $array) {
    echo '<div class="swiper-slide"><div class="gallery-parent clearfix">';
    foreach($array as $post) {
        
    $pic_text = $post['caption']['text'];
    $pic_link = $post['link'];
    $pic_like_count = $post['likes']['count'];
    $pic_comment_count=$post['comments']['count'];
    $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
    $pic_created_time=date("F j, Y", $post['caption']['created_time']);
    $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));
        
        ?>
        
         <a href="<?php echo $pic_src; ?>" class="">
                                                <img src="<?php echo $pic_src; ?>" alt="img"/>
                                            </a>
        
         <?php 
    }
    echo '</div>';
    echo '</div>';
}
                                           
                   
                                           
                                           ?>

                                    
                                </div>
                                <div class="pagination pagination-gallery"></div>
                            </div>
                            <div class="arrow-left"><i class="fa fa-chevron-left"></i></div>
                            <div class="arrow-right"><i class="fa fa-chevron-right"></i></div>
                        </div>
        
        
        
        
        
        
        
        
    <?php  }

	public function form( $instance ) {
    $title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : ''; 
    $accessToken  = isset( $instance['accessToken'] ) ? esc_html( $instance['accessToken'] ) : ''; ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">العنوان</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>" >
        </p>
          <p>
            <label for="<?php echo $this->get_field_id('accessToken'); ?>">الأكسس توكن</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name('accessToken'); ?>" id="<?php echo $this->get_field_id('accessToken'); ?>" value="<?php echo $accessToken; ?>" >
            <span> للحصول على رمز حسابكم  عن طريق هذا الرابط
            <a href="http://instagram.pixelunion.net" target="_blank">اضغط هنا</a></span>
        </p>
	<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']    = $new_instance['title'];
		$instance['accessToken']    = $new_instance['accessToken'];

		return $instance;
	}

}

