<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package eVision themes
 * @subpackage bizcare
 * @since bizcare 1.0.0
 */


/**
 * bizcare_action_after_content hook
 * @since bizcare 1.0.0
 *
 * @hooked null
 */
do_action( 'bizcare_action_after_content' );

/**
 * bizcare_action_before_footer hook
 * @since bizcare 1.0.0
 *
 * @hooked bizcare_before_footer - 10
 */
do_action( 'bizcare_action_before_footer' );

/**
 * bizcare_action_widget_before_footer hook
 * @since bizcare 1.0.0
 *
 * @hooked bizcare_widget_before_footer - 10
 */
do_action( 'bizcare_action_widget_before_footer' );

	

/**
 * bizcare_action_footer hook
 * @since bizcare 1.0.0
 *
 * @hooked bizcare_footer - 10
 */
do_action( 'bizcare_action_footer' );

/**
 * bizcare_action_after_footer hook
 * @since bizcare 1.0.0
 *
 * @hooked null
 */
do_action( 'bizcare_action_after_footer' );

/**
 * bizcare_action_after hook
 * @since bizcare 1.0.0
 *
 * @hooked bizcare_page_end - 10
 */
do_action( 'bizcare_action_after' );
?>
<?php wp_footer(); ?>
</body>
</html>