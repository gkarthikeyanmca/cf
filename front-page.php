<?php get_header(); ?>
	<div id="content-container">
      <div class="row content-wrapper">
        <div class="large-8 medium-12 small-12 columns">
          <div class="row latest-posts">

            <div id="slider" class="owl-carousel owl-theme">
              <?php
                if(have_rows('slider')):
                  while(have_rows('slider')):the_row();

                    ?>
                    <div class="item">
                      <?php echo wp_get_attachment_image(get_sub_field('slider_image'),'slider-img'); ?>
                      <div class="text1">
                        <h2 class="sample"><?php the_sub_field('hover_text') ?></h2>
                      </div>
                    </div>
                    <?php
                  endwhile;
                endif;
              ?>
            </div>

            <h4>Latest Posts</h4>
            <?php 
              $args = array( 'post_type'=>'post', 'post_status'=>'publish' );
              $query = new WP_Query($args);
              if($query->have_posts()):
                $count=0;
                while($query->have_posts()): $query->the_post();
                  if($count==0){ echo '<div class="row" data-equalizer="js">'; }
                  ?>
                  <div class="large-6 medium-6 small-12 columns" data-equalizer-watch="js">
                    <div class="excerpt-wrapper">
                      <h5><?php the_title(); ?></h5>
                      <div class="blog-meta">
                        <i class="fa fa-calendar"></i>  <?php the_time('M j, Y'); ?> | 
                        <i class="fa fa-bookmark"></i>  <?php the_category(', '); ?> | 
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
                  $count++;
                  if($count==2){ echo '</div>'; $count=0; }
                endwhile;
                if($count==1){ echo '</div>'; }
              endif;
            ?>
          </div>
        </div>
        <div class="large-4 medium-12 small-12 columns sidebar">
          <?php
            if ( is_active_sidebar('home-page-sidebar') ) :
                dynamic_sidebar( 'home-page-sidebar' );
            endif;
          ?>
        </div>
      </div>
    </div>
<?php get_footer(); ?>