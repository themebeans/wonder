<?php
/**
 * The file is for creating the page post type meta.
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

add_action( 'add_meta_boxes', 'bean_metabox_page' );
function bean_metabox_page() {

	$prefix = '_bean_';

	/*
	===================================================================*/
	/*
	  PAGE META SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'page-meta',
		'title'    => __( 'Page Meta Settings', 'wonder' ),
		'page'     => 'page',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'Display Page Title:', 'wonder' ),
				'desc' => __( 'Select to display the page title above the main entry content.', 'wonder' ),
				'id'   => $prefix . 'page_title',
				'type' => 'checkbox',
				'std'  => true,
			),
			array(
				'name'    => __( 'Sidebar Layout:', 'wonder' ),
				'desc'    => __( 'Select to display a fullwidth, left or right sidebar layout.', 'wonder' ),
				'id'      => $prefix . 'page_layout',
				'type'    => 'radio',
				'std'     => 'right',
				'options' => array(
					'none'  => __( 'Fullwidth', 'wonder' ),
					'left'  => __( 'Left Sidebar', 'wonder' ),
					'right' => __( 'Right Sidebar', 'wonder' ),
				),
			),
		),
	);
	bean_add_meta_box( $meta_box );
} // END function bean_metabox_page()
