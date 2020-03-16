<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'getdesign_create_course', 10);

function getdesign_create_course() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Course', 'post type general name', 'getdesign' ),
		'singular_name'         =>  _x( 'Course', 'post type singular name', 'getdesign' ),
		'menu_name'             =>  _x( 'Course', 'admin menu', 'getdesign' ),
		'name_admin_bar'        =>  _x( 'All Course', 'add new on admin bar', 'getdesign' ),
		'add_new'               =>  _x( 'Add New', 'Course', 'getdesign' ),
		'add_new_item'          =>  esc_html__( 'Add New Course', 'getdesign' ),
		'edit_item'             =>  esc_html__( 'Edit Course', 'getdesign' ),
		'new_item'              =>  esc_html__( 'New Course', 'getdesign' ),
		'view_item'             =>  esc_html__( 'View Course', 'getdesign' ),
		'all_items'             =>  esc_html__( 'All Course', 'getdesign' ),
		'search_items'          =>  esc_html__( 'Search Course', 'getdesign' ),
		'not_found'             =>  esc_html__( 'No template found', 'getdesign' ),
		'not_found_in_trash'    =>  esc_html__( 'No template found in trash', 'getdesign' ),
		'parent_item_colon'     =>  ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-welcome-learn-more',
		'rewrite'            => array( 'slug' => 'khoa-hoc' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type('course', $args );
	/* End post type template */

}
