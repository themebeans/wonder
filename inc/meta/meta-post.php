<?php
/**
 * The file is for creating the blog post type meta.
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

add_action( 'add_meta_boxes', 'bean_metabox_post' );
function bean_metabox_post() {

	$prefix = '_bean_';

	/*
	===================================================================*/
	/*
	  AUDIO POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-audio',
		'title'    => __( 'Audio Post Format Settings', 'wonder' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'MP3 File URL:', 'wonder' ),
				'desc' => __( 'Upload or link to an MP3 file.', 'wonder' ),
				'id'   => $prefix . 'audio_mp3',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => __( 'Poster Image:', 'wonder' ),
				'desc' => __( 'Upload or link a poster image.', 'wonder' ),
				'id'   => $prefix . 'audio_poster_url',
				'type' => 'file',
				'std'  => '',
			),
		),
	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  GALLERY POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-gallery',
		'title'    => __( 'Gallery Post Format Settings', 'wonder' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => 'Gallery Images:',
				'desc' => 'Upload images here for your gallery post. Once uploaded, drag & drop to reorder.',
				'id'   => $prefix . 'post_upload_images',
				'type' => 'images',
				'std'  => __( 'Browse & Upload', 'wonder' ),
			),
			array(
				'name' => __( 'Randomize Gallery:', 'wonder' ),
				'id'   => $prefix . 'post_randomize',
				'type' => 'checkbox',
				'desc' => __( 'Randomize the gallery on page load.', 'wonder' ),
				'std'  => false,
			),
		),
	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  LINK POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-link',
		'title'    => __( 'Link Post Format Settings', 'wonder' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'Link URL:', 'wonder' ),
				'desc' => __( 'ex: http://themebeans.com', 'wonder' ),
				'id'   => $prefix . 'link_url',
				'type' => 'text',
				'std'  => 'http://',
			),
		),

	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  QUOTE POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-quote',
		'title'    => __( 'Quote Post Format Settings', 'wonder' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'Quote Text:', 'wonder' ),
				'desc' => __( 'Insert your quote into this textarea.', 'wonder' ),
				'id'   => $prefix . 'quote',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => __( 'Quote Source:', 'wonder' ),
				'desc' => __( 'Who said the quote above?', 'wonder' ),
				'id'   => $prefix . 'quote_source',
				'type' => 'text',
				'std'  => '',
			),
		),

	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  VIDEO POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-video',
		'title'    => __( 'Video Post Format Settings', 'wonder' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'M4V File URL:', 'wonder' ),
				'desc' => __( '', 'wonder' ),
				'id'   => $prefix . 'video_m4v',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => __( 'Poster Image:', 'wonder' ),
				'desc' => __( '', 'wonder' ),
				'id'   => $prefix . 'video_poster',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => __( 'Embeded Code:', 'wonder' ),
				'desc' => __( 'If you\'re not using self hosted video then you can include embeded code here.', 'wonder' ),
				'id'   => $prefix . 'video_embed',
				'type' => 'textarea',
				'std'  => '',
			),
		),
	);
	bean_add_meta_box( $meta_box );
} // END function bean_metabox_post()
