<?php get_header(); ?>
<main>
  <section class="hero-slider">
    <div class="swiper-container hero">
      <div class="swiper-wrapper">
        <?php 
        if(have_rows('slider')){
          while(have_rows('slider')){
            the_row();
            $slide_image  = get_sub_field('slide_image');
            $slide_title  = get_sub_field('slide_title');
            $slide_text   = get_sub_field('slide_text');
            $slide_button = get_sub_field('slide_button');
            ?>
            <div class="swiper-slide" style="background-image: url(<?php echo $slide_image["url"]; ?>)">
              <div class="container">
                <div class="hero-slider-content">
                <h1 class='hero-slider-title'><?php echo $slide_title; ?></h1>
                  <div class="hero-slider-text">
                    <p class='text'><?php echo $slide_text; ?></p>
                    <?php if($slide_button) { ?>
                      <a class='slider-btn btn btn-primary' target="<?php echo $slide_button['target']; ?>" href="<?php echo $slide_button['url']; ?>"><?php echo $slide_button['title']; ?> <img src="<?php echo get_template_directory_uri() . '/assets/get-started.svg'; ?>" alt="get started svg"></a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
      <div class="container auto-height">
        <div class="swiper-button-next hero-next"></div>
        <div class="swiper-button-prev hero-prev"></div>
      </div>
    </div>
  </section>
  <!-- Featured Course -->
  <section class="featured-course">
  <?php 
  $featured_course_image  = get_field('featured_course_image');
  $featured_course_span   = get_field('featured_course_span');
  $featured_course_title  = get_field('featured_course_title');
  $featured_course_text   = get_field('featured_course_text');
  $featured_course_button = get_field('featured_course_button'); ?>
    <div class="container">
      <div class="featured-section-wrapper">
        <div class="d-flex">
          <div class="col-1-2">
            <div class="flex-column">
              <img class='featured-course-image' title="<?php echo $featured_course_image['title']; ?>" src="<?php echo $featured_course_image['url']; ?>" alt="<?php echo $featured_course_image['title']; ?>">
            </div>
          </div>
          <div class="col-1-2">
            <div class="flex-column">
              <div class="featured-section-content">
                <span><?php echo $featured_course_span; ?></span>
                <h2><?php echo $featured_course_title; ?></h2>
                <div><?php echo $featured_course_text; ?></div>
                <a class='btn btn-text-dark featured-course-link' target="<?php echo $featured_course_button['target']; ?>" href="<?php echo $featured_course_button['url']; ?>"><?php echo $featured_course_button['title']; ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Tabbed Content -->
  <section class="tabbed-content">
    <?php 
    $video_courses_title  = get_field('video_courses_title');
    $video_courses_text   = get_field('video_courses_text');
    $ebooks_title         = get_field('ebooks_title');
    $ebooks_text          = get_field('ebooks_text'); ?>
    <div class="container">
      <ul class="tabs" data-tabs>
        <li><a data-tabby-default href="#videoCourses">Video Courses</a></li>
        <li><a href="#eBooks">EBooks</a></li>
      </ul>
      <div class="tabs-content woocommerce">
        <div id="videoCourses">
          <div class="tabs-text">
            <h2 class="tabs-content-title"><?php echo $video_courses_title; ?></h2>
            <p class="tabs-content-text"><?php echo $video_courses_text; ?></p>
          </div>
          <div class="tabs-listing">
          <?php
          $video_courses = new WP_Query([
            'post_type' 			=> 'product',
            'orderby' 				=> 'date',
            'order' 					=> 'DESC',
            'posts_per_page' 	=> 5,
            'tax_query'				=>	[[
              'taxonomy' 			=> 'product_cat',
              'field'    			=> 'slug',
              'terms'    			=> ['course'],
            ]],
          ]);
          if($video_courses->have_posts()){ ?>
            <div class="swiper-container three-column-carousel">
              <div class="swiper-wrapper products"> <?php 
                while($video_courses->have_posts()){
                  $video_courses->the_post(); ?>
                  <div class="swiper-slide">
                    <?php wc_get_template_part( 'content', 'product' ); ?>
                  </div>
                <?php } wp_reset_postdata(); ?>
              </div>
            <div class="swiper-pagination three-column-carousel-pagination"></div>
          </div>
          <?php } ?>
          </div>
        </div>
        <div id="eBooks">
          <div class="tabs-text">
            <h2 class="tabs-content-title"><?php echo $ebooks_title; ?></h2>
            <p class="tabs-content-text"><?php echo $ebooks_text; ?></p>
            <div class="ebooks-listing">
            <?php
              $e_books = new WP_Query([
                'post_type' 			=> 'product',
                'orderby' 				=> 'date',
                'order' 					=> 'DESC',
                'posts_per_page' 	=> 5,
                'tax_query'				=>	[[
                  'taxonomy' 			=> 'product_cat',
                  'field'    			=> 'slug',
                  'terms'    			=> ['ebook'],
                ]],
              ]);
              if($e_books->have_posts()){
                ?>
                <div class="swiper-container three-column-carousel">
                  <div class="swiper-wrapper products"><?php 
                    while($e_books->have_posts()){
                      $e_books->the_post(); ?>
                      <div class="swiper-slide">
                        <?php wc_get_template_part( 'content', 'product' ); ?>
                      </div>
                    <?php } wp_reset_postdata(); ?>
                    </div>
                <div class="swiper-pagination three-column-carousel-pagination"></div>
              </div>
                <?php
              } else {
                woocommerce_content();
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Tutorials -->
  <section class="tutorials">
    <?php 
    $tutorials_title  = get_field('tutorials_title');
    $tutorials_text   = get_field('tutorials_text'); ?>
    <div class="container">
      <div class="tutorials-text-wrapper">
        <p class="tutorials-span">Tutorials</p>
        <h2 class="tutorials-title"><?php echo $tutorials_title; ?></h2>
        <p class="tutorials-text"><?php echo $tutorials_text; ?></p>
      </div>
      <div class="tutorials-listing">
        <div class="d-flex">
          <?php 
          $tutorials = new WP_Query([
            'post_type'       =>  'tutorials',
            'posts_per_page'  =>  3,
            'order'           =>  'DESC',
            'orderby'         =>  'date'
          ]);
          if($tutorials->have_posts()){
            while($tutorials->have_posts()){
              $tutorials->the_post();
              ?>
              <div class="col-1-3">
                <div class="tutorial-grid">
                  <div class="post-thumbnail-wrapper">
                    <div class="course-thumbnail" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                  </div>
                  <div class="course-excerpt">
                    <h3 class="course-title"><?php the_title(); ?></h3>
                    <?php 
                    $content = get_the_content();
                    $trimmed_content = wp_trim_words( $content, 20 ); ?>
                    <p><?php echo $trimmed_content; ?></p>
                  </div>
                  <div class="tutorial-action">
                    <a class='btn btn-text' href="<?php the_permalink(); ?>">Learn More <img src="<?php echo get_template_directory_uri() . '/assets/read-more.svg'; ?>" alt="Button right arrow"></a>
                  </div>
                </div>
              </div>
              <?php
            }
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
      <div class="tutorial-buttons">
        <div class="d-flex just-center">
          <?php 
          $courses_button   = get_field('courses_button');
          $tutorials_button = get_field('tutorials_button'); ?>
          <a class='btn btn-fill-primary' target="<?php echo $courses_button['target']; ?>" href="<?php echo $courses_button['url']; ?>"><?php echo $courses_button['title']; ?></a>
          <a class='btn btn-trans-light' target="<?php echo $tutorials_button['target']; ?>" href="<?php echo $tutorials_button['url']; ?>"><?php echo $tutorials_button['title']; ?></a>
        </div>
      </div>
    </div>
  </section>
  <!-- About -->
  <section class="about">
    <?php 
    $about_title        = get_field('about_title');
    $about_author_image = get_field('about_author_image');
    $about_content      = get_field('about_content');
    $about_image        = get_field('about_image');
    ?>
    <div class="container">
      <p class="about-span">About</p>
      <h2 class="about-title"><?php echo $about_title; ?></h2>
      <div class="about-info">
        <div class="d-flex">
          <div class="col-1-4">
            <div class="about-author-image-wrapper">
              <img title="<?php echo $about_author_image['title']; ?>" src="<?php echo $about_author_image['url']; ?>" alt="<?php echo $about_author_image['title']; ?>" class="about-author-image">
            </div>
          </div>
          <div class="col-3-4 lr-nomargin">
            <div class="about-content-text">
              <?php echo $about_content; ?>
            </div>
            <div class="about-landscape">
              <img src="<?php echo $about_image['url']; ?>" alt="<?php echo $about_image['title']; ?>" title="<?php echo $about_image['title']; ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Free training (not featured course) -->
  <section class="featured-course free-training">
  <?php 
  $free_training_course_image  = get_field('free_training_course_image');
  $free_training_course_span   = get_field('free_training_course_span');
  $free_training_course_title  = get_field('free_training_course_title');
  $free_training_course_text   = get_field('free_training_course_text');
  $free_training_course_button = get_field('free_training_course_button'); ?>
    <div class="container">
      <div class="featured-section-wrapper">
        <div class="d-flex">
          <div class="col-1-2">
            <div class="flex-column">
              <img class='featured-course-image' title="<?php echo $free_training_course_image['title']; ?>" src="<?php echo $free_training_course_image['url']; ?>" alt="<?php echo $free_training_course_image['title']; ?>">
            </div>
          </div>
          <div class="col-1-2">
            <div class="flex-column">
              <div class="featured-section-content">
                <span><?php echo $free_training_course_span; ?></span>
                <h2><?php echo $free_training_course_title; ?></h2>
                <div><?php echo $free_training_course_text; ?></div>
                <a class='btn btn-text-dark featured-course-link' target="<?php echo $free_training_course_button['target']; ?>" href="<?php echo $free_training_course_button['url']; ?>"><?php echo $free_training_course_button['title']; ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>