<?php
add_action('init', 'wpsp_tax_launcher_category_init', 0);

function wpsp_tax_launcher_category_init() {
	register_taxonomy(
		'launcher_category',
		array( 'cp_launcher' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Launcher Categories', 'wpsp' ),
				'singular_name' => __( 'Launcher Categories', 'wpsp' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'launcher-category' ),
			'show_in_nav_menus' => false
		)
	);
}