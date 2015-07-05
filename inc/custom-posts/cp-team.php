<?php
/*
*****************************************************
* Team custom post
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
		add_action( 'init', 'wpsp_team_cp_init' );
		//CP list table columns
		add_action( 'manage_posts_custom_column', 'wpsp_team_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-team_columns', 'wpsp_team_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'wpsp_team_cp_init' ) ) {
		function wpsp_team_cp_init() {
			global $cp_menu_position;

			$labels = array(
				'name'               => __( 'Teams', 'wpsp' ),
				'singular_name'      => __( 'Team', 'wpsp' ),
				'add_new'            => __( 'Add New', 'wpsp' ),
				'all_items'          => __( 'All Team', 'wpsp' ),
				'add_new_item'       => __( 'Add New Team', 'wpsp' ),
				'new_item'           => __( 'Add New Team', 'wpsp' ),
				'edit_item'          => __( 'Edit Team', 'wpsp' ),
				'view_item'          => __( 'View Team', 'wpsp' ),
				'search_items'       => __( 'Search Team', 'wpsp' ),
				'not_found'          => __( 'No Team found', 'wpsp' ),
				'not_found_in_trash' => __( 'No Team found in trash', 'wpsp' ),
				'parent_item_colon'  => __( 'Parent Team', 'wpsp' ),
			);	

			$role     = 'post'; // page
			$slug     = 'team';
			$supports = array('title', 'editor', 'thumbnail'); // 'title', 'editor', 'thumbnail', 'post-formats'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_team'],
				'menu_icon'           	=> 'dashicons-groups',
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
			register_post_type( 'team' , $args );
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
	if ( ! function_exists( 'wpsp_team_cp_columns' ) ) {
		function wpsp_team_cp_columns( $columns ) {
			
			$columns = array(
				'cb'                   	=> '<input type="checkbox" />',
				'team_thumbnail'	   	=> __( 'Thumbnail', 'wpsp' ),
				'title'                	=> __( 'Title', 'wpsp' ),
				'team_category'        => __( 'Team Sections', 'wpsp' ),
				'date'		 			=> __( 'Date', 'wpspn' )
			);

			return $columns;
		}
	}

	/*
	* Outputting values for the custom columns in the table
	*
	* $Col = TEXT [column id for switch]
	*/
	if ( ! function_exists( 'wpsp_team_cp_custom_column' ) ) {
		function wpsp_team_cp_custom_column( $column ) {
			global $post;
			
			switch ( $column ) {
				case "team_thumbnail":
					echo get_the_post_thumbnail( $post->ID, array(50, 50) );
				break;

				case "team_category":
					$terms = get_the_terms( $post->ID, 'team_category' );

					if ( empty( $terms ) )
					break;
	
					$output = array();
	
					foreach ( $terms as $term ) {
						
						$output[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'team_category' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'team_category', 'display' ) )
						);
	
					}
	
					echo join( ', ', $output );
				break;
				
				default:
				break;
			}
		}
	} // /wpsp_team_cp_custom_column

	
	