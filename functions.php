<?php

/**
 * Load Blujay
 * - /lib/helpers.php
 * - /lib/setup.php
 */
array_map(function ($file) {
    $file = "lib/{$file}.php";
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'blujay'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}, ['helpers', 'setup']);

/**
 * Add noindex meta tag to single project pages
 */
function lbl_add_noindex_meta_for_projects()
{
    if (is_singular('project')) {
        echo '<meta name="robots" content="noindex" />';
    }
}
add_action('wp_head', 'lbl_add_noindex_meta_for_projects');
