<?php



class search_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'search_Widget', // Base ID
			esc_html__( 'محرك البحث', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'a widget for search! ', 'text_domain' ), ) // Args
		);
	}
    
	public function widget( $args, $instance ) { global $onta_theme; ?>
		
       <div class="content-block">
            <h2 class="title">
                <?php echo $instance['title'] ?>
            </h2>
            <div class="search-block">
               <form action="" method="get" class="search-form clearfix" >
                    <input type="text"  class="search-input" placeholder="<?php echo $onta_theme['search-placeholder']; ?>" name="s" id="search-sidvar" value="<?php the_search_query(); ?>" />
                    <input class="go" type="submit" value=" ">
                </form>
            </div>
        </div>

    <?php }

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'محرك البحث', 'text_domain' ); ?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'العنوان:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']    = $new_instance['title'];
		return $instance;
	}

}

