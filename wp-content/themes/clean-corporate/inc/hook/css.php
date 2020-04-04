<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Clean_Corporate
 */

if ( ! function_exists( 'clean_corporate_trigger_custom_css_action' ) ) :

	/**
	 * Do action theme custom CSS.
	 *
	 * @since 1.0.0
	 */
	function clean_corporate_trigger_custom_css_action() {

		/**
		 * Hook - clean_corporate_action_theme_custom_css.
		 */
		do_action( 'clean_corporate_action_theme_custom_css' );

	}

endif;

add_action( 'wp_head', 'clean_corporate_trigger_custom_css_action', 99 );
