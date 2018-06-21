<!-- جلب الهيدر -->
<?php  get_header();  ?>

<!-- جلب اعدادات القالب من ريداكس فريمورك -->
<?php global $theme_setting;  ?>

<!-- جلب محتوى الهيدر -->
<?php get_main_header(); ?>  

<!-- مسار الصفحة -->
<?php the_breadcrumb(); ?>

<?php echo get_home_url();  ?>

    <form class="mt-30" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
        <input type="text" name="s" placeholder="Search">
        <button type="type"><i class="fas fa-search"></i></a></button>
    </form>









<!-- جلب محتوى الفوتر -->
<?php get_main_footer(); ?>

<!-- جلب الفوتر -->
<?php get_footer(); ?>