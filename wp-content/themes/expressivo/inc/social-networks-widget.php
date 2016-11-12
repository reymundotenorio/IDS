<?php

add_action('widgets_init', 'register_social_networks_widget');

function register_social_networks_widget() {
    register_widget('Social_Networks_Widget');
}

class Social_Networks_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'knacc_social_networks', // Base ID
			__('Knacc Social Networks', 'text_domain'), // Name
			array( 'description' => __( 'A widget to display your social networks as icons', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget($args, $instance) {
		// outputs the content of the widget
 		
 		$title = apply_filters('widget_title', $instance['title']);

 		extract($args);

		echo $before_widget;

		if ($title) echo $before_title . $title . $after_title;

		// Get the social network urls from the theme social options and add to $networks array
		if (get_field('social_facebook', 'option')) 	$networks['facebook'] = get_field('social_facebook', 'option');
		if (get_field('social_twitter', 'option')) 		$networks['twitter'] = get_field('social_twitter', 'option');
		if (get_field('social_google', 'option')) 		$networks['google-plus'] = get_field('social_google', 'option');
		if (get_field('social_pinterest', 'option')) 	$networks['pinterest'] = get_field('social_pinterest', 'option');
		if (get_field('social_dribbble', 'option')) 	$networks['dribbble'] = get_field('social_dribbble', 'option');
		if (get_field('social_behance', 'option')) 		$networks['behance'] = get_field('social_behance', 'option');
		if (get_field('social_vimeo', 'option')) 		$networks['vimeo'] = get_field('social_vimeo', 'option');
		if (get_field('social_youtube', 'option')) 		$networks['youtube'] = get_field('social_youtube', 'option');
		if (get_field('social_instagram', 'option')) 	$networks['instagram'] = get_field('social_instagram', 'option');
		if (get_field('social_linkedin', 'option')) 	$networks['linkedin'] = get_field('social_linkedin', 'option');

		if (isset($networks)) {
			echo '<ul>';
			foreach ($networks as $network => $url) {
				echo '<li><a href="' . $url . '" target="blank"><span class="icon-knacc-' . $network . '"></span></a></li>';
			}
			echo '</ul>';
		}
 
		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form($instance) {
		// outputs the options form on admin

		// Set up some default widget settings.
		$defaults = array('title' => __('Networks', 'expressivo'));
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
    		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'expressivo'); ?></label>
    		<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>This widget allows you to display social network icons in the header or sidebar. Make sure you add your network URL's in the theme options social page otherwise nothing will display!</p>

		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update($new_instance, $old_instance) {
		// processes widget options to be saved

		$instance = $old_instance;
 
		// Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags($new_instance['title']);
 
		return $instance;
	}
}