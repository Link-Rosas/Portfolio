<?php

/**
 * Register Custom Post Type: Portfolio
 */
function ryancv_register_portfolio() {
	register_post_type( 'portfolio', array(
		'label' => esc_html__( 'Portfolio', 'ryancv-plugin' ),
		'description' => esc_html__( 'Portfolio Items', 'ryancv-plugin' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'has_archive'  => true,
		'rewrite' => array( 'slug' => 'portfolio-archive', 'with_front' => true ),
		'query_var' => true,
		'supports' => array( 'title','revisions','thumbnail','page-attributes','elementor' ),
		'taxonomies' => array( 'portfolio_categories','portfolio_tags' ),
		'menu_icon' => 'dashicons-images-alt2',
		'labels' => array(
			'name' => esc_html__( 'Portfolio', 'ryancv-plugin' ),
			'singular_name' => esc_html__( 'Portfolio', 'ryancv-plugin' ),
			'menu_name' => esc_html__( 'Portfolio', 'ryancv-plugin' ),
			'add_new' => esc_html__( 'Add Portfolio', 'ryancv-plugin' ),
			'add_new_item' => esc_html__( 'Add New Portfolio', 'ryancv-plugin' ),
			'edit' => esc_html__( 'Edit', 'ryancv-plugin' ),
			'edit_item' => esc_html__( 'Edit Portfolio', 'ryancv-plugin' ),
			'new_item' => esc_html__( 'New Portfolio', 'ryancv-plugin' ),
			'view' => esc_html__( 'View Portfolio', 'ryancv-plugin' ),
			'view_item' => esc_html__( 'View Portfolio', 'ryancv-plugin' ),
			'search_items' => esc_html__( 'Search Portfolio', 'ryancv-plugin' ),
			'not_found' => esc_html__( 'No Portfolio Found', 'ryancv-plugin' ),
			'not_found_in_trash' => esc_html__( 'No Portfolio Found in Trash', 'ryancv-plugin' ),
			'parent' => esc_html__( 'Parent Portfolio', 'ryancv-plugin' ),
		)
	));
}
add_action( 'init', 'ryancv_register_portfolio' );

function ryancv_register_portfolio_categories() {
	register_taxonomy( 'portfolio_categories', array (
	  0 => 'portfolio',
	),
	array( 'hierarchical' => true,
			'label' => 'Portfolio Categories',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'name'              => esc_html__( 'Portfolio Categories', 'ryancv-plugin' ),
				'singular_name'     => esc_html__( 'Portfolio Categories', 'ryancv-plugin' ),
				'search_items'      => esc_html__( 'Search Categories', 'ryancv-plugin' ),
				'all_items'         => esc_html__( 'All Categories', 'ryancv-plugin' ),
				'parent_item'       => esc_html__( 'Parent Category', 'ryancv-plugin' ),
				'parent_item_colon' => esc_html__( 'Parent Category:', 'ryancv-plugin' ),
				'edit_item'         => esc_html__( 'Edit Category', 'ryancv-plugin' ),
				'update_item'       => esc_html__( 'Update Category', 'ryancv-plugin' ),
				'add_new_item'      => esc_html__( 'Add New Category', 'ryancv-plugin' ),
				'new_item_name'     => esc_html__( 'New Category Name', 'ryancv-plugin' ),
				'menu_name'         => esc_html__( 'Categories', 'ryancv-plugin' ),
			)
		)
	);
}
add_action( 'init', 'ryancv_register_portfolio_categories' );

function ryancv_register_portfolio_tags() {
	register_taxonomy( 'portfolio_tags', array (
	  0 => 'portfolio',
	),
	array( 'hierarchical' => true,
			'label' => 'Portfolio Tags',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => array(
				'name'              => esc_html__( 'Portfolio Tags', 'ryancv-plugin' ),
				'singular_name'     => esc_html__( 'Portfolio Tags', 'ryancv-plugin' ),
				'search_items'      => esc_html__( 'Search Tags', 'ryancv-plugin' ),
				'all_items'         => esc_html__( 'All Tags', 'ryancv-plugin' ),
				'parent_item'       => esc_html__( 'Parent Tag', 'ryancv-plugin' ),
				'parent_item_colon' => esc_html__( 'Parent Tag:', 'ryancv-plugin' ),
				'edit_item'         => esc_html__( 'Edit Tag', 'ryancv-plugin' ),
				'update_item'       => esc_html__( 'Update Tag', 'ryancv-plugin' ),
				'add_new_item'      => esc_html__( 'Add New Tag', 'ryancv-plugin' ),
				'new_item_name'     => esc_html__( 'New Tag Name', 'ryancv-plugin' ),
				'menu_name'         => esc_html__( 'Tags', 'ryancv-plugin' ),
			)
		)
	);
}
add_action( 'init', 'ryancv_register_portfolio_tags' );