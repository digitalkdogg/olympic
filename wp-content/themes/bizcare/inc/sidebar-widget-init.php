<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bizcare_widgets_init() {
    

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'bizcare' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    $bizcare_get_all_options = bizcare_get_all_options( absint( 1 ) );

        register_sidebar(array(
            'name'          => esc_html__( 'Footer Column One', 'bizcare' ),
            'id'            => 'footer-col-one',
            'description'   => esc_html__( 'Displays items on footer section.', 'bizcare' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        
        register_sidebar(array(
            'name'          => esc_html__( 'Footer Column Two', 'bizcare' ),
            'id'            => 'footer-col-two',
            'description'   => esc_html__( 'Displays items on footer section.','bizcare' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        
        register_sidebar(array(
            'name'          => esc_html__( 'Footer Column Three', 'bizcare' ),
            'id'            => 'footer-col-three',
            'description'   => esc_html__( 'Displays items on footer section.', 'bizcare' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        
        
        register_sidebar(array(
            'name'          => esc_html__( 'Footer Column Four', 'bizcare' ),
            'id'            => 'footer-col-four',
            'description'   => esc_html__( 'Displays items on footer section.','bizcare' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        
}
add_action( 'widgets_init', 'bizcare_widgets_init' );