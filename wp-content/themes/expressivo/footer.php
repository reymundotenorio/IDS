<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package expressivo
 */
?>
		</div><!-- #content -->

		<?php
		$footer_text = get_field('footer_text', 'option');
		$footer_copy = get_field('add_copyright', 'option');
		if ($footer_text || $footer_copy): ?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<?php do_action( 'knacc_credits' );

				echo $footer_text;
				
				if ($footer_copy): 
					if ($footer_text): ?>
					<span class="sep"> · </span> 
					<?php 
					endif; ?>					
					&copy; Copyright <?php echo date("Y") ?>
				<?php 
				endif; ?>
			</div><!-- .site-info -->

			<?php $footer_network_icons = get_field('footer_network_icons', 'option');
			if (!isset($footer_network_icons) || $footer_network_icons): ?>
			<aside class="knacc-social-networks">
				<ul>
					<?php knacc_output_social_networks(); ?>
				</ul>
			</aside>
		<?php endif; ?>
		</footer><!-- #colophon -->
		<?php 
		endif; ?>
	</div><!-- #wrapper -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>