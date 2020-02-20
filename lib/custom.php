<?php
/**
 * Custom functions specific to this theme
 */

// Add noindex meta tag to project pages only
function lbl_add_noindex_meta_for_projects()
{
    if (is_singular('project')) {
        echo '<meta name="robots" content="noindex" />';
    }
}
add_action('wp_head', 'lbl_add_noindex_meta_for_projects');
