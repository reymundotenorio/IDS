<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package expressivo
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
$favicon = get_field('favicon', 'option');
if ($favicon): ?>
<link rel="icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
<?php 
endif; ?>

<?php
$apple_touch_icon = get_field('apple_touch_icon', 'option');
if ($apple_touch_icon): ?>
<link href="<?php echo $apple_touch_icon; ?>" rel="apple-touch-icon" />
<?php 
endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<?php
	// Get the header options data
	$header_layout = get_field('header_layout', 'option');
	$sidebar_position = get_field('sidebar_position', 'option');
	$logo_desktop = get_field('logo_desktop', 'option');
	$logo_tablet = get_field('logo_tablet', 'option');
	$logo_mobile = get_field('logo_mobile', 'option'); ?>

	<header id="masthead" class="site-header <?php if ($sidebar_position) echo $sidebar_position; else echo 'main-navigation-right'; ?>" data-style="<?php if ($header_layout) echo $header_layout; else echo 'header-1'; ?>" role="banner">
		<div class="header-container clearfix">
			<div class="site-branding">
				<div class="logo">
					<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="home">
						<?php 
						if ($logo_desktop || $logo_tablet || $logo_mobile): ?>
							<img class="logo-tablet" src="<?php if ($logo_tablet) echo $logo_tablet['url']; else echo $logo_desktop['url']; ?>" alt="<?php bloginfo( 'name' ); ?>">
							<img class="logo-mobile" src="<?php if ($logo_mobile) echo $logo_mobile['url']; else echo $logo_desktop['url']; ?>" alt="<?php bloginfo( 'name' ); ?>">
							<img class="logo-desktop" src="<?php if ($logo_desktop) echo $logo_desktop['url']; ?>" alt="<?php bloginfo( 'name' ); ?>">
						<?php 
						else: ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php 
						endif; ?>
					</a>
				</div>
				<?php if (get_bloginfo( 'description' )): ?>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif; ?>
			</div>
					
			<?php 
			if (is_active_sidebar('sidebar-header')): ?>
			<div class="mobile-widget-btn"></div>
			<?php
			endif; ?>
			<div class="widget-area">		
				<?php do_action('before_sidebar'); ?>
					
				<?php 
				if (is_active_sidebar('sidebar-header')):
	    			dynamic_sidebar('sidebar-header');
	    		endif; ?>
			</div>
		</div><!-- .header-container -->

		<?php
		// If were displaying the blog and there are blog sidebar widgets then display the sidebar toggle btn
		if (get_post_type() == 'post' && is_active_sidebar('sidebar-1') || has_nav_menu('sidebar')):
			echo '<div class="mobile-nav-btn"></div>';
		// Otherwise for any other pages, if page sidebar has widgets then display the sidebar toggle btn
		elseif (is_active_sidebar('sidebar-page') || has_nav_menu('sidebar')):
			echo '<div class="mobile-nav-btn"></div>';
		endif; ?>

	</header><!-- #masthead -->

	<?php do_action('before'); ?>
	<nav id="site-navigation" class="main-navigation <?php if (get_field('sidebar_icons', 'option') == true) echo 'icons'; ?> <?php if ($sidebar_position) echo $sidebar_position; else echo 'main-navigation-right'; ?>" role="navigation">

		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'expressivo' ); ?></a>

		<?php get_sidebar(); ?>

	</nav><!-- #site-navigation -->
	
	<div id="wrapper" class="site-wrapper <?php if ($sidebar_position) echo $sidebar_position; else echo 'main-navigation-right'; ?>"><!-- #wrapper -->
