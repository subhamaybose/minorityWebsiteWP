<?php
global $post;
?>
<li>
	<div class="scroll-box2">
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="caption"><?php the_title(); ?></a>
	<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="" />
	</br>
	</div>
</li>