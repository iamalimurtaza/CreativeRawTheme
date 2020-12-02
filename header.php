<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container">
      <div class="d-flex">
        <div class="logo-wrapper">
          <?php $header_logo  = get_field('header_logo', 'option'); ?>
          <a class='logo' href="<?php echo esc_url(home_url()) ?>">
            <img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['title']; ?>" class="logo-img">
          </a>
        </div>
        <div class="nav-wrapper">
          <?php 
          wp_nav_menu([
            'theme_location'      =>  'primary-menu',
            'fallback_cb'         =>  false,
            'container'           =>  'nav',
            'container_class'     =>  'primary-menu-nav',
            'menu_class'          =>  'primary-menu-list'
          ]);
          ?>
        </div>
      </div>
    </div>
  </header>