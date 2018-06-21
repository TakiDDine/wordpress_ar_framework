<?php global $onta_theme; ?>

<header>
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="header-top-left">
                             <?php
                                    echo str_replace('sub-menu', '', wp_nav_menu( array(
                                    'echo' => false,
                                    'theme_location' => 'top-menu',
                                    ) )
                                    );
                               ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="social-media-area">
                            <nav>
                                <ul>

                                    <?php
                                    if(!empty($onta_theme['facebook-link'])){
                                    echo '<li><a class="facebook" href="'.$onta_theme["facebook-link"].'"><i class="fa fa-facebook"></i></a></li>';
                                    }
                                    if(!empty($onta_theme['youtube-link'])){
                                    echo '<li><a class="youtube" href="'.$onta_theme["youtube-link"].'"><i class="fa fa-youtube-play"></i></a></li>';
                                    }                    
                                    if(!empty($onta_theme['linkedin-link'])){
                                    echo '<li><a class="linkedin" href="'.$onta_theme['linkedin-link'].'"><i class="fa fa-linkedin"></i></a></li>';
                                    }
                                    if(!empty($onta_theme['pinitrest-link'])){
                                    echo '<li><a class="pinterest" href="'.$onta_theme['pinitrest-link'].'"><i class="fa fa-pinterest-p"></i></a></li>';
                                    }
                                    if(!empty($onta_theme['instram-link'])){
                                    echo '<li><a class="instagram" href="'.$onta_theme['instram-link'].'"><i class="fa fa-instagram"></i></a></li>';
                                    }
                                    if(!empty($onta_theme['googleplus-link'])){
                                    echo '<li><a class="google" href="'.$onta_theme['googleplus-link'].'"><i class="fa fa-google"></i></a></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <a class="logo" href="<?php echo get_home_url(); ?>">
                               <?php if(!empty($onta_theme['logo-settings']['url'])): ?>
                                <img src="<?php echo $onta_theme['logo-settings']['url']; ?>" alt="img"/>
                                    <?php else: ?>
                                    <?php echo "<h1>".$onta_theme['site-title']."</h1>"; ?>
                                    <?php  echo "<p class='slogan-title'>". $onta_theme['slogan-title'] ." </p>"; ?>
                                    <?php endif; ?>
                             </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                               <?php if($onta_theme['myads-1'] == 'ads-image') : ?>
                               <?php if(!empty($onta_theme['link-image-ads-1'])): ?> <a href="<?php echo $onta_theme['link-image-ads-1']; ?>"> <?php endif; ?>
                               <img src="<?php echo $onta_theme['image-ads-1']['url']; ?>" alt="">
                               <?php if(!empty($onta_theme['link-image-ads-1'])): ?>  </a> <?php endif; ?>
                               <?php else: ?>
                               <?php echo $onta_theme['code-ads-1']; ?>
                               <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-area" id="sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="navbar-header">
                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button> 
                        </div>
                        <div class="main-menu navbar-collapse collapse">
                             <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'primary',
                                    'depth'             => 2,
                                    'container'         => 'div',
                                    'container_class'   => 'collapse navbar-collapse',
                                    'container_id'      => 'bs-example-navbar-collapse-1',
                                    'menu_class'        => 'nav navbar-nav',
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'            => new WP_Bootstrap_Navwalker(),
                                ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>