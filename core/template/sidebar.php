<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar-home">
<div class="sidebar-area home-sidebar">
                   
                   
                   
<!-- social media -->
<div class="like-box-area">
   <h3 class="title-bg">تابعنا على مواقع التواصل</h3>
    <ul>
        <li>
           <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> 
            <span class="like-page">تابعنا على الفيسبوك <br/>210,956 معجبين</span> 
            <span class="like"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-twitter" aria-hidden="true"></i> 
                <span class="like-page">تابعنا على تويتر<br/>2109 متابعين</span> 
                <span class="like"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </a>
        </li>
           
        <li>
            <a href="#">
            <i class="fa fa-rss" aria-hidden="true"></i> <span class="like-page">اشترك في اليوتيوب <br/>210,956 مشتركين</span> 
            <span class="like"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </a>
        </li>
    </ul>
</div>
<!-- social media -->



<br><br>
<!-- جدول المباريات -->

<?php if ( is_active_sidebar( 'widgets-of-sidebar' ) ) : ?>
                        <?php dynamic_sidebar( 'widgets-of-sidebar' ); ?>
                        <?php endif; ?>


<h3 class="title-bg">اعلان</h3>

<div class="cantDetectAD">
<?php if($onta_theme['myads-2'] == 'ads-image') : ?>
<?php if(!empty($onta_theme['link-image-ads-2'])): ?> <a href="<?php echo $onta_theme['link-image-ads-2']; ?>"> <?php endif; ?>
<img src="<?php echo $onta_theme['image-ads-2']['url']; ?>" alt="">
<?php if(!empty($onta_theme['link-image-ads-2'])): ?>  </a> <?php endif; ?>
<?php else: ?>
<?php echo $onta_theme['code-ads-2']; ?>
<?php endif; ?> 
</div>



</div>
</div>