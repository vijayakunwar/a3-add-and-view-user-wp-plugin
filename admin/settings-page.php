<?php

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

    exit;

}




// display the plugin settings page
function myplugin_display_settings_page() {

    // check if user is allowed access
    if ( ! current_user_can( 'manage_options' ) ) return;

    ?>

    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

        <!-- The form action must be options.php and the method must always be post. -->
        <form action="options.php" method="post">

            <?php

            // output security fields
            settings_fields( 'myplugin_options' );  // parameter -> menu slug

            // output setting sections
            do_settings_sections( 'myplugin' ); //  to output the mark

            // submit button
            submit_button();

            ?>

        </form>
    </div>

    <?php

}