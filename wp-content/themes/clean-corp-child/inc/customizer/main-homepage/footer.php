<?php
global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults;

// Call all defaults values
$defaults = bizcare_defauts_value();

// create footer section
$bizcare_sections['bizcare-footer-options'] = array(
    'priority'       => 700,
    'title'          => esc_html__( 'Footer Options', 'bizcare' ),
    'panel'          => 'bizcare-main-page-options'
);

// create section for footer text
$bizcare_settings_controls['bizcare-copyright-text'] = array(
    'setting' =>     array(
        'default'              => $defaults['bizcare-copyright-text'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Copyright Text', 'bizcare' ),
        'section'               => 'bizcare-footer-options',
        'type'                  => 'text_html',
        'priority'              => 20,
    )
);


/*scroll to top*/
$bizcare_settings_controls['bizcare-enable-scroll-to-top'] = array(
    'setting' =>     array(
        'default'              => $defaults['bizcare-enable-scroll-to-top'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Show Scroll To Top', 'bizcare' ),
        'section'               => 'bizcare-footer-options',
        'type'                  => 'checkbox',
        'priority'              => 60,
    )
);

