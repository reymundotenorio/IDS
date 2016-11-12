<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package expressivo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header <?php if (has_post_thumbnail()) echo "has-post-thumb"; ?>">
		<h1 class="entry-title"><?php the_title() ?></h1>
		<?php if (has_post_thumbnail()): ?>
		<figure class="post-thumb" style="background-image: url('<?php echo knacc_get_thumbnail_image_url(get_the_ID()); ?>')"></figure>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'expressivo' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'expressivo' ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post-## -->
