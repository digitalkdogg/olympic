<?php
/**
 * Theme widgets.
 *
 * @package Clean_Corporate
 */

// Load widget base.
require_once get_template_directory() . '/lib/widget-base/class-widget-base.php';

if ( ! function_exists( 'clean_corporate_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function clean_corporate_load_widgets() {

		// Social widget.
		register_widget( 'Clean_Corporate_Social_Widget' );

		// Featured Page widget.
		register_widget( 'Clean_Corporate_Featured_Page_Widget' );

		// Latest News widget.
		register_widget( 'Clean_Corporate_Latest_News_Widget' );

		// Call To Action widget.
		register_widget( 'Clean_Corporate_Call_To_Action_Widget' );

		// Services widget.
		register_widget( 'Clean_Corporate_Services_Widget' );

		// Recent Posts widget.
		register_widget( 'Clean_Corporate_Recent_Posts_Widget' );

	}

endif;

add_action( 'widgets_init', 'clean_corporate_load_widgets' );

if ( ! class_exists( 'Clean_Corporate_Social_Widget' ) ) :

	/**
	 * Social widget Class.
	 *
	 * @since 1.0.0
	 */
	class Clean_Corporate_Social_Widget extends Clean_Corporate_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'clean_corporate_widget_social',
				'description'                 => __( 'Displays social icons.', 'clean-corporate' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				);

			if ( false === has_nav_menu( 'social' ) ) {
				$fields['message'] = array(
					'label' => __( 'Social menu is not set. Please create menu and assign it to Social Menu.', 'clean-corporate' ),
					'type'  => 'message',
					'class' => 'widefat',
					);
			}

			parent::__construct( 'clean-corporate-social', __( 'Clean Corporate: Social', 'clean-corporate' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}

			if ( ! empty( $params['subtitle'] ) ) {
				echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
			}

			if ( has_nav_menu( 'social' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'social',
					'container'      => false,
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
					'item_spacing'   => 'discard',
				) );
			}

			echo $args['after_widget'];

		}
	}
endif;

