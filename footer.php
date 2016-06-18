    <div id="footer">
      <div class="footer-wrapper">
        <?php
          $settings=pods('site_settings');
        ?>
        <div class="row">
          <div class="large-12 medium-12 small-12 columns">
            <h3>Socialize with us</h3>
            <div class="social-icons">
              <a href="<?php echo $settings->display('facebook_url'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
              <a href="<?php echo $settings->display('google_plus_url'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
              <a href="<?php echo $settings->display('twitter_url'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="<?php echo $settings->display('youtube_url'); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
            </div>
          </div>
        </div>
        <div class="row copyrights-wrapper">
          <div class="large-12 medium-12 small-12 columns">
            <?php echo $settings->display('copyright_info'); ?>
            <div class="credits">
              Site designed and developed by <a href="http://coralwebdesigns.com" target="_blank">Coral Web Designs</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="videoModal" class="reveal-modal" data-reveal aria-labelledby="video-title" aria-hidden="true" role="dialog">
      <h4 id="video-title">Lorem Ipsum</h4>
      <div class="yt-video flex-video"></div>
      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>

    <script src="<?php bloginfo('template_url'); ?>/js/foundation.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/foundation/foundation.equalizer.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/foundation/foundation.alert.js"></script>
    <script>
      jQuery(document).foundation();

      jQuery(document).ready(function(){
        jQuery(document).on('click','a[data-reveal-id="videoModal"]',function(){
          var code=jQuery(this).attr('video-id');
          jQuery('#videoModal div.yt-video').html('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+code+'?autoplay=1&cc_load_policy=1" frameborder="0"></iframe>');
        });
        jQuery(document).on('click','#videoModal .close-reveal-modal',function(){
          jQuery('#videoModal div.yt-video').html('');
        });  
        jQuery("#slider").owlCarousel({
            navigation : false, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true,
            autoPlay: 5000
        });
        jQuery('#primary-menu').find('ul.sub-menu').addClass('dropdown');

        jQuery(document).on('click','.theme a',function(){
          var color;
          var home_url='<?php echo home_url(); ?>';
          if(jQuery(this).parents('li').hasClass('default')){
            color="default";
          }
          else if(jQuery(this).parents('li').hasClass('green')){
            color="green";
          }
          else if(jQuery(this).parents('li').hasClass('orange')){
            color="orange";
          }
          else if(jQuery(this).parents('li').hasClass('purple')){
            color="purple";
          }
          //document.cookie="selected_theme=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
          document.cookie="selected_theme="+color+"; path=/";
          var url = window.location.href;     // Returns full URL
          location.href=url;
        });
      });
    </script>
    <?php wp_footer(); ?>
  </body>
</html>