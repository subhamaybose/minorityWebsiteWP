<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ):?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="header">
			<div class="top-header">
				<div class="row">
					<div class="span6">
						<?php im_minority_blog_social_icons_output(); ?>
					</div>
					<div class="span6">
						<?php if ( has_nav_menu( 'secondary' ) ) : ?>
							<?php get_template_part( 'menu', 'secondary' ); ?>
						<?php endif; ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<?php im_minority_blog_slider(); ?>
			<?php im_minority_blog_header(); ?>
			<div class="nav-wrapper">
				<div class="row">
					<div class="span12">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<?php get_template_part( 'menu', 'primary' ); ?>
						<?php endif; ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="content-wrapper">
                <?php im_front_hottopic_opinion();?>
		<?php if ( is_front_page() ) { ?>	
			<div class="row">
				<div class="span3">
					<?php get_sidebar( 'left' ); ?>
				</div>
				<div class="span6">
					<div class="aside-block-grey">
						<div class="headline-red">
							<h3><strong>COUNTERACT:</strong> Majority Perception</h3>
							<div class="clear"></div>
						</div>
		<?php } ?>	
				