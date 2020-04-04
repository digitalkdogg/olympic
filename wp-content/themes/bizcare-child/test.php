<?php 
/**
 * Add our Customizer content
 */
function mytheme_customize_register( $wp_customize ) {
   // Add all your Customizer content (i.e. Panels, Sections, Settings & Controls) here...
};
add_action( 'customize_register', 'mytheme_customize_register' );	

/**
 * Add our Header & Navigation Panel
 */
 $wp_customize->add_panel( 'header_naviation_panel',
   array(
      'title' => __( 'Header & Navigation' ),
      'description' => esc_html__( 'Adjust your Header and Navigation sections.' ), // Include html tags such as 
 
      'priority' => 160, // Not typically needed. Default is 160
      'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
      'theme_supports' => '', // Rarely needed
      'active_callback' => '', // Rarely needed
   )
);

/**
 * Add our Sample Section
 */
$wp_customize->add_section( 'sample_custom_controls_section',
   array(
      'title' => __( 'Sample Custom Controls' ),
      'description' => esc_html__( 'These are an example of Customizer Custom Controls.' ),
      'panel' => '', // Only needed if adding your Section to a Panel
      'priority' => 160, // Not typically needed. Default is 160
      'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
      'theme_supports' => '', // Rarely needed
      'active_callback' => '', // Rarely needed
      'description_hidden' => 'false', // Rarely needed. Default is False
   )
);

$wp_customize->add_setting( 'sample_default_text',
   array(
      'default' => '', // Optional.
      'transport' => 'refresh', // Optional. 'refresh' or 'postMessage'. Default: 'refresh'
      'type' => 'theme_mod', // Optional. 'theme_mod' or 'option'. Default: 'theme_mod'
      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
      'theme_supports' => '', // Optional. Rarely needed
      'validate_callback' => '', // Optional. The name of the function that will be called to validate Customizer settings
      'sanitize_callback' => '', // Optional. The name of the function that will be called to sanitize the input data before saving it to the database
      'sanitize_js_callback' => '', // Optional. The name of the function that will be called to sanitize the data before outputting to javascript code. Basically to_json.
      'dirty' => false, // Optional. Rarely needed. Whether or not the setting is initially dirty when created. Default: False
   )
);

?>