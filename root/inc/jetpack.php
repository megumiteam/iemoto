<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package {%= title %}
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function {%= prefix %}_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => '{%= prefix %}_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function {%= prefix %}_jetpack_setup
add_action( 'after_setup_theme', '{%= prefix %}_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function {%= prefix %}_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function {%= prefix %}_infinite_scroll_render
