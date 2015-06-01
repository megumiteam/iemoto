<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package {%= title %}
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php do_action( '{%= prefix %}_before_secondary' ); ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php do_action( '{%= prefix %}_after_secondary' ); ?>
</div><!-- #secondary -->
