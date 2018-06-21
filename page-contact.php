<?php /* Template Name: تواصل معنا */ ?>
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


معلومات التواصل
                  
<h2>العنوان</h2>
<h3><?php echo $theme_setting['adress-contact']; ?></h3>

<h2>رقم الهاتف</h2>
<h3><?php echo $theme_setting['phone-contact']; ?></h3>

<h2>البريد الالكتروني</h2>
<h3><?php echo $theme_setting['email-contact']; ?></h3>
         



<div class="leave-comments-area">
<div id="form-messages">
    <?php if(!empty($_SESSION['flash-conatct'])) : echo $_SESSION['flash-conatct']; unset($_SESSION['flash-conatct']) ; endif; ?>
</div>
<form id="contact-form" method="post" onsubmit='return false;'>
    <fieldset>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" name="contact-full-name" id="contact_full_name" class="form-control"  placeholder="الإسم الكامل*">
                </div>
            </div>                                    
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" name="contact-email" id="contact_email" class="form-control"  placeholder="البريد الاكتروني*">
                </div>
            </div>
        </div> 
        <div class="row">   
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="contact-subject" id="contact_subject" class="form-control"  placeholder="موضوع الرسالة*">
                </div>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-12">
                <div class="form-group">
                    <textarea cols="40" id="contact-message" name="contact_message" rows="10" class="textarea form-control" placeholder="محتوى الرسالة"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button class="btn-send" type="submit"> ارسال الرسالة </button>
                    <input type="hidden" name="submit-contact-Form">
                </div>
            </div>
        </div>    
    </fieldset>
</form>
</div> 


<!-- جلب محتوى الفوتر -->
<?php get_main_footer(); ?>

<!-- جلب الفوتر -->
<?php get_footer(); ?>