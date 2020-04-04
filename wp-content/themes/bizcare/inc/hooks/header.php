<?php
if ( ! function_exists( 'bizcare_set_global' ) ) :
/**
 * Setting global values for all saved customizer values
 *
 * @since Bizcare 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizcare_set_global() {
    /*Getting saved values start*/
    $GLOBALS['bizcare_customizer_all_values'] = bizcare_get_all_options(1);
}
endif;
add_action( 'bizcare_action_before_head', 'bizcare_set_global', 0 );

if ( ! function_exists( 'bizcare_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since Bizcare 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizcare_doctype() {
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'bizcare_action_before_head', 'bizcare_doctype', 10 );

if ( ! function_exists( 'bizcare_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since Bizcare 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizcare_before_wp_head() {
    ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'/>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

<?php
}
endif;
add_action( 'bizcare_action_before_wp_head', 'bizcare_before_wp_head', 10 );

if( ! function_exists( 'bizcare_default_layout' ) ) :
    /**
     * Bizcare default layout function
     *
     * @since  Bizcare 1.0.0
     *
     * @param int
     * @return string
     */
    function bizcare_default_layout( $post_id = null ){

        global $bizcare_customizer_all_values,$post;
        $bizcare_default_layout = $bizcare_customizer_all_values['bizcare-default-layout'];
        if( is_home()){
            $post_id = get_option( 'page_for_posts' );
        }
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $bizcare_default_layout_meta = get_post_meta( $post_id, 'bizcare-default-layout', true );

        if( false != $bizcare_default_layout_meta ) {
            $bizcare_default_layout = $bizcare_default_layout_meta;
        }
        return $bizcare_default_layout;
    }
endif;

if ( ! function_exists( 'bizcare_body_class' ) ) :
/**
 * add body class
 *
 * @since Bizcare 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizcare_body_class( $bizcare_body_classes ) {
  global $bizcare_customizer_all_values;
  $bizcare_header_background = '';
    $header_background = $bizcare_customizer_all_values['bizcare-header-background-enable'];

    $has_perloader = "has-preloader";
    
    if($header_background == 1  ){
        $bizcare_header_background = "header-light";
    }else{
        $bizcare_header_background = "header-dark";
    }

    $bizcare_default_layout = bizcare_default_layout();
    
    if( !empty( $bizcare_default_layout ) ){
        if( 'left-sidebar' == $bizcare_default_layout ){
            $bizcare_body_classes[] = 'evt-left-sidebar'.' '. $has_perloader .' '. $bizcare_header_background;
        }
        elseif( 'right-sidebar' == $bizcare_default_layout ){ 
            $bizcare_body_classes[] = 'evt-right-sidebar'.' '. $has_perloader .' '. $bizcare_header_background;
        }
        elseif( 'both-sidebar' == $bizcare_default_layout ){
            $bizcare_body_classes[] = 'evt-both-sidebar'.' '. $has_perloader .' '. $bizcare_header_background;
        }
        elseif( 'no-sidebar' == $bizcare_default_layout ){
            $bizcare_body_classes[] = 'evt-no-sidebar'.' '. $has_perloader .' '. $bizcare_header_background;
        }
        
        else{
            $bizcare_body_classes[] = 'evt-'. $bizcare_customizer_all_values['bizcare-default-layout'].' '. $has_perloader .' '. $bizcare_header_background;
        }
    }
    else{
        $bizcare_body_classes[] = 'evt-right-sidebar'.' '. $has_perloader .' '. $bizcare_header_background;
    }
    return $bizcare_body_classes;

}
endif;
add_filter( 'body_class', 'bizcare_body_class', 10, 1);

if ( ! function_exists( 'bizcare_before_page_start' ) ) :
/**
 * intro loader
 *
 * @since Bizcare 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizcare_before_page_start() {
    global $bizcare_customizer_all_values;
    /*intro loader*/
}
endif;
add_action( 'bizcare_action_before', 'bizcare_before_page_start', 10 );

if ( ! function_exists( 'bizcare_page_start' ) ) :
/**
 * page start
 *
 * @since Bizcare 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizcare_page_start() {
?>
    <div id="page" class="site clearfix">
<?php
}
endif;
add_action( 'bizcare_action_before', 'bizcare_page_start', 15 );

if ( ! function_exists( 'bizcare_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since Bizcare 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizcare_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bizcare' ); ?></a>
<?php
}
endif;
add_action( 'bizcare_action_before_header', 'bizcare_skip_to_content', 10 );

   if ( ! function_exists( 'bizcare_navigation_page_start' ) ) :
   /**
    * Skip to content
    *
    * @since Bizcare 1.0.0
    *
    * @param null
    * @return null
    *
    */
   function bizcare_navigation_page_start() {
       global $bizcare_customizer_all_values;
       ?>
        <!-- preloader -->
        <div id="overlayer"></div>
        <span class="loader">
          <span class="loader-inner"></span>
        </span>

        <header id="masthead" class="site-header img-cover">
        <div class="evt-header-wrap">
            <!-- top header  -->
            <?php 
                $top_bar_time           = $bizcare_customizer_all_values['bizcare-top-bar-time'];
                $top_bar_phone          = $bizcare_customizer_all_values['bizcare-top-bar-phone'];
                $top_bar_button         = $bizcare_customizer_all_values['bizcare-top-header-bar-button'];
                $top_bar_button_url     = $bizcare_customizer_all_values['bizcare-top-header-bar-button-url'];

                if( !empty( $top_bar_button ) ){
                    $col = 'col-4 col-md-4';
                }else{
                    $col = 'col-12 col-md-6';
                }

            ?>

            <?php if ( 1 == $bizcare_customizer_all_values['bizcare-enbale-top-bar-header'] ) { ?>
                <section class="bt-top-bar py-3">
                    <div class="container">
                        <div class="row">
                            <?php if( !empty( $top_bar_time ) || !empty( $top_bar_phone ) ) { ?>
                                <div class="l-0 d-none d-md-block col-md-5">
                                    <ul class="bt-top-bar-opening-hours p-0 m-0 bt-ls-none">
                                        <?php if( !empty( $top_bar_time ) ) { ?>
                                            <li class="d-inline-block fs-7"><span class="pr-1"><i class="fa fa-clock-o bt-color-primary"></i> </span><?php echo esc_html( $top_bar_time ); ?></li>
                                        <?php } ?>
                                        <?php if( !empty( $top_bar_phone ) ) {  ?>
                                            <li class="d-inline-block fs-7"><span class="pr-1"><i class="fa fa-phone bt-color-primary"></i> </span><?php echo esc_html( $top_bar_phone ); ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <div class="<?php echo esc_attr( $col ); ?> pr-0 bt-social-nav">
                                <ul class="bt-top-social-link p-0 m-0 bt-ls-none">
                                    <?php 
                                        wp_nav_menu( array(
                                            'theme_location' => 'menu-2',
                                            'menu_id'        => 'social-menu',
                                            'fallback_cb'    => false,
                                            'link_before'    => '<span>',
                                            'link_after'     => '</span>',
                                        ) );
                                    ?>
                                </ul>
                            </div>
                            <?php if( !empty( $top_bar_button ) ) { ?>
                                <div class="col-8 col-md-3 text-right">
                                    <a href="<?php echo esc_url( $top_bar_button_url ); ?>" class="bt-appointment-btn bt-small-btn bt-btn-primary bt-bg-primary fs-8"><?php echo esc_html($top_bar_button); ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!-- container -->
                </section>
                <!-- top bar section end -->
            <?php } ?>
            <section class="bt-nav-bar-section">
                <div class="container">
                    <div class="row">
                        <div class="col-8 col-md-3 site-logo py-2 pl-md-0">
                            <div class="bt-logo">
                                <?php
                                the_custom_logo();
                                    ?>
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <?php bloginfo( 'name' ); ?>
                                        </a>
                                    </h1>
                                    <?php
                                $evt_description = get_bloginfo( 'description', 'display' );
                                if ( $evt_description || is_customize_preview() ) :
                                    ?>
                                    <p class="site-description"><?php echo $evt_description; /* WPCS: xss ok. */ ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-4 col-md-9 pl-0 pr-0 pr-md-3">
                            <button class="menu-toggler d-block d-md-none" id="menu-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <nav class="bt-main-menu d-none d-md-block float-right">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location'    => 'menu-1',
                                        'menu_id'           => 'primary-menu', 
                                        'menu_class'        => 'd-md-inline-flex',                            
                                        'container'         => false,
                                        'fallback_cb'       => 'bizcare_primary_menu_mobile_callback',   

                                    ) );
                                ?> 
                                <?php if( !empty( $bizcare_customizer_all_values['bizcare-enable-search-button'] ) ) { ?>
                                    <div class="search-icon position-relative d-none d-md-inline-flex">
                                        <a href="#" id="search-toggler"><i class="fa fa-search"></i></a>                    
                                        <div class="top-search-form">
                                            <div class="search-form">
                                                <?php get_search_form(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>            
                            </nav>
                        </div> 
                                             
                    </div>
                </div><!-- container -->        
            </section>
        <!-- nav bar section end -->
        </div>
    </header><!-- #masthead --> 


<div id="content" class="site-content">

<?php
}
endif;
add_action( 'bizcare_action_nav_page_start', 'bizcare_navigation_page_start', 10 );


if( ! function_exists( 'bizcare_main_slider_setion' ) ) :
/**
 * Main slider
 *
 * @since Bizcare 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function bizcare_main_slider_setion(){
        global $bizcare_customizer_all_values;

        if (  is_front_page() && !is_home() ) {
            do_action('bizcare_action_main_slider');
        } else {
            /**
             * bizcare_page_inner_title hook
             * @since Bizcare 1.0.0
             *
             * @hooked null
             */
            if(  1 ==  $bizcare_customizer_all_values['bizcare-slider-enable-blog'] &&  is_home() ){
                do_action('bizcare_action_main_slider');
            }else{
                do_action('bizcare_page_inner_title');
                do_action('bizcare_action_after_title');
            }
        }
    }
endif;
add_action( 'bizcare_action_on_header', 'bizcare_main_slider_setion', 10 );


if( ! function_exists( 'bizcare_add_breadcrumb' ) ) :

/**
 * Breadcrumb
 *
 * @since Bizcare 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function bizcare_add_breadcrumb(){
        global $bizcare_customizer_all_values;
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb = $bizcare_customizer_all_values['bizcare-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb" class="wrapper wrap-breadcrumb bg-light py-2"><div class="container">';
         bizcare_simple_breadcrumb();
        echo '</div><!-- .container --></div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'bizcare_action_after_title', 'bizcare_add_breadcrumb', 10 );  

