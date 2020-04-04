<?php
global $bizcare_panels;
global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults;

// Call all default values
$defaults = bizcare_defauts_value();

/*create section for feature*/
$bizcare_sections['bizcare-feature-section'] = array(
	'title'		          => esc_html__('Features Section','bizcare'),
	'panel'		          => 'bizcare-main-page-options',	
	'priority'	          => 30,

);

/*enable feature section*/
$bizcare_settings_controls['bizcare-feature-enable'] = array(
    'setting' =>       array(
        'default'               =>   $defaults['bizcare-feature-enable']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Show Features Section', 'bizcare' ),
        'section'               =>   'bizcare-feature-section',
        'type'                  =>   'checkbox',
        'priority'              =>   10,
        'active_callback'       =>   ''
    )
);
    
/*Section Title*/
$bizcare_settings_controls['bizcare-feature-section-title'] = array(
    'setting' =>       array(
        'default'              =>   $defaults['bizcare-feature-section-title']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Section Title', 'bizcare' ),
        'section'               =>   'bizcare-feature-section',
        'type'                  =>   'text',
        'priority'              =>   15,
        'active_callback'       =>   ''
    )
);

/*Section Sub-Title*/
$bizcare_settings_controls['bizcare-feature-section-sub-title'] = array(
    'setting' =>       array(
        'default'              =>   $defaults['bizcare-feature-section-sub-title']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Section Sub-Title', 'bizcare' ),
        'section'               =>   'bizcare-feature-section',
        'type'                  =>   'textarea',
        'priority'              =>   17,
        'active_callback'       =>   ''
    )
);


/*Excerpt length */
$bizcare_settings_controls['bizcare-feature-excerpt-length'] = array(
    'setting' =>       array(
        'default'               =>   $defaults['bizcare-feature-excerpt-length']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Excerpt Length', 'bizcare' ),
        'section'               =>   'bizcare-feature-section',
        'type'                  =>   'number',
        'priority'              =>   30,
        'active_callback'       =>   ''
    )
);

/* Select slider post */
$bizcare_settings_controls['bizcare-feature-select-form'] = array(
    'setting' => array(
    'default'                   => $defaults['bizcare-feature-select-form'] 
    ),
    'control' => array(
        'label'                 => esc_html__('Select Slider Post Type ','bizcare'),
        'section'               => 'bizcare-feature-section',
        'type'                  => 'select',
        'choices' => array(
            'form-category'     => esc_html__('Choose From Category','bizcare'),    
            'form-post'         => esc_html__('Choose From page','bizcare'),    
        ),            
        'priority'              => 40,
        'acticve_callback'      => ''

    ),     
);

/*post type slider from post */
$bizcare_settings_controls['bizcare-feature-from-category'] = array(
    'setting' => array(
    'default'                   => $defaults['bizcare-feature-from-category'] 
    ),
    'control' => array(
        'label'                 => esc_html__('Select Category','bizcare'),
        'section'               => 'bizcare-feature-section',
        'type'                  => 'category_dropdown',            
        'priority'              => 50,
        'acticve_callback'      => ''

    ),     
);



/*page Selection */
$bizcare_repeated_settings_controls['bizcare-feature-from-page'] = array(
	'repeated' 		=> 4,
	'feature-icons-ids' => array(
        'setting' => array(
            'default'               =>   $defaults['bizcare-feature-page-icon']
        ),
        'control' =>   array(
            /* translators: %s: search page icon */
            'label'                 =>    esc_html__( 'Icon for Page %s', 'bizcare' ),
            /* translators: %s: search page icon describe */
            'description'           =>   sprintf( esc_html__( 'Eg: %1$s. %2$s View Font Awesome. %3$s', 'bizcare' ), "<b>".'fa-wrench'."</b>",'<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">','</a>' ),
            'section'               =>   'bizcare-feature-section',
            'type'                  =>   'text',
            'priority'              =>   60,
            'active_callback'       =>   ''
        )
	),
    'feature-page-ids' => array(
        'setting' => array(
            'default'              =>   $defaults['bizcare-feature-from-page']
        ),
        'control' =>   array(
            /* translators: %s: search feature page */
            'label'                 =>    esc_html__( 'Page %s', 'bizcare' ),
            'section'               =>   'bizcare-feature-section',
            'type'                  =>   'dropdown-pages',
            'priority'              =>   60,
            'active_callback'       =>   ''
        )
    ),      
	
);

/* button text*/
$bizcare_settings_controls['bizcare-feature-button-text'] = array(
    'setting' =>       array(
        'default'               =>   $defaults['bizcare-feature-button-text']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Button Text', 'bizcare' ),
        'section'               =>   'bizcare-feature-section',
        'type'                  =>   'text',
        'priority'              =>   70,
        'active_callback'       =>   ''
    )
);

/*button text */
$bizcare_settings_controls['bizcare-feature-button-text'] = array(
    'setting' =>       array(
        'default'               =>   $defaults['bizcare-feature-button-text']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Button Text', 'bizcare' ),
        'section'               =>   'bizcare-feature-section',
        'type'                  =>   'text',
        'priority'              =>   90,
        'active_callback'       =>   ''
    )
);

/*button url */
$bizcare_settings_controls['bizcare-feature-button-url'] = array(
    'setting' =>       array(
        'default'               =>   $defaults['bizcare-feature-button-url']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Button url', 'bizcare' ),
        'section'               =>   'bizcare-feature-section',
        'type'                  =>   'text',
        'priority'              =>   100,
        'active_callback'       =>   ''
    )
);