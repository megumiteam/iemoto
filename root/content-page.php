<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package {%= title %}
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php do_action( '{%= prefix %}_before_entry_header' ); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php do_action( '{%= prefix %}_after_entry_header' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php do_action( '{%= prefix %}_before_entry_content' ); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '{%= prefix %}' ),
				'after'  => '</div>',
			) );
		?>
		<?php do_action( '{%= prefix %}_after_entry_content' ); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', '{%= prefix %}' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
