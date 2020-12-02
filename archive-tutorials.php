<?php get_header(); ?>
<main class='page-content'>
  <section class="tutorials-posts">
    <div class="container has-padding">
      <div class="tutorials-archive-grid">
        <p class="tutorials-span">Tutorials</p>
        <h2 class="tutorials-title"><?php the_field('tutorials_archive_page_title', 'option'); ?></h2>
        <div class="about-info">
          <div class="d-flex">
            <div class="col-1-4">
            <?php get_template_part( 'tutorials-sidebar' ); ?>
            </div>
            <div class="col-3-4 lr-nomargin">
              <div class="d-flex">
                <?php 
                if(have_posts()){
                  while(have_posts()){
                  the_post(); ?>
                    <div class="col-1-3">
                      <div class="tutorial-grid">
                        <div class="post-thumbnail-wrapper">
                          <div class="course-thumbnail" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
                          <?php  $course_category = get_the_terms( $post, 'category' )[0]->slug;
                            if($course_category == 'adobe-photoshop'){
                              ?>
                              <img src="<?php echo get_template_directory_uri() . '/assets/photoshop.svg';  ?>" alt="photoshop">
                            <?php
                          } else if($course_category == 'adobe-lightroom'){
                            ?>
                            <img src="<?php echo get_template_directory_uri() . '/assets/lightroom.svg';  ?>" alt="lightroom">
                            <?php
                            }
                          ?>
                        </div>
                        </div>
                        <div class="course-excerpt">
                          <h3 class="course-title"><?php the_title(); ?></h3>
                          <?php 
                          $content = get_the_content();
                          $trimmed_content = wp_trim_words( $content, 20 ); ?>
                          <p><?php echo $trimmed_content; ?></p>
                        </div>
                        <div class="tutorial-action">
                          <a class='btn btn-text-dark btn-block' href="<?php the_permalink(); ?>">Learn More</a>
                        </div>
                      </div>
                    </div>
                  <?php } } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>