if ( ! class_exists( 'Clean_Corporate_Featured_Page_Widget' ) ) :

	/**
	 * Featured page widget Class.
	 *
	 * @since 1.0.0
	 */
	class Clean_Corporate_Featured_Page_Widget extends Clean_Corporate_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'clean_corporate_widget_featured_page',
				'description'                 => __( 'Displays single featured Page or Post.', 'clean-corporate' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'use_page_title' => array(
					'label'   => __( 'Use Page/Post Title as Widget Title', 'clean-corporate' ),
					'type'    => 'checkbox',
					'default' => true,
					),
				'featured_page' => array(
					'label'            => __( 'Select Page:', 'clean-corporate' ),
					'type'             => 'dropdown-pages',
					'show_option_none' => __( '&mdash; Select &mdash;', 'clean-corporate' ),
					),
				'id_message' => array(
					'label'            => '<strong>' . _x( 'OR', 'Featured Page Widget', 'clean-corporate' ) . '</strong>',
					'type'             => 'message',
					),
				'featured_post' => array(
					'label'             => __( 'Post ID:', 'clean-corporate' ),
					'placeholder'       => __( 'Eg: 1234', 'clean-corporate' ),
					'type'              => 'text',
					'sanitize_callback' => 'clean_corporate_widget_sanitize_post_id',
					),
				'content_type' => array(
					'label'   => __( 'Show Content:', 'clean-corporate' ),
					'type'    => 'select',
					'default' => 'full',
					'options' => array(
						'excerpt' => __( 'Excerpt', 'clean-corporate' ),
						'full'    => __( 'Full', 'clean-corporate' ),
						),
					),
				'excerpt_length' => array(
					'label'       => __( 'Excerpt Length:', 'clean-corporate' ),
					'description' => __( 'Applies when Excerpt is selected in Content option.', 'clean-corporate' ),
					'type'        => 'number',
					'css'         => 'max-width:60px;',
					'default'     => 40,
					'min'         => 1,
					'max'         => 400,
					),
				'featured_image' => array(
					'label'   => __( 'Featured Image:', 'clean-corporate' ),
					'type'    => 'select',
					'options' => clean_corporate_get_image_sizes_options(),
					),
				'featured_image_alignment' => array(
					'label'   => __( 'Image Alignment:', 'clean-corporate' ),
					'type'    => 'select',
					'default' => 'center',
					'options' => clean_corporate_get_image_alignment_options(),
					),
				);

			parent::__construct( 'clean-corporate-featured-page', __( 'Clean Corporate: Featured Page', 'clean-corporate' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			// ID validation.
			$our_post_object = null;
			$our_id = '';
			if ( absint( $params['featured_post'] ) > 0 ) {
				$our_id = absint( $params['featured_post'] );
			}
			if ( absint( $params['featured_page'] ) > 0 ) {
				$our_id = absint( $params['featured_page'] );
			}
			if ( absint( $our_id ) > 0 ) {
				$raw_object = get_post( $our_id );
				if ( ! in_array( $raw_object->post_type, array( 'attachment', 'nav_menu_item', 'revision' ) ) ) {
					$our_post_object = $raw_object;
				}
			}
			if ( ! $our_post_object ) {
				// No valid object; bail now!
				return;
			}

			echo $args['before_widget'];

			global $post;

			// Setup global post.
			$post = $our_post_object;
			setup_postdata( $post );

			// Override title if checkbox is selected.
			if ( true === $params['use_page_title'] ) {
				$params['title'] = get_the_title( $post );
			}

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}

			if ( ! empty( $params['subtitle'] ) ) {
				echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
			}
			?>
			<div class="featured-page-widget entry-content">
				<?php if ( 'disable' !== $params['featured_image'] && has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( esc_attr( $params['featured_image'] ), array( 'class' => 'align' . esc_attr( $params['featured_image_alignment'] ) ) ); ?>
				<?php endif; ?>
				<?php if ( 'excerpt' === $params['content_type'] ) : ?>
					<?php
						$excerpt = clean_corporate_the_excerpt( absint( $params['excerpt_length'] ) );
						echo wp_kses_post( wpautop( $excerpt ) );
						?>
				<?php else : ?>
					<?php the_content(); ?>
				<?php endif; ?>

			</div><!-- .featured-page-widget -->
			<?php
			// Reset.
			wp_reset_postdata();

			echo $args['after_widget'];

		}
	}
endif;

