<?php

// =============================================================================
// Head Tag Cleanup
// =============================================================================

function remove_head_info() {

	// Remove Really Simple Discovery link
	remove_action('wp_head', 'rsd_link');

	// Remove Wordpress Version
	// Warning - this info is also available in the readme.html file in your root directory - delete this file!
	remove_action('wp_head', 'wp_generator');

	// Remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
	// Removes all extra rss feed links
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);

	// Remove link to index page
	// Remove wlwmanifest.xml (needed to support Windows Live Writer)
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');

	// Remove random post link
	// Remove parent post link
	// Remove the next and previous post links
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

}

add_action( 'init', 'remove_head_info' );


// =============================================================================
// Disable Emojis
// =============================================================================

function disable_wp_emojicons() {

	// All actions related to Emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// Filter to remove TinyMCE Emojis
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  	if ( is_array( $plugins ) ) {
  		return array_diff( $plugins, array( 'wpemoji' ) );
  	} else {
  		return array();
  	}
}


// =============================================================================
// Title Tag Cleanup
// =============================================================================

// More info: https://tommcfarlin.com/filter-wp-title/

function theme_title( $title, $sep ) {

	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page
	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( __( 'Page %s' ), max( $paged, $page ) ) . " $sep $title";
	}

	return $title;
}

add_filter( 'wp_title', 'theme_title', 10, 2 );


// =============================================================================
// Enqueue Scripts
// =============================================================================

function theme_scripts() {

	// Wordpress Default Stylesheet Location
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), null, 'all' );
	// wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), null, 'all' );

	// Additional Stylesheets
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), null, 'all' );

	// JQuery and Javascript
	wp_enqueue_script( 'jquery-2.1.4.min.js', get_template_directory_uri() . '/assets/js/libs/jquery-2.1.4.min.js', array(), null, false );
	wp_enqueue_script( 'scripts.js', get_template_directory_uri() . '/assets/js/scripts.js', array(), null, false );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );


// =============================================================================
// Register Navigation
// =============================================================================

// Single
function register_custom_menu() {
	register_nav_menu('primary-navigation',__( 'Primary Navigation' ));
}

add_action( 'init', 'register_custom_menu' );

// Multiple
// function register_custom_menus() {
// register_nav_menus(
// array(
// 'primary-navigation' => __( 'Primary Navigation' ),
// 'extra-menu' => __( 'Extra Menu' )
// )
// );
// }
//
// add_action( 'init', 'register_custom_menus' );


// =============================================================================
// Register Sidebar
// =============================================================================

function register_custom_sidebars() {
	register_sidebar(array(
		'id'			=>	'primary-sidebar',
		'name'			=>	__( 'Primary Sidebar'),
		'description'	=>	__( 'The primary sidebar for pages and posts.'),
		'before_widget'	=>	'<div class="widget-%2$s">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h6 class="widget-title">',
		'after_title'	=>	'</h6>'
	));

	// register_sidebar(array(
	// 'id' => 'extra-sidebar',
	// 'name' => __( 'Extra Sidebar'),
	// 'description' => __( 'For pages that don't need the primary sidebar.'),
	// 'before_widget' => '<div class="widget-%2$s">',
	// 'after_widget' => '</div>',
	// 'before_title' => '<h4 class="widget-title">',
	// 'after_title' => '</h4>',
	// ));
}

add_action( 'widgets_init', 'register_custom_sidebars' );


// =============================================================================
// Register Theme Support
// =============================================================================

function register_theme_support() {

	// Wordpress Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Default Thumbnail Size
	set_post_thumbnail_size(125, 125, true);

	// Additional Thumbnail Sizes
	add_image_size( 'post-preview', 760, 428, true );
	add_image_size( 'post-image', 1280, 720, true );
	add_image_size( 'post-banner', 1920, 1080, true );

	// Post Formats
	add_theme_support( 'post-formats', array(
		'aside',
		'audio',
		'chat',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video'
	));

	// Enable support for HTML5 markup
	add_theme_support( 'html5', array(
		'comment-list',
		'comment-form',
		'search-form',
		'gallery',
		'caption'
	));
}

add_action( 'after_setup_theme', 'register_theme_support' );


// =============================================================================
// Image Cleanup
// =============================================================================

// Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling
function remove_img_ptags( $content ){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter( 'the_content', 'remove_img_ptags' );


// =============================================================================
// Includes
// =============================================================================

// Numberic Pagination
require get_template_directory() . '/includes/numeric-pagination.php';

// Previous Post Link
require get_template_directory() . '/includes/previous-next-post-pagination.php';

?>