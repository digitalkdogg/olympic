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
				<div id="section" class="testimonals testimonal-template">
					<div class = "overlay" data-ele="testimonals"></div>
						<div class="review-wrapper">

							<?php 
							$args = array(
								'numberposts' => 2,
								'category'   => get_cat_ID ( 'review' ),
								'order' => 'ASC'
							);
							$reviews = get_posts( $args );
								
								$i = 1;  
							foreach ( $reviews as $post ) { 
									if ($i % 2 == 1) { ?>
										<div class = "rerow">
										<?php echo $post->post_content; ?>
									<?php } else {?>
										
										<?php echo $post->post_content; ?>
										</div>
									<?php } ?>
								<?php
								$i = $i + 1;
								}?>

							
						</div>

					</div>
				<?php } ?>
			<!-- testimonials-section end -->

		<?php }
	}
endif;
add_action('bizcare_homepage','bizcare_testimonial_section',70);