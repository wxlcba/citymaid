<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Era
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php business_era_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'class' => 'aligncenter' ) ); ?></a>
		<?php endif; ?>

		<?php $archive_layout = business_era_get_option( 'archive_layout' ); ?>
		<?php if ( 'full' === $archive_layout ) : ?>
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'business-era' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-era' ),
					'after'  => '</div>',
				) );
			?>
		<?php else : ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php business_era_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
