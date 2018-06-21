<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_setting";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'اعدادات الموقع', 'redux-framework-demo' ),
        'page_title'           => __( 'Sample Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );



    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for

     */

    // -> START Basic Fields
$cats = get_categories( array( 'orderby' => 'ID', 'hide_empty'=>0 ) );
$hadik = [];
foreach($cats as $cat){
    $hadik[$cat->cat_ID] = $cat->name;
}

$arfonts = [];
foreach($fonts as $font){
    $arfonts[$font['name']] = $font['name'];
}




Redux::setSection( $opt_name, array(
        'title'      => __( 'الإعدادات العامة', 'redux-framework-demo' ),
        'id'         => 'generhal-settings',
        'subsection' => false,
        'fields'     => array(
            array(
                'id'       => 'site-title',
                'type'     => 'text',
                'title'    => __( 'عنوان الموقع', 'redux-framework-demo' ),
                'desc'     => __( 'المرجوا ادخال العنوان الرسمي للموقع', 'redux-framework-demo' ),
                'default'  => 'Default Text',
            ), 
                array(
                'id'       => 'slogan-title',
                'type'     => 'text',
                'title'    => __( 'نبذة قليلة', 'redux-framework-demo' ),
                'desc'     => __( 'بكلمات قليلة، أكتب نبذة قصيرة عن الموقع.', 'redux-framework-demo' ),
                'default'  => '',
            ),    
            array(
                'id'       => 'logo-settings',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'اللوغو الخاص', 'redux-framework-demo' ),
                'compiler' => 'true',
                'subtitle' => __( 'المرجوا رفع اللوغو الخاص بالقالب', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_template_directory_uri().'/core/assets/images/logo.png' ),
            ),
    array(
                    'id'       => 'favicon-settings',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __( 'ايقونة الموقع', 'redux-framework-demo' ),
                    'compiler' => 'true',
                    'subtitle' => __( 'المرجوا رفع الأيقونة التي ستظهر في اعلى الموقع  ', 'redux-framework-demo' ),
                    'default'  => array( 'url' => get_template_directory_uri().'/core/assets/images/fav.png' )
            ),
                        array(
                'id'       => 'copy_rights',
                'type'     => 'text',
                'title'    => __( 'النص الحقوق في الفوتر', 'redux-framework-demo' ),
                'default'  => '2018 (c) جميع الحقوق محفوظة ',
            ),  

 array(
                'id'       => 'opt-color-site',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => __( 'لون الموقع الرئيسي', 'redux-framework-demo' ),
                'subtitle' => __( 'اختيار لون للموقع.', 'redux-framework-demo' ),
                'default'  => '#000000',
            ),
       
    
    
    
      array(
                'id'       => 'home-categories',
                'type'     => 'checkbox',
                'title'    => __( 'المقالات الرئيسية', 'redux-framework-demo' ),
                'subtitle' => __( 'صنف المقالات التي تظهر في الرئيسية', 'redux-framework-demo' ),
                'desc'     => __( 'تنبيه : من الأفضل جداً أن يتم اختيار 4 على الأكثر', 'redux-framework-demo' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  =>$hadik,
                //See how std has changed? you also don't need to specify opts that are 0.
                
        ),
    
    
    array(
                'id'       => 'arfont',
                'type'     => 'select',
                'title'    => __( 'اختيار الخط العربي', 'redux-framework-demo' ),
                'options'  => $arfonts,
            ),
    
    
         array(
                    'id'       => 'readMore-text',
                    'type'     => 'text',
                    'desc'             => __( 'زر اقرأ المزيد', 'redux-framework-demo' ),
                    'title'    => __( 'تغيير النص الخاص باقرأ المزيد', 'redux-framework-demo' ),
                    'default'  => 'أكمل القراءة'
                ),
                     array(
                    'id'       => 'search-placeholder',
                    'type'     => 'text',
                    'desc'             => __( 'النص الخاص بفورم البحث', 'redux-framework-demo' ),
                    'title'    => __( 'تغيير النص الخاص بمحرك البحث', 'redux-framework-demo' ),
                    'default'  => 'ادخل كلمة البحث...'
                ),       

  array(
                'id'       => 'boxed-full-width',
                'type'     => 'select',
                'title'    => __( 'شكل حدود الموقع', 'redux-framework-demo' ),
                'options'  => 
                    [
                        'full-width'=>'الحجم كامل',
                        'boxed'=>'مربع في المنتصف'
                    ],
                'default'  => 'full-width'
            ),
    
            array(
    
    'id'       => 'header-template',
                'type'     => 'select',
                    'title'    => __( 'شكل الهيدر', 'redux-framework-demo' ),

                'options'  => 
                    [
                        'template-1'=>'الشكل الأول',
                        'template-2'=>'الشكل الثاني',
                        'template-3'=>'الشكل الثالث'
                    ],
                'default'  => 'template-1'
            ),
    
    
     array(
                    'id'       => 'margin-top-bottom-size',
                    'type'     => 'text',
                    'desc'             => __( 'هذه الخاصية تتفعل فقط في حالة اذا كان شكل الموقع مربع في المنتصف', 'redux-framework-demo' ),
                    'title'    => __( 'حجم البعد عن الأعلى والأسفل', 'redux-framework-demo' ),
                    'default'  => '35px'
                ),
    
      array(
                'id'       => 'background-img',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'صورة الخلفية', 'redux-framework-demo' ),
                'compiler' => 'true',
                'default'  => array( 'url' => get_template_directory_uri().'/assets/img/bg.jpg' ),
            ),
            
    
    
    
     ),
    
    
    
    
    
    
    
    
    ) );






    Redux::setSection( $opt_name, array(
        'title'            => __( 'السوشيال ميديا', 'redux-framework-demo' ),
        'id'               => 'basic',
        'desc'             => __( 'روابط مواقع االتواصل الاجتماعي!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-link',
        'fields'     => array(
                array(
                    'id'       => 'facebook-link',
                    'type'     => 'text',
                    'title'    => __( 'حساب الفيسبوك', 'redux-framework-demo' ),
                    'default'  => 'http://www.facebook.com'

                ),   
                array(
                    'id'       => 'twitter-link',
                    'type'     => 'text',
                    'title'    => __( 'حساب التويتر', 'redux-framework-demo' ),
                    'default'  => 'http://www.twitter.com'
                ),
                array(
                    'id'       => 'linkedin-link',
                    'type'     => 'text',
                    'title'    => __( 'حساب لينكد ان', 'redux-framework-demo' ),
                    'default'  => 'http://www.linkedin.com'
                ),        
                array(
                    'id'       => 'pinitrest-link',
                    'type'     => 'text',
                    'title'    => __( 'حساب بينترست', 'redux-framework-demo' ),
                    'default'  => 'http://www.pinitrest.com'
                ),
                array(
                    'id'       => 'instagram-link',
                    'type'     => 'text',
                    'title'    => __( 'حساب الأنستغرام', 'redux-framework-demo' ),
                    'default'  => 'http://www.instagram.com'
        
                ),        
                array(
                    'id'       => 'googleplus-link',
                    'type'     => 'text',
                    'title'    => __( 'حساب جوجل بلس', 'redux-framework-demo' ),
                    'default'  => 'http://www.google.com'
                ),  
                array(
                    'id'       => 'youtube-link',
                    'type'     => 'text',
                    'title'    => __( 'حساب يوتوب', 'redux-framework-demo' ),
                    'default'  => 'http://www.youtube.com'
                ),  
                array(
                    'id'       => 'soundcloud-link',
                    'type'     => 'text',
                    'title'    => __( 'حساب سانود كلاود', 'redux-framework-demo' ),
                    'default'  => 'http://www.youtube.com'
                ),          
                array(
                    'id'       => 'soundcloud',
                    'type'     => 'text',
                    'title'    => __( 'حساب سانود كلاود', 'redux-framework-demo' ),
                    'default'  => 'http://www.youtube.com'
                ),    
        )
    ) );



  


Redux::setSection( $opt_name, array(
        'title'            => __( 'صفحة تواصل معنا', 'redux-framework-demo' ),
        'id'               => 'contact-page',
        'desc'             => __( 'المعلومات الخاص بصفحة التواصل', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-link',
        'fields'     => array(
            
            
               array(
                    'id'       => 'show-hide-header-contact',
                    'type'     => 'switch',
                    'title'    => __( 'اظهار/ اخفاء الهيدر العلوي', 'redux-framework-demo' ),
                    'on'    => __( 'اظهار' ),
                    'off'    => __( 'اخفاء' ),
                    'default'  => 1,
                ),
             array(
                'id'       => 'contact-page-header-bg',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'صورة خلفية الهيدر', 'redux-framework-demo' ),
                'compiler' => 'true',
                'subtitle' => __( '', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_template_directory_uri().'/core/assets/images/banner/banner.jpg' ),
            ),
                 array(
                    'id'           => 'contact-page-desc',
                    'type'         => 'textarea',
                    'title'        => __( 'وصف صفحة تواصل معنا', 'redux-framework-demo' ),
                    'validate'     => 'html_custom',
                    'allowed_html' => array(
                        'a'      => array(
                            'href'  => array(),
                            'title' => array()
                        ),
                        'br'     => array(),
                        'em'     => array(),
                        'strong' => array()
                )),
                array(
                    'id'       => 'adress-contact',
                    'type'     => 'text',
                    'title'    => __( 'العنوان', 'redux-framework-demo' ),
                    'default'  => 'المغرب - ألمانيا '
                ),   
                array(
                    'id'       => 'phone-contact',
                    'type'     => 'text',
                    'title'    => __( 'رقم الهاتف', 'redux-framework-demo' ),
                    'default'  => '+00 123 456 789'
                ),
                array(
                    'id'       => 'email-contact',
                    'type'     => 'text',
                    'title'    => __( 'البريد الالكتروني', 'redux-framework-demo' ),
                    'default'  => 'contact@email.com'
                ),     
                array(
                    'id'       => 'email-reciever',
                    'type'     => 'text',
                    'title'    => __( 'بريد استقبال الرسائل', 'redux-framework-demo' ),
                    'desc'             => __( 'هذا البريد هو الذي سيستقبل الرسائل التي تصل من صفحة تواصل معنا ، لذلك يرجى ادخاله بعناية', 'redux-framework-demo' ),
                    'default'  => ''
                ),  
              
        )
) );









  


Redux::setSection( $opt_name, array(
        'title'            => __( 'صفحة جدول المباريات', 'redux-framework-demo' ),
        'id'               => 'matches-page',
        'desc'             => __( 'المعلومات الخاص بصفحة جدول المباريات', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-link',
        'fields'     => array(
            
            
               array(
                    'id'       => 'show-hide-header-matches-page',
                    'type'     => 'switch',
                    'title'    => __( 'اظهار/ اخفاء الهيدر العلوي', 'redux-framework-demo' ),
                    'on'    => __( 'اظهار' ),
                    'off'    => __( 'اخفاء' ),
                    'default'  => 1,
                ),
               array(
                'id'       => 'matches-page-header-bg',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'صورة خلفية الهيدر', 'redux-framework-demo' ),
                'compiler' => 'true',
                'subtitle' => __( '', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_template_directory_uri().'/core/assets/images/banner/banner.jpg' ),
            ),
                 array(
                    'id'           => 'matches-page-desc',
                    'type'         => 'textarea',
                    'title'        => __( 'وصف صفحة جدول المباريات', 'redux-framework-demo' ),
                    'validate'     => 'html_custom',
                    'allowed_html' => array(
                        'a'      => array(
                            'href'  => array(),
                            'title' => array()
                        ),
                        'br'     => array(),
                        'em'     => array(),
                        'strong' => array()
                )),
            
                
            array(
                'id'       => 'counter-matches',
                'type'     => 'spinner', 
                'title'    => __('عدد المباريات بالصفحة', 'redux-framework-demo'),
                'subtitle' => __('عدد المباريات التي سيتم عرضها في صفحة جدول المباريات','redux-framework-demo'),
                'default'  => '6',
                'min'      => '1',
                'step'     => '1',
                'max'      => '400',
            ),
     
             
        )
) );







  


Redux::setSection( $opt_name, array(
        'title'            => __( 'صفحة المدونة', 'redux-framework-demo' ),
        'id'               => 'blog-page',
        'desc'             => __( 'المعلومات الخاص بصفحة جدول المباريات', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-link',
        'fields'     => array(
            
            
               array(
                    'id'       => 'show-hide-header-blog-page',
                    'type'     => 'switch',
                    'title'    => __( 'اظهار/ اخفاء الهيدر العلوي', 'redux-framework-demo' ),
                    'on'    => __( 'اظهار' ),
                    'off'    => __( 'اخفاء' ),
                    'default'  => 1,
                ),
               array(
                'id'       => 'blog-page-header-bg',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'صورة خلفية الهيدر', 'redux-framework-demo' ),
                'compiler' => 'true',
                'subtitle' => __( '', 'redux-framework-demo' ),
                'default'  => array( 'url' => get_template_directory_uri().'/core/assets/images/banner/banner.jpg' ),
            ),
                 array(
                    'id'           => 'matches-page-blog',
                    'type'         => 'textarea',
                    'title'        => __( 'وصف صفحة المدونة', 'redux-framework-demo' ),
                    'validate'     => 'html_custom',
                    'allowed_html' => array(
                        'a'      => array(
                            'href'  => array(),
                            'title' => array()
                        ),
                        'br'     => array(),
                        'em'     => array(),
                        'strong' => array()
                )),
            
                
            array(
                'id'       => 'counter-blogs',
                'type'     => 'spinner', 
                'title'    => __('عدد المقالات بالصفحة', 'redux-framework-demo'),
                'subtitle' => __('عدد المقالات التي سيتم عرضها في صفحة المدونة','redux-framework-demo'),
                'default'  => '9',
                'min'      => '1',
                'step'     => '1',
                'max'      => '400',
            ),
     
             
        )
) );































Redux::setSection( $opt_name, array(
        'title'      => __( ' الاعلانات', 'redux-framework-demo' ),
        'id'         => 'adsnse-settings',
        'subsection' => false,
        'fields'     => array(
    
    
            array(
                    'id'       => 'myads-1',
                    'type'     => 'button_set',
                    'title'    => 'اعلان الهيدر 728*90',                
                    'options'  => array(
                        'ads-image'     => 'صورة',
                        'ads-textarea' => 'كود أدسنس او html',
                    ),

            ),
            array(
                'id'       => 'image-ads-1',
                'type'     => 'media',
                'url'      => true,
                'compiler' => 'true',
                'required' => array( 'myads-1', '=', 'ads-image' )
            ),
            array(
                'id'       => 'link-image-ads-1',
                'type'     => 'text',
                'desc'     => __( 'رابط الصورة عند الضغط عليها ، الرابط اختياري فقط', 'redux-framework-demo' ),
                'required' => array( 'myads-1', '=', 'ads-image' )
            ), 
            array(
                'id'       => 'code-ads-1',
                'type'     => 'textarea',
                'required' => array( 'myads-1', '=', 'ads-textarea' )
            ),
    
    
 
               
            array(
                    'id'       => 'myads-2',
                    'type'     => 'button_set',
                    'title'    => 'اعلان السايدبار',
                    'subtitle' => 'المرجوا اختيار نوع الإعلان',
                    'options'  => array(
                        'ads-image'     => 'صورة',
                        'ads-textarea' => 'كود أدسنس او html',
                    ),

            ),
            array(
                'id'       => 'image-ads-2',
                'type'     => 'media',
                'url'      => true,
                'compiler' => 'true',
                'required' => array( 'myads-2', '=', 'ads-image' )
            ),
            array(
                'id'       => 'link-image-ads-2',
                'type'     => 'text',
                'desc'     => __( 'رابط الصورة عند الضغط عليها ، الرابط اختياري فقط', 'redux-framework-demo' ),
                'required' => array( 'myads-2', '=', 'ads-image' )
            ), 
            array(
                'id'       => 'code-ads-2',
                'type'     => 'textarea',
                'required' => array( 'myads-2', '=', 'ads-textarea' )
            ),
             
    
    
    
    
    
     array(
                    'id'       => 'myads-3',
                    'type'     => 'button_set',
                    'title'    => 'اعلان في الرئيسية فوق المقالات والمباريات الجديدة',
                    'subtitle' => 'المرجوا اختيار نوع الإعلان',
                    'options'  => array(
                        'ads-image'     => 'صورة',
                        'ads-textarea' => 'كود أدسنس او html',
                    ),

            ),
            array(
                'id'       => 'image-ads-3',
                'type'     => 'media',
                'url'      => true,
                'compiler' => 'true',
                'required' => array( 'myads-3', '=', 'ads-image' )
            ),
            array(
                'id'       => 'link-image-ads-3',
                'type'     => 'text',
                'desc'     => __( 'رابط الصورة عند الضغط عليها ، الرابط اختياري فقط', 'redux-framework-demo' ),
                'required' => array( 'myads-3', '=', 'ads-image' )
            ), 
            array(
                'id'       => 'code-ads-3',
                'type'     => 'textarea',
                'required' => array( 'myads-3', '=', 'ads-textarea' )
            ),
             
    
    
    
    
    
         array(
                    'id'       => 'myads-4',
                    'type'     => 'button_set',
                    'title'    => 'الإعلان الأول في صفحة المباراة',
                    'subtitle' => 'المرجوا اختيار نوع الإعلان',
                    'options'  => array(
                        'ads-image'     => 'صورة',
                        'ads-textarea' => 'كود أدسنس او html',
                    ),

            ),
            array(
                'id'       => 'image-ads-4',
                'type'     => 'media',
                'url'      => true,
                'compiler' => 'true',
                'required' => array( 'myads-4', '=', 'ads-image' )
            ),
            array(
                'id'       => 'link-image-ads-4',
                'type'     => 'text',
                'desc'     => __( 'رابط الصورة عند الضغط عليها ، الرابط اختياري فقط', 'redux-framework-demo' ),
                'required' => array( 'myads-4', '=', 'ads-image' )
            ), 
            array(
                'id'       => 'code-ads-4',
                'type'     => 'textarea',
                'required' => array( 'myads-4', '=', 'ads-textarea' )
            ),
             
        
    
         array(
                    'id'       => 'myads-5',
                    'type'     => 'button_set',
                    'title'    => 'الإعلان الثاني في صفحة المباراة',
                    'subtitle' => 'المرجوا اختيار نوع الإعلان',
                    'options'  => array(
                        'ads-image'     => 'صورة',
                        'ads-textarea' => 'كود أدسنس او html',
                    ),

            ),
            array(
                'id'       => 'image-ads-5',
                'type'     => 'media',
                'url'      => true,
                'compiler' => 'true',
                'required' => array( 'myads-5', '=', 'ads-image' )
            ),
            array(
                'id'       => 'link-image-ads-5',
                'type'     => 'text',
                'desc'     => __( 'رابط الصورة عند الضغط عليها ، الرابط اختياري فقط', 'redux-framework-demo' ),
                'required' => array( 'myads-5', '=', 'ads-image' )
            ), 
            array(
                'id'       => 'code-ads-5',
                'type'     => 'textarea',
                'required' => array( 'myads-5', '=', 'ads-textarea' )
            ),
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

          
        )
    ) );



    
    
  
  

    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

