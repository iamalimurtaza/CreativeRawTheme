<?php

function creative_setup(){
  add_theme_support( 'html5' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'menus' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'woocommerce' );
  register_nav_menus([
    'primary-menu'    =>  __('Primary Menu', 'creativeraw'),
    'secondary-menu'  =>  __('Secondary Menu', 'creativeraw')
  ]);
}