<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <link rel="icon" 
      type="image/png" 
      href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo(); ?> | <?php if (is_front_page()) {
            print("Digital Media");
} else {
    the_title();
} ?></title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
<script>

   </script>

<nav class="navbar navbar-expand-lg fixed-top">
<a class="d-flex navbar-brand" href="<?php echo home_url(); ?>">

                      <div><h1>ajk</h1></div>
                    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php wp_nav_menu(array(
                                            'menu'              => 'header-menu',
                                            'theme_location'    => 'Header',
                                            'depth'             => 2,
                                            'container'         => false,
                                            'container_class'   => 'navbar-collapse',
                                            'menu_class'        => 'nav navbar-nav navbar-right mr-auto',
                                            'walker'            => new wp_bootstrap_navwalker(),
                                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback'));?>
  </div>
</nav>