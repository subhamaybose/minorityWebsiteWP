<?php
global $post;
?>
<li>
	<div class="scroll-box1">
	<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="" />
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="caption"><?php the_title(); ?></a>
	</br>
	</div>
</li>