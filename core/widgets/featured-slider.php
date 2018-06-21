<?php

/*
*
*   السلايدر المحترف
*/
class Featured_Slider extends WP_Widget {

	function __construct() {
		parent::__construct(
			'Featured_Slider_sidebar', // Base ID
			esc_html__( 'سلايدر المواضيع', 'Featured_Slider_text_domain' ), // Name
			array( 'description' => esc_html__( 'Widget To Display Posts In Slider', 'Featured_Slider_text_domain' ), ) // Args
		);
	}


	public function widget( $args, $instance ) {

    
if(!empty($instance['title'])) {
    
    $args = array(
	'posts_per_page'   => $instance['count'],
	'category_name'    => $instance['category'],
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true );
      
    $feautred_slider = get_posts( $args );
}

else {
    $feautred_slider = get_posts();
}




?>
        

 
  <div class="content-block">
                            <h2 class="title">
                                <?php echo $instance['title']; ?>
                            </h2>
                             <div class="swiper-container"  data-slides-per-view="1" data-loop="1">
                                 <div class="swiper-wrapper">
                          
                                    <?php foreach($feautred_slider as $post) : setup_postdata($post); ?>
                                     
                                     
                                     
                                     
                                      <div class="swiper-slide">
                                       
                                       <div class="post-slider-widget" >
                                        <a class="img-link" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID);?>');">
                         
                         <span class="span-date"> 
                                     <?php $day = get_the_date( 'j' ); echo $day; ?><sup></sup>
                                     <span><?php $day = get_the_date( 'F' ); echo $day; ?></span> 
                                            </span>
                         
                         
                         
                     </a>
                                         <h5 class="news-link"><a href="<?php the_permalink($post->ID) ?>"><?php echo $post->post_title ?></a></h5>
                     <p><?php echo theme_get_content($post->post_content,300); ?></p>
                                    
                                    </div>
                                    
                                     </div>
                                    <?php endforeach; wp_reset_postdata(); ?>
                                     
                                 </div>
                                 <div class="pagination "></div>
                             </div>
                            <div class="arrow-left"><i class="fa fa-chevron-left"></i></div>
                            <div class="arrow-right"><i class="fa fa-chevron-right"></i></div>
                        </div>      
        
        
        
	<?php }


	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$category = ! empty( $instance['category'] ) ? $instance['category'] : '';
        $count = ! empty( $instance['count'] ) ? $instance['count'] : '';

		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'العنوان:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_attr_e( 'التصنيف:', 'text_domain' ); ?></label> 
		    <select name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" class="widefat">
           
            <?php   $cats = get_categories( array( 'orderby' => 'ID' ) ); ?>     
            <?php  foreach($cats as $cat): ?>
              <?php if($cat->name == $category ) { ?>
		        <option  value="<?php echo $cat->name ?>" selected><?php echo $cat->name ?></option>
		        <?php } else { ?>
		        <option  value="<?php echo $cat->name ?>" ><?php echo $cat->name ?></option>
              <?php } ?>
		        
		        <?php endforeach; ?>
		    </select>
		  </p>
		  
		  <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_attr_e( 'عدد المواضيع :', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>">
		</p>
		  
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']   = $new_instance['title'];
		$instance['category']   = $new_instance['category'];
        $instance['count']   = $new_instance['count'];
		return $instance;
	}

}
