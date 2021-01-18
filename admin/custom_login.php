<?php

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
    wp_enqueue_style( 'cwpl-custom-stylsheet', plugin_dir_url(__FILE__) . 'css/login-style.css' );
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

