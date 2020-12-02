<?php get_header(); ?>
<main class='page-content'>
  <?php 
  if( have_posts() ){
    while(have_posts()){
      the_post();
      ?>
      <section class="page-content-here">
        <div class="container">
          <h1><?php the_title(); ?></h1>
          <div class="content"><?php the_content(); ?></div>
        </div>
      </section>
      <?php
    }
  }
  ?>
</main>
<?php get_footer(); ?>