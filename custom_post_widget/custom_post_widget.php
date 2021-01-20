<?php
/**
 * SPCP sidebar widget for single post
 */

add_action( 'wp_enqueue_scripts', 'spcp_login_stylesheet' );
/**
 * Load plugin styles.
 */
function spcp_login_stylesheet() {

    if ( apply_filters( 'spcp_load_styles', true ) ) {
        wp_enqueue_style( 'spcp-custom-stylsheet', plugin_dir_url(__FILE__) . 'css/spcp-styles.css' );
    }
}

// Uncomment the following line to keep spcp-custom-stylesheet from loading
// add_filter( 'spcp_load_styles', '__return_false' );

add_action( 'widgets_init', 'spcp_register_sidebar');
/**
 * Registers a sidebar called Post Content Plus.
 */
function spcp_register_sidebar() {

    register_sidebar( array(
        'name'			=> __( 'Post Content for single post', 'spcp'),
        'id'			=> 'spcp-sidebar',
        'description' 	=> __( 'Widgets in this area display on single posts', 'spcp' ),
        'before_widget'	=> '<div class="widget spcp-sidebar">',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h2 class="widgettitle spcp-title">',
        'after_title'	=> '</h2>',
    ) );

}

add_filter( 'the_content', 'spcp_display_sidebars' );
function spcp_display_sidebars( $content ) {

    if ( is_single() && is_active_sidebar( 'spcp-sidebar' ) && is_main_query()  ) {
        dynamic_sidebar( 'spcp-sidebar' );
    }

    return $content;
}
