<?php
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	$path=str_replace('index.php','',$parse_uri[0]);
	require( $path . 'wp-load.php' );
	header("Content-type: text/css; charset: UTF-8");
	if(isset($_COOKIE['selected_theme'])){
		if($_COOKIE['selected_theme']=='green'){
			$brand_color='#1abc9c';
		}
		else if($_COOKIE['selected_theme']=='orange'){
			$brand_color='#FFA500';
		}
		else if($_COOKIE['selected_theme']=='purple'){
			$brand_color='#A378C4';
		}
		else{
			$brand_color='#c52d2f';
		}
	}
	else{
		$brand_color='#c52d2f';
	}
?>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
@import "media-queries.css";

body {
	background: #fff;
	font-family: 'Open Sans', sans-serif;
}
p {
	font-size: 0.9rem;
}

h1,h2,h3,h4,h5 {
	color: <?php echo $brand_color; ?> !important;
	font-family: 'Open Sans', sans-serif;
}

/* Navbar */
.nav-wrapper{
	background: #333;
}
	.nav-wrapper nav {
		width: 1170px;
		margin: 0 auto;
	}
		.nav-wrapper nav ul li{
			margin-right: 20px;
		}
		.nav-wrapper nav ul li:last-child{
			margin-right: 0px;
		}
			.nav-wrapper nav ul li a{
				/*padding: 0 30px !important;*/
				color: <?php echo $brand_color; ?> !important;
			}
			.nav-wrapper nav.expanded ul li:last-child,
			.nav-wrapper nav li.menu-icon {
				margin-right: 20px !important;
			}
				.nav-wrapper nav ul li.menu-icon a{
					padding: 0 23px !important;
				}
				.top-bar.expanded ul.right li a {
					padding: 10px 30px !important;
				}
			.nav-wrapper nav ul li.current-menu-item a{
				background: <?php echo $brand_color; ?> !important;
				color: #fff !important;
			}
			.nav-wrapper nav ul li a:hover{
				background: <?php echo $brand_color; ?> !important;
				color: #fff !important;
			}
			.nav-wrapper nav ul li ul.dropdown {
				/*padding-top: 20px;*/
			}
			.nav-wrapper.fixed nav ul li ul.dropdown {
				padding-top: 0;
			}
				.nav-wrapper nav ul li ul.dropdown a {
					/*border-top: 1px solid <?php echo $brand_color; ?>;*/
				}
	.nav-wrapper.fixed {
		padding: 0;
	}
	<?php /*if(is_user_logged_in()){ ?>
		.nav-wrapper.fixed {
			margin-top: 32px;
		}
	<?php }*/ ?>
		.nav-wrapper nav ul.right{
			margin-right: 2.5%;
		}

	.top-bar,
	.top-bar li,
	.top-bar li a {
		background: #333 !important;
	}
	.title-area .name h1 a {
		color: #fff !important;
		font-size: 20px !important;
	}	
		.title-area .name h1 a:hover {
			background: none !important;
		}
.sub-menu{
	display: none;
}

.sub-menu .default:hover, .sub-menu .default a:hover{
	background: #c52d2f !important;
}
.sub-menu .green:hover, .sub-menu .green a:hover{
	background: #1abc9c !important;
}
.sub-menu .orange:hover, .sub-menu .orange a:hover{
	background: #FFA500 !important;
}
.sub-menu .purple:hover, .sub-menu .purple a:hover{
	background: #A378C4 !important;
}

/*Content Container*/
#content-container {
	max-width: 1170px;
	margin: 0 auto;
}
	#content-container .row{
		max-width: 100%;
	}
.button, .button:hover, .button:focus {
	background: <?php echo $brand_color; ?>;
}

