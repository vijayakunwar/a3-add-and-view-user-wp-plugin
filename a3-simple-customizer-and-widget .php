<?php
/**
 * Plugin Name: simple customizer and widget
 * Version: 0.1
 * Author: Vijaya Kunwar
 * License: GPL2+
 *
 */

add_action( 'admin_enqueue_scripts', 'mytheme_backend_scripts');

if ( ! function_exists( 'mytheme_backend_scripts' ) ){
    function mytheme_backend_scripts($hook) {
        wp_enqueue_media();
        wp_enqueue_style( 'wp-color-picker');
        wp_enqueue_script( 'wp-color-picker');
    }
}

add_action( 'add_meta_boxes', 'mytheme_add_meta_box' );

if ( ! function_exists( 'mytheme_add_meta_box' ) ){
    function mytheme_add_meta_box(){
        add_meta_box( 'header-page-metabox-options', esc_html__('Header Color', 'mytheme' ), 'mytheme_header_meta_box', 'page', 'side', 'low');
    }
}

if ( ! function_exists( 'mytheme_header_meta_box' ) ){
    function mytheme_header_meta_box( $post ){
        $custom = get_post_custom( $post->ID );
        $header_color = (isset($custom["header_color"][0])) ? $custom["header_color"][0] : '';
        wp_nonce_field( 'mytheme_header_meta_box', 'mytheme_header_meta_box_nonce' );
        ?>
        <script>
            jQuery(document).ready(function($){
                $('.color_field').each(function(){
                    $(this).wpColorPicker();
                });
            });
        </script>
        <div class="pagebox">
            <p><?php esc_attr_e('Choosse a color for your post header.', 'mytheme' ); ?></p>
            <input class="color_field" type="hidden" name="header_color" value="<?php esc_attr_e($header_color); ?>"/>
        </div>
        <?php
    }
}

if ( ! function_exists( 'mytheme_save_header_meta_box' ) ){
    function mytheme_save_header_meta_box( $post_id ){
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        if( !current_user_can( 'edit_pages' ) ) {
            return;
        }
        if ( !isset( $_POST['header_color'] ) || !wp_verify_nonce( $_POST['mytheme_header_meta_box_nonce'], 'mytheme_header_meta_box' ) ) {
            return;
        }
        $header_color = (isset($_POST["header_color"]) && $_POST["header_color"]!='') ? $_POST["header_color"] : '';
        update_post_meta($post_id, "header_color", $header_color);
    }
}

add_action( 'save_post', 'mytheme_save_header_meta_box' );