<?php

//Load production scripts and styles
function alaink_production_scripts()
{  
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/public/css/app.css', array(), '1.0.0', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/public/js/app.js', array(), '1.0.0', true);
}

if ( "akcom.test" !== $_SERVER['SERVER_NAME'] ) {
  add_action('wp_enqueue_scripts', 'alaink_production_scripts');
}

//Load local dev scripts and styles
function alaink_local_dev_scripts()
{  
  wp_enqueue_script('customjs', get_template_directory_uri() . '/public/js/app.js', array(), '1.0.0', true);
}
  
if ( "akcom.test" === $_SERVER['SERVER_NAME'] ) {
  add_action('wp_enqueue_scripts', 'alaink_local_dev_scripts');
}

function ak_menus()
{
    register_nav_menus(array(
    'header' => 'Header menu',
    'footer' => 'Footer menu'
    ));
}

add_action('after_setup_theme', 'ak_menus');

// Register Custom Navigation Walker
require_once('inc/wp_bootstrap_navwalker.php');

// Bootstrap navigation
function bootstrap_nav()
{
    wp_nav_menu(array(
            'theme_location'    => 'header-menu',
            'depth'             => 2,
            'container'         => 'false',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker()));
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove wp-embed.min.js
function dequeue_scripts() {
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_scripts' );

// Register theme support for HTML scipt and style so that type attribute is ommitted for W3 standards/validator
add_action(
  'after_setup_theme',
  function() {
      add_theme_support( 'html5', [ 'script', 'style' ] );
  }
);

/*
—------------------------------------------------------------
# BROWSERSYNC
—------------------------------------------------------------
*/

$whitelist = array(
  '127.0.0.1',
  '::1'
);

if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    add_action('admin_head', 'localhost_styles');
    add_action('wp_head', 'localhost_styles');

  //Ads "Local" if it's local....
    function localhost_styles()
    {
        echo '<style>

    body:before{
      background: rgba(255,00,00,0.7);
      font-size: 16px;
      color: #fff;
      display: block;
      padding: 25px;
      font-family: consolas!important;
      box-shadow: 0 0 25px rgba(255,00,00,1) inset;
    }

    body:after{
      content: "localhost";
      font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
      font-weight: 300;
      text-align: center;
      font-size: 16px;
      background: rgba(255,00,00,0.5);
      height: 35px;
      line-height: 35px;
      width: 100%;
      color: rgba(255,255,255,0.8);
      position: fixed;
      bottom: 10px;
      right: 10px;
      width: 100px;
      z-index: 1000;
    }
    </style>';
    }

    add_action('wp_footer', 'browser_sync_script');
    add_action('login_enqueue_scripts', 'browser_sync_script');

    function browser_sync_script()
    {
        ?>
    <script id="__bs_script__">
    //<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.2.13.0.js'><\/script>".replace("HOST", location.hostname));
    //]]>
    </script>
    <?php
    }
}

