<?php 
wp_nav_menu(
	array(
		'theme_location'  => 'footer',
		'container'       => 'nav',
		'container_class' => 'menu',
		'menu_class'      => 'bottom-nav',
		'menu_id'         => 'bottom-nav',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
	) ); 
?>
