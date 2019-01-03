<?php get_header(); ?>
<?php get_template_part( 'content/archive-header' ); ?>
<?php get_template_part( 'content/post-header' ); ?>
	<div id="loop-container" class="loop-container">
        <?php
		if ( is_front_page() ) {
			$args['cat'] = '21';
			$args['posts_per_page'] = 7;
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					im_minority_blog_get_content_template_front();
				endwhile;
			endif;
		}else{
			if ( have_posts() ) {
            while ( have_posts() ) :
                the_post();
                im_minority_blog_get_content_template();
            endwhile;
			}else{
				echo '<div <?php post_class(); ?>
					<?php do_action( "im_minority_blog_archive_post_before" ); ?>
						<div class="inner1 grey-divider">
							<div class="cntactBlock">
								<h3 class="red-text">
									Sorry No Post Available.
								</h3>
								<div class="clear"></div>
							</div>
						</div>
					<?php do_action( "im_minority_blog_archive_post_after" ); ?>
				</div>';
			}
		}
		?>
    </div>
<?php
// Output pagination if Jetpack not installed, otherwise check if infinite scroll is active before outputting
if ( !is_front_page() ) {
	if ( !class_exists( 'Jetpack' ) ) {
		the_posts_pagination( array(
			'mid_size' => 1,
			'prev_text' => '',
			'next_text' => ''
		) );
	} elseif ( !Jetpack::is_module_active( 'infinite-scroll' ) ) {
		the_posts_pagination( array(
			'mid_size' => 1,
			'prev_text' => '',
			'next_text' => ''
		) );
	}
}
?>
<?php get_footer(); ?>