<?php
//----------------------------------------------------------------------------------
// Load scripts and stylesheets for the front-end
//----------------------------------------------------------------------------------
if ( ! function_exists( ( 'im_minority_blog_load_scripts_styles' ) ) ) {
	function im_minority_blog_load_scripts_styles() {
		/*Styles of CSS Folder*/
		wp_enqueue_style( 'im-minority-blog-default', get_template_directory_uri() . '/css/default.css', array(), '1.0.0', 'all');
		wp_enqueue_style( 'im-minority-blog-frames', get_template_directory_uri() . '/css/frames.css', array(), '1.0.0', 'all');
		wp_enqueue_style( 'im-minority-blog-silknav', get_template_directory_uri() . '/css/slicknav.css', array(), '1.0.0', 'all');
		wp_enqueue_style( 'im-minority-blog-skdslider', get_template_directory_uri() . '/css/skdslider.css', array(), '1.0.0', 'all');
		wp_enqueue_style( 'im-minority-blog-scroller', get_template_directory_uri() . '/css/scroller.css', array(), '1.0.0', 'all');
		wp_enqueue_style( 'im-minority-blog-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0.0', 'all');
		wp_enqueue_style( 'im-minority-blog-light-box', get_template_directory_uri() . '/css/light-box.css', array(), '1.0.0', 'all');
		wp_enqueue_style( 'im-minority-blog-lightbox2', get_template_directory_uri() . '/css/lightbox2.css', array(), '1.0.0', 'all');
		wp_enqueue_style( 'im-minority-blog-style', get_stylesheet_uri(), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css' );
		/*Online Fonts*/
		wp_enqueue_style( 'im-minority-blog-google-fonts-karla', 'http://fonts.googleapis.com/css?family=Karla:400,700' );
		wp_enqueue_style( 'im-minority-blog-google-fonts-roboto', 'http://fonts.googleapis.com/css?family=Roboto' );
		wp_enqueue_style( 'im-minority-blog-google-fonts-roboto-condensed', 'http://fonts.googleapis.com/css?family=Roboto+Condensed' );
		wp_enqueue_style( 'im-minority-blog-google-fonts-roboto-slab', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100' );
		wp_enqueue_style( 'im-minority-blog-google-fonts-montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:400,700' );
		/*Scripts of JS folder */
		wp_register_script( 'im-minority-jquery', get_template_directory_uri() . '/js/jquery.js', array(), '1.9.1', 'true');
		wp_enqueue_script( 'im-minority-jquery');
		wp_enqueue_script( 'im-minority-skdslider', get_template_directory_uri() . '/js/skdslider.js', array('jquery'), '1.0.0', 'true');
		wp_enqueue_script( 'im-minority-modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'), '1.0.0', 'true');
		wp_enqueue_script( 'im-minority-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), '1.0.0', 'true');
		wp_enqueue_script( 'im-minority-easing', get_template_directory_uri() . '/js/jquery.easing.js', array('jquery'), '1.0.0', 'true');
		//wp_enqueue_script( 'im-minority-lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '1.0.0', 'true');
	}
}
add_action( 'wp_enqueue_scripts', 'im_minority_blog_load_scripts_styles' );
//----------------------------------------------------------------------------------
// Localize scripts for the front-end
//----------------------------------------------------------------------------------
if ( ! function_exists( ( 'im_minority_blog_localize_slider_scripts' ) ) ) {
	function im_minority_blog_localize_slider_scripts() {
		// Decide if slider should be displayed based on user's Customizer settings
		if ( ( !is_front_page() || is_paged() ) ) {
			return;
		}
?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#banner').skdslider({
					'delay': 5000,
					'fadeSpeed': 800,
					'showNextPrev': true,
					'showPlayButton': true,
					'autoStart': true
				});
				jQuery('#banner2').skdslider({
					'delay': 5000,
					'fadeSpeed': 800,
					'showNextPrev': false,
					'showPlayButton': false,
					'autoStart': true
				});
				jQuery('#banner3').skdslider({
					'delay': 5000,
					'fadeSpeed': 800,
					'showNextPrev': false,
					'showPlayButton': false,
					'autoStart': true
				});
			});
		</script>	
<?php
	}
}
add_action( 'wp_head', 'im_minority_blog_localize_slider_scripts' );
//----------------------------------------------------------------------------------
// Localize silknav scripts for the front-end
//----------------------------------------------------------------------------------
if ( ! function_exists( ( 'im_minority_blog_localize_silknav_scripts' ) ) ) {
	function im_minority_blog_localize_silknav_scripts() {
?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				$('.nav').slicknav();
			});
		</script>	
<?php
	}
}
add_action( 'wp_head', 'im_minority_blog_localize_silknav_scripts' );
?>