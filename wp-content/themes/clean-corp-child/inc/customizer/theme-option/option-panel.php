<?php
global $bizcare_panels;

/*creating panel for theme settings*/
$bizcare_panels['bizcare-theme-options'] = array(
    'title'          => esc_html__( 'Theme Options', 'bizcare' ),
    'priority'       => 235
);

/*layout options */
require get_template_directory().'/inc/customizer/theme-option/layout-options.php';





