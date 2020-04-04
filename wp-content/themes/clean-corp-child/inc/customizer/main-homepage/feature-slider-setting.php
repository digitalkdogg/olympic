<?php
global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defaults; 

//Call all defaults value
$defaults = bizcare_defauts_value();

/*create section for feature slider*/
$bizcare_sections['bizcare-slider-section']  = array(
    'title'                 => esc_html__('Feature Slider Section','bizcare'),
    'panel'                 => 'bizcare-main-page-options',
    'priority'              => 20
);

/*slider enable */
$bizcare_settings_controls['bizcare-enbale-slider'] = array(
    'setting' => array(
        'default'          => $defaults['bizcare-enbale-slider']
    ),
    'control' => array(
        'label'             => esc_html__('Show Slider','bizcare'),
        'section'           => 'bizcare-slider-section',
        'type'              => 'checkbox',
        'priority'          => 10,
        'acticve_callback'  => ''

    )       
);

/*except length */
$bizcare_settings_controls['bizcare-excerpt-length'] = array(
    'setting' => array(
        'default'          => $defaults['bizcare-excerpt-length']  
    ),
    'control' => array(
        'label'             => esc_html__('Excerpt Length','bizcare'),
        'section'           => 'bizcare-slider-section',
        'type'              => 'number',
        'priority'          => 20,
        'acticve_callback'  => ''

    )       
);

/* Select slider post */
$bizcare_settings_controls['bizcare-select-post-form'] = array(
    'setting' => array(
        'default'                   => $defaults['bizcare-select-post-form']  
    ),
    'control' => array(
        /* translators: %s: search slider page */
        'label'                 => esc_html__('Select Slider Post Type ','bizcare'),
        'section'               => 'bizcare-slider-section',
        'type'                  => 'select',
        'choices' => array(
            'form-category'     => esc_html__('Choose From Category','bizcare'),    
            'form-post'         => esc_html__('Choose From page','bizcare'),    
        ),            
        'priority'              => 30,
        'acticve_callback'      => ''

    ),     
);


/*post type slider from post */
$bizcare_settings_controls['bizcare-select-from-cat'] = array(
    'setting' => array(
        'default'                   => $defaults['bizcare-select-from-cat']
    ),
    'control' => array(
        'label'                 => esc_html__('Select Category Slider ','bizcare'),
        'section'               => 'bizcare-slider-section',
        'type'                  => 'category_dropdown',            
        'priority'              => 40,
        'acticve_callback'      => ''

    ),     
);

/*post type slider from page */
$bizcare_repeated_settings_controls['bizcare-select-from-page'] = array(
    'repeated'      => 3,
    'bizcare-page-id' => array(
        'setting' => array(
            'default'                   => $defaults['bizcare-select-from-page']
        ),
        'control' => array(
            /* translators: %s: search slider page */
            'label'                 => esc_html__('Slider %s','bizcare'),
            'section'               => 'bizcare-slider-section',
            'type'                  => 'dropdown-pages',            
            'priority'              => 60,
            'acticve_callback'      => ''

        ),  
    )   
);

/*Button text */
$bizcare_settings_controls['bizcare-slider-button-text'] = array(
    'setting' => array(
        'default'           => $defaults['bizcare-slider-button-text'] 
    ),
    'control' => array(
        'label'             => esc_html__('Button text','bizcare'),
        'section'           => 'bizcare-slider-section',
        'type'              => 'text',
        'priority'          => 70,
        'acticve_callback'  => ''

    )       
);

/*Button text */
$bizcare_settings_controls['bizcare-slider-button-text2'] = array(
    'setting' => array(
        'default'           => $defaults['bizcare-slider-button-text2'] 
    ),
    'control' => array(
        'label'             => esc_html__('Extra Button text','bizcare'),
        'section'           => 'bizcare-slider-section',
        'type'              => 'text',
        'priority'          => 80,
        'acticve_callback'  => ''

    )       
);

/*Button text */
$bizcare_settings_controls['bizcare-slider-button-text2-url'] = array(
    'setting' => array(
        'default'           => $defaults['bizcare-slider-button-text2-url'] 
    ),
    'control' => array(
        'label'             => esc_html__('Extra Button url','bizcare'),
        'section'           => 'bizcare-slider-section',
        'type'              => 'url',
        'priority'          => 90,
        'acticve_callback'  => ''

    )       
);

/*for blog option */
$bizcare_settings_controls['bizcare-slider-enable-blog'] = array(
    'setting' => array(
        'default'          =>  $defaults['bizcare-slider-enable-blog']  
    ),
    'control' => array(
        'label'             => esc_html__('Enable Slider on Blog Archive','bizcare'),
        'section'           => 'bizcare-slider-section',
        'type'              => 'checkbox',
        'priority'          => 100,
        'acticve_callback'  => ''

    )       
);

/*for arrow option */
$bizcare_settings_controls['bizcare-slider-enable-arrow'] = array(
    'setting' => array(
        'default'          =>  $defaults['bizcare-slider-enable-arrow']  
    ),
    'control' => array(
        'label'             => esc_html__('Show Arrow','bizcare'),
        'section'           => 'bizcare-slider-section',
        'type'              => 'checkbox',
        'priority'          => 110,
        'acticve_callback'  => ''

    )       
);

/*for pager option */
$bizcare_settings_controls['bizcare-slider-enable-pager'] = array(
    'setting' => array(
        'default'          =>  $defaults['bizcare-slider-enable-pager']  
    ),
    'control' => array(
        'label'             => esc_html__('Show Pager','bizcare'),
        'section'           => 'bizcare-slider-section',
        'type'              => 'checkbox',
        'priority'          => 120,
        'acticve_callback'  => ''

    )       
);


