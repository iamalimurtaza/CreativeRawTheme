<?php
function creative_post_types() {
  // Tutorials
  register_post_type( 'tutorials', [
    'labels'                => [
    'name'                  => _x( 'Tutorials', 'creativeraw' ),
    'singular_name'         => _x( 'Tutorial', 'creativeraw' ),
    'menu_name'             => _x( 'Tutorials', 'creativeraw' ),
    'name_admin_bar'        => _x( 'Tutorial', 'creativeraw' ),
    'add_new'               => __( 'Add New', 'creativeraw' ),
    'add_new_item'          => __( 'Add New Tutorial', 'creativeraw' ),
    'new_item'              => __( 'New Tutorial', 'creativeraw' ),
    'edit_item'             => __( 'Edit Tutorial', 'creativeraw' ),
    'view_item'             => __( 'View Tutorial', 'creativeraw' ),
    'all_items'             => __( 'All Tutorials', 'creativeraw' ),
    'search_items'          => __( 'Search Tutorials', 'creativeraw' ),
    'parent_item_colon'     => __( 'Parent Tutorials:', 'creativeraw' ),
    'not_found'             => __( 'No tutorials found.', 'creativeraw' ),
    ],
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'rewrite'               => [ 'slug' => 'tutorials' ],
    'capability_type'       => 'post',
    'has_archive'           => true,
    'hierarchical'          => false,
    'menu_position'         => null,
    'show_in_rest'          => true,
    'supports'              => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ],
    'taxonomies'            => [ 'category' ],
    'menu_icon'             => 'dashicons-art',
    'menu_position'         =>  5,
  ] );
}