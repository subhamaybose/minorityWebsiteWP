<?php
/*
----------------------------------------------------------------------------------
     Add meta elements for the charset, viewport, and template
----------------------------------------------------------------------------------
*/
if ( ! function_exists( 'im_minority_blog_add_meta_elements' ) ) {
	function im_minority_blog_add_meta_elements() {

		$meta_elements = '';

		$meta_elements .= sprintf( '<meta charset="%s" />' . "\n", esc_attr( get_bloginfo( 'charset' ) ) );
		$meta_elements .= '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";

		$theme    = wp_get_theme( get_template() );
		$template = sprintf( '<meta name="template" content="%s %s" />' . "\n", esc_attr( $theme->get( 'Name' ) ), esc_attr( $theme->get( 'Version' ) ) );
		$meta_elements .= $template;

		echo $meta_elements;
	}
}
add_action( 'wp_head', 'im_minority_blog_add_meta_elements', 1 );
/*
----------------------------------------------------------------------------------
    Include all required files
----------------------------------------------------------------------------------
*/
require_once( trailingslashit( get_template_directory() ) . 'theme-options.php' );
foreach ( glob( trailingslashit( get_template_directory() ) . 'inc/*.php' ) as $filename ) {
	include $filename;
}
/*
----------------------------------------------------------------------------------
	Set content width variable
----------------------------------------------------------------------------------
*/
if ( ! function_exists( ( 'im_minority_blog_set_content_width' ) ) ) {
	function im_minority_blog_set_content_width() {
		if ( ! isset( $content_width ) ) {
			$content_width = 900;
		}
	}
}
add_action( 'after_setup_theme', 'im_minority_blog_set_content_width', 0 );
/*
----------------------------------------------------------------------------------
	Set for threaded comment
----------------------------------------------------------------------------------
*/
if ( ! function_exists( ( 'im_minority_blog_enqueue_comments_reply' ) ) ) {
	function im_minority_blog_enqueue_comments_reply() {
		if( get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'comment_form_before', 'im_minority_blog_enqueue_comments_reply' );
/*
----------------------------------------------------------------------------------
	Add theme support for various features, register menus, load text domain
----------------------------------------------------------------------------------
*/
if ( ! function_exists( ( 'im_minority_blog_theme_setup' ) ) ) {
	function im_minority_blog_theme_setup() {

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );
		// Support for infinite scroll in jetpack
		add_theme_support( 'infinite-scroll', array(
			'container' => 'loop-container',
			'footer'    => 'overflow-container',
			'render'    => 'ct_startup_blog_infinite_scroll_render'
		) );
		// TRT Note: this is added so users can customize the excerpt if they add pages to the slider
		add_post_type_support( 'page', array('excerpt', 'custom-fields') );
		
		//add_theme_support( 'woocommerce' );

		register_nav_menus( array(
			'primary'   => esc_html__( 'Primary', 'indian-minority' ),
			'secondary' => esc_html__( 'Secondary', 'indian-minority' ),
			'footer'   => esc_html__( 'Footer', 'indian-minority' )
		) );

		load_theme_textdomain( 'startup-blog', get_template_directory() . '/languages' );
	}
}
add_action( 'after_setup_theme', 'im_minority_blog_theme_setup', 10 );
/*
----------------------------------------------------------------------------------
	Register widget areas
----------------------------------------------------------------------------------
*/
if ( ! function_exists( ( 'im_minority_blog_register_widget_areas' ) ) ) {
	function im_minority_blog_register_widget_areas() {
		
		register_sidebar( array(
			'name'          => esc_html__( 'Default Widgets Sidebar', 'indian-minority' ),
			'id'            => 'default',
			'description'   => esc_html__( 'Widgets in this area will be shown in the right side of the theme.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-red"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'News Widgets Sidebar', 'indian-minority' ),
			'id'            => 'news',
			'description'   => esc_html__( 'Widgets in this area will be shown in the right side of the theme.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-red"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Hot Topics Widgets Sidebar', 'indian-minority' ),
			'id'            => 'topic',
			'description'   => esc_html__( 'Widgets in this area will be shown in the right side of the theme.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-red"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Features Widgets Sidebar', 'indian-minority' ),
			'id'            => 'features',
			'description'   => esc_html__( 'Widgets in this area will be shown in the right side of the theme.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-red"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Widgets Sidebar', 'indian-minority' ),
			'id'            => 'blog',
			'description'   => esc_html__( 'Widgets in this area will be shown in the right side of the theme.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-red"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Counteract Widgets Sidebar', 'indian-minority' ),
			'id'            => 'counteract',
			'description'   => esc_html__( 'Widgets in this area will be shown in the right side of the theme.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-red"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Art & Culture Widgets Sidebar', 'indian-minority' ),
			'id'            => 'art',
			'description'   => esc_html__( 'Widgets in this area will be shown in the right side of the theme.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-red"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Opinoin Widgets Sidebar', 'indian-minority' ),
			'id'            => 'opinion',
			'description'   => esc_html__( 'Widgets in this area will be shown in the right side of the theme.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-red"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Left Widgets Sidebar', 'indian-minority' ),
			'id'            => 'left',
			'description'   => esc_html__( 'Widgets in this area will be shown in the left side of the theme on front page.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-blue"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Right Widgets Sidebar', 'indian-minority' ),
			'id'            => 'right',
			'description'   => esc_html__( 'Widgets in this area will be shown in the right side of the theme on front page.', 'indian-minority' ),
			'before_widget' => '<div class="aside-block-red">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="headline-red"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widgets', 'indian-minority' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Widgets in this area will be shown in the footer of the theme.', 'indian-minority' ),
			'before_widget' => '<div class="span3"><div class="aside-block-grey">',
			'after_widget'  => '</div></div></div>',
			'before_title'  => '<div class="headline-black"><h3>',
			'after_title'   => '</h3><div class="clear"></div></div><div class="inner1">'
		) );
	}
}
add_action( 'widgets_init', 'im_minority_blog_register_widget_areas' );
/*
----------------------------------------------------------------------------------
 Create and output the slider setup in the Customizer
----------------------------------------------------------------------------------
*/
if ( ! function_exists( 'im_minority_blog_slider' ) ) {
	function im_minority_blog_slider() {

		// Decide if slider should be displayed based on user's Customizer settings
		if ( ( !is_front_page() || is_paged() ) ) {
			return;
		}

		$num_posts      = get_theme_mod( 'slider_recent_posts' );
		$args           = array();
		if ( $num_posts == '' ) {
			$num_posts = 5;
		}
		// prepare query args
		$args['posts_per_page'] = $num_posts;
		$args['post_type'] = 'slider';
		
		$the_query = new WP_Query( $args );
		
		$site_name = get_bloginfo('name');
		$description = get_bloginfo('description');
		// Loop through posts
		if ( $the_query->have_posts() ) {
			echo '<div class="row">';
			echo '<div class="span12">';
			echo '<div class="banner-wrapper">';
			echo '<div class="slider-block">';
			echo '<div id="banner" class="skdslider">';
			echo '<ul>';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				// Getting template this way instead of using get_template_part() so variables are accessible
				include( locate_template( 'content-slide.php', false, false ) );
			}
			echo '</ul>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="banner-wrapper2 visible-m">
        		<h1 class="co-name">'.$site_name.'</h1>
                <p class="co-slogan">'.$description.'</p>
        	</div>';
			echo '</div>';
			echo '<div class="clear"></div>';
			echo '</div>';
			wp_reset_postdata();
		}
	}
}
/*
----------------------------------------------------------------------------------
    Create and output the header
----------------------------------------------------------------------------------
*/
if ( ! function_exists( 'im_front_hottopic_opinion' ) ) {
	function im_front_hottopic_opinion() {

		// Decide if slider should be displayed based on user's Customizer settings
		if ( ( !is_front_page() || is_paged() ) ) {
			return;
		}
		echo '<div class="row">
					<div clss="span12">';
		//prepare the query args
		$args['cat'] = '27';
		$args['posts_per_page'] = 2;
		$the_query = new WP_Query( $args );
		if( $the_query->have_posts()):
		echo '<div class="scroller-box">
                <div class="head-block-red">Hot Topics</div>
                    <div class="scroller-wrapper">
                        <div class="slider" id="scroller2">
                            <ul>';
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				// Getting template this way instead of using get_template_part() so variables are accessible
				include( locate_template( 'content-hot-topic.php', false, false ) );
			endwhile;
		echo ' </ul></div></div><div class="clear"></div></div>';
		endif;
		//prepare the query args
		$args['cat'] = '22';
		$args['posts_per_page'] = 2;
		$the_query = new WP_Query( $args );
		if( $the_query->have_posts()):
		echo '<div class="scroller-box">
                <div class="head-block-black">Opinions</div>
                    <div class="scroller-wrapper">
                        <div class="slider" id="scroller1">
                            <ul>';
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				// Getting template this way instead of using get_template_part() so variables are accessible
				include( locate_template( 'content-opinion.php', false, false ) );
			endwhile;
		echo ' </ul></div></div><div class="clear"></div></div>';
		endif;
		echo '';
		echo '</div></div>';
	}
}
/*
----------------------------------------------------------------------------------
    Create and output the header
----------------------------------------------------------------------------------
*/
if ( ! function_exists( 'im_minority_blog_header' ) ) {
	function im_minority_blog_header() {

		// Decide if slider should be displayed based on user's Customizer settings
		if ( is_front_page() ) {
			return;
		}
		$site_name = get_bloginfo('name');
		$description = get_bloginfo('description');
		echo '<div class="row">';
		echo '<div class="span12">';
		echo '<div class="banner-wrapper2">';
		echo '<h1 class="co-name">'.$site_name.'</h1>';
		echo '<p class="co-slogan">'.$description.'</p>';
		echo '</div>';
		echo '</div>';
		echo '<div class="clear"></div>';
		echo '</div>';
	}
}
/*
----------------------------------------------------------------------------------
    Template routing function. Setup to follow DRY coding patterns. 
    Using index.php file only instead of duplicating loop in page.php, post.php, etc.
----------------------------------------------------------------------------------
*/
if ( ! function_exists( 'im_minority_blog_get_content_template' ) ) {
	function im_minority_blog_get_content_template() {

		if ( is_home() || is_archive() ) {
			get_template_part( 'content-archive', get_post_type() );
		}else{
			get_template_part( 'content', get_post_type() );
		}
	}
}
if ( ! function_exists( 'im_minority_blog_get_content_template_front' ) ) {
	function im_minority_blog_get_content_template_front() {

		get_template_part( 'content-front', get_post_type() );
		
	}
}
/*
----------------------------------------------------------------------------------
	Remove the prefix of the archive title (content/archive-header) page
----------------------------------------------------------------------------------
*/
if ( ! function_exists( 'im_minority_blog_remove_archive_title_prefix' ) ) {
	function im_minority_blog_remove_archive_title_prefix( $title ){
		
    if( is_category() ) {
		$title = single_cat_title( '', false );
	}
	return $title;
	}
}
add_filter( 'get_the_archive_title', 'im_minority_blog_remove_archive_title_prefix');
/*
----------------------------------------------------------------------------------
   Output the Featured Image
----------------------------------------------------------------------------------
*/
if ( ! function_exists( 'im_minority_blog_featured_image' ) ) {
	function im_minority_blog_featured_image() {

		global $post;
		$featured_image = '';

		if ( has_post_thumbnail( $post->ID ) ) {
			if ( is_singular() ) {
				$featured_image = '<div class="img-holder-auto">' . get_the_post_thumbnail( $post->ID, 'full' ) . '</div>';
			} else {
				$featured_image = '<div class="img-holder2"><a href="' . esc_url( get_permalink() ) . '">' .  get_the_post_thumbnail( $post->ID, 'medium' ) . '</a></div>';
			}
		}

		$featured_image = apply_filters( 'im_minority_blog_featured_image', $featured_image );

		if ( $featured_image ) {
			echo $featured_image;
		}
	}
}
/*
----------------------------------------------------------------------------------
	Update excerpt length. Allow user input from Customizer.
----------------------------------------------------------------------------------
*/
if ( ! function_exists( 'im_minority_blog_custom_excerpt_length' ) ) {
	function im_minority_blog_custom_excerpt_length( $length ) {

		$new_excerpt_length = get_theme_mod( 'excerpt_length' );

		if ( ! empty( $new_excerpt_length ) && $new_excerpt_length != 30 ) {
			return $new_excerpt_length;
		} elseif ( $new_excerpt_length === 0 ) {
			return 0;
		} else {
			return 30;
		}
	}
}
add_filter( 'excerpt_length', 'im_minority_blog_custom_excerpt_length', 99 );
/*
----------------------------------------------------------------------------------
   Change the excerpt more text 
----------------------------------------------------------------------------------
*/
if ( ! function_exists( 'im_minority_new_excerpt_more' ) ) {
	function im_minority_new_excerpt_more($more) {
	   global $post;
	   return '&#8230; <a href="'. get_permalink($post->ID) . '">' . 'More &raquo;' . '</a>';
	}
}
add_filter('excerpt_more', 'im_minority_new_excerpt_more');
/*
---------------------------------------------------------------------------------------
	Display Data in People In News
---------------------------------------------------------------------------------------
*/
function im_minority_blog_people_in_news($atts) {
	extract( shortcode_atts( array (
        'category' => '',
		'post_count' => '',
    ), $atts ) );
// the query
$the_query = new WP_Query( array( 'cat' => $category, 'posts_per_page' => $post_count ) ); 
$string = ''; 
// The Loop
if ( $the_query->have_posts() ) {
    $string .= '<ul class="aside-listing">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
            if ( has_post_thumbnail() ) {
            $string .= '<li>';
            $string .= '<a href="' . get_the_permalink() .'" rel="bookmark" >' . get_the_post_thumbnail($post_id, 'thumbnail' ) .'<div >'. get_the_title() .'</div></a><div class="clear"></div></li>';
            } else { 
            // if no featured image is found
            $string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a><div class="clear"></div></li>';
            }
            }
    } else {
    // no posts found
}
$string .= '</ul>';
 
return $string;
 
/* Restore original Post Data */
wp_reset_postdata();
}
// Add a shortcode
add_shortcode('postold', 'im_minority_blog_people_in_news');
/*********************************/
/* Change Search Button Text
/**************************************/
 
