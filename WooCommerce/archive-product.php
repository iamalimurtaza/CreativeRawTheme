<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' ); ?>
<main class='page-content'>
  <section class="tutorials-posts">
    <div class="container has-padding">
      <div class="tutorials-archive-grid courses-page">
        <p class="tutorials-span">Courses</p>
        <h2 class="tutorials-title"><?php the_field('course_archive_page_title', 'option'); ?></h2>
				<div class="products-grid">
					<div class="about-info tabbed-content">
						<ul class="tabs" data-tabs>
							<li><a data-tabby-default href="#videoCourses">Video Courses</a></li>
							<li><a href="#eBooks">EBooks</a></li>
						</ul>
						<div class="tabs-content">
							<div id="videoCourses">
								<div class="tabs-listing">
								<div class="d-flex">
							<div class="col-1-4">
							<?php get_template_part( 'tutorials-sidebar' ); ?>
							</div>
								<div class="col-3-4 lr-nomargin">
									<?php 
										do_action( 'woocommerce_before_main_content' );
										if ( woocommerce_product_loop() ) {
										
											/**
											 * Hook: woocommerce_before_shop_loop.
											 *
											 * @hooked woocommerce_output_all_notices - 10
											 * @hooked woocommerce_result_count - 20
											 * @hooked woocommerce_catalog_ordering - 30
											 */
											do_action( 'woocommerce_before_shop_loop' );
										
											woocommerce_product_loop_start();
										
											if ( wc_get_loop_prop( 'total' ) ) {
												while ( have_posts() ) {
													the_post();
										
													/**
													 * Hook: woocommerce_shop_loop.
													 */
													do_action( 'woocommerce_shop_loop' );
										
													wc_get_template_part( 'content', 'product' );
												}
											}
										
											woocommerce_product_loop_end();
										
											/**
											 * Hook: woocommerce_after_shop_loop.
											 *
											 * @hooked woocommerce_pagination - 10
											 */
											do_action( 'woocommerce_after_shop_loop' );
										} else {
											/**
											 * Hook: woocommerce_no_products_found.
											 *
											 * @hooked wc_no_products_found - 10
											 */
											do_action( 'woocommerce_no_products_found' );
										}
										
										/**
										 * Hook: woocommerce_after_main_content.
										 *
										 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
										 */
										do_action( 'woocommerce_after_main_content' );
										?>
									</div>
								</div>
								</div>
							</div>
							<div id="eBooks">
								<div class="ebooks-listing">
									<div class="d-flex">
										<div class="col-1-4">
										<?php get_template_part( 'tutorials-sidebar' ); ?>
										</div>
											<div class="col-3-4 lr-nomargin">
											<?php
												if ( is_shop() || is_product_category() || is_product_tag() ) {
														$products = new WP_Query([
															'post_type' 			=> 'product',
															'orderby' 				=> 'date',
															'order' 					=> 'DESC',
															'posts_per_page' 	=> 12,
															'paged' 					=> get_query_var( 'paged' ),
															'tax_query'				=>	[[
																'taxonomy' 			=> 'product_cat',
																'field'    			=> 'slug',
																'terms'    			=> ['course'],
																'operator' 			=> 'NOT IN',
															]],
														]);
														if($products->have_posts()){
															?>
															<ul class="products columns-3">
																<?php 
																while($products->have_posts()){
																	$products->the_post();
																	wc_get_template_part( 'content', 'product' );
																}
																wp_reset_postdata();
																?>
															</ul>
															<?php
														} else {
															woocommerce_content();
														}
													}
												?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
      </div>
    </div>
  </section>
</main>
<?php get_footer( 'shop' );
