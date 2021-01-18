<?php

/**
 * Plugin Name: A3 custom color
 */




/**
 * Theme Customization API
 * //https://codex.wordpress.org/Theme_Customization_API
 *
 */

// If this file is called directly, abort
if ( ! defined( 'ABSPATH' ) ){
    die();
}

//include plugin dependencies
require_once plugin_dir_path(__FILE__).'custom_color/custom_color.php';

require_once plugin_dir_path(__FILE__).'admin/custom_login.php';

require_once plugin_dir_path(__FILE__).'custom_post_widget/custom_post_widget.php';
