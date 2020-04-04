<?php

if(!function_exists('bizcare_defauts_value') ) :
	/**
	 * Get default theme options.
	 * @package bizcare
	 *
	 * @since Bizcare 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function bizcare_defauts_value(){

		$defaults = array();

		//top bar
		$defaults['bizcare-enbale-top-bar-header']  			= 0;
		$defaults['bizcare-top-bar-phone']          			= esc_html__('+(123)-456789','bizcare');
		$defaults['bizcare-top-bar-time']         				= esc_html__('mon-sat 9:00am-10:00pm','bizcare');
		$defaults['bizcare-top-header-bar-button']				= esc_html__('Buy Now','bizcare');
		$defaults['bizcare-top-header-bar-button-url']			= '';
		$defaults['bizcare-top-bar-social-menu']   				= '';

		// header Section
		$defaults['bizcare-enable-search-button']				= 1;
		$defaults['bizcare-header-background-enable']		    = 1;


		// color Section
		$defaults['bizcare-site-identity-color'] 				= '#037182';
		$defaults['bizcare-top-header-background-bar-color'] 	= '#f8f9fa';
		$defaults['bizcare-primary-color'] 						= '#037182';
		$defaults['bizcare-secondary-color'] 					= '#037182';
		$defaults['bizcare-footer-background-color'] 			= '#1F1F1F';

		//font Section
		$defaults['bizcare-font-family-site-identity'] 			= 'Raleway:400,300,500,600,700,900';
		$defaults['bizcare-font-family-menu'] 					= 'Raleway:400,300,500,600,700,900';
		$defaults['bizcare-primary-font-family'] 				= 'Raleway:400,300,500,600,700,900';
		$defaults['bizcare-secondary-font-family'] 				= 'Raleway:400,300,500,600,700,900';

		// slider Section
		$defaults['bizcare-enbale-slider']						= 1;
		$defaults['bizcare-excerpt-length']						= 30;
		$defaults['bizcare-select-post-form']					='form-category';
		$defaults['bizcare-select-from-cat']					= 1;
		$defaults['bizcare-select-from-page']					= 0;
		$defaults['bizcare-slider-enable-blog']					= 0;
		$defaults['bizcare-slider-button-text']					= esc_html__('Learn more','bizcare');
		$defaults['bizcare-slider-button-text2']				= esc_html__('GET APPOINMENT','bizcare');
		$defaults['bizcare-slider-button-text2-url']			= '';
		$defaults['bizcare-slider-enable-arrow']				= 1;
		$defaults['bizcare-slider-enable-pager']				= 1;


		//feature section
		$defaults['bizcare-feature-enable']  					= 1;
		$defaults['bizcare-feature-section-title']  			= esc_html__('Feature Section','bizcare');
		$defaults['bizcare-feature-section-sub-title']  		= esc_html__('feature description is here','bizcare');
		$defaults['bizcare-feature-excerpt-length']  			= 25;
		$defaults['bizcare-feature-select-form']  				= 'form-category';
		$defaults['bizcare-feature-from-category']  			= 1;
		$defaults['bizcare-feature-from-page']  				= 0;
		$defaults['bizcare-feature-page-icon']  				= esc_html__('fa-apple','bizcare');
		$defaults['bizcare-feature-button-text']  				= esc_html__('KNOW MORE','bizcare');
		$defaults['bizcare-feature-button-url']  				= '';


		// about us section
		$defaults['bizcare-enable-about-us'] 					= 1;
		$defaults['bizcare-about-us-title'] 					= esc_html__('About US','bizcare');
		$defaults['bizcare-excerpt-length-left'] 				= 25;
		$defaults['bizcare-excerpt-length-right'] 				= 15;
		$defaults['bizcare-about-us-select-page'] 				= 0;
		$defaults['bizcare-about-us-button-text'] 				= esc_html__('Details','bizcare');
		$defaults['bizcare-abouts-us-right-page'] 				= 0;
		$defaults['bizcare-about-us-page-icon'] 				= esc_html__('fa-apple','bizcare');


		//testimonial
		$defaults['bizcare-testimonila-enable']					= 1;
		$defaults['bizcare-testimonial-section-title']			= esc_html__('Testimonial','bizcare');
		$defaults['bizcare-testimonial-excerpt-length']			= 25;
		$defaults['bizcare-testimonial-select-form']			= 'form-category';
		$defaults['bizcare-testimonial-from-category']			= 1;
		$defaults['bizcare-testimonial-select-for-page']		= 0;
		$defaults['bizcare-testimonial-designation']			= esc_html__('CEO','bizcare');
		$defaults['bizcare-testimonial-background-image']		= '';

		//blog Section
		$defaults['bizcare-blog-section-enable'] 				= 1;
		$defaults['bizcare-blog-section-title-text'] 			= esc_html__('Blog','bizcare');
		$defaults['bizcare-blog-excerpt-length'] 				= 30;
		$defaults['bizcare-blog-select-category'] 				= 1;
		$defaults['bizcare-blog-button-text'] 					= esc_html__('Read More','bizcare');

		//subscribe us
		$defaults['bizcare-enable-subscribe-us'] 				= 1;
		$defaults['bizcare-subscribe-us-title'] 				= '';
		$defaults['bizcare-subscribe-us-sub-title'] 			= '';
		$defaults['bizcare-subscribe-us-shortcode'] 			= '';

		//Contact us Section
		$defaults['bizcare-contact-section-enable'] 			= 1;
		$defaults['bizcare-contact-address-logo'] 				= esc_html__('fa-map','bizcare');
		$defaults['bizcare-contact-address-title'] 				= esc_html__('17504 Carlton Cuevas Rd','bizcare');
		$defaults['bizcare-contact-address-sub-text'] 			= '';
		$defaults['bizcare-contact-phone-logo'] 				= esc_html__('fa-phone','bizcare');
		$defaults['bizcare-contact-phone-title'] 				= esc_html__('+(704) 279-1249','bizcare');
		$defaults['bizcare-contact-phone-sub-text'] 			= '';
		$defaults['bizcare-contact-email-logo'] 				= esc_html__('fa-envelope ','bizcare');
		$defaults['bizcare-contact-email-title'] 				= esc_html__('letstalk@webster.com','bizcare');
		$defaults['bizcare-contact-email-sub-text'] 			= '';

		//layout options
		$defaults['bizcare-enable-static-page'] 				= 0;
		$defaults['bizcare-default-layout']     				= esc_html('no-sidebar','bizcare');
		$defaults['bizcare-single-post-image-align'] 			= 'full';
		$defaults['bizcare-archive-image-align']     			= 'full';
		$defaults['bizcare-archive-layout'] 					= 'thumbnail-and-excerpt';
		$defaults['bizcare-number-of-words'] 					= 40;
		$defaults['bizcare-conatiner-width-layout'] 			= 1140;

		// back to top options
		$defaults['bizcare-enable-back-to-top'] 				= 1;

		//breadcrumb
		$defaults['bizcare-enable-breadcrumb']					= 1;

		//footer section
		$defaults['bizcare-copyright-text']						= esc_html__( 'Copyright &copy; All right reserved.', 'bizcare' );
		$defaults['bizcare-enable-scroll-to-top']				= 1;


		$defaults = apply_filters('bizcare_get_all_options',$defaults);
		return $defaults;
	}
endif; 