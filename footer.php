  <footer class="site-footer">
    <?php 
    $testimonials_title   = get_field('testimonials_title', 'option');
    ?>
    <section class="testimonials">
      <div class="container">
        <div class="testimonials-wrapper">
          <?php 
          if( have_rows('testimonials', 'option') ){ ?>
            <div class="swiper-container testimonial-slider">
              <p class="testimonials-span">Testimonials</p>
              <h2 class="testimonials-title"><?php echo $testimonials_title; ?></h2>
              <div class="swiper-wrapper">
                <?php 
                while( have_rows('testimonials', 'option') ){
                the_row(); 
                $person_image     = get_sub_field('person_image', 'option');
                $person_name      = get_sub_field('person_name', 'option');
                $testimonial_text = get_sub_field('testimonial_text', 'option');
                $rating           = get_sub_field('rating', 'option');
                ?>
                <div class="swiper-slide testimonial-slide">
                  <div class="testimonial-image">
                    <img class='person-image' title="<?php echo $person_image['title']; ?>" src="<?php echo $person_image['url']; ?>" alt="<?php echo $person_image['title']; ?>">
                    <h4 class="testimonial-name"><?php echo $person_name; ?></h4>
                    <div class="testimonial-rating">
                    <?php 
                    if($rating){
                      $i = 1;
                      while($i <= $rating){
                      ?>
                        <img class='star-image' src="<?php echo get_template_directory_uri() . '/assets/star.svg' ?>" alt="rating star <?php echo $i ?> image ">
                      <?php $i++;
                      }
                    }
                    ?>
                    </div>
                  </div>
                  <div class="testimonial-text">
                    <blockquote><p><?php echo $testimonial_text; ?></p></blockquote>
                  </div>
                </div>
                <?php } ?>
              </div>
              <!-- Add Arrows -->
              <div class="swiper-button-next testimonial-next"></div>
              <div class="swiper-button-prev testimonial-prev"></div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <section class="social-subscribe">
      <div class="container">
        <div class="social-subscriber-wrapper">
          <div class="social-follow">
            <?php 
            $footer_socials_title = get_field('footer_socials_title', 'option');
            $facebook             = get_field('facebook', 'option');
            $twitter              = get_field('twitter', 'option');
            $instagram            = get_field('instagram', 'option');
            $youtube              = get_field('youtube', 'option'); ?>
            <h4><?php echo $footer_socials_title; ?></h4>
            <ul class="footer-socials">
              <?php if( $facebook ){ ?>
                <li><a target="_blank" href="<?php echo $facebook; ?>"><img src="<?php echo get_template_directory_uri() . '/assets/facebook.svg'; ?>" alt="Facebbok svg"></a></li>
              <?php }
              if( $twitter ){ ?>
                <li><a target="_blank" href="<?php echo $twitter; ?>"><img src="<?php echo get_template_directory_uri() . '/assets/twitter.svg'; ?>" alt="Twitter svg"></a></li>
              <?php }
              if( $instagram ){ ?>
                <li><a target="_blank" href="<?php echo $instagram; ?>"><img src="<?php echo get_template_directory_uri() . '/assets/instagram.svg'; ?>" alt="Instagram svg"></a></li>
              <?php }
              if( $youtube ){ ?>
                <li><a target="_blank" href="<?php echo $youtube; ?>"><img src="<?php echo get_template_directory_uri() . '/assets/youtube.svg'; ?>" alt="Youtube svg"></a></li>
              <?php } ?>
            </ul>
          </div>
          <div class="subscription">
            <?php 
            $mailing_list_title   = get_field('mailing_list_title', 'option');
            $mailing_list_text    = get_field('mailing_list_text', 'option');
            $form_shortcode       = get_field('mailing_list_form_shortcode', 'option');
            ?>
            <div class="subscription-content">
              <h2 class="subscription-title"><?php echo $mailing_list_title; ?></h2>
              <p class="subscription-text"><?php echo $mailing_list_text; ?></p>
              <div class="subscription-form">
                <?php echo do_shortcode( $form_shortcode ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bottom-footer">
      <div class="container">
        <div class="d-flex">
          <div class="col-1-2">
            <div class="footer-menu">
              <?php 
              wp_nav_menu([
                'theme_location'      =>  'secondary-menu',
                'fallback_cb'         =>  false,
                'container'           =>  'nav',
                'container_class'     =>  'footer-menu-nav',
                'menu_class'          =>  'footer-menu-list'
              ]);
              ?>
            </div>
          </div>
          <div class="col-1-2">
            <div class="copyrights"><p><?php the_field('footer_credits_text', 'option'); ?></p></div>
          </div>
        </div>
      </div>
    </section>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>