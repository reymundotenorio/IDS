<?php
/**
 * The Template for displaying all single posts.
 *
 * @package expressivo
 */

get_header(); ?>

<div id="content" class="site-content <?php if (get_field('single_post_layout', $page_id) == 'fluid-layout') echo 'fluid-layout'; ?>">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/post-formats/blog', get_post_format() ); ?>

			<?php if ( is_single() && ( get_the_author_meta( 'display_single_author_box' ) == 1 ) ) knacc_post_author(); ?>

			<?php knacc_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>