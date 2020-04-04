<?php

global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults;

//Call all defaults value
$defaults = bizcare_defauts_value();

//create a section for top header bar
$bizcare_sections['bizcare-top-header-bar-sections'] = array(
	'title'				=> esc_html__('Top Header Bar','bizcare'),
	'panel'				=>'bizcare-main-page-options',
	'priority'			=> 10
); 


// cretae a enable top header
$bizcare_settings_controls['bizcare-enbale-top-bar-header']  = array(
	'setting' => array(
		'default' 		    => $defaults['bizcare-enbale-top-bar-header']	
	),
	'control' => array(
		'label'				=> esc_html__('Show Top Header','bizcare'),
		'section'			=> 'bizcare-top-header-bar-sections',
		'type'				=> 'checkbox',
		'priority'			=> 10,
		'active_callback'	=>''

	)	

);

// create text field for time 
$bizcare_settings_controls['bizcare-top-bar-time']  = array(
	'setting' => array(
		'default' 		=> $defaults['bizcare-top-bar-time']	
	),
	'control' => array(
		'label'				=> esc_html__('Time','bizcare'),
		'section'			=> 'bizcare-top-header-bar-sections',
		'type'				=> 'text',
		'priority'			=> 20,
		'active_callback'	=>''

	)	
);


// create text field for phone  number
$bizcare_settings_controls['bizcare-top-bar-phone']  = array(
	'setting' => array(
		'default' 		    => $defaults['bizcare-top-bar-phone']		
	),
	'control' => array(
		'label'				=> esc_html__('Phone Number','bizcare'),
		'section'			=> 'bizcare-top-header-bar-sections',
		'type'				=> 'text',
		'priority'			=> 30,
		'active_callback'	=>''

	)	

);


/*top bar button text*/
$bizcare_settings_controls['bizcare-top-header-bar-button'] = array(
	'setting' => array(
		'default'		=> $defaults['bizcare-top-header-bar-button']
	),
	'control' => array(
		'label'				=> esc_html__('Button Text','bizcare'),
		'section'			=> 'bizcare-top-header-bar-sections',
		'type'				=> 'text',
		'priority'			=> 40,
		'active_callback'	=> ''
	)
);

/*top bar button url*/
$bizcare_settings_controls['bizcare-top-header-bar-button-url'] = array(
	'setting' => array(
		'default'		=> $defaults['bizcare-top-header-bar-button-url']
	),
	'control' => array(
		'label'				=> esc_html__('Button url','bizcare'),
		'section'			=> 'bizcare-top-header-bar-sections',
		'type'				=> 'url',
		'priority'			=> 50,
		'active_callback'	=> ''
	)
);



