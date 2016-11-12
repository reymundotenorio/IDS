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

	<?php
		$args = array( 'orderby' => 'menu_order', 'post_type' => 'attachment', 'post_parent' => $post->ID, 'post_mime_type' => 'image', 'post_status' => null, 'numberposts' => -1, );
		$attachments = get_posts($args);

		if ($attachments):
	?>
	<div class="flexslider flexslider-<?php the_ID(); ?> loading">
		<ul class="slides">

		<?php 
		foreach ($attachments as $attachment):
			$src = wp_get_attachment_image_src($attachment->ID, knacc_get_thumbnail_size()); ?>

			<li class="image">
				<img height="<?php echo $src[2]; ?>" width="<?php echo $src[1]; ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" src="<?php echo $src[0]; ?>" />
			</li>

		<?php 
		endforeach; ?>

		</ul> 
	</div><!-- .flexslider-<?php the_ID(); ?> -->
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$(".flexslider-<?php echo the_ID(); ?>").flexslider({
				animation: "slide",
				start: function(slider) {
					slider.removeClass('loading');
					//$('.blog-grid').packery({
					//	itemSelector: '.blog-item'
					//});
				}
			});
		});
	</script>
	<?php endif; ?>

	<?php 
	if (is_single() && get_the_content()): ?>
		<div class="entry-content">
			<?php the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'expressivo' )); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'expressivo' ),
					'after'  => '</div>',
				) );
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