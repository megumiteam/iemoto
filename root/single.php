<?php
/**
 * The Template for displaying all single posts.
 *
 * @package {%= title %}
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php do_action( '{%= prefix %}_before_primary' ); ?>
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php {%= prefix %}_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
		<?php do_action( '{%= prefix %}_after_primary' ); ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
