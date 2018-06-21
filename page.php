<!-- جلب الهيدر -->
<?php  get_header();  ?>

<!-- جلب اعدادات القالب من ريداكس فريمورك -->
<?php global $theme_setting;  ?>

<!-- جلب محتوى الهيدر -->
<?php get_main_header(); ?>  

<!-- مسار الصفحة -->
<?php the_breadcrumb(); ?>

<!-- وصف الصفحة -->
<?php echo get_post_meta( get_the_ID(), 'description', true ); ?>

<!-- صورة الهيدر -->
<?php echo get_post_meta( get_the_ID(), 'header_bg', true ); ?>

<!-- عرض الهيدر واخفائه -->
<?php echo get_post_meta( get_the_ID(), 'show_header', true ); ?>

<!-- عدم السماح بالتعليقات -->
<?php echo get_post_meta( get_the_ID(), 'allow_comments', true ); ?>

<!-- عدم عرض التعليقات -->
<?php echo get_post_meta( get_the_ID(), 'show_comments', true ); ?>

<!-- اظهار السايدبار -->
<?php echo get_post_meta( get_the_ID(), 'show_sidebar', true ); ?>

<!-- عدم اظهار صندوق الكاتب -->
<?php echo get_post_meta( get_the_ID(), 'show_author_box', true ); ?>

<!-- المقالة -->
<?php if ( have_posts() ) { while ( have_posts() ) { the_post();  ?>

<!-- صورة الموضوع -->
<?php the_post_thumbnail(get_the_ID(),'large'); ?> 

<!-- العنوان -->
<?php the_title(); ?>

<!-- رابط الموضوع -->
<?php the_permalink();  ?>

<!-- المحتوى -->
<?php the_content(); ?>

<!-- التاريخ -->
<?php the_time('F j, Y'); ?>

<!-- الكاتب-->
<?php the_author(); ?>

<!-- الرابط للكاتب -->
<?php the_author_posts_link(); ?>

<!-- صورة الكاتب -->
<?php echo get_avatar(get_the_author_email(), 60, "","avatar",array("class"=>"img-responsive img-circle"));?>

<!-- روابط المشاركة -->
<a class="twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_permalink(); ?>"><i class="fa fa-twitter"></i></a>
<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fa fa-facebook"></i></a>
<a class="linkedin" href="http://linkedin.com/share?url=<?php echo get_permalink(); ?>"><i class="fa fa-linkedin"></i></a>
<a class="whatsapp"  data-href='<?php echo get_permalink(); ?>' data-text='<?php the_title(); ?>' href='whatsapp://send'><i class="fa fa-whatsapp"></i></a>
<a class="googleplus" href="http://plus.google.com/share?url=<?php echo get_permalink(); ?>"><i class="fa fa-google-plus"></i></a>

<!-- المقالة السابقة -->
<?php  $prev_post = get_previous_post(); if (!empty( $prev_post )): ?>
<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>
<?php endif; ?>

<!-- المقالة التالية -->                   
<?php $next_post = get_next_post(); if (!empty( $next_post )): ?>
<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>
<?php endif; ?>

<!--  تصنيف المقالة -->
<?php $post_categories = get_the_category(); if($post_categories) : ?>
<?php foreach($post_categories as $category ): ?>
<?php $catlink =  get_home_url().'/category/'.$category->slug; ?>
<a href="<?php echo $catlink ?>"> <?php echo $category->name; ?> </a>
<?php endforeach; endif; ?>

<!-- وسوم المقالة -->
<?php $post_tags = get_the_tags(); if($post_tags): ?>
<?php foreach($post_tags as $tag ): ?>
<?php $taglink =  get_home_url().'/tag/'.$tag->slug; ?>
<a href="<?php echo $taglink ?>"> <?php echo $tag->name; ?> </a>
<?php endforeach; endif; ?>


<!-- مواضيع ذات صلة  -->
<?php $related = st_get_related_posts($post->ID,6);?>
<?php if( $related->have_posts() ) { while( $related->have_posts() ) { $related->the_post(); ?>
<?php if( has_post_thumbnail() ) {  echo '<a title="'. get_the_title() .'" href="'. get_permalink() .'"><img src="'. get_the_post_thumbnail_url() .'" alt="'. get_the_title() .'"></a>'; } ?>

<!-- نبذة عن المقالة -->
<?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
<?php }  wp_reset_postdata(); } ?>
<!--// مواضيع ذات صلة -->


<!-- عرض التعليقات -->
<?php $comments = get_comments(array( 'post_id' => get_the_ID(),'number' => '4' )); ?>

<!-- عدد التعليقات -->
<?php echo count($comments); ?>

<?php foreach($comments as $comment ): ?>

<!-- صورة كاتب التعليق -->
<?php echo get_avatar( $comment->comment_author_email, 32 );?>

<!-- تاريخ التعليق -->
<?php echo get_comment_date( 'd M Y', $comment->comment_ID ); ?>

<!-- محتوى التعليق -->
<?php echo $comment->comment_content; ?>

<?php endforeach; ?>
<!--// عرض التعليقات -->


<!-- اضافة تعليقات -->
<?php comments_template(); ?>


<?php  } wp_reset_postdata();  }   ?>
<!--// المقالة -->


<!-- جلب محتوى الفوتر -->
<?php get_main_footer(); ?>

<!-- جلب الفوتر -->
<?php get_footer(); ?>