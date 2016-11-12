<?php
$post_video_upload = get_field('post_video_upload');
$post_video_url = get_field('post_video_url');
$video_embed = get_field('video_embed');

if ($post_video_upload):
	$src = $post_video_upload;
else:
	$src = $post_video_url;
endif;

$attr = array(
	'src'      => $src,
	'loop'     => '',
	'autoplay' => '',
	'preload' => 'none'
); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'expressivo' ) );
			if ( $categories_list && knacc_categorized_blog() ) :
		?>
		<span class="cat-links">
			<?php printf( __( '%1$s', 'expressivo' ), $categories_list ); ?>
		</span>
		<?php endif; // End if categories ?>

		<?php if ( !is_single() ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>

		<?php 
			$format = get_post_format();
			$format_link = get_post_format_link($format); 
		?>
		<a class="post-format-link" href="<?php echo $format_link; ?>" rel="bookmark"><?php echo $format; ?></a>
	</header><!-- .entry-header -->

	<?php if (has_post_thumbnail()): ?>
	<figure class="post-thumb">	
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(knacc_get_thumbnail_size()); ?></a>
	</figure><!-- .post-thumb -->
	<?php endif; ?>
	
	<?php 
	if ($post_video_upload || $post_video_url):
		echo wp_video_shortcode( $attr );
	else:
		echo $video_embed;
	endif; ?>

	<?php 
	if (get_the_content()): ?>
		<div class="entry-content">
			<?php the_content( __( 'Read more <span class="meta-nav">&rarr;</span>', 'expressivo' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'expressivo' ),
					'after'  => '</div>',
				));
			?>
		</div><!-- .entry-content -->
	<?php 
	endif; ?>

	<?php if ('post' == get_post_type()): ?>
	<footer class="entry-meta">

		<div class="wrapper">
		<?php edit_post_link( __( 'Edit', 'expressivo' ), '<span class="edit-link">', '</span>' ); ?>

		<?php knacc_posted_on(); ?>
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( '<span>0</span>', 'expressivo' ), __( '<span>1</span>', 'expressivo' ), __( '<span>%</span>', 'expressivo' ) ); ?></span>
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', '' );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( '%1$s', 'expressivo' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; ?>
		</div>

	</footer><!-- .entry-meta -->	
	<?php endif; ?>
	
</article><!-- #post-## -->