<?php

function creative_enqueue(){
  // Styles
  wp_register_style( 'swiperCSS', get_template_directory_uri() . '/css/swiper.min.css', [], '5.4.5' );
  wp_register_style( 'tabbyCss', get_template_directory_uri() . '/css/tabby-ui.min.css', [], '12.0.3' );
  wp_register_style( 'mainCSS', get_stylesheet_uri(), [], time() );

  wp_enqueue_style( 'swiperCSS' );
  wp_enqueue_style( 'tabbyCss' );
  wp_enqueue_style( 'mainCSS' );

  // Scripts
  wp_register_script( 'swiperJs', get_template_directory_uri() . '/js/swiper.min.js', [], '5.4.5', true );
  wp_register_script( 'tabbyJs', get_template_directory_uri() . '/js/tabby.min.js', [], '12.0.3', true );
  wp_register_script( 'mainScript', get_template_directory_uri() . '/js/app.js', [], false, true );

  wp_enqueue_script( 'swiperJs' );
  wp_enqueue_script( 'tabbyJs' );
  wp_enqueue_script( 'mainScript' );
}