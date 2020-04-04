<?php

global $bizcare_panels;
global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults;

//Call all defaults values
$defaults = bizcare_defauts_value();

/*creating panel for fonts-setting*/
$bizcare_panels['bizcare-fonts'] = array(
    'title'          => esc_html__( 'Font Setting', 'bizcare' ),
    'panel'          => 'bizcare-theme-options',
    'priority'       => 120
);

/*font array*/
global $bizcare_google_fonts;
$bizcare_google_fonts = array(
    'Open+Sans:400,400italic,600,700'               => 'Open Sans',
    'Roboto:400,500,300,700,400italic'              => 'Roboto',
    'Lato:400,300,400italic,900,700'                => 'Lato',
    'Slabo+27px'                                    => 'Slabo 27px',
    'Oswald:400,300,700'                            => 'Oswald',
    'Roboto+Condensed:400,300,400italic,700'        => 'Roboto Condensed',
    'Source+Sans+Pro:400,400italic,600,900,300'     => 'Source Sans Pro',
    'Lora:400,400italic,700,700italic'              => 'Lora',
    'Montserrat:400,700'                            => 'Montserrat',
    'PT+Sans:400,400italic,700'                     => 'PT Sans',
    'Open+Sans+Condensed:300,300italic,700'         => 'Open Sans Condensed',
    'Raleway:400,300,500,600,700,900'               => 'Raleway',
    'Droid+Sans:400,700'                            => 'Droid Sans',
    'Ubuntu:400,400italic,500,700'                  => 'Ubuntu',
    'Droid+Serif:400,400italic,700'                 => 'Droid Serif',
    'Roboto+Slab:400,300,700'                       => 'Roboto Slab',
    'Arimo:400,400italic,700'                       => 'Arimo',
    'Merriweather:400,400italic,300,900,700'        => 'Merriweather',
    'PT+Sans+Narrow:400,700'                        => 'PT Sans Narrow',
    'Poiret+One'                                    => 'Poiret One',
    'Noto +Sans:400,400italic,700'                  => 'Noto Sans',
    'Titillium+Web:400,300,400italic,700,900'       => 'Titillium Web',
    'PT+Serif:400,400italic,700'                    => 'PT Serif',
    'Bitter:400,400italic,700'                      => 'Bitter',
    'Indie+Flower'                                  => 'Indie Flower',
    'Yanone+Kaffeesatz:400,300,700'                 => 'Yanone Kaffeesatz',
    'Dosis:400,300,600,800'                         => 'Dosis',
    'Arvo:400,400italic,700'                        => 'Arvo',
    'Alex+Brush'                                    => 'Alex Brush',
    'Fredericka+the+Great'                          => 'Fredericka the Great',
    'Catamaran:400,600,700'                         => 'Catamaran'
);


/*section*/
$bizcare_sections['bizcare-family'] =array(
    'title'          => esc_html__( 'Fonts', 'bizcare' ),
    'panel'          => 'bizcare-theme-options',
    'priority'       => 120,
);

/*setting - controls*/
$bizcare_settings_controls['bizcare-font-family-site-identity'] = array(
    'setting' =>     array(
        'default'              => $defaults['bizcare-font-family-site-identity'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Site Identity Font Family', 'bizcare' ),
        'description'           => esc_html__( 'Site title and tagline font family', 'bizcare' ),
        'section'               => 'bizcare-family',
        'type'                  => 'select',
        'choices'               => $bizcare_google_fonts,
        'priority'              => 10,
        'active_callback'       => ''
    )
);

//fonts for menu text
$bizcare_settings_controls['bizcare-font-family-menu'] = array(
    'setting' =>     array(
        'default'              => $defaults['bizcare-font-family-menu'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Menu Font Family', 'bizcare' ),
        'description'           => esc_html__( 'Primary menu font family', 'bizcare' ),
        'section'               => 'bizcare-family',
        'type'                  => 'select',
        'choices'               => $bizcare_google_fonts,
        'priority'              => 20,
        'active_callback'       => ''
    )
);

//primary fonts family 
$bizcare_settings_controls['bizcare-primary-font-family'] = array(
    'setting' =>     array(
        'default'              => $defaults['bizcare-primary-font-family'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Primary Font', 'bizcare' ),
        'section'               => 'bizcare-family',
        'type'                  => 'select',
        'choices'               => $bizcare_google_fonts,
        'priority'              => 30,
        'active_callback'       => ''
    )
);

//Secondary fonts family
$bizcare_settings_controls['bizcare-secondary-font-family'] = array(
    'setting' =>     array(
        'default'              => $defaults['bizcare-secondary-font-family'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Secondary Font', 'bizcare' ),
        'section'               => 'bizcare-family',
        'type'                  => 'select',
        'choices'               => $bizcare_google_fonts,
        'priority'              => 40,
        'active_callback'       => ''
    )
);





