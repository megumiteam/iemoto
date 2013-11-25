<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package {%= title %}
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<?php do_action( '{%= prefix %}_before_primary' ); ?>
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php do_action( '{%= prefix %}_before_page_header' ); ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', '{%= prefix %}' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php do_action( '{%= prefix %}_after_page_header' ); ?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php {%= prefix %}_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<?php do_action( '{%= prefix %}_after_primary' ); ?>
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
