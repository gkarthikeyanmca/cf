<?php
	/* Theme Supports */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'widgets' );
	add_theme_support( 'menus' );
	add_theme_support( 'html5' );
	add_theme_support( 'title-tag' );

	add_image_size( 'slider-img',750, 470, true );

	/* Register nav menu. */
	register_nav_menu( 'primary', __( 'Navigation Menu' ) );

	include 'inc/cf-sidebars.php';
	include 'inc/cf-widgets.php';
	/* ACF Declarations Start */
	include_once 'inc/acfp/acf.php';

	/* Mailchimp API */
	include 'inc/MailChimp.php';
	use \DrewM\MailChimp\MailChimp;

	add_filter('acf/settings/dir', function( $dir ){
		return get_template_directory_uri() . '/inc/acfp/';
	});

	add_filter('acf/settings/path', function( $path ){
		return get_theme_root() . '/' . get_template() . '/inc/acfp/';
	});

	add_filter('acf/settings/show_admin', function( $path ){
		global $current_user;
		if ($current_user->user_login != 'cfadmin'){
			return false; // Set false to hide UI in admin
		}
		return true;
	});
	/* ACF Declarations End */

	add_action('admin_menu', 'remove_pods_menu', 11);
	function remove_pods_menu ()  {
		global $current_user;
		if ($current_user->user_login != 'cfadmin'){
			define('PODS_DISABLE_ADMIN_MENU', true);
			define('PODS_DISABLE_CONTENT_MENU', true);
		}
	}

	/* Admin styles */
	function admin_scripts(){
		?>
		<style>
			tr.pods-form-ui-row-type-wysiwyg .wp-media-buttons,
			a#add_pod_button {
				display: none;
			}
		</style>
		<?php
	}
	add_action( 'admin_enqueue_scripts', 'admin_scripts' );

	/* Restrict Posts Per Page */
	function restrict_posts_per_page( $query ) {
	    if ( $query->is_home() ) {
	        $query->set( 'posts_per_page', 6 );
	    }
	    else if ( $query->is_author() ) {
	        $query->set( 'posts_per_page', 6 );
	    }
	}
	add_action( 'pre_get_posts', 'restrict_posts_per_page' );

	/* Excerpt end text */
	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	/* Excerpt text length */
	function custom_excerpt_length( $length ) {
		return 30;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	//If not admin, dont show admin bar
	//if ( ! current_user_can( 'manage_options' ) ) {
	    show_admin_bar( false );
	//}

	add_action( 'wp_ajax_subscribe_to_mailchimp', 'subscribe_to_mailchimp' );
	add_action( 'wp_ajax_nopriv_subscribe_to_mailchimp', 'subscribe_to_mailchimp' );

	function subscribe_to_mailchimp(){
		$flag=0;
		$email=$_POST['email'];
		$list='655573a115';
		if(is_email($email)){
			$api = new MailChimp('155012883511a7ce0a8c564b43031aaa-us12');	
			$retval = $api->post('lists/655573a115/members', array(
                'email_address'     => $email,
                'status'            => 'subscribed'
			));
			if ($api->errorCode){
				echo $api->errorMessage;
			} else {
				echo $flag;
			}
		}
		else{
			$flag=1;
			echo $flag;
		}
		exit;
	}
?>