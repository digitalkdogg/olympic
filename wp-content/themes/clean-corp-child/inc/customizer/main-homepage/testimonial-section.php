<?php

global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults; 


// Call all defaults value
$defaults = bizcare_defauts_value();

/*create a section */
$bizcare_sections['bizcare-testimonial-section'] = array(
	'title'							=> esc_html__('Testimonial Section','bizcare'),
	'panel'							=> 'bizcare-main-page-options',
	'priority'						=> 80
);

/*Enable Testimonial*/
$bizcare_settings_controls['bizcare-testimonila-enable'] = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-testimonila-enable']
	),
	'control' => array(
		'label'						=> esc_html__('Show testimonial','bizcare'),
		'section'					=> 'bizcare-testimonial-section',
		'type'						=> 'checkbox',
		'priority'					=> 10,
		'active_callback'			=> ''
	)
);

/*Section Title*/
$bizcare_settings_controls['bizcare-testimonial-section-title'] = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-testimonial-section-title']
	),
	'control' => array(
		'label'						=> esc_html__('Section Title','bizcare'),
		'section'					=> 'bizcare-testimonial-section',
		'type'						=> 'text',
		'priority'					=> 20,
		'active_callback'			=> ''
	)
);


/*Excerpt Length*/
$bizcare_settings_controls['bizcare-testimonial-excerpt-length'] = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-testimonial-excerpt-length']
	),
	'control' => array(
		'label'						=> esc_html__('Excerpt Length','bizcare'),
		'section'					=> 'bizcare-testimonial-section',
		'type'						=> 'number',
		'priority'					=> 40,
		'active_callback'			=> ''
	)
);

/* Select slider post */
$bizcare_settings_controls['bizcare-testimonial-select-form'] = array(
        'setting' => array(
        'default'                   => $defaults['bizcare-testimonial-select-form'] 
        ),
        'control' => array(
            'label'                 => esc_html__('Select Slider Post Type ','bizcare'),
            'section'               => 'bizcare-testimonial-section',
            'type'                  => 'select',
            'choices' => array(
                'form-category'     => esc_html__('Choose From Category','bizcare'),    
                'form-post'         => esc_html__('Choose From page','bizcare'),    
            ),            
            'priority'              => 50,
            'acticve_callback'      => ''

        ),     
);

/*post type slider from post */
$bizcare_settings_controls['bizcare-testimonial-from-category'] = array(
        'setting' => array(
        'default'                   => $defaults['bizcare-testimonial-from-category'] 
        ),
        'control' => array(
            'label'                 => esc_html__('Select Category','bizcare'),
            'section'               => 'bizcare-testimonial-section',
            'type'                  => 'category_dropdown',            
            'priority'              => 60,
            'acticve_callback'      => ''

        ),     
);


/*Select number of page*/
$bizcare_repeated_settings_controls['bizcare-testimonial-designation'] = array(
	'repeated'					   => 2,
	'testimonial-designation-ids' => array(
		'setting' => array(
			'default'					=> $defaults['bizcare-testimonial-designation']
		),
		'control' => array(
			/* translators: %s: search testimonila designation */
			'label'						=> esc_html__('Designation %s','bizcare'),
			'section'					=> 'bizcare-testimonial-section',
			'type'						=> 'text',
			'priority'					=> 70,
			'active_callback'			=> ''
		)
	),
	'testimonial-page-ids' => array(
		'setting' => array(
			'default'					=> $defaults['bizcare-testimonial-select-for-page']
		),
		'control' => array(
			/* translators: %s: search testimonial page */
			'label'						=> esc_html__('Testimonial %s','bizcare'),
			'section'					=> 'bizcare-testimonial-section',
			'type'						=> 'dropdown-pages',
			'priority'					=> 70,
			'active_callback'			=> ''
		)
	),	
);

/*Background image upload*/
$bizcare_settings_controls['bizcare-testimonial-background-image'] = array(
	'setting' => array(
		'default'					=> $defaults['bizcare-testimonial-background-image']
	),
	'control' => array(
		'label'						=> esc_html__('Background Image','bizcare'),
		'section'					=> 'bizcare-testimonial-section',
		'type'						=> 'image',
		'priority'					=> 80,
		'active_callback'			=> ''
	)
);

