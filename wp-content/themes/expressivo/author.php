<?php
/**
 * The template for displaying author pages
*
 * @package expressivo
 */

get_header(); ?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- Author profile -->
			<section class="author-container">
				<header class="author-header">
					<?php echo get_avatar(get_the_author_meta('ID')); ?>
					<h1 class="author-title"><?php the_author(); ?></h1>
					<a href="<?php the_author_meta('user_url'); ?>" class="author-website"><?php the_author_meta('user_url'); ?></a>
					<div class="author-description"><?php the_author_meta('user_description'); ?></div>
				</header>
			</section>

			<!-- Display all posts by this author -->
			<!-- The Loop -->
    		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        	
        	<?php get_template_part( 'templates/post-formats/blog', get_post_format() ); ?>
    		<?php endwhile; else: ?>
        		<p><?php _e( 'No posts by this author.' , 'expressivo' ); ?></p>
    		<?php endif; ?>
			<!-- End Loop -->
    		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
