<?php
global $post;
?>
<li>
	<img src="<?php the_post_thumbnail_url(); ?>" alt="" />
	<div class="slide-desc">
		<h1><?php bloginfo( 'name' ); ?></h1>
		<p><?php bloginfo( 'description' ); ?></p>
	</div>
</li>