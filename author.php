<?php get_header(); ?>
<div id="content-container">
  <div class="row content-wrapper">
    <div class="large-12 medium-12 small-12 columns author-full-bio">
      <div class="row">
        <div class="large-3 medium-4 small-12 columns author-pic">
          <?php 
            global $wp_query;
            $curauth = $wp_query->get_queried_object();
            $author=pods('user',$curauth->ID);
          ?>
          <h3>Ashok Kumar</h3>
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
          <div class="contact-links">
            <a href="<?php the_field('facebook_url','user_'.$curauth->ID); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="<?php the_field('google_plus_url','user_'.$curauth->ID); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
            <a href="<?php the_field('twitter_url','user_'.$curauth->ID); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="<?php the_field('linkedin_url','user_'.$curauth->ID); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="<?php the_field('youtube_url','user_'.$curauth->ID); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
            <a href="skype:<?php the_field('skype_id','user_'.$curauth->ID); ?>" target="_blank"><i class="fa fa-skype"></i></a>
            <a href="mailto:<?php echo $current_user->user_email; ?>" target="_blank"><i class="fa fa-envelope"></i></a>
          </div>
          <div class="download-resume">
            <a href="<?php echo $author->display('resume'); ?>" target="_blank"><i class="fa fa-file"></i> Download Resume</a>
          </div>
        </div>
        <div class="large-9 medium-8 small-12 columns author-contacts">
          <div class="profile-info">
            <ul class="accordion" data-accordion role="tablist">
              <li class="accordion-navigation active">
                <a href="#short-bio" role="tab" id="short-bio-heading" aria-controls="short-bio">Introduction <i class="fa fa-angle-down right"></i></a>
                <div id="short-bio" class="content active" role="tabpanel" aria-labelledby="short-bio-heading">
                  <div class="author-description">
                    <?php the_field('introduction','user_'.$curauth->ID); ?>
                  </div>
                </div>
              </li>
              <li class="accordion-navigation">
                <a href="#qualification" role="tab" id="qualification-heading" aria-controls="qualification">Qualification <i class="fa fa-angle-down right"></i></a>
                <div id="qualification" class="content" role="tabpanel" aria-labelledby="qualification-heading">
                  <?php the_field('qualification','user_'.$curauth->ID); ?>
                </div>
              </li>
              <li class="accordion-navigation">
                <a href="#experience"  role="tab" id="experience-heading" aria-controls="experience">
                  Experience <i class="fa fa-angle-down right"></i>
                </a>
                <div id="experience" class="content" role="tabpanel" aria-labelledby="experience-heading">
                  <?php the_field('experience','user_'.$curauth->ID); ?>
                </div>
              </li>
              <li class="accordion-navigation">
                <a href="#tech-exposure" role="tab" id="tech-exposure-heading" aria-controls="tech-exposure">
                  Technical Exposure <i class="fa fa-angle-down right"></i>
                </a>
                <div id="tech-exposure" class="content" role="tabpanel" aria-labelledby="tech-exposure-heading">
                  <?php the_field('technical_exposure','user_'.$curauth->ID); ?>
                </div>
              </li>
              <li class="accordion-navigation">
                <a href="#achivements" role="tab" id="achivements-heading" aria-controls="achivements">
                 Achivements <i class="fa fa-angle-down right"></i>
                </a>
                <div id="achivements" class="content" role="tabpanel" aria-labelledby="achivements-heading">
                  <?php the_field('achievements','user_'.$curauth->ID); ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row latest-posts" data-equalizer="aposts">
        <div class="large-12 medium-12 small-12 columns">
          <h4>Posts by Ashok Kumar</h4>
        </div>
        <?php
          if(have_posts()):
            $count=0;
            while(have_posts()): the_post();
              if($count==0){
                ?>
                <div class="row">
                <?php
              }
              $count++;
              ?>
              <div class="large-4 medium-6 small-12 columns" data-equalizer-watch="aposts">
                <div class="excerpt-wrapper">
                  <h5><?php the_title(); ?></h5>
                  <div class="blog-meta">
                    <i class="fa fa-calendar"></i>  <?php the_time('M j, Y'); ?> | 
                    <i class="fa fa-bookmark"></i>  <?php the_category(', '); ?>
                  </div>
                  <?php the_post_thumbnail('full'); ?>
                  <div class="post-brief">
                    <?php the_excerpt(); ?>
                  </div>
                  <div class="action-block">
                    <div class="left">
                      <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><i class="fa fa-facebook"></i></a>
                      <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><i class="fa fa-google-plus"></i></a>
                      <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;lang=en" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="button tiny">Read More</a>
                  </div>
                </div>
              </div>
              <?php
              if($count==3){
                $count=0;
                ?>
                </div>
                <?php
              }
            endwhile;
            if($count>0 && $count<3){
              echo "</div>";
            }
          endif;
          wp_pagenavi();
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>