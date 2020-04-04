<?php
if( !function_exists( 'bizcare_subscribe' ) ) :
	/**
	*
	* Subscribe US
	*
	* @since Bizcare 1.0.0 
	*
	* @param null
	* @return null
	*/
	function bizcare_subscribe(){
		global $bizcare_customizer_all_values;

		$bizcare_subscribe_title 		= $bizcare_customizer_all_values['bizcare-subscribe-us-title'];
		$bizcare_subscribe_sub_title 	= $bizcare_customizer_all_values['bizcare-subscribe-us-sub-title'];
		$bizcare_subscribe_shortcode 	= $bizcare_customizer_all_values['bizcare-subscribe-us-shortcode'];

		if( 1 != $bizcare_customizer_all_values['bizcare-enable-subscribe-us'] ){
			return null;
		} ?>
		<?php if( !empty( $bizcare_subscribe_title ) || !empty( $bizcare_subscribe_sub_title ) || !empty( $bizcare_subscribe_shortcode ) ) {  ?>
			<section class="bt-news-letter bg-light py-5 wow fadeIn" data-wow-duration="1.2s">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 pr-5">
							<div class="section-title-wrappe">
								<?php if( !empty( $bizcare_subscribe_title ) ){ ?>
									<h2 class="bt-section-title"><?php echo esc_html( $bizcare_subscribe_title ); ?></h2>
								<?php } ?>
								<?php if( !empty( $bizcare_subscribe_sub_title ) ){ ?>
									<p class="fs-8 section-short-desc bt-text-light pt-2 mb-0"><?php echo esc_html( $bizcare_subscribe_sub_title );?></p>
								<?php } ?>
							</div>
						</div>
						<?php if( !empty( $bizcare_subscribe_shortcode ) ) { ?>
							<div class="col-12 col-md-5">
								<?php echo do_shortcode( str_replace( '\\', '',  $bizcare_subscribe_shortcode ) ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>
		<!-- newsletter section end -->	
	<?php }
endif;
add_action( 'bizcare_homepage','bizcare_subscribe',100 );