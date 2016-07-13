<?php
/**
 * Displays the header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="container">

            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="tagline"><?php bloginfo( 'description' ); ?></h2>

            <nav class="primary-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav>

        </div>
    </header>

    <section class="site-content">
        <div class="container">
