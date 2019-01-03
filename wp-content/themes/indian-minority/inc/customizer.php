<?php

/* Add customizer panels, sections, settings, and controls */
add_action( 'customize_register', 'im_minority_blog_add_customizer_content' );

function im_minority_blog_add_customizer_content( $wp_customize ) {
	
	//----------------------------------------------------------------------------------
	// Section: Social Media Icons
	//----------------------------------------------------------------------------------
	$wp_customize->add_section( 'im_minority_blog_social_media_icons', array(
		'title'       => __( 'Social Media Icons', 'indian-minority' ),
		'priority'    => 30,
		'description' => __( 'Add the URL for each of your social profiles.', 'indian-minority' )
	) );

	// get the social sites array
	$social_sites = im_minority_blog_social_array();

	// set a priority used to order the social sites
	$priority = 5;
	
	// create a setting and control for each social site
	foreach ( $social_sites as $social_site => $value ) {
		// if email icon
		if ( $social_site == 'email' ) {
			// setting
			$wp_customize->add_setting( $social_site, array(
				'sanitize_callback' => 'im_minority_blog_sanitize_email'
			) );
			// control
			$wp_customize->add_control( $social_site, array(
				'label'    => __( 'Email Address', 'indian-minority' ),
				'section'  => 'im_minority_blog_social_media_icons',
				'priority' => $priority
			) );
		} else {

			$label = ucfirst( $social_site );

			if ( $social_site == 'google-plus' ) {
				$label = 'Google Plus';
			} elseif ( $social_site == 'rss' ) {
				$label = 'RSS';
			} elseif ( $social_site == 'soundcloud' ) {
				$label = 'SoundCloud';
			} elseif ( $social_site == 'slideshare' ) {
				$label = 'SlideShare';
			} elseif ( $social_site == 'codepen' ) {
				$label = 'CodePen';
			} elseif ( $social_site == 'stumbleupon' ) {
				$label = 'StumbleUpon';
			} elseif ( $social_site == 'deviantart' ) {
				$label = 'DeviantArt';
			} elseif ( $social_site == 'hacker-news' ) {
				$label = 'Hacker News';
			} elseif ( $social_site == 'whatsapp' ) {
				$label = 'WhatsApp';
			} elseif ( $social_site == 'qq' ) {
				$label = 'QQ';
			} elseif ( $social_site == 'vk' ) {
				$label = 'VK';
			} elseif ( $social_site == 'wechat' ) {
				$label = 'WeChat';
			} elseif ( $social_site == 'tencent-weibo' ) {
				$label = 'Tencent Weibo';
			} elseif ( $social_site == 'paypal' ) {
				$label = 'PayPal';
			} elseif ( $social_site == 'email-form' ) {
				$label = 'Contact Form';
			} elseif ( $social_site == 'google-wallet' ) {
				$label = 'Google Wallet';
			}

			if ( $social_site == 'skype' ) {
				// setting
				$wp_customize->add_setting( $social_site, array(
					'sanitize_callback' => 'im_minority_blog_sanitize_skype'
				) );
				// control
				$wp_customize->add_control( $social_site, array(
					'type'        => 'url',
					'label'       => $label,
					// translators: %s = link to article
					//'description' => sprintf( __( 'Accepts Skype link protocol (<a href="%s" target="_blank">learn more</a>)', 'indian-minority' ), 'https://www.competethemes.com/blog/skype-links-wordpress/' ),
					'section'     => 'im_minority_blog_social_media_icons',
					'priority'    => $priority
				) );
			} else {
				// setting
				$wp_customize->add_setting( $social_site, array(
					'sanitize_callback' => 'esc_url_raw'
				) );
				// control
				$wp_customize->add_control( $social_site, array(
					'type'     => 'url',
					'label'    => $label,
					'section'  => 'im_minority_blog_social_media_icons',
					'priority' => $priority
				) );
			}
		}
		// increment the priority for next site
		$priority = $priority + 5;
	}
	//----------------------------------------------------------------------------------
	// Panel: Slider. Section: Content
	//----------------------------------------------------------------------------------
	$wp_customize->add_section( 'im_minority_blog_slider_content', array(
		'title'       => __( 'Slider', 'indian-minority' ),
		'priority'    => 20,
		'description' => __( 'Use these settings to add the number of slides in the slider.', 'indian-minority' )
	) );
	// setting
	$wp_customize->add_setting( 'slider_recent_posts', array(
		'default'           => '5',
		'sanitize_callback' => 'absint'
	) );
	// control
	$wp_customize->add_control( 'slider_recent_posts', array(
		'label'    => __( 'Number of slides in the slider', 'indian-minority' ),
		'section'  => 'im_minority_blog_slider_content',
		'settings' => 'slider_recent_posts',
		'type'     => 'number'
	) );
	//----------------------------------------------------------------------------------
	// Section: Show/Hide Elements
	//----------------------------------------------------------------------------------
	$wp_customize->add_section( 'im_minority_blog_show_hide', array(
		'title'    => __( 'Show/Hide Elements', 'indian-minority' ),
		'priority' => 25
	) );
	// setting
	$wp_customize->add_setting( 'post_byline_date', array(
		'default'           => 'yes',
		'sanitize_callback' => 'im_minority_blog_sanitize_yes_no_settings'
	) );
	// control
	$wp_customize->add_control( 'post_byline_date', array(
		'label'    => __( 'Show date in post byline?', 'indian-minority' ),
		'section'  => 'im_minority_blog_show_hide',
		'settings' => 'post_byline_date',
		'type'     => 'radio',
		'choices'  => array(
			'yes' => __( 'Yes', 'indian-minority' ),
			'no'  => __( 'No', 'indian-minority' )
		)
	) );
	// setting
	$wp_customize->add_setting( 'post_byline_author', array(
		'default'           => 'yes',
		'sanitize_callback' => 'im_minority_blog_sanitize_yes_no_settings'
	) );
	// control
	$wp_customize->add_control( 'post_byline_author', array(
		'label'    => __( 'Show author name in post byline?', 'indian-minority' ),
		'section'  => 'im_minority_blog_show_hide',
		'settings' => 'post_byline_author',
		'type'     => 'radio',
		'choices'  => array(
			'yes' => __( 'Yes', 'indian-minority' ),
			'no'  => __( 'No', 'indian-minority' )
		)
	) );
	// setting
	$wp_customize->add_setting( 'post_categories', array(
		'default'           => 'yes',
		'sanitize_callback' => 'im_minority_blog_sanitize_yes_no_settings'
	) );
	// control
	$wp_customize->add_control( 'post_categories', array(
		'label'    => __( 'Show categories after the post?', 'indian-minority' ),
		'section'  => 'im_minority_blog_show_hide',
		'settings' => 'post_categories',
		'type'     => 'radio',
		'choices'  => array(
			'yes' => __( 'Yes', 'indian-minority' ),
			'no'  => __( 'No', 'indian-minority' )
		)
	) );
	// setting
	$wp_customize->add_setting( 'post_tags', array(
		'default'           => 'yes',
		'sanitize_callback' => 'im_minority_blog_sanitize_yes_no_settings'
	) );
	// control
	$wp_customize->add_control( 'post_tags', array(
		'label'    => __( 'Show tags after the post?', 'startup-blog' ),
		'section'  => 'im_minority_blog_show_hide',
		'settings' => 'post_tags',
		'type'     => 'radio',
		'choices'  => array(
			'yes' => __( 'Yes', 'indian-minority' ),
			'no'  => __( 'No', 'indian-minority' )
		)
	) );
	//----------------------------------------------------------------------------------
	// Section: Blog
	//----------------------------------------------------------------------------------
	$wp_customize->add_section( 'im_minority_blog_blog', array(
		'title'    => __( 'Blog', 'indian-minority' ),
		'priority' => 50
	) );
	// setting
	$wp_customize->add_setting( 'excerpt_length', array(
		'default'           => '30',
		'sanitize_callback' => 'absint'
	) );
	// control
	$wp_customize->add_control( 'excerpt_length', array(
		'label'    => __( 'Excerpt word count', 'indian-minority' ),
		'section'  => 'im_minority_blog_blog',
		'settings' => 'excerpt_length',
		'type'     => 'number'
	) );
}

