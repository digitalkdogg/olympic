<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clean_Corporate
 */

?><?php
	/**
	 * Hook - clean_corporate_action_doctype.
	 *
	 * @hooked clean_corporate_doctype - 10
	 */
	do_action( 'clean_corporate_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - clean_corporate_action_head.
	 *
	 * @hooked clean_corporate_head - 10
	 */
	do_action( 'clean_corporate_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - clean_corporate_action_before.
	 *
	 * @hooked clean_corporate_page_start - 10
	 * @hooked clean_corporate_skip_to_content - 15
	 */
	do_action( 'clean_corporate_action_before' );
	?>

    <?php
	  /**
	   * Hook - clean_corporate_action_before_header.
	   *
	   * @hooked clean_corporate_header_start - 10
	   */
	  do_action( 'clean_corporate_action_before_header' );
	?>
		<?php
		/**
		 * Hook - clean_corporate_action_header.
		 *
		 * @hooked clean_corporate_site_branding - 10
		 */
		do_action( 'clean_corporate_action_header' );
		?>
    <?php
	  /**
	   * Hook - clean_corporate_action_after_header.
	   *
	   * @hooked clean_corporate_header_end - 10
	   */
	  do_action( 'clean_corporate_action_after_header' );
	?>

	<?php
	/**
	 * Hook - clean_corporate_action_before_content.
	 *
	 * @hooked clean_corporate_add_breadcrumb - 7
	 * @hooked clean_corporate_content_start - 10
	 */
	do_action( 'clean_corporate_action_before_content' );
	?>
    <?php
	  /**
	   * Hook - clean_corporate_action_content.
	   */
	  do_action( 'clean_corporate_action_content' );
	?>
