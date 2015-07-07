<?php
add_action('init', 'sp_tax_gallery_category_init', 0);

function sp_tax_gallery_category_init() {
	register_taxonomy(
		'gallery_category',
		array( 'cp_gallery' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Gallery Categories', 'sptheme_admin' ),
				'singular_name' => __( 'Gallery Categories', 'sptheme_admin' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'gallery-category' ),
			'show_in_nav_menus' => false
		)
	);
}