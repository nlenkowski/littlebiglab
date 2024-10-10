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
}, ['helpers', 'setup', 'custom']);

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
        // Register Maintenance Plan block
        acf_register_block_type(array(
            'name'              => 'maintenance-plan',
            'title'             => __('Maintenance Plan'),
            'description'       => __('A custom block for displaying a maintenance plan.'),
            'render_template'   => 'blocks/maintenance-plan.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('maintenance-plan', 'plan'),
        ));
    }
}
add_action('acf/init', 'lbl_init_acf_block_types');

/**
 * Selectively disable Gutenberg editor
 */
function blujay_disable_gutenberg($is_enabled, $post_type)
{
    global $post;

    // Disable for "models" post type
    if ($post_type === 'project') {
        return false;
    }

    // Disable for home page
    if ($post && $post->ID === 8) {
        return false;
    }

    return $is_enabled;
}
add_filter('use_block_editor_for_post_type', 'blujay_disable_gutenberg', 10, 2);
