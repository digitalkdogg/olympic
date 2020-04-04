<?php
global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults; 

//call all defaults values
$defaults = bizcare_defauts_value();

/*create section about us*/
$bizcare_sections['bizcare-about-us-section'] = array(
	'title'					=> esc_html__(' About Us Section','bizcare'),
	'panel'					=> 'bizcare-main-page-options',
	'priority'				=> 70
);

/*enable about us*/
$bizcare_settings_controls['bizcare-enable-about-us']  =  array(
	'setting' => array(
		'default'			=> $defaults['bizcare-enable-about-us']
	),
	'control' => array(
		'label'				=> esc_html__('Show About Us Section','bizcare'),
		'section'			=> 'bizcare-about-us-section',
		'type'				=> 'checkbox',
		'priority'			=> 10,
		'active_callback'	=> ''
	)

);

/*About us Section title */
$bizcare_settings_controls['bizcare-about-us-title']  =  array(
	'setting' => array(
		'default'			=> $defaults['bizcare-about-us-title']
	),
	'control' => array(
		'label'				=> esc_html__('Title','bizcare'),
		'section'			=> 'bizcare-about-us-section',
		'type'				=> 'text',
		'priority'			=> 15,
		'active_callback'	=> ''
	)

);

/*excerpt length*/
$bizcare_settings_controls['bizcare-excerpt-length-left']  =  array(
	'setting' => array(
		'default'			=> $defaults['bizcare-excerpt-length-left']
	),
	'control' => array(
		'label'				=> esc_html__('Excerpt Length for Left Content','bizcare'),
		'section'			=> 'bizcare-about-us-section',
		'type'				=> 'number',
		'priority'			=> 20,
		'active_callback'	=> ''
	)

);

/*Select Page*/
$bizcare_settings_controls['bizcare-about-us-select-page']  =  array(
	'setting' => array(
		'default'			=> $defaults['bizcare-about-us-select-page']
	),
	'control' => array(
		'label'				=> esc_html__('Select page','bizcare'),
		'section'			=> 'bizcare-about-us-section',
		'type'				=> 'dropdown-pages',
		'priority'			=> 40,
		'active_callback'	=> ''
	)

);

/*button text*/
$bizcare_settings_controls['bizcare-about-us-button-text']  =  array(
	'setting' => array(
		'default'			=> $defaults['bizcare-about-us-button-text']
	),
	'control' => array(
		'label'				=> esc_html__('Button Text','bizcare'),
		'section'			=> 'bizcare-about-us-section',
		'type'				=> 'text',
		'priority'			=> 50,
		'active_callback'	=> ''
	)

);


/*excerpt length for right Content*/
$bizcare_settings_controls['bizcare-excerpt-length-right']  =  array(
	'setting' => array(
		'default'			=> $defaults['bizcare-excerpt-length-right']
	),
	'control' => array(
		'label'				=> esc_html__('Excerpt Length for Righ Content','bizcare'),
		'section'			=> 'bizcare-about-us-section',
		'type'				=> 'number',
		'priority'			=> 55,
		'active_callback'	=> ''
	)

);

/*abouut us right page selection*/
$bizcare_repeated_settings_controls['bizcare-abouts-us-right-page'] = array(
	'repeated'	=> 3,
	'about-us-right-icons-ids' => array(
        'setting' => array(
            'default'               =>   $defaults['bizcare-about-us-page-icon']
        ),
        'control' =>   array(
            /* translators: %s: search page icon */
            'label'                 =>    esc_html__( 'Icon for Page %s', 'bizcare' ),
            /* translators: %s: search page icon describe */
            'description'           =>   sprintf( esc_html__( 'Eg: %1$s. %2$s View Font Awesome. %3$s', 'bizcare' ), "<b>".'fa-wrench'."</b>",'<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">','</a>' ),
            'section'               =>   'bizcare-about-us-section',
            'type'                  =>   'text',
            'priority'              =>   60,
            'active_callback'       =>   ''
        )
	),

	'abouts-us-page-right-ids' => array(
		'setting'	=> array(
			'default'  => $defaults['bizcare-abouts-us-right-page']
		),
		'control'	=> array(
			'label'				=> esc_html__( 'Select page for right content','bizcare' ),
			'section'			=> 'bizcare-about-us-section',
			'type'				=> 'dropdown-pages',
			'priority'			=> 60,
			'active_callback'	=> '' 
		),
	)

);