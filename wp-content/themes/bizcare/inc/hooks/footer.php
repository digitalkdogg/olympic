<?php
if ( ! function_exists( 'bizcare_widget_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since bizcare 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function bizcare_widget_before_footer() {
        global $bizcare_customizer_all_values;
        if(  !is_active_sidebar( 'footer-col-one' ) && !is_active_sidebar( 'footer-col-two' ) && !is_active_sidebar( 'footer-col-three' ) && !is_active_sidebar( 'footer-col-four' ) ){
            return false;
        }
        $col = 'col';
        ?>
        <footer class="site-footer bt-footer bg-dark py-5 wow fadeIn" data-wow-duration="1.2s">
            <div class="container">
                <div class="row">                    
                    <?php if( is_active_sidebar( 'footer-col-one' ) ) : ?>
                        <div class="col-md-3 col-12">
                            <aside class="<?php echo esc_attr($col);?> footer-widget-area">
                                <?php dynamic_sidebar('footer-col-one'); ?>
                            </aside>
                        </div>
                    <?php endif; ?>

                    <?php if( is_active_sidebar( 'footer-col-two' ) ) : ?>
                        <div class="col-md-3 col-12">
                            <aside class="<?php echo esc_attr($col);?> footer-widget-area">
                                <?php dynamic_sidebar('footer-col-two'); ?>
                            </aside>
                        </div>
                    <?php endif; ?>

                    <?php if( is_active_sidebar( 'footer-col-three' ) ) : ?>
                        <div class="col-md-3 col-12">
                            <aside class="<?php echo esc_attr($col);?> footer-widget-area">
                                <?php dynamic_sidebar('footer-col-three'); ?>
                            </aside>
                        </div>
                    <?php endif; ?>

                    <?php if( is_active_sidebar( 'footer-col-four' ) ) : ?>
                        <div class="col-md-3 col-12">
                            <aside class="<?php echo esc_attr($col);?> footer-widget-area">
                                <?php dynamic_sidebar('footer-col-four'); ?>
                            </aside>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </footer><!-- footer -->
    <?php
    }
endif;
add_action( 'bizcare_action_widget_before_footer', 'bizcare_widget_before_footer', 10 );

if ( ! function_exists( 'bizcare_footer' ) ) :
    /**
     * Footer content
     *
     * @since bizcare 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizcare_footer() {
        global $bizcare_customizer_all_values;
        $bizcare_theme_copyright = $bizcare_customizer_all_values['bizcare-copyright-text'];
        ?> 
        <!-- footer site info -->
        <div class="footer-bottom bt-bg-secondary py-2">
            <div class="container">
                <div class="row">
                    <?php if( !empty( $bizcare_theme_copyright ) ) { ?>
                        <div class="copyright-text text-muted col-6 text-left">
                            <p>
                            <?php if(isset( $bizcare_theme_copyright ) ){
                                echo wp_kses_post( $bizcare_theme_copyright);
                            } 
                            ?></p>
                        </div>
                    <?php } ?>
                    
                    <div class="site-info col-6 text-right text-muted">
                        <p>
                        <?PHP    /* translators: 1: Theme name, 2: Theme author. */
                         printf( esc_html__( 'Theme: %1$s by %2$s', 'bizcare' ), esc_html('BizCare'), sprintf('<a href="%s" target = "_blank" rel="designer">%s</a>', esc_url( 'http://evisionthemes.com/' ), esc_html__( 'eVisionThemes', 'bizcare' ) )  ); 

                        ?></p>
                    </div>
                </div>
            </div>
        </div><!-- copyright -->   
        <!-- *****************************************
             Footer section ends
        ****************************************** -->
    <?php
    }
endif;
add_action( 'bizcare_action_footer', 'bizcare_footer', 10 ); 

if ( ! function_exists( 'bizcare_page_end' ) ) :
    /**
     * Page end
     *
     * @since Bizcare 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizcare_page_end() {
    global $bizcare_customizer_all_values;
        ?>
    <?php
    $scroll_to_top = $bizcare_customizer_all_values['bizcare-enable-scroll-to-top'];
     if( 1 == $scroll_to_top) {
        ?>
            <div class="scroll-top">
                <i class="fa fa-angle-up"></i>
            </div>
        <?php
        } ?>
    </div><!-- #page -->
    <?php }
endif;
add_action( 'bizcare_action_after', 'bizcare_page_end', 10 );



        
    