<?php
/**
 * Implement theme metabox.
 *
 * @package Clean_Corporate
 */

if ( ! function_exists( 'clean_corporate_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box
	 *
	 * @since 1.0.0
	 */
	function clean_corporate_add_theme_meta_box() {

		$apply_metabox_post_types = array( 'post', 'page' );

		foreach ( $apply_metabox_post_types as $key => $type ) {
			add_meta_box(
				'theme-settings',
				esc_html__( 'Theme Settings', 'clean-corporate' ),
				'clean_corporate_render_theme_settings_metabox',
				$type
			);
		}

	}

endif;

add_action( 'add_meta_boxes', 'clean_corporate_add_theme_meta_box' );

if ( ! function_exists( 'clean_corporate_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Post $post    The current post.
	 * @param array   $metabox Metabox arguments.
	 */
	function clean_corporate_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'clean_corporate_theme_settings_meta_box_nonce' );

		// Fetch values of current post meta.
		$values = get_post_meta( $post_id, 'clean_corporate_theme_settings', true );
		$clean_corporate_theme_settings_post_layout = isset( $values['post_layout'] ) ? esc_attr( $values['post_layout'] ) : '';
		$clean_corporate_theme_settings_single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';
	?>
	<div id="clean-corporate-settings-metabox-container" class="clean-corporate-settings-metabox-container">
	  <ul>
	    <li><a href="#clean-corporate-settings-metabox-tab-layout"><?php echo __( 'Layout', 'clean-corporate' ); ?></a></li>
	    <li><a href="#clean-corporate-settings-metabox-tab-image"><?php echo __( 'Image', 'clean-corporate' ); ?></a></li>
	  </ul>
	  <div id="clean-corporate-settings-metabox-tab-layout">
	    <h4><?php echo __( 'Layout Settings', 'clean-corporate' ); ?></h4>
	    <div class="clean-corporate-row-content">
	    	<label for="clean_corporate_theme_settings_post_layout"><?php echo esc_html__( 'Single Layout', 'clean-corporate' ); ?></label>
	    	<?php
	    	$dropdown_args = array(
				'id'          => 'clean_corporate_theme_settings_post_layout',
				'name'        => 'clean_corporate_theme_settings[post_layout]',
				'selected'    => $clean_corporate_theme_settings_post_layout,
				'add_default' => true,
	    		);
	    	clean_corporate_render_select_dropdown( $dropdown_args, 'clean_corporate_get_global_layout_options' );
	    	?>

	    </div><!-- .clean-corporate-row-content -->

	  </div><!-- #clean-corporate-settings-metabox-tab-layout -->

	  <div id="clean-corporate-settings-metabox-tab-image">
		    <h4><?php echo __( 'Image Settings', 'clean-corporate' ); ?></h4>
		    <div class="clean-corporate-row-content">
			    <label for="clean_corporate_theme_settings_single_image"><?php echo esc_html__( 'Image in Single Post/Page', 'clean-corporate' ); ?></label>
	        	<?php
	        	$dropdown_args = array(
	    			'id'          => 'clean_corporate_theme_settings_single_image',
	    			'name'        => 'clean_corporate_theme_settings[single_image]',
	    			'selected'    => $clean_corporate_theme_settings_single_image,
	    			'add_default' => true,
	        		);
	        	clean_corporate_render_select_dropdown( $dropdown_args, 'clean_corporate_get_image_sizes_options', array( 'add_disable' => true, 'allowed' => array( 'disable', 'large' ), 'show_dimension' => false ) );
	        	?>
		    </div><!-- .clean-corporate-row-content -->

	  </div><!-- #clean-corporate-settings-metabox-tab-image -->

	</div><!-- #clean-corporate-settings-metabox-container -->

    <?php
	}

endif;



if ( ! function_exists( 'clean_corporate_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function clean_corporate_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if (
			! ( isset( $_POST['clean_corporate_theme_settings_meta_box_nonce'] )
			&& wp_verify_nonce( sanitize_key( $_POST['clean_corporate_theme_settings_meta_box_nonce'] ), basename( __FILE__ ) ) )
		) {
			return;
		}

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || absint( $_POST['post_ID'] ) !== $post_id ) {
			return;
		}

		// Check permission.
		if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['clean_corporate_theme_settings'] ) && is_array( $_POST['clean_corporate_theme_settings'] ) ) {
			$raw_value = wp_unslash( $_POST['clean_corporate_theme_settings'] );

			if ( ! array_filter( $raw_value ) ) {

				// No value.
				delete_post_meta( $post_id, 'clean_corporate_theme_settings' );

			} else {

				$meta_fields = array(
					'post_layout' => array(
						'type' => 'select',
						),
					'single_image' => array(
						'type' => 'select',
						),
					);

				$sanitized_values = array();

				foreach ( $raw_value as $mk => $mv ) {

					if ( isset( $meta_fields[ $mk ]['type'] ) ) {
						switch ( $meta_fields[ $mk ]['type'] ) {
							case 'select':
								$sanitized_values[ $mk ] = sanitize_key( $mv );
								break;
							case 'checkbox':
								$sanitized_values[ $mk ] = absint( $mv ) > 0 ? 1 : 0;
								break;
							default:
								$sanitized_values[ $mk ] = sanitize_text_field( $mv );
								break;
						}
					} // End if.

				}

				update_post_meta( $post_id, 'clean_corporate_theme_settings', $sanitized_values );
			}
		} // End if theme settings.

	}

endif;

add_action( 'save_post', 'clean_corporate_save_theme_settings_meta', 10, 2 );
