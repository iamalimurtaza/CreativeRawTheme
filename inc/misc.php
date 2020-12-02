<?php
// out product excrpt on courses page
function output_product_excerpt() {
  global $post;
  echo "<p class='product-excerpt'>". wp_trim_words( $post->post_excerpt, 15 ) ."</p>";
}
add_action( 'woocommerce_after_shop_loop_item_title', 'output_product_excerpt', 35 );

// Exclude products from a ebook category on courses page
function custom_pre_get_posts_query( $q ) {
  $tax_query = (array) $q->get( 'tax_query' );
  $tax_query[] = array(
    'taxonomy' => 'product_cat',
    'field'    => 'slug',
    'terms'    => ['ebook'],
    'operator' => 'NOT IN'
  );
  $q->set( 'tax_query', $tax_query );
}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );  