<?php
/**
 * Custom Header feature.
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package Clean_Corporate
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @since 1.0.0
 */
function clean_corporate_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'clean_corporate_custom_header_args', array(
			'default-image' => '',
			'width'         => 1920,
			'height'        => 500,
			'flex-height'   => true,
			'header-text'   => false,
	) ) );
}
add_action( 'after_setup_theme', 'clean_corporate_custom_header_setup' );
