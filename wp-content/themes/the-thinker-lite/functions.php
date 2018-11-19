<?php
/**
 * thinker functions and definitions
 *
 * @package The Thinker Lite
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 938; /* pixels */
/**
 * Adjusts content_width value for full-width page and grid page.
 */
function thinker_content_width() {
	global $content_width;
	if ( is_page_template( 'page-templates/full-width-page.php' ))
		$content_width = 1470;
}
add_action( 'template_redirect', 'thinker_content_width' );

if ( ! function_exists( 'thinker_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function thinker_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on test, use a find and replace
	 * to change 'test' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'the-thinker-lite', get_template_directory() . '/languages' );
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/**
	 * Enable support for Post Thumbnails on posts and pages
	 */
	add_theme_support( 'post-thumbnails' );
	// This theme allows users to set a custom background
	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'test_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'the-thinker-lite' ),
		'social' => esc_html__( 'Social', 'the-thinker-lite' ),
	) );
	/* Add support for editor styles */
	add_editor_style( array( 'editor-style.css', thinker_fonts_url() ) );
	/*
	 * Enable support for custom logo.
	 *
	 *  @since The Thinker Lite 1.1.1
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 9999,
		'width'       => 9999,
		'flex-height' => true,
	) );
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery' ) );
	
	// Adding support for core block visual styles.
	add_theme_support( 'wp-block-styles' );
	
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
		
	// Add support for custom color scheme.
	add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Black', 'the-thinker-lite' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
	) );
}
endif; // thinker_setup
add_action( 'after_setup_theme', 'thinker_setup' );
/**
 * Register widgetized area and update sidebar with default widgets
 */
function thinker_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'the-thinker-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'the-thinker-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'thinker_widgets_init' );
/**
 * Count the number of widgets and create a class name.
 */
function thinker_widget_counter( $sidebar_id ) {
	$the_sidebars = wp_get_sidebars_widgets();
	if ( ! isset( $the_sidebars[$sidebar_id] ) )
		$count = 0;
	else
		$count = count( $the_sidebars[$sidebar_id] );
	switch ( $count ) {
		case '1':
			$class = 'one-widget';
			break;
		case '2':
			$class = 'two-widgets';
			break;
		case '3':
			$class = 'three-widgets';
			break;
		default :
			$class = 'more-than-three-widgets';
	}
	echo $class;
}
/**
 * Register Libre Baskerville font for thinker.
 *
 * @return string
 */
function thinker_fonts_url() {
	$thinker_display_font_url = '';
	/* translators: If there are characters in your language that are not supported
	 * by Libre Baskerville, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== esc_html_x( 'on', 'Libre Baskerville font: on or off', 'the-thinker-lite' ) ) {
		$subsets = 'latin,latin-ext';
		/* translators: To add an additional Libre Baskerville character subset specific to your language, translate this to 'cyrillic'. Do not translate into your own language. */
		$subset = esc_html_x( 'no-subset', 'Libre Baskerville font: add new subset (cyrillic)', 'the-thinker-lite' );
		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic-ext,cyrillic';
		}
		$query_args = array(
			'family' => urlencode( 'Libre Baskerville:400,700,400italic,700italic' ),
			'subset' => urlencode( $subsets ),
		);
		$thinker_display_font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}
	return $thinker_display_font_url;
}
/**
 * Enqueue scripts and styles
 */
function thinker_scripts() {
	wp_enqueue_style( 'thinker-fonts', thinker_fonts_url(), array(), null );
	wp_enqueue_style( 'thinker-style', get_stylesheet_uri() );
	wp_enqueue_script( 'thinker-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'thinker-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	if ( is_singular() && wp_attachment_is_image() )
		wp_enqueue_script( 'thinker-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
}
add_action( 'wp_enqueue_scripts', 'thinker_scripts' );

/**
 * Enqueue theme styles within Gutenberg.
 */
function thinker_gutenberg_styles() {

	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'thinker-gutenberg', get_theme_file_uri( '/editor.css' ), false, '1.1.1', 'all' );

	// Add custom fonts to Gutenberg.
	wp_enqueue_style( 'thinker-fonts', thinker_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'thinker_gutenberg_styles' );

if (!function_exists('thinker_admin_scripts')) {
	function thinker_admin_scripts($hook) {
			wp_enqueue_style('thinker-admin', get_template_directory_uri() . '/admin/admin.css');
	}
}
add_action('admin_enqueue_scripts', 'thinker_admin_scripts');
/**
 * Appends post title to Aside and Quote posts
 *
 * @param string $content
 * @return string
 */
function thinker_conditional_title( $content ) {
	if ( has_post_format( 'aside' ) || has_post_format( 'quote' ) ) {
		if ( ! is_singular() )
			$content .= the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>', false );
		else
			$content .= the_title( '<h1 class="entry-title">', '</h1>', false );
	}
	return $content;
}
add_filter( 'the_content', 'thinker_conditional_title', 0 );
/**
 * Returns a "Read More" link for excerpts
 *
 */
function thinker_read_more_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '" class="excerpt-link">' . esc_html__( 'Read More', 'the-thinker-lite' ) . '</a>';
}
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and thinker_read_more_link().
 */
function thinker_auto_excerpt_more( $more ) {
	return ' &hellip;' . thinker_read_more_link();
}
add_filter( 'excerpt_more', 'thinker_auto_excerpt_more' );
/***** Include Admin *****/

if (is_admin()) {
	require_once('admin/admin.php');
}
/**
 * Theme Update Script
 *
 * Runs if version number saved in theme_mod "version" doesn't match current theme version.
 */
function thinker_update_check() {
	
// Return if update has already been run
	if ( -1 == get_theme_mod( 'custom_logo', -1 ) ) {
		return;
	}
	
	// If we're not on 3.5 yet, exit now
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	}
	// If a logo has been set previously, update to use logo feature introduced in WordPress 4.5
	if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'thinker_logo', false ) ) {
		// Since previous logo was stored a URL, convert it to an attachment ID
		$logo = attachment_url_to_postid( get_theme_mod( 'thinker_logo' ) );
		if ( is_int( $logo ) ) {
			set_theme_mod( 'custom_logo', attachment_url_to_postid( get_theme_mod( 'thinker_logo' ) ) );
		}
		remove_theme_mod( 'thinker_logo' );
	}
}
add_action( 'after_setup_theme', 'thinker_update_check' );
/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );
/**
 * Custom template tags for this theme.
 */
require( get_template_directory() . '/inc/template-tags.php' );
/**
 * Custom functions that act independently of the theme templates
 */
require( get_template_directory() . '/inc/extras.php' );
/**
 * Customizer additions
 */
require( get_template_directory() . '/inc/customizer.php' );
/**
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );