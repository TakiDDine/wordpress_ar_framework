<?php









class video_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'video_widget', // Base ID
			esc_html__( 'معرض الفيديوات', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'اظهار الفيديوات على شكل معرض', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {  
 $args = array(
     
      'meta_query' => array(
       array(
           'key' => 'downloads',
       )
   ),
     
            'posts_per_page'   => 5,
            'order' => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => true 
        );
$videos_slider = get_posts($args);

global $wpdb;
global $onta_theme;
$t_name = $wpdb->prefix.'video_gallery';
$videos = $wpdb->get_results("SELECT * FROM $t_name");

        

?>
        
       
                        <?php if(!empty($videos)): ?>
                        
                      <div class="content-block">
                            <h2 class="title">
                                <?php echo $instance['title']; ?>
                            </h2>
                    
                            <?php if(!empty($instance['countVideos'])): ?>
                             <div class="swiper-container" data-slides-per-view="1" data-loop="1">
                                 <div class="swiper-wrapper ">
                                     <?php  
        
        
        
        for($x=0;$x<=$instance['countVideos'];$x++):  $video = unserialize($videos[$x]->video); 
                                     
                                     
                                     
                                     
                                     ?>
                                     <div class="swiper-slide">
                                        <?php echo iframeVideo($video['link']) ; ?>
                                     </div>
                                     <?php endfor; ?>
                                 </div>
                                 <div class="pagination"></div>
                             </div>
                            <?php else: ?>
                            <div class="swiper-container" data-slides-per-view="1" data-loop="1">
                                 <div class="swiper-wrapper ">
               
                                     <?php  
        echo '<pre>';
        $show_me = 5;
        if(count($videos)<5){
           $show_me = count($videos)-1;
        }
        
        echo '</pre>';
        
        for($x=0;$x<=$show_me;$x++):  $video = unserialize($videos[$x]->video); ?>
                                     <div class="swiper-slide">
                                        <?php echo iframeVideo($video['link']) ; ?>
                                     </div>
                                     <?php endfor; ?>
                                 </div>
                                 <div class="pagination"></div>
                             </div>
                            <?php endif; ?>
                   
                            <div class="arrow-left"><i class="fa fa-chevron-left"></i></div>
                            <div class="arrow-right"><i class="fa fa-chevron-right"></i></div>
                        </div>
                        <?php endif; ?>
        
        
        
        
    <?php  }

	public function form( $instance ) {
    $title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : ''; 
    $countVideos  = isset( $instance['countVideos'] ) ? esc_html( $instance['countVideos'] ) : ''; ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">العنوان</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>" >
        </p>
          
        <p>
            <label for="<?php echo $this->get_field_id('countVideos'); ?>">عدد الفيديوهات</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name('countVideos'); ?>" id="<?php echo $this->get_field_id('countVideos'); ?>" value="<?php echo $countVideos; ?>" >
        </p>
          
          
          
          
	<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']    = $new_instance['title'];
		$instance['countVideos']    = $new_instance['countVideos'];
		

		return $instance;
	}

}

