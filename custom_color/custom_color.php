<?php
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
        'default'   => '',
        'transport' => 'refresh',
    ) );
    //setting for button
    $wp_customize->add_setting('lwp_btn_color', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    //setting for article section
    $wp_customize->add_setting( 'lwp_article_color' , array(
        'default'   => '',  // gives default and clear option
        'transport' => 'refresh',
    ) );

    //setting for header section
    $wp_customize->add_setting( 'lwp_header_color' , array(
        'default'   => '',  // gives default and clear option
        'transport' => 'refresh',
    ) );
    //setting for body section
    $wp_customize->add_setting( 'lwp_body_color' , array(
        'default'   => '',  // gives default and clear option
        'transport' => 'refresh',
    ) );
    //setting for footer section
    $wp_customize->add_setting( 'lwp_footer_color' , array(
        'default'   => '',  // gives default and clear option
        'transport' => 'refresh',
    ) );


    //section name
    $wp_customize->add_section('lwp_standard_colors', array(
        // --( ) --> localisation
        'title' => __('Custom Element color', 'Twenty Twenty-One'), // theme name
        'priority' => 30,
    ));

    //control for Link
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

    //control for article section
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_article_control', array(
        'label' => __('Section', 'Twenty Twenty-One'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_article_color', // setting that we created for admin_page
    ) ) );

    //control for header section
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_header_control', array(
        'label' => __('Header', 'Twenty Twenty-One'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_header_color', // setting that we created for admin_page
    ) ) );

    //control for body section
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_body_control', array(
        'label' => __('Body', 'Twenty Twenty-One'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_body_color', // setting that we created for admin_page
    ) ) );

    //control for footer section
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_footer_control', array(
        'label' => __('Footer', 'Twenty Twenty-One'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_footer_color', // setting that we created for admin_page
    ) ) );
}
add_action('customize_register','learningWordPress_custom_register');


//get_theme_mod()  --> https://developer.wordpress.org/reference/functions/get_theme_mod/
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
        article {
            background-color: <?php echo get_theme_mod('lwp_article_color'); ?>;
        }
        header#site-header {
            background-color: <?php echo get_theme_mod('lwp_header_color')?>;
            width: 100%;
        }
        body{
            background-color: <?php echo get_theme_mod('lwp_body_color')?>;
        }
        footer#site-footer{
            background-color: <?php echo get_theme_mod('lwp_footer_color')?>;
        }
    </style>

<?php }

add_action('wp_head', 'learningWordPress_customize_css');