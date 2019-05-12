<?php global $onta_theme; ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js" lang="zxx" > <!--<![endif]-->
<head>
 
    <!--=== META TAGS ===-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true); 
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
    <meta name="author" content="Name">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     
    <!--=== LINK TAGS ===-->
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 
    <!-- Browser Color Styling -->
    <meta name="theme-color" content="#6dc77a"/>
    <meta name="msapplication-navbutton-color" content="#6dc77a"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#6dc77a" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo $onta_theme['favicon-settings']['url']; ?>" />

  
    <!--=== TITLE ===-->  
    <title><?php if (is_home()) { echo bloginfo('name');
    } elseif (is_404()) {
    echo '404 الصفحة غير موجودة';
    } elseif (is_category()) {
    echo 'تصنيف:'; wp_title('');
    } elseif (is_search()) {
    echo 'نتائج البحث';
    } elseif ( is_day() || is_month() || is_year() ) {
    echo 'الارشيف:'; wp_title('');
    } else {
    echo wp_title('');
    }
    ?></title>
 
    <!-- For Google -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <meta name="author" content="" />
    <meta name="copyright" content="" />
    <meta name="application-name" content="" />

    <!-- For Facebook -->
    <meta property="og:title" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="" />

    <!-- For Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >
