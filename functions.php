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

/**
 * Initialize custom ACF blocks
 */
function lbl_init_acf_block_types()
{
    if (function_exists('acf_register_block_type')) {
        // Register Maintenence Plan block
        acf_register_block_type(array(
            'name'              => 'maintenance-plan',
            'title'             => __('Maintenance Plan'),
            'description'       => __('A custom block for displaying a maintenance plan.'),
            'render_template'   => 'blocks/maintenance-plan.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'maintenance-plan', 'plan' ),
        ));
    }
}
add_action('acf/init', 'lbl_init_acf_block_types');
