<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/foundation.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.theme.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.transitions.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.php" />
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery.js"></script>
    <?php wp_head(); ?>
  </head>
  <body>
    <!-- Google analytics tracking code -->
    <script>
       (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
       })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

       ga('create', 'UA-72653929-1', 'auto');
       ga('send', 'pageview');
    </script>
    <!-- Google analytics tracking code -->

    <div id="header">
      <div class="nav-wrapper sticky">
        <nav class="top-bar" data-topbar role="navigation" data-options="custom_back_text: true; back_text: GO BACK!">
          <ul class="title-area">
            <li class="name">
              <h1><a href="<?php echo home_url(); ?>">Code Falooda</a></h1>
            </li>
             <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href=""><span></span></a></li>
          </ul>

          <section class="top-bar-section">
            <!-- Right Nav Section -->
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'right', 'menu_id' => 'primary-menu' ) ); ?>
          </section>
        </nav>
      </div>
    </div>