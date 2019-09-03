<?php
/**
 * BlueRex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BlueRex
 */
if ( ! function_exists( 'bluerex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bluerex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on BlueRex, use a find and replace
		 * to change 'bluerex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bluerex', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header_menu' => esc_html__( 'Header menu', 'bluerex' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bluerex_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 69,
			'width'       => 62,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bluerex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bluerex_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bluerex_content_width', 640 );
}
add_action( 'after_setup_theme', 'bluerex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bluerex_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left', 'bluerex' ),
		'id'            => 'sidebar-footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'bluerex' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right', 'bluerex' ),
		'id'            => 'sidebar-footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'bluerex' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Category Widget', 'bluerex' ),
		'id'            => 'sidebar-widget',
		'description'   => esc_html__( 'Add widgets here.', 'bluerex' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget widget-categories widget %2$s ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'bluerex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bluerex_scripts() {
	wp_enqueue_style( 'bluerex-style', get_stylesheet_uri() );
	wp_enqueue_style('bootstrap-style',  'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome5' , 'https://use.fontawesome.com/releases/v5.10.1/css/all.css');
	wp_enqueue_style('font-awesome5-1', 'https://use.fontawesome.com/releases/v5.10.1/css/v4-shims.css');
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat|Poppins&display=swap');
	wp_enqueue_style('baguette-box', get_template_directory_uri() . './assets/css/baguetteBox.min.css');
	wp_enqueue_style('style-style', get_template_directory_uri() . './assets/css/style.css');
	
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.js' , array(), '', true);
	wp_enqueue_script('jquery');
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' , array(), '', true);
	wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' , array(), '', true);
	wp_enqueue_script('baguette-js', 'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.0/baguetteBox.min.js' , array(), '', true);
	wp_enqueue_script('kit-awesome', 'https://kit.fontawesome.com/220e0d9d2a.js' , array(), '', true);
	wp_enqueue_script('youtubebtn' , get_template_directory_uri() . '/assets/js/youtubebtn.js', array(), '', true);
	
	
	wp_enqueue_script( 'bluerex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bluerex-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bluerex_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
//Custom code
function bluerex_debug($data){
	echo '<pre>' . print_r($data, 1) . '</pre>';
}
//Check backgroundImage
function bluerex_get_background($field, $cat=null, $cover=true){
	if( get_field($field, $cat) ){
		$add_style = $cover ? 'background-size: cover;' : '';
		return 'style="background: url(' . get_field($field, $cat) .  ') center no-repeat; ' . $add_style . ' "';
	}
	return null;
}
//Reviews
add_action('init', 'bluerex_reviews');
function bluerex_reviews(){
	register_post_type('reviews',array(
		'labels' =>array(
			'name' => 'Отзывы',
			'singular_name' => 'Отзыв',
			'add_new' =>__('Добавить новый отзыв','bluerex'),
			'add_new_item' =>__('Новый отзыв','bluerex'),
			'edit_item' =>__('Редактировать','bluerex'),
			'new_item' =>__('Новый отзыв','bluerex'),
			'view-item' =>__('Посмотреть','bluerex'),
			'menu_name' =>'Отзывы клиентов',
			'all_items' =>'Все отзывы',
		),
		'public' =>true,
		'supports'=> array('title','editor','thumbnail'),
		'menu_icon'=>'dashicons-universal-access',
		'show_in_rest'=>true,
	));
}

// Remove H2 pagination comment
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}
//Remove some category
// function exclude_category( $query ) {
// 	if ( $query->is_home)  {
// 		$query->set( 'category_not_in', array(-7,-8));
// 	}
// 	return $query;
//  }
//  add_filter( 'pre_get_posts', 'exclude_category' );
//  PHP
// function wpspec_excude_category( $query ) {
// 	if ( ! is_admin() && $query->is_main_query() ) {
// 		if ( $query->is_home() ) {
// 			$query->set( 'cat', '-6' ); // ID рубрики со знаком минус
// 		}
// 	}
// }

// add_action( 'pre_get_posts', 'wpspec_excude_category' );

function wpspec_excude_category( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( $query->is_home() ) {
			$query->set( 'cat', '-0, -5, -8' ); // ID рубрики со знаком минус
		}
	}
}
 
add_action( 'pre_get_posts', 'wpspec_excude_category' );