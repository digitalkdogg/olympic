<?php
global$bizcare_sections;
global$bizcare_settings_controls;
global$defaults;

//Call all defaults values
$defaults = bizcare_defauts_value();

/*create color section */
$bizcare_sections['colors'] = array(
        'priority'       => 110,
        'title'          => esc_html__( 'Colors', 'bizcare' ),
        'panel'          => 'bizcare-theme-options'
    );

//color for site-identity
$bizcare_settings_controls['bizcare-site-identity-color'] = array(
    'setting' =>  array(
        'default'  => $defaults['bizcare-site-identity-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Site Identity Color', 'bizcare' ),
        'description'           =>  esc_html__( 'Site title and tagline color', 'bizcare' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 20,
        'active_callback'       => ''
    )
);

//color for top header background
$bizcare_settings_controls['bizcare-top-header-background-bar-color'] = array(
    'setting' => array(
        'default' => $defaults['bizcare-top-header-background-bar-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Top Header  Background Color', 'bizcare' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 40,
        'active_callback'       => ''
    )
);

//color for primary color
$bizcare_settings_controls['bizcare-primary-color'] = array(
    'setting' => array(
        'default' => $defaults['bizcare-primary-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Primary Color', 'bizcare' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 60,
        'active_callback'       => ''
    )
);

//color for secondary
$bizcare_settings_controls['bizcare-secondary-color'] = array(
    'setting' => array(
        'default' => $defaults['bizcare-secondary-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Secondary Color', 'bizcare' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 150,
        'active_callback'       => ''
    )
);

//color for footer background color
$bizcare_settings_controls['bizcare-footer-background-color'] = array(
    'setting' => array(
        'default' => $defaults['bizcare-footer-background-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Footer Background Color', 'bizcare' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 160,
        'active_callback'       => ''
    )
);


