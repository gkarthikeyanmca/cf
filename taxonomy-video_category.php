<?php get_header(); ?>
<div id="content-container">
  <div class="row content-wrapper">
    <div class="large-8 medium-12 small-12 columns videos-wrapper">
     <?php
       if( have_posts() ):
          while( have_posts() ): the_post();
            $video_pod=pods('video',array("where"=>"t.ID=".get_the_ID()));
            $video_id=$video_pod->display('youtube_video_id');
            ?>
            <div class="large-4 medium-6 small-12 columns">
              <div class="video-post">
                <a href="#" data-reveal-id="videoModal" video-id="<?php echo $video_id; ?>">
                  <img width="200" src="http://img.youtube.com/vi/<?php echo $video_id; ?>/sddefault.jpg" />
                  <img src="<?php bloginfo('template_directory'); ?>/img/play.png" class="play-button" />
                </a>
                <h5><?php the_title(); ?></h5>
                <div class="social-icons">
                  <a href="http://www.facebook.com/share.php?u=https://youtu.be/<?php echo $video_id; ?>&amp;title=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
                  <a href="https://plus.google.com/share?url=https://youtu.be/<?php echo $video_id; ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
                  <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;lang=en" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
                </div>
              </div>
            </div>
            <?php
          endwhile;
        endif;
      ?>
    </div>

    <div class="large-4 medium-12 small-12 columns sidebar">
      <?php
        if ( is_active_sidebar('video-sidebar') ) :
            dynamic_sidebar( 'video-sidebar' );
        endif;
      ?>
   </div>
  </div>
</div>
<?php get_footer(); ?>