/* Home Page */
.content-wrapper {
	margin-top: 30px;
}
.latest-posts,
.sidebar {
	text-align: center;
}
	.latest-posts img,
	.sidebar img {
		margin-top: 10px
	}
	.sidebar h4,.latest-posts h4{
		/*text-transform: uppercase;*/
	}
	.latest-posts .excerpt-wrapper,
	.sidebar .excerpt-wrapper{
		border: 1px solid #ddd;
	    margin-top: 10px;
	    padding: 20px 20px 0 20px;
	    text-align: left;
	    background: #fff;
	}
		.latest-posts .excerpt-wrapper .blog-meta,
		.sidebar .excerpt-wrapper .blog-meta {
			font-size: 14px;
		}
			.latest-posts .excerpt-wrapper .blog-meta .fa,
			.sidebar .excerpt-wrapper .blog-meta .fa{
				color: #000;
				margin-right: 5px;
			}
				.latest-posts .excerpt-wrapper .blog-meta .fa:first-child,
				.sidebar .excerpt-wrapper .blog-meta .fa:first-child{
					margin-left: 0px;
				}
			.latest-posts .excerpt-wrapper .blog-meta a,
			.sidebar .excerpt-wrapper .blog-meta a{
				color: #000;
				color: <?php echo $brand_color; ?>;
			}
				.latest-posts .excerpt-wrapper .blog-meta a:hover,
				.sidebar .excerpt-wrapper .blog-meta a:hover{
					color: <?php echo $brand_color; ?>;
				}
		.latest-posts .group-by-posts{
			margin-top: 15px;
		}
			.latest-posts .group-by-posts a:hover{
				color: <?php echo $brand_color; ?>;
			}
		.latest-posts .excerpt-wrapper h5,
		.sidebar .excerpt-wrapper h5{
			padding-bottom: 10px;
			/*text-transform: uppercase;*/
			border-bottom: 1px solid #eee;
		}
		.latest-posts .post-brief,
		.sidebar .post-brief{
			margin-top: 10px;
			border-bottom: 1px solid #eee;
			padding-bottom: 10px;
		}
		.latest-posts .action-block,
		.sidebar .action-block{
			margin-top: 20px;
			text-align: right;
		}
			.latest-posts .action-block a.button,
			.sidebar .action-block a.button{
				background: <?php echo $brand_color; ?>;
			}
			.latest-posts .action-block .left a,
			.sidebar .action-block .left a{
				margin-right: 10px;
				color: <?php echo $brand_color; ?>;
				font-size: 23px;
			}

/* Author box */
.author-wrapper {
	text-align: center;
	padding: 20px;
	border: 1px solid #ddd;
	padding-bottom: 0;
	margin-top: 10px;
}
	.author-wrapper img{
		width: 150px;
		border-radius: 50%;
		margin-top: 10px;
	}
	.author-wrapper h5{
		/*text-transform: uppercase;*/
		color: <?php echo $brand_color; ?>;
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
	}
	.author-wrapper .author-desgination{
		margin-top: 20px;
		color: #000;
	}
		.author-wrapper .author-desgination .author-name{
			/*text-transform: uppercase;*/
			color: <?php echo $brand_color; ?>;
		}
	.author-wrapper .author-link {
		margin-top: 20px;
	}

/* Footer */
#footer{
	margin-top: 40px;
	padding: 30px 0;
	background: #333;
	color: #fff;
	text-align: center;
}
	#footer .row{
		max-width: 100%;
	}
	.footer-wrapper{
		max-width: 1170px;
		margin: 0 auto;
	}
		.footer-wrapper .social-icons {
			font-size: 30px;
		}
			.footer-wrapper .social-icons a{
				color: #fff;
			}
				.footer-wrapper .social-icons a:hover{
					color: <?php echo $brand_color; ?>;
				}
				/*.footer-wrapper .social-icons a:hover .fa-facebook{
					color: #3a5795;
				}
				.footer-wrapper .social-icons a:hover .fa-twitter{
					color: #55acee;
				}
				.footer-wrapper .social-icons a:hover .fa-google-plus{
					color: #dc4a38;
				}
				.footer-wrapper .social-icons a:hover .fa-youtube{
					color: #cc181e;
				}*/
			.footer-wrapper .social-icons .fa{
				padding: 0 10px;
			}
		.footer-wrapper h3{
			/*text-transform: uppercase;*/
		}
		.footer-wrapper .copyrights-wrapper,
		.footer-wrapper .credits {
			margin-top: 20px;
		}
		.footer-wrapper .copyrights-wrapper{
			font-size: 14px;
		}
		.footer-wrapper .credits {
			font-size: 12px;
			color: #777;
		}

