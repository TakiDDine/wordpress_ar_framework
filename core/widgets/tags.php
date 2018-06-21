<?php 





/*
*
*   الوسوم
*/
class tags_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'tags_widget', // Base ID
			esc_html__( 'الوسوم', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Widget To display Tags', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		?>
          <div class="content-block tag-block">
                    <h2 class="title">
                        <?php echo $instance['title'] ?>
                    </h2>
                    <div class="tag-box clearfix">
                    <?php
            
            
            
            
            
            $show_me = 6;
            if(!empty($instance['count']) and is_numeric($instance['count'])){
                $show_me = $instance['count'];
            }
            
            
            
            $args = array(
                'number'   => $show_me
            ); 
            
            
                    $tags = get_tags($args);
                    foreach($tags as $tag ){
                        echo '<a class="tag" href="#">'. $tag->name .'</a>';
                        
                    }  ?>
                    </div>
                </div>
    <?php
         }

	public function form( $instance ) {
    
        $title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
        $count  = isset( $instance['count'] ) ? esc_html( $instance['count'] ) : '';
        
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">العنوان</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>" >
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>">عدد الوسوم للعرض</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo $count; ?>" >
        </p>
        
        
        
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']    = $new_instance['title'];
		$instance['count']    = $new_instance['count'];

		return $instance;
	}

}

