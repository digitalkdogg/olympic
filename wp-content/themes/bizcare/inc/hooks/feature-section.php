<?php
if( !function_exists('bizcare_feature_array') ) :
	/**
     * Feature array creation
     *
     * @since Bizcare 1.0.0
     *
     * @param  $from_feature
     * @return array
     *
     */
	function bizcare_feature_array($from_feature){
		global $bizcare_customizer_all_values;

		$feature_single_number_words 	= absint($bizcare_customizer_all_values['bizcare-feature-excerpt-length']);
		$feature_page_array 			= array();
		$repeated_page					= array('feature-page-ids');
		$repeated_icon					= array('feature-icons-ids');

		$feature_post_page 	=  evision_customizer_get_repeated_all_value(4,$repeated_page);
		$feature_post_icon	=  evision_customizer_get_repeated_all_value(4,$repeated_icon);

		$feature_page_id	= array();
		if('form-category' == $from_feature){
			$feature_post_cat = $bizcare_customizer_all_values['bizcare-feature-from-category'];
			if( 0 != $feature_post_cat ){
				$bizcare_feature_arg 	= array(
					'post_type'				=> 'post',
					'cat'					=> absint($feature_post_cat),
					'posts_per_page'	    => 4,
					'order'					=> 'DESC'
				); 
			}
		}
		else{
			if( null != $feature_post_page) {
				foreach ( $feature_post_page as $feature_post_pages ){
					if( 0 != $feature_post_pages['feature-page-ids'] ){
						$feature_page_id[]  =  $feature_post_pages['feature-page-ids'];
					}
				}
				if( !empty($feature_page_id) ) {
					$bizcare_feature_arg 	= array(
						'post_type'				=> 'page',
						'post__in'				=> $feature_page_id,
						'orderby'				=> 'post__in',
						'order'					=> 'ASC'
					); 
				}
			}
		}

		if( !empty($bizcare_feature_arg) ){
			$bizcare_feature_query		= new WP_Query($bizcare_feature_arg);
			if( $bizcare_feature_query->have_posts() ):
				$i = 1;
				while( $bizcare_feature_query->have_posts() ) :
					$bizcare_feature_query->the_post();
	
	                $feature_page_array[] = array(
	                	'feature-title'				=> get_the_title(),
	                	'feature-content' 			=> has_excerpt() ? get_the_excerpt() : bizcare_words_count($feature_single_number_words,get_the_content() ) ,
	                	'feature-url'				=> esc_url(get_the_permalink()),
	                	'feature-icons-ids'			=> isset($feature_post_icon[$i]['feature-icons-ids']) ? $feature_post_icon[$i]['feature-icons-ids'] : 'fa-apple'
	                );

					$i++;
				endwhile;
				wp_reset_postdata();
			endif;
		}
		return $feature_page_array;
	}
endif;


if( !function_exists('bizcare_feature_section') ) :
	/**
	*
	* Feature Section
	*
	* @since Bizcare 1.0.0
	*
	* @param null
	* @return null
	*
	*/
	function bizcare_feature_section(){
		global $bizcare_customizer_all_values;

		if( 1 != $bizcare_customizer_all_values['bizcare-feature-enable'] ){
			return null;
		}
		$bizcare_feature_post_selection 	= $bizcare_customizer_all_values['bizcare-feature-select-form'];
		$bizcare_feature_section_title  	= $bizcare_customizer_all_values['bizcare-feature-section-title'];
		$bizcare_feature_section_sub_title  = $bizcare_customizer_all_values['bizcare-feature-section-sub-title'];
		$bizcare_feature_button_text  		= $bizcare_customizer_all_values['bizcare-feature-button-text'];
		$bizcare_feature_button_url   		= $bizcare_customizer_all_values['bizcare-feature-button-url'];
		$bizcare_features 					= bizcare_feature_array( $bizcare_feature_post_selection );

		if( !empty( $bizcare_feature_section_title ) || !empty( $bizcare_feature_section_sub_title ) || count($bizcare_features > 0 ) ) { ?>
			<section class="bt-about-section py-7 bg-light wow fadeIn" data-wow-duration="1.2s">
				<div class="container">
					<div class="row">
						<?php if( !empty( $bizcare_feature_section_title ) ||  !empty( $bizcare_feature_section_sub_title )  ||  !empty( $bizcare_feature_button_text ) )  { ?>
							<div class="col-md-6 col-12">
								<div class="bt-about-left h-100 d-flex align-items-center">
									<div class="section-title-wrappe text-left pr-0 pr-md-4">
										<?php if( !empty( $bizcare_feature_section_title ) ) { ?>
											<h2 class="bt-section-title"><?php echo esc_html( $bizcare_feature_section_title ); ?></h2>
										<?php } ?>
										<?php if( !empty( $bizcare_feature_section_sub_title ) ) { ?>
											<p class="fs-8 section-short-desc bt-text-light pt-3"><?php echo esc_html( $bizcare_feature_section_sub_title ); ?></p>
										<?php } ?>
										<?php if( !empty( $bizcare_feature_button_text ) ) { ?>
											<div class="bt-btn-group mt-5">
												<a href="<?php echo esc_url( $bizcare_feature_button_url ); ?>" class="bt-small-btn bt-btn-primary bt-bg-primary"><?php echo esc_html( $bizcare_feature_button_text );?></a>
											</div>
										<?php } ?>
									</div>
								</div><!-- left -->
							</div><!-- col -->
						<?php } ?>
						<?php if( is_array( $bizcare_features ) && !empty( $bizcare_features ) ) { ?>
							<div class="col-12 col-md-6 mt-4 mt-md-0">
								<div class="about-right">
									<?php
										foreach( $bizcare_features as $bizcare_feature ){ ?>
											<div class="about-box-small">
												<div class="bg-white px-3 py-4 text-center bt-shadow-sm rounded">
													<?php if( !empty( $bizcare_feature['feature-icons-ids'] ) ) {?>
														<i class="fa <?php echo esc_attr($bizcare_feature['feature-icons-ids']);?> rounded-icon"></i>
													<?php } ?>
													<?php if( !empty( $bizcare_feature['feature-title'] ) ) { ?>
														<h4><a href="<?php echo esc_url($bizcare_feature['feature-url']);?>"><?php echo esc_html($bizcare_feature['feature-title']);?></a></h4>
													<?php } ?>
													<?php if( !empty( $bizcare_feature['feature-content'] ) ) { ?>
													<p class="fs-8 section-short-desc bt-text-light pt-1 mb-0"><?php echo wp_kses_post( $bizcare_feature['feature-content'] ); ?></p>
													<?php } ?>
												</div>
											</div>
											<?php 
										}
									?>
								</div><!-- right-->
							</div><!-- col -->
						<?php } ?>
					</div><!-- row -->
				</div><!-- container -->
			</section>
			<!-- about section end -->
		<?php }
	}
endif;
add_action('bizcare_homepage','bizcare_feature_section', 20);