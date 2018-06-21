<?php





function image_shortcode_plugin_function( $atts ) {
global $wpdb;
    $t_name = $wpdb->prefix.'images_gallery';
$images = $wpdb->get_results("SELECT * FROM $t_name");
ob_start();
?> 
     
     <style>
.content-block.image-block img {
    width: 100%;
}

.content-block.image-block {
    padding: 7px;
}

.content-block.image-block .title {
    margin-top:  14px;
    margin-bottom: 10px;
    font-size: 20px;
}
         
.img-block {
    background-color: #ddd;
    height: 207px;
    background-repeat: no-repeat;
    background-size: cover;
}     
         
</style>

	 <?php foreach($images as $image): $image = unserialize($image->image);   ?>
	  <div class="col-sm-4">
                <div class="content-block image-block">
                
                 <a class="example-image-link" href="<?php echo $image['logo'] ?>" 
                  data-lightbox="example-set" 
                  data-title="">
                  
                  
                  

               
                <div class="img-block" style="background-image: url(<?php echo $image['logo'] ?>)">
                    
                </div>
                </a>
                
                
<!--               <img src="" alt="">-->
              <h2 class="title"><?php echo $image['title'] ?></h2>
              <p><?php echo $image['description'] ?></p>
          </div>
</div>
	<?php endforeach; ?>  
	
<?php
return ob_get_clean(); }
add_shortcode( 'images_gallery', 'image_shortcode_plugin_function' );