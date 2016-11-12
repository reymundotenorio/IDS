<?php
/**
 * The blog index template
 *
 * @package expressivo
 */

get_header(); ?>

<?php 
$page_id = get_option('page_for_posts');
$blog_layout = get_field('blog_page_layout', $page_id);
$blog_layout_columns = get_field('blog_layout_columns', $page_id); 
$featured_post_slider = get_field('blog_homepage_slider', $page_id);
$bhps_featured_posts = get_field('bhps_featured_posts', $page_id);
?>

<?php if (have_posts() && $featured_post_slider == true && $bhps_featured_posts != null) : ?>
	
<div class="flexslider flexslider-sticky-post">
	<ul class="slides">

		<?php
		$args = array(
			'posts_per_page' => -1,
			'post__in'  => $bhps_featured_posts,
			'ignore_sticky_posts' => 1
		);
		$sp_query = new WP_Query($args);
		while ($sp_query->have_posts()): $sp_query->the_post(); ?>
		
		<li>
			<div <?php post_class(); ?>>
				<header class="entry-header">
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( __( '/ ', 'expressivo' ) );
						if ( $categories_list && knacc_categorized_blog() ) :
					?>
					<span class="cat-links">
						<?php printf( __( '%1$s', 'expressivo' ), $categories_list ); ?>
					</span>
					<?php endif; // End if categories ?>

					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

					<?php 
						$format = get_post_format();
						$format_link = get_post_format_link($format);
						if ($format) :
					?>
					<a class="post-format-link" href="<?php echo $format_link; ?>" rel="bookmark"><?php echo $format; ?></a>
					<?php
					endif;  ?>
				</header><!-- .entry-header -->	

				<a class="entry-permalink" href="<?php the_permalink(); ?>" rel="bookmark">
					<?php if (has_post_thumbnail()): ?>
					<figure class="post-thumb" style="background-image: url('<?php echo knacc_get_thumbnail_image_url(get_the_ID()); ?>')"></figure><!-- .post-thumb -->
					<?php endif; ?>
				</a>
			</div>
		</li>

		<?php endwhile; ?>

	</ul>
</div><!-- .flexslider-sticky-post -->

<script type="text/javascript">
	jQuery(document).ready(function($){
		$(".flexslider-sticky-post").flexslider({
			animation: "slide",
		});
	});
</script>

<?php endif; wp_reset_query(); ?>

<div id="content" class="site-content <?php if ($blog_layout == 'masonry') echo 'blog-masonry'; ?>" <?php if ($blog_layout == 'masonry') echo 'data-columns="' . $blog_layout_columns . '"'; ?>>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ($blog_layout == 'masonry') echo '<ul class="blog-grid">'; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php if ($blog_layout == 'masonry') echo '<li class="blog-item">'; ?>
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'templates/post-formats/blog', get_post_format() );
				?>
				<?php if ($blog_layout == 'masonry') echo '</li>'; ?>

			<?php endwhile; ?>
			
			<?php if ($blog_layout == 'masonry') echo '</ul>'; ?>

			<?php
			if (get_field('blog_infinite_scroll', $page_id) == true && $blog_layout == 'masonry'):
				if (get_next_posts_link()):
					$npl = explode('"', get_next_posts_link()); $npl_url = $npl[1]; ?>
					<div class="nav-more">
						<a id="load-more" href="<?php echo $npl_url; ?>"><?php _e( 'Load More', 'expressivo' ); ?></a>
					</div>
				<?php
				endif;
			else:
				knacc_paging_nav();
			endif; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>