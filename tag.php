<?php get_header(); ?>
<div id="content-container">
  <div class="row content-wrapper">
    <div class="large-8 medium-12 small-12 columns">
      <div class="row latest-posts" data-equalizer="js">
        <?php
          if( have_posts() ):
            while( have_posts() ): the_post();
              ?>
              <div class="large-12 medium-12 small-12 columns" data-equalizer-watch="js">
                <div class="excerpt-wrapper">
                  <h5><?php the_title(); ?></h5>
                  <div class="blog-meta">
                    <i class="fa fa-user"></i>  By <?php the_author_posts_link(); ?> | 
                    <i class="fa fa-calendar"></i>  <?php the_time('M j, Y'); ?> | 
                    <i class="fa fa-bookmark"></i>  <?php the_category(', '); ?> | 
                    <i class="fa fa-comment"></i>  <?php comments_number( 'No Comments', 'Comments (1)', 'Comments (%)' ); ?>
                  </div>
                  <?php the_post_thumbnail('full'); ?>
                  <div class="post-brief">
                    <?php the_excerpt(); ?>
                  </div>
                  <div class="action-block">
                    <div class="left">
                      <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
                      <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
                      <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;lang=en" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="button tiny">Read More</a>
                  </div>
                </div>
              </div>
              <?php
            endwhile;
          endif;
          wp_pagenavi();
        ?>
      </div>      
    </div>
    <div class="large-4 medium-12 small-12 columns sidebar">
      <?php
        if ( is_active_sidebar('blog-sidebar') ) :
            dynamic_sidebar( 'blog-sidebar' );
        endif;
      ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>