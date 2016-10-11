<?php
/**
 * Setup
 * Enables theme features and utilities and register assets, menus, image sizes, sidebars, etc.
 */

 /**
  * Theme setup
  */
function blujay_setup() {

    // Make theme available for translation
    load_theme_textdomain( 'blujay', get_template_directory() . '/lang' );

    // Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Enable plugins to manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for HTML5 markup
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'blujay_setup' );

/**
 * Enable theme utilities
 */
function blujay_theme_utilities() {

    // Cleanup header
    add_action( 'init', 'blujay_head_cleanup' );
    add_action( 'init', 'blujay_disable_rest_and_oembed' );
    add_action( 'init', 'blujay_disable_emoji_styles_scripts' );

    // Move scripts to footer
    add_action( 'wp_enqueue_scripts', 'blujay_js_to_footer' );

    // Add page and post slugs to body class
    add_filter( 'body_class', 'blujay_add_page_slug' );

    // Add custom image sizes to media library
    add_filter( 'image_size_names_choose', 'blujay_custom_image_sizes' );

    // Enable execution of shortcodes in widgets
    add_filter( 'widget_text', 'do_shortcode' );
}
add_action( 'after_setup_theme', 'blujay_theme_utilities' );

/**
 * Register constants
 */
define( 'THEMEDIR', get_template_directory_uri() );
define( 'ASSETDIR', THEMEDIR . '/assets' );
define( 'DISTDIR', THEMEDIR . '/dist' );

/**
 * Register assets
 */
function blujay_register_assets() {

    // Scripts
    wp_enqueue_script( 'babel-polyfill', 'https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.16.0/polyfill.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'snapsvg', 'https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.4.1/snap.svg-min.js', array('jquery'), '', true );
    wp_enqueue_script( 'picturefill', 'https://cdnjs.cloudflare.com/ajax/libs/picturefill/3.0.2/picturefill.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'main-scripts', DISTDIR . '/scripts/main.min.js', array('jquery'), '', true );

    // Styles
    wp_enqueue_style( 'main-styles', DISTDIR . '/styles/main.min.css', false );
}
add_action( 'wp_enqueue_scripts', 'blujay_register_assets' );

/**
 * Register menus
 */
register_nav_menus(array(
    'primary' => __( 'Primary Menu', 'blujay' ),
));

/**
 * Register custom image sizes
 */
function blujay_add_image_sizes() {
    add_image_size( 'project-logo', '', '95', true );
    add_image_size( 'project-logo-retina', '', '190', true );
}
add_action( 'init', 'blujay_add_image_sizes' );

/**
 * Register sidebar and widget areas
 */
function blujay_widgets_init() {
}
add_action( 'widgets_init', 'blujay_widgets_init' );

/**
 * Register custom post types
 */
function blujay_project_custom_post_type() {

    $labels = array(
        'name'               => 'Projects',
        'singular_name'      => 'Project',
        'add_new'            => 'Add Project',
        'add_new_item'       => 'Add Project',
        'edit_item'          => 'Edit Project'
    );

    $args = array(
        'has_archive'     => false,
        'hierarchical'    => false,
        'labels'          => $labels,
        'menu_icon'       => 'dashicons-portfolio',
        'public'          => true,
        'rewrite'         => array( 'slug' => 'project' ),
        'taxonomies'      => array( 'category' ),
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'blujay_project_custom_post_type' );

?>
