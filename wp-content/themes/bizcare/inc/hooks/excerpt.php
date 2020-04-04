<?php
if ( !function_exists('bizcare_excerpt_length') ) :
     /**
     * Excerpt length
     *
     * @since bizcare 1.0.0
     *
     * @param null
     * @return int
     */
     function bizcare_excerpt_length( $length ) {
        global $bizcare_customizer_all_values;
        if(is_admin() ){
            return $length;
        }
        $excerpt_length = $bizcare_customizer_all_values['bizcare-number-of-words'];        
        if ( !$excerpt_length ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );
     }
endif;
add_filter( 'excerpt_length', 'bizcare_excerpt_length' );


if ( ! function_exists( 'bizcare_implement_read_more' ) ) :

    /**
     * Implement read more in excerpt.
     *
     * @since 1.0.0
     *
     * @param string $more The string shown within the more link.
     * @return string The excerpt.
     */
    function bizcare_implement_read_more( $more ) {

        $flag_apply_excerpt_read_more = apply_filters( 'bizcare_filter_excerpt_read_more', true );
        if ( true !== $flag_apply_excerpt_read_more ) {
            return $more;
        }

        $output = $more;
        $read_more_text = esc_html__('continue reading','bizcare');
        if ( ! empty( $read_more_text ) ) {
            $output = ' <div class="read-more-text"><a href="' . esc_url( get_permalink() ) . '" class="read-more">' . $read_more_text . '</a></div>';
            $output = apply_filters( 'bizcare_filter_read_more_link' , $output );
        }
        return $output;

    }

endif;

add_action( 'excerpt_more', 'bizcare_implement_read_more' );