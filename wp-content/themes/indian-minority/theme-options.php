<?php
/*
----------------------------------------------------------------------------------
	Register Custom Post Type Slider
----------------------------------------------------------------------------------
*/
if ( ! function_exists( ( 'im_minority_blog_theme_register_slider' ) ) ) {
	function im_minority_blog_theme_register_slider() {
		$singular = 'Slider';
		$plural = 'Sliders';
		$labels = array(
			'name'=> $plural,
			'singular_name'        => $singular,
			'add_name'             => 'Add New',
			'add_new_item'         => 'Add New '.$singular,
			'edit'                 => 'Edit',
			'edit_item'            => 'Edit '.$singular,
			'new_item'             => 'New '.$singular,
			'view'                 => 'View '.$singular,
			'view_item'            => 'View '.$singular,
			'search_item'          => 'Search '.$plural,
			'parent'               => 'Search '.$singular,
			'not_found'            => 'No '.$plural.' found',
			'not_found_in_trash'   => 'No '.$plural.' In Trash'
		);
		$args = array(
			'labels'             => $labels,
            'public'             => true,
			'publicly_queryable' => true,
			'exclude_from_search'=> false,
			'show_in_nav_menus'  => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_admin_bar'  => true,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-images-alt2',
			'can_export'         => true,
			'delete_with_user'   => false,
			'hierarchical'       => false,
			'has_archive'        => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'map_meta_cap'       => true,
			'rewrite'            => array( 
				'slug'       => 'sliders',
				'with_front' => true,
				'pages'      => true,
				'feeds'      => false
			),
			'supports'           => array( 'title', 'thumbnail')
		);
		register_post_type( 'slider', $args );
	}
}
add_action( 'init', 'im_minority_blog_theme_register_slider');
/*
----------------------------------------------------------------------------------
	Add custom column in Custom Post Type Slider
----------------------------------------------------------------------------------
*/
function featured_image_add_column($columns) 
{
	$columns['featured_image'] = 'Slider Image';
	return $columns;
}
add_filter('manage_slider_posts_columns', 'featured_image_add_column');
function featured_image_render_post_columns($column_name, $id) 
{
	if($column_name == 'featured_image')
	{
		$thumb = get_the_post_thumbnail( $id, array(320,240) );
		if($thumb) { echo $thumb; }
	}
}
add_action('manage_slider_posts_custom_column', 'featured_image_render_post_columns', 10, 2);
function column_order($columns) {
  $n_columns = array();
  $move = 'featured_image'; // what to move
  $before = 'date'; // move before this
  foreach($columns as $key => $value) {
    if ($key==$before){
      $n_columns[$move] = $move;
    }
      $n_columns[$key] = $value;
  }
  return $n_columns;
}
add_filter('manage_slider_posts_columns', 'column_order');
?>