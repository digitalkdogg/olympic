<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package Clean_Corporate
 */

if ( ! function_exists( 'clean_corporate_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function clean_corporate_get_global_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'clean-corporate' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'clean-corporate' ),
			'three-columns' => esc_html__( 'Three Columns', 'clean-corporate' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'clean-corporate' ),
		);
		$output = apply_filters( 'clean_corporate_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'clean_corporate_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function clean_corporate_get_pagination_type_options() {

		$choices = array(
			'default' => esc_html__( 'Default (Older / Newer Post)', 'clean-corporate' ),
			'numeric' => esc_html__( 'Numeric', 'clean-corporate' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'clean_corporate_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function clean_corporate_get_breadcrumb_type_options() {

		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'clean-corporate' ),
			'simple'   => esc_html__( 'Simple', 'clean-corporate' ),
		);
		return $choices;

	}

endif;


if ( ! function_exists( 'clean_corporate_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function clean_corporate_get_archive_layout_options() {

		$choices = array(
			'full'    => esc_html__( 'Full Post', 'clean-corporate' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'clean-corporate' ),
		);
		$output = apply_filters( 'clean_corporate_filter_archive_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'clean_corporate_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable True for adding No Image option.
	 * @param array $allowed Allowed image size options.
	 * @return array Image size options.
	 */
	function clean_corporate_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;
		$get_intermediate_image_sizes = get_intermediate_image_sizes();
		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'clean-corporate' );
		}
		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'clean-corporate' );
		$choices['medium']    = esc_html__( 'Medium', 'clean-corporate' );
		$choices['large']     = esc_html__( 'Large', 'clean-corporate' );
		$choices['full']      = esc_html__( 'Full (original)', 'clean-corporate' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ){
					$choices[ $key ] .= ' ('. $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;


if ( ! function_exists( 'clean_corporate_get_image_alignment_options' ) ) :

	/**
	 * Returns image options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function clean_corporate_get_image_alignment_options() {

		$choices = array(
			'none'   => _x( 'None', 'Alignment', 'clean-corporate' ),
			'left'   => _x( 'Left', 'Alignment', 'clean-corporate' ),
			'center' => _x( 'Center', 'Alignment', 'clean-corporate' ),
			'right'  => _x( 'Right', 'Alignment', 'clean-corporate' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'clean_corporate_get_featured_slider_transition_effects' ) ) :

	/**
	 * Returns the featured slider transition effects.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function clean_corporate_get_featured_slider_transition_effects() {

		$choices = array(
			'fade'       => _x( 'fade', 'Transition Effect', 'clean-corporate' ),
			'fadeout'    => _x( 'fadeout', 'Transition Effect', 'clean-corporate' ),
			'none'       => _x( 'none', 'Transition Effect', 'clean-corporate' ),
			'scrollHorz' => _x( 'scrollHorz', 'Transition Effect', 'clean-corporate' ),
		);
		$output = apply_filters( 'clean_corporate_filter_featured_slider_transition_effects', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'clean_corporate_get_featured_slider_content_options' ) ) :

	/**
	 * Returns the featured slider content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function clean_corporate_get_featured_slider_content_options() {

		$choices = array(
			'disabled'  => esc_html__( 'Disabled', 'clean-corporate' ),
			'home-page' => esc_html__( 'Static Front Page Only', 'clean-corporate' ),
		);

		$output = apply_filters( 'clean_corporate_filter_featured_slider_content_options', $choices );

		return $output;

	}

endif;

if ( ! function_exists( 'clean_corporate_get_featured_slider_type' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function clean_corporate_get_featured_slider_type() {

		$choices = array(
			'featured-page' => __( 'Featured Pages', 'clean-corporate' ),
		);
		$output = apply_filters( 'clean_corporate_filter_featured_slider_type', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'clean_corporate_get_numbers_dropdown_options' ) ) :

	/**
	 * Returns numbers dropdown options.
	 *
	 * @since 1.0.0
	 *
	 * @param int $min Min.
	 * @param int $max Max.
	 *
	 * @return array Options array.
	 */
	function clean_corporate_get_numbers_dropdown_options( $min = 1, $max = 4 ) {

		$output = array();

		if ( $min <= $max ) {
			for ( $i = $min; $i <= $max; $i++ ) {
				$output[ $i ] = $i;
			}
		}

		return $output;

	}

endif;
