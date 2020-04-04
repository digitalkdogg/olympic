<?php

/**
 * bizcare Custom Metabox
 *
 * @package bizcare
 */
$bizcare_post_types = array(
    'post',
    'page'
);

add_action( 'add_meta_boxes', 'bizcare_add_layout_metabox' );

function bizcare_add_layout_metabox() {
    global $post;
    $frontpage_id = get_option( 'page_on_front' );
    if ( $post->ID == $frontpage_id ) {
        return;
    }

    global $bizcare_post_types;
    foreach ( $bizcare_post_types as $post_type ) {
        add_meta_box(
            'bizcare_layout_options', // $id
            esc_html__( 'Layout options', 'bizcare' ), // $title
            'bizcare_layout_options_callback', // $callback
            $post_type, // $page
            'normal', // $context
            'high'// $priority
        );
    }

}
/* bizcare sidebar layout */
$bizcare_default_layout_options = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'label' => esc_html__( 'Left Sidebar', 'bizcare' ),
    ),
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'label' => esc_html__( 'Right Sidebar', 'bizcare' ),
    ),
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'label' => esc_html__( 'No Sidebar', 'bizcare' ),
    ),
    'default' => array(
        'value' => 'default',
        'label' => esc_html__( 'Default', 'bizcare' ),
    ),
);
/* bizcare featured layout */
$bizcare_single_post_image_align_options = array(
    'full' => array(
        'value' => 'full',
        'label' => esc_html__( 'Full', 'bizcare' )
    ),
    'right' => array(
        'value' => 'right',
        'label' => esc_html__( 'Right ', 'bizcare' ),
    ),
    'left' => array(
        'value'     => 'left',
        'label' => esc_html__( 'Left', 'bizcare' ),
    ),
    'no-image' => array(
        'value'     => 'no-image',
        'label' => esc_html__( 'No Image', 'bizcare' )
    )
);

function bizcare_layout_options_callback() {

    global $post , $bizcare_default_layout_options, $bizcare_single_post_image_align_options;
    $bizcare_customizer_saved_values = bizcare_get_all_options( absint(1) );

    /*bizcare-single-post-image-align*/
    $bizcare_single_post_image_align = $bizcare_customizer_saved_values['bizcare-single-post-image-align'];

    /*bizcare default layout*/
    $bizcare_single_sidebar_layout = 'default';

    wp_nonce_field( basename( __FILE__ ), 'bizcare_layout_options_nonce' );
    ?>
    <table class="form-table page-meta-box">
        <!--Image alignment-->
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'bizcare' ); ?></em></td>
        </tr>
        <tr>
            <td>
                <?php
                $bizcare_single_sidebar_layout_meta = get_post_meta( $post->ID, 'bizcare-default-layout', true );
                if ( false != $bizcare_single_sidebar_layout_meta ) {
                   $bizcare_single_sidebar_layout = $bizcare_single_sidebar_layout_meta;
                }
                foreach ( $bizcare_default_layout_options as $field ) {
                    ?>
                    <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                        <input id="<?php echo esc_attr( $field['value'] );  ?>" type="radio" name="bizcare-default-layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $bizcare_single_sidebar_layout ); ?> /> 
                        <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                            <?php echo esc_html( $field['label'] ); ?>
                        </label>
                    </div>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td><em class="f13"><?php esc_html_e( 'You can set up the sidebar content', 'bizcare' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php esc_html_e( 'here', 'bizcare' ); ?></a></em></td>
        </tr>
        <!--Image alignment-->
        <tr>
            <td colspan="4"><?php esc_html_e( 'Featured Image Alignment', 'bizcare' ); ?></td>
        </tr>
        <tr>
            <td>
                <?php
                $bizcare_single_post_image_align_meta = get_post_meta( $post->ID, 'bizcare-single-post-image-align', true );
                if( false != $bizcare_single_post_image_align_meta ){
                    $bizcare_single_post_image_align = $bizcare_single_post_image_align_meta;
                }
                foreach ($bizcare_single_post_image_align_options as $field) {
                    ?>
                    <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="bizcare-single-post-image-align" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $bizcare_single_post_image_align ); ?>/> 
                    <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                        <?php echo esc_html( $field['label'] ); ?>
                    </label>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

<?php }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function bizcare_save_sidebar_layout( $post_id ) {
    global $post;

    if ( isset( $_POST['bizcare_layout_options_nonce'] ) ) {
        $_POST[ 'bizcare_layout_options_nonce' ] = sanitize_text_field( wp_unslash( $_POST[ 'bizcare_layout_options_nonce' ] ) );
    }

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'bizcare_layout_options_nonce' ] ) || !wp_verify_nonce( sanitize_key($_POST[ 'bizcare_layout_options_nonce' ] ), basename( __FILE__ ) ) ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
    }
    
    if(isset($_POST['bizcare-default-layout'])){
        $old = get_post_meta( $post_id, 'bizcare-default-layout', true );
        $new = sanitize_text_field( wp_unslash( $_POST['bizcare-default-layout'] ) );
        if ( $new && $new != $old ) {
            update_post_meta( $post_id, 'bizcare-default-layout', $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id,'bizcare-default-layout', $old );
        }
    }

    /*image align*/
    if(isset($_POST['bizcare-single-post-image-align'])){
        $old = get_post_meta( $post_id, 'bizcare-single-post-image-align', true );
        $new = sanitize_text_field( wp_unslash( $_POST['bizcare-single-post-image-align'] ) );
        if ( $new && $new != $old ) {
            update_post_meta( $post_id, 'bizcare-single-post-image-align', $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, 'bizcare-single-post-image-align', $old );
        }
    }
}
add_action('save_post', 'bizcare_save_sidebar_layout');