if ( ! class_exists( 'Clean_Corporate_Latest_News_Widget' ) ) :

	/**
	 * Latest news widget Class.
	 *
	 * @since 1.0.0
	 */
	class Clean_Corporate_Latest_News_Widget extends Clean_Corporate_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'                   => 'clean_corporate_widget_latest_news',
				'description'                 => __( 'Displays latest posts in grid.', 'clean-corporate' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'post_category' => array(
					'label'           => __( 'Select Category:', 'clean-corporate' ),
					'type'            => 'dropdown-taxonomies',
					'show_option_all' => __( 'All Categories', 'clean-corporate' ),
					),
				'post_number' => array(
					'label'   => __( 'Number of Posts:', 'clean-corporate' ),
					'type'    => 'number',
					'default' => 3,
					'css'     => 'max-width:60px;',
					'min'     => 1,
					'max'     => 100,
					),
				'post_column' => array(
					'label'   => __( 'Number of Columns:', 'clean-corporate' ),
					'type'    => 'select',
					'default' => 3,
					'options' => clean_corporate_get_numbers_dropdown_options( 1, 4 ),
					),
				'featured_image' => array(
					'label'   => __( 'Featured Image:', 'clean-corporate' ),
					'type'    => 'select',
					'default' => 'clean-corporate-thumb',
					'options' => clean_corporate_get_image_sizes_options(),
					),
				'excerpt_length' => array(
					'label'       => __( 'Excerpt Length:', 'clean-corporate' ),
					'description' => __( 'in words', 'clean-corporate' ),
					'type'        => 'number',
					'css'         => 'max-width:60px;',
					'default'     => 15,
					'min'         => 1,
					'max'         => 400,
					'adjacent'    => true,
					),
				'more_text' => array(
					'label'   => __( 'More Text:', 'clean-corporate' ),
					'type'    => 'text',
					'default' => __( 'Read more', 'clean-corporate' ),
					),
				'disable_date' => array(
					'label'   => __( 'Disable Date', 'clean-corporate' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				'disable_excerpt' => array(
					'label'   => __( 'Disable Excerpt', 'clean-corporate' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				'disable_more_text' => array(
					'label'   => __( 'Disable More Text', 'clean-corporate' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				);

			parent::__construct( 'clean-corporate-latest-news', __( 'Clean Corporate: Latest News', 'clean-corporate' ), $opts, array(), $fields );
		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			if ( ! empty( $params['subtitle'] ) ) {
				echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
			}

			$qargs = array(
				'posts_per_page' => absint( $params['post_number'] ),
				'no_found_rows'  => true,
				);
			if ( absint( $params['post_category'] ) > 0 ) {
				$qargs['cat'] = absint( $params['post_category'] );
			}
			$all_posts = get_posts( $qargs );
			?>
			<?php if ( ! empty( $all_posts ) ) : ?>

				<?php global $post; ?>

				<div class="latest-news-widget latest-news-col-<?php echo esc_attr( $params['post_column'] ); ?>">

					<div class="inner-wrapper">

						<?php foreach ( $all_posts as $key => $post ) : ?>
							<?php setup_postdata( $post ); ?>

							<div class="latest-news-item">

									<?php if ( 'disable' !== $params['featured_image'] && has_post_thumbnail() ) : ?>
										<div class="latest-news-thumb">
											<a href="<?php the_permalink(); ?>">
												<?php
												$img_attributes = array( 'class' => 'aligncenter' );
												the_post_thumbnail( esc_attr( $params['featured_image'] ), $img_attributes );
												?>
											</a>
										</div><!-- .latest-news-thumb -->
									<?php endif; ?>
									<div class="latest-news-text-wrap">

										<div class="latest-news-text-content">
											<h3 class="latest-news-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3><!-- .latest-news-title -->

											<?php if ( false === $params['disable_excerpt'] ) : ?>
												<div class="latest-news-summary">
												<?php
												$summary = clean_corporate_the_excerpt( esc_attr( $params['excerpt_length'] ), $post );
												echo wp_kses_post( wpautop( $summary ) );
												?>
												</div><!-- .latest-news-summary -->
											<?php endif; ?>
										</div><!-- .latest-news-text-content -->

										<?php if ( false === $params['disable_date'] || false === $params['disable_more_text'] ) : ?>
											<div class="latest-news-meta">
												<ul>
													<?php if ( false === $params['disable_date'] ) :  ?>
														<li class="news-date-meta"><span class="latest-news-date"><?php the_time( 'j M Y' ); ?></span></li>
													<?php endif; ?>
													<?php if ( false === $params['disable_more_text'] ) : ?>
														<li class="news-read-more"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $params['more_text'] ); ?><span class="screen-reader-text">"<?php the_title(); ?>"</span>
														</a></li>
													<?php endif; ?>
												</ul>
											</div><!-- .latest-news-meta -->
										<?php endif; ?>

									</div><!-- .latest-news-text-wrap -->

							</div><!-- .latest-news-item -->

						<?php endforeach; ?>

					</div><!-- .row -->

				</div><!-- .latest-news-widget -->

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

			<?php echo $args['after_widget'];

		}
	}
endif;


if ( ! class_exists( 'Clean_Corporate_Call_To_Action_Widget' ) ) :

	/**
	 * Call to action widget Class.
	 *
	 * @since 1.0.0
	 */
	class Clean_Corporate_Call_To_Action_Widget extends Clean_Corporate_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'clean_corporate_widget_call_to_action',
				'description'                 => __( 'Call To Action Widget.', 'clean-corporate' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'description' => array(
					'label' => __( 'Description:', 'clean-corporate' ),
					'type'  => 'textarea',
					'class' => 'widefat',
					),
				'primary_button_text' => array(
					'label'   => __( 'Primary Button Text:', 'clean-corporate' ),
					'default' => __( 'Learn more', 'clean-corporate' ),
					'type'    => 'text',
					'class'   => 'widefat',
					),
				'primary_button_url' => array(
					'label' => __( 'Primary Button URL:', 'clean-corporate' ),
					'type'  => 'url',
					'class' => 'widefat',
					),
				'secondary_button_text' => array(
					'label'   => __( 'Secondary Button Text:', 'clean-corporate' ),
					'default' => '',
					'type'    => 'text',
					'class'   => 'widefat',
					),
				'secondary_button_url' => array(
					'label' => __( 'Secondary Button URL:', 'clean-corporate' ),
					'type'  => 'url',
					'class' => 'widefat',
					),
				'background_image' => array(
					'label'   => __( 'Background Image:', 'clean-corporate' ),
					'type'    => 'image',
					'default' => '',
					),
				);

			parent::__construct( 'clean-corporate-call-to-action', __( 'Clean Corporate: Call To Action', 'clean-corporate' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			// Add background image.
			if ( ! empty( $params['background_image'] ) ) {
				$background_style = '';
				$background_style .= ' style="background-image:url(' . esc_url( $params['background_image'] ) . ');" ';
				$args['before_widget'] = implode( $background_style . ' ' . 'class="', explode( 'class="', $args['before_widget'], 2 ) );
			}

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			?>
			<div class="call-to-action-content">
				<?php if ( ! empty( $params['description'] ) ) : ?>
				    <div class="call-to-action-description">
				        <?php echo wp_kses_post( wpautop( $params['description'] ) ); ?>
				    </div><!-- .call-to-action-description -->
				<?php endif; ?>
				<?php if ( ! empty( $params['primary_button_text'] ) || ! empty( $params['secondary_button_text'] ) ) : ?>
					<div class="call-to-action-buttons">
						<?php if ( ! empty( $params['primary_button_text'] ) ) : ?>
							<a href="<?php echo esc_url( $params['primary_button_url'] ); ?>" class="custom-button btn-call-to-action btn-call-to-primary"><?php echo esc_html( $params['primary_button_text'] ); ?></a>
						<?php endif; ?>
						<?php if ( ! empty( $params['secondary_button_text'] ) ) : ?>
							<a href="<?php echo esc_url( $params['secondary_button_url'] ); ?>" class="custom-button btn-call-to-action btn-call-to-secondary"><?php echo esc_html( $params['secondary_button_text'] ); ?></a>
						<?php endif; ?>
					</div><!-- .call-to-action-buttons -->
				<?php endif; ?>
			</div><!-- .call-to-action-content -->
			<?php

			echo $args['after_widget'];

		}
	}
endif;


if ( ! class_exists( 'Clean_Corporate_Services_Widget' ) ) :

	/**
	 * Social widget Class.
	 *
	 * @since 1.0.0
	 */
	class Clean_Corporate_Services_Widget extends Clean_Corporate_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'clean_corporate_widget_services',
				'description'                 => __( 'Show your services with icon and read more link.', 'clean-corporate' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'excerpt_length' => array(
					'label'       => __( 'Excerpt Length:', 'clean-corporate' ),
					'description' => __( 'in words', 'clean-corporate' ),
					'type'        => 'number',
					'css'         => 'max-width:60px;',
					'default'     => 15,
					'min'         => 1,
					'max'         => 400,
					'adjacent'    => true,
					),
				'disable_excerpt' => array(
					'label'   => __( 'Disable Excerpt', 'clean-corporate' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				'post_column' => array(
					'label'   => __( 'Number of Columns:', 'clean-corporate' ),
					'type'    => 'select',
					'default' => 3,
					'options' => clean_corporate_get_numbers_dropdown_options( 2, 4 ),
					),
				);

			for( $i = 1; $i <= 8; $i++ ) {
				$fields[ 'block_heading_' . $i ] = array(
					'label' => __( 'Block', 'clean-corporate' ) . ' #' . $i,
					'type'  => 'heading',
					'class' => 'widefat',
					);
				$fields[ 'block_page_' . $i ] = array(
					'label'            => __( 'Select Page:', 'clean-corporate' ),
					'type'             => 'dropdown-pages',
					'show_option_none' => __( '&mdash; Select &mdash;', 'clean-corporate' ),
					);
				$fields[ 'block_icon_' . $i ] = array(
					'label'       => __( 'Icon:', 'clean-corporate' ),
					'description' => __( 'Eg: fa-cogs', 'clean-corporate' ),
					'type'        => 'text',
					'default'     => 'fa-cogs',
					);
			}

			parent::__construct( 'clean-corporate-services', __( 'Clean Corporate: Services', 'clean-corporate' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			if ( ! empty( $params['subtitle'] ) ) {
				echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
			}

			$service_arr = array();
			for ( $i = 0; $i < 8 ; $i++ ) {
				$block = ( $i + 1 );
				$service_arr[ $i ] = array(
					'page' => $params[ 'block_page_' . $block ],
					'icon' => $params[ 'block_icon_' . $block ],
					);
			}
			$refined_arr = array();
			if ( ! empty( $service_arr ) ) {
				foreach ( $service_arr as $item ) {
					if ( ! empty( $item['page'] ) ) {
						$refined_arr[ $item['page'] ] = $item;
					}
				}
			}


			if ( ! empty( $refined_arr ) ) {
				$this->render_widget_content( $refined_arr, $params );
			}

			echo $args['after_widget'];

		}

		/**
		 * Render services content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $service_arr Services array.
		 * @param array $params      Parameters array.
		 */
		function render_widget_content( $service_arr, $params ) {

			$column = $params['post_column'];

			$page_ids = array_keys( $service_arr );

			$qargs = array(
				'post__in'       => $page_ids,
				'posts_per_page' => count( $page_ids ),
				'post_type'      => 'page',
				'orderby'        => 'post__in',
				'no_found_rows'  => true,
			);

			$all_posts = get_posts( $qargs );
			?>
			<?php if ( ! empty( $all_posts ) ) : ?>

				<?php global $post; ?>

				<div class="service-block-list service-col-<?php echo esc_attr( $column ); ?>">
					<div class="inner-wrapper">

						<?php foreach ( $all_posts as $post ) :  ?>
							<?php setup_postdata( $post ); ?>
							<div class="service-block-item">
								<div class="service-block-inner">
									<?php if ( isset( $service_arr[ $post->ID ]['icon'] ) && ! empty( $service_arr[ $post->ID ]['icon'] ) ) : ?>
										<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><i class="<?php echo 'fa ' . esc_attr( $service_arr[ $post->ID ]['icon'] ); ?>"></i></a>
									<?php endif; ?>
									<div class="service-block-inner-content">
										<h3 class="service-item-title">
											<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
												<?php echo get_the_title( $post->ID ); ?>
											</a>
										</h3>
										<?php if ( true !== $params['disable_excerpt'] ) :  ?>
											<div class="service-block-item-excerpt">
												<?php
												$excerpt = clean_corporate_the_excerpt( $params['excerpt_length'], $post );
												echo wp_kses_post( wpautop( $excerpt ) );
												?>
											</div><!-- .service-block-item-excerpt -->
										<?php endif; ?>

									</div><!-- .service-block-inner-content -->
								</div><!-- .service-block-inner -->
							</div><!-- .service-block-item -->
						<?php endforeach; ?>

					</div><!-- .inner-wrapper -->

				</div><!-- .service-block-list -->

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

			<?php
		}

	}
endif;

if ( ! class_exists( 'Clean_Corporate_Recent_Posts_Widget' ) ) :

	/**
	 * Recent posts widget Class.
	 *
	 * @since 1.0.0
	 */
	class Clean_Corporate_Recent_Posts_Widget extends Clean_Corporate_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'clean_corporate_widget_recent_posts',
				'description'                 => __( 'Displays recent posts.', 'clean-corporate' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'clean-corporate' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'post_category' => array(
					'label'           => __( 'Select Category:', 'clean-corporate' ),
					'type'            => 'dropdown-taxonomies',
					'show_option_all' => __( 'All Categories', 'clean-corporate' ),
					),
				'post_number' => array(
					'label'   => __( 'Number of Posts:', 'clean-corporate' ),
					'type'    => 'number',
					'default' => 4,
					'css'     => 'max-width:60px;',
					'min'     => 1,
					'max'     => 100,
					),
				'featured_image' => array(
					'label'   => __( 'Featured Image:', 'clean-corporate' ),
					'type'    => 'select',
					'default' => 'thumbnail',
					'options' => clean_corporate_get_image_sizes_options( true, array( 'disable', 'thumbnail' ), false ),
					),
				'image_width' => array(
					'label'       => __( 'Image Width:', 'clean-corporate' ),
					'type'        => 'number',
					'description' => __( 'px', 'clean-corporate' ),
					'css'         => 'max-width:60px;',
					'adjacent'    => true,
					'default'     => 90,
					'min'         => 1,
					'max'         => 150,
					),
				'disable_date' => array(
					'label'   => __( 'Disable Date', 'clean-corporate' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				);

			parent::__construct( 'clean-corporate-recent-posts', __( 'Clean Corporate: Recent Posts', 'clean-corporate' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}

			if ( ! empty( $params['subtitle'] ) ) {
				echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
			}

			$qargs = array(
				'posts_per_page' => esc_attr( $params['post_number'] ),
				'no_found_rows'  => true,
				);
			if ( absint( $params['post_category'] ) > 0 ) {
				$qargs['cat'] = absint( $params['post_category'] );
			}
			$all_posts = get_posts( $qargs );

			?>
			<?php if ( ! empty( $all_posts ) ) : ?>

				<?php global $post; ?>

				<div class="recent-posts-wrapper">

					<?php foreach ( $all_posts as $key => $post ) : ?>
						<?php setup_postdata( $post ); ?>

						<div class="recent-posts-item">

							<?php if ( 'disable' !== $params['featured_image'] && has_post_thumbnail() ) : ?>
								<div class="recent-posts-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php
										$img_attributes = array(
											'class' => 'alignleft',
											'style' => 'max-width:' . esc_attr( $params['image_width'] ). 'px;',
											);
										the_post_thumbnail( esc_attr( $params['featured_image'] ), $img_attributes );
										?>
									</a>
								</div><!-- .recent-posts-thumb -->
							<?php endif ?>
							<div class="recent-posts-text-wrap">
								<h3 class="recent-posts-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3><!-- .recent-posts-title -->

								<?php if ( false === $params['disable_date'] ) : ?>
									<div class="recent-posts-meta">

										<?php if ( false === $params['disable_date'] ) :  ?>
											<span class="recent-posts-date"><?php the_time( get_option( 'date_format' ) ); ?></span><!-- .recent-posts-date -->
										<?php endif; ?>

									</div><!-- .recent-posts-meta -->
								<?php endif; ?>

							</div><!-- .recent-posts-text-wrap -->

						</div><!-- .recent-posts-item -->

					<?php endforeach; ?>

				</div><!-- .recent-posts-wrapper -->

				<?php wp_reset_postdata(); // Reset. ?>

			<?php endif; ?>

			<?php
			echo $args['after_widget'];

		}
	}
endif;
