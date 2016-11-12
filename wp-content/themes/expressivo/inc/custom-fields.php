<?php
$google_fonts_array = knacc_google_fonts();

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_blog-homepage-featured-post-slider',
		'title' => 'Blog Homepage Featured Post Slider',
		'fields' => array (
			array (
				'key' => 'field_53709498561ce',
				'label' => 'Display Featured Post Slider',
				'name' => 'blog_homepage_slider',
				'type' => 'true_false',
				'instructions' => 'Select if you want to display the featured posts slider at the top of this page',
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_5370953e561cf',
				'label' => 'Featured Posts',
				'name' => 'bhps_featured_posts',
				'type' => 'relationship',
				'instructions' => 'Select which posts you want to feature in the slider',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53709498561ce',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'return_format' => 'id',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'posts_page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_blog-homepage-layout',
		'title' => 'Blog Homepage Layout',
		'fields' => array (
			array (
				'key' => 'field_53343b5f2f805',
				'label' => 'Blog Homepage Layout',
				'name' => 'blog_page_layout',
				'type' => 'select',
				'instructions' => 'Which layout do you want to use for your blog page? Standard list or Masonry?',
				'choices' => array (
					'standard' => 'Standard List',
					'masonry' => 'Masonry',
				),
				'default_value' => 'standard',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53343c6a5ca10',
				'label' => 'Number of Columns',
				'name' => 'blog_layout_columns',
				'type' => 'select',
				'instructions' => 'How many columns do you want to use for the Masonry layout?',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53343b5f2f805',
							'operator' => '==',
							'value' => 'masonry',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					2 => 'Two Columns',
					3 => 'Three Columns',
					4 => 'Four Columns',
				),
				'default_value' => 3,
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_536b79deb30a1',
				'label' => 'Infinite Scroll',
				'name' => 'blog_infinite_scroll',
				'type' => 'true_false',
				'instructions' => 'Do you want to enable infinite scroll for the blog page? Enabled by default.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53343b5f2f805',
							'operator' => '==',
							'value' => 'masonry',
						),
					),
					'allorany' => 'all',
				),
				'message' => '',
				'default_value' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'posts_page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_blog-post-audio',
		'title' => 'Blog Post Audio',
		'fields' => array (
			array (
				'key' => 'field_53174078321ab',
				'label' => 'Audio Upload',
				'name' => 'post_audio_upload',
				'type' => 'file',
				'instructions' => 'Upload or select a audio file from the Media Library',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_531740ac321ac',
				'label' => 'Audio URL',
				'name' => 'post_audio_url',
				'type' => 'text',
				'instructions' => 'Enter a URL to your audio file here',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'http://',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5370a55ede823',
				'label' => 'Audio Embed Code',
				'name' => 'audio_embed',
				'type' => 'textarea',
				'instructions' => 'Add your audio embed code here',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'audio',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_blog-post-video',
		'title' => 'Blog Post Video',
		'fields' => array (
			array (
				'key' => 'field_53173d079cf01',
				'label' => 'Video Upload',
				'name' => 'post_video_upload',
				'type' => 'file',
				'instructions' => 'Upload or select a video from the media library',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_53173db3a618d',
				'label' => 'Video URL',
				'name' => 'post_video_url',
				'type' => 'text',
				'instructions' => 'Add the URL to your video here',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'http://',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53173fd602fea',
				'label' => 'Video Embed Code',
				'name' => 'video_embed',
				'type' => 'textarea',
				'instructions' => 'Add your video embed code here',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'video',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_contact-details',
		'title' => 'Contact Details',
		'fields' => array (
			array (
				'key' => 'field_530b535197a3c',
				'label' => 'Display Contact Details',
				'name' => 'display_contact_details',
				'type' => 'true_false',
				'instructions' => 'Do you want to display the contact details?',
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_530b51f910c47',
				'label' => 'Phone',
				'name' => 'phone',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_530b523310c48',
				'label' => 'Mobile',
				'name' => 'mobile',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_530b527010c49',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_530b52a110c4a',
				'label' => 'Address Line 1',
				'name' => 'address_line_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_530b52ad10c4b',
				'label' => 'Address Line 2',
				'name' => 'address_line_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_530b52c210c4c',
				'label' => 'Town / City',
				'name' => 'town_city',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_530b52d110c4d',
				'label' => 'State / County',
				'name' => 'state_county',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_530b52ef10c4e',
				'label' => 'Country',
				'name' => 'country',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_530b532f599d5',
				'label' => 'Zip / Postcode',
				'name' => 'zip_postcode',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'templates/template-contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_homepage-slider',
		'title' => 'Homepage Slider',
		'fields' => array (
			array (
				'key' => 'field_536ce4dfca0ff',
				'label' => 'Homepage Slider',
				'name' => 'homepage_slider',
				'type' => 'select',
				'instructions' => 'Do you want the homepage slider to display some featured posts or some of your latest posts?',
				'choices' => array (
					'featured' => 'Featured Posts',
					'latest' => 'Latest Posts',
				),
				'default_value' => 'featured',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_536ce80b25a4b',
				'label' => 'Homepage Slider Featured Posts',
				'name' => 'hps_featured_posts',
				'type' => 'relationship',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_536ce4dfca0ff',
							'operator' => '==',
							'value' => 'featured',
						),
					),
					'allorany' => 'all',
				),
				'return_format' => 'id',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_536ceb0030472',
				'label' => 'Number of Latest Posts',
				'name' => 'hps_no_latest_posts',
				'type' => 'number',
				'instructions' => 'How many latest posts do you want to display?',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_536ce4dfca0ff',
							'operator' => '==',
							'value' => 'latest',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 20,
				'step' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'templates/template-home.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-background',
		'title' => 'Page Background',
		'fields' => array (
			array (
				'key' => 'field_531726711402d',
				'label' => 'Page Background Colour',
				'name' => 'page_background_colour',
				'type' => 'color_picker',
				'instructions' => 'Select a colour here if you want to set a specific background colour for this page',
				'default_value' => '',
			),
			array (
				'key' => 'field_5334078186899',
				'label' => 'Page Background Image',
				'name' => 'page_background_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_53341b56e2cb5',
				'label' => 'Page Background Image Repeat',
				'name' => 'page_background_image_repeat',
				'type' => 'select',
				'instructions' => 'Do you want your background image to repeat or not?',
				'choices' => array (
					'repeat' => 'Repeat',
					'no-repeat' => 'No Repeat',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-page-layout',
		'title' => 'Post Page Layout',
		'fields' => array (
			array (
				'key' => 'field_536b8f138b722',
				'label' => 'Post Page Layout Option',
				'name' => 'single_post_layout',
				'type' => 'select',
				'instructions' => 'Select page layout for post single page. Fixed Width (default) or Fluid / Full Width.',
				'choices' => array (
					'fixed-layout' => 'Fixed Layout',
					'fluid-layout' => 'Fluid Layout',
				),
				'default_value' => 'fixed-layout',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_primary-theme-colour',
		'title' => 'Primary Theme Colour',
		'fields' => array (
			array (
				'key' => 'field_537a14f1cb8b2',
				'label' => 'Primary Theme Colour',
				'name' => 'primary_colour',
				'type' => 'color_picker',
				'instructions' => 'Set the primary colour for the theme',
				'default_value' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-colours',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_profile-details',
		'title' => 'Profile Details',
		'fields' => array (
			array (
				'key' => 'field_531791ecf3f64',
				'label' => 'Profile Name',
				'name' => 'profile_name',
				'type' => 'text',
				'instructions' => 'Enter your name here to show as your profile name',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_531793472a2ae',
				'label' => 'Job Title / Occupaction',
				'name' => 'profile_job_title',
				'type' => 'text',
				'instructions' => 'Enter your job title / occupation here to show underneath your profile name',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53186b31d05c2',
				'label' => 'Profile Icons',
				'name' => 'profile_icons',
				'type' => 'text',
				'instructions' => 'This field can be used for adding social icons (see documentation) or some random line of text under your profile name.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53179224f3f65',
				'label' => 'Featured Text',
				'name' => 'profile_featured_text',
				'type' => 'wysiwyg',
				'instructions' => 'Enter some lead text here to show within the featured text area',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_531792c4f3f66',
				'label' => 'Profile Image',
				'name' => 'profile_image',
				'type' => 'image',
				'instructions' => 'Add a profile image here (180 x 180px)',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'templates/template-profile.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_site-icons',
		'title' => 'Site Icons',
		'fields' => array (
			array (
				'key' => 'field_536c9a3e80fc9',
				'label' => 'Apple Touch Icon',
				'name' => 'apple_touch_icon',
				'type' => 'image',
				'instructions' => 'Upload a Apple touch icon here. Dimensions should be 152 x 152px.',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_536ca4254d663',
				'label' => 'Favicon',
				'name' => 'favicon',
				'type' => 'file',
				'instructions' => 'Add your favicon here. File needs to be a .ico file. You can use <a href="http://www.favicon.co.uk" target="blank">www.favicon.co.uk</a> to generate your favicon icon. ',
				'save_format' => 'url',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-general',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_social-networks',
		'title' => 'Social Networks',
		'fields' => array (
			array (
				'key' => 'field_5317a64cf8c3c',
				'label' => 'Facebook URL',
				'name' => 'social_facebook',
				'type' => 'text',
				'instructions' => 'e.g. http://www.facebook.com/username',
				'default_value' => '',
				'placeholder' => 'http://www.facebook.com/username',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5317a681f8c3e',
				'label' => 'Twitter URL',
				'name' => 'social_twitter',
				'type' => 'text',
				'instructions' => 'e.g. http://twitter.com/username',
				'default_value' => '',
				'placeholder' => 'http://twitter.com/username',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5317a8240cc34',
				'label' => 'Vimeo URL',
				'name' => 'social_vimeo',
				'type' => 'text',
				'instructions' => 'e.g. http://vimeo.com/username',
				'default_value' => '',
				'placeholder' => 'http://vimeo.com/username',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5317a8720cc35',
				'label' => 'YouTube URL',
				'name' => 'social_youtube',
				'type' => 'text',
				'instructions' => 'e.g. http://www.youtube.com/user/username',
				'default_value' => '',
				'placeholder' => 'http://www.youtube.com/user/username',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5317a8900cc36',
				'label' => 'Pinterest URL',
				'name' => 'social_pinterest',
				'type' => 'text',
				'instructions' => 'e.g. http://pinterest.com/username',
				'default_value' => '',
				'placeholder' => 'http://pinterest.com/username',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5317a8e80cc37',
				'label' => 'Google Plus URL',
				'name' => 'social_google',
				'type' => 'text',
				'instructions' => 'e.g. http://plus.google.com/userID',
				'default_value' => '',
				'placeholder' => 'http://plus.google.com/userID',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5317b2a32a040',
				'label' => 'Behance URL',
				'name' => 'social_behance',
				'type' => 'text',
				'instructions' => ' e.g. http://www.behance.net/username',
				'default_value' => '',
				'placeholder' => 'http://www.behance.net/username',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5317b38b9a56f',
				'label' => 'Instagram URL',
				'name' => 'social_instagram',
				'type' => 'text',
				'instructions' => 'e.g. http://instagram.com/username',
				'default_value' => '',
				'placeholder' => 'http://instagram.com/username',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_536b946688c5e',
				'label' => 'Dribbble URL',
				'name' => 'social_dribbble',
				'type' => 'text',
				'instructions' => 'e.g. https://dribbble.com/username',
				'default_value' => '',
				'placeholder' => 'https://dribbble.com/username',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_536b94a088c5f',
				'label' => 'LinkedIn URL',
				'name' => 'social_linkedin',
				'type' => 'text',
				'instructions' => 'e.g. https://www.linkedin.com/profile/view?id=00000000',
				'default_value' => '',
				'placeholder' => 'https://www.linkedin.com/profile/view?id=00000000',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-social',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_footer',
		'title' => 'Footer',
		'fields' => array (
			array (
				'key' => 'field_52fa3b4136efa',
				'label' => 'Footer Text',
				'name' => 'footer_text',
				'type' => 'text',
				'instructions' => 'Add your custom footer text here',
				'default_value' => 'Footer text goes here.... Built by Knacc.',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52fa4368527ec',
				'label' => 'Add Copyright Line',
				'name' => 'add_copyright',
				'type' => 'true_false',
				'instructions' => 'Select if you want the theme to add a copyright line with the current year in the footer. (Format: © Copyright 2014)',
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_536ce03f08fee',
				'label' => 'Display Social Network Icons',
				'name' => 'footer_network_icons',
				'type' => 'true_false',
				'instructions' => 'Select if you want to display social network icons in the footer.',
				'message' => '',
				'default_value' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-general',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_header-logos',
		'title' => 'Header Logos',
		'fields' => array (
			array (
				'key' => 'field_52fa3adce5f5c',
				'label' => 'Desktop Logo (Primary)',
				'name' => 'logo_desktop',
				'type' => 'image',
				'instructions' => 'Upload a logo here for a desktop screen',
				'save_format' => 'object',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_536c18ebfd5ef',
				'label' => 'Tablet Logo',
				'name' => 'logo_tablet',
				'type' => 'image',
				'instructions' => 'Upload a logo here for a tablet screen. If a tablet logo is not set then the desktop logo will be used.',
				'save_format' => 'object',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_536c191ce3d37',
				'label' => 'Mobile Logo',
				'name' => 'logo_mobile',
				'type' => 'image',
				'instructions' => 'Upload a logo here for a mobile screen. If a mobile logo is not set then the desktop logo will be used.',
				'save_format' => 'object',
				'preview_size' => 'full',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-header-sidebar',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_typography',
		'title' => 'Typography',
		'fields' => array (
			array (
				'key' => 'field_52fa269c64c66',
				'label' => 'Headings Font',
				'name' => 'headings_font',
				'type' => 'select',
				'instructions' => 'Set your preferred font for all headings across the theme',
				'choices' => $google_fonts_array,
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_52fa334853415',
				'label' => 'Body Font',
				'name' => 'body_font',
				'type' => 'select',
				'instructions' => 'Set your preferred font for body text throughout the theme',
				'choices' => $google_fonts_array,
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_52fa350379a7c',
				'label' => 'Body Font Size',
				'name' => 'body_font_size',
				'type' => 'select',
				'instructions' => 'If you want to override the default font size for body text, select a size here',
				'choices' => array (
					10 => '10px',
					12 => '12px',
					14 => '14px',
					16 => '16px',
					18 => '18px',
				),
				'default_value' => 16,
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-typography',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_custom-css',
		'title' => 'Custom CSS',
		'fields' => array (
			array (
				'key' => 'field_5315e96457c91',
				'label' => 'Custom CSS',
				'name' => 'custom_css',
				'type' => 'textarea',
				'instructions' => 'For minor custom css changes you can add your css here. For any major changes / additions you should use a child theme. (See theme documentation)',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-general',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_header-layout',
		'title' => 'Header Layout',
		'fields' => array (
			array (
				'key' => 'field_536c0b0131e39',
				'label' => 'Header Layout Style',
				'name' => 'header_layout',
				'type' => 'image_select',
				'instructions' => 'Choose a header layout style:',
				'choices' => array (
					'header-1' => 'Logo Left / Widgets Right',
					'header-2' => 'Logo Right / Widgets Left',
					'header-3' => 'Logo Centre / Widgets Centre',
				),
				'default_value' => 'header-1',
				'multiple' => 0,
				'image_path' => get_template_directory_uri() . '/images/options/',
				'image_extension' => 'png',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-header-sidebar',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_theme-colour-skins-2',
		'title' => 'Theme Colour Skins',
		'fields' => array (
			array (
				'key' => 'field_537a158e91a23',
				'label' => 'Theme Colour Skin',
				'name' => 'colour_skin',
				'type' => 'image_select',
				'instructions' => 'Select a pre-designed colour skin for the theme',
				'choices' => array (
					'skin-none' => 'No Skin (Default)',
					'skin-leaf' => 'Leaf Skin',
					'skin-aqua' => 'Aqua Skin',
					'skin-night' => 'Night Skin',
					'skin-rose' => 'Rose Skin',
					'skin-wine' => 'Wine Skin',
					'skin-earth' => 'Earth Skin',
				),
				'default_value' => 'skin-none',
				'multiple' => 0,
				'image_path' => get_template_directory_uri() . '/images/options/',
				'image_extension' => 'png',
			),
			array (
				'key' => 'field_536ccc208b687',
				'label' => 'Header Contrast',
				'name' => 'contrast_header',
				'type' => 'select',
				'instructions' => 'Select if you want a light or dark header',
				'choices' => array (
					'contrast-header-light' => 'Light Header',
					'contrast-header-dark' => 'Dark Header',
				),
				'default_value' => 'contrast-header-light',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_536cccc18b688',
				'label' => 'Sidebar Contrast',
				'name' => 'contrast_sidebar',
				'type' => 'select',
				'instructions' => 'Select if you want a light or dark sidebar',
				'choices' => array (
					'contrast-sidebar-light' => 'Light Sidebar',
					'contrast-sidebar-dark' => 'Dark Sidebar',
				),
				'default_value' => 'contrast-sidebar-light',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_536cce1e5253b',
				'label' => 'Body Contrast',
				'name' => 'contrast_body',
				'type' => 'select',
				'instructions' => 'Select if you want a light or dark body background',
				'choices' => array (
					'contrast-body-light' => 'Light Body',
					'contrast-body-dark' => 'Dark Body',
				),
				'default_value' => 'contrast-body-light',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-colours',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_body-background',
		'title' => 'Body Background',
		'fields' => array (
			array (
				'key' => 'field_536cd2914cd8a',
				'label' => 'Body Background Colour',
				'name' => 'body_bg_colour',
				'type' => 'color_picker',
				'instructions' => 'Set a custom background colour for the body. This will override the selected theme colour skin.',
				'default_value' => '',
			),
			array (
				'key' => 'field_536cd3759dedf',
				'label' => 'Body Background Image',
				'name' => 'body_bg_image',
				'type' => 'image',
				'instructions' => 'Set a custom background image for the body.',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-colours',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 3,
	));
	register_field_group(array (
		'id' => 'acf_contact-form',
		'title' => 'Contact Form',
		'fields' => array (
			array (
				'key' => 'field_530b51930d15d',
				'label' => 'Display Contact Form',
				'name' => 'display_contact_form',
				'type' => 'true_false',
				'instructions' => 'Do you want to display the contact form?',
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_530b5f15e6f70',
				'label' => 'Contact Form',
				'name' => 'contact_form',
				'type' => 'acf_cf7',
				'instructions' => 'Select which form from the Contact Form 7 plugin you want to use for the contact page. If there is no forms to select then you need to create one first via the plugin.',
				'allow_null' => 0,
				'multiple' => 0,
				'disable' => array (
					0 => 0,
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'templates/template-contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 3,
	));
	register_field_group(array (
		'id' => 'acf_header-background',
		'title' => 'Header Background',
		'fields' => array (
			array (
				'key' => 'field_536c20ce9540e',
				'label' => 'Header Background Colour',
				'name' => 'header_bg_colour',
				'type' => 'color_picker',
				'instructions' => 'Select a header background colour. This will override the selected theme skin.',
				'default_value' => '',
			),
			array (
				'key' => 'field_536c22160beed',
				'label' => 'Header Background Image',
				'name' => 'header_bg_image',
				'type' => 'image',
				'instructions' => 'Select a header background image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-header-sidebar',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 3,
	));
	register_field_group(array (
		'id' => 'acf_google-analytics',
		'title' => 'Google Analytics',
		'fields' => array (
			array (
				'key' => 'field_52fa3a55c9a4e',
				'label' => 'Google Analytics Embed Code',
				'name' => 'analytics_code',
				'type' => 'textarea',
				'instructions' => 'Add your Google Analytics tracking code here',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-general',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 4,
	));
	register_field_group(array (
		'id' => 'acf_sidebar-background',
		'title' => 'Sidebar Background',
		'fields' => array (
			array (
				'key' => 'field_536cd1559e56e',
				'label' => 'Sidebar Background Colour',
				'name' => 'sidebar_bg_colour',
				'type' => 'color_picker',
				'instructions' => 'Set a custom background colour for the sidebar. This will override the selected theme colour skin.',
				'default_value' => '',
			),
			array (
				'key' => 'field_536cd1879e56f',
				'label' => 'Sidebar Background Image',
				'name' => 'sidebar_bg_image',
				'type' => 'image',
				'instructions' => 'Set a background image for the sidebar instead of a colour.',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-header-sidebar',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 4,
	));
	register_field_group(array (
		'id' => 'acf_sidebar-position',
		'title' => 'Sidebar Position ',
		'fields' => array (
			array (
				'key' => 'field_536c15aba4844',
				'label' => 'Sidebar Position',
				'name' => 'sidebar_position',
				'type' => 'image_select',
				'instructions' => 'Select the position for the sidebar. Left or Right.',
				'choices' => array (
					'main-navigation-left' => 'Left Sidebar',
					'main-navigation-right' => 'Right Sidebar',
				),
				'default_value' => 'main-navigation-right',
				'multiple' => 0,
				'image_path' => get_template_directory_uri() . '/images/options/',
				'image_extension' => 'png',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-header-sidebar',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 4,
	));
	register_field_group(array (
		'id' => 'acf_sidebar-widget-icons',
		'title' => 'Sidebar Widget Icons',
		'fields' => array (
			array (
				'key' => 'field_537a1638257f6',
				'label' => 'Sidebar Widget Icons',
				'name' => 'sidebar_icons',
				'type' => 'true_false',
				'instructions' => 'Select if you want to display icons for the widgets in the sidebar.',
				'message' => '',
				'default_value' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-header-sidebar',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 6,
	));
}
