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

                    <div class="service-item">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                        <h3 class="item-title"><?php echo $title; ?></h3>
                        <p class="item-description"><?php echo $description; ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="section-body additional-services">
            <?php echo $content; ?>
        </div>
    </section>

    <!-- Projects -->

    <section class="projects section-content container">
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

                    <div class="project-item">
                        <a class="project-link" href="<?php the_permalink(); ?>" rel="nofollow"></a>
                        <?php
                        $image = get_field('logo');
                        if (! empty($image)) :
                            ?>
                            <div class="project-image-logo">
                                <img
                                    src="<?php echo $image['sizes']['project-logo']; ?>"
                                    srcset="<?php echo $image['sizes']['project-logo']; ?>,
                                            <?php echo $image['sizes']['project-logo-retina']; ?> 2x"
                                    width="<?php echo $image['sizes']['project-logo-width']; ?>"
                                    height="<?php echo $image['sizes']['project-logo-height']; ?>"
                                    alt="<?php the_title(); ?>"
                                >
                            </div>
                        <?php endif; ?>

                        <div class="project-content">
                            <h3 class="item-title project-title">
                                <?php the_title(); ?>
                            </h3>

                            <p class="item-description project-description">
                                <?php the_field('short_description'); ?>
                            </p>

                            <a class="button project-button" href="<?php the_permalink(); ?>">
                                <span>View</span>
                            </a>
                        </div>
                    </div>

                    <?php
                endforeach;
                wp_reset_postdata();
            endif; ?>

        </div>
    </section>

    <!-- About -->

    <section class="about section-content container">
        <?php
        $title = get_field('about_title');
        $subtitle = get_field('about_subtitle');
        $avatar = get_field('about_avatar');
        $content = get_field('about_content');
        ?>

        <h2 class="section-title">
            <?php echo $title; ?>
        </h2>

        <?php if ($subtitle) : ?>
            <h3 class="section-subtitle">
                <?php echo $subtitle; ?>
            </h3>
        <?php endif; ?>

        <div class="section-image about-avatar">
            <img src="<?php echo $avatar['url']; ?>" alt="Nathan & June">
        </div>

        <div class="section-body">
            <?php echo $content; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
