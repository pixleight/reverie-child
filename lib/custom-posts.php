<?php
add_action('init', 'ksc_register_custom_posts');
function ksc_register_custom_posts() {
	register_post_type('front_page', array(
		'label' => 'Front Page Posts',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'front_page', 'with_front' => true),
		'query_var' => true,
		'exclude_from_search' => true,
		'supports' => array('title','editor','thumbnail','author','page-attributes'),
		'labels' => array (
			'name' => 'Front Page Posts',
			'singular_name' => 'Front Page Post',
			'menu_name' => 'Front Page Posts',
			'add_new' => 'Add Front Page Post',
			'add_new_item' => 'Add New Front Page Post',
			'edit' => 'Edit',
			'edit_item' => 'Edit Front Page Post',
			'new_item' => 'New Front Page Post',
			'view' => 'View Front Page Post',
			'view_item' => 'View Front Page Post',
			'search_items' => 'Search Front Page Posts',
			'not_found' => 'No Front Page Posts Found',
			'not_found_in_trash' => 'No Front Page Posts Found in Trash',
			'parent' => 'Parent Front Page Post',
			)
		) 
	);
}
?>