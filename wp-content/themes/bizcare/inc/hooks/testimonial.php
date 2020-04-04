<?php
if( !function_exists('bizcare_testimonial_arrays') ) :
	/**
     *Testimonial array creation
     *
     * @since Bizcare 1.0.0
     *
     * @param  $from_slider
     * @return array
     *
     */
	function bizcare_testimonial_arrays($from_slider){
		global $bizcare_customizer_all_values;
		$testimonila_number_of_word					= absint( $bizcare_customizer_all_values['bizcare-testimonial-excerpt-length'] );

		$testimonial_arrays	= array();
		$testimonial_page_id			= array();
		$reapeted_page	  				= array('testimonial-page-ids');
		$repeated_designation 			= array('testimonial-designation-ids');
		$testimonial_args 				= array();
		$testimonial_post_page 			= evision_customizer_get_repeated_all_value(2,$reapeted_page);
		$testimonial_post_designation 	= evision_customizer_get_repeated_all_value(2,$repeated_designation);

		if('form-category' == $from_slider){
			$testimonial_post_cat = $bizcare_customizer_all_values['bizcare-testimonial-from-category'];
			if( 0 != $testimonial_post_cat ){
				$testimonial_args 	= array(
					'post_type'				=> 'post',
					'cat'					=> absint($testimonial_post_cat),
					'posts_per_page'	    => 2,
					'order'					=> 'DESC'
				); 
			}
		}
		else{
			if(  null != $testimonial_post_page ){
				foreach($testimonial_post_page as $testimonial_post_pages){
					if( 0 != $testimonial_post_pages['testimonial-page-ids'] ){
						$testimonial_page_id[] = $testimonial_post_pages['testimonial-page-ids'];
					}
				}
				if( !empty($testimonial_page_id) ){
					$testimonial_args = array(
						'post_type'			=> 'page',
						'post__in'			=> $testimonial_page_id,
						'orderby'			=> 'post__in',
						'order'				=> 'ASC'	

					);
				}
			}
		}	
		if( !empty( $testimonial_args ) ){
			/*Query start*/
			$testimonial_ars_query 	= new WP_Query($testimonial_args);
			if( $testimonial_ars_query->have_posts()  ) :
				$i = 1;
				while( $testimonial_ars_query->have_posts() ) :
					$testimonial_ars_query->the_post();
					$th_image = false;
		            if(has_post_thumbnail()){
	                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
	                    $th_image = $thumb['0'];
		            }

		            $testimonial_arrays[] = array(
		            	'testimonial-title' 			=> get_the_title(),
		            	'testimonial-content' 			=> has_excerpt() ? get_the_excerpt() : bizcare_words_count($testimonila_number_of_word,get_the_content() ) ,
		            	'testimonial-url' 				=> esc_url(get_the_permalink()),
		            	'testimonial-image' 			=> $th_image,
		            	'testimonial-designation-ids' 	=> isset( $testimonial_post_designation[$i]['testimonial-designation-ids'] ) ?  $testimonial_post_designation[$i]['testimonial-designation-ids'] : '',
		            	
		            );

		            $i++;
				endwhile;
				wp_reset_postdata();
			endif;
		}
		return $testimonial_arrays;	
	}
endif;

if( !function_exists('bizcare_testimonial_section') ) :
	/**
     *Testimonial array creation
     *
     * @since Bizcare 1.0.0
     *
     * @param  null
     * @return null
     */
	function bizcare_testimonial_section(){
		global $bizcare_customizer_all_values;

		if( ! $bizcare_customizer_all_values['bizcare-testimonila-enable'] ){
			return null;
		}
		$testimonial_select_post					= esc_html($bizcare_customizer_all_values['bizcare-testimonial-select-form'] );
		$tesimonial_pages_array						= bizcare_testimonial_arrays($testimonial_select_post);		

		if( is_array($tesimonial_pages_array) )	
		{
			$testimonila_section_title				= esc_html($bizcare_customizer_all_values['bizcare-testimonial-section-title'] );
			$testimonila_background_image			= esc_url($bizcare_customizer_all_values['bizcare-testimonial-background-image'] );
			
			?>
			<?php if(!empty($testimonila_section_title)  || count($tesimonial_pages_array) > 0) { ?>
				<section class="bt-testimonials-section bt-has-bg bt-has-overlay py-7 bt-has-overlay-primary wow fadeIn" data-wow-duration="1.2s" style="background-image: url('<?php echo esc_url($testimonila_background_image );?>');">
					<div class="container position-relative z-index">
						<?php if( !empty( $testimonila_section_title ) ) {?>
							<div class="section-title-wrappe text-center">
								<?php if( !empty( $testimonila_section_title ) ) { ?>
									<h2 class="bt-section-title text-white"><?php echo esc_html( $testimonila_section_title ); ?></h2>
								<?php } ?>
							</div>
						<?php } ?>
						<div class="bt-testimonials-slider-init py-5">
							<?php
							foreach ( $tesimonial_pages_array as $tesimonial_pages ){
								if( !empty( $tesimonial_pages['testimonial-image'] ) ){
									$testimonial_image 	= $tesimonial_pages['testimonial-image'];
								}
								$testimonial_image_attr_id = get_post_thumbnail_id( get_the_ID() );
								$image_attr 				= get_post_meta( $testimonial_image_attr_id,'_wp_attachment_image_alt',true );
								 ?>
								<div class="bt-testimonials-content px-3">
									<div class="bt-testimonials-box bg-white p-4 rounded h-100">
										<?php if( !empty( $tesimonial_pages['testimonial-content'] ) ) { ?>	
											<p class="fs-8 bt-text-light position-relative">
												<i class="fa fa-quote-left top-quote"></i>
												<?php echo wp_kses_post( $tesimonial_pages['testimonial-content'] ); ?>
												<i class="fa fa-quote-right bottom-quote"></i>
											</p>
										<?php } ?>
										<?php if( !empty( $tesimonial_pages['testimonial-title'] ) ) { ?>	
											<strong class="d-block text-right text-uppercase"><?php echo esc_html( $tesimonial_pages['testimonial-title'] ); ?></strong>
										<?php } ?>
										<?php if( !empty( $tesimonial_pages['testimonial-designation-ids'] ) ) { ?>
											<i class="bt-text-light text-right d-block fs-7"><?php echo esc_attr($tesimonial_pages['testimonial-designation-ids']);?></i>
										<?php } ?>
										<?php if( !empty( $testimonial_image ) ) { ?>
											<div class="testomonials-image-wrapper">
												<img src="<?php echo esc_url( $testimonial_image ); ?>" class="img-fluid" alt="<?php echo esc_attr( $image_attr );?>">
											</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
				</section>
				<?php } ?>
			<!-- testimonials-section end -->

		<?php }
	}
endif;
add_action('bizcare_homepage','bizcare_testimonial_section',70);