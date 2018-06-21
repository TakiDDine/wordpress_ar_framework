<!-- جلب الهيدر -->
<?php  get_header();  ?>

<!-- جلب اعدادات القالب من ريداكس فريمورك -->
<?php global $theme_setting;  ?>

<!-- جلب محتوى الهيدر -->
<?php get_main_header(); ?>  

<!-- جلب معلومات البحث -->
<?php global $wp_query; $curtag = $wp_query->get_queried_object();  ?>

<!-- مسار الصفحة -->
<?php the_breadcrumb(); ?>

<!-- كلمة البحث -->
<?php echo get_search_query() ?>

<!-- المقالة -->
<?php if ( have_posts() ) { while ( have_posts() ) { the_post();  ?>

<!-- صورة الموضوع -->
<?php the_post_thumbnail(get_the_ID(),'large'); ?> 

<!-- العنوان -->
<?php the_title(); ?>

<!-- رابط الموضوع -->
<?php  the_permalink();  ?>

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

<!-- نبذة صغيرة من المقالة -->
<?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>

<!-- عدد التعليقات -->
<?php comments_number(); ?>

<?php  }   } ?>

<!-- لا توجد نتائج لكلمة البحث -->
<?php if (!have_posts()): ?>
لا توجد نتائج لكلمة البحث : <?php echo get_search_query() ?>
<?php endif; ?>
<!--// لا توجد نتائج لكلمة البحث -->

<!-- ترقيم الصفحات -->
<?php theme_pagination($wp_query->max_num_pages); ?>
<!--// ترقيم الصفحات -->

<?php wp_reset_postdata(); ?>

<!-- جلب محتوى الفوتر -->
<?php get_main_footer(); ?>

<!-- جلب الفوتر -->
<?php get_footer(); ?>