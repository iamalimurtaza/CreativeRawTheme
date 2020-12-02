<?php

// Includes
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/post_types.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/misc.php';

// Hooks
add_action( 'wp_enqueue_scripts', 'creative_enqueue' );
add_action( 'after_setup_theme', 'creative_setup' );
add_action( 'init', 'creative_post_types' );