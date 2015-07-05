<?php
/**
 * The sidebar containing quick navigation in footer widget area.
 *
 * @package Klahan9
 */

if ( ! is_active_sidebar( 'footer-widget-area' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'footer-widget-area' ); ?>

