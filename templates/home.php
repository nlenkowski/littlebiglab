<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<main class="main">

    <h1 class="site-title container">
        <?php the_field('main_heading', 8); ?>
    </h1>

    <section class="projects">

        <h2 class="section-title">
            <?php the_field('projects_heading'); ?>
            <span class="section-subtitle">
                <?php the_field('projects_subheading'); ?>
            </span>
        </h2>

        <div class="project-grid">

            <?php
            $projects = get_field('projects');
            if ( $projects ) : ?>

                <?php
                foreach ( $projects as $post ) :
                    setup_postdata( $post ); ?>

                    <div class="project">

                        <?php
                        $image = get_field('logo');
                        if ( !empty($image) ): ?>
                                <img class="project-image" src="<?php echo $image['sizes']['project-logo']; ?>" srcset="<?php echo $image['sizes']['project-logo']; ?>, <?php echo $image['sizes']['project-logo-retina']; ?> 2x" alt="<?php the_title(); ?>">
                        <?php endif; ?>

                        <h4 class="project-title">
                            <?php the_title(); ?>
                        </h4>

                        <h6 class="project-short-description">
                            <?php the_field('short_description'); ?>
                        </h6>

                        <a class="project-button button" href="<?php the_permalink(); ?>">
                            <svg class="icon"><use xlink:href="<?php echo DISTDIR; ?>/svg/symbols.svg#icon-chevron-circle-right"></use></svg><span>View Project</span>
                        </a>
                    </div>

                <?php
                endforeach;
                wp_reset_postdata();
                ?>

            <?php endif; ?>

        </div>
    </section>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php if ( have_rows('sections') ): ?>

        	<?php while ( have_rows('sections') ): the_row();
                $name       = get_sub_field('name');
                $heading    = get_sub_field('heading');
                $subheading = get_sub_field('subheading');
                $content    = get_sub_field('content');
        		?>

        		<section class="<?php echo strtolower($name); ?> section-content container">

                    <h2 class="section-title">
                        <?php echo $heading; ?>

                        <?php if ($subheading) : ?>
                            <span class="section-subtitle">
                                <?php echo $subheading; ?>
                            </span>
                        <?php endif; ?>
                    </h2>

                    <div class="section-body">
                        <?php echo $content; ?>
                    </div>

        		</section>

        	<?php endwhile; ?>
        <?php endif; ?>

    <?php endwhile; // end of the loop ?>

</main>

<?php get_footer(); ?>
