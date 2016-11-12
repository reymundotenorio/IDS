<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<?php 
// Get the homepage slider options
$homepage_slider = get_field('homepage_slider', $post->ID);
$hps_featured_posts = get_field('hps_featured_posts', $post->ID);
$hps_no_latest_posts = get_field('hps_no_latest_posts', $post->ID);

if ( have_posts() ) : ?>

<div class="flexslider flexslider-sticky-post">
	<ul class="slides">

		<?php
		$args = array(
			'posts_per_page' => -1,
			'ignore_sticky_posts' => 1
		);

		if ($homepage_slider == 'featured'):
			$args['post__in'] = $hps_featured_posts;
		elseif ($homepage_slider == 'latest'):
			$args['post__in'] = null;
			$args['posts_per_page'] = $hps_no_latest_posts;
		endif;

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

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php 
			while ( have_posts() ) : the_post();

			if (get_the_content()):
				get_template_part( 'content', 'page' );
			endif;

			endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>