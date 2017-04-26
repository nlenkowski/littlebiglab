<?php
/**
 * Custom functions specific to this theme
 */

/**
 * Custom admin styles
 */
function littlebiglab_custom_admin_styles() {
    echo '
    <style>
        .cpac-column-value-image img {
            margin: 0;
        }
    </style>';
}
add_action('admin_head', 'littlebiglab_custom_admin_styles');

?>
