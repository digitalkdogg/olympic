<?php
global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults;

// call all defaults values
$defaults = bizcare_defauts_value();

/*create a section for contct*/
$bizcare_sections['bizcare-contact-section'] = array(
	'title'							=> esc_html__('Contact us Section','bizcare'),
	'panel'							=> 'bizcare-main-page-options',
	'priority'						=> 100
);

/*Enable contact section*/
$bizcare_settings_controls['bizcare-contact-section-enable'] = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-contact-section-enable']
	),
	'control' => array(
		'label'						=> esc_html__('Show Contact Us Section','bizcare'),
		'section'					=> 'bizcare-contact-section',
		'type'						=> 'checkbox',
		'priority'					=> 10,
		'active_callback'			=> ''
	)

);

/*contact logo phone */
$bizcare_settings_controls['bizcare-contact-address-logo'] = array(
	'setting'	=> array(
		'default'				=> $defaults['bizcare-contact-address-logo']
	),
	'control' 	=> array(
		'label'				=> esc_html__( 'Address Logo','bizcare' ),
		'section'			=> 'bizcare-contact-section',
		'type'				=> 'text',
		'priority'			=> 15,
		'active_callback' 	=> ''
	)
);


/*contact address */
$bizcare_settings_controls['bizcare-contact-address-title'] = array(
	'setting'	=> array(
		'default'				=> $defaults['bizcare-contact-address-title']
	),
	'control' 	=> array(
		'label'				=> esc_html__( 'Address text','bizcare' ),
		'section'			=> 'bizcare-contact-section',
		'type'				=> 'text',
		'priority'			=> 20,
		'active_callback' 	=> ''
	)
);

/*contact sub address */
$bizcare_settings_controls['bizcare-contact-address-sub-text'] = array(
	'setting'	=> array(
		'default'				=> $defaults['bizcare-contact-address-sub-text']
	),
	'control' 	=> array(
		'label'				=> esc_html__( 'Sub-Address Text','bizcare' ),
		'section'			=> 'bizcare-contact-section',
		'type'				=> 'text',
		'priority'			=> 30,
		'active_callback' 	=> ''
	)
);

/*contact logo phone */
$bizcare_settings_controls['bizcare-contact-phone-logo'] = array(
	'setting'	=> array(
		'default'				=> $defaults['bizcare-contact-phone-logo']
	),
	'control' 	=> array(
		'label'				=> esc_html__( 'Phone Logo','bizcare' ),
		'section'			=> 'bizcare-contact-section',
		'type'				=> 'text',
		'priority'			=> 50,
		'active_callback' 	=> ''
	)
);

/*contact phone */
$bizcare_settings_controls['bizcare-contact-phone-title'] = array(
	'setting'	=> array(
		'default'				=> $defaults['bizcare-contact-phone-title']
	),
	'control' 	=> array(
		'label'				=> esc_html__( 'Phone Text','bizcare' ),
		'section'			=> 'bizcare-contact-section',
		'type'				=> 'text',
		'priority'			=> 55,
		'active_callback' 	=> ''
	)
);

/*contact phone */
$bizcare_settings_controls['bizcare-contact-phone-sub-text'] = array(
	'setting'	=> array(
		'default'				=> $defaults['bizcare-contact-phone-sub-text']
	),
	'control' 	=> array(
		'label'				=> esc_html__( 'Phone sub-Text','bizcare' ),
		'section'			=> 'bizcare-contact-section',
		'type'				=> 'text',
		'priority'			=> 60,
		'active_callback' 	=> ''
	)
);

/*contact logo email */
$bizcare_settings_controls['bizcare-contact-email-logo'] = array(
	'setting'	=> array(
		'default'				=> $defaults['bizcare-contact-email-logo']
	),
	'control' 	=> array(
		'label'				=> esc_html__( 'Email Logo','bizcare' ),
		'section'			=> 'bizcare-contact-section',
		'type'				=> 'text',
		'priority'			=> 70,
		'active_callback' 	=> ''
	)
);

/*contact email */
$bizcare_settings_controls['bizcare-contact-email-title'] = array(
	'setting'	=> array(
		'default'				=> $defaults['bizcare-contact-email-title']
	),
	'control' 	=> array(
		'label'				=> esc_html__( 'Email ','bizcare' ),
		'section'			=> 'bizcare-contact-section',
		'type'				=> 'text',
		'priority'			=> 80,
		'active_callback' 	=> ''
	)
);

/*contact email */
$bizcare_settings_controls['bizcare-contact-email-sub-text'] = array(
	'setting'	=> array(
		'default'				=> $defaults['bizcare-contact-email-sub-text']
	),
	'control' 	=> array(
		'label'				=> esc_html__( 'Email Sub-Text','bizcare' ),
		'section'			=> 'bizcare-contact-section',
		'type'				=> 'text',
		'priority'			=> 90,
		'active_callback' 	=> ''
	)
);