<?php
/**
 * Klahan9 child functions and definitions
 *
 * @package Klahan9 child
 */

	
function wpsp_touch_scripts_styles() {

	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	if ( is_page_template( 'page-templates/page-home.php' ) ) {
		wp_enqueue_style('menu-fullpage', WPSP_CSS_DIR_URI . 'jquery.fullPage.css');
		wp_enqueue_style('menu-mobile', WPSP_CSS_DIR_URI . 'front-page-mobile.css');
		wp_enqueue_script( 'klahan9-fullpage', WPSP_JS_DIR_URI . 'jquery.fullPage.min.js', array('jquery'), WPSP_THEME_VERSION, false );
		wp_enqueue_script( 'front-page-mobile', WPSP_JS_DIR_URI . 'front-page-mobile.js', array('jquery'), WPSP_THEME_VERSION, true );
	}

}	
add_action('wp_enqueue_scripts', 'wpsp_touch_scripts_styles'); //print Script and CSS