/* Slider */
.page-slider .row {
	min-height: 400px;
	text-align: center;
	padding-top: 1.7%;
	color: #fff;
}
	.page-slider div {
		text-align: center;
	}
		.page-slider div.columns:last-child{
			background: rgba(7,7,7,0.3);
    		padding-top: 3%;
		}
		.page-slider div h2{
			color: #fff !important;
			/*text-transform: uppercase;*/
			padding-bottom: 10px;
			border-bottom: 1px solid #fff;
		}


/* Single Page */
.featured-img {
	margin-top: 10px;
}
.blog-post h4{
	/*text-transform: uppercase;*/
	margin: 10px 0;
	padding-bottom: 10px;
	border-bottom: 1px solid #eee;
}
	.blog-post .blog-content{
		margin-top: 10px;
	}
	.blog-post .blog-meta {
		font-size: 14px;
	}
		.blog-post .blog-meta .fa{
			color: #000;
			margin-right: 5px;
		}
			.blog-post .blog-meta .fa:first-child{
				margin-left: 0px;
			}
		.blog-post .blog-meta a{
			color: #000;
			color: <?php echo $brand_color; ?>;
		}
			.blog-post .blog-meta a:hover{
				color: <?php echo $brand_color; ?>;
			}
	.blog-post .blog-author-details{
		border: 1px solid #ddd;
		padding: 20px;
		padding-top: 10px;
		margin-top: 10px;
	}
		.blog-post .blog-author-details img{
			width: 150px;
			border-radius: 50%;
		}
		.blog-post .blog-author-details h5{
			/*text-transform: uppercase;*/
			padding-bottom: 10px;
			border-bottom: 1px solid #eee;
		}
			
		.blog-post .blog-author-details .author-name {
			/*text-transform: uppercase;*/
			color: <?php echo $brand_color; ?>;
		}
			.blog-post .blog-author-details .author-name a{
				color: <?php echo $brand_color; ?>;
				font-weight: 600;
			}

		.blog-post .blog-author-details .author-link .fa{
			color: <?php echo $brand_color; ?>;
	    	font-size: 23px;
	    	margin-right: 10px;
	    	margin-top: 10px;
	    	text-align: center;
	    }
	    .blog-post .blog-author-details .author-img {
	    	text-align: center;
	    }
	    .blog-post .blog-author-details .author-bio {
	    	margin-top: 20px;
	    }
	.blog-post .share-post {
		margin-bottom: 20px;
	}
		.blog-post .share-post span {
			/*text-transform: uppercase;*/
			color: <?php echo $brand_color; ?>;
		}
			.blog-post .share-post .fa {
				margin-right: 10px;
				font-size: 20px;
				color: <?php echo $brand_color; ?>;
			}

.post-categories-wrapper,
.recent-posts-wrapper {
	text-align: left;
	border: 1px solid #ddd;
	padding: 20px;
	margin-top: 10px;
}
	.post-categories-wrapper h5,
	.recent-posts-wrapper h5{
		/*text-transform: uppercase;*/
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
	}
	.post-categories-wrapper ul li{
		list-style-type: none;
		margin-left: -15px;
		margin-top: 10px;
	}
		.post-categories-wrapper ul li a:hover{
			color: <?php echo $brand_color; ?>;
		}

	.recent-posts-wrapper .recent-post{
		margin-top: 10px;
	}
		.recent-posts-wrapper .recent-post a:hover{
			color: <?php echo $brand_color; ?>;
		}

/* Video */
#videoModal {
	width: 50%;
}
.video-post{
	border: 1px solid #ddd;
	text-align: center;
	padding: 10px;
	margin-top: 10px;
}
	.video-post a[data-reveal-id="videoModal"]{
		position: relative;
	}
	.video-post h5{
		padding: 10px 0;
		border-top: 1px solid #eee;
		border-bottom: 1px solid #eee;
	}
	.video-post .social-icons{
		font-size: 20px;
	}
		.video-post .social-icons .fa{
			color: <?php echo $brand_color; ?>;
			margin-right: 10px;
		}

		.video-post .play-button{
		    left: 40%;
		    position: absolute;
		    top: -18%;
		}
