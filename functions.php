<?php
/**
	* Herschel Functions
	*
	* This functions file contains the the mainly used features of a WordPress theme
	* Uncomment or delete lines as needed
	*
 	* @package Herschel
	* @since Herschel 1.0
	*/

if ( ! function_exists( 'herschel_setup' ) ) :
	/**
	* Initial theme setup
	*
	* @since Herschel 1.0
	*/
	function herschel_setup() {

		//Set the content width based on the theme's design and stylesheet.
		if ( ! isset( $content_width ) ) $content_width = 1200;

		// Adds editor styles
		add_editor_style( str_replace( ',', '%2C', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,800italic,700italic,700,600italic,400italic,300italic,300' ) );
		add_editor_style();

		// Support for translation files
		load_theme_textdomain( 'herschel', get_template_directory() . '/languages' );

		// Enable support for Post Formats
		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		// Enables support for custom logo
		add_theme_support( 'custom-logo' );

		// Enable support for Post Thumbnails on posts, pages and more
		add_theme_support( 'post-thumbnails' );

		//Support for custom background settings
		add_theme_support( 'custom-background', array(
			'default-color'			 => '#ffffff',
			'default-image'			 => '',
		) );

		//Support for custom header settings
		add_theme_support( 'custom-header', array(
			'default-image'					=> '',
			'random-default'				=> false,
			'width'									=> 1200,
			'height'								=> 120,
			'flex-height'						=> false,
			'flex-width'						=> false,
			'header-text'						=> false,
			'uploads'								=> true,
		) );

		// Adds RSS feed in head
		add_theme_support( 'automatic-feed-links' );

		// Make core WordPress makup output valid HTML5
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// <title> tag provided by WordPress
		add_theme_support( 'title-tag' );

		// wp_nav_menu() setup
		register_nav_menus( array(
			'header' => __('Header Menu', 'herschel'),
			'footer' => __('Footer Menu', 'herschel')
		));
	}
endif;
add_action( 'after_setup_theme', 'herschel_setup' );

/**
	* Basic widget area structure
	*
	* @since Herschel 1.0
	*/
function herschel_widget_init(){
	register_sidebar( array(
		'name' 					=> __('Header', 'herschel'),
		'id' 						=> 'header-widget-area',
		'description'		=> __('Widget area in the header', 'herschel'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 					=> __('Above the content', 'herschel'),
		'id' 						=> 'content-above-widget-area',
		'description'		=> __('Widget area above the content', 'herschel'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 					=> __('Below the content', 'herschel'),
		'id' 						=> 'content-below-widget-area',
		'description'		=> __('Widget area below the content', 'herschel'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 					=> __('Sidebar', 'herschel'),
		'id' 						=> 'sidebar-widget-area',
		'description'		=> __('Widget area at the side of the content', 'herschel'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 					=> __('Footer (top)', 'herschel'),
		'id' 						=> 'footer-widget-area-one',
		'description'		=> __('Widget area at the top of the footer', 'herschel'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 					=> __('Footer (bottom)', 'herschel'),
		'id' 						=> 'footer-widget-area-two',
		'description'		=> __('Widget area at the bottom of the footer', 'herschel'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );
}
add_action( 'widgets_init', 'herschel_widget_init' );

/**
	* Custom "Read more" link on excerpts
	*
	* @since Herschel 1.0
	*/
function herschel_excerpt_read_more($more) {
	return '...';
}
add_filter('excerpt_more', 'herschel_excerpt_read_more');

/**
	* Scripts, Styles and fonts
	*
	* @since Herschel 1.3.0
	*/
function herschel_scripts(){
	// Enqueue the font Open Sans from google
	wp_enqueue_style( 'herschel-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,800italic,700italic,700,600italic,400italic,300italic,300', array(), null);

	// Enqueue Font Awesome (example icon set)
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/font-awesome/css/font-awesome.min.css', array(), '4.6.3');

	// Enqueue style.css from root theme folder
	wp_enqueue_style( 'herschel-style', get_stylesheet_uri() );

	// Enqueue theme JS and include jQuery
	wp_enqueue_script( 'herschel-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), wp_get_theme()->get('Version'), true );

	// Comment-reply script
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'herschel_scripts' );

/**
	* Add classes to body depending on custom changes and content
	*
	* @since Herschel 1.0
	*/
function herschel_body_classes( $classes ){
	// Adds a class of custom-background-image to sites with a custom background image.
	if( get_background_image() ){
		$classes[] = 'custom-background-image';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if( !is_active_sidebar( 'sidebar-widget-area' ) ){
		$classes[] = 'no-sidebar';
	}

	if( !herschel_any_social_icons() ){
		$classes[] = 'no-social-icons';
	}

	return $classes;
}
add_filter( 'body_class', 'herschel_body_classes' );

/**
	* Add classes to the main element depending on customized settings
	*
	* @since Herschel 1.0
	*/
function herschel_main_class(){
	echo 'class="'.esc_attr( 'layout-'.get_theme_mod('layout', 'wide') ).'"';

	return false;
}

/**
	* Add classes to posts depending on custom changes and content
	*
	* @since Herschel 1.3.0
	*/
function herschel_post_classes( $classes ) {
	// adds a class of loop-excerpt to flex excerpt and post_thumbnail
	if( get_theme_mod( 'layout', 'wide' ) != 'full' && !is_singular() ){
		$classes[] =  'archive-entry';
	}

	return $classes;
}
add_filter( 'post_class', 'herschel_post_classes' );

/**
	* Customized CSS options
	*
	* @since Herschel 1.4.1
	*/
function herschel_customize_styles(){
	$options = [
		'#'.esc_html( get_background_color() ),
		esc_html( get_theme_mod('color_scheme', '#e00000') ),
		esc_html( get_theme_mod('text_color', '#000000') ),
		esc_url( get_header_image() )
	];

	$css = '
		body{
			background: %1$s;
		}

		body,
		a i,
		.entry-title a,
		.entry-meta a,
		.entry-meta i,
		.herschel-breadcrumbs,
		.herschel-breadcrumbs a,
		.widget-container a,
		.widget-title{
			color: %3$s;
		}

		.pagination > a:hover{
			color: %3$s !important;
		}

		a,
		a:hover,
		#header-widget-area a:hover,
		#herschel-social-media-links a i:hover,
		#scroll-to-top i,
		#site-footer a:hover{
			color: %2$s;
		}

		.widget_calendar a{
			color: %2$s !important;
		}

		#header-menu-container,
		input[type="submit"],
		input[type="reset"],
		button,
		.comment-reply-link,
		.button,
		.page-numbers:not(.current):not(.dots),
		.pagination > a{
			background-color: %2$s ;
		}

		.page-numbers:not(.dots),
		.pagination > span:not(.page-links-title),
		.pagination > a,
		#scroll-to-top{
			border-color: %2$s;
		}
	';

	if( has_header_image() ){
		$css .= '
			#site-header{
				background: url( %4$s );
				background-size: cover;
			}
		';
	}

	wp_add_inline_style( 'herschel-style', vsprintf($css, $options) );
}
add_action( 'wp_enqueue_scripts', 'herschel_customize_styles' );


/**
	* Included files
	* - Theme functions
	* - wp-customize
	*
	* @since Herschel 1.0
	*/
require get_template_directory() . '/inc/theme_functions.php';
require get_template_directory() . '/inc/customize.php';

?>