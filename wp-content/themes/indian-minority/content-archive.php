<div <?php post_class(); ?>>
	<?php do_action( 'im_minority_blog_archive_post_before' ); ?>
		<div class="inner1 grey-divider">
			<div class="cntactBlock">
				<?php im_minority_blog_featured_image(); ?>
				<h3 class="red-text">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
				</h3>
				<?php echo wp_kses_post( wpautop( get_the_excerpt() ) ); ?>
				<div class="clear"></div>
			</div>
		</div>
	<?php do_action( 'im_minority_blog_archive_post_after' ); ?>
</div>
