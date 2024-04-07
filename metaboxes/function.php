<?php

/**
 * Add admin scripts and styles
 */
function comm_add_scripts($hook) {
	
	// Add general scripts & styles
	wp_enqueue_style('commtheme_admin_css', get_template_directory_uri() . '/assets/css/admin.css', array(), COMM_THEME_VERSION);
	wp_enqueue_script('commtheme_colorpicker', get_template_directory_uri() .'/assets/js/colorpicker.js', array('jquery'));
	wp_enqueue_script('commtheme_admin_js', get_template_directory_uri() . '/assets/js/admin.js', array('jquery', 'commtheme_colorpicker'), COMMTHEME_THEME_VERSION);
    wp_enqueue_script( 'commtheme_metaboxes', get_template_directory_uri() . '/assets/js/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );

	// Add scripts for metaboxes
  	if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php' ) {
		wp_enqueue_script( 'commtheme_metaboxes', get_template_directory_uri() . '/assets/js/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
		wp_enqueue_script( 'commtheme_shortcodes', get_template_directory_uri() . '/assets/js/shortcodes.js', array( 'jquery', 'thickbox') );
  	}
	
	// Add scripts for Theme Options page
    if (in_array($hook, array('appearance_page_commtheme'))) {
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('options-custom', get_template_directory_uri() .'/assets/js/options-custom.js', array('jquery'));

		// Add inline scripts for Theme Options page
		if (function_exists('commtheme_options_custom_scripts')) {
			add_action('admin_head', 'commtheme_options_custom_scripts');
		}
    }
}
add_action( 'admin_enqueue_scripts', 'comm_add_scripts', 10 );
