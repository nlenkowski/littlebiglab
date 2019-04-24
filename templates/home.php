<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<main class="main">

    <h1 class="site-title container">
        <?php the_field('header_title', 8); ?>
    </h1>

    <!-- Services -->

    <section class="services section-content container">
        <?php
        $title = get_field('services_title');
        $subtitle = get_field('services_subtitle');
        $content = get_field('additional_services');
        ?>

        <h2 class="section-title">
            <?php echo $title ?>
        </h2>

        <?php if ($subtitle) : ?>
            <h3 class="section-subtitle">
                <?php echo $subtitle; ?>
            </h3>
        <?php endif; ?>

        <?php if (have_rows('services')) : ?>
            <div class="services-grid">
                <?php while (have_rows('services')) :
                    the_row();

                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    ?>

                    <div class="service">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                        <h3><?php echo $title; ?></h3>
                        <p><?php echo $description; ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="section-body">
            <?php echo $content; ?>
        </div>
    </section>

    <!-- Projects -->

    <section class="projects section-content">
        <?php
        $title = get_field('projects_title');
        $subtitle = get_field('projects_subtitle');
        $projects = get_field('projects');
        ?>

        <h2 class="section-title">
            <?php echo $title ?>
        </h2>

        <?php if ($subtitle) : ?>
            <h3 class="section-subtitle">
                <?php echo $subtitle; ?>
            </h3>
        <?php endif; ?>

        <div class="projects-grid">

            <?php
            if ($projects) :
                foreach ($projects as $post) :
                    setup_postdata($post);
                    ?>

                    <div class="project">
                        <?php
                        $image = get_field('logo');
                        if (! empty($image)) :
                            ?>
                            <img
                                class="project-image"
                                src="<?php echo $image['sizes']['project-logo']; ?>"
                                srcset="<?php echo $image['sizes']['project-logo']; ?>,
                                        <?php echo $image['sizes']['project-logo-retina']; ?> 2x"
                                alt="<?php the_title(); ?>"
                            >
                        <?php endif; ?>

                        <h4 class="project-title">
                            <?php the_title(); ?>
                        </h4>

                        <h6 class="project-short-description">
                            <?php the_field('short_description'); ?>
                        </h6>

                        <a class="project-button button" href="<?php the_permalink(); ?>">
                            <svg class="icon">
                                <?php // phpcs:ignore ?>
                                <use xlink:href="<?php echo DISTDIR; ?>/icons/symbols.svg#icon-chevron-circle-right"></use>
                            </svg>
                            <span>View Project</span>
                        </a>
                    </div>

                    <?php
                endforeach;
                wp_reset_postdata();
            endif; ?>

        </div>
    </section>

    <!-- Experience -->

    <section class="services section-content container">
        <?php
        $title = get_field('experience_title');
        $subtitle = get_field('experience_subtitle');
        $image = get_field('experience_image');
        $content = get_field('experience_content');
        ?>

        <h2 class="section-title">
            <?php echo $title; ?>
        </h2>

        <?php if ($subtitle) : ?>
            <h3 class="section-subtitle">
                <?php echo $subtitle; ?>
            </h3>
        <?php endif; ?>

        <div class="section-image">
            <?php echo $image; ?>
        </div>

        <div class="section-body">
            <?php echo $content; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
