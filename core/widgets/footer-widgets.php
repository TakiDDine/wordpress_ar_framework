<?php 











/**
 * Add Footer Widget Left
 */
class LeftWidget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'FooterWidgetLads', // Base ID
			esc_html__( 'الشعار والوصف ومواقع التواصل الإجتماعي', 'Footer-widget-1' ), // Name
			array( 'description' => esc_html__( 'A Foo Widget', 'Footer-widget-1' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
        global $onta_theme;
        
//        $fotter_it = "<h1 class='footer-h1-title'>".$instance['footer-logo']."</h1>";
//        if($instance['footer-logo'] !='') {
//                  $fotter_it = '<h2 class="title"><a href="'. get_home_url() .'"> <img src="'. $instance['footer-logo'].'"></a></h2>';
//                }
//                
        
        
//               echo $fotter_it; 
               echo  "<h3 class='sm-title'> " .$instance['footer-logo'] ."</h3>"; 
                   
                   
                  
            echo '<p>';
            
            echo $instance['Desc_footer'];
            echo '</p>';
            
            
            echo '<h3 class="sm-title stay">'. $instance['social-title'] .'</h3>';
            echo '<div class="social-box social-ftr clearfix" >';
            if(!empty($instance['facebook_url_profile'])){
                echo '<a class="facebook" href="'.$instance["facebook_url_profile"].'"><i class="fa fa-facebook"></i></a>';
            }
            if(!empty($instance['youtube_url_profile'])){
                echo '<a class="youtube" href="'.$instance["youtube_url_profile"].'"><i class="fa fa-youtube-play"></i></a>';
            }                    
            if(!empty($instance['linked_url_profile'])){
             echo '<a class="linkedin" href="'.$instance['linked_url_profile'].'"><i class="fa fa-linkedin"></i></a>';
            }
            if(!empty($instance['pinterest_url_profile'])){
            echo '<a class="pinterest" href="'.$instance['pinterest_url_profile'].'"><i class="fa fa-pinterest-p"></i></a>';
            }
            if(!empty($instance['instagram_url_profile'])){
            echo '<a class="instagram" href="'.$instance['instagram_url_profile'].'"><i class="fa fa-instagram"></i></a>';
            }
            if(!empty($instance['google_url_profile'])){
            echo '<a class="google" href="'.$instance['google_url_profile'].'"><i class="fa fa-google"></i></a>';
            }
            if(!empty($instance['twitter_url_profile'])){
            echo '<a class="twitter" href="'.$instance['twitter_url_profile'].'"><i class="fa fa-twitter"></i></a>';
            }                
            echo '</div>';   
            
 
		
           
        
        }
   
        public function form( $instance ) {
                $footerlogo = ! empty( $instance['footer-logo'] ) ? $instance['footer-logo'] : ''; 
                $desc = ! empty( $instance['Desc_footer'] ) ? $instance['Desc_footer'] : ''; 
                $social_title = ! empty( $instance['social-title'] ) ? $instance['social-title'] : ''; 
                $facebook_url_profile  = isset( $instance['facebook_url_profile'] ) ? esc_html( $instance['facebook_url_profile'] ) : '';
                $twitter_url_profile  = isset( $instance['twitter_url_profile'] ) ? esc_html( $instance['twitter_url_profile'] ) : '';
                $pinterest_url_profile  = isset( $instance['pinterest_url_profile'] ) ? esc_html( $instance['pinterest_url_profile'] ) : '';
                $youtube_url_profile  = isset( $instance['youtube_url_profile'] ) ? esc_html( $instance['youtube_url_profile'] ) : '';
                $google_url_profile  = isset( $instance['google_url_profile'] ) ? esc_html( $instance['google_url_profile'] ) : '';
                $instagram_url_profile  = isset( $instance['instagram_url_profile'] ) ? esc_html( $instance['instagram_url_profile'] ) : '';
                $linked_url_profile  = isset( $instance['linked_url_profile'] ) ? esc_html( $instance['linked_url_profile'] ) : '';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('footer-logo'); ?>">رابط الشعار في الفوتر</label>
            <input type="text" name="<?php echo $this->get_field_name('footer-logo'); ?>"  id="<?php echo $this->get_field_id('footer-logo'); ?>" class="widefat" value='<?php echo $footerlogo; ?>'>
        </p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'Desc_footer' ) ); ?>">
    		<?php esc_attr_e( 'الوصف :', 'Footer-widget-1' ); ?>
		</label> 
		<textarea  class="widefat"  name="<?php echo esc_attr( $this->get_field_name( 'Desc_footer' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'Desc_footer' ) ); ?>" cols="30" rows="10"><?php echo esc_attr( $desc ); ?></textarea>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('social-title'); ?>">عنوان السوشيال ميديا</label>
            <input type="text" name="<?php echo $this->get_field_name('social-title'); ?>"  id="<?php echo $this->get_field_id('social-title'); ?>" class="widefat" value='<?php echo $social_title; ?>'>
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
        <p>
            <label for="<?php echo $this->get_field_id('linked_url_profile'); ?>">رابط لينكد ان</label>
            <input type="text" name="<?php echo $this->get_field_name('linked_url_profile'); ?>"  id="<?php echo $this->get_field_id('instagram_url_profile'); ?>" class="widefat" value='<?php echo $linked_url_profile; ?>'>
        </p>								
																								
		<?php }

        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['footer-logo']  = $new_instance['footer-logo'];
            $instance['Desc_footer']  = $new_instance['Desc_footer'];
            $instance['social-title']  = $new_instance['social-title'];
            $instance['facebook_url_profile']  = $new_instance['facebook_url_profile'];
            $instance['twitter_url_profile']  = $new_instance['twitter_url_profile'];
            $instance['pinterest_url_profile']  = $new_instance['pinterest_url_profile'];
            $instance['youtube_url_profile']  = $new_instance['youtube_url_profile'];
            $instance['google_url_profile']  = $new_instance['google_url_profile'];
            $instance['instagram_url_profile']  = $new_instance['instagram_url_profile'];        
            $instance['linked_url_profile']  = $new_instance['linked_url_profile'];        
            return $instance;
        }

} 
























