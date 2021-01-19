<?php
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

    exit;

}



// add sub-level administrative menu
function myplugin_add_sublevel_menu() {

    /*

    add_submenu_page(
        string   $parent_slug,
        string   $page_title,
        string   $menu_title,
        string   $capability,
        string   $menu_slug,
        callable $function = ''
    );

    */

 /*
    add_submenu_page(
        'options-general.php',
        'MyPlugin Settings',
        'MyPlugin',
        'manage_options',
        'myplugin',
        'myplugin_display_settings_page'
    );
 */

}
//add_action( 'admin_menu', 'myplugin_add_sublevel_menu' );



// add top-level administrative menu
function myplugin_add_toplevel_menu() {

    /*

    add_menu_page(
        string   $page_title,
        string   $menu_title,
        string   $capability,
        string   $menu_slug,
        callable $function = '',
        string   $icon_url = '',
        int      $position = null
    )

    */

    add_menu_page(
        'MyPlugin Settings',
        'MyPlugin',
        'manage_options',
        'myplugin',   //used in the URL for plugin page  - easy to use name of plugin
        'myplugin_display_settings_page', // function used to display page output
        'dashicons-admin-generic',
        null  // menu item placing order; if 1 -> stays top, but it is recommend to use null to stay safe from conflict with other plugins
    );

}
 add_action( 'admin_menu', 'myplugin_add_toplevel_menu' );