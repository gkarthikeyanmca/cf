<?php
	/* Register Sidebar */
	function create_sidebars() {
		//Blog Sidebar
		register_sidebar( array(
	        'name' => __( 'Blog Sidebar' ),
	        'id' => 'blog-sidebar',
	        'description' => __( 'This sidebar will be shown in blog archive page.' ),
	        'before_widget' => '<div class="large-12 medium-12 small-12 columns">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
	    ) );

	    //Single Page Sidebar
		register_sidebar( array(
	        'name' => __( 'Single Page Sidebar' ),
	        'id' => 'single-page-sidebar',
	        'description' => __( 'This sidebar will be shown in single post.' ),
	        'before_widget' => '<div class="large-12 medium-12 small-12 columns">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
	    ) );

	    //Video Sidebar
		register_sidebar( array(
	        'name' => __( 'Video Sidebar' ),
	        'id' => 'video-sidebar',
	        'description' => __( 'This sidebar will be shown in videos archive page.' ),
	        'before_widget' => '<div class="large-12 medium-12 small-12 columns">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
	    ) );

	    //Home Page Sidebar
		register_sidebar( array(
	        'name' => __( 'Home Page Sidebar' ),
	        'id' => 'home-page-sidebar',
	        'description' => __( 'This sidebar will be shown in home page.' ),
	        'before_widget' => '<div class="large-12 medium-12 small-12 columns">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
	    ) );

	    //General Sidebar
		register_sidebar( array(
	        'name' => __( 'General Sidebar' ),
	        'id' => 'general-sidebar',
	        'description' => __( 'This sidebar will be shown in pages.' ),
	        'before_widget' => '<div class="large-12 medium-12 small-12 columns">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
	    ) );
	}
	add_action( 'widgets_init', 'create_sidebars' );
?>