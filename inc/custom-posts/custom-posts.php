<?php
/**
 * Custom post type.
 *
 *
 * @package Klahan9
 */

//Custom post WordPress admin menu position - 30, 33, 39, 42, 45, 48
if ( ! isset( $cp_menu_position ) )
	$cp_menu_position = array(
			'menu_team'      => 30,
            'menu_gallery'   => 33,
            'menu_launcher'   => 39
		);

//All custom posts
load_template( WPSP_INCS . 'custom-posts/cp-team.php' );
load_template( WPSP_INCS . 'custom-posts/cp-gallery.php' );
load_template( WPSP_INCS . 'custom-posts/cp-launcher.php' );

//Taxonomies
load_template( WPSP_INCS . 'custom-posts/taxonomy-team.php' );
load_template( WPSP_INCS . 'custom-posts/taxonomy-gallery.php' );
load_template( WPSP_INCS . 'custom-posts/taxonomy-launcher.php' );
	
/*==========================================================================*/

//Change title text when creating new post
if ( is_admin() )
	add_filter( 'enter_title_here', 'sp_change_new_post_title' );	
	
/*
* Changes "Enter title here" text when creating new post
*/
if ( ! function_exists( 'sp_change_new_post_title' ) ) {
	function sp_change_new_post_title( $title ){
		$screen = get_current_screen();

		if ( 'gallery' == $screen->post_type )
			$title = __( "Album name", 'wpsp' );

		return $title;
	}
} // /sp_change_new_post_title