<?php
/*
*   
*   من أنا
*/
class about_me_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'about_me_widget', // Base ID
			esc_html__( 'صندوق النبذة التعريفية', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'A Foo Widget', 'text_domain' ), ) // Args
		);
	}

	
	public function widget( $args, $instance ) {  ?>
		 <div class="content-block text-center">
                           <?php if(!empty($instance['img_url'])): ?>
                            <span class="avatar_about_me">
                                <img class="text-img" src="<?php echo $instance['img_url'] ?>" alt="img"/>
                                
                            </span>
                            <?php endif; ?>
                            <h2 class="title"><?php echo $instance['title']; ?></h2>
                            <p><?php echo $instance['Description'] ?></p>
                            <center>
                            <div class="text-social clearfix inline">
                               
                            <?php 
                              if(!empty($instance['facebook_url_profile'] ))  {
                                  echo  '<a class="facebook" href="'. $instance['facebook_url_profile']  .'"><i class="fa fa-facebook"></i></a>';
                              }
                              if(!empty($instance['twitter_url_profile'] ))  {
                                  echo  '<a class="twitter" href="'. $instance['twitter_url_profile']  .'"><i class="fa fa-twitter"></i></a>';
                              }
                              if(!empty($instance['pinterest_url_profile'] ))  {
                                  echo  '<a class="pinterest" href="'. $instance['pinterest_url_profile']  .'"><i class="fa fa-pinterest-p"></i></a>';
                              } 
                            if(!empty($instance['youtube_url_profile'] ))  {
                                  echo  '<a class="youtube" href="'. $instance['youtube_url_profile']  .'"><i class="fa fa-youtube-play"></i></a>';
                              }    
                             if(!empty($instance['google_url_profile'] ))  {
                                  echo  '<a class="google" href="'. $instance['google_url_profile']  .'"><i class="fa fa-google"></i></a>';
                              } 
                             if(!empty($instance['instagram_url_profile'] ))  {
                                  echo  '<a class="google" href="'. $instance['instagram_url_profile']  .'"><i class="fa fa-instagram"></i></a>';
                              }                                                 
                            ?>
                            </div>
                            </center>
                        </div>
	<?php }

	
	public function form( $instance ) {
		$img_url  = isset( $instance['img_url'] ) ? esc_html( $instance['img_url'] ) : '';
		$title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
		$Description  = isset( $instance['Description'] ) ? esc_html( $instance['Description'] ) : '';
        
        $Description  = isset( $instance['Description'] ) ? esc_html( $instance['Description'] ) : '';
        $facebook_url_profile  = isset( $instance['facebook_url_profile'] ) ? esc_html( $instance['facebook_url_profile'] ) : '';
        $twitter_url_profile  = isset( $instance['twitter_url_profile'] ) ? esc_html( $instance['twitter_url_profile'] ) : '';
        $pinterest_url_profile  = isset( $instance['pinterest_url_profile'] ) ? esc_html( $instance['pinterest_url_profile'] ) : '';
        $youtube_url_profile  = isset( $instance['youtube_url_profile'] ) ? esc_html( $instance['youtube_url_profile'] ) : '';
        $google_url_profile  = isset( $instance['google_url_profile'] ) ? esc_html( $instance['google_url_profile'] ) : '';
        $instagram_url_profile  = isset( $instance['instagram_url_profile'] ) ? esc_html( $instance['instagram_url_profile'] ) : '';
        
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">العنوان</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value='<?php echo $title; ?>'>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('img_url'); ?>">رابط الصورة</label>
            <input type="text" name="<?php echo $this->get_field_name('img_url'); ?>"  id="<?php echo $this->get_field_id('img_url'); ?>" class="widefat" value='<?php echo $img_url; ?>'>
        </p>
        <p>
		<textarea name="<?php echo $this->get_field_name('Description'); ?>" id="<?php echo $this->get_field_id('Description'); ?>" cols="30" rows="10" class="widefat" ><?php echo $Description; ?></textarea>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook_url_profile'); ?>">رابط الفيسبوك</label>
            <input type="text" name="<?php echo $this->get_field_name('facebook_url_profile'); ?>"  id="<?php echo $this->get_field_id('facebook_url_profile'); ?>" class="widefat" value='<?php echo $facebook_url_profile; ?>'>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_url_profile'); ?>">رابط تويتر</label>
            <input type="text" name="<?php echo $this->get_field_name('twitter_url_profile'); ?>"  id="<?php echo $this->get_field_id('twitter_url_profile'); ?>" class="widefat" value='<?php echo $twitter_url_profile; ?>'>
        </p>	
        <p>
            <label for="<?php echo $this->get_field_id('pinterest_url_profile'); ?>">رابط بنترست</label>
            <input type="text" name="<?php echo $this->get_field_name('pinterest_url_profile'); ?>"  id="<?php echo $this->get_field_id('pinterest_url_profile'); ?>" class="widefat" value='<?php echo $pinterest_url_profile; ?>'>
        </p>			
        <p>
            <label for="<?php echo $this->get_field_id('youtube_url_profile'); ?>">رابط اليوتوب</label>
            <input type="text" name="<?php echo $this->get_field_name('youtube_url_profile'); ?>"  id="<?php echo $this->get_field_id('youtube_url_profile'); ?>" class="widefat" value='<?php echo $youtube_url_profile; ?>'>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('google_url_profile'); ?>">رابط جوجل بلس</label>
            <input type="text" name="<?php echo $this->get_field_name('google_url_profile'); ?>"  id="<?php echo $this->get_field_id('google_url_profile'); ?>" class="widefat" value='<?php echo $google_url_profile; ?>'>
        </p>		
        <p>
            <label for="<?php echo $this->get_field_id('instagram_url_profile'); ?>">رابط الأنستغرام</label>
            <input type="text" name="<?php echo $this->get_field_name('instagram_url_profile'); ?>"  id="<?php echo $this->get_field_id('instagram_url_profile'); ?>" class="widefat" value='<?php echo $instagram_url_profile; ?>'>
        </p>		
		
		<?php 
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']  = $new_instance['title'];
		$instance['img_url']  = $new_instance['img_url'];
		$instance['Description']  = $new_instance['Description'];
        $instance['facebook_url_profile']  = $new_instance['facebook_url_profile'];
		$instance['twitter_url_profile']  = $new_instance['twitter_url_profile'];
		$instance['pinterest_url_profile']  = $new_instance['pinterest_url_profile'];
		$instance['youtube_url_profile']  = $new_instance['youtube_url_profile'];
		$instance['google_url_profile']  = $new_instance['google_url_profile'];
		$instance['instagram_url_profile']  = $new_instance['instagram_url_profile'];
		return $instance;
	}

}


