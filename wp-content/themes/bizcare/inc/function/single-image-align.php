<?php 
/*image alignment single post*/
if( ! function_exists( 'bizcare_single_post_image_align' ) ) :
    /**
     * bizcare default layout function
     *
     * @since  bizcare 1.0.0
     *
     * @param int
     * @return string
     */
    function bizcare_single_post_image_align( $post_id = null ){
        global $bizcare_customizer_all_values,$post;
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $bizcare_single_post_image_align = $bizcare_customizer_all_values['bizcare-single-post-image-align'];
       
        $bizcare_single_post_image_align_meta = get_post_meta( $post_id, 'bizcare-single-post-image-align', true );

        if( false != $bizcare_single_post_image_align_meta ) {
            $bizcare_single_post_image_align = $bizcare_single_post_image_align_meta;
        }
        return $bizcare_single_post_image_align;
    }
endif;