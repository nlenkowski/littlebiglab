<?php

/**
 * Prevent update notification for WP Migrate
 * https://gist.github.com/ebetancourt/89b105d7334495535415799832511938
 */
function disable_plugin_updates($value)
{
    $pluginsToDisable = [
        'wp-migrate-db-pro/wp-migrate-db-pro.php'
    ];

    if (isset($value) && is_object($value)) {
        foreach ($pluginsToDisable as $plugin) {
            if (isset($value->response[$plugin])) {
                unset($value->response[$plugin]);
            }
        }
    }

    return $value;
}
add_filter('site_transient_update_plugins', __NAMESPACE__ . '\\disable_plugin_updates');
