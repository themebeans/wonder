<?php
/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function wonder_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'theme_settings',
		array(
			'title'       => 'Settings',
			'description' => '',
			'priority'    => 34,
		)
	);

	$wp_customize->add_setting( 'sticky_navigation', array( 'default' => true ) );
	$wp_customize->add_control(
		'sticky_navigation',
		array(
			'type'     => 'checkbox',
			'label'    => 'Enable Sticky Navigation',
			'section'  => 'theme_settings',
			'priority' => 3,
		)
	);

	$wp_customize->add_setting( 'header_overlay', array( 'default' => true ) );
	$wp_customize->add_control(
		'header_overlay',
		array(
			'type'     => 'checkbox',
			'label'    => 'Enable Header Overlay',
			'section'  => 'theme_settings',
			'priority' => 4,
		)
	);

	$wp_customize->add_setting( 'display_header_tagline_global', array( 'default' => false ) );
	$wp_customize->add_control(
		'display_header_tagline_global',
		array(
			'type'     => 'checkbox',
			'label'    => 'Display Tagline Globally',
			'section'  => 'theme_settings',
			'priority' => 5,
		)
	);

	$wp_customize->add_section(
		'general_settings',
		array(
			'title'      => 'General',
			'priority'   => 35,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_setting( 'twitter_profile', array( 'default' => '' ) );
	$wp_customize->add_control(
		'twitter_profile',
		array(
			'label'    => __( 'Twitter Username (eg:ThemeBeans)', 'wonder' ),
			'section'  => 'general_settings',
			'type'     => 'text',
			'priority' => 6,
		)
	);

	$wp_customize->add_setting( 'header_tagline', array( 'default' => '' ) );
	$wp_customize->add_control(
		'header_tagline', array(
			'type'     => 'textarea',
			'section'  => 'general_settings',
			'label'    => __( 'Header Tagline', 'wonder' ),
			'priority' => 7,
		)
	);

	$wp_customize->add_setting(
		'body_custom_background_color', array(
			'default' => '#FFF',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'body_custom_background_color', array(
				'label'    => __( 'Background Color', 'wonder' ),
				'section'  => 'colors',
				'settings' => 'body_custom_background_color',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'body_text_color', array(
			'default' => '#333333',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'body_text_color', array(
				'label'    => __( 'Body Text', 'wonder' ),
				'section'  => 'colors',
				'settings' => 'body_text_color',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'theme_accent_color', array(
			'default' => '#2AC176',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'theme_accent_color', array(
				'label'    => __( 'Accent Color', 'wonder' ),
				'section'  => 'colors',
				'settings' => 'theme_accent_color',
				'priority' => 3,
			)
		)
	);

	$wp_customize->add_setting(
		'overlay_color', array(
			'default' => '#2AC176',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'overlay_color', array(
				'label'    => __( 'Portfolio Overlay', 'wonder' ),
				'section'  => 'colors',
				'settings' => 'overlay_color',
				'priority' => 6,
			)
		)
	);

	$wp_customize->add_setting(
		'overlay_text_color', array(
			'default' => '#FFF',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'overlay_text_color', array(
				'label'    => __( 'Portfolio Overlay Text', 'wonder' ),
				'section'  => 'colors',
				'settings' => 'overlay_text_color',
				'priority' => 7,
			)
		)
	);

	$wp_customize->add_section(
		'footer_settings',
		array(
			'title'    => 'Footer',
			'priority' => 38,
		)
	);
	$wp_customize->add_setting( 'display_footer', array( 'default' => true ) );
	$wp_customize->add_control(
		'display_footer',
		array(
			'type'     => 'checkbox',
			'label'    => 'Display Footer Container',
			'section'  => 'footer_settings',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting( 'footer_copyright', array( 'default' => '' ) );
	$wp_customize->add_control(
		'footer_copyright', array(
			'type'     => 'textarea',
			'section'  => 'footer_settings',
			'label'    => __( 'Copyright Text', 'wonder' ),
			'priority' => 7,
		)
	);

	$wp_customize->add_section(
		'portfolio_settings', array(
			'title'    => __( 'Portfolio', 'wonder' ),
			'priority' => 37,
		)
	);

	$wp_customize->add_setting( 'portfolio_posts_count', array( 'default' => '10' ) );
	$wp_customize->add_control(
		'portfolio_posts_count',
		array(
			'label'   => 'Portfolio Template Count',
			'section' => 'portfolio_settings',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting( 'portfolio_rando' );
	$wp_customize->add_control(
		'portfolio_rando',
		array(
			'type'     => 'checkbox',
			'label'    => 'Randomize Posts',
			'section'  => 'portfolio_settings',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting( 'portfolio_scale', array( 'default' => true ) );
	$wp_customize->add_control(
		'portfolio_scale',
		array(
			'type'     => 'checkbox',
			'label'    => 'Enable Hover Scaling',
			'section'  => 'portfolio_settings',
			'priority' => 2,
		)
	);

	$wp_customize->add_setting( 'portfolio_overlay', array( 'default' => true ) );
	$wp_customize->add_control(
		'portfolio_overlay',
		array(
			'type'     => 'checkbox',
			'label'    => 'Enable Portfolio Overlay',
			'section'  => 'portfolio_settings',
			'priority' => 3,
		)
	);

	$wp_customize->add_setting( 'portfolio_new_tag', array( 'default' => false ) );
	$wp_customize->add_control(
		'portfolio_new_tag',
		array(
			'type'     => 'checkbox',
			'label'    => 'Enable Portfolio New Tab',
			'section'  => 'portfolio_settings',
			'priority' => 4,
		)
	);

	$wp_customize->add_setting( 'portfolio_pagination', array( 'default' => true ) );
	$wp_customize->add_control(
		'portfolio_pagination',
		array(
			'type'     => 'checkbox',
			'label'    => 'Enable Single Pagination',
			'section'  => 'portfolio_settings',
			'priority' => 5,
		)
	);

	$wp_customize->add_setting( 'show_related_portfolio_posts', array( 'default' => true ) );
	$wp_customize->add_control(
		'show_related_portfolio_posts',
		array(
			'type'     => 'checkbox',
			'label'    => 'Enable Single Related Posts',
			'section'  => 'portfolio_settings',
			'priority' => 6,
		)
	);

	$wp_customize->add_setting( 'related_portfolio_title', array( 'default' => 'Related Work' ) );
	$wp_customize->add_control(
		'related_portfolio_title',
		array(
			'label'    => 'Related Portfolios Title',
			'section'  => 'portfolio_settings',
			'type'     => 'text',
			'priority' => 7,
		)
	);

	$wp_customize->add_setting( 'portfolio_css_filter', array( 'default' => 'none' ) );
	$wp_customize->add_control(
		'portfolio_css_filter',
		array(
			'type'    => 'select',
			'label'   => 'CSS3 Filter',
			'section' => 'portfolio_settings',
			'choices' => array(
				'none'       => 'None',
				'grayscale'  => 'Black & White',
				'sepia'      => 'Sepia Tone',
				'saturation' => 'High Saturation',
			),
		)
	);

	$wp_customize->add_section(
		'contact_settings', array(
			'title'    => __( 'Contact', 'wonder' ),
			'priority' => 40,
		)
	);

	$wp_customize->add_setting( 'bean_contact_form', array( 'default' => true ) );
	$wp_customize->add_control(
		'bean_contact_form',
		array(
			'type'     => 'checkbox',
			'label'    => 'Use Default Contact Form',
			'section'  => 'contact_settings',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting( 'hide_required', array( 'default' => false ) );
	$wp_customize->add_control(
		'hide_required',
		array(
			'type'     => 'checkbox',
			'label'    => 'Hide Required Asterisks',
			'section'  => 'contact_settings',
			'priority' => 2,
		)
	);

	$wp_customize->add_setting( 'admin_custom_email', array( 'default' => '' ) );
	$wp_customize->add_control(
		'admin_custom_email',
		array(
			'label'    => 'Contact Form Email',
			'section'  => 'contact_settings',
			'type'     => 'text',
			'priority' => 4,
		)
	);

	$wp_customize->add_setting( 'contact_button_text', array( 'default' => 'Send Message' ) );
	$wp_customize->add_control(
		'contact_button_text',
		array(
			'label'    => 'Contact Button Text',
			'section'  => 'contact_settings',
			'type'     => 'text',
			'priority' => 5,
		)
	);

	$wp_customize->add_section(
		'blog_settings', array(
			'title'    => __( 'Blog', 'wonder' ),
			'priority' => 36,
		)
	);

	$wp_customize->add_setting( 'show_pagination', array( 'default' => true ) );
	$wp_customize->add_control(
		'show_pagination',
		array(
			'type'     => 'checkbox',
			'label'    => 'Display Single Pagination',
			'section'  => 'blog_settings',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting( 'post_sharing', array( 'default' => true ) );
	$wp_customize->add_control(
		'post_sharing',
		array(
			'type'     => 'checkbox',
			'label'    => 'Display Social Sharing Buttons',
			'section'  => 'blog_settings',
			'priority' => 2,
		)
	);

	$wp_customize->add_setting( 'show_tags', array( 'default' => false ) );
	$wp_customize->add_control(
		'show_tags',
		array(
			'type'     => 'checkbox',
			'label'    => 'Display Single Post Tags',
			'section'  => 'blog_settings',
			'priority' => 2,
		)
	);

	$wp_customize->add_setting( 'post_excerpt', array( 'default' => '25' ) );
	$wp_customize->add_control(
		'post_excerpt',
		array(
			'label'    => 'Post Excerpt Word Count',
			'section'  => 'blog_settings',
			'type'     => 'text',
			'priority' => 3,
		)
	);

	$wp_customize->add_setting( 'blog_sidebar_selector', array( 'default' => 'right' ) );
	$wp_customize->add_control(
		'blog_sidebar_selector',
		array(
			'type'    => 'select',
			'label'   => 'Blog Sidebar Layout',
			'section' => 'blog_settings',
			'choices' => array(
				'none'  => 'None',
				'right' => 'Right Sidebar',
				'left'  => 'Left Sidebar',
			),
		)
	);

	$wp_customize->add_section(
		'404_settings', array(
			'title'    => __( '404 & Coming Soon', 'wonder' ),
			'priority' => 200,
		)
	);

	$wp_customize->add_setting( 'error_title', array( 'default' => __( '404 Error... Whoops.', 'wonder' ) ) );
	$wp_customize->add_control(
		'error_title',
		array(
			'label'    => '404 Header',
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting( 'error_text', array( 'default' => __( 'Unfortunately, this page can not be found.', 'wonder' ) ) );
	$wp_customize->add_control(
		'error_text',
		array(
			'label'    => '404 Text',
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 2,
		)
	);

	$wp_customize->add_setting( 'comingsoon_year', array( 'default' => '2016' ) );
	$wp_customize->add_control(
		'comingsoon_year',
		array(
			'label'    => __( 'Year (ex: 2014)', 'harbor' ),
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 3,
		)
	);

	$wp_customize->add_setting( 'comingsoon_month', array( 'default' => '01' ) );
	$wp_customize->add_control(
		'comingsoon_month',
		array(
			'label'    => __( 'Month (ex: 01 for JAN)', 'harbor' ),
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 4,
		)
	);

	$wp_customize->add_setting( 'comingsoon_day', array( 'default' => '01' ) );
	$wp_customize->add_control(
		'comingsoon_day',
		array(
			'label'    => __( 'Day (ex: 01)', 'harbor' ),
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 5,
		)
	);

	$wp_customize->get_setting( 'background_color' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'footer_copyright' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'related_portfolio_title' )->transport = 'postMessage';

}
add_action( 'customize_register', 'wonder_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function wonder_customize_preview_js() {
	wp_enqueue_script( 'wonder-customize-preview', get_theme_file_uri( '/assets/js/admin/customize-preview' . WONDER_ASSET_SUFFIX . '.js' ), array( 'customize-preview' ), '@@pkg.version', true );
}
add_action( 'customize_preview_init', 'wonder_customize_preview_js' );
