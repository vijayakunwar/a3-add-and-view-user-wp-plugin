<?php

/**
 * Plugin Name: custom color
 */




/**
 * Theme Customization API
 * //https://codex.wordpress.org/Theme_Customization_API
 *
 */

if ( ! defined( 'ABSPATH' ) ){
    die();
}


/**
 * Custom color for HTML ELEMENTS
 */

/**
 * Any new Theme Customizer settings, sections, or controls
 * must be defined from within a customize_register action.
 * This action automatically loads the $wp_customize object,
 * which is an instance of the WP_Customize_Manager class.
 */

function learningWordPress_custom_register($wp_customize){
    //$wp_customize->add_setting( 'header_textcolor' , array(
    //https://developer.wordpress.org/reference/functions/header_textcolor/

    //setting  -> lwp_link_color  [to get color from database]
    //setting for link
    $wp_customize->add_setting( 'lwp_link_color' , array(
        'default'   => '#006ec3',
        'transport' => 'refresh',
    ) );
    //setting for button
    $wp_customize->add_setting('lwp_btn_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh',
    ));
    //section name
    $wp_customize->add_section('lwp_standard_colors', array(
        // --( ) --> localisation
        'title' => __('Standard Colors', 'Twenty Twenty-One'), // theme name
        'priority' => 30,
    ));

    //control for
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_link_color_control', array(
        'label' => __('Link Color', 'Twenty Twenty-One'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_link_color', // setting that we created for link as above
    ) ) );

    //control for button
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_btn_color_control', array(
        'label' => __('Button Color', 'Twenty Twenty-One'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_btn_color', // setting that we created for button as above
    ) ) );
}
add_action('customize_register','learningWordPress_custom_register');



// Output Customize CSS
function learningWordPress_customize_css() { ?>

    <style type="text/css">

        a:link,
        a:visited {
            color: <?php echo get_theme_mod('lwp_link_color'); ?>;
        }

        a.wp-block-button__link {
            background-color: <?php echo get_theme_mod('lwp_btn_color'); ?> !important;
        }

    </style>

<?php }

add_action('wp_head', 'learningWordPress_customize_css');


/**
 * Admin login page customization
 */

add_action('login_header','hello_world');
function hello_world(){
    echo 'Hello World';
}

add_filter('login_headerurl','change_header_url');
function change_header_url(){
    return 'https://vijayakunwar.github.io';
}

add_action( 'login_enqueue_scripts', 'cwpl_login_stylesheet' );
/**
 * Load custom stylesheet on login page.
 */
function cwpl_login_stylesheet() {
    wp_enqueue_style( 'cwpl-custom-stylsheet', plugin_dir_url(__FILE__) . 'login-styles.css' );
}

add_filter( 'login_errors', 'cwpl_error_message');
/**
 * Returns a custom login error message.
 */
function cwpl_error_message() {
    return 'Well, that was not it!';
}

add_action( 'login_footer', 'cwpl_remove_shake');
/**
 * Remove login page shake.
 */
function cwpl_remove_shake() {
    //remove_action( 'login_head', 'wp_shake_js', 12 );
    remove_action( 'login_footer', 'wp_shake_js', 12 );
}