<?php
$new_course_released_image    = get_field('new_course_released_image', 'option');
$new_course_released_title    = get_field('new_course_released_title', 'option');
$new_course_released_link     = get_field('new_course_released_link', 'option');
$subscription_title           = get_field('subscription_title', 'option');
$subscription_form_shortcode  = get_field('subscription_form_shortcode', 'option');
?>
<div class="sidebar">
  <div class="sidebar-block">
    <div class="new-course">
      <div class="new-course-image-wrapper">
        <a class='new-course-image' href="<?php echo $new_course_released_link; ?>">
          <img title="<?php echo $new_course_released_image['title']; ?>" src="<?php echo $new_course_released_image['url']; ?>" alt="<?php echo $new_course_released_image['title']; ?>">
        </a>
      </div>
      <p class="new-course-span">New Course Released!</p>
      <h4 class="new-course-title"><a href="<?php echo $new_course_released_link; ?>"><?php echo $new_course_released_title; ?></a></h4>
    </div>
  </div>

  <div class="sidebar-block">
    <div class="subscribe">
      <div class="subscribe-content">
        <h4 class="subscribe-title"><?php echo $subscription_title; ?></h4>
        <div class="subscribe-form">
          <?php echo do_shortcode( $subscription_form_shortcode ); ?>
        </div>
        <div class="subscribe-follow">
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
      </div>
    </div>
  </div>

</div>
