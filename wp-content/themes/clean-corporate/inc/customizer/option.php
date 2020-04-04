<?php
/**
 * Theme Options.
 *
 * @package Clean_Corporate
 */

$default = clean_corporate_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'clean-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
	'title'      => __( 'Header Options', 'clean-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => __( 'Show Site Title', 'clean-corporate' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => __( 'Show Tagline', 'clean-corporate' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show_social_in_header.
$wp_customize->add_setting( 'theme_options[show_social_in_header]',
	array(
	'default'           => $default['show_social_in_header'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_in_header]',
	array(
	'label'    => __( 'Show Social Icons', 'clean-corporate' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting enable_sticky_primary_menu.
$wp_customize->add_setting( 'theme_options[enable_sticky_primary_menu]',
	array(
		'default'           => $default['enable_sticky_primary_menu'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'clean_corporate_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_sticky_primary_menu]',
	array(
		'label'    => __( 'Make Primary Menu Sticky', 'clean-corporate' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

$wp_customize->add_setting( 'theme_options[search_in_header]',
	array(
		'default'           => $default['search_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'clean_corporate_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[search_in_header]',
	array(
		'label'    => __( 'Enable Search Form', 'clean-corporate' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => __( 'Layout Options', 'clean-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
	'default'           => $default['global_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
	'label'    => __( 'Global Layout', 'clean-corporate' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => clean_corporate_get_global_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_layout.
$wp_customize->add_setting( 'theme_options[archive_layout]',
	array(
	'default'           => $default['archive_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_layout]',
	array(
	'label'    => __( 'Archive Layout', 'clean-corporate' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => clean_corporate_get_archive_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_image.
$wp_customize->add_setting( 'theme_options[archive_image]',
	array(
	'default'           => $default['archive_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image]',
	array(
	'label'    => __( 'Image in Archive', 'clean-corporate' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => clean_corporate_get_image_sizes_options( true, array( 'disable', 'thumbnail', 'large' ), false ),
	'priority' => 100,
	)
);
// Setting archive_image_alignment.
$wp_customize->add_setting( 'theme_options[archive_image_alignment]',
	array(
	'default'           => $default['archive_image_alignment'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image_alignment]',
	array(
	'label'           => __( 'Image Alignment in Archive', 'clean-corporate' ),
	'section'         => 'section_layout',
	'type'            => 'select',
	'choices'         => clean_corporate_get_image_alignment_options(),
	'priority'        => 100,
	'active_callback' => 'clean_corporate_is_image_in_archive_active',
	)
);
// Setting single_image.
$wp_customize->add_setting( 'theme_options[single_image]',
	array(
	'default'           => $default['single_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[single_image]',
	array(
	'label'    => __( 'Image in Single Post/Page', 'clean-corporate' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => clean_corporate_get_image_sizes_options( true, array( 'disable', 'large' ), false ),
	'priority' => 100,
	)
);

// Home Page Section.
$wp_customize->add_section( 'section_home_page',
	array(
	'title'      => __( 'Home Page Options', 'clean-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);
// Setting home_content_status.
$wp_customize->add_setting( 'theme_options[home_content_status]',
	array(
	'default'           => $default['home_content_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[home_content_status]',
	array(
	'label'       => __( 'Show Home Content', 'clean-corporate' ),
	'description' => __( 'Check this to show page content in Home page.', 'clean-corporate' ),
	'section'     => 'section_home_page',
	'type'        => 'checkbox',
	'priority'    => 100,
	)
);

// Pagination Section.
$wp_customize->add_section( 'section_pagination',
	array(
	'title'      => __( 'Pagination Options', 'clean-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting( 'theme_options[pagination_type]',
	array(
	'default'           => $default['pagination_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[pagination_type]',
	array(
	'label'       => __( 'Pagination Type', 'clean-corporate' ),
	'section'     => 'section_pagination',
	'type'        => 'select',
	'choices'     => clean_corporate_get_pagination_type_options(),
	'priority'    => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => __( 'Footer Options', 'clean-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'clean-corporate' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting show_social_in_footer.
$wp_customize->add_setting( 'theme_options[show_social_in_footer]',
	array(
		'default'           => $default['show_social_in_footer'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'clean_corporate_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_in_footer]',
	array(
		'label'    => __( 'Show Social Icons', 'clean-corporate' ),
		'section'  => 'section_footer',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting go_to_top.
$wp_customize->add_setting( 'theme_options[go_to_top]',
	array(
		'default'           => $default['go_to_top'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'clean_corporate_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[go_to_top]',
	array(
		'label'    => __( 'Show Go To Top', 'clean-corporate' ),
		'section'  => 'section_footer',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
	'title'      => __( 'Blog Options', 'clean-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
	'default'           => $default['excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
	'label'       => __( 'Excerpt Length', 'clean-corporate' ),
	'description' => __( 'in words', 'clean-corporate' ),
	'section'     => 'section_blog',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Setting read_more_text.
$wp_customize->add_setting( 'theme_options[read_more_text]',
	array(
	'default'           => $default['read_more_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[read_more_text]',
	array(
	'label'    => __( 'Read More Text', 'clean-corporate' ),
	'section'  => 'section_blog',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting exclude_categories.
$wp_customize->add_setting( 'theme_options[exclude_categories]',
	array(
	'default'           => $default['exclude_categories'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[exclude_categories]',
	array(
	'label'       => __( 'Exclude Categories in Blog', 'clean-corporate' ),
	'description' => __( 'Enter category ID to exclude in Blog Page. Separate with comma if more than one', 'clean-corporate' ),
	'section'     => 'section_blog',
	'type'        => 'text',
	'priority'    => 100,
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
	'title'      => __( 'Breadcrumb Options', 'clean-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'theme_options[breadcrumb_type]',
	array(
	'default'           => $default['breadcrumb_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'clean_corporate_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_type]',
	array(
	'label'    => __( 'Breadcrumb Type', 'clean-corporate' ),
	'section'  => 'section_breadcrumb',
	'type'     => 'select',
	'choices'  => clean_corporate_get_breadcrumb_type_options(),
	'priority' => 100,
	)
);
