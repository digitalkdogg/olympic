<?php

/**
 * bizcare functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bizcare
 */

require get_template_directory() . '/inc/init.php';

if ( ! function_exists( 'bizcare_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bizcare_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bizcare, use a find and replace
		 * to change 'bizcare' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bizcare', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' 	=> esc_html__( 'Primary', 'bizcare' ),
			'menu-2'  => esc_html__('Social',  'bizcare'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bizcare_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		) );

		
		/*image size*/
		add_image_size( 'bizcare-slider-banner-image', 1600, 660, true );
		add_image_size( 'bizcare_blog_image', 500, 360, true );

		add_theme_support( 'custom-header' );

		/*woocommerce support*/
		add_theme_support( 'woocommerce' );

		/* guternberg support, since 1.0.2 */
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'bizcare_setup' );

if ( is_admin() ) {
	// Load demo.
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/class-demo.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/demo.php';
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bizcare_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bizcare_content_width', 640 );
}
add_action( 'after_setup_theme', 'bizcare_content_width', 0 );


// google fonts function
function bizcare_google_fonts()
{
	global $bizcare_customizer_all_values;

	$fonts_url  = '';
	$fonts 		= array();

	$bizcare_font_family_site_identity           = $bizcare_customizer_all_values['bizcare-font-family-site-identity'];
    $bizcare_font_family_menu_text               = $bizcare_customizer_all_values['bizcare-font-family-menu'];
    $bizcare_primary_font                   	 = $bizcare_customizer_all_values['bizcare-primary-font-family'];
    $bizcare_secondary_font						 = $bizcare_customizer_all_values['bizcare-secondary-font-family'];
	$bizcare_fonts 	= array();
	$bizcare_fonts[] = $bizcare_font_family_site_identity;
	$bizcare_fonts[] = $bizcare_primary_font;
	$bizcare_fonts[] = $bizcare_font_family_menu_text;
	$bizcare_fonts[] = $bizcare_secondary_font;
	$bizcare_fonts_stylesheet = '?family=Bitter:400,700|Montserrat:400,500,600,700';

	$i  = 0;
	  for ($i=0; $i < count( $bizcare_fonts ); $i++) { 

	    if ( 'off' !== sprintf( _x( 'on', '%s font: on or off', 'bizcare' ), $bizcare_fonts[$i] ) ) {
			$fonts[] = $bizcare_fonts[$i];
		}

	  }

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urldecode( implode( '|', $fonts ) ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */
function bizcare_scripts() {
	global $bizcare_customizer_all_values;

	/*google font*/
	wp_enqueue_style( 'bizcare-google-fonts',bizcare_google_fonts() );
	//theme
	wp_enqueue_style( 'bizcare-style', get_stylesheet_uri() );
	wp_add_inline_style( 'bizcare-style', bizcare_get_inline_style() );
	// thirdparty style file
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/src/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/src/css/font-awesome/css/font-awesome.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/src/css/slick.css' );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/src/css/animate.css' );
	wp_enqueue_style( 'mobileMenu', get_template_directory_uri() . '/assets/src/css/evtMenu.css' );
	wp_enqueue_style( 'mainStyle', get_template_directory_uri() . '/assets/src/css/main.css' );




	wp_enqueue_script( 'bizcare-navigation', get_template_directory_uri() . '/assets/src/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'bizcare-skip-link-focus-fix', get_template_directory_uri() . '/assets/src/js/skip-link-focus-fix.js', array(), '20151215', true );
	

	// thirdparty assets
	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/assets/src/js/bootstrap.js', array('jquery'), true );
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/src/js/slick.js', array('jquery'), true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/src/js/wow.js', array('jquery'), true );

	wp_enqueue_script( 'bizcare-mobile-menu', get_template_directory_uri() . '/assets/src/js/evtMobileMenu.js', array('jquery'), true );
	wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/src/js/jquery.sticky.js', array('jquery'), true );
	wp_enqueue_script( 'bizcare-main', get_template_directory_uri() . '/assets/src/js/main.js', array('jquery'), true );

	wp_localize_script( 'bizcare-main', 'customzier_values', $bizcare_customizer_all_values);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bizcare_scripts', 99 );


/*update to pro added*/
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/bizcare/class-customize.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/*for tgm recommed plugin */
require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


if( !function_exists('bizcare_primary_menu_mobile_callback') ) :
	/**
	 * Fallback menu to primary menu 
	 * 
	 * @since bizcare 1.0.0
	 */

function bizcare_primary_menu_mobile_callback() {
	?>
		<ul id="mobile-menu" class="d-md-inline-flex">
			<li><a href="<?php echo esc_url( home_url( '/' ) );?>"><?php esc_html_e('Home','bizcare');?></a></li>
			<li><a href="<?php echo esc_url( admin_url( '/nav-menus.php' ) );?>"><?php esc_html_e('Set Primary Menu','bizcare');?></a></li>
		</ul>
	<?php
}
endif;

/*breadcrum function*/
if ( ! function_exists( 'bizcare_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function bizcare_simple_breadcrumb() {

		if ( ! function_exists( 'bizcare_breadcrumb_trail' ) ) {
			require_once get_template_directory() . '/assets/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		bizcare_breadcrumb_trail( $breadcrumb_args );

	}

endif;

// recommend plugin
function bizcare_register_required_plugins() {
	
	$plugins = array(
		array(
			'name'     => esc_html__( 'Contact Form 7', 'bizcare' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),		
		array(
			'name'      => esc_html__( 'WooCommerce', 'bizcare' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),		
		array(
			'name'      => esc_html__( 'One Click Demo Import', 'bizcare' ),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		array(
			'name'     => esc_html__( 'Rise Blocks - A Complete Gutenberg Page builder', 'bizcare' ),
			'slug'     => 'rise-blocks',
			'required' => false,
		)
	);

	tgmpa( $plugins );
}

add_action( 'tgmpa_register', 'bizcare_register_required_plugins' );

// theme name
if ( ! function_exists ( 'bizcare_theme_name' ) ) {
	function bizcare_theme_name() {
		return esc_html__(' BizCare','bizcare');
	}
}

// customize the catgory title author
function bizcare_customizer_remove_defualt_cat_author($title)
{
    if( is_category() ) {

        $title = single_cat_title( '', false );

    } 
    elseif ( is_tag() ) {

        $title = single_tag_title( '', false );
    }        
    else if (is_author()){
    	$title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }

    return $title;

}
add_filter( 'get_the_archive_title', 'bizcare_customizer_remove_defualt_cat_author' );

