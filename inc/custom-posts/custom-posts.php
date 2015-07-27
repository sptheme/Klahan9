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
if ( ! function_exists( 'sp_change_new_post_title' ) ) :
function sp_change_new_post_title( $title ){
	$screen = get_current_screen();

	if ( 'gallery' == $screen->post_type )
		$title = __( "Album name", 'wpsp' );

	return $title;
}
endif; // /sp_change_new_post_title

/**
 *	Different Post Formats per Post Type
 */
function sp_adjust_post_formats() {
    
    if (isset($_GET['post'])) {
		$post = get_post($_GET['post']);
		if ($post)
			$post_type = $post->post_type;
    } elseif ( !isset($_GET['post_type']) )
        $post_type = 'post';
    elseif ( in_array( $_GET['post_type'], get_post_types( array('show_ui' => true ) ) ) )
        $post_type = $_GET['post_type'];
    else
        return; // Page is going to fail anyway
 
    if ( 'cp_launcher' == $post_type )
        add_theme_support( 'post-formats', array( 'video', 'audio' ) );

};
add_action( 'load-post.php','sp_adjust_post_formats' );
add_action( 'load-post-new.php','sp_adjust_post_formats' );