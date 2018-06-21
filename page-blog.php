<?php /* Template Name: المدونة */ ?>
<?php get_header();  global $onta_theme; ?>
<?php  require_once 'core/template/main-header.php' ?>  
<?php  require_once 'core/getter.php' ?>  


<?php if($onta_theme['show-hide-header-blog-page'] == 1 ): ?>
<div class="inner-page-header" style='background-image:url(<?php echo $onta_theme['blog-page-header-bg']['url']; ?>);'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-page-title">
                        <h1><?php echo get_the_title() ?></h1>
                    </div>
                    <div class="header-page-subtitle">
                        <p>
                           <?php echo $onta_theme['matches-page-blog']; ?> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endif; ?>



<!-- محتوى الموقع  -->
<div class="all-news-area blog-wrapper">
<div class="container">
 <div class="row">
   
    <!-- المواضيع -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tab-home">
    <?php foreach($blogPosts as $post): setup_postdata($post); ?>
    <div class="col-md-4">
            <div class="news-box">
              <a href="<?php the_permalink(); ?>">
               <div class="image-box" style="background-image:url('<?php echo get_the_post_thumbnail_url() ;?>');"> </div>
               </a>
                <div class="dsc">
                    <ul>
                        <li><a href="<?php the_title(); ?>"></a></li>
                    </ul>
                    <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"> </i><?php the_time('F j, Y'); ?></span>
                    <h4><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h4>
                    <p><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>.</p>
                    <ul class="author-all hidden">
                        <li><a href="author-single.html">James Bond</a></li>
                        <li>
                            <a href="#" class="eye"><i class="fa fa-eye" aria-hidden="true"></i><?php echo wpb_get_post_views(get_the_ID()); ?></a>
                            <a href="#" class="heart"><i class="fa fa-heart-o" aria-hidden="true"></i>850</a>
                            <a href="#" class="comment"><i class="fa fa-comment-o" aria-hidden="true"></i>350</a>
                        </li>
                    </ul>
                </div>
            </div>
    
        </div>
    <?php endforeach; ?> 
    </div>
    <!-- انتهاء المواضيع -->

</div>
</div>
</div>
<!--// محتوى المدونة  -->




<?php  require_once 'core/template/main-footer.php' ?>  
<?php get_footer(); ?>