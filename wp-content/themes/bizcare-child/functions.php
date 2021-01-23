<?php

function load_my_script(){
    wp_register_script(
        'my_script',
        get_stylesheet_directory_uri() . '/js/olympic_220121.js',
        array( 'jquery' )
    );
    wp_enqueue_script( 'my_script' );
    wp_enqueue_style( 'cusotm', get_stylesheet_directory_uri() . '/custom_220121.css' );
    wp_enqueue_style( 'bootstrap-extra', get_stylesheet_directory_uri() . '/bootstrap-extra.css' );

}
add_action('wp_enqueue_scripts', 'load_my_script', 100);

add_action( 'rest_api_init', function () {
    register_rest_route( 'contact/v1', 'contact_us',array(
        'methods'  => 'GET',
        'callback' => 'get_contact_us'
    ) );

 } );

 require get_template_directory() . '-child/inc/hooks/testimonial.php';
?>
