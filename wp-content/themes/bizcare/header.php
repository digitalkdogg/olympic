<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bizcare
 */

/**
 * bizcare_action_before_head hook
 * @since bizcare 1.0.0
 *
 * @hooked bizcare_set_global -  0
 * @hooked bizcare_doctype -  10
 */
do_action( 'bizcare_action_before_head' );?>

<head>

	<?php
	/**
	 * bizcare_action_before_wp_head hook
	 * @since bizcare 1.0.0
	 *
	 * @hooked bizcare_before_wp_head -  10
	 */
	do_action( 'bizcare_action_before_wp_head' );

	wp_head();

	/**
	 * bizcare_action_after_wp_head hook
	 * @since bizcare 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'bizcare_action_after_wp_head' );
	?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * bizcare_action_before hook
 * @since bizcare 1.0.0
 *
 * @hooked bizcare_page_start - 15
 */
do_action( 'bizcare_action_before' );

/**
 * bizcare_action_before_header hook
 * @since bizcare 1.0.0
 *
 * @hooked bizcare_skip_to_content - 10
 */
do_action( 'bizcare_action_before_header' );

/**
 * bizcare_action_header hook
 * @since bizcare 1.0.0
 *
 * @hooked bizcare_after_header - 10
 */
do_action( 'bizcare_action_header' );

/**
 * bizcare_action_nav_page_start hook
 * @since bizcare 1.0.0
 *
 * @hooked page start and navigations - 10
 */
do_action( 'bizcare_action_nav_page_start' );

/**
 * bizcare_action_on_header hook
 * @since bizcare 1.0.0
 *
 * @hooked page start and navigations - 10
 */
do_action( 'bizcare_action_on_header' );

/**
 * bizcare_action_before_content hook
 * @since bizcare 1.0.0
 *
 * @hooked null
 */
do_action( 'bizcare_action_before_content' );

?>

