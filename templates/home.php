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
        </h2>

        <div class="projects-grid">

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
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $image['sizes']['project-logo']; ?>" srcset="<?php echo $image['sizes']['project-logo']; ?>, <?php echo $image['sizes']['project-logo-retina']; ?> 2x" alt="<?php the_title(); ?>">
                            </a>
                        <?php endif; ?>

                        <h4><?php the_title(); ?></h4>

                        <a href="<?php the_permalink(); ?>">View Project</a>
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
        		$name    = get_sub_field('name');
        		$heading = get_sub_field('heading');
        		$content = get_sub_field('content');
        		?>

        		<section class="<?php echo strtolower($name); ?> container">

                    <h2 class="section-title">
                        <?php echo $heading; ?>
                    </h2>

                    <div class="section-content">
                        <?php echo $content; ?>
                    </div>

        		</section>

        	<?php endwhile; ?>
        <?php endif; ?>

    <?php endwhile; // end of the loop ?>

</main>

<?php get_footer(); ?>