class CenterWidget extends WP_Widget {
function __construct() {
		parent::__construct(
			'CenterWidget', // Base ID
			esc_html__( 'المواضيع الشائعة', 'Footer-widget-2' ) // Name
		);
}
public function widget( $args, $instance ) {
        
        
 
$args = array(
	'posts_per_page'   => 15,
	'category_name'    => '',
    'meta_key' => 'wpb_post_views_count', 
    'orderby' => 'meta_value_num', 
    'order' => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
 $popular_posts = get_posts($args);

echo '<h3 class="sm-title">'.$instance['title'].'</h3>
                             <div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                                 <div class="swiper-wrapper ">';

    foreach (array_chunk($popular_posts, 2, true) as $array) {
    echo '<div class="swiper-slide">';
    foreach($array as $post) { ?>
           <div class="item-popular-post clearfix">
             <a class="images-link" href="<?php the_permalink($post->ID) ?>">
                 <img src="<?php echo get_the_post_thumbnail_url( $post->ID);?>" alt="img">
             </a>
             <h5 class="news-link"><a href="<?php the_permalink($post->ID) ?>"> <?php echo $post->post_title; ?> </a></h5>
             <div class="author">
                 <span>
                     
                     <?php $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo esc_html( $categories[0]->name );   
                    } ?>
                     
                 </span>   <?php echo get_the_author_meta('display_name', $post->post_author); ?> بواسطة
             </div>
         </div>
        
<?php }  echo '</div>'; }
        
        echo '  </div>
         <div class="pagination pagination-hide"></div>
     </div>
    <div class="arrow-left"><i class="fa fa-chevron-left"></i></div>
    <div class="arrow-right"><i class="fa fa-chevron-right"></i></div>';
	}
public function form( $instance ) { 
		$title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
?>
       <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value='<?php echo $title; ?>'>
        </p>
	<?php }
public function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['title']  = $new_instance['title'];
        return $instance;
	}
} 

class RightWidget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'RightWidget', // Base ID
			esc_html__( 'آخر المواضيع للفوتر', 'Footer-widget-3' ) // Name
		);
	}
	public function widget( $args, $instance ) {
         $args = array(
            'posts_per_page'   => 15,
            'order' => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => true 
        );

        $posts = get_posts($args);
        echo '<h3 class="sm-title">'. $instance['title'] .'</h3>
         <div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1"><div class="swiper-wrapper">';
        foreach (array_chunk($posts, 1, true) as $array) {
    echo ' <div class="swiper-slide">';
    foreach($array as $post) { ?>
        
        
        <a class="img-link latest-link" href="<?php the_permalink($post->ID) ?>">
        <img src="<?php echo get_the_post_thumbnail_url( $post->ID);?>" alt="img">
    </a>
    <h5 class="news-link"><a href="<?php the_permalink($post->ID) ?>"><?php echo $post->post_title; ?></a></h5>

        
   <?php  }
        echo '</div>';
    }
        echo '</div><div class="pagination pagination-hide"></div></div>
              <div class="arrow-left"><i class="fa fa-chevron-left"></i></div>
               <div class="arrow-right"><i class="fa fa-chevron-right"></i></div>

               
               
               ';
	}

	public function form( $instance ) { 
            $title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value='<?php echo $title; ?>'>
        </p>
				
		
	<?php }
            public function update( $new_instance, $old_instance ) {
                $instance = array();
                $instance['title']  = $new_instance['title'];
                return $instance;
            }

} 










