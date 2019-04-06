<?php
/**
 * The file is for creating the portfolio post type meta.
 * Meta output is defined on the portfolio single editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

add_action( 'add_meta_boxes', 'bean_metabox_portfolio' );
function bean_metabox_portfolio() {

	$prefix = '_bean_';

	/*
	===================================================================*/
	/*
	  PORTFOLIO META SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'          => 'portfolio-meta',
		'title'       => __( 'Portfolio Meta Settings', 'wonder' ),
		'description' => __( '', 'wonder' ),
		'page'        => 'portfolio',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name'    => __( 'Portfolio Type:', 'wonder' ),
				'desc'    => __( 'Select the portfolio type for this post.', 'wonder' ),
				'id'      => $prefix . 'portfolio_type',
				'type'    => 'select',
				'std'     => 'gallery',
				'options' => array(
					'gallery' => 'Gallery Portfolio',
					'video'   => 'Video Portfolio',
					'audio'   => 'Audio Portfolio',
				),
			),
			array(
				'name' => __( 'Portfolio Client:', 'wonder' ),
				'desc' => __( 'Display the client meta.', 'wonder' ),
				'id'   => $prefix . 'portfolio_client',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => __( 'Portfolio URL:', 'wonder' ),
				'desc' => __( 'Insert a URL to link your post to. <br/> ex: http://www.themebeans.com', 'wonder' ),
				'id'   => $prefix . 'portfolio_url',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => __( 'Display Date:', 'wonder' ),
				'id'   => $prefix . 'portfolio_date',
				'type' => 'checkbox',
				'desc' => __( 'Display the date meta.', 'wonder' ),
				'std'  => false,
			),
			array(
				'name' => __( 'Display Categories:', 'wonder' ),
				'id'   => $prefix . 'portfolio_cats',
				'type' => 'checkbox',
				'desc' => __( 'Select to display the portfolio categories.', 'wonder' ),
				'std'  => false,
			),
			array(
				'name' => __( 'Display Tags:', 'wonder' ),
				'id'   => $prefix . 'portfolio_tags',
				'type' => 'checkbox',
				'desc' => __( 'Select to display the portfolio tags.', 'wonder' ),
				'std'  => false,
			),
		),
	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  PORTFOLIO BG/ACCENT COLOR SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'          => 'portfolio-bg-color-meta',
		'title'       => __( 'Portfolio Style Settings', 'wonder' ),
		'description' => __( '', 'wonder' ),
		'page'        => 'portfolio',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => __( 'Accent Color:', 'wonder' ),
				'desc' => __( 'Add a accent color to override the default on this post.', 'wonder' ),
				'id'   => $prefix . 'accentcolor',
				'type' => 'color',
				'std'  => '',
				'val'  => '',
			),
			array(
				'name' => __( 'Background Color:', 'wonder' ),
				'desc' => __( 'Add a custom background color to media container.', 'wonder' ),
				'id'   => $prefix . 'bgcolor',
				'type' => 'color',
				'std'  => '#F1F4F5',
				'val'  => '',
			),
			array(
				'name' => __( 'Background Image:', 'wonder' ),
				'desc' => 'Upload a custom background image to the page header.',
				'id'   => $prefix . 'bgimage',
				'type' => 'file',
				'std'  => __( '', 'wonder' ),
			),
			array(
				'name'    => __( 'Background Format:', 'wonder' ),
				'desc'    => __( 'Select the background image format for your page header.', 'wonder' ),
				'id'      => $prefix . 'bgwidth',
				'type'    => 'radio',
				'std'     => 'backstretch',
				'options' => array(
					'pattern'     => __( 'Pattern', 'wonder' ),
					'fullwidth'   => __( 'Fullwidth', 'wonder' ),
					'backstretch' => __( 'Backstretch', 'wonder' ),
				),
			),
			array(
				'name'    => __( 'Background Position:', 'wonder' ),
				'desc'    => __( 'Set a position for your background image, if uploaded.', 'wonder' ),
				'id'      => $prefix . 'bgposition',
				'type'    => 'radio',
				'std'     => 'center',
				'options' => array(
					'left'   => 'Left',
					'right'  => 'Right',
					'center' => 'Center',
				),
			),
			array(
				'name'    => __( 'Background Repeat:', 'wonder' ),
				'desc'    => __( 'Set a repeat option for your background image, if uploaded.', 'wonder' ),
				'id'      => $prefix . 'bgrepeat',
				'type'    => 'radio',
				'std'     => 'repeat',
				'options' => array(
					'repeat'    => 'Repeat',
					'no-repeat' => 'No-Repeat',
					'repeat-x'  => 'Repeat (X)',
					'repeat-y'  => 'Repeat (Y)',
				),
			),
			array(
				'name'    => __( 'Background Attachment:', 'wonder' ),
				'desc'    => __( 'Set an attachement option for your background image, if uploaded.', 'wonder' ),
				'id'      => $prefix . 'bgattachment',
				'type'    => 'radio',
				'std'     => 'scroll',
				'options' => array(
					'scroll' => 'Scroll',
					'fixed'  => 'Fixed',
				),
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
		'id'       => 'bean-meta-box-portfolio-images',
		'title'    => __( 'Gallery Post Format Settings', 'wonder' ),
		'page'     => 'portfolio',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name'    => __( 'Gallery Layout:', 'wonder' ),
				'desc'    => __( 'Choose which layout to display for this portfolio post.', 'wonder' ),
				'id'      => $prefix . 'gallery_layout',
				'type'    => 'select',
				'std'     => 'stacked',
				'options' => array(
					'view'    => 'JQuery Photo Viewer',
					'stacked' => 'Stacked Images',
					'slider'  => 'Slideshow',
				),
			),
			array(
				'name' => __( 'Gallery Images:', 'wonder' ),
				'desc' => 'Upload images here for your gallery post. Once uploaded, drag & drop to reorder.',
				'id'   => $prefix . 'portfolio_upload_images',
				'type' => 'images',
				'std'  => __( 'Browse & Upload', 'wonder' ),
			),
			array(
				'name' => __( 'Randomize Gallery:', 'wonder' ),
				'id'   => $prefix . 'portfolio_randomize',
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
	  AUDIO POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-portfolio-audio',
		'title'    => __( 'Audio Post Format Settings', 'wonder' ),
		'page'     => 'portfolio',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'MP3 File URL:', 'wonder' ),
				'desc' => __( '', 'wonder' ),
				'id'   => $prefix . 'audio_mp3',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => __( 'Poster Image:', 'wonder' ),
				'desc' => __( 'The preview image for this audio track', 'wonder' ),
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
	  VIDEO POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-portfolio-video',
		'title'    => __( 'Video Post Format Settings', 'wonder' ),
		'page'     => 'portfolio',
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
				'name' => __( 'Embed Code:', 'wonder' ),
				'desc' => __( 'If you are not using self hosted video then you can include embeded code here.', 'wonder' ),
				'id'   => $prefix . 'portfolio_embed_code',
				'type' => 'textarea',
				'std'  => '',
			),
		),

	);
	bean_add_meta_box( $meta_box );
} // END function bean_metabox_portfolio()
