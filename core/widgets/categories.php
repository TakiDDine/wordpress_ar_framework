<?php
/*
*
*   التصنيفات
*/
class categories_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'Categories_widget', // Base ID
			esc_html__( 'التصنيفات', 'cat_widget_domain' ), // Name
			array( 'description' => esc_html__( 'Widget To Display categories', 'cat_widget_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
        
                echo ' <div class="content-block">
                            <h2 class="title">
                               '. $instance['title'] .'
                            </h2>
                            <ul class="category-list clearfix">
                               ';
        
                                if(!empty($instance['count']) and is_numeric($instance['count'])){
                                     $categories = get_categories(array(
                                    'orderby' => 'name',
                                    'order'   => 'ASC',
                                    'number' => $instance['count']
                                    ));
                                }else {
                                     $categories = get_categories(array(
                                    'orderby' => 'name',
                                    'order'   => 'ASC',
                                    'number' => 5
                                    ));
                                }
        
                               
                                foreach($categories as $category):
                                $category_link = get_category_link( get_cat_ID( $category->name ) );
                               ?>
                               <li><a href="<?php echo $category_link; ?>"><?php echo $category->name ?> 
                               
                               <?php if($instance['display_count'] == 1 ): ?>
                               <span>(<?php echo $category->count ?>)</span>
                               <?php endif; ?>
                               
                                
          
                               
                               
                               </a></li>
                               <?php endforeach; ?>
                      <?php     echo '</ul></div>';      ?>
                                
                  <?php

		echo $args['after_widget'];
	}
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'التصنيفات', 'cat_widget_domain' );
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( '5', 'cat_widget_domain' );
		$display_count = ! empty( $instance['display_count'] ) ? $instance['display_count'] : esc_html__( '1', 'catget_domain' );
        
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'العنوان:', 'cat_widget_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_attr_e( 'عدد التصنيفات للعرض:', 'cat_widget_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>">
		</p>
		
		
		
		
		<p>
        <label ><?php esc_attr_e( 'اظهار عدد التصنيفات ؟', 'text_domain' ); ?></label> 
		    <select name="<?php echo esc_attr( $this->get_field_name( 'display_count' ) ); ?>" id="<?php echo $this->get_field_id( 'display_count'  ); ?>" class="widefat">
           
           
           <?php if($instance['display_count'] == 0 ): ?>
           <option  value="1" >اظهار</option>
		   <option  value="0" selected >اخفاء</option>
           <?php else: ?>
           <option  value="1" selected>اظهار</option>
		   <option  value="0"  >اخفاء</option>
           <?php endif; ?>
           
		        
		      
		    </select>
		  </p>
		
		
		
		
		
		
		
		
		
		
		
		
		<?php 
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']          = $new_instance['title'];
		$instance['count']          = $new_instance['count'];
		$instance['display_count']          = $new_instance['display_count'];

		return $instance;
	}

} 

