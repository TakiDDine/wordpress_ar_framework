																									
<?php
			


$fields =  array(
	
'author' =>
'<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label for="one">الإسم</label>
		<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
'" size="30"' . $aria_req . ' />
	</div>
</div>',
	
'email' =>
'<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label for="two">البريد الإلكتروني</label>
		<input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
'" size="30"' . $aria_req . ' />
	</div> 
</div>
'
);
			
			
$args = array(
  'id_form'           => 'commentform',
  'class_form'        => 'contact-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'btn btn-primary pull-right',
  'name_submit'       => 'submit',
  'title_reply'       => __( '' ),
  'title_reply_to'    => __( 'الرد على %s' ),
  'cancel_reply_link' => __( 'الغاء الرد' ),
  'label_submit'      => __( 'اضافة التعليق' ),
  'format'            => 'xhtml',
	
  'comment_field'     =>  
	
'<div class="col-sm-12">
	<div class="form-group">
		<label for="four">نص التعليق</label>
		<textarea id="comment" name="comment" class="form-control" rows="7" aria-required="true">' .'</textarea>
	</div>             
</div>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf( __( '
	<a href="%3$s" title="Log out of this account">تسجيل الخروج</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '',

  'comment_notes_after' => '',
    
  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);
			
?>		
						
</div><!-- /.comment-section -->

<?php if( is_single() ) : ?>

<div class="tr-comment-box">



	<div class="section-title">
		<h1><span>أضف تعليقا</span></h1>
	</div>


<?php  comment_form($args); ?>

</div><!-- /.tr-comment-box -->


<?php endif; ?>
	