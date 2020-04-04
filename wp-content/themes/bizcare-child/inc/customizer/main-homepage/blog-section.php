<?php

global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults; 

/* call all defaults value*/
$defaults = bizcare_defauts_value();

/*create section blog*/
$bizcare_sections['bizcare-blog-section'] = array(
	'title'							=> esc_html__('Blog Section','bizcare'),
	'panel'							=> 'bizcare-main-page-options',
	'priority'						=> 90
);

/*enable blog section*/
$bizcare_settings_controls['bizcare-blog-section-enable']  = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-blog-section-enable']
	),
	'control' => array(
		'label'						=> esc_html__('Show Blog Section ','bizcare'),
		'section'					=> 'bizcare-blog-section',
		'type'						=> 'checkbox',
		'priority'					=> 10,
		'active_callback'			=> ''
	)
);

/*Blog section Title*/
$bizcare_settings_controls['bizcare-blog-section-title-text']  = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-blog-section-title-text']
	),
	'control' => array(
		'label'						=> esc_html__('Section Title','bizcare'),
		'section'					=> 'bizcare-blog-section',
		'type'						=> 'text',
		'priority'					=> 20,
		'active_callback'			=> ''
	)
);


/*Excerpt Length*/
$bizcare_settings_controls['bizcare-blog-excerpt-length']  = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-blog-excerpt-length']
	),
	'control' => array(
		'label'						=> esc_html__('Excerpt Length','bizcare'),
		'section'					=> 'bizcare-blog-section',
		'type'						=> 'number',
		'priority'					=> 40,
		'active_callback'			=> ''
	)
);

/*Select Category*/
$bizcare_settings_controls['bizcare-blog-select-category']  = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-blog-select-category']
	),
	'control' => array(
		'label'						=> esc_html__('Select Category for Blog','bizcare'),
		'section'					=> 'bizcare-blog-section',
		'type'						=> 'category_dropdown',
		'priority'					=> 50,
		'active_callback'			=> ''
	)
);


/*Button Text*/
$bizcare_settings_controls['bizcare-blog-button-text']  = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-blog-button-text']
	),
	'control' => array(
		'label'						=> esc_html__('Button Text','bizcare'),
		'section'					=> 'bizcare-blog-section',
		'type'						=> 'text',
		'priority'					=> 60,
		'active_callback'			=> ''
	)
);
