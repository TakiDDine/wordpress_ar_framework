<?php



/*
*   
*   المواضيع الشائعة
*/
class popular_posts_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'popular_posts_widget', // Base ID
			esc_html__( 'المواضيع الشائعة', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'popular posts widget', 'text_domain' ), ) // Args
		);
	}

	
	public function widget( $args, $instance ) {
		

        
     if(!empty($instance['count']) and is_numeric($instance['count'])){
            $args = array(
                'posts_per_page'   => $instance['count'],
                'category_name'    => '',
                'meta_key' => 'wpb_post_views_count', 
                'orderby' => 'meta_value_num', 
                'order' => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'suppress_filters' => true 
            );
     }else{
       $args = array(
                'posts_per_page'   => 4,
                'category_name'    => '',
                'meta_key' => 'wpb_post_views_count', 
                'orderby' => 'meta_value_num', 
                'order' => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'suppress_filters' => true 
            ); 
     }

        
 $popular_posts = get_posts($args);
        
        
     
        ?>
        
 <div class="content-block">
                            <h2 class="title"><?php echo $instance['title']; ?></h2>
                            <?php foreach($popular_posts as $post): ?>
                            <div class="item-popular-post clearfix">
                                <a class="images-link" href="<?php the_permalink($post->ID) ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url( $post->ID);?>" alt="img"/>
                                </a>
                                <h5 class="news-link"><a  href="<?php the_permalink($post->ID) ?>"> <?php echo $post->post_title; ?></a></h5>
                                <div class="author">
                                    <span> <?php $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo esc_html( $categories[0]->name );   
                     } ?></span> بواسطة <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
<?php	}

	
	public function form( $instance ) {
		
        $title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
                $count = ! empty( $instance['count'] ) ? $instance['count'] : '';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">االعنوان</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>" >
        </p>
         <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_attr_e( 'عدد المواضيع :', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>">
		</p>
        
        
        
        
		
	<?php }

	public function update( $new_instance, $old_instance ) {
		$instance = array();
				$instance['title']    = $new_instance['title'];
				$instance['count']    = $new_instance['count'];


		return $instance;
	}

}
