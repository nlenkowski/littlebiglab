<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

/**
 * Blujay includes
 *
 * The $blujay_includes array determines the code library to be loaded.
 * Add or remove files as needed.
 */
$blujay_includes = array(
    '/lib/setup.php',      // Configure theme and register assets, menus, sidebars, etc
    '/lib/shortcodes.php', // Register shortcodes
    '/lib/helpers.php',    // Helper and utility functions
    '/lib/custom.php'      // Custom functions specific to this theme
);

// Load library
foreach ($blujay_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'blujay'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);
