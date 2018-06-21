<!-- جلب الهيدر -->
<?php  get_header();  ?>

<!-- جلب اعدادات القالب من ريداكس فريمورك -->
<?php global $theme_setting;  ?>

<!-- جلب محتوى الهيدر -->
<?php get_main_header(); ?>  

<!-- مسار الصفحة -->
<?php the_breadcrumb(); ?>


<?php  

global $wp_query;   

/*
*   جلب معلومات التصنيف
*/
$curcat = $wp_query->get_queried_object(); 

?>


<!-- مسار الصفحة -->
<?php the_breadcrumb(); ?>

<!-- اسم التصنيف -->
<?php echo $curcat->name; ?>

<!-- وصف التصنيف -->
<?php if( $curcat->category_description != '' ): ?>
<?php echo $curtag->description ?>
<?php endif; ?>

<!-- رابط التصنيف -->
<?php echo get_category_link($curtag->term_id) ?>

<!-- جلب المقالات ذات التصنيف -->
<?php if ( have_posts() ) { while ( have_posts() ) { the_post();  ?>

<!-- صورة الموضوع -->
<?php the_post_thumbnail(get_the_ID(),'large'); ?> 

<!-- العنوان -->
<?php the_title(); ?>

<!-- التاريخ -->
<?php the_time('F j, Y'); ?>

<!-- الكاتب-->
<?php the_author(); ?>

<!-- الرابط للكاتب -->
<?php the_author_posts_link(); ?>

<!-- صورة الكاتب -->
<?php echo get_avatar(get_the_author_email(), 60, "","avatar",array("class"=>"img-responsive img-circle"));?>

<!-- نبذة صغيرة من المقالة -->
<?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>

<!-- عدد التعليقات -->
<?php comments_number(); ?>

<?php  } wp_reset_postdata();  }   ?>
<!--// المقالة -->


<!-- ترقيم الصفحات -->
<?php theme_pagination($wp_query->max_num_pages); ?>
<!--// ترقيم الصفحات -->


<!-- جلب محتوى الفوتر -->
<?php get_main_footer(); ?>

<!-- جلب الفوتر -->
<?php get_footer(); ?>