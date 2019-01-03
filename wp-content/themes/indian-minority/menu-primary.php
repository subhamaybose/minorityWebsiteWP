<?php 
wp_nav_menu(
	array(
		'theme_location'  => 'primary',
		'container'       => 'nav',
		'container_class' => 'menu',
		'menu_class'      => 'nav',
		'menu_id'         => 'nav',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'walker' => new CSS_Menu_Maker_Walker()
	) ); 
?>
