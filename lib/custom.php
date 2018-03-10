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

/**
 * Do not overwrite ACF Pro license during WP Migrate DB Pro migration
 * From https://gist.github.com/daltonrooney/470619cca87a6c29cb84f92d856b9ec1
 */

class ACF_WP_Migrate_DB_Pro_Tweaks {
    function __construct() {
        add_filter( 'wpmdb_preserved_options', array( $this, 'preserved_options' ) );
    }

    /**
    * By default, 'wpmdb_settings' and 'wpmdb_error_log' are preserved when the database is overwritten in a migration.
    * This filter allows you to define additional options (from wp_options) to preserve during a migration.
    * The example below preserves the 'blogname' value though any number of additional options may be added.
    */
    function preserved_options( $options ) {
        $options[] = 'acf_pro_license';
        return $options;
    }
}
new ACF_WP_Migrate_DB_Pro_Tweaks();

/**
 * Add robots meta tag for project pages
 */
add_action('wp_head','add_robots_meta_for_projects');
function add_robots_meta_for_projects() {
    if (is_singular( 'project' )) {
        $meta='<meta name="robots" content="nofollow" />';
        echo $meta;
    }
}

?>