//----------------------------------------------------------------------------------
// Sanitize email.
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_email( $input ) {
	return sanitize_email( $input );
}

//----------------------------------------------------------------------------------
// Sanitize yes/no settings
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_yes_no_settings( $input ) {

	$valid = array(
		'yes' => __( 'Yes', 'indian-minority' ),
		'no'  => __( 'No', 'indian-minority' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

//----------------------------------------------------------------------------------
// Sanitize text
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

//----------------------------------------------------------------------------------
// Sanitize Skype URI
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_skype( $input ) {
	return esc_url_raw( $input, array( 'http', 'https', 'skype' ) );
}

//----------------------------------------------------------------------------------
// Sanitize tagline settings
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_tagline_settings( $input ) {

	$valid = array(
		'header-footer' => __( 'Yes, in the header & footer', 'indian-minority' ),
		'header'        => __( 'Yes, in the header', 'indian-minority' ),
		'footer'        => __( 'Yes, in the footer', 'indian-minority' ),
		'no'            => __( 'No', 'indian-minority' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

//----------------------------------------------------------------------------------
// Sanitize sidebar settings
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_sidebar_settings( $input ) {

	$valid = array(
		'after'  => __( 'Yes, after main content', 'indian-minority' ),
		'before' => __( 'Yes, before main content', 'indian-minority' ),
		'no'     => __( 'No', 'indian-minority' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

//----------------------------------------------------------------------------------
// Sanitize slider display settings
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_slider_display( $input ) {

	$valid = array(
		'homepage'  => __( 'Homepage', 'indian-minority' ),
		'blog'      => __( 'Blog', 'indian-minority' ),
		'all-pages' => __( 'All Pages', 'indian-minority' ),
		'no'        => __( 'Do not display', 'indian-minority' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

//----------------------------------------------------------------------------------
// Sanitize post categories setting
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_post_categories( $input ) {

	$categories_array = array( 'all' => 'All' );
	foreach ( get_categories() as $category ) {
		$categories_array[$category->term_id] = $category->name;
	}

	return array_key_exists( $input, $categories_array ) ? $input : '';
}

//----------------------------------------------------------------------------------
// Sanitize layout settings
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_layout( $input ) {

	/* TRT Note: Also allowing layouts only included in the premium plugin.
	 * Needs to be done this way b/c sanitize_callback cannot be updated
	 * via get_setting() */
	$valid = array(
		'right-sidebar' => __( 'Right sidebar', 'indian-minority' ),
		'left-sidebar'  => __( 'Left sidebar', 'indian-minority' ),
		'narrow'        => __( 'No sidebar - Narrow', 'indian-minority' ),
		'wide'          => __( 'No sidebar - Wide', 'indian-minority' ),
		'two-right'     => __( 'Two column - Right sidebar', 'indian-minority' ),
		'two-left'      => __( 'Two column - Left sidebar', 'indian-minority' ),
		'two-narrow'    => __( 'Two column - No Sidebar - Narrow', 'indian-minority' ),
		'two-wide'      => __( 'Two column - No Sidebar - Wide', 'indian-minority' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

//----------------------------------------------------------------------------------
// Sanitize posts or pages settings
//----------------------------------------------------------------------------------
function im_minority_blog_sanitize_posts_or_pages( $input ) {

	$valid = array(
		'posts' => __( 'Posts', 'indian-minority' ),
		'pages' => __( 'Pages', 'indian-minority' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}