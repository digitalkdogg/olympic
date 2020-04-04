<?php
/**
 * evision themes Theme Customizer
 *
 * @package eVision themes
 * @subpackage bizcare
 * @since bizcare 1.0.0
 */

/*Define Url for including css and js*/
if ( !defined( 'EVISION_CUSTOMIZER_URL' ) ) {
    define( 'EVISION_CUSTOMIZER_URL', trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/evision-customizer/' );
}

/*Define path for including php files*/
if ( !defined( 'EVISION_CUSTOMIZER_PATH' ) ) {
    define( 'EVISION_CUSTOMIZER_PATH', trailingslashit( get_template_directory() ) . 'inc/frameworks/evision-customizer/' );
}

/*define constant for evision customizer name*/
if(!defined('EVISION_CUSTOMIZER_NAME') ){
    define( 'EVISION_CUSTOMIZER_NAME', 'bizcare_options' );
}

/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since bizcare 1.0.0
 */
if ( ! function_exists( 'bizcare_reset_options' ) ) :
    function bizcare_reset_options( $reset_options ) {
        set_theme_mod( EVISION_CUSTOMIZER_NAME, $reset_options );
    }
endif;

require get_template_directory().'/inc/customizer/default.php';

/**
 * Customizer framework added.
 */
require get_template_directory() . '/inc/frameworks/evision-customizer/evision-customizer.php';
global $bizcare_panels;
global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $bizcare_customizer_defaults;
global $defaults;

$defaults =  bizcare_defauts_value();


/*mainhomepage panel*/
require get_template_directory().'/inc/customizer/main-homepage/all-option-panel.php';

/******************************************
Modify Theme Option Section Options
 *******************************************/
require get_template_directory().'/inc/customizer/theme-option/option-panel.php';



/*Resetting all Values*/
/**
 * Reset color settings to default
 *
 * @since bizcare 1.0.0
 */
global $bizcare_customizer_defaults;
$bizcare_customizer_defaults['bizcare-customizer-reset-settings'] = '';
if ( ! function_exists( 'bizcare_customizer_reset' ) ) :
    function bizcare_customizer_reset( ) {
        global $bizcare_customizer_saved_values;
        $bizcare_customizer_saved_values = bizcare_get_all_options();
        if ( $bizcare_customizer_saved_values['bizcare-customizer-reset-settings'] == 1 ) {
            global $bizcare_customizer_defaults;
            /*getting fields*/
            $bizcare_customizer_defaults['bizcare-customizer-reset-settings'] = '';
            /*resetting fields*/
            bizcare_reset_options( $bizcare_customizer_defaults );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','bizcare_customizer_reset' );

$bizcare_sections['bizcare-customizer-reset'] = array(
        'priority'       => 999,
        'title'          => esc_html__( 'Reset All Options', 'bizcare' )
);

$bizcare_settings_controls['bizcare-customizer-reset-settings'] = array(
    'setting' =>     array(
        'default'              => $bizcare_customizer_defaults['bizcare-customizer-reset-settings'],
        'transport'            => 'postmessage',
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Reset All Options', 'bizcare' ),
        'description'           =>  esc_html__( 'Caution: This will reset all options to default. Publish the changes and Refresh the page to view the changes. ', 'bizcare' ),
        'section'               => 'bizcare-customizer-reset',
        'type'                  => 'checkbox',
        'priority'              => 10,
        'active_callback'       => ''
    )
);

/******************************************
Additional Css
 *******************************************/
$bizcare_sections['custom_css'] = array(
    'title'          => esc_html__( 'Additional CSS', 'bizcare' ),
    'priority'       => 400,
);

$bizcare_customizer_args = array(
    'panels'            => $bizcare_panels, /*always use key panels */
    'sections'          => $bizcare_sections,/*always use key sections*/
    'settings_controls' => $bizcare_settings_controls,/*always use key settings_controls*/
    'repeated_settings_controls' => $bizcare_repeated_settings_controls,/*always use key sections*/
);

/*registering panel section setting and control start*/
function bizcare_add_panels_sections_settings() {
    global $bizcare_customizer_args;
    return $bizcare_customizer_args;
}
add_filter( 'evision_customizer_panels_sections_settings', 'bizcare_add_panels_sections_settings' );
/*registering panel section setting and control end*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bizcare_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'bizcare_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bizcare_customize_preview_js() {
    wp_enqueue_script( 'bizcare_customizer', get_template_directory_uri() . '/assets/src/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bizcare_customize_preview_js' );


/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since bizcare 1.0.0
 */
if ( ! function_exists( 'bizcare_get_all_options' ) ) :
    function bizcare_get_all_options( $merge_default = 0 ) {
        $bizcare_customizer_saved_values = evision_customizer_get_all_values( EVISION_CUSTOMIZER_NAME );
        if( 1 == $merge_default ){
            global $defaults;
            if(is_array( $bizcare_customizer_saved_values )){
                $bizcare_customizer_saved_values = array_merge($defaults, $bizcare_customizer_saved_values );
            }
            else{
                $bizcare_customizer_saved_values = $defaults;
            }
        }
        return $bizcare_customizer_saved_values;
    }
endif;
