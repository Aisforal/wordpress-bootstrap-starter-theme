<?php  

	function add_theme_scripts() {
	  wp_enqueue_style( 'my-style', get_template_directory_uri() . '/assets/css/style.css');
	  
	  wp_enqueue_script( 'script', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.slim.min.js', array ( 'jquery' ), 1.1, true);
	  wp_enqueue_script( 'bs-script', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array ( ), 1.1, true);
	}
	add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

	function admin_bar(){

		if(is_user_logged_in()){
			add_filter( 'show_admin_bar', '__return_true' , 1000 );
		}
		}
		add_action('init', 'admin_bar' );

	function bbwp_theme_support() {

		//include title tag in wp_head so can be set in admin
		add_theme_support( 'title-tag' );

		// Set content-width.
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 580;
		}

		//add support for featured images
		add_theme_support( 'post-thumbnails' );

		// Set post thumbnail size.
		set_post_thumbnail_size( 1200, 9999 );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
				'navigation-widgets',
			)
		);

	}
	add_action( 'after_setup_theme', 'bbwp_theme_support' );

	//add widgets
	add_action( 'widgets_init', 'bbwp_register_sidebars' );
	function bbwp_register_sidebars() {
		/* Register the 'primary' sidebar. */
		register_sidebar(
			array(
				'id'            => 'primary',
				'name'          => __( 'Primary Sidebar' ),
				'description'   => __( 'A short description of the sidebar.' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		/* Repeat register_sidebar() code for additional sidebars. */
	}

	// declutter wp_head, ref:https://blacksaildivision.com/how-to-clean-up-wordpress-head-tag
	//remove dns prefetch
	remove_action( 'wp_head', 'wp_resource_hints', 2 );
	
	//Remove emoji script and styles from <head>
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');

	

?>


