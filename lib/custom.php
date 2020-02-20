<?php
/**
 * Custom functions specific to this theme
 */


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
