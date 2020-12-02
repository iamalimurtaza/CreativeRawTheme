<?php
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page([
    'page_title' 	=> 'CreativeRaw Options',
		'menu_title'	=> 'CreativeRaw',
		'menu_slug' 	=> 'creative-raw-options',
		'capability'	=> 'edit_posts',
    'redirect'		=> false,
    'icon_url'    => 'dashicons-lightbulb'
  ]);
}