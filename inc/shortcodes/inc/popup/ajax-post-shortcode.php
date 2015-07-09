<?php

add_action('wp_ajax_sp_post_shortcode', 'sp_post_shortcode_ajax' );

function sp_post_shortcode_ajax(){
	$defaults = array(
		'post' => null
	);
	$args = array_merge( $defaults, $_GET );
	?>

	<div id="sc-post-form">
			<table id="sc-post-table" class="form-table">
				<tr>
					<?php $field = 'term_id'; ?>
					<th><label for="<?php echo $field; ?>"><?php _e( 'Select category: ', 'sptheme_admin' ); ?></label></th>
					<td>
						<select name="<?php echo $field; ?>" id="<?php echo $field; ?>">
							<?php
							$args = array(
							  'hide_empty'	=> 0,
							  'orderby' => 'name',
							  'parent' => 0
							  );
							$categories = get_categories( $args );
							foreach ( $categories as $cat ) {
								echo '<option class="level-0" value="' . $cat->term_id . '">' . $cat->name . '</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<?php $field = 'post_style'; ?>
					<th><label for="<?php echo $field; ?>"><?php _e( 'Post style: ', 'sptheme_admin' ); ?></label></th>
					<td>
						<select name="<?php echo $field; ?>" id="<?php echo $field; ?>">
							<option value="modern" selected>Modern</option>
							<option value="classic">Classic</option>
						</select>
					</td>
				</tr>
				<tr>
					<?php $field = 'cols'; ?>
					<th><label for="<?php echo $field; ?>"><?php _e( 'Post column: ', 'sptheme_admin' ); ?></label></th>
					<td>
						<select name="<?php echo $field; ?>" id="<?php echo $field; ?>">
							<option value="none" selected>None</option>
							<option value="two-fourth">2</option>
							<option value="one-third">3</option>
							<option value="one-fourth">4</option>
						</select>
					</td>
				</tr>
				<tr>
					<?php $field = 'post_num'; ?>
					<th><label for="<?php echo $field; ?>"><?php _e( 'Number post: ', 'sptheme_admin' ); ?></label></th>
					<td>
						<input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" value="-1" /> <smal>(-1 for show all)</small>
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="button" id="option-submit" class="button-primary" value="<?php _e( 'Add Post', 'sptheme_admin' ); ?>" name="submit" />
			</p>
	</div>			

	<?php
	exit();	
}
?>