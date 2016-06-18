<?php
/*
Template Name: Contact Us
*/
get_header(); ?>
<div id="content-container">
  <div class="row content-wrapper">
    <div class="large-8 medium-12 small-12 columns">
      <?php
        if(have_posts()):
          while(have_posts()): the_post();
            ?>
            <h4><?php the_title(); ?></h4>
            <div class="blog-content">
              <?php the_content(); ?>
            </div>
            <?php
          endwhile;
        endif;
      ?>  
    </div>
    <div class="large-4 medium-12 small-12 columns sidebar">
      <?php
        if ( is_active_sidebar('general-sidebar') ) :
            dynamic_sidebar( 'general-sidebar' );
        endif;
      ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>