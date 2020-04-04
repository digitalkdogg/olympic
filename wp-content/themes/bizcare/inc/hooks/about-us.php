<?php
if( !function_exists('bizcare_about_us_section_array') ) :
	/**
	*
	* About us Section array
	*
	* @since bizcare 1.0.0
	* 
	* @param null
	* @return array
	*/
	function bizcare_about_us_section_array(){
		global $bizcare_customizer_all_values;

		$bizcare_about_us_single_word_right = $bizcare_customizer_all_values['bizcare-excerpt-length-right'];
		$repeated_page = array('abouts-us-page-right-ids');
		$repeated_icon = array('about-us-right-icons-ids');
		$about_us_args = array();

		$about_us_pages   	= evision_customizer_get_repeated_all_value(3,$repeated_page);
		$about_us_page_icon = evision_customizer_get_repeated_all_value(3, $repeated_icon ); 

		$about_us_page_id = array();
		$about_us_array   = array();

		if( null != $about_us_pages ){
			foreach (  $about_us_pages as $about_us_page ){
				if( 0 != $about_us_page['abouts-us-page-right-ids'] ){
					$about_us_page_id[] = $about_us_page['abouts-us-page-right-ids'];
				}
			}
			if( !empty( $about_us_page_id ) ){
				$about_us_args = array(
					'post_type'		=> 'page',
					'post__in'		=> $about_us_page_id,
					'order_by'		=> 'post__in',
					'order'			=> 'ASC'
				);

			}
		}

		/*query start */
		if( !empty( $about_us_args ) ){
			$about_us_query_args = new WP_Query( $about_us_args );
			if( $about_us_query_args->have_posts() ) :
				$i = 1;
				while( $about_us_query_args->have_posts() ) :
					$about_us_query_args->the_post();
					$thumb_img = '';
					if( has_post_thumbnail() ){
						$post_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ));
						$thumb_img = $post_image[0];
					}

					$about_us_array[] = array(
						'about-us-title' 	=> get_the_title(),
						'about-us-content'	=>  bizcare_words_count( $bizcare_about_us_single_word_right, get_the_content() ),
						'about-us-image'	=> esc_url( $thumb_img ),
						'about-us-link'		=> esc_url( get_the_permalink() ),
						'about-us-right-icons-ids'		=> isset( $about_us_page_icon[$i]['about-us-right-icons-ids'] ) ? $about_us_page_icon[$i]['about-us-right-icons-ids'] : 'fa-apple'
					);
					$i++;
				endwhile;
				wp_reset_postdata();
			endif;
		}
		return $about_us_array;
	}
endif;


if( !function_exists( 'bizcare_about_us_section' ) ):
	/**
	*
	* @since Bizcare 1.0.0
	*
	* @param null
	* @return null
	*
	*/
	function bizcare_about_us_section(){
		global $bizcare_customizer_all_values;

		if( 1 != $bizcare_customizer_all_values['bizcare-enable-about-us'] ){
			return null;
		}
		$bizcare_about_us = bizcare_about_us_section_array();
		$bizcare_about_us_title 			= $bizcare_customizer_all_values['bizcare-about-us-title'];
		$bizcare_about_us_single_word_left 	= $bizcare_customizer_all_values['bizcare-excerpt-length-left'];
		$bizcare_about_us_button_text 		= $bizcare_customizer_all_values['bizcare-about-us-button-text'];
		$about_us_left_page 				= $bizcare_customizer_all_values['bizcare-about-us-select-page'];
		 ?>
		<?php if(  !empty( $bizcare_about_us_title )  || count( $bizcare_about_us ) > 0 ||  !empty($about_us_left_page )  ) { ?>
			<section class="bt-feature-section bg-white py-7 wow fadeIn" data-wow-duration="1.2s">
				<div class="container">
					<?php if( !empty( $bizcare_about_us_title ) ) {  ?>
						<div class="section-title-wrappe text-center">
							<h2 class="bt-section-title"><?php echo esc_html( $bizcare_about_us_title ); ?></h2>
						</div>
					<?php } ?>
					<?php if( !empty( $about_us_left_page ) || count( $bizcare_about_us ) > 0 ) { ?>
					<div class="row pt-5">
			 			<?php if( $about_us_left_page )  { ?>
							<div class="col-md-4 d-flex justify-content-center align-items-center">
								<?php
								$about_us_left_page_args = array();
								if( 0 !=  $about_us_left_page  ){
									$about_us_left_page_args = array(
										'post_type'				=> 'page',
										'p'					 	=> $about_us_left_page,
										'ignore_sticky_posts' 	=> 1
									);
									/*query start*/
									$left_page_query_args = new WP_Query( $about_us_left_page_args );
									if(  $left_page_query_args->have_posts() ) :
										while( $left_page_query_args->have_posts() ) :
											$left_page_query_args->the_post();
											$left_img = '';
											if( has_post_thumbnail() ){
												$imageUrl =  wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ),'full');
												$left_img = $imageUrl[0];
											} ?>
												<div class="bt-feature-text">
													<h2 class="entry-title pb-3"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></h2>   
													<?php 
														$left_page_content = bizcare_words_count( $bizcare_about_us_single_word_left, get_the_content() );
													?>
													<p class="fs-8 bt-text-light"><?php echo wp_kses_post( $left_page_content ); ?></p>
													<?php if( !empty( $bizcare_about_us_button_text ) ) { ?>
													<div class="bt-btn-group mt-5">
														<a href="<?php the_permalink(); ?>" class="bt-small-btn bt-btn-primary bt-bg-primary"><?php echo esc_html( $bizcare_about_us_button_text ); ?></a>
													</div>
													<?php } ?>
												</div>
										<?php endwhile; wp_reset_query(); wp_reset_postdata();?>
									<?php endif; } ?>
							</div>
						<?php } ?>

						<?php if( !empty( $left_img ) ) { ?>
							<div class="col-md-4 my-5 my-md-0">
								<div class="bt-feature-bagkground-image h-100" style="background-image: url(<?php echo esc_url( $left_img ) ?>);"></div>								
							</div>
						<?php } ?>


						<?php if( is_array( $bizcare_about_us  )  && !empty( $bizcare_about_us ) ) { ?>
							<div class="col-md-4">
								<?php
									foreach( $bizcare_about_us as $bizcare_about ){ ?>	
										<div class="bt-icon-box-wrapper position-relative mb-4">
											<?php if( !empty( $bizcare_about['about-us-right-icons-ids'] ) ) { ?>
											<div class="bt-feature-icon">
												<i class="fa <?php echo esc_attr( $bizcare_about['about-us-right-icons-ids'] ); ?>"></i>
											</div>
											<?php } ?>
											<?php if( !empty( $bizcare_about['about-us-title'] ) || !empty( $bizcare_about['about-us-content'] ) ) { ?>
												<div class="feature-content">
												<?php if( $bizcare_about['about-us-title'] ) { ?>
												<h3 class="title-small m-0"><?php echo esc_html( $bizcare_about['about-us-title'] ); ?></h3>
												<?php } ?>
												<?php if( !empty( $bizcare_about['about-us-content'] ) ){ ?>
													<p class="fs-8 bt-text-light pt-2"><?php echo wp_kses_post($bizcare_about['about-us-content']);?></p>
												<?php } ?>
												</div>
											<?php } ?>
										</div>
									<?php 
									}

								?>
							</div>
						<?php } ?>
					</div>
					<?php }   ?>
				</div>
			</section>
			<!-- feature section end -->
		<?php }
		}
endif;
add_action( 'bizcare_homepage','bizcare_about_us_section',30 );
