<?php
/**
 * Custom functions specific to this theme
 */

/**
 * Custom admin styles
 */
function littlebiglab_custom_admin_styles()
{
    echo '
    <style>
        .cpac-column-value-image img {
            margin: 0;
        }
    </style>';
}
add_action('admin_head', 'littlebiglab_custom_admin_styles');

/**
 * Add robots meta tag for project pages
 */
add_action('wp_head', 'add_robots_meta_for_projects');
function add_robots_meta_for_projects()
{
    if (is_singular('project')) {
        $meta='<meta name="robots" content="nofollow" />';
        echo $meta;
    }
}
