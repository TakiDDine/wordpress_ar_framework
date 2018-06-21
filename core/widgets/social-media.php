<?php




/*
*   السوشيال ميديا
*
*/
class social_media_widget extends WP_Widget {
    
	function __construct() {
		parent::__construct(
			'social_media_widget', // Base ID
			esc_html__( 'مواقع التواصل الإجتماعي', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'social media widget', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) { ?>
          <div class="content-block">
            <h2 class="title"><?php echo $instance['title'] ?></h2>
            <div class="social-media">
               <?php if(!empty($instance['facebook_url'])) {
                    echo '<a class="facebook" href="'. $instance['facebook_url'] .'"><i class="fa fa-facebook"></i> تابعنا على الفيسبوك</a>';
                }  ?>
                <?php if(!empty($instance['twitter_url'])) {
                    echo '<a class="twitter" href="'. $instance['twitter_url'] .'"><i class="fa fa-twitter"></i>تابعنا على تويتر </a>';
                }  ?>
                <?php if(!empty($instance['pinterest_url'])) {
                    echo '<a class="pinterest" href="'. $instance['pinterest_url'] .'"><i class="fa fa-pinterest-p"></i> تابعنا على بينترست </a>';
                }  ?>
                <?php if(!empty($instance['youtube_url'])) {
                    echo '<a class="youtube" href="'. $instance['youtube_url'] .'"><i class="fa fa-youtube-play"></i> اشترك في قناتنا </a>';
                }  ?>
                <?php if(!empty($instance['google_url'])) {
                    echo '<a class="google" href="'. $instance['google_url'] .'"><i class="fa fa-google"></i> تابعنا في جوجل بلس </a>';
                }  ?>
                <?php if(!empty($instance['instagram_url'])) {
                    echo '<a class="instagram" href="'. $instance['instagram_url'] .'"><i class="fa fa-instagram"></i>  تابعنا على الأنستغرام </a>';
                }  ?>
            </div>
         </div>
    <?php }

	public function form( $instance ) {
		$title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
		$facebook_link      = isset( $instance['facebook_url'] ) ? esc_html( $instance['facebook_url'] ) : 'https://www.facebook.com';
		$twitter_url        = isset( $instance['twitter_url'] ) ? esc_html( $instance['twitter_url'] ) : 'https://www.twitter.com';
		$pinterest_url      = isset( $instance['pinterest_url'] ) ? esc_html( $instance['pinterest_url'] ) : 'https://www.pinterest.com';
		$youtube_url        = isset( $instance['youtube_url'] ) ? esc_html( $instance['youtube_url'] ) : 'https://www.youtube.com';
		$google_url         = isset( $instance['google_url'] ) ? esc_html( $instance['google_url'] ) : 'https://plus.google.com';
		$instagram_url         = isset( $instance['instagram_url'] ) ? esc_html( $instance['instagram_url'] ) : 'https://instagram.com';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">العنوان</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>" >
        </p>
        <p>
            <label>روابط مواقع التواصل الاجتماعي</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name('facebook_url'); ?>" id="<?php echo $this->get_field_id('facebook_url'); ?>" value="<?php echo $facebook_link; ?>"  placeholder='رابط الفيسبوك'>
         
        </p>
        <p>
              <input type="text" class="widefat" name="<?php echo $this->get_field_name('twitter_url'); ?>" id="<?php echo $this->get_field_id('twitter_url'); ?>" value="<?php echo $twitter_url; ?>"  placeholder='رابط تويتر'> 
        </p>
        <p>
              <input type="text" class="widefat" name="<?php echo $this->get_field_name('pinterest_url'); ?>" id="<?php echo $this->get_field_id('pinterest_url'); ?>" value="<?php echo $pinterest_url; ?>"  placeholder='رابط بنترست'> 
        </p>
        <p>
              <input type="text" class="widefat" name="<?php echo $this->get_field_name('youtube_url'); ?>" id="<?php echo $this->get_field_id('youtube_url'); ?>" value="<?php echo $youtube_url; ?>"  placeholder='رابط اليوتوب'> 
        </p>
        <p>
              <input type="text" class="widefat" name="<?php echo $this->get_field_name('google_url'); ?>" id="<?php echo $this->get_field_id('google_url'); ?>" value="<?php echo $google_url; ?>"  placeholder='رابط جوجل بلس'> 
        </p>     
        <p>
              <input type="text" class="widefat" name="<?php echo $this->get_field_name('instagram_url'); ?>" id="<?php echo $this->get_field_id('instagram_url'); ?>" value="<?php echo $instagram_url; ?>"  placeholder='رابط الأنستغرام'> 
        </p>           
	<?php }

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']  = $new_instance['title'];
		$instance['facebook_url']  = $new_instance['facebook_url'];
		$instance['twitter_url']  = $new_instance['twitter_url'];
		$instance['pinterest_url']  = $new_instance['pinterest_url'];
		$instance['youtube_url']  = $new_instance['youtube_url'];
		$instance['google_url']  = $new_instance['google_url'];
		$instance['instagram_url']  = $new_instance['instagram_url'];
		return $instance;
	}

}


