<?php 
wp_nav_menu(
	array(
		'theme_location'  => 'secondary',
		'container'       => 'nav',
		'container_class' => 'menu',
		'menu_class'      => 'top-nav',
		'menu_id'         => 'top-nav',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
	) ); 
?>
