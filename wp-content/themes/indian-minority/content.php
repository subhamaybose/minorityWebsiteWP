<div <?php post_class(); ?>>
	<?php do_action( 'startup_blog_post_before' ); ?>
	<div class="headline-blue">
         <h3>
		<?php
			 if (!is_page()){
			 $post_id = get_the_ID(); // or use the post id if you already have it
			 $category_object = get_the_category($post_id);
			 $category_name = $category_object[0]->name;
			 echo $category_name;
			}else{
				the_title();
			 }
	    ?></h3>
         <div class="clear"></div>
    </div>
	<div class="inner1 grey-divider">
		<h3 class="caption"><?php if( !is_page() ){the_title();} ?></h3>
		<?php im_minority_blog_featured_image(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array(
				'before' => '<p class="singular-pagination">' . esc_html__( 'Pages:', 'im-minority' ),
				'after'  => '</p>',
		) ); ?>
		<?php do_action( 'minority_blog_post_after' ); ?>	
		<div class="post-meta">
			<?php if( !is_page() ){?>
			<?php get_template_part( 'content/post-byline' );?>
			<?php } ?>
			<?php get_template_part( 'content/post-author' ); ?>
			<?php get_template_part( 'content/post-categories' ); ?>
			<?php get_template_part( 'content/post-tags' ); ?>
		</div>
	<?php
		$post_id = $post->ID; // current post ID
		$cat = get_the_category(); 
		$current_cat_id = $cat[0]->cat_ID; // current category ID 

		$args = array( 
			'category' => $current_cat_id,
			'orderby'  => 'post_date',
			'order'    => 'DESC'
		);
		$posts = get_posts( $args );
		// get IDs of posts retrieved from get_posts
		$ids = array();
		foreach ( $posts as $thepost ) {
			$ids[] = $thepost->ID;
		}
		// get and echo previous and next post in the same category
		$thisindex = array_search( $post_id, $ids );
		$previd    = isset( $ids[ $thisindex - 1 ] ) ? $ids[ $thisindex - 1 ] : 0;
		$nextid    = isset( $ids[ $thisindex + 1 ] ) ? $ids[ $thisindex + 1 ] : 0;
		?>
		<div class="postbtn">
		<?php
		if( !is_page() ){	
		if ( $previd ) {
			?><a class="previous" rel="prev" href="<?php echo get_permalink($previd) ?>">Previous Post</a><?php
		}
		if ( $nextid ) {
			?><a class="next" rel="next" href="<?php echo get_permalink($nextid) ?>">Next Post</a><?php
		}
		}
	?>
		</div>	
	</div>
</div>
<?php comments_template(); ?>
