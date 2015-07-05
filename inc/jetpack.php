<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Klahan9
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function wpsp_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'wpsp_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function wpsp_jetpack_setup
add_action( 'after_setup_theme', 'wpsp_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function wpsp_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'partials/content', get_post_format() );
	}
} // end function wpsp_infinite_scroll_render
