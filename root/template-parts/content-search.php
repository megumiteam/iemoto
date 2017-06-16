<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package {%= title %}
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php do_action( '{%= prefix %}_before_entry_header' ); ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php {%= prefix %}_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php do_action( '{%= prefix %}_after_entry_header' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php do_action( '{%= prefix %}_before_entry_summary' ); ?>
		<?php the_excerpt(); ?>
		<?php do_action( '{%= prefix %}_after_entry_summary' ); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php {%= prefix %}_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
