<?php
global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults;

// Call all default value
$defaults  =  bizcare_defauts_value();

/*create a header section */
$bizcare_sections['bizcare-header-section'] = array(
	'title'		=> esc_html__('Header Section','bizcare'),
	'panel'		=>'bizcare-main-page-options',
	'priority'	=> 20
);

/*enable option for extar button*/
$bizcare_settings_controls['bizcare-enable-search-button']  =  array(
	'setting'  => array(
		'default'		  => $defaults['bizcare-enable-search-button']
	),
	'control' => array(
		'label'			  => esc_html__('Show Search Button','bizcare'),
		'section'		  => 'bizcare-header-section',	
		'type'			  => 'checkbox',
		'priority'		  => 10,
		'active_callback' => ''
	)		

);


/*transparent-header*/
$bizcare_settings_controls['bizcare-header-background-enable']  =  array(
	'setting'  => array(
		'default'		=> $defaults['bizcare-header-background-enable']
	),
	'control' => array(
		'label'			  => esc_html__(' Enable Light Header Background ','bizcare'),
		'section'		  => 'bizcare-header-section',
		'type'			  => 'checkbox',
		'priority'		  => 40,
		'active_callback' => ''
	)		

);

// enable option for breadcrumb
$bizcare_settings_controls['bizcare-enable-breadcrumb'] = array(
        'setting' =>     array(
            'default'              => $defaults['bizcare-enable-breadcrumb'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable Breadcrumb', 'bizcare' ),
            'section'               => 'bizcare-header-section',
            'type'                  => 'checkbox',
            'priority'              => 50,
        )
    );

