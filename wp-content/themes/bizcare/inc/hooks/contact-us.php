<?php
if(!function_exists('bizcare_contact_us') ) :
	/**
	*
	* Contact US
	*
	* @since Bizcare 1.0.0
	*
	* @param null
	* @return null
	*
	*/

	function bizcare_contact_us(){
		global $bizcare_customizer_all_values;

		$bizcare_address_logo 		= $bizcare_customizer_all_values['bizcare-contact-address-logo'];
		$bizcare_address_title 		= $bizcare_customizer_all_values['bizcare-contact-address-title'];
		$bizcare_address_sub_text 	= $bizcare_customizer_all_values['bizcare-contact-address-sub-text'];
		$bizcare_phone_logo 		= $bizcare_customizer_all_values['bizcare-contact-phone-logo'];
		$bizcare_phone_title 		= $bizcare_customizer_all_values['bizcare-contact-phone-title'];
		$bizcare_phone_sub_text 	= $bizcare_customizer_all_values['bizcare-contact-phone-sub-text'];
		$bizcare_email_logo 		= $bizcare_customizer_all_values['bizcare-contact-email-logo'];
		$bizcare_email_title 		= $bizcare_customizer_all_values['bizcare-contact-email-title'];
		$bizcare_email_sub_text 	= $bizcare_customizer_all_values['bizcare-contact-email-sub-text'];

		if( 1 != $bizcare_customizer_all_values['bizcare-contact-section-enable'] ){
			return null;
		} ?>
			<section class="contact-section bt-bg-primary py-5 wow fadeIn" data-wow-duration="1.2s">
				<div class="container">
					<div class="row">
						<?php if( !empty( $bizcare_address_logo ) || !empty( $bizcare_address_title ) || !empty( $bizcare_address_sub_text ) ) { ?>
							<div class="col-12 col-md-4 position-relative bt-contact-wrapper mb-4 mb-md-0">
								<div class="bt-contact-border-right">
									<i class="fa <?php echo esc_attr($bizcare_address_logo);?> contact-icon d-flex align-items-center justify-content-center rounded-circle"></i>
									<div class="bt-contact-info">
										<?php if( !empty( $bizcare_address_title ) ) { ?>
							            	<h5 class="text-white mb-1"><?php echo esc_html( $bizcare_address_title ); ?></h5>
							            <?php } ?>
							            <?php if( !empty( $bizcare_address_sub_text ) ) { ?>
							            	<span class="text-white"><?php echo esc_html( $bizcare_address_sub_text ); ?></span>
							            <?php } ?>
							         </div>
							     </div>
							</div>
						<?php } ?>
						<?php if( !empty( $bizcare_phone_logo ) || !empty( $bizcare_phone_title ) || !empty( $bizcare_phone_sub_text ) ) {  ?>
							<div class="col-12 col-md-4 position-relative bt-contact-wrapper mb-4 mb-md-0">
								<div class="bt-contact-border-right">
									<?php if( !empty( $bizcare_phone_logo ) ) { ?>
										<i class="fa <?php echo esc_attr($bizcare_phone_logo);?> contact-icon d-flex align-items-center justify-content-center rounded-circle"></i>
									<?php } ?>
									<div class="bt-contact-info">
										<?php if( !empty( $bizcare_phone_title ) ) { ?>
							            	<h5 class="text-white mb-1"><?php echo esc_html( $bizcare_phone_title ); ?></h5>
							            <?php } ?>
							            <?php if( !empty( $bizcare_phone_sub_text ) ) { ?>
							            	<span class="text-white"><?php echo esc_html( $bizcare_phone_sub_text ); ?></span>
							            <?php } ?>
							         </div>
							     </div>
							</div>
						<?php } ?>
						<?php if( !empty( $bizcare_email_logo ) || !empty( $bizcare_email_title ) || !empty( $bizcare_email_sub_text ) ) { ?>
							<div class="col-12 col-md-4 position-relative bt-contact-wrapper mb-0">
								<div class="bt-contact-border-right">
									<?php if( !empty( $bizcare_email_logo ) ) { ?>
										<i class="fa <?php echo esc_attr($bizcare_email_logo);?> contact-icon d-flex align-items-center justify-content-center rounded-circle"></i>
									<?php } ?>
									<div class="bt-contact-info">
										<?php if( !empty( $bizcare_email_title ) ) { ?>
							            	<h5 class="text-white mb-1"><?php echo esc_html( $bizcare_email_title ); ?></h5>
							            <?php } ?>
							            <?php if(!empty( $bizcare_email_sub_text ) ) { ?>
							            	<span class="text-white"><?php echo esc_html( $bizcare_email_sub_text ); ?></span>
							            <?php } ?>
							         </div>
							     </div>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
	<?php }

endif;
add_action( 'bizcare_homepage','bizcare_contact_us',90 );