.video-post.excerpt-wrapper h5{
	border-top: 0;
	padding-top: 0;
}
	.video-post.excerpt-wrapper .post-brief{
		text-align: center;
	}

/* General Page */
.general-page .share-post {
		margin-bottom: 20px;
	}
		.general-page .share-post span {
			/*text-transform: uppercase;*/
			color: <?php echo $brand_color; ?>;
		}
			.general-page .share-post .fa {
				margin-right: 10px;
				font-size: 20px;
				color: <?php echo $brand_color; ?>;
			}
/* Author Page */
.author-full-bio{
	margin-top: 10px;
	color: <?php echo $brand_color; ?>;
}
	.author-full-bio a{
		color: <?php echo $brand_color; ?>;
	}
	.author-full-bio .author-contacts h3{
		/*text-transform: uppercase;*/
	}
	.author-full-bio .author-pic{
		text-align: center;
	}
		.author-full-bio .author-pic img{
			width: 200px;
			border-radius: 50%;
		}
	.author-full-bio .contact-links a{
		margin-right: 20px;
		font-size: 23px;
	}
	.author-full-bio .download-resume,
	.author-full-bio .contact-links{
		margin-top: 2%;
	}
		.author-full-bio .download-resume .fa,.author-full-bio .download-resume a{
			font-size: 15px;
		}
	.author-full-bio .author-description {
		color: #000;
	}

	.author-full-bio .profile-info{
		/*margin-top: 30px;*/
		color: #000;
	}
		.author-full-bio .profile-info .accordion-navigation > a,
		.author-full-bio .profile-info .accordion-navigation > a:hover{
			background: #ddd;
			color: #000;
		}
			.author-full-bio .profile-info .accordion-navigation a .fa{
				font-size: 25px;
				vertical-align: middle;
			}
		.author-full-bio .profile-info .accordion-navigation.active > a,
		.author-full-bio .profile-info .accordion-navigation.active > a:hover{
			background: <?php echo $brand_color; ?>;
			color: #fff;
		}
	.author-full-bio .button{
		color: #fff;
	}
		.author-full-bio h4{
			margin-top: 30px;
			padding-bottom: 10px;
			border-bottom: 1px solid #eee;
    		text-align: left;
		}

	.author-full-bio .latest-posts{
		color: #000;
	}

/* Comments */
h3#comments{
	font-size: 21px;
    margin-top: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}
ol.commentlist{
	margin-left: 0;
}
	ol.commentlist a{
		color: <?php echo $brand_color; ?>;
	}
	ol.commentlist li{
		list-style-type: none;
	}
	ol.commentlist .comment-metadata .edit-link{
		float: right;
	}
	ol.commentlist .vcard{
		border: 0;
		padding: 0;
		margin: 0;
		margin-bottom: 10px;
		padding-bottom: 10px;
		border-bottom: 1px solid #ddd;
		display: block;
	}
	ol.commentlist .comment-body{
		border: 1px solid #ddd;
		padding: 2%;
		margin-top: 10px;
	}
		ol.commentlist .comment-body .comment-metadata time{
			font-size: 13px;
			vertical-align: top;
		}
		ol.commentlist .comment-body .comment-content p{
			margin: 10px 0;
		}

#respond a{
	color: <?php echo $brand_color; ?>;
}
	#respond h3{
		/*text-transform: uppercase;*/
		border-bottom: 1px solid #eee;
		padding-bottom: 10px;
	}
	#respond form#commentform input#submit{
		padding: 0.875rem 1.75rem 0.9375rem 1.75rem;
		background: <?php echo $brand_color; ?>;
		font-size: 0.8125rem;
		border: 0;
		color: #fff;
	}
	form#commentform label small{
		font-size: 0.9rem !important;
	}

