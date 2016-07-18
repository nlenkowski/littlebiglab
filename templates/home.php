<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<main class="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <h1 class="site-title"><?php the_field('main_heading'); ?></h1>

        <section class="projects">
            <h2 class="section-title">
                <?php the_field('projects_heading'); ?>
            </h2>
        </section>

        <?php if( have_rows('sections') ): ?>

        	<?php while( have_rows('sections') ): the_row();
        		$name    = get_sub_field('name');
        		$heading = get_sub_field('heading');
        		$content = get_sub_field('content');
        		?>

        		<section class="<?php echo strtolower($name); ?>">
                    <h2 class="section-title">
                        <?php echo $heading; ?>
                    </h2>
                    <div class="section-content">
                        <?php echo $content; ?>
                    </div>
        		</section>

        	<?php endwhile; ?>

        <?php endif; ?>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
