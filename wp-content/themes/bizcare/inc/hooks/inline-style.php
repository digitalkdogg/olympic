<?php
/**
*Inline style to use color options
**/
if( ! function_exists( 'bizcare_get_inline_style' ) ) :

    /**
     * style to use color options
     *
     * @since  Bizcare 1.0.0
     */
    function bizcare_get_inline_style(){
    global $bizcare_customizer_all_values;

    // var_dump($bizcare_customizer_all_values);die('hello');

    global $bizcare_google_fonts;

    $bizcare_font_family_site_identity            = $bizcare_google_fonts[$bizcare_customizer_all_values['bizcare-font-family-site-identity']];
    $bizcare_font_family_menu_text                = $bizcare_google_fonts[$bizcare_customizer_all_values['bizcare-font-family-menu']];
    $bizcare_primary_font_family                  = $bizcare_google_fonts[$bizcare_customizer_all_values['bizcare-primary-font-family']];
    $bizcare_secondary_font_family                = $bizcare_google_fonts[$bizcare_customizer_all_values['bizcare-secondary-font-family']];
    
    //*color options*/
    $bizcare_background_color                        = get_background_color();
    $bizcare_site_identity_color_option              = $bizcare_customizer_all_values['bizcare-site-identity-color'];
    // var_dump($bizcare_site_identity_color_option);die('hello');
    $bizcare_top_header_bar_background_color         = $bizcare_customizer_all_values['bizcare-top-header-background-bar-color'];
    $bizcare_primary_color                           = $bizcare_customizer_all_values['bizcare-primary-color'];
    $bizcare_secondary_color                         = $bizcare_customizer_all_values['bizcare-secondary-color'];
    $bizcare_footer_background                       = $bizcare_customizer_all_values['bizcare-footer-background-color'];

    ob_start();
    ?>
        .site-title,
        .site-title a,
        .site-description,
        .site-description a {
            font-family: '<?php echo esc_attr( $bizcare_font_family_site_identity ); ?>';
        }
                 
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        h1 a, h2 a , h3 a, h4 a, h5 a, h6 a 
        .bt-btn-group a,
        button,
        a.btn,
        .button,
        input,
        .theme-btn,
        .bt-btn-primary,            
        .bt-top-bar-opening-hours,
        .bt-top-bar-opening-hours li,
        .bt-top-bar-opening-hours li a,
        .read-more-text a,
        .bt-small-btn,
        a.added_to_cart.wc-forward {
            font-family: '<?php echo esc_attr( $bizcare_primary_font_family ); ?>'!important;
        }
        body {
            font-family: '<?php echo esc_attr( $bizcare_secondary_font_family ); ?>'!important;
        }
        .bt-main-menu a {
            font-family: '<?php echo esc_attr( $bizcare_font_family_menu_text ); ?>'!important;
        }

        <?php 
        if( !empty($bizcare_site_identity_color_option) ){
        ?>
            .header-light .site-logo a,
            .header-light .site-logo p {
              color: <?php echo esc_attr( $bizcare_site_identity_color_option );?>;
            }
        <?php
        }

        if( !empty($bizcare_top_header_bar_background_color) ){?>
            .bt-top-bar
            {
                background-color: <?php echo esc_attr($bizcare_top_header_bar_background_color);?>;
            }

        <?php }

        if( !empty($bizcare_primary_color) )
        {?>
           .bg-primary, .bt-bg-primary, .bt-has-overlay-primary:after, .bt-arrow-btn, .bt-btn-bg-transparent:hover, .read-more-text a:hover, .search-submit, .search-submit:hover, #submit, #submit:hover, .bt-main-menu > ul > li:not(.has-mega-menu) > ul.sub-menu:not(.mega-menu) li:hover, .bt-prev-arrow, .bt-next-arrow, .ribbon span, .skillbar-final, .loader-inner, .scroll-top, .nav-previous a, .nav-next a, .bt-service-box:hover .fa, .fa.rounded-icon, .service-style-v2 .bt-service-box:hover .fa, .bt-feature-icon:hover, .wpcf7-submit,
           .no-inner-img,
           a.add_to_cart_button.ajax_add_to_cart,
           a.added_to_cart.wc-forward,
           button.single_add_to_cart_button.button,
           .woocommerce span.onsale,
           button.button,
           .woocommerce a.button.alt,
           li.slick-active button
            {
                background-color: <?php echo esc_attr($bizcare_primary_color);?> !important;
            }

            .bt-color-primary, .bt-btn-bg-transparent, .read-more-text a, .bt-btn-bg-transparent:after, .read-more-text a:after, .bt-top-social-link li a, .site-logo h1 a:hover, .bt-main-menu ul ul.sub-menu li a:hover, .search-icon a:hover, .entry-title a:hover, .slick-dots li.slick-active button, .bt-link-text:hover, .entry-meta a:hover, ul.trail-items li a:hover, .loader, .bt-about-section .about-right .about-box-small h4 a:hover, .bt-feature-icon .fa, .contact-section .contact-icon, aside#secondary ul li:hover a, aside#secondary ul li:hover:before, .evt-masonry .entry-content h2 a:hover, .home.blog #main .entry-content h2 a:hover,
            h2.woocommerce-loop-product__title:hover,
            span.price span,
            .woocommerce div.product p.price, .woocommerce div.product span.price,
            a.shipping-calculator-button
            {
                color: <?php echo esc_attr($bizcare_primary_color);?> !important;
            }
            .bt-btn-bg-transparent, .read-more-text a, .slick-dots li button, .ribbon span:after, .ribbon span:before, .loader,
            .bt-btn-transparent
            {
                border-color: <?php echo esc_attr($bizcare_primary_color);?> !important;
            }
        <?php }

        if( !empty($bizcare_secondary_color) )
        {
        ?>
            .bt-bg-secondary,
            .bt-btn-primary:hover,
            .bt-prev-arrow:hover, 
            .bt-next-arrow:hover,
            .bt-about-section .about-right .about-box-small:hover .fa{
                background-color: <?php echo esc_attr($bizcare_secondary_color);?> !important;
            }

        <?php
        }

        if( !empty($bizcare_footer_background) )
        {?>
            .footer-bottom
            {
                background-color: <?php echo esc_attr($bizcare_footer_background);?> !important;
            }
        <?php } 
        
        ?>
    <?php
    $style = ob_get_clean();
    return $style;
}
endif;