/* WP PageNavi */
.wp-pagenavi{
	padding-top: 30px;
}
	.wp-pagenavi a{
		color: <?php echo $brand_color; ?>;
	}
	.wp-pagenavi a,.wp-pagenavi span{
		padding: 1% 2% !important;
	}
	.wp-pagenavi span.current{
		border: 1px solid <?php echo $brand_color; ?>;
	    background-color: <?php echo $brand_color; ?>;
	    color: #fff;
	}

/* Newsletter Widget */
.newsletter-form{
	padding: 20px 15px 0 15px;
	margin-top: 10px;
	border: 1px solid #ddd;
}
	.newsletter-form h5{
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
		/*text-transform: uppercase;*/
		margin-bottom: 10px;
		text-align: left;
	}
	.newsletter-form .button{
		padding: 0;
		border: 0;
	}

/* Categories Widget Tweeks */
.sidebar h2{
	font-size: 1.125rem;
	/*text-transform: uppercase;*/
	text-align: left;
	padding: 20px 15px 0 20px;
	border-bottom: 1px solid #eee;
}
	.sidebar li{
		text-align: left;
		list-style-type: none;
		padding: 0px 15px 0 20px;
	}

/* Owl Carousal */
#slider {
    position: relative;
}

.owl-wrapper h2.sample{
   position: absolute;
   top: 40%;
   left: 0;
   text-align: center;
   color: #ffffff !important;
   background: rgba(24,24,24,0.5);
   padding-top: 2%;
   font-size: 30px;
   width: 90%;
   margin-left: 5%;
}
	.owl-wrapper h2.sample p{
		font-size: 30px;
	}
	.owl-wrapper h2.sample a{
	   color: <?php echo $brand_color; ?> !important;
	}
.owl-wrapper .text1{
	text-align: center;
}

/* Search Widget */
.search-form{
	padding: 20px 15px 0 15px;
	margin-top: 10px;
	border: 1px solid #ddd;
}
	.search-form h5{
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
		/*text-transform: uppercase;*/
		margin-bottom: 10px;
		text-align: left;
	}
	.search-form .button{
		padding: 0;
		border: 0;
	}

/* Search Widget */
.cat-wrapper{
	padding: 20px 15px 0 15px;
	margin-top: 10px;
	border: 1px solid #ddd;
}
	.cat-wrapper h5{
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
		/*text-transform: uppercase;*/
		margin-bottom: 10px;
		text-align: left;
	}
	.cat-wrapper li{
		list-style-type: none;
		margin-top: 10px;
	}
	.cat-wrapper ul{
		margin-left: 0;
	}

/* Search Widget */
.recent-posts-wrapper{
	padding: 20px 15px 0 15px;
	margin-top: 10px;
	border: 1px solid #ddd;
}
	.recent-posts-wrapper h5{
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
		/*text-transform: uppercase;*/
		margin-bottom: 10px;
		text-align: left;
	}
	.recent-posts-wrapper li{
		list-style-type: none;
		margin-top: 10px;
		padding-left: 0;
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
	}
		.recent-posts-wrapper li:last-child{
			border-bottom: 0;
			padding-bottom: 0;
		}
	.recent-posts-wrapper ul{
		margin-left: 0;
	}

/* Tag Cloud Widget */
.tag-cloud-wrapper{
	padding: 20px 15px;
	margin-top: 10px;
	border: 1px solid #ddd;
}
	.tag-cloud-wrapper h5{
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
		/*text-transform: uppercase;*/
		margin-bottom: 10px;
		text-align: left;
	}

/* Tag Cloud Widget */
.ga-wrapper{
	padding: 20px 15px;
	margin-top: 10px;
	border: 1px solid #ddd;
}
	.ga-wrapper h5{
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
		/*text-transform: uppercase;*/
		margin-bottom: 10px;
		text-align: left;
	}
		.ga-wrapper h5 img{
			max-width: 65px;
			margin: 0;
		}
	.ga-wrapper ul{
		margin-left: 0;
	}
		.ga-wrapper ul li{
			padding: 0;
		}
		.ga-wrapper ul li.total-ga-hits{
			margin-top: 10px;
			padding-top: 20px;
			border-top: 1px solid #eee;
			font-weight: 800;
		}