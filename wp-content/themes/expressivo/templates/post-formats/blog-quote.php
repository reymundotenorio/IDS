<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php edit_post_link( __( 'Edit', 'expressivo' ), '<span class="edit-link">', '</span>' ); ?>
			
	<?php 
		$format = get_post_format();
		$format_link = get_post_format_link($format); 
	?>
	<a class="post-format-link" href="<?php echo $format_link; ?>" rel="bookmark"><?php echo $format; ?></a>

	<a href="<?php the_permalink(); ?>" rel="bookmark" class="entry-quote">
		
		<blockquote>
			<?php
			if ( knacc_get_content_blockquote() ): ?>
				<?php echo knacc_get_content_blockquote(); ?>
			<?php 
			else: ?>
				<?php the_content(); ?>
			<?php 
			endif; ?>

			<cite><?php the_title(); ?></cite>
		</blockquote>

		<?php if (has_post_thumbnail()): ?>
		<figure class="post-thumb" style="background-image: url('<?php echo knacc_get_thumbnail_image_url(get_the_ID()); ?>')"></figure><!-- .post-thumb -->
		<?php endif; ?>
		
	</a>

	<?php
	if (is_single() && knacc_get_content_blockquote()): ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	<?php 
	endif; ?>

	<?php if (is_single()): ?>
	<footer class="entry-meta">

		<div class="wrapper">
		<?php knacc_posted_on(); ?>
		<?php if (!post_password_required() && (comments_open() || '0' != get_comments_number())): ?>
			<span class="comments-link"><?php comments_popup_link( __( '<span>0</span>', 'expressivo' ), __( '<span>1</span>', 'expressivo' ), __( '<span>%</span>', 'expressivo' ) ); ?></span>
		<?php endif; ?>

		<?php if (is_single()): ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', '' );
				if ($tags_list):
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