// Add to your child-theme functions.php
add_filter('get_search_form', 'my_search_form_text');
function my_search_form_text($text) {
     $text = str_replace('value="Search"', 'value="&#xf002"', $text); //set as value the text you want
     return $text;
}
function im_home_url(){
	return 'theindianminority.org';
}
// Add a shortcode
add_shortcode('url', 'im_home_url');
 
// Enable shortcodes in menu
add_filter('wp_nav_menu_items', 'do_shortcode');
/*
---------------------------------------------------------------------------------------
	Display Data in More on indian Minority
---------------------------------------------------------------------------------------
*/
function im_minority_blog_more_on_minority($atts) {
// define attributes and their defaults
    extract( shortcode_atts( array (
        'category' => '',
		'post_count' => '',
    ), $atts ) );
// the query
$the_query = new WP_Query( array( 'cat' => $category, 'posts_per_page' => $post_count, 'meta_query' => array(array('key' => '_thumbnail_id')) ) ); 
 $string = '';
// The Loop
if ( $the_query->have_posts() ) {
    $string .= '<div class="inner1">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
            $string .= '<div class="img-holder-auto">';
            $string .=  get_the_post_thumbnail($post_id, 'thumbnail') .'</div>';
            }
    } else {
    // no posts found
}
$string .= '</div>';
 
