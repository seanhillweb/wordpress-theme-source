<?php

// =============================================================================
// Custom Post Types
// =============================================================================

// Flush your rewrite rules
function theme_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'theme_flush_rewrite_rules' );

function theme_custom_post_type() {

	// Register the custom post type (http://codex.wordpress.org/Function_Reference/register_post_type)
	register_post_type( 'custom_type',

		// Array with all the options for the custom post type
		array( 'labels' => array(
			'name'					=> __( 'Custom Types' ), // Name of the custom post type group
			'singular_name'			=> __( 'Custom Post' ), // Name of the custom post type singular
			'all_items'				=> __( 'All Custom Posts' ),
			'add_new' 				=> __( 'Add New' ),
			'add_new_item' 			=> __( 'Add New Custom Type' ),
			'edit'					=> __( 'Edit' ),
			'edit_item'				=> __( 'Edit Post Types' ),
			'new_item'				=> __( 'New Post Type' ),
			'view_item'				=> __( 'View Post Type' ),
			'search_items'			=> __( 'Search Post Type' ),
			'not_found'				=> __( 'Nothing found in the Database.' ),
			'not_found_in_trash'	=> __( 'Nothing found in Trash' ),
			'parent_item_colon' 	=> ''
			),

			'description' 			=> __( 'This is the example custom post type' ), // Custom post type description
			'public' 				=> true,
			'publicly_queryable' 	=> true,
			'exclude_from_search' 	=> false,
			'show_ui' 				=> true,
			'query_var' 			=> true,
			'menu_position' 		=> 5, // The order the custom post type appears on the admin menu
			// 'menu_icon' 			=> get_stylesheet_directory_uri() . '/assets/images/custom-post-icon.png',
			'rewrite'				=> array( 'slug' => 'custom_type', 'with_front' => false ), // You may specify its url slug
			'has_archive' 			=> 'custom_type', // You mary rename the slug here
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,

			// Enable post editor support
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'sticky'
			)
		)
	);

	// This adds your post categories to your custom post type
	register_taxonomy_for_object_type( 'category', 'custom_type' );

	// This adds your post tags to your custom post type
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );

}

add_action( 'init', 'theme_custom_post_type');

// For more information on taxonomies: http://codex.wordpress.org/Function_Reference/register_taxonomy

// Add custom categories (these act like categories)
register_taxonomy( 'theme_custom_cat',

	array('custom_type'), // If you changed the name of register_post_type( 'custom_type', then you have to change this

	array('hierarchical' => true, // If true, it acts like categories
		'labels' => array(
			'name' 					=> __( 'Custom Categories' ),
			'singular_name'			=> __( 'Custom Category' ),
			'search_items'			=> __( 'Search Custom Categories' ),
			'all_items'				=> __( 'All Custom Categories' ),
			'parent_item'			=> __( 'Parent Custom Category' ),
			'parent_item_colon'		=> __( 'Parent Custom Category:' ),
			'edit_item' 			=> __( 'Edit Custom Category' ),
			'update_item' 			=> __( 'Update Custom Category' ),
			'add_new_item' 			=> __( 'Add New Custom Category' ),
			'new_item_name' 		=> __( 'New Custom Category Name' )
		),

		'show_admin_column' 		=> true,
		'show_ui' 					=> true,
		'query_var' 				=> true,
		'rewrite' 					=> array( 'slug' => 'custom-slug' ),
	)
);

// Add custom tags (these act like tags)
register_taxonomy( 'theme_custom_tag',

	array('custom_type'), // If you changed the name of register_post_type( 'custom_type', then you have to change this

	array('hierarchical' => false, // If false, it acts like tags
		'labels' => array(
			'name' 					=> __( 'Custom Tags' ),
			'singular_name' 		=> __( 'Custom Tag' ),
			'search_items' 			=> __( 'Search Custom Tags' ),
			'all_items' 			=> __( 'All Custom Tags' ),
			'parent_item' 			=> __( 'Parent Custom Tag' ),
			'parent_item_colon' 	=> __( 'Parent Custom Tag:' ),
			'edit_item' 			=> __( 'Edit Custom Tag' ),
			'update_item' 			=> __( 'Update Custom Tag' ),
			'add_new_item' 			=> __( 'Add New Custom Tag' ),
			'new_item_name' 		=> __( 'New Custom Tag Name' )
		),

		'show_admin_column' 		=> true,
		'show_ui' 					=> true,
		'query_var' 				=> true,
	)
);

?>