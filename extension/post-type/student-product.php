<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'getdesign_create_student_product', 10);

function getdesign_create_student_product() {

    /* Start post type template */
    $labels = array(
        'name'                  =>  _x( 'Student Products', 'post type general name', 'getdesign' ),
        'singular_name'         =>  _x( 'Student Products', 'post type singular name', 'getdesign' ),
        'menu_name'             =>  _x( 'Student Products', 'admin menu', 'getdesign' ),
        'name_admin_bar'        =>  _x( 'All Student Products', 'add new on admin bar', 'getdesign' ),
        'add_new'               =>  _x( 'Add New', 'Student Product', 'getdesign' ),
        'add_new_item'          =>  esc_html__( 'Add New Student Product', 'getdesign' ),
        'edit_item'             =>  esc_html__( 'Edit Student Product', 'getdesign' ),
        'new_item'              =>  esc_html__( 'New Student Product', 'getdesign' ),
        'view_item'             =>  esc_html__( 'View Student Product', 'getdesign' ),
        'all_items'             =>  esc_html__( 'All Student Products', 'getdesign' ),
        'search_items'          =>  esc_html__( 'Search Student Product', 'getdesign' ),
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
        'menu_icon'          => 'dashicons-cart',
        'rewrite'            => array( 'slug' => 'san-pham-hoc-vien' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );

    register_post_type('student-product', $args );
    /* End post type template */

}
