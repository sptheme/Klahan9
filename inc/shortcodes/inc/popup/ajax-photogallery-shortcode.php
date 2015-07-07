<?php

add_action('wp_ajax_wpsp_photogallery_shortcode', 'wpsp_photogallery_shortcode' );

function sp_photogallery_shortcode(){
	$defaults = array(
		'photogallery' => null
	);
	$args = array_merge( $defaults, $_GET );
	?>

	<div id="sc-photogallery-form">
			<table id="sc-photogallery-table" class="form-table">
				<tr>
					<?php $field = 'album_id'; ?>
					<th><label for="<?php echo $field; ?>"><?php _e( 'Select album: ', 'wpsp_shortcode' ); ?></label></th>
					<td>
						<select name="<?php echo $field; ?>" id="<?php echo $field; ?>">
							<option class="level-0" value="-1"><?php _e( 'All albums', 'wpsp_shortcode' ); ?></option>
							<?php
							$args = (array(
								'post_type' => 'gallery',
								'post_per_pages' => -1
							));
							$posts = get_posts( $args );
							foreach ( $posts as $post ) {
								echo '<option class="level-0" value="' . $post->ID . '">' . $post->post_title . '</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<?php $field = 'post_num'; ?>
					<th><label for="<?php echo $field; ?>"><?php _e( 'Number of photo/album: ', 'wpsp_shortcode' ); ?></label></th>
					<td>
						<input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" value="10" /> <smal>(-1 for show all)</small>
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="button" id="option-submit" class="button-primary" value="<?php _e( 'Add photogallery', 'wpsp_shortcode' ); ?>" name="submit" />
			</p>
	</div>			

	<?php
	exit();	
}
?>