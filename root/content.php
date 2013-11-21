<?php
/**
 * @package {%= title %}
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php do_action( '{%= prefix %}_before_entry_header' ); ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php {%= prefix %}_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php do_action( '{%= prefix %}_after_entry_header' ); ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php do_action( '{%= prefix %}_before_entry_content' ); ?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '{%= prefix %}' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '{%= prefix %}' ),
				'after'  => '</div>',
			) );
		?>
		<?php do_action( '{%= prefix %}_after_entry_content' ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', '{%= prefix %}' ) );
				if ( $categories_list && {%= prefix %}_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', '{%= prefix %}' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', '{%= prefix %}' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', '{%= prefix %}' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', '{%= prefix %}' ), __( '1 Comment', '{%= prefix %}' ), __( '% Comments', '{%= prefix %}' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', '{%= prefix %}' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
