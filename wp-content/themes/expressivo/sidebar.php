<?php
/**
 * The Sidebar containing the sidebar widget areas.
 *
 * @package expressivo
 */
?>

	<div id="secondary" class="widget-area" role="complementary">
		
		<?php do_action( 'before_sidebar' );

		if (has_nav_menu('sidebar')):
			wp_nav_menu( array(
				'theme_location' => 'sidebar',
				'container_class' => 'sidebar-menu-container'
			));
		endif;

		//	If post type equals 'post' then we display the blog sidebar widget area
	    if (get_post_type() == 'post'):
	    
	    	if (is_active_sidebar('sidebar-1')):
	    		dynamic_sidebar('sidebar-1');
	    	endif;

	    //	If display a standard page then display the primary sidebar widget area
	    else:

			if (is_active_sidebar('sidebar-page')):
	    		dynamic_sidebar('sidebar-page');
	    	endif;

	    endif; ?>

	</div><!-- #secondary -->