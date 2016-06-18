<?php get_header(); ?>
<div id="content-container">
  <div class="row content-wrapper">
    <div class="large-8 medium-8 small-12 columns blog-post">
      <?php
        if( have_posts() ):
          while( have_posts() ): the_post();
            ?>
            <h4><?php the_title(); ?></h4>
            <div class="blog-meta">
              <i class="fa fa-user"></i>  By <?php the_author_posts_link(); ?> | 
              <i class="fa fa-calendar"></i>  <?php the_time('M j, Y'); ?> | 
              <i class="fa fa-bookmark"></i>  <?php the_category(', '); ?> | 
              <i class="fa fa-tag"></i>  <?php the_tags( '', ', ', '' ); ?>  | 
              <i class="fa fa-comment"></i>  <?php comments_number( 'No Comments', 'Comments (1)', 'Comments (%)' ); ?>
            </div>
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
            
            <div class="blog-author-details">
              <div class="row">
                <div class="large-12 medium-12 small-12 columns">
                  <?php 
                    $aid=get_the_author_meta( 'ID' );
                    $author=pods('user',$aid);
                  ?>
                  <h5>About Author</h5>
                  <div class="row">
                    <div class="large-4 medium-4 small-12 columns author-img">
                      <?php
                        if($author->display('profile_pic')!=''){ ?>
                          <img src="<?php echo $author->display('profile_pic'); ?>" />
                          <?php
                        }
                        else{
                          ?>
                          <img src="<?php bloginfo('template_url'); ?>/img/unknown.png" />
                          <?php
                        }
                      ?>
                      <div class="author-link">
                        <div class="center">
                          <a href="<?php the_field('facebook_url','user_'.$aid); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                          <a href="<?php the_field('google_plus_url','user_'.$aid); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                          <a href="<?php the_field('twitter_url','user_'.$aid); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                          <a href="<?php the_field('linkedin_url','user_'.$aid); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="large-8 medium-8 small-12 columns">
                      <div class="author-name"><?php the_author_posts_link(); ?></div>
                      <div class="author-bio">
                        <?php echo get_field('introduction','user_'.$aid); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--<h4>Comments</h4>-->
            <?php
            comments_template();
          endwhile;
        endif;
      ?>
    </div>
    <div class="large-4 medium-4 small-12 columns sidebar">
      <?php
        if ( is_active_sidebar('single-page-sidebar') ) :
            dynamic_sidebar( 'single-page-sidebar' );
        endif;
      ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>