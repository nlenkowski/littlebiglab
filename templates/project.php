<?php
/*
Template Name: Project
*/
?>

<h1 class="project-heading">Project</h1>

<section class="project-info container">

    <div class="project-info-column">

        <?php
        $image = get_field('logo');
        if ( !empty($image) ): ?>
        <div class="project-logo">
            <img src="<?php echo $image['sizes']['project-logo']; ?>" srcset="<?php echo $image['sizes']['project-logo']; ?>, <?php echo $image['sizes']['project-logo-retina']; ?> 2x" alt="<?php the_title(); ?>">
        </div>
        <?php endif; ?>

        <h2 class="project-title"><?php the_title(); ?></h2>

        <h5 class="project-short-description"><?php the_field('short_description'); ?></h5>
    </div>


    <div class="project-info-column">

        <section class="project-description">
            <?php the_field('description'); ?>

            <a href="#" class="project-button button">
                <svg class="icon"><use xlink:href="<?php echo DISTDIR; ?>/svg/symbols.svg#icon-chevron-circle-right"></use></svg>
                <span>View Technical Details</span>
            </a>
        </section>

        <section class="project-more-info">

            <?php if ( have_rows('features') ) : ?>
                <section class="project-features">
                    <h4>Features</h4>
                    <ul>
                        <?php while ( have_rows('features') ) : the_row(); ?>

                            <?php
                            $feature = get_sub_field('feature');
                            if ( !empty($feature) ): ?>
                                <li><?php echo $feature; ?></li>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?php if ( get_field('technologies') ) : ?>
                <section class="project-technologies">
                    <h4>Technology Usage</h4>
                    <?php
                    $terms = get_field('technologies');
                    if ( $terms ) : ?>
                        <ul>
                            <?php
                            $terms_count = count( $terms );
                            foreach ( $terms as $index => $term )  {
                                echo '<li>' . $term->name . '</li>';
                            }
                            ?>
                        </ul>
                    <?php endif; ?>
                </section>
            <?php endif; ?>

        </section>

    </div>
</section>

<div class="project-details-menu-wrapper">
    <nav class="project-details-menu tabs-container tabs">

        <?php if ( have_rows('desktop_screenshots') ): ?>
            <a href="#" class="tab button-dark button-vertical" data-tab="desktop-screenshots">
                <svg class="icon icon-image"><use xlink:href="<?php echo DISTDIR; ?>/svg/symbols.svg#icon-desktop"></use></svg>
                <span>Desktop</span>
            </a>
        <?php endif; ?>

        <?php if ( have_rows('mobile_screenshots') ): ?>
            <a href="#" class="tab button-dark button-vertical" data-tab="mobile-screenshots">
                <svg class="icon icon-image"><use xlink:href="<?php echo DISTDIR; ?>/svg/symbols.svg#icon-mobile"></use></svg>
                <span>Mobile</span>
            </a>
        <?php endif; ?>

        <?php if ( have_rows('code_samples') ): ?>
            <a href="#" class="tab button-dark button-vertical" data-tab="code-samples">
                <svg class="icon icon-code"><use xlink:href="<?php echo DISTDIR; ?>/svg/symbols.svg#icon-embed"></use></svg>
                <span>Code</span>
            </a>
        <?php endif; ?>

        <?php
        $url = get_field('url');
        if ( !empty( $url ) ): ?>
            <a href="<?php echo $url; ?>" class="tab button-dark button-vertical">
                <svg class="icon icon-ext"><use xlink:href="<?php echo DISTDIR; ?>/svg/symbols.svg#icon-external-link"></use></svg>
                <span>Website</span>
            </a>
        <?php endif; ?>

    </nav>
</div>

<section class="project-details content-container">

    <section class="desktop-screenshots content">

        <?php
        if ( have_rows('desktop_screenshots') ):
            while ( have_rows('desktop_screenshots') ) : the_row(); ?>

                <?php
                $title = get_sub_field('title');
                $image = get_sub_field('image');

                if ( !empty($image) ): ?>
                    <div class="desktop-screenshot">
                        <h5><?php echo $title; ?></h5>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>">
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <section class="mobile-screenshots content">

        <?php
        if ( have_rows('mobile_screenshots') ):
            while ( have_rows('mobile_screenshots') ) : the_row(); ?>

                <?php
                $title = get_sub_field('title');
                $image = get_sub_field('image');

                if ( !empty($image) ): ?>
                    <div class="mobile-screenshot">
                        <h5><?php echo $title; ?></h5>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>">
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <section class="code-samples content">

        <?php
        if ( have_rows('code_samples') ):
            while ( have_rows('code_samples') ) : the_row(); ?>

                <?php
                $title = get_sub_field('title');
                $url   = get_sub_field('url');
                $embed = $url . '.js';

                if ( !empty($url) ): ?>
                    <div class="code-sample container">
                        <h5><?php echo $title; ?></h5>
                        <script src="<?php echo $embed; ?>"></script>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>

</section>
