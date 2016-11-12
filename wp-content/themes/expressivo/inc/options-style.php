<?php
// Get the theme colour options
// ------------------------------------------------------------------------
$primary_colour 			= get_field('primary_colour', 'option');
$body_bg_colour 			= get_field('body_bg_colour', 'option');
$body_bg_image 				= get_field('body_bg_image', 'option');
$sidebar_bg_colour 			= get_field('sidebar_bg_colour', 'option');
$sidebar_bg_image			= get_field('sidebar_bg_image', 'option');
$colour_contrast	 		= get_field('colour_contrast', 'option');
$header_bg_colour			= get_field('header_bg_colour', 'option');
$header_bg_image			= get_field('header_bg_image', 'option');


// Get the theme font options
// ------------------------------------------------------------------------
$headings_font 				= get_field('headings_font', 'option');
$body_font 					= get_field('body_font', 'option');
$body_font_size 			= get_field('body_font_size', 'option');

// Generate the Options CSS
// ------------------------------------------------------------------------

// Body font size
if ($body_font_size != '') {
	echo '.contrast-body-light, .contrast-body-dark { font-size: ' . $body_font_size .  'px; }';
}

// Background colour
if ($body_bg_colour != '') {
	echo '.contrast-body-light, .contrast-body-dark { background-color: ' . $body_bg_colour .  '; }';
}

// Background bg
if ($body_bg_image != '') {
	echo '.contrast-body-light, .contrast-body-dark { background-image: url("' . $body_bg_image .  '"); }';
}

// Header colour
if ($header_bg_colour != '') {
	echo '.contrast-sidebar-light .site-header, .contrast-sidebar-dark .site-header { background-color: ' . $header_bg_colour .  '; }';
}

// Header bg
if ($header_bg_image != '') {
	echo '.contrast-sidebar-light .site-header, .contrast-sidebar-dark .site-header { background-image: url("' . $header_bg_image .  '"); }';
}

// Sidebar colour
if ($sidebar_bg_colour != '') {
	echo '.contrast-sidebar-light .main-navigation, .contrast-sidebar-dark .main-navigation { background-color: ' . $sidebar_bg_colour .  '; }';
}

// Sidebar bg
if ($sidebar_bg_image != '') {
	echo '.contrast-sidebar-light .main-navigation, .contrast-sidebar-dark .main-navigation { background-image: url("' . $sidebar_bg_image .  '"); }';
}

// Body font
if ($headings_font != '') {
	echo 'body { font-family: ' . $body_font .  '; }';
}

// Heading font
if ($headings_font != '') {
	echo 'h1, h2, h3, h4, h5, h6, .entry-quote blockquote, .more-link, .nav-more a, .site-main [class*="navigation"] .nav-links a, .navigation .nav-links a, button, input[type="button"], input[type="reset"], input[type="submit"] { font-family: ' . $headings_font .  '; }';
}

// Primary color
if ($primary_colour != '') {
	echo '
	.more-link:hover,
	.format-link .entry-link:hover,
	.format-quote .entry-quote:hover,
	.post-format-link:link,
	.post-format-link:visited,
	.post-thumb,
	.profile-lead,
	.main-navigation .widget-area .tagcloud a:hover,
	.comments-area .edit-link a:hover,
	.comment-reply-link:hover,
	button:hover, 
	input[type="button"]:hover, 
	input[type="reset"]:hover, 
	.main-navigation .primary-menu-container .menu a:hover,
	input[type="submit"]:hover,
	.navigation .nav-links a:hover,
	.site-main [class*="navigation"] .nav-links a:hover,
	.nav-more a:hover { background-color: ' . $primary_colour .  '; }';
	echo '
	.mejs-button:hover,
	.mejs-time-current,
	.mejs-horizontal-volume-current { background: ' . $primary_colour .  '!important; }';
	echo '
	.more-link,
	.gallery-item a:after,
	.share-post .share-link a:hover:after,
	.comments-area .edit-link a:hover,
	.comment-reply-link:hover { border-color: ' . $primary_colour .  '; }';
	echo '
	a,
	a:visited,
	.flex-direction-nav a:hover,
	.site-header .widget a:hover,
	.cat-links a:hover,
	.tags-links a:hover,.posted-on a:hover,
	.byline a:hover,
	.hentry .edit-link a:hover,
	.comments-link a:hover,
	.entry-title a:hover,
	.flexslider-sticky-post .entry-title a,
	.site-header .header-social-icons a:hover,
	.mobile-nav-btn:before,
	.mobile-widget-btn:before,
	.more-link, 
	.main-navigation a:hover,
	.main-navigation.icons .primary-menu-container .menu-item:hover:before,
	.main-navigation.icons .primary-menu-container .current-menu-item:before,
	.main-navigation.icons .primary-menu-container .menu-item.current-menu-item:before,
	.main-navigation.icons .widget:hover:before,
	.is-loading:before,
	.gallery-item a:after,
	.share-post .share-link a:hover,
	.share-post .share-link a:hover:before,
	.comment-meta .comment-metadata a:hover,
	.site-footer a:hover { color: ' . $primary_colour .  '; }';
	echo '
	::selection { background-color: ' . $primary_colour .  '; }';
}

// And so on...