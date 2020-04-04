<?php
global $bizcare_sections;
global $bizcare_settings_controls;
global $bizcare_repeated_settings_controls;
global $defauts;

//call all defaults values
$defaults = bizcare_defauts_value();

// layout option section
$bizcare_sections['bizcare-layout-options'] = array(
    'priority'       => 200,
    'title'          => esc_html__( 'Layout Options', 'bizcare' ),
    'panel'          => 'bizcare-theme-options',
);

/*home page static page display*/
$bizcare_settings_controls['bizcare-enable-static-page'] = array(
    'setting' =>     array(
        'default'              => $defaults['bizcare-enable-static-page'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Static Front Page', 'bizcare' ),
        'description'           =>  esc_html__( 'If you disable this, the static page will be disappeared form the front page and other section will remain as it is', 'bizcare' ),
        'section'               => 'bizcare-layout-options',
        'type'                  => 'checkbox',
        'priority'              => 10,
    )
);


/*layout-options option responsive lodader start*/
$bizcare_settings_controls['bizcare-default-layout'] = array(
    'setting' =>     array(
        'default'              => $defaults['bizcare-default-layout'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Default Layout', 'bizcare' ),
        'description'           =>  esc_html__( 'Please note that this section can be overridden by individual page/posts settings', 'bizcare' ),
        'section'               => 'bizcare-layout-options',
        'type'                  => 'select',
        'choices' => array(
            'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'bizcare' ),
            'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'bizcare' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'bizcare' ),
            'default'       => esc_html__('Default','bizcare')
        ),
        'priority'              => 10,
        'active_callback'       => ''
    )
);

/*create setting control single post image align*/
$bizcare_settings_controls['bizcare-single-post-image-align'] = array(
    'setting' =>     array(
        'default'              => $defaults['bizcare-single-post-image-align'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Alignment of Image in Single Post/Page', 'bizcare' ),
        'section'               => 'bizcare-layout-options',
        'type'                  => 'select',
        'choices' => array(
            'full'      => esc_html__( 'Full', 'bizcare' ),
            'right'     => esc_html__( 'Right', 'bizcare' ),
            'left'      => esc_html__( 'Left', 'bizcare' ),
            'no-image'  => esc_html__( 'No image', 'bizcare' )
        ),
        'priority'              => 40,
        'description'           =>  esc_html__( 'Please note that this setting can be overridden by individual post/page settings', 'bizcare' ),
    )
);



/*create setting control archive layout */
$bizcare_settings_controls['bizcare-archive-layout'] = array(
    'setting' => array(
        'default'              => $defaults['bizcare-archive-layout'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Archive Layout', 'bizcare' ),
        'section'               => 'bizcare-layout-options',
        'type'                  => 'select',
        'choices'               => array(
            'excerpt-only'              => esc_html__( 'Excerpt Only', 'bizcare' ),
            'thumbnail-and-excerpt'     => esc_html__( 'Thumbnail and Excerpt', 'bizcare' ),
            'full-post'                 => esc_html__( 'Full Post', 'bizcare' ),
            'thumbnail-and-full-post'   => esc_html__( 'Thumbnail and Full Post', 'bizcare' ),
        ),
        'priority'              => 55,
    )
);


/*container size*/
$bizcare_settings_controls['bizcare-conatiner-width-layout'] = array(
    'setting' => array(
        'default'              => $defaults['bizcare-conatiner-width-layout'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Container Width', 'bizcare' ),
        'description'           => esc_html__('Value in px. This width is for the larger screen size greater than 1200px.','bizcare'),
        'section'               => 'bizcare-layout-options',
        'type'                  => 'number',
        'priority'              => 60,
    )
);