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
			//'menu_slideshow' => 30,
            'menu_team'      => 33,
            'menu_gallery'   => 39
		);

//All custom posts
load_template( WPSP_INCS . 'custom-posts/cp-team.php' );
load_template( WPSP_INCS . 'custom-posts/cp-gallery.php' );

//Taxonomies
load_template( WPSP_INCS . 'custom-posts/taxonomy-team.php' );
load_template( WPSP_INCS . 'custom-posts/taxonomy-gallery.php' );
	
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
			$title = __( "Album name", 'sptheme_admin' );

		return $title;
	}
} // /sp_change_new_post_title