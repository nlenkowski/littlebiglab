<?php

namespace Blujay\Setup;

use function Blujay\Helpers\version_enqueue_script;
use function Blujay\Helpers\version_enqueue_style;

/**
 * Register some useful constants
 */
define('THEMEDIR', get_template_directory_uri());
define('ASSETDIR', THEMEDIR . '/assets');
define('DISTDIR', THEMEDIR . '/dist');

/**
 * Theme setup
 */
function theme_setup()
{
    // Make theme available for translation
    load_theme_textdomain('blujay', get_template_directory() . '/lang');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Enable plugins to manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Formats
    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'));

    // Enable support for HTML5 markup
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'Blujay\Setup\theme_setup');

/**
 * Enable and/or disable theme helpers
 */
function enable_theme_helpers()
{
    // Cleanup header
    add_action('init', '\Blujay\Helpers\cleanup_header');
    add_action('init', '\Blujay\Helpers\disable_rest_and_oembed');
    add_action('init', '\Blujay\Helpers\disable_emoji');

    // Move scripts to footer
    add_action('wp_enqueue_scripts', '\Blujay\Helpers\move_js_to_footer');

    // Add page and post slugs to body class
    add_filter('body_class', '\Blujay\Helpers\add_classes_to_body');

    // Add custom image sizes to media library
    add_filter('image_size_names_choose', '\Blujay\Helpers\add_custom_image_sizes_to_media_library');

    // Enable execution of shortcodes in widgets
    add_action('init', '\Blujay\Helpers\enable_shortcodes_in_html_widget');
}
add_action('after_setup_theme', 'Blujay\Setup\enable_theme_helpers');

/**
 * Register assets
 */
function register_assets()
{
    global $post;

    // Scripts
    version_enqueue_script('manifest', '/dist/scripts/manifest.js', '', true);

    version_enqueue_script('vendor', '/dist/scripts/vendor.js', '', true);

    if (is_page('home')) {
        version_enqueue_script('home', '/dist/scripts/home.js', '', true);
    } elseif (get_post_type($post) == 'project') {
        version_enqueue_script('project', '/dist/scripts/project.js', '', true);
    } else {
        version_enqueue_script('page', '/dist/scripts/page.js', '', true);
    }

    // Styles
    version_enqueue_style('main-styles', '/dist/styles/main.css', '', '');

    // Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap'
    );
}
add_action('wp_enqueue_scripts', '\Blujay\Setup\register_assets');

/**
 * Defer loading of the these scripts
 */
function add_async_attribute($tag, $handle)
{
    if ('svgxuse' !== $handle) {
        return $tag;
    } else {
        return str_replace(' src', ' defer src', $tag);
    }
}
add_filter('script_loader_tag', '\Blujay\Setup\add_async_attribute', 10, 2);

/**
 * Register menus
 */
register_nav_menus(array(
    'primary' => __('Primary Menu', 'blujay'),
));

/**
 * Register custom image sizes
 */
function add_image_sizes()
{
    add_image_size('project-logo', '9999', '95', false);
    add_image_size('project-logo-retina', '9999', '190', false);
}
add_action('init', '\Blujay\Setup\add_image_sizes');

/**
 * Register sidebar and widget areas
 */
function widgets_init()
{
}
add_action('widgets_init', '\Blujay\Setup\widgets_init');
