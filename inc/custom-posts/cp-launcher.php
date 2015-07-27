<?php
/*
*****************************************************
* Launcher custom post
*
* CONTENT:
* - 1) Actions and filters
* - 2) Creating a custom post
* - 3) Custom post list in admin
*****************************************************
*/





/*
*****************************************************
*      1) ACTIONS AND FILTERS
*****************************************************
*/
	//ACTIONS
		//Registering CP
		add_action( 'init', 'wpsp_launcher_cp_init' );
		//CP list table columns
		add_action( 'manage_posts_custom_column', 'wpsp_launcher_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-cp_launcher_columns', 'wpsp_launcher_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'wpsp_launcher_cp_init' ) ) {
		function wpsp_launcher_cp_init() {
			global $cp_menu_position;

			$labels = array(
				'name'               => __( 'Launchers', 'wpsp' ),
				'singular_name'      => __( 'Launcher', 'wpsp' ),
				'add_new'            => __( 'Add New', 'wpsp' ),
				'all_items'          => __( 'All Launcher', 'wpsp' ),
				'add_new_item'       => __( 'Add New Launcher', 'wpsp' ),
				'new_item'           => __( 'Add New Launcher', 'wpsp' ),
				'edit_item'          => __( 'Edit Launcher', 'wpsp' ),
				'view_item'          => __( 'View Launcher', 'wpsp' ),
				'search_items'       => __( 'Search Launcher', 'wpsp' ),
				'not_found'          => __( 'No Launcher found', 'wpsp' ),
				'not_found_in_trash' => __( 'No Launcher found in trash', 'wpsp' ),
				'parent_item_colon'  => __( 'Parent Launcher', 'wpsp' ),
			);	

			$role     = 'post'; // page
			$slug     = 'launcher';
			$supports = array('title', 'editor', 'thumbnail', 'post-formats'); // 'title', 'editor', 'thumbnail', 'post-formats'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_launcher'],
				'menu_icon'           	=> 'dashicons-megaphone',
				'supports'              => $supports,
				'capability_type'     	=> $role,
				'query_var'           	=> true,
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_nav_menus'	    => false,
				'publicly_queryable'	=> true,
				'exclude_from_search'   => false,
				'has_archive'			=> false,
				'can_export'			=> true
			);
			register_post_type( 'cp_launcher' , $args );
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
	if ( ! function_exists( 'wpsp_launcher_cp_columns' ) ) {
		function wpsp_launcher_cp_columns( $columns ) {
			
			$columns['cb']                  = '<input type="checkbox" />';
			$columns['launcher_thumbnail']	= __( 'Thumbnail', 'wpsp' );
			$columns['title']               = __( 'Title', 'wpsp' );
			$columns['launcher_category']   = __( 'Launcher Sections', 'wpsp' );
			$columns['date']		 		= __( 'Date', 'wpsp' );

			return $columns;
		}
	}

	/*
	* Outputting values for the custom columns in the table
	*
	* $Col = TEXT [column id for switch]
	*/
	if ( ! function_exists( 'wpsp_launcher_cp_custom_column' ) ) {
		function wpsp_launcher_cp_custom_column( $column ) {
			global $post;
			
			switch ( $column ) {
				case "launcher_thumbnail":
					echo get_the_post_thumbnail( $post->ID, array(50, 50) );
				break;

				case "launcher_category":
					$terms = get_the_terms( $post->ID, 'launcher_category' );

					if ( empty( $terms ) )
					break;
	
					$output = array();
	
					foreach ( $terms as $term ) {
						
						$output[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'launcher_category' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'launcher_category', 'display' ) )
						);
	
					}
	
					echo join( ', ', $output );
				break;
				
				default:
				break;
			}
		}
	} // /wpsp_launcher_cp_custom_column

	
	