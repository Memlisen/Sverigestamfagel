<?php
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Fågelträffar', 'Post Type General Name', 'stf' ),
		'singular_name'         => _x( 'Fågelträff', 'Post Type Singular Name', 'stf' ),
		'menu_name'             => __( 'Fågelträffar', 'stf' ),
		'name_admin_bar'        => __( 'Fågelträffar', 'stf' ),
		'archives'              => __( 'Item Archives', 'stf' ),
		'attributes'            => __( 'Item Attributes', 'stf' ),
		'parent_item_colon'     => __( 'Parent Item:', 'stf' ),
		'all_items'             => __( 'All Items', 'stf' ),
		'add_new_item'          => __( 'Add New Item', 'stf' ),
		'add_new'               => __( 'Add New', 'stf' ),
		'new_item'              => __( 'New Item', 'stf' ),
		'edit_item'             => __( 'Edit Item', 'stf' ),
		'update_item'           => __( 'Update Item', 'stf' ),
		'view_item'             => __( 'View Item', 'stf' ),
		'view_items'            => __( 'View Items', 'stf' ),
		'search_items'          => __( 'Search Item', 'stf' ),
		'not_found'             => __( 'Not found', 'stf' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'stf' ),
		'featured_image'        => __( 'Featured Image', 'stf' ),
		'set_featured_image'    => __( 'Set featured image', 'stf' ),
		'remove_featured_image' => __( 'Remove featured image', 'stf' ),
		'use_featured_image'    => __( 'Use as featured image', 'stf' ),
		'insert_into_item'      => __( 'Insert into item', 'stf' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'stf' ),
		'items_list'            => __( 'Items list', 'stf' ),
		'items_list_navigation' => __( 'Items list navigation', 'stf' ),
		'filter_items_list'     => __( 'Filter items list', 'stf' ),
	);
	$args = array(
		'label'                 => __( 'Fågelträff', 'stf' ),
		'description'           => __( 'Post Type Description', 'stf' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rest_base'             => 'meets',
		'menu_icon'				=> 'http://localhost/~max/lightweb/wp-content/uploads/2018/02/meets-icon.png'
	);
	register_post_type( 'meets', $args );

}
add_action( 'init', 'custom_post_type', 0 );