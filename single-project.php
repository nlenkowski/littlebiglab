<?php
/**
 * Displays single projects
 */
?>

<?php get_header(); ?>

<main class="main">

    <?php while (have_posts()) :
        the_post(); ?>

        <?php get_template_part('templates/project'); ?>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
