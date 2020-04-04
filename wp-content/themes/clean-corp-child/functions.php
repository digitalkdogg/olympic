<?php
/* Write your awesome functions below */

function load_my_script(){
    wp_register_script(
        'my_script',
        get_stylesheet_directory_uri() . '/js/olympic.js',
        array( 'jquery' )
    );
    wp_enqueue_script( 'my_script' );
}
add_action('wp_enqueue_scripts', 'load_my_script');

?>
