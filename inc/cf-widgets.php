<?php
	function remove_unwanted_widgets() {
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Text');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Tag_Cloud');
		unregister_widget('WP_Nav_Menu_Widget');
		unregister_widget('PodsWidgetSingle');
		unregister_widget('PodsWidgetList');
		unregister_widget('PodsWidgetField');
		unregister_widget('PodsWidgetForm');
		unregister_widget('PodsWidgetView');
	}
	add_action( 'widgets_init', 'remove_unwanted_widgets', 25 );

	class Featured_Posts_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('featured_posts_widget', __( 'Featured Posts' ), array( 'description' => __( 'Widget to show featured posts' ), ) );
		}

		function widget( $args, $instance ) {
			if( have_rows('featured_posts','widget_'.$this->id) ):
			    while ( have_rows('featured_posts','widget_'.$this->id) ) : the_row();
			        $id=get_sub_field('featured_post');
			        $curr_post=get_post($id);
			        if($curr_post->post_type=='video'){
			        	$video_pod=pods('video',array("where"=>"t.ID=".$curr_post->ID));
            			$video_id=$video_pod->display('youtube_video_id');
			        	?>
			        	<div class="large-12 medium-12 small-12 columns">
			                <div class="video-post excerpt-wrapper">
				              	<h5><?php echo get_the_title($curr_post->ID); ?></h5>
				              	<div class="post-brief">
					                <a href="#" data-reveal-id="videoModal" video-id="<?php echo $video_id; ?>">
					                  <img width="200" src="http://img.youtube.com/vi/<?php echo $video_id; ?>/sddefault.jpg" />
					                  <img src="<?php bloginfo('template_directory'); ?>/img/play.png" class="play-button" />
					                </a>
					            </div>
				                <div class="action-block">
				                	<div class="left">
					                  <a href=""><i class="fa fa-facebook"></i></a>
					                  <a href=""><i class="fa fa-google-plus"></i></a>
					                  <a href=""><i class="fa fa-twitter"></i></a>
					                </div>
					                <a href="<?php echo get_post_type_archive_link( 'video' ); ?>" class="button tiny">View All</a>
				                </div>
			                </div>
			            </div>
			            <?php
			        }
			        else{
			        	setup_postdata( $GLOBALS['post'] =& $curr_post );
			        	?>
			        	<div class="large-12 medium-12 small-12 columns">
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
					                	<a href="#"><i class="fa fa-facebook"></i></a>
					                	<a href="#"><i class="fa fa-google-plus"></i></a>
					                	<a href="#"><i class="fa fa-twitter"></i></a>
					              	</div>
				              		<a href="<?php the_permalink(); ?>" class="button tiny">Read More</a>
				            	</div>
				          	</div>
			          	</div>
			        	<?php
			        	wp_reset_postdata();
			        }
			    endwhile;
			endif;
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	class Author_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('author_widget', __( 'About Author' ), array( 'description' => __( 'Widget to show author' ), ) );
		}

		function widget( $args, $instance ) {
			$user=get_field('cf_widget_author','widget_'.$this->id);
			?>
			<div class="large-12 medium-12 small-12 columns">
              <div class="author-wrapper">
                <h5>About Author</h5>
                <div class="author-pic">
                 <?php echo $user['user_avatar']; ?>
                </div>
                <div class="author-desgination">
                  <span class="author-name"><?php echo $user['user_firstname']." ".$user['user_lastname']; ?></span><br/>
                </div>
                <div class="author-link">
                  <a href="<?php echo get_author_posts_url( $user['ID'] ); ?>" class="button tiny">View Profile</a>
                </div>
              </div>
            </div>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	class Newsletter_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('newsletter_widget', __( 'Newsletter Singup' ), array( 'description' => __( 'Widget to show newsletter signup form' ), ) );
		}

		function widget( $args, $instance ) {
			?>
			<style>
				.alert,.success{
					display: none;
					padding: 10px;
				}
			</style>
			<div class="large-12 medium-12 small-12 columns">
				<div class="newsletter-form">
					<h5>Subscribe Here</h5>
	            	<div class="row collapse">
	        			<div class="small-9 columns">
	          				<input type="text" id="user-email" placeholder="Enter your email">
	        			</div>
	        			<div class="small-3 columns">
	          				<a href="javascript:void(0);" class="button postfix newsletter-signup">Subscribe</a>
	        			</div>
	     	 		</div>
	     	 		<div data-alert class="alert-box success radius">
		  				<i class="fa fa-check"></i> You are subscribed successfully
					</div>
					<div data-alert class="alert-box alert radius">
  						<i class="fa fa-close"></i> Invalid email, please enter valid email.
					</div>
	     	 	</div>
            </div>
            <script>
            	jQuery(document).ready(function(){
            		jQuery(document).on('click','.newsletter-signup',function(){
            			var email=jQuery('#user-email').val();
            			if(email==''){
            				jQuery('.alert').show().delay(4000).fadeOut(800);
            			}
            			else{
            				var t=this;
            				jQuery(this).html('<i class="fa fa-spinner fa-pulse"></i>');
            				jQuery.ajax({
            					url: '<?php echo admin_url("admin-ajax.php"); ?>',
            					method: 'post',
            					data: {'email':email, 'action':'subscribe_to_mailchimp'},
            					success:function(data){
            						if(data==1){
            							jQuery('.alert').show().delay(4000).fadeOut(800);
            							jQuery(t).html('Subscribe');
            						}
            						else{
            							jQuery('.success').show().delay(4000).fadeOut(800);
            							jQuery(t).html('Subscribe');
            							jQuery('#user-email').val('');
            						}
            					}
            				});
            			}
            		});
            	});
            </script>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	class Search_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('search_widget', __( 'Search' ), array( 'description' => __( 'Search widget for codefalooda' ), ) );
		}

		function widget( $args, $instance ) {
			?>
			<div class="large-12 medium-12 small-12 columns">
				<div class="search-form">
					<h5>Search</h5>
					<form action="<?php echo home_url(); ?>" method="get">
	            		<div class="row collapse">
		        			<div class="small-9 columns">
		          				<input type="text" name="s" placeholder="Search..">
		        			</div>
		        			<div class="small-3 columns">
		          				<input type="submit" class="button postfix" value="Search" />
		        			</div>
	     	 			</div>
	     	 		</form>
	     	 	</div>
            </div>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	class Categories_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('categories_widget', __( 'Categories' ), array( 'description' => __( 'Categories widget for codefalooda' ), ) );
		}

		function widget( $args, $instance ) {
			?>
			<div class="large-12 medium-12 small-12 columns">
				<div class="cat-wrapper">
					<h5>Categories</h5>
					<ul class="cat-list">
						<?php
							$categories = get_categories();
							foreach($categories as $cat){
								?>
								<li>
									<a href="<?php echo get_category_link( $cat->term_id ); ?>">
										<?php echo $cat->cat_name." (".$cat->category_count.")"; ?>
									</a>
								</li>
								<?php
							}
						?>
					</ul>
	     	 	</div>
            </div>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	class Video_Categories_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('video_categories_widget', __( 'Video Categories' ), array( 'description' => __( 'Video Categories widget for codefalooda' ), ) );
		}

		function widget( $args, $instance ) {
			?>
			<div class="large-12 medium-12 small-12 columns">
				<div class="cat-wrapper">
					<h5>Video Categories</h5>
					<ul class="cat-list">
						<?php
							$categories = get_terms('video_category');
							foreach($categories as $cat){
								?>
								<li>
									<a href="<?php echo get_term_link( $cat ); ?>">
										<?php echo $cat->name." (".$cat->count.")"; ?>
									</a>
								</li>
								<?php
							}
						?>
					</ul>
	     	 	</div>
            </div>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	class Recent_Posts_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('recent_posts_widget', __( 'Recent Posts' ), array( 'description' => __( 'Show recent 5 posts' ), ) );
		}

		function widget( $args, $instance ) {
			?>
			<div class="large-12 medium-12 small-12 columns">
				<div class="recent-posts-wrapper">
					<h5>Recent Posts</h5>
					<ul class="cat-list">
						<?php
							$posts = get_posts();
							foreach($posts as $p){
								?>
								<li>
									<a href="<?php echo get_permalink( $p->ID ); ?>">
										<?php echo get_the_title($p->ID); ?>
									</a>
								</li>
								<?php
							}
						?>
					</ul>
	     	 	</div>
            </div>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	class Tag_Cloud_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('tag_cloud_widget', __( 'Tag Cloud' ), array( 'description' => __( 'Show all tags' ), ) );
		}

		function widget( $args, $instance ) {
			?>
			<div class="large-12 medium-12 small-12 columns">
				<div class="tag-cloud-wrapper">
					<h5>Tags</h5>
					<?php wp_tag_cloud(); ?>
	     	 	</div>
            </div>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	class Analytics_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('analytics_widget', __( 'Google Analytics' ), array( 'description' => __( 'Show Google Analytics Chart' ), ) );
		}

		function widget( $args, $instance ) {
			?>
			<div class="large-12 medium-12 small-12 columns">
				<div class="ga-wrapper">
					<h5>Analytics <img src="<?php bloginfo('template_url')?>/img/ga-logo.jpg" class="right" /></h5>
					<?php
						$stats=json_decode(get_option('ga_country_visits'),true);
					?>
					<ul>
						<?php
							$flag=0;
							$count=0;
							foreach($stats['stats'] as $row){
								if($row['country']!='(not set)'){
									$count++;
									?>
									<li><?php echo $row['country']; ?> <span class="right"><?php echo $row['visits']; ?></span></li>
									<?php
								}
								else{
									$flag=1;
									$temp=$row;
								}
								if($count==5){
									break;
								}
							}
							if($flag==1){
								?>
								<li><?php echo $temp['country']; ?> <span class="right"><?php echo $temp['visits']; ?></span></li>
								<?php
							}
						?>
						<!--<li class="total-ga-hits">Total <span class="right"><?php echo $stats['total']; ?></span></li>-->
					</ul>
	     	 	</div>
            </div>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	class Flag_Counter_Widget extends WP_Widget {

		function __construct() {
			// Instantiate the parent object
			parent::__construct('flag_counter_widget', __( 'Flag Counter' ), array( 'description' => __( 'Show Google Analytics Chart' ), ) );
		}

		function widget( $args, $instance ) {
			?>
			<div class="large-12 medium-12 small-12 columns">
				<div class="ga-wrapper">
					<a href="http://info.flagcounter.com/aUzU"><img src="http://s06.flagcounter.com/count2/aUzU/bg_FFFFFF/txt_000000/border_ffffff/columns_4/maxflags_16/viewers_0/labels_0/pageviews_1/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
	     	 	</div>
            </div>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			// Save widget options
		}

		function form( $instance ) {
			// Output admin widget options form
		}
	}

	function create_widgets(){
		register_widget( 'Featured_Posts_Widget' );
		register_widget( 'Author_Widget' );
		register_widget( 'Newsletter_Widget' );
		register_widget( 'Search_Widget' );
		register_widget( 'Categories_Widget' );
		register_widget( 'Video_Categories_Widget' );
		register_widget( 'Recent_Posts_Widget' );
		register_widget( 'Tag_Cloud_Widget' );
		register_widget( 'Flag_Counter_Widget' );
		if(get_option('ga_country_visits')!=''){
			register_widget( 'Analytics_Widget' );
		}
	}
	add_action( 'widgets_init', 'create_widgets', 99 );
?>