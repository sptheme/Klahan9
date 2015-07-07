<?php
/*
*****************************************************
* Gallery custom post
*
* CONTENT:
* - 1) Actions and filters
* - 2) Creating a custom post
* - 3) Custom post list in admin
* - 4) Hook functions
*****************************************************
*/





/*
*****************************************************
*      1) ACTIONS AND FILTERS
*****************************************************
*/
	//ACTIONS
		//Registering CP
		add_action( 'init', 'wpsp_gallery_cp_init' );
		//CP list table columns
		add_action( 'manage_posts_custom_column', 'wpsp_gallery_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-gallery_columns', 'wpsp_gallery_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'wpsp_gallery_cp_init' ) ) {
		function wpsp_gallery_cp_init() {
			global $cp_menu_position;

			
			$labels = array(
				'name'               => __( 'Photo Gallery', 'sptheme_admin' ),
				'singular_name'      => __( 'Photo', 'sptheme_admin' ),
				'add_new'            => __( 'Add New', 'sptheme_admin' ),
				'all_items'          => __( 'Photo Gallery', 'sptheme_admin' ),
				'add_new_item'       => __( 'Add New Album', 'sptheme_admin' ),
				'new_item'           => __( 'Add New Album', 'sptheme_admin' ),
				'edit_item'          => __( 'Edit Album', 'sptheme_admin' ),
				'view_item'          => __( 'View Album', 'sptheme_admin' ),
				'search_items'       => __( 'Search Album', 'sptheme_admin' ),
				'not_found'          => __( 'No Album found', 'sptheme_admin' ),
				'not_found_in_trash' => __( 'No Album found in trash', 'sptheme_admin' ),
				'parent_item_colon'  => __( 'Parent Album', 'sptheme_admin' ),
			);	

			$role     = 'post'; // page
			$slug     = 'gallery';
			$supports = array('title', 'editor', 'thumbnail'); // 'title', 'editor', 'thumbnail'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_gallery'],
				'menu_icon'           	=> 'dashicons-images-alt2',
				'supports'              => $supports,
				'capability_type'     	=> $role,
				'query_var'           	=> true,
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_nav_menus'	    => false,
				//'show_in_menu'			=> 'edit.php',
				'publicly_queryable'	=> true,
				'exclude_from_search'   => false,
				'has_archive'			=> false,
				'can_export'			=> true
			);
			register_post_type( 'cp_gallery' , $args );
		}
	} 


/*
*****************************************************
*      3) CUSTOM POST LIST IN ADMIN
*****************************************************
*/
	/*
	* Registration of the table columns
	*
	* $Cols = ARRAY [array of columns]
	*/
	if ( ! function_exists( 'wpsp_gallery_cp_columns' ) ) {
		function wpsp_gallery_cp_columns( $columns ) {
			
			$columns = array(
				'cb'                   	=> '<input type="checkbox" />',
				'gallery_thumbnail'	   	=> __( 'Thumbnail', 'sptheme_admin' ),
				'title'                	=> __( 'Album Name', 'sptheme_admin' ),
				'gallery_category'      => __( 'Album Category', 'sptheme_admin' ),
				'date'		 			=> __( 'Date', 'sptheme_admin' )
			);

			return $columns;
		}
	}

	/*
	* Outputting values for the custom columns in the table
	*
	* $Col = TEXT [column id for switch]
	*/
	if ( ! function_exists( 'wpsp_gallery_cp_custom_column' ) ) {
		function wpsp_gallery_cp_custom_column( $column ) {
			global $post;
			
			switch ( $column ) {
				case "gallery_thumbnail":
					echo get_the_post_thumbnail( $post->ID, array(50, 50) );
				break;

				case "gallery_category":
					$terms = get_the_terms( $post->ID, 'gallery_category' );

					if ( empty( $terms ) )
					break;
	
					$output = array();
	
					foreach ( $terms as $term ) {
						
						$output[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'gallery_category' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'gallery_category', 'display' ) )
						);
	
					}
	
					echo join( ', ', $output );
				break;
				
				default:
				break;
			}
		}
	} // /wpsp_gallery_cp_custom_column

/*
*****************************************************
*      4) CUSTOM POST HOOK FUNCTIONS
*****************************************************
*/
function wpsp_custom_admin_post_thumbnail_html( $content ) {
	
	if (isset($_GET['post'])) {
		$post = get_post($_GET['post']);
		if ($post)
            $post_type = $post->post_type;
	} elseif ( !isset($_GET['post_type']) )
        $post_type = 'post';
    elseif ( in_array( $_GET['post_type'], get_post_types( array('show_ui' => true ) ) ) )
        $post_type = $_GET['post_type'];
    else
        return;
    
	if ( $post_type == 'gallery' ) :
    	return $content = str_replace( __( 'Set featured image' ), __( 'Set Cover album' ), $content);
    else :
    	return $content;
    endif;
}
add_filter( 'admin_post_thumbnail_html', 'wpsp_custom_admin_post_thumbnail_html' );

function wpsp_gallery_set_featured_image() {
 	// Remove the orginal "Set Featured Image" Metabox
	remove_meta_box('postimagediv', 'gallery', 'side');
 	// Add it again with another title
	add_meta_box('postimagediv', __('Cover Album'), 'post_thumbnail_meta_box', 'gallery', 'side', 'default');
}
add_action('do_meta_boxes', 'wpsp_gallery_set_featured_image');