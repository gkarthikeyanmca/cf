<?php get_header(); ?>
<div id="content-container">
  <div class="row content-wrapper">
    <div class="large-8 medium-12 small-12 columns general-page">
      <?php
        if(have_posts()):
          while(have_posts()): the_post();
            ?>
            <h4><?php the_title(); ?></h4>
            <div class="featured-img">
              <?php the_post_thumbnail('full'); ?>
            </div>
            <div class="blog-content">
              <?php the_content(); ?>
            </div>
            <div class="share-post">
              <span>Share this post : </span>
              <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
              <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
              <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;lang=en" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
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