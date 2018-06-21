<?php

add_action( 'admin_menu', 'st_page_metabox_init' );
function st_page_metabox_init() {
    add_meta_box( 'page_metabox', 'اعدادات الصفحة', 'page_metabox', 'page', 'normal', 'high');
}
function page_metabox( $post, $callback_args ) {
    ?>
    <input type="hidden" name="page_metabox_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>">
    <table class="form-table page-metabox">
          <style>
	.page-metabox tr {
    border-bottom: 1px solid #23282d14;
}

.page-metabox tr:last-child {
    border: none;
}		  
	
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}	  
		</style>
          
           <tr>
                <td width="20%">
                   <label for="">وصف الصفحة</label>
                </td>
                <td>
                    <textarea placeholder="وصف الصفحة" style="width: 100%" name="description" id="description" rows="5"><?php echo get_post_meta($post->ID,'description',true) ?></textarea>
                </td>
            </tr>
           <tr>
                <td>
                   <label for="">صورة الهيدر</label>
                </td>
                <td>
					<div class="smartcat-uploader">
						<a href="#" class="smartcat-upload" style='color: rgb(255, 255, 255);background: rgb(59, 175, 218);font-size: 16px;padding: 14px 19px;border-radius: 3px;text-decoration: none; display: inline-block;' >صورة الهيدر</a>
						<input type="hidden" value="<?php echo get_post_meta($post->ID,'header_bg',true) ?>" id="header_bg" name="header_bg" />
					</div>
<!--
           	<div class="img-box-preview">
						<img src="http://caynoon.website/sport_theme/wp-content/themes/Sport-Mzakieg-3/core/assets/images/banner/banner.jpg" alt="">
					</div>
            	</td>
-->
<!--
            	<td colspan="2">
            		<style>
					.img-box-preview {
    border: 4px solid white;
    -webkit-box-shadow: -1px 0px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 0px 5px 0px rgba(0,0,0,0.75);
    box-shadow: -1px 0px 5px 0px rgba(0,0,0,0.75);
}
						.img-box-preview img {
    width: 100%;
}

.smartcat-uploader {
    display: inline-block;
}

					</style>
-->
            	
					
            	</td>
           </tr>
           <tr>
                <td >
                   <label for="">اظهار الهيدر</label>
                </td>
                <td>

					<label class="switch">
					  <input  name="show_header" type="checkbox" <?php if( get_post_meta($post->ID,'show_header',true) == 'on' ) echo 'checked'; ?>>
					  <span class="slider round"></span>
					</label>
            </tr>            
           <tr>
                <td>
                   <label for="">عدم السماح بالتعليقات</label>
                </td>
                <td>
                	<label class="switch">
					  <input name="allow_comments" type="checkbox" <?php if( get_post_meta($post->ID,'allow_comments',true) == 'on' ) echo 'checked'; ?>>
					  <span class="slider round"></span>
					</label>
            </tr> 
           <tr>
                <td>
                   <label for="">عدم اظهار التعليقات</label>
                </td>
                <td>
                     <label class="switch">
					  <input name="show_comments" type="checkbox" <?php if( get_post_meta($post->ID,'show_comments',true) == 'on' ) echo 'checked'; ?>>
					  <span class="slider round"></span>
					</label>
            </tr>                          
           <tr>
                <td>
                   <label for="">عدم اظهار السايدبار</label>
                </td>
                <td>
                    <label class="switch">
					  <input name="show_sidebar"  type="checkbox" <?php if( get_post_meta($post->ID,'show_sidebar',true) == 'on' ) echo 'checked'; ?>>
					  <span class="slider round"></span>
					</label>
            </tr> 
           <tr>
                <td>
                   <label for="">عدم اظهار وصف الكاتب</label>
                </td>
                <td>
                    <label class="switch">
					  <input name="show_author_box" name="show_header" type="checkbox" <?php if( get_post_meta($post->ID,'show_author_box',true) == 'on' ) echo 'checked'; ?>>
					  <span class="slider round"></span>
					</label>
            </tr>                    
    </table>
<?php
}

add_action( 'save_post', 'st_save_page_metabox' );
function st_save_page_metabox( $post ) {
    if (!wp_verify_nonce($_POST['page_metabox_nonce'], basename(__FILE__))) {
        return $post;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post;
    }
    if ( !current_user_can('edit_post', $post) ) {
        return $post;
    }
	
	$fields = array('description','header_bg','show_header','allow_comments','show_comments','show_sidebar','show_author_box');
	foreach($fields as $field) {
		$data = $_POST[$field];
		if( $data != '' ) {
			update_post_meta($post,$field,$data);
		} else {
			delete_post_meta($post,$field);
		}
	}

}