return $string;
 
// Restore original Post Data 
wp_reset_postdata();
}
// Add a shortcode
add_shortcode('postwithborder', 'im_minority_blog_more_on_minority');
/*
---------------------------------------------------------------------------------------
	Display Data in Footer Blocks
---------------------------------------------------------------------------------------
*/
function im_minority_blog_post_in_list($atts) {
// define attributes and their defaults
    extract( shortcode_atts( array (
        'category' => '',
		'post_count' => '',
    ), $atts ) );
// the query
$the_query = new WP_Query( array( 'cat' => $category, 'posts_per_page' => $post_count ) ); 
 $string = '';
// The Loop
if ( $the_query->have_posts() ) {
    $string .= '<ul class="listing-bull">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark" >' . get_the_title() .'</a></li>';
        }
    } else {
    // no posts found
}
$string .= '</ul>';
 
return $string;
 
/* Restore original Post Data */
wp_reset_postdata();
}
// Add a shortcode
add_shortcode('postwithlist', 'im_minority_blog_post_in_list');
//-----------------------------------------------------------------------------------------------------------------------
/*Slider Images*/
function wpb_widgetImage() {
// the query
$the_query = new WP_Query( array( 'post_type' => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'post_parent__in' => array(368),
	'posts_per_page' => 50,
	) ); 
$string = '<div class="">
				   <div id="banner3" class="skdslider3">
						<ul>';
// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        // if no featured image is found
        $string .= '<li><img '.wp_get_attachment_image( $the_query->ID, 'thumbnail' ).'></li>';
        }
	
    } else {
    // no posts found
}
$string .= '</ul></div><div class="clear"></div></div>';
 
return $string;
 
/* Restore original Post Data */
wp_reset_postdata();
}
// Add a shortcode
add_shortcode('widgetImage', 'wpb_widgetImage');
?>