<?php

global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults;

// call all defaults values
$defaults = bizcare_defauts_value();

/*create section for call to action*/
$bizcare_sections['bizcare-subscribe-section'] = array(
	'title'							=> esc_html__('Subscribe US','bizcare'),
	'panel'							=> 'bizcare-main-page-options',
	'priority'						=> 110,
);

/*create enable section*/
$bizcare_settings_controls['bizcare-enable-subscribe-us'] = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-enable-subscribe-us'] 
	),	
	'control' => array(
		'label'						=> esc_html__('Show Subscribe Us','bizcare'),
		'section'					=> 'bizcare-subscribe-section',
		'type'						=> 'checkbox',
		'priority'					=> 10,
		'acitive_callback'			=> ''
	)		

);

/*Excerpt Length*/
$bizcare_settings_controls['bizcare-subscribe-us-title'] = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-subscribe-us-title'] 
	),	
	'control' => array(
		'label'						=> esc_html__('Title','bizcare'),
		'section'					=> 'bizcare-subscribe-section',
		'type'						=> 'text',
		'priority'					=> 20,
		'acitive_callback'			=> ''
	)		

);


/*page selection*/
$bizcare_settings_controls['bizcare-subscribe-us-sub-title'] = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-subscribe-us-sub-title'] 
	),	
	'control' => array(
		'label'						=> esc_html__('Subscribe Description ','bizcare'),
		'section'					=> 'bizcare-subscribe-section',
		'type'						=> 'textarea',
		'priority'					=> 50,
		'acitive_callback'			=> ''
	)		

);

/*Button Text*/
$bizcare_settings_controls['bizcare-subscribe-us-shortcode'] = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-subscribe-us-shortcode'] 
	),	
	'control' => array(
		'label'						=> esc_html__('Short Code Text','bizcare'),
		'section'					=> 'bizcare-subscribe-section',
		'type'						=> 'text',
		'priority'					=> 60,
		'acitive_callback'			=> ''
	)		

);



